<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">MagicTracker</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          {{-- @if (Auth::check()) --}}
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ProfileName <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Dashboard</a></li>
              <li><a href="#">Progress</a></li>
              <li><a href="#">Badges</a></li>
              <li><a href="#">To Do List</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="{{ url('/logout') }}">Log Out</a></li>
            </ul>
          </li>
          {{-- @else --}}
          {{-- <li><a href="login">Log In</a></li> --}}
          {{-- @endif --}}
          <li @if ($pageType == 'park') class="active"><span class="sr-only">(current)</span @endif >
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Parks <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="/magic-kingdom">Magic Kingdom</a></li>
              <li><a href="/epcot">Epcot</a></li>
              <li><a href="/hollywood-studios">Hollywood Studios</a></li>
              <li><a href="/animal-kingdom">Animal Kingdom</a></li>
            </ul>
          </li>
          <li @if ($pageType == 'character') class="active"><span class="sr-only">(current)</span @endif >
            <a href="/characters">Characters</a></li>
          <li @if ($pageType == 'resort') class="active"><span class="sr-only">(current)</span @endif >
            <a href="/resorts">Resorts</a></li>
        </ul>
        <form class="navbar-form pull-right" role="search">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-default">
            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
          </button>
        </form>
      </div><!--/.nav-collapse -->
    </div><!--/.container -->
  </nav>