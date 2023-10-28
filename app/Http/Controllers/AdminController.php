<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $users = User::with('roles.permissions', 'role')->get();
        $roles = Role::with('permissions')->get();

        return Inertia::render('Admin/Users/Main', [
            'users' => $users,
            'roles' => $roles
        ]);
    }

    /**
     * Update the list of user's roles.
     */
    public function updateRole(Request $request)
    {
        $user = User::find($request->user['id']);
        $role = Role::find($request->role['id']);

        if ($user->roles->contains($role)) {
            $user->roles()->detach($role);
        } else {
            $user->roles()->attach($role);
        }
    }

    /**
     * Update the list of role's permissions.
     */
    public function updatePermission(Request $request)
    {
        $role = Role::find($request->role['id']);
        $permission = Permission::find($request->permission['id']);

        if ($role->permissions->contains($permission)) {
            $role->permissions()->detach($permission);
        } else {
            $role->permissions()->attach($permission);
        }
    }
}
