<?php
  session_start();
  if(isset($_GET['cerrar_sesion'])){
    $cerrar_sesion=$_GET['cerrar_sesion'];
    if($cerrar_sesion){
      session_destroy();
    }
  }
  include_once('funciones/funciones.php');
  include_once('templates/header.php');?>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../index.php"><b>Gdl</b>WebCamp</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Inicia sesion aquí</p>

      <form  method="post" id="login-admin" name="login-admin" action="login-admin.php">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="usuario" placeholder="Usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="col-xs-12">
          <input type="hidden" name="login-admin"  value="1">
          <button type="submit" class="btn btn-primary btn-block">Iniciar session</button>
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<?php include_once('templates/footer.php')?>
