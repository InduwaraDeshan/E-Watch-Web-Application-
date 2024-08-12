<?php
require "connection.php";
session_start();

?>

<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Darklook</title>

    <link rel="icon" href="resources/watch_images/icon/Screenshot_2022-10-27_104146-removebg-preview.png" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">

</head>

<body class="bg-light">

    <div class="container-fluid">
        <div class="row">

            <div class="col-12 col-lg-2">
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

                                </nav>
                            </div>




                        </div>
                    </div>

                </div>
            </div>


            <!--  -->

            <div class="col-12 col-lg-10 mt-2 mb-4 shadow bg-light">
                <div class="row">
                    <div class="col-12  d-flex">
                        <div class="card flex-fill mb-3">
                            <div class="card-header">
                                <h5 class="card-title text-center fw-bold">View All Selling</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-center">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="text-center fs-5">Invoice ID</th>
                                                <th class="text-center  fs-5">Product</th>
                                                <th class="text-center fs-5">Buyer</th>
                                                <th class="text-center fs-5">Amount</th>
                                                <th class="text-center fs-5">Quantity</th>
                                                <th class="text-center fs-5">Delivery State</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $page_no;

                                            if (isset($_GET["page"])) {
                                                $page_no = $_GET["page"];
                                            } else {
                                                $page_no = 1;
                                            }

                                            $invoice_rs = Database::search("SELECT * FROM `invoice`");
                                            $invoice_num = $invoice_rs->num_rows;

                                            $results_per_page = 10;
                                            $number_of_pages = ceil($invoice_num / $results_per_page);

                                            $result_count = ((int)$page_no - 1) * $results_per_page;




                                            $user_email = Database::search("SELECT * FROM `product`");
                                            $user_data = $user_email->fetch_assoc();
                                            $uemail = $user_data["user_email"];

                                            $invoice_rs = Database::search("SELECT `invoice`.`id`,`product`.`title`,`user`.`fname`,`user`.`lname`,
                               `invoice`.`total`,`invoice`.`qty`, `invoice`.`status` FROM `invoice` 
                               INNER JOIN `user` ON `invoice`.`user_email` = `user`.`email` 
                               INNER JOIN `product` ON `invoice`.`product_id` = `product`.`id` 
                               LIMIT " . $results_per_page . " OFFSET " . $result_count . "");


                                            while ($invoice_data = $invoice_rs->fetch_assoc()) {

                                            ?>
                                                <tr>
                                                    <td class="text-black fs-5 text-center"><?php echo $invoice_data["id"]; ?></td>
                                                    <td class="  text-black fs-5 text-center"><?php echo $invoice_data["title"]; ?></td>
                                                    <td class=" text-black fs-5 text-center "><?php echo $invoice_data["fname"] . " " . $invoice_data["lname"]; ?></td>
                                                    <td class=" text-black fs-5 text-center">Rs. <?php echo $invoice_data["total"]; ?> .00</td>
                                                    <td class=" text-black fs-5 text-center">
                                                        <div><?php echo $invoice_data["qty"]; ?></div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="col-10 bg-white d-grid">

                                                            <?php

                                                            $x = $invoice_data["status"];

                                                            if ($x == 0) {
                                                            ?>
                                                                <button class="btn btn-success mb-2 mt-2 fw-bold" onclick="changeInvoiceId(<?php echo $invoice_data['id']; ?>);" id="btn<?php echo $invoice_data['id']; ?>" disabled>Confirm Order</button>
                                                            <?php
                                                            } else if ($x == 1) {
                                                            ?>
                                                                <button class="btn btn-warning mb-2 mt-2 fw-bold" onclick="changeInvoiceId(<?php echo $invoice_data['id']; ?>);" id="btn<?php echo $invoice_data['id']; ?>" disabled>Packing</button>
                                                            <?php
                                                            } else if ($x == 2) {
                                                            ?>
                                                                <button class="btn btn-info mb-2 mt-2 fw-bold" onclick="changeInvoiceId(<?php echo $invoice_data['id']; ?>);" id="btn<?php echo $invoice_data['id']; ?>" disabled>Dispatch</button>
                                                            <?php
                                                            } else if ($x == 3) {
                                                            ?>
                                                                <button class="btn btn-primary mb-2 mt-2 fw-bold" onclick="changeInvoiceId(<?php echo $invoice_data['id']; ?>);" id="btn<?php echo $invoice_data['id']; ?>" disabled>Shipping</button>
                                                            <?php
                                                            } else if ($x == 4) {
                                                            ?>
                                                                <button class="btn btn-danger mb-2 mt-2 fw-bold" onclick="changeInvoiceId(<?php echo $invoice_data['id']; ?>);" id="btn<?php echo $invoice_data['id']; ?>" disabled>
                                                                    Delivered</button>
                                                            <?php
                                                            }

                                                            ?>





                                                        </div>

                                                    </td>
                                                </tr>
                                            <?php

                                            }

                                            ?>





                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <div class="offset-lg-4 col-12 col-lg-4 text-center mt-3 mb-3 d-flex justify-content-center">
                <div class="row">
                    <div class="pagination">
                        <a href="<?php if ($page_no <= 1) {
                                        echo "#";
                                    } else {
                                        echo "?page=" . ($page_no - 1);
                                    } ?>">&laquo;</a>

                        <?php
                        for ($page = 1; $page <= $number_of_pages; $page++) {
                            if ($page == $page_no) {
                        ?>
                                <a href="<?php echo "?page=" . ($page); ?>" class="active"><?php echo $page; ?></a>
                            <?php
                            } else {
                            ?>
                                <a href="<?php echo "?page=" . ($page); ?>"><?php echo $page; ?></a>
                        <?php
                            }
                        }
                        ?>

                        <a href="<?php if ($page_no >= $number_of_pages) {
                                        echo "#";
                                    } else {
                                        echo "?page=" . ($page_no + 1);
                                    } ?>">&raquo;</a>
                    </div>
                </div>
            </div>


        </div>
    </div>

    </div>
    </div>

    <script src="script.js"></script>
</body>

</html>