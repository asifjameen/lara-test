<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class validation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $pass=$request->input('password');
        $con_pass=$request->input('con_pass');
        if($pass!==$con_pass){
             return redirect()->back()->with('msg','incorrect_confirm');
        }
             return $next($request);
    }
}
