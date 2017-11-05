<?php

namespace proyectoPrueba\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;


class IsAdmin
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
       if  (auth()->user()->user == 0){
          return redirect('/home');

         }
         return $next($request);

     }
  }
