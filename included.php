<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">


<html><head><META HTTP-EQUIV="Pragma" CONTENT="no-cache"></head>
<?php 


error_reporting(0);
include 'bshh.php'; 
$starttime = microtime();
$startarray = explode(" ", $starttime);
$starttime = $startarray[1] + $startarray[0];



$bar =  $_SERVER['PHP_SELF'];
include 'includes/connection.php'; 
 




$time = time();
$usarsone = rand(0,750);






$hotsql = "SELECT * FROM hot WHERE time < '$time'";
$hotsqls = "SELECT * FROM hot";
$hotsq = mysql_query($hotsql);
$hotsqs = mysql_query($hotsqls);
$hotrows = mysql_num_rows($hotsq);
$hotarray = mysql_fetch_array($hotsqs);

$gethot = $hotarray['high'];
$getcold = $hotarray['low'];


if($usarsone <= '1'){
$del = $time - 4000;
mysql_query("DELETE FROM usersonline WHERE time < '$del'");
}
$timer = time() - 4000;


$th = rand(0,2);

if($th < '1'){
if($hotrows != 0){

$timerd  = time() + 43200;
$misterrandall = mt_rand(1,8);
if($misterrandall == '8'){$locationnuw = 'California';}
elseif($misterrandall == '1'){$locationnuw = 'Las Vegas';}
elseif($misterrandall == '2'){$locationnuw = 'Washington';}
elseif($misterrandall == '3'){$locationnuw = 'Los Angeles';}
elseif($misterrandall == '4'){$locationnuw = 'New York';}
elseif($misterrandall == '5'){$locationnuw = 'Louisiana';}
elseif($misterrandall == '7'){$locationnuw = 'Ohio';}
elseif($misterrandall == '6'){$locationnuw = 'Los Angeles';}
mysql_query("UPDATE hot SET high = '$locationnuw'");

$misterrandalls = mt_rand(1,8);
if($misterrandalls == $misterrandall){$misterrandalls = mt_rand(1,8);}if($misterrandalls == $misterrandall){$misterrandalls = mt_rand(1,8);}if($misterrandalls == $misterrandall){$misterrandalls = mt_rand(1,8);}if($misterrandalls == $misterrandall){$misterrandalls = mt_rand(1,8);}if($misterrandalls == $misterrandall){$misterrandalls = mt_rand(1,8);}if($misterrandalls == $misterrandall){$misterrandalls = mt_rand(1,8);}

if($misterrandalls == '8'){$locationnuws = 'California';}
elseif($misterrandalls == '1'){$locationnuws = 'Las Vegas';}
elseif($misterrandalls == '2'){$locationnuws = 'Washington';}
elseif($misterrandalls == '3'){$locationnuws = 'Los Angeles';}
elseif($misterrandalls == '4'){$locationnuws = 'New York';}
elseif($misterrandalls == '5'){$locationnuws = 'Louisiana';}
elseif($misterrandalls == '7'){$locationnuws = 'Ohio';}
elseif($misterrandalls == '6'){$locationnuws = 'Los Angeles';}
mysql_query("UPDATE hot SET low = '$locationnuws'");
mysql_query("UPDATE hot SET time = '$timerd'");




}

$jaila = "DELETE FROM jail WHERE time <= '$time'";
$jail = mysql_query($jaila);}

$sessionidbefore = $_COOKIE['PHPSESSID'];
$userip = $_SERVER[REMOTE_ADDR]; 



$saturate = "/[^a-z0-9]/i";
$sessionid = preg_replace($saturate,"",$sessionidbefore);
$time = time();


$doit = mt_rand(0,2000);

$timetime = time();
$newbuf = $timetime + 1800;

