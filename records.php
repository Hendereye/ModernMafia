<? include 'included.php'; 

$allowed = "/[^a-z0-9]/i";
$getusernameraw = $_GET['username'];
$getusername = preg_replace($allowed,"",$getusernameraw);


$toptenbusts = mysql_query("SELECT * FROM users ORDER BY jailbusts DESC LIMIT 0,10");
$without = mysql_query("SELECT * FROM users ORDER BY joint DESC LIMIT 0,10");



$toptenmelt = mysql_query("SELECT * FROM users ORDER BY totalmelted DESC LIMIT 0,10");

$toptenbullets = mysql_query("SELECT * FROM users ORDER BY crewbullets DESC LIMIT 0,10");

$casinos = mysql_query("SELECT * FROM users ORDER BY casinos DESC LIMIT 0,10");


?>
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
<tr><td width=100% bgcolor=#222222 NOWRAP colspan="2" align="center" style="-moz-border-radius-topleft:7px;-moz-border-radius-topright:7px;"><font color=white face=verdana size=2><b>Jailbusts</b></font></td></tr>
<tr><td width=75% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Username</b>:</font></td><td width=25% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Total busts</b>:</font></td></tr><?
$jailbustsall = 0;

while($toptenbust = mysql_fetch_array($toptenbusts)){
$jailbustsall++;
$jailname = $toptenbust['username'];
$kfss = $toptenbust['bustsfame'];




$jailid = $toptenbust['ID']; 

$jailbusts = number_format($toptenbust['jailbusts']);
echo"<tr><td width=75% bgcolor=$bgcolor NOWRAP><a href=viewprofile.php?username=$jailname><font color=white face=verdana size=1>$jailname</font></a></td><td width=25% bgcolor=$bgcolor NOWRAP><font color=white face=verdana size=1>$jailbusts</font></td></tr>"; }
?></table>
<br><table cellpadding=0 cellspacing=1 width=35% align="center">
<tr><td width=100% bgcolor=#222222 NOWRAP colspan="2" align="center" style="-moz-border-radius-topleft:7px;-moz-border-radius-topright:7px;"><font color=white face=verdana size=2><b>Most consecutive jailbusts</b></font></td></tr>
<tr><td width=75% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Username</b>:</font></td><td width=25% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Total busts</b>:</font></td></tr><?
$cons = 0;

while($withouts = mysql_fetch_array($without)){
$cons++;

$jailname = $withouts['username'];
$kfsss = $withouts['consfame'];




$jailid = $withouts['ID']; 

$jailbusts = number_format($withouts['joint']);
echo"<tr><td width=75% bgcolor=$bgcolor NOWRAP><a href=viewprofile.php?username=$jailname><font color=white face=verdana size=1>$jailname</font></a></td><td width=25% bgcolor=$bgcolor NOWRAP><font color=white face=verdana size=1>$jailbusts</font></td></tr>"; }
?></table>
<br><table cellpadding=0 cellspacing=1 width=35% align="center">
<tr><td width=100% bgcolor=#222222 NOWRAP colspan="2" align="center" style="-moz-border-radius-topleft:7px;-moz-border-radius-topright:7px;"><font color=white face=verdana size=2><b>Total melted</b></font></td></tr>
<tr><td width=75% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Username</b>:</font></td><td width=25% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Total melted</b>:</font></td></tr><?
$meltfame = 0;
while($toptenmelts = mysql_fetch_array($toptenmelt)){
$meltee = $toptenmelts['username'];
$kfssss = $toptenmelts['totalmfame'];




$meltid = $toptenmelts['ID'];
$meltfame++; 

$melts = number_format($toptenmelts['totalmelted']);
echo"<tr><td width=75% bgcolor=$bgcolor NOWRAP><a href=viewprofile.php?username=$meltee><font color=white face=verdana size=1>$meltee</font></a></td><td width=25% bgcolor=$bgcolor NOWRAP><font color=white face=verdana size=1>$melts</font></td></tr>"; }
?></table>
 
<br><table cellpadding=0 cellspacing=1 width=35% align="center">
<tr><td width=100% bgcolor=#222222 NOWRAP colspan="2" align="center"><font color=white face=verdana size=2><b>Crew bullets</b></font></td></tr>
<tr><td width=75% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Username</b>:</font></td><td width=25% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Crew bullets</b>:</font></td></tr><?
$crewbfame= 0;
while($toptenbullet = mysql_fetch_array($toptenbullets)){
$bulletname = $toptenbullet['username'];
$kfsssss = $toptenmelts['crewbfame'];




$meltid = $toptenbullet['ID'];
$crewbfame++; 

$bullets = number_format($toptenbullet['crewbullets']);
echo"<tr><td width=75% bgcolor=$bgcolor NOWRAP><a href=viewprofile.php?username=$bulletname><font color=white face=verdana size=1>$bulletname</font></a></td><td width=25% bgcolor=$bgcolor NOWRAP><font color=white face=verdana size=1>$bullets</font></td></tr>"; }
?></table><br>
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