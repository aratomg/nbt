<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $type)
    {
        if (!Auth::check()) {
            redirect('page.login');
        }

        $user = Auth::user();
        if ($user->type == $type){
            $response = $next($request);
            return $response;
        }
        return redirect('/')->with('error', 'Accès Interdite');
    }
}
