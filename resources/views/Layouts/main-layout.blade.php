<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

@yield('header')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="/admin-assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

    </ul>

    <!-- Right navbar links -->
  
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/admin-assets/dist/img/default.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <li class="nav-item menu-open">
            <a href="#" class="nav-link ">
                <i class="nav-icon fas fa-tachometer-alt" style="height:30px;"></i>
              <p>
                Dashboard
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/Multiflower-Report-System/home-page" class="nav-link @yield('inbox-nav-active')">
                  <img src="/assets/img/notification.png" alt="" style="height:30px;">
                  <p>Inbox Reports</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/Multiflower-Report-System/compose-report" class="nav-link @yield('compose-nav-active')">
                  <img src="/assets/img/edit.png" alt="" style="height:30px;">
                  <p>Compose Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/Multiflower-Report-System/view-my-reports-list" class="nav-link @yield('my-report-nav-active')">
                  <img src="/assets/img/accounting.png" alt="" style="height:30px;">
                  <p>My Reports</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/Multiflower-Report-System/Messenger-page" class="nav-link @yield('direct-message-nav-active')">
                    <img src="/assets/img/chat.png" alt="" style="height:30px;">
                  <p>Direct Chat</p>
                </a>
              </li>


               <br>
              <li class="nav-header">Action</li>

             @if(Auth::user()->userType == 'managerAccess' || Auth::user()->userType == 'admin')
             <li class="nav-item">
               <a href="/Multiflower-Report-System/manager-home-page" class="nav-link @yield('manager-nav-active')">
                   <img src="/assets/img/unauthorized-person.png" alt="" style="height:30px;">
                 <p>Manager Access</p>
               </a>
             </li>
             @endif

              <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                  <img src="/assets/img/power-off.png" alt="" style="height:20px;">
                  <p class="text">Logout</p>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
              </li>

          </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  @yield('page-content')
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; {{date('M, Y')}} <a href="#">Multiflower LTD </a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@yield('footer')
</body>
</html>
