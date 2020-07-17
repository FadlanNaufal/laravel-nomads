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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/detail/{slug}', 'DetailController@index')->name('detail');

Route::get('/checkout/{id}','CheckoutController@index')->name('checkout')->middleware(['auth','verified']);
Route::post('/checkout/{id}','CheckoutController@process')->name('checkout.process')->middleware(['auth','verified']);

Route::get('/checkout/remove/{detail_id}','CheckoutController@remove')->name('checkout.remove')->middleware(['auth',
'verified']);
Route::post('/checkout/create/{id}','CheckoutController@create')->name('checkout.create')->middleware(['auth','verified']);

Route::get('/checkout/success/{id}','CheckoutController@success')->name('checkout.success')->middleware(['auth',
'verified']);

Route::prefix('admin')->middleware(['auth','admin'])->group(function(){
    Route::get('/','Admin\DashboardController@index')->name('dashboard.admin');
    Route::resource('travel-packages','TravelPackagesController');
    Route::resource('gallery','GalleryController');
    Route::resource('transaction','TransactionsController');
});
Auth::routes(['verify' => true]);

