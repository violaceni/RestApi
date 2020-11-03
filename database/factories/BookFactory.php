<?php

use Faker\Generator as Faker;

$factory->define(App\Book::class, function (Faker $faker) {
    return [
        'title' => $this->faker->sentence,
        'author_fullname'=> $this->faker->firstName().' '.$this->faker->lastName(),
        'published_date' => $this->faker->date,
        'description' => $this->faker->paragraph
    ];
});
