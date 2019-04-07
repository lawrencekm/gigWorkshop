<?php

namespace Wezaworkshop\Http\Controllers;

use Wezaworkshop\Transactionstatus;
use Illuminate\Http\Request;

class TransactionstatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactionstatuses = Transactionstatus::all();
        return view('admin.transactionstatuses.index', compact('transactionstatuses'));
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
        return view('admin.transactionstatuses.create');
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

        $transactionstatus = new Transactionstatus;
        $transactionstatus->name = $request->name;
        $transactionstatus->description = $request->description;
        $transactionstatus->note = $request->note;
        $transactionstatus->save();

        return redirect('admin/transactionstatuses');

    }

    /**
     * Display the specified resource.
     *
     * @param  \Wezaworkshop\Orderstatus  $educationlevel
     * @return \Illuminate\Http\Response
     */
    public function show(Transactionstatus $transactionstatus)
    {
        //
        return view('admin.transactionstatuses.show',compact('transactionstatus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Wezaworkshop\Documenttype
     * @return \Illuminate\Http\Response
     */
    public function edit(Transactionstatus $transactionstatus)
    {
        //
        return view('admin.transactionstatuses.edit',compact('transactionstatus'));


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

        $transactionstatus = Transactionstatus::findOrFail($id);
        $transactionstatus->name = $request->name;
        $transactionstatus->description =$request->description;
        $transactionstatus->note =$request->note;
        $transactionstatus->save();
        
        
        $request->session()->flash('message', 'Successfully modified the payment status!');

        return redirect('admin/transactionstatuses/'.$transactionstatus->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Wezaworkshop\Documenttype 
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transactionstatus $transactionstatus)
    {
        //
        $transactionstatus->delete();
        return redirect('admin/transactionstatuses');
    }
}
