<?php
session_start();
require("include/config.php");

$id = $_GET['id'];
$query = mysqli_query($sql, "SELECT * FROM movies WHERE id='$id'");
$row = mysqli_fetch_all($query);
$movieID = array();
$movieTitle = array();
$movieGenre = array();
$movieDescription = array();
$movieImage = array();
$moviePrice = array();
$movieStartDate = array();
$movieEndDate = array();
$movieFrequency = array();
$movieStartTime = array();
$movieSeats = array();
$backgroundImage = array();
for ($i = 0; $i < sizeof($row); $i++) {
    $movieID[$i] = $row[$i][0];
    $movieTitle[$i] = $row[$i][1];
    $movieGenre[$i] = $row[$i][2];
    $movieDescription[$i] = $row[$i][3];
    $movieImage[$i] = $row[$i][4];
    $moviePrice[$i] = $row[$i][5];
    $movieStartDate[$i] = $row[$i][6];
    $movieEndDate[$i] = $row[$i][7];
    $movieFrequency[$i] = $row[$i][8];
    $movieStartTime[$i] = $row[$i][9];
    $movieSeats[$i] = $row[$i][10];
    $backgroundImage[$i] = $row[$i][11];
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Movcert - Movies</title>
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

    <section class="site-hero inner-page overlay" style="background-image: url(<?php echo($backgroundImage[0]) ?>);"
        data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row site-hero-inner justify-content-center align-items-center">
                <div class="col-md-10 text-center" data-aos="fade">
                    <h1 class="heading mb-3"><?php echo($movieTitle[0]) ?></h1>
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
                    <div class="container text-center">
                        <h1>TEST</h1>
                    </div>
                    
                </div>


            </div>
        </div>
    </section>


    <section class="section">
        <div class="container">

            <div class="row">
                <?php
                for ($i = 0; $i < sizeof($row); $i++) {
                ?>
                <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up">
                    <a href="#" class="room">
                        <figure class="img-wrap">
                            <?php echo '<img src="' . $movieImage[$i] . '" alt="Free website template" width="400px" height="500px">' ?>
                        </figure>
                        <div class="p-3 text-center room-info">
                            <?php echo '<h2>' . $movieTitle[$i] . '</h2>' ?>
                            <?php echo ' <span class="text-uppercase letter-spacing-1">Price ' . $moviePrice[$i] . '€</span>' ?>
                        </div>
                    </a>
                </div>
                <?php } ?>

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