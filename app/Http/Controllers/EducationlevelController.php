<?php

namespace Wezaworkshop\Http\Controllers;

use Wezaworkshop\Educationlevel;
use Illuminate\Http\Request;

class EducationlevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $educationlevels = Educationlevel::all();
        return view('admin.educationlevels.index', compact('educationlevels'));
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
        return view('admin.educationlevels.create');
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

        $educationlevel = new Educationlevel;
        $educationlevel->name = $request->name;
        $educationlevel->description = $request->description;
        $educationlevel->note = $request->note;
        $educationlevel->save();

        return redirect('admin/educationlevels');


    }

    /**
     * Display the specified resource.
     *
     * @param  \Wezaworkshop\Educationlevel  $educationlevel
     * @return \Illuminate\Http\Response
     */
    public function show(Educationlevel $educationlevel)
    {
        //
        //$education = Educationlevel::find($id);
        //echo $educationlevel->name;
        //dd($educationlevel);
        return view('admin.educationlevels.show',compact('educationlevel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Wezaworkshop\Educationlevel  $educationlevel
     * @return \Illuminate\Http\Response
     */
    public function edit(Educationlevel $educationlevel)
    {
        //
       // $educationlevel = Educationlevel::find($id);
        return view('admin.educationlevels.edit',compact('educationlevel'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Wezaworkshop\Educationlevel  $educationlevel
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, Educationlevel $educationlevel)
    public function update(Request $request, $id)

    {
        //
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'note'=>'required',

        ]);

        $educationlevel = Educationlevel::findOrFail($id);
        /*
        $educationlevel->fill($request->all());
        $educationlevel->save();
        */

        $educationlevel->name = $request->name;
        $educationlevel->description =$request->description;
        $educationlevel->note =$request->note;
        $educationlevel->save();
        
        
        $request->session()->flash('message', 'Successfully modified the level!');

        return redirect('admin/educationlevels/'.$educationlevel->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Wezaworkshop\Educationlevel  $educationlevel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Educationlevel $educationlevel)
    {
        //
        $educationlevel->delete();
        return redirect('admin/educationlevels');
    }
}
