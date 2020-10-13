<?php
declare(strict_types=1);

namespace Tests\Unit\Listeners;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostSavingTest extends TestCase
{
    use RefreshDatabase;

    public function testHandle()
    {
        $post = new Post();
        $post->title = 'How to create an Unit Test';
        $post->content_md = "# First title\n## Second title";

        $post->save();

        $this->assertEquals($post->content, "<h1>First title</h1>\n<h2>Second title</h2>\n");
        $this->assertEquals($post->content_plain, "First title\nSecond title\n");
        $this->assertEquals($post->slug, "how-to-create-an-unit-test");
    }
}
