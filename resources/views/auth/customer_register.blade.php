@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Place an order</div>

                <div class="panel-body">                  
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
            'route' => 'register',
            'method' => 'post'
            ]) !!}
            {{ Form::hidden('role', 'customer') }}

<div class="row">
        <div class="form-group col-md-3">
            {!! Form::label('firstname', 'Firstname:', ['class' => 'control-label']) !!}
            {!! Form::text('firstname', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-3" >
            {!! Form::label('lastname', 'Lastname:', ['class' => 'control-label']) !!}
            {!! Form::text('lastname', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-3" >
            {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
            {!! Form::email('email', null, ['class' => 'form-control']) !!}
            </div>
        <div class="form-group col-md-3" >

            {!! Form::label('altemail', 'Alternate Email:', ['class' => 'control-label']) !!}
            {!! Form::email('altemail', null, ['class' => 'form-control']) !!}
        </div>
</div>

<div class="row">

        <div class="form-group col-md-3">
            {!! Form::label('topic', 'topic:', ['class' => 'control-label']) !!}
            {!! Form::text('topic', null, ['class' => 'form-control']) !!}
        </div>
 
        <div class="form-group col-md-3">
            {!! Form::label('typeofwork_id', 'Type of work:', ['class' => 'control-label']) !!}
            {!! Form::select('typeofwork_id', $typeofworks, null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-3">
            {!! Form::label('citation_id', 'Citation/Referencing:', ['class' => 'control-label']) !!}
            {!! Form::select('citation_id', $citations, null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-3" >
            {!! Form::label('provide_sources', 'Provide sources:', ['class' => 'control-label']) !!}<br>
            {!! Form::checkbox('provide_sources', '1', false, ['class' => 'form-control']) !!}
        </div>
</div>
<div class="row">
        <div class="form-group col-md-3">
            {!! Form::label('educationlevel_id', 'Education level:', ['class' => 'control-label']) !!}
            {!! Form::select('educationlevel_id', $educationlevels,null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-3">
            {!! Form::label('spacing', 'Word spacing:', ['class' => 'control-label']) !!}
            {!!Form::select('spacing', [2=>'double',1 =>'single'], null, ['class' => 'form-control'])!!}
        </div>
        
        <div class="form-group col-md-3">

            {!! Form::label('pages', 'Pages:', ['class' => 'control-label']) !!}
            {!! Form::number('pages', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-3">

            {!! Form::label('slides', 'Slides:', ['class' => 'control-label']) !!}
            {!! Form::number('slides', null, ['class' => 'form-control']) !!}
        </div>


</div>
<div class="row">
        <div class="form-group col-md-3">
            {!! Form::label('short_description', 'short_description:', ['class' => 'control-label']) !!}
            {!! Form::text('short_description', null, ['class' => 'form-control']) !!}
            </div>

           
        <div class="form-group col-md-3">
            {!! Form::label('deadline', 'Deadline:', ['class' => 'control-label']) !!}
            {!! Form::date('deadline', null, ['class' => 'form-control']) !!}
        </div>



        <div class="form-group col-md-3">
            {!! Form::label('preview', 'Request preview:', ['class' => 'control-label']) !!}
            {!! Form::checkbox('preview', '1',false, ['class' => 'form-control']) !!}
        </div>


        <div class="form-group col-md-3">
            {!! Form::label('urgent', 'urgent:', ['class' => 'control-label']) !!}
            {!! Form::checkbox('urgent', '1',false, ['class' => 'form-control']) !!}
        </div>

</div>
<div class="row">
        <div class="form-group col-md-3">
            {!! Form::label('preferred_writer', 'Preferred:', ['class' => 'control-label']) !!}
            {!! Form::text('preferred_writer', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-3">
            {!! Form::label('password', 'Password:', ['class' => 'control-label']) !!}
            {!! Form::password('password', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-3">
            {!! Form::label('password_confirmation', 'Confirm Password:', ['class' => 'control-label']) !!}
            {!! Form::password('password_confirmation', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-3">
            {!! Form::label('cost', 'Cost:', ['class' => 'control-label']) !!}
            {!! Form::text('cost', null, ['class' => 'form-control']) !!}
        </div>

</div>

{!! Form::submit('Place order', ['class' => 'btn btn-secondary']) !!}
<input style="float:right;" type="reset">

{!! Form::close() !!}





                </div>
            </div>
        </div>
    </div>
</div>
@endsection
