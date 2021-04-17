<?php

namespace App\GraphQL\Queries;

class Service
{
    public function all($rootValue, array $args): array
    {
        $services =  \App\Models\Service::where('status', 'available')->get()->toArray();
        return ($services);
    }
}
