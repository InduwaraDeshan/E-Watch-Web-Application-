<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Darklook</title>

    <link rel="icon" href="resources/watch_images/icon/Screenshot_2022-10-27_104146-removebg-preview.png" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css" />

</head>

<body class="bg-secondary">

    <div class="container-fluid">
        <div class="row g-2">

            <?php require "header.php"; ?>

            <?php




            if (isset($_SESSION["u"])) {

                $email = $_SESSION["u"]["email"];

                $resultSet = Database::search(" SELECT * FROM `user` INNER JOIN `user_has_address` ON 
            `user`.`email` =`user_has_address`.`user_email` INNER JOIN `city` ON
             `user_has_address`.`city_id` = `city`.`id` INNER JOIN `district` ON
             `city`.`district_id` = `district`.`id` INNER JOIN `province`ON 
             `district`.`province_id` = `province`.`id`  INNER JOIN `gender` ON 
              `user`.`gender_id`=`gender`.`id` WHERE `user`.`email` = '" . $email . "'");

                $n = $resultSet->num_rows;

                $d = $resultSet->fetch_assoc();


            ?>

                <div class="col-12 bg-body rounded mt-4 mb-4  profile_background ">
                    <div class="bc_color">
                        <div class="row g-2">

                            <div class="col-10 offset-1">
                                <div class="row">
                                    <div class="col-5 offset-1 ">
                                        <div class="d-flex flex-column align-items-center text-center  p-3 py-5">

                                            <?php

                                            $profile_img = Database::search("SELECT * FROM `profile_image` WHERE `profile_image`.`user_email`='" . $email . "'");
                                            $profile_img_data = $profile_img->fetch_assoc();


                                            $profile = Database::search("SELECT * FROM `user` WHERE `user`.`email`='" . $email . "'");
                                            $profile_data = $profile->fetch_assoc();



                                            if ($profile_img->num_rows) {
                                            ?>
                                                <div style="width:250px ; height: 250px; background-color: white; border-radius: 150px;">
                                                    <img id="viewimg" src="<?php echo $profile_img_data["path"]; ?>" class="rounded mt-5" style="width: 150px;" />

                                                </div>

                                            <?php
                                            } else {
                                            ?>
                                                <div style="width:250px ; height: 250px; background-color: white; border-radius: 150px;">
                                                    <img id="viewimg" src="resources/Profile_img/user_icon.svg" class="rounded mt-5" style="width: 150px;" />
                                                </div>
                                            <?php
                                            }
                                            ?>
                                            
                                            <input class="d-none" type="file" accept="img/*" id="profileimg" />
                                            <label class="btn btn-primary mt-5" for="profileimg" onclick="changeImage();">Update Profile Image</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12 align-self-center">
                                        <span class="fw-bold fs-1 text-white"><?php echo $profile_data["fname"]; ?> <?php echo $profile_data["lname"]; ?></span>
                                        <br>
                                        <span class="text-white-50 fs-4"><?php echo $profile_data["email"]; ?></span>

                                    </div>
                                </div>

                            </div>


                            <div class="col-8 offset-2  border-top">
                                <div class="p-3 py-5">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="fw-bold text-light">Profile Details</h4>
                                    </div>
                                    <div class="row mt-3">

                                        <div class="col-md-6">
                                            <label class="form-label text-light">First Name</label>
                                            <input type="text" id="fn" class="form-control" value="<?php echo $profile_data["fname"]; ?>" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label text-light">Last Name</label>
                                            <input type="text" id="ln" class="form-control" value="<?php echo $profile_data["lname"]; ?>" />
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label text-light">Mobile</label>
                                            <input type="text" id="mo" class="form-control" value="<?php echo $profile_data["mobile"]; ?>" />
                                        </div>

                                        <div class="col-md-12">
                                            <label class="form-label text-light">Password</label>
                                            <div class="input-group mb-3">
                                                <input type="password" class="form-control" aria-describedby="viewpassword" id="pwtxt" value="<?php echo $profile_data["password"]; ?>" disabled>
                                                <button class="btn btn-outline-primary" type="button" id="viewpassword" onclick="viewpw();"><i class="bi bi-eye-fill"></i></button>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label text-light">Email</label>
                                            <input type="email" class="form-control" value="<?php echo $profile_data["email"]; ?>" readonly />
                                        </div>

                                        <div class="col-12 mt-1">
                                            <label class="form-label text-light">Registered Date</label>
                                            <input type="text" class="form-control" value="<?php echo $profile_data["join_date"]; ?>" readonly />
                                        </div>

                                        <?php
                                        $user_address = Database::search("SELECT * FROM `user_has_address` WHERE `user_has_address`.`user_email`='" . $email . "'");
                                        $address_data = $user_address->fetch_assoc();

                                        if ($user_address->num_rows) {
                                        ?>

                                            <div class="col-12 mt-1">
                                                <label class="form-label text-light">Address Line 01</label>
                                                <input id="l1" type="text" class="form-control" value="<?php echo $address_data["line1"]; ?>" />

                                            </div>

                                        <?php

                                        } else {
                                        ?>

                                            <div class="col-12 mt-1">
                                                <label class="form-label text-light">Address Line 01</label>
                                                <input id="l1" type="text" class="form-control" placeholder="Address Line 01" />

                                            </div>

                                        <?php

                                        }




                                        ?>

                                        <?php

                                        if ($user_address->num_rows) {
                                        ?>



                                            <div class="col-12 mt-1">
                                                <label class="form-label text-light">Address Line 02</label>
                                                <input id="l2" type="text" class="form-control" value="<?php echo $address_data["line2"]; ?>" />

                                            </div>

                                        <?php

                                        } else {
                                        ?>

                                            <div class="col-12 mt-1">
                                                <label class="form-label text-light">Address Line 02</label>
                                                <input id="l2" type="text" class="form-control" placeholder="Address Line 02" />

                                            </div>

                                        <?php

                                        }

                                        $provincers = Database::search("SELECT * FROM `province`");
                                        $districtrs = Database::search("SELECT * FROM `district`");
                                        $cityrs = Database::search("SELECT * FROM `city`");
                                        $gender = Database::search("SELECT * FROM `gender` INNER JOIN `user` ON `gender`.`id`=`user`.`gender_id` WHERE `user`.`email`='" . $email . "'");

                                        $gender_data = $gender->fetch_assoc();

                                        ?>



                                        <div class="col-md-6 mt-1">
                                            <label class="form-label text-light">Province</label>
                                            <select class="form-select" id="pr">

                                                <option value="0">Select Province</option>
                                                <?php


                                                $pn = $provincers->num_rows;

                                                for ($x = 0; $x < $pn; $x++) {
                                                    $pd = $provincers->fetch_assoc();

                                                    if ($n != 1) {
                                                ?>
                                                        <option value="<?php echo $pd["id"] ?>"><?php echo $pd["name"] ?></option>

                                                    <?php



                                                    } else {
                                                    ?>
                                                        <option value="<?php echo $pd["id"] ?>" <?php
                                                                                                if ($pd["id"] == $d["province_id"]) {
                                                                                                ?> selected <?php
                                                                                                        }
                                                                                                            ?>><?php echo $pd["name"] ?></option>

                                                    <?php


                                                    }
                                                    ?>






                                                <?php

                                                }
                                                ?>





                                            </select>
                                        </div>






                                        <div class="col-md-6 mt-1">
                                            <label class="form-label text-light">District</label>
                                            <select class="form-select" id="dr">
                                                <option>Select District</option>
                                                <?php

                                                $dn = $districtrs->num_rows;

                                                for ($y = 0; $y < $dn; $y++) {
                                                    $dd = $districtrs->fetch_assoc();

                                                    if ($n != 1) {
                                                ?>
                                                        <option value="<?php echo $dd["id"] ?>"><?php echo $dd["name"] ?></option>

                                                    <?php
                                                    } else {
                                                    ?>
                                                        <option value="<?php echo $dd["id"] ?>" <?php
                                                                                                if ($dd["id"] == $d["district_id"]) {
                                                                                                ?> selected <?php
                                                                                                        }
                                                                                                            ?>><?php echo $dd["name"] ?></option>

                                                    <?php
                                                    }

                                                    ?>


                                                <?php

                                                }
                                                ?>

                                            </select>
                                        </div>
                                        <div class="col-md-6 mt-1">
                                            <label class="form-label text-light">City</label>
                                            <select class="form-select" id="ci">
                                                <option>Select City</option>


                                                <?php

                                                $cn = $cityrs->num_rows;

                                                for ($z = 0; $z < $cn; $z++) {
                                                    $cd = $cityrs->fetch_assoc();

                                                    if ($n != 1) {
                                                ?>
                                                        <option value="<?php echo $cd["id"] ?>"><?php echo $cd["name"] ?></option>

                                                    <?php
                                                    } else {
                                                    ?>
                                                        <option value="<?php echo $cd["id"] ?>" <?php
                                                                                                if ($cd["id"] == $d["city_id"]) {
                                                                                                ?> selected <?php
                                                                                                    }
                                                                                                        ?>><?php echo $cd["name"] ?></option>

                                                    <?php
                                                    }

                                                    ?>


                                                <?php

                                                }
                                                ?>

                                            </select>
                                        </div>
                                        <div class="col-md-6 mt-1">
                                            <label class="form-label text-light">Postal Code</label>

                                            <?php

                                            if (!empty($d["postal_code"])) {
                                            ?>

                                                <input id="pc" type="text" class="form-control" value="<?php echo $d["postal_code"]; ?>" />

                                            <?php

                                            } else {

                                            ?>
                                                <input id="pc" type="text" class="form-control" placeholder="Postal Code" />
                                            <?php

                                            }
                                            ?>

                                        </div>



                                        <div class="col-md-12 mt-1">
                                            <label class="form-label text-light">Gender</label>
                                            <input type="text" class="form-control " value="<?php echo $gender_data["gender_name"]; ?>" readonly />
                                        </div>

                                        <div class="col-md-12 d-grid mt-3 mb-3">
                                            <button class="btn btn-primary" onclick=" update_profile();">Update My Profile</button>
                                        </div>

                                    </div>
                                </div>
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

<?php


            } else {

?>

    <script>
        window.location = "index.php";
    </script>

<?php

            }

?>