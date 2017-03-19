<? include 'included.php'; 

$reward = $statustesttwo['reward'];
$money = $statustesttwo['money'];
if($reward > $money){ 
mysql_query("UPDATE users SET reward = '0' WHERE ID = '$ida'");
mysql_query("UPDATE jail SET reward = '0' WHERE username = '$usernameone'");}


$tyn = rand(0,10);
if($tyn == '3'){
$deletetopicssql = mysql_query("SELECT id FROM forumposts WHERE type = 'jail' ORDER BY id DESC LIMIT 10,50");
while($deletetopics = mysql_fetch_array($deletetopicssql))
{$dtopicid = $deletetopics['id'];
$deleted = mysql_query("DELETE FROM forumposts WHERE id = '$dtopicid'");}}

?>
<html>
<head>
<title>Mafia Society</title><link rel="stylesheet" href="more/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="shortcut icon" href="/more/icon.png" type="image/x-icon" />
</head>
<body background="/more/bgtest.png" onload='ajaxFunction();'>
<script type="text/javascript">
function emotion(em) { document.smiley.newpost.value=document.smiley.newpost.value+em;}



function ajaxFunction(){
	var ajaxRequest;  
	try{ajaxRequest = new XMLHttpRequest();} catch (e){
        try{ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");} catch (e) {
	try{ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");} catch (e){

alert("Your browser broke!");return false;}}}
	
var strhehe = "&rand="+Math.random();
	ajaxRequest.open("GET", "jailto.php?id=" + strhehe, true);
        ajaxRequest.send(null); 
        ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){document.getElementById("autojail").innerHTML = ajaxRequest.responseText;}}



      setTimeout("ajaxFunction()",5000);}
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
$allowed = "/[^0-9]/i";
$time = time();
$sessionidraw = $_COOKIE['PHPSESSID'];
$setrewarda = mysql_real_escape_string($_POST['reward']);
$getforma = $_GET['deletejail'];
$vera = mysql_real_escape_string($_POST['ver']);
$verpost = preg_replace($saturate,"",$vera);
$poster = $_GET['deletepost'];
$bustbutton = ceil($time / 50);
$bustraw = mysql_real_escape_string($_POST["$bustbutton"]);
$sessionid = preg_replace($saturate,"",$sessionidraw);
$setreward = preg_replace($allowed,"",$setrewarda);
$deletepost = preg_replace($allowed,"",$poster);
$getform = preg_replace($allowed,"",$getforma);
$bust = preg_replace($allowed,"",$bustraw);
$userip = $_SERVER[REMOTE_ADDR]; 


$gangsterusername = $usernameone;

$getuserinfoarray = $statustesttwo;
$getname = $gangsterusername;
$getmoney = $getuserinfoarray['money'];
$getreward = $getuserinfoarray['reward'];
$bustss = $getuserinfoarray['jailbusts'];
$failed = $getuserinfoarray['failedbusts'];
$rankid = $getuserinfoarray['rankid'];
$getrewarda = number_format($getreward);
$rank = $getuserinfoarray['rankid'];
$joint = $getuserinfoarray['joint'];
$now = $getuserinfoarray['now'];
$ver = $getuserinfoarray['ver1'];
$jailrand = $getuserinfoarray['jailrand'];


$inputrand = mt_rand(0,35);
if($inputrand == '0'){$newinput = 1;}

if(isset($_POST["$bustbutton"])){

if($jailrand == '1'){

if(strtoupper($verpost) != $ver){die('<font color=white face=verdana size=1>Error, security code incorrect</font>');}
else{$alphanum = "ABCDEFGHIJKLMNPQRSTUVWXYZ123456789";$randver = substr(str_shuffle($alphanum), 0, 1);mysql_query("UPDATE users SET ver1 = '$randver' WHERE ID = '$ida'");}}

mysql_query("UPDATE users SET jailrand = '$newinput' WHERE ID = '$ida'");}








$busts= $bustss + $failed;

if($bustss > '0'){

$total = floor($bustss / $busts * 100);}
else{$total = 0;}

$jailtest = mysql_query("SELECT username FROM jail WHERE username = '$getname'");
$jailtester = mysql_num_rows($jailtest);


