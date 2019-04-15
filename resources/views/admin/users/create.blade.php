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

</div>
<div class="row">
        <div class="form-group col">
            {!! Form::label('country', 'Country:', ['class' => 'control-label']) !!}
            <?php  $country_array = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
            $countries = array_combine($country_array, $country_array);
            ?>
            {!! Form::select('country', $countries, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('country_code', 'Country code:', ['class' => 'control-label']) !!}
            {!! Form::number('country_code', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('tel', 'Telephone:', ['class' => 'control-label']) !!}
            {!! Form::number('tel', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('state_province', 'State/province:', ['class' => 'control-label']) !!}
            {!! Form::text('state_province', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('city', 'City/Town:', ['class' => 'control-label']) !!}
            {!! Form::text('city', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('zipcode', 'Zipcode:', ['class' => 'control-label']) !!}
            {!! Form::text('zipcode', null, ['class' => 'form-control']) !!}
        </div>
</div>
<div class="row">

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
            {!!Form::select('working_status_id', $workingstatuses, null, ['class' => 'form-control'])!!}

        </div>
        <div class="form-group col">

            {!! Form::label('userstatus_id','userstatus_id',['class'=>'control-label']) !!}
            {!!Form::select('userstatus_id', $userstatuses, null, ['class' => 'form-control'])!!}
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
            {!!Form::select('educationlevel_id', $educationlevels, null, ['class' => 'form-control'])!!}

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