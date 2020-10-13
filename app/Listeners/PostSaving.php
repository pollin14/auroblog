<?php

namespace App\Listeners;

use App\Events\PostSaving as PostSavingEvent;
use Illuminate\Support\Str;

class PostSaving
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param object $event
     *
     * @return void
     */
    public function handle(PostSavingEvent $event)
    {
        $post = $event->post;
        $post->slug = Str::slug($post->title);
    }
}
