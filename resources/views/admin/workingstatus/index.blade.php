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
  Working status <a style="float:right;" href="workingstatuses/create"><button class="btn btn-secondary btn-sm">Create New working status</button></a>

  </div>
  <div class="card-body">

        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        @if($workingstatuses->count() > 0)

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
            @foreach($workingstatuses as $workingstatus)
            <tr>
              <th scope="row">{{$workingstatus->id}}</th>
              <td><a href="workingstatuses/{{$workingstatus->id}}">{{$workingstatus->name}}</a></td>
              <td>{{$workingstatus->description}}</td>
              <td>{{$workingstatus->note}}</td>
              <td>{{$workingstatus->created_at->toFormattedDateString()}}</td>
              <td>{{$workingstatus->updated_at->toFormattedDateString()}}</td>

              <td>
              <div class="btn-group" role="group" aria-label="Basic example">
                  <a href="{{ URL::to('admin/workingstatuses/' . $workingstatus->id . '/edit') }}">
                        <button type="button" onclick="ConfirmDelete()" class="btn btn-warning btn-sm">Edit</button>
                  </a>&nbsp;
 
                  {{ Form::open(array( 'method' => 'delete', 'url' => 'admin/workingstatuses/'.$workingstatus->id, 'onsubmit' => 'return ConfirmDelete()')) }}
                  {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) }}
                  {{ Form::close() }}
              </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @else
            <p>No working status defined yet! Create one for merchants!</p>
        @endif

    </div>
</div>
</div>

@endsection