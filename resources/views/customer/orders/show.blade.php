
@extends('layouts.merchant.side')

@section('content')


<div class="col-sm-9">

 

      <div class="container">
    
                <div class="panel-heading">Orders</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>            
    </div>


<div class="card uper" style="margin-bottom:50px;">
  <div class="card-header" >
  <p>You are reviewing your order</p>

  </div>
  <div class="card-body">

        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

 <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{URL::to('merchant/merchant/' ) }}"> Back</a>
            </div>
        </div>
</div>

   
   

    <div class="row">
        <div class="col">
            <p><strong>Topic:</strong> {{ $order->topic }}<br>
            <strong>Customer:</strong>  {{ $order->customer_id }} <br>
            <strong>merchant_id:</strong> {{ $order->merchant_id }} <br>
            <strong>orderstatus_id:</strong>{{ $order->orderstatus_id }} <br>
            <strong>typeofwork_id:</strong> {{ $order->typeofwork_id }} <br>
            <strong>Sources:</strong>{{ $order->sources }} <br>
            <strong>provide_sources:</strong> {{ $order->provide_sources }} <br>
            <strong>educationlevel_id:</strong> {{ $order->educationlevel_id }} <br>
            <strong>spacing:</strong>{{ $order->spacing }} <br>
            <strong>preferred_writer:</strong> {{ $order->preferred_writer }} <br>
        </div>
        <div class="col">
            <strong>support_note:</strong>{{ $order->support_note }}  <br>
            <strong>short_description:</strong>{{ $order->short_description }} <br>
            <strong>transactionstatus_idt:</strong>{{ $order->transactionstatus_id }} <br>
            <strong>price:</strong>{{ $order->price }} <br>
            <strong>pages:</strong>{{ $order->pages }} <br>
            <strong>slides:</strong>{{ $order->slides }} <br>
            <strong>cost:</strong>{{ $order->cost }} <br>
            <strong>deadline:</strong> {{ $order->deadline }} <br>
            <strong>assigned_at:</strong>{{ $order->assigned_at }} <br>
            <strong>completed:</strong>{{ $order->complated_at }} <br>
        </div>
        <div class="col">
            <strong>customer_paid:</strong>{{ $order->customer_paid }} <br>
            <strong>merchant_paid:</strong>{{ $order->merchant_paid }} <br>
            <strong>preview:</strong>{{ $order->preview }} <br>
            <strong>preview_link:</strong>{{ $order->preview_link }} <br>
            <strong>urgent:</strong>{{ $order->urgent }} <br>
            <strong>rating_by_customer:</strong>{{ $order->rating_by_customer }} <br>
            <strong>rating_by_merchant:</strong>{{ $order->rating_by_merchant }} <br>
        </div>
    </div>
    
    <div class="row">

    </div>


    </div>

            {!! Form::open(array('method'=>'GET',
                                'action' => array(
                                                'Merchant\MerchantController@take', $order->id))) !!}
            {{ Form::submit('Take', ['class' => 'btn btn-success btn-sm']) }}
            {{ Form::close() }}
    </div>










</div>


</div>



<script>
function confirmTake(){
  return confirm('Take and start working on the order?')
}
</script>


@endsection