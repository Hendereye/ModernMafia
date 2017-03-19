<? include 'included.php'; ?>
<?php
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
 
$check = $statustesttwo['sentmsgs'];

$entertainer = $ent;
if($entertainer != '0'){die('<font color=white face=verdana size=1>As entertainer you cannot view this page</font>');}

$ownerinfosql = mysql_query("SELECT * FROM casinos WHERE casino = 'Races' AND location = '$userlocation'");
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

$ownerstatssql = mysql_query("SELECT * FROM users WHERE ID = '$getsugid'");
$ownerstatsarray = mysql_fetch_array($ownerstatssql);
$ownermoney = $ownerstatsarray['money'];
$ownersid = $ownerstatsarray['ID'];

$saturated = "/[^0-9]/i";
$setmaxraw = mysql_real_escape_string($_POST['setmaxrace']);
$priceraw = mysql_real_escape_string($_POST['setpricerace']);
$colorraw = mysql_real_escape_string($_POST['color']);
$setownerrawraw = mysql_real_escape_string($_POST['setownerrace']);
$betraw = mysql_real_escape_string($_POST['bet']);
$bet = preg_replace($saturated,"",$betraw);
$price = preg_replace($saturated,"",$priceraw);
$betformat  = number_format($bet);
$color = preg_replace($saturated,"",$colorraw);
$setmax = preg_replace($saturated,"",$setmaxraw);
$setownerraw = preg_replace($saturate,"",$setownerrawraw);
$setmaxtwo = number_format($setmax);


if(($owner != '0')||($userrankid == '100')){
if(isset($_POST['setmaxrace'])) {
if($setmax < '500000'){echo'<font color="white" face="verdana" size="1">The maxbet must be at least $<b>500,000</b>!</font>';}
elseif($setmax >= '999999999999'){
mysql_query("UPDATE casinos SET maxbet = '999999999999' WHERE casino= 'Races' AND location = '$userlocation'");
echo'<font color="white" face="verdana" size="1">The maxbet is now <b>Infinite</b>!</font>';}
else{
mysql_query("UPDATE casinos SET maxbet = '$setmax' WHERE casino= 'Races' AND location = '$userlocation'");
echo"<font color=white face=verdana size=1>The maxbet is now $<b>$setmaxtwo</b>!</font>";}}}


if(($owner != '0')||($userrankid >= '50')){
if(isset($_POST['setownerrace'])) {

$setownerinfosql = mysql_query("SELECT * FROM users WHERE username = '$setownerraw'");
$setownerinfoarray = mysql_fetch_array($setownerinfosql);
$setownerinforows = mysql_num_rows($setownerinfosql);
$setowner = $setownerinfoarray['username'];
if(!$setowner){die (' ');}
$setownerstatus = $setownerinfoarray['status'];
$ssskkk = $setownerinfoarray['rankid'];
$ssskkkid = $setownerinfoarray['ID'];


if($setowner == $ownername){echo'<font color="white" face="verdana" size="1">You already own the track!</font>';}
elseif($setownerinforows == '0'){echo'<font color="white" face="verdana" size="1">No such user!</font>';}
elseif($setownerstatus == 'Dead'){echo'<font color="white" face="verdana" size="1">You cannot send a casino to a dead player!</font>';}
elseif(($ssskkk > '25')&&($userrankid < '50')){echo'<font color="white" face="verdana" size="1">You cannot send a casino to a TS staff member!</font>';}
else{
$cunt = mysql_num_rows(mysql_query("SELECT * FROM casinos WHERE owner = '$setowner'"));
$cunts = mysql_num_rows(mysql_query("SELECT * FROM casinos WHERE owner = '$setowner' AND casino = 'Races'"));
if($cunt > '1'){die('<font color=white face=verdana size=1>That user already has 2 casinos!</font>');}
if($cunts > '0'){die('<font color=white face=verdana size=1>That user already has a drag race!</font>');}



$penpoint = mysql_num_rows(mysql_query("SELECT * FROM ipadresses WHERE ip = '$userip' AND username = '$setowner'"));
if(($penpoint > '0')&&($setowner != $username)){ mysql_query("UPDATE users SET penpoints = penpoints + 1 WHERE username = '$username'");
$reason = "$username sent $userlocation races to $setowner";
mysql_query("INSERT INTO penpoints(username,reason) VALUES('$username','$reason')");}

mysql_query("UPDATE casinos SET owner = '$setowner' WHERE casino= 'Races' AND location = '$userlocation'");
mysql_query("UPDATE casinos SET nickname = '$setownerraw' WHERE casino= 'Races' AND location = '$userlocation'");
mysql_query("UPDATE casinos SET maxbet = '500000' WHERE casino= 'Races' AND location = '$userlocation'");
echo"<font color=white face=verdana size=1>You gave the casino to </font><a href=viewprofile.php?username=$setowner><b><font color=white face=verdana size=1>$setownerraw</b>!</font></a>";
mysql_query("DELETE FROM buycasinos WHERE city = '$userlocation' AND type = 'Races'");

mysql_query("UPDATE users SET notify = '1', notification = 'a_open$usernameone a_closed$usernameone a_slashsent you $userlocation Drag Race.' WHERE username = '$ssskkkid'");}}}

