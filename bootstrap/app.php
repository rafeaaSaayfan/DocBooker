<?php

use App\Http\Middleware\DoctorMiddleware;
use App\Http\Middleware\LangMiddleware;
use App\Http\Middleware\PatientMiddleware;
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
        DoctorMiddleware::class;
        PatientMiddleware::class;
        LangMiddleware::class;
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
