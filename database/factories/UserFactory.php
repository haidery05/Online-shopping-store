<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'gender' => $faker->gender,
        'role' => $faker->role,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Product::class, function (Faker $faker) {
    static $password;
    return [
        'title' => $faker->sentence,
        'price' => $faker->unique()->safeEmail,
        'size'  => $faker->random_int(1, 2),
        'color' => $faker->sentence,
        'user_id' => $faker->random_int(1, 2),
    ];
});

$factory->define(App\Video::class, function (Faker $faker) {
    static $password;
    return [
        'user_id' => random_int(1, 2),
        'title' => $faker->sentence,
        'video' => $faker->image,
    ];
});

$factory->define(\App\Comment::class, function (Faker $faker) {
    $text = array('product_type' , 'video_type');

    return [
        'body' => $faker->paragraph,
        'commentable_id' => random_int(1, 5),
        'commentable_type' => $text[random_int(0,1)],
    ];
});