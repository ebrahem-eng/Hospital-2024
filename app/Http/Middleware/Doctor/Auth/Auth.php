<?php

namespace App\Http\Middleware\Doctor\Auth;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class Auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!FacadesAuth::guard('doctor')->check())
        {
          return redirect()->route('doctor.login.page')->with('error_message','Session Expired Login Again');
        }
        return $next($request);
    }
}
