<?php

namespace App\GraphQL\Queries;

class Booking
{
    public function getBetween($rootValue, array $args)
    {

        $bookings =  \App\Models\Booking::where('status', 'available');

        if (isset($args['start_at'])) {
            $bookings = $bookings->where('start_at', '>=', $args['start_at']);
        }
        if (isset($args['end_at'])) {
            $bookings = $bookings->where('end_at', '<=', $args['end_at']);
        }
        return ($bookings->get());
    }
}
