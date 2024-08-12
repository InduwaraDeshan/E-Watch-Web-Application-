<?php
require "connection.php";

?>

<!DOCTYPE html>
<html lang>

<head>

    <title>Darklook</title>

    <link rel="icon" href="resources/watch_images/icon/Screenshot_2022-10-27_104146-removebg-preview.png" />


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
</head>

<body style="background-color:white ;">
    <div class="container-fluid">
        <div class="row">

            <div class="col-12 col-lg-2 bg-light" style="height: 100vh;">
                <div class="row">

                    <div class="align-items-start bg-light col-12">
                        <div class="row g-1 text-center justify-content-center">







                            <div class="col-12 mt-5">
                                <h1 class="fs-1 fw-bold text-black-50 title01 ">DARKLOOK</h1>
                                <hr class="border border-1 border-white" />
                            </div>


                            <div class="nav flex-column nav-pills me-3 mt-3 ">
                                <nav class="nav flex-column">
                                    <a class="nav-link fs-5 shadow mt-4 ad" href="adminpanel.php"><i class="bi bi-display"></i>&nbsp;&nbsp;&nbsp;Dashboard</a>
                                    <a class="nav-link fs-5 shadow mt-4 ad" href="manageusers.php"><i class="bi bi-people"></i>&nbsp;&nbsp;&nbsp;Manage Users</a>
                                    <a class="nav-link fs-5 shadow mt-4 ad" href="manageProduct.php"><i class="bi bi-box-seam"></i>&nbsp;&nbsp;&nbsp;Manage Product</a>
                                    <a class="nav-link fs-5 shadow mt-4 ad" href="manageCategory.php"><i class="bi bi-box-seam"></i>&nbsp;&nbsp;&nbsp;Manage Category</a>
                                    <a class="nav-link fs-5 shadow mt-4 ad" href="admin_selling_history.php"><i class="bi bi-box-seam"></i>&nbsp;&nbsp;&nbsp;View Selling</a>

                                </nav>
                            </div>

                            


                        </div>
                    </div>

                </div>
            </div>

            <div class="col-12 col-lg-10  shadow">

                <div class=" col-12 bg-light text-center">
                    <h2 class="text-black-50 fw-bold">Manage All Products</h2>
                </div>

                <div class="col-12 ">

                    <!-- breadcum & -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="adminpanel.php">Admin Panel</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Product</li>
                        </ol>
                    </nav>
                    <!-- breadcum & -->
                </div>



                <!--  -->
                <div class="col-12 mt-3 mb-3">
                    <div class="row">
                        <div class="col-2 col-lg-1 bg-secondary  py-2 text-end">
                            <span class="fs-4 fw-bold text-white">#</span>
                        </div>
                        <div class="col-2 bg-light py-2 d-none d-lg-block">
                            <span class="fs-4 fw-bold ">Product Image</span>
                        </div>
                        <div class="col-4  col-lg-2 bg-secondary py-2 ">
                            <span class="fs-4 fw-bold  text-white ">Title</span>
                        </div>
                        <div class="col-4  col-lg-2 bg-light py-2 ">
                            <span class="fs-4 fw-bold ">Price</span>
                        </div>
                        <div class="col-2   bg-secondary py-2  d-none d-lg-block">
                            <span class="fs-4 fw-bold  text-white ">Quantity</span>
                        </div>
                        <div class="col-2  bg-light py-2  d-none d-lg-block ">
                            <span class="fs-4 fw-bold ">Registerd Datas</span>
                        </div>
                        <div class="col-2 col-lg-1 bg-light"></div>
                    </div>
                </div>
                <!--  -->

                <?php

                $page_no;
                if (isset($_GET["page"])) {
                    $page_no = $_GET["page"];
                } else {
                    $page_no = 1;
                }

                $product_rs =  Database::search("SELECT * FROM `product`");
                $product_num = $product_rs->num_rows;
                $result_per_page = 10;
                $number_of_page = ceil($product_num / $result_per_page);
                $page_first_result = ((int)$page_no - 1) * $result_per_page;

                $view_product_rs =      Database::search("SELECT * FROM `product` LIMIT  " . $result_per_page . " OFFSET " . $page_first_result);
                $view_result_num = $view_product_rs->num_rows;
                $c = 0;

                ?>

                <?php
                while ($product_data = $view_product_rs->fetch_assoc()) {
                    $c = $c + 1;

                ?>
                    <!--  -->
                    <div class="col-12 mb-3">
                        <div class="row">

                            <div class="col-2 col-lg-1 bg-secondary py-2 text-end">
                                <span class="fs-5 fw-bold text-white"><?php echo $product_data["id"]; ?></span>
                            </div>
                            <?php
                            $images_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product_data["id"] . "'");
                            $image_data = $images_rs->fetch_assoc();
                            ?>

                            <div class="col-2  bg-light py-2 d-none  d-lg-block" onclick="viewProductModal(<?php echo $product_data['id']; ?>);">
                                <img src="<?php echo $image_data["code"]; ?>" style="height: 40px; margin-left: 80px;" onclick="viewprodcutsinglemodal(<?php echo $product_data['id'];  ?>);" />
                            </div>

                            <div class="col-4 col-lg-2 bg-secondary py-2 ">
                                <span class="fs-5 fw-bold text-white"><?php echo $product_data["title"]  ?></span>
                            </div>

                            <div class="col-4 col-lg-2 bg-light py-2 d-lg-block">
                                <span class="fs-5 fw-bold ">Rs. <?php echo $product_data["price"]  ?>.00</span>
                            </div>

                            <div class="col-2  bg-secondary py-2 d-none d-lg-block ">
                                <span class="fs-5 fw-bold text-white"><?php echo $product_data["qty"]  ?></span>
                            </div>

                            <div class="col-2  bg-light py-2 d-none d-lg-block">
                                <span class="fs-6 fw-bold">
                                    <?php
                                    $row = $product_data["datetime_added"];
                                    $splited = explode(" ", $row);
                                    echo $splited["0"];
                                    ?>
                                </span>
                            </div>
                            <div class="col-2 col-lg-1 bg-white py-2  d-grid">

                                <?php
                                $s = $product_data["status_id"];
                                if ($s == "1") {
                                ?>
                                    <button class="btn btn-danger" onclick="block(<?php echo $product_data['id']; ?>);" id="block<?php $product_data['id']; ?>">Unblock</button>
                                <?php
                                } else {
                                ?>
                                    <button class="btn btn-danger" onclick="block(<?php echo $product_data['id']; ?>);" id="block<?php $product_data['id']; ?>">Block</button>
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                    <!--  -->

                    <!-- single product -->
                    <div class="modal" tabindex="-1" id="viewpModal<?php echo $product_data['id'] ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><?php echo $product_data["title"] ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <div class="text-center">

                                        <img src="<?php echo $image_data["code"] ?>  " class="img-fluid" style="height: 250px;" /><br />
                                        <span class="fs-5 fw-bold">Price</span>&nbsp;
                                        <span class="fs-5">Rs. <?php echo $product_data["price"] ?> .00</span> <br />
                                        <span class="fs-5 fw-bold">Quantity</span>&nbsp;
                                        <span class="fs-5"> <?php echo $product_data["qty"] ?></span> <br />
                                    </div>
                                </div>
                                <div class="modal-footer">

                                    <div class="col-12">
                                        <div class="row">


                                            <div class="offset-8 col-4 d-grid">
                                                <button class="btn btn-primary" onclick="closepModel();">Close</button>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- single product -->

                <?php

                }
                ?>
                <a href="<?php

                            if ($page_no >= $number_of_page) {
                                echo "#";
                            } else {
                                echo "?page=" . ($page_no + 1);
                            }

                            ?>">


                    &raquo;</a>
                <!-- pagination -->
                <div class="col-12 text-center">
                    <div class="pagination">
                        <a href="<?php if ($page_no <= 1) {
                                        echo "#";
                                    } else {
                                        echo "?page=" . ($page_no - 1);
                                    } ?>">&laquo;</a>

                        <?php
                        for ($page = 1; $page <= $number_of_page; $page++) {

                            if ($page == $page_no) {

                        ?>

                                <a href="<?php echo "?page=" . ($page); ?>" class="active"><?php echo $page ?></a>

                            <?php
                            } else {
                            ?>

                                <a href="<?php echo "?page=" . ($page); ?>"><?php echo $page ?></a>

                        <?php
                            }
                        }
                        ?>

                        <a href="<?php
                                    if ($page_no >= $number_of_page) {
                                        echo "#";
                                    } else {
                                        echo "?page=" . ($page_no + 1);
                                    }

                                    ?>">

                            &raquo;</a>
                    </div>
                </div>
                <!-- pagination -->




            </div>
        </div>
    </div>

    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>

</body>

</html>