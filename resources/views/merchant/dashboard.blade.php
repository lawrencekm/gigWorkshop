@extends('layouts.merchant.side')

@section('content')


<div class="col-sm-9">
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


      <h2>TITLE HEADING</h2>
      <h5>Title description, Dec 7, 2017</h5>
      <p>Some text..</p>
      <p>Beautiful Africa!.</p>
      <br>



      <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>

</div>





@endsection