<section class="seccion contenedor">
      <h2>Nuestros invitados</h2>
    <?php
        try{
          require_once('includes/funciones/bd_conexion.php');
          $sql ="select * from invitados";
          $resultado= $conn->query($sql);
        }catch(Exception $e){
          echo $e->getMessage();
        }
    ?>
    <section class="invitados contenedor seccion">
    <ul class="lista-invitados clearfix">
      <?php
        while($invitados = $resultado -> fetch_assoc()){?>
          <li>
            <div class="invitado">
              <a class="invitado-info" href="#invitado<?php $invitados['invitado_id'];?>">
                <img src="img/<?php echo $invitados['url_imagen']?>" alt="Invitado">
                <p><?php echo $invitados['nombre_invitado'].' '.$invitados['apellido_invitado']?></p>
              </a>
            </div>
          </li>
          <div style="display:none;">
            <div class="invitado-info" id="invitado<?php $invitados['invitado_id'];?>">
              <h2><?php echo $invitados['nombre_invitado'].' '.$invitados['apeido_invitado']?></h2>
              <img src="img/<?php echo $invitados['url_imagen']?>" alt="Invitado">
              <p><?php echo $invitados['descripcion']?></p>
            </div>
          </div>
      <?php } ?><!-- recorrer -->
      </ul>
    </section><!-- div -->
    <?php $conn->close(); //cerrar base de datos?>
  </section><!--fin seccion-->
