@extends('layouts.merchant.side')

@section('content')


<div class="col-sm-9">
{{--
        <form class="form-inline" action="/action_page.php">
          <div class="form-group">
            <label for="gender1" class="col-sm-2 control-label"></label>
            <div class="col-sm-2">
              <input class="form-control"  type="reset">        
            </div>
          </div>  

        <div class="form-group">
          <label for="gender1" class="control-label"></label>
          <div >
          <select class="form-control" id="discipline">
            <option disabled selected value="">Discipline</option>
            <option>Law</option>
          </select>          
          </div>
        </div>  

          <div class="form-group">
            <label for="gender1" class="col-sm-2 control-label"></label>
            <div class="col-sm-2">
            <select class="form-control" id="typeofservice">
              <option disabled selected value="">Type of service</option>
              <option>Write from scratch</option>
            </select>          
            </div>
          </div>  
          more options... 
          <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </form>

--}}
 


<!-- Nav tabs -->
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#available">Available orders</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#current">Current</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#revise">Revision</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#dispute">Dispute</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#cancelled">Cancelled</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#completed">Completed</a>
  </li>
  
</ul>
<br>
<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane container active" id="available">

  <div class="card uper" style="margin-bottom:50px;">
  <div class="card-header" >
    Click an order to review and take it if you match the required skills 
    
    <a style="float:right;" href="orders/create">
        <button class="btn btn-secondary btn-sm">Refresh</button>
    </a>

  </div>
  <div class="card-body">
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        @if($orders->count() > 0)

        <table class="table table-sm table-responsive table-hover">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <th scope="col">Description</th>
              <th scope="col">Note</th>
              <th scope="col">Created</th>
              <th scope="col">Modified</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($orders as $order)
            <tr>
              <th scope="row">{{$order->id}}</th>
              <td> <a href="merchant/{{$order->id}}">{{$order->id}}</a></td>   
              <td>{{$order->topic}}</td>
              <td>{{$order->customer_id}}</td>
              <td>{{$order->merchant_id}}</td>
              <td>{{$order->created_at}}</td>
              <td>{{$order->updated_at}}</td>
              <td>
              <div class="btn-group" role="group" aria-label="Basic example">
              <a href="{{ URL::to('merchant/merchant/'.$order->id ) }}">
                        <button type="button" onclick="confirmReview()" class="btn btn-warning btn-sm">Review</button>
              </a>&nbsp;

                  {{ Form::open(array( 'url' => 'merchant/merchant/'.$order->id, 'onsubmit' => 'return ConfirmReview()')) }}
                  {{ Form::submit('Review', ['class' => 'btn btn-success btn-sm']) }}
                  {{ Form::close() }}
              </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @else
            <p>No orders available at the moment!</p>
        @endif

    </div>
</div>


  </div>


  <div class="tab-pane container fade" id="current">

        <div class="card uper" style="margin-bottom:50px;">
        <div class="card-header" >
          The{{ $currentOrders->count() }} order(s) you are currently working on will be listed here
          
          <a style="float:right;" href="orders/create">
              <button class="btn btn-secondary btn-sm">Refresh</button>
          </a>

        </div>
        <div class="card-body">
              @if (Session::has('message'))
                  <div class="alert alert-info">{{ Session::get('message') }}</div>
              @endif
              @if($currentOrders->count() > 0)
              

              <table class="table table-sm table-responsive table-hover">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Note</th>
                    <th scope="col">Created</th>
                    <th scope="col">Modified</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($currentOrders as $currentOrder)
        
                  <tr>
                    <th scope="row">{{$currentOrder->id}}</th>
                    <td><a href="merchant/{{$currentOrder->id}}">{{$currentOrder->topic}}</a></td>
                    <td>{{$currentOrder->topic}}</td>
                    <td>{{$currentOrder->customer_id}}</td>
                    <td>{{$currentOrder->merchant_id}}</td>
                    <td>{{$currentOrder->created_at}}</td>
                    <td>{{$currentOrder->updated_at}}</td>
                    <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ URL::to('merchant/' . $order->id . '/edit') }}">
                              <button type="button" onclick="confirmReview()" class="btn btn-warning btn-sm">Edit</button>
                        </a>&nbsp;

                        {{ Form::open(array( 'method' => 'show', 'url' => 'merchant/merchant/'.$currentOrder->id, 'onsubmit' => 'return ConfirmDelete()')) }}
                        {{ Form::submit('Delete', ['class' => 'btn btn-success btn-sm']) }}
                        {{ Form::close() }}
                    </div>
                    </td>
                  </tr>
                 
                  @endforeach
                </tbody>
              </table>
              @else
                  <p>There are no active orders available at the moment. You can review and 'Take' an order under the 'Available orders' menu tab</p>
                  <p>If there are no Available orders check again later.</p>

              @endif

          </div>
        </div>
  
  </div>

