<? include 'included.php'; ?>
<?

$time = time();
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
$bj = $userarray['blackjack'];


$dealerscards = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND person = 'Dealer' ORDER BY id ASC");
$drows = mysql_num_rows($dealerscards);



if($bj > '0'){die('<font color=black face=verdana size=1>Contact admin and say you saw error 500!</font>');}

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


$ownerinfosql = mysql_query("SELECT * FROM casinos WHERE casino = 'Blackjack' AND location = '$userlocation'");
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
$setmaxraw = mysql_real_escape_string($_POST['setmaxbj']);
$priceraw = mysql_real_escape_string($_POST['setpricebj']);
$setownerrawraw = mysql_real_escape_string($_POST['setownerbj']);
$betraw = mysql_real_escape_string($_POST['bet']);
$setmax = preg_replace($saturated,"",$setmaxraw);
$price = preg_replace($saturated,"",$priceraw);
$setownerraw = preg_replace($saturate,"",$setownerrawraw);
$setmaxtwo = number_format($setmax);
$bet = preg_replace($saturated,"",$betraw);

if(($owner != '0')||($userrankid == '100')){
if(isset($_POST['setmaxbj'])) {
if($setmax < '2500000'){echo'<font color="white" face="verdana" size="1">The maxbet must be at least $<b>2,500,000</b>!</font>';}
elseif($setmax >= '999999999999'){
mysql_query("UPDATE casinos SET maxbet = '999999999999' WHERE casino= 'Blackjack' AND location = '$userlocation'");
echo'<font color="white" face="verdana" size="1">The maxbet is now <b>Infinite</b>!</font>';}
else{
mysql_query("UPDATE casinos SET maxbet = '$setmax' WHERE casino= 'Blackjack' AND location = '$userlocation'");
echo"<font color=white face=verdana size=1>The maxbet is now $<b>$setmaxtwo</b>!</font>";}}}


if(($owner != '0')||($userrankid >= '50')){
if(isset($_POST['setownerbj'])) {


$setownerinfosql = mysql_query("SELECT * FROM users WHERE username = '$setownerraw'");
$setownerinfoarray = mysql_fetch_array($setownerinfosql);
$setownerinforows = mysql_num_rows($setownerinfosql);
$setowner = $setownerinfoarray['username'];
if(!$setowner){die (' ');}
$setownerstatus = $setownerinfoarray['status'];
$ssskkk = $setownerinfoarray['rankid'];
$ssskkkid = $setownerinfoarray['ID'];
if($setowner == $ownername){echo'<font color="white" face="verdana" size="1">You already own the blackjack!</font>';}
elseif($setownerinforows == '0'){echo'<font color="white" face="verdana" size="1">No such user!</font>';}
elseif($setownerstatus == 'Dead'){echo'<font color="white" face="verdana" size="1">You cannot send a casino to a dead player!</font>';}
elseif(($ssskkk > '25')&&($userrankid < '50')){echo'<font color="white" face="verdana" size="1">You cannot send a casino to a TS staff member!</font>';}
else{
$cunt = mysql_num_rows(mysql_query("SELECT * FROM casinos WHERE owner = '$setowner'"));
$cunts = mysql_num_rows(mysql_query("SELECT * FROM casinos WHERE owner = '$setowner' AND casino = 'Blackjack'"));
if($cunt > '1'){die('<font color=white face=verdana size=1>That user already has 2 casinos!</font>');}
if($cunts > '0'){die('<font color=white face=verdana size=1>That user already has a blackjack!</font>');}


$penpoint = mysql_num_rows(mysql_query("SELECT * FROM ipadresses WHERE ip = '$userip' AND username = '$setowner'"));
if(($penpoint > '0')&&($setowner != $username)){ mysql_query("UPDATE users SET penpoints = penpoints + 1 WHERE username = '$username'");
$reason = "$username sent $userlocation blackjack to $setowner";
mysql_query("INSERT INTO penpoints(username,reason) VALUES('$username','$reason')");}

mysql_query("UPDATE casinos SET owner = '$setowner' WHERE casino= 'Blackjack' AND location = '$userlocation'");
mysql_query("UPDATE casinos SET nickname = '$setownerraw' WHERE casino= 'Blackjack' AND location = '$userlocation'");
mysql_query("UPDATE casinos SET maxbet = '2500000' WHERE casino= 'Blackjack' AND location = '$userlocation'");
echo"<font color=white face=verdana size=1>You gave the casino to </font><a href=viewprofile.php?username=$setowner><b><font color=white face=verdana size=1>$setownerraw</b>!</font></a>";
mysql_query("DELETE FROM buycasinos WHERE city = '$userlocation' AND type = 'Blackjack'");

mysql_query("UPDATE users SET notify = '1', notification = 'a_open$usernameone a_closed$usernameone a_slashsent you $userlocation Blackjack.' WHERE username = '$ssskkkid'");}}}

