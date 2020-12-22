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
    include_once('funciones/funciones.php');
    //  die(json_encode($_POST));
    $boletos_adquiridos=$_POST['boletos'];

    $camisas = $_POST['pedido_extra']['camisas']['cantidad'];
    $etiquetas = $_POST['pedido_extra']['etiquetas']['cantidad'];

    $pedido=productos_json($boletos_adquiridos,$camisas,$etiquetas);
    $talleres=eventos_json($_POST['registro_evento']);

    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $email=$_POST['email'];
    $regalo=$_POST['regalo'];
    $total=$_POST['total_pedido'];

    try{
    //  include_once 'funciones/funciones.php';
      $stmt=$conn->prepare(" INSERT INTO registrados (nombre_registrado,apellido_registrado,email_registrado,pases_articulos,talleres_registrados,regalo,total_pagado,fecha_registro)  VALUES ( ? , ? , ? ,? , ? , ? , ? ,NOW()) ");
      $stmt->bind_param("sssssis",$nombre,$apellido,$email,$pedido,$talleres,$regalo,$total);
      $stmt->execute();

      $id_registro = $stmt->insert_id;
      if($id_registro > 0){//se inserto?
        $respuesta =array(
          'respuesta'=>'correcto',
          'id_insertado'=>$id_registro
        );
      }else{
          $respuesta=array(
            'respuesta'=>'error',
            'detalle'=>$stmt->error,
            'pedido'=>$pedido
          );
      }
      $stmt->close();
      $conn->close();
    }catch(Exception $e){
      $respuesta=array(
        'respuesta'=>'error',
        'detalle'=>$e.getMessage()
      );
    }

    die(json_encode($respuesta));

  }
  function editar_registro(){
    include_once('funciones/funciones.php');
    //  die(json_encode($_POST));
    $boletos_adquiridos=$_POST['boletos'];

    $camisas = $_POST['pedido_extra']['camisas']['cantidad'];
    $etiquetas = $_POST['pedido_extra']['etiquetas']['cantidad'];

    $pedido=productos_json($boletos_adquiridos,$camisas,$etiquetas);
    $talleres=eventos_json($_POST['registro_evento']);

    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $email=$_POST['email'];
    $regalo=$_POST['regalo'];
    $total=$_POST['total_pedido'];
    $id=$_POST['id_registro'];

    try{
     // include_once 'funciones/funciones.php';
      $stmt=$conn->prepare("UPDATE  registrados SET nombre_registrado=?,apellido_registrado=?,email_registrado=?,pases_articulos=?,talleres_registrados=?,regalo=?,total_pagado=?,fecha_registro=NOW() WHERE id_registrado=?");
      $stmt->bind_param("sssssisi",$nombre,$apellido,$email,$pedido,$talleres,$regalo,$total,$id);
      $stmt->execute();

    if ($stmt->affected_rows) { //se modifico?
        $respuesta =array(
          'respuesta'=>'correcto',
          'id_insertado'=>$id_registro
        );
      }else{
          $respuesta=array(
            'respuesta'=>'error',
            'detalle'=>$stmt->error,
            'pedido'=>$pedido
          );
      }
      $stmt->close();
      $conn->close();
    }catch(Exception $e){
      $respuesta=array(
        'respuesta'=>'error',
        'detalle'=>$e.getMessage()
      );
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
