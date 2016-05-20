@extends('layouts.items')

@section('title')
{{ $title }} - MagicTracker
@yield('title')
@stop

@section('list-nav')
  <nav class="row navbar navbar-default navbar-list" role="navigation">
    <ul class="nav navbar-nav navbar-left">
        <li>
          <a href="/characters?status=Active">Active (<span class="character-count">{{ $activeCount }}</span>)<span class="sr-only">(current)</span></a></li>
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
      <p>of <strong>{{ $title }}</strong> <small>(<span class="total-checks">{{ $checkedCount }}</span> of <span id="mk-total" class="total-all">{{ $activeCount }}</span>)</small></p>
    </div> <!-- /.progress-total-->
  </div> <!-- /.widget-column-->
@stop