<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Manufacturer;

class AdminController extends Controller
{
    public function index()
    {
        $data = array(
            'users' => User::orderBy('id', 'desc')->get(),
            'manufacturers' => Manufacturer::orderBy('id', 'desc')->get()
        );

        return view('pages.admin.index')->with($data);
    }

    public function addManufacturer()
    {

        return 'empty';
    }
}
