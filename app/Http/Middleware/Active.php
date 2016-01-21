<?php

namespace App\Http\Middleware;

use App\Blog;
use Closure;

class Active
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

        $blog = Blog::where('username', '=', $username)->first();

        if ($blog && $blog->status != 'active') {
            return redirect()->route('disabled', $username)->with([
                'blog' => $blog
            ]);
        }

        return $next($request);
    }
}
