@extends('dashboard.layout.login')

@section('form')

<p class="login-box-msg">
  @if (@$error_message)
    {{ $error_message }}
  @else
    Sign in to start your session
  @endif
</p>

<form action="{{ URL('login/') }}" method="POST">
  @csrf

  <div class="form-group has-feedback">
    <input type="email" name="email" class="form-control" placeholder="Email">
    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
  </div>
  <div class="form-group has-feedback">
    <input type="password" name="password" class="form-control" placeholder="Password">
    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
  </div>
  <div class="row">
    <div class="col-xs-4">
      <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
    </div>
  </div>
</form>

@endsection