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
  You are editing an existing conversation</button></a>

  </div>
  <div class="card-body">

        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

           {!! Form::open(array('method'=>'PUT',
                                'action' => array(
                                                'ConversationController@update', $conversation->id))) !!}
  
            <div class="form-group">
                {!! Form::label('topic','Message Title',['class'=>'control-label']) !!}
                {!! Form::text('topic',$conversation->topic,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('status','Status',['class'=>'control-label']) !!}
                {!! Form::checkbox('status', $conversation->status, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('user_1','Sender',['class'=>'control-label']) !!}
                {!! Form::text('user_1',$conversation->user_1,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('user_2','Recipient',['class'=>'control-label']) !!}
                {!!Form::select('user_2', $recipient_list, null, ['class' => 'form-control'])!!}
            </div>
            <div class="form-group">
                {!! Form::label('order_id','Order',['class'=>'control-label']) !!}
                {!! Form::text('order_id',$conversation->order_id,['class'=>'form-control']) !!}
            </div>
            {!!  Form::submit('Modify Conversation',['class'=>'btn btn-secondary']) !!}
                    <input type="reset" style="float:right;">
                    {!!  Form::close() !!}

    </div>
</div>
</div>

@endsection