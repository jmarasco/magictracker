@extends('layouts.main')

@section('navbar')
  @include('includes.navbarLoggedOut')
@stop

@section('jumbotron')

  <div class="jumbotron login reset">
    <div class="container jumbotron-content">
      <div class="col-sm-6 col-sm-offset-3">

        <div class="login-heading">
          <h2>Reset your password</h2>
        </div>

        <form role="form" method="POST" action="{{ url('/password/reset') }}">
          {!! csrf_field() !!}

          <input type="hidden" name="token" value="{{ $token }}">

          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              
            <input type="email" placeholder="Email" class="form-control" name="email" value="{{ $email or old('email') }}">

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
            <div class="col-md-6 col-md-offset-4">
              <button type="submit" class="btn btn-primary">
                <i class="fa fa-btn fa-refresh"></i>Reset Password
              </button>
            </div>
          </div>
      </form>
    </div>
    <div class="blue-cast">
    </div>
  </div>
@endsection
