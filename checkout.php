<?php
require "connection.php";
session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="resources/watch_images/icon/Screenshot_2022-10-27_104146-removebg-preview.png" />
    <title>Darklook| Payment</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="checkout.css" />
</head>

<body>
    <!-- Font Awesome -->
    <script src="https://use.fontawesome.com/2d1c7583b1.js"></script>
    <?php

    if (isset($_POST["id"])) {



        $pid = $_POST["id"];
        $qty = $_POST["qty"];

        $product_rs = Database::search("SELECT * FROM `product` WHERE  `id`='" . $pid . "'");
        $product_data = $product_rs->fetch_assoc();
        $p = $product_data["price"];
        $product_name = $product_data["title"];
        $price = $p * $qty;

        $product_img_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pid . "'");

        $product_img = $product_img_rs->fetch_assoc();
        $image = $product_img["code"];

    ?>

        <section class="container mt-3">

            <section class="content">

                <article id="product" class="shadow  " style="background: linear-gradient(#FBFBFB 40%, #D5D2DD 100%);"><img src="<?php echo $image ?>" alt="Lunar 2"></article>
                <h1><?php echo $product_name ?></h1>
                <article id="checkoutCard" class="shadow">
                    <div id="details">
                        <dl>
                            <dt>Product</dt>
                            <dd> <img id="thumbnail" src="<?php echo $image ?>" alt="Lunar 2"></dd>
                            <dt>Quantity</dt>
                            <dd> <input type="text" value="<?php echo $qty  ?>"> </dd>
                            <dt>Price</dt>
                            <dd>Rs <?php echo $price ?> .00</dd>
                        </dl>
                    </div>
                    <form autocomplete="off" action="checkout-charge.php" method="POST">
                        <div>
                            <label class="col-6">Customer Name</label>
                            <input type="text" name="c_name " value="<?php echo $_SESSION["u"]["fname"] ?>" class="col-12" required />

                        </div>
                        <div>
                            <?php
                            $user_rs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='" . $_SESSION["u"]["email"] . "'");
                            $user_data = $user_rs->fetch_assoc();
                            ?>
                            <label class="col-6">Address</label>
                            <input type="text" name="address" class="col-12" value="<?php echo $user_data["line1"]." ".$user_data["line2"] ?>" required />

                        </div>
                        <div>
                            <label class="col-6">Contact number</label>
                            <input type="number" id="ph" name="phone" pattern="\d{10}" class="col-12" value="<?php echo $_SESSION["u"]["mobile"] ?>" maxlength="10" required />

                        </div>
                        <div>


                            <input type="hidden" name="amount" value="<?php echo $price ?>">
                            <input type="hidden" name="pid" value="<?php echo $pid ?>">
                            <input type="hidden" name="qty" value="<?php echo $qty ?>">
                            <input type="hidden" name="product_name" value="<?php echo $product_name ?>">

                            <div class="mb-4">
                                &nbsp; &nbsp; &nbsp;
                                &nbsp; &nbsp; &nbsp;
                                &nbsp; &nbsp; &nbsp;
                                &nbsp; &nbsp; &nbsp;
                                &nbsp; &nbsp;

                                <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="pk_test_51LiNE9ArMd2Z7KzyJnPKOnVQUfNRNbtPezLDceY2lNoPfw36Zep4Bdb6hrqufQrij4Saa4FkrHdxTU23xMowlPJJ00RAJsNffw" data-amount=<?php echo str_replace(",", "", $price) * 100 ?> data-name="<?php echo $product_name ?>" data-description="<?php echo $product_name ?>" data-image="<?php echo $image ?>" data-currency="lkr" data-locale="auto">
                                </script>
                            </div>
                        </div>
                    </form>
                </article>
            </section>
        </section>
    <?php
    } else {
    ?>


        <!--  -->
        <section class="container mt-3">

            <section class="content">
                <article id="product" class="shadow  " style="background: linear-gradient(#FBFBFB 40%, #D5D2DD 100%);">
                    <img src="resources/watch_images/5843872.jpg" alt="Lunar 2">
                </article>

                <article id="checkoutCard" class="shadow">
                    <div id="details">
                        <dl>

                            <?php
                            $payment = $_SESSION["payment"];





                            ?>

                            <dt>Price</dt>
                            <dd>Rs. <?php echo $payment ?>.00</dd>
                        </dl>
                    </div>
                    <form autocomplete="off" action="checkout-charge.php" method="POST">
                        <div>
                            <label class="col-6">Customer Name</label>
                            <input type="text" name="c_name " value="<?php echo $_SESSION["u"]["fname"] ?>" class="col-12" required />

                        </div>
                        <div>
                            <?php
                            $user_rs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='" . $_SESSION["u"]["email"] . "'");
                            $user_data = $user_rs->fetch_assoc();
                            ?>
                            <label class="col-6">Address</label>
                            <input type="text" name="address" class="col-12" value="<?php echo $user_data["line1"]." ".$user_data["line2"] ?>" required />

                        </div>
                        <div>
                            <label class="col-6">Contact number</label>
                            <input type="number" id="ph" name="phone" pattern="\d{10}" class="col-12" value="<?php echo $_SESSION["u"]["mobile"] ?>" maxlength="10" required />

                        </div>
                        <div>


                            <input type="hidden" name="amount" value="<?php echo $payment ?>">
                            <input type="hidden" name="product_name" value="<?php echo $product_name ?>">

                            <div class="mb-4">
                                &nbsp; &nbsp; &nbsp;
                                &nbsp; &nbsp; &nbsp;
                                &nbsp; &nbsp; &nbsp;
                                &nbsp; &nbsp; &nbsp;
                                &nbsp; &nbsp;

                                <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="pk_test_51LiNE9ArMd2Z7KzyJnPKOnVQUfNRNbtPezLDceY2lNoPfw36Zep4Bdb6hrqufQrij4Saa4FkrHdxTU23xMowlPJJ00RAJsNffw" data-amount=<?php echo str_replace(",", "", $payment) * 100 ?> data-name="" data-description="" data-image="" data-currency="lkr" data-locale="auto">
                                </script>
                            </div>
                        </div>
                    </form>
                </article>
            </section>
        </section>

        <!--  -->




    <?php

    }
    ?>

</body>

</html>