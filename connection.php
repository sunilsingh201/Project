<?php

/*
Database configuration
*/
$dbhost = "localhost";
$dbuser = "root";
$dbpassword ="";
$dbname = "loginsystem";

/*
Forming connection using inbuilt fn mysqli_connect(_,_,_,_) passing four parameters
*/
$conn = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);

// Checking the connection

if (!$conn){
    die("Failed to connect". mysqli_connect_error());
}

























?>