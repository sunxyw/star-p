<?php

namespace App\Http\Controllers;

use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name')->paginate();
        return view('settings.users.index', compact('users'));
    }

    public function show(User $user)
    {
        return view()
    }
}
