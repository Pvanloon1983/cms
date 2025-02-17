<?php

use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordForgotController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/over-ons', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::middleware('guest')->group(function () {
    Route::get('/registreren', [RegisterController::class, 'create'])->name('register');
    Route::post('/registreren', [RegisterController::class, 'store']);
    
    Route::get('/inloggen', [LoginController::class, 'create'])->name('login');
    Route::post('/inloggen', [LoginController::class, 'store'])->name('login');

    Route::get('/wachtwoord-vergeten', [PasswordForgotController::class, 'create'])->name('password.request');
    Route::post('/wachtwoord-vergeten', [PasswordForgotController::class, 'store'])->name('password.email');
    Route::get('/wachtwoord-reset/{token}', [PasswordForgotController::class, 'token'])->name('password.reset');
    Route::post('/wachtwoord-reset', [PasswordForgotController::class, 'reset'])->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashBoardController::class, 'index'])->name('dashboard');
    Route::get('/uitloggen', function () { return redirect()->route('dashboard'); });
    Route::post('/uitloggen', [LoginController::class, 'destroy'])->name('logout');
});
