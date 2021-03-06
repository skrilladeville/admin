<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Spatie\Permission\Models\Role;
use App\User;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        $rules = [
            'email'    => 'required|email',
            'password' => 'required'
        ];

        $this->validate($request, $rules);
        $credentials = $request->only('email', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Invalid login credential'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'Could not create token'], 500);
        }

        //$role = Role::findById(1);
        //$role->load('permissions');

        $user = $request->user();

        return response()->json(compact('token', 'user'));

        //return response()->json(compact('token', 'role'));
    }

    public function getUser(Request $request){
        $user=$request->user();
        return $user; 
    }
}
