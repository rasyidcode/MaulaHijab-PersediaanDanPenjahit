<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

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
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Throwable
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException) {
            return response()->json([
                "status" => 405,
                "message" => "Method not allowed on this route!" 
            ], 405);
        } else if ($exception instanceof App\Exceptions\JenisBahanNotFoundException) {
            return $exception->render($request);
        } else if ($exception instanceof Illuminate\Database\QueryException) {
            return response()->json([
                "status" => 500,
                "message" => "Something wrong with database",
                "error" => $exception->getMessage() 
            ], 500);
        } else if ($exception instanceof App\Exceptions\BahanNotFoundException) {
            return $exception->render($request);
        } else if ($exception instanceof App\Exceptions\IndukNotFoundException) {
            return $exception->render($request);
        } else if ($exception instanceof App\Exceptions\BarangNotFoundException) {
            return $exception->render($request);
        } else if ($exception instanceof App\Exceptions\PenjahitNotFoundException) {
            return $exception->render($request);
        } else if ($exception instanceof App\Exceptions\WosNotFoundException) {
            return $exception->render($request);
        } else if ($exception instanceof App\Exceptions\WarnaNotFoundException) {
            return $exception->render($request);
        } else if ($exception instanceof App\Exceptions\BahanNotFoundException) {
            return $exception->render($request);
        }

        return parent::render($request, $exception);
    }
}
