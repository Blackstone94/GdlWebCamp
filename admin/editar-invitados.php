<?php
include_once('funciones/sesiones.php');
include_once('funciones/funciones.php');
$id=$_GET['id'];
if(!filter_var($id,FILTER_VALIDATE_INT)){
   die("error");
}
include_once('templates/header.php');
include_once('templates/barra.php');
include_once('templates/aside.php')?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
          <div class="text-center">
            <h1>Agrega un nuevo invitado <br>
            <small>Llena el formulario para agregar un invitado</small>
            </h1>
          </div>
          <?php
            $sql="SELECT * FROM invitados WHERE invitado_id=$id";
            $resultado = $conn->query($sql);
            $invitado=$resultado->fetch_assoc();
          ?>
          <div class="col-md-8">
            <form role="form" method="post" id="guardar-registro-archivos" name="guardar-registro-archivos" action="modelo-invitados.php" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nombre_invitado">Nombre invitado</label>
                    <input type="text" class="form-control" id="nombre_invitado" name="nombre_invitado" placeholder="Nombre del invitado" value="<?php echo $invitado['nombre_invitado']?>">
                  </div>
                  <div class="form-group">
                    <label for="apellido_invitado">Apeillido invitado</label>
                    <input type="text" class="form-control" id="apellido_invitado" name="apellido_invitado" placeholder="Apeillido del invitado" value="<?php echo $invitado['apellido_invitado']?>">
                  </div>
                  <div class="form-group">
                    <label for="biografia_invitado">Biografia: </label>
                    <textarea class="form-control" name="biografia_invitado" id="biografia_invitado"  rows="10" placerholder="Biografia del invitado"><?php
                    echo $invitado['descripcion']?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="imagen_anterior">Imagen: </label>
                    <br>
                  </div>
                    <img src="../img/invitados/<?php echo $invitado['url_imagen']?>" width="200">
                  <div class="form-group">
                     <label for="archivo_imagen">Custom File</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="archivo_imagen" name="archivo_imagen">
                      <label class="custom-file-label">Añade la fotografia del invitado</label>
                    </div>
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="hidden" name="registro" value="editar">
                  <input type="hidden" name="id_registro" value="<?php echo $invitado['invitado_id']?>">
                  <button type="submit" class="btn btn-primary" id="crear-registro">Añadir </button>
                </div>
            </form>
          </div>
      </div><!-- /.container-fluid -->
    </section>

  </div>
  <!-- /.content-wrapper -->

  <?php include_once('templates/footer.php')?>
