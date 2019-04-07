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
 Payment status <a style="float:right;" href="paymentstatuses/create"><button class="btn btn-secondary btn-sm">Create New Payment status</button></a>

  </div>
  <div class="card-body">

        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        @if($paymentstatuses->count() > 0)

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
            @foreach($paymentstatuses as $paymentstatus)
            <tr>
              <th scope="row">{{$paymentstatus->id}}</th>
              <td><a href="paymentstatuses/{{$paymentstatus->id}}">{{$paymentstatus->name}}</a></td>
              <td>{{$paymentstatus->description}}</td>
              <td>{{$paymentstatus->note}}</td>
              <td>{{$paymentstatus->created_at->toFormattedDateString()}}</td>
              <td>{{$paymentstatus->updated_at->toFormattedDateString()}}</td>

              <td>
              <div class="btn-group" role="group" aria-label="Basic example">
                  <a href="{{ URL::to('admin/paymentstatuses/' . $paymentstatus->id . '/edit') }}">
                        <button type="button" onclick="ConfirmDelete()" class="btn btn-warning btn-sm">Edit</button>
                  </a>&nbsp;
 
                  {{ Form::open(array( 'method' => 'delete', 'url' => 'admin/paymentstatuses/'.$paymentstatus->id, 'onsubmit' => 'return ConfirmDelete()')) }}
                  {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) }}
                  {{ Form::close() }}
              </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @else
            <p>No payment status defined yet! Create a payment status for transactions!</p>
        @endif

    </div>
</div>
</div>

@endsection