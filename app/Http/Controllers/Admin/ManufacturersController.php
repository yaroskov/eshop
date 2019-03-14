<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Manufacturer;

class ManufacturersController extends Controller
{
    public function index()
    {
        $manufacturers = Manufacturer::orderBy('id', 'desc')->get();

        return view('admin.pages.manufacturers')->with('manufacturers', $manufacturers);
    }

    public function addManufacturer(Request $request)
    {
        if ($request->has('data')) {

            $data = $request->get('data');

            $man = new Manufacturer();
            $man->name = $data;
            $man->save();

            $manufacturers = Manufacturer::orderBy('id', 'desc')->get();
            $view = view('admin.pages.data-table')->with('manufacturers', $manufacturers)->render();

            return response()->json(['data' => $data, 'view' => $view]);
        }

        return 'empty';
    }

    public function deleteManufacturer(Request $request)
    {
        if ($request->has('id')) {

            $id = $request->get('id');

            $man = Manufacturer::find($id);
            $man->delete();

            $manufacturers = Manufacturer::orderBy('id', 'desc')->get();
            $view = view('admin.pages.data-table')->with('manufacturers', $manufacturers)->render();

            return response()->json(['view' => $view]);
        }

        return 'empty';
    }
}