<div class="tab-pane container fade" id="revise">

<div class="card uper" style="margin-bottom:50px;">
      <div class="card-header" >
        The orders you are currently revising will be listed here
        
        <a style="float:right;" href="orders/create">
            <button class="btn btn-secondary btn-sm">Refresh</button>
        </a>

      </div>
      <div class="card-body">
            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
            @if($revisionOrders->count() > 0)

            <table class="table table-sm table-responsive table-hover">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Title</th>
                  <th scope="col">Description</th>
                  <th scope="col">Note</th>
                  <th scope="col">Created</th>
                  <th scope="col">Modified</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($revisionOrders as $revisionOrder)
                <tr>
                  <th scope="row">{{$revisionOrder->id}}</th>
                  <td><a href="merchant/{{$revisionOrder->id}}">{{$revisionOrder->id}}</a></td>
                  <td>{{$revisionOrder->topic}}</td>
                  <td>{{$revisionOrder->customer_id}}</td>
                  <td>{{$revisionOrder->merchant_id}}</td>
                  <td>{{$revisionOrder->created_at}}</td>
                  <td>{{$revisionOrder->updated_at}}</td>
                  <td>
                  <div class="btn-group" role="group" aria-label="Basic example">
                  <a href="{{ URL::to('merchant/' . $revisionOrder->id . '/edit') }}">
                            <button type="button" onclick="confirmReview()" class="btn btn-warning btn-sm">Edit</button>
                      </a>&nbsp;

                      {{ Form::open(array( 'method' => 'show', 'url' => 'merchant/merchant/'.$revisionOrder->id, 'onsubmit' => 'return ConfirmDelete()')) }}
                      {{ Form::submit('Delete', ['class' => 'btn btn-success btn-sm']) }}
                      {{ Form::close() }}
                  </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            @else
                <p>You do not have any disputed order.</p>

            @endif

        </div>



</div>

</div>

<div class="tab-pane container fade" id="dispute">

  <div class="card uper" style="margin-bottom:50px;">
        <div class="card-header" >
          The orders under dispute will be listed here
          
          <a style="float:right;" href="orders/create">
              <button class="btn btn-secondary btn-sm">Refresh</button>
          </a>

        </div>
        <div class="card-body">
              @if (Session::has('message'))
                  <div class="alert alert-info">{{ Session::get('message') }}</div>
              @endif
              @if($disputeOrders->count() > 0)

              <table class="table table-sm table-responsive table-hover">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Note</th>
                    <th scope="col">Created</th>
                    <th scope="col">Modified</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($disputeOrders as $disputeOrder)
                  <tr>
                    <th scope="row">{{$disputeOrder->id}}</th>
                    <td><a href="merchant/{{$disputeOrder->id}}">{{$disputeOrder->id}}</a></td>
                    <td>{{$disputeOrder->topic}}</td>
                    <td>{{$disputeOrder->customer_id}}</td>
                    <td>{{$disputeOrder->merchant_id}}</td>
                    <td>{{$disputeOrder->created_at}}</td>
                    <td>{{$disputeOrder->updated_at}}</td>
                    <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ URL::to('merchant/' . $disputeOrder->id . '/edit') }}">
                              <button type="button" onclick="confirmReview()" class="btn btn-warning btn-sm">Edit</button>
                        </a>&nbsp;

                        {{ Form::open(array( 'method' => 'show', 'url' => 'merchant/merchant/'.$disputeOrder->id, 'onsubmit' => 'return ConfirmDelete()')) }}
                        {{ Form::submit('Delete', ['class' => 'btn btn-success btn-sm']) }}
                        {{ Form::close() }}
                    </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              @else
                  <p>You do not have any disputed order.</p>

              @endif

          </div>


  
  </div>
  
