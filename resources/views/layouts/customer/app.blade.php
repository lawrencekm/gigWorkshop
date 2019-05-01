<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Wezaworkshop') }}</title>
    <!--<title>wework</title>-->

    <!-- Styles -->
  <!--  <link href="{{ asset('css/app.css') }}" rel="stylesheet">-->


<!--added from here-->

  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <!--Fonts-->
  <link href='https://fonts.googleapis.com/css?family=Miriam+Libre:400,700' rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">

<!--bootstrap-4 -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <style>
    body { font-family: 'Rubik', sans-serif;font-size: 13px;}
  #footer{text-align: left; padding:5px;}
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  .nav-item:hover {background-color:grey;}
  .nav-link:hover {color:white;}
  </style>



</head>
<body>
<div class="jumbotron text-center" style="margin-bottom:0px">
  <h3>WEZAWORKSHOP</h3>
  <p>"your most complex task is a cinch to our talented freelancers"</p> 
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="#">Wezaworkshop</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">My Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">News</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Billing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Resources</a>
      </li>
      
      @guest

      <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">Login</a>
      </li>    
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}">Register</a>
        </li>   


      @else
          <li  class="nav-item">
                
                      <a class="nav-link" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                          Logout
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                 
              </li>
      @endguest

      <li style="float:right" class="nav-item">
          <span  class="nav-link"  >Hi, {{ Auth::user()->firstname}} . Your Time:/span>
      </li> 
  </ul>


  </div>  
</nav>

<div class="container" style="margin-top:30px">
  <div class="row">
        @yield('side')

 </div>
</div>


<div class="jumbotron text-center" style="margin-bottom:0">
  <div class="container" id="footer" style="margin-top:5px">
    <div class="row">
      <div class="col-sm-4">         
            <pre>
<strong>COMPANY</strong>
About Us | Investor Relations | Careers
Press | Trust & Safety | T.o.S
Privacy Policy</pre>  
       
          
      </div>
      <div class="col-sm-4"> 

<pre>
<strong>RRESOURCES</strong>
Customer Support, Hiring Resources
Weza Blog | Customer Stories
Business Resources | Payroll Services
</pre> 
      </div>
      <div class="col-sm-4">
         <pre>
<strong>BROWSE</strong>
Freelancers by Skill
Freelancers in KENYA | USA
Find Jobs
</pre> 
      </div>
    </div>
  </div>

</div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

