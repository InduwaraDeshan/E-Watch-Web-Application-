<!DOCTYPE html>
<html>

<head>
    <title>Darklook</title>

    <link rel="icon" href="resources/watch_images/icon/Screenshot_2022-10-27_104146-removebg-preview.png" />

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
</head>

<body>

    <div class="container-fluid">
        <div class="row ">



            <?php

            require "header.php";

            if (isset($_SESSION["u"])) {
                $uemail = $_SESSION["u"]["email"];

                $total = 0;
                $subTotal = 0;
                $shipping = 0;

            ?>

                <div class="col-10 offset-1 bg-white ">
                    <div class=" col-12 text-center bg-white shadow mt-3">
                        <label class="form-label fs-1 fw-bold ">Cart <i class="bi bi-cart3 fs-2"></i></label>
                    </div>
                    <div class="col-12 ">
                        <hr class="hr-break-1" />
                    </div>

                    <div class="row">
                        <div class="col-12 col-lg-2 bg-light shadow">

                            <!-- breadcum & -->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Cart</li>
                                </ol>
                            </nav>

                            <nav class=" nav  nav-pills flex-column">
                                <a class="nav-link  text-center shadow mt-3" aria-current="page" href="watchList.php"> My Watchlist</a>
                                <a class="nav-link text-center shadow mt-3" href="cart.php">My Cart</a>
                                <a class="nav-link text-center shadow mt-3" href="#">Recents</a>

                            </nav>
                            <!-- breadcum & -->
                        </div>
                        <div class="col-12 col-lg-10 shadow rounded mb-3">
                            <div class="row">



                                <?php
                                $cart_rs = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $uemail . "'");
                                $cart_num = $cart_rs->num_rows;

                                $cart_result = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $uemail . "' AND `status`='1'");
                                $cart_number = $cart_result->num_rows;

                                if ($cart_num == 0) {
                                ?>

                                    <!-- empty -->

                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-12 emptycart"></div>
                                            <div class="col-12 text-center mb-2">
                                                <img src="resources/emptycart.svg" style="width:200px ;" />
                                            </div>

                                            <div class="col-12 text-center mb-2">
                                                <label class="form-label fs-1">You have no item your Basket</label>
                                            </div>

                                            <div class="col-12 col-lg-4 offset-0 offset-lg-4 d-grid mb-4">
                                                <a href="#" class="btn btn-primary fs-5">Start Shoping</a>
                                            </div>

                                        </div>
                                    </div>

                                    <!-- empty -->


                                <?php
                                } else {

                                    $cart_rst = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $uemail . "'");
                                    $cart_status = $cart_rst->fetch_assoc();

                            

                                    $product_rst = Database::search("SELECT * FROM `product` INNER JOIN `cart` ON product.id = cart.product_id WHERE product.qty = 0 AND cart.product_id=product.id AND cart.user_email = '".$uemail."'");
                                    $pd_num = $product_rst->num_rows;

                                    
                                ?>


                                    <?php
                                    if ($pd_num >= 1) {
                                    ?>
                                        <div class=" col-lg-4 offset-lg-0 form-check">
                                            <input class="form-check-input" type="checkbox" disabled id="flexCheckDefault" <?php if ($cart_num == $cart_number) {
                                                                                                                                echo "checked";
                                                                                                                            } ?>>



                                            <label class="fw-bold text-black fs-5 text-black-50" for="">
                                                Select All Product
                                            </label>
                                        </div>
                                    <?php

                                    } else {
                                    ?>
                                        <div class=" col-lg-4 offset-lg-0 form-check">
                                            <input class="form-check-input" type="checkbox" id="flexCheckDefault" <?php if ($cart_num == $cart_number) {
                                                                                                                        echo "checked";
                                                                                                                    } ?> onclick="changeAllCartStatus();">



                                            <label class="fw-bold text-black fs-5" for="">
                                                Select All Product
                                            </label>
                                        </div>
                                    <?php
                                    }
                                    ?>



                                    <?php



                                    for ($x = 0; $x < $cart_num; $x++) {

                                        $cart_data = $cart_rs->fetch_assoc();

                                        $product_rs = Database::search("SELECT * FROM `product` WHERE `id` ='" . $cart_data["product_id"] . "'");


                                        $product_data = $product_rs->fetch_assoc();
                                        if ($cart_data["status"] == 1) {
                                            $total = $total + ($product_data["price"] * $cart_data["qty"]);
                                        }



                                        $address_rs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='" . $uemail . "'");
                                        $address_data = $address_rs->fetch_assoc();
                                        $city_id = $address_data["city_id"];

                                        $district_rs = Database::search("SELECT * FROM `city` WHERE `id`='" . $city_id . "'");
                                        $district_data = $district_rs->fetch_assoc();
                                        $district_id = $district_data["district_id"];

                                        $ship = 0;
                                        if ($district_id == 1) {
                                            $ship = $product_data["delivery_fee_colombo"];
                                            if ($cart_data["status"] == 1) {
                                                $shipping = $shipping + $product_data["delivery_fee_colombo"];
                                            }
                                        } else {
                                            $ship = $product_data["delivery_fee_other"];

                                            if ($cart_data["status"] == 1) {
                                                $shipping = $shipping + $product_data["delivery_fee_other"];
                                            }
                                        }



                                        $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $product_data["user_email"] . "'");

                                        $user_data = $user_rs->fetch_assoc();

                                    ?>
                                        <!-- have product -->

                                        <div class="col-12 col-lg-9 ">
                                            <div class="row">



                                                <div class="card mb-3 mx-0 col-12 ">
                                                    <div class="row g-0">



                                                        <div class="col-md-12 mt-3 mb-3 bg-secondary">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <span class="fw-bold text-white fs-5">Seller :</span>
                                                                    <span class="fw-bold text-white fs-5">
                                                                        <?php echo $user_data["fname"] . "  " . $user_data["lname"]; ?>
                                                                    </span> &nbsp;


                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="col-md-4">
                                                            <?php
                                                            $img_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product_data["id"] . "'");
                                                            $img_data = $img_rs->fetch_assoc();
                                                            ?>

                                                            <span class="d-inline-block " tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="<?php echo $product_data["description"]; ?>" title="Product Description">
                                                                <img src="<?php echo $img_data["code"] ?>" class="img-fluid rounded-start" style="max-width: 200px;" />
                                                            </span>

                                                            <!-- check box -->

                                                            <?php
                                                            if ($product_data["qty"] == 0) {
                                                            ?>
                                                                <div class="form-check ">
                                                                    <input disabled class="form-check-input" type="checkbox" id="flexCheckDefault<?php echo $cart_data["product_id"]; ?>" <?php if ($cart_data["status"] == 1) {
                                                                                                                                                                                                echo "checked";
                                                                                                                                                                                            } ?> onclick="changeCartStatus(<?php echo $cart_data['product_id']; ?>);">

                                                                </div>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <div class="form-check ">
                                                                    <input class="form-check-input" type="checkbox" id="flexCheckDefault<?php echo $cart_data["product_id"]; ?>" <?php if ($cart_data["status"] == 1) {
                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                    } ?> onclick="changeCartStatus(<?php echo $cart_data['product_id']; ?>);">

                                                                </div>
                                                            <?php
                                                            }


                                                            ?>



                                                            <!-- check box -->


                                                        </div>

                                                        <?php
                                                        $color_rs = Database::search("SELECT * FROM `color` WHERE `id`='" . $product_data["color_id"] . "'");
                                                        $color_data = $color_rs->fetch_assoc();

                                                        $condition_rs = Database::search("SELECT * FROM `condition` WHERE `id`='" . $product_data["condition_id"] . "'");
                                                        $condition_data = $condition_rs->fetch_assoc();

                                                        ?>



                                                        <div class="col-md-5">
                                                            <div class="card-body">
                                                                <h3 class="card-title"><?php echo $product_data["title"];    ?></h3>
                                                                <span class="fw-bold text-black-50">Colour : <?php echo $color_data["name"]; ?></span>&nbsp;
                                                                &nbsp; <span class=" fw-bold text-black-50"> Condition : <?php echo $condition_data["name"]; ?></span>

                                                                <br />

                                                                <span class=" fw-bold text-black-50 fs-5"> Price : </span> &nbsp;
                                                                <span class=" fw-bold text-black fs-5"> Rs. <?php echo $product_data["price"]; ?>.00</span>

                                                                <br /><br />
                                                                <span class=" fw-bold text-black-50 fs-5"> Available Quantity : </span> &nbsp;

                                                                <input type="text" value="<?php echo $product_data["qty"]; ?>" id="av_qty<?php echo $product_data["id"] ?>" class="border border-white bg-white" disabled />

                                                                <br /><br />


                                                                <div class="col-12">
                                                                    <span>Quantity : </span>
                                                                    <input type="number" class="border-1 fs-5 fw-bold text-start " style="outline: none;" pattern="[0-9]" value="<?php echo $cart_data["qty"] ?>" onkeyup='check_qty(<?php echo $product_data["id"] ?>);' onclick='check_qty(<?php echo $product_data["id"] ?>);' id="qtyvalue<?php echo $product_data["id"] ?>" />


                                                                </div>




                                                                <br />
                                                                <br />
                                                                <br />

                                                                <span class=" fw-bold text-black-50 fs-5">Delivery Fee : </span> &nbsp;
                                                                <span class=" fw-bold text-black-50 fs-5"> Rs.<?php echo $ship; ?>.00</span>


                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="card-body d-grid">

                                                                <?php
                                                                if ($product_data["qty"] == 0) {
                                                                ?>

                                                                    <a href='<?php echo "singleProductView.php?id=" . ($product_data["id"]) ?>' class="btn btn-outline-success mb-2 disabled">Buy Now ( Product Not Available )</a>

                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <a href='<?php echo "singleProductView.php?id=" . ($product_data["id"]) ?>' class="btn btn-outline-success mb-2">Buy Now</a>
                                                                <?php
                                                                }


                                                                ?>

                                                                <a href="#" class="btn btn-outline-danger mb-2" onclick="deleteFromCart(<?php echo $cart_data['id']; ?>);">Remove</a>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-md-12 mb-3 ">
                                                            <div class="well well-sm">
                                                                <div class="row">
                                                                    <div class="col-xs-12 col-md-6 text-center">
                                                                        <h1 class="rating-num">
                                                                            4.5</h1>
                                                                        <div class="rating">
                                                                            <span class="bi bi-star-fill  text-warning fs-5"></span><span class="bi bi-star-fill  text-warning fs-5">
                                                                            </span><span class="bi bi-star-fill  text-warning fs-5"></span><span class="bi bi-star-fill  text-warning fs-5">
                                                                            </span><span class="bi bi-star-half  text-warning fs-5"></span>
                                                                        </div>
                                                                        <div>
                                                                            <span class="bi bi-person-fill text-warning fs-5"> &nbsp;1,050,008 total</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-12 col-md-6">
                                                                        <div class="row rating-desc">
                                                                            <div class="col-xs-3 col-md-3 text-right">
                                                                                <span class="bi bi-star-fill  text-warning fs-5">&nbsp;5</span>
                                                                            </div>
                                                                            <div class="col-xs-8 col-md-9">
                                                                                <div class="progress progress-striped">
                                                                                    <div class="progress-bar progress-bar-success " role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                                                                        <span class="sr-only">80%</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- end 5 -->
                                                                            <div class="col-xs-3 col-md-3 text-right">
                                                                                <span class="bi bi-star-fill  text-warning fs-5">&nbsp;4</span>
                                                                            </div>
                                                                            <div class="col-xs-8 col-md-9">
                                                                                <div class="progress">
                                                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                                                                        <span class="sr-only">60%</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- end 4 -->
                                                                            <div class="col-xs-3 col-md-3 text-right">
                                                                                <span class="bi bi-star-fill  text-warning fs-5">&nbsp;3</span>
                                                                            </div>
                                                                            <div class="col-xs-8 col-md-9">
                                                                                <div class="progress">
                                                                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                                                        <span class="sr-only">40%</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- end 3 -->
                                                                            <div class="col-xs-3 col-md-3 text-right">
                                                                                <span class="bi bi-star-fill  text-warning fs-5">&nbsp;2</span>
                                                                            </div>
                                                                            <div class="col-xs-8 col-md-9">
                                                                                <div class="progress">
                                                                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                                                                        <span class="sr-only">20%</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- end 2 -->
                                                                            <div class="col-xs-3 col-md-3 text-right">
                                                                                <span class="bi bi-star-fill  text-warning fs-5">&nbsp;1</span>
                                                                            </div>
                                                                            <div class="col-xs-8 col-md-9">
                                                                                <div class="progress">
                                                                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 15%">
                                                                                        <span class="sr-only">15%</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- end 1 -->
                                                                        </div>
                                                                        <!-- end row -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <hr />

                                                        <div class="col-md-12 mt-3 mb-3">
                                                            <div class="row">
                                                                <div class="col-6 col-md-6">
                                                                    <span class="fw-bold fs-5 text-black-50">Request Total <i class="bi bi-info-circle"></i></span>
                                                                </div>
                                                                <div class="col-6 col-md-6 text-end">
                                                                    <span class="fw-bold fs-5 text-black-50"> Rs. <?php echo ($product_data["price"] * $cart_data["qty"]) + $ship ?>.00</span>
                                                                </div>

                                                            </div>
                                                        </div>





                                                    </div>

                                                </div>

                                            </div>


                                        </div>

                                        <!-- have product -->

                                <?php
                                    }
                                }






                                ?>


                                <div class="col-12 col-lg-3 shadow bg-light">
                                    <div class="row">

                                        <div class="col-12">
                                            <label class="form-label fs-3 fw-bold">Summary</label>
                                        </div>

                                        <div class="col-12">
                                            <hr />
                                        </div>

                                        <div class="col-6 mb-3">
                                            <span class="fs-6 fw-bold">items (<?php echo $cart_number; ?>)</span>
                                        </div>

                                        <div class="col-6 text-end mb-3">
                                            <span class="fs-6 fw-bold">Rs.<?php echo $total ?> .00</span>
                                        </div>

                                        <div class="col-6">
                                            <span class="fs-6 fw-bold">Shipping</span>
                                        </div>

                                        <div class="col-6 text-end">
                                            <span class="fs-6 fw-bold">Rs.<?php echo $shipping ?>.00</span>
                                        </div>

                                        <div class="col-12 mt-3">
                                            <hr />
                                        </div>

                                        <div class="col-6 mt-2">
                                            <span class="fs-4 fw-bold">Total</span>
                                        </div>

                                        <div class="col-6 mt-2 text-end">
                                            <span class="fs-4 fw-bold">Rs. <?php echo $total + $shipping ?>.00</span>
                                        </div>





                                        <?php
                                        if ($cart_data["status"] = 1) {
                                        ?>

                                            <div class="col-12 mt-3 mb-3 d-grid">
                                                <button class="btn btn-primary fs-5 fw-bold" onclick="checkout();">CHECKOUT</button>
                                            </div>

                                        <?php

                                        }

                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                <?php require "footer.php"; ?>
        </div>
    </div>


    <script src="script.js" ;></script>

    <script>
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
    </script>
    <!-- <script src="bootstrap.bundle.js"></script> -->
    <script src="bootstrap.js"></script>

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<a href="https://api.whatsapp.com/send?phone=51955081075&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20Varela%202." class="float" target="_blank">
<i class="fa fa-whatsapp my-float"></i>
</a> -->

</body>

</html>

<?php
            } else {
                echo "Please Sign In first. ";
            }
?>