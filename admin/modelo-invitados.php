<?php
   //
  if(isset($_POST['registro'])){
    switch($_POST['registro']){
      case "nuevo":
       // die  (json_encode($_FILES));
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
    $nombre = $_POST['nombre_invitado'];
    $apellido= $_POST['apellido_invitado'];
    $biografia=$_POST['biografia_invitado'];

   $directorio="../img/invitados/";
    if(!is_dir($directorio)){
      mkdir($directorio,0755,true);//codigo de permisos y recursivo (a todos los archivos dentro del directorio se le agrega el mismo permiso)
    }
    try{
      if(move_uploaded_file($_FILES['archivo_imagen']['tmp_name'],$directorio.$_FILES['archivo_imagen']['name'])){
        $imagen_url=$_FILES['archivo_imagen']['name'];

        $imagen_resultado="Se subio correctamente";
        include_once('funciones/funciones.php');
        $stmt=$conn->prepare("INSERT INTO invitados(nombre_invitado,apellido_invitado,descripcion,url_imagen) values(?,?,?,?)");
        $stmt->bind_param("ssss",$nombre,$apellido,$biografia,$imagen_url);
        $stmt->execute();

        $id_registro=$stmt->insert_id;
        if($id_registro>0){//se inserto?
          $respuesta =array(
            'respuesta'=>'correcto',
            'id'=>$id_registro,
            'imagen_resultado'=>$imagen_resultado
          );
        }else{
            $respuesta=array(
              'respuesta'=>'error',
              'detalle'=>$stmt->error
            );
        }
        $stmt->close();
        $conn->close();
      }else{
        $respuesta=array(
          'respuesta'=>'error',
          'detalle'=>error_get_last()
        );
      }
    }catch(Exception $e){
      $respuesta=array(
        'respuesta'=>'error',
        'detalle'=>$e->getMessage()
      );
    }
    die(json_encode($respuesta));
  }

  function editar_registro(){
    $nombre = $_POST['nombre_invitado'];
    $apellido= $_POST['apellido_invitado'];
    $biografia=$_POST['biografia_invitado'];
    $imagen_anterior=$_POST['imagen_anterior'];
    $id_registro=$_POST['id_registro'];

    $directorio="../img/invitados/";
    if(!is_dir($directorio)){
      mkdir($directorio,0755,true);//codigo de permisos y recursivo (a todos los archivos dentro del directorio se le agrega el mismo permiso)
    }

    include_once('funciones/funciones.php');
    try{
      //sin imagen
      if($_FILES['archivo_imagen']['size'] == 0){//el usuario no subio imagen para reemplazar
        $stmt=$conn->prepare("UPDATE invitados SET nombre_invitado=?,apellido_invitado=?,descripcion=? where invitado_id=?");
        $stmt->bind_param("sssi",$nombre,$apellido,$biografia,$id_registro);
        $stmt->execute();
        //con imagen
      }else{
        if(move_uploaded_file($_FILES['archivo_imagen']['tmp_name'],$directorio.$_FILES['archivo_imagen']['name'])){
          unlink($directorio.$imagen_anterior);//borrar imagen anterior
          $imagen_url=$_FILES['archivo_imagen']['name'];
          $imagen_resultado="Se subio correctamente";

          $stmt=$conn->prepare("UPDATE invitados SET nombre_invitado=?,apellido_invitado=?,descripcion=?,url_imagen=? where invitado_id=?");
          $stmt->bind_param("ssssi",$nombre,$apellido,$biografia,$imagen_url,$id_registro);
          $stmt->execute();
        }else{
          $respuesta=array(
            'respuesta'=>'error',
            'detalle'=>error_get_last()
          );
        }
      }
      if($stmt->affected_rows){//se inserto?
        $respuesta =array(
          'respuesta'=>'correcto',
          'id_editado'=>$id_registro
        );
      }else{
        $respuesta=array(
          'respuesta'=>'error',
          'detalle'=>$stmt->error
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

  function eliminar_registro(){
    $id=$_POST['id'];
    try{
      include_once('funciones/funciones.php');
      $sql="SELECT url_imagen FROM invitados WHERE invitado_id=$id";
      $resultado = $conn->query($sql);
      $invitado=$resultado->fetch_assoc();
      $directorio="../img/invitados/";
      unlink($directorio.$invitado['url_imagen']);//borrar imagen anterior

      $stmt=$conn->prepare("DELETE FROM invitados WHERE invitado_id=?");
      $stmt->bind_param("i",$id);
      $stmt->execute();

      if($stmt->affected_rows){//se borro?
        $respuesta =array(
          'respuesta'=>'correcto',
          'id'=>$id,
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
