<? include 'included.php';
if($myrank < '25'){die(' ');} ?>
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

$gangsterusernamesql = mysql_query("SELECT * FROM usersonline WHERE session = '$sessionid' AND ip = '$userip'");
$gangsterusernamearray = mysql_fetch_array($gangsterusernamesql);
$gangsterusername = $gangsterusernamearray['username'];

$getuserinfosql = mysql_query("SELECT * FROM users WHERE username = '$gangsterusername'");
$getuserinfoarray = mysql_fetch_array($getuserinfosql);
$getref = $getuserinfoarray['ref'];
$rank= $getuserinfoarray['rankid'];
$getrefby = $getuserinfoarray['refby'];
$countby = mysql_query("SELECT * FROM users WHERE refby = '$getref'");
$countbya = mysql_num_rows($countby);

$toptenbusts = mysql_query("SELECT * FROM users ORDER BY jailbusts DESC LIMIT 0,10");

$kills = mysql_query("SELECT * FROM users where kills > '0' AND rankid < '25' ORDER BY kills DESC LIMIT 0,10");

$toptenrefs = mysql_query("SELECT * FROM users WHERE rankid <= '24' AND status = 'Alive' ORDER BY totalref  DESC LIMIT 0,10");

$toptenmelt = mysql_query("SELECT * FROM users WHERE status = 'Alive' ORDER BY totalmelted DESC LIMIT 0,10");

$topten = mysql_query("SELECT * FROM users WHERE rankid <= '24' AND status = 'Alive' ORDER BY rankid DESC LIMIT 0,10");

$crimes = mysql_query("SELECT * FROM users WHERE rankid <= '24' AND status = 'Alive' ORDER BY crimes DESC LIMIT 0,10");

$steals = mysql_query("SELECT * FROM users WHERE rankid <= '24' AND status = 'Alive' ORDER BY thefts DESC LIMIT 0,10");

$toptenbullets = mysql_query("SELECT * FROM users ORDER BY crewbullets DESC LIMIT 0,10");

