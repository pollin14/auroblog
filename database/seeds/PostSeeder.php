<?php
declare(strict_types=1);

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run()
    {
        factory(Post::class)->create([
            'content_md' => '
            This is my first javascript function:

```javascript

function f() {
    console.log(\'the f function\');
}
```

```php

function f() {
    return 1;
}
```


```css

.app {
   background-color: #FFFFFF;
}
```
            ',
            'created_at' => Carbon::now(),
        ]);
        factory(Post::class, 50)->create();
    }
}
