<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgetPasswordManager extends Controller {
    function forgetPassword(Request $request) {
        if ($request->isMethod('post')) {
            $request->validate([
                'email' => 'required|email|exists:users'
            ]);
            $token = Str::random(64);

            DB::table('password_reset_tokens')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);

            Mail::send("emails.forget-password", ['token' => $token], function ($message) use ($request) {
                $message->to($request->email);
                $message->subject('Reset Password');
            });

            return redirect()->to(route('forget-password'))->with("success", "We have send the reset link to your email.");
        } else {

            return view('forget-password');
        }
    }

    function resetPassword($token) {
        return view('new-password', compact("token"));
    }

    function newPassword(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_reset_tokens')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])->first();

        if (!$updatePassword) {
            return redirect()->to(route('new-password'))->with("error", "Invalid details found.");
        }

        User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);

        DB::table('password_reset_tokens')->where(['email'=> $request->email])->delete();

        return redirect()->to(route('login'))->with("success", "Password Reset Successfully.");

    }
}
