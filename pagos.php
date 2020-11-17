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
      foreach($numero_boletos as $key => $value){
          if((int) $value['cantidad'] >0){
            ${"articulo$i"} = new Item();
            ${"articulo$i"}->setName('Pase: ' .$key)
                          ->setCurrency('MXN')
                          ->setQuantity((int)$value['cantidad'])
                          ->setPrice((int)$value['precio']);
            $i++;
          }
      }
    echo $articulo0->getName();
  }

/*




    $producto=htmlspecialchars($_POST['producto']);
    $precio=htmlspecialchars($_POST['precio']);

    $precio= (int) $precio;
    $envio=0;
    $total=$precio+$envio;



    //articulo a pagar


    //lista de articulos a pagar
    $listaArticulos = new ItemList();
    $listaArticulos->setItems(array($articulo));

    $detalles=new Details();
    $detalles->setShipping($envio)
            ->setSubtotal($precio);

    $cantidad = new Amount();
    $cantidad->setCurrency('MXN')
             ->setTotal($total)
             ->setDetails($detalles);

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
