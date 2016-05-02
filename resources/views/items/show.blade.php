@extends('layouts.items')

@section('title')
{{ $title }} - MagicTracker
@stop

@section('jumbotron')
  <div class="jumbotron">
  	<div class="white-cast">
  		<img class="img-responsive"
        @if($items->item_img)
          src="{{ URL::asset('img/'.$items->item_img.'-large.jpg') }}" 
        @else 
          src="{{ URL::asset('img/'.$placeholder.'-large.jpg') }}"
        @endif
        alt="{{ $title }}">
  	</div>
  </div>
@stop

@section('content')
      <div class="col-sm-12">
        <h1 class="title-bold">{{ $title }}</h1>
      </div>
@stop