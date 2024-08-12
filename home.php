<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Darklook| Home</title>

    <link rel="icon" href="resources/watch_images/icon/Screenshot_2022-10-27_104146-removebg-preview.png" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="product.css" />
    <link rel="stylesheet" href="place.css" />
    <link rel="stylesheet" href="img.css" />




</head>

<body>

    <div class="container-fluid bg-black">
        <div class="row">


            <?php

            require "header.php";

            ?>



            <div class="col-12 justify-content-center">
                <div class="row mb-3">
                    <div class="col-4 col-lg-1 offset-4 offset-lg-1 logo-img"></div>
                    <div class="col-8 col-lg-6">
                        <div class="input-group input-group-lg mt-3 mb-3">
                            <input type="text" class="form-control" aria-label="Text input with dropdown button" id="basic_search_txt" />

                            <select class="btn btn-outline-secondary" id="basic_search_select">
                                <option value="0" readonly>Select Category</option>

                                <?php

                                $categoryrs = Database::search("SELECT * FROM `category`");
                                $num = $categoryrs->num_rows;

                                for ($x = 0; $x < $num; $x++) {

                                    $cd = $categoryrs->fetch_assoc();

                                ?>
                                    <option value=" <?php echo $cd["id"]; ?>"><?php echo $cd["name"]; ?></option>

                                <?php

                                }

                                ?>




                            </select>

                        </div>
                    </div>

                    <div class="col-2 d-grid gap-2 ">
                        <button class="btn btn-outline-secondary mt-3 search-btn" onclick="basicSearch(0);">Search</button>
                    </div>

                    <div class="col-1 d-grid gap-2">
                        <button class="btn btn-outline-secondary mt-3 search-btn" onclick="AdvancedSearch();">Advanced</button>
                    </div>

                </div>
            </div>



            <div class="col-12" id="basicSearchResult">

                <!-- carousel -->

                <section id="hero1" class="d-flex flex-column justify-content-center align-items-center">
                    <div class="container rounded" data-aos="fade-in">
                        <div class="section-title" data-aos="fade-up">

                            <h1>Welcome to <h1>DarkLook</h1>
                            </h1>
                            <h2>The only online shopping cart that attracts customers with the best of watches </h2>


                        </div>

                    </div>
                </section>



                <!--  -->
                <section id="why-us" class="why-us">
                    <div class="container">

                        <div class="row">


                            <div class="col-xl-8 col-lg-7 d-flex">
                                <div class="icon-boxes d-flex flex-column justify-content-center">
                                    <div class="row">
                                        <div class="col-xl-3 d-flex align-items-stretch  " data-aos="fade-up" data-aos-delay="100">
                                            <div class="icon-box mt-4 mt-xl-0">
                                                <i class="bi bi-watch"></i>
                                                <h4>Introducing</h4>
                                                <p> Grand Seiko Is At It Again With A Pair Of Limited Releases To Celebrate The 25th Anniversary Of The Caliber 9S</p>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                                            <div class="icon-box mt-4 mt-xl-0">
                                                <i class="bi bi-watch"></i>
                                                <h4>Hands-On</h4>
                                                <p> Take To The Ice With The New Porsche Design Chronograph 1 GP 2023 Edition</p>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                                            <div class="icon-box mt-4 mt-xl-0">
                                                <i class="bi bi-watch"></i>
                                                <h4>Introducing</h4>
                                                <p> Bell & Ross Made A Watch With Alain Silberstein, Master Of The Squiggle</p>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                                            <div class="icon-box mt-4 mt-xl-0">
                                                <i class="bi bi-watch"></i>
                                                <h4>Introducing</h4>
                                                <p> TAG Heuer Revives A ‘60s-Era Panda Dial Carrera For The Chronograph’s 60th Anniversary</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-5 icon-main " data-aos="fade-up">
                                <div class="content rounded-4  bg-light icon-main">
                                    <div class="video-wrapper rounded-3">
                                        <video autoplay muted loop playsinline preload="metadata" class="video">
                                            <source src="resources/watch_images/video/watch.mp4" type="video/mp4">
                                        </video>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </section>
                <!--  -->




                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>




                <div class="col-12 ">
                    <div class="row">
                        <div class="col-12 col-lg-6 ">
                            <img src="resources/watch_images/store-bg.png" style="width:125% ;">
                        </div>
                        <div class="col-12 col-lg-6 text-center">
                            <div class="col-12 ">
                                <h5 class="fs-3 fs-lg-5 lh-sm fs-1 fw-bold text-white ">OUR STORE</h5>
                                <p class="my-4 pe-xl-5 fs-4 fw-bold text-white-50">Memphis clinched a spot in the play-in tournament with the victory, but the fight for seeding continues. The race for the No. 8 spot in the West -- and the safety net of having to win just one of two games to make the playoffs -- could come down to the regular seasons final day, when Memphis and Golden State meet. The good thing for the Grizzlies is they dont have to leave home until that matchup as they have games against Dallas and two against Sacramento before the finale.</p>
                                <br />
                                <br />
                                <!-- caruosel -->
                                <div class="col-12 d-none d-lg-block">
                                    <div class="row">
                                        <div id="carouselExampleCaptions" class="col-8 offset-2 carousel slide" data-bs-ride="carousel">



                                            <div class="carousel-inner">

                                                <div class="carousel-item active">
                                                    <div class="col-12">
                                                        <div class="row">

                                                            <div class="col-3">
                                                                <div class="card col-6 col-lg-2 mt-2 mb-2  bg-black" style="width: 10rem;">

                                                                    <img src="resources/watch_images/watch_brand/swatch.png" class="card-img-top card-img-top" />
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="card col-6 col-lg-2 mt-2 mb-2  bg-black" style="width: 10rem;">

                                                                    <img src="resources/watch_images/watch_brand/rado.png" class="card-img-top card-img-top" />

                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="card col-6 col-lg-2 mt-2 mb-2 bg-black " style="width: 10rem;">

                                                                    <img src="resources/watch_images/watch_brand/zenith.png" class="card-img-top card-img-top" />
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="card col-6 col-lg-2 mt-2 mb-2  bg-black" style="width: 10rem;">

                                                                    <img src="resources/watch_images/watch_brand/rado.png" class="card-img-top card-img-top" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="carousel-item">
                                                    <div class="col-12">
                                                        <div class="row">

                                                            <div class="col-3">
                                                                <div class="card col-6 col-lg-2 mt-2 mb-2  bg-black" style="width: 10rem;">

                                                                    <img src="resources/watch_images/watch_brand/swatch.png" class="card-img-top card-img-top" />
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="card col-6 col-lg-2 mt-2 mb-2  bg-black" style="width: 10rem;">

                                                                    <img src="resources/watch_images/watch_brand/rado.png" class="card-img-top card-img-top" />

                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="card col-6 col-lg-2 mt-2 mb-2 bg-black " style="width: 10rem;">

                                                                    <img src="resources/watch_images/watch_brand/zenith.png" class="card-img-top card-img-top" />
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="card col-6 col-lg-2 mt-2 mb-2  bg-black" style="width: 10rem;">

                                                                    <img src="resources/watch_images/watch_brand/rado.png" class="card-img-top card-img-top" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="carousel-item">
                                                    <div class="col-12">
                                                        <div class="row">

                                                            <div class="col-3">
                                                                <div class="card col-6 col-lg-2 mt-2 mb-2  bg-black" style="width: 10rem;">

                                                                    <img src="resources/watch_images/watch_brand/swatch.png" class="card-img-top card-img-top" />
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="card col-6 col-lg-2 mt-2 mb-2  bg-black" style="width: 10rem;">

                                                                    <img src="resources/watch_images/watch_brand/rado.png" class="card-img-top card-img-top" />

                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="card col-6 col-lg-2 mt-2 mb-2 bg-black " style="width: 10rem;">

                                                                    <img src="resources/watch_images/watch_brand/zenith.png" class="card-img-top card-img-top" />
                                                                </div>
                                                            </div>
                                                            <div class="col-3">
                                                                <div class="card col-6 col-lg-2 mt-2 mb-2  bg-black" style="width: 10rem;">

                                                                    <img src="resources/watch_images/watch_brand/rado.png" class="card-img-top card-img-top" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>


                                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                                <span class="" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                                <span class="" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>


                                <!-- caruosel -->


                            </div>
                        </div>

                    </div>
                </div>



                <!-- caruosel -->
                <div class="col-12 d-none d-lg-block">
                    <div class="row">
                        <div class="text-center ">
                            <h1 class="text-white-50 fw-bold">Most Popular Brand</h1>
                        </div>
                        <br />
                        <br />
                        <br />
                        <div id="carouselExampleCaptions" class="col-8 offset-2 carousel slide" data-bs-ride="carousel">



                            <div class="carousel-inner">

                                <div class="carousel-item active">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="card col-6 col-lg-2 mt-2 mb-2  bg-black  " style="width: 18rem;">

                                                    <img src="resources/watch_images/watch-1.png " class="card-img-top card-img-top " />

                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="card col-6 col-lg-2 mt-2 mb-2  bg-black" style="width: 18rem;">

                                                    <img src="resources/watch_images/watch-2.png" class="card-img-top card-img-top" />
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="card col-6 col-lg-2 mt-2 mb-2 bg-black " style="width: 18rem;">

                                                    <img src="resources/watch_images/watch-3.png" class="card-img-top card-img-top" />
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="card col-6 col-lg-2 mt-2 mb-2  bg-black" style="width: 18rem;">

                                                    <img src="resources/watch_images/watch-1.png" class="card-img-top card-img-top" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="carousel-item">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="card col-6 col-lg-2 mt-2 mb-2  bg-black" style="width: 18rem;">

                                                    <img src="resources/watch_images/watch-3.png" class="card-img-top card-img-top" />
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="card col-6 col-lg-2 mt-2 mb-2  bg-black" style="width: 18rem;">

                                                    <img src="resources/watch_images/watch-2.png" class="card-img-top card-img-top" />
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="card col-6 col-lg-2 mt-2 mb-2  bg-black" style="width: 18rem;">

                                                    <img src="resources/watch_images/watch-1.png" class="card-img-top card-img-top" />
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="card col-6 col-lg-2 mt-2 mb-2  bg-black" style="width: 18rem;">

                                                    <img src="resources/watch_images/watch-1.png" class="card-img-top card-img-top" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="card col-6 col-lg-2 mt-2 mb-2  bg-black" style="width: 18rem;">

                                                    <img src="resources/watch_images/watch-2.png" class="card-img-top card-img-top" />
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="card col-6 col-lg-2 mt-2 mb-2 bg-black " style="width: 18rem;">

                                                    <img src="resources/watch_images/watch-3.png" class="card-img-top card-img-top" />
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="card col-6 col-lg-2 mt-2 mb-2 bg-black " style="width: 18rem;">

                                                    <img src="resources/watch_images/watch-1.png" class="card-img-top card-img-top" />
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="card col-6 col-lg-2 mt-2 mb-2 bg-black " style="width: 18rem;">

                                                    <img src="resources/watch_images/watch-2.png" class="card-img-top card-img-top" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>


                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>


                <!-- caruosel -->

                <br>
                <br>




                <!-- who we are -->
                <section id="hero2" class="d-flex flex-column justify-content-center align-items-center">
                    <div class="container rounded" data-aos="fade-in">
                        <div class="section-title" data-aos="fade-up">

                            <h1>Who We Are<h1>......</h1>
                            </h1>
                            <h2>We do more than just sell watches, we believe in doing things differently. By putting our customers first and investing in our team, we guide and empower you to buy or sell with confidence.</h2>


                        </div>

                    </div>
                </section>
                <!-- who we are -->


                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>


                <?php
                $categoryrs = Database::search("SELECT * FROM `category`");
                $num = $categoryrs->num_rows;

                for ($y = 0; $y < $num; $y++) {

                    $d = $categoryrs->fetch_assoc();

                ?>

                    <!-- Category name -->
                    <div class="col-12 text-center">
                        <a href="#" class=" link2 text-white-50"><?php echo $d["name"]; ?></a>&nbsp;&nbsp;
                        <a href="#" class="l link3 text-white-50">See All&nbsp; &rarr;</a>
                    </div>
                    <br>
                    <br>
                    <br>
                    <!-- Category name -->
                    <!--  -->
                    <div class="col-12 mb-3">
                        <div class="row ">
                            <div class="col-12 col-lg-12">
                                <div class="row justify-content-center gap-1">

                                    <?php

                                    $productrs = Database::search("SELECT * FROM `product` WHERE `category_id`='" . $d["id"] . "' AND `status_id`= '1' ORDER BY `datetime_added` DESC LIMIT 3 OFFSET 0");

                                    $pn = $productrs->num_rows;

                                    for ($z = 0; $z < $pn; $z++) {

                                        $pd = $productrs->fetch_assoc();

                                    ?>
                                        <div class="col-6 col-lg-3 mt-2 mb-2 ">
                                            <div class="containerp ">
                                                <div class="cardp ">
                                                    <div class="card-head">
                                                        <?php

                                                        $imagers = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pd["id"] . "'");
                                                        $image = $imagers->fetch_assoc();

                                                        ?>
                                                        <img src="<?php echo $image["code"];  ?>" class="card-logo">
                                                        <img src="<?php echo $image["code"];  ?>" class="product-img">
                                                        <div class="product-detail ">
                                                            <h2><?php echo $pd["title"];  ?></h2>
                                                        </div>

                                                    </div>
                                                    <div class="card-body">
                                                        <div class="product-desc">
                                                            <span class="product-title">
                                                                <span class="badge">
                                                                    New
                                                                </span>
                                                            </span>
                                                            <span class="product-caption">
                                                                <?php echo $d["name"]; ?>
                                                            </span>
                                                            <span class="product-rating">
                                                                <i class="bi bi-star-fill"></i>
                                                                <i class="bi bi-star-fill"></i>
                                                                <i class="bi bi-star-fill"></i>
                                                                <i class="bi bi-star-fill"></i>
                                                                <i class="bi bi-star-half"></i>
                                                            </span>
                                                        </div>
                                                        <div class="product-properties">
                                                            <span class="product-size">
                                                                <?php

                                                                if ($pd["qty"] > 0) {

                                                                ?>

                                                                    <span class="card-text text-success fw-bold"><?php echo $pd["qty"];  ?> Items Available</span>
                                                                    
                                                                    <a href='<?php echo "singleProductView.php?id=" . ($pd["id"]) ?>' class="btn btn-success col-12 ">Buy Now</a>
                                                                    <a href="#" onclick="addToCart(<?php echo $pd['id']; ?>);" class="btn btn-danger col-12 mt-1">Add to Cart</a>

                                                                <?php



                                                                } else {
                                                                ?>

                                                                    <span class="card-text text-success fw-bold">00 Items Available</span>
                                                                <?php
                                                                }
                                                                $watchlist_rs = Database::search("SELECT *  FROM `watchlist` WHERE 
                                                `product_id`='" . $pd["id"] . "' AND `user_email`='" . $_SESSION["u"]["email"] . "'");
                                                                $watchlist_num = $watchlist_rs->num_rows;

                                                                if ($watchlist_num == 1) {
                                                                ?>
                                                                    <a class="btn btn-secondary col-12 mt-1" onclick="addToWatchlist(<?php echo $pd['id']; ?>);"><i class="bi bi-heart-fill fs-5 text-danger" id="heart<?php echo $pd['id'];  ?>"></i></a>

                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <a class="btn btn-secondary col-12 mt-1" onclick="addToWatchlist(<?php echo $pd['id']; ?>);"><i class="bi bi-heart-fill fs-5 text-white" id="heart<?php echo $pd['id'];  ?>"></i></a>

                                                                <?php
                                                                }
                                                                ?>


                                                            </span>
                                                            <span class="product-color">
                                                                <h6 class="card-text text-success fw-bold">Price<i class="bi bi-arrow-right fw-bold"></i></h6>
                                                                <ul class="ul-color">
                                                                    <li><a class="orange "></a></li>
                                                                    <li><a class="green"></a></li>
                                                                    <li><a class="yellow"></a></li>
                                                                </ul>
                                                            </span>
                                                            <span class="product-price fw-bold">
                                                                RS<b><?php echo $pd["price"];  ?></b>
                                                            </span>
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


                    <!--  -->
                <?php

                }

                ?>









                <!-- modal-- -->
                <div class="modal" tabindex="-1" id="productViewModal">
                    <div class="modal-dialog">


                        <div class="modal-page">
                            <div class="modal-main">
                                <div class="product-container">
                                    <h2 class="modal-h2">Beats</h2>
                                    <img class="modal-img" src="https://www.beatsbydre.com/content/dam/beats/web/pdp/beats-x/color_selector/_0003_rgb_MLYE2-RGB-thrqtr-detail_V2.png" alt="">
                                </div>
                                <div class="modal-card">
                                    <form class="form" action="#">
                                        <label for="number">Card Number
                                            <input class="input" type="text" id="number" placeholder="0000 - 0000 - 0000 - 0000">
                                        </label>
                                        <label class="forname" for="name">Name
                                            <input class="input" type="text" id="name" placeholder="Jhon Doe">
                                        </label>

                                        <button onclick="buy();" class="buttoncvc">BUY NOW
                                            <i class="fa fa-angle-right"></i>
                                        </button>

                                    </form>
                                </div>
                                <div class="price-container">
                                    <strong class="strong">149,95 €</strong>
                                    <small class="small">Inc. shipping & tax</small>
                                </div>
                            </div>


                        </div>
                    </div>
                    <!-- modal-- -->


                </div>

                <?php

                require "footer.php";

                ?>





            </div>
        </div>
        
        

        <script src="script.js"></script>


</body>

</html>