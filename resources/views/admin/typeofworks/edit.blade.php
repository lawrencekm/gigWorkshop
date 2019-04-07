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
  You are editing an existing type of work</button></a>

  </div>
  <div class="card-body">

        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

           {!! Form::open(array('method'=>'PUT',
                                'action' => array(
                                                'TypeofworkController@update', $typeofwork->id))) !!}
  
        <div class="form-group">
             {!! Form::label('name','Title',['class'=>'control-label']) !!}
             {!! Form::text('name',$typeofwork->name,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
             {!! Form::label('description','Description',['class'=>'control-label']) !!}
             {!! Form::text('description',$typeofwork->description,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
             {!! Form::label('name','Quick Note',['class'=>'control-label']) !!}
             {!! Form::text('note',$typeofwork->note,['class'=>'form-control']) !!}
        </div>
        {!!  Form::submit('Modify type of work',['class'=>'btn btn-secondary']) !!}
        <input type="reset" style="float:right;">
        {!!  Form::close() !!}


    </div>
</div>
</div>

@endsection