<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Models\user_login_permission;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserHavePermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::check()==false){
            return redirect(route('login'))->withErrors(['error'=>'You need to login']);
        }

        $user = optional(Auth::user()->user_login_permission)->is_allowed;

        if (!$user){
            Auth::logout();
            return redirect(route('login'))->withErrors(['error'=>'You do not have permission']);
        }

        return $next($request);
    }
}
