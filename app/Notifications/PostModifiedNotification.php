<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PostModifiedNotification extends Notification
{
    use Queueable;

    public $post;

    public function __construct($post)
    {
        $this->post = $post;
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

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('A Post you follow has been modified by ' . $this->post->user->name . '
            The post contains strategies regarding ' . $this->post->pair->name . ' pair.')
            ->line('Click on below link to view post')
            ->action('View Post',route('show-post',$this->post->id));
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
