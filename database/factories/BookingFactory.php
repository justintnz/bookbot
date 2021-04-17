<?php

namespace Database\Factories;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Booking::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $customer = \App\Models\Customer::inRandomOrder()->first();
        $location = \App\Models\Location::inRandomOrder()->first();
        $service = \App\Models\Service::inRandomOrder()->first();

        $sDate = date('Y-m-d', time() + rand(1, 30) * 24 * 60 * 60);
        $sTime = (9 + rand(0, 11)) . ':' . rand(0, 3) * 15 . ':00';
        $start_at = $sDate . ' ' . $sTime;
        $end_at =  $sDate . ' ' . date('H:i:s', strtotime($start_at) + rand(1, 4) * 15 * 60);
        return [
            'customer_id' => $customer->id,
            'location_id' => $location->id,
            'service_id' => $service->id,
            'start_at' => $start_at,
            'end_at' => $end_at,
        ];
    }
}
