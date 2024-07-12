<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function form()
    {
        $title = "Login Admin";
        return view('auth.login', compact('title'));
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $request->merge(['is_active' => 1]);
        $credentials = $request->only('email', 'password', 'is_active');
        if (auth()->attempt($credentials)) {
            if (auth()->user()->role == 1) {
                return redirect()->route('admin.index')->with('success', 'Logged in success');

            } else {
                auth()->logout();
                return redirect()->route('auth.login')->with('error', 'You are not admin');
            }
        }
        return redirect()->back()->with('error', 'Wrong password or email or Account don\'t active');

    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('auth.login')->with('success', 'Logout success');
    }

}
