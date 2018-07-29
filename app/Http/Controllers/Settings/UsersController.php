<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name')->paginate();
        return view('settings.users.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('settings.users.show', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->only(['name']);
        $user->update($data);

        return response()->json(route('users.show', $user));
    }

    /**
     * @param User $user
     * @author sunxyw <xy2496419818@gmail.com>
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(route('users.index'));
    }
}
