<?php

namespace Tests\Browser;

use App\Models\Post;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class HighlightPostTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testHighlight()
    {

        factory(Post::class)->create([
            'title' => 'How to test with dusk',
            'content_md' => '
```javascript
function f(){
    console.log(\'f\');
}
```
            ',
        ]);

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('Auroblog')
                ->clickLink('How to test with dusk')
                ->assertSee('How to test with dusk')
                ->with('pre.language-javascript', function (Browser $code) {
                    $code->assertSeeIn('.token.keyword', 'function')
                        ->assertSeeIn('.token.function', 'f')
                        ->assertSeeIn('.token.string', 'f');
                })
                ->screenshot('vue highlight syntax');
        });
    }
}
