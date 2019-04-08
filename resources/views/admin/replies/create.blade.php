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
  Write a message</button></a>

  </div>
  <div class="card-body">


        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif


        {!! Form::open(['url'=>'admin/replies','method'=>'post']) !!}

        <div class="form-group">
             {!! Form::label('conversation_id','Conversation ID',['class'=>'control-label']) !!}
             {!! Form::text('conversation_id',$conversation_id,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
             {!! Form::label('status','Status',['class'=>'control-label']) !!}
             {!! Form::text('status', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
             {!! Form::label('user_id','user_id',['class'=>'control-label']) !!}
             {!! Form::text('user_id',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
             {!! Form::label('message','Message',['class'=>'control-label']) !!}
             {!! Form::text('message',null,['class'=>'form-control']) !!}
        </div>
        {!!  Form::submit('Reply',['class'=>'btn btn-secondary']) !!}
        <input type="reset" style="float:right;">
        {!!  Form::close() !!}


    </div>
</div>
</div>

@endsection