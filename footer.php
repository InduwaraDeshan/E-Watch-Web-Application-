<!DOCTYPE html>


<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

</head>

<body>


    <footer id="footer" class="footer">

        <div class="footer-top bc">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>DarkLook</h3>
                        <p>
                            Kurunegala<br>
                            Kurunegala,Narammala<br>
                            Sri Lanka <br><br>
                            <strong>Phone:</strong> 037 456 3268<br>
                            <strong>Email:</strong> DarkLook@gmail.com<br>
                        </p>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul class="ul">
                            <li class="li"><i class="bi bi-chevron-right i"></i> <a class="a" href="home.php">Home</a></li>
                            <li class="li"><i class="bi bi-chevron-right i"></i> <a class="a" href="#">About us</a></li>
                            <li class="li"><i class="bi bi-chevron-right i"></i> <a class="a" href="#">Services</a></li>
                            <li class="li"><i class="bi bi-chevron-right  i"></i> <a class="a" href="#">Terms of service</a></li>
                            <li class="li"><i class="bi bi-chevron-right i"></i> <a class="a" href="#">Privacy policy</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">

                        <div class="col-8">
                            <h4>Our Popular Brand</h4>
                            <div class="row py-5 category_box">
                                <?php
                                $brand = Database::search("SELECT * FROM `brand`");
                                $brand_no = $brand->num_rows;
                                for ($x = 0; $x < $brand_no; $x++) {

                                    $brand_data = $brand->fetch_assoc();

                                ?>
                                    <p class="a"><?php echo $brand_data["name"];  ?></p>

                                <?php

                                }

                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 footer-links text-center">
                        <h4>Who We Are</h4>
                        <p class="fs-5 text-white-50  ">We do more than just sell watches, we believe in doing things differently. By putting our customers first and investing in our team, we guide and empower you to buy or sell with confidence.</p>
                    </div>

                </div>
            </div>
        </div>

        <div class="container d-lg-flex py-4">

            <div class="me-lg-auto text-center text-lg-start">
                <div class="text-white">
                    &copy; Copyright <strong><span>ZEAMAC Solution</span></strong>. All Rights Reserved
                </div>
                <div class="credits">

                    Designed by <a href="">ZEAMAC Solution</a>
                </div>
            </div>
            <div class="social-links text-center text-lg-right pt-3 pt-lg-0">
                <a href="https://twitter.com/" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="https://www.facebook.com/" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="www.instagram.login" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="https://www.skype.com/en/" class="google-plus"><i class="bi bi-skype"></i></a>
                <a href="https://www.linkedin.com/login" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
            <div class="col-4 col-lg-1 offset-4 offset-lg-1 logo-img"></div>
            <h1 class="fs-1 fw-bold text-white-50 title01">DARKLOOK</h1>
        </div>

    </footer>

</body>

</html>