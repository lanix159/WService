<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {

        if (Auth::guest()) {

            if ($request->ajax()) {

                return response('Unauthorized.', 401);
            } else {

                return redirect()->guest('login');
            }
        }


        if ($request->user()->id_rol > $role) {
          
            return redirect()->to('/home');
        }

        return $next($request);
    }
}
