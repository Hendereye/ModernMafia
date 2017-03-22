<?php
$dbConnection = mysqli_connect(
    $config['database']['hostname'],
    $config['database']['username'],
    $config['database']['password'],
    $config['database']['name']);

if (!$dbConnection) { 
    exit('Failed to connect to the database.');
}
?>