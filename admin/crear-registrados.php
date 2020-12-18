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
            <h1>Agregar una persona al registro <br>
              <small>Llena el formulario para registrar a la persona</small>
            </h1>
          </div>
          <div class="col-md-8">
            <form role="form" method="post" id="modelo-admin" name="crear-evento" action="modelo-registrados.php">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del registrado">
                  </div>
                  <div class="form-group">
                    <label for="apellido">Apellido:</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido del registrado">
                  </div>
                  <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="e-mail" class="form-control" id="email" name="email" placeholder="Email del registrado">
                  </div>

                  <div class="form-group"><!--tipo de boleto-->
                    <div class="paquetes" id="paquetes">
                      <div class="card-header with-boder">
                          <h3 class="card-title">Elige los talleres</h3><br>
                      </div>
                      <ul class="lista-precios clearfix row">
                        <li class="col-md-4">
                          <div class="tabla-precios text-center">
                            <h3>Precio por dia</h3>
                            <p class="numero">$30.00</p>
                            <ul>
                              <li><i class="fas fa-check"></i>Bocadillos Gratis</li>
                              <li><i class="fas fa-check"></i>Todas las conferencias</li>
                              <li><i class="fas fa-check"></i>Todos los talleres</li>
                            </ul>
                            <div class="orden">
                              <label for="pase_dia">Boletos desados:</label>
                              <input type="number" class="form-control" min="0" placeholder="0" size="3" name="boletos[un_dia][cantidad]"  id="pase_dia">
                              <input type="hidden" value="30" name="boletos[un_dia][precio]">
                            </div>
                          </div>
                        </li>
                        <li  class="col-md-4">
                          <div class="tabla-precios text-center">
                            <h3>Todos los dias</h3>
                            <p class="numero">$50.00</p>
                            <ul>
                              <li><i class="fas fa-check"></i>Bocadillos Gratis</li>
                              <li><i class="fas fa-check"></i>Todas las conferencias</li>
                              <li><i class="fas fa-check"></i>Todos los talleres</li>
                            </ul>
                            <div class="orden">
                              <label for="pase_completo">Boletos desados:</label>
                              <input type="number" class="form-control" min="0" placeholder="0" size="3" name="boletos[pase_completo][cantidad]" id="pase_completo">
                              <input type="hidden" value="50" name="boletos[pase_completo][precio]">
                            </div>
                          </div>
                        </li>
                        <li  class="col-md-4">
                          <div class="tabla-precios text-center">
                            <h3>Pase por dos dias</h3>
                            <p class="numero">$45.00</p>
                            <ul>
                              <li><i class="fas fa-check"></i>Bocadillos Gratis</li>
                              <li><i class="fas fa-check"></i>Todas las conferencias</li>
                              <li><i class="fas fa-check"></i>Todos los talleres</li>
                            </ul>
                            <div class="orden">
                              <label for="pase_dosDias">Boletos desados:</label>
                              <input type="number" class="form-control" min="0" placeholder="0" size="3" name="boletos[pase_dosDias][cantidad]"  id="pase_dosDias">
                              <input type="hidden" value="45" name="boletos[pase_dosDias][precio]">
                            </div>
                          </div>
                        </li><!--ultimo elemento lista-->
                      </ul><!--Lista de paquetes-->
                    </div><!--paquetes-->
                  </div><!--from group boletos-->

                  <div class="form-group">
                    <div class="card-header with-boder">
                        <h4 class="card-title">Elige los talleres</h3><br>
                    </div>
                    <div id="eventos" class="eventos clearfix row">
                      <div class="caja row">
                      <?php
                        try {
                            //  include_once('includes/funciones/bd_conexion.php');
                            $sql = "SELECT eventos.*,categoria_evento.cat_evento,invitados.nombre_invitado,invitados.apellido_invitado ";
                            $sql .= " FROM eventos ";
                            $sql .= " JOIN categoria_evento on id_categoria=id_cat_evento ";
                            $sql .= " JOIN invitados on id_inv=invitado_id ";
                            $sql .= " ORDER BY eventos.fecha_evento,categoria_evento.cat_evento ";

                            $resultado = $conn->query($sql);

                        } catch (Exception $e) {
                            echo $e->getMessage();
                        }

                        setlocale(LC_TIME, 'es_ES', 'es_ES.UTF-8');
                        $dias_ES = array("lunes", "martes", "miercoles", "jueves", "viernes", "sabado", "domingo");
                        $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");

                        while ($eventos = $resultado->fetch_assoc()) {
                            $fecha = $eventos['fecha_evento'];
                            $dia_semana = strftime("%A", strtotime($fecha));
                            $nombredia = str_replace($dias_EN, $dias_ES, $dia_semana);
                            $categoria = $eventos['cat_evento'];

                            $dia = array(
                                'nombre_evento' => $eventos['nombre_evento'],
                                'hora' => $eventos['hora_evento'],
                                'id' => $eventos['evento_id'],
                                'nombre_invitado' => $eventos['nombre_invitado'] . " " . $eventos['apellido_invitado'],
                            );
                            $eventos_dias[$nombredia]['eventos'][$categoria][] = $dia;
                        }?>

                        <?php foreach ($eventos_dias as $dia => $eventos) {?>
                          <div id="<?php echo str_replace('á', 'a', $dia) ?>" class="contenido-dia row">
                            <h4 class="text-center nombre-dia"><?php echo $dia ?></h4>
                              <?php foreach ($eventos['eventos'] as $tipo => $evento_dia): ?>
                                  <div>
                                      <p> <?php echo $tipo ?></p>
                                      <?php foreach ($evento_dia as $evento) {?>
                                          <label>
                                            <input type="checkbox" name="registro_evento[]" id="<?php echo $evento['id'] ?>" value="<?php echo $evento['id'] ?>">
                                            <time><?php echo $evento['hora'] ?></time> <?php echo $evento['nombre_evento'] ?>
                                            <br>
                                            <span class="autor"><?php echo $evento['nombre_invitado'] ?></span>
                                          </label>
                                      <?php }?>
                                  </div>
                              <?php endforeach;?>
                          </div> <!--#viernes-->
                        <?php }?>
                      </div><!--div caja-->
                    </div><!--div eventos-->
                  </div><!--form group talleres-->

                  <div id="resumen" class="resumen">
                  <div class="card-header with-boder">
                        <h3 class="card-title">Pagos y extras</h3><br>
                    </div>
                      <div class="caja clearfix row">
                        <div class="extras col-md-6">
                          <div class="orden">
                            <label for="camisa_evento">Camisa del evento $10<small>(Promocion 7% dto.)</small></label>
                            <input type="number" class="form-control" size="3" id="camisa_evento" name="pedido_extra[camisas][cantidad]" min="0" placeholder="0">
                            <input type="hidden" value="10" name="pedido_extra[camisas][precio]">
                          </div>
                          <div class="orden">
                            <label for="etiquetas">Camisa del evento $10<small>(HTML, CSS, JAVASCRIPT, CHROME)</small></label>
                            <input type="number" class="form-control" size="3" id="etiquetas" name="pedido_extra[etiquetas][cantidad]"  min="0" placeholder="0">
                            <input type="hidden" name="pedido_extra[etiquetas][precio]" value="10">
                          </div>
                          <div class="orden">
                            <label for="regalo">Elige un regalo</label>
                            <select id="regalo" name="regalo" require class="form-control select2">
                              <option value="">Selecione una opcion</option>
                              <option value="2">Etiquetas</option>
                              <option value="1">Pulseras</option>
                              <option value="3">Plumas</option>
                            </select><br>
                          </div><!--orden-->
                          <input type="button" class="button" value="Calcular" id="calcular">
                        </div><!--exrtras-->

                        <div class="total col-md-6">
                          <p>Resumen: </p>
                          <div id="lista-productos">

                          </div>
                          <p>Total: </p>
                          <div id="suma-total">

                          </div>
                          <input type="hidden" name="total_pedido" id="total_pedido">
                        </div><!--total-->
                      </div><!--caja-->
                  </div><!--resumen-->

                <div class="card-footer">
                  <input type="hidden" name="registro" value="nuevo">
                  <button type="submit" class="btn btn-primary" id="btnRegistro">Añadir </button>
                </div>
            </form>
          </div><!--div columnas 80%-->
      </div><!-- /.container-fluid -->
    </section>
  </div>
  <!-- /.content-wrapper -->

  <?php include_once 'templates/footer.php'?>

