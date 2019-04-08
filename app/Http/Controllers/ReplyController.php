<?php

namespace Wezaworkshop\Http\Controllers;

use Wezaworkshop\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $conversation_id = $request->input('conversation_id');
        $conversation_topic = $request->input('conversation_topic');
        $replies = Reply::where('conversation_id','=',$conversation_id)->orderBy('created_at','desc')->get();
        return view('admin.replies.index', compact('replies','conversation_id','conversation_topic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $conversation_id = $request->input('conversation_id');
        $recipient_list = ['customer','support','writer','finance'];
        return view('admin.replies.create',compact('recipient_list','conversation_id'));
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
        /*
        $request->validate([
            'name'=>'required',
            'description'=> 'required',
            'note'=> 'required'

        ]);
        */

        $reply = new Reply;
        $reply->status = $request->status;
        $reply->conversation_id = $request->conversation_id;
        $reply->user_id = $request->user_id;
        $reply->message = $request->message;
        $reply->save();

        $request->session()->flush('message','Message sent successfully');

        return redirect('admin/conversations');

    }

    /**
     * Display the specified resource.
     *
     * @param  \Wezaworkshop\Orderstatus  $educationlevel
     * @return \Illuminate\Http\Response
     */
    public function show(reply $reply)
    {
        //
        //$education = Educationlevel::find($id);
        return view('admin.replies.show',compact('reply'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Wezaworkshop\Documenttype
     * @return \Illuminate\Http\Response
     */
    public function edit(reply $reply)
    {
        //
        $recipient_list = ['customer','support','writer','finance'];
        return view('admin.replies.edit',compact('reply','recipient_list'));


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
        /*
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'note'=>'required',

        ]);
        */


        $reply = Reply::findOrFail($id);
        $reply->status = $request->status;
        $reply->reply_id = $request->reply_id;
        $reply->user_id = $request->user_id;
        $reply->message = $request->message;
        $reply->save();
        
        
        $request->session()->flash('message', 'Successfully modified the message');

        return redirect('admin/replies/'.$reply->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Wezaworkshop\Documenttype 
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reply $reply)
    {
        //
        $reply->delete();
        return redirect('admin/replies');
    }
}
