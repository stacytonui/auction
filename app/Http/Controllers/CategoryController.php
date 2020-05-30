<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function show($id)
    {
        $auctions = DB::table('auctions')->where('status', 0)->where('category_id', $id)->orderBy('created_at', 'DESC')->paginate(6);
        $category = Category::find($id);
        //dd($category);
        $categories = Category::all();

        return view('pages.category')->with('auctions', $auctions)
                                            ->with('categories', $categories)->with('category', $category);
    }
}
