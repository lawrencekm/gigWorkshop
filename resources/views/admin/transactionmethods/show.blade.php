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
  <p>You are viewing an existing transaction method</p>

  </div>
  <div class="card-body">

        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif


 <div class="row">
        <div class="col-lg-12 margin-tb">
       
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('transactionmethods.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $transactionmethod->name }}
            </div>
    
            <div class="form-group">
                <strong>Description:</strong>
                {{ $transactionmethod->description }}
            </div>
       
            <div class="form-group">
                <strong>Created at:</strong>
                {{ $transactionmethod->created_at }}
            </div>

            <div class="form-group">
                <strong>Note:</strong>
                {{ $role->note }}
            </div>
     
            <div class="form-group">
                <strong>Modified at:</strong>
                {{ $transactionmethod->created_at }}
            </div>
        </div>


    </div>
         
        {{ Form::open(array( 'method' => 'delete', 'url' => 'admin/transactionmethods/'.$transactionmethod->id, 'onsubmit' => 'return ConfirmDelete()')) }}
                  {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) }}
                  {{ Form::close() }}
    </div>





    </div>
    </div>


@endsection