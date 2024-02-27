<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login', [
            'title' => 'Login Form'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials =  $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8', 'max:255']
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return redirect()->intended('dashboard/posts');
        }

        return back()->with('loginFailed', 'Login Failed !');
    }
}
