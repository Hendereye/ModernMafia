<? include 'included.php'; ?>
<html>
<head>
<title>Mafia Society</title><link rel="stylesheet" href="more/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="shortcut icon" href="/more/icon.png" type="image/x-icon" />
</head>
<body background="/more/bgtest.png">
<script type="text/javascript">
function emotion(em) { document.smiley.editprofile.value=document.smiley.editprofile.value+em;}
</script>
<table width="100%" height="335" align="center" cellpadding="0" cellspacing="3">
<tr>
<td width="250" height="25"></td>
<td width="100%">
</td>
<td width="250"></td>
</tr>

<tr>
<td width="250" valign="top">
<? include 'leftmenu.php'; ?>
</td>
<td width="100%" valign="top">
<?php 
$saturate = "/[^a-z0-9]/i";
$saturates = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$idraw = $_GET['id'];
$id = preg_replace($saturates,"",$idraw);
$userip = $_SERVER[REMOTE_ADDR]; 

$gangsterusername = $usernameone;

$getuserinfoarray = $statustesttwo;
$rank = $getuserinfoarray['rankid'];

if($rank < 25){die(' ');}


$idcheck = mysql_num_rows(mysql_query("SELECT * FROM users WHERE ID = '$id'"));

if(isset($_GET['id'])){
if($idcheck < '1'){die('<font color=white face=verdana size=1>ID is invalid</font>');}
else{

$getnam = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE ID = '$id'"));
$na = $getnam['username'];
mysql_query("UPDATE users SET penpoints = '0' WHERE ID = '$id'");
mysql_query("DELETE FROM penpoints WHERE username = '$na'");
echo"<font color=white face=verdana size=1>Pen points cleared!</font>";}}



$topten = mysql_query("SELECT * FROM users WHERE status != 'Dead' AND penpoints > '0' ORDER BY penpoints DESC");

?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Penalty points</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<br>

<table cellpadding=0 cellspacing=1 width=35% align="center">
<tr><td width=55% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Username</b>:</font></td><td width=20% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Reasons</b>:</font></td><td width=25% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Total</b>:</font></td></tr><?
while($toptena = mysql_fetch_array($topten)){
$refname = $toptena['username'];
$refc = $toptena['penpoints'];
$playerid = $toptena['ID'];
echo"<tr><td width=55% bgcolor=#222222 NOWRAP><a href=viewprofile.php?username=$refname><font color=white face=verdana size=1>$refname</font></a><td width=20% bgcolor=#222222 NOWRAP><a href=penreason.php?user=$refname><font color=gray face=verdana size=1> Reasons</font></a></td><td width=25% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1>$refc</font><a href=viewpenpoints.php?id=$playerid><font color=gray face=verdana size=1> Clear</font></a></td></tr>"; }
?></table></center>
<br>
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

</body></html>