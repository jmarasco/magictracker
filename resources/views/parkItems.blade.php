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
      <li @if ($category == 'attractions') class="active"><span class="sr-only">(current)</span @endif >
        <a href="/{{$address}}/attractions">Attractions (<span class="attraction-count">{{ $attractionCount }}</span>)<span class="sr-only">(current)</span></a></li>
      <li @if ($category == 'entertainment') class="active"><span class="sr-only">(current)</span @endif >
        <a href="/{{$address}}/entertainment">Entertainment (<span class="entertainment-count">{{ $entertainmentCount }}</span>)</a></li>
      <li @if ($category == 'dining') class="active"><span class="sr-only">(current)</span @endif >
        <a href="/{{$address}}/dining">Dining (<span class="dining-count">{{ $diningCount }}</span>)</a></li>
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
    </ul>
  </nav> <!-- /List nav bar -->
@stop

@section('content')
  <!-- Output items to list -->
  <ol id="item-list" class="master-item-list">
    <!-- /MASTER LIST ITEM -->
    @foreach($items as $item)
      <li class=" list-item unchecked">
        <div class="item-image">
          <a href="/items/{{ $item->item_name }}">
            <img class="img-responsive"
              @if($item->item_img)
                src="{{ URL::asset('img/'.$item->item_img.'.jpg') }}" 
              @else 
                src="{{ URL::asset('img/'.$placeholder.'.jpg') }}"
              @endif
                 alt="{{ $item->item_name }}">
        </div> <!-- /item image -->
        <div class="item-body">
          <div class="row">
            <div class="col-sm-8">
              <h4 class="item-name"><a href="/items/{{ $item->item_name }}">{{ $item->item_name }}</a></h4>
                <a href="/{{ $address.'/'.$category.'/'.strtolower($item->location) }}" class="item-location">{{ $item->location }}</a>
            </div> <!-- /col-xs-8 -->
            <div class="col-sm-4 actions-col">
              <div class="row actions">
                <div class="col col-xs-3 btn-col-counter">
                  <button type="button" class="btn btn-counter" aria-label="Left Align" title="Add a check">
                    <span class="check-count">1</span>
                  </button>
                </div> <!-- /col-xs-3 -->
                <div class="col col-xs-3 btn-col-to-do">
                  <button type="button" class="btn btn-link btn-to-do" aria-label="Left Align" title="Add to your To Do List">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                  </button>
                </div> <!-- /col-xs-3 -->
                <div class="col col-xs-3 btn-col-unchecked">
                  <button type="button" class="btn btn-outline btn-check-unchecked" aria-label="Left Align" title="Mark as checked">
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                  </button>
                </div> <!-- /col-xs-3 -->
                <div class="col col-xs-3 btn-col-checked">
                  <button type="button" class="btn btn-check-checked" aria-label="Left Align" title="Remove all your checks">
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                  </button>
                </div> <!-- /col-xs-3 -->
              </div> <!-- /actions -->
            </div> <!-- /col-xs-4 -->
          </div> <!-- /row -->
        </div> <!-- /item-body -->
      </li> <!-- /list-item -->
      @endforeach
  </ol> <!--- master-item-list -->
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
      <p>of <strong>{{ $title }}</strong> <small>(<span class="total-checks">17</span> of <span class="total-all">{{ $total }}</span>)</small></p>
    </div> <!-- /.progress-total-->
    <div id="mk-progress-attractions" class="progress-animate">
      <div class="progress-wrap progress" data-progress-percent="75">
        <div class="progress-bar progress"></div>
      </div> <!-- /progress bar-->
      <p>of <strong>Attractions</strong> <small>(<span class="total-checks">10</span> of <span class="total-all">{{ $attractionCount }}</span>)</small></p>
    </div> <!-- /.progress-attractions-->
    <div id="mk-progress-entertainment" class="progress-animate">
      <div class="progress-wrap progress" data-progress-percent="75">
        <div class="progress-bar progress"></div>
      </div> <!-- /progress bar-->
      <p>of <strong>Entertainment</strong> <small>(<span class="total-checks">6</span> of <span class="total-all">{{ $entertainmentCount }}</span>)</small></p>
    </div> <!-- /.progress-entertainment-->
    <div id="mk-progress-dining" class="progress-animate">
      <div class="progress-wrap progress" data-progress-percent="30">
        <div class="progress-bar progress"></div>
      </div> <!-- /progress bar-->
      <p>of <strong>Dining</strong> <small>(<span class="total-checks">14</span> of <span class="total-all">{{ $diningCount }}</span>)</small></p>
    </div> <!-- /.progress-dining-->
  </div> <!-- /.widget-column-->
@stop