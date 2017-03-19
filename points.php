<? include 'included.php';






?>
<html>
<head>
<style type="text/css">
.click{
cursor: pointer;
cursor: hand;}</style>
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
$saturate = "/[^a-z0-9]/i";
$saturates = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$chosenraw = mysql_real_escape_string($_POST['spend']);
$spotida = mysql_real_escape_string($_POST['spotid']);
$invitea = mysql_real_escape_string($_POST['invite']);
$sendtoraw = mysql_real_escape_string($_POST['sendto']);
$sendmoneyraw = mysql_real_escape_string($_POST['sendamount']);
$sendto = preg_replace($saturate,"",$sendtoraw);
$sendmoney = preg_replace($saturates,"",$sendmoneyraw);
$chosen = preg_replace($saturates,"",$chosenraw);
$spotid = preg_replace($saturates,"",$spotida);
$invite = preg_replace($saturate,"",$invitea);
$sendmoneytwo= number_format($sendmoney);

$sendtotestsql = mysql_query("SELECT * FROM users WHERE username = '$sendto'");
$sendtotestrows = mysql_num_rows($sendtotestsql);
$sendtotestarray = mysql_fetch_array($sendtotestsql);
$sendtostatus = $sendtotestarray['status'];
$sendtoname = $sendtotestarray['username'];
$sendtoid = $sendtotestarray['ID'];

$gangsterusername = $usernameone;


$lasttensql =mysql_query("SELECT * FROM pointssent WHERE username = '$gangsterusername' ORDER BY id DESC LIMIT 0,15");

$lasttenrsql =mysql_query("SELECT * FROM pointssent WHERE sent = '$gangsterusername' ORDER BY id DESC LIMIT 0,15");




$getuserinfoarray = $statustesttwo;
$rank= $getuserinfoarray['rankid'];
$points = $getuserinfoarray['points'];
$add = $getuserinfoarray['addition'];
$h = $getuserinfoarray['health'];
$bgtimer  = $getuserinfoarray['bgs'];
$spentpts = $getuserinfoarray['ptsspent'];
$increaseby = $getuserinfoarray['bulletsperc'];
$increase = $increaseby * 3;
$tume = time();
mysql_query("UPDATE users SET bulletsbought = '0', bulletsperc = '0' WHERE bulletsbought < '$tume' AND ID = '$ida'");

$countbgs = mysql_num_rows(mysql_query("SELECT guarding FROM bodyguards WHERE guarding = '$gangsterusername'"));
if($countbgs > '5'){die('<font color=black face=verdana size=1>Contact admin immediately!</font>');}