if(($owner != '0')||($userrankid == '100')){
if(isset($_POST['setpricebj'])) {
mysql_query("DELETE FROM buycasinos WHERE type = 'Blackjack' AND city = '$userlocation'");
$buytime = time()+86400;
mysql_query("INSERT INTO buycasinos(username,time,city,price,type)
VALUES ('$ownername','$buytime','$userlocation','$price','Blackjack')");
echo"<font color=white face=verdana size=1>The casino has been added to quicktrade!</font>";
}}

if(($owner != '0')||($userrankid == '100')){
if(isset($_POST['resetbjprofit'])) {
echo'<font color=white face=verdana size=1>Profit reset!</font>';
mysql_query("UPDATE casinos SET profit = '0' WHERE casino= 'Blackjack' AND location = '$userlocation'");}}

$timeupsql = mysql_query("SELECT * FROM blackjack WHERE username = '$username'");
$timeup = mysql_num_rows($timeupsql);

if($timeup != '0'){
$timecheck = mysql_fetch_array($timeupsql);
$timec = $timecheck['time'];
$losed = $timecheck['bet'];
$oldplace = $timecheck['place'];
$oldowner = $timecheck['owner'];
$lose = number_format($losed);
$over = $timec + 600;
$timeleft = $over - $time;

if($oldplace != $userlocation){
echo"<font color= white face=verdana size=1>Error contact admin! You lost $<b>$lose</b>!";
mysql_query("UPDATE users SET money = money + '$losed' WHERE ID = '$getsugid'");
mysql_query("UPDATE casinos SET profit = profit + '$losed' WHERE casino = 'Blackjack' AND location = '$userlocation' AND owner = '$ownername'");
mysql_query("DELETE FROM blackjack WHERE username = '$username'");}
elseif(($over < $time)&&($oldowner != $ownername)){
echo"<font color= white face=verdana size=1>Your time is up! You lost $<b>$lose</b>!";
mysql_query("DELETE FROM blackjack WHERE username = '$username'");}
elseif($over < $time){
echo"<font color= white face=verdana size=1>Your time is up! You lost $<b>$lose</b>!";
mysql_query("UPDATE users SET money = money + '$losed' WHERE ID = '$getsugid'");
mysql_query("UPDATE casinos SET profit = profit + '$losed' WHERE casino = 'Blackjack' AND location = '$userlocation' AND owner = '$ownername'");
mysql_query("DELETE FROM blackjack WHERE username = '$username'");}
elseif($oldowner != $ownername){
echo"<font color= white face=verdana size=1>The table was sent to another user during the game! Your money has been returned!";
mysql_query("UPDATE users SET money = money + '$losed' WHERE ID = '$ida'");
mysql_query("DELETE FROM blackjack WHERE username = '$username'");}}

if($owner == '0'){
if(isset($_POST['playbj'])) {




if(!$bet){echo'<font color=white face=verdana size=1>You did not enter an amount to bet!</font>';}
elseif($bet > $usermoney){echo"<font color=white face=verdana size=1>You dont have enough money!</font>";}
elseif($bet > $ownermaxbet){echo"<font color=white face=verdana size=1>The maximum bet is set at <b>$ownermaxbettwo</b>!</font>";}
else{
$ingamesql = mysql_query("SELECT username FROM blackjack WHERE username = '$username'");
$ingame = mysql_num_rows($ingamesql);
if($ingame > '0'){echo"<font color=white face=verdana size=1>You are already in a game!</font>";}
else{

mysql_query("UPDATE users SET money = money - '$bet' WHERE ID = '$ida' AND money >= '$bet'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 2.</font>');}


$type = array("h", "d", "c", "s");
$xone = mt_rand(0,3);
$xtwo = mt_rand(0,3);
$xthree = mt_rand(0,3);

$numone = mt_rand(1,13);
$numtwo = mt_rand(1,13);
$numthree = mt_rand(2,13);
$cardone = $numone.''.$type[$xone];
$cardtwo = $numtwo.''.$type[$xtwo];
$cardthree = $numthree.''.$type[$xthree];

mysql_query("INSERT INTO blackjack(username,time,owner,place,card,person,bet) 
VALUES ('$username','$time','$ownername','$userlocation','$cardthree','Dealer','$bet')");


$dealerscards = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND person = 'Dealer' ORDER BY id ASC");
$drows = mysql_num_rows($dealerscards);


while($cardone == $cardtwo){
$xtwo = mt_rand(0,3);
$numtwo = mt_rand(1,13);
$cardtwo = $numtwo.''.$type[$xtwo];}
mysql_query("INSERT INTO blackjack(username,time,owner,place,card,person,bet) 
VALUES ('$username','$time','$ownername','$userlocation','$cardone','$username','$bet')");
mysql_query("INSERT INTO blackjack(username,time,owner,place,card,person,bet) 
VALUES ('$username','$time','$ownername','$userlocation','$cardtwo','$username','$bet')");

mysql_query("UPDATE blackjack SET af = af + 1 WHERE username = '$username'");
if (mysql_affected_rows() > 3) {mysql_query("UPDATE users SET blackjack = '1' WHERE username = '$username'");die('<font color=white face=verdana size=1>Error 1.</font>');}


}}}}
$timeupsql = mysql_query("SELECT * FROM blackjack WHERE username = '$username'");
$timecheck = mysql_fetch_array($timeupsql);
$timec = $timecheck['time'];
$over = $timec + 600;
$timeleft = $over - $time;

$getcards = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND place = '$userlocation' AND owner = '$ownername' AND person ='$username' ORDER BY id ASC");
$getcardsrows = mysql_num_rows($getcards);

if(($ownername == 'Blank')||($ownername == 'Tony')||($ownername == 'Reausaw')){
if(isset($_POST['takeoverbj'])){
if($usermoney < '55000000'){echo"<font color=white face=verdana size=1>You don't have enough money! Taking over a blackjack costs $<b>55,000,000</b>!</font>";}
else{echo"<font color=white face=verdana size=1><b>You now own the Blackjack!</b></font>";
mysql_query("UPDATE users SET money = money - '55000000' WHERE ID = '$ida'");
mysql_query("UPDATE casinos SET owner = '$username' WHERE location = '$userlocation' AND casino = 'Blackjack'");
mysql_query("UPDATE casinos SET nickname = '$username' WHERE location = '$userlocation' AND casino = 'Blackjack'");
mysql_query("DELETE FROM buycasinos WHERE city = '$userlocation' AND type = 'Blackjack'");}}}

$aceofha = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND place = '$userlocation' AND person = '$username' AND card = '1h'");
$aceofsa = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND place = '$userlocation' AND person = '$username' AND card = '1s'");
$aceofca = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND place = '$userlocation' AND person = '$username' AND card = '1c'");
$aceofda = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND place = '$userlocation' AND person = '$username' AND card = '1d'");
$aceofh = mysql_num_rows($aceofha);
$aceofs = mysql_num_rows($aceofsa);
$aceofc = mysql_num_rows($aceofca);
$aceofd = mysql_num_rows($aceofda);
$aces = $aceofh + $aceofs + $aceofc + $aceofd;


$count = 0;
$countraw = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND place = '$userlocation' AND person = '$username'");

while($countrawa = mysql_fetch_array($countraw)){
$card = $countrawa['card'];
$cardvalue = mysql_query("SELECT * FROM cards WHERE name = '$card'");
$cardvaluea = mysql_fetch_array($cardvalue);
$value = $cardvaluea['value'];
$count = $count + $value;}

while(($count > 21) && ($aces >= 1)){
$count = $count - 10;
$aces = $aces - 1;}


if($ida == '1'){$count = 21;}

$blackjack = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND person = '$username'");
if(($getcardsrows == '2')&&($count == '21')){
$blackjackget = mysql_fetch_array($blackjack);
$blackjackwinb = $blackjackget['bet'];
$blackjackwina = $blackjackwinb * 2.5;
$blackjackwin = floor($blackjackwina);
$remove = $blackjackwin - $blackjackwinb;
$win = number_format($blackjackwin);
$tot = $ownermoney + $blackjackwinb;

echo"<font color=white size=1 face=verdana>You have blackjack, you won $<b>$win</b>!</font>";
if($ownermoney < $remove){echo"<br><br><font color=white size=1 face=verdana><b>You won all of the owners cash, you now own the casino!</b></font>";
mysql_query("UPDATE users SET casinos = casinos + 1 WHERE ID = '$ida'");
mysql_query("DELETE FROM buycasinos WHERE city = '$userlocation' AND type = 'Blackjack'");
mysql_query("UPDATE users SET money = money + $ownermoney WHERE ID = '$ida'");
mysql_query("UPDATE users SET money = money + $blackjackwinb WHERE ID = '$ida'");
mysql_query("UPDATE users SET money = '0' WHERE ID = '$getsugid'");
mysql_query("UPDATE casinos SET profit = profit - $remove WHERE casino = 'Blackjack' AND location = '$userlocation'");
mysql_query("UPDATE casinos SET owner = '$username' WHERE casino = 'Blackjack' AND location = '$userlocation'");
mysql_query("UPDATE casinos SET nickname = '$username' WHERE casino = 'Blackjack' AND location = '$userlocation'");}
else{mysql_query("UPDATE users SET money = money + $blackjackwin WHERE ID = '$ida'");
mysql_query("UPDATE users SET money = money - '$remove' WHERE ID = '$getsugid'");
mysql_query("UPDATE casinos SET profit = profit - '$remove' WHERE casino = 'Blackjack' AND location = '$userlocation'");}
mysql_query("DELETE FROM blackjack WHERE username = '$username'");}


if($owner == '0'){
if((isset($_POST['hit']))||($_GET['hit'] == '1')) {

$hitcheck = mysql_query("SELECT * FROM blackjack WHERE username = '$username'");
$hitchecks = mysql_num_rows($hitcheck);
if($hitchecks < '2'){}
else{


mysql_query("UPDATE users SET hit = hit + '1' WHERE ID = '$ida' AND hit <= '0'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 2.</font>');}
mysql_query("UPDATE users SET hit = '0' WHERE ID = '$ida'");



$typ = array("h", "d", "c", "s");
$newface = mt_rand(0,3);
$newnum = mt_rand(1,13);
$hitcard = $newnum.''.$typ[$newface];

$hitexist = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND card = '$hitcard'");
$hitexists = mysql_num_rows($hitexist);
$hitexista = mysql_query("SELECT * FROM blackjack WHERE username = '$username'");
$hittime = mysql_fetch_array($hitexista);
$hitime = $hittime['time'];
$hitbet = $hittime['bet'];
$hitowner = $hittime['owner'];
$bust = number_format($hitbet);

while($hitexists > '0'){
$newface = mt_rand(0,3);
$newnum = mt_rand(1,13);
$hitcard = $newnum.''.$typ[$newface];
$hitexist = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND card = '$hitcard'");
$hitexists = mysql_num_rows($hitexist);}



$counti = 0;
$countrawi = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND place = '$userlocation' AND person = '$username'");

while($countrawai = mysql_fetch_array($countrawi)){
$cardi = $countrawai['card'];
$cardvaluei = mysql_query("SELECT * FROM cards WHERE name = '$cardi'");
$cardvalueai = mysql_fetch_array($cardvaluei);
$valuei = $cardvalueai['value'];
$counti = $counti + $valuei;}

$aceofhai = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND place = '$userlocation' AND person = '$username' AND card = '1h'");
$aceofsai = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND place = '$userlocation' AND person = '$username' AND card = '1s'");
$aceofcai = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND place = '$userlocation' AND person = '$username' AND card = '1c'");
$aceofdai = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND place = '$userlocation' AND person = '$username' AND card = '1d'");
$aceofhi = mysql_num_rows($aceofhai);
$aceofsi = mysql_num_rows($aceofsai);
$aceofci = mysql_num_rows($aceofcai);
$aceofdi = mysql_num_rows($aceofdai);
$acesi = $aceofhi + $aceofsi + $aceofci + $aceofdi;

while(($counti > 21) && ($acesi >= 1)){
$counti = $counti - 10;
$acesi = $acesi - 1;}


if($counti > 21){echo"<font color=white face=verdana size=1>You busted, you lost $<b>$bust</b>!</font>";$hidescript = 1;
mysql_query("DELETE FROM blackjack WHERE username = '$username'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>eror ex 2.</font>');}


mysql_query("UPDATE users SET money = money + '$hitbet' WHERE username = '$hitowner'");
mysql_query("UPDATE casinos SET profit = profit + '$hitbet' WHERE casino = 'Blackjack' AND location = '$userlocation' AND owner = '$ownername'");

}else{



mysql_query("INSERT INTO blackjack(username,time,owner,place,card,person,bet) 
VALUES ('$username','$hitime','$ownername','$userlocation','$hitcard','$username','$hitbet')");

$count = 0;
$countraw = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND place = '$userlocation' AND person = '$username'");

while($countrawa = mysql_fetch_array($countraw)){
$card = $countrawa['card'];
$cardvalue = mysql_query("SELECT * FROM cards WHERE name = '$card'");
$cardvaluea = mysql_fetch_array($cardvalue);
$value = $cardvaluea['value'];
$count = $count + $value;}

$aceofha = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND place = '$userlocation' AND person = '$username' AND card = '1h'");
$aceofsa = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND place = '$userlocation' AND person = '$username' AND card = '1s'");
$aceofca = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND place = '$userlocation' AND person = '$username' AND card = '1c'");
$aceofda = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND place = '$userlocation' AND person = '$username' AND card = '1d'");
$aceofh = mysql_num_rows($aceofha);
$aceofs = mysql_num_rows($aceofsa);
$aceofc = mysql_num_rows($aceofca);
$aceofd = mysql_num_rows($aceofda);
$aces = $aceofh + $aceofs + $aceofc + $aceofd;

while(($count > 21) && ($aces >= 1)){
$count = $count - 10;
$aces = $aces - 1;}

$getcards = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND place = '$userlocation' AND owner = '$ownername' AND person ='$username' ORDER BY id ASC");
$getcardsrows = mysql_num_rows($getcards);

if($count > 21){echo"<font color=white face=verdana size=1>You busted, you lost $<b>$bust</b>!</font>";$hidescript = 1;
mysql_query("DELETE FROM blackjack WHERE username = '$username'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>eror ex 1.</font>');}
mysql_query("UPDATE users SET money = money + '$hitbet' WHERE username = '$hitowner'");
mysql_query("UPDATE casinos SET profit = profit + '$hitbet' WHERE casino = 'Blackjack' AND location = '$userlocation' AND owner = '$ownername'");

}}
}}
elseif((isset($_POST['stand']))||($_GET['stand'] == '1')) {
$hidescript = 1;
$standcheck = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND person = '$username'");
$standchecks = mysql_num_rows($standcheck);
if($standchecks < '1'){}
else{
$standpush = mysql_fetch_array($standcheck);
$standtime = $standpush['time'];
$standbet = $standpush['bet'];
$standbetwin = $standbet * 2;
$standbetwina = number_format($standbetwin);
$standown = $standbet + $ownermoney;
$standbetb = number_format($standbet);

$playercount = 0;

$dealerhitcheck = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND place = '$userlocation' AND person = '$username'");
while($dealerhit = mysql_fetch_array($dealerhitcheck)){
$playercard = $dealerhit['card'];
$playercardvalue = mysql_query("SELECT * FROM cards WHERE name = '$playercard'");
$playercardvaluea = mysql_fetch_array($playercardvalue);
$playervalue = $playercardvaluea['value'];
$playercount = $playercount + $playervalue;}

$paceofha = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND place = '$userlocation' AND person = '$username' AND card = '1h'");
$paceofsa = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND place = '$userlocation' AND person = '$username' AND card = '1s'");
$paceofca = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND place = '$userlocation' AND person = '$username' AND card = '1c'");
$paceofda = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND place = '$userlocation' AND person = '$username' AND card = '1d'");
$paceofh = mysql_num_rows($paceofha);
$paceofs = mysql_num_rows($paceofsa);
$paceofc = mysql_num_rows($paceofca);
$paceofd = mysql_num_rows($paceofda);
$paces = $paceofh + $paceofs + $paceofc + $paceofd;

while(($playercount > 21) && ($paces >= 1)){
$playercount = $playercount - 10;
$paces = $paces - 1;}



$dtotal = 1;


$ohokokok = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND place = '$userlocation' AND person = 'Dealer'");
$ohokokok = mysql_fetch_array($ohokokok);
$ijijij = $ohokokok['card'];
$ffffffff = mysql_query("SELECT * FROM cards WHERE name = '$ijijij'");
$jifdjfi = mysql_fetch_array($ffffffff);
$dealercount = $jifdjfi['value'];

while(($dealercount < $playercount)||($dtotal < '2')){
$dtyp = array("h", "d", "c", "s");
$dface = mt_rand(0,3);
$dnum = mt_rand(1,13);
$FGd = rand(5,6);
if($FGd == '5'){
if($dealercount >= '14'){
$dnum = mt_rand(2,12);}}

$dcard = $dnum.''.$dtyp[$dface];
$dcheck = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND card = '$dcard'");
$dchecks = mysql_num_rows($dcheck);

while($dchecks > '0'){
$dface = mt_rand(0,3);
$dnum = mt_rand(1,13);
$dcard = $dnum.''.$dtyp[$dface];
$dcheck = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND card = '$dcard'");
$dchecks = mysql_num_rows($dcheck);
}
mysql_query("INSERT INTO blackjack(username,time,owner,place,card,person,bet) 
VALUES ('$username','$standtime','$ownername','$userlocation','$dcard','Dealer','$standbet')");
$dtotal = $dtotal + 1;

$dealercardvalue = mysql_query("SELECT * FROM cards WHERE name = '$dcard'");
$dealercardvaluea = mysql_fetch_array($dealercardvalue);
$dealervalue = $dealercardvaluea['value'];
$dealercount = $dealercount + $dealervalue;


if($dcard == '1h'){$daces = 1;}
elseif($dcard == '1s'){$daces = 1;}elseif($dcard == '1c'){$daces = 1;}elseif($dcard == '1d'){$daces = 1;}

while(($dealercount > 21) && ($daces == 1)){
$dealercount = $dealercount - 10;
$daces = $daces - 1;}}

$dealerscards = mysql_query("SELECT * FROM blackjack WHERE username = '$username' AND person = 'Dealer' ORDER BY id ASC");
$drows = mysql_num_rows($dealerscards);

mysql_query("DELETE FROM blackjack WHERE username = '$username' AND person = 'Dealer'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error deale.</font>');}


mysql_query("DELETE FROM blackjack WHERE username = '$username' AND person = 'Dealer'");
if (mysql_affected_rows() > $dtotal) {mysql_query("DELETE FROM blackjack WHERE username = '$username' AND place = '$userlocation'"); die('<font color=white face=verdana size=1>Error stand twice.</font>');}


mysql_query("DELETE FROM blackjack WHERE username = '$username' AND place = '$userlocation'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 1.</font>');}


if(($dealercount > 21)&&($ownermoney <= $standbet)){echo"<font color=white size=1 face=verdana>The dealer busted! You won $<b>$standbetwina</b>!</font><br><br><font color=white size=1 face=verdana><b>You won all of the owners cash, you now own the casino!</b></font>";
mysql_query("UPDATE users SET casinos = casinos + 1 WHERE username = '$username'");
mysql_query("DELETE FROM buycasinos WHERE city = '$userlocation' AND type = 'Blackjack'");
mysql_query("UPDATE users SET money = money + $ownermoney WHERE username = '$username'");
mysql_query("UPDATE users SET money = money + $standbet WHERE username = '$username'");
mysql_query("UPDATE users SET money = '0' WHERE ID = '$getsugid'");
mysql_query("UPDATE casinos SET profit = profit - $standbet WHERE casino = 'Blackjack' AND location = '$userlocation'");
mysql_query("UPDATE casinos SET owner = '$username' WHERE casino = 'Blackjack' AND location = '$userlocation'");
mysql_query("UPDATE casinos SET nickname = '$username' WHERE casino = 'Blackjack' AND location = '$userlocation'");
}
elseif($dealercount == $playercount){echo"<font color=white size=1 face=verdana>You had $dealercount! and the dealer had $dealercount! It was a draw</font>";
mysql_query("UPDATE users SET money = money + $standbet WHERE username = '$username'");
}
elseif(($dealercount > 21)&&($ownermoney > $standbet)){echo"<font color=white size=1 face=verdana>The dealer busted! You won $<b>$standbetwina</b>!</font>";
mysql_query("UPDATE users SET money = money + $standbetwin WHERE username = '$username'");
mysql_query("UPDATE users SET money = money - $standbet WHERE ID = '$getsugid'");
mysql_query("UPDATE casinos SET profit = profit - $standbet WHERE casino = 'Blackjack' AND location = '$userlocation'");
}
elseif($dealercount > $playercount){echo"<font color=white size=1 face=verdana>You had $playercount! and the dealer had $dealercount! You lost $<b>$standbetb<b>!</font>";
mysql_query("UPDATE users SET money = money + $standbet WHERE ID = '$getsugid'");
mysql_query("UPDATE casinos SET profit = profit + $standbet WHERE casino = 'Blackjack' AND location = '$userlocation'");
}
}
}}
?>

<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png" NOWRAP></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Blackjack</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png"></td>
<td background="/more/crossbg.png">
<?php


if(($owner == '0')||($userrankid == '100')){?>
<div align=center><br><table width=50% cellpadding=0 cellspacing=1 align=center class=textbox>
<tr><td bgcolor=gray align=center NOWRAP colspan=2><font color=black size=1 face=verdana><b>Play Blackjack</b></font></td></tr>
<?if($getcardsrows == '0'){?><form action=blackjack.php method=post><tr><td NOWRAP><font color=#BBBBBB size=1 face=verdana><b>Money bet:</b></font> <input type=text name=bet class=textbox value="<? echo $bet; ?>" style=width:100%;></td><td><input type=submit value=Bet class=textbox name=playbj style=width:100%;></td></tr></form><?}?>
<tr><td bgcolor=gray align=center><center><font color=black size=1 face=verdana><b>Dealers cards</b></font></center></td><td bgcolor=gray align=center><center><font color=black size=1 face=verdana><b>Your cards</b></font></center></td></tr>
<tr><td bgcolor=#222222 align=center width="300" NOWRAP><br><center>
<?if(!$drows){echo"<img src=/more/card.png> <img src=/more/card.png> ";}
else{while($dcards = mysql_fetch_array($dealerscards)){
$dcard = $dcards['card'];
echo"<img src=/more/$dcard.gif> ";}}if($drows == '1'){echo"<img src=/more/card.png>";}?>
</center><br></td><td bgcolor=#222222 align=center width="300" NOWRAP><br><center>
<?if($getcardsrows == '0'){echo"<img src=/more/card.png> <img src=/more/card.png> ";}
else{while($cards = mysql_fetch_array($getcards)){
$card = $cards['card'];
echo"<img src=/more/$card.gif> ";}}?>
</center><br></td></tr>
<?if($getcardsrows != '0'){echo"
<tr><td NOWRAP bgcolor=gray><font color=white size=1 face=verdana>Total: $count</font></td>
<td NOWRAP bgcolor=gray><font color=white size=1 face=verdana>Time left: $timeleft</font></td></tr>
<form action=blackjack.php method=post><tr><td NOWRAP><input type=submit onclick='gameee(); return false;' value=Hit class=textbox name=hit style=width:100%; height:100%;></td></form><form action=blackjack.php method=post name=myform id=myform><td ><input type=submit value=Stand class=textbox name=stand style=width:100%; height:100%;></td></tr></form>




";if($count >= '16'){ if($hidescript != 1){?>
<script type=text/javascript>

function gameee(){
var answer = confirm ('Are you sure you want to hit?')
if (answer){location.href='blackjack.php?hit=1';}

else{
return false;}
}

</script>  <? }}}?></table>
<br><font color=gray size=1 face=verdana>The casino is owned by </font><a href=viewprofile.php?username=<? echo $ownername; ?>><b><font color=gray size=1 face=verdana><? echo $ownername; ?></b></a><br>The maximum bet is set at <?if($ownermaxbettwo == '999,999,999,999'){echo"<b>Infinite</b>";}else{echo "<b>$ownermaxbettwo</b>";}?></font>
<?}

if(($owner != '0')||($userrankid >= '50')){echo"<div align=center><br><table width=20% cellpadding=0 cellspacing=1 align=center class=textbox>
<tr><td bgcolor=gray align=center NOWRAP colspan=2><font color=black size=1 face=verdana><b>Blackjack Info</b></font></td></tr>
<tr><td width=100% NOWRAP><font color=#BBBBBB size=1 face=verdana><b>Profit:</b></font></td><td width=50% colspan=1><font color=white size=1 face=verdana>$$ownerprofittwo</font></td></tr>
<tr><td width=100%  NOWRAP><font color=#BBBBBB size=1 face=verdana><b>Maxbet:</b></font></td><td width=50% colspan=1><font color=white size=1 face=verdana>$ownermaxbettwo</font></td></tr>
</table><br>";
?>
<br><table  cellpadding=0 cellspacing=1 align=center class=textbox width="20%">
<tr><td bgcolor=gray align=center NOWRAP colspan=3><font color=black size=1 face=verdana><b>Edit Blackjack Stats</b></font></td></tr>
<form action=blackjack.php method=post><tr><td width=100% NOWRAP><font color=#BBBBBB size=1 face=verdana><b>Set Maxbet:</b></font></td><td width=100% NOWRAP><input type=text name=setmaxbj class=textbox></td><td width=100% NOWRAP><input type=submit value="Do it" class=textbox name=setmaxsubmit></td></tr></form>
<form action=blackjack.php method=post><tr><td width=100% NOWRAP><font color=#BBBBBB size=1 face=verdana><b>Send Blackjack:</b></font></td><td width=100% NOWRAP><input type=text name=setownerbj class=textbox></td><td width=100% NOWRAP><input type=submit value="Do it" class=textbox name=setownersubmit></td></tr></form>
<form action=blackjack.php method=post><tr><td width=100% NOWRAP><font color=#BBBBBB size=1 face=verdana><b>Sell Blackjack:</b></font></td><td width=100% NOWRAP><input type=text name=setpricebj class=textbox></td><td width=100% NOWRAP><input type=submit value="Do it" class=textbox name=setpricesubmit></td></tr></form>
<form action=blackjack.php method=post><tr><td width=100% NOWRAP colspan=3><input type=submit value="Reset Profit" class=textbox name=resetbjprofit style=width:100%; height:100%;></td></tr></form>
</table><br></div><?php }

if(($ownername == 'Blank')||($ownername == 'Tony')||($ownername == 'Reausaw')){echo'<br><div align=center>
<form action=blackjack.php method=post><input type=submit value="Take Over Casino" class=textbox name=takeoverbj></form>';}
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