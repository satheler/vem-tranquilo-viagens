<?php

namespace App\Http\Middleware;

use Closure;

class Pagamento
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
        // if(!$request->route()->named('page_compra.poltrona')) {
        //     throw new \Exception('123');
        //     return route('page_home.index');
        // }
        return $next($request);
    }
}
