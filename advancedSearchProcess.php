<?php

require "connection.php";
session_start();

$search_txt = $_POST["s"];
$category = $_POST["c"];
$brand = $_POST["b"];
$model = $_POST["m"];
$condition = $_POST["c1"];
$color = $_POST["c2"];
$price_from = $_POST["p1"];
$price_to = $_POST["p2"];
$sort = $_POST["s1"];

$query = "SELECT * FROM `product`";
$status = 0;

if ($sort == 0) {

    if (!empty($search_txt)) {

        $query .= " WHERE `title` LIKE '%" . $search_txt . "%'";
        $status = 1;
    }

    if ($category != 0 && $status == 0) {

        $query .= " WHERE `category_id`='" . $category . "'";
        $status = 1;
    } else if ($category != 0 && $status == 1) {

        $query .= " AND `category_id`='" . $category . "'";
    }

    $pid = 0;

    if ($brand != 0 && $model == 0) {

        $modelHasBrand_rs = Database::search("SELECT * FROM `model_has_brand` WHERE 
        `brand_id`='" . $brand . "'");

        $n = $modelHasBrand_rs->num_rows;
        for ($x = 0; $x < $n; $x++) {
            $d = $modelHasBrand_rs->fetch_assoc();
            $pid = $d["id"];
        }

        if ($status == 0) {
            $query .= " WHERE `model_has_brand_id`='" . $pid . "'";
            $status = 1;
        } else if ($status == 1) {
            $query .= " AND `model_has_brand_id`='" . $pid . "'";
        }
    }

    if ($brand == 0 && $model != 0) {

        $modelHasBrand_rs = Database::search("SELECT * FROM `model_has_brand` WHERE 
        `model_id`='" . $model . "'");

        $n = $modelHasBrand_rs->num_rows;
        for ($x = 0; $x < $n; $x++) {
            $d = $modelHasBrand_rs->fetch_assoc();
            $pid = $d["id"];
        }

        if ($status == 0) {
            $query .= " WHERE `model_has_brand_id`='" . $pid . "'";
            $status = 1;
        } else if ($status == 1) {
            $query .= " AND `model_has_brand_id`='" . $pid . "'";
        }
    }

    if ($brand != 0 && $model != 0) {

        $modelHasBrand_rs = Database::search("SELECT * FROM `model_has_brand` WHERE 
         `model_id`='" . $model . "' AND `brand_id`='" . $brand . "'");

        $n = $modelHasBrand_rs->num_rows;
        for ($x = 0; $x < $n; $x++) {
            $d = $modelHasBrand_rs->fetch_assoc();
            $pid = $d["id"];
        }

        if ($status == 0) {
            $query .= " WHERE `model_has_brand_id`='" . $pid . "'";
            $status = 1;
        } else if ($status == 1) {
            $query .= " AND `model_has_brand_id`='" . $pid . "'";
        }
    }

    if ($condition != "0" && $status == 0) {
        $query .=  "WHERE `condition_id`='" . $condition . "'";
        $status = 1;
    } else if ($condition != "0" && $status == 1) {

        $query .= "AND `condition_id`='" . $condition . "'";
    }


    if ($color != "0" && $status == 0) {
        $query .=  "WHERE `color_id`='" . $color . "'";
        $status = 1;
    } else if ($color != "0" && $status == 1) {

        $query .= "AND `color_id`='" . $color . "'";
    }

    if (!empty($price_from) && empty($price_to)) {

        if ($status == 0) {
            $query .= "WHERE `price` >= '" . $price_from . "'";
            $status = 1;
        } else if ($status == 1) {
            $query .= "AND `price` >= '" . $price_from . "'";
        }
    } else if (empty($price_from) && !empty($price_to)) {

        if ($status == 0) {
            $query .= "WHERE `price` <= '" . $price_to . "'";
            $status = 1;
        } else if ($status == 1) {
            $query .= "AND `price` <= '" . $price_to . "'";
        }
    } else if (!empty($price_from) && !empty($price_to)) {

        if ($status == 0) {
            $query .= "WHERE `price` BETWEEN '" . $price_from . "' AND '" . $price_to . "'";
            $status = 1;
        } else if ($status == 1) {
            $query .= "AND `price` BETWEEN '" . $price_from . "' AND '" . $price_to . "'";
        }
    }
} else if ($sort == 1) {

    if (!empty($search_txt)) {

        $query .= " WHERE `title` LIKE '%" . $search_txt . "%' ORDER BY `price` DESC";
        $status = 1;
    }
} else if ($sort == 2) {
    if (!empty($search_txt)) {

        $query .= " WHERE `title` LIKE '%" . $search_txt . "%' ORDER BY `price` ASC";
        $status = 1;
    }
} else if ($sort == 3) {
    if (!empty($search_txt)) {
        $query .= " WHERE `title` LIKE '%" . $search_txt . "%' ORDER BY `qty` DESC";
        $status = 1;
    }
} else if ($sort == 4) {
    if (!empty($search_txt)) {
        $query .= " WHERE `title` LIKE '%" . $search_txt . "%' ORDER BY `qty` ASC";
        $status = 1;
    }
}

$product = Database::search($query);
$n = $product->num_rows;


?>



<?php
if ($_POST["page"] != "0") {

    $pageno = $_POST["page"];
} else {

    $pageno = 1;
}
$product_rs = Database::search($query);
$product_num = $product->num_rows;

$results_per_page = 6;
$number_of_pages = ceil($product_num / $results_per_page);
$viewed_results_count = ((int)$pageno - 1) * $results_per_page;
$query .= " LIMIT " . $results_per_page . " OFFSET " . $viewed_results_count . "";
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

                <img src="<?php echo $product_img_data["code"] ?>" class="img-fluid rounded-start " alt="...">
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
                                    <a href="<?php echo "singleProductView.php?id=" . ($product_data["id"]) ?>" class="btn btn-outline-success  " style="border-radius:25px ;border-width: 2px;">Buy Now</a>
                                </div>
                                <div class="col-6 col-lg-6 d-grid">
                                    <a onclick="addToCart(<?php echo $product_data['id']; ?>);" class="btn btn-outline-danger " style="border-radius:25px ;border-width: 2px;">Add Card</a>
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
<!-- pagination -->
<div class=" offset-lg-1 col-12 col-lg-4 mb-3 text-center text-white-50 mt-4 ">

    <div class="pagination">

        <a <?php

            if ($pageno <= 1) {
                echo "href=#";
            } else {
            ?> onclick="advancedSearch('<?php echo ($pageno - 1) ?>');" <?php
                                                                }





                                                                    ?>>&laquo;</a>
        <?php
        for ($page = 1; $page <= $number_of_pages; $page++) {

            if ($page == $pageno) {
        ?>
                <a onclick="advancedSearch('<?php echo ($page) ?>');" class="active"> <?php echo $page;   ?></a>

            <?php


            } else {
            ?>
                <a onclick="advancedSearch('<?php echo ($page) ?>');"><?php echo $page;   ?></a>

        <?php
            }
        }

        ?>




        <a <?php

            if ($pageno >= $number_of_pages) {
                echo "href=#";
            } else {
            ?> onclick="advancedSearch('<?php echo ($pageno + 1) ?>');" <?php
                                                                }





                                                                    ?>>&raquo;</a>

    </div>
</div>
<!-- pagination -->