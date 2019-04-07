<?php

namespace Wezaworkshop\Http\Controllers;

use Wezaworkshop\Citation;
use Illuminate\Http\Request;

class CitationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citations = Citation::all();
        return view('admin.citations.index', compact('citations'));
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
        return view('admin.citations.create');
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

        $citation = new Citation;
        $citation->name = $request->name;
        $citation->description = $request->description;
        $citation->note = $request->note;
        $citation->save();

        return redirect('admin/citations');


    }

    /**
     * Display the specified resource.
     *
     * @param  \Wezaworkshop\Citations  $educationlevel
     * @return \Illuminate\Http\Response
     */
    public function show(Citation $citation)
    {
        //
        //$education = Educationlevel::find($id);
        //echo $educationlevel->name;
        //dd($educationlevel);
        return view('admin.citations.show',compact('citation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Wezaworkshop\Citation  $educationlevel
     * @return \Illuminate\Http\Response
     */
    public function edit(Citation $citation)
    {
        //
        return view('admin.citations.edit',compact('citation'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Wezaworkshop\Citation  $educationlevel
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

        $citation = Citation::findOrFail($id);
        $citation->name = $request->name;
        $citation->description =$request->description;
        $citation->note =$request->note;
        $citation->save();
        
        
        $request->session()->flash('message', 'Successfully modified the Citation!');

        return redirect('admin/citations/'.$citation->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Wezaworkshop\Citation  $educationlevel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Citation $citation)
    {
        //
        $citation->delete();
        return redirect('admin/citations');
    }
}
