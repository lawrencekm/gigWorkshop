<?php

namespace Wezaworkshop\Http\Middleware;

use Closure;
use Auth;
use Wezaworkshop\User;

class OfficerUser
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

        if (Auth::check()) {

            $id = Auth::id();
            $roles = User::find($id)->roles;
                
                if($roles->contains(6)){
                    return $next($request);
                }
                //logout user and redirect home
                Auth::logout();
                return redirect('/');
            }
            return redirect('/');
        }
}