</div>
  <div class="tab-pane container fade" id="cancelled">

  <div class="card uper" style="margin-bottom:50px;">
        <div class="card-header" >
          Cancelled orders will be listed here
          
          <a style="float:right;" href="orders/create">
              <button class="btn btn-secondary btn-sm">Refresh</button>
          </a>

        </div>
        <div class="card-body">
              @if (Session::has('message'))
                  <div class="alert alert-info">{{ Session::get('message') }}</div>
              @endif
              @if($cancelledOrders->count() > 0)

              <table class="table table-sm table-responsive table-hover">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Note</th>
                    <th scope="col">Created</th>
                    <th scope="col">Modified</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($cancelledOrders as $cancelledOrder)
                  <tr>
                    <th scope="row">{{$order->id}}</th>
                    <td><a href="orders/{{$cancelledOrder->id}}">{{$cancelledOrder->name}}</a></td>
                    <td>{{$cancelledOrder->topic}}</td>
                    <td>{{$cancelledOrder->customer_id}}</td>
                    <td>{{$cancelledOrder->merchant_id}}</td>
                    <td>{{$cancelledOrder->created_at}}</td>
                    <td>{{$cancelledOrder->updated_at}}</td>
                    <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ URL::to('merchant/' . $cancelledOrder->id . '/edit') }}">
                              <button type="button" onclick="confirmReview()" class="btn btn-warning btn-sm">Edit</button>
                        </a>&nbsp;

                        {{ Form::open(array( 'method' => 'show', 'url' => 'merchant/merchant/'.$cancelledOrder->id, 'onsubmit' => 'return ConfirmDelete()')) }}
                        {{ Form::submit('Delete', ['class' => 'btn btn-success btn-sm']) }}
                        {{ Form::close() }}
                    </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              @else
                  <p>You do not have any cancelled orders.</p>

              @endif

          </div>
        </div>
  
  
  </div>


  <div class="tab-pane container fade" id="completed">.
  

    <div class="card uper" style="margin-bottom:50px;">
        <div class="card-header" >
          All orders completed by you will be listed here
          
          <a style="float:right;" href="orders/create">
              <button class="btn btn-secondary btn-sm">Refresh</button>
          </a>

        </div>
        <div class="card-body">
              @if (Session::has('message'))
                  <div class="alert alert-info">{{ Session::get('message') }}</div>
              @endif
              @if($completedOrders->count() > 0)

              <table class="table table-sm table-responsive table-hover">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Note</th>
                    <th scope="col">Created</th>
                    <th scope="col">Modified</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($completedOrders as $completedOrder)
                  <tr>
                    <th scope="row">{{$order->id}}</th>
                    <td><a href="orders/{{$completedOrder->id}}">{{$completedOrder->name}}</a></td>
                    <td>{{$completedOrder->topic}}</td>
                    <td>{{$completedOrder->customer_id}}</td>
                    <td>{{$completedOrder->merchant_id}}</td>
                    <td>{{$completedOrder->created_at}}</td>
                    <td>{{$completedOrder->updated_at}}</td>
                    <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ URL::to('admin/orders/' . $order->id . '/edit') }}">
                              <button type="button" onclick="confirmReview()" class="btn btn-warning btn-sm">Edit</button>
                        </a>&nbsp;

                        {{ Form::open(array( 'method' => 'show', 'url' => 'merchant/merchant/'.$completedOrder->id, 'onsubmit' => 'return ConfirmDelete()')) }}
                        {{ Form::submit('Delete', ['class' => 'btn btn-success btn-sm']) }}
                        {{ Form::close() }}
                    </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              @else
                  <p>You do not have any completed order.</p>

              @endif

          </div>
        </div>
  
  </div>










</div>

</div>








<script>
function confirmReview(){
  return confirm('Review the order?')
}
</script>













{{-- 
<div id="paypal-button-container"></div>

<script src="https://www.paypal.com/sdk/js?client-id=ASA8MbzUpD3Ujus-Y68OeDH7etvK_KGKSeZpQGQt6J-9hU-MpuWatFSNdC_RFJZTz2votsM6kK_Qq_6J"></script>
<script>paypal.Buttons().render('paypal-button-container');</script>
<script>
  paypal.Buttons({
    createOrder: function(data, actions) {
      // Set up the transaction
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: '0.01'
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      // Capture the funds from the transaction
      return actions.order.capture().then(function(details) {
        // Show a success message to your buyer
        alert('Transaction completed by ' + details.payer.name.given_name);
      });
    }
  }).render('#paypal-button-container');
</script>
--}}
@endsection