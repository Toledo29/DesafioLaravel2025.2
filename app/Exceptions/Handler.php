<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Auth\Access\AuthorizationException;

class Handler extends ExceptionHandler
{
    protected $dontReport = [];
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register()
    {
        $this->reportable(function (Throwable $e) {
            // ...existing code...
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof AuthorizationException) {
            return redirect()->route('dashboard1');
        }
        return parent::render($request, $exception);
    }
}
