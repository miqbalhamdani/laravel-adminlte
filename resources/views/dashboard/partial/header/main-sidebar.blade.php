<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ asset('adminlte/dist/img/user4-128x128.jpg') }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Alexander Pierce</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    {{-- <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form> --}}
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="@if(Request::segment(2) == '') active @endif">
        <a href="{{ URL('/admin') }}">
          <i class="fa fa-dashboard"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="@if(Request::segment(2) == 'post') active @endif">
        <a href="{{ URL('/admin/post') }}">
          <i class="fa fa-sticky-note"></i>
          <span>Post</span>
        </a>
      </li>
    </ul>
  </section>
</aside>