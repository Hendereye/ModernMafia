<? include 'included.php'; ?>
<?

 
if($locition == $gethot){$moneyby = 1.35;}elseif($locition == $getcold){$moneyby = 0.8;}else{$moneyby = 1;}


$time = time();
$times = $time + 300;
$jailtime = $time + 120;
$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$vera = mysql_real_escape_string($_POST['ver']);
$sessionid = preg_replace($saturate,"",$sessionidraw);
$verpost = preg_replace($saturate,"",$vera);
$userip = $_SERVER[REMOTE_ADDR]; 
$gangsterusername = $usernameone;
$jailtest = mysql_query("SELECT username FROM jail WHERE username  = '$gangsterusername'");
$jailtester = mysql_num_rows($jailtest);
if($jailtester != '0'){die(include 'jail.php'); }
$check = $statustesttwo['sentmsgs'];

$stealbulletsbutton = "7";
$stealfrombutton = "6";
$kidnapbutton = "5";
$robbutton = "4";
$mugbutton = "3";
$hustlebutton = "2";
$begbutton = "1";
$hidden = "hi";

$timea = time();



?>


<html>
<head>
<link rel="stylesheet" href="more/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="shortcut icon" href="/more/icon.png" type="image/x-icon" />
<script language="javascript">
checked = false;
      function checkAll () {
        if (checked == false){checked = true}else{checked = false}
	for (var i = 0; i < document.getElementById('crimes').elements.length; i++) {
	  document.getElementById('crimes').elements[i].checked = checked;
	}
      }


 </script>

<script language="javascript">
checked = false;
      function checkAll () {
        if (checked == false){checked = true}else{checked = false}
	for (var i = 0; i < document.getElementById('crimes').elements.length; i++) {
	  document.getElementById('crimes').elements[i].checked = checked;
	}
      }


 </script>

<script>
document.getElementById("crimeones").innerHTML = 0;
document.getElementById("crimetwos").innerHTML = 0;
document.getElementById("crimethrees").innerHTML = 0;
document.getElementById("crimefours").innerHTML = 0;
document.getElementById("crimefives").innerHTML = 0;
document.getElementById("crimesixs").innerHTML = 0;
document.getElementById("crimesevens").innerHTML = 0;
function crimeupdate(){



	var ok1 = parseInt(document.getElementById("crimesevens").innerHTML) - 1;

if(ok1 >=0){document.getElementById("crimesevens").innerHTML = ok1;}else{}
 
	var ok2 = parseInt(document.getElementById("crimesixs").innerHTML) - 1;
if(ok2 >=0){document.getElementById("crimesixs").innerHTML = ok2;}else{}
 
	var ok3 = parseInt(document.getElementById("crimefives").innerHTML) - 1;
if(ok3 >=0){document.getElementById("crimefives").innerHTML = ok3;}else{}
 
	var ok4 = parseInt(document.getElementById("crimefours").innerHTML) - 1;
if(ok4 >=0){document.getElementById("crimefours").innerHTML = ok4;}else{}
 
	var ok5 = parseInt(document.getElementById("crimethrees").innerHTML) - 1;
if(ok5 >=0){document.getElementById("crimethrees").innerHTML = ok5;}else{}
 
	var ok6 = parseInt(document.getElementById("crimetwos").innerHTML) - 1;
if(ok6 >=0){document.getElementById("crimetwos").innerHTML = ok6;}else{}
 
	var ok7 = parseInt(document.getElementById("crimeones").innerHTML) - 1;
if(ok7 >=0){document.getElementById("crimeones").innerHTML = ok7;}else{}
 

setTimeout('crimeupdate()',1000);
}

</script>
</head>
<body background="/more/bgtest.png">
<script type="text/javascript">
function emotion(em) { document.smiley.editprofile.value=document.smiley.editprofile.value+em;}
</script>
<table width="100%" height="335" align="center" cellpadding="0" cellspacing="3">
<tr>
<td width="250" height="25"></td>
<td width="66%">
</td>
<td width="250"></td>
</tr>

<tr>
<td width="250" valign="top">
<? include 'leftmenu.php'; ?>
</td>
<td valign="top" width="100%">
<?php 






$time = time();


$getuserinfoarray = $statustesttwo;
$username = $getuserinfoarray['username'];
$reward = $getuserinfoarray['reward'];
$rank = $getuserinfoarray['rankid'];
$rankup = $getuserinfoarray['rankup'];
$ID = $getuserinfoarray['ID'];
$ver = $getuserinfoarray['ver1'];
$input = $getuserinfoarray['input'];
$commiteed = array("1","2","3","4","5","6","7");
$inputrand = mt_rand(0,20);
if($inputrand == '0'){$newinput = 1;}
$crimes = '0';

if((isset($_POST['1'])) || (isset($_POST['2'])) || (isset($_POST['3'])) || (isset($_POST['4'])) || (isset($_POST['5'])) || (isset($_POST['6'])) || (isset($_POST['7']))){


if($input == '1'){

if(strtoupper($verpost) != $ver){die('<font color=white face=verdana size=1>Error, security code incorrect</font>');}
else{$alphanum = "ABCDEFGHIJKLMNPQRSTUVWXYZ123456789";$randver = substr(str_shuffle($alphanum), 0, 2);mysql_query("UPDATE users SET ver1 = '$randver' WHERE ID = '$ida'");}}

mysql_query("UPDATE users SET input = '$newinput' WHERE ID = '$ida'");}



