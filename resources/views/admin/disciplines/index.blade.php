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
  Dicipline <a style="float:right;" href="disciplines/create"><button class="btn btn-secondary btn-sm">Create New Discipline</button></a>

  </div>
  <div class="card-body">

        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        @if($disciplines->count() > 0)

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
            @foreach($disciplines as $discipline)
            <tr>
              <th scope="row">{{$discipline->id}}</th>
              <td><a href="disciplines/{{$discipline->id}}">{{$discipline->name}}</a></td>
              <td>{{$discipline->description}}</td>
              <td>{{$discipline->note}}</td>
              <td>{{$discipline->created_at->toFormattedDateString()}}</td>
              <td>{{$discipline->updated_at->toFormattedDateString()}}</td>

              <td>
              <div class="btn-group" role="group" aria-label="Basic example">
                  <a href="{{ URL::to('admin/disciplines/' . $discipline->id . '/edit') }}">
                        <button type="button" onclick="ConfirmDelete()" class="btn btn-warning btn-sm">Edit</button>
                  </a>&nbsp;
 
                  {{ Form::open(array( 'method' => 'delete', 'url' => 'admin/disciplines/'.$discipline->id, 'onsubmit' => 'return ConfirmDelete()')) }}
                  {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) }}
                  {{ Form::close() }}
              </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @else
            <p>No Discipline defined yet! Create a new discipline that customers can select when placing orders and merchants when indicating proficiency!</p>
        @endif

    </div>
</div>
</div>

@endsection