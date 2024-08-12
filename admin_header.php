<!DOCTYPE html>
<html>

<head>


    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>

    <div class="col-12 g-2">
        <div class="row">
            <div class="col-8">
                <input type="text" placeholder="Search hear" class="form-control border-info">
            </div>
            <div class=" col-2 text-end">
                

                    <?php

                    $profile_img_hm = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" .$_SESSION["a"]["email"]. "'");
                    $profile_img_number = $profile_img_hm->num_rows;

                    if ($profile_img_number == 1) {

                        $profile_img_hm_data = $profile_img_hm->fetch_assoc();
                    ?>
                           <a ><img src="<?php echo $profile_img_hm_data["path"]; ?>" class="rounded-circle " width="50px" /></a>
                        

                    <?php

                    } else {
                    ?>
                        <img src="resources/Profile_img/user_icon.svg" class="rounded-circle" width="50px" />


                    <?php
                    }
                    ?>

                
            </div>


            <div class="col-2">
                <?php
                $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $_SESSION["a"]["email"] . "' ");
                $result_data = $user_rs->fetch_assoc();
                ?>
                <h5 class="text-black-50"><?php echo $result_data["fname"] . " " . $result_data["lname"]; ?></h5>


            </div>


        </div>
    </div>



    <script src="script.js"></script>


</body>

</html>