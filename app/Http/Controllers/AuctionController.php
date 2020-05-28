<?php

namespace App\Http\Controllers;

use App\Auction;
use App\Category;
use Illuminate\Http\Request;
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
           'date'=>'required',
           'time'=>'required',
           'image'=>['required','image'],
       ]);
        $image= request('image')->store('uploads', 'public');

        $image= Image::make(public_path("storage/$image"))->fit(1700,1200);
        $image->save;
       auth()->user()->auctions()->create([
           'name'=>$data['name'],
           'category_id'=>$data['category_id'],
           'location'=>$data['location'],
           'date'=>$data['date'],
           'time'=>$data['time'],
           'image'=>$image,

       ]);


            return back()->with('success_msg', 'Your Auction has been posted');


    }
}
