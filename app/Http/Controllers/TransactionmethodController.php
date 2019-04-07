<?php

namespace Wezaworkshop\Http\Controllers;

use Wezaworkshop\Transactionmethod;
use Illuminate\Http\Request;

class TransactionmethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactionmethods = Transactionmethod::all();
        return view('admin.transactionmethods.index', compact('transactionmethods'));
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
        return view('admin.transactionmethods.create');
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

        $transactionmethod = new Transactionmethod;
        $transactionmethod->name = $request->name;
        $transactionmethod->description = $request->description;
        $transactionmethod->note = $request->note;
        $transactionmethod->save();

        return redirect('admin/transactionmethods');

    }

    /**
     * Display the specified resource.
     *
     * @param  \Wezaworkshop\Orderstatus  $educationlevel
     * @return \Illuminate\Http\Response
     */
    public function show(Transactionmethod $transactionmethod)
    {
        //
        return view('admin.transactionmethods.show',compact('transactionmethod'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Wezaworkshop\Documenttype
     * @return \Illuminate\Http\Response
     */
    public function edit(Transactionmethod $transactionmethod)
    {
        //
        return view('admin.transactionmethods.edit',compact('transactionmethod'));


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

        $transactionmethod = transactionmethod::findOrFail($id);
        $transactionmethod->name = $request->name;
        $transactionmethod->description =$request->description;
        $transactionmethod->note =$request->note;
        $transactionmethod->save();
        
        
        $request->session()->flash('message', 'Successfully modified the transactionmethod!');

        return redirect('admin/transactionmethods/'.$transactionmethod->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Wezaworkshop\Documenttype 
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transactionmethod $transactionmethod)
    {
        //
        $transactionmethod->delete();
        return redirect('admin/transactionmethods');
    }
}
