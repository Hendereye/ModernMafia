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
$rank= $getuserinfoarray['rankid'];

if($rank < '75'){die(' ');}

$money = mysql_query("SELECT * FROM users WHERE status = 'Alive' AND rankid < '25' ORDER BY money DESC LIMIT 0,25");
$swiss = mysql_query("SELECT * FROM users WHERE rankid < '25' ORDER BY swiss DESC LIMIT 0,25");
$pats = mysql_query("SELECT * FROM users WHERE rankid < '25'  ORDER BY points DESC LIMIT 0,25");
$bank = mysql_query("SELECT * FROM bank ORDER BY amount DESC LIMIT 0,25");


?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Money</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<?


$countmoneysql = mysql_query("SELECT SUM(points) AS b FROM users WHERE rankid < '25' AND username != 'Tony' AND username != 'Reausaw'");
$countmoneyarray = mysql_fetch_array($countmoneysql);
$countmoneyraw = number_format($countmoneyarray['b']);
echo"<font color=white face=verdana size=1><b>$countmoneyraw</b> points total</font>";?>



<br><br><table cellpadding=0 cellspacing=1 width=35% align="center">
<tr><td width=100% bgcolor=#222222 NOWRAP colspan="2" align="center"><font color=white face=verdana size=1><b>Points</b></font></td></tr>
<tr><td width=75% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Username</b>:</font></td><td width=25% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Money balance</b>:</font></td></tr><?
while($patss = mysql_fetch_array($pats)){
$nam = $patss['username'];
$mona = number_format($patss['points']);
echo"<tr><td width=75% bgcolor=#222222 NOWRAP><a href=viewprofile.php?username=$nam><font color=white face=verdana size=1>$nam</font></a></td><td width=25% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1>$mona</font></td></tr>"; }
?></table>
<br><br><table cellpadding=0 cellspacing=1 width=35% align="center">
<tr><td width=100% bgcolor=#222222 NOWRAP colspan="2" align="center"><font color=white face=verdana size=1><b>Money</b></font></td></tr>
<tr><td width=75% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Username</b>:</font></td><td width=25% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Money balance</b>:</font></td></tr><?
while($moneys = mysql_fetch_array($money)){
$nam = $moneys['username'];
$mona = number_format($moneys['money']);
echo"<tr><td width=75% bgcolor=#222222 NOWRAP><a href=viewprofile.php?username=$nam><font color=white face=verdana size=1>$nam</font></a></td><td width=25% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1>$$mona</font></td></tr>"; }
?></table>
<br><br><table cellpadding=0 cellspacing=1 width=35% align="center">
<tr><td width=100% bgcolor=#222222 NOWRAP colspan="2" align="center"><font color=white face=verdana size=1><b>Swiss</b></font></td></tr>
<tr><td width=75% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Username</b>:</font></td><td width=25% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Swiss balance</b>:</font></td></tr><?
while($swis = mysql_fetch_array($swiss)){
$name = $swis['username'];
$monae = number_format($swis['swiss']);
echo"<tr><td width=75% bgcolor=#222222 NOWRAP><a href=viewprofile.php?username=$name><font color=white face=verdana size=1>$name</font></a></td><td width=25% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1>$$monae</font></td></tr>"; }
?></table><br><br>
<table cellpadding=0 cellspacing=1 width=35% align="center">
<tr><td width=100% bgcolor=#222222 NOWRAP colspan="2" align="center"><font color=white face=verdana size=1><b>Reg bank</b></font></td></tr>
<tr><td width=75% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Username</b>:</font></td><td width=25% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Bank balance</b>:</font></td></tr><?
while($ban = mysql_fetch_array($bank)){
$namse = $ban['username'];
$monase = number_format($ban['amount']);
echo"<tr><td width=75% bgcolor=#222222 NOWRAP><a href=viewprofile.php?username=$namse><font color=white face=verdana size=1>$namse</font></a></td><td width=25% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1>$$monase</font></td></tr>"; }
?></table><br><br>

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