<?php

namespace App\Http\Middleware;

use App\Blog;
use Closure;

class IncrementBlogViews
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
        $username = str_replace('/', '', $request->getRequestUri());

        $blog = Blog::where('username', '=', $username)->first();

        if ($blog) {
            $blog->views++;
            $blog->save();
        }

        return $next($request);
    }
}
