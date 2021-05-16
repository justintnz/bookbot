<?php

namespace App\GraphQL\Mutations;

class Job
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function create($_, array $args)
    {
        $args['data'] = $args['data'] ?? '[]';
        unset($args['directive']);
        $job = \App\Models\Job::create($args);
        return $job;
    }
}
