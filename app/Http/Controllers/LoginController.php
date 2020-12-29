<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;

class LoginController extends Controller
{
    public function index()
    {
        return view ('auth.login');
    }

    public function postsignin(Request $r){
        if (!\Auth::attempt(['username' => $r->username, 'password' => $r->password])){
            return redirect()->back();
        } 
        
        return redirect()->route('dashboard');
    }
}
