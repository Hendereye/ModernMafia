<? include 'included.php'; ?>
<?
$saturate = "/[^a-z0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$playerip = $_SERVER['REMOTE_ADDR'];
$username = $usernameone;

$userarray = $statustesttwo;
$userlocation = $userarray['location'];
$userrankid = $userarray['rankid'];
$usermoney = $userarray['money'];
$penpoints = $userarray['penpoints'];
$check = $statustesttwo['sentmsgs'];

$jailtest = mysql_query("SELECT username FROM jail WHERE username  = '$username'");
$jailtester = mysql_num_rows($jailtest);
if($jailtester != '0'){die(include 'jail.php'); }
?>
<html>
<head>
<link rel="stylesheet" href="more/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache"></head>
<link rel="shortcut icon" href="/more/icon.png" type="image/x-icon" />
<body background="/more/bgtest.png">
<table width="100%" height="335" align="center" cellpadding="0" cellspacing="3">
<tr>
<td width="250" height="25"></td>
<td width="100%"></td>
<td width="250"></td>
</tr>

<tr>
<td width="250" valign="top">
<? include 'leftmenu.php'; ?>
</td>
<td width="100%" valign="top">
<?php
 


$entertainer = $ent;
if($entertainer != '0'){die('<font color=white face=verdana size=1>As entertainer you cannot view this page</font>');}


$ownerinfosql = mysql_query("SELECT * FROM casinos WHERE casino = 'Dice' AND location = '$userlocation'");
$ownerinfoarray = mysql_fetch_array($ownerinfosql);
$ownername = $ownerinfoarray['owner'];


$getsug = mysql_fetch_array(mysql_query("SELECT * FROM suggestions WHERE username = '$ownername'"));
$getsugid = $getsug['id'];



if($ownername == $usernameone){$owner = 1;}else{$owner = 0;}

$ownermaxbet = $ownerinfoarray['maxbet'];
$ownerprofit = $ownerinfoarray['profit'];
$ownermaxbettwo = number_format($ownerinfoarray['maxbet']);
if($ownermaxbettwo == '999,999,999,999'){$ownermaxbettwo = 'Infinite';}else{$ownermaxbettwo = "$$ownermaxbettwo";} 
$ownerprofittwo = number_format($ownerinfoarray['profit']);


$saturated = "/[^0-9]/i";
$setmaxraw = mysql_real_escape_string($_POST['setmaxdice']);
$priceraw = mysql_real_escape_string($_POST['setpricedice']);
$setownerrawraw = mysql_real_escape_string($_POST['setownerdice']);
$dicebetraw = mysql_real_escape_string($_POST['dicebet']);
$dicesidesraw = mysql_real_escape_string($_POST['dicesides']);
$dicerolledraw = mysql_real_escape_string($_POST['dicerolled']);
$setmax = preg_replace($saturated,"",$setmaxraw);
$setownerraw = preg_replace($saturate,"",$setownerrawraw);
$price = preg_replace($saturated,"",$priceraw);
$setmaxtwo = number_format($setmax);
$dicebet = preg_replace($saturated,"",$dicebetraw);
$dicesides = preg_replace($saturated,"",$dicesidesraw);
$dicerolled = preg_replace($saturated,"",$dicerolledraw);

if(($owner != '0')||($userrankid == '100')){
if(isset($_POST['setmaxdice'])) {
if($setmax < '100000'){echo'<font color="white" face="verdana" size="1">The maxbet must be at least $<b>100,000</b>!</font>';}
elseif($setmax >= '999999999999'){
mysql_query("UPDATE casinos SET maxbet = '999999999999' WHERE casino= 'Dice' AND location = '$userlocation'");
echo'<font color="white" face="verdana" size="1">The maxbet is now <b>Infinite</b>!</font>';}
else{
mysql_query("UPDATE casinos SET maxbet = '$setmax' WHERE casino= 'Dice' AND location = '$userlocation'");
echo"<font color=white face=verdana size=1>The maxbet is now $<b>$setmaxtwo</b>!</font>";}}}


