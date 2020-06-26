<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/looking-for-a-trainer', function () {
    return view('form.query');
})->name('trainer-search');

//Route::get('/trainers/armon-b', function () {
//    return view('trainer.public');
//});
//
//Route::get('/trainers/', function () {
//    return view('trainer.search');
//});


//Authentication
Auth::routes(['verify' => true]);

//Home Page
Route::get('/', 'HomeController@index')->name('home');

//Dashboard Routes
Route::get('/user/{id}/dashboard/profile-details', 'UserController@ShowProfile')->name('DashboardProfile')->middleware('verified');
Route::post('/userLocationUpdate', 'UserController@userLocationUpdate')->name('userLocationUpdate')->middleware('verified');
Route::get('/user/{id}/dashboard/profile-gallery', 'UserController@ShowProfileGallery')->name('DashboardGallery')->middleware('verified');
Route::get('/user/{id}/dashboard/profile-gallery-edit', 'UserController@ShowProfileGalleryEdit')->name('DashboardGalleryEdit')->middleware('verified');
Route::get('/user/{id}/dashboard/profile-timings', 'UserController@ShowProfileTimings')->name('DashboardTimings')->middleware('verified');
Route::post('/profileupdate', 'UserController@UpdateProfile')->name('ProfileUpdate')->middleware('verified');
Route::post('/IDupdate', 'UserController@UpdateID')->name('IDUpdate')->middleware('verified');
Route::post('/galleryupdate', 'UserController@UpdateGallery')->name('GalleryUpdate')->middleware('verified');
Route::post('/galleryupdate-edit', 'UserController@UpdateGalleryEdit')->name('GalleryUpdateEdit')->middleware('verified');
Route::post('/timingsupdate', 'UserController@UpdateTimings')->name('TimingsUpdate')->middleware('verified');
Route::post('new-package', 'UserController@NewPackages')->name('NewPackages')->middleware('verified');
Route::post('hide-package', 'UserController@HidePackage')->name('HidePackage')->middleware('verified');
Route::post('delete-package', 'UserController@DeletePackage')->name('DeletePackage')->middleware('verified');
Route::post('save-bookmark', 'UserController@UpdateBookmark')->name('BookmarkUpdate')->middleware('verified');
Route::post('delete-bookmark', 'UserController@DeleteBookmark')->name('BookmarkDelete')->middleware('verified');
Route::post('send-customer-message', 'UserController@TrainersMail')->name('TrainersMail')->middleware('verified');
Route::post('send-trainer-message', 'UserController@CustomersMail')->name('CustomersMail')->middleware('verified');
Route::post('ask-for-approval', 'UserController@AskForApproval')->name('AskForApproval')->middleware('verified');
Route::post('mark-as-complete', 'UserController@MarkAsComplete')->name('MarkAsComplete')->middleware('verified');
Route::post('review-post', 'UserController@PostAReview')->name('PostAReview')->middleware('verified');
Route::get('/user/{id}/dashboard/packages', 'UserController@ShowPackages')->name('DashboardPackage')->middleware('verified');
Route::get('/user/{id}/dashboard/bookmarks', 'UserController@ShowBookmarks')->name('DashboardBookmarks')->middleware('verified');
Route::get('/user/{id}/dashboard/reviews', 'UserController@ShowReviews')->name('DashboardReviews')->middleware('verified');
Route::get('/user/{id}/dashboard/wallet', 'UserController@ShowWallet')->name('DashboardWallet')->middleware('verified');
Route::get('/user/{id}/dashboard/bookings-selling', 'UserController@ShowBookingsSelling')->name('DashboardBookingsSelling')->middleware('verified');
Route::get('/user/{id}/dashboard/booking-buying', 'UserController@ShowBookingsBuying')->name('DashboardBookingsBuying')->middleware('verified');
Route::get('/user/{id}/dashboard/wallet/paypal', 'UserController@ShowPayDetails')->name('PaymentDetails')->middleware('verified');
Route::get('/user/{id}/dashboard', 'UserController@ShowDashboard')->name('Dashboard')->middleware('verified');
Route::get('stripe-redirect', 'UserController@stripeRedirect')->name('redirect')->middleware('verified');


//PublicView Routes
Route::get('/profile/{id}/{name}', 'PublicView@PublicProfile')->name('PublicProfile');
Route::post('/form-search', 'PublicView@FormSearch')->name('FormSearch');
Route::get('/search/gender/{gender}/location/{location}/specialties/{specialties}/days/{days}/timings/{timings}/zip/{zip}', 'PublicView@TrainerResult')->name('TrainerResult');
Route::get('/package/{id}/new-order/', 'PublicView@CreateOrder')->name('CreateOrder')->middleware('verified');
Route::post('/finalize-order', 'PublicView@FinalizeOrder')->name('FinalizeOrder')->middleware('verified');
Route::get('/booking-order-confirmation/{id}/thank-you', 'PublicView@OrderConfirmation')->name('OrderConfirmation')->middleware('verified');
Route::get('/invoice/order/{id}/', 'PublicView@InvoiceDisplay')->name('InvoiceDisplay')->middleware('verified');
Route::get('/contact', 'PublicView@Contact')->name('contact');
Route::get('/FAQs', 'PublicView@FAQ')->name('FAQ');
Route::get('/meet-the-creator', 'PublicView@MeetTheCreator')->name('MeetTheCreator');
Route::get('/privacy-policy', 'PublicView@Privacy')->name('Privacy');
Route::get('/terms-of-service', 'PublicView@TOS')->name('TOS');
Route::post('/pre-sale-query', 'PublicView@PreSale')->name('PreSale');
Route::post('/contact-us', 'PublicView@ContactUs')->name('ContactUs');


