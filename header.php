
<?php
require "connection.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="boxicons.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">


</head>

<body>

    <header >
        <nav class="navbar " >
            <div class="container-fluid " >

                <div>
                    <span class="text-lg-start label1"><b>Welcome</b>

                        <?php
                        session_start();
                        if (isset($_SESSION["u"])) {
                            $data = $_SESSION["u"];
                        ?>

                            <?php echo $data["fname"]; ?>

                    </span> |

                    <span class="text-lg-start label2 text-success" onclick="signout();">Sign Out</span>


                <?php
                        } 
                ?>


               


                </div>
                <div class="nav navbar-nav1 ">

                    <a class="btn text-white" href="home.php"><i class="bi bi-house-door-fill"></i> Home</a>
                    <a class="btn text-white" href="watchList.php"><i class="bi bi-heart-fill"></i> Wish List</a>
                    <a class="btn text-white" href="myproduct.php"><i class="bi bi-bag-plus-fill"></i> My Products</a>
                    <a class="btn text-white" href="purchaseHistory.php"><i class="bi bi-cash-coin"></i> Purchase History</a>
                    <a class="btn text-white" href="message.php?email=<?php echo $data["email"]; ?>"><i class="bi bi-telephone-fill"></i> Contact</a>
                    <a class="btn text-white" href="sellingHistory.php"><i class="bi bi-cash"></i> My Sellings</a>
                    <a class="btn text-white" href="userprofile.php"><i class="bi bi-person-lines-fill"></i> My Profile</a>
                    <a class="btn text-white" href="cart.php"><i class="bi bi-cart-fill"></i></a>

                    &nbsp;
                    &nbsp;
                    &nbsp;
          
                    <div class="mt-1 mb-1 text-center">

                        <?php

                        $profile_img_hm = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $data["email"] . "'");
                        $profile_img_number = $profile_img_hm->num_rows;

                        if ($profile_img_number == 1) {

                            $profile_img_hm_data = $profile_img_hm->fetch_assoc();
                        ?>
                        <span class="d-inline-block " tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content=" <?php echo $data["fname"] . "  " . $data["lname"]; ?>" title="User Name">
                        <a href="userprofile.php"><img src="<?php echo $profile_img_hm_data["path"]; ?>" class="rounded-circle " width="50px" /></a>
                         </span>
                            


                        <?php

                        } else {
                        ?>
                            <img src="resources/Profile_img/user_icon.svg" class="rounded-circle" width="50px" />


                        <?php
                        }
                        ?>

                    </div>

                </div>

            </div>
        </nav>
    </header>


    <script src="bootstrap.bundle.js"></script>
    <script>
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
    </script>

</body>

</html>