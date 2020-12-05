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

  function nuevo_registro(){
    $cat_evento=$_POST['cat_evento'];
    $icono=$_POST['icono'];
    //die(json_encode($_POST));

    try{
      include_once('funciones/funciones.php');
      $stmt=$conn->prepare("INSERT INTO categoria_evento(cat_evento,icono) values(?,?)");
      $stmt->bind_param("ss",$cat_evento,$icono);
      $stmt->execute();

      $id_registro=$stmt->insert_id;
      if($id_registro>0){//se inserto?
        $respuesta =array(
          'respuesta'=>'correcto',
          'id'=>$id_registro
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
      $stmt=$conn->prepare("DELETE FROM categoria_evento WHERE id=?");
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
