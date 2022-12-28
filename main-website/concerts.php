<?php
session_start();
require("include/config.php");
?>

<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Movcert - Concerts</title>
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
                                        <ul class="list-unstyled menu">
                                        <li class="active"><a href="index.php">Home</a></li>
                                        <li><a href="concerts.php">Concerts</a></li>
                                        <li><a href="movies.php">Movies</a></li>
                                        <?php
                                            if(isset($_SESSION["id"])){
                                                echo "<li><a href='../admin-panel/admin.php'>Admin Panel</a></li>";
                                            }
                                        ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- END head -->

    <section class="site-hero inner-page overlay" style="background-image: url(images/finalcollage.png)"
        data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row site-hero-inner justify-content-center align-items-center">
                <div class="col-md-10 text-center" data-aos="fade">
                    <h1 class="heading mb-3">Concerts</h1>
                </div>
            </div>
        </div>

        <a class="mouse smoothscroll" href="#next">
            <div class="mouse-icon">
                <span class="mouse-wheel"></span>
            </div>
        </a>
    </section>
    <!-- END section -->

    <section class="section pb-4">
        <div class="container">

            <div class="row check-availabilty" id="next">
                <div class="block-32" data-aos="fade-up" data-aos-offset="-200">

                    <form action="#">
                        <div class="row">
                            <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                                <label for="genre" class="font-weight-bold text-black">Music Genre</label>
                                <div class="field-icon-wrap">
                                <select name="" id="genre" class="form-control">
                                                <option value="">Pop</option>
                                                <option value="">Rock</option>
                                                <option value="">Hip-Hop</option>
                                                <option value="">RnB</option>
                                            </select>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                                <label for="checkout_date" class="font-weight-bold text-black">Check Out</label>
                                <div class="field-icon-wrap">
                                    <div class="icon"><span class="icon-calendar"></span></div>
                                    <input type="text" id="checkout_date" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3 mb-md-0 col-lg-3">
                                <div class="row">
                                    <div class="col-md-6 mb-3 mb-md-0">
                                        <label for="price-range-low" class="font-weight-bold text-black">Price - Low</label>
                                        <div class="field-icon-wrap">
                                            <input type="text" name="price-low" class="form-control">
                                        </div>
                                    </div>  
                                    <div class="col-md-6 mb-3 mb-md-0">
                                        <label for="price-range-high" class="font-weight-bold text-black">Price - High</label>
                                        <div class="field-icon-wrap">
                                            <input type="text" name="price-high" class="form-control ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 align-self-end">
                                <button class="btn btn-primary btn-block text-white">Set Filters</button>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </section>


    <section class="section">
        <div class="container">

            <div class="row">
                <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up">
                    <a href="singlepage.php" class="room">
                        <figure class="img-wrap">
                            <img src="images/img_1.jpg" alt="Free website template" class="img-fluid mb-3">
                        </figure>
                        <div class="p-3 text-center room-info">
                            <h2>Single Room</h2>
                            <span class="text-uppercase letter-spacing-1">90€ | 48 Tickets Available</span>
                        </div>
                    </a>
                </div>

                <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up">
                    <a href="#" class="room">
                        <figure class="img-wrap">
                            <img src="images/img_2.jpg" alt="Free website template" class="img-fluid mb-3">
                        </figure>
                        <div class="p-3 text-center room-info">
                            <h2>Family Room</h2>
                            <span class="text-uppercase letter-spacing-1">120$ / per night</span>
                        </div>
                    </a>
                </div>

                <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up">
                    <a href="#" class="room">
                        <figure class="img-wrap">
                            <img src="images/img_3.jpg" alt="Free website template" class="img-fluid mb-3">
                        </figure>
                        <div class="p-3 text-center room-info">
                            <h2>Presidential Room</h2>
                            <span class="text-uppercase letter-spacing-1">250$ / per night</span>
                        </div>
                    </a>
                </div>

                <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up">
                    <a href="#" class="room">
                        <figure class="img-wrap">
                            <img src="images/img_1.jpg" alt="Free website template" class="img-fluid mb-3">
                        </figure>
                        <div class="p-3 text-center room-info">
                            <h2>Single Room</h2>
                            <span class="text-uppercase letter-spacing-1">90$ / per night</span>
                        </div>
                    </a>
                </div>

                <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up">
                    <a href="#" class="room">
                        <figure class="img-wrap">
                            <img src="images/img_2.jpg" alt="Free website template" class="img-fluid mb-3">
                        </figure>
                        <div class="p-3 text-center room-info">
                            <h2>Family Room</h2>
                            <span class="text-uppercase letter-spacing-1">120$ / per night</span>
                        </div>
                    </a>
                </div>

                <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up">
                    <a href="#" class="room">
                        <figure class="img-wrap">
                            <img src="images/img_3.jpg" alt="Free website template" class="img-fluid mb-3">
                        </figure>
                        <div class="p-3 text-center room-info">
                            <h2>Presidential Room</h2>
                            <span class="text-uppercase letter-spacing-1">250$ / per night</span>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </section>

    <section class="section bg-light">

        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-md-7">
                    <h2 class="heading" data-aos="fade">Great Offers</h2>
                    <p data-aos="fade">Far far away, behind the word mountains, far from the countries Vokalia and
                        Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the
                        coast of the Semantics, a large language ocean.</p>
                </div>
            </div>

            <div class="site-block-half d-block d-lg-flex bg-white" data-aos="fade" data-aos-delay="100">
                <a href="#" class="image d-block bg-image-2" style="background-image: url('images/img_1.jpg');"></a>
                <div class="text">
                    <span class="d-block mb-4"><span class="display-4 text-primary">$199</span> <span
                            class="text-uppercase letter-spacing-2">/ per night</span> </span>
                    <h2 class="mb-4">Family Room</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                        live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics,
                        a large language ocean.</p>
                    <p><a href="#" class="btn btn-primary text-white">Book Now</a></p>
                </div>
            </div>
            <div class="site-block-half d-block d-lg-flex bg-white" data-aos="fade" data-aos-delay="200">
                <a href="#" class="image d-block bg-image-2 order-2"
                    style="background-image: url('images/img_2.jpg');"></a>
                <div class="text order-1">
                    <span class="d-block mb-4"><span class="display-4 text-primary">$299</span> <span
                            class="text-uppercase letter-spacing-2">/ per night</span> </span>
                    <h2 class="mb-4">Presidential Room</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                        live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics,
                        a large language ocean.</p>
                    <p><a href="#" class="btn btn-primary text-white">Book Now</a></p>
                </div>
            </div>

        </div>
    </section>
    <footer class="bg-dark text-center text-lg-start">
        <div class="text-center p-3" style="background-color: #1A1A1A">
            Made With &nbsp; <i class="fa fa-heart"></i> &nbsp; By Alexandros and Elias
        </div>
    </footer>

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