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
Addresses <a style="float:right;" href="addresses/create"><button class="btn btn-secondary btn-sm">Create New Address</button></a>

  </div>
  <div class="card-body">

        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        @if($addresses->count() > 0)

        <table class="table table-striped table-sm table-responsive">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Country</th>
              <th scope="col">Country Code</th>
              <th scope="col">Tel</th>
              <th scope="col">State/Prov</th>
              <th scope="col">City</th>
              <th scope="col">Zip code</th>
              <th scope="col">Created</th>
              <th scope="col">Updated</th>
              <th scope="col">note</th>
            </tr>
          </thead>
          <tbody>
            @foreach($addresses as $address)
            <tr>
              <th scope="row">{{$address->id}}</th>
              <td><a href="addresses/{{$address->id}}">{{$address->country}}</a></td>
              <td>{{$address->country_code}}</td>
              <td>{{$address->tel}}</td>
              <td>{{$address->state_province}}</td>
              <td>{{$address->city}}</td>
              <td>{{$address->zipcode}}</td>
              <td>{{$address->created_at->toFormattedDateString()}}</td>
              <td>{{$address->updated_at->toFormattedDateString()}}</td>
              <td>{{$address->note}}</td>

              

              <td>
              <div class="btn-group" role="group" aria-label="Basic example">
                  <a href="{{ URL::to('admin/addresses/' . $address->id . '/edit') }}">
                        <button type="button" onclick="ConfirmDelete()" class="btn btn-warning btn-sm">Edit</button>
                  </a>&nbsp;
 
                  {{ Form::open(array( 'method' => 'delete', 'url' => 'admin/addresses/'.$address->id, 'onsubmit' => 'return ConfirmDelete()')) }}
                  {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) }}
                  {{ Form::close() }}
              </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @else
            <p>No Address defined yet! Create addresses for stakeholders!</p>
        @endif

    </div>
</div>
</div>

@endsection