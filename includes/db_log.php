<?php

$servername = "localhost";
$port = 8889;
$username = "jakub";
$password = "1234";
$dbName = "registracie";

$conn = mysqli_connect($servername, $username, $password, $dbName, $port);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}