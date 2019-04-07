@extends('layouts.admin.app')

@section('side')



<div class="col-sm-3">
      <ul class="nav nav-pills flex-column  navbar-dark">
        <li class="nav-item">
          <a class="nav-link"  href="#">Orders</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/index.php/admin/users">Customers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="/index.php/admin/merchants">Merchants</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="/index.php/admin/transactions">Transactions</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="/index.php/admin/payments">Payments</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="/index.php/admin/news">News</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="/index.php/admin/resources">Resources</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="/index.php/admin/settings">Settings</a>
        </li>


        <div class="btn-group">
        <button class="btn btn-dark btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Settings
        </button>
        <div class="dropdown-menu">
        <a class="dropdown-item" href="educationlevels">Education Levels</a>
        <a class="dropdown-item" href="workingstatuses">Working Status</a>
        <a class="dropdown-item" href="citations">Citations</a>
        <a class="dropdown-item" href="userdocuments">User documents</a>
        <a class="dropdown-item" href="disciplines">Disciplines</a>
        <a class="dropdown-item" href="users">Users</a>
        <a class="dropdown-item" href="documenttypes">Document types</a>
        <a class="dropdown-item" href="addresses">Addresses</a>
        <a class="dropdown-item" href="conversations">Conversations</a>
        <a class="dropdown-item" href="documents">Documents</a>
        <a class="dropdown-item" href="orders">Orders</a>
        <a class="dropdown-item" href="orderstatuses">Order status</a>
        <a class="dropdown-item" href="payments">Payments</a>
        <a class="dropdown-item" href="paymentmethods">Payment method</a>
        <a class="dropdown-item" href="paymentstatuses">Payment status</a>
        <a class="dropdown-item" href="roles">Roles</a>
        <a class="dropdown-item" href="transactions">Transactions</a>
        <a class="dropdown-item" href="transactionmethods">Transaction methods</a>
        <a class="dropdown-item" href="transactionstatuses">Transaction status</a>
        <a class="dropdown-item" href="transactiontypes">Transaction type</a>
        <a class="dropdown-item" href="typeofworks">Type of Work</a>
        <a class="dropdown-item" href="userdocumenttypes">User document type</a>





          
        </div>
      </div>




      </ul>
      <hr class="d-sm-none">
</div>
@yield('content')

@endsection
