@extends('layouts.main')

@section('title')
  @yield('title')
@stop

@section('navbar')
  @include('templates.navbarLoggedIn')
@stop

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

@section('list-nav')
  @yield('list-nav')
@stop

@section('content')
  @yield('content')
@stop

@section('pagination')
  @yield('pagination')
@stop

@section('widget')
  @yield('widget')
@stop