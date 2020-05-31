<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $auctions = DB::table('auctions')->where('user_id', Auth::id())->where('status', 0)->orderBy('created_at', 'DESC')->paginate(2);
        $count = count($auctions);
        return view('admin.dashboard')->with('user', $user)->with('count', $count);
    }
}
