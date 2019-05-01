<?php

namespace Wezaworkshop\Http\Controllers\Customer;

use Wezaworkshop\Models\Customer\Customer;
use Wezaworkshop\Order;
use Auth;
use DB;
use Illuminate\Http\Request;
use Wezaworkshop\Http\Controllers\Controller;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $educationlevels = DB::table('educationlevels')->pluck('name','id')->toArray();
        $citations = DB::table('citations')->pluck('name','id')->toArray();
        $typeofworks = DB::table('typeofworks')->pluck('name','id')->toArray();
    

        $orders = Order::all();
        $currentOrders = Order::where('customer_id',Auth::user()->id)->get();
        $revisionOrders = Order::where('customer_id',Auth::user()->id)->get();
        $disputeOrders = Order::where('customer_id',Auth::user()->id)->get();
        $cancelledOrders = Order::where('customer_id',Auth::user()->id)->get();
        $completedOrders =Order::where('customer_id',Auth::user()->id)->get();

        return view('customer.dashboard', compact('educationlevels','citations','typeofworks','orders','currentOrders','revisionOrders','disputeOrders','cancelledOrders','completedOrders'));
    
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
        $order = new Order;
        $order->topic = $request->topic;
        $order->customer_id = Auth::user()->id;
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
        $order->price = 100;
        $order->pages = $request->pages;
        $order->slides = $request->slides;
        $order->cost = 50;
        $order->deadline = $request->deadline;
        $order->assigned_at = $request->assigned_at;
        $order->completed_at = $request->completed_at;
        $order->customer_paid = 0;
        $order->merchant_paid = 0;
        $order->preview = $request->preview;
        $order->preview_link = $request->preview_link;
        $order->urgent = $request->urgent;
        $order->rating_by_customer = $request->rating_by_customer;
        $order->rating_by_merchant = 0;
        $order->save();

        $request->session()->flash('message', 'You have Successfully placed an order! A freelancer will be assigned ASAP');
        return redirect('customer/customer');

    }

    /**
     * Display the specified resource.
     *
     * @param  \Wezaworkshop\Models\Customer\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $order = Order::findOrFail($id);
        return view('customer.orders.show',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Wezaworkshop\Models\Customer\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Wezaworkshop\Models\Customer\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Wezaworkshop\Models\Customer\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
