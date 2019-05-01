<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SigningController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showLogin(){
        return view('pages.account.login');
    }

    public function postLogin(Request $request){

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        if(Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ], $request->has('remember')))
        {
            return redirect('/user/dashboard');
        }
        session()->flash('danger', 'Authentication failed! Try again');
        return redirect()->back();
    }
}
