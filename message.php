<?php





$email1 = $_GET["email"];





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
    <link rel="stylesheet" href="side_icon.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />

</head>

<body onload="urefresher('<?php echo $email1 ?>');" class="bg-light">

    <div class="container-fluid">
        <div class="row">

            <?php require "header.php";
            $email = $_SESSION["u"]["email"];
            ?>

            <div class="col-12">
                <hr>
            </div>

            <div class="col-10 offset-1 text-center shadow mt-34">
                <label class="form-label fs-1 fw-bolder text-center">Message</label>
            </div>



            <div class="col-10 offset-1 py-5 px-4">
                <div class="row rounded shadow overflow-hidden">
                    <div class=" col-5 px-0">
                        <div class="bg-white">

                            <div class="bg-light px-4 py-2 shadow mb-3">
                                <h5 class="mb-0 py-1">Recent</h5>
                            </div>

                            <div class="messages_box shadow m-2 ">

                                <div class="list-group  rounded-0" id="rcv">


                                </div>
                            </div>



                        </div>
                    </div>

                    <!-- message box -->
                    <div class="col-7 msg_bc2 px-0 shadow">
                        <div class="row px-4 py-5 chat_box  " id="chatrow">

                        </div>
                    </div>
                    <!-- message box -->


                    <!-- text -->

                    <div class="offset-5 col-7 px-0  shadow  mb-3">
                        <div class="row bg-white  ">

                            <div class="col-12 py-2">
                                <div class="row">
                                    <div class="input-group ">
                                        <input type="text" placeholder="Type your message..." aria-describedby="button-addon2" class="form-control rounded-0 border-0  py-3 bg-light" id="msgtxt" />
                                        <div class="input-group-append">

                                            <button id="button-addon2" class="btn btn-link fs-1 bg-dark" onclick="sendmessage('<?php echo $email ?>');">
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



            <!-- side -->

            <!-- side -->

            <div class="col-10 offset-1 mb-3 shadow">
                <div class="col-10 offset-1 ">
                    <div class="row">
                        <div class="col-12 ">
                            <div class="section-title text-center">
                                <h2 data-aos="fade-up" class="fw-bold">Our Address</h2>
                            </div>
                            <figure class="google_map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.788720521862!2d80.36151057588063!3d7.488565861195079!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae33bdaeb06ba9f%3A0x328b11c8124ed18e!2sCASIO%20SHOWROOM%20(BRANDED%20WATCHES)!5e0!3m2!1sen!2slk!4v1667246758470!5m2!1sen!2slk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>



            <?php require "footer.php"; ?>

        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>