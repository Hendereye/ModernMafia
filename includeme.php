<?php


$bar =  $_SERVER['PHP_SELF'];

include 'includes/connection.php'; 
 
error_reporting(0);
$time = time();


$sessionidbefore = $_COOKIE['PHPSESSID'];
$userip = $_SERVER[REMOTE_ADDR]; 



$saturate = "/[^a-z0-9]/i";
$sessionid = preg_replace($saturate,"",$sessionidbefore);
$time = time();


$doit = mt_rand(0,2000);

$timetime = time();
$newbuf = $timetime + 1800;






$sessionidtest = mysql_query("SELECT * FROM usersonline WHERE session = '$sessionid' AND ip = '$userip'");
$sessioncheck = mysql_num_rows($sessionidtest);

$getusername = mysql_fetch_array($sessionidtest);
$usernameone = $getusername['username'];






$useronlineip = $getusername['ip'];
$usasid = $getusername['id'];



$statustest = mysql_query("SELECT * FROM users WHERE ID = '$usasid'");
$statustesttwo = mysql_fetch_array($statustest);
$deadalive = $statustesttwo['status'];
$mails = $statustesttwo['mail'];
$coon = $statustesttwo['coon'];
$ida = $statustesttwo['ID'];
$passy = $statustesttwo['password'];
$tips = $statustesttwo['tips'];
$stop = $statustesttwo['stop'];
$pointss = $statustesttwo['points'];
$pts = $statustesttwo['penpoints'];
$nwa = $statustesttwo['newee'];
$myrank = $statustesttwo['rankid'];
$usermd = md5($statustesttwo['username']);




$tym = time();

if($pts > '8'){die('<font color=black face=verdana size=1><b>Too many penalty points!</b></font>');}

if(isset($_COOKIE['PHPSESSID']))
{

if (!preg_match("/^[a-z0-9]{5,35}$/i", $_COOKIE["PHPSESSID"])) {
die('<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">');
}


elseif($sessioncheck == 0) {
die('<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">');
}

elseif($sessioncheck > 1) {
 mysql_query("DELETE FROM usersonline WHERE session = '$sessionid' AND ip = '$userip' AND id != '$ida'");

}

elseif($useronlineip != $userip) {
mysql_query("DELETE FROM usersonline WHERE session = '$sessionid'");
die('<font color="black" face="verdana" size="1"><b>Another IP adress has logged into your account. Your current session has been destroyed.</b></font>');
}



}

elseif(!$_COOKIE['PHPSESSID'])
{ 
die('<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">');
}

 
?>