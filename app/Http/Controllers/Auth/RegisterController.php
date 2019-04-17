<?php

namespace Wezaworkshop\Http\Controllers\Auth;
//use Wezaworkshop\Role;

use Wezaworkshop\User;
use Wezaworkshop\Order;
use Wezaworkshop\Address;
use Wezaworkshop\Role;
use Auth;

use Wezaworkshop\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = '/home';
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
            return '/customer';

        }elseif($roles->contains(7)){
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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if($data['role'] == 'merchant'){

            return Validator::make($data, [
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
                'role' => 'required',

            ]);
        }
        elseif($data['role'] == 'customer'){

            return Validator::make($data, [
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
                'typeofwork_id' => 'required',
                'citation_id' => 'required',
                'provide_sources' => 'required',
                'educationlevel_id' => 'required',
                'spacing' => 'required',
                'cost' => 'required',
                'deadline' => 'required',

            ]);
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \Wezaworkshop\User
     */
    protected function create(array $data)
    {

        $role_id = Role::where('name','like',$data['role'])->select('id')->first();
        if($data['role'] == 'customer'){
            $user = new User;
            $user->firstname = $data['firstname'];
            $user->lastname = $data['lastname'];
            $user->email = $data['email'];
            $user->password = bcrypt($data['password']);
            $user->save();
            $customer = $user->id;
            $user->roles()->attach($role_id);

           
            $order = new Order;
            $order->topic = $data['topic'];
            $order->customer_id = $customer;
            $order->typeofwork_id = $data['typeofwork_id'];
            $order->citation_id = $data['citation_id'];
            $order->provide_sources = $data['provide_sources'];
            $order->educationlevel_id = $data['educationlevel_id'];
            $order->spacing = $data['spacing'];
            $order->short_description = $data['short_description'];
            $order->pages = $data['pages'];
            $order->slides = $data['slides'];
            $order->cost = $data['cost'];
            $order->deadline =$data['deadline'];
            $order->preview = $data['preview'];
            $order->urgent = $data['urgent'];
            $order->save();

            return $user;

        }
        if($data['role'] == 'merchant'){
            $address = new Address;
            $address->country = $data['country'];
            $address->country_code = $data['country_code'];
            $address->tel = $data['tel'];
            $address->state_province = $data['state_province'];
            $address->city = $data['city'];
            $address->zipcode = $data['zipcode'];
            $address->save();
            $address_id = $address->id;

            $user = new User;
            $user->firstname = $data['firstname'];
            $user->lastname = $data['lastname'];
            $user->email = $data['email'];
            $user->password = bcrypt($data['password']);
            $user->address_id = $address_id;

            $user->facebook_id = $data['facebook_id'];
            $user->altemail = $data['altemail'];
            $user->otp = mt_rand(10000,99999);
            $user->mobile = $data['mobile'];
            $user->dob = $data['dob'];
            $user->referral_code = $data['referral_code'];
            $user->timezone = $data['timezone'];
            $user->address_id = $address_id;
            $user->userstatus_id = $data['userstatus_id'];
            $user->active = $data['active'];
            $user->promo_email_notifications = $data['promo_email_notifications'];
            $user->order_email_notifications = $data['order_email_notifications'];
            $user->available_at_night = $data['available_at_night'];
            $user->working_status_id = $data['working_status_id'];
            $user->organization_id = $data['organization_id'];
            $user->National_ID = $data['National_ID'];
            $user->educationlevel_id = $data['educationlevel_id'];

            $user->save();
            $user->roles()->attach($role_id);

            return $user;

        }

        /*return User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role_id' => $role_id,
            'address_id' => $address_id,
        ]);*/
    }
}
