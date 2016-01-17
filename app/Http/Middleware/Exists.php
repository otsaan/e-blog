<?php

namespace App\Http\Middleware;

use App\Blog;
use Closure;
use Illuminate\Support\Facades\Auth;

class Exists
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

        // check that {username} exists
        if (Blog::where('username', '=', $username)->count() == 0) {
            return view('errors.404');
        }

        return $next($request);
    }
}