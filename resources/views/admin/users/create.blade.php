@extends('layouts.admin.side')

@section('content')
<div class="col-sm-9">

<div class="card uper" style="margin-bottom:50px;">
  <div class="card-header" >
   Create User 
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
    @endif


{!! Form::open([
    'url' => 'admin/users',
    'method' => 'post'
    ]) !!}

<div class="row">
        <div class="form-group col">
            {!! Form::label('firstname', 'Firstname:', ['class' => 'control-label']) !!}
            {!! Form::text('firstname', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col" >
            {!! Form::label('lastname', 'Lastname:', ['class' => 'control-label']) !!}
            {!! Form::text('lastname', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col" >
            {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
            {!! Form::email('email', null, ['class' => 'form-control']) !!}
            </div>
        <div class="form-group col" >

            {!! Form::label('altemail', 'Alternate Email:', ['class' => 'control-label']) !!}
            {!! Form::email('altemail', null, ['class' => 'form-control']) !!}
        </div>
</div>
<div class="row">
        <div class="form-group col">
            {!! Form::label('facebook_id', 'Facebook ID:', ['class' => 'control-label']) !!}
            {!! Form::text('facebook_id', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('password', 'Password:', ['class' => 'control-label']) !!}
            {!! Form::password('password', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('otp', 'OTP:', ['class' => 'control-label']) !!}
            {!! Form::text('otp', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col" >
            {!! Form::label('mobile', 'Mobile:', ['class' => 'control-label']) !!}
            {!! Form::number('mobile', null, ['class' => 'form-control']) !!}
        </div>
</div>
<div class="row">
        <div class="form-group col">
            {!! Form::label('dob', 'Date of Birth:', ['class' => 'control-label']) !!}
            {!! Form::date('dob', '1995-08-19', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('referral_code', 'Ref Code:', ['class' => 'control-label']) !!}
            {!! Form::text('referral_code', null, ['class' => 'form-control']) !!}
        </div>


        <div class="form-group col">
            {!! Form::label('timezone', 'Timezone:', ['class' => 'control-label']) !!}
            {!! Form::text('timezone', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('address_id', 'Address:', ['class' => 'control-label']) !!}
            {!! Form::text('address_id', null, ['class' => 'form-control']) !!}
        </div>
</div>
<div class="row">
        <div class="form-group col">
            {!! Form::label('userstatus_id', 'Status:', ['class' => 'control-label']) !!}
            {!! Form::text('userstatus_id', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col">

            {!! Form::label('active', 'Active:', ['class' => 'control-label']) !!}
            {!! Form::checkbox('active', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col">

            {!! Form::label('promo_email_notifications', 'Promo Email:', ['class' => 'control-label']) !!}
            {!! Form::checkbox('promo_email_notifications', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col">

            {!! Form::label('order_email_notifications', 'Order Email:', ['class' => 'control-label']) !!}
            {!! Form::checkbox('order_email_notifications', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col">

            {!! Form::label('available_at_night', 'Available Nighttime:', ['class' => 'control-label']) !!}
            {!! Form::checkbox('available_at_night', null, ['class' => 'form-control']) !!}
            </div>

        </div>

<div class="row">

        <div class="form-group col">
            {!! Form::label('working_status_id', 'Working Status:', ['class' => 'control-label']) !!}
            {!! Form::text('working_status_id', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('organization_id', 'Organization:', ['class' => 'control-label']) !!}
            {!! Form::text('organization_id', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('National_ID', 'National ID:', ['class' => 'control-label']) !!}
            {!! Form::text('National_ID', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('educationlevel_id', 'Education Level:', ['class' => 'control-label']) !!}
            {!! Form::text('educationlevel_id', null, ['class' => 'form-control']) !!}
        </div>
</div>
<div class="row">

        <div class="form-group col">
            {!! Form::label('note', 'Note:', ['class' => 'control-label']) !!}
            {!! Form::text('note', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('last_login_ip', 'Last Login Ip:', ['class' => 'control-label']) !!}
            {!! Form::text('last_login_ip', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('last_login', 'Last Login:', ['class' => 'control-label']) !!}
            {!! Form::date('last_login', null, ['class' => 'form-control']) !!}
        </div>
</div>

{!! Form::submit('Create New User', ['class' => 'btn btn-secondary']) !!}
<input style="float:right;" type="reset">

{!! Form::close() !!}






  </div>
</div>

</div>
@endsection