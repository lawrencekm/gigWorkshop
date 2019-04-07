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
  Type of work 
    <a style="float:right;" href="typeofworks/create">
        <button class="btn btn-secondary btn-sm">Create New type of work</button>
    </a>

  </div>
  <div class="card-body">

        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        @if($typeofworks->count() > 0)

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
            @foreach($typeofworks as $typeofwork)
            <tr>
              <th scope="row">{{$typeofwork->id}}</th>
              <td><a href="typeofworks/{{$typeofwork->id}}">{{$typeofwork->name}}</a></td>
              <td>{{$typeofwork->description}}</td>
              <td>{{$typeofwork->note}}</td>
              <td>{{$typeofwork->created_at}}</td>
              <td>{{$typeofwork->updated_at}}</td>

              <td>
              <div class="btn-group" role="group" aria-label="Basic example">
                  <a href="{{ URL::to('admin/typeofworks/' . $typeofwork->id . '/edit') }}">
                        <button type="button" onclick="ConfirmDelete()" class="btn btn-warning btn-sm">Edit</button>
                  </a>&nbsp;
 
                  {{ Form::open(array( 'method' => 'delete', 'url' => 'admin/typeofworks/'.$typeofwork->id, 'onsubmit' => 'return ConfirmDelete()')) }}
                  {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) }}
                  {{ Form::close() }}
              </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @else
            <p>No type of work defined yet! Create one for orders!</p>
        @endif

    </div>
</div>
</div>

@endsection