<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsMemberFulfilled
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

     //Middleware agar page tidak bisa diakses sebelum anggota terdaftar semuanya
    public function handle($request, Closure $next){
        if (Auth::user() &&  Auth::user()->role == 'olymp' && Auth::user()->students->count() == 1) {
            return $next($request);
        }
        elseif (Auth::user() && Auth::user()->role == 'uiux' && Auth::user()->students->count() == 2) {
            return $next($request);
        }

        return redirect('/tambah-anggota');

        /*if(Auth::user() && Auth::user()->role == 'uiux' && Auth::user()->students->count() == 1){
            return redirect('/tambah-anggota/2');
        }
        else{
            return redirect('/tambah-anggota/1');
        }*/

       }
}
