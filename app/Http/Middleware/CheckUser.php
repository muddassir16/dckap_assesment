<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Session;

use Closure;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $user_session  = $request->session()->exists('loginuser');
        $path = $request->path();
        if(!$request->ajax()){
            Session::put('last_url', $path);
        } else {
            Session::put('last_url', "");
        }
        if($user_session!='') {
            return $next($request);
        } else {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
                } else {
            return redirect('/');
            }
        }
        }
        
}

