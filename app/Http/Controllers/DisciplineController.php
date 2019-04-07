<?php

namespace Wezaworkshop\Http\Controllers;

use Wezaworkshop\Discipline;
use Illuminate\Http\Request;

class DisciplineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disciplines = Discipline::all();
        return view('admin.disciplines.index', compact('disciplines'));
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
        return view('admin.disciplines.create');
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

        $educationlevel = new Discipline;
        $educationlevel->name = $request->name;
        $educationlevel->description = $request->description;
        $educationlevel->note = $request->note;
        $educationlevel->save();

        return redirect('admin/disciplines');


    }

    /**
     * Display the specified resource.
     *
     * @param  \Wezaworkshop\Educationlevel  $educationlevel
     * @return \Illuminate\Http\Response
     */
    public function show(Discipline $discipline)
    {
        //
        //$education = Educationlevel::find($id);
        //echo $educationlevel->name;
        //dd($educationlevel);
        return view('admin.disciplines.show',compact('discipline'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Wezaworkshop\Educationlevel  $educationlevel
     * @return \Illuminate\Http\Response
     */
    public function edit(Discipline $discipline)
    {
        //
       // $educationlevel = Educationlevel::find($id);
        return view('admin.disciplines.edit',compact('discipline'));


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

        $discipline = Discipline::findOrFail($id);
        $discipline->name = $request->name;
        $discipline->description =$request->description;
        $discipline->note =$request->note;
        $discipline->save();
        
        
        $request->session()->flash('message', 'Successfully modified the discipline!');

        return redirect('admin/disciplines/'.$discipline->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Wezaworkshop\Educationlevel  $educationlevel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discipline $discipline)
    {
        //
        $discipline->delete();
        return redirect('admin/disciplines');
    }
}
