<?php

namespace App\Listeners;

use App\Events\PostSaving as PostSavingEvent;
use Illuminate\Support\Str;
use League\CommonMark\MarkdownConverterInterface;

class PostSaving
{
    /**
     * @var MarkdownConverterInterface
     */
    private $markdownConverter;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(MarkdownConverterInterface $markdownConverter)
    {
        $this->markdownConverter = $markdownConverter;
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
        $post->content = $this->markdownConverter->convertToHtml($post->content_md);
        $post->content_plain = strip_tags($post->content);
    }
}
