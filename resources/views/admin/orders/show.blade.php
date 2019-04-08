@extends('layouts.admin.side')

@section('content')

<div class="col-sm-9 ">
<script>
function ConfirmDelete(){
return confirm('Are you sure?');
}
</script>

<div class="card uper" style="margin-bottom:50px;">
  <div class="card-header" >
  <p>You are viewing an existing order</p>

  </div>
  <div class="card-body">

        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif


 <div class="row">
        <div class="col-lg-12 margin-tb">
       
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('orders.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col">
            <div class="form-group"><strong>Topic:</strong>
                {{ $order->topic }}
            </div>
            <div class="form-group"><strong>Customer:</strong>
                {{ $order->customer_id }}
            </div>
            <div class="form-group"><strong>merchant_id:</strong>
                {{ $order->merchant_id }}
            </div>

            <div class="form-group"> <strong>orderstatus_id:</strong>
                {{ $order->orderstatus_id }}
            </div>
            <div class="form-group"> <strong>typeofwork_id:</strong>
                {{ $order->typeofwork_id }}
            </div>
        </div>
        <div class="col">
            <div class="form-group"><strong>Sources:</strong>
                {{ $order->sources }}
            </div>
            <div class="form-group"><strong>provide_sources:</strong>
                {{ $order->provide_sources }}
            </div>
            <div class="form-group"><strong>educationlevel_id:</strong>
                {{ $order->educationlevel_id }}
            </div>

            <div class="form-group"> <strong>spacing:</strong>
                {{ $order->spacing }}
            </div>
            <div class="form-group"> <strong>preferred_writer:</strong>
                {{ $order->preferred_writer }}
            </div>
        </div>
        <div class="col">
            <div class="form-group"><strong>support_note:</strong>
                {{ $order->support_note }}
            </div>
            <div class="form-group"><strong>short_description:</strong>
                {{ $order->short_description }}
            </div>
            <div class="form-group"><strong>transactionstatus_idt:</strong>
                {{ $order->transactionstatus_id }}
            </div>

            <div class="form-group"> <strong>price:</strong>
                {{ $order->price }}
            </div>
            <div class="form-group"> <strong>pages:</strong>
                {{ $order->pages }}
            </div>
        </div>
        </div>
        <div class="row">

        <div class="col">

            <div class="form-group"> <strong>slides:</strong>
                {{ $order->slides }}
            </div>
            <div class="form-group"> <strong>cost:</strong>
                {{ $order->cost }}
            </div>
            <div class="form-group"> <strong>deadline:</strong>
                {{ $order->deadline }}
            </div>
            <div class="form-group"> <strong>assigned_at:</strong>
                {{ $order->assigned_at }}
            </div>
            <div class="form-group"> <strong>completed:</strong>
                {{ $order->complated_at }}
            </div>
            <div class="form-group"> <strong>customer_paid:</strong>
                {{ $order->customer_paid }}
            </div>
        </div>
        <div class="col">
            <div class="form-group"> <strong>merchant_paid:</strong>
                {{ $order->merchant_paid }}
            </div>
            <div class="form-group"> <strong>preview:</strong>
                {{ $order->preview }}
            </div>
            <div class="form-group"> <strong>preview_link:</strong>
                {{ $order->preview_link }}
            </div>
            <div class="form-group"> <strong>urgent:</strong>
                {{ $order->urgent }}
            </div>
            <div class="form-group"> <strong>rating_by_customer:</strong>
                {{ $order->rating_by_customer }}
            </div>
            <div class="form-group"> <strong>rating_by_merchant:</strong>
                {{ $order->rating_by_merchant }}
            </div>
        </div>
        </div>


    </div>
         
        {{ Form::open(array( 'method' => 'delete', 'url' => 'admin/orders/'.$order->id, 'onsubmit' => 'return ConfirmDelete()')) }}
                  {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) }}
                  {{ Form::close() }}
    </div>





    </div>
    </div>


@endsection