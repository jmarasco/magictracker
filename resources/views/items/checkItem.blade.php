@extends('layouts.main')

@section('title')
Check an Item - MagicTracker
@stop

@section('navbar')
  @include('includes.navbarLoggedIn')
@stop

@section('jumbotron')
<div class="jumbotron login">
    <div class="container jumbotron-content">

      <div class="col-sm-6 col-sm-offset-3">

        <div class="login-heading">
          <h2>Check an Item</h2>
        </div>
        <form role="form" method="POST" action="{{ url('/itemactions/check') }}">
          {!! csrf_field() !!}

          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input type="itemId" class="form-control" placeholder="itemId" name="itemId" value="{{ old('email') }}">
          </div>

          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

            <input type="checkType" placeholder="checkType" class="form-control" name="checkType">

          </div>

          <div class="form-group">

            <button type="submit" class="btn btn-block btn-lg btn-primary">
              <i class="fa fa-btn fa-sign-in"></i>Check
            </button>
          
          </div>
        </form>

      </div>
    </div>
    <div class="blue-cast">
    </div>
  </div>
@stop