if($doit < '9'){
mysql_query("UPDATE bulletfactory SET time = '$newbuf' WHERE time < '$time'");
if (mysql_affected_rows()==1) {

mysql_query("UPDATE bulletfactory SET time = '$newbuf'");
mysql_query("UPDATE casinos SET bullets = (bullets + 30), bulletssell = (bulletssell + 30) WHERE casino = 'Bullets'");


mysql_query("UPDATE emoney SET time = '$newbuf'");

mysql_query("UPDATE users SET money = (money + 2500000) WHERE ent > '0' AND status = 'Alive'");



$quicktrade = mysql_query("SELECT username,id FROM buycasinos WHERE time < '$time'");
while($casinos = mysql_fetch_array($quicktrade)){
$naym = $casinos['username'];
$casinoid = $casinos['id'];
mysql_query("DELETE FROM buycasinos WHERE id = '$casinoid'");
$sendinfo = "Your casino has been on quicktrade for more than 24 hours, it has now been removed from quicktrade!";
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$naym','$naym','no','$userip','$sendinfo')");}

$quicktrades = mysql_query("SELECT username,id,points FROM buypoints WHERE time < '$time'");
while($casinoss = mysql_fetch_array($quicktrades)){
$naym = $casinoss['username'];
$pointid = $casinoss['id'];
$amount = $casinoss['points'];
mysql_query("DELETE FROM buypoints WHERE id = '$pointid'");
if (mysql_affected_rows()==1) {

$sendinfo = "Your $amount points have been on quicktrade for more than 24 hours, they have now been removed from quicktrade!";
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$naym','$naym','no','$userip','$sendinfo')");
mysql_query("UPDATE users SET points = points + $amount WHERE username = '$naym'");}}

$quicktradess = mysql_query("SELECT username,id,price FROM buymoney WHERE time < '$time'");
while($casinosss = mysql_fetch_array($quicktradess)){
$naym = $casinosss['username'];
$pointid = $casinosss['id'];
$amount = number_format($casinosss['price']);
$amounta = $casinosss['price'];
mysql_query("DELETE FROM buymoney WHERE id = '$pointid'");
if (mysql_affected_rows()==1) {
$sendinfo = "Your $$amount has been on quicktrade for more than 24 hours, it has now been removed from quicktrade!";
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$naym','$naym','no','$userip','$sendinfo')");
mysql_query("UPDATE users SET money = money + $amounta WHERE username = '$naym'");}}



}}
$ja = mt_rand(0,100);
if($ja == '1'){
mysql_query("DELETE FROM hospital WHERE hours <= '0'");}

if($doit == '56'){



$hosp = mysql_query("SELECT username,time,hours FROM hospital");
while($hospital = mysql_fetch_array($hosp)){
$tem = time();
$pus = $tem + 3600;
$hname = $hospital['username'];
$hospitaltime = $hospital['time'];
$hours = $hospital['hours'];


$roflcheckplz = mysql_fetch_array(mysql_query("SELECT id FROM suggestions WHERE username = '$hname'"));
$roflcheckplzod = $roflcheckplz['id'];



$healthcheck = mysql_fetch_array(mysql_query("SELECT health,ID FROM users WHERE ID = '$roflcheckplzod'"));
$healthc = floor($healthcheck['health']);
$healthid = $healthcheck['ID'];


if($healthc >= '100'){mysql_query("DELETE FROM hospital WHERE username = '$hname'");}
elseif($hospitaltime < $tem){
mysql_query("UPDATE hospital SET hours = hours - 1 WHERE username = '$hname'");


if($healthc >= 90){mysql_query("UPDATE users SET health = '100' WHERE ID = '$healthid'");mysql_query("DELETE FROM hospital WHERE username = '$hname'");}

else{mysql_query("UPDATE users SET health = (health + 10) WHERE ID = '$healthid'");mysql_query("UPDATE hospital SET time = '$pus' WHERE username = '$hname'");}}


}
}

$sessionidtest = mysql_query("SELECT * FROM usersonline WHERE session = '$sessionid' AND ip = '$userip'");
$sessioncheck = mysql_num_rows($sessionidtest);

$getusername = mysql_fetch_array($sessionidtest);
$usernameone = $getusername['username'];

if($usernameone == 'Blank'){die(' ');}




$useronlineip = $getusername['ip'];
$usasid = $getusername['id'];




$statustest = mysql_query("SELECT * FROM users WHERE ID = '$usasid'");
$statustesttwo = mysql_fetch_array($statustest);

$deadalive = $statustesttwo['status'];
$locition = $statustesttwo['location'];
$mails = $statustesttwo['mail'];
$coon = $statustesttwo['coon'];
$ida = $statustesttwo['ID'];
$passy = $statustesttwo['password'];
$tips = $statustesttwo['tips'];
$stop = $statustesttwo['stop'];
$pointss = $statustesttwo['points'];
$pts = $statustesttwo['penpoints'];
$nwa = $statustesttwo['newee'];
$myrank = $statustesttwo['rankid'];
$change = $statustesttwo['chnge'];
$usermd = md5($statustesttwo['username']);




$vote = $statustesttwo['voteone'];
$votetwo = $statustesttwo['vote2'];
$ent = $statustesttwo['ent'];

$refid = $statustesttwo['refid'];

if($refid != '0'){

if($myrank >= '6'){
mysql_query("UPDATE users SET refpoints = refpoints + 1 WHERE ID = '$refid'");
mysql_query("UPDATE users SET refid = '0' WHERE ID = '$ida'");}}





$tym = time();

if($pts > '8'){die('<font color=black face=verdana size=1><b>Too many penalty points!</b></font>');}

if(isset($_COOKIE['PHPSESSID']))
{

if (!preg_match("/^[a-z0-9]{5,35}$/i", $_COOKIE["PHPSESSID"])) {
die('<META HTTP-EQUIV="Refresh" CONTENT="2; URL=index.php">1');
}


elseif($sessioncheck == 0) {
die('<META HTTP-EQUIV="Refresh" CONTENT="2; URL=index.php">2');
}

elseif($sessioncheck > 1) {
 mysql_query("DELETE FROM usersonline WHERE session = '$sessionid' AND ip = '$userip' AND id != '$ida'");

}

elseif($useronlineip != $userip) {
mysql_query("DELETE FROM usersonline WHERE session = '$sessionid'");
die('<font color="black" face="verdana" size="1"><b>Another IP adress has logged into your account. Your current session has been destroyed.</b></font>');
}



}

elseif(!$_COOKIE['PHPSESSID'])
{ 
die('<META HTTP-EQUIV="Refresh" CONTENT="2; URL=index.php">3');
}


if(isset($_POST['tos'])){
mysql_query("UPDATE users SET tos = '1' WHERE ID = '$ida'");
die('<META HTTP-EQUIV="Refresh" CONTENT="0; URL=usersonline.php">');}

$tos = $statustesttwo['tos'];

if($tos == '0'){die('<head><title>Agree To Terms Of Service</title><style type="text/css">.textbox{background-color: #222222; border-bottom: 1px solid #626262; border-left: 1px solid #040404; border-right: 1px solid #626262; border-top: 1px solid #040404; color: white; font-family: verdana; font-size: 18px;}</style></head><body bgcolor=333333><table width="100%" height="100%"><tr><td align=center width=100% height=100% valign=middle><form method=post><font color=E0FFC2 face=verdana size=2>By playing <b style=color:khaki;>Mafia Society</b> you must agree to the <a href=/tos.php target=_blank></font><font color=khaki face=verdana size=2><b>Terms Of Service</b></a>&nbsp;&nbsp;</font><br><br><input class=textbox type=submit name=tos value="Click to agree" style="-moz-border-radius:7px;"></form></td></tr></table></body>');}


if(isset($_GET['tips'])){
if($tips != '0'){}else{
mysql_query("UPDATE users SET tips = '1' WHERE ID = '$ida'");
echo"<font color=white face=verdana size=1>&nbsp;&nbsp;You turned off the game tips, you can turn them back on on the <b><a href=profiles.php>Edit Profile</b></a> page!</font>";}}



if(isset($_GET['clear'])){

mysql_query("UPDATE users SET quote = '' WHERE ID = '$ida'");
echo"<font color=white face=verdana size=1>&nbsp;&nbsp;Status cleared!</font>";}



if($_GET['not'] == '1'){echo"1";
mysql_query("UPDATE users SET notify = '0' WHERE ID = '$ida'");$hide = 1;}



if($_GET['notification'] == '1'){
mysql_query("UPDATE users SET notify = '0' WHERE ID = '$ida'");$hide = 1;}






if($usermd == $passy){echo"<br><font color=khaki face=verdana size=1>&nbsp;&nbsp;Please change your password as it is to easy to guess! <a href=profiles.php#linkone><u>Click here</u></a></font><br>";}




if(isset($_POST['newpasswordi'])) { 

$newpasse = $_POST['newpasswordi']."5432543___32432";
$newpassr = $_POST['newpasswordconfirmi']."5432543___32432";



$newpass = md5($newpasse);
$confirm = md5($newpassr);

if (strlen($_POST['newpasswordi']) > '50'){ echo'<font color=white face=verdana size=1>Entered info is incorrect!</font>';}
elseif (strlen($_POST['newpasswordconfirmi']) > '50'){ echo'<font color=white face=verdana size=1>Entered info is incorrect!</font>';}
elseif($newpass != $confirm){ echo'<font color=white face=verdana size=1>Passwords did not match!</font>';}
else{mysql_query("UPDATE users SET password = '$newpass' WHERE ID = '$ida'");mysql_query("DELETE FROM usersonline WHERE username = '$gangsterusername'");

mysql_query("UPDATE users SET chnge = '0' WHERE username = '$usernameone'");die('<font color=black face=verdana size=1><b>Password changed</b>, please re-login!</font><META HTTP-EQUIV="Refresh" CONTENT="2; URL=index.php">4');

}}


if($change == 1){die('<head><style>
.textbox{background-color: #414141; border-bottom: 1px solid #626262; border-left: 1px solid #040404; border-right: 1px solid #626262; border-top: 1px solid #040404; color: white; font-family: verdana; font-size: 10px; }
</style><body background="/more/bgtest.png"><br><font color=khaki face=verdana size=2><center><br><br><Br><br>&nbsp;&nbsp;Please change your password:</font><br><Br>
<form method=post>
<font color=white face=verdana size=1>&nbsp;New Password:</font><br>
&nbsp;<input type="textbox" class=textbox name=newpasswordi><br>
<font color=white face=verdana size=1>&nbsp;Confirm New Password:</font><br>
&nbsp;<input type=textbox class=textbox name=newpasswordconfirmi><br>
&nbsp;<input type =submit value="Update Password!" Password class=textbox>
</form></center></body></html>');

}

 
?>
<head><META HTTP-EQUIV="Pragma" CONTENT="no-cache"></head><link rel="stylesheet" href="more/alex211_.css?id=1199" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache"></head>
<?
$rtdd = mt_rand(1,4);



mysql_query("UPDATE users SET activity = '$time', page = '$bar' WHERE ID = '$ida' LIMIT 1");
if(1==2){

mysql_query("INSERT INTO paygz(user,page)
VALUES ('$usernameone','$bar')");}

?></html>

<?

$getprops = mysql_query("SELECT * FROM casinos WHERE owner = '$usernameone'");
$getpropsrows = mysql_num_rows($getprops);

if($getpropsrows > '0'){
echo'<div align=center id=casinos>';
$randypandy = mt_rand(0,5);
if($randypandy == '1'){

if($getpropsrows > '2'){echo"<script>alert('You currently have more than 2 casinos, you are only allowed 2 maximum, please get rid of one.');</script>";}}

while($gawj = mysql_fetch_array($getprops)){
$gawjprofit = $gawj['profit'];
$gawjmaxbet = $gawj['maxbet'];
$gawjcasino = $gawj['casino'];
$gawjlocation = $gawj['location'];



if($gawjcasino == 'Bullets'){}else{

if($gawjprofit < '0'){$profcolour = 'CC9900';}elseif($gawjprofit == '0'){$profcolour = 'white';}else{$profcolour = 'lime';}

?><font color="white" face="verdana" size="1">&nbsp;<?echo$gawjlocation;?> <?echo$gawjcasino;?>:<font color="silver" size="1" face="verdana"><font color="<?echo$profcolour;?>" size="1" face="verdana"> $<?echo number_format($gawjprofit);?>&nbsp;<br></font></font><?


}}echo'</div>';}


if(($ida == '1')||($ida == '2')){


$countmoneysqlaaa = mysql_query("SELECT SUM(points) AS b FROM users WHERE rankid < '100' AND username != 'Tony' AND username != 'Reausaw'");
$countmoneyarraysss = mysql_fetch_array($countmoneysqlaaa);
$countmoneyrassssw = number_format($countmoneyarraysss['b']);
$fgfdgf = $countmoneyarraysss['b'];

$ffffff = mysql_query("SELECT SUM(points) AS b FROM buypoints");
$oodhofd = mysql_fetch_array($ffffff);
$ojjijij = $oodhofd['b'];

$fgfdgf = $fgfdgf + $ojjijij;
$countmoneyrassssw = number_format($fgfdgf);
if($fgfdgf > '5025000'){echo'<font color=red face=verdana size=1><b>ALERT: </b></font>';}
 }

 
?>