$casinos = mysql_query("SELECT * FROM users WHERE rankid <= '24' AND status = 'Alive' ORDER BY casinos DESC LIMIT 0,10");

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
<br><table cellpadding=0 cellspacing=1 width=35% align="center">
<tr><td width=100% bgcolor=#222222 NOWRAP colspan="2" align="center"><font color=white face=verdana size=1><b>Kills</b></font></td></tr>
<tr><td width=75% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Username</b>:</font></td><td width=25% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Total kills</b>:</font></td></tr><?
while($killer = mysql_fetch_array($kills)){
$usa = $killer['username'];
$kiels = number_format($killer['kills']);
echo"<tr><td width=75% bgcolor=#222222 NOWRAP><a href=viewprofile.php?username=$usa><font color=white face=verdana size=1>$usa</font></a></td><td width=25% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1>$kiels</font></td></tr>"; }
?></table>
<br><br>
<table cellpadding=0 cellspacing=1 width=35% align="center">
<tr><td width=100% bgcolor=#222222 NOWRAP colspan="2" align="center"><font color=white face=verdana size=1><b>Casino wins</b></font></td></tr>
<tr><td width=75% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Username</b>:</font></td><td width=25% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Total wins</b>:</font></td></tr><?
while($casino = mysql_fetch_array($casinos)){
$usaa = $casino['username'];
$casinoss = number_format($casino['casinos']);
echo"<tr><td width=75% bgcolor=#222222 NOWRAP><a href=viewprofile.php?username=$usaa><font color=white face=verdana size=1>$usaa</font></a></td><td width=25% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1>$casinoss</font></td></tr>"; }
?></table>
<br><br><table cellpadding=0 cellspacing=1 width=35% align="center">
<tr><td width=100% bgcolor=#222222 NOWRAP colspan="2" align="center"><font color=white face=verdana size=1><b>Ranks</b></font></td></tr>
<tr><td width=75% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Username</b>:</font></td><td width=25% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Rank</b>:</font></td></tr><?
while($toptens = mysql_fetch_array($topten)){
$topname = $toptens['username'];
$toprankid = $toptens['rankid'];

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
?></table>
<br><br><table cellpadding=0 cellspacing=1 width=35% align="center">
<tr><td width=100% bgcolor=#222222 NOWRAP colspan="2" align="center"><font color=white face=verdana size=1><b>Jailbusts</b></font></td></tr>
<tr><td width=75% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Username</b>:</font></td><td width=25% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Total busts</b>:</font></td></tr><?
while($toptenbust = mysql_fetch_array($toptenbusts)){
$jailname = $toptenbust['username'];
$jailbusts = number_format($toptenbust['jailbusts']);
echo"<tr><td width=75% bgcolor=#222222 NOWRAP><a href=viewprofile.php?username=$jailname><font color=white face=verdana size=1>$jailname</font></a></td><td width=25% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1>$jailbusts</font></td></tr>"; }
?></table>
<br><br><table cellpadding=0 cellspacing=1 width=35% align="center">
<tr><td width=100% bgcolor=#222222 NOWRAP colspan="2" align="center"><font color=white face=verdana size=1><b>Crimes</b></font></td></tr>
<tr><td width=75% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Username</b>:</font></td><td width=25% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Total attempted</b>:</font></td></tr><?
while($crime = mysql_fetch_array($crimes)){
$crimename = $crime['username'];
$crimesdone = number_format($crime['crimes']);
echo"<tr><td width=75% bgcolor=#222222 NOWRAP><a href=viewprofile.php?username=$crimename><font color=white face=verdana size=1>$crimename</font></a></td><td width=25% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1>$crimesdone</font></td></tr>"; }
?></table>
<br><br><table cellpadding=0 cellspacing=1 width=35% align="center">
<tr><td width=100% bgcolor=#222222 NOWRAP colspan="2" align="center"><font color=white face=verdana size=1><b>Steals</b></font></td></tr>
<tr><td width=75% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Username</b>:</font></td><td width=25% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Total attempted</b>:</font></td></tr><?
while($steal = mysql_fetch_array($steals)){
$stealname = $steal['username'];
$stealdone = number_format($steal['thefts']);
echo"<tr><td width=75% bgcolor=#222222 NOWRAP><a href=viewprofile.php?username=$stealname><font color=white face=verdana size=1>$stealname</font></a></td><td width=25% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1>$stealdone</font></td></tr>"; }
?></table>
<br><br><table cellpadding=0 cellspacing=1 width=35% align="center">
<tr><td width=100% bgcolor=#222222 NOWRAP colspan="2" align="center"><font color=white face=verdana size=1><b>Total melted</b></font></td></tr>
<tr><td width=75% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Username</b>:</font></td><td width=25% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Total melted</b>:</font></td></tr><?
while($toptenmelts = mysql_fetch_array($toptenmelt)){
$meltee = $toptenmelts['username'];
$melts = number_format($toptenmelts['totalmelted']);
echo"<tr><td width=75% bgcolor=#222222 NOWRAP><a href=viewprofile.php?username=$meltee><font color=white face=verdana size=1>$meltee</font></a></td><td width=25% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1>$melts</font></td></tr>"; }
?></table>
<br><br><table cellpadding=0 cellspacing=1 width=35% align="center">
<tr><td width=100% bgcolor=#222222 NOWRAP colspan="2" align="center"><font color=white face=verdana size=1><b>Crew bullets</b></font></td></tr>
<tr><td width=75% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Username</b>:</font></td><td width=25% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Crew bullets</b>:</font></td></tr><?
while($toptenbullet = mysql_fetch_array($toptenbullets)){
$bulletname = $toptenbullet['username'];
$bullets = number_format($toptenbullet['crewbullets']);
echo"<tr><td width=75% bgcolor=#222222 NOWRAP><a href=viewprofile.php?username=$bulletname><font color=white face=verdana size=1>$bulletname</font></a></td><td width=25% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1>$bullets</font></td></tr>"; }
?></table>
<br><br><table cellpadding=0 cellspacing=1 width=35% align="center">
<tr><td width=100% bgcolor=#222222 NOWRAP colspan="2" align="center"><font color=white face=verdana size=1><b>Referrals</b></font></td></tr>
<tr><td width=75% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Username</b>:</font></td><td width=25% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Total refers</b>:</font></td></tr><?
while($toptenref = mysql_fetch_array($toptenrefs)){
$refname = $toptenref['username'];
$refs = number_format($toptenref['totalref']);
echo"<tr><td width=75% bgcolor=#222222 NOWRAP><a href=viewprofile.php?username=$refname><font color=white face=verdana size=1>$refname</font></a></td><td width=25% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1>$refs</font></td></tr>"; }
?></table><br>

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