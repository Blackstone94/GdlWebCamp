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
          <div class="text-center">
            <h1>Crear una categoria <br>
            <small>Llena el formulario para crear una nueva categoria</small>
            </h1>
          </div>
          <div class="col-md-8">
            <form role="form" method="post" id="modelo-admin" name="crear-admin" action="modelo-admin.php">
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
                    <label>Icono</label>
                        <div class="input-group">
                        <div class="input-group-prepend">
                            <spam class="input-group-text">
                                <i class="fas fa-address-book"></i>
                            </spam>
                        </div>
                        <input type="text" id="icono" name="icono" class="form-control pull-right" placeholder="fa-icon">
                    </div>
                    </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="hidden" name="registro" value="nuevo">
                  <button type="submit" class="btn btn-primary" id="crear-registro">Añadir </button>
                </div>
            </form>
          </div>
      </div><!-- /.container-fluid -->
    </section>

  </div>
  <!-- /.content-wrapper -->

  <?php include_once('templates/footer.php')?>
