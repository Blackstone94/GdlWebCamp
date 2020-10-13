<?php include_once 'includes/templates/header.php'?>
    <section class="seccion contenedor">
      <h2>Calendario de Eventos</h2>
    </section><!--fin seccion-->

    <?php
        try{
          require_once('includes/funciones/bd_conexion.php');
          $sql ="select evento_id,nombre_evento,fecha_evento,hora_evento,cat_evento,nombre_invitado,apellido_invitado ";
          $sql .="from eventos ";
          $sql .="inner join categoria_evento ";
          $sql .="on eventos.id_cat_evento=categoria_evento.id_categoria ";
          $sql .="inner join invitados ";
          $sql .="on eventos.id_inv=invitados.invitado_id ";
          $sql .="order by evento_id";
          $resultado= $conn->query($sql);
        }catch(Exception $e){
          echo $e->getMessage();
        }
    ?>

    <div class="calendario">
        <?php
        $calendario = array();//creacion de un array
          while($eventos = $resultado->fetch_assoc()){
            $fecha=$eventos['fecha_evento'];
            $evento = array(
              'titulo' =>$eventos['nombre_evento'],
              'fecha'=>$eventos['fecha_evento'],
              'hora'=>$eventos['hora_evento'],
              'categoria'=>$eventos['cat_evento'],
              'invitado'=>$eventos['nombre_invitado'].$eventos['apellido_invitado']
            );
            $calendario[$fecha][]=$evento;
            ?>
          <?php }?>

          <?php
            foreach($calendario as $dia=>$lista_eventos){?>
          <h3>
              <i class= "fa fa-calendar"></i>
              <?php
              //Unix
              setlocale (LC_TIME,'es_ES.UTF-8');
              //Windows
                setlocale(LC_TIME,'spanish');
                echo utf8_encode( strftime("%A, %d de %B del %Y",strtotime($dia)));
              ?>
          </h3>
          <?php foreach($lista_eventos as $evento){?>
            <div class="dia">
              <p class="titulo"><?php echo $evento['titulo']?></p>
              <p class="hora">
                  <i class="fa fa-clock-o" aria-hidden="true"></i>
                  <?php echo $evento['fecha']." ". $evento['']?>
              </p>
            </div>
            <?php }?>
            <pre>
              <?php var_dump($calendario);?>
            </pre>
    </div>
    <?php
      $conn->close();
    ?>
<?php include_once 'includes/templates/footer.php'?>

