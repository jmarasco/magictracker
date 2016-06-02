@extends('layouts.items')

@section('title')
{{ $title }} - MagicTracker
@yield('title')
@stop

@section('navbar-parks')
  <nav class="navbar navbar-default navbar-parks-navbar">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse navbar-parks" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li @if ($title == 'Magic Kingdom') class="active"><span class="sr-only">(current)</span @endif >
            <a href="/magic-kingdom">Magic Kingdom</a></li>
          <li @if ($title == 'Epcot') class="active"><span class="sr-only">(current)</span @endif >
            <a href="/epcot">Epcot</a></li>
          <li @if ($title == 'Hollywood Studios') class="active"><span class="sr-only">(current)</span @endif >
            <a href="/hollywood-studios">Hollywood Studios</a></li>
          <li @if ($title == 'Animal Kingdom') class="active"><span class="sr-only">(current)</span @endif >
            <a href="/animal-kingdom">Animal Kingdom</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav><!-- Parks nav bar -->
@stop

@section('list-nav')
  <nav class="row navbar navbar-default navbar-list" role="navigation">
    <ul class="nav navbar-nav navbar-left">
      <li @if (empty($category)) class="active"><span class="sr-only">(current)</span @endif >
        <a href="{{ URL::current() }}">All (<span class="total-count">{{ $totalCount }}</span>)</a></li>
      <li @if ($category == 'attractions') class="active"><span class="sr-only">(current)</span @endif >
        <a href="{{ URL::current() }}?category=attractions">Attractions (<span class="attraction-count">{{ $attractionCount }}</span>)</a></li>
      <li @if ($category == 'entertainment') class="active"><span class="sr-only">(current)</span @endif >
        <a href="{{ URL::current() }}?category=entertainment">Entertainment (<span class="entertainment-count">{{ $entertainmentCount }}</span>)</a></li>
      <li @if ($category == 'dining') class="active"><span class="sr-only">(current)</span @endif >
        <a href="{{ URL::current() }}?category=dining">Dining (<span class="dining-count">{{ $diningCount }}</span>)</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right hidden-xs">
      <li class="sort-label">View</li>
      <li class="dropdown list-filter">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="filter-name">ALL </span><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li id="listFilterAll"><a href="{{ URL::current() }}">All</a></li>
            <li id="listFilterChecked"><a href="#">Checked</a></li>
            <li id="listFilterUnchecked"><a href="#">Unchecked</a></li>
          </ul>
      </li>
      @if(!$area)
        <li class="sort-label">Sort By</li>
        <li class="dropdown list-sort">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              @if ($sort=='location')
              Location
              @else
              Name
              @endif
              <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li id="listSortName"><a href="?sort=name">Name</a></li>
              <li id="listSortLocation"><a href="?sort=location">Location</a></li>
            </ul>
        </li>
    @endif
    </ul>
  </nav> <!-- /List nav bar -->
@stop

@section('content')
  @include ('includes.itemList')
  @yield('content')
@stop

@section('pagination')
  <nav class="list-pagination"> <!-- /pagination -->
     {!! $items->links() !!}
  </nav> <!-- /pagination -->
@stop

@section('widget')
  <div class="col-md-3 widget-column"> 
    <div class="widget-header">
      <span>You've Done</span>
    </div> <!-- /.widget-header-->
    <div class="progress-animate progress-total">
      <div class="progress-wrap progress">
        <div class="progress-bar progress"></div>
      </div> <!-- /progress bar-->
      <p>of <strong>
      @if(!empty($area)) {{ ucwords($area) }} @else {{ $title }} @endif
      </strong> <small>(<span class="total-checks">{{ $totalCheckedCount }}</span> of <span class="total-all">{{ $totalCount }}</span>)</small></p>
    </div> <!-- /.progress-total-->
    <div class="progress-animate">
      <div class="progress-wrap progress">
        <div class="progress-bar progress"></div>
      </div> <!-- /progress bar-->
      <p>of <strong>Attractions</strong> <small>(<span class="total-checks">{{ $attractionCheckedCount }}</span> of <span class="total-all">{{ $attractionCount }}</span>)</small></p>
    </div> <!-- /.progress-attractions-->
    <div class="progress-animate">
      <div class="progress-wrap progress">
        <div class="progress-bar progress"></div>
      </div> <!-- /progress bar-->
      <p>of <strong>Entertainment</strong> <small>(<span class="total-checks">{{ $entertainmentCheckedCount }}</span> of <span class="total-all">{{ $entertainmentCount }}</span>)</small></p>
    </div> <!-- /.progress-entertainment-->
    <div class="progress-animate">
      <div class="progress-wrap progress">
        <div class="progress-bar progress"></div>
      </div> <!-- /progress bar-->
      <p>of <strong>Dining</strong> <small>(<span class="total-checks">{{ $diningCheckedCount }}</span> of <span class="total-all">{{ $diningCount }}</span>)</small></p>
    </div> <!-- /.progress-dining-->
  </div> <!-- /.widget-column-->
@stop