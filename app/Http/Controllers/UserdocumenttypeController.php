<?php

namespace Wezaworkshop\Http\Controllers;

use Wezaworkshop\Userdocumenttype;
use Illuminate\Http\Request;

class UserdocumenttypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userdocumenttypes = Userdocumenttype::all();
        return view('admin.userdocumenttypes.index', compact('userdocumenttypes'));
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
        return view('admin.userdocumenttypes.create');
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

        $userdocumenttype = new Userdocumenttype;
        $userdocumenttype->name = $request->name;
        $userdocumenttype->description = $request->description;
        $userdocumenttype->note = $request->note;
        $userdocumenttype->save();

        return redirect('admin/userdocumenttypes');


    }

    /**
     * Display the specified resource.
     *
     * @param  \Wezaworkshop\Orderstatus  $educationlevel
     * @return \Illuminate\Http\Response
     */
    public function show(Userdocumenttype $userdocumenttype)
    {
        //
        //$education = Educationlevel::find($id);
        //echo $educationlevel->name;
        //dd($educationlevel);
        return view('admin.userdocumenttypes.show',compact('userdocumenttype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Wezaworkshop\Orderstatus  $educationlevel
     * @return \Illuminate\Http\Response
     */
    public function edit(Userdocumenttype $userdocumenttype)
    {
        //
        return view('admin.userdocumenttypes.edit',compact('userdocumenttype'));


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

        $userdocumenttype = Userdocumenttype::findOrFail($id);
        $userdocumenttype->name = $request->name;
        $userdocumenttype->description =$request->description;
        $userdocumenttype->note =$request->note;
        $userdocumenttype->save();
        
        
        $request->session()->flash('message', 'Successfully modified the user document type!');

        return redirect('admin/userdocumenttypes/'.$userdocumenttype->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Wezaworkshop\Orderstatus  $educationlevel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Userdocumenttype $userdocumenttype)
    {
        //
        $userdocumenttype->delete();
        return redirect('admin/userdocumenttypes');
    }
}
