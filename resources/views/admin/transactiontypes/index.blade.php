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
  Transaction types 
    <a style="float:right;" href="transactiontypes/create">
        <button class="btn btn-secondary btn-sm">Create New transaction type</button>
    </a>

  </div>
  <div class="card-body">

        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        @if($transactiontypes->count() > 0)

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
            @foreach($transactiontypes as $transactiontype)
            <tr>
              <th scope="row">{{$transactiontype->id}}</th>
              <td><a href="transactiontypes/{{$transactiontype->id}}">{{$transactiontype->name}}</a></td>
              <td>{{$transactiontype->description}}</td>
              <td>{{$transactiontype->note}}</td>
              <td>{{$transactiontype->created_at}}</td>
              <td>{{$transactiontype->updated_at}}</td>

              <td>
              <div class="btn-group" role="group" aria-label="Basic example">
                  <a href="{{ URL::to('admin/transactiontypes/' . $transactiontype->id . '/edit') }}">
                        <button type="button" onclick="ConfirmDelete()" class="btn btn-warning btn-sm">Edit</button>
                  </a>&nbsp;
 
                  {{ Form::open(array( 'method' => 'delete', 'url' => 'admin/transactiontypes/'.$transactiontype->id, 'onsubmit' => 'return ConfirmDelete()')) }}
                  {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) }}
                  {{ Form::close() }}
              </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @else
            <p>No transaction type defined yet! Create a transaction type for your transactions!</p>
        @endif

    </div>
</div>
</div>

@endsection