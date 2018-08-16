<?php

use Faker\Generator as Faker;

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Chat\Message::class, function (Faker $faker) {
    return [
			'body'		=>	$faker->sentence(5),
			'user_id'	=>	function () {
				return factory(App\Models\User::class)->create()->id;
			}
    ];
});
