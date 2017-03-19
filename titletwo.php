<?php
include 'includes/connection.php'; 
 



$userids = mysql_real_escape_string($_GET['userid']);

$saturate = "/[^a-z0-9]/i";
$saturatesd = "/[^0-9]/i";

$userid = preg_replace($saturate,"",$userids);
$time = time();

$statustest = mysql_query("SELECT * FROM users WHERE ID = '$userids' LIMIT 1");
$statustesttwo = mysql_fetch_array($statustest);
$mails = $statustesttwo['mail'];



 if($mails >= '1'){echo"Mafian Society | New Mail!";}else{echo"Mafian Society";}
?>