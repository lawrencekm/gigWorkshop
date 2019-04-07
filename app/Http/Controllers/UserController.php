<?php

namespace Wezaworkshop\Http\Controllers;

use Illuminate\Http\Request;
use Wezaworkshop\User;
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
        return view('admin.users.create');
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
        
        $user = User::create(['firstname' => $request->firstname,
                            'lastname' => $request->lastname,
                            'email' => $request->email,
                            'facebook_id' => $request->facebook_id,
                            'altemail' => $request->altemail,
                            'password' => $request->password,
                            'otp' => $request->otp,
                            'mobile' => $request->mobile,
                            'dob' => $request->dob,
                            'referral_code' => $request->referral_code,
                            'timezone' => $request->timezone,
                            'address_id' => $request->address_id,
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
        $user = User::find($id);
        return view('admin.users.edit',compact('user'));
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
        $request->validate([
            'firstname' => 'required|min:3',
            'lastname' => 'required',
        ]);
        $user = User::find($id);
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->save();
        $request->session()->flash('message', 'Successfully modified the user!');
        return redirect('users');
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
