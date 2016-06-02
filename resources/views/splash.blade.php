@extends('layouts.main')

@section('title')
MagicTracker
@stop

@section('navbar')
@stop

@section('jumbotron')
<div class="splash">
  <!-- <div class="blue-cast"></div> -->
  <div class="container">
    <div class="row row-centered">
      <h1 class="title-bold">MagicTracker</h1>
	    <div class="col-sm-8 col-centered buttons">
		  	<div class="col-sm-4 col-centered">
	          <a href="register" class="btn btn-block btn-lg btn-danger">
				    Sign Up
	          </a>
		    </div>
		    <div class="col-sm-4 col-centered">
			    <a href="login" class="btn btn-block btn-lg btn-success">
				    Log in
			    </a>
		   	</div>
   	</div>
    </div>
  </div>
  </div>
@stop

@section('content')

@endsection
