<?php

namespace App\Http\Middleware;

use Closure;

class cors{
    /*
    @param \Illuminate\Http\Request $request
    @param \Closure $next
    @return mixed
    */

public function handle ($request, Closure  $next){
        return $next($request)
            ->header('Access-Control-Allow-Origin', "*")
            ->header('Access-Control-Allow-Methods', "PUT, POST, DELETE, GET, OPTIONS")
            ->header('Access-Control-Allow-Headers', "Accept, Authorization, Content-Type");
}
}

/*
class Cors
{
    public function handle($request, Closure $next)
    {
        return $next($request)
            //Url a la que se le dará acceso en las peticiones
            ->header("Access-Control-Allow-Origin", "*")
            //Métodos que a los que se da acceso
            ->header("Access-Control-Allow-Methods", "GET, POST, PUT, DELETE")
            //Headers de la petición
            ->header("Access-Control-Allow-Headers", "X-Requested-With, Content-Type, X-Token-Auth, Authorization");
    }
}
*/
