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


        {!! Form::open(['url'=>'admin/conversations','method'=>'post']) !!}

        <div class="form-group">
             {!! Form::label('topic','Message Title',['class'=>'control-label']) !!}
             {!! Form::text('topic',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
             {!! Form::label('status','Status',['class'=>'control-label']) !!}
             {!! Form::text('status', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
             {!! Form::label('user_1','Sender',['class'=>'control-label']) !!}
             {!! Form::text('user_1',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
             {!! Form::label('user_2','Recipient',['class'=>'control-label']) !!}
             {!!Form::select('user_2', $recipient_list, null, ['class' => 'form-control'])!!}
        </div>
        <div class="form-group">
             {!! Form::label('order_id','Order',['class'=>'control-label']) !!}
             {!! Form::number('order_id',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
             {!! Form::label('message','Message',['class'=>'control-label']) !!}
             {!! Form::text('message',null,['class'=>'form-control']) !!}
        </div>
        {!!  Form::submit('Send Message',['class'=>'btn btn-secondary']) !!}
        <input type="reset" style="float:right;">
        {!!  Form::close() !!}


    </div>
</div>
</div>

@endsection