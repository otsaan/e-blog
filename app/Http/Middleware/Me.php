<?php

namespace App\Http\Middleware;

use Closure;

class Me
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $username = explode('/', $request->path())[0];

        // check that {username} belongs to the logged in user
        if ($username != auth()->user()->username) {
            return view('errors.404');
        }

        return $next($request);
    }
}
