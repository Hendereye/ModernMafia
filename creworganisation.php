<? include 'included.php'; ?>

<html>
<head>
<link rel="stylesheet" href="more/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="shortcut icon" href="/more/icon.png" type="image/x-icon" />
</head>
<body background="/more/bgtest.png">
<script type="text/javascript">
function emotion(em) { document.smiley.topicinfo.value=document.smiley.topicinfo.value+em;}
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
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$gangsterusername = $usernameone;

$playeridraw = mysql_real_escape_string($_POST['select']);
$giveraw = mysql_real_escape_string($_POST['give']);
$givecashraw = mysql_real_escape_string($_POST['cash']);
$perca = mysql_real_escape_string($_POST['perc']);
$playerid = preg_replace($saturated,"",$playeridraw);
$perc = preg_replace($saturated,"",$perca);
$give = preg_replace($saturated,"",$giveraw);
$givecash = preg_replace($saturated,"",$givecashraw);
$givea = number_format($give);
$givecasha = number_format($givecash);
$renameraw = mysql_real_escape_string($_POST['change']);
$applyidraw = mysql_real_escape_string($_POST['apply']);
$applyid = preg_replace($saturated,"",$applyidraw);
$rename = htmlentities($renameraw, ENT_QUOTES);

$createcheckrows = $crewboss;



$getinfoarray = $statustesttwo;
$getcrewid = $getinfoarray['crewid'];
$getname = $getinfoarray['username'];
$getrank = $getinfoarray['rankid'];
$getmoney = $getinfoarray['money'];
$getid = $getinfoarray['ID'];

$crewbosscheck = mysql_query("SELECT * FROM crews WHERE boss = '$getname'");
$crewbosscheckrows = $crewboss;
if($crewbosscheckrows == 0){die('<font color=white size=1 face=verdana>Your not a crewboss!</font>');}


if(isset($_POST['doperc'])){
if($perc <= '0'){ }
elseif($perc > '50'){echo"<font color=white face=verdana size=1>Max (50%)!</font>";}
elseif($perc < '10'){echo"<font color=white face=verdana size=1>Min (10%)!</font>";}
else{
mysql_query("UPDATE crews SET melt = '$perc' WHERE boss = '$getname'");
echo"<font color=white size=1 face=verdana>Melting percentage changed!</font>";}

}



$crewinfoarray = mysql_fetch_array($crewbosscheck);
$crewbullets = $crewinfoarray['bullets'];
$crewbank = $crewinfoarray['cash'];
$melt = $crewinfoarray['melt'];






if(isset($_POST['kickdead'])){

$getdeadall = mysql_num_rows(mysql_query("SELECT * FROM users WHERE crewid = '$getcrewid' AND status = 'Dead'"));
mysql_query("UPDATE crews SET members = (members - $getdeadall) WHERE id = '$getcrewid'");

mysql_query("UPDATE users SET crewid = '0' WHERE crewid = '$getcrewid' AND status = 'Dead'");
echo"<a href=viewprofile.php?username=$checkifname><font color=white size=1 face=verdana>You kicked all your dead members</font>";}




if($playerid){

$checkif = mysql_query("SELECT * FROM users WHERE ID = '$playerid'");
$checkifrows = mysql_num_rows($checkif);
$checkifarray = mysql_fetch_array($checkif);
$checkifcrew = $checkifarray['crewid'];
$checkifname = $checkifarray['username'];
$checkifstatus = $checkifarray['status'];
$checkrecruiterrows = $checkifarray['rr'];
$checkid = $checkifarray['ID'];
}

if(isset($_POST['recruiter'])){
if(!$playerid){ }
elseif($checkifcrew != $getcrewid){echo"<font color=white face=verdana size=1>That person is not in your crew";}
elseif($checkrecruiterrows > '0'){echo"<font color=white face=verdana size=1>That player is already a recruiter!</font>";}
else{
mysql_query("UPDATE users SET rr = '1' WHERE ID = '$checkid'");
echo"<a href=viewprofile.php?username=$checkifname><font color=white size=1 face=verdana><b>$checkifname</b></a> is now a recruiter!</font>";}}


