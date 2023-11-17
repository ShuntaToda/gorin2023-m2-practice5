<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check() && $request->user()->is_active ){
            return $next($request);
        }else{
            Auth::logout();
            $request->session()->regenerate();
            return redirect(route("login"))->with(["message" => "アカウントが凍結されています"]);
        }
    }
}
