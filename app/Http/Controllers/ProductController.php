<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function allProducts()
    {
        $products = Product::paginate(6);

        return view('products', compact('products'));
    }

}
