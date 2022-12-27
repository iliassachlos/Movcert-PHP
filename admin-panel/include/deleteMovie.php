<?php
session_start();
require('../../main-website/include/config.php');
$movieTitle = $_POST["title"];

$query = mysqli_query($sql, "DELETE FROM movies WHERE title LIKE '" .$movieTitle. "'");

header("Location: ../moviesList.php");