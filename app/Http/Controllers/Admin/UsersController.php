<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();

        return view('admin.pages.users')->with('users', $users);
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
        $view = view( 'admin.tables.users-table')->with('users', $users)->render();

        return response()->json(['view' => $view]);
    }

    public function deleteUser(Request $request)
    {
        if ($request->has('id')) {

            $id = $request->get('id');

            $obj = User::find($id);
            $obj->delete();

            $users = User::orderBy('id', 'desc')->get();
            $view = view('admin.tables.users-table')->with('users', $users)->render();

            return response()->json(['view' => $view]);
        }

        return 'empty';
    }
}
