@extends('layouts.main')

@section('jumbotron')
  <div class="jumbotron {{ $address }}">
    <div class="container jumbotron-content">
      <div class="col-sm-12">
        <h1 class="title-bold">{{ $title }}</h1>
      </div>
    </div>
    <div class="white-cast"></div>
  </div>
  @yield('jumbotron')
@stop

@section('navbar-parks')
  <nav class="navbar navbar-default navbar-parks-navbar"></nav>
  @yield('navbar-parks')
@stop