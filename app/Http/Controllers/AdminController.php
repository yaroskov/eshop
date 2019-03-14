<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use App\Manufacturer;
use App\Color;
use App\Section;
use App\Product;

class AdminController extends Controller
{
    protected $tablesPath = 'admin.tables.';

    public function index()
    {
        $data = array(
            'users' => User::orderBy('id', 'desc')->get(),
            'manufacturers' => Manufacturer::orderBy('id', 'desc')->get(),
            'colors' => Color::orderBy('id', 'desc')->get(),
            'sections' => Section::orderBy('id', 'desc')->get(),
            'products' => Product::orderBy('id', 'desc')->get(),
        );

        return view('admin.index')->with($data);
    }

    public function addSection(Request $request)
    {
        if ($request->has('data') && $request->has('sectionId')) {

            $section = new Section();
            $section->section_id = $request->get('sectionId');
            $section->value = $request->get('data');
            $section->save();

            $sections = Section::orderBy('id', 'desc')->get();
            $view = view($this->tablesPath . 'sections-table')->with('sections', $sections)->render();

            return response()->json(['view' => $view]);
        }

        return 'empty';
    }

    public function deleteSection(Request $request)
    {
        if ($request->has('id')) {

            $id = $request->get('id');

            $obj = Section::find($id);
            $obj->delete();

            $sections = Section::orderBy('id', 'desc')->get();
            $view = view($this->tablesPath . 'sections-table')->with('sections', $sections)->render();

            return response()->json(['view' => $view]);
        }

        return 'empty';
    }

    public function addColor(Request $request)
    {
        if ($request->has('data')) {

            $data = $request->get('data');

            $clr = new Color();
            $clr->color = $data;
            $clr->save();

            $colors = Color::orderBy('id', 'desc')->get();
            $view = view($this->tablesPath . 'colors-table')->with('colors', $colors)->render();

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
            $view = view($this->tablesPath . 'colors-table')->with('colors', $manufacturers)->render();

            return response()->json(['view' => $view]);
        }

        return 'empty';
    }

    public function addManufacturer(Request $request)
    {
        if ($request->has('data')) {

            $data = $request->get('data');

            $man = new Manufacturer();
            $man->name = $data;
            $man->save();

            $manufacturers = Manufacturer::orderBy('id', 'desc')->get();
            $view = view($this->tablesPath . 'data-table')->with('manufacturers', $manufacturers)->render();

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
            $view = view($this->tablesPath . 'data-table')->with('manufacturers', $manufacturers)->render();

            return response()->json(['view' => $view]);
        }

        return 'empty';
    }

    public function registerUser(Request $request)
    {
        $name = $request->get('name');
        $email = $request->get('email');
        $password = $request->get('password');
        $password = Hash::make($password);
        $userType = $request->get('userType');
        $userType = $userType == 'admin' ? 1 : 0;

        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        $user->is_admin = $userType;
        $user->save();

        $users = User::orderBy('id', 'desc')->get();
        $view = view($this->tablesPath . 'users-table')->with('users', $users)->render();

        return response()->json(['view' => $view]);
    }

    public function deleteUser(Request $request)
    {
        if ($request->has('id')) {

            $id = $request->get('id');

            $obj = User::find($id);
            $obj->delete();

            $users = User::orderBy('id', 'desc')->get();
            $view = view($this->tablesPath . 'users-table')->with('users', $users)->render();

            return response()->json(['view' => $view]);
        }

        return 'empty';
    }
}
