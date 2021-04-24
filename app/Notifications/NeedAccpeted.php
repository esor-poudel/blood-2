<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NeedAccpeted extends Notification
{
    use Queueable;
    public $donars;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($donar)
    {
        $this->donars= $donar;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->greeting('Hello From Easy Blood Portal')
                    ->line('your blood need is accepted.')
                    ->action('View Donar',url('/'))
                    ->line('Thank you for using our application!');
    }

   
}
