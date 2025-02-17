<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Auth\Notifications\VerifyEmail as BaseVerifyEmail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;

class CustomVerifyEmail extends Notification
{
    use Queueable;

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Bouw de e-mail met een aangepaste verificatie-link.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $verificationUrl = $this->verificationUrl($notifiable);

        return (new MailMessage)
            ->subject('Verifieer je e-mailadres')
            ->greeting('Hallo ' . $notifiable->first_name . ',')
            ->line('Klik op de knop hieronder om je e-mailadres te verifiëren.')
            ->action('Verifieer E-mail', $verificationUrl)
            ->line('Als je je niet hebt geregistreerd, hoef je niets te doen.')
            ->salutation('Met vriendelijke groet, ' . config('app.name'));
    }

    /**
     * Genereer een verificatie-URL.
     */
    protected function verificationUrl($notifiable)
    {
        return URL::temporarySignedRoute(
            'verification.verify', // Dit is de standaard route in Laravel
            Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
            ['id' => $notifiable->getKey(), 'hash' => sha1($notifiable->getEmailForVerification())]
        );
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'verification_url' => $this->verificationUrl($notifiable),
        ];
    }
}
