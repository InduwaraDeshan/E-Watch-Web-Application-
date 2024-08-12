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
        <div class="row">



            <?php require "header.php";

            if (isset($_SESSION["u"])) {
                $u = $_SESSION["u"]["email"];
            ?>

                <div class="col-10 offset-1">
                    <div class="row">
                        <div class="col-12 border-1 border-secondary rounded ">
                            <div class="row">

                                <div class="col-12 text-center shadow mt-3">
                                    <label class="form-label fs-1 fw-bolder text-center">watchlist &hearts;</label>
                                </div>

                                
                                <div class="col-12 ">
                                    <hr class="hr-break-1" />
                                </div>
                                <div class="col-12 col-lg-2 bg-light  shadow">
                                    <!-- breadcum & -->
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Watchlist</li>
                                        </ol>
                                    </nav>

                                    <nav class=" nav  nav-pills flex-column">
                                        <a class="nav-link  text-center shadow mt-3" aria-current="page" href="#"> My Watchlist</a>
                                        <a class="nav-link text-center shadow mt-3" href="cart.php">My Cart</a>
                                        <a class="nav-link text-center shadow mt-3" href="#">Recents</a>

                                    </nav>
                                    <!-- breadcum & -->
                                </div>
                                <?php
                                $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `user_email`='" . $u . "'");
                                $watchlist_num = $watchlist_rs->num_rows;

                                if ($watchlist_num == 0) {
                                ?>
                                    <!-- no items -->
                                    <div class="col-12 col-lg-10 shadow">
                                        <div class="row">
                                            <div class="col-12 emptyView"></div>
                                            <div class="col-12 text-center ">
                                                <label class="form-label fs-1 fw-bold">
                                                    You have no items in your watchList yet.
                                                </label>
                                            </div>
                                            <div class="offset-lg-4 col-12 col-lg-4 d-grid mb-3 ">
                                                <a href="home.php" class="btn btn-warning fs-3 fw-bold ">Start Shopping</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- no items -->
                                <?php
                                } else {
                                ?>
                                    <!-- have products -->

                                    <div class="col-12 col-lg-10 bg-light shadow ">

                                        <div class="row g-2 ">

                                            <?php
                                            for ($x = 0; $x < $watchlist_num; $x++) {
                                                $watchlist_data = $watchlist_rs->fetch_assoc();
                                                $product_id = $watchlist_data["product_id"];
                                                $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $product_id . "'");
                                                $pc = Database::search("SELECT color.name AS 'color_name' , condition.name AS 'condition_name' FROM color  INNER JOIN product ON color.id=product.color_id INNER JOIN  `condition` ON `condition`.id =product.condition_id  WHERE product.id='" . $product_id . "';");
                                                $product_data = $product_rs->fetch_assoc();
                                                $pc_data = $pc->fetch_assoc();
                                                $img_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product_data["id"] . "'");
                                                $img_data = $img_rs->fetch_assoc();
                                            ?>


                                                <!-- card -->
                                                <div class="card mb-3 mx-0 mx-lg-2 col-12 bg-light ">
                                                    <div class="row g-0">
                                                        <div class="col-md-4 shadow bg-light " >
                                                            <img src="<?php echo $img_data["code"] ?>" class="img-fluid rounded-start "  />
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="card-body">
                                                                <h5 class="card-title fw-bold fs-2 text-success"><?php echo $product_data["title"]; ?></h5>
                                                                <span class="fs-5  fw-bold text-black-50">Colour : <?php echo $pc_data["color_name"]   ?></span>
                                                                &nbsp; &nbsp;| &nbsp;&nbsp;
                                                                <span class="fs-5  fw-bold text-black-50">Condition : <?php echo $pc_data["condition_name"]   ?></span>
                                                                <br />
                                                                <span class="fs-5  fw-bold text-black-50">Price :</span> &nbsp; &nbsp;
                                                                <span class="fs-5 fw-bold text-black">Rs.<?php echo $product_data["price"]; ?>.00</span>
                                                                <br />
                                                                <span class="fs-5  fw-bold text-black-50">Quantity :</span> &nbsp; &nbsp;
                                                                <span class="fs-5 fw-bold text-black"><?php echo $product_data["qty"]; ?> Items Available</span>
                                                                <br />
                                                                <span class="fs-5  fw-bold text-black-50">Seller :</span>
                                                                <br />
                                                                <span class="fs-5 fw-bold text-black">Induwara</span>
                                                            </div>
                                                            <div class="row  mt-2 mb-3">

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
                                                                                        <span class="bi bi-star-fill  text-warning fs-5">1</span>
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
                                                        </div>
                                                        <div class="col-md-3 mt-4 ">
                                                            <div class="card-body d-grid d-lg-grid">
                                                                <br>
                                                                <br>
                                                                <br>
                                                                <br>
                                                                <a href='<?php echo "singleProductView.php?id=" . ($product_data["id"]) ?>'  class="btn btn-outline-success mb-2">Buy Now</a>
                                                                
                                                                <a onclick="addToCart(<?php echo $product_data['id']; ?>);" class="btn btn-outline-secondary mb-2">Add to cart</a>
                                                                
                                                                <a class="btn btn-outline-danger" onclick="removeFromWatchlist(<?php echo $watchlist_data['id']; ?>);">Remove</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- card -->


                                            <?php
                                            }
                                            ?>
                                        </div>

                                    </div>

                                    <!-- have products -->

                                <?php
                                }
                                ?>



                            </div>
                        </div>
                    </div>
                </div>
                <?php require "footer.php"; ?>

        </div>
    </div>


    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>

<?php
            } else {

                echo "Please Sign In OR Register.  ";
            }
?>