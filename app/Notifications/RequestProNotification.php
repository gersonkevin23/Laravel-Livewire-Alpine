<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RequestProNotification extends Notification
{
    use Queueable;
    public $user;
    public function __construct($user)
    {
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('User '.$this->user->name.' has requested the pro access for their account click on bellow button to change user details')
                    ->action('Modify user', route('admin-add-user',['user_id'=>$this->user->id]));
    }


    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
