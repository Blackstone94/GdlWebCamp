<?php  include_once 'includes/templates/header.php'?>

    <section class="seccion contenedor">
      <h2>La mejor conferencia de diseño web en español</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus minus laboriosam animi corporis amet adipisci, a aliquid harum
        aspernatur exercitationem, et placeat voluptatibus nisi velit quod odio impedit quis? Recusandae.
      </p>
    </section><!--fin seccion-->

    <section class="programa">
      <div class="contenedor-video">
          <video autoplay loop poster="img/bg-talleres.jpg">
            <source src="video/video.mp4" type="video/mp4">
            <source src="video/video.ogv" type="video/ogv">
            <source src="video/video.webm" type="video/webm">
          </video>
      </div><!--contendor video-->

      <div class="contenido-programa">
        <div class="contenedor">
          <div class="programa-evento">
            <h2>Programa del evento</h2>
            <nav class="menu-programa">
              <a href="#talleres"><i class="fas fa-code"></i>Talleres</a>
              <a href="#conferencias"><i class="fas fa-comment"></i>Conferencias</a>
              <a href="#seminarios"><i class="fas fa-university"></i>Seminarios</a>
            </nav>

            <div id="talleres" class="info-curso ocultar clearfix">
              <div class="detalle-evento">
                <h3>HTML5, CSS y JavaScript</h3>
                <p><i class="fas fa-clock"></i>16:00 hrs</p>
                <p><i class="fas fa-calendar"></i>10 de Mayo</p>
                <p><i class="fas fa-user"></i>Edgar Ortega</p>
              </div><!--detalle curso-->
              <div class="detalle-evento">
                <h3>Responsive web design</h3>
                <p><i class="fas fa-clock"></i>20:00 hrs</p>
                <p><i class="fas fa-calendar"></i>10 de Mayo</p>
                <p><i class="fas fa-user"></i>Edgar Ortega</p>
              </div><!--detalle curso-->
              <a href="#" class="button float-right">Ver todos</a>
            </div><!--Talleres-->

            <div id="conferencias" class="info-curso ocultar clearfix">
              <div class="detalle-evento">
                <h3>Como ser freelancer</h3>
                <p><i class="fas fa-clock"></i>10:00 hrs</p>
                <p><i class="fas fa-calendar"></i>10 de Mayo</p>
                <p><i class="fas fa-user"></i>Gregorio Sanchez</p>
              </div><!--detalle curso-->
              <div class="detalle-evento">
                <h3>Tecnologias del futuro</h3>
                <p><i class="fas fa-clock"></i>17:00 hrs</p>
                <p><i class="fas fa-calendar"></i>10 de Mayo</p>
                <p><i class="fas fa-user"></i>Susana Sanchez</p>
              </div><!--detalle curso-->
              <a href="#" class="button float-right">Ver todos</a>
            </div><!--Conferencias-->

            <div id="seminarios" class="info-curso ocultar clearfix">
              <div class="detalle-evento">
                <h3>Diseño UI/UX para moviles</h3>
                <p><i class="fas fa-clock"></i>17:00 hrs</p>
                <p><i class="fas fa-calendar"></i>11 de Mayo</p>
                <p><i class="fas fa-user"></i>Harold Garcia</p>
              </div><!--detalle curso-->
              <div class="detalle-evento">
                <h3>Responsive web design</h3>
                <p><i class="fas fa-clock"></i>10:00 hrs</p>
                <p><i class="fas fa-calendar"></i>11 de Mayo</p>
                <p><i class="fas fa-user"></i>Edgar Ortega</p>
              </div><!--detalle curso-->
              <a href="#" class="button float-right">Ver todos</a>
            </div><!--seminarios-->

          </div><!--Programa evento-->
        </div><!--Contenedor-->
      </div><!--Contenido programa-->
    </section><!--Programa-->
    <!--*************************************************************************************/-->
    <section class="invitados contenedor seccion">
      <h2>Nuestros invitados</h2>
      <ul class="lista-invitados clearfix">
        <li>
          <div class="invitado">
            <img src="img/invitado1.jpg" alt="Invitado">
            <p>Rafael Bautista</p>
          </div>
        </li>
        <li>
          <div class="invitado">
            <img src="img/invitado2.jpg" alt="Invitado">
            <p>Shari Herrera</p>
          </div>
        </li>
        <li>
          <div class="invitado">
            <img src="img/invitado3.jpg" alt="Invitado">
            <p>George Sanchez</p>
          </div>
        </li>
        <li>
          <div class="invitado">
            <img src="img/invitado4.jpg" alt="Invitado">
            <p>Susana Rivera</p>
          </div>
        </li>
        <li>
          <div class="invitado">
            <img src="img/invitado5.jpg" alt="Invitado">
            <p>Harlod Garcia</p>
          </div>
        </li>
        <li>
          <div class="invitado">
            <img src="img/invitado6.jpg" alt="Invitado">
            <p>Susan Sanchez</p>
          </div>
        </li>
      </ul>
    </section><!--invitados-->

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

    <div class="mapa"></div>
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

