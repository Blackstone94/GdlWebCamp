<?php
  if(isset($_POST['login'])){
    $usuario=$_POST['usuario'];
    $password=$_POST['password'];

    try{
      include_once 'funciones/funciones.php';
      $stmt=$conn->prepare("SELECT * FROM admins WHERE usuario=?;");
      $stmt->bind_param("s",$usuario);
      $stmt->execute();
      $stmt->bind_result($id_admin,$usuario_admin,$nombre_admin,$password_admin,$editado);
      if($stmt->affected_rows){//se encontro?
        $existe=$stmt->fetch();
        if($existe){
          if(password_verify($password,$password_admin)){//unica forma de comparar password
            session_start();
            $_SESSION['usuario']=$usuario_admin;
            $_SESSION['nombre']=$nombre_admin;
            $respuesta =array(
              'respuesta'=>'correcto',
              'nombre'=>$nombre_admin
            );
          }else{
            $respuesta =array(
              'respuesta'=>'Error',
              'error'=>'Password incorrecto'
            );
          }
        }else{
          $respuesta=array(
            'respueta'=>'Error',
            'error'=>'fetch false'
          );
        }
      }else{
          $respuesta=array(
            'respueta'=>'Error',
            'error'=>'El usuario no existe'
          );
      }
      $stmt->close();
      $conn->close();
    }catch(Exception $e){
      $respuesta=array(
        'respueta'=>'Error',
        'error'=>$e->getMessage()
      );
    }

    die(json_encode($respuesta));
  }
?>
