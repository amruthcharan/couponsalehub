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



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/', 'HomeController')->name('home');
Route::resource('/headings', 'HeadingsController');
Route::resource('/faqs', 'FaqsController');
Route::resource('/h3', 'Heading3Controller');
Route::get('/store/publish/{id}', 'StoreController@publish');
Route::get('/store/home/{id}', 'StoreController@home');
Route::get('/coupon/editor/{id}', 'CouponController@editor');
Route::get('/posts/featured/{id}', 'StoreController@featured');
Route::get('/{test}/{test2}', 'PageController')->middleware('redirectIfPossible');


    Route::get('/categories', 'CategoriesPageController')->name('categories');

    Route::get('/guides', 'GuidesController')->name('guides');

    Route::get('/offers-and-reviews', 'ReviewsController')->name('reviews');

    Route::get('/contact-us', 'ContactController@show')->name('contact');

    Route::get('/search', 'SearchController@search')->name('search');

    Route::get('/{page}', 'PageController')->name('page');


Route::post('/contact', 'ContactController@submit')->name('submit-contact');

