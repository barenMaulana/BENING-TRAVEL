<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')
    ->name('home');

Route::get('/package', 'HomeController@package')
    ->name('package');

Route::get('/search', 'HomeController@search')
    ->name('search');

Route::get('/detail/{slug}', 'DetailController@index')
    ->name('detail');

Route::post('/checkout/{id}', 'CheckoutController@process')
    ->name('checkout_process')
    ->middleware('auth', 'verified');

Route::get('/checkout/{id}', 'CheckoutController@index')
    ->name('checkout')
    ->middleware('auth', 'verified');

Route::post('/checkout/create/{id}', 'CheckoutController@create')
    ->name('checkout_create')
    ->middleware('auth', 'verified');

Route::get('/checkout/remove/{detail_id}', 'CheckoutController@remove')
    ->name('checkout_remove')
    ->middleware('auth', 'verified');

Route::get('/checkout/confirm/{id}', 'CheckoutController@success')
    ->name('checkout_success')
    ->middleware('auth', 'verified');

// route dashboard admin 
Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/', 'DashboardController@index')
            ->name('dashboard');

        Route::resource('travel-packages', 'TravelPackageController');
        Route::resource('gallery', 'GalleryController');
        Route::resource('transaction', 'TransactionController');
    });

Auth::routes(['verify' => true]);
