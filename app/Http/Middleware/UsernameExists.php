<?php

namespace App\Http\Middleware;

use App\Blog;
use Closure;
use Illuminate\Support\Facades\Auth;

class UsernameExists
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
        /**
         * In {username}.localhost
         * makes sure that the {username} exists
         */
        $hostname = $request->server->get('HTTP_HOST');
        $username = explode('.', $hostname)[0];

        if ($username != 'admin' && Blog::where('username', '=', $username)->count() == 0) {
            return response('Not Found.', 404);
        }

        return $next($request);
    }
}
