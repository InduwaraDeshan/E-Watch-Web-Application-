<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="resources/watch_images/icon/Screenshot_2022-10-27_104146-removebg-preview.png" />

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="align-items-start bg-light col-12" style="height: 100vh;">
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
                    <a class="nav-link fs-5 shadow mt-4 ad" href="admin_selling_history.php"><i class="bi bi-box-seam"></i>&nbsp;&nbsp;&nbsp;View Selling</a>

                </nav>
            </div>

            <div class="col-12 mt-5" >
                <a class="nav-link fs-5 shadow mt-4 ad" href="" onclick="adminSignOut();">
                    <img src="resources/log-out.png" alt="">
                
                Log Out</a>


            </div>


        </div>
    </div>
    <script src="script.js"></script>

</body>

</html>