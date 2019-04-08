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
  You are editing an existing order</button></a>

  </div>
  <div class="card-body">

        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

           {!! Form::open(array('method'=>'PUT',
                                'action' => array(
                                                'OrderController@update', $order->id))) !!}
  

      <div class="row">
        <div class="form-group col">
            {!! Form::label('topic', 'topic:', ['class' => 'control-label']) !!}
            {!! Form::text('topic', $order->topic, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col" >
            {!! Form::label('customer_id', 'customer_id:', ['class' => 'control-label']) !!}
            {!! Form::text('customer_id', $order->customer_id, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col" >
            {!! Form::label('merchant_id', 'Merchant:', ['class' => 'control-label']) !!}
            {!! Form::text('merchant_id', $order->merchant_id, ['class' => 'form-control']) !!}
            </div>
        <div class="form-group col" >

            {!! Form::label('orderstatus_id', 'orderstatus_id:', ['class' => 'control-label']) !!}
            {!! Form::text('orderstatus_id', $order->orderstatus_id, ['class' => 'form-control']) !!}
        </div>
</div>
<div class="row">
        <div class="form-group col">
            {!! Form::label('typeofwork_id', 'typeofwork_id:', ['class' => 'control-label']) !!}
            {!! Form::text('typeofwork_id', $order->typeofwork_id, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('citation_id', 'citation_id:', ['class' => 'control-label']) !!}
            {!! Form::password('citation_id', $order->citation_id, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('sources', 'sources:', ['class' => 'control-label']) !!}
            {!! Form::text('sources', $order->sources, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col" >
            {!! Form::label('provide_sources', 'provide_sources:', ['class' => 'control-label']) !!}
            {!! Form::number('provide_sources', $order->provide_sources, ['class' => 'form-control']) !!}
        </div>
</div>
<div class="row">
        <div class="form-group col">
            {!! Form::label('educationlevel_id', 'educationlevel_id:', ['class' => 'control-label']) !!}
            {!! Form::text('educationlevel_id', $order->educationlevel_id, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('spacing', 'spacing:', ['class' => 'control-label']) !!}
            {!! Form::text('spacing', $order->spacing, ['class' => 'form-control']) !!}
        </div>


        <div class="form-group col">
            {!! Form::label('preferred_writer', 'Preferred writer:', ['class' => 'control-label']) !!}
            {!! Form::text('preferred_writer', $order->preferred_writer, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('support_note', 'support_note:', ['class' => 'control-label']) !!}
            {!! Form::text('preferred_writer', $order->preferred_writer, ['class' => 'form-control']) !!}
        </div>
</div>
<div class="row">
        <div class="form-group col">
            {!! Form::label('short_description', 'short_description:', ['class' => 'control-label']) !!}
            {!! Form::text('short_description', $order->short_description, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col">

            {!! Form::label('transactionstatus_id', 'transactionstatus_id:', ['class' => 'control-label']) !!}
            {!! Form::text('transactionstatus_id', $order->transactionstatus_id, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col">

            {!! Form::label('price', 'Price:', ['class' => 'control-label']) !!}
            {!! Form::text('price', $order->price, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col">

            {!! Form::label('pages', 'Pages:', ['class' => 'control-label']) !!}
            {!! Form::text('pages', $order->pages, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col">

            {!! Form::label('slides', 'Slides:', ['class' => 'control-label']) !!}
            {!! Form::text('slides', $order->slides, ['class' => 'form-control']) !!}
            </div>

        </div>

<div class="row">

        <div class="form-group col">
            {!! Form::label('cost', 'Cost:', ['class' => 'control-label']) !!}
            {!! Form::text('cost', $order->cost, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('deadline', 'Deadline:', ['class' => 'control-label']) !!}
            {!! Form::date('deadline', $order->deadline, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('assigned_at', 'assigned_at:', ['class' => 'control-label']) !!}
            {!! Form::date('assigned_at', $order->assigned_at, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('completed_at', 'completed_at:', ['class' => 'control-label']) !!}
            {!! Form::date('completed_at', $order->completed_at, ['class' => 'form-control']) !!}
        </div>
</div>
<div class="row">

        <div class="form-group col">
            {!! Form::label('customer_paid', 'customer_paid:', ['class' => 'control-label']) !!}
            {!! Form::text('customer_paid', $order->customer_paid, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('merchant_paid', 'merchant_paid:', ['class' => 'control-label']) !!}
            {!! Form::text('merchant_paid', $order->merchant_paid, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('preview', 'preview:', ['class' => 'control-label']) !!}
            {!! Form::text('preview', $order->preview, ['class' => 'form-control']) !!}
        </div>
</div>
<div class="row">

        <div class="form-group col">
            {!! Form::label('preview_link', 'preview_link:', ['class' => 'control-label']) !!}
            {!! Form::text('preview_link', $order->preview_link, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('urgent', 'urgent:', ['class' => 'control-label']) !!}
            {!! Form::text('urgent', $order->urgent, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('rating_by_customer', 'rating_by_customer:', ['class' => 'control-label']) !!}
            {!! Form::text('rating_by_customer', $order->rating_by_customer, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('rating_by_merchant', 'rating_by_merchant:', ['class' => 'control-label']) !!}
            {!! Form::text('rating_by_merchant', $order->rating_by_merchant, ['class' => 'form-control']) !!}
        </div>
</div>



        {!!  Form::submit('Modify order details',['class'=>'btn btn-secondary']) !!}
        <input type="reset" style="float:right;">
        {!!  Form::close() !!}


    </div>
</div>
</div>

@endsection