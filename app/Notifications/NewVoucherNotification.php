<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;

class NewVoucherNotification extends Notification
{
    use Queueable;
    public $voucher;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($voucher)
    {
        $this->voucher = $voucher;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('🎁 Dein Gutschein ist hier!')
            ->salutation('Mit besten Grüßen')
            ->line('Deine Gutscheinbestellung im Wert von ' . $this->voucher->value . ' EUR wurde bearbeitet.')
            ->action('Gutschein anzeigen', URL::signedRoute('public.voucher', ['voucher' => $this->voucher->id]))
            ->line('Dein Gutscheincode lautet ' . $this->voucher->code)
            ->line('Bitte speichere ihn gut ab!')
            ->greeting('Guten Tag,');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
