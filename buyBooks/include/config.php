<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//create connection

$con=  mysqli_connect('localhost', 'root', '123456', 'book_kart');

// check connection

if(!$con){
    die("connection failed: " . mysqli_connect_error());
}

session_start();