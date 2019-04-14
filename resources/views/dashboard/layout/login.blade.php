
<!DOCTYPE html>
<html>
<head>
  @stack('head-prepend')
    @include('dashboard.partial.head')
  @stack('head-append')
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="#"><b>Admin</b>LTE</a>
    </div>
    <div class="login-box-body">
      @yield('form')
    </div>
  </div>

  @include('dashboard.partial.script')
</body>
</html>
