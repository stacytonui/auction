<?php

use App\Category;
use Illuminate\Support\Facades\DB;
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

Route::get('/dashboard', 'HomeController@index')->name('home')->middleware('is_auctioneer');

Auth::routes();
Route::patch('/update/{id}', 'AuctionController@update');
Route::patch('/update_profile/{id}', 'UserController@update');

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

Route::get('/edit_profile/{id}', function ($id)
{
    $user = \App\User::find($id);
    $categories= Category::all();
    return view('admin.editprofile')->with('user', $user)->with('categories', $categories);
});

Route::get('/category/{id}', 'CategoryController@show');
Route::get('/all', function ()
{
    $auctions = DB::table('auctions')->where('status', 0)->orderBy('created_at', 'DESC')->paginate(6);

    $categories = Category::all();

    return view('pages.all')->with('auctions', $auctions)
        ->with('categories', $categories);
});

Route::get('/auction/{id}', 'WelcomeController@show');
Route::get('/back', function ()
{
   return back();
});

Route::post('/place_bid', 'BidController@store');
Route::get('/view_biddings/{id}', 'BidController@show');


