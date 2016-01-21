<?php

namespace App\Http\Middleware;

use App\Message;
use Closure;

class Read
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
        $message = Message::find($request->route()->getParameter('id'));

        if ($message) {
            $message->read = 1;
            $message->save();
        }

        return $next($request);
    }
}
