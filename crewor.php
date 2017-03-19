<? include 'included.php';?>
<?

$tyn = rand(0,5);
if($tyn == '3'){
$deletetopicssql = mysql_query("SELECT id FROM forumposts WHERE type = 'crewor' ORDER BY id DESC LIMIT 16,50");
while($deletetopics = mysql_fetch_array($deletetopicssql))
{$dtopicid = $deletetopics['id'];
$deleted = mysql_query("DELETE FROM forumposts WHERE id = '$dtopicid'");}}


$time = time();
$times = $time + 300;
$jailtime = $time + 120;
$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$getida = mysql_real_escape_string($_GET['dropid']);
$getid = preg_replace($saturated,"",$getida);
$gangsterusername = $usernameone;

$jailtest = mysql_query("SELECT * FROM jail WHERE username  = '$gangsterusername'");
$jailtester = mysql_num_rows($jailtest);
if($jailtester != '0'){die(include 'jail.php'); }

$crewboss = mysql_query("SELECT boss FROM crews WHERE boss = '$gangsterusername'");
$boss = $crewboss;
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
$saturate = "/[^a-z0-9]/i";
$allowed = "/[^0-9]/i";
$time = time();
$sessionidraw = $_COOKIE['PHPSESSID'];
$setrewarda = mysql_real_escape_string($_POST['reward']);
$bustbutton = ceil($time / 20);
$bustraw = mysql_real_escape_string($_POST["$bustbutton"]);
$sessionid = preg_replace($saturate,"",$sessionidraw);
$setreward = preg_replace($allowed,"",$setrewarda);
$bust = preg_replace($allowed,"",$bustraw);
$userip = $_SERVER[REMOTE_ADDR]; 

if($boss < 1){die('<font color=white face=verdana size=1>Your not a crewboss</font>');}

$gangsterusername = $usernameone;

$getuserinfoarray = $statustesttwo;
$getname = $getuserinfoarray['username'];
$rankid = $getuserinfoarray['rankid'];
$crewid = $getuserinfoarray['crewid'];
$add = $getuserinfoarray['addition'];

$crewinfo = mysql_fetch_array(mysql_query("SELECT timer FROM crews WHERE boss = '$gangsterusername'"));
$crewor = $crewinfo['timer'];
$or = $crewor - $time;
if($add = '28800'){
$or = $crewor - $time - 7200;
}

$totalh = $or / 3600;
$totalh = floor($totalh);
if($totalh < '10'){$leading = 0;}


if(isset($_POST['commit'])){
if($or > '0'){
?>
<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png>
<font color=white size=1 face=verdana>You must wait <b>
<? echo"$leading";echo"$totalh";echo date( ":i:s", $crewor - $time);?></b> before you can commit the OR!</font>
</td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>
<?}
else
{

$newtime = $time + 36000;
mysql_query("UPDATE crews SET timer = '$newtime' WHERE boss = '$gangsterusername'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error.</font>');}


$onl = $time - 168400;
$getmembers = mysql_query("SELECT username,rankid,rankup,ID FROM users WHERE crewid = '$crewid' AND status = 'Alive' AND activity >= '$onl'");

while($members = mysql_fetch_array($getmembers)){
$name = $members['username'];
$rank = $members['rankid'];
$rankup = $members['rankup'];
$ids = $members['ID'];

if($rank == '1'){ $update = '99.999';$newrank = 'Citizen';}
elseif($rank == '2'){ $update = '45';$newrank = 'Wise Guy';}
elseif($rank == '3'){ $update = '28';$newrank = 'Thug';}
elseif($rank == '4'){ $update = '16';$newrank = 'Respected Thug';}
elseif($rank == '5'){ $update = '13';$newrank = 'Mobster';}
elseif($rank == '6'){ $update = '9';$newrank = 'Respected Mobster';}
elseif($rank == '7'){ $update = '7';$newrank = 'Assassin';}
elseif($rank == '8'){ $update = '6';$newrank = 'Respected Assassin';}
elseif($rank == '9'){ $update = '4.6';$newrank = 'Mafioso';}
elseif($rank == '10'){ $update = '4.45';$newrank = 'Respected Mafioso';}
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

$sendinfoa = "You successfully committed an organised robbery with your crew!";
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info,color)
VALUES ('$name','$name','2','$userip','$sendinfoa','yes')");

if($rank <= 21){
if(($rankup + $update) > ('100')){
$newrankup = $rankup + $update - 100;
$sendinfo = "You have been promoted to \[b\]$newrank\[\/b\]! Congratulations, you received \[b\]1,000\[\/b\] bullets!";
mysql_query("UPDATE users SET rankid = rankid + 1, rankup = $newrankup, bullets = bullets + 1000 WHERE ID = '$ids'");
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$name','$name','2','$userip','$sendinfo')");}
else{mysql_query("UPDATE users SET rankup = rankup + $update WHERE ID = '$ids'");}}
}
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 1.</font>');}
$moneyrand = mt_rand(100000,400000) * 2;
mysql_query("UPDATE money SET money = (money + $moneyrand)");
$moneyrander = number_format($moneyrand);
echo"<font color=white face=verdana size=1>You and your crew successfully stole $<b>$moneyrander</b>!";
mysql_query("UPDATE users SET money = (money + $moneyrand) WHERE ID = '$ida'");
}}


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

$newpostraw = mysql_real_escape_string($_POST['newpost']);
$newpost = htmlentities($newpostraw, ENT_QUOTES);
if(isset($_POST['dopost'])) { 
if(!$newpost){}
elseif($mutedusernamerows > '0'){die("<font color=white face=verdana size=1>Username: <b>$mutedusernameone</b> and IP: <b>$mutedipone</b> have been muted! Contact a member of <b>The Society</b> to be unmuted!");}
elseif($mutediprows > '0'){die("<font color=white face=verdana size=1>Username: <b>$mutedusernametwo</b> and IP: <b>$mutediptwo</b> have been muted! Contact a member of <b>The Society</b> to be unmuted!");}
else{
mysql_query("INSERT INTO forumposts(username,topicid,ip,type,post,rankid)
VALUES ('$gangsterusername',' ','$userip','crewor','$newpost','$myrank')");
mysql_query("UPDATE users SET posts = (posts + 1) WHERE username = '$gangsterusername'");}}

$crewinfo = mysql_fetch_array(mysql_query("SELECT timer FROM crews WHERE boss = '$gangsterusername'"));
$crewor = $crewinfo['timer'];
$or = $crewor - $time - $chk;
if($add = '28800'){
$or = $crewor - $time - 7200;
}


$totalh = $or / 3600;
$totalh = floor($totalh);
if($totalh == '10'){$leading = ' ';}elseif($totalh <= '9'){$leading = 0;}

?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Crew OR</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png"><br><br>
<center><font color ="white" face="verdana" size="2">Time left before you can commit OR: <?if($or < 1){echo "<b>Available</b>";}
else{echo"$leading";echo"$totalh";echo date( ":i:s", $crewor - $time);}?>
<br><br><form action="" method="post"><input type="submit" name="commit" value="Commit Crew OR!" class="textbox"></form></center><br>
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

$getposts = mysql_query("SELECT * FROM forumposts WHERE type = 'crewor' ORDER BY id DESC");

while($getpostsarray = mysql_fetch_array($getposts))
{
$postname = $getpostsarray['username'];
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
<table align=center width=100% cellpadding=0 cellspacing=0><tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP><a href=viewprofile.php?username=<? echo $postname?>><? echo $color; ?></td><td width=8 height=22 background=/more/topright.png></td></tr><tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>

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