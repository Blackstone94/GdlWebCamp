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
            <h1>Modifica un evento<br>
            <small>Realiza los cambios correspondientes</small>
            </h1>
          </div>
          <div class="col-md-8">
            <?php
               $sql="SELECT * FROM eventos WHERE evento_id=$id";
               $resultado = $conn->query($sql);
               $evento=$resultado->fetch_assoc();
               $fecha=$evento['fecha_evento'];
               $fechaFormateada = date('m/d/Y',strtotime($fecha));
            ?>
            <form role="form" method="post" id="modelo-admin" name="crear-evento" action="modelo-evento.php">
                <div class="card-body">
                  <div class="form-group">
                    <label for="titulo">Titulo:</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo del evento" value="<?php echo $evento['nombre_evento']?>">
                  </div>

                 <!-- Date -->
                 <div class="form-group">
                    <label>Fecha evento:</label>
                      <div class="input-group date" id="reservationdate" data-target-input="nearest">
                          <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="fecha" value="<?php echo $fechaFormateada?>"/>
                          <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="categoria">Categoria:</label>
                    <select class="form-control select2"  name="categoria_evento">
                         <option value="0"> --Seleccion una categoria --</option>
                         <?php
                          try {
                              $categoriaActual=$evento['id_cat_evento'];
                              $sql = "SELECT * from categoria_evento ";
                              $resultado = $conn->query($sql);

                              while ($cat_evento = $resultado->fetch_assoc()) {
                                if($cat_evento['id_categoria']==$categoriaActual){?>
                                <option value="<?php echo $cat_evento['id_categoria']?>" selected>
                                  <?php echo $cat_evento['cat_evento'] ?>
                                </option>
                                <?php }else{?>
                                  <option value="<?php echo $cat_evento['id_categoria']?>">
                                  <?php echo $cat_evento['cat_evento'] ?>
                                </option>
                                <?php }
                               }
                          } catch (Exception $e) {
                             echo $e->getMessage();
                          }?>
                    </select>
                  </div>

                  <div class="bootstrap-timepicker">
                    <div class="form-group">
                      <label>Hora del evento:</label>
                      <?php
                          $hora =  $evento['hora_evento'];
                          $horaFormateada=date('h:i',strtotime($hora));
                      ?>
                      <div class="input-group date" id="timepicker" data-target-input="nearest" >
                        <input type="text" class="form-control datetimepicker-input" data-target="#timepicker" name="hora_evento" value="<?php echo $horaFormateada?>"/>
                        <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                        </div>
                        </div>
                      <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
                  </div>

                  <div class="form-group">
                    <label for="invitado">Invitado o ponente:</label>
                    <select class="form-control select2"  name="invitado">
                         <option value="0"> --Seleccion un invitado o ponente --</option>
                         <?php
                          try {
                              $sql = "SELECT invitado_id,nombre_invitado,apellido_invitado from invitados ";
                              $resultado = $conn->query($sql);
                              $id_invitado=$evento["id_inv"];
                              while ($invitado = $resultado->fetch_assoc()) {
                                if($id_invitado==$invitado['invitado_id']){?>
                                <option value="<?php echo $invitado['invitado_id']?>" selected>
                                  <?php echo $invitado['nombre_invitado']." ". $invitado['apellido_invitado']; ?>
                                </option>
                              <?php }else {?>
                                <option value="<?php echo $invitado['invitado_id']?>">
                                  <?php echo $invitado['nombre_invitado']." ". $invitado['apellido_invitado']; ?>
                                </option>
                             <?php }
                            }
                          } catch (Exception $e) {
                             echo $e->getMessage();
                          }?>
                    </select>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="hidden" name="registro" value="editar">
                  <input type="hidden" name="id_registro" value="<?php echo $evento["evento_id"]?>">
                  <button type="submit" class="btn btn-primary" id="crear-registro_evento">Modificar </button>
                </div>
            </form>

          </div>
      </div><!-- /.container-fluid -->
    </section>

  </div>
  <!-- /.content-wrapper -->

  <?php include_once('templates/footer.php')?>
  <script>
  $(function () {
        //Date range picker
        $('#reservationdate').datetimepicker({
        format: 'L'
    });
        //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })
  })
</script>
