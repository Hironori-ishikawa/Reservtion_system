<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    protected $user_route = 'user.login';
    protected $admin_route = 'admin.login';

    protected function redirectTo($request)
    {
        if(!$request->expectsJson()) {
            if(Route::is('user.*')) {
                return route($this->user_route);
            } elseif (Route::is('admin/*')){
                return route($this->admin_route);
            }
        }
    }
}
