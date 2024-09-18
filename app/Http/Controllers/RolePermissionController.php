<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::all();
        $permissions = Permission::all();
        $selectedRole = $request->role ? Role::find($request->role) : null;

        return view('role_permission.index', [
            'roles' => $roles,
            'permissions' => $permissions,
            'selectedRole' => $selectedRole
        ]);
    }

    public function update(Request $request, Role $role)
    {
        $role->permissions()->sync($request->permissions);
        return redirect()->back()->with('success', 'Permissions updated successfully');
    }
}
