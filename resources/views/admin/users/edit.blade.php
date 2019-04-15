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
            {!! Form::text('address_id', $user->address->country, ['class' => 'form-control']) !!}
        </div>
</div>

<div class="row">
        <div class="form-group col">
            {!! Form::label('country', 'Country:', ['class' => 'control-label']) !!}
            <?php  $country_array = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
            $countries = array_combine($country_array, $country_array);
            ?>
            {!! Form::select('country', $countries,$user->address->country, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('country_code', 'Country code:', ['class' => 'control-label']) !!}
            {!! Form::number('country_code', $user->address->country_code, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('tel', 'Telephone:', ['class' => 'control-label']) !!}
            {!! Form::number('tel', $user->address->tel, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('state_province', 'State/province:', ['class' => 'control-label']) !!}
            {!! Form::text('state_province', $user->address->state_province, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('city', 'City/Town:', ['class' => 'control-label']) !!}
            {!! Form::text('city', $user->address->city, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col">
            {!! Form::label('zipcode', 'Zipcode:', ['class' => 'control-label']) !!}
            {!! Form::text('zipcode', $user->address->zipcode, ['class' => 'form-control']) !!}
        </div>
</div>


<div class="row">
        <div class="form-group col">
            {!! Form::label('userstatus_id', 'Status:', ['class' => 'control-label']) !!}
            {!!Form::select('userstatus_id', $userstatuses, $user->userstatus_id, ['class' => 'form-control'])!!}

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
            {!!Form::select('working_status_id', $workingstatuses, $user->workingstatus_id, ['class' => 'form-control'])!!}

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
            {!!Form::select('educationlevel_id', $educationlevels, $user->educationlevel_id, ['class' => 'form-control'])!!}

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