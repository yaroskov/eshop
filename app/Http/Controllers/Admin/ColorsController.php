<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Color;

class ColorsController extends Controller
{
    public function index()
    {
        $colors = Color::orderBy('id', 'desc')->get();

        return view('admin.pages.colors')->with('colors', $colors);
    }

    public function addColor(Request $request)
    {
        if ($request->has('data')) {

            $data = $request->get('data');

            $clr = new Color();
            $clr->color = $data;
            $clr->save();

            $colors = Color::orderBy('id', 'desc')->get();
            $view = view('admin.pages.colors-table')->with('colors', $colors)->render();

            return response()->json(['view' => $view]);
        }

        return 'empty';
    }

    public function deleteColor(Request $request)
    {
        if ($request->has('id')) {

            $id = $request->get('id');

            $man = Color::find($id);
            $man->delete();

            $manufacturers = Color::orderBy('id', 'desc')->get();
            $view = view('admin.pages.colors-table')->with('colors', $manufacturers)->render();

            return response()->json(['view' => $view]);
        }

        return 'empty';
    }
}
