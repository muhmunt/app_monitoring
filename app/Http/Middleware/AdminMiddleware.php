<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;
use Session;

class AdminMiddleware
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
        if(auth::user()->role != '1' ){
            Session::flash('auth','You are not authorized to view this page.');
            return redirect()->route('index');
        }
        return $next($request);
    }
}
