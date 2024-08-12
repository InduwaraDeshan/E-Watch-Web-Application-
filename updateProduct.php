<!DOCTYPE html>

<html>

<head>

    <title>Darklook</title>

    <link rel="icon" href="resources/watch_images/icon/Screenshot_2022-10-27_104146-removebg-preview.png" />

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />

</head>

<body class="bg-light">

    <div class="container-fluid">
        <div class="row gy-3">

            <?php require "header.php" ?>




            <div class="col-10 offset-1 shadow">
                <div class="row">


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
                                <li><a class="  dropdown-item text-center text-primary shadow " href="addproduct.php">Add Product</a></li>

                            </ul>
                        </div>

                        <nav class=" nav  nav-pills flex-column">

                            <a class="nav-link text-center shadow mt-3" href="sellingHistory.php">My Selling</a>

                        </nav>
                        <!-- breadcum & -->
                    </div>

                    <div class="col-lg-10 mt-4 shadow bg-light">
                        <div class="row">

                            <?php

                            $product = $_SESSION["p"];

                            if (isset($product)) {

                            ?>

                                <div class="col-12 text-center">
                                    <h2 class="h2 text-primary fw-bold">Update Product</h2>
                                </div>

                                <div class="col-12">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="myproduct.php">My Product</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Update Product </li>
                                        </ol>
                                    </nav>
                                </div>

                                <div class="col-12 mt-2 ">
                                    <hr class="hr-break-1" />
                                </div>

                                <div class="col-lg-12">
                                    <div class="row">

                                        <div class="col-12 col-lg-4">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label fw-bold lbl1">Select Product Category</label>
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <select class="form-select" disabled>

                                                        <?php

                                                        $category_rs = Database::search("SELECT * FROM `category` WHERE 
                                                `id`='" . $product["category_id"] . "' ");
                                                        $category_data = $category_rs->fetch_assoc();


                                                        ?>

                                                        <option><?php echo $category_data["name"]; ?></option>

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
                                                    <select class="form-select" disabled>
                                                        <?php

                                                        $brand_rs = Database::search("SELECT * FROM `brand` WHERE 
                                                `id` IN (SELECT `brand_id` FROM `model_has_brand` WHERE 
                                                `id`='" . $product["model_has_brand_id"] . "')");

                                                        $brand_data = $brand_rs->fetch_assoc();

                                                        ?>
                                                        <option><?php echo $brand_data["name"] ?></option>

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
                                                    <select class="form-select" disabled>

                                                        <?php

                                                        $model_rs = Database::search("SELECT * FROM `model` WHERE 
                                                `id` IN (SELECT `model_id` FROM `model_has_brand` WHERE 
                                                `id`='" . $product["model_has_brand_id"] . "')");

                                                        $model_data = $model_rs->fetch_assoc();

                                                        ?>

                                                        <option><?php echo $model_data["name"] ?></option>

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
                                                        Add a title to your Product.
                                                    </label>
                                                </div>
                                                <div class="offset-0 offset-lg-2 col-12 col-lg-8">
                                                    <input type="text" class="form-control" value="<?php echo $product["title"]; ?>" id="ti" />
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
                                                        <?php

                                                        if ($product["condition_id"] == 1) {

                                                        ?>

                                                            <div class="offset-1 col-11 col-lg-3 ms-5 form-check">
                                                                <input class="form-check-input" type="radio" name="condition" id="bn" checked disabled />
                                                                <label class="form-check-label" for="bn">
                                                                    Brand new
                                                                </label>
                                                            </div>
                                                            <div class="offset-1 col-11 col-lg-3 ms-5 form-check">
                                                                <input class="form-check-input" type="radio" name="condition" id="us" disabled />
                                                                <label class="form-check-label" for="us">
                                                                    Used
                                                                </label>
                                                            </div>

                                                        <?php

                                                        } else {

                                                        ?>

                                                            <div class="offset-1 col-11 col-lg-3 ms-5 form-check">
                                                                <input class="form-check-input" type="radio" name="condition" id="bn" disabled />
                                                                <label class="form-check-label" for="bn">
                                                                    Brand new
                                                                </label>
                                                            </div>
                                                            <div class="offset-1 col-11 col-lg-3 ms-5 form-check">
                                                                <input class="form-check-input" type="radio" name="condition" id="us" checked disabled />
                                                                <label class="form-check-label" for="us">
                                                                    Used
                                                                </label>
                                                            </div>

                                                        <?php

                                                        }

                                                        ?>

                                                    </div>
                                                </div>

                                                <div class="col-12 col-lg-4">
                                                    <div class="row">

                                                        <div class="col-12">
                                                            <label class="form-label fw-bold lbl1">Select Product Color</label>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="row">

                                                                <?php

                                                                if ($product["color_id"] == 1) {
                                                                ?>
                                                                    <div class="form-check offset-1 offset-lg-0 col-5 col-lg-4">
                                                                        <input class="form-check-input" type="radio" name="clrradio" id="clr1" checked disabled>
                                                                        <label class="form-check-label" for="clr1">
                                                                            Gold
                                                                        </label>
                                                                    </div>

                                                                    <div class="form-check offset-1 offset-lg-0 col-5 col-lg-4">
                                                                        <input class="form-check-input" type="radio" name="clrradio" id="clr2" disabled>
                                                                        <label class="form-check-label" for="clr2">
                                                                            Silver
                                                                        </label>
                                                                    </div>

                                                                    <div class="form-check offset-1 offset-lg-0 col-5 col-lg-4">
                                                                        <input class="form-check-input" type="radio" name="clrradio" id="clr3" disabled>
                                                                        <label class="form-check-label" for="clr3">
                                                                            Graphite
                                                                        </label>
                                                                    </div>


                                                                <?php
                                                                } else if ($product["color_id"] == 2) {
                                                                ?>
                                                                    <div class="form-check offset-1 offset-lg-0 col-5 col-lg-4">
                                                                        <input class="form-check-input" type="radio" name="clrradio" id="clr1" disabled>
                                                                        <label class="form-check-label" for="clr1">
                                                                            Gold
                                                                        </label>
                                                                    </div>

                                                                    <div class="form-check offset-1 offset-lg-0 col-5 col-lg-4">
                                                                        <input class="form-check-input" type="radio" name="clrradio" id="clr2" checked disabled>
                                                                        <label class="form-check-label" for="clr2">
                                                                            Silver
                                                                        </label>
                                                                    </div>

                                                                    <div class="form-check offset-1 offset-lg-0 col-5 col-lg-4">
                                                                        <input class="form-check-input" type="radio" name="clrradio" id="clr3" disabled>
                                                                        <label class="form-check-label" for="clr3">
                                                                            Graphite
                                                                        </label>
                                                                    </div>


                                                                <?php
                                                                } else if ($product["color_id"] == 3) {
                                                                ?>

                                                                    <div class="form-check offset-1 offset-lg-0 col-5 col-lg-4">
                                                                        <input class="form-check-input" type="radio" name="clrradio" id="clr1" disabled>
                                                                        <label class="form-check-label" for="clr1">
                                                                            Gold
                                                                        </label>
                                                                    </div>

                                                                    <div class="form-check offset-1 offset-lg-0 col-5 col-lg-4">
                                                                        <input class="form-check-input" type="radio" name="clrradio" id="clr2" disabled>
                                                                        <label class="form-check-label" for="clr2">
                                                                            Silver
                                                                        </label>
                                                                    </div>

                                                                    <div class="form-check offset-1 offset-lg-0 col-5 col-lg-4">
                                                                        <input class="form-check-input" type="radio" name="clrradio" id="clr3" checked disabled>
                                                                        <label class="form-check-label" for="clr3">
                                                                            Graphite
                                                                        </label>
                                                                    </div>


                                                                <?php
                                                                } else if ($product["color_id"] == 4) {
                                                                ?>

                                                                    <div class="form-check offset-1 offset-lg-0 col-5 col-lg-4">
                                                                        <input class="form-check-input" type="radio" name="clrradio" id="clr1" disabled>
                                                                        <label class="form-check-label" for="clr1">
                                                                            Gold
                                                                        </label>
                                                                    </div>

                                                                    <div class="form-check offset-1 offset-lg-0 col-5 col-lg-4">
                                                                        <input class="form-check-input" type="radio" name="clrradio" id="clr2" disabled>
                                                                        <label class="form-check-label" for="clr2">
                                                                            Silver
                                                                        </label>
                                                                    </div>

                                                                    <div class="form-check offset-1 offset-lg-0 col-5 col-lg-4">
                                                                        <input class="form-check-input" type="radio" name="clrradio" id="clr3" disabled>
                                                                        <label class="form-check-label" for="clr3">
                                                                            Graphite
                                                                        </label>
                                                                    </div>


                                                                <?php
                                                                } else if ($product["color_id"] == 5) {
                                                                ?>

                                                                    <div class="form-check offset-1 offset-lg-0 col-5 col-lg-4">
                                                                        <input class="form-check-input" type="radio" name="clrradio" id="clr1" disabled>
                                                                        <label class="form-check-label" for="clr1">
                                                                            Gold
                                                                        </label>
                                                                    </div>

                                                                    <div class="form-check offset-1 offset-lg-0 col-5 col-lg-4">
                                                                        <input class="form-check-input" type="radio" name="clrradio" id="clr2" disabled>
                                                                        <label class="form-check-label" for="clr2">
                                                                            Silver
                                                                        </label>
                                                                    </div>

                                                                    <div class="form-check offset-1 offset-lg-0 col-5 col-lg-4">
                                                                        <input class="form-check-input" type="radio" name="clrradio" id="clr3" disabled>
                                                                        <label class="form-check-label" for="clr3">
                                                                            Graphite
                                                                        </label>
                                                                    </div>


                                                                <?php
                                                                } else if ($product["color_id"] == 6) {
                                                                ?>

                                                                    <div class="form-check offset-1 offset-lg-0 col-5 col-lg-4">
                                                                        <input class="form-check-input" type="radio" name="clrradio" id="clr1" disabled>
                                                                        <label class="form-check-label" for="clr1">
                                                                            Gold
                                                                        </label>
                                                                    </div>

                                                                    <div class="form-check offset-1 offset-lg-0 col-5 col-lg-4">
                                                                        <input class="form-check-input" type="radio" name="clrradio" id="clr2" disabled>
                                                                        <label class="form-check-label" for="clr2">
                                                                            Silver
                                                                        </label>
                                                                    </div>

                                                                    <div class="form-check offset-1 offset-lg-0 col-5 col-lg-4">
                                                                        <input class="form-check-input" type="radio" name="clrradio" id="clr3" disabled>
                                                                        <label class="form-check-label" for="clr3">
                                                                            Graphite
                                                                        </label>
                                                                    </div>


                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <div class="form-check offset-1 offset-lg-0 col-5 col-lg-4">
                                                                        <input class="form-check-input" type="radio" name="clrradio" id="clr1" disabled>
                                                                        <label class="form-check-label" for="clr1">
                                                                            Gold
                                                                        </label>
                                                                    </div>

                                                                    <div class="form-check offset-1 offset-lg-0 col-5 col-lg-4">
                                                                        <input class="form-check-input" type="radio" name="clrradio" id="clr2" disabled>
                                                                        <label class="form-check-label" for="clr2">
                                                                            Silver
                                                                        </label>
                                                                    </div>

                                                                    <div class="form-check offset-1 offset-lg-0 col-5 col-lg-4">
                                                                        <input class="form-check-input" type="radio" name="clrradio" id="clr3" disabled>
                                                                        <label class="form-check-label" for="clr3">
                                                                            Graphite
                                                                        </label>
                                                                    </div>


                                                                <?php
                                                                }

                                                                ?>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="col-12 col-lg-4">
                                                    <div class="row">

                                                        <label class="form-label fw-bold lbl1">Add Product Quantity</label>
                                                        <input type="number" class="form-control" value="<?php echo $product["qty"]; ?>" min="0" id="qty" />

                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <hr class="hr-break-1" />

                                    <div class="col-12">
                                        <div class="row">

                                            <div class="col-12 col-lg-6">
                                                <div class="row">

                                                    <div class="col-12">
                                                        <label class="form-label fw-bold lbl1">Cost Per Item</label>
                                                    </div>

                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text">Rs.</span>
                                                        <input type="text" class="form-control" aria-label="Amount (to the nearest rupee)" value="<?php echo $product["price"]; ?>" disabled>
                                                        <span class="input-group-text">.00</span>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-12 col-lg-6">
                                                <div class="row">

                                                    <div class="col-12">
                                                        <label class="form-label fw-bold lbl1">Approved Payment Methods</label>
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

                                        </div>
                                    </div>

                                    <hr class="hr-break-1" />

                                    <div class="col-12">
                                        <div class="row">

                                            <div class="col-12">
                                                <label class="form-label fw-bold lbl1">Delivery Costs</label>
                                            </div>

                                            <div class="col-12 col-lg-6">
                                                <div class="row">

                                                    <div class="col-12 offset-lg-1 col-lg-3">
                                                        <label>Delivery Cost Within Colombo</label>
                                                    </div>
                                                    <div class="col-12 col-lg-8">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text">Rs.</span>
                                                            <input type="text" class="form-control" aria-label="Amount (to the nearest rupee)" value="<?php echo $product["delivery_fee_colombo"]; ?>" id="dwc">
                                                            <span class="input-group-text">.00</span>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-12 col-lg-6">
                                                <div class="row">

                                                    <div class="col-12 offset-lg-1 col-lg-3">
                                                        <label>Delivery Cost Out Of Colombo</label>
                                                    </div>
                                                    <div class="col-12 col-lg-8">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text">Rs.</span>
                                                            <input type="text" class="form-control" aria-label="Amount (to the nearest rupee)" value="<?php echo $product["delivery_fee_other"]; ?>" id="doc">
                                                            <span class="input-group-text">.00</span>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <hr class="hr-break-1" />


                                    <div class="col-12 ">
                                        <div class="row">
                                            <div class="col-12 col-lg-8 border-5 border-end">
                                                <div class="row">

                                                    <div class="col-12">
                                                        <label class="form-label fw-bold lbl1">Product Description</label>
                                                    </div>
                                                    <div class="col-12">
                                                        <textarea class="form-control" cols="30" rows="25" id="desc"><?php echo $product["description"] ?></textarea>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-4">


                                                <div class="col-12">
                                                    <div class="row">


                                                        <div class="col-12">
                                                            <label class="form-label fw-bold lbl1">Add Product Images</label>
                                                        </div>

                                                        <div class="offset-lg-1 col-lg-10 col-12 ">
                                                            <div class="row">

                                                                <?php
                                                                $product_image = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product["id"] . "'");
                                                                $n = $product_image->num_rows;


                                                                for ($i = 0; $i < $n; $i++) {

                                                                    $pid = $product_image->fetch_assoc();

                                                                ?>

                                                                    <div class="col-6 border  offset-lg-3 border-primary rounded shadow">
                                                                        <img class="img-fluid" src="<?php echo $pid["code"]; ?>" id="preview<?php echo $i ?>" />
                                                                    </div>

                                                                <?php

                                                                }
                                                                $mt = 0;
                                                                $mt = 3 - $n;

                                                                if ($mt == 2) {
                                                                ?>
                                                                    <div class="col-6 offset-lg-3 border border-primary rounded shadow ">
                                                                        <img class="img-fluid" src="resources/addproductimg.svg" id="preview1" />
                                                                    </div>
                                                                    <div class="col-6 offset-lg-3 border border-primary rounded shadow">
                                                                        <img class="img-fluid" src="resources/addproductimg.svg" id="preview2" />
                                                                    </div>

                                                                <?php
                                                                }
                                                                if ($mt == 1) {
                                                                ?>
                                                                    <div class="col-4 border border-primary rounded shadow">
                                                                        <img class="img-fluid" src="resources/addproductimg.svg" id="preview2" />
                                                                    </div>
                                                                <?php
                                                                }

                                                                ?>

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






                                    <hr class="hr-break-1" />

                                    <div class="col-12">
                                        <label class="form-label fw-bold lbl1">Notice...</label>
                                        <br />
                                        <label class="form-label">We are taking 5% of the product price from every product as a service charge.</label>
                                    </div>

                                    <div class="offset-lg-4 col-12 col-lg-4 d-grid mb-3 mt-2">
                                        <button class="btn btn-success fw-bold" onclick="updateProduct();">Update Product</button>
                                    </div>

                                </div>

                        </div>
                    </div>

                    <?php require "footer.php" ?>

                </div>

            </div>

        </div>

    </div>

    <script src="script.js"></script>
</body>

</html>

<?php
                            }
?>