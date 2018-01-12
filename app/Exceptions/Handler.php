<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Ultraware\Roles\Exceptions\LevelDeniedException;
use Ultraware\Roles\Exceptions\PermissionDeniedException;
use Ultraware\Roles\Exceptions\RoleDeniedException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *'
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {

        // check permissions
        if ($exception instanceof RoleDeniedException) {

            return redirect()->back();
        }

        if ($exception instanceof PermissionDeniedException) {
            return redirect()->back();
        }

        if ($exception instanceof LevelDeniedException) {
            return redirect()->back();
        }

        return parent::render($request, $exception);
    }
}
