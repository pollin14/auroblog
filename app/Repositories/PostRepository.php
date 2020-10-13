<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Contracts\Pagination\Paginator;

class PostRepository
{
    /**
     * @var Post
     */
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function paginate(): Paginator
    {
        return $this->post
            ->newQuery()
            ->orderBy('created_at', 'DESC')
            ->paginate();
    }
}
