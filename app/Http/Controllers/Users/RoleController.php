<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function show(Request $request)
    {
        return $request->user();
    }

    public function createRole(Request $request)
    {
        $rules = [
            'name'  => 'required'
        ];

        // $this->validate($request, $rules);

        $role = Role::create(['name' => $request->data['title']]);

        return response()->json(compact('role'));
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
