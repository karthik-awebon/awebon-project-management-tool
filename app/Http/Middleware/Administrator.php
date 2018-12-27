<?php

namespace App\Http\Middleware;

use Closure;

class Administrator
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

        if(auth()->check()){

            if(auth()->user()->role_id == config('app.adminroleid')){
                
                dd('you are an administrator');
                
            }
    
           } else{

               return redirect('login');
           }

        return $next($request);
    }
}
