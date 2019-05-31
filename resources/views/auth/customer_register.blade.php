@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Place an order</div>

                <div class="panel-body">                  
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
                        'route' => 'register',
                        'method' => 'post',
                        'files'=> true

                        ]) !!}
            {{ Form::hidden('role', 'customer') }}

<div class="row">
        <div class="form-group col-md-2">
            {!! Form::label('firstname', 'Firstname:', ['class' => 'control-label']) !!}
            {!! Form::text('firstname', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-2" >
            {!! Form::label('lastname', 'Lastname:', ['class' => 'control-label']) !!}
            {!! Form::text('lastname', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-2" >
            {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
            {!! Form::email('email', null, ['class' => 'form-control']) !!}
            </div>
        <div class="form-group col-md-2" >

            {!! Form::label('altemail', 'Alternate Email:', ['class' => 'control-label']) !!}
            {!! Form::email('altemail', null, ['class' => 'form-control']) !!}
        </div>



        <div class="form-group col-md-2">
            {!! Form::label('password', 'Password:', ['class' => 'control-label']) !!}
            {!! Form::password('password', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-2">
            {!! Form::label('password_confirmation', 'Confirm Password:', ['class' => 'control-label']) !!}
            {!! Form::password('password_confirmation', null, ['class' => 'form-control']) !!}
        </div>



</div>





<div class="row">
        <div class="form-group col-md-12">
            {!! Form::label('topic', 'topic:', ['class' => 'control-label']) !!}
            {!! Form::text('topic',null, ['class' => 'form-control']) !!}
        </div>
</div>
<div class="row">


        <div class="form-group col-md-3" >

            {!! Form::label('discipline_id', 'Discipline :', ['class' => 'control-label']) !!}
            {!! Form::select('discipline_id', $disciplines, null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-3">
            {!! Form::label('typeofwork_id', 'Type of work:', ['class' => 'control-label']) !!}
            {!! Form::select('typeofwork_id', $typeofworks, null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-2">
            {!! Form::label('citation_id', 'Citation/Referencing', ['class' => 'control-label']) !!}
            {!! Form::select('citation_id', $citations, null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-2">
            {!! Form::label('provide_sources', 'provide_sources:', ['class' => 'control-label']) !!}<br>
            {!! Form::select('provide_sources', [1=>'yes',2 =>'no'], 2, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-2">
            {!! Form::label('educationlevel_id', 'educationlevel_id:', ['class' => 'control-label']) !!}
            {!! Form::select('educationlevel_id', $educationlevels, null, ['class' => 'form-control']) !!}
        </div>
</div>
<div class="row">

        <div class="form-group col-md-2" >
            {!! Form::label('spacing', 'spacing:', ['class' => 'control-label']) !!}
            {!! Form::select('spacing', [2=>'double',1 =>'single'], 2, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-2">
            {!! Form::label('preferred_writer', 'Preferred writer:', ['class' => 'control-label']) !!}
            {!! Form::select('preferred_writer', $merchants, null, ['class' => 'form-control']) !!}
        </div>

            <div class="form-group col-sm-2">
            {!! Form::label('price', 'Price:', ['class' => 'control-label readonly']) !!}
            <input readonly name='price' id="price" class="form-control" type="number">

            </div>

            <div class="form-group col-sm-2">
            {!! Form::label('pages', 'Pages:', ['class' => 'control-label']) !!}
            <input name='pages' id="pages" value="" class="form-control" type="number" onkeyup="priceCalculator()">
            </div>

            <div class="form-group col-sm-2">
            {!! Form::label('slides', 'Slides:', ['class' => 'control-label']) !!}
            <input name='slides' id="slides" value="" class="form-control" type="number" onkeyup="priceCalculator()">

            </div>

</div>

<div class="row" style="display:none;">

        <div class="form-group col-md-2" >

        {!! Form::label('orderstatus_id', 'Order status:', ['class' => 'control-label']) !!}
        {!! Form::select('orderstatus_id', $orderstatuses, null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-sm-2">
        {!! Form::label('transactionstatus_id', 'Customer Trans:', ['class' => 'control-label']) !!}
        {!! Form::select('transactionstatus_id', $transactionstatuses, 2, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-sm-2">
        {!! Form::label('paymentstatus_id', 'Writer Payment:', ['class' => 'control-label']) !!}
        {!! Form::select('paymentstatus_id', $paymentstatuses, 3, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-2">
            {!! Form::label('customer_paid', 'customer_paid:', ['class' => 'control-label']) !!}
            {!! Form::select('customer_paid',[0 => 'Customer paid for order', 1 => 'Customer Hasnt paid'], 1, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-2">
            {!! Form::label('merchant_paid', 'merchant_paid:', ['class' => 'control-label']) !!}
            {!! Form::select('merchant_paid', [0 => 'Writer Not paid', 1 => 'Writer paid!'], 0, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-2">
            {!! Form::label('cost', 'Cost:', ['class' => 'control-label']) !!}
            {!! Form::number('cost', 10, ['class' => 'form-control']) !!}
        </div>

</div>
<div class="row">

        <div class="form-group col-md-3">
            {!! Form::label('deadline', 'Deadline:', ['class' => 'control-label']) !!}
            {!! Form::date('deadline', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-3">
            {!! Form::label('urgent', 'urgent:', ['class' => 'control-label']) !!}
            {!! Form::select('urgent', [1=>'Urgent!', 2=> 'Not Urgent'],null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-3">
            {!! Form::label('preview', 'preview:', ['class' => 'control-label']) !!}
            {!! Form::select('preview', [0 => 'No preview', 1 => 'Demand preview!'], 0, ['class' => 'form-control']) !!}

        </div>

</div>

<div class="row">

        <div class="form-group col-md-6">
            {!! Form::label('documents', 'Document :', ['class' => 'control-label']) !!}
            <input id="documents" type="file" class="form-control" name="documents[]" multiple />
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('documenttype_id', 'Document type(one document type at a time!):', ['class' => 'control-label']) !!}
            {!! Form::select('documenttype_id', $documenttypes, null, ['class'=>'form-control']) !!}
        </div>
</div>
<div class="row">

        <div class="form-group col-md-12">
            {!! Form::label('short_description', 'short_description for the work and/or attachments uploaded:', ['class' => 'control-label']) !!}
            {!! Form::textarea('short_description', null, ['class' => 'form-control','rows' => "5"]) !!}
            </div>
</div>









{!! Form::submit('Place order', ['class' => 'btn btn-secondary']) !!}
<input style="float:right;" type="reset">

{!! Form::close() !!}





                </div>
            </div>
        </div>
    </div>
</div>

<script>
function priceCalculator(){
    let  pages = document.getElementById("pages").value;
    let  slides = document.getElementById("slides").value;
    let  price = parseInt(pages, 10) + parseInt(slides, 10);
   
    document.getElementById('price').value = price;
}
(priceCalculator());
</script>
@endsection