if(($owner != '0')||($userrankid == '100')){
if(isset($_POST['setpricerace'])) {
mysql_query("DELETE FROM buycasinos WHERE type = 'Races' AND city = '$userlocation'");
$buytime = time()+86400;
mysql_query("INSERT INTO buycasinos(username,time,city,price,type)
VALUES ('$ownername','$buytime','$userlocation','$price','Races')");
echo"<font color=white face=verdana size=1>The casino has been added to quicktrade!</font>";
}}

if(($owner != '0')||($userrankid == '100')){
if(isset($_POST['resetraceprofit'])) {
echo'<font color=white face=verdana size=1>Profit reset!</font>';
mysql_query("UPDATE casinos SET profit = '0' WHERE casino= 'Races' AND location = '$userlocation'");}}

if($owner == '0'){
if(isset($_POST['bet'])) {

if($_POST['1'] != $check){$bet = '0';}


if(!$color){echo'<font color=white face=verdana size=1>You did not choose a car!</font>';}
elseif(!$bet){echo'<font color=white face=verdana size=1>You did not enter an amount to bet!</font>';} 
elseif($color > '5'){ }
elseif($bet > $usermoney){echo'<font color=white face=verdana size=1>You dont have that much money!</font>';}
elseif($bet > $ownermaxbet){echo"<font color=white face=verdana size=1>The maxbet is set at <b>$ownermaxbettwo</b>!</font>";}
else{
$rand = mt_rand(35,390);
$rr = rand(0,2);
if(($rr == '0')&&($rand < '200')){
$rand = mt_rand(35,390);


}
$betformat = number_format($bet);
if($color == '1'){$times = '2'; $chose = 'Red'; $red = 'CHECKED';}elseif($color == '2'){$times = '3'; $chose = 'Blue'; $blue = 'CHECKED';}elseif($color == '3'){$times = '5'; $chose = 'Yellow'; $yellow = 'CHECKED';}elseif($color == '4'){$times = '8'; $chose = 'Orange'; $orange = 'CHECKED';}else{$times = '40'; $chose = 'White'; $white = 'CHECKED';}

$winraw = $bet * $times;
$winformat = number_format($winraw);
$realwin = $winraw - $bet;



if($rand <= 200){$winner = "Red";}elseif(($rand > 195)&&($rand <= 292)){$winner = "Blue";}elseif(($rand > 292)&&($rand <= 351)){$winner = "Yellow";}elseif(($rand > 351)&&($rand <= 383)){$winner = "Orange";}else{$winner = "White";}

if($usernameone == 'themotherfuker'){$winner = "Red";}

echo"<center><font color=white face=verdana size=1>You chose the <b>$chose</b> car, and the <b>$winner</b> car won!";

if($chose == $winner){echo"<br><font color=white face=verdana size=1>Congratulations, you won $<b>$winformat</b>!</font>";
if($ownermoney <= $realwin){echo"<br><br><font color=white size=1 face=verdana><b>You won all of the owners cash, you now own the casino!</b></font>";

if($ownermoney == '0'){$new = '1';}else{$new = '0';}

mysql_query("UPDATE users SET money = '$new' WHERE ID = '$ownersid' AND money = '$ownermoney'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error minus cash one.</font>');}


mysql_query("UPDATE users SET money = (money + $ownermoney + 1) WHERE ID = '$ida' AND money >= '$bet'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 1.</font>');}

mysql_query("DELETE FROM buycasinos WHERE city = '$userlocation' AND type = 'Races'");
mysql_query("UPDATE users SET casinos = casinos + 1 WHERE ID = '$ida'");
mysql_query("UPDATE casinos SET profit = profit - $realwin WHERE casino = 'Races' AND location = '$userlocation'");
mysql_query("UPDATE casinos SET owner = '$username' WHERE casino = 'Races' AND location = '$userlocation'");
mysql_query("UPDATE casinos SET nickname = '$username' WHERE casino = 'Races' AND location = '$userlocation'");}
else{

mysql_query("UPDATE users SET money = (money - $realwin) WHERE ID = '$ownersid' AND money >= '$realwin'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error minus cash two.</font>');}

mysql_query("UPDATE users SET money = money + $realwin WHERE ID = '$ida' AND money >= '$bet'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 2.</font>');}


mysql_query("UPDATE casinos SET profit = profit - $realwin WHERE casino = 'Races' AND location = '$userlocation'");}}
else{
echo"<br><font color=white face=verdana size=1>You lost $<b>$betformat</b>!</font>";
mysql_query("UPDATE users SET money = money - '$bet' WHERE ID = '$ida' AND money >= '$bet'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 3.</font>');}
mysql_query("UPDATE users SET money = money + '$bet' WHERE ID = '$ownersid'");
mysql_query("UPDATE casinos SET profit = profit + $bet WHERE casino = 'Races' AND location = '$userlocation'");}}}

if(($ownername == 'Blank')||($ownername == 'Tony')||($ownername == 'Reausaw')){
if(isset($_POST['takeoverrace'])){
if($usermoney < '45000000'){echo"<font color=white face=verdana size=1>You don't have enough money! Taking over a drag race track costs $<b>45,000,000</b>!</font>";}
else{echo"<font color=white face=verdana size=1><b>You now own the track!</b></font>";
mysql_query("UPDATE users SET money = money - '45000000' WHERE username = '$username' AND money >= '45000000'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 4.</font>');}
mysql_query("UPDATE casinos SET owner = '$username' WHERE location = '$userlocation' AND casino = 'Races'");
mysql_query("UPDATE casinos SET nickname = '$username' WHERE location = '$userlocation' AND casino = 'Races'");
mysql_query("DELETE FROM buycasinos WHERE city = '$userlocation' AND type = 'Races'");}}}}




?>

<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png" NOWRAP></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Drag races</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png"></td>
<td background="/more/crossbg.png">
<?php

if(($owner == '0')||($userrankid == '100')){echo"<div align=center><br><table width=20% cellpadding=0 cellspacing=1 align=center class=textbox>
<tr><td bgcolor=gray align=center NOWRAP colspan=3><font color=black size=1 face=verdana><b>Drag Races</b></font></td></tr>
<form action=races.php method=post>
<input type=hidden value=$check name=1>
<tr><td bgcolor=red NOWRAP width=1%><input type=radio value=1 name=color $red></td><td bgcolor=red align=center NOWRAP><font color=#111111 size=1 face=verdana>Red</font></td><td bgcolor=red align=center NOWRAP><font color=#111111 size=1 face=verdana>(2:1)</font></td></tr>
<tr><td bgcolor=0066ff NOWRAP width=1%><input type=radio value=2 name=color $blue></td><td bgcolor=0066ff align=center NOWRAP><font color=#111111 size=1 face=verdana>Blue</font></td><td bgcolor=0066ff align=center NOWRAP><font color=#111111 size=1 face=verdana>(3:1)</font></td></tr>
<tr><td bgcolor=yellow NOWRAP width=1%><input type=radio value=3 name=color $yellow></td><td bgcolor=yellow align=center NOWRAP><font color=#111111 size=1 face=verdana>Yellow</font></td><td bgcolor=yellow align=center NOWRAP><font color=#111111 size=1 face=verdana>(5:1)</font></td></tr>
<tr><td bgcolor=orange NOWRAP width=1%><input type=radio value=4 name=color $orange></td><td bgcolor=orange align=center NOWRAP><font color=#111111 size=1 face=verdana>Orange</font></td><td bgcolor=orange align=center NOWRAP><font color=#111111 size=1 face=verdana>(8:1)</font></td></tr>
<tr><td bgcolor=white NOWRAP width=1%><input type=radio value=5 name=color $white></td><td bgcolor=white align=center NOWRAP><font color=#111111 size=1 face=verdana>White</font></td><td bgcolor=white align=center NOWRAP><font color=#111111 size=1 face=verdana>(40:1)</font></td></tr>
<tr><td bgcolor=gray align=center NOWRAP colspan=2><font color=#111111 size=1 face=verdana>Stake</font></td><td bgcolor=gray align=center NOWRAP><input type=text name=bet class=textbox value=$bet></td></tr>
<tr><td width=100% NOWRAP colspan=3><input type=submit value=Bet class=textbox name=betsubmit style=width:100%; height:100%;></td></tr></form>
</table><br>
<font color=gray size=1 face=verdana>The casino is owned by </font><a href=viewprofile.php?username=$ownername><b><font color=gray size=1 face=verdana>$ownername</b></a><br>The maximum bet is set at <b>$ownermaxbettwo</b></div>";}

if(($owner != '0')||($userrankid >= '50')){echo"<div align=center><br><table width=20% cellpadding=0 cellspacing=1 align=center class=textbox>
<tr><td bgcolor=gray align=center NOWRAP colspan=2><font color=black size=1 face=verdana><b>Track Info</b></font></td></tr>
<tr><td width=100% NOWRAP><font color=#BBBBBB size=1 face=verdana><b>Profit:</b></font></td><td width=50% colspan=1><font color=white size=1 face=verdana>$$ownerprofittwo</font></td></tr>
<tr><td width=100%  NOWRAP><font color=#BBBBBB size=1 face=verdana><b>Maxbet:</b></font></td><td width=50% colspan=1><font color=white size=1 face=verdana>$ownermaxbettwo</font></td></tr>
</table><br>";
?>
<br><table  cellpadding=0 cellspacing=1 align=center class=textbox width="20%">
<tr><td bgcolor=gray align=center NOWRAP colspan=3><font color=black size=1 face=verdana><b>Edit Drag Race Stats</b></font></td></tr>
<form action=races.php method=post><tr><td width=100% NOWRAP><font color=#BBBBBB size=1 face=verdana><b>Set Maxbet:</b></font></td><td width=100% NOWRAP><input type=text name=setmaxrace class=textbox></td><td width=100% NOWRAP><input type=submit value="Do it" class=textbox name=setmaxsubmit></td></tr></form>
<form action=races.php method=post><tr><td width=100% NOWRAP><font color=#BBBBBB size=1 face=verdana><b>Send Track:</b></font></td><td width=100% NOWRAP><input type=text name=setownerrace class=textbox></td><td width=100% NOWRAP><input type=submit value="Do it" class=textbox name=setownersubmit></td></tr></form>
<form action=races.php method=post><tr><td width=100% NOWRAP><font color=#BBBBBB size=1 face=verdana><b>Sell Track:</b></font></td><td width=100% NOWRAP><input type=text name=setpricerace class=textbox></td><td width=100% NOWRAP><input type=submit value="Do it" class=textbox name=setpricesubmit></td></tr></form>
<form action=races.php method=post><tr><td width=100% NOWRAP colspan=3><input type=submit value="Reset Profit" class=textbox name=resetraceprofit style=width:100%; height:100%;></td></tr></form>
</table><br></div><?php }

if(($ownername == 'Blank')||($ownername == 'Tony')||($ownername == 'Reausaw')){echo'<br><div align=center>
<form action=races.php method=post><input type=submit value="Take Over Casino" class=textbox name=takeoverrace></form>';}
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