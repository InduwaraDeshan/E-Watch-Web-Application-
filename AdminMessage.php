<?php


require "connection.php";




$email = $_GET["email"];



?>

<!DOCTYPE html>

<html>

<head>

    <title>Darklook</title>

    <link rel="icon" href="resources/watch_images/icon/Screenshot_2022-10-27_104146-removebg-preview.png" />

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />


    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />

</head>

<body onload="refresher('<?php echo $email ?>');">

    <div class="container-fluid">
        <div class="row">





            <div class="col-12">
                <hr>
            </div>

            <div class="col-12 col-lg-2">
                <div class="row">

                    <?php
                    require "adminpanel_side.php";

                    ?>

                </div>
            </div>


            <div class="col-12 col-lg-10  shadow">

                <div class="col-12 " >

                    <!-- breadcum & -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="manageusers.php">Manage Users</a></li>
                            <li class="breadcrumb-item active" aria-current="page">User Massage</li>
                        </ol>
                    </nav>
                    <!-- breadcum & -->
                </div>


                <div class="col-12 py-5  px-3">
                    <div class="row rounded  overflow-hidden">
                        <div class=" col-5 px-0">
                            <div class="bg-white">

                                <div class="bg-light px-4 shadow py-2">
                                    <h5 class="mb-0 py-1">Recent</h5>
                                </div>

                                <div class="messages_box shadow m-2 ">

                                    <div class="list-group  rounded-0" id="rcv">


                                    </div>
                                </div>



                            </div>
                        </div>

                        <!-- message box -->
                        <div class="col-7  msg_bc2 shadow px-0">
                            <div class="row px-4 py-5 chat_box  " id="chatrow">

                            </div>
                        </div>
                        <!-- message box -->


                        <!-- text -->

                        <div class="offset-5 col-7  px-0  shadow  mb-3 ">
                            <div class="row bg-white">

                                <div class="col-12 py-2">
                                    <div class="row">
                                        <div class="input-group">
                                            <input type="text" placeholder="Type your message..." aria-describedby="button-addon2" class="form-control rounded-0 border-0  py-3 bg-light" id="msgtxt" />
                                            <div class="input-group-append">

                                                <button id="button-addon2" class="btn btn-link fs-1 bg-dark" onclick="sendAdminMessage('<?php echo $email ?>');">
                                                    <i class="bi bi-send-fill"></i>
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- text -->
                    </div>


                </div>
            </div>

        </div>
    </div>


    <script src="script.js"></script>
</body>

</html>