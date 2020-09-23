<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdmin
{
    /**
    * Handle an incoming request.
    *
    * @param \Illuminate\Http\Request $request
    * @param \Closure                 $next
    *
    * @return mixed
    */
    public function handle($request, Closure $next)
    {
        /**
        * @var \App\User $user
        */
        $user = $request->user();
        if(!empty($user) && ($user->isAdminUser())){


            return $next($request);
        }
        else{
            return  redirect()->back();

        }

        }
    }
