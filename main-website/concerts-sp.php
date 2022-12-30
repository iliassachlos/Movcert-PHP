<?php
session_start();
require("include/config.php");

$id = $_GET['id'];
$query = mysqli_query($sql, "SELECT * FROM concerts WHERE id='$id'");
$row = mysqli_fetch_all($query);
$movieID = array();
$concertTitle = array();
$concertGenre = array();
$concertDescription = array();
$concertImage = array();
$concertPrice = array();
$concertStartDate = array();
$concertEndDate = array();
$concertFrequency = array();
$concertStartTime = array();
$concertSeats = array();
$backgroundImage = array();
for ($i = 0; $i < sizeof($row); $i++) {
    $concertID[$i] = $row[$i][0];
    $concertTitle[$i] = $row[$i][1];
    $concertGenre[$i] = $row[$i][2];
    $concertDescription[$i] = $row[$i][3];
    $concertImage[$i] = $row[$i][4];
    $concertPrice[$i] = $row[$i][5];
    $concertStartDate[$i] = $row[$i][6];
    $concertEndDate[$i] = $row[$i][7];
    $concertFrequency[$i] = $row[$i][8];
    $concertStartTime[$i] = $row[$i][9];
    $concertSeats[$i] = $row[$i][10];
    $backgroundImage[$i] = $row[$i][11];
}
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
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css"
        integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">

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
                                            if (isset($_SESSION["id"])) {
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

    <section class="site-hero inner-page overlay" style="background-image: url(<?php echo ($backgroundImage[0]) ?>);"
        data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row site-hero-inner justify-content-center align-items-center">
                <div class="col-md-10 text-center" data-aos="fade">
                    <h1 class="heading mb-3">
                        <?php echo ($concertTitle[0]) ?>
                    </h1>
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
                        <h1>
                            <?php echo ($concertGenre[0]) ?>
                        </h1>
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
                    <div class="col-md-6 col-lg-6 mb-5" data-aos="fade-up">
                        <figure class="img-wrap">
                            <?php echo '<img src="' . $concertImage[$i] . '" alt="Free website template" width="400px" height="400px">' ?>
                        </figure>

                    </div>
                    <div class="col-md-6 col-lg-6 mb-5" data-aos="fade-up">
                        <?php echo '<h4>' . $concertDescription[$i] . '</h4>' ?>
                        <hr />
                        <p>
                            <i class="fa fa-solid fa-calendar"></i>
                            <?php echo ('From : ' . $concertStartDate[0] . '&nbsp&nbsp&nbsp Till : ' . $concertEndDate[0]) ?>
                        </p>
                        <p>
                            <i class="fa fa-solid fa-ticket"></i>
                            <?php echo ("Tickets Available : " . $concertSeats[0]) ?>
                        </p>
                        <p>
                            <i class="fa fa-duotone fa-film"></i>
                            <?php
                            if ($concertFrequency[0] == 0) {
                                echo ("Frequency : Once");
                            } elseif ($concertFrequency[0] == 1) {
                                echo ("Frequency : Everyday");
                            } elseif ($concertFrequency[0] == 2) {
                                echo ("Frequency : Every 2 Days");
                            }
                            ?>
                        </p>
                        <?php echo ' <span class="text-uppercase letter-spacing-1">Price ' . $concertPrice[$i] . '€</span>' ?>
                        <br>
                        <br>
                        <br>
                        <p>
                            <?php
                            if ($concertSeats[0] == 0) {
                                echo ("No More Seats Available!");
                            } else {
                                echo ('<a href="ticket-booking.php?booking=concert&id='.$id.'">');
                                echo ('<button type="button" class="btn btn-warning" style="color: white">Book A Ticket</button>');
                                echo ('</a>');
                            }
                            ?>
                        </p>
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