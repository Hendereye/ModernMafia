<?php
include_once 'includes/bshh.php';
$dbConnection = mysqli_connect("localhost","root","LocalHost123!","mm");

if (mysqli_connect_errno()) { die("Failed to connect to MySQL: " . mysqli_connect_error()); }
?>