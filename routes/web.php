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
    Route::livewire('/vouchers', 'vouchers-index-page')->layout('layouts.app', ['title' => __('Meine Gutscheine')]);
    Route::livewire('/vouchers/create', 'vouchers-create-page')->layout('layouts.app', ['title' => __('Neuer Gutschein')]);
    Route::livewire('/user/profile', 'user-profile-page')->layout('layouts.app', ['title' => __('User Profil')]);
    Route::get('stripe_redirect', 'StripeAuthController@handle');
});

Route::get('qr-code', 'QrCodeController@generate');

Route::any("/webhooks/stripe-checkout", "StripeCheckoutController@webhook");
