<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'max:255'],
            'last_name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:8'],
        ],[
            'first_name.required' => 'De voornaam is verplicht',
            'first_name.max' => 'Niet meer dan 255 tekens zijn toegestaan',
            'last_name.required' => 'De achternaam is verplicht',
            'last_name.max' => 'Niet meer dan 255 tekens zijn toegestaan',
            'email.required' => 'Het e-mailadres is verplicht',
            'email.email' => 'Vul een geldig emailadres in',
            'email.max' => 'Niet meer dan 255 tekens zijn toegestaan',
            'email.unique' => 'Dit e-mailadres is al bekend bij ons',
            'password.required' => 'Het wachtwoord is verplicht',
            'password.confirmed' => 'De twee ingevoerde wachtwoord komen niet overeen',
            'password.min' => 'Het wachtwoord moet minimaal uit 8 tekens bestaan'
        ]);

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // event(new Registered($user));

        // Auth::login($user);

        return redirect(route('login', absolute: false))->with('success', 'U bent succesvol geregistreerd! U kunt nu inloggen.');
    }
}
