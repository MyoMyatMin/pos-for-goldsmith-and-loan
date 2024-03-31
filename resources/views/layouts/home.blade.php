<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Manangement Panel</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
 

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">POS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        
        <ul
          class="nav nav-pills nav-sidebar flex-column"
          data-widget="treeview"
          role="menu"
          data-accordion="false"
        >
        @admin
        <li class="nav-item">
          <a
              href="/register"
              class="nav-link {{Request::segment(1) == 'register' ? 'active' : '' }}"
          >
              <i class="far fa-circle nav-icon"></i>
              <p>Create A New User</p>
          </a>
      </li>

      <li class="nav-item">
        <a
            href="/users"
            class="nav-link {{Request::segment(1) == 'users' ? 'active' : '' }}"
        >
            <i class="far fa-circle nav-icon"></i>
            <p>User Lists</p>
        </a>
    </li>
    @endadmin
        <li class="nav-item">
          <a
              href="/todayPrice"
              class="nav-link {{Request::segment(1) == 'todayPrice' ? 'active' : '' }}"
          >
              <i class="far fa-circle nav-icon"></i>
              <p>Today Price</p>
          </a>
      </li>
       
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
          <li class="nav-item menu-close">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Sales Pages
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a
                    href="/sales"
                    class="nav-link {{Request::segment(1) == 'sales' ? 'active' : '' }}"
                >
                    <i class="far fa-circle nav-icon"></i>
                    <p>Sales</p>
                </a>
            </li>
            <li class="nav-item">
              <a
                  href="/debtlists"
                  class="nav-link {{Request::segment(1) == 'debtlists' ? 'active' : '' }}"
              >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Debt Lists</p>
              </a>
          </li>
          <li class="nav-item">
            <a
                href="/paidDebts"
                class="nav-link {{Request::segment(1) == 'paidDebts' ? 'active' : '' }}"
            >
                <i class="far fa-circle nav-icon"></i>
                <p>Paid Debt Lists</p>
            </a>
        </li>
            </ul>
          </li>
          <li class="nav-item menu-close">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Mortgages Pages
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a
                    href="/mortgages"
                    class="nav-link {{Request::segment(1) == 'mortgages' ? 'active' : ''  }}"
                >
                    <i class="far fa-circle nav-icon"></i>
                    <p>Mortgages</p>
                </a>
            </li>
          
            
            <li class="nav-item">
                <a
                    href="/chargeamounts"
                    class="nav-link {{Request::segment(1) == 'chargeamounts' ? 'active' : '' }}"
                >
                    <i class="far fa-circle nav-icon"></i>
                    <p>Charge Amounts</p>
                </a>
            </li>
            <li class="nav-item">
                <a
                    href="/redeemlists"
                    class="nav-link {{Request::segment(1) == 'redeemlists' ? 'active' : '' }}"
                >
                    <i class="far fa-circle nav-icon"></i>
                    <p>Redeem Lists</p>
                </a>
            </li>
            </ul>
          </li>
          <li class="nav-item menu-close">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                BuyBack Pages
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a
                    href="/buybacks"
                    class="nav-link {{Request::segment(1) == 'buybacks' ? 'active' : '' }}"
                >
                    <i class="far fa-circle nav-icon"></i>
                    <p>BuyBacks</p>
                </a>
            </li>
            
            </ul>
          </li>
          <li class="nav-item menu-close">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Extra Pages
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @admin
            <li class="nav-item">
              <a
                  href="/dailyProfits"
                  class="nav-link {{Request::segment(1) == 'dailyProfits' ? 'active' : '' }}"
              >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daily Profits</p>
              </a>
              
          </li>
          <li class="nav-item">
            <a
                href="/todayAmounts"
                class="nav-link {{Request::segment(1) == 'todayAmounts' ? 'active' : '' }}"
            >
                <i class="far fa-circle nav-icon"></i>
                <p>Today Amounts</p>
            </a>
        </li>
        @endadmin
            <li class="nav-item">
              <a
                  href="/plainvouncher"
                  class="nav-link {{Request::segment(1) == 'plainvouncher' ? 'active' : '' }}"
              >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Plain Vouncher</p>
              </a>
          </li>
          <li class="nav-item">
            <a
                href="/calculator"
                class="nav-link {{Request::segment(1) == 'calculator' ? 'active' : '' }}"
            >
                <i class="far fa-circle nav-icon"></i>
                <p>Calculator</p>
            </a>
        </li>
            </ul>
          </li>
         
        </ul>
        <hr style="border-color: azure">
        <div class="text-center">
          <form action="/logout" method="POST">
              @csrf
              <button class="btn btn-default" type="submit">Logout</button>
          </form>
        </div>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  @yield('content')
  
  <!-- Main Footer -->
  {{-- <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      <form action="logout" method="POST">
          @csrf
          <button class="btn btn-default" type="submit">Logout</button>
      </form>
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer> --}}
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="/plugins/datatables/jquery.dataTables.js"></script>
<script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>
</body>
</html>