<? include 'included.php'; 



$allowed = "/[^a-z0-9]/i";
$getusernameraw = $_GET['username'];
$getusername = preg_replace($allowed,"",$getusernameraw);


$toptenbusts = mysql_query("SELECT * FROM users WHERE rankid < 23  ORDER BY jailbusts DESC LIMIT 0,20");
$without = mysql_query("SELECT * FROM users WHERE rankid < 23  ORDER BY joint DESC LIMIT 0,20");


$toptenmelt = mysql_query("SELECT * FROM users WHERE rankid < 23 ORDER BY totalmelted DESC LIMIT 0,20");

$toptenbullets = mysql_query("SELECT * FROM users WHERE rankid < 23  ORDER BY crewbullets DESC LIMIT 0,20");

$casinos = mysql_query("SELECT * FROM users WHERE rankid < 23  ORDER BY casinos DESC LIMIT 0,20");

$spent = mysql_query("SELECT * FROM users WHERE rankid < 23  ORDER BY ptsspent DESC LIMIT 0,20");



?>
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


<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Mafian Society Hall Of Fame </b> (<font color=E0FFC2>Top 10</font>)</center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<br><div id=jailbusts><table cellpadding=0 cellspacing=1 width=35% align="center">
<tr><td width=100% bgcolor=#222222 NOWRAP colspan="2" align="center"  style="-moz-border-radius-topleft:7px;-moz-border-radius-topright:7px;"><font color=E0FFC2 face=verdana size=2><b>Jailbusts</b></font></td></tr>
<tr><td width=75% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Username</b>:</font></td><td width=25% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Total busts</b>:</font></td></tr><?
$jailbustsall = 0;

while($toptenbust = mysql_fetch_array($toptenbusts)){
$jailbustsall++;
$jailname = $toptenbust['username'];
$kfss = $toptenbust['bustsfame'];

if($getusername == $jailname){$bgcolor= "maroon";}else{$bgcolor= "#222222";}


$jailid = $toptenbust['ID'];
if($kfss != $jailbustsall){
mysql_query("UPDATE users SET bustsfame = '0' WHERE bustsfame = '$jailbustsall' LIMIT 1");
mysql_query("UPDATE users SET bustsfame = '$jailbustsall' WHERE ID ='$jailid' LIMIT 1");}



$jailbusts = number_format($toptenbust['jailbusts']);

if($jailbustsall < '11'){
echo"<tr><td width=75% bgcolor=$bgcolor NOWRAP><a href=viewprofile.php?username=$jailname><font color=white face=verdana size=1>$jailname</font></a></td><td width=25% bgcolor=$bgcolor NOWRAP><font color=white face=verdana size=1>$jailbusts</font></td></tr>";} }
?></table></div>
<br><div id=consecutive><table cellpadding=0 cellspacing=1 width=35% align="center">
<tr><td width=100% bgcolor=#222222 NOWRAP colspan="2" align="center"  style="-moz-border-radius-topleft:7px;-moz-border-radius-topright:7px;"><font color=E0FFC2 face=verdana size=2><b>Most consecutive jailbusts</b></font></td></tr>
<tr><td width=75% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Username</b>:</font></td><td width=25% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Total busts</b>:</font></td></tr><?
$cons = 0;

while($withouts = mysql_fetch_array($without)){
$cons++;

$jailname = $withouts['username'];
$kfsss = $withouts['consfame'];

if($getusername == $jailname){$bgcolor= "maroon";}else{$bgcolor= "#222222";}


$jailid = $withouts['ID'];
if($kfsss != $cons){


mysql_query("UPDATE users SET consfame = '0' WHERE consfame = '$cons' LIMIT 1");

mysql_query("UPDATE users SET consfame = '$cons' WHERE ID ='$jailid' LIMIT 1");

}

$jailbusts = number_format($withouts['joint']);

if($cons < '11'){
echo"<tr><td width=75% bgcolor=$bgcolor NOWRAP><a href=viewprofile.php?username=$jailname><font color=white face=verdana size=1>$jailname</font></a></td><td width=25% bgcolor=$bgcolor NOWRAP><font color=white face=verdana size=1>$jailbusts</font></td></tr>";} }
?></table></div>
<br><div id=melted><table cellpadding=0 cellspacing=1 width=35% align="center">
<tr><td width=100% bgcolor=#222222 NOWRAP colspan="2" align="center"  style="-moz-border-radius-topleft:7px;-moz-border-radius-topright:7px;"><font color=E0FFC2 face=verdana size=2><b>Total Bullets melted</b></font></td></tr>
<tr><td width=75% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Username</b>:</font></td><td width=25% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Total melted</b>:</font></td></tr><?
$meltfame = 0;
while($toptenmelts = mysql_fetch_array($toptenmelt)){
$meltee = $toptenmelts['username'];
$kfssss = $toptenmelts['totalmfame'];

if($getusername == $meltee){$bgcolor= "maroon";}else{$bgcolor= "#222222";}


$meltid = $toptenmelts['ID'];
$meltfame++;
if($kfssss != $meltfame){
mysql_query("UPDATE users SET totalmfame = '0' WHERE totalmfame = '$meltfame' LIMIT 1");
mysql_query("UPDATE users SET totalmfame = '$meltfame' WHERE ID ='$meltid' LIMIT 1");}


$melts = number_format($toptenmelts['totalmelted']);
if($meltfame < '11'){
echo"<tr><td width=75% bgcolor=$bgcolor NOWRAP><a href=viewprofile.php?username=$meltee><font color=white face=verdana size=1>$meltee</font></a></td><td width=25% bgcolor=$bgcolor NOWRAP><font color=white face=verdana size=1>$melts</font></td></tr>";} }
?></table></div>
 
