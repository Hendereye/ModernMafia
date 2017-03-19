<? include 'included.php'; ?>
<?


$tyn = rand(0,5);
if($tyn == '3'){
$deletetopicssql = mysql_query("SELECT id FROM forumposts WHERE type = 'OR' ORDER BY id DESC LIMIT 16,50");
while($deletetopics = mysql_fetch_array($deletetopicssql))
{$dtopicid = $deletetopics['id'];
$deleted = mysql_query("DELETE FROM forumposts WHERE id = '$dtopicid'");}
}

$saturate = "/[^a-z0-9]/i";
$allowed = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$invusers = mysql_real_escape_string($_GET['inviteuser']);
$invuser = preg_replace($saturate,"",$invusers);
$userip = $_SERVER[REMOTE_ADDR]; 
$gangsterusername = $usernameone;
 
$poster = mysql_real_escape_string($_GET['deletepost']);
$deletepost = preg_replace($allowed,"",$poster);


$jailtest = mysql_query("SELECT username FROM jail WHERE username  = '$gangsterusername'");
$jailtester = mysql_num_rows($jailtest);
if($jailtester != '0'){die(include 'jail.php'); }
?>
<html>
<head>
<link rel="stylesheet" href="more/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="shortcut icon" href="/more/icon.png" type="image/x-icon" />
</head>
<body background="/more/bgtest.png">
<script type="text/javascript">
function emotion(em) { document.smiley.newpost.value=document.smiley.newpost.value+em;}
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
$time = time();


$doidraw = mysql_real_escape_string($_POST['doid']);
$cancela = mysql_real_escape_string($_GET['cancel']);
$kicka = mysql_real_escape_string($_GET['kick']);
$invintenamea = mysql_real_escape_string($_POST['invite']);
$doid = preg_replace($allowed,"",$doidraw);
$cancel = preg_replace($allowed,"",$cancela);
$kick = preg_replace($allowed,"",$kicka);
$invitename = preg_replace($saturate,"",$invintenamea);


$getuserinfoarray = $statustesttwo;
$getname = $getuserinfoarray['username'];
$timer = ceil($getuserinfoarray['timer']);
$rankid = $getuserinfoarray['rankid'];
$money = $getuserinfoarray['money'];

if($rankid == '100'){
if(isset($_GET['deletepost'])) { 
mysql_query("DELETE FROM forumposts WHERE type = 'or' AND id = '$deletepost'");
}
}


if(isset($_POST['deleteall'])) { 
if(($rankid < '25')&&($senior < '0')){}
else{mysql_query("DELETE FROM forumposts WHERE type = 'or'");
echo"<font color=white face=verdana size=1>Posts deleted!</font>";}}

$newpostraw = mysql_real_escape_string($_POST['newpost']);
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
VALUES ('$gangsterusername',' ','$userip','or','$newpost','$myrank')");
mysql_query("UPDATE users SET posts = (posts + 1) WHERE ID = '$ida'");}}

$getinv = mysql_query("SELECT * FROM robbery WHERE invite = '$gangsterusername' AND status = '0'");
$rows = mysql_num_rows($getinv);

$getinvb = mysql_query("SELECT * FROM robbery WHERE invite = '$gangsterusername' AND status = '2'");
$rowsa = mysql_num_rows($getinvb);


$getinva = mysql_query("SELECT * FROM robbery WHERE invitedby = '$gangsterusername'");
$rowstwo = mysql_num_rows($getinva);

$getinvab = mysql_query("SELECT * FROM robbery WHERE status = '2' AND invite = '$gangsterusername'");
$rowstwoo = mysql_num_rows($getinvab);

if($rowstwoo > '0'){
$teamarray = mysql_fetch_array($getinvab);
$teamleader = $teamarray['invitedby'];}



$htime = $timer - $time;

$totalh = $htime / 3600;
$totalh = floor($totalh);
if($totalh < '10'){$leading = 0;}

