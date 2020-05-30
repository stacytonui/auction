<?php

namespace App\Http\Controllers;

use App\Auction;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Image;

class AuctionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories= Category::all();
        return view('admin.post')->with('categories', $categories);
    }

    public function store(Request $request)
    {
        //dd($request);
       $data = request()->validate([
           'name'=>'required',
           'category_id'=>'required',
           'location'=>'required',
           'building'=>'required',
           'date'=>'required',
           'time'=>'required',
           'image'=>['required','image'],
       ]);
        $imagePath= request('image')->store('uploads', 'public');


       auth()->user()->auctions()->create([
           'name'=>$data['name'],
           'category_id'=>$data['category_id'],
           'location'=>$data['location'],
           'building'=>$data['building'],
           'date'=>$data['date'],
           'time'=>$data['time'],
           'image'=>$imagePath,

       ]);


            return back()->with('success_msg', 'Your Auction has been posted');


    }
    public function show($id)
    {
        //$auctions = Auction::where('user_id', Auth::id());
        $auctions = DB::table('auctions')->where('user_id', Auth::id())->where('status', 0)->orderBy('created_at', 'DESC')->paginate(2);
        $count = count($auctions);
        //dd($auctions);
        return view('admin.auctions')->with('auctions', $auctions)->with('count', $count);
    }

    public function destroy($id)
    {
        $auction = Auction::find($id);

        $auction->status = 1;

        $auction->save();

        return back()->with('success_msg', 'Auction Removed');
    }



}
