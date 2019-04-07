<?php

namespace Wezaworkshop\Http\Controllers;

use Wezaworkshop\Paymentstatus;
use Illuminate\Http\Request;

class PaymentstatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paymentstatuses = Paymentstatus::all();
        return view('admin.paymentstatuses.index', compact('paymentstatuses'));
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
        return view('admin.paymentstatuses.create');
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

        $paymentstatus = new Paymentstatus;
        $paymentstatus->name = $request->name;
        $paymentstatus->description = $request->description;
        $paymentstatus->note = $request->note;
        $paymentstatus->save();

        return redirect('admin/paymentstatuses');

    }

    /**
     * Display the specified resource.
     *
     * @param  \Wezaworkshop\Orderstatus  $educationlevel
     * @return \Illuminate\Http\Response
     */
    public function show(Paymentstatus $paymentstatus)
    {
        //
        return view('admin.paymentstatuses.show',compact('paymentstatus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Wezaworkshop\Documenttype
     * @return \Illuminate\Http\Response
     */
    public function edit(Paymentstatus $paymentstatus)
    {
        //
        return view('admin.paymentstatuses.edit',compact('paymentstatus'));


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

        $paymentstatus = Paymentstatus::findOrFail($id);
        $paymentstatus->name = $request->name;
        $paymentstatus->description =$request->description;
        $paymentstatus->note =$request->note;
        $paymentstatus->save();
        
        
        $request->session()->flash('message', 'Successfully modified the payment status!');

        return redirect('admin/paymentstatuses/'.$paymentstatus->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Wezaworkshop\Documenttype 
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paymentstatus $paymentstatus)
    {
        //
        $paymentstatus->delete();
        return redirect('admin/paymentstatuses');
    }
}
