<?php

// create a databse connection
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "phidtech";

// connect to the data base 
$conn = mysqli_connect($servername, $username, $password, $dbName);

if(!$conn){
    echo "Connection not available" .mysqli_connect_error();
    die();
}