@extends('layouts.web.app')

@section('side')



<div class="col-sm-3">
      <ul class="nav nav-pills flex-column">
        <li class="nav-item">
          <a class="nav-link" href="#">Available Orders</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="pill" href="#">Current Orders and Bids</a>
        </li>

        </li>



      </ul>
      <hr class="d-sm-none">
</div>
@yield('content')

@endsection
