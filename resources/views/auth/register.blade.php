@extends('layouts.main')

@section('navbar')
  @include('includes.navbarLoggedOut')
@stop

@section('jumbotron')

  <div class="jumbotron login">
    <div class="container jumbotron-content">

      <div class="col-sm-6 col-sm-offset-3">

        <div class="login-heading">
          <h2>Sign Up</h2>
        </div>

        <form role="form" method="POST" action="{{ url('/register') }}">
            {!! csrf_field() !!}

            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">

                    <input type="text" placeholder="Username" class="form-control" name="username" value="{{ old('username') }}">

                    @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        
                <input type="email" placeholder="Email" class="form-control" name="email" value="{{ old('email') }}">

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

            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">

                    <input type="password" placeholder="Confirm password" class="form-control" name="password_confirmation">

                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>

            <div class="form-group">

                    <button type="submit" class="btn btn-lg btn-block btn-primary">
                        <i class="fa fa-btn fa-user"></i>Register
                    </button>
                <div>
                    <a class="btn btn-link" href="{{ url('/login') }}">Already have an account? <strong>Sign in</strong></a>
                </div>
            </div>
        </form>

      </div>
    </div>
    <div class="blue-cast">
    </div>
  </div>

@stop