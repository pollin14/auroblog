<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use Carbon\Carbon;
use DavidBadura\FakerMarkdownGenerator\FakerProvider;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $faker->addProvider(new FakerProvider($faker));

    $title = implode(' ', [
        $faker->title,
        $faker->name,
        $faker->lastName,
    ]);

    $mdContent = $faker->markdown();

    return [
        'title' => $title,
        'content_md' => $mdContent,
        'created_at' => Carbon::now()->subDays(rand(0, 32)),
    ];
});
