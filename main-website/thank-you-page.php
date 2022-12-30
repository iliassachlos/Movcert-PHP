<?php
session_start();
require("include/config.php");

// Get URL Params
$url = $_SERVER['REQUEST_URI'];
$urlComponents = parse_url($url);
parse_str($urlComponents['query'], $params);

$ticketType = $params["booking"];
$id = $params["id"];

// Create Specific Query By Ticket Type
if ($ticketType == "movie") {
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
} elseif ($ticketType == "concert") {
    $query = mysqli_query($sql, "SELECT * FROM concerts WHERE id='$id'");
    $row = mysqli_fetch_all($query);
    $concertID = array();
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
        $backgroundImage = $row[$i][11];
    }
}
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

    <section class="site-hero overlay" style="background-image: url(<?php echo ($backgroundImage) ?>)"
        data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row site-hero-inner justify-content-center align-items-center">
                <section class="section contact-section" id="next">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12" data-aos="fade-up" data-aos-delay="100">
                                <form action="index.php" class="bg-white p-md-5 p-4 mb-5 border">
                                    <div class="row">
                                        <div class="col-md-12 form-group text-center">
                                            <label class="text-black font-weight-bold text-center" for="username">Thank
                                                You!</label>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                            <button type="submit" class="btn text-white" style="background-color: #ffba5a">Back To Home</button>
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