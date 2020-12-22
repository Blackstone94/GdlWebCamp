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
            <h1>Listado de personas registradas</h1>
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
                <h3 class="card-title">Maneja a las personas registradas en esta sección</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="registros" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Fecha registro</th>
                    <th>Artículos</th>
                    <th>Talleres</th>
                    <th>Regalo</th>
                    <th>Compra</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                   <?php
                      try{
                        $sql="select registrados.*,regalos.nombre_regalo from registrados inner join regalos on registrados.regalo=regalos.id_regalo";
                        $resultado=$conn->query($sql);
                      }catch(Exception $error){
                         echo $error->getMessage();
                      }
                      while($registrado=$resultado->fetch_assoc()){?>
                        <tr>
                          <td><?php echo $registrado['nombre_registrado']." ".$registrado['apellido_registrado'];
                            $pagado=$registrado['pagado'];
                            if($pagado){
                               echo '<span class="badge bg-green">Pagado</span>';
                            }else{
                              echo '<span class="badge bg-red">No pagado</span>';
                            }
                          ?>

                          </td>
                          <td><?php echo $registrado['email_registrado']?></td>
                          <td><?php echo $registrado['fecha_registro']?></td>
                          <td><?php $articulos=json_decode($registrado['pases_articulos'],true);//objeto php
                                $arreglo_articulos=array(
                                  'un_dia'=>'Pase un dia',
                                  'pase_dosDias'=>'Pase 2 dias',
                                  'pase_completo'=>'Pase completo',
                                  'camisas'=>'Camisas',
                                  'etiquetas'=>'Etiquetas'
                                );
                                foreach($articulos as $llave=>$articulo){
                                  if(is_array($articulo))
                                    echo $articulo['cantidad'] ."  ".$arreglo_articulos[$llave]."<br>";
                                   else
                                     echo $articulo ."  ".$arreglo_articulos[$llave]."<br>";
                                }
                          ?></td>
                          <td><?php
                               $eventos_resultado=$registrado['talleres_registrados'];
                               $talleres = json_decode($eventos_resultado,true);
                               $talleres = implode("','",$talleres['eventos']);
                               $sql_talleres="SELECT nombre_evento,fecha_evento,hora_evento FROM eventos WHERE clave in ('$talleres')";
                               $resultado_talleres= $conn->query($sql_talleres);
                               while($eventos=$resultado_talleres->fetch_assoc()){
                                  echo $eventos['nombre_evento']."   ".$eventos['fecha_evento']."  ". $eventos['hora_evento']."<br>";
                               }
                          ?></td>
                          <td><?php echo $registrado['nombre_regalo']?></td>
                          <td><?php echo $registrado['total_pagado']?></td>
                          <td>
                            <a href="editar-registrados.php?id=<?php echo $registrado['id_registrado']?>" class="btn bg-orange btn-flat margin">
                              <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="#" data-id="<?php echo $registrado['id_registrado']?>" data-tipo="registrados" class="btn bg-maroon btn-flat margin borrarRegistro ">
                              <i class="fas fa-trash"></i>
                            </a>
                          </td>
                        </tr>
                      <?php }?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Nombre</th>
                    <th>Icono</th>
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
