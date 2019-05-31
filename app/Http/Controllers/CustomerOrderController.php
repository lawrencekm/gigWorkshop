<?php

namespace Wezaworkshop\Http\Controllers;
use Wezaworkshop\Order;
use Wezaworkshop\Role;
use Wezaworkshop\Document;

use Illuminate\Http\Request;
use DB;
use Auth;
use Illuminate\Support\Facades\Storage;

class CustomerOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('customer.orders.index', compact('orders'));
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
        return view('customer.orders.create');
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

        return redirect('customer/orders');

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
        return view('customer.orders.show',compact('order'));
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
        $educationlevels = DB::table('educationlevels')->pluck('name','id')->toArray();
        $citations = DB::table('citations')->pluck('name','id')->toArray();
        $typeofworks = DB::table('typeofworks')->pluck('name','id')->toArray();
        $orderstatuses = DB::table('orderstatuses')->pluck('name','id')->toArray();
        $merchantRole = Role::where('name','like','merchant')->first();
        $merchants = $merchantRole->users->pluck('firstname','id')->toArray();
        $customerRole = Role::where('name','like','customer')->first();
        $customers = $customerRole->users->pluck('firstname','id')->toArray();
        $transactionstatuses = DB::table('transactionstatuses')->pluck('name','id')->toArray();
        $paymentstatuses = DB::table('paymentstatuses')->pluck('name','id')->toArray();
        $documenttypes = DB::table('documenttypes')->pluck('name','id')->toArray();
        $disciplines = DB::table('disciplines')->pluck('name','id')->toArray();


        $documents = $order->documents;

        $allusers = DB::table('users')->pluck('firstname','id')->toArray();

       // dd($documents);



        


        return view('customer.orders.edit',compact('order','typeofworks','citations','educationlevels','orderstatuses','merchants',
        'customers','transactionstatuses','paymentstatuses','documenttypes','documents','allusers','disciplines'));


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
        $order->discipline_id = $request->discipline_id;
        $order->citation_id = $request->citation_id;
        $order->sources = $request->sources;
        $order->provide_sources = $request->provide_sources;
        $order->educationlevel_id = $request->educationlevel_id;
        $order->spacing = $request->spacing;
        $order->preferred_writer = $request->preferred_writer;
        $order->support_note = $request->support_note;
        $order->short_description = $request->short_description;
        $order->transactionstatus_id = $request->transactionstatus_id;
        $order->paymentstatus_id = $request->paymentstatus_id;
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

        //Storage::put('file.jpg', $contents);
        if($request->hasFile('documents'))
        {
        $allowedfileExtension=['pdf','jpg','png','docx'];
        $files = $request->file('documents');
            foreach($files as $file){
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $check=in_array($extension,$allowedfileExtension);
            //dd($check);
                if($check)
                {
                //$items= Item::create($request->all());
                    foreach ($request->documents as $document) {
                    $filename = $document->store('additional_documents');
                    //dd($filename);
                    /*ItemDetail::create([
                    'item_id' => $items->id,
                    'filename' => $filename
                    ]);*/
                    $document = new Document;
                    $document->order_id = $order->id;
                    $document->user_id = Auth::user()->id;
                    $document->documenttype_id = $request->documenttype_id;
                    $document->name = $filename;
                    $document->description = $filename;
                    $document->note = 'note';
                    //$document->save();

                    $document_id = $document->id;


                    $order->documents()->save($document);

                    
                    }
                //echo "Upload Successfully";
                //$request->session()->flash('message', 'Successfully uploaded!');

                }
            else
            {
            //echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
            }
            }
        }


    
        //or
        //$path = Storage::putFile('avatars', $request->file('avatar'));
       // dd($path;);


        $request->session()->flash('message', 'Successfully modified your order!');

        return redirect('customer/order/'.$order->id.'/edit');

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
        return redirect('customer/orders');
    }

}
