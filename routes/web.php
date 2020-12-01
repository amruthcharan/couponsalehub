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

Route::get('/categories', 'CategoriesPageController')->name('categories');

Route::get('/guides', 'GuidesController')->name('guides');

Route::get('/offers-and-reviews', 'ReviewsController')->name('reviews');

Route::get('/contact-us', 'ContactController@show')->name('contact');

Route::post('/contact', 'ContactController@submit')->name('submit-contact');

Route::get('/search', 'SearchController@search')->name('search');

Route::resource('/headings', 'HeadingsController');

Route::get('/{page}', 'PageController')->name('page');


