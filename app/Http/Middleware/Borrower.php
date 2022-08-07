<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Borrower
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
        // Jika tidak login, lempar ke halaman login
        if (!Auth::check()) {
            return redirect()->route('admin.login');
        }

        // IF Administrator
        if (Auth::guard()->check()) {
            if (Auth::user()->role == 'admin') {
                return redirect()->route('admin.dashboard');
            }
            if (Auth::user()->role == 'lender') {
                return redirect()->route('lender'); // ini harusnya ke halaman dashboard lender
            }
            if (Auth::user()->role == 'borrower') {
                return $next($request); // ini harusnya ke halaman dahsboard borrower
            }
        }
    }
}
