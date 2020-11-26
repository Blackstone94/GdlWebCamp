<?php
include_once('funciones/sesiones.php');
include_once('funciones/funciones.php');
   $id=$_GET['id'];
   if(!filter_var($id,FILTER_VALIDATE_INT)){
      die("error");
   }
   include_once('templates/header.php');
   include_once('templates/barra.php');
   include_once('templates/aside.php');
?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
          <div class="text-center">
            <h1>Modifica un administrador <br>
            <small>Realiza los cambios correspondientes</small>
            </h1>
          </div>
          <div class="col-md-8">
            <?php
               $sql="SELECT * FROM admins WHERE id=$id";
               $resultado = $conn->query($sql);
               $admin=$resultado->fetch_assoc();
            ?>
            <form role="form" method="post" id="modelo-admin" name="editar-admin" action="modelo-admin.php">
                <div class="card-body">
                  <div class="form-group">
                    <label for="usuario">Usuario:</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Nombre de usuario" value=<?php echo $admin['usuario']?>>
                  </div>
                  <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre completo" value=<?php echo $admin['nombre']?>>
                  </div>
                  <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="hidden" name="registro" value="editar">
                  <input type="hidden" name="id_registro" value=<?php echo $admin['id']?>>
                  <button type="submit" class="btn btn-primary">Guardar </button>
                </div>
            </form>
          </div>
      </div><!-- /.container-fluid -->
    </section>

  </div>
  <!-- /.content-wrapper -->

  <?php include_once('templates/footer.php')?>
