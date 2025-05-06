<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * Lista tipova izuzetaka koji se ne prijavljuju.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * Lista podataka koji se nikada ne izbacuju u logove za validacione greške.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Prijavljivanje ili obrada izuzetaka.
     */
    public function report(Throwable $exception): void
    {
        parent::report($exception);
    }

    /**
     * Priprema HTTP odgovora za izuzetke.
     */
    public function render($request, Throwable $exception)
    {
        return parent::render($request, $exception);
    }
}