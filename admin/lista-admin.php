<?php
include_once('funciones/sesiones.php');
include_once('funciones/funciones.php');
include_once('templates/header.php');
include_once('templates/barra.php');
include_once('templates/aside.php')?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Listado de administradores</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin-area.php">Inicio</a></li>
              <li class="breadcrumb-item active"><a href="login.php?cerrar_sesion=true"> Cerrar sesion</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Maneja los administradores en esta seccion</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="registros" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                   <?php
                      try{
                        $sql="select id,nombre,usuario from admins";
                        $resultado=$conn->query($sql);
                      }catch(Exception $error){
                         echo $error->getMessage();
                      }
                      while($admin=$resultado->fetch_assoc()){?>
                        <tr>
                          <td><?php echo $admin['usuario']?></td>
                          <td><?php echo $admin['nombre']?></td>
                          <td>
                            <a href="editar-admin.php?id=<?php echo $admin['id']?>" class="btn bg-orange btn-flat margin">
                              <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="#" data-id="<?php echo $admin['id']?>" data-tipo="admin" class="btn bg-maroon btn-flat margin borrar_registro ">
                              <i class="fas fa-trash"></i>
                            </a>
                          </td>
                        </tr>
                      <?php }?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
  </div>
  <!-- /.content-wrapper -->

  <?php include_once('templates/footer.php')?>
