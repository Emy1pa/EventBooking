<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Symfony\Component\Routing\RequestContext;

class RegisterController extends Controller
{
    public function Store(RegisterRequest $request){
        $incomingFields = $request->validated();

        $incomingFields['password'] = bcrypt($incomingFields['password']);

        $file_extension = $request->image->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = 'images/users';
        $request->image->move($path, $file_name);

        $user = User::create($incomingFields);
        if ($incomingFields['role'] === 'utilisateur') {
            return redirect('/utilisateur/index');
        } elseif ($incomingFields['role'] === 'organisateur') {
            return redirect('/events/index');
        } else if($incomingFields['role'] === 'admin') {
            return redirect('admin/categories/index');

        } else {
            return redirect('/login')->with('error', 'Invalid role');
        }


    }
}
