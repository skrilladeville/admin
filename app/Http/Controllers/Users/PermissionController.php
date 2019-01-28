<?php

namespace App\Http\Controllers\Users;

use App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    public function getAdminPermission()
    {
        $permissions = Role::findById(1);
        $permissions->load('permissions');

        return $permissions;
    }

    public function getBranchAdminPermission()
    {
        $permissions = Role::findById(2);
        $permissions->load('permissions');

        return $permissions;
    }

    public function getDoctorPermission()
    {
        $permissions = Role::findById(3);
        $permissions->load('permissions');

        return $permissions;
    }

    public function getPatientPermission()
    {
        $permissions = Role::findById(4);
        $permissions->load('permissions');

        return $permissions;
    }

    public function store(Request $request)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
