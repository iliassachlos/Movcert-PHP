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
$concertBackgroundImage = $_POST["background"];

$query = mysqli_query($sql, "INSERT INTO concerts (title, genre, description, image, price, begin_date, end_date, frequency, start_time, total_seats_count, concert_background_image)
                           VALUES ('$concertTitle', '$concertGenre', '$concertDescription', '$concertImage', '$concertPrice', '$concertStartDate', '$concertEndDate', '$concertFrequency', '$concertStartTime', '$concertSeats', '$concertBackgroundImage')");


header("Location: ../concertsList.php");