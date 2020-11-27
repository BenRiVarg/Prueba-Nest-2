<?php

namespace App\Http\Middleware;

use Closure;
use App\Manuales;


class ManualMiddleware
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
        
     
        $manual=Manuales::where('id',$request->id)->first();
     
        if($manual->clavem==$request->clave){
            return $next($request);
           
        }
        else
        {
            return redirect()->route('cliente.faqs',$request->id);
        }
    
    }
}
