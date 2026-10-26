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
    ->withMiddleware(function (Middleware $middleware) {

        // Jika pengguna belum login dan mencoba membuka
        // halaman yang dilindungi middleware auth,
        // arahkan ke halaman login dengan tanda login_required.
        $middleware->redirectGuestsTo(function (Request $request) {
            return route('login', [
                'login_required' => '1'
            ]);
        });

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->create();