<html><head><META HTTP-EQUIV="Pragma" CONTENT="no-cache"></head>
<?php


sleep((rand(1,600))/100000);


include 'includes/connection.php'; 
mysql_query("UPDATE users SET health = '100' WHERE health > '100'");
mysql_query("UPDATE users SET crewd = '0' WHERE crewid = '0'");
mysql_query("UPDATE users SET rr = '0' WHERE crewid = '0'");
 

$allowed = "/[^a-z0-9]/i";
$getusernameraw = mysql_real_escape_string($_GET['id']);
$getusername = preg_replace($allowed,"",$getusernameraw);



$seshion = mysql_real_escape_string($_COOKIE['PHPSESSID']);
$playerip = $_SERVER['REMOTE_ADDR'];
$playerbrowserbefore = mysql_real_escape_string($_SERVER['HTTP_USER_AGENT']);

$allowed = "/[^a-z0-9\\\\]/i";
$allowedtwo = "/[^a-z0-9\\040\\.\\[\\]\\=\\<\\>\\&#163;\\$\\@\\&\\{\\}\\%\\+\\|\\(\\)\\?\\~\\:\\/\\-\\;\\_\\\\]/i";

$playerbrowser = preg_replace($allowedtwo,"",$playerbrowserbefore);
$sesh = preg_replace($allowed,"",$seshion);

$sessioncheck  = mysql_query("SELECT username FROM usersonline WHERE ip = '$playerip' AND session = '$sesh'");
$sessioncheckresult = mysql_num_rows($sessioncheck);
$sessioncheckarray = mysql_fetch_array($sessioncheck);
$name = $sessioncheckarray['username'];

if($sesh != $getusername){die('<font color=black face=verdana size=1><b>Error.</b></font>');}


if($sessioncheckresult  == '0'){ die('<body bgcolor="white"><font color="black" face="verdana" size="1"><b>Error, your session id cookie is invalid!</b></font></body>'); }

elseif($sessioncheckresult != '0'){ echo('<body bgcolor="white"><font color="black" face="verdana" size="1"><b>You are now logged out!</b></font></body>
<META HTTP-EQUIV="Refresh" CONTENT="1; URL=index.php">');

$logouttime = "INSERT INTO logouttimes(username,ip,browser)
VALUES ('$name', '$playerip','$playerbrowser')";
$logouttimedone = mysql_query($logouttime);

mysql_query("DELETE FROM usersonline WHERE session = '$sesh' AND ip ='$playerip' AND q = '0'");
}
else
{
echo('<META HTTP-EQUIV="Refresh" CONTENT="1; URL=/">
<body bgcolor="white"><font color="black" face="verdana" size="1"><b>Error, you are not logged in!</b></font></body>');

}
mysql_close();
?>
<head><META HTTP-EQUIV="Pragma" CONTENT="no-cache"></head></html>