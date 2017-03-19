<?php
$mysql_server = "localhost";
$mysql_user = "root";
$mysql_password = "offline";
$mysql_database = "ts";
$connection = mysql_connect("$mysql_server","$mysql_user","$mysql_password") or die ("MAJOR UPDATES UNDERWAY!");
$db = mysql_select_db("$mysql_database") or die ("MAJOR UPDATES UNDERWAY!");
?>
 