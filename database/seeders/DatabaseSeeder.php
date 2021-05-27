<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $serviceNames =  ['Haircut', 'Hair care', 'Haircut plus', 'Nailcare', 'Nail design'];
        foreach ($serviceNames as $name) {
            \DB::table('services')->insert([
                'code' => strtoupper(str_replace(' ', '', $name)),
                'name' => $name,
                'data' => '[]'
            ]);
        }
        \App\Models\Staff::factory(10)->create();
        \App\Models\Customer::factory(100)->create();
        \App\Models\Location::factory(10)->create();
        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@bot2.test',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => '1234567890',
        ]);
        \App\Models\User::factory(10)->create();
    }
}
