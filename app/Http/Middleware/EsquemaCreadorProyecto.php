<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EsquemaCreadorProyecto{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response{

        $integrante = \App\Models\Integrante::where('user_id', auth()->id())->first();

        if( ! auth()->user()->proyecto and $integrante ){
            return redirect('dashboard');
        }

        return $next($request);
    }
}
