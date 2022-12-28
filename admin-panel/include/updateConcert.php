<?php
session_start();
require('../../main-website/include/config.php');

$concertTitle = $_POST["title"];
$option = $_POST["optionsList"];
$newInfo = $_POST["newInfo"];

var_dump($concertTitle);
var_dump($option);
var_dump($newInfo);

$query = mysqli_query($sql, "UPDATE concerts
                            SET " . $option . " = '" .$newInfo. "'
                            WHERE title = '".$concertTitle."'" );


header("Location: ../concertsList.php");