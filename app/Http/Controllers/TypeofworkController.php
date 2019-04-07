<?php

namespace Wezaworkshop\Http\Controllers;

use Wezaworkshop\Typeofwork;
use Illuminate\Http\Request;

class TypeofworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeofworks = Typeofwork::all();
        return view('admin.typeofworks.index', compact('typeofworks'));
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
        return view('admin.typeofworks.create');
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

        $typeofwork = new Typeofwork;
        $typeofwork->name = $request->name;
        $typeofwork->description = $request->description;
        $typeofwork->note = $request->note;
        $typeofwork->save();

        return redirect('admin/typeofworks');

    }

    /**
     * Display the specified resource.
     *
     * @param  \Wezaworkshop\Orderstatus  $educationlevel
     * @return \Illuminate\Http\Response
     */
    public function show(Typeofwork $typeofwork)
    {
        //
        return view('admin.typeofworks.show',compact('typeofwork'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Wezaworkshop\Documenttype
     * @return \Illuminate\Http\Response
     */
    public function edit(Typeofwork $typeofwork)
    {
        //
        return view('admin.typeofworks.edit',compact('typeofwork'));


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

        $typeofwork = Typeofwork::findOrFail($id);
        $typeofwork->name = $request->name;
        $typeofwork->description =$request->description;
        $typeofwork->note =$request->note;
        $typeofwork->save();
        
        
        $request->session()->flash('message', 'Successfully modified the typeofwork!');

        return redirect('admin/typeofworks/'.$typeofwork->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Wezaworkshop\Documenttype 
     * @return \Illuminate\Http\Response
     */
    public function destroy(Typeofwork $typeofwork)
    {
        //
        $typeofwork->delete();
        return redirect('admin/typeofworks');
    }
}