<br><div id=crew_bullets><table cellpadding=0 cellspacing=1 width=35% align="center">
<tr><td width=100% bgcolor=#222222 NOWRAP colspan="2" align="center" style="-moz-border-radius-topleft:7px;-moz-border-radius-topright:7px;"><font color=E0FFC2 face=verdana size=2><b>Crew bullets</b></font></td></tr>
<tr><td width=75% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Username</b>:</font></td><td width=25% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Crew bullets</b>:</font></td></tr><?
$crewbfame= 0;
while($toptenbullet = mysql_fetch_array($toptenbullets)){
$bulletname = $toptenbullet['username'];
$kfsssss = $toptenbullet['crewbfame'];

if($getusername == $bulletname){$bgcolor= "maroon";}else{$bgcolor= "#222222";}


$meltid = $toptenbullet['ID'];
$crewbfame++;
if($kfsssss != $crewbfame){
mysql_query("UPDATE users SET crewbfame = '0' WHERE crewbfame = '$crewbfame' LIMIT 1");
mysql_query("UPDATE users SET crewbfame = '$crewbfame' WHERE ID ='$meltid' LIMIT 1");}


$bullets = number_format($toptenbullet['crewbullets']);

if($crewbfame < '11'){
echo"<tr><td width=75% bgcolor=$bgcolor NOWRAP><a href=viewprofile.php?username=$bulletname><font color=white face=verdana size=1>$bulletname</font></a></td><td width=25% bgcolor=$bgcolor NOWRAP><font color=white face=verdana size=1>$bullets</font></td></tr>";} }
?></table></div><br>

<div id=casino_wins><table cellpadding=0 cellspacing=1 width=35% align="center">
<tr><td width=100% bgcolor=#222222 NOWRAP colspan="2" align="center" style="-moz-border-radius-topleft:7px;-moz-border-radius-topright:7px;"><font color=E0FFC2 face=verdana size=2><b>Casino wins</b></font></td></tr>
<tr><td width=75% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Username</b>:</font></td><td width=25% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Total wins</b>:</font></td></tr><?

$casinoall = 0;

while($casino = mysql_fetch_array($casinos)){
$usaa = $casino['username'];
$kfs = $casino['casinofame'];


if($getusername == $usaa){$bgcolor= "maroon";}else{$bgcolor= "#222222";}


$jailid = $casino['ID'];
$casinoall++;
if($kfs != $casinoall){

mysql_query("UPDATE users SET casinofame = '0' WHERE casinofame = '$casinoall' LIMIT 1");
mysql_query("UPDATE users SET casinofame = '$casinoall' WHERE ID ='$jailid' LIMIT 1");}


$casinoss = number_format($casino['casinos']);

if($casinoall < '11'){
echo"<tr><td width=75% bgcolor=$bgcolor NOWRAP><a href=viewprofile.php?username=$usaa><font color=white face=verdana size=1>$usaa</font></a></td><td width=25% bgcolor=$bgcolor NOWRAP><font color=white face=verdana size=1>$casinoss</font></td></tr>";} }
?></table></div>
 <br><div id=points_spent><table cellpadding=0 cellspacing=1 width=35% align="center">
<tr><td width=100% bgcolor=#222222 NOWRAP colspan="2" align="center" style="-moz-border-radius-topleft:7px;-moz-border-radius-topright:7px;"><font color=E0FFC2 face=verdana size=2><b>Points spent on one account</b></font></td></tr>
<tr><td width=75% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Username</b>:</font></td><td width=25% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Point amount</b>:</font></td></tr><?
$cons = 0;

while($spents = mysql_fetch_array($spent)){
$cons++;

$aname = $spents['username'];
$kfssas = $spents['ptsfame'];

if($getusername == $aname){$bgcolor= "maroon";}else{$bgcolor= "#222222";}


$jailid = $spents['ID'];
if($kfssas != $cons){


mysql_query("UPDATE users SET ptsfame = '0' WHERE ptsfame = '$kfssas' LIMIT 1");

mysql_query("UPDATE users SET ptsfame = '$cons' WHERE ID ='$jailid' LIMIT 1");

}

$pointsspent = number_format($spents['ptsspent']);

if($cons < '11'){
echo"<tr><td width=75% bgcolor=$bgcolor NOWRAP><a href=viewprofile.php?username=$aname><font color=white face=verdana size=1>$aname</font></a></td><td width=25% bgcolor=$bgcolor NOWRAP><font color=white face=verdana size=1>$pointsspent</font></td></tr>";} }
?></table></div><br>
<table width="98%" cellpadding="0" cellspacing="0" align="center"><tr><td height="1" bgcolor="#444444"></td></tr><td height="11"></td></tr></table>



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