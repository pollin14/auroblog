<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {

    $title = implode(' ', [
        $faker->title,
        $faker->name,
        $faker->lastName,
    ]);

    $content = $faker->text(1000);

    return [
        'title' => $title,
        'content' => $content,
        'created_at' => Carbon::now()->subDays(rand(0, 32)),
    ];
});
