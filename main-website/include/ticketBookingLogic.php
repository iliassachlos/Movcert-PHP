<?php
session_start();
require('config.php');

$url = $_SERVER['REQUEST_URI'];
$urlComponents = parse_url($url);
parse_str($urlComponents['query'], $params);

$ticketType = $params["booking"];
$id = $params["id"];
$tickets = $_POST["tickets"];

if ($ticketType == "movie") {
    $query = mysqli_query($sql, "SELECT total_seats_count FROM movies WHERE id='$id'");
    $row = mysqli_fetch_all($query);
    $seatsAvailable = array();
    for ($i = 0; $i < sizeof($row); $i++) {
        $seatsAvailable[$i] = $row[$i][0];
    }
}elseif($ticketType == "concert"){
    $query = mysqli_query($sql, "SELECT total_seats_count FROM concerts WHERE id='$id'");
    $row = mysqli_fetch_all($query);
    $seatsAvailable = array();
    for ($i = 0; $i < sizeof($row); $i++) {
        $seatsAvailable[$i] = $row[$i][0];
    }
}

//Possible Errors Checking
if($seatsAvailable[0] == 0){
    header("Location: ../ticket-booking.php?booking=$ticketType&id=$id&error=1"); //Error 1 : No Tickets Available
}elseif($tickets > $seatsAvailable[0]){
    header("Location: ../ticket-booking.php?booking=$ticketType&id=$id&error=2"); //Error 2 : Cant book so many tickets
} else if($ticketType == "movie"){
    $ticketQuery = mysqli_query($sql, "UPDATE movies SET total_seats_count = total_seats_count-$tickets WHERE id=$id;");
    header("Location: ../thank-you-page.php?booking=$ticketType&id=$id");
}elseif($ticketType == "concert"){
    $ticketQuery = mysqli_query($sql, "UPDATE concerts SET total_seats_count = total_seats_count-$tickets WHERE id=$id;");
    header("Location: ../thank-you-page.php?booking=$ticketType&id=$id");
}