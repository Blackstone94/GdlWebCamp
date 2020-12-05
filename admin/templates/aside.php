  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../index.php" class="brand-link">
      <img src="../../img/logo.svg"
           alt="Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['nombre']?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">Menu de adminsitracion</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-calendar"></i>
              <p>
                Eventos
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="lista-eventos.php" class="nav-link">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Ver todos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="crear-evento.php" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Agregar</p>
                </a>
              </li>
            </ul>
          </li><!--EVENTOS-->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Categoria eventos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="lista-categorias.php" class="nav-link">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Ver todos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="crear-categorias.php" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Agregar</p>
                </a>
              </li>
            </ul>
          </li><!--CATEGORIA EVENTOS-->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
                Invitados
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="lista-invitados.php" class="nav-link">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Ver todos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="crear-invitados.php" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Agregar</p>
                </a>
              </li>
            </ul>
          </li><!--INVITADOS-->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <i class="fas fa-address-card"></i>
              <p>
                Registrados
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Ver todos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Agregar</p>
                </a>
              </li>
            </ul>
          </li><!--REGISTRADOS-->
          <?php if($_SESSION['nivel']==1):?>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
              <i class="fas fa-user-tie"></i>
                <p>
                  Administradores
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="lista-admin.php" class="nav-link">
                    <i class="fa fa-list nav-icon"></i>
                    <p>Ver todos</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="crear-admin.php" class="nav-link">
                    <i class="fa fa-plus nav-icon"></i>
                    <p>Agregar</p>
                  </a>
                </li>
              </ul>
            </li><!--ADMINISTRADORES-->
          <?php endif;?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <i class="fas fa-comments"></i>
              <p>
                Testimoniales
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Ver todos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Agregar</p>
                </a>
              </li>
            </ul>
          </li><!--TESTIMONIALES-->
          <li class="nav-item">
            <a href="login.php?cerrar_sesion=true" class="nav-link">
              <i class="fa fa-key nav-icon"></i>
              <p>Cerrar sesion</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
