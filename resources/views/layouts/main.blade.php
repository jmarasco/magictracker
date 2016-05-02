<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
  <title>@yield('title')</title>
  @section('head')
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- FONTS -->
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700' rel='stylesheet' type='text/css'>
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="stylesheet" href=" {{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
  @show
</head>
<body>
  @section('navbar')
    @if (Auth::check())
      @include('includes.navbarLoggedIn')
    @else
      @include('includes.navbarLoggedOut')
    @endif
    @yield('navbar')
  @show
  
  @yield('jumbotron')

  @yield('navbar-parks')

  <div class="container main-content"> <!-- /.main-content-->
    <div class="col-md-9 list-column"> <!-- /.list-column-->

  @yield('list-nav')

  @yield('content')

  @yield('pagination')

    </div> <!-- /.list-column-->

  @yield('widget')

  </div> <!-- /.main-content-->
    <div class="container footer">
    <hr>
    <footer>
      <p>&copy; MagicTracker 2016</p>
    </footer>
  </div> <!-- /.container .footer -->  
      <!-- delete "http:" for jquery and analytics links -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
  <script src="{{ URL::asset('js/vendor/bootstrap.min.js') }}"></script>
  <script src="{{ URL::asset('js/main.js') }}"></script>
  <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
  <script>
      (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
      function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
      e=o.createElement(i);r=o.getElementsByTagName(i)[0];
      e.src='http://www.google-analytics.com/analytics.js';
      r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
      ga('create','UA-XXXXX-X','auto');ga('send','pageview');
  </script>
</body>
</html>
