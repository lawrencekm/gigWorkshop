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
  You are creating a new Address</button></a>

  </div>
  <div class="card-body">

        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif


        {!! Form::open(['url'=>'admin/addresses','method'=>'post']) !!}

        <div class="form-group">
             {!! Form::label('country','Country',['class'=>'control-label']) !!}
             {!! Form::text('country','Kenya',['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
             {!! Form::label('countrycode','Countrycode',['class'=>'control-label']) !!}
             {!! Form::text('country_code','+254',['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
             {!! Form::label('tel','Tel',['class'=>'control-label']) !!}
             {!! Form::number('tel','72516',['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
             {!! Form::label('stateprovince','State/Province',['class'=>'control-label']) !!}
             {!! Form::text('state_province','Nairobi',['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
             {!! Form::label('city','City',['class'=>'control-label']) !!}
             {!! Form::text('city','Nairobi',['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
             {!! Form::label('zipcode','Zip Code',['class'=>'control-label']) !!}
             {!! Form::text('zipcode','00100',['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
             {!! Form::label('note','Note',['class'=>'control-label']) !!}
             {!! Form::text('note','note',['class'=>'form-control']) !!}
        </div>
        {!!  Form::submit('Create Address',['class'=>'btn btn-secondary']) !!}
        <input type="reset" style="float:right;">
        {!!  Form::close() !!}


    </div>
</div>
</div>

@endsection