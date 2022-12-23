<?php
session_start();
if (!$_SESSION['LOGGED_IN']) {
    header("Location: index.php");
}
require('/include/config.php');
echo "Εδώ είναι το admin panel, Ηλία βρες κανά πιασάρικο template να βάλουμε";
?>