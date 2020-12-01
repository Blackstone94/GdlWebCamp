<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-blue navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <span class="hidden-xs">Hola: <?php echo $_SESSION['nombre']?></span>
        </a>
        <ul class="dropdown-menu">
          <li class="user-footer">
            <div class="pull-left">
              <a href="#" class="btn btn-success btn-flat">Ajustes</a>
            </div>
            <div class="pull-right">
              <a href="#" class="btn btn-success btn-flat">Cerrar sesión</a>
            </div>
          </li>
        </ul>
      </li>
    </ul>
  </nav>

  <!-- /.navbar -->
