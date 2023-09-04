<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\FirebaseController;

class LoginRegisterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $firebaseController = new FirebaseController();
        $userExist = $firebaseController->userCheck();
        if ($userExist) {
            return redirect()->route('my-account');
        }
        return $next($request);
    }
}
