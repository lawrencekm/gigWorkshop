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
  <p>You are viewing an existing Address</p>

  </div>
  <div class="card-body">

        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif


 <div class="row">
        <div class="col-lg-12 margin-tb">
       
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('citations.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col">
            <div class="form-group">
                <strong>Country:</strong>
                {{ $address->country }}
            </div>
    
            <div class="form-group">
                <strong>Country code:</strong>
                {{ $address->country_code }}
            </div>
       
            <div class="form-group">
                <strong>Tel:</strong>
                {{ $address->tel }}
            </div>

            <div class="form-group">
                <strong>City:</strong>
                {{ $address->city }}
            </div>
            <div class="form-group">
                <strong>Zip code:</strong>
                {{ $address->note }}
            </div>
            <div class="form-group">
                <strong>Created:</strong>
                {{ $address->created_at->toFormattedDateString() }}
            </div>
     
            <div class="form-group">
                <strong>Updated:</strong>
                {{ $address->updated_at->toFormattedDateString() }}
            </div>
        </div>


    </div>
         
        {{ Form::open(array( 'method' => 'delete', 'url' => 'admin/addresses/'.$address->id, 'onsubmit' => 'return ConfirmDelete()')) }}
                  {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) }}
                  {{ Form::close() }}
    </div>





    </div>
    </div>


@endsection