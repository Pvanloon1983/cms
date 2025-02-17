<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function create()
    {
        return view('login');
    }

    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'max:255'],
        ], [
            'email.required' => 'Het e-mailadres is verplicht',
            'email.email' => 'Vul een geldig emailadres in',
            'email.max' => 'Niet meer dan 255 tekens zijn toegestaan',
            'password.required' => 'Het wachtwoord is verplicht',
            'password.max' => 'Niet meer dan 255 tekens zijn toegestaan'
        ]);

        // Attempt to log in the user
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Regenerate session to prevent session fixation attacks
            $request->session()->regenerate();

            return redirect()->route('dashboard')->with('success', 'U bent succesvol ingelogd.');
        }

        // If authentication fails, redirect back with an error message
        return back()->withErrors([
            'email' => 'De inloggegevens komen niet overeen',
        ])->onlyInput('email');
    }

    public function destroy(Request $request)
    {
        Auth::logout(); // Log de gebruiker uit

        $request->session()->invalidate(); // Ongeldig maken van de sessie
        $request->session()->regenerateToken(); // Voorkomen van CSRF-aanvallen
    
        return redirect()->route('login')->with('success', 'U bent succesvol uitgelogd.');
    }
}
