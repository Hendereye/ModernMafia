<? include 'included.php'; ?>
<html>
<head>
<link rel="stylesheet" href="more/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
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
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$gangsterusername = $usernameone;


$getuserinfoarray = $statustesttwo;


$attempts = mysql_query("SELECT * FROM attempts WHERE username = '$usernameone' ORDER BY id DESC LIMIT 0,75");

$attemptscount = mysql_num_rows($attempts);

$attemptsb = mysql_query("SELECT * FROM attempts WHERE victim = '$gangsterusername' ORDER BY id DESC LIMIT 0,75");

$attemptscounts = mysql_num_rows($attemptsb);

?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Attempts</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">

<br><table cellpadding=0 cellspacing=2 width=45% align="center">
<tr><td width=100% bgcolor=#222222 NOWRAP align="center"><font color=silver face=verdana size=2>Last 75 attempts by you</font></td></tr><?

if($attemptscount == 0){echo"<tr><td width=100% bgcolor=#333333 NOWRAP><center><font color=silver face=verdana size=1>You have not made any attempts!</font></center></td></tr>";}else{while($attempt = mysql_fetch_array($attempts)){
$victim = $attempt['victim'];
$type = $attempt['type'];
if($type == 1){echo"<tr><td width=100% bgcolor=#333333 NOWRAP><font color=silver face=verdana size=1>You shot at </font><a href=viewprofile.php?username=$victim><font color=silver face=verdana size=1>$victim</a>! He died from the shots!</font></td></tr>";}
else{echo"<tr><td width=100% bgcolor=#333333 NOWRAP><font color=silver face=verdana size=1>You shot at </font><a href=viewprofile.php?username=$victim><font color=silver face=verdana size=1>$victim</a>! He survived the shots!</font></td></tr>";}}} ?>
</table>

<br><table cellpadding=0 cellspacing=2 width=45% align="center">

<tr><td width=100% bgcolor=#222222 NOWRAP align="center"><font color=silver face=verdana size=2>Last 75 attempts at you</font></td></tr>
<?

if($attemptscounts == 0){echo"<tr><td width=100% bgcolor=#333333 NOWRAP><center><font color=silver face=verdana size=1>Nobody has attempted you!</font></center></td></tr>";}else{while($attemptb = mysql_fetch_array($attemptsb)){
$by = $attemptb['username'];
$types = $attemptb['type'];
if($types == 1){echo"<tr><td width=100% bgcolor=#333333 NOWRAP><a href=viewprofile.php?username=$by><font color=silver face=verdana size=1>$by</a> shot at you! and you died!</font></td></tr>";}
else{echo"<tr><td width=100% bgcolor=#333333 NOWRAP><a href=viewprofile.php?username=$by><font color=silver face=verdana size=1>$by</a> shot at you! but you survived!</font></td></tr>";}}} ?>
</table>
<br><br>

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