<? include 'included.php'; 
?>
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
$veri = $userarray['ver'];
$crewid = $userarray['crewid'];
$ID = $userarray['ID'];

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
if($penpoints >= '2'){die("<font color=white face=verdana size=1>You currently have $penpoints penalty points, and as a result cannot view this page. Contact the helpdesk or a moderator.</font>");}


$entertainertest = mysql_query("SELECT username FROM entertainers WHERE username  = '$username'");
$entertainer = mysql_num_rows($entertainertest);
if($entertainer != '0'){die('<font color=white face=verdana size=1>As entertainer you cannot view this page</font>');}

$ownersql = mysql_query("SELECT * FROM casinos WHERE casino = 'Bullets' AND owner = '$username' AND location = '$userlocation'");
$owner = mysql_num_rows($ownersql);
$ownerinfosql = mysql_query("SELECT * FROM casinos WHERE casino = 'Bullets' AND location = '$userlocation'");
$ownerinfoarray = mysql_fetch_array($ownerinfosql);
$ownername = $ownerinfoarray['owner'];
$ownermaxbet = $ownerinfoarray['maxbet'];
$ownerprofit = $ownerinfoarray['profit'];
$bulletssell = $ownerinfoarray['bulletssell'];
$allbullets = $ownerinfoarray['bullets'];
$ownermaxbettwo = number_format($ownerinfoarray['maxbet']);
if($ownermaxbettwo == '0'){$ownermaxbettwo = 'Free';}else{$ownermaxbettwo = "$$ownermaxbettwo";} 
$ownerprofittwo = number_format($ownerinfoarray['profit']);
$ownerstatssql = mysql_query("SELECT * FROM users WHERE username = '$ownername'");
$ownerstatsarray = mysql_fetch_array($ownerstatssql);
$ownermoney = $ownerstatsarray['money'];

$saturated = "/[^0-9]/i";
$setmaxraw = mysql_real_escape_string($_POST['setmaxbf']);
$priceraw = mysql_real_escape_string($_POST['setpricebf']);
$setownerrawraw = mysql_real_escape_string($_POST['setownerbf']);
$givea = mysql_real_escape_string($_POST['give']);
$amounta = mysql_real_escape_string($_POST['amount']);
$vera = mysql_real_escape_string($_POST['ver']);

$ver = preg_replace($saturate,"",$vera);
$amount = preg_replace($saturated,"",$amounta);


$setmax = preg_replace($saturated,"",$setmaxraw);
$setownerraw = preg_replace($saturate,"",$setownerrawraw);
$price = preg_replace($saturated,"",$priceraw);
$give = preg_replace($saturated,"",$givea);
$setmaxtwo = number_format($setmax);



if(($ownername == 'Blank')||($ownername == 'Tony')||($ownername == 'Reausaw')){
if(isset($_POST['takeoverbf'])){
if($usermoney < '75000000'){echo"<font color=white face=verdana size=1>You don't have enough money! Taking over a bullet factory costs $<b>75,000,000</b>!</font>";}
else{echo"<font color=white face=verdana size=1><b>You now own the Bullet Factory!</b></font>";
mysql_query("UPDATE users SET money = money - '75000000' WHERE username = '$username'");
mysql_query("UPDATE casinos SET owner = '$username' WHERE location = '$userlocation' AND casino = 'Bullets'");
mysql_query("UPDATE casinos SET nickname = '$username' WHERE location = '$userlocation' AND casino = 'Bullets'");
mysql_query("DELETE FROM buycasinos WHERE city = '$userlocation' AND type = 'Bullets'");}}}


$ownerinfosql = mysql_query("SELECT * FROM casinos WHERE casino = 'Bullets' AND location = '$userlocation'");
$ownerinfoarray = mysql_fetch_array($ownerinfosql);
$ownername = $ownerinfoarray['owner'];
$ownermaxbet = $ownerinfoarray['maxbet'];
$ownerprofit = $ownerinfoarray['profit'];
$bulletssell = $ownerinfoarray['bulletssell'];
$allbullets = $ownerinfoarray['bullets'];


