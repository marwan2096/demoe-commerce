<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LoginNotification extends Notification
{
    use Queueable;
    public $message;
    public $subject;
    public $fromemail;
    public $mailler;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        $this->message="You just Logged in";
        $this->subject="new logging in";
        $this->fromemail="marwan2096mr7@gmail.com";
        $this->mailler='smtp';
      
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
        return (new MailMessage)
        ->mailer('smtp')
        ->subject($this->subject)
        ->greeting('welcome',$notifiable->first_name)
        ->line($this->message)
        ;
               
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}