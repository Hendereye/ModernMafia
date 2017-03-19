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
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 

$gangsterusername = $usernameone;

$getuserinfoarray = $statustesttwo;
$rank = $getuserinfoarray['rankid'];

if($rank < 25){die(' ');}




?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Entertainers List</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<br>

<br><table width="100%" cellpadding="0" cellspacing="1" align="center">
<tr><td width="100%" bgcolor="#222222" align="center" NOWRAP colspan="3"><font color="white" size="1" face="verdana"><b>Entertainers</b></font></td></tr>
<tr><td width="40%" bgcolor="#333333" align="center" NOWRAP><font color="white" size="1" face="verdana">Username:</font></td><td width="20%" bgcolor="#333333" align="center" NOWRAP><font color="white" size="1" face="verdana">Status:</font><td width="20%" bgcolor="#333333" align="center" NOWRAP><font color="white" size="1" face="verdana">Pen points:</font></td></tr>
<?
$entertainers = mysql_query("SELECT * FROM users WHERE ent = '1'");

while($etainers = mysql_fetch_array($entertainers)){
$name = $etainers['username'];
$by = $etainers['status'];

$status = $etainers['status'];
$pts = $etainers['penpoints'];

if($status == 'Dead'){$color = 'red';$fcolor = '<font color=black face=verdana size=1><b>';}else{$color = '#222222';$fcolor = '<font color=white face=verdana size=1><b>';}

echo"<tr><td height=10 width=40% bgcolor=$color  NOWRAP><a href=viewprofile.php?username=$name>$fcolor$name</b></font></a></td><td height=10 width=40% bgcolor=$color NOWRAP><a href=viewprofile.php?username=$by>$fcolor$by</b></font></a></td><td height=10 width=20% bgcolor=$color NOWRAP>$fcolor$pts</b></font></td></tr>";}?>
</table><br><br>

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