<?php
include_once 'funciones/sesiones.php';
include_once 'funciones/funciones.php';
include_once 'templates/header.php';
include_once 'templates/barra.php';
include_once 'templates/aside.php'?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
          <div class="text-center">
            <h1>Crear un evento <br>
            <small>Llena el formulario para crear un nuevo evento</small>
            </h1>
          </div>
          <div class="col-md-8">
            <form role="form" method="post" id="modelo-evento" name="crear-evento" action="modelo-evento.php">
                <div class="card-body">
                  <div class="form-group">
                    <label for="titulo">Titulo:</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo del evento">
                  </div>

                 <!-- Date -->
                 <div class="form-group">
                    <label>Fecha evento:</label>
                      <div class="input-group date" id="reservationdate" data-target-input="nearest">
                          <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
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
                              $sql = "SELECT * from categoria_evento ";
                              $resultado = $conn->query($sql);

                              while ($cat_evento = $resultado->fetch_assoc()) {?>
                                <option value=<?php echo $cat_evento['id_categoria'] ?>>
                                  <?php echo $cat_evento['cat_evento'] ?>
                                </option>
                              <?php }
                          } catch (Exception $e) {
                             echo $e->getMessage();
                          }?>
                    </select>
                  </div>

                  <div class="bootstrap-timepicker">
                    <div class="form-group">
                      <label>Hora del evento:</label>
                      <div class="input-group date" id="timepicker" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#timepicker"/>
                        <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                        </div>
                        </div>
                      <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
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

  <?php include_once 'templates/footer.php'?>

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
