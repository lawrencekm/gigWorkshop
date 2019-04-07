<?php

namespace Wezaworkshop\Http\Controllers\Auth;

use Wezaworkshop\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Wezaworkshop\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/home';
    protected function redirectTo(){
        $id = Auth::id();
     
        $roles = User::find($id)->roles;
        
        if($roles->contains(1)){
            return  '/admin';

        }elseif($roles->contains(2)) {
            return '/manager';

        }elseif($roles->contains(3)){
            return '/officer';

        }elseif($roles->contains(4)){
            return '/customer';

        }elseif($roles->contains(5)){
            return '/merchant';

        }else{
            return '/public';
        }

    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
