<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use App\User;

class UserController extends Controller
{
    public function show(Request $request)
    {
        return $request->user();
    }

    public function viewAll(Request $request)
    {
        $users = User::paginate(10);
        //$users = User::all();
        return $users;
    }

    public function updateProfile(Request $request)
    {
        $rules = [
            'name'  => 'required',
            'email' => 'required|email|',
        ];

        $this->validate($request, $rules);

        $user = $request->user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return response()->json(compact('user'));
    }

    public function updatePassword(Request $request)
    {
        $rules = [
            'new_password'         => 'required',
            'confirm_new_password' => 'required|same:new_password'
        ];

        $this->validate($request, $rules);

        $user = $request->user();
        $user->password = bcrypt($request->input('new_password'));
        $user->saveOrFail();

        return response()->json(compact('user'));
    }
}
