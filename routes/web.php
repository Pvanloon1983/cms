<?php

use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\EmailVerifyController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordForgotController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('home'); })->name('home');
Route::get('/over-ons', function () { return view('about'); })->name('about');
Route::get('/contact', function () { return view('contact'); })->name('contact');

Route::middleware('guest')->group(function () {
    Route::get('/registreren', [RegisterController::class, 'create'])->name('register');
    Route::post('/registreren', [RegisterController::class, 'store'])->name('register');
    
    Route::get('/inloggen', [LoginController::class, 'create'])->name('login');
    Route::post('/inloggen', [LoginController::class, 'store'])->name('login');

    Route::get('/wachtwoord-vergeten', [PasswordForgotController::class, 'create'])->name('password.request');
    Route::post('/wachtwoord-vergeten', [PasswordForgotController::class, 'store'])->name('password.email');
    Route::get('/wachtwoord-reset/{token}', [PasswordForgotController::class, 'token'])->name('password.reset');
    Route::post('/wachtwoord-reset', [PasswordForgotController::class, 'reset'])->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashBoardController::class, 'index'])->middleware('verified')->name('dashboard');
    Route::get('/uitloggen', function () { return redirect()->route('dashboard'); });
    Route::post('/uitloggen', [LoginController::class, 'destroy'])->name('logout');

    Route::get('/email/bevestigen', [EmailVerifyController::class, 'verifynotice'])->name('verification.notice');
    Route::get('/email/bevestigen/{id}/{hash}', [EmailVerifyController::class, 'verifyemail'])->middleware(['signed'])->name('verification.verify');
    Route::post('/email/bevestigings-notificatie', [EmailVerifyController::class, 'verifyhandler'])->middleware(['throttle:6,1'])->name('verification.send');
});