<?php 

include_once 'bshh.php'; 

$connection = mysqli_connect("localhost", "root", "offline") or die ('Error in Database Connection please contact us at Admin@ModernMafia.co.uk');
mysqli_select_db($connection, "TS");

$alloks = 1; // tf is this
?>