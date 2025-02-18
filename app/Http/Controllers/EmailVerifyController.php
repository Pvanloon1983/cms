<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class EmailVerifyController extends Controller
{
    public function verifynotice()
    {
        return view('auth.verify-email');
    }

    public function verifyemail (EmailVerificationRequest $request) {
        $request->fulfill();     
        return redirect()->route('dashboard')->with('success', 'E-mailverificatie is gelukt!');
    }

    public function verifyHandler(Request $request) {
        if ($request->user()->hasVerifiedEmail()) {
            return back()->with('success', 'Je e-mail is al geverifieerd. Navigeer naar het dashboard');
        }
    
        $request->user()->sendEmailVerificationNotification();     
    
        return back()->with('resent', 'Verificatielink is verzonden!');
    }
}
