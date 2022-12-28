<?php
session_start();
?>
<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Movcert - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" type="text/css"
        href="//fonts.googleapis.com/css?family=|Roboto+Sans:400,700|Playfair+Display:400,700">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/fancybox.min.css">
    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <header class="site-header js-site-header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-6 col-lg-4 site-logo" data-aos="fade"><a href="index.php">Movcert</a></div>
                <div class="col-6 col-lg-8">
                    <div class="site-menu-toggle js-site-menu-toggle" data-aos="fade">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <!-- END menu-toggle -->

                    <div class="site-navbar js-site-navbar">
                        <nav role="navigation">
                            <div class="container">
                                <div class="row full-height align-items-center">
                                    <div class="col-md-6 mx-auto">
                                        <h1 style="color: white">Login To Continue To Admin Panel</h1>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="site-hero overlay" style="background-image: url(images/finalcollage.png)"
        data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row site-hero-inner justify-content-center align-items-center">
                <section class="section contact-section" id="next">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12" data-aos="fade-up" data-aos-delay="100">

                                <form action="include/loginLogic.php" method="post"
                                    class="bg-white p-md-5 p-4 mb-5 border">
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <?php
                                            if ($_GET["error"] == true) {
                                            ?>
                                            <div class="alert alert-danger">
                                                <strong>Wrong Username or Password</strong><br> Please Try Again
                                            </div>
                                            <?php
                                            }
                                            ?>
                                            <label class="text-black font-weight-bold" for="username">Username</label>
                                            <input type="text" id="username" name="username" class="form-control ">
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label class="text-black font-weight-bold" for="password">Password</label>
                                            <input type="password" id="password" name="password" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button class="btn text-white" style="background-color: #ffba5a">Login</button>
                                    </div>
                                    <div style="text-align: right">
                                        <a href="index.php">Continue as a guest</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/jquery.timepicker.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>