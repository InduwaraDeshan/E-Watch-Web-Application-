<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Darklook</title>

    <link rel="icon" href="resources/watch_images/icon/Screenshot_2022-10-27_104146-removebg-preview.png" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />

</head>

<body class="main-body">
    <div class="main-body-transparent">
        <div class="container-fluid vh-100 d-flex justify-content-start ">
            <div class="row align-content-center">


                <div class="col-12 p-3 m-3">
                    <div class="row">
                        <div class="col-12 m-3">

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 logo"></div>
                                    <p class="text-center title01-index text-light">Welcome to DarkLook</p>

                                </div>
                            </div>

                            <div class="row g-2">
                                <div class="col-12 ">
                                    <div class="row">

                                        <div class="col-6 d-none d-lg-block background"></div>

                                        <div class="col-12 d-block">
                                            <div class="row g-3">

                                                <div class="col-12">
                                                    <p class="title02 text-white-50">Sign In To Your Account.</p>
                                                </div>

                                                <div class="col-12">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="em" />
                                                </div>

                                                <div class="col-12 col-lg-6 d-grid">
                                                    <button class="btn btn-primary" onclick="adminVerification();">
                                                        Send Verification Code to Login
                                                    </button>
                                                </div>

                                                <div class="col-12 col-lg-6 d-grid">
                                                    <button class="btn btn-danger">Back to Customer Login</button>
                                                </div>

                                                <div class="col-12 text-center d-none d-lg-block fixed-bottom">
                                                    <p class="fw-bold text-black-50">&copy; 2022 eShop.lk All Rights Reserved.</p>
                                                </div>

                                                <!-- modal-- -->
                                                <div class="modal" tabindex="-1" id="verificationModal">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Admin Verification</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label class="form-label">Enter the verification code you got by an email</label>
                                                                <input type="text" class="form-control" id="vcode" />
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-primary" onclick="verify();">Verify</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- modal-- -->

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>