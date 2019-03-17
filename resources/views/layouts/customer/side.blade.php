@extends('layouts.merchant.app')

@section('side')



<div class="col-sm-3">
      <ul class="nav nav-pills flex-column">
        <li class="nav-item">
          <a class="nav-link" href="#">Available Orders</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="pill" href="#">Current Orders and Bids</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="pill" href="#">Revisions</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="pill" href="#">Disputes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="pill" href="#">Finished orders</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" data-toggle="pill" href="#">Messages</a>
        </li>



      </ul>
      <hr class="d-sm-none">
</div>
@yield('content')

@endsection
