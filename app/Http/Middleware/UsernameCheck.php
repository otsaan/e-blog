<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UsernameCheck
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
        // makes sure that the {username}.localhost belongs to the logged in user
        $hostname = $request->server->get('HTTP_HOST');
        $username = explode('.', $hostname);

        if ($username[0] != Auth::user()->username) {
            return redirect('/');
        }

        return $next($request);
    }
}
