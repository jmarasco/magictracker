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
                <a href="#" class="item-location">{{ $item->location }}</a>
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
      <p>of <strong>{{ $title }}</strong> <small>(<span class="total-checks">17</span> of <span id="mk-total" class="total-all"><?php echo $activeCount; ?></span>)</small></p>
    </div> <!-- /.progress-total-->
  </div> <!-- /.widget-column-->
@stop