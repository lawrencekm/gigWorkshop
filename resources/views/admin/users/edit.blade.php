@extends('layout.admin.side')
@section('content')
    <h1>Edit User</h1>
    <hr>
     <form action="{{url('users', [$user->id])}}" method="POST">
     <input type="hidden" name="_method" value="PUT">
     {{ csrf_field() }}
      <div class="form-group">
        <label for="title">Task Title</label>
        <input type="text" value="{{$user->firstname}}" class="form-control" id="firstname"  name="firstname" >
      </div>
      <div class="form-group">
        <label for="description">Task Description</label>
        <input type="text" value="{{$user->lastname}}" class="form-control" id="lastname" name="lastname" >
      </div>
      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection