<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TerminateMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        echo "Executing statemants of handle method of TerminateMiddleware.";
        return $next($request);
    }

    public function terminate(Request $reques, Response $response){
        echo "Executing statemants of terminate method of TerminateMiddleware.";
    }
}
