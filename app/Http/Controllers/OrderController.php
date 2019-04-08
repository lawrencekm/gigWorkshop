<?php

namespace Wezaworkshop\Http\Controllers;

use Wezaworkshop\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
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
        return view('admin.orders.create');
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



        $order = new Order;
        $order->topic = $request->topic;
        $order->customer_id = $request->customer_id;
        $order->merchant_id = $request->merchant_id;
        $order->orderstatus_id = $request->orderstatus_id;
        $order->typeofwork_id = $request->typeofwork_id;
        $order->citation_id = $request->citation_id;
        $order->sources = $request->sources;
        $order->provide_sources = $request->provide_sources;
        $order->educationlevel_id = $request->educationlevel_id;
        $order->spacing = $request->spacing;
        $order->preferred_writer = $request->preferred_writer;
        $order->support_note = $request->support_note;
        $order->short_description = $request->short_description;
        $order->transactionstatus_id = $request->transactionstatus_id;
        $order->price = $request->price;
        $order->pages = $request->pages;
        $order->slides = $request->slides;
        $order->cost = $request->cost;
        $order->deadline = $request->deadline;
        $order->assigned_at = $request->assigned_at;
        $order->completed_at = $request->completed_at;
        $order->customer_paid = $request->customer_paid;
        $order->merchant_paid = $request->merchant_paid;
        $order->preview = $request->preview;
        $order->preview_link = $request->preview_link;
        $order->urgent = $request->urgent;
        $order->rating_by_customer = $request->rating_by_customer;
        $order->rating_by_merchant = $request->rating_by_merchant;
        $order->save();

        return redirect('admin/orders');

    }

    /**
     * Display the specified resource.
     *
     * @param  \Wezaworkshop\Orderstatus  $educationlevel
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
        return view('admin.orders.show',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Wezaworkshop\Documenttype
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
        return view('admin.orders.edit',compact('order'));


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

        $order = Order::findOrFail($id);
        $order->topic = $request->topic;
        $order->customer_id = $request->customer_id;
        $order->merchant_id = $request->merchant_id;
        $order->orderstatus_id = $request->orderstatus_id;
        $order->typeofwork_id = $request->typeofwork_id;
        $order->citation_id = $request->citation_id;
        $order->sources = $request->sources;
        $order->provide_sources = $request->provide_sources;
        $order->educationlevel_id = $request->educationlevel_id;
        $order->spacing = $request->spacing;
        $order->preferred_writer = $request->preferred_writer;
        $order->support_note = $request->support_note;
        $order->short_description = $request->short_description;
        $order->transactionstatus_id = $request->transactionstatus_id;
        $order->price = $request->price;
        $order->pages = $request->pages;
        $order->slides = $request->slides;
        $order->cost = $request->cost;
        $order->deadline = $request->deadline;
        $order->assigned_at = $request->assigned_at;
        $order->completed_at = $request->completed_at;
        $order->customer_paid = $request->customer_paid;
        $order->merchant_paid = $request->merchant_paid;
        $order->preview = $request->preview;
        $order->preview_link = $request->preview_link;
        $order->urgent = $request->urgent;
        $order->rating_by_customer = $request->rating_by_customer;
        $order->rating_by_merchant = $request->rating_by_merchant;
        $order->save();

        
        $request->session()->flash('message', 'Successfully modified the order!');

        return redirect('admin/orders/'.$order->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Wezaworkshop\Documenttype 
     * @return \Illuminate\Http\Response
     */
    public function destroy(order $order)
    {
        //
        $order->delete();
        return redirect('admin/orders');
    }
}
