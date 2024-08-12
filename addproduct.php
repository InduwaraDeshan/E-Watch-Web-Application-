<?php

session_start();

require "connection.php";
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
</head>

<body>

    <div class="container-fluid">
        <div class="row gy-3">


            <?php



            $email = $_SESSION["u"]["email"];

            if (isset($_SESSION["u"])) {

            ?>
                <!--header -->

                <div class="col-12 bc2">
                    <div class="row">

                        <div class="col-4">
                            <div class="row">

                                <div class="col-12 col-lg-4 mt-1 mb-1 text-center">

                                    <?php

                                    $profile_img_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $email . "'");
                                    $profile_img_num = $profile_img_rs->num_rows;

                                    if ($profile_img_num == 1) {

                                        $profile_img_data = $profile_img_rs->fetch_assoc();
                                    ?>
                                        <img src="<?php echo $profile_img_data["path"]; ?>" class="rounded-circle" width="90px" />


                                    <?php

                                    } else {
                                    ?>
                                        <img src="resources/Profile_img/user_icon.svg" class="rounded-circle" width="90px" />


                                    <?php
                                    }
                                    ?>

                                </div>
                                <div class="col-12 col-lg-8">
                                    <div class="row">

                                        <div class="col-12 mt-0 mt-lg-3">
                                            <span class="fw-bold fs-5"><?php echo $_SESSION["u"]["fname"] . " " . $_SESSION["u"]["lname"]; ?></span>
                                        </div>
                                        <div class="col-12">
                                            <span class="text-white fs-5"><?php echo $email; ?></span>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-8">
                            <div class="row">
                                <div class="col-12 mt-5 my-lg-3">
                                    <h1 class="offset-6 offset-lg-2 fs-1 text-white fw-bold">Add Product</h1>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <!--header -->


                <div class="col-10 offset-1">
                    <div class="row">



                        <div class="col-12 ">
                            <hr class="hr-break-1" />
                        </div>
                        <div class="col-12 col-lg-2 bg-light mt-4  shadow">
                            <!-- breadcum & -->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Product</li>
                                </ol>
                            </nav>

                            <div class=" dropdown mt-4  ">
                                <button class="col-12 btn btn-light dropdown-toggle text-primary shadow" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    My Product
                                </button>
                                <ul class="dropdown-menu col-12" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="  dropdown-item  text-center text-primary shadow" href="myproduct.php">My Product</a></li>
                                    <li><a class="  dropdown-item text-center text-primary shadow " href="">Add Product</a></li>

                                </ul>
                            </div>

                            <nav class=" nav  nav-pills flex-column">

                                <a class="nav-link text-center shadow mt-3" href="sellingHistory.php">My Selling</a>

                            </nav>
                            <!-- breadcum & -->
                        </div>
                        <div class="col-lg-10 mt-4 shadow bg-light">
                            <div class="row">

                                <div class="col-12 col-lg-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label fw-bold lbl1">Select Product Category</label>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <select class="form-select" id="category">
                                                <option value="0">Select Category</option>
                                                <?php
                                                $category_rs =  Database::search("SELECT * FROM `category` ");
                                                $category_num = $category_rs->num_rows;

                                                for ($x = 0; $x < $category_num; $x++) {
                                                    $category_data = $category_rs->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $category_data["id"]; ?>"><?php echo $category_data["name"]; ?></option>
                                                <?php

                                                }

                                                ?>


                                            </select>

                                        </div>

                                    </div>

                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label fw-bold lbl1">Select Product Brand</label>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <select class="form-select" id="brand">
                                                <option value="0">Select Brand</option>
                                                <?php
                                                $brand_rs =  Database::search("SELECT * FROM `brand` ");
                                                $brand_num = $brand_rs->num_rows;

                                                for ($y = 0; $y < $brand_num; $y++) {
                                                    $brand_data = $brand_rs->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $brand_data["id"]; ?>"><?php echo $brand_data["name"]; ?></option>
                                                <?php

                                                }

                                                ?>
                                            </select>

                                        </div>

                                    </div>

                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label fw-bold lbl1">Select Product Model</label>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <select class="form-select" id="model">
                                                <option value="0">Select Model</option>
                                                <?php
                                                $model_rs =  Database::search("SELECT * FROM `model` ");
                                                $model_num = $model_rs->num_rows;

                                                for ($z = 0; $z < $model_num; $z++) {
                                                    $model_data = $model_rs->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $model_data["id"]; ?>"><?php echo $model_data["name"]; ?></option>
                                                <?php

                                                }

                                                ?>
                                            </select>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-12">
                                    <hr class="hr-break-1" />
                                </div>
                                <div class="col-12 mb-3">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label fw-bold lbl1">
                                                Add a title to your product.
                                            </label>
                                        </div>
                                        <div class="offset-0 offset-lg-2  col-12 col-lg-8">
                                            <input type="text" class="form-control" id="title" />
                                        </div>
                                    </div>

                                </div>
                                <div class="col-12">
                                    <hr class="hr-break-1" />
                                </div>

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 col-lg-4">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label fw-bold lbl1">Select Product Condition</label>
                                                </div>
                                                <div class="offset-1 col-11 col-lg-3 ms-5 form-check ">
                                                    <input class="form-check-input" type="radio" name="condition" id="bn" checked />
                                                    <label class="form-check-label" for="bn">
                                                        Brand New
                                                    </label>
                                                </div>
                                                <div class="offset-1 col-11 col-lg-3 ms-5 form-check ">
                                                    <input class="form-check-input" type="radio" name="condition" id="us" />
                                                    <label class="form-check-label" for="us">
                                                        Used
                                                    </label>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- myupdate -->
                                        <div class="col-12 col-lg-4">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label fw-bold lbl1">Select Product Colour</label>
                                                </div>
                                                <div class=" offset-1 col-5 col-lg-4 offset-lg-0 form-check">
                                                    <input class="form-check-input" type="radio" name="clrradio" id="clr1" checked>
                                                    <label class="form-check-label" id="clr1">
                                                        Gold
                                                    </label>
                                                </div>
                                                <div class=" offset-1 col-5 col-lg-4 offset-lg-0 form-check">
                                                    <input class="form-check-input" type="radio" name="clrradio" id="clr2">
                                                    <label class="form-check-label" id="clr2">
                                                        Silver
                                                    </label>
                                                </div>
                                                <div class=" offset-1 col-5 col-lg-4 offset-lg-0 form-check">
                                                    <input class="form-check-input" type="radio" name="clrradio" id="clr3">
                                                    <label class="form-check-label" id="clr3">
                                                        Graphite
                                                    </label>
                                                </div>

                                            </div>

                                        </div>

                                        <!-- myupdate -->
                                        <!-- myupdate -->

                                        <div class="col-12 col-lg-4">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label fw-bold lbl1">Add Product Quantity</label>
                                                </div>
                                                <div class="offset-0 offset-lg-0 col-12 col-lg-12">
                                                    <input type="number" class="form-control" value="0" min="0" id="qty" />
                                                </div>

                                            </div>
                                        </div>

                                        <!-- myupdate -->




                                    </div>
                                </div>
                                <div class="col-12">
                                    <hr class="hr-break-1" />
                                </div>

                                <div class="col-12 ">
                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label fw-bold lbl1">Cost Per Item</label>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">Rs.</span>
                                                    <input type="text" class="form-control" aria-label="Amount (to the nearest rupee)" id="cost" />
                                                    <span class="input-group-text">.00</span>



                                                </div>

                                            </div>

                                        </div>

                                        <!--  -->
                                        <div class="col-12 col-lg-6">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label fw-bold lbl1"> Approved Payment Method</label>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="offset-2 col-2 pm1"></div>
                                                        <div class="col-2 pm2"></div>
                                                        <div class="col-2 pm3"></div>
                                                        <div class="col-2 pm4"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--  -->

                                    </div>
                                </div>
                                <div class="col-12">
                                    <hr class="hr-break-1" />
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label fw-bold lbl1">Delivery costs</label>
                                        </div>

                                        <div class="col-12 col-lg-6">
                                            <div class="row">
                                                <div class="col-12 offset-lg-1 col-lg-3">
                                                    <label> Delivery Cost Within Colombo</label>
                                                </div>

                                                <div class="col-12 col-lg-8">
                                                    <div class="input-group mb-3">
                                                        <!-- no code -->
                                                        <span class="input-group-text">Rs.</span>
                                                        <input type="text" class="form-control" aria-label="Amount(to the neares)" id="dwc" />
                                                        <span class="input-group-text">.00</span>
                                                    </div>
                                                    <!-- no code -->
                                                    <div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="row">
                                                <div class="col-12 offset-lg-1 col-lg-3">
                                                    <label> Delivery Cost Out Of Colombo</label>
                                                </div>

                                                <div class="col-12 col-lg-8">
                                                    <div class="input-group mb-3">
                                                        <!-- no code -->
                                                        <span class="input-group-text">Rs.</span>
                                                        <input type="text" class="form-control" aria-label="Amount(to the neareset rupee )" id="doc" />
                                                        <span class="input-group-text">.00</span>
                                                    </div>
                                                    <!-- no code -->
                                                    <div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12">
                                    <hr class="hr-break-1" />
                                </div>

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 col-lg-8 border-end border-5">

                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label class="form-label fw-bold lbl1">Product Description</label>

                                                    </div>
                                                    <div class="col-12">
                                                        <textarea class="form-control" cols="30" rows="25" id="description"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                            

                                        <div class="col-12 col-lg-4">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label class="form-label fw-bold lbl1">Add product Images</label>
                                                    </div>
                                                    <div class="offset-lg-3  col-12 col-lg-6">
                                                        <div class="row ">
                                                            <div class="col-12 border border-primary rounded ">
                                                                <img class="img-fluid" src="resources/addproductimg.svg" id="preview0" />
                                                            </div>
                                                            <div class="col-12 border border-primary rounded ">
                                                                <img class="img-fluid" src="resources/addproductimg.svg" id="preview1" />
                                                            </div>
                                                            <div class="col-12 border border-primary rounded ">
                                                                <img class="img-fluid" src="resources/addproductimg.svg" id="preview2" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 offset-lg-3 col-lg-6 d-grid mt-3">
                                                        <input type="file" accept="img/*" class="d-none" id="imageuploader" multiple />
                                                        <label for="imageuploader" class="col-12 btn btn-primary" onclick="changeProductImage();">Upload Image</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <div class="col-12">
                                    <hr class="hr-break-1" />
                                </div>

                                <div class="col-12">
                                    <label class="form-label fw-bold lbl1">notice...</label>
                                    <br />
                                    <label class="form-label"> We are talking 5% of the product form price form every product as a service chearge.</label>
                                </div>

                                <div class="offset-lg-4 col-12 col-lg-4  d-grid mb-3 mt-2">
                                    <button class="btn btn-success fw-bold" onclick="addProduct();">Add Product</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <?php
                require "footer.php";
                ?>

        </div>
    </div>


    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
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