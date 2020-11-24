<?php
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
    try{
      include_once('funciones/funciones.php');
      $stmt=$conn->prepare("INSERT INTO admins(usuario,nombre,password) values(?,?,?)");
      $stmt->bind_param("sss",$usuario,$nombre,$password_hashed);
      $stmt->execute();
      $id_registro=$stmt->insert_id;
      if($id_registro>0){//se inserto?
        $respuesta =array(
          'respuesta'=>'correcto',
          'id_admin'=>$id_registro
        );
      }else{
          $respuesta=array(
            'respuesta'=>'error'
          );
      }
      $stmt->close();
      $conn->close();
    }catch(Exception $e){
      echo "Error ".$e.getMessage();
    }
    die(json_encode($respuesta));
  }

  if(isset($_POST['login-admin'])){
    $usuario=$_POST['usuario'];
    $password=$_POST['password'];

    try{
      include_once('funciones/funciones.php');
      $stmt=$conn->prepare("SELECT * FROM admins WHERE usuario=?");
      $stmt->bind_param("s",$usuario);
      $stmt->execute();
      $stmt->bind_result($id_admin,$usuario_admin,$nombre_admin,$password_admin);
      if($stmt->affected_rows){//se inserto?
        $existe=$stmt->fetch();
        if($existe){
          if(password_verify($password,$password_admin)){//unica forma de comparar password
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
      echo "Error ".$e.getMessage();
    }
    die(json_encode($respuesta));
  }
?>
