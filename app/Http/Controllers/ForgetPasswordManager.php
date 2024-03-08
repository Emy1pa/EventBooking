<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgetPasswordManager extends Controller
{
    public function ForgetPassword(){
        return view("forgetPassword");
    }
    public function forgetPasswordPost(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);
        $token = Str::random(64);
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        Mail::send("emails.forget-password", ['token' => $token], 
        function($message) use($request){
            $message->to($request->email);
            $message->subject("Reset Password");
        });
        return redirect()->to(route("forget.password"))
        ->with('success', 'we have send an email to reset your password');
    }
    public function resetPassword($token){
        return view("new-password", compact('token'));
    }
    public function resetPasswordPost(Request $request){
        $validator = $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);
        $updatePassword = DB::table('password_reset_tokens')
        ->where([
            'email' => $request->email,
            'token' => $request->token
        ])->first(); 
        
        if(!$updatePassword){
            return redirect()->to(route('reset.password', ['token' => $request->token]))
            ->with('error', 'invalid');
        }
       
        User::where('email', $request->email)->update(['password'=> Hash::make($request->password)]);
        DB::table('password_reset_tokens')->where(['email'=>$request->email])->delete();
        return redirect()->to(route("logins"))->with('success', 'password was reseted successfully');
    }
}