if(($owner != '0')||($userrankid >= '50')){
if(isset($_POST['setownerdice'])) {

$setownerinfosql = mysql_query("SELECT * FROM users WHERE username = '$setownerraw'");
$setownerinfoarray = mysql_fetch_array($setownerinfosql);
$setownerinforows = mysql_num_rows($setownerinfosql);
$setowner = $setownerinfoarray['username'];
if(!$setowner){die (' ');}
$setownerstatus = $setownerinfoarray['status'];
$ssskkk = $setownerinfoarray['rankid'];
$ssskkkid = $setownerinfoarray['ID'];



if($setowner == $ownername){echo'<font color="white" face="verdana" size="1">You already own the dice!</font>';}
elseif($setownerinforows == '0'){echo'<font color="white" face="verdana" size="1">No such user!</font>';}
elseif(($ssskkk > '25')&&($userrankid < '50')){echo'<font color="white" face="verdana" size="1">You cannot send a casino to a TS staff member!</font>';}
elseif($setownerstatus == 'Dead'){echo'<font color="white" face="verdana" size="1">You cannot send a casino to dead player!</font>';}
else{
$cunt = mysql_num_rows(mysql_query("SELECT owner FROM casinos WHERE owner = '$setowner'"));
$cunts = mysql_num_rows(mysql_query("SELECT owner FROM casinos WHERE owner = '$setowner' AND casino = 'Dice'"));
if($cunt > '1'){die('<font color=white face=verdana size=1>That user already has 2 casinos!</font>');}
if($cunts > '0'){die('<font color=white face=verdana size=1>That user already has a dice game!</font>');}


$penpoint = mysql_num_rows(mysql_query("SELECT * FROM ipadresses WHERE ip = '$userip' AND username = '$setowner'"));
if(($penpoint > '0')&&($setowner != $username)){ mysql_query("UPDATE users SET penpoints = penpoints + 1 WHERE username = '$username'");
$reason = "$username sent $userlocation dice to $setowner";
mysql_query("INSERT INTO penpoints(username,reason) VALUES('$username','$reason')");}

mysql_query("UPDATE casinos SET owner = '$setowner' WHERE casino= 'Dice' AND location = '$userlocation'");
mysql_query("UPDATE casinos SET nickname = '$setownerraw' WHERE casino= 'Dice' AND location = '$userlocation'");
mysql_query("UPDATE casinos SET maxbet = '100000' WHERE casino= 'Dice' AND location = '$userlocation'");
echo"<font color=white face=verdana size=1>You gave the casino to </font><a href=viewprofile.php?username=$setowner><font color=white face=verdana size=1><b>$setownerraw</b>!</font></a>";
mysql_query("DELETE FROM buycasinos WHERE city = '$userlocation' AND type = 'Dice'");

mysql_query("UPDATE users SET notify = '1', notification = 'a_open$usernameone a_closed$usernameone a_slashsent you $userlocation Dice Game.' WHERE username = '$ssskkkid'");
}}


elseif(isset($_POST['setpricedice'])) {
mysql_query("DELETE FROM buycasinos WHERE type = 'Dice' AND city = '$userlocation'");
$buytime = time()+86400;
mysql_query("INSERT INTO buycasinos(username,time,city,price,type)
VALUES ('$ownername','$buytime','$userlocation','$price','Dice')");
echo"<font color=white face=verdana size=1>The casino has been added to quicktrade!</font>";
}


elseif(isset($_POST['resetdiceprofit'])) {
echo'<font color=white face=verdana size=1>Profit reset!</font>';
mysql_query("UPDATE casinos SET profit = '0' WHERE casino= 'Dice' AND location = '$userlocation'");}}

if($owner == '0'){
if(isset($_POST['playdice'])) {
if($_POST['1'] != $check){$dicebet = '0';}


$ownerstatssql = mysql_query("SELECT money,ID FROM users WHERE ID = '$getsugid'");
$ownerstatsarray = mysql_fetch_array($ownerstatssql);
$ownermoney = $ownerstatsarray['money'];
$ownerid = $ownerstatsarray['ID'];


if(!$dicebet){echo'<font color=white face=verdana size=1>You did not enter an amount to bet!</font>';}
elseif(!$dicesides){echo'<font color=white face=verdana size=1>You did not enter an amount of sides!</font>';} 
elseif($dicesides == '1'){echo'<font color=white face=verdana size=1>You cannot play with one side!</font>';} 
elseif(!$dicerolled){echo'<font color=white face=verdana size=1>You did not enter a predicted outcome!</font>';}
elseif($dicebet > $usermoney){echo'<font color=white face=verdana size=1>You dont have that much money!</font>';}
elseif($dicebet > $ownermaxbet){echo"<font color=white face=verdana size=1>The maxbet is set at <b>$ownermaxbettwo</b>!</font>";}
elseif($dicesides > '1000'){echo'<font color=white face=verdana size=1>You can only play with a max of 1000 sides!</font>';}
else{
$dicesidesa = floor($dicesides * 1.05);

$rand = mt_rand(1,$dicesidesa);

$bet = number_format($dicebet);
$winraw = $dicebet * $dicesides;
$win = number_format($winraw);
$realwin = $winraw - $dicebet;

echo"<center><font color=white face=verdana size=1>You placed your bet on <b>$dicerolled</b>, and the dice rolled <b>$rand</b>!</font><br>";

if($dicerolled == $rand){echo"<font color=#5FB404 face=verdana size=1>Congratulations, you won $<b>$win</b>!</font></center><br><br>";
mysql_query("UPDATE casinos SET profit = profit - $realwin WHERE location = '$userlocation' AND casino = 'Dice'");
if($realwin >= $ownermoney){echo"<center><font color=white face=verdana size=1><b>You won all of the owners cash, you now own the casino!</b></font></center>";
if($ownermoney == '0'){$new = '1';}else{$new = '0';}
mysql_query("UPDATE users SET money = '$new' WHERE ID = '$ownerid' AND money = '$ownermoney'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error minus cash 1.</font>');}
mysql_query("UPDATE users SET money = (money + $ownermoney + 1) WHERE ID = '$ida' AND money >= '$dicebet'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 1.</font>');}


mysql_query("DELETE FROM buycasinos WHERE city = '$userlocation' AND type = 'Dice'");
mysql_query("UPDATE users SET casinos = casinos + 1 WHERE username = '$username'");
mysql_query("UPDATE casinos SET owner = '$username', nickname = '$username' WHERE casino = 'Dice' AND location = '$userlocation'");}
else{
mysql_query("UPDATE users SET money = (money - $realwin) WHERE ID = '$ownerid' AND money >= '$realwin'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error contact admin and say you saw minus cash error.</font>');}
mysql_query("UPDATE users SET money = money + '$realwin' WHERE ID = '$ida' AND money >= '$dicebet'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 2.</font>');}


}}
else{echo"<font color=orange face=verdana size=1>You lost $<b>$bet</b>!</font></center><br><br>";
mysql_query("UPDATE users SET money = money - '$dicebet' WHERE ID = '$ida' AND money >= '$dicebet'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 3.</font>');}
mysql_query("UPDATE users SET money = money + '$dicebet' WHERE ID = '$ownerid'");
mysql_query("UPDATE casinos SET profit = profit + '$dicebet' WHERE location = '$userlocation' AND casino = 'Dice'");}

}}}

if(($ownername == 'Blank')||($ownername == 'Tony')||($ownername == 'Reausaw')){
if(isset($_POST['takeoverdice'])){
if($usermoney < '15000000'){echo"<font color=white face=verdana size=1>You don't have enough money! Taking over a dice costs $<b>15,000,000</b>!</font>";}
else{echo"<font color=white face=verdana size=1><b>You now own the dice!</b></font>";
mysql_query("UPDATE users SET money = money - '15000000' WHERE username = '$username'");
mysql_query("UPDATE casinos SET owner = '$username' WHERE location = '$userlocation' AND casino = 'Dice'");
mysql_query("UPDATE casinos SET nickname = '$username' WHERE location = '$userlocation' AND casino = 'Dice'");
mysql_query("DELETE FROM buycasinos WHERE city = '$userlocation' AND type = 'Dice'");}}}


?>

<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png" NOWRAP></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Dice game</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png"></td>
<td background="/more/crossbg.png">
<?php

if(($owner == '0')||($userrankid == '100')){echo"<div align=center><br><table width=20% cellpadding=0 cellspacing=1 align=center class=textbox>
<tr><td bgcolor=gray align=center NOWRAP colspan=2><font color=black size=1 face=verdana><b>Play Dice</b></font></td></tr>
<form action=dicegame.php method=post><input type=hidden value=$check name=1><tr><td width=100% NOWRAP><font color=#BBBBBB size=1 face=verdana><b>Money bet:</b></font></td><td width=50% colspan=1><input type=text name=dicebet class=textbox value=$dicebet></td></tr>
<tr><td width=100%  NOWRAP><font color=#BBBBBB size=1 face=verdana><b>Sides </b></font><font color=silver size=1 face=verdana>(+5%)</font><font color=#BBBBBB size=1 face=verdana><b>:</b></font></td><td width=50% colspan=1><input type=text name=dicesides class=textbox value=$dicesides></td></tr>
<tr><td width=100%  NOWRAP><font color=#BBBBBB size=1 face=verdana><b>Rolled dice:</b></font></td><td width=50% colspan=1><input type=text name=dicerolled class=textbox value=$dicerolled></td></tr>
<tr><td width=100% NOWRAP colspan=2><input type=submit value=Bet class=textbox name=playdice style=width:100%; height:100%;></td></tr></form>
</table><br>
<font color=gray size=1 face=verdana>The casino is owned by </font><a href=viewprofile.php?username=$ownername><font color=gray size=1 face=verdana><b>$ownername</b></a><br>The maximum bet is set at <b>$ownermaxbettwo</b></font></div>";}

if(($owner != '0')||($userrankid >= '50')){echo"<div align=center><br><table width=20% cellpadding=0 cellspacing=1 align=center class=textbox>
<tr><td bgcolor=gray align=center NOWRAP colspan=2><font color=black size=1 face=verdana><b>Dice Info</b></font></td></tr>
<tr><td width=100% NOWRAP><font color=#BBBBBB size=1 face=verdana><b>Profit:</b></font></td><td width=50% colspan=1><font color=white size=1 face=verdana>$$ownerprofittwo</font></td></tr>
<tr><td width=100%  NOWRAP><font color=#BBBBBB size=1 face=verdana><b>Maxbet:</b></font></td><td width=50% colspan=1><font color=white size=1 face=verdana>$ownermaxbettwo</font></td></tr>
</table><br>";
?>
<br><table  cellpadding=0 cellspacing=1 align=center class=textbox width="20%">
<tr><td bgcolor=gray align=center NOWRAP colspan=3><font color=black size=1 face=verdana><b>Edit Dice Stats</b></font></td></tr>
<form action=dicegame.php method=post><tr><td width=100% NOWRAP><font color=#BBBBBB size=1 face=verdana><b>Set Maxbet:</b></font></td><td width=100% NOWRAP><input type=text name=setmaxdice class=textbox></td><td width=100% NOWRAP><input type=submit value="Do it" class=textbox name=setmaxsubmit></td></tr></form>
<form action=dicegame.php method=post><tr><td width=100% NOWRAP><font color=#BBBBBB size=1 face=verdana><b>Send Dice:</b></font></td><td width=100% NOWRAP><input type=text name=setownerdice class=textbox></td><td width=100% NOWRAP><input type=submit value="Do it" class=textbox name=setownersubmit></td></tr></form>
<form action=dicegame.php method=post><tr><td width=100% NOWRAP><font color=#BBBBBB size=1 face=verdana><b>Sell Dice:</b></font></td><td width=100% NOWRAP><input type=text name=setpricedice class=textbox></td><td width=100% NOWRAP><input type=submit value="Do it" class=textbox name=setpricesubmit></td></tr></form>
<form action=dicegame.php method=post><tr><td width=100% NOWRAP colspan=3><input type=submit value="Reset Profit" class=textbox name=resetdiceprofit style=width:100%; height:100%;></td></tr></form>
</table><br></div><?php }

if(($ownername == 'Blank')||($ownername == 'Tony')||($ownername == 'Reausaw')){echo'<br><div align=center>
<form action=dicegame.php method=post><input type=submit value="Take Over Casino" class=textbox name=takeoverdice></form>';}
?>
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

</body>
<head><META HTTP-EQUIV="Pragma" CONTENT="no-cache"></head></html>