<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class PasswordForgotController extends Controller
{
    public function create()
    {
        return view('auth.password-forgot');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255'
        ],[
            'email.required' => 'Het e-mailadres is verplicht',
            'email.email' => 'Vul een geldig emailadres in',
            'email.max' => 'Niet meer dan 255 tekens zijn toegestaan'
        ]);
 
        $status = Password::sendResetLink(
            $request->only('email')
        );
     
        return $status === Password::ResetLinkSent
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function token(string $token)
    {
        return view('auth.password-reset', ['token' => $token]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|max:255',
            'password' => 'required|min:8|confirmed',
        ],[
            'email.required' => 'Het e-mailadres is verplicht',
            'email.email' => 'Vul een geldig emailadres in',
            'email.max' => 'Niet meer dan 255 tekens zijn toegestaan',
            'password.required' => 'Het wachtwoord is verplicht',
            'password.confirmed' => 'De twee ingevoerde wachtwoord komen niet overeen',
            'password.min' => 'Het wachtwoord moet minimaal uit 8 tekens bestaan'
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => bcrypt($password)
                ])->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    }
}
