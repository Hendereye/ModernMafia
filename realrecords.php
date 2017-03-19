<? include 'included.php';
if($myrank < '25'){die(' ');} ?>
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

$topten = mysql_query("SELECT * FROM users WHERE rankid <= '24' AND rankid >= '2' AND status = 'Alive' ORDER BY rankid DESC");





?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>mafia society records</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
 
<br><br><table cellpadding=0 cellspacing=1 width=35% align="center">
<tr><td width=100% bgcolor=#222222 NOWRAP colspan="2" align="center"><font color=white face=verdana size=1><b>Ranks</b></font></td></tr>
<tr><td width=75% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Username</b>:</font></td><td width=25% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Rank</b>:</font></td></tr><?
while($toptens = mysql_fetch_array($topten)){
$topname = $toptens['username'];
$toprankid = $toptens['rankid'];
$i++;

if($toprankid == '1'){ $userrank = 'Tramp';}
elseif($toprankid == '2'){ $userrank = 'Citizen';}
elseif($toprankid == '3'){ $userrank = 'Wise Guy';}
elseif($toprankid == '4'){ $userrank = 'Thug';}
elseif($toprankid == '5'){ $userrank = 'Respected Thug';}
elseif($toprankid == '6'){ $userrank = 'Mobster';}
elseif($toprankid == '7'){ $userrank = 'Respected Mobster';}
elseif($toprankid == '8'){ $userrank = 'Assassin';}
elseif($toprankid == '9'){ $userrank = 'Respected Assassin';}
elseif($toprankid == '10'){ $userrank = 'Mafioso';}
elseif($toprankid == '11'){ $userrank = 'Respected Mafioso';}
elseif($toprankid == '12'){ $userrank = 'Underboss';}
elseif($toprankid == '13'){ $userrank = 'Respected Underboss';}
elseif($toprankid == '14'){ $userrank = 'Boss';}
elseif($toprankid == '15'){ $userrank = 'Respected Boss';}
elseif($toprankid == '16'){ $userrank = 'Godfather';}
elseif($toprankid == '17'){ $userrank = 'Respected Godfather';}
elseif($toprankid == '18'){ $userrank = 'Gangster';}
elseif($toprankid == '19'){ $userrank = 'Respected Gangster';}
elseif($toprankid == '20'){ $userrank = 'Don';}
elseif($toprankid == '21'){ $userrank = 'Respected Don';}
elseif($toprankid == '22'){ $userrank = 'Tough Don';}
else{$userrank = 'Error contact admin';}
echo"<tr><td width=75% bgcolor=#222222 NOWRAP><a href=viewprofile.php?username=$topname><font color=white face=verdana size=1>$topname</font></a></td><td width=25% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1>$userrank</font></td></tr>"; }
?></table><font color=white face=verdana size=1>
<?echo$i;?></font>
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