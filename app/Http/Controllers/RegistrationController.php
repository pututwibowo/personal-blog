<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('registration');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:256',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6|max:256'

        ]);


        $validateData['password'] = Hash::make($validateData['password']);
        User::create($validateData);

        return redirect('/login')->with('success', 'Registration successful! Please Login');
    }
}
