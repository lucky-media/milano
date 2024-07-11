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

Route::statamic('cart', 'cart.index', [
    'title' => 'My Cart'
]);

Route::statamic('checkout', 'checkout.index', [
    'title' => 'Checkout'
]);

Route::statamic('checkout/{checkout}', 'checkout.show', [
    'title' => 'Success Checkout'
]);

Route::statamic('/sitemap.xml', 'partials._sitemap', [
    'layout' => null
]);

Route::statamic('site.webmanifest', 'partials._manifest', [
    'layout' => null,
    'content_type' => 'application/json'
]);
