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
          <a class="twitter-timeline" data-height="400" href="https://twitter.com/EdgarOr87795490?ref_src=twsrc%5Etfw">Tweets by EdgarOr87795490</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
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
  <script src="js/vendor/modernizr-3.8.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')</script>
  <script src="js/plugins.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.lettering.js"></script>
  <?php
    $archivo=basename($_SERVER['PHP_SELF']);
    $pagina= str_replace(".php","",$archivo);
    if($pagina=='conferencia'){
      echo '<script src="js/lightbox.js"></script>';
    }else if($pagina=='invitados' || $pagina=='index'){
      echo '<script src="js/jquery.colorbox-min.js"></script>';
    }
  ?>
  <script src="js/main.js"></script>
  <script src="js/cotizador.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set','transport','beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>

  <script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/d50ea5d4d9965016700a4130d/81dc70d529c79d65125e23dc9.js");</script>
</body>

</html><!--fin html-->
