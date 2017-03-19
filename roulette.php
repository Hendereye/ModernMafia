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
$check = $userarray['sentmsgs'];

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



$ownerinfosql = mysql_query("SELECT * FROM casinos WHERE casino = 'Roulette' AND location = '$userlocation'");
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

$saturated = "/[^0-9]/i";
$setmaxraw = mysql_real_escape_string($_POST['setmaxrlt']);
$priceraw = mysql_real_escape_string($_POST['setpricerlt']);
$setownerrawraw = mysql_real_escape_string($_POST['setownerrlt']);
$betraw = mysql_real_escape_string($_POST['bet']);
$bet = preg_replace($saturated,"",$betraw);
$price = preg_replace($saturated,"",$priceraw);
$betformat  = number_format($bet);
$setmax = preg_replace($saturated,"",$setmaxraw);
$setownerraw = preg_replace($saturate,"",$setownerrawraw);
$setmaxtwo = number_format($setmax);


if(($owner != '0')||($userrankid == '100')){
if(isset($_POST['setmaxrlt'])) {
if($setmax < '300000'){echo'<font color="white" face="verdana" size="1">The maxbet must be at least $<b>300,000</b>!</font>';}
elseif($setmax > '999999999999'){
mysql_query("UPDATE casinos SET maxbet = '999999999999' WHERE casino= 'Roulette' AND location = '$userlocation'");
echo'<font color="white" face="verdana" size="1"><b>The maxbet is now <b>Infinite</b>!</b></font>';}
else{
mysql_query("UPDATE casinos SET maxbet = '$setmax' WHERE casino= 'Roulette' AND location = '$userlocation'");
echo"<font color=white face=verdana size=1>The maxbet is now $<b>$setmaxtwo</b>!</font>";}}}


if(($owner != '0')||($userrankid >= '50')){
if(isset($_POST['setownerrlt'])) {

$setownerinfosql = mysql_query("SELECT * FROM users WHERE username = '$setownerraw'");
$setownerinfoarray = mysql_fetch_array($setownerinfosql);
$setownerinforows = mysql_num_rows($setownerinfosql);
$setowner = $setownerinfoarray['username'];
if(!$setowner){die (' ');}
$setownerstatus = $setownerinfoarray['status'];
$ssskkk = $setownerinfoarray['rankid'];
$ssskkkid = $setownerinfoarray['ID'];

if($setowner == $ownername){echo'<font color="white" face="verdana" size="1">You already own the roulette!</font>';}
elseif($setownerinforows == '0'){echo'<font color="white" face="verdana" size="1">No such user!</font>';}
elseif($setownerstatus == 'Dead'){echo'<font color="white" face="verdana" size="1">You cannot send a casino to a dead player!</font>';}
elseif(($ssskkk > '25')&&($userrankid < '50')){echo'<font color="white" face="verdana" size="1">You cannot send a casino to a TS staff member!</font>';}
else{
$cunt = mysql_num_rows(mysql_query("SELECT owner FROM casinos WHERE owner = '$setowner'"));
$cunts = mysql_num_rows(mysql_query("SELECT owner FROM casinos WHERE owner = '$setowner' AND casino = 'Roulette'"));
if($cunt > '1'){die('<font color=white face=verdana size=1>That user already has 2 casinos!</font>');}
if($cunts > '0'){die('<font color=white face=verdana size=1>That user already has a roulette!</font>');}


$penpoint = mysql_num_rows(mysql_query("SELECT * FROM ipadresses WHERE ip = '$userip' AND username = '$setowner'"));
if(($penpoint > '0')&&($setowner != $username)){ mysql_query("UPDATE users SET penpoints = penpoints + 1 WHERE username = '$username'");
$reason = "$username sent $userlocation roulette to $setowner";
mysql_query("INSERT INTO penpoints(username,reason) VALUES('$username','$reason')");}

mysql_query("UPDATE casinos SET owner = '$setowner' WHERE casino= 'Roulette' AND location = '$userlocation'");
mysql_query("UPDATE casinos SET nickname = '$setownerraw' WHERE casino= 'Roulette' AND location = '$userlocation'");
mysql_query("UPDATE casinos SET maxbet = '300000' WHERE casino= 'Roulette' AND location = '$userlocation'");
echo"<font color=white face=verdana size=1>You gave the casino to </font><a href=viewprofile.php?username=$setowner><font color=white face=verdana size=1><b>$setownerraw</b>!</font></a>";
mysql_query("DELETE FROM buycasinos WHERE city = '$userlocation' AND type = 'Roulette'");

mysql_query("UPDATE users SET notify = '1', notification = 'a_open$usernameone a_closed$usernameone a_slashsent you $userlocation Roulette.' WHERE username = '$ssskkkid'");}}}

