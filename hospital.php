<? include 'included.php';


$tyn = rand(0,5);
if($tyn == '3'){
$deletetopicssql = mysql_query("SELECT id FROM forumposts WHERE type = 'hospital' ORDER BY id DESC LIMIT 16,50");
while($deletetopics = mysql_fetch_array($deletetopicssql))
{$dtopicid = $deletetopics['id'];
$deleted = mysql_query("DELETE FROM forumposts WHERE id = '$dtopicid'");}}




$saturate = "/[^a-z0-9]/i";
$allowed = "/[^0-9]/i";
$poster = $_GET['deletepost'];
$deletepost = preg_replace($allowed,"",$poster);
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$gangsterusername = $usernameone;


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
<?

mysql_query("DELETE FROM hospital WHERE hours <= '0'");

 include 'leftmenu.php'; ?>
</td>
<td width="100%" valign="top">

<?


$hchecks = mysql_query("SELECT * FROM hospital WHERE username = '$usernameone'");
$hcheck = mysql_num_rows($hchecks);
if($hcheck != '0'){
$hinfo = mysql_fetch_array($hchecks);
$tomah = time();
$htime = $hinfo['end'];

$hosptime = $htime - $tomah;

$totalh = $hosptime / 3600;
$totalh = floor($totalh);
if($totalh < '10'){$leading = ' ';}
}


$hosp = mysql_query("SELECT username,time,hours FROM hospital WHERE username = '$usernameone'");
while($hospital = mysql_fetch_array($hosp)){
$tem = time();
$pus = $tem + 3600;
$hname = $hospital['username'];
$hospitaltime = $hospital['time'];
$hours = $hospital['hours'];



$healthcheck = mysql_fetch_array(mysql_query("SELECT health,ID FROM users WHERE username = '$hname'"));
$healthc = floor($healthcheck['health']);
$healthid = $healthcheck['ID'];


if($healthc >= '100'){mysql_query("DELETE FROM hospital WHERE username = '$hname'");}
elseif($hospitaltime < $tem){
mysql_query("UPDATE hospital SET hours = hours - 1 WHERE username = '$hname'");


if($healthc >= 90){mysql_query("UPDATE users SET health = '100' WHERE ID = '$healthid'");mysql_query("DELETE FROM hospital WHERE username = '$hname'");}

else{mysql_query("UPDATE users SET health = (health + 10) WHERE ID = '$healthid'");mysql_query("UPDATE hospital SET time = '$pus' WHERE username = '$hname'");}}


}




?>
<?php 
$time = time();
$hospital = $_POST['time'];
$hospitaltime = preg_replace($allowed,"",$hospital);
$hospitaltimes = $hospitaltime * 3600;
$hospitaltimess = $time + $hospitaltimes;

$getuserinfoarray = $statustesttwo;
$getname = $getuserinfoarray['username'];
$health = ceil($getuserinfoarray['health']);
$rankid = $getuserinfoarray['rankid'];


if($rankid == '100'){
if(isset($_GET['deletepost'])) { 
mysql_query("DELETE FROM forumposts WHERE type = 'hospital' AND id = '$deletepost'");
}
}





if(isset($_POST['deleteall'])) { 
if($rankid < '50'){}
else{mysql_query("DELETE FROM forumposts WHERE type = 'hospital'");
echo"<font color=white face=verdana size=1>Posts deleted!</font>";}}


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

