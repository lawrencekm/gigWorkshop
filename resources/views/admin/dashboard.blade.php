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


      <h2>TITLE </h2>
      <h5>Title description, Dec 7, 2018</h5>
      <p>Some text..</p>
      <p>wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww.</p>
      <br>


</div>





@endsection