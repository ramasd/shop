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

Route::get('/', 'Front\HomeController@index')->name('home');
Route::get('/about', 'Front\HomeController@getAbout')->name('about');
Route::get('/services', 'Front\HomeController@getServices')->name('services');
Route::get('/contact', 'Front\HomeController@getContact')->name('contact');

Route::get('products/{product}', 'Front\ProductController@show')->name('products.show');

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::post('reviews', 'Front\ReviewController@store')->name('reviews.store');

    Route::prefix('admin')->group(function () {
        Route::name('admin.')->group(function () {
            Route::resource('categories', 'Admin\CategoryController');
            Route::resource('products', 'Admin\ProductController')->except('show');
            Route::resource('banners', 'Admin\BannerController');
        });
    });
});
