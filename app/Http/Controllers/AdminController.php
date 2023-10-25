<?php

namespace App\Http\Controllers;

use App\Models\Item;
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
        $users = User::with('role.permissions')->get();
        $roles = Role::with('permissions')->get();

        return Inertia::render('Admin/Users/Main', [
            'users' => $users,
            'roles' => $roles
        ]);
    }


//    public function addRole(Role $role, User $user)
//    {
//        $user->roles()->attach($role->id);
//    }
}
