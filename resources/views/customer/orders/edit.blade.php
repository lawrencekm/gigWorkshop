@extends('layouts.customer.side')

@section('content')

<div class="col-sm-9 ">
<script>
function ConfirmDelete(){
return confirm('Are you sure?');
}
</script>

<div class="card uper" style="margin-bottom:50px;">
  <div class="card-header" >
  You are editing your existing order</button></a>

  </div>
  <div class="card-body">

        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

           {!! Form::open(array('method'=>'PUT',
                                'action' => array('CustomerOrderController@update',$order->id),
                                'files'=> true,

                              )
                        ) !!}
  

      <div class="row">
        <div class="form-group col-md-12">
            {!! Form::label('topic', 'topic:', ['class' => 'control-label']) !!}
            {!! Form::text('topic', $order->topic, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="row">

        <div class="form-group col-md-2" >
            {!! Form::label('merchant_id', 'Merchant ID:', ['class' => 'control-label']) !!}
            {!! Form::text('merchant_id', $order->merchant_id, ['class' => 'form-control',"readonly"]) !!}
        </div>
        <div class="form-group col-md-2" >

            {!! Form::label('orderstatus_id', 'Order status:', ['class' => 'control-label']) !!}
            {!! Form::select('orderstatus_id', $orderstatuses, $order->orderstatus_id, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-2" >

            {!! Form::label('discipline_id', 'Discipline :', ['class' => 'control-label']) !!}
            {!! Form::select('discipline_id', $disciplines, $order->discipline_id, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-2">
            {!! Form::label('sources', 'No. of sources:', ['class' => 'control-label']) !!}
            {!! Form::number('sources', $order->sources, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-2" >
            {!! Form::label('provide_sources', 'provide_sources:', ['class' => 'control-label']) !!}<br>
            {!! Form::select('provide_sources', [1=>'yes',2 =>'no'], $order->provide_sources, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-2">
            {!! Form::label('preferred_writer', 'Preferred writer:', ['class' => 'control-label']) !!}
            {!! Form::select('preferred_writer', $merchants, $order->preferred_writer, ['class' => 'form-control']) !!}
        </div>
</div>
<div class="row">
        <div class="form-group col">
            {!! Form::label('typeofwork_id', 'Type of work:', ['class' => 'control-label']) !!}
            {!! Form::select('typeofwork_id', $typeofworks, $order->typeofwork->id, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('citation_id', 'Citation/Referencing', ['class' => 'control-label']) !!}
            {!! Form::select('citation_id', $citations, $order->citation->id, ['class' => 'form-control']) !!}
        </div>


        <div class="form-group col">
            {!! Form::label('educationlevel_id', 'educationlevel_id:', ['class' => 'control-label']) !!}
            {!! Form::select('educationlevel_id', $educationlevels, $order->educationlevel_id, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('spacing', 'spacing:', ['class' => 'control-label']) !!}
            {!! Form::select('spacing', [2=>'double',1 =>'single'], $order->spacing, ['class' => 'form-control']) !!}

        </div>



</div>
<div class="row">
        <div class="form-group col-md-4">
            {!! Form::label('support_note', 'Support Note:', ['class' => 'control-label']) !!}
            {!! Form::textarea('support_note', $order->support_note, ['class' => 'form-control','rows' => "2"]) !!}
        </div>
        <div class="form-group col-2">
         Assigned at: {{  strtotime($order->assigned_at) }}
         Completed at:   {{ strtotime($order->completed_at) }}
        </div>
        <div class="form-group col-sm-2">
            {!! Form::label('price', 'Price:', ['class' => 'control-label readonly']) !!}
            <input readonly name='price' id="price" class="form-control" type="number">

            </div>

            <div class="form-group col-sm-2">
            {!! Form::label('pages', 'Pages:', ['class' => 'control-label']) !!}
            <input name='pages' id="pages" value="{{$order->pages}}" class="form-control" type="number" onkeyup="priceCalculator()">
            </div>

            <div class="form-group col-sm-2">
            {!! Form::label('slides', 'Slides:', ['class' => 'control-label']) !!}
            <input name='slides' id="slides" value="{{$order->slides}}" class="form-control" type="number" onkeyup="priceCalculator()">

            </div>

</div>
<div class="row">
        <div class="form-group col">
            {!! Form::label('short_description', 'short_description for the work and/or attachments uploaded:', ['class' => 'control-label']) !!}
            {!! Form::textarea('short_description', $order->short_description, ['class' => 'form-control','rows' => "4"]) !!}
            </div>
</div>


<div class="row">


        <div class="form-group col">
            {!! Form::label('deadline', 'Deadline:', ['class' => 'control-label']) !!}
            {!! Form::date('deadline', date('Y-m-d',strtotime($order->deadline)), ['class' => 'form-control']) !!}
        </div>



        <div class="form-group col">
            {!! Form::label('preview', 'preview:', ['class' => 'control-label']) !!}
            {!! Form::select('preview', [0 => 'No preview', 1 => 'Demand preview!'], $order->preview, ['class' => 'form-control']) !!}

        </div>

        <div class="form-group col">
            {!! Form::label('urgent', 'urgent:', ['class' => 'control-label']) !!}
            {!! Form::select('urgent', [1=>'Urgent!', 2=> 'Not Urgent'],$order->urgent, ['class' => 'form-control']) !!}
            
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-2">
            {!! Form::label('rating_by_customer', 'Rate merchant', ['class' => 'control-label']) !!}
            <input id="rating_by_customer" class="form-control" type="number" name="rating_by_customer" value="{{$order->rating_by_customer}}" min="0" max="5">

        </div>
        <div class="form-group col-md-2">
        {!! Form::label('rating_by_merchant', 'Merchant rating ', ['class' => 'control-label']) !!}
        {!! Form::number('rating_by_merchant', $order->rating_by_merchant, ['class' => 'form-control','readonly']) !!}


        </div>



        <div class="form-group col">
        {!! Form::label('documents', 'Document :', ['class' => 'control-label']) !!}
        <input id="documents" type="file" class="form-control" name="documents[]" multiple />
        </div>


        <div class="form-group col">
            {!! Form::label('documenttype_id', 'Document type(one per batch):', ['class' => 'control-label']) !!}
            {!! Form::select('documenttype_id', $documenttypes, null, ['class'=>'form-control']) !!}
        </div>
    </div>


        {!!  Form::submit('Modify order details',['class'=>'btn btn-secondary']) !!}
        <input type="reset" style="float:right;">
        {!!  Form::close() !!}






    </div>


</div>



<div>
    
    @if($documents->count() > 0)
    <p><strong>All Documents uploaded for this order are listed below</strong></p>
        @foreach($documents as $document)
        <div style="margin:10px;">
        <img src="/{{base_path() . '/storage/app/' . $document->name}}" height="42" width="42">

       <a href="/index.php/admin/documents/{{$document->id}}">Download</a>

       {{$document->created_at}}|
       {{$document->id}} |
       {!! Form::select('innner_documenttype_id', $documenttypes, $document->documenttype_id) !!}
       Uploaded by:
       {!! Form::select('innner_documenttype_id', $allusers, $document->user_id) !!}

        
        <div class="btn-group" role="group" aria-label="Basic example">

            {{ Form::open(array( 'method' => 'delete', 'url' => 'customer/documents/'.$document->id, 'onsubmit' => 'return ConfirmDelete()')) }}
            {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) }}
            {{ Form::close() }}
        </div>
        </div>

        @endforeach

@else
    <p>No documents yet!</p>
@endif
  
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