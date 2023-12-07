<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;

class registerController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function registeruser(Request $request){
        User::create([
            'name' =>$request->name,
            'email' =>$request->email,
            'password' =>bcrypt($request->password),
            'remember_token' =>Str::random(60),
        ]);
        return redirect('/login');
    }

}
