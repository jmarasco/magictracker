@extends('layouts.main')

@section('navbar')
  @include('includes.navbarLoggedOut')
@stop

@section('jumbotron')

  <div class="jumbotron login">
    <div class="container jumbotron-content">

      <div class="col-sm-6 col-sm-offset-3">

        <div class="login-heading">
          <h2>Log In</h2>
        </div>
        <form role="form" method="POST" action="{{ url('/login') }}">
          {!! csrf_field() !!}

          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
            @if ($errors->has('email'))
              <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
            @endif
          </div>

          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

            <input type="password" placeholder="Password" class="form-control" name="password">

            @if ($errors->has('password'))
              <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
            @endif
          </div>

          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" name="remember"> Remember Me
              </label>
            </div>
          </div>

          <div class="form-group">

            <button type="submit" class="btn btn-block btn-lg btn-primary">
              <i class="fa fa-btn fa-sign-in"></i>Log in
            </button>
            <div>
              <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
            </div>
          </div>
        </form>

      </div>
    </div>
    <div class="blue-cast">
    </div>
  </div>

@stop