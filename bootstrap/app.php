<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'admin.auth' => \App\Http\Middleware\AdminAuthenticate::class,
            'admin.guest' => \App\Http\Middleware\AdminRedirectIfAuthenticated::class,
        ]);

        $middleware->redirectTo(
            guests: fn (\Illuminate\Http\Request $request) => ($request->is('admin') || $request->is('admin/*'))
                ? route('admin.login')
                : route('admin.login'),
            users: fn (\Illuminate\Http\Request $request) => ($request->is('admin') || $request->is('admin/*'))
                ? route('admin.dashboard')
                : route('admin.dashboard')
        );
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
