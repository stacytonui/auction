<?php

use App\Category;
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
Route::patch('/update/{id}', 'AuctionController@update');

Route::get('/dashboard', 'HomeController@index')->name('home');
Route::get('/post_auction', 'AuctionController@index');
Route::post('/store', 'AuctionController@store');
Route::post('/search', 'WelcomeController@search');

Route::get('/my_auctions/{id}', 'AuctionController@show');
Route::get('/remove_auction/{id}', 'AuctionController@destroy');
Route::get('/edit_auction/{id}', function ($id)
{
    $auction = \App\Auction::find($id);
    $categories= Category::all();
    return view('admin.update')->with('id', $id)->with('categories', $categories)->with('auction', $auction);
});

Route::get('/category/{id}', 'CategoryController@show');
Route::get('/auction/{id}', 'WelcomeController@show');

