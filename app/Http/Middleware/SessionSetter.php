<?php

namespace App\Http\Middleware;

use Closure;

class SessionSetter
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
        if($request->session()->has('alias') === false){
            $request->session()->put('alias', \Hash::make(rand(1,10000).time()));
        }
        \View::share('session_token',$request->session()->get('_token'));
        return $next($request);
    }
}
