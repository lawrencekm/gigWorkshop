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
  You are editing an existing user</button></a>

  </div>
  <div class="card-body">

        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

           {!! Form::open(array('method'=>'PUT',
                                'action' => array(
                                                'UserController@update', $user->id))) !!}
  

        <div class="row">
        <div class="form-group col">
            {!! Form::label('firstname', 'Firstname:', ['class' => 'control-label']) !!}
            {!! Form::text('firstname', $user->firstname, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col" >
            {!! Form::label('lastname', 'Lastname:', ['class' => 'control-label']) !!}
            {!! Form::text('lastname', $user->lastname, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col" >
            {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
            {!! Form::email('email', $user->email, ['class' => 'form-control']) !!}
            </div>
        <div class="form-group col" >

            {!! Form::label('altemail', 'Alternate Email:', ['class' => 'control-label']) !!}
            {!! Form::email('altemail', $user->altemail, ['class' => 'form-control']) !!}
        </div>
</div>
<div class="row">
        <div class="form-group col">
            {!! Form::label('facebook_id', 'Facebook ID:', ['class' => 'control-label']) !!}
            {!! Form::text('facebook_id', $user->facebook_id, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('password', 'Password:', ['class' => 'control-label']) !!}
            {!! Form::password('password', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('otp', 'OTP:', ['class' => 'control-label']) !!}
            {!! Form::text('otp', $user->otp, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col" >
            {!! Form::label('mobile', 'Mobile:', ['class' => 'control-label']) !!}
            {!! Form::number('mobile', $user->mobile, ['class' => 'form-control']) !!}
        </div>
</div>
<div class="row">
        <div class="form-group col">
            {!! Form::label('dob', 'Date of Birth:', ['class' => 'control-label']) !!}
            {!! Form::date('dob', $user->dob, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('referral_code', 'Ref Code:', ['class' => 'control-label']) !!}
            {!! Form::text('referral_code', $user->referral_code, ['class' => 'form-control']) !!}
        </div>


        <div class="form-group col">
            {!! Form::label('timezone', 'Timezone:', ['class' => 'control-label']) !!}
            {!! Form::text('timezone', $user->timezone, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('address_id', 'Address:', ['class' => 'control-label']) !!}
            {!! Form::text('address_id', $user->address_id, ['class' => 'form-control']) !!}
        </div>
</div>
<div class="row">
        <div class="form-group col">
            {!! Form::label('userstatus_id', 'Status:', ['class' => 'control-label']) !!}
            {!! Form::text('userstatus_id', $user->userstatus_id, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col">

            {!! Form::label('active', 'Active:', ['class' => 'control-label']) !!}
            {!! Form::checkbox('active', $user->active, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col">

            {!! Form::label('promo_email_notifications', 'Promo Email:', ['class' => 'control-label']) !!}
            {!! Form::checkbox('promo_email_notifications', $user->promo_email_notifications, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col">

            {!! Form::label('order_email_notifications', 'Order Email:', ['class' => 'control-label']) !!}
            {!! Form::checkbox('order_email_notifications', $user->order_email_notifications, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col">

            {!! Form::label('available_at_night', 'Available Nighttime:', ['class' => 'control-label']) !!}
            {!! Form::checkbox('available_at_night', $user->available_at_night, ['class' => 'form-control']) !!}
            </div>

        </div>

<div class="row">

        <div class="form-group col">
            {!! Form::label('working_status_id', 'Working Status:', ['class' => 'control-label']) !!}
            {!! Form::text('working_status_id', $user->working_status_id, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('organization_id', 'Organization:', ['class' => 'control-label']) !!}
            {!! Form::text('organization_id', $user->organization_id, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('National_ID', 'National ID:', ['class' => 'control-label']) !!}
            {!! Form::text('National_ID', $user->National_ID, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('educationlevel_id', 'Education Level:', ['class' => 'control-label']) !!}
            {!! Form::text('educationlevel_id', $user->educationlevel_id, ['class' => 'form-control']) !!}
        </div>
</div>
<div class="row">

        <div class="form-group col">
            {!! Form::label('note', 'Note:', ['class' => 'control-label']) !!}
            {!! Form::text('note', $user->note, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('last_login_ip', 'Last Login Ip:', ['class' => 'control-label']) !!}
            {!! Form::text('last_login_ip', $user->last_login_ip, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('last_login', 'Last Login:', ['class' => 'control-label']) !!}
            {!! Form::date('last_login', $user->last_login, ['class' => 'form-control']) !!}
        </div>
</div>



        {!!  Form::submit('Modify user details',['class'=>'btn btn-secondary']) !!}
        <input type="reset" style="float:right;">
        {!!  Form::close() !!}


    </div>
</div>
</div>

@endsection