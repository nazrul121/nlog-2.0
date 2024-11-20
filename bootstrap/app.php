<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

use App\Http\Middleware\AccessMiddleware;
use App\Http\Middleware\CompanyInfo;
use App\Http\Middleware\SettingMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        $middleware->alias([
            'access' => AccessMiddleware::class,
        ]);

        $middleware->use([ //for global
            // \Illuminate\Http\Middleware\TrustHosts::class,
            \App\Http\Middleware\SettingMiddleware::class,
            \App\Http\Middleware\CompanyInfo::class,
        ]);

        
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
