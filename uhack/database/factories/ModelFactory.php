<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'username' => $faker->userName,
        'email' => $faker->unique()->safeEmail,
        'acc_no' => $faker->word,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'username' => $faker->word,
    ];
});

$factory->define(App\Transaction::class, function(Faker\Generator $faker){
    static $password;

    return [
        'from_user' => App\User::all()->random()->acc_no,
        'to_user' => App\User::all()->random()->acc_no,
        'transaction_date' => $faker->dateTimeThisYear($max = 'now', $timezone = date_default_timezone_get()),
        'amount' => $faker->numberBetween($min = 100, $max = 20000),
        'description' => $faker->word,
        'autopay' => $faker->numberBetween($min = 0, $max = 1),
    ];
});

