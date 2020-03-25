<?php

use Illuminate\Support\Facades\Route;

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
    return redirect('/home');
});

Auth::routes(['verify' => true]);

Route::middleware(['verified'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::livewire('/api-keys', 'api-keys-page')->layout('layouts.app', ['title' => 'API Keys']);
    Route::livewire('/mein-checkout', 'my-checkout')->layout('layouts.app', ['title' => 'Mein Checkout']);
    Route::livewire('/vouchers', 'vouchers-index-page')->layout('layouts.app', ['title' => __('Meine Gutscheine')])->name('vouchers.index');
    Route::livewire('/vouchers/create', 'vouchers-create-page')->layout('layouts.app', ['title' => __('Neuer Gutschein')])->name('voucher.create');
    Route::livewire('/vouchers/{voucher}', 'vouchers-show-page')->layout('layouts.app', ['title' => __('Gutschein')]);
    Route::livewire('/user/profile', 'user-profile-page')->layout('layouts.app', ['title' => __('User Profil')]);
    Route::get('stripe_redirect', 'StripeAuthController@handle');
});


// QR endpoint
Route::get('qr-code', 'QrCodeController@generate');

// Public endpoints
Route::get('/public/vouchers/{voucher}', 'PublicVoucherController@show')
    ->name('public.voucher')
    ->middleware('signed');


// Webhooks for the stripe events
Route::any("/webhooks/stripe-checkout", "StripeCheckoutController@webhook");
