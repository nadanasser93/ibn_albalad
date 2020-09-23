<?php

namespace App\Http\Middleware;

use Closure;

class CheckCustomer
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
        $user = $request->user();
        if(!empty($user) && ($user->hasRole('customer'))){

            return $next($request);
        }
        else{
            return  redirect()->back();

        }
    }
}
