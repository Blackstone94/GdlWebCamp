<?php

  if(isset($_POST['registro'])){
    switch($_POST['registro']){
      case "nuevo":
        nuevo_registro();
      break;
      case "editar":
        editar_registro();
      break;
      case "eliminar":
        eliminar_registro();
      break;
    }
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

  function nuevo_registro(){
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
      $respuesta=array(
        'respuesta'=>'error',
        'detalle'=>$e->getMessage()
      );
    }
    die(json_encode($respuesta));
  }
  function editar_registro(){
    $usuario=$_POST['usuario'];
    $nombre=$_POST['nombre'];
    $password=$_POST['password'];
    $id=$_POST['id_registro'];

    try{
      include_once('funciones/funciones.php');
      if(!empty($password)){
            //por default costo en 10
            $opciones=array(
              'cost'=>12//mas interaciones
            );
            //encriptar password
            $password_hashed=password_hash($password,PASSWORD_BCRYPT,$opciones);
            $stmt=$conn->prepare("UPDATE admins  set usuario=?,nombre=?,password=?,editado=NOW() where id=?");
            $stmt->bind_param("sssi",$usuario,$nombre,$password_hashed,$id);
      }else{
        $stmt=$conn->prepare("UPDATE admins  set usuario=?,nombre=?,editado=NOW() where id=?");
        $stmt->bind_param("ssi",$usuario,$nombre,$id);
      }

      $stmt->execute();
      $id_registro=$stmt->insert_id;
      if($stmt->affected_rows){//se inserto?
        $respuesta =array(
          'respuesta'=>'correcto',
          'id_editado'=>$id_registro
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

  function eliminar_registro(){
    $id=$_POST['id'];

    try{
      include_once('funciones/funciones.php');
      $stmt=$conn->prepare("DELETE FROM admins WHERE id=?");
      $stmt->bind_param("i",$id);
      $stmt->execute();

      if($stmt->affected_rows){//se borro?
        $respuesta =array(
          'respuesta'=>'correcto',
          'id_admin'=>$id,
          'mensaje'=>'Registro eliminado correctamente'
        );
      }else{
          $respuesta=array(
            'respuesta'=>'error'
          );
      }
      $stmt->close();
      $conn->close();
    }catch(Exception $e){
      $respuesta=array(
        'respuesta'=>'error',
        'detalle'=>$e->getMessage()
      );
    }
    die(json_encode($respuesta));
  }
?>
