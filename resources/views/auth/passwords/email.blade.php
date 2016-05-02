@extends('layouts.main')

@section('navbar')
  @include('includes.navbarLoggedOut')
@stop

@section('jumbotron')

  <div class="jumbotron login email">
    <div class="container jumbotron-content">
      <div class="col-sm-6 col-sm-offset-3">
        @if (session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
        @endif

        <div class="login-heading">
          <h2>Forgot your password?</h2>
        </div>

        <form role="form" method="POST" action="{{ url('/password/email') }}">
          {!! csrf_field() !!}

          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

            <input type="email" placeholder="Email" class="form-control" name="email" value="{{ old('email') }}">

            @if ($errors->has('email'))
              <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
            @endif
          </div>

            <div class="form-group">
              <button type="submit" class="btn btn-lg btn-block btn-primary">
                <i class="fa fa-btn fa-envelope"></i>Send Password Reset Link
              </button>
            </div>
        </form>
      </div>
    </div>
    <div class="blue-cast">
    </div>
  </div>
@endsection
