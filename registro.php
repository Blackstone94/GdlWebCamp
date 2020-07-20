<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">

    <meta name="theme-color" content="#fafafa">
  </head>

  <body>
    <header class="site-header">
      <div class="hero">
        <div class="contenido-header">
          <nav class="redes-sociales">
              <a href="#"><i class="fab fa-facebook-f"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-pinterest-p"></i></a>
              <a href="#"><i class="fab fa-youtube"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
          </nav>
          <div class="informacion-evento">
            <div class="clearfix">
              <p class="fecha"><i class="far fa-calendar-alt"></i> 10-12 Mayo 2020</p>
              <p class="ciudad"><i class="fas fa-map-marker-alt"></i> Guadalajara,MX</p>
              <h1 class="nombre-sitio">GdlWebCamp</h1>
              <p class="slogan">La mejor conferencia de <span>diseño web</span> </p>
            </div>
          </div><!--Informacion evento-->
        </div>
      </div><!--hero-->
  </header><!--fin header-->
  <div class="barra">
    <div class="contenedor clearfix">
      <div class="logo">
        <img src="img/logo.svg" alt="Logo">
      </div>
      <div class="menu-movil">
        <span></span>
        <span></span>
        <span></span>
      </div>
      <nav class="navegacion-principal clearfix">
        <a href="#">Conferencia</a>
        <a href="#">Calendario</a>
        <a href="#">Invitados</a>
        <a href="registro.html">Reservaciones</a>
      </nav>
    </div><!--contenedor-->
  </div><!--Barra-->

  <section class="seccion contenedor">

    <h2>Registro de usuarios</h2>
    <form id="registro" class="registro" action="index.html" method="POST">
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
                <input type="number" min="0" placeholder="0" size="3" id="pase_dia">
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
                <input type="number" min="0" placeholder="0" size="3" id="pase_completo">
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
                <input type="number" min="0" placeholder="0" size="3" id="pase_dosDias">
              </div>
            </div>
          </li>
        </ul>
      </div><!--paquetes-->

      <div id="eventos" class="eventos clearfix">
        <h3>Elige tus talleres</h3>
        <div class="caja">
              <div id="viernes" class="contenido-dia clearfix">
                  <h4>Viernes</h4>
                      <div>
                          <p>Talleres:</p>
                          <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time>10:00</time> Responsive Web Design</label>
                          <label><input type="checkbox" name="registro[]" id="taller_02" value="taller_02"><time>12:00</time> Flexbox</label>
                          <label><input type="checkbox" name="registro[]" id="taller_03" value="taller_03"><time>14:00</time> HTML5 y CSS3</label>
                          <label><input type="checkbox" name="registro[]" id="taller_04" value="taller_04"><time>17:00</time> Drupal</label>
                          <label><input type="checkbox" name="registro[]" id="taller_05" value="taller_05"><time>19:00</time> WordPress</label>
                      </div>
                      <div>
                          <p>Conferencias:</p>
                          <label><input type="checkbox" name="registro[]" id="conf_01" value="conf_01"><time>10:00</time> Como ser Freelancer</label>
                          <label><input type="checkbox" name="registro[]" id="conf_02" value="conf_02"><time>17:00</time> Tecnologías del Futuro</label>
                          <label><input type="checkbox" name="registro[]" id="conf_03" value="conf_03"><time>19:00</time> Seguridad en la Web</label>
                      </div>
                      <div>
                          <p>Seminarios:</p>
                          <label><input type="checkbox" name="registro[]" id="sem_01" value="sem_01"><time>10:00</time> Diseño UI y UX para móviles</label>
                      </div>
              </div> <!--#viernes-->
              <div id="sabado" class="contenido-dia clearfix">
                  <h4>Sábado</h4>
                  <div>
                        <p>Talleres:</p>
                        <label><input type="checkbox" name="registro[]" id="taller_06" value="taller_06"><time>10:00</time> AngularJS</label>
                        <label><input type="checkbox" name="registro[]" id="taller_07" value="taller_07"><time>12:00</time> PHP y MySQL</label>
                        <label><input type="checkbox" name="registro[]" id="taller_08" value="taller_08"><time>14:00</time> JavaScript Avanzado</label>
                        <label><input type="checkbox" name="registro[]" id="taller_09" value="taller_09"><time>17:00</time> SEO en Google</label>
                        <label><input type="checkbox" name="registro[]" id="taller_10" value="taller_10"><time>19:00</time> De Photoshop a HTML5 y CSS3</label>
                        <label><input type="checkbox" name="registro[]" id="taller_11" value="taller_11"><time>21:00</time> PHP Medio y Avanzado</label>
                  </div>
                  <div>
                        <p>Conferencias:</p>
                        <label><input type="checkbox" name="registro[]" id="conf_04" value="conf_04"><time>10:00</time> Como crear una tienda online que venda millones en pocos días</label>
                        <label><input type="checkbox" name="registro[]" id="conf_05" value="conf_05"><time>17:00</time> Los mejores lugares para encontrar trabajo</label>
                        <label><input type="checkbox" name="registro[]" id="conf_06" value="conf_06"><time>19:00</time> Pasos para crear un negocio rentable</label>
                  </div>
                  <div>
                        <p>Seminarios:</p>
                        <label><input type="checkbox" name="registro[]" id="sem_02" value="sem_02"><time>10:00</time> Aprende a Programar en una mañana</label>
                        <label><input type="checkbox" name="registro[]" id="sem_03" value="sem_03"><time>17:00</time> Diseño UI y UX para móviles</label>
                  </div>
              </div> <!--#sabado-->
              <div id="domingo" class="contenido-dia clearfix">
                  <h4>Domingo</h4>
                  <div>
                        <p>Talleres:</p>
                        <label><input type="checkbox" name="registro[]" id="taller_12" value="taller_12"><time>10:00</time> Laravel</label>
                        <label><input type="checkbox" name="registro[]" id="taller_13" value="taller_13"><time>12:00</time> Crea tu propia API</label>
                        <label><input type="checkbox" name="registro[]" id="taller_14" value="taller_14"><time>14:00</time> JavaScript y jQuery</label>
                        <label><input type="checkbox" name="registro[]" id="taller_15" value="taller_15"><time>17:00</time> Creando Plantillas para WordPress</label>
                        <label><input type="checkbox" name="registro[]" id="taller_16" value="taller_16"><time>19:00</time> Tiendas Virtuales en Magento</label>
                  </div>
                  <div>
                        <p>Conferencias:</p>
                        <label><input type="checkbox" name="registro[]" id="conf_07" value="conf_07"><time>10:00</time> Como hacer Marketing en línea</label>
                        <label><input type="checkbox" name="registro[]" id="conf_08" value="conf_08"><time>17:00</time> ¿Con que lenguaje debo empezar?</label>
                        <label><input type="checkbox" name="registro[]" id="conf_09" value="conf_09"><time>19:00</time> Frameworks y librerias Open Source</label>
                  </div>
                  <div>
                        <p>Seminarios:</p>
                        <label><input type="checkbox" name="registro[]" id="sem_04" value="sem_04"><time>14:00</time> Creando una App en Android en una tarde</label>
                        <label><input type="checkbox" name="registro[]" id="sem_05" value="sem_05"><time>17:00</time> Creando una App en iOS en una tarde</label>
                  </div>
              </div> <!--#domingo-->
          </div><!--.caja-->
    </div> <!--#eventos-->

    <div id="resumen" class="resumen">
        <h3>Pago y extras</h3>
        <div class="caja clearfix">
          <div class="extras">
            <div class="orden">
              <label for="camisa_evento">Camisa del evento $10<small>(Promocion 7% dto.)</small></label>
              <input type="number" size="3" id="camisa_evento" min="0" placeholder="0">
            </div>
            <div class="orden">
              <label for="etiquetas">Camisa del evento $10<small>(HTML, CSS, JAVASCRIPT, CHROME)</small></label>
              <input type="number" size="3" id="etiquetas" min="0" placeholder="0">
            </div>
            <div class="orden">
              <label for="regalo">Elige un regalo</label>
              <select id="regalo">
                <option value="">Selecione una opcion</option>
                <option value="ETI">Etiquetas</option>
                <option value="PUL">Pulseras</option>
                <option value="PLU">Plumas</option>
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
            <input type="submit" class="button" value="Pagar" id="btnRegistro"/>

          </div><!--total-->
        </div><!--caja-->
    </div><!--resumen-->

    
    </form>
  </section>


  <footer class="site-foter">
    <div class="contenedor clearfix">
      <div class="footer-informacion">
          <h3>Sobre <span>GdlWebCamp</span></h3>
          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maxime expedita eveniet at obcaecati dignissimos
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur ducimus magni ex consectetur quasi,
            cumque commodi eum rerum nostrum debitis suscipit alias aut, temporibus vel a harum tenetur ipsum quidem.</p>
      </div>
      <div class="ultimos-tweets">
        <h3>Ultimos <span>Tweets</span></h3>
        <ul>
          <li>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet eligendi, adipisci ab eos accusantium at</li>
          <li>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet eligendi, adipisci ab eos accusantium at</li>
          <li>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet eligendi, adipisci ab eos accusantium at,</li>
        </ul>
      </div>
      <div class="menu">
        <h3>Redes <span>Sociales</span></h3>
        <nav class="redes-sociales">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-pinterest-p"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
      </nav><!--fin navegacion footer-->
      </div>
    </div>
    <p class="copyright">Todos los derechos reservados GdlWebCamp 2020 &copy;</p>
  </footer>
  </body>

  <script src="js/vendor/modernizr-3.8.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')</script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set','transport','beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
</body>
</html>
