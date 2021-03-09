<?php

namespace App\Http\Controllers;

use App\Auction;
use App\Bidding;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BidController extends Controller
{
    public function store(Request $request)
    {
        $id = $request->id;
        $auction = Auction::find($id);
        $bid = $request->bid;
        $price = $auction->current_price;
        if($bid<=$price){
            return back()->with('error_msg', 'The bidding price must be highers than Ksh ' .$price);
        }
        else{
        $data = request()->validate([

            'id'=>'required',
            'bid'=>'required|integer',


        ]);




        auth()->user()->biddings()->create([
            'auction_id'=>$data['id'],
            'amount'=>$data['bid'],


        ]);

            $act=Bidding::where('auction_id', $id)->max('amount');

           // dd($act);
           Auction::where('id', $id)->update([
                'current_price'=>$act,
            ]);
            $highest_bidding = Bidding::where('amount', $act)->first();

            $user= $highest_bidding->user_id;
            $highest_bidder = User::find($user);
           // dd($highest_bidder);


           return back()->with('success_msg', 'Your bid is the highest')->with('highest_bidder', $highest_bidder);

            }

    }

    public function show($id)
    {

       $biddings= Bidding::where('auction_id', $id)->with('user')->orderBy('created_at', 'DESC')->get();

        //dd($biddings);
        return view('admin.viewbiddings')->with('biddings', $biddings);
    }
}
