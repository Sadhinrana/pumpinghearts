<?php

namespace App\Http\Controllers;

use App\Bookmark;
use App\City;
use App\Gallery;
use App\Mail\ContactUs;
use App\Mail\PreSaleQuery;
use App\Package;
use App\Profile;
use App\Review;
use App\Timing;
use App\Category;
use App\User;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;
use mysql_xdevapi\Session;
use Stripe\Charge;
use Stripe\Stripe;

class PublicView extends Controller
{
    public function PublicProfile(Request $request, $id, $name)
    {
        $user = User::find($id);
        $profile = $user->profile;

        if($request->ajax()){
            return response()->json($profile);
        }

        $gallery = $profile->gallery;
        $timings = $profile->timing;
        $p1 = $profile->package;
        $packages = $p1->reject(function ($p1) {
            return $p1->display == 0;
        });
        $cprs = $profile->Cpr;
        $profile_cat = preg_split ("/\,/", $profile->category);
        $categories = Category::whereIn('id', $profile_cat)->get();
        $city = City::find($profile->city);
        $mail = $user->email;

        $all_reviews = Review::all();
        $reviews = collect();
        foreach ($all_reviews as $review)
        {
            if ($review->order->package->profile_user_id == $id)
                $reviews->add($review);
        }

        // dd($reviews);

        $r_count = count($reviews);
        $exp = 0;
        $friend = 0;
        $overall = 0;
        foreach ($reviews as $review)
        {
            $exp = $exp + $review->experience;
            $friend = $friend + $review->friendliness;
            $overall = (($exp +$friend) + $overall)/2;
        }
        $r_array = [];

        if ($r_count > 0)
        {
            $r_array = [
                'exp' => $exp/$r_count,
                'friend' => $friend/$r_count,
                'overall' => $overall/$r_count,
            ];
        }
        else
        {
            $r_array = [
                'exp' => 0,
                'friend' => 0,
                'overall' => 0,
            ];
        }


        if(Auth::id())
        {
            $bookmark = count(Bookmark::where('profile_user_id', Auth::id())->where('bookmark_id', $profile->user_id)->get());
        }

        $keywords = preg_split ("/\,/", $profile->keywords);

        return view('trainer.public' , compact('profile' , 'gallery' , 'timings', 'categories', 'city', 'mail', 'keywords', 'packages', 'bookmark', 'r_array', 'reviews', 'cprs'));

    }

    public function FormSearch(Request $request)
    {
        return redirect()->route('TrainerResult', [$request->gender, json_encode($request->location), json_encode($request->specialty), json_encode($request->days), json_encode($request->time), $request->zip]);
    }


    public function TrainerResult(Request $request, $gender, $location, $specialty, $days, $timings, $zip)
    {
        $location_preference = json_decode($location, true);
        $specialty_preference = json_decode($specialty, true);
        $days_preference = json_decode($days, true);
        $time_preference = json_decode($timings, true);
        //dd($time_preference);
        $profiles = Profile::all();
        $gender_filtered = $profiles;

        if($gender && $gender != "DoesntMatter")
        {
            $gender_filtered = null;
            $gender_filtered = collect();
            foreach ($profiles as $profile) {
                if ($profile->gender == $gender) {
                    $gender_filtered->add($profile);
                }
            }
        }


        $zip_filter = $gender_filtered;
        if($zip)
        {
            $zip_filter = null;
            $zip_filter = collect();
            foreach ($gender_filtered as $profile)
            {
                if($profile->zip == $zip)
                {
                    $zip_filter->add($profile);
                }
            }
        }


        $location_filter = $zip_filter;
        if(count($location_preference) > 0)
        {
            $location_filter = null;
            $location_filter = collect();

            foreach ($zip_filter as $profile)
            {
                if(in_array($profile->location_preference, $location_preference))
                {
                    $location_filter->add($profile);
                }
            }
        }

        $specialty_filter = $location_filter;
        if(count($specialty_preference)>0)
        {
            $specialty_filter = null;
            $specialty_filter = collect();

            foreach ($location_filter as $profile)
            {
                $profile_cat = preg_split ("/\,/", $profile->category);
                $categories = Category::whereIn('id', $profile_cat)->get();

                foreach ($categories as $category)
                {
                    if(in_array($category->category_name, $specialty_preference))
                    {
                        $specialty_filter->add($profile);
                        break;
                    }
                }

            }
        }

        if($request->ajax()){
            return response()->json($specialty_filter);
        }

        return view('trainer.search', compact('specialty_filter'));
    }


