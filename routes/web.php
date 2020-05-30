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

Route::get('/', 'WelcomeController@index');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');
Route::get('/post_auction', 'AuctionController@index');
Route::post('/store', 'AuctionController@store');
Route::post('/search', 'WelcomeController@search');

Route::get('/my_auctions/{id}', 'AuctionController@show');
Route::get('/remove_auction/{id}', 'AuctionController@destroy');
Route::get('/category/{id}', 'CategoryController@show');
Route::get('/auction/{id}', 'WelcomeController@show');
