<?php  include_once 'includes/templates/header.php'?>

    <section class="seccion contenedor">
      <h2>La mejor conferencia de diseño web en español</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus minus laboriosam animi corporis amet adipisci, a aliquid harum
        aspernatur exercitationem, et placeat voluptatibus nisi velit quod odio impedit quis? Recusandae.
      </p>
    </section><!--fin seccion-->

    <section class="programa">
      <div class="contenedor-video">
          <video autoplay loop muted poster="img/bg-talleres.jpg">
            <source src="img/video.mp4" type="video/mp4">
            <source src="img/video.ogv" type="video/ogv">
            <source src="img/video.webm" type="video/webm">
          </video>
      </div><!--contendor video-->

      <div class="contenido-programa">
        <div class="contenedor">
          <div class="programa-evento">
            <h2>Programa del evento</h2>
            <?php
              try{
                 require_once('includes/funciones/bd_conexion.php');
                 $sql="select * from categoria_evento";
                 $resultado= $conn->query($sql);

              }catch(Exception $e){
                $error=$error->getMessage();
              }
            ?>
            <nav class="menu-programa">
              <?php while($cat=$resultado->fetch_array(MYSQLI_ASSOC)){?>
              <?php $categoria=$cat['cat_evento']?>
              <a href="#<?php echo strtolower($categoria)?>"><i class="fas <?php echo $cat['icono']?>"></i>
                   <?php echo $categoria?></a>
              <?php } ?>
            </nav>

            <?php
              try{
                require_once('includes/funciones/bd_conexion.php');
                $sql ="select evento_id,nombre_evento,fecha_evento,hora_evento,cat_evento,icono,nombre_invitado,apellido_invitado ";
                $sql .="from eventos ";
                $sql .="inner join categoria_evento ";
                $sql .="on eventos.id_cat_evento=categoria_evento.id_categoria ";
                $sql .="inner join invitados ";
                $sql .="on eventos.id_inv=invitados.invitado_id ";
                $sql .="and eventos.id_cat_evento=1 ";
                $sql .="order by evento_id limit 2;";

                $sql .="select evento_id,nombre_evento,fecha_evento,hora_evento,cat_evento,icono,nombre_invitado,apellido_invitado ";
                $sql .="from eventos ";
                $sql .="inner join categoria_evento ";
                $sql .="on eventos.id_cat_evento=categoria_evento.id_categoria ";
                $sql .="inner join invitados ";
                $sql .="on eventos.id_inv=invitados.invitado_id ";
                $sql .="and eventos.id_cat_evento=2 ";
                $sql .="order by evento_id limit 2;";

                $sql .="select evento_id,nombre_evento,fecha_evento,hora_evento,cat_evento,icono,nombre_invitado,apellido_invitado ";
                $sql .="from eventos ";
                $sql .="inner join categoria_evento ";
                $sql .="on eventos.id_cat_evento=categoria_evento.id_categoria ";
                $sql .="inner join invitados ";
                $sql .="on eventos.id_inv=invitados.invitado_id ";
                $sql .="and eventos.id_cat_evento=3 ";
                $sql .="order by evento_id limit 2";//consultas multiples
              }catch(Exception $e){
                echo $e->getMessage();
              }
            ?>

            <?php $conn->multi_query($sql)?>
            <?php do {
              $resultado=$conn->store_result();//ejecutar consultas multiples
              $row =$resultado->fetch_all(MYSQLI_ASSOC);//asociar con sql llaves
              $i=0;//contador para separa las categorias
              foreach($row as $evento)://recorerr las consultas
                if($i % 2==0){ //si es inicio del evento?>
                  <div id=<?php echo strtolower($evento['cat_evento'])?> class="info-curso ocultar clearfix">
                <?php } ?>

                <div class="detalle-evento">
                  <h3><?php echo htmlentities($evento['nombre_evento']);?></h3>
                  <p><i class="fas fa-clock"></i><?php echo $evento['hora_evento'];?></p>
                  <p><i class="fas fa-calendar"></i><?php echo $evento['fecha_evento'];?></p>
                  <p><i class="fas fa-user"></i><?php echo $evento['nombre_invitado'].' '.$evento['apellido_invitado'];?></p>
                </div><!--detalle curso-->

                <?php if($i % 2==1): ?>
                  <a href="calendario.php" class="button float-right">Ver todos</a>
                  </div><!--Conferencias-->
                <?php endif; ?>
                <?php $i++; ?>
              <?php endforeach; ?>
              <?php $resultado->free(); ?>
            <?php  } while ($conn->more_results() && $conn->next_result());?>

          </div><!--Programa evento-->
        </div><!--Contenedor-->
      </div><!--Contenido programa-->
    </section><!--Programa-->
    <!--*************************************************************************************/-->
    <?php include_once 'includes/templates/invitados.php'?>

    <div class="contador parallax">
      <div class="contenedor">
        <ul class="resumen-evento">
          <li><p class="numero"></p>Invitados</li>
          <li><p class="numero"></p>Talleres</li>
          <li><p class="numero"></p>Dias</li>
          <li><p class="numero"></p>Conferencias</li>
        </ul>
      </div>
    </div><!--parallax-->


    <section class="seccion precios">
      <h2>Precios</h2>
      <div class="contenedor">
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
              <a href="#" class="button hollow">Comprar</a>
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
              <a href="#" class="button">Comprar</a>
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
              <a href="#" class="button hollow">Comprar</a>
            </div>
          </li>
        </ul>
      </div><!--contenedor-->
    </section><!--Precios-->

    <div id="mapa" class="mapa"></div>

    <section class="seccion">
      <h2>Testimoniales</h2>
      <div class="testimoniales contenedor clearfix">
        <div class="testimonial">
          <blockquote class="clearfix">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus dignissimos, eum quae similique itaque porro
              architecto corrupti possimus voluptatem cumque earum.</p>
            <footer class="info-testimonial">
              <img src="img/testimonial.jpg" alt="Testimonial">
              <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
            </footer>
          </blockquote>
        </div><!--Testimonial-->
        <div class="testimonial">
          <blockquote class="clearfix">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus dignissimos, eum quae similique itaque porro
              architecto corrupti possimus voluptatem cumque earum.</p>
            <footer class="info-testimonial">
              <img src="img/testimonial.jpg" alt="Testimonial">
              <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
            </footer>
          </blockquote>
        </div><!--Testimonial-->
        <div class="testimonial">
          <blockquote class="clearfix">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus dignissimos, eum quae similique itaque porro
              architecto corrupti possimus voluptatem cumque earum.</p>
            <footer class="info-testimonial">
              <img src="img/testimonial.jpg" alt="Testimonial">
              <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
            </footer>
          </blockquote>
        </div><!--Testimonial-->
      </div><!--Testimoniales-->
    </section>
    <div class="newsletter parallax">
      <div class="contenido contenedor">
        <p>Registrate al newsletter</p>
        <h3>GdlWebCamp</h3>
        <a href="#" class="button transparente">Registro</a>
      </div>
    </div><!--Newsletter-->
    <section class="seccion">
      <h2>faltan</h2>
      <div class="cuenta-regresiva contenedor">
        <ul class="clearfix">
          <li><p id="dias" class="numero"></p>dias</li>
          <li><p id="horas" class="numero"></p>Horas</li>
          <li><p id="minutos" class="numero"></p>Minutos</li>
          <li><p id="segundos" class="numero"></p>Segundos</li>
        </ul>
      </div><!--cuenta regresiva-->
    </section><!--Seccion cuenta regresiva-->

<?php include_once 'includes/templates/footer.php'?>
