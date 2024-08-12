<?php
session_start();
require "connection.php";

if (isset($_SESSION["a"])) {

?>

    <!DOCTYPE html>

    <html>

    <head>

        <title>Darklook</title>

        <link rel="icon" href="resources/watch_images/icon/Screenshot_2022-10-27_104146-removebg-preview.png" />

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css" />


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
        <link rel="stylesheet" href="clock.css" />

    </head>

    <body style="background-color:white ;">

        <div class="container-fluid">
            <div class="row">
                <?php
                $view_user_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $_SESSION["a"]["email"] . "' ");
                $view_result_data = $view_user_rs->fetch_assoc();
                ?>
                <div class="col-12 col-lg-2">
                    <div class="row">

                        <?php
                        require "adminpanel_side.php";

                        ?>

                    </div>
                </div>

                <div class="col-12 col-lg-10  admin_box shadow">
                    <div class="row">


                        <?php

                        require "admin_header.php";

                        ?>



                        <div class="col-12 ">
                            <hr />
                        </div>
                        <div class="col-12">
                            <div class="row align-items-center ">

                                <div class="col-12 text-white fw-bold mb-3 mt-2  bg-light">
                                    <h2 class="fw-bold text-black">Welcome Admin !</h2>
                                    <h5 class=" text-black">Dashboard</h5>
                                </div>



                            </div>
                        </div>





                        <div class="col-12">
                            <hr />
                        </div>

                        <div class="col-12">
                            <div class="row g-1">

                                <div class="col-xl-4 col-sm-6 col-12 d-flex box_responsive">
                                    <div class="card bg-one w-100">
                                        <div class="card-body">
                                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                                <div class="db-icon fs-3">
                                                    <img src="resources/admin_icon/wallet.png">
                                                </div>
                                                <div class="db-info">
                                                    <br />
                                                    <span class="fs-4 fw-bold">Daily Ernings</span>
                                                    <br />

                                                    <?php

                                                    $today = date("Y-m-d");
                                                    $this_month = date("m");
                                                    $this_year = date("y");

                                                    $a = "0";
                                                    $b = "0";
                                                    $c = "0";
                                                    $d = "0";
                                                    $e = "0";

                                                    $invoice_rs = Database::search("SELECT * FROM `invoice`");
                                                    $invoice_num = $invoice_rs->num_rows;

                                                    for ($x = 0; $x < $invoice_num; $x++) {

                                                        $invoice_data = $invoice_rs->fetch_assoc();

                                                        $e = $e + $invoice_data["qty"];

                                                        $f = $invoice_data["date"];
                                                        $split_date = explode(" ", $f);
                                                        $pdate = $split_date[0];

                                                        if ($pdate == $today) {
                                                            $a = $a + $invoice_data["total"];
                                                            $c = $c + $invoice_data["qty"];
                                                        }

                                                        $split_result = explode("-", $pdate);
                                                        $pyear = $split_result[0];
                                                        $pmonth = $split_result[1];

                                                        if ($pyear == $this_year) {
                                                            if ($pmonth == $this_month) {
                                                                $b = $b + $invoice_data["total"];
                                                                $d = $d + $invoice_data["qty"];
                                                            }
                                                        }
                                                    }


                                                    ?>

                                                    <span class="fs-5">Rs. <?php echo $a ?>.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-xl-4 col-sm-6 col-12 d-flex box_responsive">
                                    <div class="card bg-two w-100 ">
                                        <div class="card-body">
                                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                                <div class="db-icon fs-3">
                                                    <img src="resources/admin_icon/selling.png">
                                                </div>
                                                <div class="db-info">
                                                    <br />
                                                    <span class="fs-4 fw-bold">Monthly Earnings</span>
                                                    <br />
                                                    <span class="fs-5">Rs. <?php echo $b ?>.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-xl-4 col-sm-6 col-12 d-flex box_responsive">
                                    <div class="card bg-three w-100">
                                        <div class="card-body">
                                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                                <div class="db-icon fs-3">
                                                    <img src="resources/admin_icon/sell (1).png">
                                                </div>
                                                <div class="db-info">
                                                    <br />
                                                    <span class="fs-4 fw-bold">Today Sellings</span>
                                                    <br />
                                                    <span class="fs-5"><?php echo $c ?> Items</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-sm-6 col-12 d-flex box_responsive">
                                    <div class="card bg-four w-100">
                                        <div class="card-body">
                                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                                <div class="db-icon fs-3">
                                                    <img src="resources/admin_icon/sell.png">
                                                </div>
                                                <div class="db-info">
                                                    <br />
                                                    <span class="fs-4 fw-bold">Monthly Sellings</span>
                                                    <br />
                                                    <span class="fs-5"><?php echo $d ?> Items</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-xl-4 col-sm-6 col-12 d-flex box_responsive">
                                    <div class="card bg-five w-100">
                                        <div class="card-body">
                                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                                <div class="db-icon fs-3">
                                                    <img src="resources/admin_icon/profit (1).png">
                                                </div>
                                                <div class="db-info">
                                                    <br />
                                                    <span class="fs-4 fw-bold">Total Sellings</span>
                                                    <br />
                                                    <span class="fs-5"><?php echo $e ?> Items</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-xl-4 col-sm-6 col-12 d-flex box_responsive">
                                    <div class="card bg-six w-100">
                                        <div class="card-body">
                                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                                <div class="db-icon fs-3">
                                                    <img src="resources/admin_icon/user-engagement.png">
                                                </div>
                                                <div class="db-info">
                                                    <br />
                                                    <span class="fs-4 fw-bold">Total Engagements</span>
                                                    <br />

                                                    <?php
                                                    $user_rs = Database::search("SELECT * FROM `user`");
                                                    $user_num = $user_rs->num_rows;
                                                    ?>

                                                    <span class="fs-5"><?php echo $user_num ?> Members</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                            </div>
                        </div>

                        <div class="col-12">
                            <hr />
                        </div>


                        <div class="col-12 bg-secondary">
                            <div class="row">

                                <div class="col-12 col-lg-2 text-center mt-3 mb-3">
                                    <label class="form-label fs-4 fw-bold text-white">Total Active Time</label>
                                </div>

                                <?php

                                $start_date = new DateTime("2022-07-01 00:00:00");

                                $tdate = new DateTime();
                                $tz = new DateTimeZone("Asia/Colombo");
                                $tdate->setTimezone($tz);

                                $end_date = new DateTime($tdate->format("Y-m-d H:i:s"));

                                $difference = $end_date->diff($start_date);

                                ?>

                                <div class="col-12 col-lg-10 text-end mt-3 mb-3">
                                    <label class="form-label fs-4 fw-bold text-white">
                                        <?php

                                        echo $difference->format('%Y') . " Years " . $difference->format('%m') . " Months " .
                                            $difference->format('%d') . " Days " . $difference->format('%H') . " Hours " .
                                            $difference->format('%i') . " Minutes " . $difference->format('%s') . " Seconds ";

                                        ?>
                                    </label>
                                </div>

                            </div>
                        </div>

                        <div class="col-12">
                            <hr />
                        </div>


                        <div class="col-12 mt-2 mb-4 shadow bg-light">
                            <div class="row">
                                <div class="col-12  d-flex">
                                    <div class="card flex-fill mb-3">
                                        <div class="card-header">
                                            <h5 class="card-title">Today Mostly Sold Items & famouse Seller</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-center">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th class="fs-5">Product ID</th>
                                                            <th class="fs-5">Product Name</th>
                                                            <th class="text-center fs-5">Product Quantity</th>
                                                            <th class="text-center fs-5">Seller Name</th>
                                                            <th class="text-right fs-5">Added Time</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php
                                                        $most_seller_rs = Database::search("SELECT `product_id`, COUNT(`product_id`) AS `value_occurrence` 
                                                         FROM `invoice` WHERE `date` LIKE '%" . $today . "%' GROUP BY `product_id` ORDER BY `value_occurrence` DESC LIMIT 5");
                                                        $most_seller_num = $most_seller_rs->num_rows;

                                                        if ($most_seller_num > 0) {


                                                            for ($i = 0; $i < $most_seller_num; $i++) {
                                                                $most_seller_data = $most_seller_rs->fetch_assoc();

                                                                $products_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $most_seller_data["product_id"] . "'");
                                                                $product_Details = $products_rs->fetch_assoc();

                                                                $qty_rs = Database::search("SELECT SUM(`qty`) AS `total` FROM `invoice` WHERE `product_id`='" . $most_seller_data["product_id"] . "'
                                                            AND `date` LIKE '%" . $today . "%'");
                                                                $qty_total = $qty_rs->fetch_assoc();

                                                                $user_result = Database::search("SELECT * FROM `user` WHERE `email`='" . $product_Details["user_email"] . "'");
                                                                $user = $user_result->fetch_assoc();

                                                        ?>
                                                                <tr>
                                                                    <td class="text-nowrap">
                                                                        <div><?php echo $most_seller_data["product_id"] ?></div>
                                                                    </td>
                                                                    <td class="text-nowrap"><?php echo $product_Details["title"] ?></td>
                                                                    <td class="text-center"><?php echo $qty_total["total"]; ?> Items</td>
                                                                    <td class="text-center"><?php echo $user["fname"] . " " . $user["lname"]; ?></td>
                                                                    <td class="text-right">
                                                                        <div><?php echo $product_Details["datetime_added"] ?></div>
                                                                    </td>
                                                                </tr>
                                                        <?php
                                                            }
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

                        <div class="offset-1 col-10 col-lg-4 mt-3 mb-3 rounded bg-light box_responsive shadow">
                            <div class="row g-1">



                                <?php



                                $freq_rs = Database::search("SELECT `product_id`, COUNT(`product_id`) AS `value_occurrence` 
                            FROM `invoice` WHERE `date` LIKE '%" . $today . "%' GROUP BY `product_id` ORDER BY `value_occurrence` DESC LIMIT 1");

                                $freq_num = $freq_rs->num_rows;

                                if ($freq_num > 0) {

                                    $freq_data = $freq_rs->fetch_assoc();

                                    $proimg = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $freq_data["product_id"] . "'");
                                    $code = $proimg->fetch_assoc();

                                    $product_Details = Database::search("SELECT * FROM `product` WHERE `id`='" . $freq_data["product_id"] . "'");
                                    $pdetails = $product_Details->fetch_assoc();

                                    $qtyrs = Database::search("SELECT SUM(`qty`) AS `total` FROM `invoice` WHERE `product_id`='" . $freq_data["product_id"] . "'
                                AND `date` LIKE '%" . $today . "%'");
                                    $qtytotal = $qtyrs->fetch_assoc();

                                ?>
                                    <div class="col-12 text-center">
                                        <label class="form-label fs-4 fw-bold">Mostly Sold Item</label>
                                    </div>

                                    <div class="col-12 text-center">
                                        <img src="<?php echo $code["code"]; ?>" class="img-fluid rounded-top  " style="height: 250px; " />
                                        <hr />
                                    </div>

                                    <div class="col-12 text-center">
                                        <span class="fs-5 fw-bold"><?php echo $pdetails["title"]; ?></span>
                                        <br />
                                        <span class="fs-6"><?php echo $qtytotal["total"]; ?> Items</span>
                                        <br />
                                        <span class="fs-6">Rs. <?php echo $pdetails["price"]; ?>.00</span>
                                        <br />
                                    </div>





                            </div>
                        </div>

                        <div class="offset-1 col-10 col-lg-4 mt-3 mb-3 rounded bg-light box_responsive shadow ">
                            <div class="row g-1">

                                <div class="col-12 text-center">
                                    <label class="form-label fs-4 fw-bold">Most famouse Seller</label>
                                </div>

                                <?php

                                    $profileimg = Database::search("SELECT * FROM `profile_image` 
                            WHERE `user_email`='" . $pdetails["user_email"] . "'");
                                    $pcode = $profileimg->fetch_assoc();

                                    $userDetails = Database::search("SELECT * FROM `user` 
                            WHERE `email`='" . $pdetails["user_email"] . "'");
                                    $udetails = $userDetails->fetch_assoc();

                                ?>

                                <div class="col-12 text-center">
                                    <img src="<?php echo $pcode["path"]; ?>" class="img-fluid rounded-top" style="height: 250px;" />
                                    <hr />
                                </div>

                                <div class="col-12 text-center">
                                    <span class="fs-5 fw-bold">
                                        <?php echo $udetails["fname"] . " " . $udetails["lname"] ?>
                                    </span>
                                    <br />
                                    <span class="fs-6"><?php echo $pdetails["user_email"]; ?></span>
                                    <br />
                                    <span class="fs-6"><?php echo $udetails["mobile"]; ?></span>
                                    <br />
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

        <script src="script.js"></script>

    </body>

    </html>

<?php
} else {
?>

    <script>
        alert("Please Sign In First");
        window.location = "adminSignin.php";
    </script>

<?php
}
?>