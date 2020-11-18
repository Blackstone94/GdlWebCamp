<?php
    use PayPal\Api\Payer;
    use PayPal\Api\Item;
    use PayPal\Api\ItemList;
    use PayPal\Api\Details;
    use PayPal\Api\Amount;
    use PayPal\Api\Transaction;
    use PayPal\Api\RedirectUrls;
    use PayPal\Api\Payment;

    if(isset($_POST['submit'])){
        require 'configPaypal.php';

        //variables desde el formulario
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['e-mail'];
        $regalo=$_POST['regalo'];
        $total=$_POST['total_pedido'];
        $fecha = date('Y-m-d H:i:s');
        //Pedido
        $boletos =$_POST['boletos'];
        $numero_boletos=$boletos;

        $pedidoExtra= $_POST['pedido_extra'];
        $camisas = $_POST['pedido_extra']['camisas']['cantidad'];
        $precioCamisas=$_POST['pedido_extra']['camisas']['precio'];
        $etiquetas = $_POST['pedido_extra']['etiquetas']['cantidad'];
        $precioEtiquetas=$_POST['pedido_extra']['etiquetas']['precio'];

        include_once 'includes/funciones/funciones.php';
        $pedido = productos_json($boletos,$camisas,$etiquetas);
        $eventos = $_POST['registro'];
        $registro = eventos_json($eventos);



      //objeto informacion del pago
      $compra = new Payer();
      $compra->setPaymentMethod('paypal');
      $i=0;
      $arreglo_pedido=array();//arreglo que contiene los item
      //boletos
      foreach($numero_boletos as $key => $value){
          if((int) $value['cantidad'] >0){
            ${"articulo$i"} = new Item();
            $arreglo_pedido[]=${"articulo$i"};
            ${"articulo$i"}->setName('Pase: ' .$key)
                          ->setCurrency('MXN')
                          ->setQuantity((int)$value['cantidad'])
                          ->setPrice((float)$value['precio']);
            $i++;
          }
      }
      //camisas y etiquetas
      foreach($pedidoExtra as $key => $value){
        if((int) $value['cantidad'] >0){
          if($key==='camisas'){
            $precio=(float) $value['precio'] *.93;
          }else{
            $precio = (int) $value['precio'];
          }
          ${"articulo$i"} = new Item();
          $arreglo_pedido[]=${"articulo$i"};
          ${"articulo$i"}->setName('Extras: ' .$key)
                        ->setCurrency('USD')
                        ->setQuantity((int)$value['cantidad'])
                        ->setPrice((float)$value['precio']);
          $i++;
        }
    }
  }
    //lista de articulos a pagar
    $listaArticulos = new ItemList();
    $listaArticulos->setItems($arreglo_pedido);



    echo "<pre>";
    var_dump ($arreglo_pedido);
    echo $total;
    echo "</pre>";

    //TOTALES
  /*  $cantidad = new Amount();
    $cantidad->setCurrency('MXN')
             ->setTotal($total)
             ->setDetails($detalles);*/
/*



    $detalles=new Details();
    $detalles->setShipping($envio)
            ->setSubtotal($precio);



    $transaccion=new Transaction();
    $transaccion->setAmount($cantidad)
                ->setItemList($listaArticulos)
                ->setDescription('Pago')
                ->setInvoiceNumber(uniqid());

    $redireccionar = new RedirectUrls();
    $redireccionar->setReturnUrl(URL_SITIO."/pago_finalizado.php?exito=true");
    $redireccionar->setCancelUrl(URL_SITIO."/pago_finalizado.php?exito=false");

    $pago=new Payment();
    $pago->setIntent("sale")
        ->setPayer($compra)
        ->setRedirectUrls($redireccionar)
        ->setTransactions(array($transaccion));

    try{
           $pago->create($apiContext);
        }catch(PayPal\Exception\PayPalConnectionException $pce){
                echo "<pre>";
                print_r(json_decode($pce->getData()));
                exit;
                echo "</pre>";
        }
        $aprobado=$pago->getApprovalLink();
        header("Location: {$aprobado}");
*/
?>
