<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class SignupController extends Controller
{
    public function showRegister(){
        return view('pages.account.register');
    }

    public function postRegister(Request $request){
        $this->validate($request,[
            'full_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'username' => 'required|unique:users,username',
            'mobile' => 'required|min:9',
        ]);

        $user = User::create([
            'full_name' => $request->full_name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'mobile' => $request->mobile,
            'role_id' => 1
        ]);
        session()->flash('success', 'Registered');
    }

}
