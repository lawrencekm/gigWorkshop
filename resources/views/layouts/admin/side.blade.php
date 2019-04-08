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
              <button class="btn btn-sm dropdown-toggle text-left" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Payments
              </button>
              <div class="dropdown-menu">

              <a class="dropdown-item" href="/index.php/admin/payments">Payments</a>
              <a class="dropdown-item" href="/index.php/admin/paymentmethods">Payment method</a>
              <a class="dropdown-item" href="/index.php/admin/paymentstatuses">Payment status</a>
              <a class="dropdown-item" href="/index.php/admin/transactions">Transactions</a>
              <a class="dropdown-item" href="/index.php/admin/transactionmethods">Transaction methods</a>
              <a class="dropdown-item" href="/index.php/admin/transactionstatuses">Transaction status</a>
              <a class="dropdown-item" href="/index.php/admin/transactiontypes">Transaction types</a>
              </div>
      </div>

              <div class="btn-group">
        <button class="btn btn-sm dropdown-toggle text-left" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Users
        </button>
        <div class="dropdown-menu">
        <a class="dropdown-item" href="/index.php/admin/users">Users</a>
        <a class="dropdown-item" href="/index.php/admin/addresses">Addresses</a>
        <a class="dropdown-item" href="/index.php/admin/educationlevels">Education Levels</a>
        <a class="dropdown-item" href="/index.php/admin/workingstatuses">Working Status</a>
        <a class="dropdown-item" href="/index.php/admin/userdocuments">User documents</a>
        <a class="dropdown-item" href="/index.php/admin/disciplines">Disciplines</a>
        <a class="dropdown-item" href="/index.php/admin/roles">Roles</a>
        <a class="dropdown-item" href="/index.php/admin/userdocumenttypes">User document type</a>
        </div>
      </div>



              <div class="btn-group">
        <button class="btn btn-sm dropdown-toggle text-left" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Transactions
        </button>
        <div class="dropdown-menu">

        <a class="dropdown-item" href="/index.php/admin/citations">Citations</a>
        <a class="dropdown-item" href="/index.php/admin/disciplines">Disciplines</a>
        <a class="dropdown-item" href="/index.php/admin/documenttypes">Document types</a>
        <a class="dropdown-item" href="/index.php/admin/addresses">Addresses</a>
        <a class="dropdown-item" href="/index.php/admin/conversations">Conversations</a>
        <a class="dropdown-item" href="/index.php/admin/documents">Documents</a>
        <a class="dropdown-item" href="/index.php/admin/orders">Orders</a>
        <a class="dropdown-item" href="/index.php/admin/orderstatuses">Order status</a>
        <a class="dropdown-item" href="/index.php/admin/typeofworks">Type of Work</a>
        </div>
      </div>






      </ul>
      <hr class="d-sm-none">
</div>
@yield('content')

@endsection
