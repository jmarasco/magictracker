@extends('layouts.items')

@section('title')
{{ $title }} - MagicTracker
@yield('title')
@stop

@section('list-nav')
  <nav class="row navbar navbar-default navbar-list" role="navigation">
    <ul class="nav navbar-nav navbar-left">
      <li @if ($category == 'resort') class="active"><span class="sr-only">(current)</span @endif >
        <a href="/resorts">All Resorts (<span class="character-count">{{ $resortsCount }}</span>)</a></li>
      @unless($category == 'dining')
        <li @if ($category == 'value') class="active"><span class="sr-only">(current)</span @endif >
          <a href="/{{ $address }}/value">Value (<span>{{ $valueCount }}</span>)</a></li>
        <li @if ($category == 'moderate') class="active"><span class="sr-only">(current)</span @endif >
          <a href="/{{ $address }}/moderate">Moderate (<span>{{ $moderateCount }}</span>)</a></li>
        <li @if ($category == 'deluxe') class="active"><span class="sr-only">(current)</span @endif >
          <a href="/{{ $address }}/deluxe">Deluxe (<span>{{ $deluxeCount }}</span>)</a></li>
        <li @if ($category == 'deluxe-villas') class="active"><span class="sr-only">(current)</span @endif >
          <a href="/{{ $address }}/deluxe-villas">Deluxe Villas (<span>{{ $deluxeVillasCount }}</span>)</a></li>
      @endunless

      <li @if ($category == 'dining') class="active"><span class="sr-only">(current)</span @endif >
        <a href="/resorts/dining">Resort Dining (<span class="entertainment-count">{{ $resortDiningCount }}</span>)</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right hidden-xs">
      <li class="sort-label">View</li>
      <li class="dropdown list-filter">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="filter-name">ALL </span><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li id="listFilterAll"><a href="#">All</a></li>
            <li id="listFilterChecked"><a href="#">Checked</a></li>
            <li id="listFilterUnchecked"><a href="#">Unchecked</a></li>
          </ul>
      </li>
      @if ($category == 'dining')
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
    <div id="mk-progress-total" class="progress-animate progress-total">
      <div class="progress-wrap progress" data-progress-percent="46">
        <div class="progress-bar progress"></div>
      </div> <!-- /progress bar-->
      <p>of <strong>All Resorts</strong> <small>(<span id="mk-total-checks" class="total-checks">6</span> of <span id="mk-total" class="total-all">{{ $resortsCount }}</span>)</small></p>
    </div> <!-- /.progress-total-->
    <div id="mk-progress-attractions" class="progress-animate">
      <div class="progress-wrap progress" data-progress-percent="75">
        <div class="progress-bar progress"></div>
      </div> <!-- /progress bar-->
      <p>of <strong>Value Resorts</strong> <small>(<span id="mk-attraction-checks" class="total-checks">2</span> of <span id="mk-attraction-total"class="total-all">{{ $valueCount }}</span>)</small></p>
    </div> <!-- /.progress-attractions-->
    <div id="mk-progress-entertainment" class="progress-animate">
      <div class="progress-wrap progress" data-progress-percent="75">
        <div class="progress-bar progress"></div>
      </div> <!-- /progress bar-->
      <p>of <strong>Moderate Resorts</strong> <small>(<span id="mk-entertainment-checks" class="total-checks">4</span> of <span id="mk-entertainment-total"class="total-all">{{ $moderateCount }}</span>)</small></p>
    </div> <!-- /.progress-entertainment-->
    <div id="mk-progress-dining" class="progress-animate">
      <div class="progress-wrap progress" data-progress-percent="30">
        <div class="progress-bar progress"></div>
      </div> <!-- /progress bar-->
      <p>of <strong>Deluxe Resorts</strong> <small>(<span id="mk-dining-checks" class="total-checks">0</span> of <span id="mk-dining-total" class="total-all">{{ $deluxeCount }}</span>)</small></p>
    </div> <!-- /.progress-dining-->
    <div id="mk-progress-dining" class="progress-animate">
      <div class="progress-wrap progress" data-progress-percent="30">
        <div class="progress-bar progress"></div>
      </div> <!-- /progress bar-->
      <p>of <strong>Deluxe Villas</strong> <small>(<span id="mk-dining-checks" class="total-checks">0</span> of <span id="mk-dining-total" class="total-all">{{ $deluxeVillasCount }}</span>)</small></p>
    </div> <!-- /.progress-dining-->
    <div id="mk-progress-dining" class="progress-animate">
      <div class="progress-wrap progress" data-progress-percent="30">
        <div class="progress-bar progress"></div>
      </div> <!-- /progress bar-->
      <p>of <strong>Resort Dining</strong> <small>(<span id="mk-dining-checks" class="total-checks">24</span> of <span id="mk-dining-total" class="total-all">{{ $resortDiningCount }}</span>)</small></p>
    </div> <!-- /.progress-dining-->
  </div> <!-- /.widget-column-->
@stop