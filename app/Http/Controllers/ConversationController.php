<?php

namespace Wezaworkshop\Http\Controllers;

use Wezaworkshop\Conversation;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conversations = Conversation::all();
        return view('admin.conversations.index', compact('conversations'));
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
        $recipient_list = ['customer','support','writer','finance'];
        return view('admin.conversations.create',compact('recipient_list'));
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

        $conversation = new Conversation;
        $conversation->topic = $request->topic;
        $conversation->status = $request->status;
        $conversation->user_1 = $request->user_1;
        $conversation->user_2 = $request->user_2;
        $conversation->order_id = $request->order_id;
        $conversation->message = $request->message;
        $conversation->save();

        return redirect('admin/conversations');

    }

    /**
     * Display the specified resource.
     *
     * @param  \Wezaworkshop\Orderstatus  $educationlevel
     * @return \Illuminate\Http\Response
     */
    public function show(Conversation $conversation)
    {
        //
        //$education = Educationlevel::find($id);
        return view('admin.documenttypes.show',compact('conversation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Wezaworkshop\Documenttype
     * @return \Illuminate\Http\Response
     */
    public function edit(Conversation $conversation)
    {
        //
        $recipient_list = ['customer','support','writer','finance'];
        return view('admin.conversations.edit',compact('conversation','recipient_list'));


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

        $conversation = Conversation::findOrFail($id);
        $conversation->name = $request->name;
        $conversation->description =$request->description;
        $conversation->note =$request->note;
        $conversation->save();
        
        
        $request->session()->flash('message', 'Successfully modified the payment method!');

        return redirect('admin/conversations/'.$documenttype->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Wezaworkshop\Documenttype 
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conversation $conversation)
    {
        //
        $conversation->delete();
        return redirect('admin/conversations');
    }
}
