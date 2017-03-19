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



$topten = mysql_query("SELECT * FROM modkill ORDER BY id ASC LIMIT 0,10");

?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Recent Modkills</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<br>

<br><table width="100%" cellpadding="0" cellspacing="1" align="center">
<tr><td width="100%" bgcolor="#222222" align="center" NOWRAP colspan="4"><font color="white" size="1" face="verdana"><b>Last 50 Modkilled</b></font></td></tr>
<tr><td width="15%" bgcolor="#333333" align="center" NOWRAP><font color="white" size="1" face="verdana">Victim</font></td><td width="15%" bgcolor="#333333" align="center" NOWRAP><font color="white" size="1" face="verdana">Rank</font></td><td width="15%" bgcolor="#333333" align="center" NOWRAP><font color="white" size="1" face="verdana">Killer</font></td><td width="55%" bgcolor="#333333" align="center" NOWRAP><font color="white" size="1" face="verdana">Reason</font></td></tr>
<?
$lastmod = mysql_query("SELECT * FROM modkill ORDER BY id DESC LIMIT 0,50");

 while($lasttenmodkilled = mysql_fetch_array($lastmod)){
$reason = html_entity_decode($lasttenmodkilled['reason'],ENT_NOQUOTES);
$name = $lasttenmodkilled['victim'];
$killer = $lasttenmodkilled['killer'];

$modranks = $lasttenmodkilled['rankid'];
$etest = mysql_query("SELECT username FROM entertainers WHERE username  = '$name'");
$etests = mysql_num_rows($etest);

if($etests > '0'){$modrank = '<b>Entertainer</b>';}
elseif($modranks == '1'){ $modrank = 'Tramp'; }
elseif($modranks == '2'){ $modrank = 'Citizen';}
elseif($modranks == '3'){ $modrank = 'Wise Guy';}
elseif($modranks == '4'){ $modrank = 'Thug';}
elseif($modranks == '5'){ $modrank = 'Respected Thug';}
elseif($modranks == '6'){ $modrank = 'Mobster';}
elseif($modranks == '7'){ $modrank = 'Respected Mobster';}
elseif($modranks == '8'){ $modrank = 'Assassin';}
elseif($modranks == '9'){ $modrank = 'Respected Assassin';}
elseif($modranks == '10'){ $modrank = 'Mafioso';}
elseif($modranks == '11'){ $modrank = 'Respected Mafioso';}
elseif($modranks == '12'){ $modrank = 'Underboss';}
elseif($modranks == '13'){ $modrank = 'Respected Underboss';}
elseif($modranks == '14'){ $modrank = 'Boss';}
elseif($modranks == '15'){ $modrank = 'Respected Boss';}
elseif($modranks == '16'){ $modrank = 'Godfather';}
elseif($modranks == '17'){ $modrank = '<b>Respected Godfather</b>';}
elseif($modranks == '18'){ $modrank = '<b>Gangster</b>';}
elseif($modranks == '19'){ $modrank = '<b>Respected Gangster</b>';}
elseif($modranks == '20'){ $modrank = '<b>Don</b>';}
elseif($modranks == '21'){ $modrank = '<b>Respected Don</b>';}
elseif($modranks == '22'){ $modrank = '<b>Tough Don</b>';}
elseif($modranks == '25'){ $modrank = '<b>Entertainer Manager</b>';}
elseif($modranks == '50'){ $modrank = '<b>Moderator</b>';}
elseif($modranks == '75'){ $modrank = '<b>HDO Manager</b>';}
elseif($modranks == '100'){ $modrank = '<b>Administrator</b>';}
else{$modrank = '';}
$etests = 0;
echo"<tr><td height=10 width=15% bgcolor=#222222 NOWRAP><a href=viewprofile.php?username=$name><font color=white size=1 face=verdana>$name</font></a></td><td height=10 width=15% bgcolor=#222222 NOWRAP><font color=white size=1 face=verdana>$modrank</font></td><td height=10 width=15% bgcolor=#222222 NOWRAP><a href=viewprofile.php?username=$killer><font color=white size=1 face=verdana>$killer</font></a></td><td height=10 width=55% bgcolor=#222222 NOWRAP><font color=white size=1 face=verdana>$reason</font></td></tr>";}?>
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