    public function CreateOrder($id)
    {
        $package = Package::find($id);

        if(Auth::id() == $package->profile_user_id)
        {
            \Session::flash('FailedPurchase', 'You are not allowed to perform this action');
            \Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
        }

        $profile = Profile::find($package->profile_user_id);
        return view('order.checkout', compact('package', 'profile'));
    }

    public function FinalizeOrder(Request $request)
    {
        // Validate form data
        $this->validate($request, [
            'fname' => 'required|string',
            'lname' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'stripeToken' => 'required|string',
            'amount' => 'required|numeric',
        ]);

        $trainer = Profile::where('user_id', $request->profile_user_id)->first();

        Stripe::setApiKey(env('STRIPE_SECRET'));

        $charge = Charge::create([
            'amount' => (double) $request->amount  * 100,
            'currency' => 'usd',
            'description' => 'We are testing this example charge',
            'source' => $request->stripeToken,
            "application_fee_amount" => 0.09 * ((double) $request->amount  * 100),
        ], ["stripe_account" => $trainer->stripe_user_id]);

        $package = Package::find($request->package_id);
        $package->nulled = 1;
        $package->fresh = 1;
        $order = new Order;
        $order->first_name = $request->fname;
        $order->last_name = $request->lname;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->package_id = $request->package_id;
        $order->profile_user_id = Auth::id();
        $order->transaction_id = $charge->id;
        $order->stripe_response = $charge;
        $order->amount = $request->amount;
        $order->save();
        $package->save();

        return redirect()->route('OrderConfirmation', ['id' => $order->id]);
    }


    public function OrderConfirmation($id)
    {
        $order = Order::find($id);
        return view('order.confirmation', compact('order'));
    }

    public function InvoiceDisplay($id)
    {
        $order = Order::find($id);
        $package = Package::find($order->package_id);
        $trainer = Profile::find($package->profile_user_id);
        return view('order.invoice', compact('order', 'trainer', 'package'));
    }

    public function Contact()
    {
        return view('contact');
    }

    public function FAQ()
    {
        return view('FAQ');
    }

    public function MeetTheCreator()
    {
        return view('meet-the-creator');
    }

    public function Privacy()
    {
        return view('privacy');
    }

    public function TOS()
    {
        return view('tos');
    }

    public function PreSale(Request $request)
    {

        // dd($request);

        $valueArray = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'query' => $request->question,
            'preferred' => $request->contact_radio,
        ];


        $ToProfile = User::find($request->profile_id);

        $query = new PreSaleQuery($valueArray);
        Mail::to($ToProfile->email)->send($query);
        \Session::flash('message', 'Your query has been forwarded to the Trainer, you will hear back soon. Thanks!');
        \Session::flash('alert-class', 'alert-success');
        return redirect()->route('PublicProfile', ['id' => $ToProfile->id, 'name' => $ToProfile->name]);
    }

    public function ContactUs(Request $request)
    {

        $valueArray = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'query' => $request->comments,
        ];

        $query = new ContactUs($valueArray);
        Mail::to("info@pumpinghearts.net")->send($query);
        \Session::flash('message', 'Your query has been forwarded to the staff, you will hear back from us very soon. Thanks!');
        \Session::flash('alert-class', 'alert-success');
        return redirect()->route('contact');
    }
}


