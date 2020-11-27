<?php

namespace App\Http\Middleware;

use Closure;
use App\Manuales;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class RolesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param string|null $guard
     * @return mixed
     */

    
     public function handle($request, Closure $next)
    {
        $role="1-2";

        if(Auth::user()){
            
            $rol_id=Auth::user()->id_rol;
            $roles = explode("-", $role);
            if(in_array($rol_id, $roles) == false) { 
             //No coincide con un rol permitido 
             Auth::logout();
            }
            else{
                return $next($request);
            /*echo "Coincide con un rol permitido"; 
            echo "Sigue la request";*/
            }//return Redirect::to('/');}
           /*// Auth::logout();
           */
        }
      
    }
    
    
        
}
