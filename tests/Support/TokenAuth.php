<?php
namespace Tests\Support;

final class TokenAuth
{
    public static function actingAs($user, $abilities = ['*'], $guard = 'token') {
        \App\Libraries\Bridge\Api::$testActor = $user;
        app('auth')->setUser($user);
        return $user;
    }
}
