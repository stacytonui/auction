<?php

namespace App\Http\Controllers;

use App\Auction;
use App\Category;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index()
    {
        $auctions = DB::table('auctions')->where('status', 0)->orderBy('created_at', 'DESC')->paginate(6);

        $categories = Category::all();


        return view('welcome')->with('auctions', $auctions)
                                    ->with('categories', $categories);

    }

    public function show($id)
    {
        $auction = Auction::findOrFail($id);

        $user_id =$auction->user_id;
        $user = User::findOrFail($user_id);
        $categories = Category::all();

        return view ('pages.single')->with('auction', $auction)->with('user', $user)->with('categories', $categories);
    }

    public function search(Request $request)
    {
        $id = $request->category;
        //dd($id);
        $auctions =   DB::table('auctions')->where('category_id', $id)->where('status', 0)->orderBy('created_at', 'DESC')->paginate(6);
        $categories = Category::all();
        //dd($request);

        return view('pages.category')->with('auctions', $auctions)
            ->with('categories', $categories);
    }
}
