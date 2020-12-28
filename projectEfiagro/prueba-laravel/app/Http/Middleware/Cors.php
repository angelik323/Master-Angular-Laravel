<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request)
        ->header("Access-Control-Allow-Origin", "*")
        ->header("Access-Control-Allow-Methods", "*")
        ->header("Access-Control-Allow-Headers", "*");
        // ->header("Access-Control-Allow-Methods", "GET, POST, PUT, DELETE, OPTIONS");
        // ->header("Access-Control-Allow-Methods", "GET, POST, PUT, DELETE")
        // ->header("Access-Control-Allow-Headers", "*"); 
        /* ->header("Access-Control-Allow-Origin", "http://127.0.0.1:8000")
        ->header("Access-Control-Allow-Methods", "GET, POST, PUT, DELETE")
        ->header("Access-Control-Allow-Headers", "X-Requested-With, Content-Type, X-Token-Auth, Authorization"); 
        // Establecemos la cabecera CORS para permitir el origen de solicitud desde localhost
        //->header('Access-Control-Allow-Origin', 'http://localhost');
        // ->header('Access-Control-Allow-Origin', '*')
        // ->header('Access-Control-Allow-Headers: *');*/
    }
}