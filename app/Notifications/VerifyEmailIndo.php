<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

class VerifyEmailIndo extends VerifyEmail
{
    use Queueable;

    protected function buildMailMessage($url)
    {
        return (new MailMessage)
            ->subject('Verifikasi Akun NeoAds')
            ->greeting('Halo 👋')
            ->line('Terima kasih telah mendaftar di NeoAds.')
            ->line('Silakan klik tombol di bawah ini untuk memverifikasi email Anda.')
            ->action('Verifikasi Email', $url)
            ->line('Jika Anda tidak merasa mendaftar, abaikan email ini.');
    }
}
