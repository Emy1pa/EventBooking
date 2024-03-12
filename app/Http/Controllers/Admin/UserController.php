<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }
    public function update($userId)
{
    $user = User::find($userId);

    if ($user && $user->role !== 'admin') {
        if ($user->is_banned) {
            $user->is_banned = false;
            $user->restore(); 
            $user->events()->restore();
        } else {
            // Ban the user
            $user->is_banned = true;
            $user->delete(); 
            $user->events()->delete();
        }
    }

    return back();
}


}
