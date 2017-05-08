<?php

namespace App\Http\Middleware;

use Closure;

//Auth Facade
use Auth;

class AuthenticateStaff
{
   public function handle($request, Closure $next)
   {
       //If request does not comes from logged in staff
       //then he shall be redirected to Staff Login page
       if (! Auth::guard('staff')->check()) {
           return redirect('/staff_login');
       }

       return $next($request);
   }
}