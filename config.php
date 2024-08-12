<?php
   require_once "stripe-php-master/init.php";
  

    $stripeDetails = array(
        "secretKey"=>"sk_test_51LiNE9ArMd2Z7KzyKJVxMS5SfqMO9Sdfau01EW0OQRJjhoqt13Nbetm3p6jNwpIBwdHykztF6bR6KCCtIv6M35ye00zSYvvqsW" ,
        "publishableKey"=>"pk_test_51LiNE9ArMd2Z7KzyJnPKOnVQUfNRNbtPezLDceY2lNoPfw36Zep4Bdb6hrqufQrij4Saa4FkrHdxTU23xMowlPJJ00RAJsNffw"
    );

    \Stripe\Stripe::setApiKey($stripeDetails["secretKey"]);
?>