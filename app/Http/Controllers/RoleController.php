<?php

namespace Wezaworkshop\Http\Controllers;

use Wezaworkshop\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * */
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
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
        return view('admin.roles.create');
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

        $role = new Role;
        $role->name = $request->name;
        $role->description = $request->description;
        $role->note = $request->note;
        $role->save();

        return redirect('admin/roles');

    }

    /**
     * Display the specified resource.
     *
     * @param  \Wezaworkshop\Orderstatus  $educationlevel
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
        return view('admin.roles.show',compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Wezaworkshop\Documenttype
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
        return view('admin.roles.edit',compact('role'));


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

        $role = Role::findOrFail($id);
        $role->name = $request->name;
        $role->description =$request->description;
        $role->note =$request->note;
        $role->save();
        
        
        $request->session()->flash('message', 'Successfully modified the role!');

        return redirect('admin/roles/'.$role->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Wezaworkshop\Documenttype 
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
        $role->delete();
        return redirect('admin/roles');
    }
}
