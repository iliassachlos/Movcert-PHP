<?php
session_start();
require('../../main-website/include/config.php');

$movieTitle = $_POST["title"];
$option = $_POST["optionsList"];
$newInfo = $_POST["newInfo"];

$query = mysqli_query($sql, "UPDATE movies
                            SET " . $option . " = '" .$newInfo. "'
                            WHERE title = '".$movieTitle."'" );

header("Location: ../moviesList.php");