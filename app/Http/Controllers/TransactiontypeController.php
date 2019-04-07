<?php

namespace Wezaworkshop\Http\Controllers;

use Wezaworkshop\Transactiontype;
use Illuminate\Http\Request;

class TransactiontypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactiontypes = Transactiontype::all();
        return view('admin.transactiontypes.index', compact('transactiontypes'));
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
        return view('admin.transactiontypes.create');
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

        $transactiontype = new Transactiontype;
        $transactiontype->name = $request->name;
        $transactiontype->description = $request->description;
        $transactiontype->note = $request->note;
        $transactiontype->save();

        return redirect('admin/transactiontypes');

    }

    /**
     * Display the specified resource.
     *
     * @param  \Wezaworkshop\Orderstatus  $educationlevel
     * @return \Illuminate\Http\Response
     */
    public function show(Transactiontype $transactiontype)
    {
        //
        return view('admin.transactiontypes.show',compact('transactiontype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Wezaworkshop\Documenttype
     * @return \Illuminate\Http\Response
     */
    public function edit(Transactiontype $transactiontype)
    {
        //
        return view('admin.transactiontypes.edit',compact('transactiontype'));


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

        $transactiontype = Transactiontype::findOrFail($id);
        $transactiontype->name = $request->name;
        $transactiontype->description =$request->description;
        $transactiontype->note =$request->note;
        $transactiontype->save();
        
        
        $request->session()->flash('message', 'Successfully modified the transactiontype!');

        return redirect('admin/transactiontypes/'.$transactiontype->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Wezaworkshop\Documenttype 
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transactiontype $transactiontype)
    {
        //
        $transactiontype->delete();
        return redirect('admin/transactiontypes');
    }
}
