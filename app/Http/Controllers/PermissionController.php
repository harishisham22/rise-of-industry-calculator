<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        return Permission::all();
    }

    public function updatePermissions(Request $request)
    {
        $user = $request->user_id ? User::find($request->user_id) : auth()->user();

        $user->syncPermissions($request->permissions);

        return $user;
    }
}
