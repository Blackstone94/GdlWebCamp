<?php
    require ('paypal/autoload.php');
    define('URL_SITIO','http://localhost/gdlwebcamp');
    $apiContext = new \PayPal\Rest\ApiContext(
        new \PayPal\Auth\OAuthTokenCredential(
            'AbLyHMLxbxIQomrCefehDVcRQPhBPiJ-4bWZSOljYzXNmkhPZJz7usUtlToHDJJr-3dLqKxJtrtLydyO',//Client Id
            'EESzs36WtnOykhL5gN-LldrkfR7rxQQsF_n87WdYz2cFYVcYSOvPIe1tW-GWxlJGoEsGWuDTIkt0RC_Q'//Secret
        )
    );
