<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;

class CustomResetPassword extends Notification
{
    use Queueable;

    protected string $token;

    /**
     * Create a new notification instance.
     */
    public function __construct(string $token)
    {
        $this->token = $token;
    }

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
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $resetUrl = url(route('password.reset', ['token' => $this->token, 'email' => $notifiable->email], false));

        return (new MailMessage)
            ->subject('Wachtwoord resetten')
            ->greeting('Hallo ' . $notifiable->first_name . ',')
            ->line('Je ontvangt deze e-mail omdat we een wachtwoord reset verzoek hebben ontvangen voor je account.')
            ->action('Reset Wachtwoord', $resetUrl)
            ->line('Deze link verloopt over 60 minuten.')
            ->line('Als je geen wachtwoordreset hebt aangevraagd, hoef je niets te doen.')
            ->salutation('Met vriendelijke groet, ' . config('app.name'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'reset_url' => url(route('password.reset', ['token' => $this->token, 'email' => $notifiable->email], false)),
        ];
    }
}
