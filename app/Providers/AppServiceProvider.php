<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage)
            ->subject('Verifieer je e-mailadres')
            ->view('emails.custom_verify_email', [
                'url' => $url,
                'first_name' => $notifiable->first_name
            ]);
        });

        ResetPassword::toMailUsing(function (object $notifiable, string $token) {
            $resetUrl = url(config('app.url') . route('password.reset', ['token' => $token, 'email' => $notifiable->email], false));

            return (new MailMessage)
                ->subject('Wachtwoord reset aanvragen')
                ->view('emails.custom_reset_password', [
                    'url' => $resetUrl,
                    'first_name' => $notifiable->first_name
                ]);
        });
    }
}
