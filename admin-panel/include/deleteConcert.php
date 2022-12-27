<?php
session_start();
require('../../main-website/include/config.php');
$concertTitle = $_POST["title"];

$query = mysqli_query($sql, "DELETE FROM concerts WHERE title LIKE '" .$concertTitle. "'");

header("Location: ../concertsList.php");