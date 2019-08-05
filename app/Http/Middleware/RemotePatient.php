<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RemotePatient
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
        if(Auth::check() && Auth::user()->role_id!=9){
            switch (Auth::user()->role_id) {
                case 1:
                    return redirect('superadmin');
                    break;

                case 2:
                    return redirect('patient');
                    break;
                
                case 3:
                    return redirect('doctor');
                    break;

                case 4:
                    return redirect('word_admin');
                    break;
                case 5:
                    return redirect('pharmacy_admin');
                    break;
                case 6:
                    return redirect('counter_admin');
                    break;
                case 7:
                    return redirect('lab_admin');
                    break;
                case 8:
                    return redirect('sample_collector');
                    break;
                case 9:
                    return redirect('remote_patient');
                    break;
                default:
                    return abort(404);
                    break;
            }
        }
        return $next($request);
    }
}