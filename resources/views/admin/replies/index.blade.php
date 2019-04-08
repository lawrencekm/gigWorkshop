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
Messages & Replies<a style="float:right;" href="replies/create?conversation_id={{$conversation_id}}"><button class="btn btn-secondary btn-sm">Reply</button></a>

  </div>
  <div class="card-body">

        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

                <p>Topic: {{ $conversation_topic }}</p>            <hr> 

            @foreach($replies as $reply)
            


              Created: {{ $reply->created_at->toFormattedDateString() }} | 
              Modified: {{ $reply->updated_at->toFormattedDateString() }} |
              {{$reply->message}}

              <div class="btn-group" role="group" aria-label="Basic example">
           
                  <a href="{{ URL::to('admin/replies/' . $reply->id . '/edit') }}">
                        <button type="button" onclick="ConfirmDelete()" class="btn btn-warning btn-sm">Edit</button>
                  </a>&nbsp;
 
                  {{ Form::open(array( 'method' => 'delete', 'url' => 'admin/replies/'.$reply->id, 'onsubmit' => 'return ConfirmDelete()')) }}
                  {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) }}
                  {{ Form::close() }}
              </div>
            <hr>
            @endforeach




    </div>
</div>
</div>

@endsection