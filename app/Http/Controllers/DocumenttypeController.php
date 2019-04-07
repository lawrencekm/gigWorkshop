<?php

namespace Wezaworkshop\Http\Controllers;

use Wezaworkshop\Documenttype;
use Illuminate\Http\Request;

class DocumenttypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documenttypes = Documenttype::all();
        return view('admin.documenttypes.index', compact('documenttypes'));
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
        return view('admin.documenttypes.create');
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

        $documenttype = new Documenttype;
        $documenttype->name = $request->name;
        $documenttype->description = $request->description;
        $documenttype->note = $request->note;
        $documenttype->save();

        return redirect('admin/documenttypes');


    }

    /**
     * Display the specified resource.
     *
     * @param  \Wezaworkshop\Orderstatus  $educationlevel
     * @return \Illuminate\Http\Response
     */
    public function show(Documenttype $documenttype)
    {
        //
        //$education = Educationlevel::find($id);
        return view('admin.documenttypes.show',compact('documenttype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Wezaworkshop\Documenttype
     * @return \Illuminate\Http\Response
     */
    public function edit(Documenttype $documenttype)
    {
        //
        return view('admin.documenttypes.edit',compact('documenttype'));


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

        $documenttype = Documenttype::findOrFail($id);
        $documenttype->name = $request->name;
        $documenttype->description =$request->description;
        $documenttype->note =$request->note;
        $documenttype->save();
        
        
        $request->session()->flash('message', 'Successfully modified the document type!');

        return redirect('admin/documenttypes/'.$documenttype->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Wezaworkshop\Documenttype 
     * @return \Illuminate\Http\Response
     */
    public function destroy(Documenttype $documenttype)
    {
        //
        $documenttype->delete();
        return redirect('admin/documenttypes');
    }
}
