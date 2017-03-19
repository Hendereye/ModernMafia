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
$gangsterusername = $usernameone;

$jailtest = mysql_query("SELECT username FROM jail WHERE username  = '$gangsterusername'");
$jailtester = mysql_num_rows($jailtest);
if($jailtester != '0'){die(include 'jail.php'); }
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
<?php 

$withraw = $_POST['car'];
$toraw = $_POST['to'];
$with = preg_replace($saturated,"",$withraw);
$to = preg_replace($saturated,"",$toraw);


$getuserinfoarray = $statustesttwo;
$userlocation = $getuserinfoarray['location'];
if($userlocation == 'Washington'){$goto = 1;}
elseif($userlocation == 'Los Angeles'){$goto = 2;}
elseif($userlocation == 'New York'){$goto = 3;}
elseif($userlocation == 'Louisiana'){$goto = 4;}
elseif($userlocation == 'Las Vegas'){$goto = 6;}
elseif($userlocation == 'Ohio'){$goto = 7;}
elseif($userlocation == 'California'){$goto = 8;}

if($to == '1'){$dest = 'Washington';}
elseif($to == '2'){$dest = 'Los Angeles';}
elseif($to == '3'){$dest = 'New York';}
elseif($to == '4'){$dest = 'Louisiana';}
elseif($to == '6'){$dest = 'Las Vegas';}
elseif($to == '7'){$dest = 'Ohio';}
elseif($to == '8'){$dest = 'California';}

$carcheck = mysql_query("SELECT * FROM cars WHERE id = '$with'");
$carchecka = mysql_num_rows($carcheck);
$carcheckarray = mysql_fetch_array($carcheck);
$carowner = $carcheckarray['owner'];
$carspeed = $carcheckarray['speed'];
$customt = $carcheckarray['carid'];

$blackjack = mysql_query("SELECT * FROM blackjack WHERE username = '$gangsterusername'");
$blackjackrows = mysql_num_rows($blackjack);
if($blackjackrows > 0){die('<font color=white face=verdana size=1><center>You cannot travel while in a blackjack game</center></font>');}
$travelchecka = mysql_query("SELECT * FROM travel WHERE username = '$gangsterusername'");
$travelcheck = mysql_num_rows($travelchecka);
$travelif = mysql_fetch_array($travelchecka);
$destination = $travelif['goto'];
$timeleftraw = $travelif['time'];
$travelid = $travelif['carid'];
$custom = $travelif['c'];
$timeleft = $timeleftraw - $time;
$button = ceil($time / 45);

if(($travelcheck > '0')&&($timeleft > 0)){echo"<font color=white face=verdana size=1>You will arrive in $destination in $timeleft seconds!</font>";}
elseif(($travelcheck > '0')&&($timeleft <= 0)){echo"<font color=white face=verdana size=1>You arrived in $destination!</font>";
mysql_query("UPDATE users SET location = '$destination' WHERE username = '$gangsterusername'");
if($custom == '0'){mysql_query("UPDATE cars SET damage = damage + 5 WHERE id = $travelid AND owner = '$usernameone'");}
$broken = mysql_query("SELECT * FROM cars WHERE id = $travelid");
$brokenarray = mysql_fetch_array($broken);
$brake = $brokenarray['damage'];
mysql_query("DELETE FROM travel WHERE username = '$gangsterusername'");
if($brake >= 100){echo"<br><br><font color=white face=verdana size=1>Your car broke down at the end of the journey, you lost the car!</font>";
mysql_query("DELETE FROM cars WHERE id = $travelid");}
}
elseif(isset($_POST["$button"])){
if($carchecka < '1'){}
elseif($carowner != $gangsterusername){}
elseif(($to >= 9)||($to < 1)){}
elseif($to == 5){}
elseif($userlocation == $dest){echo"<font color=white face=verdana size=1>You are already in <b>$userlocation</b>!</font>";}
elseif($travelcheck != '0'){}
else{
$newtime = $time + $carspeed;
if($customt == '11'){
mysql_query("INSERT INTO travel(username,time,carid,goto,c)
VALUES ('$gangsterusername','$newtime','$with','$dest','1')");
}else{mysql_query("INSERT INTO travel(username,time,carid,goto,c)
VALUES ('$gangsterusername','$newtime','$with','$dest','0')");}

echo"<font color=white face=verdana size=1>You will arrive in $dest in $carspeed seconds!";}}




$cars = mysql_query("SELECT * FROM cars WHERE owner = '$gangsterusername' ORDER BY carid DESC LIMIT 0,30");

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

</table><br><input type="submit" value="Go" name="<? echo $button; ?>" class="textbox"><br><br>
<SELECT NAME="car" class="textbox">
<?
while($car = mysql_fetch_array($cars)){
$id = $car['id'];
$carid = $car['carid'];
$damage = $car['damage'];
$speed = $car['speed'];
$carnamea = $car['carname'];
if($carid == 1){$carname = 'Skoda Octavius';}
elseif($carid == 2){$carname = 'Ford Fiesta';}
elseif($carid == 3){$carname = 'Audi A3';}
elseif($carid == 4){$carname = 'Ford Mondeo';}
elseif($carid == 5){$carname = 'Jaguar X Type';}
elseif($carid == 6){$carname = 'BMW X5';}
elseif($carid == 7){$carname = 'Audi Q7';}
elseif($carid == 8){$carname = 'Rare: Ferrari Spider';}
elseif($carid == 9){$carname = 'Rare: Bugatti Veyron';}
elseif($carid == 10){$carname = 'Very Rare: Pagani Zonda';}
elseif($carid == 11){$carname = "Custom: $carnamea";}
echo"<OPTION value=$id>$carname $damage% damage  [$speed seconds]</OPTION>";}?></SELECT>
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