<?php
  function productos_json(&$boletos, &$camisas=0, &$etiquetas=0){

    unset($boletos['un_dia']['precio']);
    unset($boletos['pase_completo']['precio']);
    unset($boletos['pase_dosDias']['precio']);

    $dias=array(0=>'un_dia',1=>'pase_completo',2=>'pase_dosDias');

    $total_boletos=array_combine($dias,$boletos);
   /* foreach($total_boletos as $key=>$boleto):
      if($boleto['cantidad']==0){
        unset($total_boletos[$key]);
      }
    endforeach;*/

    $camisas=(int) $camisas;
    if($camisas>0){
      $total_boletos['camisas']=$camisas;
    }
    $etiquetas = (int) $etiquetas;
    if($etiquetas>0){
      $total_boletos['etiquetas']=$etiquetas;
    }
    return json_encode($total_boletos);
  }

  function eventos_json(&$eventos){
    foreach($eventos as $evento):
      $eventos_json['eventos'][]=$evento;
    endforeach;
    return json_encode($eventos_json);
  }
?>
