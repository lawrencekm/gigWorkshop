@extends('layouts.admin.side')

@section('content')
<div class="col-sm-9">

<div class="card uper" style="margin-bottom:50px;">
  <div class="card-header" >
   Create order 
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
    @endif


{!! Form::open([
    'url' => 'admin/orders',
    'method' => 'post'
    ]) !!}

<div class="row">
        <div class="form-group col">
            {!! Form::label('topic', 'topic:', ['class' => 'control-label']) !!}
            {!! Form::text('topic', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col" >
            {!! Form::label('customer_id', 'customer_id:', ['class' => 'control-label']) !!}
            {!! Form::text('customer_id', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col" >
            {!! Form::label('merchant_id', 'Merchant:', ['class' => 'control-label']) !!}
            {!! Form::text('merchant_id', null, ['class' => 'form-control']) !!}
            </div>
        <div class="form-group col" >

            {!! Form::label('orderstatus_id', 'orderstatus_id:', ['class' => 'control-label']) !!}
            {!! Form::text('orderstatus_id', null, ['class' => 'form-control']) !!}
        </div>
</div>
<div class="row">
        <div class="form-group col">
            {!! Form::label('typeofwork_id', 'typeofwork_id:', ['class' => 'control-label']) !!}
            {!! Form::text('typeofwork_id', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('citation_id', 'citation_id:', ['class' => 'control-label']) !!}
            {!! Form::password('citation_id', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('sources', 'sources:', ['class' => 'control-label']) !!}
            {!! Form::text('sources', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col" >
            {!! Form::label('provide_sources', 'provide_sources:', ['class' => 'control-label']) !!}
            {!! Form::number('provide_sources', null, ['class' => 'form-control']) !!}
        </div>
</div>
<div class="row">
        <div class="form-group col">
            {!! Form::label('educationlevel_id', 'educationlevel_id:', ['class' => 'control-label']) !!}
            {!! Form::text('educationlevel_id', '1995-08-19', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('spacing', 'spacing:', ['class' => 'control-label']) !!}
            {!! Form::text('spacing', null, ['class' => 'form-control']) !!}
        </div>


        <div class="form-group col">
            {!! Form::label('preferred_writer', 'Preferred writer:', ['class' => 'control-label']) !!}
            {!! Form::text('preferred_writer', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('support_note', 'support_note:', ['class' => 'control-label']) !!}
            {!! Form::text('support_note', null, ['class' => 'form-control']) !!}
        </div>
</div>
<div class="row">
        <div class="form-group col">
            {!! Form::label('short_description', 'short_description:', ['class' => 'control-label']) !!}
            {!! Form::text('short_description', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col">

            {!! Form::label('transactionstatus_id', 'transactionstatus_id:', ['class' => 'control-label']) !!}
            {!! Form::text('transactionstatus_id', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col">

            {!! Form::label('price', 'Price:', ['class' => 'control-label']) !!}
            {!! Form::text('price', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col">

            {!! Form::label('pages', 'Pages:', ['class' => 'control-label']) !!}
            {!! Form::text('pages', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col">

            {!! Form::label('slides', 'Slides:', ['class' => 'control-label']) !!}
            {!! Form::text('slides', null, ['class' => 'form-control']) !!}
            </div>

        </div>

<div class="row">

        <div class="form-group col">
            {!! Form::label('cost', 'Cost:', ['class' => 'control-label']) !!}
            {!! Form::text('cost', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('deadline', 'Deadline:', ['class' => 'control-label']) !!}
            {!! Form::date('deadline', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('assigned_at', 'assigned_at:', ['class' => 'control-label']) !!}
            {!! Form::date('assigned_at', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('completed_at', 'completed_at:', ['class' => 'control-label']) !!}
            {!! Form::date('completed_at', null, ['class' => 'form-control']) !!}
        </div>
</div>
<div class="row">

        <div class="form-group col">
            {!! Form::label('customer_paid', 'customer_paid:', ['class' => 'control-label']) !!}
            {!! Form::text('customer_paid', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('merchant_paid', 'merchant_paid:', ['class' => 'control-label']) !!}
            {!! Form::text('merchant_paid', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('preview', 'preview:', ['class' => 'control-label']) !!}
            {!! Form::text('preview', null, ['class' => 'form-control']) !!}
        </div>
</div>
<div class="row">

        <div class="form-group col">
            {!! Form::label('preview_link', 'preview_link:', ['class' => 'control-label']) !!}
            {!! Form::text('preview_link', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('urgent', 'urgent:', ['class' => 'control-label']) !!}
            {!! Form::text('urgent', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('rating_by_customer', 'rating_by_customer:', ['class' => 'control-label']) !!}
            {!! Form::text('rating_by_customer', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('rating_by_merchant', 'rating_by_merchant:', ['class' => 'control-label']) !!}
            {!! Form::text('rating_by_merchant', null, ['class' => 'form-control']) !!}
        </div>
</div>

{!! Form::submit('Create New order', ['class' => 'btn btn-secondary']) !!}
<input style="float:right;" type="reset">

{!! Form::close() !!}






  </div>
</div>

</div>
@endsection