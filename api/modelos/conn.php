<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "dbecommerce";

define("CONN", mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName));

if (!CONN) {
    die("Connection failed: " . mysqli_connect_error());
}

?>