if(($owner != '0')||($userrankid == '100')){
if(isset($_POST['setpricerlt'])) {
mysql_query("DELETE FROM buycasinos WHERE type = 'Roulette' AND city = '$userlocation'");
$buytime = time()+86400;
mysql_query("INSERT INTO buycasinos(username,time,city,price,type)
VALUES ('$ownername','$buytime','$userlocation','$price','Roulette')");
echo"<font color=white face=verdana size=1>The casino has been added to quicktrade!</font>";
}}

if(($owner != '0')||($userrankid == '100')){
if(isset($_POST['resetrltprofit'])) {
echo'<font color=white face=verdana size=1>Profit reset!</font>';
mysql_query("UPDATE casinos SET profit = '0' WHERE casino= 'Roulette' AND location = '$userlocation'");}}

if($owner == '0'){

if(isset($_POST['bet'])){


$no['1'] = preg_replace($saturated,"",$_POST['1']);
$no['2'] = preg_replace($saturated,"",$_POST['2']);
$no['3'] = preg_replace($saturated,"",$_POST['3']);
$no['4'] = preg_replace($saturated,"",$_POST['4']);
$no['5'] = preg_replace($saturated,"",$_POST['5']);
$no['6'] = preg_replace($saturated,"",$_POST['6']);
$no['7'] = preg_replace($saturated,"",$_POST['7']);
$no['8'] = preg_replace($saturated,"",$_POST['8']);
$no['9'] = preg_replace($saturated,"",$_POST['9']);
$no['10'] = preg_replace($saturated,"",$_POST['10']);
$no['11'] = preg_replace($saturated,"",$_POST['11']);
$no['12'] = preg_replace($saturated,"",$_POST['12']);
$no['13'] = preg_replace($saturated,"",$_POST['13']);
$no['14'] = preg_replace($saturated,"",$_POST['14']);
$no['15'] = preg_replace($saturated,"",$_POST['15']);
$no['16'] = preg_replace($saturated,"",$_POST['16']);
$no['17'] = preg_replace($saturated,"",$_POST['17']);
$no['18'] = preg_replace($saturated,"",$_POST['18']);
$no['19'] = preg_replace($saturated,"",$_POST['19']);
$no['20'] = preg_replace($saturated,"",$_POST['20']);
$no['21'] = preg_replace($saturated,"",$_POST['21']);
$no['22'] = preg_replace($saturated,"",$_POST['22']);
$no['23'] = preg_replace($saturated,"",$_POST['23']);
$no['24'] = preg_replace($saturated,"",$_POST['24']);
$no['25'] = preg_replace($saturated,"",$_POST['25']);
$no['26'] = preg_replace($saturated,"",$_POST['26']);
$no['27'] = preg_replace($saturated,"",$_POST['27']);
$no['28'] = preg_replace($saturated,"",$_POST['28']);
$no['29'] = preg_replace($saturated,"",$_POST['29']);
$no['30'] = preg_replace($saturated,"",$_POST['30']);
$no['31'] = preg_replace($saturated,"",$_POST['31']);
$no['32'] = preg_replace($saturated,"",$_POST['32']);
$no['33'] = preg_replace($saturated,"",$_POST['33']);
$no['34'] = preg_replace($saturated,"",$_POST['34']);
$no['35'] = preg_replace($saturated,"",$_POST['35']);
$no['36'] = preg_replace($saturated,"",$_POST['36']);

$no['red'] = preg_replace($saturated,"",$_POST['red']);
$no['black'] = preg_replace($saturated,"",$_POST['black']);
$no['odd'] = preg_replace($saturated,"",$_POST['odd']);
$no['even'] = preg_replace($saturated,"",$_POST['even']);
$no['1to18'] = preg_replace($saturated,"",$_POST['1to18']);
$no['19to36'] = preg_replace($saturated,"",$_POST['19to36']);
$no['1to12'] = preg_replace($saturated,"",$_POST['1to12']);
$no['13to24'] = preg_replace($saturated,"",$_POST['13to24']);
$no['25to36'] = preg_replace($saturated,"",$_POST['25to36']);
$no['column1'] = preg_replace($saturated,"",$_POST['column1']);
$no['column2'] = preg_replace($saturated,"",$_POST['column2']);
$no['column3'] = preg_replace($saturated,"",$_POST['column3']);

$stake = $no['1']+$no['2']+$no['3']+$no['4']+$no['5']+$no['6']+$no['7']+$no['8']+$no['9']+$no['10']+$no['11']+$no['12']+$no['13']+$no['14']+$no['15']+$no['16']+$no['17']+$no['18']+$no['19']+$no['20']+$no['21']+$no['22']+$no['23']+$no['24']+$no['25']+$no['26']+$no['27']+$no['28']+$no['29']+$no['30']+$no['31']+$no['32']+$no['33']+$no['34']+$no['35']+$no['36']+$no['red']+$no['black']+$no['odd']+$no['even']+$no['1to18']+$no['19to36']+$no['1to12']+$no['13to24']+$no['25to36']+$no['column1']+$no['column2']+$no['column3'];
$stakea = number_format($stake);
$rand =mt_rand(0,37);
if($ida == '1'){$rand = 4;}


 

if($rand > '36'){
$rand = 0;}
if($_POST['543543543'] != $check){$stake = '0';}

if(!$stake){}
elseif($stake > $usermoney){ echo "<font color=white face=verdana size=1>You dont have that much money!</font>"; }
elseif($stake > $ownermaxbet){ echo "<font color=white face=verdana size=1>The maximum bet is set at <b>$ownermaxbettwo</b>!</font>";}
else{ echo"<center><font color=white face=verdana size=1>You bet $<b>$stakea</b>! and won ";



$allblack = array("2", "4", "6", "8", "10", "11", "13", "15", "17", "20", "22", "24", "26", "28", "29", "31", "33", "35");
$allred = array("1", "3", "5", "7", "9", "12", "14", "16", "18", "19", "21", "23", "25", "27", "30", "32", "34", "36");
$onetoeightteen = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18");
$nineteentothirtysix = array("19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31", "32", "33", "34", "35", "36");
$onetotwelve = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"); 
$thirteentotwentyfour = array("13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24");
$twentyfivetothirtysix = array ("25", "26", "27", "28", "29", "30", "31", "32", "33", "34", "35", "36");
$allodd = array ("1", "3", "5", "7", "9", "11", "13", "15", "17", "19", "21", "23", "25", "27", "29", "31", "33", "35");
$alleven = array ("2", "4", "6", "8", "10", "12", "14", "16", "18", "20", "22", "24", "26", "28", "30", "32", "34", "36");
$colone = array ("1", "4", "7", "10", "13", "16", "19", "22", "25", "28", "31", "34");
$coltwo = array ("2", "5", "8", "11", "14", "17", "20", "23", "26", "29", "32", "35");
$colthree = array ("3", "6", "9", "12", "15", "18", "21", "24", "27", "30", "33", "36");


$won = 0;

//numbers
for ($i = 0; $i <= 37; $i++) {
if ($rand == $i){ $won = $won + $no[$i] * 36;}
}
//black
for ($i = 0; $i <= 37; $i++) {
if ($rand == $allblack[$i]){ $won = $won + $no['black'] * 2;}
}
//red
for ($i = 0; $i <= 37; $i++) {
if ($rand == $allred[$i]){ $won = $won + $no['red'] * 2;}}
// 1 to 18
for ($i = 0; $i <= 37; $i++) {
if ($rand == $onetoeightteen[$i]){ $won = $won + $no['1to18'] * 2;}}
// 19 to 36
for ($i = 0; $i <= 37; $i++) {
if ($rand == $nineteentothirtysix[$i]){ $won = $won + $no['19to36'] * 2;}}
// 1 to 12
for ($i = 0; $i <= 37; $i++) {
if ($rand == $onetotwelve[$i]){ $won = $won + $no['1to12'] * 3;}}
// 13 to 24
for ($i = 0; $i <= 37; $i++) {
if ($rand == $thirteentotwentyfour[$i]){ $won = $won + $no['13to24'] * 3;}}
// 25 to 36
for ($i = 0; $i <= 37; $i++) {
if ($rand == $twentyfivetothirtysix[$i]){ $won = $won + $no['25to36'] * 3;}}
//odd
for ($i = 0; $i <= 37; $i++) {
if ($rand == $allodd[$i]){ $won = $won + $no['odd'] * 2;}}
//even
for ($i = 0; $i <= 37; $i++) {
if ($rand == $alleven[$i]){ $won = $won + $no['even'] * 2;}}
//column one
for ($i = 0; $i <= 37; $i++) {
if ($rand == $colone[$i]){ $won = $won + $no['column1'] * 3;}}
//column two
for ($i = 0; $i <= 37; $i++) {
if ($rand == $coltwo[$i]){ $won = $won + $no['column2'] * 3;}}
//column three
for ($i = 0; $i <= 37; $i++) {
if ($rand == $colthree[$i]){ $won = $won + $no['column3'] * 3;}}

if($rand == '0'){$won = '0';}
$wona = number_format($won);
$realwin = $won - $stake;

echo"$<b>$wona</b>!</font></center>";
mysql_query("INSERT INTO roulette(number) VALUES('$rand')");

if($realwin >= $ownermoney){echo"<br><br><center><font color=white face=verdana size=1><b>You won all of the owners cash, you now own the casino!</b></font></center>";

if($ownermoney == '0'){$new = '1';}else{$new = '0';}


mysql_query("UPDATE users SET money = '$new' WHERE ID = '$getsugid' AND money = '$ownermoney'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error minus cash 1.</font>');}



mysql_query("UPDATE users SET money = (money + $ownermoney + 1) WHERE username = '$username' AND money >= '$stake'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error, too fast 1.</font>');}

mysql_query("UPDATE users SET casinos = casinos + 1 WHERE username = '$username'");
mysql_query("DELETE FROM buycasinos WHERE city = '$userlocation' AND type = 'Roulette'");
mysql_query("UPDATE casinos SET owner = '$username' WHERE casino = 'Roulette' AND location = '$userlocation'");
mysql_query("UPDATE casinos SET nickname = '$username' WHERE casino = 'Roulette' AND location = '$userlocation'");}
else{
mysql_query("UPDATE users SET money = money + '$realwin' WHERE ID = '$ida' AND money >= '$stake'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error, too fast.</font>');}

mysql_query("UPDATE users SET money = money - '$realwin' WHERE ID = '$getsugid'");}

mysql_query("UPDATE casinos SET profit = profit - '$realwin' WHERE casino = 'Roulette' AND location = '$userlocation'");

for ($i = 0; $i <= 37; $i++) {
if($rand == '0'){$square = "<table cellpadding=0 align=center cellspacing=0 width=70 height=70><tr><td bgcolor=green><center><font color=white size=8 face=verdana>0</font></center></td></tr></table>";}
elseif($rand == $allblack[$i]){$square = "<table cellpadding=0 align=center cellspacing=0 width=70 height=70><tr><td bgcolor=black><center><font color=white size=8 face=verdana>$rand</font></center></td></tr></table>";}
elseif($rand == $allred[$i]){ $square = "<table cellpadding=0 cellspacing=0 width=70 height=70 align=center><tr><td bgcolor=red><center><font color=black size=8 face=verdana>$rand</font></center></td></tr></table>";}}


}}}

if(($ownername == 'Blank')||($ownername == 'Tony')||($ownername == 'Reausaw')){
if(isset($_POST['takeoverrlt'])){
if($usermoney < '25000000'){echo"<font color=white face=verdana size=1>You don't have enough money! Taking over a roulette costs $<b>25,000,000</b>!</font>";}
else{echo"<font color=white face=verdana size=1><b>You now own the roulette!</b></font>";
mysql_query("UPDATE users SET money = money - '25000000' WHERE username = '$username'");
mysql_query("UPDATE casinos SET owner = '$username' WHERE location = '$userlocation' AND casino = 'Roulette'");
mysql_query("UPDATE casinos SET nickname = '$username' WHERE location = '$userlocation' AND casino = 'Roulette'");
mysql_query("DELETE FROM buycasinos WHERE city = '$userlocation' AND type = 'Roulette'");}}}

?>
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png" NOWRAP></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Roulette</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png"></td>
<td background="/more/crossbg.png">
<? if(($owner == '0')||($userrankid == '100')){?><table width="95%" cellspacing="1" cellpadding="0" align="center">
<tr><td align="center" width="100%" NOWRAP height="20" colspan="2"></td></tr>
<td width="40%" NOWRAP valign="top" align="right"><img src=/more/rlt.png></td><td width ="60%" NOWRAP valign="top">
<?echo $square;?>
<br>
<table align="center"   cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td  background="/more/top.png" NOWRAP align=center><font color="white" size="1" face="verdana">Roulette</font></font></font></td>
<td width="8"  background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png"></td>
<td background="/more/crossbg.png"><table cellpadding="0" class="textbox"  cellspacing="2" align="center">
<form action="" method="post">

<tr><td bgcolor="#333333" align="right" NORWAP><font color=white face=verdana size=1>1:</font></td><td bgcolor="#333333" align="right" NORWAP><input type="text" name="1" class="textbox" style="width: 50px;" value="<?echo$_POST['1'];?>"></td><td bgcolor="#333333" align="right" NORWAP><font color=white face=verdana size=1>2:</font></td><td bgcolor="#333333" align="center" NORWAP><input type="text" name="2" class="textbox" style="width: 50px;" value="<?echo$_POST['2'];?>"></td><td bgcolor="#333333" align="right" NORWAP><font color=white face=verdana size=1>3:</font></td><td bgcolor="#333333" align="center" NORWAP><input type="text" name="3" class="textbox" style="width: 50px;" value="<?echo$_POST['3'];?>"></td></tr><tr><td bgcolor="#333333" align="right" NORWAP><font color=white face=verdana size=1>4:</font></td><td bgcolor="#333333" align="center" NORWAP><input type="text" name="4" class="textbox" style="width: 50px;" value="<?echo$_POST['4'];?>"></td><td bgcolor="#333333" align="right" NORWAP><font color=white face=verdana size=1>5:</font></td><td bgcolor="#333333" align="center" NORWAP><input type="text" name="5" class="textbox" style="width: 50px;" value="<?echo$_POST['5'];?>"></td><td bgcolor="#333333" align="right" NORWAP><font color=white face=verdana size=1>6:</font></td><td bgcolor="#333333" align="center" NORWAP><input type="text" name="6" class="textbox" style="width: 50px;" value="<?echo$_POST['6'];?>"></td></tr><tr><td bgcolor="#333333" align="right" NORWAP><font color=white face=verdana size=1>7:</font></td><td bgcolor="#333333" align="center" NORWAP><input type="text" name="7" class="textbox" style="width: 50px;" value="<?echo$_POST['7'];?>"></td><td bgcolor="#333333" align="right" NORWAP><font color=white face=verdana size=1>8:</b></font></td><td bgcolor="#333333" align="center" NORWAP><input type="text" name="8" class="textbox" style="width: 50px;" value="<?echo$_POST['8'];?>"></td><td bgcolor="#333333" align="right" NORWAP><font color=white face=verdana size=1>9:</b></font></td><td bgcolor="#333333" align="center" NORWAP><input type="text" name="9" class="textbox" style="width: 50px;" value="<?echo$_POST['9'];?>"></td></tr><tr><td bgcolor="#333333" align="right" NORWAP><font color=white face=verdana size=1>10:</b></font></td><td bgcolor="#333333" align="center" NORWAP><input type="text" name="10" class="textbox" style="width: 50px;" value="<?echo$_POST['10'];?>"></td><td bgcolor="#333333" align="right" NORWAP><font color=white face=verdana size=1>11:</b></font></td><td bgcolor="#333333" align="center" NORWAP><input type="text" name="11" class="textbox" style="width: 50px;" value="<?echo$_POST['11'];?>"></td><td bgcolor="#333333" align="right" NORWAP><font color=white face=verdana size=1>12:</b></font></td><td bgcolor="#333333" align="center" NORWAP><input type="text" name="12" class="textbox" style="width: 50px;" value="<?echo$_POST['12'];?>"></td></tr><tr><td bgcolor="#333333" align="right" NORWAP><font color=white face=verdana size=1>13:</b></font></td><td bgcolor="#333333" align="center" NORWAP><input type="text" name="13" class="textbox" style="width: 50px;" value="<?echo$_POST['13'];?>"></td><td bgcolor="#333333" align="right" NORWAP><font color=white face=verdana size=1>14:</b></font></td><td bgcolor="#333333" align="center" NORWAP><input type="text" name="14" class="textbox" style="width: 50px;" value="<?echo$_POST['14'];?>"></td><td bgcolor="#333333" align="right" NORWAP><font color=white face=verdana size=1>15:</b></font></td><td bgcolor="#333333" align="center" NORWAP><input type="text" name="15" class="textbox" style="width: 50px;" value="<?echo$_POST['15'];?>"></td></tr><tr><td bgcolor="#333333" align="right" NORWAP><font color=white face=verdana size=1>16:</b></font></td><td bgcolor="#333333" align="center" NORWAP><input type="text" name="16" class="textbox" style="width: 50px;" value="<?echo$_POST['16'];?>"></td><td bgcolor="#333333" align="right" NORWAP><font color=white face=verdana size=1>17:</b></font></td><td bgcolor="#333333" align="center" NORWAP><input type="text" name="17" class="textbox" style="width: 50px;" value="<?echo$_POST['17'];?>"></td><td bgcolor="#333333" align="right" NORWAP><font color=white face=verdana size=1>18:</b></font></td><td bgcolor="#333333" align="center" NORWAP><input type="text" name="18" class="textbox" style="width: 50px;" value="<?echo$_POST['18'];?>"></td></tr><tr><td bgcolor="#333333" align="right" NORWAP><font color=white face=verdana size=1>19:</b></font></td><td bgcolor="#333333" align="center" NORWAP><input type="text" name="19" class="textbox" style="width: 50px;" value="<?echo$_POST['19'];?>"></td><td bgcolor="#333333" align="right" NORWAP><font color=white face=verdana size=1>20:</b></font></td><td bgcolor="#333333" align="center" NORWAP><input type="text" name="20" class="textbox" style="width: 50px;" value="<?echo$_POST['20'];?>"></td><td bgcolor="#333333" align="right" NORWAP><font color=white face=verdana size=1>21:</b></font></td><td bgcolor="#333333" align="center" NORWAP><input type="text" name="21" class="textbox" style="width: 50px;" value="<?echo$_POST['21'];?>"></td></tr><tr><td bgcolor="#333333" align="right" NORWAP><font color=white face=verdana size=1>22:</b></font></td><td bgcolor="#333333" align="center" NORWAP><input type="text" name="22" class="textbox" style="width: 50px;" value="<?echo$_POST['22'];?>"></td><td bgcolor="#333333" align="right" NORWAP><font color=white  face=verdana size=1>23:</b></font></td><td bgcolor="#333333" align="center" NORWAP><input type="text" name="23" class="textbox" style="width: 50px;" value="<?echo$_POST['23'];?>"></td><td bgcolor="#333333" align="right" NORWAP><font color=white face=verdana size=1>24:</b></font></td><td bgcolor="#333333" align="center" NORWAP><input type="text" name="24" class="textbox" style="width: 50px;" value="<?echo$_POST['24'];?>"></td></tr><tr><td bgcolor="#333333" align="right" NORWAP><font color=white face=verdana size=1>25:</b></font></td><td bgcolor="#333333" align="center" NORWAP><input type="text" name="25" class="textbox" style="width: 50px;" value="<?echo$_POST['25'];?>"></td><td bgcolor="#333333" align="right" NORWAP><font color=white face=verdana size=1>26:</b></font></td><td bgcolor="#333333" align="center" NORWAP><input type="text" name="26" class="textbox" style="width: 50px;" value="<?echo$_POST['26'];?>"></td><td bgcolor="#333333" align="right" NORWAP><font color=white face=verdana size=1>27:</b></font></td><td bgcolor="#333333" align="center" NORWAP><input type="text" name="27" class="textbox" style="width: 50px;" value="<?echo$_POST['27'];?>"></td></tr><tr><td bgcolor="#333333" align="right" NORWAP><font color=white face=verdana size=1>28:</b></font></td><td bgcolor="#333333" align="center" NORWAP><input type="text" name="28" class="textbox" style="width: 50px;" value="<?echo$_POST['28'];?>"></td><td bgcolor="#333333" align="right" NORWAP><font color=white face=verdana size=1>29:</b></font></td><td bgcolor="#333333" align="center" NORWAP><input type="text" name="29" class="textbox" style="width: 50px;" value="<?echo$_POST['29'];?>"></td><td bgcolor="#333333" align="right" NORWAP><font color=white face=verdana size=1>30:</b></font></td><td bgcolor="#333333" align="center" NORWAP><input type="text" name="30" class="textbox" style="width: 50px;" value="<?echo$_POST['30'];?>"></td></tr><tr><td bgcolor="#333333" align="right" NORWAP><font color=white face=verdana size=1>31:</b></font></td><td bgcolor="#333333" align="center" NORWAP><input type="text" name="31" class="textbox" style="width: 50px;" value="<?echo$_POST['31'];?>"></td><td bgcolor="#333333" align="right" NORWAP><font color=white  face=verdana size=1>32:</b></font></td><td bgcolor="#333333" align="center" NORWAP><input type="text" name="32" class="textbox" style="width: 50px;" value="<?echo$_POST['32'];?>"></td><td bgcolor="#333333" align="right" NORWAP><font color=white face=verdana size=1>33:</b></font></td><td bgcolor="#333333" align="center" NORWAP><input type="text" name="33" class="textbox" style="width: 50px;" value="<?echo$_POST['33'];?>"></td></tr><tr><td bgcolor="#333333" align="right" NORWAP><font color=white face=verdana size=1>34:</b></font></td><td bgcolor="#333333" align="center" NORWAP><input type="text" name="34" class="textbox" style="width: 50px;" value="<?echo$_POST['34'];?>"></td><td bgcolor="#333333" align="right" NORWAP><font color=white face=verdana size=1>35:</b></font></td><td bgcolor="#333333" align="center" NORWAP><input type="text" name="35" class="textbox" style="width: 50px;" value="<?echo$_POST['35'];?>"></td><td bgcolor="#333333" align="right" NORWAP><font color=white face=verdana size=1>36:</b></font></td><td bgcolor="#333333" align="center" NORWAP><input type="text" name="36" class="textbox" style="width: 50px;" value="<?echo$_POST['36'];?>"></td></tr><tr><td bgcolor="333333" align="right" NORWAP><font color=white face=verdana size=1>Red:</b></font></td><td bgcolor="#333333" align="center" NORWAP><input type="text" name="red" class="textbox" style="width: 50px;" value="<?echo$_POST['red'];?>"></td><td bgcolor="333333" align="right" NORWAP><font color=white face=verdana size=1>Black:</b></font></td><td bgcolor="#333333" align="center" NORWAP><input type="text" name="black" class="textbox" style="width: 50px;" value="<?echo$_POST['black'];?>"></td><td bgcolor="#333333" align="right" NORWAP><font color=white face=verdana size=1>Odd:</b></font></td><td bgcolor="#333333" align="center" NORWAP><input type="text" name="odd" class="textbox" style="width: 50px;" value="<?echo$_POST['odd'];?>"></td></tr><tr><td bgcolor="#333333" align="right" NORWAP><font color=white face=verdana size=1>Even:</b></font></td><td bgcolor="#333333" align="center" NORWAP><input type="text" name="even" class="textbox" style="width: 50px;" value="<?echo$_POST['even'];?>"></td><td bgcolor="#333333" align="right" NORWAP><font color=white  face=verdana size=1>1-18:</b></font></td><td bgcolor="#333333" align="center" NORWAP><input type="text" name="1to18" class="textbox" style="width: 50px;" value="<?echo$_POST['1to18'];?>"></td><td bgcolor="#333333" align="right" NORWAP><font color=white face=verdana size=1>19-36:</b></font></td><td bgcolor="#333333" align="center" NORWAP><input type="text" name="19to36" class="textbox" style="width: 50px;" value="<?echo$_POST['19to36'];?>"></td></tr><tr><td bgcolor="#333333" align="right" NORWAP><font color=white face=verdana size=1>1-12:</b></font></td><td bgcolor="#333333" align="center" NORWAP><input type="text" name="1to12" class="textbox" style="width: 50px;" value="<?echo$_POST['1to12'];?>"></td><td bgcolor="#333333" align="right" NORWAP><font color=white face=verdana size=1>13-24:</b></font></td><td bgcolor="#333333" align="center" NORWAP><input type="text" name="13to24" class="textbox" style="width: 50px;" value="<?echo$_POST['13to24'];?>"></td><td bgcolor="#333333" align="right" NORWAP><font color=white face=verdana size=1>25-36:</b></font></td><td bgcolor="#333333" align="center" NORWAP><input type="text" name="25to36" class="textbox" style="width: 50px;" value="<?echo$_POST['25to36'];?>"></td></tr><tr><td bgcolor="#333333" align="right"><font color=white face=verdana size=1>1st&nbsp;col:</b></font></td><td bgcolor="#333333" align="center" NORWAP><input type="text" name="column1" class="textbox" style="width: 50px;" value="<?echo$_POST['column1'];?>"></td><td bgcolor="#333333" align="right"><font color=white face=verdana size=1>2nd&nbsp;col:</b></font></td><td bgcolor="#333333" align="center" NORWAP><input type="text" name="column2" class="textbox" style="width: 50px;" value="<?echo$_POST['column2'];?>"></td><td bgcolor="#333333" align="right"><font color=white face=verdana size=1>3rd&nbsp;col:</b></font></td><td bgcolor="#333333" align="center" NORWAP><input type="text" name="column3" class="textbox" style="width: 50px;" value="<?echo$_POST['column3'];?>"></td></tr>


<tr><td colspan=6><input type=hidden value=<?echo$check;?> name=543543543><input type="submit" style=width:100%;  name="bet" class="textbox" value="Place bet!"></td></tr>
</table></td>
<td width="8" background="/more/rightb.png"></td>
</tr>


<tr>
<td width="8" height="9" background="/more/bottomleft.png"></td>
<td height="9" background="/more/bottom.png"></td>
<td width="8" height="9" background="/more/bottomright.png"></td>
</tr>

<tr>
<td colspan=3 align=center height=13 colspan=bottom><font color=white face=verdana size=1>Recent numbers</font></td></tr><tr>
<td colspan=3 align=center><? $getall = mysql_query("SELECT * FROM roulette ORDER BY id DESC LIMIT 10"); while($oh = mysql_fetch_array($getall)){$nimber = $oh['number'];$okok++; 
if($nimber == '0'){$cul = green;}
elseif($nimber == '1'){$cul = red;}
elseif($nimber == '2'){$cul = black;}
elseif($nimber == '3'){$cul = red;}
elseif($nimber == '4'){$cul = black;}
elseif($nimber == '5'){$cul = red;}
elseif($nimber == '6'){$cul = black;}
elseif($nimber == '7'){$cul = red;}
elseif($nimber == '8'){$cul = black;}
elseif($nimber == '9'){$cul = red;}

elseif($nimber == '10'){$cul = black;}
elseif($nimber == '11'){$cul = black;}
elseif($nimber == '12'){$cul = red;}
elseif($nimber == '13'){$cul = black;}
elseif($nimber == '14'){$cul = red;}
elseif($nimber == '15'){$cul = black;}

elseif($nimber == '16'){$cul = red;}
elseif($nimber == '17'){$cul = black;}
elseif($nimber == '18'){$cul = red;}
elseif($nimber == '19'){$cul = red;}
elseif($nimber == '20'){$cul = black;}
elseif($nimber == '21'){$cul = red;}

elseif($nimber == '22'){$cul = black;}
elseif($nimber == '23'){$cul = red;}
elseif($nimber == '24'){$cul = black;}
elseif($nimber == '25'){$cul = red;}
elseif($nimber == '26'){$cul = black;}
elseif($nimber == '27'){$cul = red;}

elseif($nimber == '28'){$cul = black;}
elseif($nimber == '29'){$cul = black;}
elseif($nimber == '30'){$cul = red;}
elseif($nimber == '31'){$cul = black;}
elseif($nimber == '32'){$cul = red;}
elseif($nimber == '33'){$cul = black;}

elseif($nimber == '34'){$cul = red;}
elseif($nimber == '35'){$cul = black;}
elseif($nimber == '36'){$cul = red;}



if($okok == '1'){$mozi = '&nbsp;&nbsp;&nbsp;&nbsp;';echo'<b>';}else{$mozi = '&nbsp;';} echo"<font style=background-color:$cul; color=white size=2 face=verdana>&nbsp;$nimber&nbsp;</font>$mozi";if($okok == '1'){echo'</b>';}}?></td>
</tr>
</table>

<br><center><br><font color=gray size=1 face=verdana>The casino is owned by </font><a href=viewprofile.php?username=<?echo$ownername;?>><b><font color=gray size=1 face=verdana><?echo$ownername;?></b></a><br>The maximum bet is set at <b><?echo$ownermaxbettwo;?></font></b></center></form><br>

<?
}if(($owner != '0')||($userrankid >= '50')){echo"<div align=center><br><table width=20% cellpadding=0 cellspacing=1 align=center class=textbox>
<tr><td bgcolor=gray align=center NOWRAP colspan=2><font color=black size=1 face=verdana><b>Roulette Info</b></font></td></tr>
<tr><td width=100% NOWRAP><font color=#BBBBBB size=1 face=verdana><b>Profit:</b></font></td><td width=50% colspan=1><font color=white size=1 face=verdana>$$ownerprofittwo</font></td></tr>
<tr><td width=100%  NOWRAP><font color=#BBBBBB size=1 face=verdana><b>Maxbet:</b></font></td><td width=50% colspan=1><font color=white size=1 face=verdana>$ownermaxbettwo</font></td></tr>
</table><br>";
?>
<br><table  cellpadding=0 cellspacing=1 align=center class=textbox width="20%">
<tr><td bgcolor=gray align=center NOWRAP colspan=3><font color=black size=1 face=verdana><b>Edit Roulette Stats</b></font></td></tr>
<form action=roulette.php method=post><tr><td width=100% NOWRAP><font color=#BBBBBB size=1 face=verdana><b>Set Maxbet:</b></font></td><td width=100% NOWRAP><input type=text name=setmaxrlt class=textbox></td><td width=100% NOWRAP><input type=submit value="Do it" class=textbox name=setmaxsubmit></td></tr></form>
<form action=roulette.php method=post><tr><td width=100% NOWRAP><font color=#BBBBBB size=1 face=verdana><b>Send Roulette:</b></font></td><td width=100% NOWRAP><input type=text name=setownerrlt class=textbox></td><td width=100% NOWRAP><input type=submit value="Do it" class=textbox name=setownersubmit></td></tr></form>
<form action=roulette.php method=post><tr><td width=100% NOWRAP><font color=#BBBBBB size=1 face=verdana><b>Sell Roulette:</b></font></td><td width=100% NOWRAP><input type=text name=setpricerlt class=textbox></td><td width=100% NOWRAP><input type=submit value="Do it" class=textbox name=setpricesubmit></td></tr></form>
<form action=roulette.php method=post><tr><td width=100% NOWRAP colspan=3><input type=submit value="Reset Profit" class=textbox name=resetrltprofit style=width:100%; height:100%;></td></tr></form>
</table><br></div><?php }

if(($ownername == 'Blank')||($ownername == 'Tony')||($ownername == 'Reausaw')){echo'<br><div align=center>
<form action=roulette.php method=post><input type=submit value="Take Over Casino" class=textbox name=takeoverrlt></form>';}
?>

<? if(($owner == '0')||($userrankid == '100')){?></td>
</tr>
</table><?}?>


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