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
 Payment method <a style="float:right;" href="paymentmethods/create"><button class="btn btn-secondary btn-sm">Create New Payment method</button></a>

  </div>
  <div class="card-body">

        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        @if($paymentmethods->count() > 0)

        <table class="table table-striped table-sm table-responsive">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <th scope="col">Description</th>
              <th scope="col">Note</th>
              <th scope="col">Created</th>
              <th scope="col">Modified</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($paymentmethods as $paymentmethod)
            <tr>
              <th scope="row">{{$paymentmethod->id}}</th>
              <td><a href="paymentmethods/{{$paymentmethod->id}}">{{$paymentmethod->name}}</a></td>
              <td>{{$paymentmethod->description}}</td>
              <td>{{$paymentmethod->note}}</td>
              <td>{{$paymentmethod->created_at->toFormattedDateString()}}</td>
              <td>{{$paymentmethod->updated_at->toFormattedDateString()}}</td>

              <td>
              <div class="btn-group" role="group" aria-label="Basic example">
                  <a href="{{ URL::to('admin/paymentmethods/' . $paymentmethod->id . '/edit') }}">
                        <button type="button" onclick="ConfirmDelete()" class="btn btn-warning btn-sm">Edit</button>
                  </a>&nbsp;
 
                  {{ Form::open(array( 'method' => 'delete', 'url' => 'admin/paymentmethods/'.$paymentmethod->id, 'onsubmit' => 'return ConfirmDelete()')) }}
                  {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) }}
                  {{ Form::close() }}
              </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @else
            <p>No payment method defined yet! Create a payment method for merchants!</p>
        @endif

    </div>
</div>
</div>

@endsection