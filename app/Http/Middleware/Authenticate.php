<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    protected $users_route = 'login';
    protected $admins_route = 'admin.login';

    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            if (Route::is('users.*')) {
                return route($this->users_route);
            } elseif (Route::is('admins/*')) {
                return route($this->admins_route);
            }
        }
    }
}
