<?php

namespace App\GraphQL\Mutations;

use \App\Models\User as User;
use Illuminate\Support\Arr;

class Auth
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function login($_, array $args): User
    {
        // Plain Laravel: Auth::guard()
        // Laravel Sanctum: Auth::guard(config('sanctum.guard', 'web'))
        $guard = \Auth::guard(config('sanctum.guard', 'web'));
        $args = Arr::only($args, ['email', 'password']);

        if (!$guard->attempt($args)) {
            throw new \Error('Invalid credentials.');
        }

        /**
         * Since we successfully logged in, this can no longer be `null`.
         *
         * @var \App\Models\User $user
         */
        $user = $guard->user();
        $token = $user->createToken('MyGraphQL');
        $user->token = $token->plainTextToken;
        return $user;
    }

    public function logout($_, array $args): bool
    {
        // Plain Laravel: Auth::guard()
        // Laravel Sanctum: Auth::guard(config('sanctum.guard', 'web'))
        return auth()->user()->tokens()->delete();
    }
}
