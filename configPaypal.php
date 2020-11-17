<?php
    require ('includes/paypal/autoload.php');
    define('URL_SITIO','http://localhost/gdlwebcamp');
    $apiContext = new \PayPal\Rest\ApiContext(
        new \PayPal\Auth\OAuthTokenCredential(
            'AXL4skXmUbGhkpo07EcdcvJY4iLlSiOTO1q40pxJbgSkJCAiah1iHSKZmfYWEW9ejITx86cl4QWSwN5e',//Client Id
            'ENBrwWznQvlVDvhcVm-C0GdPvgojhmayl5gKh6ETEEeE53FwvbBOiLU6UvRoj9WQoUOEvNRg1ScDXZpR'//Secret
        )
    );
