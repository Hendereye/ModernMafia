<? include 'included.php'; ?>
<?
$time = time();
$times = $time + 300;
$jailtime = $time + 120;
$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$getida = $_GET['dropid'];
$getid = preg_replace($saturated,"",$getida);
$gangsterusernamesql = mysql_query("SELECT * FROM usersonline WHERE session = '$sessionid' AND ip = '$userip'");
$gangsterusernamearray = mysql_fetch_array($gangsterusernamesql);
$gangsterusername = $gangsterusernamearray['username'];

$jailtest = mysql_query("SELECT * FROM jail WHERE username  = '$gangsterusername'");
$jailtester = mysql_num_rows($jailtest);
if($jailtester != '0'){die(include 'jail.php'); }
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
<?php 

$withraw = $_POST['car'];
$toraw = $_POST['to'];
$with = preg_replace($saturated,"",$withraw);
$to = preg_replace($saturated,"",$toraw);


$getuserinfosql = mysql_query("SELECT * FROM users WHERE username = '$gangsterusername'");
$getuserinfoarray = mysql_fetch_array($getuserinfosql);
$userlocation = $getuserinfoarray['location'];
$r = $getuserinfoarray['rankid'];


if($r < '25'){die('<font color=white face=verdana size=1>;(</font>');}

if($userlocation == 'Washington'){$goto = 1;}
elseif($userlocation == 'Los Angeles'){$goto = 2;}
elseif($userlocation == 'New York'){$goto = 3;}
elseif($userlocation == 'Louisiana'){$goto = 4;}
elseif($userlocation == 'Las Vegas'){$goto = 6;}

if($to == '1'){$dest = 'Washington';}
elseif($to == '2'){$dest = 'Los Angeles';}
elseif($to == '3'){$dest = 'New York';}
elseif($to == '4'){$dest = 'Louisiana';}
elseif($to == '6'){$dest = 'Las Vegas';}
elseif($to == '7'){$dest = 'Ohio';}
elseif($to == '8'){$dest = 'California';}



$blackjack = mysql_query("SELECT * FROM blackjack WHERE username = '$gangsterusername'");
$blackjackrows = mysql_num_rows($blackjack);
if($blackjackrows > 0){die('<font color=white face=verdana size=1><center>You cannot travel while in a blackjack game</center></font>');}
$travelchecka = mysql_query("SELECT * FROM travel WHERE username = '$gangsterusername'");
$travelcheck = mysql_num_rows($travelchecka);



if($travelcheck > '0'){die("<font color=white face=verdana size=1>You are already travelling!</font>");}

if(isset($_POST["1234"])){
if(($to >= 9)||($to < 1)){echo"1";}
if($to == 5){echo"1";}
elseif($userlocation == $dest){echo"<font color=white face=verdana size=1>You are already in <b>$userlocation</b>!</font>";}
elseif($travelcheck != '0'){echo"2";}
else{
mysql_query("UPDATE users SET location = '$dest' WHERE username = '$gangsterusername'");
echo"<font color=white face=verdana size=1>You arrived in $dest!";}}

?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Travel</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<br>
<center>
<table cellpadding=0 cellspacing=1 width=35%><form action="" method="post">
<tr><td width=75% bgcolor=#333333 NOWRAP align="center"><font color=white face=verdana size=1><b>Location</b>:</font></td></tr>
<tr><td width=75% bgcolor=#222222 NOWRAP><input type=radio name=to value=6><font color=white face=verdana size=1>Las Vegas</font></td></tr>
<tr><td width=75% bgcolor=#222222 NOWRAP><input type=radio name=to value=1><font color=white face=verdana size=1>Washington</font></td></tr>
<tr><td width=75% bgcolor=#222222 NOWRAP><input type=radio name=to value=2><font color=white face=verdana size=1>Los Angeles</font></td></tr>
<tr><td width=75% bgcolor=#222222 NOWRAP><input type=radio name=to value=3><font color=white face=verdana size=1>New York</font></td></tr>
<tr><td width=75% bgcolor=#222222 NOWRAP><input type=radio name=to value=4><font color=white face=verdana size=1>Louisiana</font></td></tr>
<tr><td width=75% bgcolor=#222222 NOWRAP><input type=radio name=to value=7><font color=white face=verdana size=1>Ohio</font></td></tr>
<tr><td width=75% bgcolor=#222222 NOWRAP><input type=radio name=to value=8><font color=white face=verdana size=1>California</font></td></tr>
</table><br><input type="submit" value="Go" name="1234" class="textbox"><br>
</center></form><br><br><br>

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