<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;

use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        return route('home');
    }

    public function handle($request, Closure $next, ...$guards)
    {

      
        $string = strstr($request ,"admin");

       if(!strstr($request ,"admin")){
            if(auth()->user()['role_id'] == 1){ 
                return redirect('admin');
            }
       } 

        $this->authenticate($guards);

        return $next($request);
    }
    
}
