<? include 'included.php'; ?>
<?
$timeraw = time();
$time = $timeraw + 43200;
$saturate = "/[^a-z0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$playerip = $_SERVER['REMOTE_ADDR'];
$userinfosql = mysql_query("SELECT * FROM usersonline WHERE session = '$sessionid' AND ip = '$playerip'");
$userinfo = mysql_fetch_array($userinfosql);
$username = $userinfo['username'];
$usersql = mysql_query("SELECT * FROM users WHERE username = '$username'");
$userarray = mysql_fetch_array($usersql);
$userswiss = $userarray['swiss'];
$rankid = $userarray[rankid];

if($rankid < '75'){die(' ');}

$jailtest = mysql_query("SELECT * FROM jail WHERE username  = '$username'");
$jailtester = mysql_num_rows($jailtest);
if($jailtester != '0'){die(include 'jail.php'); }
?>
<html>
<head>
<title>Mafia Society</title><link rel="stylesheet" href="more/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="shortcut icon" href="/more/icon.png" type="image/x-icon" />
</head>
<body background="/more/bgtest.png">
<table width="100%" height="335" align="center" cellpadding="0" cellspacing="3">
<tr>
<td width="250" height="25"></td>
<td width="100%"></td>
<td width="250"></td>
</tr>

<tr>
<td width="250" valign="top">
<? include 'leftmenu.php'; ?>
</td>
<td width="100%" valign="top">
<?php
$saturated = "/[^0-9]/i";
$saturatedname = "/[^a-z0-9]/i";
$getname = $_GET['username'];
$name = preg_replace($saturatedname,"",$getname);


$lasttensql = mysql_query("SELECT * FROM pointssent WHERE username = '$name' ORDER BY id DESC LIMIT 0,100");

$lasttenrsql = mysql_query("SELECT * FROM pointssent WHERE sent = '$name' ORDER BY id DESC LIMIT 0,100");

?>
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Point transactions</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<div align ="center">
<br><table cellpadding="0" cellspacing="1" align="center" class="textbox">
<tr><td width="180" bgcolor="gray" align="center" NOWRAP><font color="black" size="1" face="verdana"><b>Last 10 Sent</b></font></td></tr>
<?php 
while($lasttenarray = mysql_fetch_array($lasttensql)){
$lasttento = $lasttenarray['sent'];
$qt = $lasttenarray['quicktrade'];
$lasttenamount = number_format($lasttenarray['amount']);
echo"<tr><td bgcolor=#222222 NOWRAP><font color=white size=1 face=verdana>$name sent $lasttenamount points to </font><a href=viewprofile.php?username=$lasttento><font color=white size=1 face=verdana>$lasttento</font></a></td></tr>";}?>
<tr><td width="180" bgcolor="gray" align="center" NOWRAP><font color="black" size="1" face="verdana"><b>Last 10 Received</b></font></td></tr>
<?php 
while($lasttenrarray = mysql_fetch_array($lasttenrsql)){
$lasttenrto = $lasttenrarray['username'];
$qt = $lasttenrarray['quicktrade'];
$lasttenramount = number_format($lasttenrarray['amount']);
echo"<tr><td bgcolor=#222222 NOWRAP><font color=white size=1 face=verdana>$name recieved $lasttenramount points from </font><a href=viewprofile.php?username=$lasttenrto><font color=white size=1 face=verdana>$lasttenrto</font></a></td></tr>";}?>
</table>
</div>

</td>
<td width="8" background="/more/rightb.png" NOWRAP></td>
</tr>

<tr>
<td width="8" height="9" background="/more/bottomleft.png"></td>
<td height="9" background="/more/bottom.png"></td>
<td width="8" height="9" background="/more/bottomright.png"></td>
</tr>
</table>
</td>
<td width="250" valign="top">
<? include 'rightmenu.php'; ?>
</td>
</tr>
</table>

</body>
<head><META HTTP-EQUIV="Pragma" CONTENT="no-cache"></head></html>