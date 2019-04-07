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
  <p>You are viewing an existing message</p>

  </div>
  <div class="card-body">

        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif


 <div class="row">
        <div class="col-lg-12 margin-tb">
       
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('conversations.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col">
            <div class="form-group">
                <strong>Topic:</strong>
                {{ $conversation->topic }}
            </div>
    
            <div class="form-group">
                <strong>Status:</strong>
                {{ $conversation->description }}
            </div>
       
            <div class="form-group">
                <strong>Sender:</strong>
                {{ $conversation->user_1 }}
            </div>

            <div class="form-group">
                <strong>Recipient:</strong>
                {{ $conversation->user_2 }}
            </div>
     
            <div class="form-group">
                <strong>Order:</strong>
                {{ $conversation->order_id }}
            </div>
        </div>


    </div>
         
        {{ Form::open(array( 'method' => 'delete', 'url' => 'admin/conversations/'.$conversation->id, 'onsubmit' => 'return ConfirmDelete()')) }}
                  {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) }}
                  {{ Form::close() }}
    </div>





    </div>
    </div>


@endsection