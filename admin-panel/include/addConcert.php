<?php

session_start();
require('../../main-website/include/config.php');
$concertTitle = $_POST["title"];
$concertGenre = $_POST["genre"];
$concertDescription = $_POST["description"];
$concertImage = $_POST["image"];
$concertPrice = $_POST["price"];
$concertStartDate = $_POST["start_date"];
$concertEndDate = $_POST["end_date"];
$concertStartTime = $_POST["start_time"];
$concertFrequency = $_POST["frequency"];
$concertSeats = $_POST["seats"];

// var_dump($concertTitle);
// var_dump($concertGenre);
// var_dump($concertDescription);
// var_dump($concertImage);
// var_dump($concertPrice);
// var_dump($concertStartDate);
// var_dump($concertEndDate);
// var_dump($concertStartTime);
// var_dump($concertFrequency);
// var_dump($concertSeats);

$query = mysqli_query($sql, "INSERT INTO concerts (title, genre, description, image, price, begin_date, end_date, frequency, start_time, total_seats_count)
                           VALUES ('$concertTitle', '$concertGenre', '$concertDescription', '$concertImage', '$concertPrice', '$concertStartDate', '$concertEndDate', '$concertFrequency', '$concertStartTime', '$concertSeats')");


header("Location: ../concertsList.php");