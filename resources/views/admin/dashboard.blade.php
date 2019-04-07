@extends('layouts.admin.side')

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


      <h2>Hi Admin </h2>
      <h5>Title description, Dec 7, 2018</h5>
      <p>Some text..</p>
      <p>wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww.</p>
      <br>

<div class="container">
  <p>Toggleable Pills</p>
  <!-- Nav pills -->
  <ul class="nav nav-pills" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="pill" href="#home">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="pill" href="#menu1">Menu 1</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="pill" href="#menu2">Menu 2</a>
    </li>
</ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
      <h3>HOME</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
    <div id="menu1" class="container tab-pane fade"><br>
      <h3>Menu 1</h3>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <div id="menu2" class="container tab-pane fade"><br>
      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
  </div>
</div>




</div>





@endsection