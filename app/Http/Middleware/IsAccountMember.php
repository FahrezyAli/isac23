<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAccountMember
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    //Middleware agar user gabisa ngedit member tim lain
     public function handle($request, Closure $next){
        $parameter = $request->route()->parameters()['student'];
        $match = false;
        foreach (Auth::user()->students as $student){
            $match = $match || ($parameter->id == $student->id);
        };

        if (Auth::user() && $match) {
            return $next($request);
        }

       return redirect('/profile');
       }
}
