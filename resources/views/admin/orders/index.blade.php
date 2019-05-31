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
orders    <a style="float:right;" href="orders/create">
        <button class="btn btn-secondary btn-sm">Create New order</button>
    </a>

  </div>
  <div class="card-body">

        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        @if($orders->count() > 0)

        <table class="table table-striped table-sm table-responsive">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <th scope="col">Description</th>
              <th scope="col">Note</th>
              <th scope="col">Created</th>
              <th scope="col">Created</th>
              <th scope="col">Modified</th>
              <th scope="col">Action</th>

            </tr>
          </thead>
          <tbody>
            @foreach($orders as $order)
            <tr>
              <td scope="row">{{$order->id}}</td>
              <td><a href="orders/{{$order->id}}">{{$order->name}}</a></td>
              <td>{{$order->topic}}</td>
              <td>{{$order->customer_id}}</td>
              <td>{{$order->merchant_id}}</td>
              <td>{{$order->created_at}}</td>
              <td>{{$order->updated_at}}</td>

              <td>
              <div class="btn-group" role="group" aria-label="Basic example">
                  <a href="{{ URL::to('admin/orders/' . $order->id . '/edit') }}">
                        <button type="button" onclick="ConfirmDelete()" class="btn btn-warning btn-sm">Review</button>
                  </a>&nbsp;
 
                  {{ Form::open(array( 'method' => 'delete', 'url' => 'admin/orders/'.$order->id, 'onsubmit' => 'return ConfirmDelete()')) }}
                  {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) }}
                  {{ Form::close() }}
              </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @else
            <p>No order for the market!</p>
        @endif

    </div>
</div>
</div>

@endsection