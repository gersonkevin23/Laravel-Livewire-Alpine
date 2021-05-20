<?php

namespace App\Observers;

use App\Models\Notification;
use App\Models\Post;
use App\Models\User;
use App\Notifications\PostCreatedNotification;
use App\Notifications\PostModifiedNotification;

class PostObserver
{

    public function created(Post $post)
    {
        $members = User::role('Member')->get();
        foreach ($members as $member){
            Notification::create([
                'user_id' => $member->id,
                'post_id' => $post->id,
                'message' => 'created',
            ]);
            $member->notify(new PostCreatedNotification($post));
        }
    }

    public function updated(Post $post)
    {
        $members = $post->subscriptions;
        foreach ($members as $member){
            Notification::create([
                'user_id' => $member->id,
                'post_id' => $post->id,
                'message' => 'updated',
            ]);
            $member->user->notify(new PostModifiedNotification($post));
        }
    }

    /**
     * Handle the Post "deleted" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function deleted(Post $post)
    {
        //
    }

    /**
     * Handle the Post "restored" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function restored(Post $post)
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function forceDeleted(Post $post)
    {
        //
    }
}
