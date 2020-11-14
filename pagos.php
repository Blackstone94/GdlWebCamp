<?php

    if(!isset($_POST['producto'], $_POST['precio'])){
        exit('Ocurrio un error hola ');
    }

    use PayPal\Api\Payer;  
    use PayPal\Api\Item; 
    use PayPal\Api\ItemList; 
    use PayPal\Api\Details;
    use PayPal\Api\Amount;
    use PayPal\Api\Transaction;
    use PayPal\Api\RedirectUrls;
    use PayPal\Api\Payment;


    require 'configuracion.php';

    $producto=htmlspecialchars($_POST['producto']);
    $precio=htmlspecialchars($_POST['precio']);

    $precio= (int) $precio;
    $envio=0;
    $total=$precio+$envio;

    //objeto informacion del pago
    $compra = new Payer();   
    $compra->setPaymentMethod('paypal');

    //articulo a pagar
    $articulo = new Item();
    $articulo->setName($producto)
            ->setCurrency('MXN')
            ->setQuantity(1)
            ->setPrice($precio);

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
