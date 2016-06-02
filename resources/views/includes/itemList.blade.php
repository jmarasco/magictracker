<!-- Output items to list -->
  <ol id="item-list" class="master-item-list">
    <!-- /MASTER LIST ITEM -->
    @foreach($items as $item)
      @if ($item->checked)
      <li class="list-item checked" id="{{ $item->id }}">
      @else 
      <li class="list-item unchecked" id="{{ $item->id }}">
      @endif
      {{ csrf_field() }}
        <div class="item-image">
          <a href="/items/{{ $item->item_name }}">
            <img class="img-responsive"
              @if($item->item_img)
                src="{{ URL::asset('img/'.$item->item_img.'-small.jpg') }}" 
              @else 
                src="{{ URL::asset('img/'.$placeholder.'-small.jpg') }}"
              @endif
                 alt="{{ $item->item_name }}">
        </div> <!-- /item image -->
        <div class="item-body">
          <div class="row">
            <div class="col-sm-8">
              <h4 class="item-name"><a href="/items/{{ $item->item_name }}">{{ $item->item_name }}</a></h4>
                @if ($item->location)
                <a href="{{ URL::current() . '/' . strtolower($item->location) }}" class="item-location">{{ $item->location }}</a><span class="bullet"> &#8226</span>
                <a href="{{ URL::current() . '/' . strtolower($item->location) }}" class="item-location">{{ $item->name }}</a>
                @elseif ($item->parent)
                  <a href="/items/{{ strtolower($item->parent) }}" class="item-location">{{ $item->parent }}</a>
                @endif
            </div>
            <div class="col-sm-4 actions-col">
              <div class="row actions">
                <!-- <div class="col col-xs-3 btn-col-counter">
                  <button type="button" class="btn btn-counter" aria-label="Left Align" title="Add a check">
                    <span class="check-count">1</span>
                  </button>
                </div>
                <div class="col col-xs-3 btn-col-to-do">
                  <button type="button" class="btn btn-link btn-to-do" aria-label="Left Align" title="Add to your To Do List">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                  </button>
                </div> -->
                <div class="col col-xs-3 btn-col-unchecked">
                  <button type="button" class="btn btn-check" aria-label="Left Align" title="Mark as checked">
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </li> 
      @endforeach
  </ol> <!--- master-item-list -->