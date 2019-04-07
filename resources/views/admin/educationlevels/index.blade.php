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
  Education Levels <a style="float:right;" href="educationlevels/create"><button class="btn btn-secondary btn-sm">Create New Education Level</button></a>

  </div>
  <div class="card-body">

        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        @if($educationlevels->count() > 0)

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
            @foreach($educationlevels as $educationlevel)
            <tr>
              <th scope="row">{{$educationlevel->id}}</th>
              <td><a href="educationlevels/{{$educationlevel->id}}">{{$educationlevel->name}}</a></td>
              <td>{{$educationlevel->description}}</td>
              <td>{{$educationlevel->note}}</td>
              <td>{{$educationlevel->created_at->toFormattedDateString()}}</td>
              <td>{{$educationlevel->updated_at->toFormattedDateString()}}</td>

              <td>
              <div class="btn-group" role="group" aria-label="Basic example">
                  <a href="{{ URL::to('admin/educationlevels/' . $educationlevel->id . '/edit') }}">
                        <button type="button" onclick="ConfirmDelete()" class="btn btn-warning btn-sm">Edit</button>
                  </a>&nbsp;
 
                  {{ Form::open(array( 'method' => 'delete', 'url' => 'admin/educationlevels/'.$educationlevel->id, 'onsubmit' => 'return ConfirmDelete()')) }}
                  {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) }}
                  {{ Form::close() }}
              </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @else
            <p>No Levels defined yet!. Create a new education level that you can assign merchants to later!</p>
        @endif

    </div>
</div>
</div>

@endsection