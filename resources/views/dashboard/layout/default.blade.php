
<!DOCTYPE html>
<html>
<head>
  @stack('head-prepend')

    @include('dashboard.partial.head')

  @stack('head-append')
</head>
<body class="hold-transition skin-yellow sidebar-mini">
<div class="wrapper">
  @include('dashboard.partial.header.main-header')

  @include('dashboard.partial.header.main-sidebar')

  <div class="content-wrapper">
    @include('dashboard.partial.header.content-header')

    <section class="content">
      @yield('content')
    </section>
  </div>

  @include('dashboard.partial.footer.footer')

  {{-- @include('dashboard.partial.footer.control-sidebar') --}}
</div>

@include('dashboard.partial.script')

</body>
</html>
