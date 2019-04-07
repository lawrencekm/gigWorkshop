<?php

namespace Wezaworkshop\Http\Controllers;

use Wezaworkshop\Workingstatus;
use Illuminate\Http\Request;

class WorkingstatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workingstatuses = Workingstatus::all();
        return view('admin.workingstatuses.index', compact('workingstatuses'));
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
        return view('admin.workingstatuses.create');
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

        $workingstatus = new Workingstatus;
        $workingstatus->name = $request->name;
        $workingstatus->description = $request->description;
        $workingstatus->note = $request->note;
        $workingstatus->save();

        return redirect('admin/workingstatuses');

    }

    /**
     * Display the specified resource.
     *
     * @param  \Wezaworkshop\Orderstatus  $educationlevel
     * @return \Illuminate\Http\Response
     */
    public function show(Workingstatus $workingstatus)
    {
        //
        return view('admin.workingstatuses.show',compact('workingstatus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Wezaworkshop\Documenttype
     * @return \Illuminate\Http\Response
     */
    public function edit(Workingstatus $workingstatus)
    {
        //
        return view('admin.workingstatuses.edit',compact('workingstatus'));


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

        $workingstatus = Workingstatus::findOrFail($id);
        $workingstatus->name = $request->name;
        $workingstatus->description =$request->description;
        $workingstatus->note =$request->note;
        $workingstatus->save();
        
        
        $request->session()->flash('message', 'Successfully modified the payment status!');

        return redirect('admin/workingstatuses/'.$workingstatus->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Wezaworkshop\Documenttype 
     * @return \Illuminate\Http\Response
     */
    public function destroy(Workingstatus $workingstatus)
    {
        //
        $workingstatus->delete();
        return redirect('admin/workingstatuses');
    }
}
