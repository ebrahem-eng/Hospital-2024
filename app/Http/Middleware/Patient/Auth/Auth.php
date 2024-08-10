<?php

namespace App\Http\Middleware\Patient\Auth;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Symfony\Component\HttpFoundation\Response;

class Auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!FacadesAuth::guard('patient')->check())
        {
          return redirect()->route('patient.login.page')->with('error_message','Session Expired Login Again');
        }
        return $next($request);
    }
}
