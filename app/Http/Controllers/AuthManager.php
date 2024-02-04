<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthManager extends Controller {
    function login(Request $request) {
        if ($request->isMethod('post')) {
            $request->validate([
                'email' => 'required',
                'password' => 'required'
            ]);

            $credential = $request->only('email', 'password');
            if (Auth::attempt($credential)) {
                return redirect()->intended(route('welcome'));
            } else {
                return redirect()->intended(route('login'))->with('error', 'Login details are not valid.');
            }
        } else {
            if (Auth::check()) {
                return redirect()->intended(route('welcome'));
            }
            return view('login');
        }
    }


    function registration(Request $request) {
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required'
            ]);

            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ];

            $user = User::create($data);
            if (!$user) {
                return redirect()->intended(route('registration'))->with('error', 'Registration Failed, Try Again Later.');
            } else {
                return redirect()->intended(route('login'))->with('success', 'Registration Success.');
            }
        } else {
            if (Auth::check()) {
                return redirect()->intended(route('welcome'));
            }
            return view('registration');
        }
    }

    function logout() {
        session()->flush();
        Auth::logout();
        return redirect()->intended(route('login'));
    }
}
