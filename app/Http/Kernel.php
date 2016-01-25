<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
        ],

        'api' => [
            'throttle:60,1',
        ],

        'admin' => [
            \App\Http\Middleware\Admin::class,
        ],

        'exists' => [
            \App\Http\Middleware\Exists::class,
        ],

        'me' => [
            \App\Http\Middleware\Me::class,
        ],

        'username' => [
            \App\Http\Middleware\Me::class,
            \App\Http\Middleware\Exists::class,
        ],

        'incrementBlogViews' => [
            \App\Http\Middleware\IncrementBlogViews::class,
        ],

        'incrementArticleViews' => [
            \App\Http\Middleware\IncrementArticleViews::class,
        ],

        'active' => [
            \App\Http\Middleware\Active::class,
        ],

        'read' => [
            \App\Http\Middleware\Read::class,
        ],
    ];
    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
    ];
}
