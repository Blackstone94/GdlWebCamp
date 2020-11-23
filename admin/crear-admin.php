<?php
include_once('templates/header.php');
include_once('templates/barra.php');
include_once('templates/aside.php')?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
          <div class="text-center">
            <h1>Crear un administrador <br>
            <small>Llena el formulario para crear un nuevo administrador</small>
            </h1>
          </div>
          <div class="col-md-8">
            <form role="form" method="post" id="crear-admin" name="crear-admin.php" action="insertar-admin.php">
                <div class="card-body">
                  <div class="form-group">
                    <label for="usuario">Usuario:</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Nombre de usuario">
                  </div>
                  <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre completo">
                  </div>
                  <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="hidden" name="agregar-admin" value="1">
                  <button type="submit" class="btn btn-primary">Añadir </button>
                </div>
            </form>
          </div>
      </div><!-- /.container-fluid -->
    </section>

  </div>
  <!-- /.content-wrapper -->

  <?php include_once('templates/footer.php')?>
