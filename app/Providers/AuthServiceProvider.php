use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

public function boot()
{
    VerifyEmail::toMailUsing(function ($notifiable, $url) {
        return (new MailMessage)
            ->subject('Verifikasi Akun NeoAds')
            ->greeting('Halo 👋')
            ->line('Terima kasih telah mendaftar di NeoAds.')
            ->line('Silakan klik tombol di bawah ini untuk memverifikasi email Anda.')
            ->action('Verifikasi Email', $url)
            ->line('Jika Anda tidak merasa mendaftar, abaikan email ini.');
    });
}
