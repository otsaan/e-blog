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
        if ($username != 'admin' && Blog::where('username', '=', $username)->count() == 0) {
            return redirect()->route('404');
        }

        return $next($request);
    }
}