if(($owner != '0')&&($crewid != '0')){
if(isset($_POST['givebullets'])) {
if($give > $allbullets){echo'<font color="white" face="verdana" size="1">There isnt enough bullets in the factory!</font>';}
else{
mysql_query("UPDATE casinos SET bullets = (bullets - $give) WHERE casino = 'Bullets' AND location = '$userlocation' AND bullets >= '$give'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 1.</font>');}

mysql_query("UPDATE crews SET bullets = (bullets + $give) WHERE id = '$crewid'");

echo"<font color=white face=verdana size=1>You gave $give bullets to your crew!</font>";}}}

$ownerinfosql = mysql_query("SELECT * FROM casinos WHERE casino = 'Bullets' AND location = '$userlocation'");
$ownerinfoarray = mysql_fetch_array($ownerinfosql);
$ownername = $ownerinfoarray['owner'];
$ownermaxbet = $ownerinfoarray['maxbet'];
$ownerprofit = $ownerinfoarray['profit'];
$bulletssell = $ownerinfoarray['bulletssell'];
$allbullets = $ownerinfoarray['bullets'];

if(($owner != '0')||($userrankid == '100')){
if(isset($_POST['setmaxbf'])) {
if($setmax > '5000'){echo'<font color="white" face="verdana" size="1">Bullets cannot be more than $<b>5,000</b>!</font>';}
elseif($setmax < '1'){
mysql_query("UPDATE casinos SET maxbet = '0' WHERE casino= 'Bullets' AND location = '$userlocation'");
echo'<font color="white" face="verdana" size="1">The bullet price is now <b>Free</b>!</font>';}
else{
mysql_query("UPDATE casinos SET maxbet = '$setmax' WHERE casino= 'Bullets' AND location = '$userlocation'");
echo"<font color=white face=verdana size=1>The bullet price is now $<b>$setmaxtwo</b>!</font>";}}}

$ownerinfosql = mysql_query("SELECT * FROM casinos WHERE casino = 'Bullets' AND location = '$userlocation'");
$ownerinfoarray = mysql_fetch_array($ownerinfosql);
$ownername = $ownerinfoarray['owner'];
$ownermaxbet = $ownerinfoarray['maxbet'];
$ownerprofit = $ownerinfoarray['profit'];
$bulletssell = $ownerinfoarray['bulletssell'];
$allbullets = $ownerinfoarray['bullets'];


if(($owner != '0')||($userrankid == '100')){


$setownerinfosql = mysql_query("SELECT * FROM users WHERE username = '$setownerraw'");
$setownerinfoarray = mysql_fetch_array($setownerinfosql);
$setownerinforows = mysql_num_rows($setownerinfosql);
$setowner = $setownerinfoarray['username'];
$setownerstatus = $setownerinfoarray['status'];
$ssskkk = $setownerinfoarray['rankid'];
$ssskkkid = $setownerinfoarray['ID'];


if(isset($_POST['setownerbf'])) {
if(!$setowner){die (' ');}

if($setowner == $ownername){echo'<font color="white" face="verdana" size="1">You already own the bullet factory!</font>';}
elseif($setownerinforows == '0'){echo'<font color="white" face="verdana" size="1">No such user!</font>';}
elseif(($ssskkk > '25')&&($userrankid != '100')){echo'<font color="white" face="verdana" size="1">You cannot send a casino to a TS staff member!</font>';}
elseif($setownerstatus == 'Dead'){echo'<font color="white" face="verdana" size="1">You cannot send a casino to dead player!</font>';}
else{
$cunt = mysql_num_rows(mysql_query("SELECT * FROM casinos WHERE owner = '$setowner'"));
$cunts = mysql_num_rows(mysql_query("SELECT * FROM casinos WHERE owner = '$setowner' AND casino = 'Bullets'"));
if($cunt > '1'){die('<font color=white face=verdana size=1>That user already has 2 casinos!</font>');}
if($cunts > '0'){die('<font color=white face=verdana size=1>That user already has a bullet factory!</font>');}

$penpoint = mysql_num_rows(mysql_query("SELECT * FROM ipadresses WHERE ip = '$userip' AND username = '$setowner'"));
if(($penpoint > '0')&&($setowner != $username)){ mysql_query("UPDATE users SET penpoints = penpoints + 1 WHERE username = '$username'");
$reason = "$username sent $userlocation bullet factory to $setowner";
mysql_query("INSERT INTO penpoints(username,reason) VALUES('$username','$reason')");}

mysql_query("UPDATE casinos SET owner = '$setowner' WHERE casino= 'Bullets' AND location = '$userlocation'");
mysql_query("UPDATE casinos SET nickname = '$setownerraw' WHERE casino= 'Bullets' AND location = '$userlocation'");
mysql_query("UPDATE casinos SET maxbet = '5000' WHERE casino= 'Bullets' AND location = '$userlocation'");
echo"<font color=white face=verdana size=1>You gave the casino to </font><a href=viewprofile.php?username=$setowner><font color=white face=verdana size=1><b>$setownerraw</b>!</font></a>";
mysql_query("DELETE FROM buycasinos WHERE city = '$userlocation' AND type = 'Bullets'");

mysql_query("UPDATE users SET notify = '1', notification = 'a_open$usernameone a_closed$usernameone a_slashsent you $userlocation Bullet Factory.' WHERE username = '$ssskkkid'");}}}

if(($owner != '0')||($userrankid == '100')){
if(isset($_POST['setpricebf'])) {
mysql_query("DELETE FROM buycasinos WHERE type = 'Bullets' AND city = '$userlocation'");
$buytime = time()+86400;
mysql_query("INSERT INTO buycasinos(username,time,city,price,type)
VALUES ('$ownername','$buytime','$userlocation','$price','Bullets')");
echo"<font color=white face=verdana size=1>The casino has been added to quicktrade!</font>";
}}

$ownerinfosql = mysql_query("SELECT * FROM casinos WHERE casino = 'Bullets' AND location = '$userlocation'");
$ownerinfoarray = mysql_fetch_array($ownerinfosql);
$ownername = $ownerinfoarray['owner'];
$ownermaxbet = $ownerinfoarray['maxbet'];
$ownerprofit = $ownerinfoarray['profit'];
$bulletssell = $ownerinfoarray['bulletssell'];
$allbullets = $ownerinfoarray['bullets'];


if(($owner != '0')||($userrankid == '100')){
if(isset($_POST['resetbfprofit'])) {
echo'<font color=white face=verdana size=1>Profit reset!</font>';
mysql_query("UPDATE casinos SET profit = '0' WHERE casino= 'Bullets' AND location = '$userlocation'");}}

if($owner == '0'){
if(isset($_POST['buy'])) {
$cost = $amount * $ownermaxbet;

if(!$amount){}
elseif(strtoupper($ver) != $veri){die('<font color=white face=verdana size=1>Error, security code incorrect</font>');}
elseif($amount > $bulletssell){echo'<font color=white face=verdana size=1>There isnt enough bullets in the factory!</font>';}
elseif($cost > $usermoney){echo"<font color=white face=verdana size=1>You dont have enough money!</font>";}
else{
if($cost != '0'){
mysql_query("UPDATE users SET money = (money - $cost) WHERE username = '$username' AND money >= '$cost'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 2.</font>');}}

mysql_query("UPDATE casinos SET bulletssell = (bulletssell - $amount) WHERE location = '$userlocation' AND casino = 'Bullets' AND bulletssell >= '$amount'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 2.</font>');}

mysql_query("UPDATE casinos SET profit = (profit + $cost) WHERE location = '$userlocation' AND casino = 'Bullets'");

mysql_query("UPDATE users SET money = (money + $cost) WHERE username = '$ownername'");
mysql_query("UPDATE users SET bullets = (bullets + $amount) WHERE username = '$username'");
echo"<font color=white face=verdana size=1>You bought <b>$amount</b> bullets</font>";
$alphanum = "ABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
$randver = substr(str_shuffle($alphanum), 0, 5);
mysql_query("UPDATE users SET ver = '$randver' WHERE username = '$username'");
}
}}


?>

<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png" NOWRAP></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Bullet Factory</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png"></td>
<td background="/more/crossbg.png">
<?php

if(($owner == '0')||($userrankid == '100')){?><div align=center><br><br><br>
<form method=post>
<table cellpadding=0 cellspacing=1 width=25% align="center">
<tr><td width=100% colspan="3" height="5" bgcolor=#222222 NOWRAP align="center"></td></tr>
<tr><td width=100% colspan="3" bgcolor=#333333 NOWRAP align="center"><font color=white face=verdana size=1><b>Buy Bullets</b></font></td></tr>
<tr><td width=40% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1><b>In Stock</b>:</font></td><td width=60% colspan="2" bgcolor=#222222 NOWRAP><b><font color=white face=verdana size=1><?echo$bulletssell;?></b></font></td></tr>
<tr><td width=40% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1><b>Security Code</b>:</font></td><td width=40% bgcolor=#222222 NOWRAP><input type=textbox name=ver class=textbox></td><td width=20% NOWRAP bgcolor=#222222><img src=vercode.php?id=<?echo$ID;?>></td></tr>
<tr><td width=40% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1><b>Amount</b>:</font></td><td width=40% bgcolor=#222222 NOWRAP><input type=textbox name=amount class=textbox></td><td bgcolor=#222222 width=20% NOWRAP><input type=submit name=buy value='Buy' style="width:100%;" class=textbox></td></tr>
</table></form>
<br>
<font color=gray size=1 face=verdana>The casino is owned by </font><a href=viewprofile.php?username=<?echo$ownername;?>><font color=gray size=1 face=verdana><b><?echo$ownername;?></b></a><br>The bullet price bet is set at <b><?echo$ownermaxbettwo;?></b>

<?}

if(($owner != '0')||($userrankid == '100')){echo"<div align=center><br><table width=20% cellpadding=0 cellspacing=1 align=center class=textbox>
<tr><td bgcolor=gray align=center NOWRAP colspan=2><font color=black size=1 face=verdana><b>Bullet Factory Info</b></font></td></tr>
<tr><td width=100%  NOWRAP><font color=#BBBBBB size=1 face=verdana><b>Total Bullets:</b></font></td><td width=50% colspan=1><font color=white size=1 face=verdana>$allbullets</font></td></tr>
<tr><td width=100% NOWRAP><font color=#BBBBBB size=1 face=verdana><b>Profit:</b></font></td><td width=50% colspan=1><font color=white size=1 face=verdana>$$ownerprofittwo</font></td></tr>
<tr><td width=100%  NOWRAP><font color=#BBBBBB size=1 face=verdana><b>Bullet Price:</b></font></td><td width=50% colspan=1><font color=white size=1 face=verdana>$ownermaxbettwo</font></td></tr>
</table><br>";
?>
<br><table  cellpadding=0 cellspacing=1 align=center class=textbox width="20%">
<tr><td bgcolor=gray align=center NOWRAP colspan=3><font color=black size=1 face=verdana><b>Edit Bullet Factory Stats</b></font></td></tr>
<form method=post><tr><td width=100% NOWRAP><font color=#BBBBBB size=1 face=verdana><b>Set Bullet Price:</b></font></td><td width=100% NOWRAP><input type=text name=setmaxbf class=textbox></td><td width=100% NOWRAP><input type=submit value="Do it" class=textbox name=setmaxsubmit></td></tr></form>
<form method=post><tr><td width=100% NOWRAP><font color=#BBBBBB size=1 face=verdana><b>Send Bullet Factory:</b></font></td><td width=100% NOWRAP><input type=text name=setownerbf class=textbox></td><td width=100% NOWRAP><input type=submit value="Do it" class=textbox name=setownersubmit></td></tr></form>
<form method=post><tr><td width=100% NOWRAP><font color=#BBBBBB size=1 face=verdana><b>Sell Bullet Factory:</b></font></td><td width=100% NOWRAP><input type=text name=setpricebf class=textbox></td><td width=100% NOWRAP><input type=submit value="Do it" class=textbox name=setpricesubmit></td></tr></form>
<? if($crewid != '0'){?><form method=post><tr><td width=100% NOWRAP><font color=#BBBBBB size=1 face=verdana><b>Give Bullets To Crew:</b></font></td><td width=100% NOWRAP><input type=text name=give class=textbox></td><td width=100% NOWRAP><input type=submit value='Do it' class=textbox name=givebullets></td></tr></form><?}?>
<form method=post><tr><td width=100% NOWRAP colspan=3><input type=submit value="Reset Profit" class=textbox name=resetbfprofit style=width:100%; height:100%;></td></tr></form>

</table><br></div><?php }?>

<?
if(($ownername == 'Blank')||($ownername == 'Tony')||($ownername == 'Reausaw')){echo'<br><div align=center>
<form method=post><input type=submit value="Take Over Casino" class=textbox name=takeoverbf></form>';}
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
<?
$statustest = mysql_query("SELECT * FROM users WHERE username = '$usernameone'")or die(mysql_error());
$statustesttwo = mysql_fetch_array($statustest);?>
<? include 'rightmenu.php'; ?>
</td>
</tr>
</table>

</body>
<head><META HTTP-EQUIV="Pragma" CONTENT="no-cache"></head></html>