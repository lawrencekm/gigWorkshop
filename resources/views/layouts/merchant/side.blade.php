@extends('layouts.merchant.app')

@section('side')



<div class="col-sm-3">
      <ul class="nav nav-pills flex-column">
        <li class="nav-item">
          <a class="nav-link" href="{{ URL::to('merchant/merchant/') }}">Orders</a>
        </li>

        <li class="nav-item">
          <a class="nav-link disabled" data-toggle="pill" href="#">Messages</a>
        </li>



      </ul>
      <hr class="d-sm-none">
</div>
@yield('content')

@endsection
