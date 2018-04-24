<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //

    function availProducts()
    {
        $user = Auth::user();
//        $c = Category::all();
        $aProducts = Product::orderBy('created_at','ASC')->get();

        return view('cart', compact('aProducts', 'user'));
    }
}
