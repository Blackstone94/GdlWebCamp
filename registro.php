<?php include_once 'includes/templates/header.php'?>

  <section class="seccion contenedor">
    <h2>Registro de usuarios</h2>
    <form id="registro" class="registro" action="pagos.php" method="POST">
      <div id="datos_usuario" class="clearfix registro caja">
        <div class="campo">
          <label for="nombre">Nombre</label>
          <input type="text" id="nombre" placeholder="Tu nombre" name="nombre">
        </div>
        <div class="campo">
          <label for="apellido">apellido</label>
          <input type="text" id="apellido" placeholder="Tu apellido" name="apellido">
        </div>
        <div class="campo">
          <label for="e-mail">E-mail</label>
          <input type="text" id="email" placeholder="Tu e-mail" name="e-mail">
        </div>
        <div id="error"></div>
      </div><!--datos usuario-->
      <div class="paquetes" id="paquetes">
        <h3>Elige el numero de boletos</h3>

        <ul class="lista-precios clearfix">
          <li>
            <div class="tabla-precios">
              <h3>Precio por dia</h3>
              <p class="numero">$30.00</p>
              <ul>
                <li><i class="fas fa-check"></i>Bocadillos Gratis</li>
                <li><i class="fas fa-check"></i>Todas las conferencias</li>
                <li><i class="fas fa-check"></i>Todos los talleres</li>
              </ul>
              <div class="orden">
                <label for="pase_dia">Boletos desados:</label>
                <input type="number" min="0" placeholder="0" size="3" name="boletos[un_dia][cantidad]"  id="pase_dia">
                <input type="hidden" value="30" name="boletos[un_dia][precio]">
              </div>
            </div>
          </li>
          <li>
            <div class="tabla-precios">
              <h3>Todos los dias</h3>
              <p class="numero">$50.00</p>
              <ul>
                <li><i class="fas fa-check"></i>Bocadillos Gratis</li>
                <li><i class="fas fa-check"></i>Todas las conferencias</li>
                <li><i class="fas fa-check"></i>Todos los talleres</li>
              </ul>
              <div class="orden">
                <label for="pase_completo">Boletos desados:</label>
                <input type="number" min="0" placeholder="0" size="3" name="boletos[pase_completo][cantidad]" id="pase_completo">
                <input type="hidden" value="50" name="boletos[pase_completo][precio]">
              </div>
            </div>
          </li>
          <li>
            <div class="tabla-precios">
              <h3>Pase por dos dias</h3>
              <p class="numero">$45.00</p>
              <ul>
                <li><i class="fas fa-check"></i>Bocadillos Gratis</li>
                <li><i class="fas fa-check"></i>Todas las conferencias</li>
                <li><i class="fas fa-check"></i>Todos los talleres</li>
              </ul>
              <div class="orden">
                <label for="pase_dosDias">Boletos desados:</label>
                <input type="number" min="0" placeholder="0" size="3" name="boletos[pase_dosDias][cantidad]"  id="pase_dosDias">
                <input type="hidden" value="45" name="boletos[pase_dosDias][precio]">
              </div>
            </div>
          </li>
        </ul>
      </div><!--paquetes-->

      <div id="eventos" class="eventos clearfix">
        <h3>Elige tus talleres</h3>
        <div class="caja">
          <?php
            try{
              include_once('includes/funciones/bd_conexion.php');
              $sql="SELECT eventos.*,categoria_evento.cat_evento,invitados.nombre_invitado,invitados.apellido_invitado ";
              $sql.=" FROM eventos ";
              $sql.=" JOIN categoria_evento on id_categoria=id_cat_evento ";
              $sql.=" JOIN invitados on id_inv=invitado_id ";
              $sql.=" ORDER BY eventos.fecha_evento,categoria_evento.cat_evento ";

              $resultado=$conn->query($sql);

            }catch(Exception $e){
              echo $e->getMessage();
            }

              setlocale(LC_TIME, 'es_ES','es_ES.UTF-8');
              $dias_ES = array("lunes", "martes", "miercoles", "jueves", "viernes", "sabado", "domingo");
              $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");

              while($eventos = $resultado->fetch_assoc()){
                $fecha=$eventos['fecha_evento'];
                $dia_semana=strftime("%A",strtotime($fecha));
                $nombredia = str_replace($dias_EN, $dias_ES, $dia_semana);
                $categoria=$eventos['cat_evento'];

                $dia=array(
                  'nombre_evento'=>$eventos['nombre_evento'],
                  'hora'=>$eventos['hora_evento'],
                  'id'=>$eventos['evento_id'],
                  'nombre_invitado'=>$eventos['nombre_invitado']." ".$eventos['apellido_invitado']
                );
                $eventos_dias[$nombredia]['eventos'][$categoria][]=$dia;
              }
             /* echo "<pre>";
               var_dump ($eventos_dias);
              echo "</pre>";*/
            ?>
            <?php foreach($eventos_dias as $dia=>$eventos){?>
              <div id="<?php echo str_replace('á','a',$dia)?>" class="contenido-dia clearfix">
                  <h4><?php echo $dia?></h4>
                  <?php foreach($eventos['eventos'] as $tipo=>$evento_dia):?>
                      <div>
                          <p><?php echo $tipo?></p>
                          <?php foreach($evento_dia as $evento){ ?>
                             <label>
                                <input type="checkbox" name="registro[]" id="<?php echo $evento['id']?>" value="<?php echo $evento['id']?>">
                                <time><?php echo $evento['hora']?></time> <?php echo $evento['nombre_evento']?>
                                <br>
                                <span class="autor"><?php echo $evento['nombre_invitado']?></span>
                              </label>
                          <?php }?>
                      </div>
                  <?php endforeach;?>
              </div> <!--#viernes-->
            <?php }?>
          </div><!--.caja-->
    </div> <!--#eventos-->

    <div id="resumen" class="resumen">
        <h3>Pago y extras</h3>
        <div class="caja clearfix">
          <div class="extras">
            <div class="orden">
              <label for="camisa_evento">Camisa del evento $10<small>(Promocion 7% dto.)</small></label>
              <input type="number" size="3" id="camisa_evento" name="pedido_extra[camisas][cantidad]" min="0" placeholder="0">
              <input type="hidden" value="10" name="pedido_extra[camisas][precio]">
            </div>
            <div class="orden">
              <label for="etiquetas">Camisa del evento $10<small>(HTML, CSS, JAVASCRIPT, CHROME)</small></label>
              <input type="number" size="3" id="etiquetas" name="pedido_extra[etiquetas][cantidad]"  min="0" placeholder="0">
              <input type="hidden" name="pedido_extra[etiquetas][precio]" value="10">
            </div>
            <div class="orden">
              <label for="regalo">Elige un regalo</label>
              <select id="regalo" name="regalo">
                <option value="">Selecione una opcion</option>
                <option value="2">Etiquetas</option>
                <option value="1">Pulseras</option>
                <option value="3">Plumas</option>
              </select>
            </div><!--orden-->
            <input type="button" class="button" value="Calcular" id="calcular">
          </div><!--exrtras-->

          <div class="total">
            <p>Resumen: </p>
            <div id="lista-productos">

            </div>
            <p>Total: </p>
            <div id="suma-total">

            </div>
            <input type="hidden" name="total_pedido" id="total_pedido">
            <input type="submit" name="submit" class="button" value="Pagar" id="btnRegistro"/>

          </div><!--total-->
        </div><!--caja-->
    </div><!--resumen-->
    </form>
  </section>

  <?php include_once 'includes/templates/footer.php'?>
