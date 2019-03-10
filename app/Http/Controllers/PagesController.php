<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Color;
use App\StorageCapacity;
use App\Manufacturer;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = array(
            'products' => Product::orderBy('id', 'desc')->take(10)->get(),
            'colors' => Color::orderBy('id', 'desc')->get(),
            //'storage' => StorageCapacity::orderBy('id', 'desc')->get(),
            'manufacturers' => Manufacturer::orderBy('id', 'desc')->get(),
        );

        return view('pages.market.index')->with($data);
    }

    public function cart()
    {

        return view('pages.market.cart');
    }

    public function profile()
    {

        return view('pages.market.profile');
    }

    public function product()
    {

        return view('pages.market.product');
    }

    public function search()
    {
        return view('pages.market.search');
    }
}
