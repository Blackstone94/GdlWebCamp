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
            <h1>Modifica una categoria <br>
            <small>Realiza los cambios correspondientes</small>
            </h1>
          </div>
          <div class="col-md-8">
            <?php
               $sql="SELECT * FROM categoria_evento WHERE id_categoria=$id";
               $resultado = $conn->query($sql);
               $categoria=$resultado->fetch_assoc();
            ?>
            <form role="form" method="post" id="modelo-admin" name="editar-admin" action="modelo-categorias.php">
              <div class="card-body">
                <div class="form-group">
                  <label for="cat_evento">Nombre categoria:</label>
                  <input type="text" class="form-control" id="cat_evento" name="cat_evento" placeholder="Nombre de la categoria" value="<?php echo $categoria['cat_evento'] ?>">
                </div>

                <div class="form-group">
                  <label for="icono">Icono</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                        <spam class="input-group-text">
                            <i class="fas fa-address-book"></i>
                        </spam>
                    </div>
                    <input type="text" id="icono" name="icono" class="form-control pull-right" placeholder="fa-icon" value="<?php echo $categoria['icono']?>">
                  </div>
                </div>

                <div class="card-footer">
                  <input type="hidden" name="registro" value="editar">
                  <input type="hidden" name="id_registro" value=<?php echo $categoria['id_categoria']?>>
                  <button type="submit" class="btn btn-primary" id="crear-registro">Guardar </button>
                </div>
            </form>
          </div>
      </div><!-- /.container-fluid -->
    </section>

  </div>
  <!-- /.content-wrapper -->

  <?php include_once('templates/footer.php')?>
