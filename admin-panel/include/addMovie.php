<?php
session_start();
require('../../main-website/include/config.php');
$movieTitle = $_POST["title"];
$movieGenre = $_POST["genre"];
$movieDescription = $_POST["description"];
$movieImage = $_POST["image"];
$moviePrice = $_POST["price"];
$movieStartDate = $_POST["start_date"];
$movieEndDate = $_POST["end_date"];
$movieStartTime = $_POST["start_time"];
$movieFrequency = $_POST["frequency"];
$movieSeats = $_POST["seats"];

$query = mysqli_query($sql, "INSERT INTO movies (title, genre, description, image, price, begin_date, end_date, frequency, start_time, total_seats_count)
                           VALUES ('$movieTitle', '$movieGenre', '$movieDescription', '$movieImage', '$moviePrice', '$movieStartDate', '$movieEndDate', '$movieFrequency', '$movieStartTime', '$movieSeats')");

header("Location: ../moviesList.php");