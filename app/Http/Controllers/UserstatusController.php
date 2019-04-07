<?php

namespace Wezaworkshop\Http\Controllers;

use Wezaworkshop\Userstatus;
use Illuminate\Http\Request;

class UserstatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userstatuses = Userstatus::all();
        return view('admin.userstatuses.index', compact('userstatuses'));
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
        return view('admin.userstatuses.create');
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

        $userstatus = new Userstatus;
        $userstatus->name = $request->name;
        $userstatus->description = $request->description;
        $userstatus->note = $request->note;
        $userstatus->save();

        return redirect('admin/userstatuses');

    }

    /**
     * Display the specified resource.
     *
     * @param  \Wezaworkshop\Orderstatus  $educationlevel
     * @return \Illuminate\Http\Response
     */
    public function show(Userstatus $userstatus)
    {
        //
        return view('admin.userstatuses.show',compact('userstatus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Wezaworkshop\Documenttype
     * @return \Illuminate\Http\Response
     */
    public function edit(Userstatus $userstatus)
    {
        //
        return view('admin.userstatuses.edit',compact('userstatus'));


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

        $userstatus = Userstatus::findOrFail($id);
        $userstatus->name = $request->name;
        $userstatus->description =$request->description;
        $userstatus->note =$request->note;
        $userstatus->save();
        
        
        $request->session()->flash('message', 'Successfully modified the user status!');

        return redirect('admin/userstatuses/'.$userstatus->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Wezaworkshop\Documenttype 
     * @return \Illuminate\Http\Response
     */
    public function destroy(Userstatus $userstatus)
    {
        //
        $userstatus->delete();
        return redirect('admin/userstatuses');
    }
}
