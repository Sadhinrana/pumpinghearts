<?php

namespace App\Http\Middleware;

use Session;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson())
        {
            Session::flash('modal_message_error', 'You must be logged in to perform this action.');
            Session::flash('alert-class', 'alert-danger');
            return route('home');
        }
    }
}
