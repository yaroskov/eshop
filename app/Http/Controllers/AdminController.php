<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use App\Manufacturer;
use App\Color;

class AdminController extends Controller
{
    public function index()
    {
        $data = array(
            'users' => User::orderBy('id', 'desc')->get(),
            'manufacturers' => Manufacturer::orderBy('id', 'desc')->get(),
            'colors' => Color::orderBy('id', 'desc')->get(),
        );

        return view('pages.admin.index')->with($data);
    }

    public function addManufacturer(Request $request)
    {
        if ($request->has('data')) {

            $data = $request->get('data');

            $man = new Manufacturer();
            $man->name = $data;
            $man->save();

            $manufacturers = Manufacturer::orderBy('id', 'desc')->get();
            $view = view('pages.admin.data-table')->with('manufacturers', $manufacturers)->render();

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
            $view = view('pages.admin.data-table')->with('manufacturers', $manufacturers)->render();

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
        $view = view('pages.admin.users-table')->with('users', $users)->render();

        return response()->json(['view' => $view]);
    }

    public function deleteUser(Request $request)
    {
        if ($request->has('id')) {

            $id = $request->get('id');

            $man = User::find($id);
            $man->delete();

            $users = User::orderBy('id', 'desc')->get();
            $view = view('pages.admin.users-table')->with('users', $users)->render();

            return response()->json(['view' => $view]);
        }

        return 'empty';
    }
}
