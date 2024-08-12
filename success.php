<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Darklook| Invoice</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="resources/watch_images/icon/Screenshot_2022-10-27_104146-removebg-preview.png" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap");

        .success-container {
            width: 50%;
            position: absolute;
            top: 30%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #bdc3c7;
            font-weight: bold;
            font-family: "Poppins", sans-serif;
        }
    </style>
</head>

<body class="bc">
    <div class="container-fluid ">
        <div class="row  ">
            <div class="col-10 offset-1">
                <div class="row   ">

                    <?php

                    if (isset($_GET["pid"]) && isset($_GET["qty"]) && !empty($_GET["pid"])) {

                        $qty = $_GET["qty"];
                        $pid = $_GET["pid"];

                        $_SESSION["p"] = $pid;

                    ?>




                        <div class="text-center mt-5 ">
                            <h3 class="text-white-50  mt-5">Your Transaction has been Successfully Completed</h3>

                        </div>
                        <div class="text-center mt-5">
                            <img src="resources/success.gif">
                        </div>
                        <div class="text-center  mt-3">
                            <button  class="btn btn-info mt-5 text-black-50 fs-3" onclick="buynow(<?php echo  $qty  ?>);">Create Your Invoice</button>
                        </div>

                    <?php
                    } else {
                    ?>









                        <div class="text-center  mt-5">
                            <h3 class="text-white-50">Your Transaction has been Successfully Completed</h3>

                        </div>

                        <div class="text-center mt-5">
                            <img src="resources/success.gif">
                        </div>

                        <div class="text-center  mt-3">
                            <button class="btn btn-info mt-5 text-black-50 fs-3" onclick="allProductbuynow();">Create Your Invoice</button>

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