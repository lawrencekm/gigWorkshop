<?php

namespace Wezaworkshop\Http\Controllers\Auth;

use Wezaworkshop\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Auth;
use Wezaworkshop\User;
class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
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
        $this->middleware('guest');
    }
}
