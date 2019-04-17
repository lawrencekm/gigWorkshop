<?php

namespace Wezaworkshop\Http\Controllers;

use Illuminate\Http\Request;
use Wezaworkshop\User;
use Wezaworkshop\Address;

use Wezaworkshop\Userstatus;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $userstatuses = DB::table('userstatuses')->pluck('name','id')->toArray();
        $workingstatuses = DB::table('workingstatuses')->pluck('name','id')->toArray();
        $educationlevels = DB::table('educationlevels')->pluck('name','id')->toArray();

        return view('admin.users.create',compact('userstatuses','workingstatuses','educationlevels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Validate
        /*
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'facebook_id' => 'required',
            'altemail' => 'required',
            'password' => 'required',
            'otp' => 'required',
            'mobile' => 'required',
            'dob' => 'required',
            'referral_code' => 'required',
            'timezone' => 'required',
            'address_id' => 'required',
            'userstatus_id' => 'required',
            'active' => 'required',
            'promo_email_notifications' => 'required',
            'order_email_notifications' => 'required',
            'available_at_night' => 'required',
            'working_status_id' => 'required',
            'organization_id' => 'required',
            'National_ID' => 'required',
            'educationlevel_id' => 'required',
            'note' => 'required',
            'last_login_ip' => 'required',
            'last_login' => 'required',
           
        ]);
        */
        $address = new Address;
        $address->country = $request->country;
        $address->country_code = $request->country_code;
        $address->tel = $request->tel;
        $address->state_province = $request->state_province;
        $address->city = $request->city;
        $address->zipcode = $request->zipcode;
        $address->save();
        $address_id = $address->id;

        /*
        $id = DB::table('addresses')->insertGetId(
            ['country' => $request->country, 
            'country_code' => $request->country,
            'tel' => $request->tel,
            'state_province' => $request->state_province,
            'city' => $request->city,
            'zipcode' => $request->zipcode,
            ]
        );
        */


        $user = User::create(['last_login' => $request->last_login,
                            'firstname' => $request->firstname,
                            'lastname' => $request->lastname,
                            'email' => $request->email,
                            'facebook_id' => $request->facebook_id,
                            'altemail' => $request->altemail,
                            'password' => bcrypt($request->password),
                            'otp' => $request->otp,
                            'mobile' => $request->mobile,
                            'dob' => $request->dob,
                            'referral_code' => $request->referral_code,
                            'timezone' => $request->timezone,
                            'address_id' => $address_id,
                            'userstatus_id' => $request->userstatus_id,
                            'active' => $request->active,
                            'promo_email_notifications' => $request->promo_email_notifications,
                            'order_email_notifications' => $request->order_email_notifications,
                            'available_at_night' => $request->available_at_night,
                            'working_status_id' => $request->working_status_id,
                            'organization_id' => $request->organization_id,
                            'National_ID' => $request->National_ID,
                            'educationlevel_id' => $request->educationlevel_id,
                            'note' => $request->note,
                            'last_login_ip' => $request->last_login_ip,
                            'last_login' => $request->last_login,
                            ]);

        //return redirect('admin/users/'.$user->id);
        return redirect('admin/users');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::find($id);
        return view('admin.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $userstatuses = DB::table('userstatuses')->pluck('name','id')->toArray();
        $workingstatuses = DB::table('workingstatuses')->pluck('name','id')->toArray();
        $educationlevels = DB::table('educationlevels')->pluck('name','id')->toArray();

        $user = User::find($id);
        return view('admin.users.edit',compact('user','userstatuses','workingstatuses','educationlevels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //
        //Validate


        /*
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'facebook_id' => 'required',
            'altemail' => 'required',
            'password' => 'required',
            'otp' => 'required',
            'mobile' => 'required',
            'dob' => 'required',
            'referral_code' => 'required',
            'timezone' => 'required',
            'address_id' => 'required',
            'userstatus_id' => 'required',
            'active' => 'required',
            'promo_email_notifications' => 'required',
            'order_email_notifications' => 'required',
            'available_at_night' => 'required',
            'working_status_id' => 'required',
            'organization_id' => 'required',
            'National_ID' => 'required',
            'educationlevel_id' => 'required',
            'note' => 'required',
            'last_login_ip' => 'required',
            'last_login' => 'required',
           
        ]);
        */
        $address = new Address;
        $address->country = $request->country;
        $address->country_code = $request->country_code;
        $address->tel = $request->tel;
        $address->state_province = $request->state_province;
        $address->city = $request->city;
        $address->zipcode = $request->zipcode;
        $address->save();
        $address_id = $address->id;

        $user = User::findOrFail($id);


            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->email = $request->email;
            $user->facebook_id = $request->facebook_id;
            $user->altemail = $request->altemail;
            $user->password = bcrypt($request->password);
            $user->otp = $request->otp;
            $user->mobile = $request->mobile;
            $user->dob = $request->dob;
            $user->referral_code = $request->referral_code;
            $user->timezone = $request->timezone;
            $user->address_id = $address_id;
            $user->userstatus_id = $request->userstatus_id;
            $user->active = $request->active;
            $user->promo_email_notifications = $request->promo_email_notifications;
            $user->order_email_notifications = $request->order_email_notifications;
            $user->available_at_night = $request->available_at_night;
            $user->working_status_id = $request->working_status_id;
            $user->organization_id = $request->organization_id;
            $user->National_ID = $request->National_ID;
            $user->educationlevel_id = $request->educationlevel_id;
            $user->note = $request->note;
            $user->last_login_ip = $request->last_login_ip;
            $user->last_login = $request->last_login;
            $user->save();

        //$request->session()->flash('message', 'Successfully modified the user!');
        return redirect('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);
        $user->delete();
        Session::flash('message', 'Successfully deleted the user!');
        return redirect('admin.users');
    }
}
