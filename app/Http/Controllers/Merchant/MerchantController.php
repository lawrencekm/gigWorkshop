<?php

namespace Wezaworkshop\Http\Controllers\Merchant;

//use Wezaworkshop\Models\Merchant\Merchant;
use Wezaworkshop\Order;

use Illuminate\Http\Request;
use Wezaworkshop\Http\Controllers\Controller;
use DB;
use Auth;

class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orders = Order::all();
        $currentOrders = Order::where('merchant_id',Auth::user()->id)->get();
        $revisionOrders = Order::where('merchant_id',Auth::user()->id)->where('status')->get();
        $disputeOrders = Order::where('merchant_id',Auth::user()->id)->get();
        $cancelledOrders = Order::where('merchant_id',Auth::user()->id)->get();
        $completedOrders =Order::where('merchant_id',Auth::user()->id)->get();

        return view('merchant.dashboard', compact('orders','currentOrders','revisionOrders','disputeOrders','cancelledOrders','completedOrders'));
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
     * @param  \Wezaworkshop\Models\Merchant\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order, $id)
    {
        //
        $order = Order::findOrFail($id);
        return view('merchant.orders.show',compact('order'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Wezaworkshop\Models\Merchant\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function edit(Merchant $merchant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Wezaworkshop\Models\Merchant\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Merchant $merchant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Wezaworkshop\Models\Merchant\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Merchant $merchant)
    {
        //
    }

    //custom methods
      /**
     * Set  the specified resource as assigned
     *
     * @param  \Wezaworkshop\Models\Merchant\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function take(Request $request, $id)
    {
        //
        $order = Order::findOrFail($id);
       
        $order->merchant_id = Auth::user()->id;
        $order->assigned_at = date('Y-m-d H:i:s');
        $order->save();
    

        
        $request->session()->flash('message', 'You have Successfully `Self-assigned` the order! Start working on it to beat the deadline and increase chances of 
        being auto assigned');

        return redirect('merchant/merchant/'.$order->id);
    }
}
