<?php
  include_once('funciones/funciones.php');
  if(isset($_POST['agregar-admin'])){
    $usuario=$_POST['usuario'];
    $nombre=$_POST['nombre'];
    $password=$_POST['password'];

    //por default costo en 10
    $opciones=array(
      'cost'=>12//mas interaciones
    );
    //encriptar password
    $password_hashed=password_hash($password,PASSWORD_BCRYPT,$opciones);

  }
?>
