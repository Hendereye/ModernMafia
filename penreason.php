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
$userip = $_SERVER[REMOTE_ADDR]; 
$userraw = $_GET['user'];
$user = preg_replace($saturate,"",$userraw);

$gangsterusername = $usernameone;

$getuserinfoarray = $statustesttwo;
$rank= $getuserinfoarray['rankid'];


if($rank < '25'){die(' ');}

$points = mysql_query("SELECT * FROM penpoints WHERE username = '$user' ORDER BY id DESC");
$pointrows = mysql_num_rows($points);

?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Reasons</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<br>
<table cellpadding=0 cellspacing=1 width=35% align="center">
<tr><td width=100% bgcolor=#333333 NOWRAP align="center"><font color=white face=verdana size=1><b>Reasons</b>:</font></td></tr>
<?
if($pointrows < '1'){echo"<tr><td width=100% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1>This user has no penalty points!</font></td></tr>";}else{
while($pointsreasons = mysql_fetch_array($points)){
$reason = $pointsreasons['reason'];
echo"<tr><td width=100% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1>$reason</font></td></tr>";}}?></table><br>
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