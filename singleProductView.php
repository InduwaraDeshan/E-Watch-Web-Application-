<?php

require "connection.php";

if (isset($_GET["id"])) {

    $pid = $_GET["id"];
    $product_rs = Database::search("SELECT product.id,product.category_id,product.model_has_brand_id,product.title,product.price,product.qty
    ,product.description,product.condition_id,product.status_id,product.user_email,model.name AS mname ,brand.name AS bname FROM product INNER JOIN
    model_has_brand ON model_has_brand.id = product.model_has_brand_id INNER JOIN  brand ON brand.id = model_has_brand.brand_id 
    INNER JOIN model ON model.id = model_has_brand.model_id WHERE product.id='" . $pid . "'");

    $product_num = $product_rs->num_rows;
    if ($product_num == 1) {

        $product_data = $product_rs->fetch_assoc();





?>








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
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="
            anonymous" referrerpolicy="no-referrer" />
        </head>

        <body>


            <div class="container-fluid">
                <div class="row">
                    <!-- header -->
                    <header>
                        <nav class="navbar ">
                            <div class="container-fluid">

                                <div>
                                    <span class="text-lg-start label1"><b>Welcome</b>

                                        <?php
                                        session_start();
                                        if (isset($_SESSION["u"])) {
                                            $data = $_SESSION["u"];
                                        ?>

                                            <?php echo $data["fname"]; ?>

                                    </span> |

                                    <span class="text-lg-start label2 text-success" onclick="signout();">Sign Out</span>


                                <?php
                                        }

                                ?>





                                </div>
                                <div class="nav navbar-nav1 ">

                                    <a class="btn text-white" href="home.php"><i class="bi bi-house-door-fill"></i> Home</a>
                                    <a class="btn text-white" href="watchList.php"><i class="bi bi-heart-fill"></i> Wish List</a>
                                    <a class="btn text-white" href="myproduct.php"><i class="bi bi-bag-plus-fill"></i> My Products</a>
                                    <a class="btn text-white" href="purchaseHistory.php"><i class="bi bi-cash-coin"></i> Purchase History</a>
                                    <a class="btn text-white" href="message.php?email=<?php echo $data["email"]; ?>"><i class="bi bi-chat-left-dots-fill"></i> Messages</a>
                                    <a class="btn text-white" href="sellingHistory.php"><i class="bi bi-cash"></i> My Sellings</a>
                                    <a class="btn text-white" href="userprofile.php"><i class="bi bi-person-lines-fill"></i> My Profile</a>
                                    <a class="btn text-white" href="cart.php"><i class="bi bi-cart-fill"></i></a>

                                    &nbsp;
                                    &nbsp;
                                    &nbsp;

                                    <div class="mt-1 mb-1 text-center">

                                        <?php

                                        $profile_img_hm = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $data["email"] . "'");
                                        $profile_img_number = $profile_img_hm->num_rows;

                                        if ($profile_img_number == 1) {

                                            $profile_img_hm_data = $profile_img_hm->fetch_assoc();
                                        ?>

                                            <a href="userprofile.php"><img src="<?php echo $profile_img_hm_data["path"]; ?>" class="rounded-circle " width="50px" /></a>




                                        <?php

                                        } else {
                                        ?>
                                            <img src="resources/Profile_img/user_icon.svg" class="rounded-circle" width="50px" />


                                        <?php
                                        }
                                        ?>

                                    </div>

                                </div>

                            </div>
                        </nav>
                    </header>
                    <!--  header-->

                    <div class="col-12 mt-0 bg-light singleproduct ">
                        <div class="row">
                            <div class="col-12 col-lg-12  " style="padding: 11px;">
                                <div class="row">



                                    <div class="col-12 col-lg-2 offset-1 order-2 order-lg-1">
                                        <ul>
                                            <?php

                                            $product_img_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pid . "'");

                                            $product_img_num = $product_img_rs->num_rows;
                                            $img = array();


                                            if ($product_img_num != 0) {
                                                for ($x = 0; $x < $product_img_num; $x++) {
                                                    $product_img_data = $product_img_rs->fetch_assoc();

                                                    $img[$x] = $product_img_data["code"];
                                            ?>
                                                    <li class="d-flex flex-column justify-content-center align-items-center mb-1 ">
                                                        <img src="<?php echo $img["$x"] ?>" class="img-thumbnail mt-1 mb-1 bg-light shadow" style="height: 200px;" id="productImg<?php echo $x; ?>" onclick="loadMainImg(<?php echo $x;  ?>);" />
                                                    </li>
                                                <?php
                                                }
                                            } else {
                                                ?>
                                                <li class="d-flex flex-column justify-content-center align-items-center border border-1 border-secondary mb-1">
                                                    <img src="resources/empty.svg" class="img-thumbnail mt-1 mb-1 bg-light shadow" />
                                                </li>

                                                <li class="d-flex flex-column justify-content-center align-items-center border border-1 border-secondary mb-1">
                                                    <img src="resources/empty.svg" class="img-thumbnail mt-1 mb-1 bg-light shadow" />
                                                </li>

                                                <li class="d-flex flex-column justify-content-center align-items-center border border-1 border-secondary mb-1">
                                                    <img src="resources/empty.svg" class="img-thumbnail mt-1 mb-1 bg-light shadow" />
                                                </li>

                                            <?php

                                            }


                                            ?>


                                        </ul>
                                    </div>
                                    <div class="col-lg-8 order-2 order-lg-1 d-none d-lg-block">
                                        <div class="row">
                                            <div class="col-12 align-items-center bcbox shadowmainbox ">
                                                <div class="mainImg bgwh  " id="mainImg"><img src="resources/watch_images/icon/black Friday sale banner isolated vector discount PNG - 3000x3000.png" class="offset-10 " style="width: 250px;" alt="">
                                                    <p class="text-end text-warning fs-4" style="margin-top:350px ;"> span a chance to get 5% discount by using VISA or MASTER</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-12 col-lg-10 offset-1 bg-white shadow order-3 mt-5" style="border-radius: 15px ;">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row  border-bottom border-dark">
                                                    <nav aria-label="breadcrumb">
                                                        <ol class="breadcrumb">
                                                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                                            <li class="breadcrumb-item active" aria-current="page">
                                                                Single Product View
                                                            </li>
                                                        </ol>
                                                    </nav>
                                                </div>
                                                <div class="row border-bottom border-dark">
                                                    <div class="col-12 my-2">
                                                        <span id="ptitle" class="fs-4 fw-bold  text-success "><?php echo $product_data["title"] ?></span>
                                                    </div>
                                                </div>
                                                <div class="row border-bottom  border-dark">
                                                    <div class="col-12 my-2">
                                                        <span class="badge">
                                                            <label class="fs-5 text-dark fw-bold">4.5 Stars | 35 Ratings And Reviews</label>

                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="row border-bottom  border-dark mt-2">

                                                    <div class="col-xs-12 col-md-12">
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
                                                                        <span class="bi bi-person-fill text-warning fs-5"></span>1,050,008 total
                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-12 col-md-6">
                                                                    <div class="row rating-desc">
                                                                        <div class="col-xs-3 col-md-3 text-right">
                                                                            <span class="bi bi-star-fill  text-warning fs-5"></span>5
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
                                                                            <span class="bi bi-star-fill  text-warning fs-5"></span>4
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
                                                                            <span class="bi bi-star-fill  text-warning fs-5"></span>3
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
                                                                            <span class="bi bi-star-fill  text-warning fs-5"></span>2
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
                                                                            <span class="bi bi-star-fill  text-warning fs-5"></span>1
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
                                                </div>









                                                <div class=" row border-bottom border-dark">
                                                    <div class="col-12 my-2">
                                                        <?php
                                                        $price = $product_data["price"];
                                                        $addingPrice = ($price / 100) * 5;
                                                        $newprice = $price + $addingPrice;
                                                        $difference = $newprice - $price;
                                                        $percentage = ($difference / $price) * 100;
                                                        ?>
                                                        <span class="fs-4 fw-bold text-black">Rs.<?php echo $product_data["price"]; ?>.00</span>
                                                        <br />
                                                        <span class="fs-4 fw-bold text-danger"><del>Rs.<?php echo $newprice; ?> .00</del></span>
                                                        &nbsp;&nbsp; | &nbsp;&nbsp;
                                                        <span class="fs-4 fw-bold text-black">Save Rs.<?php echo $difference; ?>.00 (<?php echo $percentage; ?>%)</span>
                                                    </div>
                                                </div>

                                                <div class="row  border-bottom border-dark">
                                                    <div class="col-12">
                                                        <span class="fs-5 text-primary"><b>Warenty :</b> 6 Months warrenty</span>
                                                        <br />
                                                        <span class="fs-5 text-primary"><b>Return Policy :</b> 1 Months return policy</span>
                                                        <br />
                                                        <span class="fs-5 text-primary"><b>In-stock :</b> <?php echo $product_data["qty"]; ?> Items Available</span>
                                                        <br />

                                                    </div>
                                                </div>
                                                <div class="row border-bottom border-dark">
                                                    <div class=" col-12 my-2">
                                                        <div class="row g-2">
                                                            <div class="col-12 col-lg-6 border border-1 border-dark text-center">
                                                                <span class="fs-4 text-info "><b>Seller :</b> Induwara</span>
                                                            </div>
                                                            <div class="col-12 col-lg-6 border border-1 border-dark text-center">
                                                                <span class="fs-4 text-success "><b>Sold :</b>10 Items</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-12 ">
                                                        <div class="row">
                                                            <div class="col-12 my-3">
                                                                <div class="row g-2">

                                                                    <div class="border border-1 border-secondary rounded overflow-hidden float-start mt-1 position-relative product_qty">
                                                                        <div class="col-12">
                                                                            <span>Quantity : </span>
                                                                            <input type="text" class="border-0 fs-5 fw-bold text-start " style="outline: none;" pattern="[0-9]" value="1" onkeyup='check_value(<?php echo $product_data["qty"] ?>);' id="qtyInput" />

                                                                            <div class="position-absolute qty_buttons">
                                                                                <div class="justify-content-center d-flex flex-column align-items-center border border-1 border-secondary qty_inc ">
                                                                                    <i class="bi bi-caret-up text-info fs-5" onclick='qty_inc(<?php echo $product_data["qty"] ?>)'></i>
                                                                                </div>
                                                                                <div class="justify-content-center d-flex flex-column align-items-center border border-1 border-secondary qty_dec">
                                                                                    <i class="bi bi-caret-down text-info fs-5" onclick="qty_dec();"></i>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-12 mt-5">
                                                                            <div class="row">
                                                                                <?php
                                                                                if ($product_data["qty"] == 0) {
                                                                                ?>
                                                                                    <div class="col-4 d-grid">
                                                                                        <button class="btn btn-success" onclick="payNowProduct(<?php echo $pid  ?>);" disabled>Buy Now ( Product Not Available)</button>
                                                                                    </div>

                                                                                <?php

                                                                                } else {

                                                                                ?>

                                                                                    <div class="col-4 d-grid">
                                                                                        <button class="btn btn-success" onclick="payNowProduct(<?php echo $pid  ?>);">Buy Now</button>
                                                                                    </div>
                                                                                <?php
                                                                                }
                                                                                ?>

                                                                                <div class="col-4 d-grid">
                                                                                    <button class="btn btn-primary" onclick="addToCart(<?php echo $product_data['id']; ?>);">Add to Cart</button>
                                                                                </div>
                                                                                <div class="col-4 d-grid">


                                                                                    <?php

                                                                                    $watchlist_rs = Database::search("SELECT *  FROM `watchlist` WHERE 
                                                                         `product_id`='" . $product_data["id"] . "' AND `user_email`='" . $_SESSION["u"]["email"] . "'");
                                                                                    $watchlist_num = $watchlist_rs->num_rows;

                                                                                    if ($watchlist_num == 1) {
                                                                                    ?>
                                                                                        <a class="btn btn-outline-secondary col-12 mt-1" onclick="addToWatchlist(<?php echo $product_data['id']; ?>);"><i class="bi bi-heart-fill fs-5 text-danger" id="heart<?php echo $product_data['id'];  ?>"></i></a>

                                                                                    <?php
                                                                                    } else {
                                                                                    ?>
                                                                                        <a class="btn btn-outline-secondary col-12 mt-1" onclick="addToWatchlist(<?php echo $product_data['id']; ?>);"><i class="bi bi-heart-fill fs-5 text-primary" id="heart<?php echo $product_data['id'];  ?>"></i></a>

                                                                                    <?php
                                                                                    }
                                                                                    ?>


                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="col-10 offset-1">
                                <div class="row">
                                    <div class="col-12 col-lg-6 bg-white shadow" style="border-radius: 15px ;">
                                        <?php
                                        $brand_rs = Database::search("SELECT `brand`.`name` AS 'bname', `model`.`name`AS 'mname' FROM `brand` INNER JOIN `model_has_brand` ON  `brand`.`id`=`model_has_brand`.`brand_id` INNER JOIN `model` ON 
                                      `model`.`id`=`model_has_brand`.`model_id` INNER JOIN `product` ON `product`.`model_has_brand_id`=`model_has_brand`.`id` WHERE `product`.`id`='" . $pid . "'");

                                        $brand_data = $brand_rs->fetch_assoc();
                                        ?>
                                        <div class="col-12">
                                            <div class="row d-block me-0 mt-4 mb-3 border-bottom border-1 border-dark ">
                                                <div class="col-12">
                                                    <span class="fs-4 fw-bold">Product Details</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 bg-white">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-3">
                                                            <label class="form-label fs-4 fw-bold ">Brand :</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <label class="form-label fs-4 fw-bold"><?php echo $brand_data["bname"] ?></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-3">
                                                            <label class="form-label fs-4 fw-bold ">Model :</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <label class="form-label fs-4 fw-bold"><?php echo $brand_data["mname"] ?></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-2">
                                                    <div class="row">
                                                        <div class="col-3">
                                                            <label class="form-label fs-4 fw-bold ">Description :</label>
                                                        </div>
                                                        <div class="col-12">
                                                            <textarea cols="60" rows="10" class="form-control " disabled><?php echo $product_data["description"] ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12 col-lg-6 bg-white shadow" style="border-radius: 15px ;">
                                        <div class="row px-4  py-5 chat_box ">
                                            <div class="col-12  ">
                                                <div class="row d-block me-0 ms-0 mt-3 mb-3 border border-1 border-start-0 border-end-0 border-top-0 border-white">
                                                    <div class="col-12">
                                                        <span class="fs-3 fw-bold ">Feedbacks...</span>
                                                    </div>
                                                </div>

                                            </div>
                                            <?php

                                            $feedbackrs = Database::search("SELECT * FROM `feedback` WHERE `product_id` ='" . $product_data["id"] . "' ");
                                            $fn = $feedbackrs->num_rows;
                                            if ($fn == 0) {
                                            ?>
                                                <div class="col-12 text-center">
                                                    <div class="row">
                                                        <div class="col-12 emptyFeedView"></div>
                                                        <div class="col-12 text-center">
                                                            <label class="form-label fs-4 fw-bold">
                                                                There are no Feedbacks to View...
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>

                                                <?php

                                            } else {

                                                for ($i = 0; $i < $fn; $i++) {
                                                    $fd = $feedbackrs->fetch_assoc();
                                                ?>
                                                    <div class="col-12 bg-white">
                                                        <div class="row g-1 ">
                                                            <div class="col-12 col-lg-12  m-2 bg-white shadow p-2  rounded">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <span class="fs-6 fw-bold text-primary">
                                                                            <?php

                                                                            $profile_img_hm = Database::search("SELECT profile_image.path FROM profile_image  INNER JOIN user ON profile_image.user_email = user.email WHERE user.email='" . $fd["user_email"] . "'");
                                                                            $profile_img_hm_data = $profile_img_hm->fetch_assoc();

                                                                            $user_name = Database::search("SELECT * FROM user  WHERE user.email = '" . $fd["user_email"] . "'");
                                                                            $user_name_data = $user_name->fetch_assoc();

                                                                            ?>
                                                                            <a href=""><img src="<?php echo $profile_img_hm_data["path"]; ?>" class="rounded-circle " width="50px" /></a>

                                                                            <?php echo  $user_name_data["fname"] . " " .  $user_name_data["lname"];  ?></span>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <span class="fs-6 text-dark"><?php echo $fd["feed"];  ?></span>
                                                                    </div>
                                                                    <div class="col-12 text-end">
                                                                        <span class="text-black-50"><?php echo $fd["date"]; ?></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            <?php
                                                }
                                            }


                                            ?>
                                        </div>

                                    </div>
                                </div>



                            </div>

                            <div class="col-10 offset-1 bg-white shadow mt-3">
                                <div class="row">
                                    <div class="col-12 bg-white">
                                        <div class="row d-block me-0 mt-4 mb-3 border-bottom border-1 border-dark">
                                            <div class="col-12 ">
                                                <span class="fs-3 fw-bold">Related Items </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 bg-white">
                                        <div class="row g-2">


                                            <?php
                                            $related_rs = Database::search("SELECT * FROM `product` WHERE
                                     `model_has_brand_id`='" . $product_data["model_has_brand_id"] . "' LIMIT 6 ");









                                            $related_num = $related_rs->num_rows;
                                            for ($y = 0; $y < $related_num; $y++) {
                                                $related_data = $related_rs->fetch_assoc();

                                                $related_product_img_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $related_data["id"] . "'");

                                                $related_image_data = $related_product_img_rs->fetch_assoc();
                                            ?>

                                                <div class="  col-12 col-lg-2 ">
                                                    <div class="card" style="width: 18rem;">
                                                        <img src="<?php echo $related_image_data["code"] ?>" class="card-img-top" />
                                                        <div class="card-body">
                                                            <h4 class="card-title"><?php echo $related_data["title"] ?></h4>
                                                            <span class="fs-5 fw-bold">Rs.<?php echo $related_data["price"] ?>.00</span>
                                                            <div class="col-12">
                                                                <div class="row  g-1">
                                                                    <div class="col-12 d-grid">
                                                                        <a href='<?php echo "singleProductView.php?id=" . ($related_data["id"]) ?>' class="btn btn-success col-12 ">Buy Now</a>
                                                                    </div>
                                                                    <div class="col-12 d-grid">
                                                                        <a href="#" onclick="addToCart(<?php echo $related_data['id']; ?>);" class="btn btn-danger col-12 mt-1">Add to Cart</a>
                                                                    </div>
                                                                    <div class="col-12 d-grid">
                                                                        <?php
                                                                        $watchlist_rs = Database::search("SELECT *  FROM `watchlist` WHERE 
                                                                        `product_id`='" . $related_data['id'] . "' AND `user_email`='" . $_SESSION["u"]["email"] . "'");
                                                                        $watchlist_num = $watchlist_rs->num_rows;

                                                                        if ($watchlist_num == 1) {
                                                                        ?>
                                                                            <a class="btn btn-secondary col-12 mt-1" onclick="addToWatchlist(<?php echo $related_data['id']; ?>);"><i class="bi bi-heart-fill fs-5 text-danger" id="heart<?php echo $related_data['id'];  ?>"></i></a>

                                                                        <?php
                                                                        } else {
                                                                        ?>
                                                                            <a class="btn btn-secondary col-12 mt-1" onclick="addToWatchlist(<?php echo $related_data['id']; ?>);"><i class="bi bi-heart-fill fs-5 text-white" id="heart<?php echo $related_data['id'];  ?>"></i></a>

                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
                    <br />
                    <?php require "footer.php" ?>

                </div>
            </div>


            <script src="script.js"></script>
            <script>
                var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
                var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
                    return new bootstrap.Popover(popoverTriggerEl)
                })
            </script>

            <?php

            $user_mobile_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $product_data["user_email"] . "'");
            $mobile_data = $user_mobile_rs->fetch_assoc();
            $mobile = $mobile_data["mobile"];

            ?>



            <a href="https:/wa.me/94<?php echo $mobile; ?>" target="_blank" class="whatsapp_float contact_icon">
                <img src="resources/whatsapp.png">
            </a>

        </body>

        </html>

<?php

    } else {
        echo "Sorry for the inconvenient.";
    }
} else {
    echo "Something went wrong. ";
}


?>