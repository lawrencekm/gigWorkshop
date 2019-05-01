@extends('layouts.customer.side')

@section('content')


<div class="col-sm-9">

<!-- Nav tabs -->
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#placeOrder">Place an order?</a>
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

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane container active" id="placeOrder">


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



          {!! Form::open(['url'=>'customer/customer','method'=>'post']) !!}




<div class="row">

        <div class="col">
            {!! Form::label('topic', 'topic:', ['class' => 'control-label']) !!}
            {!! Form::text('topic', null, ['class' => 'form-control']) !!}
        </div>
 
        <div class="col">
            {!! Form::label('typeofwork_id', 'Type of work:', ['class' => 'control-label']) !!}
            {!! Form::select('typeofwork_id', $typeofworks, null, ['class' => 'form-control']) !!}
        </div>
        <div class="col">
            {!! Form::label('citation_id', 'Citation/Referencing:', ['class' => 'control-label']) !!}
            {!! Form::select('citation_id', $citations, null, ['class' => 'form-control']) !!}
        </div>


</div>
<div class="row">
        <div class="form-group col-md-4">
            {!! Form::label('educationlevel_id', 'Education level:', ['class' => 'control-label']) !!}
            {!! Form::select('educationlevel_id', $educationlevels,null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-4">
            {!! Form::label('spacing', 'Word spacing:', ['class' => 'control-label']) !!}
            {!!Form::select('spacing', [2=>'double',1 =>'single'], null, ['class' => 'form-control'])!!}
        </div>
        
        <div class="form-group col-md-4">

            {!! Form::label('pages', 'Pages:', ['class' => 'control-label']) !!}
            {!! Form::number('pages', null, ['class' => 'form-control']) !!}
        </div>
        </div>
<div class="row">
        <div class="form-group col-md-4">

            {!! Form::label('slides', 'Slides:', ['class' => 'control-label']) !!}
            {!! Form::number('slides', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-4">
            {!! Form::label('short_description', 'short_description:', ['class' => 'control-label']) !!}
            {!! Form::text('short_description', null, ['class' => 'form-control']) !!}
            </div>

           
        <div class="form-group col-md-4">
            {!! Form::label('deadline', 'Deadline:', ['class' => 'control-label']) !!}
            {!! Form::date('deadline', null, ['class' => 'form-control']) !!}
        </div>
   </div>
<div class="row">


        <div class="form-group col-md-4">
            {!! Form::label('preview', 'Request preview:', ['class' => 'control-label']) !!}
            {!! Form::checkbox('preview', '1',false, ['class' => 'form-control']) !!}
        </div>


        <div class="form-group col-md-4">
            {!! Form::label('urgent', 'urgent:', ['class' => 'control-label']) !!}
            {!! Form::checkbox('urgent', '1',false, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-4" >
            {!! Form::label('provide_sources', 'Provide sources:', ['class' => 'control-label']) !!}<br>
            {!! Form::checkbox('provide_sources', '1', false, ['class' => 'form-control']) !!}
        </div>

</div>
<div class="row">
        <div class="form-group col-md-4">
            {!! Form::label('preferred_writer', 'Preferred:', ['class' => 'control-label']) !!}
            {!! Form::text('preferred_writer', null, ['class' => 'form-control']) !!}
        </div>

      
        <div class="form-group col-md-4">
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





</div>




  <div class="tab-pane container fade" id="current">

        <div class="card uper" style="margin-bottom:50px;">
        <div class="card-header" >
          The{{ $currentOrders->count() }} order(s) you are currently working on will be listed here
          
          <a style="float:right;" href="#">
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
                    <td><a href="customer/{{$currentOrder->id}}">{{$currentOrder->topic}}</a></td>
                    <td>{{$currentOrder->topic}}</td>
                    <td>{{$currentOrder->customer_id}}</td>
                    <td>{{$currentOrder->merchant_id}}</td>
                    <td>{{$currentOrder->created_at}}</td>
                    <td>{{$currentOrder->updated_at}}</td>
                    <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ URL::to('customer/' . $currentOrder->id . '/edit') }}">
                              <button type="button" onclick="confirmReview()" class="btn btn-warning btn-sm">Edit</button>
                        </a>&nbsp;

                        {{ Form::open(array( 'method' => 'show', 'url' => 'customer/customer/'.$currentOrder->id, 'onsubmit' => 'return ConfirmDelete()')) }}
                        {{ Form::submit('Delete', ['class' => 'btn btn-success btn-sm']) }}
                        {{ Form::close() }}
                    </div>
                    </td>
                  </tr>
                 
                  @endforeach
                </tbody>
              </table>
              @else
                  <p>There are no active orders available at the moment. You can submit your task under the 'Place order' menu tab</p>
                  <p>Dont sweat! you can get a preview before paying. Just select, request preview when placing an order.</p>

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
                  <td><a href="customer/{{$revisionOrder->id}}">{{$revisionOrder->id}}</a></td>
                  <td>{{$revisionOrder->topic}}</td>
                  <td>{{$revisionOrder->customer_id}}</td>
                  <td>{{$revisionOrder->merchant_id}}</td>
                  <td>{{$revisionOrder->created_at}}</td>
                  <td>{{$revisionOrder->updated_at}}</td>
                  <td>
                  <div class="btn-group" role="group" aria-label="Basic example">
                  <a href="{{ URL::to('customer/' . $revisionOrder->id . '/edit') }}">
                            <button type="button" onclick="confirmReview()" class="btn btn-warning btn-sm">Edit</button>
                      </a>&nbsp;

                      {{ Form::open(array( 'method' => 'show', 'url' => 'customer/customer/'.$revisionOrder->id, 'onsubmit' => 'return ConfirmDelete()')) }}
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
                    <td><a href="customer/{{$disputeOrder->id}}">{{$disputeOrder->id}}</a></td>
                    <td>{{$disputeOrder->topic}}</td>
                    <td>{{$disputeOrder->customer_id}}</td>
                    <td>{{$disputeOrder->merchant_id}}</td>
                    <td>{{$disputeOrder->created_at}}</td>
                    <td>{{$disputeOrder->updated_at}}</td>
                    <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ URL::to('customer/' . $disputeOrder->id . '/edit') }}">
                              <button type="button" onclick="confirmReview()" class="btn btn-warning btn-sm">Edit</button>
                        </a>&nbsp;

                        {{ Form::open(array( 'method' => 'show', 'url' => 'customer/customer/'.$disputeOrder->id, 'onsubmit' => 'return ConfirmDelete()')) }}
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
                    <th scope="row">{{$cancelledOrder->id}}</th>
                    <td><a href="customer/{{$cancelledOrder->id}}">{{$cancelledOrder->topic}}</a></td>
                    <td>{{$cancelledOrder->topic}}</td>
                    <td>{{$cancelledOrder->customer_id}}</td>
                    <td>{{$cancelledOrder->merchant_id}}</td>
                    <td>{{$cancelledOrder->created_at}}</td>
                    <td>{{$cancelledOrder->updated_at}}</td>
                    <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ URL::to('customer/' . $cancelledOrder->id . '/edit') }}">
                              <button type="button" onclick="confirmReview()" class="btn btn-warning btn-sm">Edit</button>
                        </a>&nbsp;

                        {{ Form::open(array( 'method' => 'show', 'url' => 'customer/customer/'.$cancelledOrder->id, 'onsubmit' => 'return ConfirmDelete()')) }}
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
                    <th scope="row">{{$completedOrder->id}}</th>
                    <td><a href="customer/{{$completedOrder->id}}">{{$completedOrder->name}}</a></td>
                    <td>{{$completedOrder->topic}}</td>
                    <td>{{$completedOrder->customer_id}}</td>
                    <td>{{$completedOrder->merchant_id}}</td>
                    <td>{{$completedOrder->created_at}}</td>
                    <td>{{$completedOrder->updated_at}}</td>
                    <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ URL::to('customer/orders/' . $completedOrder->id . '/edit') }}">
                              <button type="button" onclick="confirmReview()" class="btn btn-warning btn-sm">Edit</button>
                        </a>&nbsp;

                        {{ Form::open(array( 'method' => 'show', 'url' => 'customer/customer/'.$completedOrder->id, 'onsubmit' => 'return ConfirmDelete()')) }}
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