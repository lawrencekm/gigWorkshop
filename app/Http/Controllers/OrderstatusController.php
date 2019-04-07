<?php

namespace Wezaworkshop\Http\Controllers;

use Wezaworkshop\Orderstatus;
use Illuminate\Http\Request;

class OrderstatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderstatuses = Orderstatus::all();
        return view('admin.orderstatuses.index', compact('orderstatuses'));
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
        return view('admin.orderstatuses.create');
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

        $orderstatus = new Orderstatus;
        $orderstatus->name = $request->name;
        $orderstatus->description = $request->description;
        $orderstatus->note = $request->note;
        $orderstatus->save();

        return redirect('admin/orderstatuses');


    }

    /**
     * Display the specified resource.
     *
     * @param  \Wezaworkshop\Orderstatus  $educationlevel
     * @return \Illuminate\Http\Response
     */
    public function show(Orderstatus $orderstatus)
    {
        //
        //$education = Educationlevel::find($id);
        //echo $educationlevel->name;
        //dd($educationlevel);
        return view('admin.orderstatuses.show',compact('orderstatus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Wezaworkshop\Orderstatus  $educationlevel
     * @return \Illuminate\Http\Response
     */
    public function edit(Orderstatus $orderstatus)
    {
        //
        return view('admin.orderstatuses.edit',compact('orderstatus'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Wezaworkshop\Orderstatus  $educationlevel
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

        $orderstatus = Orderstatus::findOrFail($id);
        $orderstatus->name = $request->name;
        $orderstatus->description =$request->description;
        $orderstatus->note =$request->note;
        $orderstatus->save();
        
        
        $request->session()->flash('message', 'Successfully modified the Order Status!');

        return redirect('admin/orderstatuses/'.$orderstatus->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Wezaworkshop\Orderstatus  $educationlevel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orderstatus $orderstatus)
    {
        //
        $orderstatus->delete();
        return redirect('admin/orderstatuses');
    }
}
