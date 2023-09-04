<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;
use Models\UserModel;

class AddNewAdsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Session::get('user');
        if(empty($user) || (!empty($user) && ($user->getFirstName() == '' || $user->getSecondName() == ''))){
            return redirect()->route('user-data-notification');
        }
        return $next($request);
    }
}
