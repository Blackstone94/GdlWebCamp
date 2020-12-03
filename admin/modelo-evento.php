<?php
  //  die(json_encode($_POST));
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

  function nuevo_registro(){
    $nombre=$_POST['titulo'];
    $fecha=$_POST['fecha'];
    $fechaFormateada=date('Y-m-d',strtotime($fecha));

    $categoria_evento=$_POST['categoria_evento'];
    $hora_evento=$_POST['hora_evento'];
    $invitado=$_POST['invitado'];
    try{
      include_once('funciones/funciones.php');
      $stmt=$conn->prepare("INSERT INTO eventos(nombre_evento,fecha_evento,hora_evento,id_cat_evento,id_inv) values(?,?,?,?,?)");
      $stmt->bind_param("sssii",$nombre,$fechaFormateada,$hora_evento,$categoria_evento,$invitado);
      $stmt->execute();

      $id_registro=$stmt->insert_id;
      if($id_registro>0){//se inserto?
        $respuesta =array(
          'respuesta'=>'correcto',
          'id_evento'=>$id_registro
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
