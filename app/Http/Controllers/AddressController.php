<?php

namespace Wezaworkshop\Http\Controllers;

use Wezaworkshop\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $addresses = Address::all();
        return view('admin.addresses.index', compact('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.addresses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'country'=>'required',
            'country_code'=>'required',
            'tel'=>'required',
            'city'=>'required',
            'state_province'=>'required',
            'zipcode'=>'required',
            'note'=>'required',
        ]);

        $address = new Address;
        $address->country = $request->country;
        $address->country_code = $request->country_code;
        $address->tel = $request->tel;
        $address->city = $request->city;
        $address->state_province = $request->state_province;
        $address->zipcode = $request->zipcode;
        $address->note = $request->note;
        $address->save();

        $request->session()->flash('message', 'Successfully created the Address!');


        return redirect('admin/addresses');



    }

    /**
     * Display the specified resource.
     *
     * @param  \Wezaworkshop\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        return view('admin.addresses.show', compact('address'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Wezaworkshop\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        //
        return view('admin.addresses.edit',compact('address'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Wezaworkshop\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'country'=>'required',
            'country_code'=>'required',
            'tel'=>'required',
            'city'=>'required',
            'state_province'=>'required',
            'zipcode'=>'required',
            'note'=>'required',
        ]);

        $address = Address::findOrFail($id);
        $address->country = $request->country;
        $address->country_code = $request->country_code;
        $address->tel = $request->tel;
        $address->city = $request->city;
        $address->state_province = $request->state_province;
        $address->zipcode = $request->zipcode;
        $address->note = $request->note;
        $address->save();

        $request->session()->flash('message', 'Successfully updated the Address!');


        return redirect('admin/addresses/'.$address->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Wezaworkshop\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address,Request $request)
    {
        //
        $address->delete();
        $request->session()->flash('message', 'Successfully deleted the Address!');
        return redirect('admin/addresses');


    }
}
