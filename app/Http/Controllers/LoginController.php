<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function index() 
    {
        return view('login.index', [
            "title" => "Login Page"
        ]);
    }

    function login(Request $request) 
    {
        $validateData = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Email tidak boleh kosong!',
            'password.required' => 'Password tidak boleh kosong!'
        ]);

        if (auth()->attempt($validateData)) {
            $request->session()->regenerate();
            return redirect('/student/all');
        }

        return back()->with('loginError', 'Login failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/student/all')->with('success', 'Anda berhasil logout');
    }
}