elseif(isset($_POST['undorecruiter'])){
if(!$playerid){ }
elseif($checkifcrew != $getcrewid){echo"<font color=white face=verdana size=1>That person is not in your crew";}
elseif($checkrecruiterrows == '0'){echo"<font color=white face=verdana size=1>That player is not a recruiter!</font>";}
else{mysql_query("UPDATE users SET rr = '0' WHERE ID = '$checkid'");
echo"<a href=viewprofile.php?username=$checkifname><font color=white size=1 face=verdana><b>$checkifname</b></a> is no longer a recruiter!</font>";}}

elseif(isset($_POST['kick'])){
if(!$playerid){ }
elseif($playerid == $getid){echo"<font color=white face=verdana size=1>You cannot kick the crewboss</font>";}
elseif($checkifcrew != $getcrewid){echo"<font color=white face=verdana size=1>That person is not in your crew";}
else{
mysql_query("UPDATE users SET crewid = '0' WHERE ID = '$playerid' AND crewid != '0'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 1.</font>');}
mysql_query("UPDATE crews SET members = (members - 1) WHERE id = '$getcrewid'");
mysql_query("DELETE FROM recruiters WHERE username = '$checkifname'");mysql_query("UPDATE users SET rr = '0' WHERE ID = '$checkid'");

echo"<font color=white size=1 face=verdana>You kicked </font><a href=viewprofile.php?username=$checkifname><font color=white size=1 face=verdana><b>$checkifname</b></a> from your crew!</font>";}}

elseif(isset($_POST['sendcrew'])){
if(!$playerid){ }
elseif($playerid == $getid){echo"<font color=white face=verdana size=1>You're already the crew boss!</font>";}
elseif($checkifcrew != $getcrewid){echo"<font color=white face=verdana size=1>That person is not in your crew";}
elseif($checkifstatus == 'Dead'){echo"<font color=white face=verdana size=1>You cannot give the crew to a dead player";}
else{mysql_query("UPDATE crews SET boss = '$checkifname' WHERE id = '$getcrewid' AND boss = '$gangsterusername'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 2.</font>');}
echo"<font color=white size=1 face=verdana>You gave the crew to</font><a href=viewprofile.php?username=$checkifname><font color=white size=1 face=verdana><b> $checkifname</b></a>!</font>";}}

elseif((isset($_POST['give'])) &&($give > '0')){
if((!$playerid)||(!$give)){ }
elseif($checkifcrew != $getcrewid){echo"<font color=white face=verdana size=1>That person is not in your crew";}
elseif($give > $crewbullets){echo"<font color=white face=verdana size=1>You dont have that many crew bullets";}
else{
mysql_query("UPDATE crews SET bullets = bullets - $give WHERE id = '$getcrewid' AND bullets >= '$give'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 3.</font>');}
mysql_query("UPDATE users SET bullets = bullets + '$give' WHERE ID = '$checkid'");

echo"<font color=white size=1 face=verdana>You gave $givea bullets to</font><a href=viewprofile.php?username=$checkifname><font color=white size=1 face=verdana><b> $checkifname</b></a>!</font>";}}

elseif((isset($_POST['cash']))&&($givecash > '0')){
if((!$playerid)||(!$givecash)){}
elseif($checkifcrew != $getcrewid){echo"<font color=white face=verdana size=1>That person is not in your crew";}
elseif($givecash > $crewbank){echo"<font color=white face=verdana size=1>You dont have that much in your crew bank";}
else{
mysql_query("UPDATE crews SET cash = cash - '$givecash' WHERE id = '$getcrewid' AND cash >= '$givecash'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 4.</font>');}

mysql_query("UPDATE users SET money = money + '$givecash' WHERE ID = '$checkid'");

echo"<font color=white size=1 face=verdana>You gave $$givecasha to</font><a href=viewprofile.php?username=$checkifname><font color=white size=1 face=verdana><b> $checkifname</b></a>!</font>";
mysql_query("UPDATE users SET crewd = '0' WHERE crewid = '$getcrewid'");}}


$crewusersinfosql = mysql_query("SELECT username,rankid,bullets,status,gun,protection,ID,rr,ent,activity FROM users WHERE crewid = '$getcrewid' ORDER BY rankid DESC");



?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Crew organisation</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png"><br>
<table width=5% cellpadding="0" cellspacing="1" align="center">
<tr><td bgcolor=gray NOWRAP></td>
<td bgcolor=gray NOWRAP><font color=#222222 size=1 face=verdana><center><b>Username&nbsp;</b></center></font></td>
<td bgcolor=gray NOWRAP><font color=#222222 size=1 face=verdana><center><b>Rank&nbsp;</b></center></font></td><td bgcolor=gray NOWRAP><font color=#222222 size=1 face=verdana><center><b>Bullets&nbsp;</b></center></font></td><td bgcolor=gray NOWRAP><font color=#222222 size=1 face=verdana><center><b>Gun&nbsp;</b></center></font></td><td bgcolor=gray NOWRAP><font color=#222222 size=1 face=verdana><center><b>Protection&nbsp;</b></center></font></td><td bgcolor=gray NOWRAP><font color=#222222 size=1 face=verdana><center><b>Recruiter&nbsp;</b></center></font></td></tr>
<form action="" method="post">
<? 
while($crewusersinfoarray = mysql_fetch_array($crewusersinfosql)){
$crewusername = $crewusersinfoarray['username'];
$crewuserrank = $crewusersinfoarray['rankid'];
$crewuserstatus = $crewusersinfoarray['status'];
$crewusergun = $crewusersinfoarray['gun'];
$crewuserpro = $crewusersinfoarray['protection'];
$activity = $crewusersinfoarray['activity'];
$buls = number_format($crewusersinfoarray['bullets']);
$crewuserid = $crewusersinfoarray['ID'];$ents= $crewusersinfoarray['ent'];



if($crewuserstatus == 'Dead')
{$colorone = 'maroon'; $colortwo = 'black';}
else{$colorone = '#222222'; $colortwo = 'white';}

if($crewusergun == '0'){ $crewgun = 'None';}
elseif($crewusergun == '1'){ $crewgun = 'Air Rifle';}
elseif($crewusergun == '2'){ $crewgun = 'Colt 1911 .45 auto';}
elseif($crewusergun == '3'){ $crewgun = 'M9 Beretta 9mm Pistol';}
elseif($crewusergun == '4'){ $crewgun = 'Bren Ten 10mm';}
elseif($crewusergun == '5'){ $crewgun = 'M21 sniper rifle';}
elseif($crewusergun == '6'){ $crewgun = 'AK - 47';}
elseif($crewusergun == '7'){ $crewgun = 'Marui M4';}
elseif($crewusergun == '8'){ $crewgun = '7.62-mm SVD DRAGUNOV';}
elseif($crewusergun == '9'){ $crewgun = 'FN F2000 Assault Rifle';}
elseif($crewusergun == '10'){$crewgun = 'M249 Para SAW';}
else{$crewgun = 'Error, please contact the administrator immediately';}

if($crewuserpro == '1'){ $crewpro = 'None';}
elseif($crewuserpro == '2'){ $crewpro = 'Modular Tactical Assault Vest';}
elseif($crewuserpro == '3'){ $crewpro = 'Overt Tactical Vest';}
elseif($crewuserpro == '4'){ $crewpro = 'Light Infantry Vest';}
elseif($crewuserpro == '5'){ $crewpro = 'Infantry Battle Assault Vest';}
elseif($crewuserpro == '6'){ $crewpro = 'LBA 305 Military Vest';}
elseif($crewuserpro == '7'){ $crewpro = 'FBI Tactical vest';}
elseif($crewuserpro == '8'){ $crewpro = 'SWAT Tactical vest';}
elseif($crewuserpro == '9'){ $crewpro = 'Heavy Military Vest';}
else{$crewpro = 'Error, please contact the administrator immediately';}



$etests = $ents;

if($etests > '0'){$crewrank = 'Entertainer';}
elseif($crewuserrank == '1'){ $crewrank = 'Tramp';}
elseif($crewuserrank == '2'){ $crewrank = 'Citizen';}
elseif($crewuserrank == '3'){ $crewrank = 'Wise Guy';}
elseif($crewuserrank == '4'){ $crewrank = 'Thug';}
elseif($crewuserrank == '5'){ $crewrank = 'Respected Thug';}
elseif($crewuserrank == '6'){ $crewrank = 'Mobster';}
elseif($crewuserrank == '7'){ $crewrank = 'Respected Mobster';}
elseif($crewuserrank == '8'){ $crewrank = 'Assassin';}
elseif($crewuserrank == '9'){ $crewrank = 'Respected Assassin';}
elseif($crewuserrank == '10'){ $crewrank = 'Mafioso';}
elseif($crewuserrank == '11'){ $crewrank = 'Respected Mafioso';}
elseif($crewuserrank == '12'){ $crewrank = 'Underboss';}
elseif($crewuserrank == '13'){ $crewrank = 'Respected Underboss';}
elseif($crewuserrank == '14'){ $crewrank = 'Boss';}
elseif($crewuserrank == '15'){ $crewrank = 'Respected Boss';}
elseif($crewuserrank == '16'){ $crewrank = 'Godfather';}
elseif($crewuserrank == '17'){ $crewrank = 'Respected Godfather';}
elseif($crewuserrank == '18'){ $crewrank = 'Gangster';}
elseif($crewuserrank == '19'){ $crewrank = 'Respected Gangster';}
elseif($crewuserrank == '20'){ $crewrank = 'Don';}
elseif($crewuserrank == '21'){ $crewrank = 'Respected Don';}
elseif($crewuserrank == '22'){ $crewrank = 'Tough Don';}
elseif($crewuserrank == '25'){ $crewrank = 'Entertainer Manager';}
elseif($crewuserrank == '50'){ $crewrank = 'Moderator';}
elseif($crewuserrank == '75'){ $crewrank = 'HDO Manager';}
elseif($crewuserrank == '100'){ $crewrank = 'Administrator';}
else{$crewrank = 'Error, please contact the administrator immediately';}
$etests = 0;
$rrightsrows = $crewusersinfoarray['rr'];

if($rrightsrows > '0'){$colorthree = "#617C58";}else{$colorthree = "$colorone";}

echo"<tr><td bgcolor=$colorone NOWRAP><input type=radio value=$crewuserid name=select></td><td bgcolor=$colorone NOWRAP><b><a href=viewprofile.php?username=$crewusername>&nbsp;$crewusername&nbsp;</a></b></td>
<td bgcolor=$colorone NOWRAP><font color=silver size=1 face=verdana>&nbsp;$crewrank&nbsp;</font></td><td bgcolor=$colorone NOWRAP><font color=silver size=1 face=verdana>&nbsp;$buls&nbsp;</font></td><td bgcolor=$colorone NOWRAP><font color=silver size=1 face=verdana>&nbsp;$crewgun&nbsp;</font></td><td bgcolor=$colorone NOWRAP><font color=silver size=1 face=verdana>&nbsp;$crewpro&nbsp;</font></td><td bgcolor=$colorthree NOWRAP></td></tr>";}?>
</table>
<center><br><br><input type="submit" value="Kick" class="textbox" name="kick"><input type="submit" value="Make recruiter" class="textbox" name="recruiter"><input type="submit" value="Remove recruiting rights" class="textbox" name="undorecruiter"><input type="submit" value="Send crew" class="textbox" name="sendcrew"><input type="submit" value="Kick Dead Member" class="textbox" name="kickdead"><br><br><font color=silver size=1 face=verdana><b>Crew bullets:</font><font color=white size=1 face=verdana> <? echo number_format($crewbullets); ?></b></font><br><input type="text" class="textbox" name="give"><input type="submit" value="Give bullets" class="textbox" name="dogive"><br><br><font color=silver size=1 face=verdana><b>Crew bank:</font><font color=white size=1 face=verdana> $<? echo number_format($crewbank); ?></b></font><br><input type="text" class="textbox" name="cash"><input type="submit" value="Give cash" class="textbox" name="docash">
</form>
<form method=post><br>
<font color=white size=1 face=verdana>How much bullet percent should your crew member give when melting (Max 50%, Min 10%):</font><br><input type="text" class="textbox" name="perc" value="<?echo$melt;?>"><font color=white size=1 face=verdana>%</font><input type="submit" value="Set" class="textbox" name="doperc"></form>
<br><br><font color=silver face=verdana size=1>When you give money out the crew bank to a user,<br>all the crew members that have added cash to the bank,<br>will have the amount theyve donated reset to 0.</font></b>
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