if (isset($_POST['sendamount'])) {
if(!$sendmoney){echo'<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white size=1 face=verdana>You did not enter an amount to send.</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>';}
elseif(!$sendto){echo'<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white size=1 face=verdana>You did not enter an player to send to.</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>';}
elseif($sendtotestrows == '0'){echo'<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white size=1 face=verdana>No such user.</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>';}
elseif($sendmoney > $points){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white size=1 face=verdana>You don't have enough points.</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
elseif($sendmoney > '99999999999'){echo'<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white size=1 face=verdana>ERROR, contact admin.</b></font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>';}
elseif($sendtostatus == 'Dead'){}
elseif($gangsterusername == $sendtoname){echo'<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white size=1 face=verdana>You cannot send points to yourself.</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>';}
else{ 
$penpoint = mysql_num_rows(mysql_query("SELECT * FROM ipadresses WHERE ip = '$userip' AND username ='$sendtoname'"));
if($penpoint > '0'){ mysql_query("UPDATE users SET penpoints = penpoints + 1 WHERE username = '$gangsterusername'");
$reason = "$gangsterusername sent $sendmoneytwo points to $sendto";
mysql_query("INSERT INTO penpoints(username,reason) VALUES('$gangsterusername','$reason')");}

mysql_query("UPDATE users SET points = (points - $sendmoney) WHERE ID = '$ida' AND points >= '$sendmoney'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error send.</font>');}
mysql_query("UPDATE users SET points = points + '$sendmoney' WHERE ID = '$sendtoid'");

mysql_query("UPDATE users SET notification = 'a_open$usernameone a_closed$usernameone a_slashsent you $sendmoneytwo points.', notify = (notify + 1) WHERE ID = '$sendtoid'");

$insertsentsql = "INSERT INTO pointssent(username,amount,sent,ip)
VALUES ('$gangsterusername','$sendmoney','$sendtoname','$userip')";
$insertsentresult = mysql_query($insertsentsql);
echo"<font color=white size=1 face=verdana>You sent <b>$sendmoneytwo</b> points to <a href=viewprofile.php?username=$sendto><b>$sendto</b>!</a></font>";
}
}


if(isset($_POST['spend'])){

$pime = time(); $chei = floor($pime/45); 
if($chei != $_POST['cheki']){}else{

$time = time();

if($chosen > '29'){}
else{

if($chosen == '1'){
if($points < '5'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You dont have enough points!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
else{
$antione = $time + 86400;

mysql_query("UPDATE users SET points = (points - 5) WHERE ID = '$ida' AND points >= '5'");

if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 1.</font>');}

mysql_query("UPDATE users SET ptsspent = (ptsspent + 5) WHERE ID = '$ida'");

mysql_query("UPDATE users SET antisteal = $antione WHERE ID = '$ida'");

echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You bought the 1 day anti steal protection!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}}

elseif($chosen == '2'){
if($points < '15'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You dont have enough points!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
else{
$antione = $time + 604800;
mysql_query("UPDATE users SET points = (points - 15) WHERE ID = '$ida' AND points >= '15'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 2.</font>');}

mysql_query("UPDATE users SET ptsspent = (ptsspent + 15) WHERE ID = '$ida'");
mysql_query("UPDATE users SET antisteal = $antione WHERE ID = '$ida'");

echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You bought the 1 week anti steal protection!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}}

elseif($chosen == '21'){
if($points < '60'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You dont have enough points!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
else{
$antione = $time + 999999999999999;
mysql_query("UPDATE users SET points = (points - 60) WHERE ID = '$ida' AND points >= '60'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 3.</font>');}
mysql_query("UPDATE users SET ptsspent = (ptsspent + 60) WHERE ID = '$ida'");
mysql_query("UPDATE users SET antisteal = $antione WHERE ID = '$ida'");

echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You bought the permenant anti steal protection!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}}

elseif($chosen == '3'){
if($points < '75'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You dont have enough points!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
else{
mysql_query("UPDATE users SET points = (points - 75) WHERE ID = '$ida' AND points >= '75'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 4.</font>');}

mysql_query("UPDATE users SET ptsspent = (ptsspent + 75) WHERE ID = '$ida'");
if($add == '36000'){mysql_query("UPDATE users SET addition = (addition - 7200) WHERE ID = '$ida'");mysql_query("UPDATE users SET timer = (timer - 7200) WHERE ID = '$ida'");mysql_query("UPDATE crews SET timer = (timer - 7200) WHERE boss = '$gangsterusername'");}

echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You can now do an OR every 8 hours!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}}

elseif($chosen == '4'){


if($increase){
$realy = $increase + 100;
$nuwone = 15 * $realy;
$dunn = round($nuwone / 100);}else{$dunn = 15;}
if($points < $dunn){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You dont have enough points!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
else{

mysql_query("UPDATE users SET points = (points - $dunn) WHERE ID = '$ida' AND points >= '15'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 5.</font>');}
mysql_query("UPDATE users SET ptsspent = (ptsspent + 15) WHERE ID = '$ida'");
mysql_query("UPDATE users SET bullets = (bullets + 1000) WHERE ID = '$ida'");

mysql_query("UPDATE users SET bulletsperc = (bulletsperc + 1) WHERE ID = '$ida'");
$newbul = time()+43200;
mysql_query("UPDATE users SET bulletsbought = ($newbul) WHERE ID = '$ida'");



echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You received 1,000 bullets! (Bullet price increase by 3%, this will reset in 12 hours)</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}}

elseif($chosen == '5'){

if($increase){
$realy = $increase + 100;
$nuwone = 40 * $realy;
$dunn = round($nuwone / 100);}else{$dunn = 40;}
if($points < $dunn){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You dont have enough points!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
else{



mysql_query("UPDATE users SET points = (points - $dunn) WHERE ID = '$ida' AND points >= '40'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 6.</font>');}
mysql_query("UPDATE users SET ptsspent = (ptsspent + 40) WHERE ID = '$ida'");
mysql_query("UPDATE users SET bullets = (bullets + 3500) WHERE ID = '$ida'");

mysql_query("UPDATE users SET bulletsperc = (bulletsperc + 1) WHERE ID = '$ida'");
$newbul = time()+43200;
mysql_query("UPDATE users SET bulletsbought = ($newbul) WHERE ID = '$ida'");


echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You received 3,500 bullets! (Bullet price increase by 3%, this will reset in 12 hours)</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}}

elseif($chosen == '6'){

if($increase){
$realy = $increase + 100;
$nuwone = 60 * $realy;
$dunn = round($nuwone / 100);}else{$dunn = 60;}

if($points < $dunn){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You dont have enough points!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
else{

if($increase){
$realy = $increase + 100;
$nuwone = 60 * $realy;
$dunn = round($nuwone / 100);}else{$dunn = 60;}




mysql_query("UPDATE users SET points = (points - $dunn) WHERE ID = '$ida' AND points >= '$dunn'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 7.</font>');}
mysql_query("UPDATE users SET ptsspent = (ptsspent + $dunn) WHERE ID = '$ida'");
mysql_query("UPDATE users SET bullets = (bullets + 6500) WHERE ID = '$ida'");
mysql_query("UPDATE users SET bulletsperc = (bulletsperc + 1) WHERE ID = '$ida'");
$newbul = time()+43200;
mysql_query("UPDATE users SET bulletsbought = ($newbul) WHERE ID = '$ida'");

echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You received 6,500 bullets! (Bullet price increase by 3%, this will reset in 12 hours)</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}}

elseif($chosen == '7'){
if($points < '75'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You dont have enough points!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
else{
mysql_query("UPDATE users SET points = (points - 75) WHERE ID = '$ida' AND points >= '75'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 8.</font>');}
mysql_query("UPDATE users SET ptsspent = (ptsspent + 75) WHERE ID = '$ida'");
mysql_query("INSERT INTO cars(owner,damage,bullets,carid,speed,carname,image)
VALUES ('$gangsterusername','0','360','11','60','$gangsterusername','q.png')");


echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You received a </font><font color=red face=verdana size=1><b>Custom Car</b>!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}}

elseif($chosen == '8'){
if($points < '100'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You dont have enough points!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
else{
mysql_query("UPDATE users SET points = (points - 100) WHERE ID = '$ida' AND points >= '100'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 9.</font>');}
mysql_query("UPDATE users SET ptsspent = (ptsspent + 100) WHERE ID = '$ida'");
mysql_query("UPDATE users SET gun = '10' WHERE ID = '$ida'");

echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You received the <b>M249 Para SAW</b>!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}}

elseif($chosen == '9'){
if($points < '3'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You dont have enough points!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
else{
mysql_query("UPDATE users SET points = (points - 3) WHERE ID = '$ida' AND points >= '3'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 10.</font>');}
mysql_query("UPDATE users SET ptsspent = (ptsspent + 3) WHERE ID = '$ida'");
mysql_query("UPDATE users SET repair = '1' WHERE ID = '$ida'");

echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>The next car you attemp to fix will be repaired successfully!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}}

elseif($chosen == '10'){
if($points < '3'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You dont have enough points!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
else{
mysql_query("UPDATE users SET points = (points - 3) WHERE ID = '$ida' AND points >= '5'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 11.</font>');}
mysql_query("UPDATE users SET ptsspent = (ptsspent + 3) WHERE ID = '$ida'");
mysql_query("DELETE FROM jail WHERE username = '$gangsterusername'");

echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You are no longer in jail!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}}

elseif($chosen == '11'){
if($points < '2'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You dont have enough points!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
else{
mysql_query("UPDATE users SET points = (points - 2) WHERE ID = '$ida' AND points >= '2'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 12.</font>');}
mysql_query("UPDATE users SET ptsspent = (ptsspent + 2) WHERE ID = '$ida'");
mysql_query("UPDATE users SET melt = '0' WHERE ID = '$ida'");

echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You can now melt cars again</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}}

elseif($chosen == '12'){
if($points < '3'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You dont have enough points!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
else{
mysql_query("UPDATE users SET points = (points - 3) WHERE ID = '$ida' AND points >= '3'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 13.</font>');}
mysql_query("UPDATE users SET ptsspent = (ptsspent + 3) WHERE ID = '$ida'");
mysql_query("UPDATE users SET steal = '0' WHERE ID = '$ida'");

echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You can now steal cars again</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}}

elseif($chosen == '13'){
if($points < '15'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You dont have enough points!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
else{
mysql_query("UPDATE users SET points = (points - 15) WHERE ID = '$ida' AND points >= '15'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 14.</font>');}

mysql_query("UPDATE users SET ptsspent = (ptsspent + 15) WHERE ID = '$ida'");
if(($h + 5) >= (100)){
mysql_query("UPDATE users SET health = '100' WHERE ID = '$ida'");}else{mysql_query("UPDATE users SET health = (health + 5) WHERE ID = '$ida'");}

echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You received 5% health</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}}

elseif($chosen == '14'){
if($points < '30'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You dont have enough points!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
else{
mysql_query("UPDATE users SET points = (points - 30) WHERE ID = '$ida' AND points >= '30'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 15.</font>');}
mysql_query("UPDATE users SET ptsspent = (ptsspent + 30) WHERE ID = '$ida'");
if(($h + 15) >= (100)){
mysql_query("UPDATE users SET health = '100' WHERE ID = '$ida'");}else{mysql_query("UPDATE users SET health = (health + 15) WHERE ID = '$ida'");}

echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You received 15% health</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}}

elseif($chosen == '15'){
if($points < '45'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You dont have enough points!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
else{
mysql_query("UPDATE users SET points = (points - 45) WHERE ID = '$ida' AND points >= '45'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 16.</font>');}
mysql_query("UPDATE users SET ptsspent = (ptsspent + 45) WHERE ID = '$ida'");
if(($h + 25) >= (100)){
mysql_query("UPDATE users SET health = '100' WHERE ID = '$ida'");}else{mysql_query("UPDATE users SET health = (health + 25) WHERE ID = '$ida'");}

echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You received 25% health</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}}

elseif($chosen == '16'){
if($points < '50'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You dont have enough points!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
else{
mysql_query("UPDATE users SET points = (points - 50) WHERE ID = '$ida' AND points >= '50'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 17.</font>');}
mysql_query("UPDATE users SET ptsspent = (ptsspent + 50) WHERE ID = '$ida'");
mysql_query("UPDATE users SET rankbar = '1' WHERE ID = '$ida'");

echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You received a rankbar</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}}


elseif($chosen == '22'){
if($points < '100'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You dont have enough points!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
else{
mysql_query("UPDATE users SET points = (points - 100) WHERE ID = '$ida' AND points >= '100'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 21.</font>');}
mysql_query("UPDATE users SET ptsspent = (ptsspent + 100) WHERE ID = '$ida'");
mysql_query("UPDATE users SET precise = '1' WHERE ID = '$ida'");

echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You received a more precise rankbar</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}}



elseif($chosen == '24'){
if($points < '50'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You dont have enough points!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
else{
mysql_query("UPDATE users SET points = (points - 50) WHERE ID = '$ida' AND points >= '50'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 24.</font>');}
mysql_query("UPDATE users SET ptsspent = (ptsspent + 50) WHERE ID = '$ida'");
mysql_query("UPDATE users SET silencer = '1' WHERE ID = '$ida'");

echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You received a weapon silencer</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}}


elseif($chosen == '17'){
if($points < '125'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You dont have enough points!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
elseif($countbgs >= '1'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You already have bodyguard spot 1!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
else{
mysql_query("UPDATE users SET points = (points - 125) WHERE ID = '$ida' AND points >= '125'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 18.</font>');}
mysql_query("UPDATE users SET ptsspent = (ptsspent + 125) WHERE ID = '$ida'");
mysql_query("INSERT INTO bodyguards(username,guarding,status)
VALUES (' ','$gangsterusername','0')");
echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You bought a bodyguard spot!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}}




elseif($chosen == '25'){

$countrobotbgs = mysql_num_rows(mysql_query("SELECT * FROM bodyguards WHERE guarding = '$gangsterusername' AND status = '2' AND robot = '1'"));

if($countrobotbgs >= '3'){die('<font color=white face=verdana size=1>You can only have 2 robot bodyguards at one time (you can still buy regular bodyguard spots)!</font>');}
if($points < '195'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You dont have enough points!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
elseif($countbgs >= '1'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You already have bodyguard spot 1!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
else{


$accepteda = mysql_query("SELECT * FROM bodyguards WHERE username = '$gangsterusername' AND status = '2'");
$accepted = mysql_num_rows($accepteda);

if($accepted != '0'){die (' ');}


mysql_query("UPDATE users SET points = (points - 195) WHERE ID = '$ida' AND points >= '195'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 18.</font>');}
mysql_query("UPDATE users SET ptsspent = (ptsspent + 195) WHERE ID = '$ida'");

$robotone = mt_rand(1000000,99999999);
$checkexist = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username = '$robotone'"));

while($checkexist > '0'){
$robotone = mt_rand(1000000,99999999);
$checkexist = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username = '$robotone'"));
}


$loca = rand(1,7);
if($loca == '1'){$locationrob = 'Las Vegas';}
elseif($loca == '2'){$locationrob = 'Washington';}
elseif($loca == '3'){$locationrob = 'Los Angeles';}
elseif($loca == '4'){$locationrob = 'New York';}
elseif($loca == '5'){$locationrob = 'Louisiana';}
elseif($loca == '6'){$locationrob = 'Louisiana';}
elseif($loca == '7'){$locationrob = 'Ohio';}


$robotranka = rand(6,11);


$insert = "INSERT INTO users (username, password, rankid, protection, location, robot)
VALUES ('$robotone', 'fdsfsafdsfdfijreow9fj8re9j','$robotranka', '7', '$locationrob', '1')";
$add_member = mysql_query($insert);

mysql_query("INSERT INTO bodyguards(username,guarding,status,robot)
VALUES ('$robotone','$gangsterusername','2','1')");

$getrobotid = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username = '$robotone'"));
$robotid = $getrobotid['ID'];

mysql_query("INSERT INTO suggestions(username,id,rob) VALUES('$robotone','$robotid','1')");


echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You bought a bodyguard spot!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}}


elseif($chosen == '26'){

$countrobotbgs = mysql_num_rows(mysql_query("SELECT * FROM bodyguards WHERE guarding = '$gangsterusername' AND status = '2' AND robot = '1'"));

if($countrobotbgs >= '3'){die('<font color=white face=verdana size=1>You can only have 2 robot bodyguards at one time (you can still buy regular bodyguard spots)!</font>');}

if($points < '350'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You dont have enough points!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
elseif($countbgs >= '2'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You already have bodyguard spot 2!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
else{

$accepteda = mysql_query("SELECT * FROM bodyguards WHERE username = '$gangsterusername' AND status = '2'");
$accepted = mysql_num_rows($accepteda);

if($accepted != '0'){die (' ');}


mysql_query("UPDATE users SET points = (points - 350) WHERE ID = '$ida' AND points >= '350'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 18.</font>');}
mysql_query("UPDATE users SET ptsspent = (ptsspent + 350) WHERE ID = '$ida'");

$robotone = mt_rand(1000000,99999999);
$checkexist = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username = '$robotone'"));

while($checkexist > '0'){
$robotone = mt_rand(1000000,99999999);
$checkexist = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username = '$robotone'"));
}


$loca = rand(1,7);
if($loca == '1'){$locationrob = 'Las Vegas';}
elseif($loca == '2'){$locationrob = 'Washington';}
elseif($loca == '3'){$locationrob = 'Los Angeles';}
elseif($loca == '4'){$locationrob = 'New York';}
elseif($loca == '5'){$locationrob = 'Louisiana';}
elseif($loca == '6'){$locationrob = 'Louisiana';}
elseif($loca == '7'){$locationrob = 'Ohio';}


$robotranka = rand(6,11);


$insert = "INSERT INTO users (username, password, rankid, protection, location, robot)
VALUES ('$robotone', 'fdsfsafdsfdfijreow9fj8re9j','$robotranka', '7', '$locationrob', '1')";
$add_member = mysql_query($insert);

mysql_query("INSERT INTO bodyguards(username,guarding,status,robot)
VALUES ('$robotone','$gangsterusername','2','1')");

$getrobotid = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username = '$robotone'"));
$robotid = $getrobotid['ID'];

mysql_query("INSERT INTO suggestions(username,id,rob) VALUES('$robotone','$robotid','1')");


echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You bought a bodyguard spot!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}}


elseif($chosen == '27'){

$countrobotbgs = mysql_num_rows(mysql_query("SELECT * FROM bodyguards WHERE guarding = '$gangsterusername' AND status = '2' AND robot = '1'"));

if($countrobotbgs >= '3'){die('<font color=white face=verdana size=1>You can only have 2 robot bodyguards at one time (you can still buy regular bodyguard spots)!</font>');}


if($points < '450'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You dont have enough points!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
elseif($countbgs >= '3'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You already have bodyguard spot 3!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
else{
$accepteda = mysql_query("SELECT * FROM bodyguards WHERE username = '$gangsterusername' AND status = '2'");
$accepted = mysql_num_rows($accepteda);

if($accepted != '0'){die (' ');}

mysql_query("UPDATE users SET points = (points - 450) WHERE ID = '$ida' AND points >= '450'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 18.</font>');}
mysql_query("UPDATE users SET ptsspent = (ptsspent + 450) WHERE ID = '$ida'");

$robotone = mt_rand(1000000,99999999);
$checkexist = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username = '$robotone'"));

while($checkexist > '0'){
$robotone = mt_rand(1000000,99999999);
$checkexist = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username = '$robotone'"));
}


$loca = rand(1,7);
if($loca == '1'){$locationrob = 'Las Vegas';}
elseif($loca == '2'){$locationrob = 'Washington';}
elseif($loca == '3'){$locationrob = 'Los Angeles';}
elseif($loca == '4'){$locationrob = 'New York';}
elseif($loca == '5'){$locationrob = 'Louisiana';}
elseif($loca == '6'){$locationrob = 'Louisiana';}
elseif($loca == '7'){$locationrob = 'Ohio';}


$robotranka = rand(6,11);


$insert = "INSERT INTO users (username, password, rankid, protection, location, robot)
VALUES ('$robotone', 'fdsfsafdsfdfijreow9fj8re9j','$robotranka', '7', '$locationrob', '1')";
$add_member = mysql_query($insert);

mysql_query("INSERT INTO bodyguards(username,guarding,status,robot)
VALUES ('$robotone','$gangsterusername','2','1')");

$getrobotid = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username = '$robotone'"));
$robotid = $getrobotid['ID'];

mysql_query("INSERT INTO suggestions(username,id,rob) VALUES('$robotone','$robotid','1')");


echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You bought a bodyguard spot!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}}





elseif($chosen == '28'){
$countrobotbgs = mysql_num_rows(mysql_query("SELECT * FROM bodyguards WHERE guarding = '$gangsterusername' AND status = '2' AND robot = '1'"));

if($countrobotbgs >= '3'){die('<font color=white face=verdana size=1>You can only have 2 robot bodyguards at one time (you can still buy regular bodyguard spots)!</font>');}

elseif($points < '650'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You dont have enough points!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
elseif($countbgs >= '4'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You already have bodyguard spot 4!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
else{

$accepteda = mysql_query("SELECT * FROM bodyguards WHERE username = '$gangsterusername' AND status = '2'");
$accepted = mysql_num_rows($accepteda);

if($accepted != '0'){die (' ');}


mysql_query("UPDATE users SET points = (points - 650) WHERE ID = '$ida' AND points >= '650'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 18.</font>');}
mysql_query("UPDATE users SET ptsspent = (ptsspent + 650) WHERE ID = '$ida'");

$robotone = mt_rand(1000000,99999999);
$checkexist = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username = '$robotone'"));

while($checkexist > '0'){
$robotone = mt_rand(1000000,99999999);
$checkexist = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username = '$robotone'"));
}


$loca = rand(1,7);
if($loca == '1'){$locationrob = 'Las Vegas';}
elseif($loca == '2'){$locationrob = 'Washington';}
elseif($loca == '3'){$locationrob = 'Los Angeles';}
elseif($loca == '4'){$locationrob = 'New York';}
elseif($loca == '5'){$locationrob = 'Louisiana';}
elseif($loca == '6'){$locationrob = 'Louisiana';}
elseif($loca == '7'){$locationrob = 'Ohio';}


$robotranka = rand(6,11);


$insert = "INSERT INTO users (username, password, rankid, protection, location, robot)
VALUES ('$robotone', 'fdsfsafdsfdfijreow9fj8re9j','$robotranka', '7', '$locationrob', '1')";
$add_member = mysql_query($insert);

mysql_query("INSERT INTO bodyguards(username,guarding,status,robot)
VALUES ('$robotone','$gangsterusername','2','1')");

$getrobotid = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username = '$robotone'"));
$robotid = $getrobotid['ID'];

mysql_query("INSERT INTO suggestions(username,id,rob) VALUES('$robotone','$robotid','1')");


echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You bought a bodyguard spot!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}}






elseif($chosen == '29'){
$countrobotbgs = mysql_num_rows(mysql_query("SELECT * FROM bodyguards WHERE guarding = '$gangsterusername' AND status = '2' AND robot = '1'"));

if($countrobotbgs >= '3'){die('<font color=white face=verdana size=1>You can only have 2 robot bodyguards at one time (you can still buy regular bodyguard spots)!</font>');}

elseif($points < '825'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You dont have enough points!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
elseif($countbgs >= '5'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You already have bodyguard spot 5!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
else{

$accepteda = mysql_query("SELECT * FROM bodyguards WHERE username = '$gangsterusername' AND status = '2'");
$accepted = mysql_num_rows($accepteda);

if($accepted != '0'){die (' ');}


mysql_query("UPDATE users SET points = (points - 825) WHERE ID = '$ida' AND points >= '650'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 18.</font>');}
mysql_query("UPDATE users SET ptsspent = (ptsspent + 825) WHERE ID = '$ida'");

$robotone = mt_rand(1000000,99999999);
$checkexist = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username = '$robotone'"));

while($checkexist > '0'){
$robotone = mt_rand(1000000,99999999);
$checkexist = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username = '$robotone'"));
}


$loca = rand(1,7);
if($loca == '1'){$locationrob = 'Las Vegas';}
elseif($loca == '2'){$locationrob = 'Washington';}
elseif($loca == '3'){$locationrob = 'Los Angeles';}
elseif($loca == '4'){$locationrob = 'New York';}
elseif($loca == '5'){$locationrob = 'Louisiana';}
elseif($loca == '6'){$locationrob = 'Louisiana';}
elseif($loca == '7'){$locationrob = 'Ohio';}


$robotranka = rand(6,11);


$insert = "INSERT INTO users (username, password, rankid, protection, location, robot)
VALUES ('$robotone', 'fdsfsafdsfdfijreow9fj8re9j','$robotranka', '7', '$locationrob', '1')";
$add_member = mysql_query($insert);

mysql_query("INSERT INTO bodyguards(username,guarding,status,robot)
VALUES ('$robotone','$gangsterusername','2','1')");

$getrobotid = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username = '$robotone'"));
$robotid = $getrobotid['ID'];

mysql_query("INSERT INTO suggestions(username,id,rob) VALUES('$robotone','$robotid','1')");


echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You bought a bodyguard spot!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}}




elseif($chosen == '18'){
if($points < '200'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You dont have enough points!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
elseif($countbgs >= '2'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You already have bodyguard spot 2!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
elseif($countbgs < '1'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You need spot 1 before you can buy bodyguard spot 2!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
else{
mysql_query("UPDATE users SET points = (points - 200) WHERE ID = '$ida' AND points >= '200'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 18.</font>');}
mysql_query("UPDATE users SET ptsspent = (ptsspent + 200) WHERE ID = '$ida'");
mysql_query("INSERT INTO bodyguards(username,guarding,status)
VALUES (' ','$gangsterusername','0')");
echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You bought a bodyguard spot!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}}


elseif($chosen == '19'){
if($points < '275'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You dont have enough points!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
elseif($countbgs >= '3'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You already have bodyguard spot 3!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
elseif($countbgs < '2'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You need spot 2 before you can buy bodyguard spot 3!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
else{
mysql_query("UPDATE users SET points = (points - 275) WHERE ID = '$ida' AND points >= '275'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 20.</font>');}
mysql_query("UPDATE users SET ptsspent = (ptsspent + 275) WHERE ID = '$ida'");
mysql_query("INSERT INTO bodyguards(username,guarding,status)
VALUES (' ','$gangsterusername','0')");
echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You bought a bodyguard spot!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}}

elseif($chosen == '20'){


if($points < '400'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You dont have enough points!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
elseif($countbgs >= '4'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You already have bodyguard spot 4!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
elseif($countbgs < '3'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You need spot 3 before you can buy bodyguard spot 4!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
else{
mysql_query("UPDATE users SET points = (points - 400) WHERE ID = '$ida' AND points >= '400'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 21.</font>');}
mysql_query("UPDATE users SET ptsspent = (ptsspent + 400) WHERE ID = '$ida'");
mysql_query("INSERT INTO bodyguards(username,guarding,status)
VALUES (' ','$gangsterusername','0')");;
echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You bought a bodyguard spot!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}}


elseif($chosen == '23'){
if($points < '525'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You dont have enough points!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
elseif($countbgs >= '5'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You already have bodyguard spot 5!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
elseif($countbgs < '4'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You need spot 4 before you can buy bodyguard spot 4!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
else{
mysql_query("UPDATE users SET points = (points - 525) WHERE ID = '$ida' AND points >= '400'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 21.</font>');}
mysql_query("UPDATE users SET ptsspent = (ptsspent + 525) WHERE ID = '$ida'");
mysql_query("INSERT INTO bodyguards(username,guarding,status)
VALUES (' ','$gangsterusername','0')");;
echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You bought a bodyguard spot!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}}




}
}}






$spots = mysql_query("SELECT * FROM bodyguards WHERE guarding = '$gangsterusername'");
$spotsrows = mysql_num_rows($spots);

$accepteda = mysql_query("SELECT * FROM bodyguards WHERE username = '$gangsterusername' AND status = '2'");
$accepted = mysql_num_rows($accepteda);


$aspots = mysql_query("SELECT * FROM bodyguards WHERE username = '$gangsterusername'");
$aspotsrows = mysql_num_rows($aspots);


if($spotsrows != '0'){
if(isset($_POST['doinvite'])){

if($rank >= '25'){die('<font color=white face=verdana size=1>Error</font>');}
elseif($accepted != '0'){die('<font color=white face=verdana size=1>Error, you are already a bodyguard for someone');}
$spotcheck = mysql_query("SELECT * FROM bodyguards WHERE guarding = '$gangsterusername' AND id = '$spotid' AND status = '0'");
$spotcheckrows = mysql_num_rows($spotcheck);
$userexist = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username = '$invite'"));
if($spotcheckrows == '0'){die(' ');}
elseif($userexist == '0'){die('<font color=white face=verdana size=1>User does not exist</font>');}
elseif($invite == $gangsterusername){die('<font color=white face=verdana size=1>You cannot invite yourself</font>');}
else{
$infoey = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username = '$invite'"));
$getbgranklid = $infoey['rankid'];
$getbgida = $infoey['ID'];
if($getbgranklid < '6'){die('<font color=white face=verdana size=1>Only Mobster + can be bodyguards</font>');}


mysql_query("UPDATE bodyguards SET username = '$invite',status = '1' WHERE id = '$spotid'");

mysql_query("UPDATE users SET notify = '1',notification = 'a_open$usernameone a_closed$usernameone a_slashhas invited you to become his bodyguard, accept or deny it _here_.' WHERE ID = '$getbgida'");

echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>Invite sent!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}}
elseif(isset($_POST['cancel'])){
if($rank >= '25'){die('<font color=white face=verdana size=1>Error</font>');}
elseif($accepted != '0'){die('<font color=white face=verdana size=1>Error, you are already a bodyguard for someone');}
$spotcheck = mysql_query("SELECT * FROM bodyguards WHERE guarding = '$gangsterusername' AND id = '$spotid' AND status = '1'");
$spotcheckrows = mysql_num_rows($spotcheck);

if($spotcheckrows == '0'){die('');}
else{mysql_query("UPDATE bodyguards SET username = ' ',status = '0' WHERE id = '$spotid'");mysql_query("UPDATE bodyguards SET robot = '0' WHERE id = '$spotid'");
echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>Invite canceled!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}}

elseif(isset($_POST['drop'])){
if($rank >= '25'){die('<font color=white face=verdana size=1>Error</font>');}
elseif($accepted != '0'){die('<font color=white face=verdana size=1>Error, you are already a bodyguard for someone');}
$time = time();$newbg = $time + 28800;
$spotcheck = mysql_query("SELECT * FROM bodyguards WHERE guarding = '$gangsterusername' AND id = '$spotid' AND status = '2'");
$spotcheckrows = mysql_num_rows($spotcheck);

if($spotcheckrows == '0'){die('');}
elseif($bgtimer > $time){
$tym = time();


$timeleft = $bgtimer - $time;
$totalh = $timeleft / 3600;
$totalh = floor($totalh);
if($totalh < '10'){ $leading = 0;}else{$leading = "";}



?><font color=white face=verdana size=1>You can only drop a bodyguard every 8 hours<br><br><?
if($timeleft < '0'){echo"00:00:00";}else{echo "Time remaining before you can drop another bodyguard: "; "$leading";echo "$totalh"; echo date( ":i:s", $bgtimer - $tym);}?>

</font><?}
else{mysql_query("UPDATE bodyguards SET robot = '0' WHERE id = '$spotid'");
mysql_query("UPDATE bodyguards SET username = ' ',status = '0' WHERE id = '$spotid'");mysql_query("UPDATE users SET bgs = '$newbg' WHERE ID = '$ida'");
echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>Bodyguard dropped!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}}
}

elseif($aspotsrows != '0'){
if(isset($_POST['accept'])){
if($rank >= '25'){die('<font color=white face=verdana size=1>Error</font>');}
elseif($accepted != '0'){die('<font color=white face=verdana size=1>Error, you are already a bodyguard for someone');}
$spotcheck = mysql_query("SELECT * FROM bodyguards WHERE username = '$gangsterusername' AND id = '$spotid' AND status = '1'");
$spotcheckrows = mysql_num_rows($spotcheck);
$bspots = mysql_query("SELECT * FROM bodyguards WHERE username = '$gangsterusername' AND status = '2'");
$bspotsrows = mysql_num_rows($bspots);
if($spotcheckrows == '0'){die('');}
elseif($bspotsrows > '0'){die('');}
else{mysql_query("UPDATE usersonline SET q = '1' WHERE id = '$ida'");mysql_query("UPDATE bodyguards SET status = '2' WHERE id = '$spotid'");mysql_query("UPDATE bodyguards SET status = '0' WHERE guarding = '$gangsterusername'");
echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You accepted the invite!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}}
}



?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Points</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<table cellpadding=0 width="85%" align=center><tr><td>
<Br><? $riu = mt_rand(0,4); if($riu == 0){echo'<Br><Br>';}if($riu == 3){echo'<Br>';}?>
<table width=100% cellpadding=0 cellspacing=0><tr><td width="60%" valign="top">
<table align="left" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td  background="/more/top.png" NOWRAP align=center><font color="222222" size="1" face="verdana"><b>Options</b></font></td>
<td width="8"  background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png"></td>
<td background="/more/crossbg.png">


<table cellpadding=0 cellspacing=2>
<form method="post"><input type=hidden name=cheki value=<? $pime = time(); $chei = floor($pime/45); echo"$chei"; ?>>
<tr><td width=75% bgcolor=222222 NOWRAP colspan=2 align=center><font color=white face=verdana size=1>Item:</font></td><td width=25% bgcolor=222222 NOWRAP><font color=white face=verdana size=1>Price:</font></td></tr>
<tr><td width=1% bgcolor=#444444 NOWRAP><input type=radio name=spend value=1></td><td width=75% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>&nbsp;1 day anti steal </font></td><td width=25% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>5</font></td></tr>
<tr><td width=1% bgcolor=#444444 NOWRAP><input type=radio name=spend value=2></td><td width=75% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>&nbsp;1 week anti steal </font></td><td width=25% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>15</font></td></tr>
<tr><td width=1% bgcolor=#444444 NOWRAP><input type=radio name=spend value=21></td><td width=75% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>&nbsp;Permenant anti steal </font></td><td width=25% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>60</font></td></tr>
<tr><td width=1% bgcolor=#444444 NOWRAP><input type=radio name=spend value=3></td><td width=75% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>&nbsp;8 hour OR timer </font></td><td width=25% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>75</font></td></tr>
<tr><td width=1% bgcolor=#444444 NOWRAP><input type=radio name=spend value=4></td><td width=75% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>&nbsp;1,000 Bullets </font></td><td width=25% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>15 <?if($increase != '0'){echo"<font color=khaki>(+<b>$increase</b>%)</font>";}?></font></td></tr>
<tr><td width=1% bgcolor=#444444 NOWRAP><input type=radio name=spend value=5></td><td width=75% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>&nbsp;3,500 Bullets </font></td><td width=25% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>40 <?if($increase != '0'){echo"<font color=khaki>(+<b>$increase</b>%)</font>";}?></font></td></tr>
<tr><td width=1% bgcolor=#444444 NOWRAP><input type=radio name=spend value=6></td><td width=75% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>&nbsp;6,500 Bullets</font></td><td width=25% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>60 <?if($increase != '0'){echo"<font color=khaki>(+<b>$increase</b>%)</font>";}?></font></td></tr>
<tr><td width=1% bgcolor=#444444 NOWRAP><input type=radio name=spend value=7></td><td width=75% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>&nbsp;Create custom car</font></td><td width=25% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>75</font></td></tr>
<tr><td width=1% bgcolor=#444444 NOWRAP><input type=radio name=spend value=8></td><td width=75% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>&nbsp;M249 Para SAW</font></td><td width=25% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>100</font></td></tr>
<tr><td width=1% bgcolor=#444444 NOWRAP><input type=radio name=spend value=9></td><td width=75% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>&nbsp;Repair car successfully&nbsp;&nbsp;&nbsp;</font></td><td width=25% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>3</font></td></tr>
<tr><td width=1% bgcolor=#444444 NOWRAP><input type=radio name=spend value=10></td><td width=75% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>&nbsp;Leave jail</font></td><td width=25% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>3</font></td></tr>
<tr><td width=1% bgcolor=#444444 NOWRAP><input type=radio name=spend value=11></td><td width=75% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>&nbsp;Reset bullet timer</font></td><td width=25% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>2</font></td></tr>
<tr><td width=1% bgcolor=#444444 NOWRAP><input type=radio name=spend value=12></td><td width=75% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>&nbsp;Reset steal timer</font></td><td width=25% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>3</font></td></tr>
<tr><td width=1% bgcolor=#444444 NOWRAP><input type=radio name=spend value=13></td><td width=75% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>&nbsp;5% Health</font></td><td width=25% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>15</font></td></tr>
<tr><td width=1% bgcolor=#444444 NOWRAP><input type=radio name=spend value=14></td><td width=75% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>&nbsp;15% Health</font></td><td width=25% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>30</font></td></tr>
<tr><td width=1% bgcolor=#444444 NOWRAP><input type=radio name=spend value=15></td><td width=75% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>&nbsp;25% Health</font></td><td width=25% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>45</font></td></tr>
<tr><td width=1% bgcolor=#444444 NOWRAP><input type=radio disabled name=spend value=16></td><td width=75% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>&nbsp;Rankbar</font></td><td width=25% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>50</font></td></tr>
<tr><td width=1% bgcolor=#444444 NOWRAP><input type=radio name=spend value=22></td><td width=75% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>&nbsp;More Precise Rankbar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></td><td width=25% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>100</font></td></tr>
<tr><td width=1% bgcolor=#777777 height=1 NOWRAP colspan=3></td></tr><tr><td width=1% bgcolor=#444444 NOWRAP><input type=radio name=spend value=17></td><td width=75% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>&nbsp;Bodyguard spot 1</font></td><td width=25% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>125</font></td></tr>
<tr><td width=1% bgcolor=#444444 NOWRAP><input type=radio name=spend value=25></td><td width=75% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1><b>&nbsp;Robot BG spot 1</b></font></td><td width=25% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1><b>195</b></font></td></tr>
<tr><td width=1% bgcolor=#777777 height=1 NOWRAP colspan=3></td></tr>
<tr><td width=1% bgcolor=#444444 NOWRAP><input type=radio name=spend value=18</td><td width=75% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>&nbsp;Bodyguard spot 2</font></td><td width=25% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>200</font></td></tr>
<tr><td width=1% bgcolor=#444444 NOWRAP><input type=radio name=spend value=26></td><td width=75% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1><b>&nbsp;Robot BG spot 2</b></font></td><td width=25% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1><b>350</b></font></td></tr>
<tr><td width=1% bgcolor=#777777 height=1 NOWRAP colspan=3></td></tr><tr><td width=1% bgcolor=#444444 NOWRAP><input type=radio name=spend value=19</td><td width=75% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>&nbsp;Bodyguard spot 3</font></td><td width=25% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>275</font></td></tr>
<tr><td width=1% bgcolor=#444444 NOWRAP><input type=radio name=spend value=27></td><td width=75% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1><b>&nbsp;Robot BG spot 3</b></font></td><td width=25% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1><b>450</b></font></td></tr>
<tr><td width=1% bgcolor=#777777 height=1 NOWRAP colspan=3></td></tr><tr><td width=1% bgcolor=#444444 NOWRAP><input type=radio name=spend value=20</td><td width=75% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>&nbsp;Bodyguard spot 4</font></td><td width=25% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>400</font></td></tr>
<tr><td width=1% bgcolor=#444444 NOWRAP><input type=radio name=spend value=28></td><td width=75% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1><b>&nbsp;Robot BG spot 4</b></font></td><td width=25% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1><b>650</b></font></td></tr>
<tr><td width=1% bgcolor=#777777 height=1 NOWRAP colspan=3></td></tr><tr><td width=1% bgcolor=#444444 NOWRAP><input type=radio name=spend value=23</td><td width=75% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>&nbsp;Bodyguard spot 5</font></td><td width=25% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>525</font></td></tr>
<tr><td width=1% bgcolor=#444444 NOWRAP><input type=radio name=spend value=29></td><td width=75% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1><b>&nbsp;Robot BG spot 5</b></font></td><td width=25% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1><b>825</b></font></td></tr>
<tr><td width=1% bgcolor=#777777 height=1 NOWRAP colspan=3></td></tr><tr><td width=1% bgcolor=#444444 NOWRAP><input type=radio name=spend value=24</td><td width=75% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>&nbsp;Weapon Silencer</font></td><td width=25% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>50</font></td></tr>
<tr><td width=100% bgcolor=#444444 NOWRAP colspan="3"><input type=submit name=do value="Buy" class="textbox" style="width:100%;"></td></tr>
<tr><td width=100% NOWRAP align=right colspan="3" bgcolor=222222><font color=white face=verdana size=1>Points spent: <font color=khaki><b><?echo number_format($spentpts);?></b></font></font></td></tr>
</form>
</table>
</td>
<td width="8" background="/more/rightb.png"></td>
</tr>


<tr>
<td width="8" height="9" background="/more/bottomleft.png"></td>
<td height="9" background="/more/bottom.png"></td>
<td width="8" height="9" background="/more/bottomright.png"></td>
</tr><tr><td colspan=3 height=10></td></tr>
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td  background="/more/top.png" NOWRAP align=center><font color="222222" size="1" face="verdana"><b>Bodyguard Info</b></font></td>
<td width="8"  background="/more/topright.png"></td>
</tr>
<tr>
<td width="8" background="/more/leftb.png"></td>
<td background="/more/crossbg.png">
<table cellpadding=0 cellspacing=2 width=100% id=bodyguards>
<tr><td bgcolor=222222 NOWRAP><font color=white face=verdana size=1>&nbsp;Bodyguard:</font></td><td bgcolor=222222 NOWRAP><font color=white face=verdana size=1>&nbsp;Action:</font></td></tr>
<?
if($rank >= '25'){echo"<tr><td bgcolor=#333333 NOWRAP colspan=2 align=center><font color=white face=verdana size=1>You cannot use this feature.</font></td><td bgcolor=#333333 NOWRAP></td></tr>";}
else{
$spots = mysql_query("SELECT * FROM bodyguards WHERE guarding = '$gangsterusername' ORDER BY id ASC");
$spotsrows = mysql_num_rows($spots);

$aspots = mysql_query("SELECT * FROM bodyguards WHERE username = '$gangsterusername' ORDER BY id ASC");
$aspotsrows = mysql_num_rows($aspots);

$accepteda = mysql_query("SELECT * FROM bodyguards WHERE username = '$gangsterusername' AND status = '2' ORDER BY id ASC");
$accepted = mysql_num_rows($accepteda);


if($accepted == '0'){
if($spotsrows != '0'){
while($spotsarray = mysql_fetch_array($spots)){
$spotid = $spotsarray['id'];
$status = $spotsarray['status'];
$invited = $spotsarray['username'];

if($status == '0'){echo"<form action=points.php method=post><tr><td bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>&nbsp;Invite:</font><input class=textbox type=text name=invite></td><td bgcolor=#333333 NOWRAP><input type=hidden value=$spotid name=spotid><input class=textbox type=submit value=Invite name=doinvite style='width:50;'></td></tr></form>";}

elseif($status == '1'){echo"<form action=points.php method=post><tr><td bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>&nbsp;Waiting: </font><a href=viewprofile.php?username=$invited><font color=white face=verdana size=1>$invited</font></td><td bgcolor=#333333 NOWRAP><input type=hidden value=$spotid name=spotid><input class=textbox type=submit value=Cancel name=cancel style='width:100%;'></td></tr></form>";}

elseif($status == '2'){echo"<form action=points.php method=post><tr><td bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>&nbsp;Accepted: </font><a href=viewprofile.php?username=$invited><font color=white face=verdana size=1><b>$invited</b></font></td><td bgcolor=#333333 NOWRAP><input type=hidden value=$spotid name=spotid><input class=textbox type=submit value=Drop name=drop style='width:100%;'></td></tr></form>";}

}}}

if($aspotsrows != '0'){
while($aspotsarray = mysql_fetch_array($aspots)){
$spotid = $aspotsarray['id'];
$status = $aspotsarray['status'];
$invited = $aspotsarray['guarding'];

if($status == '1'){echo"<form action=points.php method=post><tr><td bgcolor=#444444 NOWRAP><a href=viewprofile.php?username=$invited><font color=white face=verdana size=1>$invited</a> has invited you to become his bodyguard</font></td><td bgcolor=#333333 NOWRAP><input type=hidden value=$spotid name=spotid><input class=textbox type=submit value=Accept name=accept style='width:50;'></td></tr></form>";}

elseif($status == '2'){echo"<tr><td bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>&nbsp;You are a bodyguard for </font><a href=viewprofile.php?username=$invited><font color=silver face=verdana size=1><b>$invited</b></font></td><td bgcolor=#333333 NOWRAP></td></tr>";}

}}

if(($spotsrows == '0')&&($aspotsrows == '0')){echo"<tr><td bgcolor=#333333 NOWRAP colspan=2 align=center><font color=silver face=verdana size=1>You have no bodyguard spots or invites!</font></td><td bgcolor=#333333 NOWRAP></td></tr>";}
}

?>
</table></td>
<td width="8" background="/more/rightb.png"></td>
</tr>


<tr>
<td width="8" height="9" background="/more/bottomleft.png"></td>
<td height="9" background="/more/bottom.png"></td>
<td width="8" height="9" background="/more/bottomright.png"></td>
</tr></table>



</td><td width="50%" valign="top">

<table align="center" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td  background="/more/top.png" NOWRAP align=center><font color="222222" size="1" face="verdana"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Send Points&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></font></td>
<td width="8"  background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png"></td>
<td background="/more/crossbg.png"><table width="100%" cellpadding="0" cellspacing="1" align="center">
<form method=post>
<tr><td width="100%"><input type="text" name="sendto" class="textbox" value="Username" onClick="this.value=''"  style="width: 100%;"></td></tr>
<tr><td width="100%"><input type="text" name="sendamount" class="textbox"  value=Amount onClick="this.value=''"  style="width: 100%;"></td></tr>
<tr><td width="100%" bgcolor="222222" NOWRAP colspan="2"><input type="submit" value="Send Points" class="textbox" name="sendsubmit" style="width: 100%; "></td></tr></form>
</table></td>
<td width="8" background="/more/rightb.png"></td>
</tr>


<tr>
<td width="8" height="9" background="/more/bottomleft.png"></td>
<td height="9" background="/more/bottom.png"></td>
<td width="8" height="9" background="/more/bottomright.png"></td>
</tr>
</table>
<br>
<table align="center" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td  background="/more/top.png" NOWRAP align=center><font color="222222" size="1" face="verdana"><b>Last 15 Sent</b>&nbsp;&nbsp;</font><a href=pointtransactions.php><font color=white face=verdana size=1>(</font><font color=gold face=verdana size=1><b>+</b></font><font color=white face=verdana size=1>)</font></a></td>
<td width="8"  background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png"></td>
<td background="/more/crossbg.png">
<table cellpadding="0" cellspacing="1" width=100% align="left">
<?php 
while($lasttenarray = mysql_fetch_array($lasttensql)){
$lasttento = $lasttenarray['sent'];
$qt = $lasttenarray['quicktrade'];
$lasttenamount = number_format($lasttenarray['amount']);
if($qt == 'yes'){echo"<tr><td bgcolor=#333333 NOWRAP align=left><font color=white size=1 face=verdana>&nbsp;You sent $lasttenamount points to quicktrade</font></td></tr>";}
else{echo"<tr><td bgcolor=#333333 NOWRAP align=left><font color=white size=1 face=verdana>&nbsp;You sent $lasttenamount points to </font><a href=viewprofile.php?username=$lasttento><font color=white size=1 face=verdana>$lasttento</font></a></td></tr>";}}?>
</table></td>
<td width="8" background="/more/rightb.png"></td>
</tr>


<tr>
<td width="8" height="9" background="/more/bottomleft.png"></td>
<td height="9" background="/more/bottom.png"></td>
<td width="8" height="9" background="/more/bottomright.png"></td>
</tr><tr><td colspan=3></td></tr>
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td  background="/more/top.png" NOWRAP align=center><font color="222222" size="1" face="verdana"><b>Last 15 Received</b>&nbsp;&nbsp;</font><a href=pointtransactions.php><font color=white face=verdana size=1>(</font><font color=gold face=verdana size=1><b>+</b></font><font color=white face=verdana size=1>)</font></a></td>
<td width="8"  background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png"></td>
<td background="/more/crossbg.png">
<table cellpadding="0" cellspacing="1" width=100%>
<?php 
while($lasttenrarray = mysql_fetch_array($lasttenrsql)){
$lasttenrto = $lasttenrarray['username'];
$qt = $lasttenrarray['quicktrade'];
$lasttenramount = number_format($lasttenrarray['amount']);
if($qt == 'yes'){echo"<tr><td bgcolor=#333333 NOWRAP align=left><font color=white size=1 face=verdana>&nbsp;You recieved $lasttenramount points from quicktrade</font></td></tr>";
}else{echo"<tr><td bgcolor=#333333 NOWRAP align=left><font color=white size=1 face=verdana>&nbsp;You recieved $lasttenramount points from </font><a href=viewprofile.php?username=$lasttenrto><font color=white size=1 face=verdana>$lasttenrto</font></a></td></tr>";}}?>
</table></td>
<td width="8" background="/more/rightb.png"></td>
</tr>


<tr>
<td width="8" height="9" background="/more/bottomleft.png"></td>
<td height="9" background="/more/bottom.png"></td>
<td width="8" height="9" background="/more/bottomright.png"></td>
</tr>
</table>

<form action="#" method="post" name="BB_BuyButtonForm" target="_top">
    <input name="item_description_1" type="hidden" value="Virtual gaming points, which allow the user to enable cusotmizable features to their virtual account"/>
    <input name="item_quantity_1" type="hidden" value="1"/>
 <input name="item_name_1" type="hidden" value="Points for <?echo $usernameone;?> on www.mafiasociety.com"/>
    <input name="item_currency_1" type="hidden" value="GBP"/>
    <input name="shopping-cart.items.item-1.digital-content.key" type="hidden" value="OmKpagIayD/0AUyIjvpkrDrJcZuAiwRR692QGxDF9/47yiJPyrU/LiywoE12Ye9+y6/cFQQas7ZCu1eFcRLwEw=="/>
    <input name="shopping-cart.items.item-1.digital-content.key.is-encrypted" type="hidden" value="true"/>
    <input name="shopping-cart.items.item-1.digital-content.url" type="hidden" value="http://www.mafiasociety.com/s2/points.php"/>
    <input name="_charset_" type="hidden" value="utf-8"/>



<br>Paypal payment comming soon!<br>
<table align="left" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td  background="/more/top.png" NOWRAP align=center><font color="222222" size="1" face="verdana"><b>Points (<font color=lime>Paypal/font>) <font color=yellow>+ 50% free</font></b></font></td>
<td width="8"  background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png"></td>
<td background="/more/crossbg.png"><table width="100%" cellpadding="0" cellspacing="1" align="center" id=paypal>
<tr><td colspan="3" bgcolor=#222222 height="3"><font color=white face=verdana size=1>The money donated to the game is to help pay for costs and keep the game up, the points are given to thank you for your donation</td></tr>
<tr><td bgcolor=#222222 width=5 NOWRAP>      

 <input  name="item_price_1" type="radio" value="2.50"/></td><td bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>&nbsp;50 Points:</font></td><td bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>&#163;2.50</font></td></tr>
<tr><td bgcolor=#222222 NOWRAP> <input  name="item_price_1" type="radio" value="5.0"/></td><td bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>&nbsp;150 Points:</font></td><td bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>&#163;5.00</font></td></tr>
<tr><td bgcolor=555555 NOWRAP> <input  name="item_price_1" type="radio" value="10.0"/></td><td bgcolor=555555 NOWRAP><font color=white face=verdana size=1>&nbsp;600 Points:</font></td><td bgcolor=555555 NOWRAP><font color=white  face=verdana size=1>&#163;10.00</font></td></tr>
<tr><td bgcolor=555555 NOWRAP> <input  name="item_price_1" type="radio" value="20.0"/></td><td bgcolor=555555 NOWRAP><font color=white face=verdana size=1>&nbsp;2150 Points:</font></td><td bgcolor=555555 NOWRAP><font color=white face=verdana size=1>&#163;20.00</font></td></tr>
<tr><td bgcolor=555555 NOWRAP> <input  name="item_price_1" type="radio" value="27.50"/></td><td bgcolor=555555 NOWRAP><font color=white face=verdana size=1>&nbsp;2700 Points:</font></td><td bgcolor=555555 NOWRAP><font color=white  face=verdana size=1>&#163;27.50</font></td></tr>
<tr><td bgcolor=555555 NOWRAP> <input  name="item_price_1" type="radio" value="50.0"/></td><td bgcolor=555555 NOWRAP><font color=white face=verdana size=1>&nbsp;5250 Points:</font></td><td bgcolor=555555 NOWRAP><font color=white  face=verdana size=1>&#163;50.00</font></td></tr>
<tr><td bgcolor=555555 NOWRAP> <input  name="item_price_1" type="radio" value="72.50"/></td><td bgcolor=555555 NOWRAP><font color=white face=verdana size=1>&nbsp;8750 Points:</font></td><td bgcolor=555555 NOWRAP><font color=white face=verdana size=1>&#163;72.50</font></td></tr>
<tr><td bgcolor=#222222 colspan=3 height=5></td></tr>
<tr><td bgcolor=#333333 colspan=3><font color=white face=verdana size=1>If you wish to make a larger donation than the above.. contact the </font><a href=helpdesk.php><font color=lime face=verdana size=1><b>Helpdesk</b></font></a><font color=white face=verdana size=1> and ask permission to speak to an Administrator for a better deal</font></td></tr>
<tr><td NOWRAP></td><td NOWRAP></td><td align=right NOWRAP><input type=submit name=submit value='Buy' class=textbox></td></tr>
</table></td>
<td width="8" background="/more/rightb.png"></td>
</tr>


<tr>
<td width="8" height="9" background="/more/bottomleft.png"></td>
<td height="9" background="/more/bottom.png"></td>
<td width="8" height="9" background="/more/bottomright.png"></td>
</tr>
</table>



</form>

</td></tr></table>
<br><br>


<br>
<br><br>

</td></tr>
</table>
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