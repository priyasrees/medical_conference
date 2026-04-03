<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('clear-cache', function () {
    \Artisan::call('cache:clear');
    \Artisan::call('view:clear');
    \Artisan::call('route:clear');
    \Artisan::call('config:clear');
    //\Artisan::call('storage:link');
    return "Cache is Cleared Successfully";
});

Route::get('/send-abstract-reject-mail', function () {

    $to_name  = "test";
    $to_email = "tester@gmail.com";

   $data = [
    'name' => 'tester',
    'sender_name' => 'Rhinocon',
    'logoUrl' => env('APP_URL').'public/admin_asset/images/logo.png',
    'contactEmail' => 'rhinocon2025chennai@gmail.com'
];

    Mail::send('mail.abstract_rejection_mail', $data, function($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)->subject('Abstract Submission Status Notification');
    });

    return "Mail Sent Successfully!";
});

Route::get('rhinocon-cron', function () {
    \Artisan::call('rhinocon:cron');
    return "Cron Job Successfully";
});
    Route::post('/razorpay/webhook', 'Admin\RazorpayWebhookController@handle');

// Route::post('/webhook/razorpay', 'PaymentWebhookController@handleWebhook')
//      ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
//      Route::get('/razorpay/checkout', 'BaseController@showCheckout')->name('razorpay.checkout');


Route::get('/', 'BaseController@home')->name('homepage');
Route::get('message', 'BaseController@message')->name('message');
Route::get('organizing-committee', 'BaseController@committee')->name('committee');
Route::get('airs-executive-committee', 'BaseController@airsCommittee')->name('airs.committee');
Route::get('about-venue', 'BaseController@aboutVenue')->name('about.venue');
Route::get('about-chennai', 'BaseController@aboutChennai')->name('about.chennai');

Route::get('conference-venue', 'BaseController@conferenceVenue')->name('conference.venue');

Route::get('program-glance', 'BaseController@programGlance')->name('program.glance');
Route::get('conference-program', 'BaseController@conferenceProgram')->name('conference.program');
Route::get('abstracts', 'BaseController@abstracts')->name('abstracts');
Route::get('abstract-form', 'BaseController@abstractForm')->name('abstracts.form');
Route::post('abstract-store', 'BaseController@abstractStore')->name('abstracts.store');
Route::get('contact-us', 'BaseController@contact')->name('contact.us');
Route::get('registration', 'BaseController@registration')->name('registration');

Route::get('registration-form', 'BaseController@registrationForm')->name('registration.form');
Route::get('get-plan-detail/{category_name}', 'BaseController@categoryList')->name('category.list');
Route::get('get-category-detail/{plan_id}', 'BaseController@categoryDetail')->name('category.detail');
Route::post('registration-form', 'BaseController@registrationStore')->name('registration.form.store');
Route::get('package', 'BaseController@package')->name('booking.package');
Route::post('package-form', 'BaseController@packageStore')->name('package.form.store');

Route::get('hands-on-training-courses', 'BaseController@training')->name('hands.training');
Route::post('traning-form', 'BaseController@traningStore')->name('traning.form.store');

Route::get('vip-member', 'BaseController@vipMember')->name('registration.vipmember');
Route::post('vip-member-form', 'BaseController@vipStore')->name('vip.form.store');


Route::get('package-dinner', 'BaseController@dinner');

Route::get('search-members/{search}', 'BaseController@searchMember')->name('search.member');
//Route::get('package-dinner-load-data', 'BaseController@packageDinnerLoadData')->name('booking.package.dinner.load');
Route::get('id_card/{id}', 'BaseController@generatePDF')->name('idcard.generate');
Route::get('invoice/{id}', 'BaseController@invoicePDF')->name('invoice.generate');
Route::get('invoice-mail/{id}', 'BaseController@invoicePDF')->name('invoice.generate');

Route::get('downloads', 'BaseController@download')->name('download');

Route::get('tour/mamallapuram', 'BaseController@mamallapuram')->name('tour.mamallapuram');
Route::get('tour/chennai', 'BaseController@chennai')->name('tour.chennai');
Route::get('tour/kanchipuram', 'BaseController@kanchipuram')->name('tour.download');
Route::get('accommodation', 'BaseController@accommodation')->name('accommodation');
Route::get('congress-food-menu', 'BaseController@food')->name('food.menu');
Route::get('weather', 'BaseController@weather')->name('weather');
// Route::get('/check-payment-status', 'PaymentWebhookController@checkStatus');