if(isset($_GET['kick'])){
$rowone = mysql_num_rows(mysql_query("SELECT * FROM robbery WHERE invitedby = '$gangsterusername' AND id = '$kick' AND status = '2'"));

$rowoneg = mysql_num_rows(mysql_query("SELECT * FROM robbery WHERE invitedby = '$gangsterusername' AND invite = '$gangsterusername' AND  id = '$kick' AND status = '2'"));


if($rowone < '1'){}
elseif($rowoneg > '0'){}
else{mysql_query("DELETE FROM robbery WHERE id = '$kick'");}}

elseif(isset($_GET['cancel'])){
$rowone = mysql_num_rows(mysql_query("SELECT * FROM robbery WHERE invitedby = '$gangsterusername' AND id = '$cancel' AND status = '0'"));

$rowoneg = mysql_num_rows(mysql_query("SELECT * FROM robbery WHERE invitedby = '$gangsterusername' AND invite = '$gangsterusername' AND  id = '$kick' AND status = '0'"));

if($rowone < '1'){}
elseif($rowoneg > '0'){}
else{mysql_query("DELETE FROM robbery WHERE id = '$cancel'");}}


if(isset($_POST['commitor'])){
$leadsss = mysql_num_rows(mysql_query("SELECT * FROM robbery WHERE status = '2' AND invitedby = '$gangsterusername'"));

if($leadsss == '0'){}
elseif($leadsss != '3'){echo"<font color=white face=verdana size=1>You need 3 people in your OR before you can commit it!</font>";}
else{


mysql_query("UPDATE robbery SET cunt = '1' WHERE cunt = '0' AND invitedby = '$gangsterusername' AND status = '2'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 1.</font>');}


$getmembers = mysql_query("SELECT * FROM robbery WHERE invitedby = '$gangsterusername'");

$getmembersggg = mysql_query("SELECT * FROM robbery WHERE invitedby = '$gangsterusername'");


$moneyrand = mt_rand(100000,400000) * 2;
$moneyrander = number_format($moneyrand);
echo"<font color=white face=verdana size=1>You and your team successfully stole $<b>$moneyrander</b>!";
mysql_query("UPDATE users SET money = (money + $moneyrand) WHERE ID = '$ida'");
mysql_query("UPDATE money SET money = (money + $moneyrand)");

$upto = 0;

while($addup = mysql_fetch_array($getmembersggg)){
$addone = $addup['invite'];
$inviteinfoa = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username = '$addone'"));
$percent = $inviteinfoa['rankid'];
$upto = $upto + $percent;}

if($upto <= '8'){$multiply = 0.75;}elseif($upto <= '12'){$multiply = 0.77;}elseif($upto <= '18'){$multiply = 0.82;}elseif($upto <= '25'){$multiply = 0.87;}elseif($upto <= '35'){$multiply = 0.9;}elseif($upto <= '50'){$multiply = 0.92;}elseif($upto <= '60'){$multiply = 0.95;}elseif($upto <= '70'){$multiply = 0.96;}else{$multiply = 1;}



while($members = mysql_fetch_array($getmembers)){
$name = $members['invite'];
$inviteinfo = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username = '$name'"));

mysql_query("DELETE FROM robbery WHERE invite = '$name'");

$add = $inviteinfo['addition'];

$penpoint = mysql_num_rows(mysql_query("SELECT * FROM ipadresses WHERE ip = '$userip' AND username = '$name'"));
if($name != $gangsterusername){
if($penpoint > '0'){ mysql_query("UPDATE users SET penpoints = penpoints + 1 WHERE username = '$name'");
$reason = "Did an OR with $gangsterusername";
mysql_query("INSERT INTO penpoints(username,reason) VALUES('$name','$reason')");}}



$time = time();
$newtime = $time + $add;
mysql_query("UPDATE users SET timer = '$newtime' WHERE username = '$name'");

$rank = $inviteinfo['rankid'];
$rankup = $inviteinfo['rankup'];

if($rank == '1'){ $update = '99.999';$newrank = 'Citizen';}
elseif($rank == '2'){ $update = '45';$newrank = 'Wise Guy';}
elseif($rank == '3'){ $update = '28';$newrank = 'Thug';}
elseif($rank == '4'){ $update = '16';$newrank = 'Respected Thug';}
elseif($rank == '5'){ $update = '13';$newrank = 'Mobster';}
elseif($rank == '6'){ $update = '8';$newrank = 'Respected Mobster';}
elseif($rank == '7'){ $update = '7';$newrank = 'Assassin';}
elseif($rank == '8'){ $update = '6';$newrank = 'Respected Assassin';}
elseif($rank == '9'){ $update = '4.8';$newrank = 'Mafioso';}
elseif($rank == '10'){ $update = '4.25';$newrank = 'Respected Mafioso';}
elseif($rank == '11'){ $update = '4.09';$newrank = 'Underboss';}
elseif($rank == '12'){ $update = '3.36';$newrank = 'Respected Underboss';}
elseif($rank == '13'){ $update = '3';$newrank = 'Boss';}
elseif($rank == '14'){ $update = '3';$newrank = 'Respected Boss';}
elseif($rank == '15'){ $update = '2.54';$newrank = 'Godfather';}
elseif($rank == '16'){ $update = '2.35';$newrank = 'Respected Godfather';}
elseif($rank == '17'){ $update = '1.85';$newrank = 'Gangster';}
elseif($rank == '18'){ $update = '1.25';$newrank = 'Respected Gangster';}
elseif($rank == '19'){ $update = '0.95';$newrank = 'Don';}
elseif($rank == '20'){ $update = '0.45';$newrank = 'Respected Don';}
elseif($rank == '21'){ $update = '0.25';$newrank = 'Tough Don';}

$updater = $update * $multiply;
$sendinfoa = "You successfully committed an organised robbery, the team leader received $$moneyrander!";
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info,color)
VALUES ('$name','$gangsterusername','2','$userip','$sendinfoa','yes')");


if($rank <= 21){
if(($rankup + $updater) > ('100')){
$newrankup = $rankup + $updater - 100;
$sendinfo = "You have been promoted to \[b\]$newrank\[\/b\]! Congratulations, you received \[b\]1,000\[\/b\] bullets!";
mysql_query("UPDATE users SET rankid = rankid + 1 WHERE username = '$name'");
mysql_query("UPDATE users SET rankup = $newrankup WHERE username = '$name'");
mysql_query("UPDATE users SET bullets = bullets + 1000 WHERE username = '$name'");
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$name','$name','2','$userip','$sendinfo')");}
else{mysql_query("UPDATE users SET rankup = rankup + $updater WHERE username = '$name'");}}}}}


if(isset($_POST['create'])){

if($timer > $time){}
elseif($rowstwo != '0'){}
elseif($rowsa != '0'){}
elseif($htime > '0'){}
elseif($rankid >= '200'){echo"<font color=white face=verdana size=1>You cannot take part in OR's</font>";}
else{mysql_query("INSERT INTO robbery(invite,invitedby,status) VALUES('$gangsterusername','$gangsterusername','2')");
echo"<font color=white face=verdana size=1>You started an OR!</font>";}}

elseif(isset($_POST['accept'])){
$chek = mysql_num_rows(mysql_query("SELECT * FROM robbery WHERE id = '$doid' AND status = '0'"));

if($timer > $time){}
elseif($chek == '0'){}
elseif($rowsa != '0'){}
elseif($htime > '0'){}
elseif($rankid >= '200'){echo"<font color=white face=verdana size=1>You cannot take part in OR's</font>";}
else{
mysql_query("UPDATE robbery SET status = '2' WHERE id = '$doid'");
echo"<font color=white face=verdana size=1>You joined the OR!</font>";}}

elseif(isset($_POST['deny'])){
$chek = mysql_num_rows(mysql_query("SELECT * FROM robbery WHERE id = '$doid' AND status = '0'"));

if($timer > $time){}
elseif($chek == '0'){}
elseif($rowsa != '0'){}
elseif($htime > '0'){}
else{
mysql_query("DELETE FROM robbery WHERE id = '$doid'");
echo"<font color=white face=verdana size=1>You denied the OR!</font>";}}

elseif(isset($_POST['leave'])){
$chek = mysql_num_rows(mysql_query("SELECT * FROM robbery WHERE invite = '$gangsterusername' AND status = '2'"));

$chekh = mysql_num_rows(mysql_query("SELECT * FROM robbery WHERE invitedby = '$gangsterusername'"));

if($chek == '0'){}
elseif($money < '250000'){echo"<font color=white face=verdana size=1>You dont have enough money! Leaving an OR costs $<b>250,000</b>!</font>";}
else{
if($chekh > '0'){mysql_query("DELETE FROM robbery WHERE invitedby = '$gangsterusername'");}
mysql_query("UPDATE users SET money = (money - 250000) WHERE ID = '$ida'");
mysql_query("DELETE FROM robbery WHERE invite = '$gangsterusername' AND status = '2'");
mysql_query("DELETE FROM robbery WHERE invitedby = '$gangsterusername'");
echo"<font color=white face=verdana size=1>You left the OR!</font>";}}



elseif(isset($_POST['invite'])){
$getinvab = mysql_query("SELECT * FROM robbery WHERE status = '2' AND invite = '$gangsterusername'");
$rowstwoo = mysql_num_rows($getinvab);

$chek = mysql_num_rows(mysql_query("SELECT * FROM robbery WHERE invite = '$invitename' AND status = '2'"));
$chekaa = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username = '$invitename'"));

if($chekaa != '0'){
$chekaaa = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username = '$invitename'"));
$invitename = $chekaaa['username'];}

$chekok = mysql_num_rows(mysql_query("SELECT * FROM robbery WHERE invite = '$invitename' AND invitedby = '$gangsterusername'"));

$four = mysql_num_rows(mysql_query("SELECT * FROM robbery WHERE invitedby =  '$gangsterusername'"));


if($timer > $time){}
elseif($rowstwoo == '0'){echo"<font color=white face=verdana size=1>You must first start your own OR!</font>";}
elseif($chek != '0'){echo"<font color=white face=verdana size=1>User is already in an OR!</font>";}
elseif($chekok != '0'){echo"<font color=white face=verdana size=1>You have already invited that user!</font>";}
elseif($invitename == '$gangsterusername'){}
elseif($four >= '3'){echo"<font color=white face=verdana size=1>You must cancel an invite before you can invite another person!</font>";}
else{
mysql_query("INSERT INTO robbery(invite,invitedby,status) VALUES('$invitename','$gangsterusername','0')");;}}

elseif(isset($_GET['inviteuser'])){

$getinvabv = mysql_query("SELECT * FROM robbery WHERE status = '2' AND invite = '$gangsterusername'");
$rowstwoov = mysql_num_rows($getinvabv);
$chekv = mysql_num_rows(mysql_query("SELECT * FROM robbery WHERE invite = '$invuser' AND status = '2'"));
$chekaav = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username = '$invuser'"));

if($chekaav != '0'){
$chekaaav = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username = '$invuser'"));
$invitename = $chekaaav['username'];}

$chekokv = mysql_num_rows(mysql_query("SELECT * FROM robbery WHERE invite = '$invuser' AND invitedby = '$gangsterusername'"));

$fourv = mysql_num_rows(mysql_query("SELECT * FROM robbery WHERE invitedby =  '$gangsterusername'"));


if($timer > $time){}
elseif($rowstwoov == '0'){echo"<font color=white face=verdana size=1>You must first start your own OR!</font>";}
elseif($chekv != '0'){echo"<font color=white face=verdana size=1>User is already in an OR!</font>";}
elseif($chekokv != '0'){echo"<font color=white face=verdana size=1>You have already invited that user!</font>";}
elseif($invuser == '$gangsterusername'){}
elseif($fourv >= '3'){echo"<font color=white face=verdana size=1>You must cancel an invite before you can invite another person!</font>";}
else{
mysql_query("INSERT INTO robbery(invite,invitedby,status) VALUES('$invuser','$gangsterusername','0')");;}}





?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Organised robbery</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<br><br><center>

<center><font color ="silver" face="verdana" size="2">Time before you can commit an  OR: <?if($htime <= '0'){echo"<b><font color =white>Available</font></b>";}
else{echo"$leading";echo"$totalh";echo date( ":i:s", $timer - $time);}?> </font></center>
<br>
<? if ($rowstwoo > '0'){

if($teamleader == $gangsterusername){echo'<form method="post"><input type="text" name="invite" class="textbox"><input type="submit" value="Invite" class="textbox"></form>';}

echo'<table cellpadding=0 cellspacing=1 width=35% align="center"><tr><td width=100% bgcolor=#222222 NOWRAP colspan=3 align="center"><font color=silver face=verdana size=1>OR Team</font></td></tr>';
$team = mysql_query("SELECT * FROM robbery WHERE invitedby = '$teamleader' AND status = '2' ORDER BY id ASC");

while($teams = mysql_fetch_array($team)){
$teamid = $teams['id'];
$teamname = $teams['invite'];

echo"<tr><td width=60% bgcolor=#333333 NOWRAP>
<a href=viewprofile.php?username=$teamname>&nbsp;$teamname</a></td><td width=20% bgcolor=#333333 NOWRAP><a href=or.php?kick=$teamid>&nbsp;Kick</a></td><td width=20% bgcolor=#333333 NOWRAP></td></tr>";}
echo'</table><br><br>';


echo'<table cellpadding=0 cellspacing=1 width=35% align="center"><tr><td width=100% bgcolor=#222222 NOWRAP colspan=3 align="center"><font color=silver face=verdana size=1>OR Invites</font></td></tr>';

$teaminvites = mysql_query("SELECT * FROM robbery WHERE status = '0' AND invitedby = '$teamleader' ORDER BY id ASC");
$raws = mysql_num_rows($teaminvites);

while($teaminv = mysql_fetch_array($teaminvites)){
$teaminviteid = $teaminv['id'];
$teaminvited = $teaminv['invite'];

echo"<tr><td width=60% bgcolor=#333333 NOWRAP>
<a href=viewprofile.php?username=$teaminvited>&nbsp;$teaminvited</a></td><td width=20% bgcolor=#333333 NOWRAP><a href=or.php?cancel=$teaminviteid>&nbsp;Cancel</a></td><td width=20% bgcolor=#333333 NOWRAP></td></tr>";}
echo'</table>';

$amount = mysql_num_rows(mysql_query("SELECT * FROM robbery WHERE invitedby = '$gangsterusername' AND status = '2'"));

if($amount == '3'){echo'<br><center><form method="post"><input type="submit" name="commitor" value="Commit OR" class="textbox"></form>';}

echo"<br><form method=post><input type=submit value='Leave OR ($250,000)' class=textbox name=leave></form>";

}


if(($htime < '1')&&($rowstwo < '1')&&($rowsa < '1')){

echo'
<table cellpadding=0 cellspacing=1 width=35% align="center">
<tr><td width=100% bgcolor=#222222 NOWRAP colspan=3 align="center">
<font color=silver face=verdana size=1>Create OR</font></td></tr>
<form method="post"><tr><td width=100% bgcolor=#333333 NOWRAP colspan=3>
<input type="submit" value="Create OR" class="textbox" name="create"></td></tr></form>
</table><br><br>


<table cellpadding=0 cellspacing=1 width=35% align="center">
<tr><td width=40% bgcolor=#222222 NOWRAP><font color=silver face=verdana size=1>Invited by:&nbsp;&nbsp;</font></td><td width=30% bgcolor=#222222 NOWRAP><center><font color=silver face=verdana size=1>Deny:&nbsp;&nbsp;</font></center></td><td width=30% bgcolor=#222222 NOWRAP><center><font color=silver face=verdana size=1>Accept:&nbsp;&nbsp;</font></center></td></tr>';

if($rows < '1'){echo"<tr><td width=100% bgcolor=#333333 NOWRAP colspan='3'>
<font color=silver face=verdana size=1>You have no invites!</font></td></tr>";}

else{
while($inv = mysql_fetch_array($getinv)){
$inviteid = $inv['id'];
$invitedby = $inv['invitedby'];

echo"<form method=post><tr><td width=20% bgcolor=#333333 NOWRAP>
<input type=hidden name=doid value=$inviteid><a href=viewprofile.php?username=$invitedby>$invitedby</a></td><td width=40% bgcolor=#222222 NOWRAP><input type=submit name=deny value='Deny' style='width:100%;' class=textbox></td><td width=40% bgcolor=#222222 NOWRAP><input type=submit name=accept style='width:100%;' value='Accept' class=textbox></td></tr></form>";}}

echo'</table>';}?>
<br>
<br><?if(($rankid >= '25')||($senior > '0')){echo"<center><form method=post><input type=submit name=deleteall value='Delete Posts' class=textbox></center><br></form>";}?>
<br><div align=left><font color=white face=verdana size=1>Update: You now only need <b>3</b> people in your team before it can be commited</font></div>
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

$getposts = mysql_query("SELECT * FROM forumposts WHERE type = 'or' ORDER BY id DESC");

while($getpostsarray = mysql_fetch_array($getposts))
{
$postname = $getpostsarray['username'];
$postid = $getpostsarray['id'];
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
$time = $getpostsarray['time'];

if($rankcolor == '100'){$color = "<font color=red face=verdana size=1><b>$postname</b></font>";} 
elseif($rankcolor == '75'){$color = "<font color=khaki face=verdana size=1><b>$postname</b></font>";} 
elseif($rankcolor == '50'){$color = "<font color=blue face=verdana size=1><b>$postname</b></font>";} 
else{$color = "<font color=#333333 face=verdana size=1>$postname</font>";} 
?>
<table align=center width=100% cellpadding=0 cellspacing=0><tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP>
<table width=100% cellpadding=0 cellspacing=0><tr><td align=left><a href=viewprofile.php?username=<? echo $postname?>><? echo $color; ?></a><? if($playerrank == '100'){echo"<a href=viewtopic.php?topicid=$topicid&deletepost=$postid><font color=white face=verdana size=1> (Delete)</font></a>";}?></td><td align=right><font color=silver face=verdana size=1><?echo$time;?> </font><font color=white face=verdana size=1>| </font><a href=or.php?inviteuser=<?echo$postname;?>>Invite User</a></td></tr></table>

</td><td width=8 height=22 background=/more/topright.png></td></tr><tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>

<? if($countthree > '20'){echo"This user tried to post more than 20 smilies, this is <b>NOT</b> allowed";
}else{echo nl2br($postinfo);} ?>

</font><br></td><td width=8 background=/more/rightb.png NOWRAP></td></tr><tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr></table>
<?

}
?>

<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<center><form action="" method="post" name="smiley"><font color="white" face="verdana" size="1">Post comment</font><br><textarea name="newpost" cols="42" rows="11" class="textbox" id ="newpost">
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
<? include 'rightmenu.php'; ?>
</td>
</tr>
</table>

</body></html>