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
  You are editing an existing Address</button></a>

  </div>
  <div class="card-body">

        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

           {!! Form::open(array('method'=>'PUT',
                                'action' => array(
                                                'AddressController@update', $address->id))) !!}



        <div class="form-group">
             {!! Form::label('country','Country',['class'=>'control-label']) !!}
             {!! Form::text('country',$address->country,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
             {!! Form::label('country_code','Countrycode',['class'=>'control-label']) !!}
             {!! Form::text('country_code',$address->country_code,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
             {!! Form::label('tel','Tel',['class'=>'control-label']) !!}
             {!! Form::number('tel',$address->tel,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
             {!! Form::label('state_province','State/Province',['class'=>'control-label']) !!}
             {!! Form::text('state_province',$address->state_province,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
             {!! Form::label('city','City',['class'=>'control-label']) !!}
             {!! Form::text('city',$address->city,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
             {!! Form::label('zipcode','Zip Code',['class'=>'control-label']) !!}
             {!! Form::text('zipcode',$address->zipcode,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
             {!! Form::label('note','Note',['class'=>'control-label']) !!}
             {!! Form::text('note',$address->note,['class'=>'form-control']) !!}
        </div>
        {!!  Form::submit('Modify the Address',['class'=>'btn btn-secondary']) !!}
        <input type="reset" style="float:right;">
        {!!  Form::close() !!}



    </div>
</div>
</div>

@endsection