$getida = mysql_real_escape_string($_GET['id']);
$getid = preg_replace($saturated,"",$getida);
$kidnapraw = $getuserinfoarray['kidnap'];
$mugraw = $getuserinfoarray['mug'];
$stealfromraw = $getuserinfoarray['stealfrom'];
$stealbulletsraw = $getuserinfoarray['stealbullets'];
$robraw = $getuserinfoarray['rob'];
$hustleraw = $getuserinfoarray['hustle'];
$begraw = $getuserinfoarray['beg'];


$kidnap = $kidnapraw - $time;
$mug = $mugraw - $time;
$stealfrom = $stealfromraw - $time;
$stealbullets = $stealbulletsraw - $time;
$rob = $robraw - $time;
$hustle = $hustleraw - $time;
$beg = $begraw - $time;

if(isset($_POST["$stealbulletsbutton"])){
if($rank < 10){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png>
<font color=white size=1 face=verdana>You must be at least <b>Mafioso</b> before you can raid a gun store!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
elseif($stealbullets > '0'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png>
<font color=white size=1 face=verdana>You must wait <b>$stealbullets</b> seconds before you can raid a gun store!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
else{


$rand = mt_rand(0,9);
$jailtime = $time + 200;
$times = $time + 7000;
$moneyrand = mt_rand(25,125) * $moneyby;

mysql_query("UPDATE users SET stealbullets = '$times' WHERE ID = '$ida' AND stealbullets <= '$time'");
if (mysql_affected_rows()==0) {die(' ');}
$crimes++;


if($rand == 1){
mysql_query("INSERT INTO jail(username,time,reward)
VALUES ('$gangsterusername','$jailtime','$reward')");

die('<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png>
<font color=white size=1 face=verdana>You got caught! You are now in jail</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table></td>
<td width=250 valign=top>

</td>
</tr>
</table>
</body></html>');}



if($rank == '10'){ $update = '1';$newrank = 'Respected Mafioso';}
elseif($rank == '11'){ $update = '0.89';$newrank = 'Underboss';}
elseif($rank == '12'){ $update = '0.82';$newrank = 'Respected Underboss';}
elseif($rank == '13'){ $update = '0.78';$newrank = 'Boss';}
elseif($rank == '14'){ $update = '0.7';$newrank = 'Respected Boss';}
elseif($rank == '15'){ $update = '0.67';$newrank = 'Godfather';}
elseif($rank == '16'){ $update = '0.635';$newrank = 'Respected Godfather';}
elseif($rank == '17'){ $update = '0.639';$newrank = 'Gangster';}
elseif($rank == '18'){ $update = '0.59';$newrank = 'Respected Gangster';}
elseif($rank == '19'){ $update = '0.46';$newrank = 'Don';}
elseif($rank == '20'){ $update = '0.34';$newrank = 'Respected Don';}
elseif($rank == '21'){ $update = '0.12';$newrank = 'Tough Don';}
else{ $update = '0';}

if($rank <= 22){
if(($rankup + $update) > ('100')){
$rank++;
$newrankup = $rankup + $update - 100;
$rankup = $newrankup;


$sendinfo = "You have been promoted to \[b\]$newrank\[\/b\]! Congratulations, you received \[b\]1,000\[\/b\] bullets!";
mysql_query("UPDATE users SET rankid = rankid + 1, rankup = '$newrankup', bullets = bullets + 1000 + $moneyrand WHERE ID = '$ida'");
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$gangsterusername','$gangsterusername','2','$userip','$sendinfo')");
}else{
$rankup = $rankup + $update;
mysql_query("UPDATE users SET bullets = bullets + $moneyrand WHERE ID = '$ida'");
mysql_query("UPDATE users SET rankup = rankup + $update WHERE ID = '$ida'");}}

$moneyr = number_format($moneyrand);
echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png>
<font color=white face=verdana size=1>You successfully raided a gun store! And got away with <b>$moneyr</b> bullets!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}}




if(isset($_POST["$stealfrombutton"])){


if($rank < 9){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png>
<font color=white size=1 face=verdana>You must be at least <b>Respected Assassin</b> before you can steal cash!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
elseif($stealfrom > '0'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png>
<font color=white size=1 face=verdana>You must wait <b>$stealfrom</b> seconds before you can steal cash!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
else{


$rand = mt_rand(0,10);
$jailtime = $time + 185;
$times = $time + 2200;
mysql_query("UPDATE users SET stealfrom = '$times' WHERE ID = '$ida' AND stealfrom <= '$time'");
if (mysql_affected_rows()==0) {die(' ');}
$crimes++;
$timetwo = time()-1600;
$stealnamea = mysql_fetch_array(mysql_query("SELECT username,money,antisteal FROM users WHERE ID != '$ida' AND activity >= '$timetwo' AND status = 'Alive' ORDER BY RAND() LIMIT 1"));
$stealname = $stealnamea['username'];
$stealmoney = $stealnamea['money'];
$anti = $stealnamea['antisteal'];

if($stealmoney >= 100000000){
$moneyrand = 1000000;
$moneyr = number_format($moneyrand);}
elseif($stealmoney >= 1000000){
$moneyrand = mt_rand(0,200000);
$moneyr = number_format($moneyrand);}
elseif($stealmoney == 0){
$moneyrand = 0;
$moneyr = number_format($moneyrand);}
elseif($stealmoney < 1000000){
$moneyrand = mt_rand(0,$stealmoney);
$moneyr = number_format($moneyrand);}
else{
$moneyrand = mt_rand(0,$stealmoney);
$moneyr = number_format($moneyrand);}


if($rand < 1){
mysql_query("INSERT INTO jail(username,time,reward)
VALUES ('$gangsterusername','$jailtime','$reward')");
die('<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png>
<font color=white size=1 face=verdana>You got caught! You are now in jail</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>');}


if($rank == '9'){ $update = '0.95';$newrank = 'Mafioso';}
elseif($rank == '10'){ $update = '0.95';$newrank = 'Respected Mafioso';}
elseif($rank == '11'){ $update = '0.94';$newrank = 'Underboss';}
elseif($rank == '12'){ $update = '0.92';$newrank = 'Respected Underboss';}
elseif($rank == '13'){ $update = '0.88';$newrank = 'Boss';}
elseif($rank == '14'){ $update = '0.82';$newrank = 'Respected Boss';}
elseif($rank == '15'){ $update = '0.8';$newrank = 'Godfather';}
elseif($rank == '16'){ $update = '0.765';$newrank = 'Respected Godfather';}
elseif($rank == '17'){ $update = '0.689';$newrank = 'Gangster';}
elseif($rank == '18'){ $update = '0.6';$newrank = 'Respected Gangster';}
elseif($rank == '19'){ $update = '0.43';$newrank = 'Don';}
elseif($rank == '20'){ $update = '0.24';$newrank = 'Respected Don';}
elseif($rank == '21'){ $update = '0.1';$newrank = 'Tough Don';}
else{ $update = '0';}

if($rank <= 22){
if(($rankup + $update) > ('100')){
$rank++;
$newrankup = $rankup + $update - 100;
$rankup = $newrankup;
$sendinfo = "You have been promoted to \[b\]$newrank\[\/b\]! Congratulations, you received \[b\]1,000\[\/b\] bullets!";
mysql_query("UPDATE users SET rankid = rankid + 1, rankup = '$newrankup', bullets = bullets + 1000,money = money + $moneyrand WHERE ID = '$ida'");
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$gangsterusername','$gangsterusername','2','$userip','$sendinfo')");
}else{
$rankup = $rankup + $update;
if($moneyrand == '0'){$moneyrand = '1';}
mysql_query("UPDATE users SET rankup = rankup + $update  WHERE ID = '$ida'");
mysql_query("UPDATE users SET money = money + $moneyrand WHERE ID = '$ida'");}}



if($anti > $time){
echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png>
<font color=white face=verdana size=1>You successfully stole $<b>0</b> from <a href=viewprofile.php?username=$stealname>$stealname</a>!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}

else{
echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png>
<font color=white face=verdana size=1>You successfully stole $<b>$moneyr</b> from </font><a href=viewprofile.php?username=$stealname><font color=white face=verdana size=1>$stealname</a>!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";
if($moneyrand == '1'){$moneyrand = '0';}
mysql_query("UPDATE users SET money = money - $moneyrand WHERE username = '$stealname'");
$sendinfo = "\[b\]$gangsterusername\[\/b\] stole $\[b\]$moneyr\[\/b\] from you!";
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$stealname','$stealname','2','$userip','$sendinfo')");
mysql_query("INSERT INTO moneysent(username,amount,sent,ip)
VALUES ('$stealname','$moneyrand','$gangsterusername','$userip')");}}}



if(isset($_POST["$kidnapbutton"])){
if($rank < 7){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png>
<font color=white size=1 face=verdana>You must be at least <b>Respected Mobster</b> before you can kidnap a policeman!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
elseif($kidnap > '0'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png>
<font color=white size=1 face=verdana>You must wait <b>$kidnap</b> seconds before you can kidnap a policeman!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
else{

$rand = mt_rand(0,9);
$jailtime = $time + 150;
$times = $time + 1000;
mysql_query("UPDATE users SET kidnap = '$times' WHERE ID = '$ida' AND kidnap <= '$time'");
if (mysql_affected_rows()==0) {die(' ');}
$crimes++;
$moneyrand = mt_rand(60000,165000) * 12 * $moneyby;

if($rand == 2){
mysql_query("INSERT INTO jail(username,time,reward)
VALUES ('$gangsterusername','$jailtime','$reward')");

die('<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png>
<font color=white size=1 face=verdana>You got caught! You are now in jail</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>');}

if($rank == '7'){ $update = '1.4';$newrank = 'Assassin';}
elseif($rank == '8'){ $update = '1.4';$newrank = 'Respected Assassin';}
elseif($rank == '9'){ $update = '1.19';$newrank = 'Mafioso';}
elseif($rank == '10'){ $update = '0.899';$newrank = 'Respected Mafioso';}
elseif($rank == '11'){ $update = '0.88';$newrank = 'Underboss';}
elseif($rank == '12'){ $update = '0.867';$newrank = 'Respected Underboss';}
elseif($rank == '13'){ $update = '0.86';$newrank = 'Boss';}
elseif($rank == '14'){ $update = '0.828';$newrank = 'Respected Boss';}
elseif($rank == '15'){ $update = '0.8';$newrank = 'Godfather';}
elseif($rank == '16'){ $update = '0.739';$newrank = 'Respected Godfather';}
elseif($rank == '17'){ $update = '0.667';$newrank = 'Gangster';}
elseif($rank == '18'){ $update = '0.523';$newrank = 'Respected Gangster';}
elseif($rank == '19'){ $update = '0.467';$newrank = 'Don';}
elseif($rank == '20'){ $update = '0.2';$newrank = 'Respected Don';}
elseif($rank == '21'){ $update = '0.09';$newrank = 'Tough Don';}
else{ $update = '0';}

if($rank <= 22){
if(($rankup + $update) > ('100')){
$rank++;
$newrankup = $rankup + $update - 100;
$rankup = $newrankup;
$sendinfo = "You have been promoted to \[b\]$newrank\[\/b\]! Congratulations, you received \[b\]1,000\[\/b\] bullets!";
mysql_query("UPDATE users SET rankid = rankid + 1, rankup = '$newrankup', bullets = bullets + 1000,money = money + $moneyrand WHERE ID = '$ida'");
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$gangsterusername','$gangsterusername','2','$userip','$sendinfo')");
}else{$rankup = $rankup + $update;
mysql_query("UPDATE users SET rankup = rankup + $update WHERE ID = '$ida'");
mysql_query("UPDATE users SET money = money + $moneyrand WHERE ID = '$ida'");}}

$moneyr = number_format($moneyrand);
$kidnaprand = mt_rand(0,32);
if($kidnaprand == '1'){
mysql_query("UPDATE users SET grenades = (grenades + 1) WHERE ID = '$ida'");

$extras = "<br><br><font color=khaki face=verdana size=1><b>You were also able to steal a hand grenade from him!</b></font>";}



echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png>
<font color=white face=verdana size=1>You successfully kidnapped a police officer! And recieved $<b>$moneyr</b> for his return!</font>$extras<br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}}



if(isset($_POST["$robbutton"])){
$moneyrand = mt_rand(15000,80000) * 12 * $moneyby;


if($rank < 5){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png>
<font color=white size=1 face=verdana>You must be at least <b>Mobster</b> before you can rob a shop!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
elseif($rob > '0'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png>
<font color=white size=1 face=verdana>You must wait <b>$rob</b> seconds before you can rob a shop!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
else{
$crimes++;
$rand = mt_rand(0,12);
$jailtime = $time + 120;
$times = $time + 800;
mysql_query("UPDATE users SET rob = '$times' WHERE ID = '$ida' AND rob <= '$time'");
if (mysql_affected_rows()==0) {die(' ');}


if($rand == 1){
mysql_query("INSERT INTO jail(username,time,reward)
VALUES ('$gangsterusername','$jailtime','$reward')");
die('<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png>
<font color=white size=1 face=verdana>You got caught! You are now in jail</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>');}


if($rank == '5'){ $update = '3';$newrank = 'Mobster';}
elseif($rank == '6'){ $update = '1.9';$newrank = 'Respected Mobster';}
elseif($rank == '7'){ $update = '1.95';$newrank = 'Assassin';}
elseif($rank == '8'){ $update = '1.69';$newrank = 'Respected Assassin';}
elseif($rank == '9'){ $update = '1.21';$newrank = 'Mafioso';}
elseif($rank == '10'){ $update = '0.899';$newrank = 'Respected Mafioso';}
elseif($rank == '11'){ $update = '0.84';$newrank = 'Underboss';}
elseif($rank == '12'){ $update = '0.76';$newrank = 'Respected Underboss';}
elseif($rank == '13'){ $update = '0.69';$newrank = 'Boss';}
elseif($rank == '14'){ $update = '0.6';$newrank = 'Respected Boss';}
elseif($rank == '15'){ $update = '0.5';$newrank = 'Godfather';}
elseif($rank == '16'){ $update = '0.49';$newrank = 'Respected Godfather';}
elseif($rank == '17'){ $update = '0.41';$newrank = 'Gangster';}
elseif($rank == '18'){ $update = '0.37';$newrank = 'Respected Gangster';}
elseif($rank == '19'){ $update = '0.29';$newrank = 'Don';}
elseif($rank == '20'){ $update = '0.09';$newrank = 'Respected Don';}
elseif($rank == '21'){ $update = '0.0695';$newrank = 'Tough Don';}
else{ $update = '0';}

if($rank <= 22){
if(($rankup + $update) > ('100')){
$rank++;
$newrankup = $rankup + $update - 100;
$rankup = $newrankup;
$sendinfo = "You have been promoted to \[b\]$newrank\[\/b\]! Congratulations, you received \[b\]1,000\[\/b\] bullets!";
mysql_query("UPDATE users SET rankid = rankid + 1, rankup = '$newrankup', bullets = bullets + 1000,money = money + $moneyrand WHERE ID = '$ida'");
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$gangsterusername','$gangsterusername','2','$userip','$sendinfo')");
}else{
$rankup = $rankup + $update;
mysql_query("UPDATE users SET money = money + $moneyrand WHERE ID = '$ida'");
mysql_query("UPDATE users SET rankup = rankup + $update WHERE ID = '$ida'");}}

$moneyr = number_format($moneyrand);
echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png>
<font color=white face=verdana size=1>You successfully robbed a shop! And got away with $<b>$moneyr</b>!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}}


if(isset($_POST["$mugbutton"])){
if($rank < 3){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png>
<font color=white size=1 face=verdana>You must be at least <b>Wise Guy</b> before you can mug a dealer!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
elseif($mug > '0'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png>
<font color=white size=1 face=verdana>You must wait <b>$mug</b> seconds before you can mug a dealer!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
else{

$rand = mt_rand(0,15);
$jailtime = $time + 65;
$times = $time + 110;

mysql_query("UPDATE users SET mug = '$times' WHERE ID = '$ida' AND mug < '$time'");
if (mysql_affected_rows()==0) {die(' ');}

$crimes++;
$moneyrand = mt_rand(7000,30000) * 12 * $moneyby;

if($rand == 1){
mysql_query("INSERT INTO jail(username,time,reward)
VALUES ('$gangsterusername','$jailtime','$reward')");

die('<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png>
<font color=white size=1 face=verdana>You got caught! You are now in jail</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>');}


if($rank == '3'){ $update = '25.99';$newrank = 'Thug';}
elseif($rank == '4'){ $update = '9.75';$newrank = 'Respected Thug';}
elseif($rank == '5'){ $update = '2.99';$newrank = 'Mobster';}
elseif($rank == '6'){ $update = '2.75';$newrank = 'Respected Mobster';}
elseif($rank == '7'){ $update = '1.95';$newrank = 'Assassin';}
elseif($rank == '8'){ $update = '0.86';$newrank = 'Respected Assassin';}
elseif($rank == '9'){ $update = '0.78';$newrank = 'Mafioso';}
elseif($rank == '10'){ $update = '0.699';$newrank = 'Respected Mafioso';}
elseif($rank == '11'){ $update = '0.55';$newrank = 'Underboss';}
elseif($rank == '12'){ $update = '0.4';$newrank = 'Respected Underboss';}
elseif($rank == '13'){ $update = '0.39';$newrank = 'Boss';}
elseif($rank == '14'){ $update = '0.36';$newrank = 'Respected Boss';}
elseif($rank == '15'){ $update = '0.34';$newrank = 'Godfather';}
elseif($rank == '16'){ $update = '0.34';$newrank = 'Respected Godfather';}
elseif($rank == '17'){ $update = '0.31';$newrank = 'Gangster';}
elseif($rank == '18'){ $update = '0.23';$newrank = 'Respected Gangster';}
elseif($rank == '19'){ $update = '0.1';$newrank = 'Don';}
elseif($rank == '20'){ $update = '0.09';$newrank = 'Respected Don';}
elseif($rank == '21'){ $update = '0.0795';$newrank = 'Tough Don';}
else{ $update = '0';}

if($rank <= 22){
if(($rankup + $update) > ('100')){
$rank++;
$newrankup = $rankup + $update - 100;
$rankup = $newrankup;
$sendinfo = "You have been promoted to \[b\]$newrank\[\/b\]! Congratulations, you received \[b\]1,000\[\/b\] bullets!";
mysql_query("UPDATE users SET rankid = (rankid + 1), rankup = '$newrankup', bullets = (bullets + 1000) ,money = (money + $moneyrand) WHERE ID = '$ida'");
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$gangsterusername','$gangsterusername','2','$userip','$sendinfo')");
}else{
$rankup = $rankup + $update;
mysql_query("UPDATE users SET money = (money + $moneyrand) WHERE ID = '$ida'");
mysql_query("UPDATE users SET rankup = (rankup + $update) WHERE ID = '$ida'");}}


$moneyr = number_format($moneyrand);
echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png>
<font color=white face=verdana size=1>You successfully mugged a dealer! And got away with $<b>$moneyr</b>!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}}



if(isset($_POST["$hustlebutton"])){
if($rank < 1){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png>
<font color=white size=1 face=verdana>You must be at least <b>Citizen</b> before you can hustle somebody!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
elseif($hustle > '0'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png>
<font color=white size=1 face=verdana>You must wait <b>$hustle</b> seconds before you can hustle somebody!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
else{
$rand = mt_rand(0,16);
$jailtime = $time + 20;
$times = $time + 40;

mysql_query("UPDATE users SET hustle = '$times' WHERE ID = '$ida' AND hustle <= '$time'");
if (mysql_affected_rows()==0) {die(' ');}
$crimes++;
$moneyrand = mt_rand(3000,13000) * 12 * $moneyby;

if($rand == 1){
mysql_query("INSERT INTO jail(username,time,reward)
VALUES ('$gangsterusername','$jailtime','$reward')");

die('<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png>
<font color=white size=1 face=verdana>You got caught! You are now in jail</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>');}


if($rank == '2'){ $update = '12';$newrank = 'Wise Guy';}
elseif($rank == '3'){ $update = '8';$newrank = 'Thug';}
elseif($rank == '4'){ $update = '4';$newrank = 'Respected Thug';}
elseif($rank == '5'){ $update = '2.6';$newrank = 'Mobster';}
elseif($rank == '6'){ $update = '2.35';$newrank = 'Respected Mobster';}
elseif($rank == '7'){ $update = '1.55';$newrank = 'Assassin';}
elseif($rank == '8'){ $update = '0.73';$newrank = 'Respected Assassin';}
elseif($rank == '9'){ $update = '0.59';$newrank = 'Mafioso';}
elseif($rank == '10'){ $update = '0.48';$newrank = 'Respected Mafioso';}
elseif($rank == '11'){ $update = '0.37';$newrank = 'Underboss';}
elseif($rank == '12'){ $update = '0.29';$newrank = 'Respected Underboss';}
elseif($rank == '13'){ $update = '0.24';$newrank = 'Boss';}
elseif($rank == '14'){ $update = '0.2';$newrank = 'Respected Boss';}
elseif($rank == '15'){ $update = '0.14';$newrank = 'Godfather';}
elseif($rank == '16'){ $update = '0.1';$newrank = 'Respected Godfather';}
elseif($rank == '17'){ $update = '0.09';$newrank = 'Gangster';}
elseif($rank == '18'){ $update = '0.09';$newrank = 'Respected Gangster';}
elseif($rank == '19'){ $update = '0.05';$newrank = 'Don';}
elseif($rank == '20'){ $update = '0.035';$newrank = 'Respected Don';}
elseif($rank == '21'){ $update = '0.015';$newrank = 'Tough Don';}
else{ $update = '0';}

if($rank <= 22){
if(($rankup + $update) > ('100')){
$rank++;
$newrankup = $rankup + $update - 100;
$rankup = $newrankup;

if($newrank == 'Citizen'){$sendinfo = "You have been promoted to \[b\]$newrank\[\/b\]! Congratulations, you received \[b\]1,000\[\/b\] bullets!\[br\]\[br\]The more you rank up, the more crimes you can commit which make you ALOT more money!";mysql_query("UPDATE users SET mail = (mail + 1) WHERE ID = '$ida'");}else{
$sendinfo = "You have been promoted to \[b\]$newrank\[\/b\]! Congratulations, you received \[b\]1,000\[\/b\] bullets!";}



mysql_query("UPDATE users SET rankid = rankid + 1, rankup = '$newrankup', bullets = bullets + 1000,money = money + $moneyrand WHERE ID = '$ida'");
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$gangsterusername','$gangsterusername','1','$userip','$sendinfo')");
}else{
$rankup = $rankup + $update;
mysql_query("UPDATE users SET money = money + $moneyrand WHERE ID = '$ida'");
mysql_query("UPDATE users SET rankup = rankup + $update WHERE ID = '$ida'");}}


$moneyr = number_format($moneyrand);
echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png>
<font color=white face=verdana size=1>You successfully hustled the streets! And made $<b>$moneyr</b>!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}}


if(isset($_POST["$begbutton"])){
if($rank < 1){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png>
<font color=white size=1 face=verdana>You must be at least <b>Tramp</b> before you can beg on the streets!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
elseif($beg > '0'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png>
<font color=white size=1 face=verdana>You must wait <b>$beg</b> seconds before you can beg on the streets!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
else{

$rand = mt_rand(0,20);
$jailtime = $time + 15;
$times = $time + 20;
mysql_query("UPDATE users SET beg = '$times' WHERE ID = '$ida' AND beg <= '$time'");
if (mysql_affected_rows()==0) {die(' ');}
$crimes++;
$moneyrand = mt_rand(1000,3500) * 12 * $moneyby;

if($rand == 1){
mysql_query("INSERT INTO jail(username,time,reward)
VALUES ('$gangsterusername','$jailtime','$reward')");

die('<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png>
<font color=white size=1 face=verdana>You got caught! You are now in jail</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>');}

if($rank == '1'){ $update = '101';$newrank = 'Citizen';}
elseif($rank == '2'){ $update = '15';$newrank = 'Wise Guy';}
elseif($rank == '3'){ $update = '8.9';$newrank = 'Thug';}
elseif($rank == '4'){ $update = '5.75';$newrank = 'Respected Thug';}
elseif($rank == '5'){ $update = '2.69';$newrank = 'Mobster';}
elseif($rank == '6'){ $update = '2.3';$newrank = 'Respected Mobster';}
elseif($rank == '7'){ $update = '1.7';$newrank = 'Assassin';}
elseif($rank == '8'){ $update = '0.9';$newrank = 'Respected Assassin';}
elseif($rank == '9'){ $update = '0.65';$newrank = 'Mafioso';}
elseif($rank == '10'){ $update = '0.55';$newrank = 'Respected Mafioso';}
elseif($rank == '11'){ $update = '0.4';$newrank = 'Underboss';}
elseif($rank == '12'){ $update = '0.3';$newrank = 'Respected Underboss';}
elseif($rank == '13'){ $update = '0.23';$newrank = 'Boss';}
elseif($rank == '14'){ $update = '0.17';$newrank = 'Respected Boss';}
elseif($rank == '15'){ $update = '0.1';$newrank = 'Godfather';}
elseif($rank == '16'){ $update = '0.08';$newrank = 'Respected Godfather';}
elseif($rank == '17'){ $update = '0.048';$newrank = 'Gangster';}
elseif($rank == '18'){ $update = '0.039';$newrank = 'Respected Gangster';}
elseif($rank == '19'){ $update = '0.023';$newrank = 'Don';}
elseif($rank == '20'){ $update = '0.022';$newrank = 'Respected Don';}
elseif($rank == '21'){ $update = '0.013';$newrank = 'Tough Don';}

else{ $update = '0';}

if($rank <= 22){
if(($rankup + $update) > ('100')){
$rank++;
$newrankup = $rankup + $update - 100;
$rankup = $newrankup;
if($newrank == 'Citizen'){$sendinfo = "You have been promoted to \[b\]$newrank\[\/b\]! Congratulations, you received \[b\]1,000\[\/b\] bullets!\[br\]\[br\]The more you rank up, the more crimes you can commit which make you ALOT more money!";mysql_query("UPDATE users SET mail = (mail + 1) WHERE ID = '$ida'");}else{
$sendinfo = "You have been promoted to \[b\]$newrank\[\/b\]! Congratulations, you received \[b\]1,000\[\/b\] bullets!";}
mysql_query("UPDATE users SET rankid = rankid + 1, rankup = '$newrankup', bullets = bullets + 1000,money = (money + $moneyrand) WHERE ID = '$ida'");
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$gangsterusername','$gangsterusername','1','$userip','$sendinfo')");
}else{$rankup = $rankup + $update;
mysql_query("UPDATE users SET money = (money + $moneyrand) WHERE ID = '$ida'");
mysql_query("UPDATE users SET rankup = (rankup + $update) WHERE ID = '$ida'");}}


$moneyr = number_format($moneyrand);
echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png>
<font color=white face=verdana size=1>You successfully begged on the streets! And made $<b>$moneyr</b>!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}}


$statustest = mysql_query("SELECT * FROM users WHERE ID = '$ida'");
$getuserinfoarray = mysql_fetch_array($statustest);

$kidnapraw = $getuserinfoarray['kidnap'];
$mugraw = $getuserinfoarray['mug'];
$stealfromraw = $getuserinfoarray['stealfrom'];
$stealbulletsraw = $getuserinfoarray['stealbullets'];
$robraw = $getuserinfoarray['rob'];
$hustleraw = $getuserinfoarray['hustle'];
$begraw = $getuserinfoarray['beg'];



$kidnap = $kidnapraw - $time;
$mug = $mugraw - $time;
$stealfrom = $stealfromraw - $time;
$stealbullets = $stealbulletsraw - $time;
$rob = $robraw - $time;
$hustle = $hustleraw - $time;
$beg = $begraw - $time;
$width = rand(5,6);
$wid = 100 - $width;

?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Crimes </font></b></center></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<br>
<form id=crimes method="post">
<input type=hidden value=<?echo$check;?> name=99vete><br>
<table cellpadding="0" cellspacing="0" width="100%"><tr><td width="<? echo $width;?>%"></td><td width="<?echo$wid;?>%">
<label  style="cursor: pointer;"><input type=checkbox value=7 name=<? echo $stealbulletsbutton; ?> <?if($getid == '1'){echo"CHECKED";}?>><? if($rank < 10){echo"<font color=white face=verdana size=1>&nbsp;Time left before you can raid a gun store: </font><font color=666666 face=verdana size=1>You need to rank to Mafioso to do this!</font>";}else{if($stealbullets <= 0){echo"<font color=white face=verdana size=1>&nbsp;Time left before you can raid a gun store: </font><font color=red face=verdana size=1><b>Available</b></font>";}else{echo"<font color=white face=verdana size=1>&nbsp;Time left before you can raid a gun store: </font><font color=white face=verdana size=1>$stealbullets seconds </font>";}}?></label><br>

<label  style="cursor: pointer;"><input type=checkbox value=6 name=<? echo $stealfrombutton; ?> <?if($getid == '1'){echo"CHECKED";}?>><? if($rank < 9){echo"<font color=white face=verdana size=1>&nbsp;Time left before you can steal cash: </font><font color=666666 face=verdana size=1>You need to rank to Respected Assassin to do this!</font>";}else{if($stealfrom <= 0){echo"<font color=white face=verdana size=1>&nbsp;Time left before you can steal cash: </font><font color=red face=verdana size=1><b>Available</b></font>";}else{echo"<font color=white face=verdana size=1>&nbsp;Time left before you can steal cash: </font><font color=white face=verdana size=1>$stealfrom seconds </font>";}}?></label><br>

<label  style="cursor: pointer;"><input type=checkbox value=5 name=<? echo $kidnapbutton;?> <?if($getid == '1'){echo"CHECKED";}?>><? if($rank < 7){echo"<font color=white face=verdana size=1>&nbsp;Time left before you can kidnap a police officer: </font><font color=666666 face=verdana size=1>You need to rank to Respected Mobster to do this!</font>";}else{if($kidnap <= 0){echo"<font color=white face=verdana size=1>&nbsp;Time left before you can kidnap a police officer: </font><font color=red face=verdana size=1><b>Available</b></font>";}else{echo"<font color=white face=verdana size=1>&nbsp;Time left before you can kidnap a police officer: </font><font color=white face=verdana size=1>$kidnap seconds </font>";}}?></label><br>

<label  style="cursor: pointer;"><input type=checkbox value=4 name=<? echo $robbutton;?> <?if($getid == '1'){echo"CHECKED";}?>><? if($rank < 5){echo"<font color=white face=verdana size=1>&nbsp;Time left before you can rob a shop: </font><font color=666666 face=verdana size=1>You need to rank to Mobster to do this!</font>";}else{if($rob <= 0){echo"<font color=white face=verdana size=1>&nbsp;Time left before you can rob a shop: </font><font color=red face=verdana size=1><b>Available</b></font>";}else{echo"<font color=white face=verdana size=1>&nbsp;Time left before you can rob a shop: </font><font color=white face=verdana size=1>$rob seconds </font>";}}?></label><br>

<label  style="cursor: pointer;"><input type=checkbox value=3 name=<? echo $mugbutton; ?> <?if($getid == '1'){echo"CHECKED";}?>><? if($rank < 3){echo"<font color=white face=verdana size=1>&nbsp;Time left before you can mug a dealer: </font><font color=666666 face=verdana size=1>You need to rank to Citizen do this!</font>";}else{if($mug <= 0){echo"<font color=white face=verdana size=1>&nbsp;Time left before you can mug a dealer: </font><font color=red face=verdana size=1><b>Available</b></font>";}else{echo"<font color=white face=verdana size=1>&nbsp;Time left before you can mug a dealer: </font><font color=white face=verdana size=1>$mug seconds </font>";}}?></label><br>

<label  style="cursor: pointer;"><input type=checkbox value=2 name=<? echo $hustlebutton;?> <?if($getid == '1'){echo"CHECKED";}?>><? if($rank < 1){echo"<font color=white face=verdana size=1>&nbsp;Time left before you can hustle somebody: </font><font color=666666 face=verdana size=1>You need to rank to Citizen to do this!</font>";}else{if($hustle <= 0){echo"<font color=white face=verdana size=1>&nbsp;Time left before you can hustle somebody: </font><font color=red face=verdana size=1><b>Available</b></font>";}else{echo"<font color=white face=verdana size=1>&nbsp;Time left before you can hustle somebody: </font><font color=white face=verdana size=1>$hustle seconds </font>";}}?></label><br>
<label  style="cursor: pointer;"><input type=checkbox id=1 name=<? echo $begbutton; ?> <?if($getid == '1'){echo"CHECKED";}?>><? if($rank < 1){echo"<font color=white face=verdana size=1>&nbsp;Time left before you can beg on the streets: </font><font color=red face=verdana size=1><b>Unavailable</b></font>";}else{if($beg <= 0){echo"<font color=white face=verdana size=1>&nbsp;Time left before you can beg on the streets: </font><font color=red face=verdana size=1><b>Available</b></font>";}else{echo"<font color=white face=verdana size=1>&nbsp;Time left before you can beg on the streets: </font><font color=white face=verdana size=1><span id=crimesevens>$beg seconds </font></span>";}}?></label><br><table cellpadding=0>
<? $mtr = mt_rand(0,50000000);  if($input == '1'){echo"<tr><td><input type=textbox name=ver onclick=this.value='';   style=width:111; value=' Enter code..' class=textbox></td><td><img src=vercode1.php?id=$ID&hi=$mtr></td></tr>";}?><tr><td <?if($input == '1'){echo'colspan=2';}?>><input type=submit name=commit class=textbox value="Commit crimes"></td></tr></table><br>
<a onclick='checkAll();' style="cursor: pointer; cursor: hand;">Check / Uncheck all crimes</a></td></tr></form></table><br>
<table width="98%" cellpadding="0" cellspacing="0" align="center"><tr><td height="1" bgcolor="#444444"></td></tr><tr><td height="3"></td></tr><tr><td align=right><font color=white face=verdana size=1>Hottest location: </font><font color=#E41B17 face=verdana size=1><b><?echo$gethot;?></b></font><font color=white face=verdana size=1> / Coldest location: </font><font color=999999 face=verdana size=1><b><?echo$getcold;?> </b></font><a href=# onclick="alert('Hottest location - If you are located here the crime payout is higher than usual, cold is opposite to this. (Locations subject to change every few hours)');">(<font color=white>?</font>)</a></td></tr><tr><td height="3"></td></tr></table>

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
<?
$statustesttwo = $getuserinfoarray;?>
<td width="250" valign="top">
<? include 'rightmenu.php'; ?>
</td>
</tr>
</table>

</body></html>