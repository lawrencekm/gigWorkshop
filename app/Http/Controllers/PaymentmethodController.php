<?php

namespace Wezaworkshop\Http\Controllers;

use Wezaworkshop\Paymentmethod;
use Illuminate\Http\Request;

class PaymentmethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paymentmethods = Paymentmethod::all();
        return view('admin.paymentmethods.index', compact('paymentmethods'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.paymentmethods.create');
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
            'name'=>'required',
            'description'=> 'required',
            'note'=> 'required'

        ]);

        $paymentmethod = new Paymentmethod;
        $paymentmethod->name = $request->name;
        $paymentmethod->description = $request->description;
        $paymentmethod->note = $request->note;
        $paymentmethod->save();

        return redirect('admin/paymentmethods');

    }

    /**
     * Display the specified resource.
     *
     * @param  \Wezaworkshop\Orderstatus  $educationlevel
     * @return \Illuminate\Http\Response
     */
    public function show(Paymentmethod $paymentmethod)
    {
        //
        //$education = Educationlevel::find($id);
        return view('admin.documenttypes.show',compact('paymentmethod'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Wezaworkshop\Documenttype
     * @return \Illuminate\Http\Response
     */
    public function edit(Paymentmethod $paymentmethod)
    {
        //
        return view('admin.paymentmethods.edit',compact('paymentmethod'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Wezaworkshop\Documenttype  $educationlevel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)

    {
        //
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'note'=>'required',

        ]);

        $paymentmethod = Paymentmethod::findOrFail($id);
        $paymentmethod->name = $request->name;
        $paymentmethod->description =$request->description;
        $paymentmethod->note =$request->note;
        $paymentmethod->save();
        
        
        $request->session()->flash('message', 'Successfully modified the payment method!');

        return redirect('admin/paymentmethods/'.$documenttype->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Wezaworkshop\Documenttype 
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paymentmethod $paymentmethod)
    {
        //
        $paymentmethod->delete();
        return redirect('admin/paymentmethods');
    }
}
