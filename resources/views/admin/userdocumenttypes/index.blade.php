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
 User Document type <a style="float:right;" href="userdocumenttypes/create"><button class="btn btn-secondary btn-sm">Create New User document type</button></a>

  </div>
  <div class="card-body">

        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        @if($userdocumenttypes->count() > 0)

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
            @foreach($userdocumenttypes as $userdocumenttype)
            <tr>
              <th scope="row">{{$userdocumenttype->id}}</th>
              <td><a href="userdocumenttypes/{{$userdocumenttype->id}}">{{$userdocumenttype->name}}</a></td>
              <td>{{$userdocumenttype->description}}</td>
              <td>{{$userdocumenttype->note}}</td>
              <td>{{$userdocumenttype->created_at->toFormattedDateString()}}</td>
              <td>{{$userdocumenttype->updated_at->toFormattedDateString()}}</td>

              <td>
              <div class="btn-group" role="group" aria-label="Basic example">
                  <a href="{{ URL::to('admin/userdocumenttypes/' . $userdocumenttype->id . '/edit') }}">
                        <button type="button" onclick="ConfirmDelete()" class="btn btn-warning btn-sm">Edit</button>
                  </a>&nbsp;
 
                  {{ Form::open(array( 'method' => 'delete', 'url' => 'admin/userdocumenttypes/'.$userdocumenttype->id, 'onsubmit' => 'return ConfirmDelete()')) }}
                  {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) }}
                  {{ Form::close() }}
              </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @else
            <p>No User document defined yet! Create a new document type that users can upload to their profile!</p>
        @endif

    </div>
</div>
</div>

@endsection