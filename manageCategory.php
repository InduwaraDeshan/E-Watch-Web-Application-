<?php
require "connection.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Darklook</title>

    <link rel="icon" href="resources/watch_images/icon/Screenshot_2022-10-27_104146-removebg-preview.png" />


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
</head>

<body>


    <div class="container-fluid">
        <div class="row">

            <div class="col-12 col-lg-2 bg-light" style="height: 100vh;">
                <div class="row">

                    <div class="align-items-start  col-12">
                        <div class="row g-1 text-center justify-content-center">







                            <div class="col-12 mt-5">
                                <h1 class="fs-1 fw-bold text-black-50 title01">DARKLOOK</h1>
                                <hr class="border border-1 border-white" />
                            </div>

                            <div class="nav flex-column nav-pills me-3 mt-3 ">
                                <nav class="nav flex-column">
                                    <a class="nav-link fs-5 shadow mt-4 ad" href="adminpanel.php"><i class="bi bi-display"></i>&nbsp;&nbsp;&nbsp;Dashboard</a>
                                    <a class="nav-link fs-5 shadow mt-4 ad" href="manageusers.php"><i class="bi bi-people"></i>&nbsp;&nbsp;&nbsp;Manage Users</a>
                                    <a class="nav-link fs-5 shadow mt-4 ad" href="manageProduct.php"><i class="bi bi-box-seam"></i>&nbsp;&nbsp;&nbsp;Manage Product</a>
                                    <a class="nav-link fs-5 shadow mt-4 ad" href="manageCategory.php"><i class="bi bi-box-seam"></i>&nbsp;&nbsp;&nbsp;Manage Category</a>
                                    <a class="nav-link fs-5 shadow mt-4 ad" href="admin_selling_history.php"><i class="bi bi-box-seam"></i>&nbsp;&nbsp;&nbsp;View Selling</a>
                                </nav>
                            </div>





                        </div>
                    </div>

                </div>
            </div>


            <div class="col-12 col-lg-10  shadow">
                <div class="col-12 text-center">
                    <h3>Manage Category</h3>
                </div>


                <div class="col-12 ">

                    <!-- breadcum & -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="adminpanel.php">Admin Panel</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Category</li>
                        </ol>
                    </nav>
                    <!-- breadcum & -->
                </div>

                <div class="col-12 mb-3 ">
                    <div class="row g-2">

                        <?php

                        $category_rs = Database::search("SELECT * FROM `category`");
                        $category_num = $category_rs->num_rows;

                        for ($i = 0; $i < $category_num; $i++) {
                            $category_data = $category_rs->fetch_assoc();

                        ?>

                            <div class="col-12 col-lg-3 border border-danger" style="height: 50px;">
                                <div class="row">

                                    <div class="col-8 mt-2">
                                        <label class="form-label fw-bold fs-5"><?php echo $category_data["name"]; ?></label>
                                    </div>
                                    <div class="col-4 border-start border-secondary text-center mt-2">
                                        <label for="form-label fs-4" onclick="deleteFromCategory(<?php echo $category_data['id']; ?>);"><i class="bi bi-trash"></i></label>
                                    </div>
                                </div>
                            </div>

                        <?php
                        }
                        ?>

                        <div class="col-12 col-lg-3 border border-danger bg-success" onclick="addNewCategory();" style="height: 50px;">
                            <div class="row">
                                <div class="col-8 mt-2">
                                    <label class="form-label fw-bold fs-5">Add New Category</label>
                                </div>
                                <div class="col-4 border-start border-secondary text-center mt-2">
                                    <label class="form-label fs-4"><i class="bi bi-shield-fill-plus"></i></label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12 mb-3  mt-5 ">
                    <div class="row">
                        <div class="col-2">
                            <div class="align-items-start bg-light col-12">
                                <div class="row g-1 text-center justify-content-center">

                                    <div class="nav flex-column nav-pills me-3 mt-3 ">
                                        <nav class="nav flex-column">
                                            <a class="nav-link fs-5 shadow mt-4 ad" href="mangebrand.php"><i class="bi bi-display"></i>&nbsp;&nbsp;&nbsp;Manage Brand</a>
                                            <a class="nav-link fs-5 shadow mt-4 ad" href="managemodel.php"><i class="bi bi-people"></i>&nbsp;&nbsp;&nbsp;Manage Model</a>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-10">


                        </div>

                    </div>
                </div>

                <!-- modal 2 -->
                <div class="modal" tabindex="-1" id="addCategoryModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5>Add New Category</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="col-12">
                                    <label>New Category Name : </label>
                                    <input type="text" class="form-control" id="n" />
                                </div>
                                <div class="col-12">
                                    <label>Your Email Address : </label>
                                    <input type="text" class="form-control" id="e" />
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" onclick="categroyVerifyModal();">Add Category</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal 2 -->

                <!-- modal 3 -->
                <div class="modal" tabindex="-1" id="addCategoryModelVerification">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Verification</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="col-12">
                                    <label class="form-label">Verification Code : </label>
                                    <input type="text" class="form-control" id="vtxt" />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
                                <button type="button" class="btn btn-primary" onclick="saveCategory();">Verify & Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal 3 -->

    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>

</body>

</html>