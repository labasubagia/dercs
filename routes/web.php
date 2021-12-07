<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return view('welcome');
});


//Email Verification Notice
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');


//The Email Verification Handler
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');


//Resend Verification Email
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');


Route::middleware(['auth'])->group(function(){

    Route::middleware(['redirectCustomer'])->group(function(){
        Route::post('/customerHomepage', [App\Http\Controllers\HomeController::class, 'customerHomepage']);
        Route::get('/customerHomepage', [App\Http\Controllers\HomeController::class, 'customerHomepage']);

        Route::get('/customerProfile', [App\Http\Controllers\ProfileController::class, 'customerProfile']);

        Route::post('/updatedCustomerProfile', [App\Http\Controllers\ProfileController::class, 'updateCustomerProfile']);

        Route::get('/requestService', [App\Http\Controllers\RequestController::class, 'displayCustInfo']);

        Route::post('/saveRequest', [App\Http\Controllers\RequestController::class, 'saveRequest']);

        //customer view item list
        Route::get('/viewItemList', [App\Http\Controllers\ServiceController::class, 'displayItemList']);

        Route::post('/viewItemDetail', [App\Http\Controllers\ServiceController::class, 'displayItemDetail']);

        Route::get('/cTrackList', [App\Http\Controllers\DeliveryController::class, 'cViewTrackingList']);

        Route::post('/cViewProgress', [App\Http\Controllers\DeliveryController::class, 'cViewProgress']);

        //direct to payment
        Route::post('/displayPayment', [App\Http\Controllers\PaymentController::class, 'paymentInfo']);

        Route::post('/cod', [App\Http\Controllers\PaymentController::class, 'addPaymentCOD']);

        Route::get('/paymentSuccessful/{serviceID}/{total}', [App\Http\Controllers\PaymentController::class, 'addPaymentPayPal']);

        Route::post('/returned', [App\Http\Controllers\DeliveryController::class, 'returnedDevice']);

    });

    Route::middleware(['redirectStaff'])->group(function(){
        Route::post('/staffDashboard', [App\Http\Controllers\HomeController::class, 'staffDashboard']);
        Route::get('/staffDashboard', [App\Http\Controllers\HomeController::class, 'staffDashboard']);
        
        Route::get('/staffProfile', [App\Http\Controllers\ProfileController::class, 'staffProfile']);

        Route::post('/updatedStaffProfile', [App\Http\Controllers\ProfileController::class, 'updateStaffProfile']);

        Route::get('/manageUsers', [App\Http\Controllers\ProfileController::class, 'viewUsers']);

        Route::post('/deleteCustomer', [App\Http\Controllers\ProfileController::class, 'deleteCustomer']);

        Route::post('/banCustomer', [App\Http\Controllers\ProfileController::class, 'banCustomer']);

        Route::post('/unbanCustomer', [App\Http\Controllers\ProfileController::class, 'unbanCustomer']);

        //staff view service list
        Route::get('/viewRepairServiceList', [App\Http\Controllers\ServiceController::class, 'viewRepairServiceList']);

        //staff view particular service
        Route::post('/viewUpdateForm', [App\Http\Controllers\ServiceController::class, 'viewUpdateForm']);

        Route::post('/displayUpdateForm', [App\Http\Controllers\ServiceController::class, 'displayUpdateForm']);

        Route::post('/updateForm', [App\Http\Controllers\ServiceController::class, 'updateForm']);

        //staffTrackList
        Route::get('/sTrackList', [App\Http\Controllers\DeliveryController::class, 'sViewTrackingList']);

        Route::post('/sViewProgress', [App\Http\Controllers\DeliveryController::class, 'sViewProgress']);

        Route::post('/receive', [App\Http\Controllers\DeliveryController::class, 'receive']);
    });

    Route::middleware(['redirectRider'])->group(function(){
        Route::post('/riderHomepage', [App\Http\Controllers\HomeController::class, 'riderHomepage']);
        Route::get('/riderHomepage', [App\Http\Controllers\HomeController::class, 'riderHomepage']);

        Route::get('/riderProfile', [App\Http\Controllers\ProfileController::class, 'riderProfile']);

        Route::post('/updatedRiderProfile', [App\Http\Controllers\ProfileController::class, 'updateRiderProfile']);

        Route::get('/riderLicenseView', [App\Http\Controllers\ProfileController::class, 'riderLicenseView']);

        Route::post('/riderLicenseUpload', [App\Http\Controllers\ProfileController::class, 'riderLicenseUpload']);

        Route::get('/servicePage', [App\Http\Controllers\DeliveryController::class, 'viewStatus']);

        Route::post('/accept', [App\Http\Controllers\DeliveryController::class, 'accept']);

        Route::post('/viewAcceptedTask', [App\Http\Controllers\DeliveryController::class, 'viewAcceptedTask']);

        Route::post('/updateTrack', [App\Http\Controllers\DeliveryController::class, 'updateProgress']);
    });

});







