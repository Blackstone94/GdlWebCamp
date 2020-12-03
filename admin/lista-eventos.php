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
            <h1>Listado de Eventos</h1>
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
                <h3 class="card-title">Maneja los eventos en esta sección</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="registros" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Categoria</th>
                    <th>Invitado</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                   <?php
                      try{
                        $sql="SELECT evento_id,nombre_evento,fecha_evento,hora_evento,cat_evento,nombre_invitado, apellido_invitado ";
                        $sql.= " FROM eventos ";
                        $sql.=" INNER JOIN categoria_evento ON id_categoria=id_cat_evento ";
                        $sql.=" INNER JOIN invitados ON invitado_id=id_inv  ORDER BY(evento_id)";
                        $resultado=$conn->query($sql);
                      }catch(Exception $error){
                         echo $error->getMessage();
                      }
                      while($evento=$resultado->fetch_assoc()){?>
                        <tr>
                          <td><?php echo $evento['nombre_evento']?></td>
                          <td><?php echo $evento['fecha_evento']?></td>
                          <td><?php echo $evento['hora_evento']?></td>
                          <td><?php echo $evento['cat_evento']?></td>
                          <td><?php echo $evento['nombre_invitado']."  ".$evento['apellido_invitado']?></td>
                          <td>
                            <a href="editar-evento.php?id=<?php echo $evento['evento_id']?>" class="btn bg-orange btn-flat margin">
                              <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="#" data-id="<?php echo $evento['evento_id']?>" data-tipo="evento" class="btn bg-maroon btn-flat margin borrarRegistro ">
                              <i class="fas fa-trash"></i>
                            </a>
                          </td>
                        </tr>
                      <?php }?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Categoria</th>
                    <th>Invitado</th>
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

