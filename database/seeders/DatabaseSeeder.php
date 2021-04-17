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
        \App\Models\Customer::factory(10)->create();
        \App\Models\Location::factory(10)->create();
    }
}