$newpostraw = $_POST['newpost'];
$newpost = htmlentities($newpostraw, ENT_QUOTES);
if(isset($_POST['dopost'])) { 
if(!$newpost){}
elseif($mutedusernamerows > '0'){die("<font color=white face=verdana size=1>Username: <b>$mutedusernameone</b> and IP: <b>$mutedipone</b> have been muted! Contact a member of <b>The Society</b> to be unmuted!");}
elseif($mutediprows > '0'){die("<font color=white face=verdana size=1>Username: <b>$mutedusernametwo</b> and IP: <b>$mutediptwo</b> have been muted! Contact a member of <b>The Society</b> to be unmuted!");}
else{
mysql_query("INSERT INTO forumposts(username,topicid,ip,type,post,rankid)
VALUES ('$gangsterusername',' ','$userip','hospital','$newpost','$myrank')");
mysql_query("UPDATE users SET posts = (posts + 1) WHERE username = '$gangsterusername'");}}

if(isset($_POST['time'])) { 
if(!$hospitaltime){}
elseif($hcheck > '0'){echo"<font color=white face=verdana size=1>You are already in the hospital!</font>";}
elseif($hospitaltime > '10'){echo"<font color=white face=verdana size=1>You can only check in the hospital for a maximum of 10 hours!</font>";}
elseif($health >= '100'){echo"<font color=white face=verdana size=1>Your health is already at 100%!</font>";}
elseif($hospitaltime == '0'){}
else{
$tem = time();
$plus = $tem + 3600;
$end = $hospitaltime * 3600 + $tem;
mysql_query("DELETE FROM hospital WHERE username = '$gangsterusername'");
mysql_query("INSERT INTO hospital(username,time,hours,end) VALUES('$gangsterusername','$plus','$hospitaltime','$end')");
echo"<font color=white face=verdana size=1>You checked into the hospital for <b>$hospitaltime</b> hours!</font>";}
}
elseif(isset($_POST['leave'])) { 
if($hcheck == '0'){echo"<font color=white face=verdana size=1>You are not in hospital!</font>";}
else{
mysql_query("DELETE FROM hospital WHERE username = '$gangsterusername'");
echo"<font color=white face=verdana size=1>You left the hospital!</font>";}}


$hchecks = mysql_query("SELECT * FROM hospital WHERE username = '$gangsterusername'");
$hcheck = mysql_num_rows($hchecks);
$hinfo = mysql_fetch_array($hchecks);
$tomah = time();
$htime = $hinfo['end'];

$hosptime = $htime - $tomah;

$totalh = $hosptime / 3600;
$totalh = floor($totalh);
if($totalh < '10'){$leading = 0;}

?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Hospital</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<br><br><center><form action="" method="post">
<? if ($hcheck < 1){?><font color=silver face=verdana size=2>Hours:</font><input maxlength="2" type"text" name="time" class="textbox" style="width:45;"><input type="submit" value="Check in" class="textbox"><?}
else{?><input type="submit" value="Leave hospital" class="textbox" name="leave"><?}?></form></center><br>
<?if($hcheck > '0'){?>
<center><font color ="silver" face="verdana" size="2">Time left in hospital: <b><?echo"$leading";echo"$totalh";echo date( ":i:s", $htime - $time);?></b></font></center><br>
<?}?>

<?if($rankid >= '50'){echo"<center><form method=post><input type=submit name=deleteall value='Delete Posts' class=textbox></center><br></form>";}?>

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

$getposts = mysql_query("SELECT * FROM forumposts WHERE type = 'hospital' ORDER BY id DESC");

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

if($rankcolor == '100'){$color = "<font color=red face=verdana size=1><b>$postname</b></font>";} 
elseif($rankcolor == '75'){$color = "<font color=#00ccff face=verdana size=1><b>$postname</b></font>";} 
elseif($rankcolor == '50'){$color = "<font color=blue face=verdana size=1><b>$postname</b></font>";} 
else{$color = "<font color=#333333 face=verdana size=1>$postname</font>";} 
?>
<table align=center width=100% cellpadding=0 cellspacing=0><tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP><a href=viewprofile.php?username=<? echo $postname?>><? echo $color; ?></a><? if($rankid == '100'){echo"<a href=hospital.php?deletepost=$postid><font color=white face=verdana size=1> (Delete)</font></a>";}?></td><td width=8 height=22 background=/more/topright.png></td></tr><tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>

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

<?
$statustest = mysql_query("SELECT * FROM users WHERE username = '$usernameone'")or die(mysql_error());
$statustesttwo = mysql_fetch_array($statustest);?>
<? include 'rightmenu.php'; ?>
</td>
</tr>
</table>

</body></html>