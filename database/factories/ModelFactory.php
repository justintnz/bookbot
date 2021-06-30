<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => true,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'last_login_at' => $faker->dateTime,
        
    ];
});/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Service::class, static function (Faker\Generator $faker) {
    return [
        'code' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'description' => $faker->text(),
        'image' => $faker->text(),
        'name' => $faker->firstName,
        'status' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        'data' => ['en' => $faker->sentence],
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Customer::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'email' => $faker->email,
        'name' => $faker->firstName,
        'phone' => $faker->sentence,
        'status' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        'data' => ['en' => $faker->sentence],
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Location::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'name' => $faker->firstName,
        'updated_at' => $faker->dateTime,
        
        'data' => ['en' => $faker->sentence],
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Staff::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'name' => $faker->firstName,
        'phone' => $faker->sentence,
        'status' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        'data' => ['en' => $faker->sentence],
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Booking::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'customer_id' => $faker->sentence,
        'end_at' => $faker->dateTime,
        'location_id' => $faker->sentence,
        'note' => $faker->sentence,
        'service_id' => $faker->sentence,
        'staff_id' => $faker->sentence,
        'start_at' => $faker->dateTime,
        'status' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Job::class, static function (Faker\Generator $faker) {
    return [
        'booking_id' => $faker->sentence,
        'charge' => $faker->randomFloat,
        'created_at' => $faker->dateTime,
        'customer_id' => $faker->sentence,
        'end_at' => $faker->dateTime,
        'location_id' => $faker->sentence,
        'service_id' => $faker->sentence,
        'staff_id' => $faker->sentence,
        'start_at' => $faker->dateTime,
        'status' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        'data' => ['en' => $faker->sentence],
        
    ];
});
