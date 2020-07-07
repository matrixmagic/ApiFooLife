<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Utility;

class ApiAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {


        
       if ($request->user() == null){

        return response( Utility::ToApi("Unauthorized",false, ['error' => 'Unauthorized'],"Unauthorized",401));

       }

        return $next($request);
    }
}
