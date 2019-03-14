<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();

        return view('admin.pages.products')->with('products', $products);
    }
}