if($rankid == '100'){
if(isset($_GET['deletepost'])) { 
mysql_query("DELETE FROM forumposts WHERE type = 'jail' AND id = '$deletepost'");
}
}


if(isset($_POST['deleteall'])) { 
if($rankid < '50'){}
else{mysql_query("DELETE FROM forumposts WHERE type = 'jail'");
echo"<font color=white face=verdana size=1>Posts deleted!</font>";}}


$newpostraw = $_POST['newpost'];
$newpost = htmlentities($newpostraw, ENT_QUOTES);
if(isset($_POST['dopost'])) { 


$mutedusernamesql = mysql_query("SELECT * FROM muted WHERE  username = '$gangsterusername'")or die(mysql_error());
$mutedusernamerows = mysql_num_rows($mutedusernamesql);
$mutedusernamearray = mysql_fetch_array($mutedusernamesql);
$mutedusernameone = $mutedusernamearray['username'];
$mutedipone = $mutedusernamearray['ip'];

$mutedipsql = mysql_query("SELECT * FROM muted WHERE ip = '$userip'")or die(mysql_error());
$mutediprows  = mysql_num_rows($mutedipsql);
$mutediparray = mysql_fetch_array($mutedipsql);
$mutedusernametwo = $mutediparray['username'];
$mutediptwo = $mutediparray['ip'];



if(!$newpost){}
elseif($mutedusernamerows > '0'){die("<font color=white face=verdana size=1>Username: <b>$mutedusernameone</b> and IP: <b>$mutedipone</b> have been muted! Contact a member of <b>The Society</b> to be unmuted!");}
elseif($mutediprows > '0'){die("<font color=white face=verdana size=1>Username: <b>$mutedusernametwo</b> and IP: <b>$mutediptwo</b> have been muted! Contact a member of <b>The Society</b> to be unmuted!");}
else{
mysql_query("INSERT INTO forumposts(username,topicid,ip,type,post,rankid)
VALUES ('$gangsterusername',' ','$userip','jail','$newpost','$rank')");
mysql_query("UPDATE users SET posts = (posts + 1) WHERE ID = '$ida'");}}

$checkbust = mysql_num_rows(mysql_query("SELECT * FROM jail WHERE id = '$bust'"));
$bustee = mysql_fetch_array(mysql_query("SELECT * FROM jail WHERE id = '$bust'"));
$busteename = $bustee['username'];


$getsug = mysql_fetch_array(mysql_query("SELECT * FROM suggestions WHERE username = '$busteename'"));
$getsugid = $getsug['id'];


$busteereward = $bustee['reward'];
$busteerewarda = number_format($busteereward);

$timea = time();

$hidden = ceil($time / 500);


$inputrand = mt_rand(0,60);
if($inputrand == '0'){$newinput = 1;}




if(isset($_POST["$bustbutton"])) { 



if($checkbust < '1'){}
elseif($jailtester > '0'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You are in jail!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
else{
$rand = mt_rand(0,2000);
if($rankid == 100){$if = 1900;}
elseif($busts < 2){ $if = 315;}
elseif($busts < 3){ $if = 465;}
elseif($busts < 4){ $if = 590;}
elseif($busts < 15){ $if = 670;}
elseif($busts < 35){ $if = 770;}
elseif($busts < 50){ $if = 970;}
elseif($busts < 75){ $if = 1079;}
elseif($busts < 125){ $if = 1150;}
elseif($busts < 200){ $if = 1236;}
elseif($busts < 500){ $if = 1300;}
elseif($busts < 2000){ $if = 1440;}
elseif($busts < 5000){ $if = 1610;}
elseif($busts < 10000){ $if = 1720;}
elseif($busts < 15000){ $if = 1900;}
elseif($busts < 500000){ $if = 1950;}

$time = time();
$jailtime = $time + 60;

if($rand > $if){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You failed busting <b>$busteename</b> out of jail, You are now in jail too!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";
mysql_query("UPDATE users SET now = '0',failedbusts = (failedbusts + 1) WHERE ID = '$ida'");
mysql_query("INSERT INTO jail(username,time,reward)
VALUES ('$gangsterusername','$jailtime','$getreward')");}
else{
mysql_query("DELETE FROM jail WHERE id = '$bust'");
if (mysql_affected_rows()==0) { die("<font color=white face=verdana size=1>User is no longer in jail</font>");}
echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You successfully busted <b>$busteename</b> out of jail, You received $<b>$busteerewarda</b>!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";
$nows = $now + 1;
if($nows > $joint){
mysql_query("UPDATE users SET joint = $nows WHERE ID = '$ida'");
}
mysql_query("UPDATE users SET jailbusts = jailbusts + 1,now = (now + 1) WHERE ID = '$ida'");
mysql_query("UPDATE users SET money = money - $busteereward WHERE ID = '$getsugid' AND money >= '$busteereward'");
if (mysql_affected_rows()!=0) {

mysql_query("UPDATE users SET notify = '1',notification = 'a_open$usernameone a_closed$usernameone a_slashbusted you from jail for $<b></b>$busteerewarda.' WHERE ID= '$getsugid'");

mysql_query("UPDATE users SET money = money + $busteereward WHERE ID = '$ida'");}else{ mysql_query("UPDATE users SET reward = '0' WHERE username = '$busteename'");

mysql_query("UPDATE users SET notification = 'a_open$usernameone a_closed$usernameone a_slashbusted you from jail for 0.' WHERE username = '$busteename'");
}

$sendinfo = "\[b\]$getname\[\/b\] has set you free from jail, and gained $\[b\]$busteerewarda\[\/b\] for the bust!";
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$busteename','$busteename','no','$userip','$sendinfo')");


$rankup = $getuserinfoarray['rankup'];


if($rank == '1'){ $update = '2';$newrank = 'Citizen';}
elseif($rank == '2'){ $update = '1';$newrank = 'Wise Guy';}
elseif($rank == '3'){ $update = '0.5';$newrank = 'Thug';}
elseif($rank == '4'){ $update = '0.3';$newrank = 'Respected Thug';}
elseif($rank == '5'){ $update = '0.15';$newrank = 'Mobster';}
elseif($rank == '6'){ $update = '0.1';$newrank = 'Respected Mobster';}
elseif($rank == '7'){ $update = '0.05';$newrank = 'Assassin';}
elseif($rank == '8'){ $update = '0.03';$newrank = 'Respected Assassin';}
elseif($rank == '9'){ $update = '0.02';$newrank = 'Mafioso';}
elseif($rank == '10'){ $update = '0.01';$newrank = 'Respected Mafioso';}
elseif($rank == '11'){ $update = '0.009';$newrank = 'Underboss';}
elseif($rank == '12'){ $update = '0.007';$newrank = 'Respected Underboss';}
elseif($rank == '13'){ $update = '0.005';$newrank = 'Boss';}
elseif($rank == '14'){ $update = '0.001';$newrank = 'Respected Boss';}
elseif($rank == '15'){ $update = '0.001';$newrank = 'Godfather';}
elseif($rank == '16'){ $update = '0.00099';$newrank = 'Respected Godfather';}
elseif($rank == '17'){ $update = '0.0008';$newrank = 'Gangster';}
elseif($rank == '18'){ $update = '0.0007';$newrank = 'Respected Gangster';}
elseif($rank == '19'){ $update = '0.0006';$newrank = 'Don';}
elseif($rank == '20'){ $update = '0.0006';$newrank = 'Respected Don';}
elseif($rank == '21'){ $update = '0.0005';$newrank = 'Tough Don';}
if($rank <= 21){
if(($rankup + $update) > ('100')){
$newrankup = $rankup + $update - 100;
$sendinfo = "You have been promoted to \[b\]$newrank\[\/b\]! Congratulations, you received \[b\]1,000\[\/b\] bullets!";
mysql_query("UPDATE users SET rankid = rankid + 1 WHERE ID = '$ida'");
mysql_query("UPDATE users SET rankup = $newrankup WHERE ID = '$ida'");
mysql_query("UPDATE users SET bullets = bullets + 1000 WHERE ID = '$ida'");
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$gangsterusername','$gangsterusername','no','$userip','$sendinfo')");
}else{mysql_query("UPDATE users SET rankup = rankup + $update WHERE ID = '$ida'");}}




}}}

elseif(isset($_POST['reward'])) { 

$entertainer = $ent;
if($entertainer != '0'){die('<font color=white face=verdana size=1>As entertainer you cannot do this</font>');}


if(!$setreward){}
elseif($setreward > $getmoney){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You dont have enough money!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
elseif($setreward > 99999999999){}
elseif($jailtester > '0'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You cant change the reward while your in jail!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
elseif($setreward == $getreward){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>Reward set!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
else{

mysql_query("UPDATE users SET reward = '$setreward' WHERE ID = '$ida' AND money >= '$setreward'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error.</font>');}

mysql_query("UPDATE jail SET reward = '$setreward' WHERE username = '$getname'");
echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>Reward set!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}}
$getuserinfosql = mysql_query("SELECT * FROM users WHERE ID = '$ida'");
$getuserinfoarray = mysql_fetch_array($getuserinfosql);
$getreward = $getuserinfoarray['reward'];
$getrewarda = number_format($getreward);
$joint = $getuserinfoarray['joint'];
$jailrand = $getuserinfoarray['jailrand'];
$ID = $getuserinfoarray['ID'];
$now = $getuserinfoarray['now'];



$getprisoners = mysql_query("SELECT * FROM jail ORDER BY reward DESC");
$getprisonerscount = mysql_num_rows($getprisoners);

?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Jail</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png"><br><br><center>
<div id=autojail style="width:75%;">
</div></center><br><center><form action="jail.php" method="post"><font color=white face=verdana size=1>Give reward for the person that busts you out:</font><br><input type=text class=textbox name=reward value="<? echo"$$getrewarda";?>"><input type=submit value="Set reward" class=textbox>
<?if($rankid >= '50'){echo"<br><input type=submit name=deleteall value='Delete Posts' class=textbox>";}?></center><br>
<input name="<?echo$bustbutton;?>" type="radio" value="<?echo"$hidden";?>" STYLE="visibility:hidden">
</form>

</td>
<td width="8" background="/more/rightb.png" NOWRAP></td>
</tr>

<tr>
<td width="8" height="9" background="/more/bottomleft.png"></td>
<td height="9" background="/more/bottom.png"></td>
<td width="8" height="9" background="/more/bottomright.png"></td>
</tr>
</table>

<?php

$getposts = mysql_query("SELECT * FROM forumposts WHERE type = 'jail' ORDER BY id DESC");

while($getpostsarray = mysql_fetch_array($getposts))
{
$postname = $getpostsarray['username'];
$postid = $getpostsarray['id'];
$time = $getpostsarray['time'];
$postinforawa = html_entity_decode($getpostsarray['post'], ENT_NOQUOTES);
$postinforawb = $postinforawa;

$zpattern[a] = "<";
$zpattern[b] = ">";

$zreplace[a] = "&lt;";
$zreplace[b] = "&gt;";

$i = 0;
$while = mysql_query("SELECT * FROM blacklist");
while ($all = mysql_fetch_array($while)){
$i = $i + 1;
$zpattern[$i] = $all['word'];
$zreplace[$i] = "mafiasociety";}


$postinforawz = str_replace($zpattern,$zreplace,$postinforawb);

$epattern[1] = "/\[b\](.*?)\[\/b\]/is";
$epattern[2] = "/\[u\](.*?)\[\/u\]/is";
$epattern[3] = "/\[i\](.*?)\[\/i\]/is";
$epattern[4] = "/\[center\](.*?)\[\/center\]/is";
$epattern[5] = "/\[color=(.*?)\](.*?)\[\/color\]/is";
$epattern[7] = "/\[font=(.*?)\](.*?)\[\/font\]/is";
$epattern[8] = "/\[br\]/is";
$epattern[10] = "/\[quote\](.*?)\[\/quote\]/is";
$epattern[11] = "/\[left\](.*?)\[\/left\]/is";
$epattern[12] = "/\[right\](.*?)\[\/right\]/is";
$epattern[13] = "/\[s\](.*?)\[\/s\]/is";

$ereplace[1] = "<b>$1</b>";
$ereplace[2] = "<u>$1</u>";
$ereplace[3] = "<i>$1</i>";
$ereplace[4] = "<center>$1</center>";
$ereplace[5] = "<font color=\"$1\">$2</font>";
$ereplace[7] = "<font face=\"$1\">$2</font>";
$ereplace[8] = "<br>";
$ereplace[10] = "<blockquote><b>$1</b></blockquote>";
$ereplace[11] = "<div align=\"left\">$1</div>";
$ereplace[12] = "<div align=\"right\">$1</div>";
$ereplace[13] = "<s>$1</s>";

$postinforawb = preg_replace($epattern,$ereplace,$postinforawz);

$fpattern[1] = ":arrow:";
$fpattern[2] = ":D";
$fpattern[3] = ":S";
$fpattern[4] = "8)";
$fpattern[5] = ":cry:";
$fpattern[6] = "8|";
$fpattern[7] = ":evil:";
$fpattern[8] = ":!:";
$fpattern[9] = ":idea:";
$fpattern[10] = ":lol:";
$fpattern[11] = ":mad:";
$fpattern[12] = ":?:";
$fpattern[13] = ":redface:";
$fpattern[14] = ":rolleyes:";
$fpattern[15] = ":(";
$fpattern[16] = ":)";
$fpattern[17] = ":o";
$fpattern[18] = ":tdn:";
$fpattern[19] = ":P";
$fpattern[20] = ":tup:";
$fpattern[21] = ":twisted:";
$fpattern[22] = ";)";

$freplace[1] = '<img src=/more/smiles/arrow.gif>';
$freplace[2] = '<img src=/more/smiles/biggrin.gif>';
$freplace[3] = '<img src=/more/smiles/confused.gif>';
$freplace[4] = '<img src=/more/smiles/cool.gif>';
$freplace[5] = '<img src=/more/smiles/cry.gif>';
$freplace[6] = '<img src=/more/smiles/eek.gif>';
$freplace[7] = '<img src=/more/smiles/evil.gif>';
$freplace[8] = '<img src=/more/smiles/exclaim.gif>';
$freplace[9] = '<img src=/more/smiles/idea.gif>';
$freplace[10] = '<img src=/more/smiles/lol.gif>';
$freplace[11] = '<img src=/more/smiles/mad.gif>';
$freplace[12] = '<img src=/more/smiles/question.gif>';
$freplace[13] = '<img src=/more/smiles/redface.gif>';
$freplace[14] = '<img src=/more/smiles/rolleyes.gif>';
$freplace[15] = '<img src=/more/smiles/sad.gif>';
$freplace[16] = '<img src=/more/smiles/smile.gif>';
$freplace[17] = '<img src=/more/smiles/surprised.gif>';
$freplace[18] = '<img src=/more/smiles/tdown.gif>';
$freplace[19] = '<img src=/more/smiles/toungue.gif>';
$freplace[20] = '<img src=/more/smiles/tup.gif>';
$freplace[21] = '<img src=/more/smiles/twisted.gif>';
$freplace[22] = '<img src=/more/smiles/wink.gif>';

$postinfo = str_replace($fpattern, $freplace, $postinforawb);

$rankcolor = $getpostsarray['rankid'];

if($rankcolor == '100'){$color = "<font color=red face=verdana size=1><b>$postname</b></font>";} 
elseif($rankcolor == '75'){$color = "<font color=#00ccff face=verdana size=1><b>$postname</b></font>";} 
elseif($rankcolor == '50'){$color = "<font color=blue face=verdana size=1><b>$postname</b></font>";} 
else{$color = "<font color=#333333 face=verdana size=1>$postname</font>";} 
?>
<table align=center width=100% cellpadding=0 cellspacing=0><tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP><table width=100% cellpadding=0 cellspacing=0><tr><td align=left><a href=viewprofile.php?username=<? echo $postname?>><? echo $color; ?></a><? if($playerrank == '100'){echo"<a href=viewtopic.php?topicid=$topicid&deletepost=$postid><font color=white face=verdana size=1> (Delete)</font></a>";}?></td><td align=right><font color=silver face=verdana size=1><?echo$time;?></font></td></tr></table>
</td><td width=8 height=22 background=/more/topright.png></td></tr><tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>

<? if($countthree > '20'){echo"This user tried to post more than 20 smilies, this is <b>NOT</b> allowed";
}else{echo nl2br($postinfo);} ?>

</font><br></td><td width=8 background=/more/rightb.png NOWRAP></td></tr><tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr></table>
<?

}
?>
<table align=center width=100% cellpadding=0 cellspacing=0><tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP>
</td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<center><form action="jail.php" method="post" name="smiley"><font color="white" face="verdana" size="1">Post comment</font><br><textarea name="newpost" cols="42" rows="11" class="textbox" id ="newpost">
</textarea><br><a onClick="emotion(':arrow:')" style="cursor: pointer;"><img src="/more/smiles/arrow.gif" border=0></a><a onClick="emotion(':D')" style="cursor: pointer;"><img src="/more/smiles/biggrin.gif" border=0></a><a onClick="emotion(':S')" style="cursor: pointer;"><img src="/more/smiles/confused.gif" border=0></a><a onClick="emotion(':cry:')" style="cursor: pointer;"><img src="/more/smiles/cry.gif" border=0></a><a onClick="emotion('8)')" style="cursor: pointer;"><img src="/more/smiles/cool.gif" border=0></a><a onClick="emotion('8|')" style="cursor: pointer;"><img src="/more/smiles/eek.gif" border=0></a><a onClick="emotion(':evil:')" style="cursor: pointer;"><img src="/more/smiles/evil.gif" border=0></a><a onClick="emotion(':!:')" style="cursor: pointer;"><img src="/more/smiles/exclaim.gif" border=0></a><a onClick="emotion(':idea:')" style="cursor: pointer;"><img src="/more/smiles/idea.gif" border=0></a><a onClick="emotion(':lol:')" style="cursor: pointer;"><img src="/more/smiles/lol.gif" border=0></a><a onClick="emotion(':mad:')" style="cursor: pointer;"><img src="/more/smiles/mad.gif" border=0></a><a onClick="emotion(':?:')" style="cursor: pointer;"><img src="/more/smiles/question.gif" border=0></a><a onClick="emotion(':redface:')" style="cursor: pointer;"><img src="/more/smiles/redface.gif" border=0></a><a onClick="emotion(':rolleyes:')" style="cursor: pointer;"><img src="/more/smiles/rolleyes.gif" border=0></a><a onClick="emotion(':(')" style="cursor: pointer;"><img src="/more/smiles/sad.gif" border=0></a><a onClick="emotion(':)')" style="cursor: pointer;"><img src="/more/smiles/smile.gif" border=0></a><a onClick="emotion(':o')" style="cursor: pointer;"><img src="/more/smiles/surprised.gif" border=0></a><a onClick="emotion(':P')" style="cursor: pointer;"><img src="/more/smiles/toungue.gif" border=0></a><a onClick="emotion(':twisted:')" style="cursor: pointer;"><img src="/more/smiles/twisted.gif" border=0></a><a onClick="emotion(';)')" style="cursor: pointer;"><img src="/more/smiles/wink.gif" border=0></a><a onClick="emotion(':tdn:')" style="cursor: pointer;"><img src="/more/smiles/tdown.gif" border=0></a><a onClick="emotion(':tup:')" style="cursor: pointer;"><img src="/more/smiles/tup.gif" border=0></a><br>
<input type ="submit" value="Post comment" class="textbox" name="dopost"></form></center>

</td>
<td width="8" background="/more/rightb.png" NOWRAP></td>
</tr>
</td>

<tr>
<td width="8" height="9" background="/more/bottomleft.png"></td>
<td height="9" background="/more/bottom.png"></td>
<td width="8" height="9" background="/more/bottomright.png"></td>
</tr>
</table>

<td width="250" valign="top">
<?
$statustesttwo = $getuserinfoarray;?>
<? include 'rightmenu.php'; ?>
</td>
</tr>
</table>

</body></html>