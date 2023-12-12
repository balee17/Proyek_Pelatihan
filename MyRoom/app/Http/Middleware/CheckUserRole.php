<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $role)
    {
        if ($request->user() && $request->user()->role != $role) {
            session()->flash('alert', 'Anda tidak memiliki akses ke halaman ini.');
            return redirect('/');
        }

        return $next($request);
    }
}
