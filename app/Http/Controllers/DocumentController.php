<?php

namespace Wezaworkshop\Http\Controllers;

use Wezaworkshop\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;



class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \Wezaworkshop\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
        if(File::exists(base_path() . "/storage/app/" . $document->name)){           
            return response()->download(base_path() . "/storage/app/" . $document->name);
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Wezaworkshop\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Wezaworkshop\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Wezaworkshop\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //

        if(File::exists(base_path() . "/storage/app/" . $document->name)){
           File::delete(base_path() . "/storage/app/" . $document->name);
        }
        $document->delete();
        return redirect('admin/orders/');
        //return redirect('admin/orders/' . $order->id . '/edit');
    }
}
