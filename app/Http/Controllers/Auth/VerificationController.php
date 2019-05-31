<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;

use Auth;
use Wezaworkshop\User;


class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */
    use VerifiesEmails;
    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }
    protected function redirectTo(){
        $id = Auth::id();

        $roles = User::find($id)->roles;
        
        if($roles->contains(4)){
            return  '/admin';

        }elseif($roles->contains(5)) {
            return '/manager';

        }elseif($roles->contains(6)){
            return '/officer';

        }elseif($roles->contains(8)){
            return '/customer/customer';

        }elseif($roles->contains(7)){
            return '/merchant/merchant';

        }else{
            return '/public';
        }

    }
}