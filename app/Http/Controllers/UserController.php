<?php

namespace App\Http\Controllers;

use App\Bookmark;
use App\Category;
use App\City;
use App\Cpr;
use App\Gallery;
use App\Mail\CompletionMessage;
use App\Mail\OrderMessage;
use App\Mail\PreSaleQuery;
use App\Mail\ReviewNotification;
use App\Order;
use App\Profile;
use App\Review;
use App\User;
use App\Package;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;
use function Sodium\add;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd($id);



    }

    public function ShowProfile(Request $request,$id)
    {
        if($id == Auth::id())
        {
            $profile = User::find($id)->profile;
            if($request->ajax()){
                return response()->json($profile);
            }
            $cprs = $profile->Cpr;
            $categories = Category::all();
            $cities = City::all();
            $profile_cat = preg_split ("/\,/", $profile->category);
            $categories1 = collect();
            $i = 0 ;
            for (; $i < 6; $i++)
            {
                $categories1->add($categories[$i]);
            }
            $categories2 = collect();
            for (; $i < 11; $i++)
            {
                $categories2->add($categories[$i]);
            }
            $categories3 = collect();
            for (; $i < 16; $i++)
            {
                $categories3->add($categories[$i]);
            }

            $gallery = [];
            $timings = [];

            // dd($categories1);
            return view('dashboard.profile-details', compact('profile', 'gallery', 'timings', 'categories', 'profile_cat', 'cities', 'categories1', 'categories2', 'categories3', 'cprs'));
        }
        else
            return redirect('/');

        //dd($timings);
    }


    public function ShowProfileGallery($id)
    {
        if($id == Auth::id())
        {
            $profile = User::find($id)->profile;
            $gallery = $profile->gallery;

            return view('dashboard.profile-gallery', compact('profile', 'gallery'));
        }
        else
            return redirect('/');

        //dd($timings);
    }

    public function ShowProfileGalleryEdit($id)
    {
        if($id == Auth::id())
        {
            $profile = User::find($id)->profile;
            $images = $profile->gallery;
            // dd($gallery);
            return view('dashboard.profile-gallery-edit', compact('profile', 'images'));
        }
        else
            return redirect('/');

        //dd($timings);
    }


    public function ShowProfileTimings($id)
    {
        if($id == Auth::id())
        {
            $profile = User::find($id)->profile;
            $timings = $profile->timing;
            // dd($timings->monday_opening);
            return view('dashboard.profile-timings', compact('profile',  'timings'));
        }
        else
            return redirect('/');

        //dd($timings);
    }


    public function ShowPackages($id)
    {
        if($id == Auth::id())
        {
            $profile = User::find($id)->profile;
            $packages = $profile->package;

            $orders = Order::all();

           // dd(count($packages));
            return view('dashboard.package', compact('profile', 'packages', 'orders'));
        }
        else
            return redirect('/');
    }

    public function ShowReviews($id)
    {
        if($id == Auth::id())
        {
            $profile = User::find($id)->profile;
            $my_reviews = $profile->review;
            $all_reviews = Review::all();
            $cust_reviews = collect();
            foreach ($all_reviews as $review)
            {
                if ($review->order->package->profile_user_id == $id)
                    $cust_reviews->add($review);
            }
            return view('dashboard.review', compact('profile', 'cust_reviews', 'my_reviews'));
        }
        else
            return redirect('/');
    }

    public function ShowBookingsSelling($id)
    {
        if($id == Auth::id())
        {
            $profile = User::find($id)->profile;
            $packages = Package::all()->where('profile_user_id', '=', $id);
            $search = [];
            $index = -1;
            foreach ($packages as $package)
            {
                $index++;
                $search[$index] = $package->id;
            }
            $filtered = Order::all();
            $orders = $filtered->whereIn('package_id', $search);

            return view('dashboard.selling', compact('profile', 'orders'));
        }
        else
            return redirect('/');
    }

    public function ShowBookingsBuying($id)
    {
        if($id == Auth::id())
        {
            $orders = Order::all()->where('profile_user_id', '=', $id);
            return view('dashboard.buying', compact('profile', 'orders'));
        }
        else
            return redirect('/');
    }

    public function ShowWallet($id)
    {
        if($id == Auth::id())
        {
            $profile = User::find($id)->profile;
            $gallery = $profile->gallery;
            $timings = $profile->timing;
            $categories = Category::all();
            $cities = City::all();
            return view('dashboard.wallet', compact('profile', 'gallery', 'timings', 'categories', 'cities'));
        }
        else
            return redirect('/');
    }

    public function ShowBookmarks($id)
    {
        if($id == Auth::id())
        {
            $profile = User::find($id)->profile;
            $bookmarks = $profile->bookmark;
            //dd($bookmarks);
            return view('dashboard.bookmark', compact('profile', 'bookmarks'));
        }
        else
            return redirect('/');
    }

    public function ShowDashboard($id)
    {
        if($id == Auth::id())
        {
            $b_count = count(Bookmark::all()->where('bookmark_id', '=', Auth::id()));
            $profile = User::find($id)->profile;
            $packages = Package::all()->where('profile_user_id', '=', $id);
            $search = [];
            $index = -1;
            foreach ($packages as $package)
            {
                $index++;
                $search[$index] = $package->id;
            }
            $filtered = Order::all();
            $c_orders = count($filtered->whereIn('package_id', $search));

            // $bookmarks = $profile->bookmark;
            //dd($bookmarks);
            return view('dashboard.main', compact('profile', 'b_count', 'c_orders'));
        }
        else
            return redirect('/');
    }

    public function ShowPayDetails($id)
    {


        // Run show pay loop aik baar bus
//        $profiles = Profile::all();
//        foreach ($profiles as $user)
//        {
//            $payment = new Payment;
//            $payment->profile_user_id = $user->user_id;
//            $payment->save();
//        }

        if($id == Auth::id())
        {
            $profile = User::find($id)->profile;
            $info = $profile->payment;
            // dd($payments);
            return view('dashboard.profile-payment', compact('profile', 'info'));
        }
        else
            return redirect('/');
    }


    public function UpdateID(Request $request)
    {
        $profile = User::find(Auth::id())->profile;
        $info = $profile->payment;

        $info->email = $request->email;

        $info->save();

        return redirect()->route('PaymentDetails', [Auth::id()]);
    }

    public function UpdateProfile(Request $request)
    {
        $profile = User::find(Auth::id())->profile;
        if($request->tn_cat)
        {
            $category = join(', ', $request->tn_cat);
            $profile->category = $category;
        }
        $profile->title = $request->title;
        $profile->keywords = $request->keywords;
        $profile->city = $request->city_id;
        $profile->address = $request->address;
        $profile->zip = $request->zip;
        $profile->description = $request->description;
        $profile->phone = $request->phone;
        $profile->gender = $request->gender;
        $profile->twitter = $request->twitter;
        $profile->facebook = $request->facebook;
        $profile->instagram = $request->instagram;
        $profile->state = $request->state;
        $profile->location_preference = $request->location_preference;
        $profile->distance_preference = $request->distance_preference;
        $profile->tos = $request->tos;

        $titles = $request->input('cpr_title');
        $description = $request->input('cpr_description');
        if(!is_null($titles[0]))
        {
            Cpr::where('profile_user_id', Auth::id())->delete();
            for ($i = 0; $i < count($titles); $i++)
            {
                $package = new Cpr;
                $package->name = $titles[$i];
                $package->description = $description[$i];
                $package->profile_user_id = Auth::id();
                $package->save();
            }
        }
        else
            Cpr::where('profile_user_id', Auth::id())->delete();

        if ($request->cpr)
            $profile->cpr = 1;
        else
            $profile->cpr = 0;
        if ($request->membership)
            $profile->membership = 1;
        else
            $profile->membership = 0;

        //dd($profile);

        $avatar = $request->file('avatar');
        // dd($avatar);
        if($avatar)
        {
            $imageName = preg_replace('/\s/', '', $avatar->getClientOriginalName());
            $avatar->move('images/Avatars', time().$imageName);
            $profile->picture = time().$imageName;
        }


        if(is_null($profile->category) || is_null($profile->keywords) || is_null($profile->state) || is_null($profile->city) || is_null($profile->address) || is_null($profile->description) || is_null( $profile->phone))
        {
            $profile->complete = 0;
        }
        else{
            $profile->complete = 1;
        }

        $profile->save();

        \Session::flash('profile_updated', 'Profile Updated Successfully, all changes were saved');
        \Session::flash('alert-class', 'alert-success');

        return redirect()->route('DashboardProfile', [Auth::id()]);

    }

    public function UpdateGallery(Request $request)
    {
        $image = $request->file('file');

        if($image)
        {
            $imageName = preg_replace('/\s/', '', $image->getClientOriginalName());
            $image->move('images/ProfileGallery', time().$imageName);
            $gallery = new Gallery;
            $gallery->profile_user_id = Auth::id();
            $gallery->name = time().$imageName;
            $gallery->save();
        }

        //Work needs to be done to have this completed

        // return $image->getClientOriginalName();
        return $image->getClientOriginalName();

    }
    public function UpdateGalleryEdit(Request $request)
    {
        Gallery::find($request->image_id)->delete();
        return redirect()->route('DashboardGalleryEdit', [Auth::id()]);

    }

    public function UpdateTimings(Request $request)
    {
        $timings = Profile::find(Auth::id())->timing;
        $timings->monday_opening = $request->monday_opening;
        $timings->tuesday_opening = $request->tuesday_opening;
        $timings->wednesday_opening = $request->wednesday_opening;
        $timings->thursday_opening = $request->thursday_opening;
        $timings->friday_opening = $request->friday_opening;
        $timings->sunday_opening = $request->sunday_opening;
        $timings->monday_closing = $request->monday_closing;
        $timings->tuesday_closing = $request->tuesday_closing;
        $timings->wednesday_closing = $request->wednesday_closing;
        $timings->thursday_closing = $request->thursday_closing;
        $timings->friday_closing = $request->friday_closing;
        $timings->saturday_closing = $request->saturday_closing;
        $timings->sunday_closing = $request->sunday_closing;

        $timings->save();

        return redirect()->route('DashboardTimings', [Auth::id()]);

    }

    public function NewPackages(Request $request)
    {
        $titles = $request->input('title');

        $description = $request->input('description');
        $price = $request->input('price');

        for ($i = 0; $i < count($titles); $i++)
        {

            $package = new Package;
            $package->name = $titles[$i];
            $package->description = $description[$i];
            $package->price = $price[$i];
            $package->profile_user_id = Auth::id();
            $package->save();
        }
        return redirect()->route('DashboardPackage', [Auth::id()]);
    }

    public function HidePackage(Request $request)
    {
        if ($request->display_task == "hide")
        {
            $package = Package::find($request->package_id);
            $package->display = 0;
            $package->save();
        }
        else{
            $package = Package::find($request->package_id);
            $package->display = 1;
            $package->save();
        }

        return redirect()->route('DashboardPackage', [Auth::id()]);

    }

    public function DeletePackage(Request $request)
    {
        $package = Package::find($request->package_id);

        $orders = $package->order;
        $no = 0;
        foreach ($orders as $order)
        {
            if (!($order->completed))
            {
                $no = 1;
                break;
            }
        }

        if ($no)
        {
            \Session::flash('No', 'Your package still has ongoing orders, please complete those orders before deletion. You can hide your package in the meantime.');
            \Session::flash('alert-class', 'alert-danger');
        }
        else
        {
            $package->nulled = 1;
            $package->fresh = 0;
            $package->display = 0;
            $package->save();
        }

        return redirect()->route('DashboardPackage', [Auth::id()]);
    }

    public function UpdateBookmark(Request $request)
    {

        $input = $request->id;

        $bookmark = Bookmark::where('profile_user_id', Auth::id())->where('bookmark_id', $input)->get();
        if(!count($bookmark))
        {
            $newBookmark = new Bookmark;
            $newBookmark->profile_user_id = Auth::id();
            $newBookmark->bookmark_id = $input;
            $newBookmark->save();
            return response()->json(['success'=>$bookmark]);
        }
        else
        {
            Bookmark::where('profile_user_id', Auth::id())->where('bookmark_id', $input)->delete();
            return response()->json(['success'=>$bookmark]);
        }
    }

    public function DeleteBookmark(Request $request)
    {
        Bookmark::find($request->book_id)->delete();

        return redirect()->route('DashboardBookmarks', [Auth::id()]);

    }

    public function TrainersMail(Request $request)
    {
        $order = Order::find($request->order_id);
        $package = $order->package;
        $user = User::find(Auth::id());
        $valueArray = [
            'main' => "Hi, your trainer has left you a message in regards to the following order",
            'order_id' => $order->id,
            'package_name' => $package->name,
            'package_price' => $package->price,
            'package_description' => $package->description,
            'package_date' => date('M j Y g:i A', strtotime($order->created_at)),
            'message' => $request->message,
            'email' => $user->email,
            'phone' => $user->profile->phone,
            'name' => $user->name,
        ];

        $query = new OrderMessage($valueArray);
        Mail::to($request->client_email)->send($query);
        \Session::flash('message', 'Your message has been sent to the client, you will hear back soon. Thanks!');
        \Session::flash('alert-class', 'alert-success');

        return redirect()->route('DashboardBookingsSelling', ['id' => Auth::id()]);
    }
    public function CustomersMail(Request $request)
    {
        $order = Order::find($request->order_id);
        $package = $order->package;

        $user = User::find(Auth::id());
        $valueArray = [
            'main' => "Hi, your client has left you a message in regards to the following order",
            'order_id' => $order->id,
            'package_name' => $package->name,
            'package_price' => $package->price,
            'package_description' => $package->description,
            'package_date' => date('M j Y g:i A', strtotime($order->created_at)),
            'message' => $request->message,
            'email' => $user->email,
            'phone' => $user->profile->phone,
            'name' => $user->name,
        ];

        $query = new OrderMessage($valueArray);
        Mail::to($request->trainer_email)->send($query);

        \Session::flash('message', 'Your message has been sent to the Trainer, you will hear back soon. Thanks!');
        \Session::flash('alert-class', 'alert-success');

        return redirect()->route('DashboardBookingsBuying', ['id' => Auth::id()]);
    }

    public function AskForApproval(Request $request)
    {
        $order = Order::find($request->order_id);
        $package = $order->package;
        $user = User::find(Auth::id());
        $valueArray = [
            'main' => "Hi, your trainer has requested you to mark the following order as complete. If your sessions have been successfully completed, please mark the order as complete.",
            'order_id' => $order->id,
            'package_name' => $package->name,
            'package_price' => $package->price,
            'package_description' => $package->description,
            'package_date' => date('M j Y g:i A', strtotime($order->created_at)),
            'email' => $user->email,
            'phone' => $user->profile->phone,
            'name' => $user->name,
        ];

        $query = new CompletionMessage($valueArray);
        Mail::to($order->email)->send($query);
        \Session::flash('message', 'Your request has been sent to the client, you will hear back soon. Thanks!');
        \Session::flash('alert-class', 'alert-success');

        return redirect()->route('DashboardBookingsSelling', ['id' => Auth::id()]);
    }

    public function MarkAsComplete(Request $request)
    {
        $order = Order::find($request->order_id);
        $package = $order->package;
        $user = User::find(Auth::id());
        $valueArray = [
            'main' => "Hi, your client has marked the following order as complete.",
            'order_id' => $order->id,
            'package_name' => $package->name,
            'package_price' => $package->price,
            'package_description' => $package->description,
            'package_date' => date('M j Y g:i A', strtotime($order->created_at)),
            'email' => $user->email,
            'phone' => $user->profile->phone,
            'name' => $user->name,
        ];

        $order->completed = 1;
        $order->save();

        $query = new CompletionMessage($valueArray);
        Mail::to($order->package->profile->user->email)->send($query);
        \Session::flash('message', 'The Trainer has been notified. Thanks!');
        \Session::flash('alert-class', 'alert-success');

        // dd($order);

        return redirect()->route('DashboardBookingsBuying', ['id' => Auth::id()]);
    }

    public function PostAReview(Request $request)
    {
        //dd($request);
        $review = new Review;

//        $review->service = $request->rating_services;
//        $review->valueofmoney = $request->rating_vom;
        $review->experience = $request->rating_exp;
        $review->friendliness = $request->rating_friend;
        $review->review = $request->comment;
        $review->order_id = $request->order_id;
        $review->profile_user_id = Auth::id();
        $review->save();

        $user = User::find(Auth::id());
        $order = Order::find($request->order_id);
        $package = $order->package;

        $valueArray = [
            'main' => "Hi, your client has left you a review in regards to the following order:",
            'order_id' => $order->id,
            'package_name' => $package->name,
            'package_price' => $package->price,
            'package_description' => $package->description,
            'package_date' => date('M j Y g:i A', strtotime($order->created_at)),
            'email' => $user->email,
            'phone' => $user->profile->phone,
            'name' => $user->name,
            'vom' => $review->valueofmoney,
            'exp' => $review->experience,
            'service' => $review->service,
            'friendliness' => $review->friendliness,
            'review' => $review->review,
        ];


        $query = new ReviewNotification($valueArray);
        Mail::to($request->review_email)->send($query);
        \Session::flash('message', 'The Review has been submitted. Thanks!');
        \Session::flash('alert-class', 'alert-success');

        return redirect()->route('DashboardBookingsBuying', ['id' => Auth::id()]);    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userLocationUpdate(Request $request)
    {
        // Get the model
        $profile = Profile::find(auth()->user()->id);
        $profile->lat = $request->lat;
        $profile->long = $request->long;
        $profile->location = $request->location;
        $profile->save();

        return response()->json($profile);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Handle stripe redirect.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function stripeRedirect(Request $request)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://connect.stripe.com/oauth/token');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "client_secret=".env('STRIPE_SECRET'). "&code=".$request->code."&grant_type=authorization_code");
        curl_setopt($ch, CURLOPT_POST, 1);

        $headers = array();
        $headers[] = 'Content-Type: application/x-www-form-urlencoded';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = json_decode(curl_exec($ch));
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        // Get the model
        $profile = Profile::find(auth()->user()->id);
        $profile->stripe_response = json_encode($result);
        $profile->stripe_user_id = $result->stripe_user_id;
        $profile->save();

        return redirect('user/'.auth()->user()->id.'/dashboard/profile-details')->with('success_payment', 'Payment method connected with stripe successfully.');
    }
}
