<?php
   require_once "stripe-php-master/init.php";
  

    $stripeDetails = array(
        "secretKey"=> "scretKey" ,
        "publishableKey"=>"pk_test_51LiNE9ArMd2Z7KzyJnPKOnVQUfNRNbtPezLDceY2lNoPfw36Zep4Bdb6hrqufQrij4Saa4FkrHdxTU23xMowlPJJ00RAJsNffw"
    );

    \Stripe\Stripe::setApiKey($stripeDetails["secretKey"]);
?>
