<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function show()
    {
        return view('login');
    }

    public function login(LoginRequest $request)
    {
    $incomingFields = $request->validated();

    if (auth()->attempt(['email' => $incomingFields['loginemail'], 'password' => $incomingFields['loginpassword']])) {
        $request->session()->regenerate();

        // Access the authenticated user using auth() helper
        $user = auth()->user();

        if ($user->role === 'utilisateur') {
            return redirect('/utilisateur/index');
        } elseif ($user->role === 'organisateur') {
            return redirect('/events/index');
        } elseif ($user->role === 'admin') {
            return redirect('admin/categories/index');
        } else {
            auth()->logout();
            return redirect('/login')->with('error', 'Invalid role');
        }
    } else {
        return back()->withErrors(['login' => 'Invalid login credentials']);
    }
}
    public function logout()

    {
        auth()->logout();
        return redirect('/login');
    }
}