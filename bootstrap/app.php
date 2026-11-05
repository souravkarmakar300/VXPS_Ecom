
<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))

    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )

    ->withMiddleware(function (Middleware $middleware): void {

        /*
        |--------------------------------------------------------------------------
        | Dynamic Proxy Configuration
        |--------------------------------------------------------------------------
        | Automatically detect the original host and HTTPS protocol
        | from VS Code Dev Tunnels or another reverse proxy.
        */

        $middleware->trustProxies(
            at: '*',
            headers: Request::HEADER_X_FORWARDED_FOR |
                Request::HEADER_X_FORWARDED_HOST |
                Request::HEADER_X_FORWARDED_PORT |
                Request::HEADER_X_FORWARDED_PROTO
        );


        /*
        |--------------------------------------------------------------------------
        | Custom Middleware Aliases
        |--------------------------------------------------------------------------
        */

        $middleware->alias([
            'admin.auth' => \App\Http\Middleware\AdminAuthenticate::class,
            'admin.guest' => \App\Http\Middleware\AdminRedirectIfAuthenticated::class,
        ]);


        /*
        |--------------------------------------------------------------------------
        | Authentication Redirects
        |--------------------------------------------------------------------------
        */

        $middleware->redirectTo(
            guests: fn (\Illuminate\Http\Request $request) =>
                ($request->is('admin') || $request->is('admin/*'))
                    ? route('admin.login')
                    : route('admin.login'),

            users: fn (\Illuminate\Http\Request $request) =>
                ($request->is('admin') || $request->is('admin/*'))
                    ? route('admin.dashboard')
                    : route('admin.dashboard')
        );

    })

    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })

    ->create();
