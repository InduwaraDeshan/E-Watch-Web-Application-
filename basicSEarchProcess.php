<?php

require "connection.php";

session_start();

$search_txt = $_POST["t"];
$search_select = $_POST["s"];

$query = "SELECT * FROM `product`";

if (!empty($search_txt) && $search_select == 0) {

    $query .= " WHERE `title` LIKE '%" . $search_txt . "%'";
} else if (empty($search_txt) && $search_select != 0) {

    $query .= " WHERE `category_id`='" . $search_select . "'";
} else if (!empty($search_txt) && $search_select != 0) {

    $query .= "WHERE `title` LIKE'%" . $search_txt . "%' AND `category_id`='" . $search_select . "'";
}

?>

<div class="row">
    <div class="offset-lg-2 col-12 col-lg-10 text-center">

        <div class="row">

            <?php
            if ($_POST["page"] != 0) {
                $pageno = $_POST["page"];
            } else {
                $pageno = 1;
            }

            $product_rs = Database::search($query);
            $product_num = $product_rs->num_rows;

            $results_per_page = 6;
            $number_of_pages = ceil($product_num / $results_per_page);
            $viewed_results = ((int)$pageno - 1) * $results_per_page;
            $query .= " LIMIT " . $results_per_page . " OFFSET " . $viewed_results;

            $results_rs = Database::search($query);
            $results_num = $results_rs->num_rows;

            while ($product_data = $results_rs->fetch_assoc()) {
            ?>





                <!-- card -->
                <div class="card mb-3 mt-3 me-5 col-12 col-lg-5  bc2  " style="border-radius: 20px; box-shadow: -11px 11px 1px rgba(255, 255, 255, 0.3);">
                    <div class="row ">
                        <div class="col-md-4  ">

                            <?php

                            $product_img_rs = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $product_data["id"] . "'");
                            $product_img_data = $product_img_rs->fetch_assoc();

                            $categoryrs = Database::search("SELECT * FROM `category` WHERE `id` IN (SELECT `category_id` FROM `product` WHERE `id`='" . $product_data["id"] . "')");

                            $category_data = $categoryrs->fetch_assoc();

                            ?>


                            <section id="product" class="product">
                                <div class="container" data-aos="fade-up">
                                    <div class="col-12">
                                        <div class="member" data-aos="zoom-in" data-aos-delay="100">
                                            <img src="<?php echo $product_img_data["code"] ?>" class="img-fluid rounded-start " alt="...">
                                            <div class="member-info">
                                                <div class="social">
                                                    <a href="<?php echo "singleProductView.php?id=" . ($product_data["id"]) ?>"><i class="bi bi-bag-plus-fill text-bg-light"></i></a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                        </div>
                        <div class="col-md-8 ">
                            <div class="card-body bg-ligh shadow">
                                <span class="badge">New</span>
                                <h5 class="card-title text-bg-secondary fs-6"><?php echo $category_data["name"] ?></h5>
                                <h5 class="card-title fw-bold"><?php echo $product_data["title"] ?></h5>
                                <span class="card-text text-primary fw-bold">RS .<?php echo $product_data["price"] ?>. 00</span>
                                <br />
                                <span class="card-text text-success fw-bold fs"><?php echo $product_data["qty"] ?> Items Available</span>
                                <br>
                                <span class="product-rating " style="color: #11e95b;">
                                    <i class="bi bi-star-fill "></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-half"></i>
                                </span>
                                <div class="row">
                                    <div class="col-12">

                                        <div class="row g-1">
                                            <div class="col-12 col-lg-12 d-grid">
                                                <a href="<?php echo "singleProductView.php?id=" . ($product_data["id"]) ?>" class="btn btn-outline-success fs-5 " style="border-radius:25px ;border-width: 2px;">Buy Now</a>
                                            </div>
                                            <div class="col-6 col-lg-6 d-grid">
                                                <a onclick="addToCart(<?php echo $product_data['id']; ?>);" class="btn btn-outline-danger fs-5 " style="border-radius:25px ;border-width: 2px;">Add Card</a>
                                            </div>
                                            <?php

                                            $watchlist_rs = Database::search("SELECT *  FROM `watchlist` WHERE  `product_id`='" . $product_data["id"] . "' AND `user_email`='" . $_SESSION["u"]["email"] . "'");
                                            $watchlist_num = $watchlist_rs->num_rows;

                                            if ($watchlist_num == 1) {
                                            ?>
                                                <div class="col-6 col-lg-6 d-grid">
                                                    <a class="btn btn-outline-secondary " style="border-radius:25px ;border-width: 2px;" onclick="addToWatchlist(<?php echo $product_data['id']; ?>);"><i class="bi bi-heart-fill fs-5 text-danger" id="heart<?php echo $product_data['id'];  ?>"></i></a>
                                                </div>
                                            <?php
                                            } else {
                                            ?>
                                                <div class="col-6 col-lg-6 d-grid">
                                                    <a class="btn btn-outline-secondary" style="border-radius:25px ;border-width: 2px;" onclick="addToWatchlist(<?php echo $product_data['id']; ?>);"><i class="bi bi-heart-fill fs-5 text-bg-primary" id="heart<?php echo $product_data['id'];  ?>"></i></a>
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
                </div>
                <!-- card -->


            <?php
            }
            ?>
        </div>

    </div>


    <!-- pagination -->
    <div class="offset-2 offset-lg-5 col-8 col-lg-6 text-center  text-white mt-4">

        <div class="pagination">

            <a <?php

                if ($pageno <= 1) {
                    echo "href=#";
                } else {
                ?> onclick="basicSearch('<?php echo ($pageno - 1) ?>');" <?php
                                                                        }


                                                                            ?>>&laquo;</a>
            <?php
            for ($page = 1; $page <= $number_of_pages; $page++) {

                if ($page == $pageno) {
            ?>
                    <a onclick="basicSearch('<?php echo ($page) ?>');" class="active"> <?php echo $page;   ?></a>

                <?php


                } else {
                ?>
                    <a onclick="basicSearch('<?php echo ($page) ?>');"><?php echo $page;   ?></a>

            <?php
                }
            }

            ?>

            <a <?php

                if ($pageno >= $number_of_pages) {
                    echo "href=#";
                } else {
                ?> onclick="basicSearch('<?php echo ($pageno + 1) ?>');" <?php
                                                                        }


                                                                            ?>>&raquo;</a>

        </div>
    </div>
    <br>
    <br>
    <br>
    <!-- pagination -->
</div>