<?php

namespace App\Http\Middleware;

use App\Article;
use Closure;

class IncrementArticleViews
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
        $id = class_basename($request->getRequestUri());


        $article = Article::find($id);

        if ($article) {
            $article->views++;
            $article->save();
        }

        return $next($request);
    }
}
