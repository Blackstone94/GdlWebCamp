<?php
   //
  $nombre = $_POST['nombre_invitado'];
  $apellido= $_POST['apellido_invitado'];
  $biografia=$_POST['biografia_invitado'];

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
    $cat_evento=$_POST['cat_evento'];
    $icono=$_POST['icono'];
    $id=$_POST['id_registro'];

    try{
      include_once('funciones/funciones.php');

      $stmt=$conn->prepare("UPDATE categoria_evento  set cat_evento=?,icono=?,editado=NOW() where id_categoria=?");
      $stmt->bind_param("ssi",$cat_evento,$icono,$id);

      $stmt->execute();
      if($stmt->affected_rows){//se inserto?
        $respuesta =array(
          'respuesta'=>'correcto',
          'id_editado'=>$id
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
      echo "Error ".$e.getMessage();
    }
    die(json_encode($respuesta));
  }

  function eliminar_registro(){
    $id=$_POST['id'];

    try{
      include_once('funciones/funciones.php');
      $stmt=$conn->prepare("DELETE FROM categoria_evento WHERE id_categoria=?");
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
