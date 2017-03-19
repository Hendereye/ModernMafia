<? include 'included.php'; ?>

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



$tyn = rand(0,10);
if($tyn == '3'){
$deleteqsql = mysql_query("SELECT id FROM forumposts WHERE type = 'hdo' ORDER BY time ASC LIMIT 20,100");
while($deleteqarray = mysql_fetch_array($deleteqsql))
{$idq = $deleteqarray['id'];
$deleteq = mysql_query("DELETE FROM forumposts WHERE id = '$idq' AND type = 'hdo");}}

$poster = $_GET['deletepost'];
$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$nameraw = mysql_real_escape_string($_POST['name']);
$demotehdoraw = mysql_real_escape_string($_POST['demotehdo']);
$sessionid = preg_replace($saturate,"",$sessionidraw);
$deletepost = preg_replace($saturated,"",$poster);
$name = preg_replace($saturate,"",$nameraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$gangsterusername = $usernameone;

$playerarray = $statustesttwo;
$playerrank = $playerarray['rankid'];
$thdotestnumrows = $playerarray['thdo'];


$hdotestnumrows = $hdo;



$newqraw = mysql_real_escape_string($_POST['newq']);
$newq = htmlentities($newqraw, ENT_QUOTES);


if($gangsterusername == 'Danny'){
if(isset($_GET['deletepost'])) { 
mysql_query("DELETE FROM forumposts WHERE type = 'hdo' AND id = '$deletepost'");
}
}



if(isset($_POST['dopost'])) { 



$mutedusernamesql = mysql_query("SELECT username,ip FROM muted WHERE username = '$gangsterusername'")or die(mysql_error());
$mutedusernamerows = mysql_num_rows($mutedusernamesql);
$mutedusernamearray = mysql_fetch_array($mutedusernamesql);
$mutedusernameone = $mutedusernamearray['username'];
$mutedipone = $mutedusernamearray['ip'];

$mutedipsql = mysql_query("SELECT username,ip FROM muted WHERE ip = '$userip'")or die(mysql_error());
$mutediprows  = mysql_num_rows($mutedipsql);
$mutediparray = mysql_fetch_array($mutedipsql);
$mutedusernametwo = $mutediparray['username'];
$mutediptwo = $mutediparray['ip'];

if($mutedusernamerows > '0'){die("<font color=white face=verdana size=1>Username: <b>$mutedusernameone</b> and IP: <b>$mutedipone</b> have been muted! Contact a member of <b>The Society</b> to be unmuted!");}
elseif($mutediprows > '0'){die("<font color=white face=verdana size=1>Username: <b>$mutedusernametwo</b> and IP: <b>$mutediptwo</b> have been muted! Contact a member of <b>The Society</b> to be unmuted!");}


if(!$newq){}
else{if(($playerrank < '25')&&($hdotestnumrows < '1')&&($thdotestnumrows < '1')){mysql_query("UPDATE hdonew SET number = (number + 1)");}
mysql_query("INSERT INTO forumposts(username,topicid,ip,type,post,rankid)
VALUES ('$gangsterusername','$topicid','$userip','hdo','$newq','$myrank')");
mysql_query("UPDATE users SET posts = (posts + 1) WHERE ID = '$ida'");
echo'<font color=white face=verdana size=1>Your question has been submitted, please wait for a HDO to reply to your question.</font>';}}

if($name){
$exist = mysql_query("SELECT * FROM users WHERE username = '$name'");
$exista = mysql_num_rows($exist);
$namearray = mysql_fetch_array($exist);
$namerank = $namearray['rankid'];

$muteuserchecktwo = mysql_query("SELECT * FROM muted WHERE username = '$name'");
$muteusertwo = mysql_num_rows($muteuserchecktwo);
}


if(($playerrank == '100')||($playerrank == '65')||($playerrank == '50')||($playerrank == '25')||($hdotestnumrows > '0')){
if(isset($_POST['domute'])) { 
if(!$name){}
elseif($exista < '1'){echo'<font color=white face=verdana size=1>No such user!</font>';}
elseif($namerank >= '25'){echo'<font color=white face=verdana size=1>No.</font>';}
elseif($muteusertwo != '0'){echo'<font color=white face=verdana size=1>User is already muted!</font>';}
else{

$getipsql = mysql_query("SELECT * FROM users WHERE username = '$name'");
$getiparray = mysql_fetch_array($getipsql);
$muteip = $getiparray['latestip']; 
if($muteip == '77.96.49.94'){}else{
mysql_query("INSERT INTO muted(username,ip,mutedby,mutedbyip)
VALUES ('$name','$muteip','$gangsterusername','$userip')");

mysql_query("UPDATE forumposts SET type = 'muted' WHERE username = '$name'");


echo"<font color=white face=verdana size=1>Player <b>$name</b> has been muted!</font>";}}}
elseif(isset($_POST['perm'])) { 

$permcheck = mysql_query("SELECT * FROM permission WHERE username = '$name'");
$perm = mysql_num_rows($permcheck);


if(!$name){}
elseif($exista < '1'){echo'<font color=white face=verdana size=1>No such user!</font>';}
elseif($perm != '0'){echo'<font color=white face=verdana size=1>User already has permission!</font>';}
else{
$getipsql = mysql_query("SELECT latestip FROM users WHERE ID = '$ida'");
$getiparray = mysql_fetch_array($getipsql);
$ip = $getiparray['latestip']; 
mysql_query("INSERT INTO permission(username,gaveby,gavebyip)
VALUES ('$name','$gangsterusername','$ip')");
echo"<font color=white face=verdana size=1>Player <b>$name</b> can now message <b>Avalaunch & Blank</b>!</font>";}}}

if(($playerrank >= '25')||($senior > '0')){
if(isset($_POST['unmute'])) { 
if(!$name){}
elseif($exista < '1'){echo'<font color=white face=verdana size=1>No such user!</font>';}
elseif($muteusertwo == '0'){echo'<font color=white face=verdana size=1>User is not muted!</font>';}
else{
mysql_query("DELETE FROM muted WHERE username = '$name'");
echo"<font color=white face=verdana size=1>Player <b>$name</b> is no longer muted!</font>";
}}}


$promotechecksql = mysql_query("SELECT * FROM users WHERE username = '$name'");
$promotecheck= mysql_num_rows($promotechecksql);
$demotechecksql = $demotechecksql;
$demotecheck= $promotechecksql;
$tdemotechecksql = $promotechecksql;
$demotechecksql = $promotechecksql;
$tdemotecheck= $promotechecksql;
$tpromotechecksqltwo = mysql_query("SELECT * FROM traineehdos WHERE username = '$name'");
$tpromotechecktwo = mysql_num_rows($tpromotechecksqltwo);

if($playerrank >= '50'){

if(isset($_POST['promotehdo'])){ 



$promotechecksql = mysql_query("SELECT * FROM users WHERE username = '$name'");
$promotecheck= mysql_num_rows($promotechecksql);


if(!$name){}
elseif($promotecheck < '1'){echo'<font color=white face=verdana size=1>No such user!</font>';}
else{
$promotearray = mysql_fetch_array($promotechecksql);
$promotename = $promotearray['username']; 
mysql_query("INSERT INTO senior(username)
VALUES ('$promotename')");
echo"<font color=white face=verdana size=1>Username: <b>$promotename</b> is now a SENIOR HDO, <b>YOU</b> now take full responsibility for this players actions!</font>";
}}


elseif(isset($_POST['demotehdo'])) { 

$tpromotechecksqltwo = mysql_query("SELECT * FROM senior WHERE username = '$name'");
$tpromotechecktwo = mysql_num_rows($tpromotechecksqltwo);


if(!$name){}
elseif($tdemotecheck < '1'){echo'<font color=white face=verdana size=1>No such user!</font>';}
elseif($tpromotechecktwo < '1'){echo'<font color=white face=verdana size=1>No such hdo!</font>';}
else{
$demotearray = mysql_fetch_array($demotechecksql);
$demotename = $demotearray['username']; 
mysql_query("DELETE FROM senior WHERE username = '$demotename'");
echo"<font color=white face=verdana size=1>Username: <b>$demotename</b> is no longer a Senior HDO!</font>";}}




if(isset($_POST['dop'])){ 
if(!$name){}
elseif($promotecheck < '1'){echo'<font color=white face=verdana size=1>No such user!</font>';}
else{
$promotearray = mysql_fetch_array($promotechecksql);
$promotename = $promotearray['username']; 
mysql_query("INSERT INTO hdos(username,promotedby,promotedbyip)
VALUES ('$promotename','$gangsterusername','$userip')");mysql_query("UPDATE users SET hdo = '1' WHERE username = '$promotename'");
echo"<font color=white face=verdana size=1>Username: <b>$promotename</b> is now a HDO, <b>YOU</b> now take full responsibility for this players actions!</font>";
}}
elseif(isset($_POST['tdop'])){ 
if(!$name){}
elseif($promotecheck < '1'){echo'<font color=white face=verdana size=1>No such user!</font>';}
else{
$promotearray = mysql_fetch_array($promotechecksql);
$promotename = $promotearray['username']; 
mysql_query("INSERT INTO traineehdos(username,promotedby,promotedbyip)
VALUES ('$promotename','$gangsterusername','$userip')");mysql_query("UPDATE users SET thdo = '1' WHERE username = '$promotename'");
echo"<font color=white face=verdana size=1>Username: <b>$promotename</b> is now a Trainee HDO, <b>YOU</b> now take full responsibility for this players actions!</font>";
}}
elseif(isset($_POST['dod'])) { 
if(!$name){}
elseif($demotecheck < '1'){echo'<font color=white face=verdana size=1>No such user!</font>';}
else{
$demotearray = mysql_fetch_array($demotechecksql);
$demotename = $demotearray['username']; 
mysql_query("UPDATE users SET hdo = '0' WHERE username = '$demotename'");
mysql_query("DELETE FROM hdos WHERE username = '$demotename'");
echo"<font color=white face=verdana size=1>Username: <b>$demotename</b> is no longer a HDO!</font>";}}
elseif(isset($_POST['tdod'])) { 
if(!$name){}
elseif($tdemotecheck < '1'){echo'<font color=white face=verdana size=1>No such user!</font>';}
else{
$demotearray = mysql_fetch_array($demotechecksql);
$demotename = $demotearray['username']; 
mysql_query("DELETE FROM traineehdos WHERE username = '$demotename'");mysql_query("UPDATE users SET thdo = '0' WHERE username = '$demotename'");
echo"<font color=white face=verdana size=1>Username: <b>$demotename</b> is no longer a Trainee HDO!</font>";}}}

if(isset($_POST['deleteall'])) { 
if($playerrank < '50'){}
else{mysql_query("DELETE FROM forumposts WHERE type = 'hdo'");
echo"<font color=white face=verdana size=1>Posts deleted!</font>";}}

?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><b><center>Helpdesk</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<center>
<form action="" method="post" name="smiley"><br><font color="white" face="verdana" size="1"><i>Question here</i></font><br><textarea name="newq" cols="70" rows="7" class="textbox" id ="newpost">
</textarea><br><a onClick="emotion(':arrow:')" style="cursor: pointer;"><img src="/more/smiles/arrow.gif" border=0></a><a onClick="emotion(':D')" style="cursor: pointer;"><img src="/more/smiles/biggrin.gif" border=0></a><a onClick="emotion(':S')" style="cursor: pointer;"><img src="/more/smiles/confused.gif" border=0></a><a onClick="emotion(':cry:')" style="cursor: pointer;"><img src="/more/smiles/cry.gif" border=0></a><a onClick="emotion('8)')" style="cursor: pointer;"><img src="/more/smiles/cool.gif" border=0></a><a onClick="emotion('8|')" style="cursor: pointer;"><img src="/more/smiles/eek.gif" border=0></a><a onClick="emotion(':evil:')" style="cursor: pointer;"><img src="/more/smiles/evil.gif" border=0></a><a onClick="emotion(':!:')" style="cursor: pointer;"><img src="/more/smiles/exclaim.gif" border=0></a><a onClick="emotion(':idea:')" style="cursor: pointer;"><img src="/more/smiles/idea.gif" border=0></a><a onClick="emotion(':lol:')" style="cursor: pointer;"><img src="/more/smiles/lol.gif" border=0></a><a onClick="emotion(':mad:')" style="cursor: pointer;"><img src="/more/smiles/mad.gif" border=0></a><a onClick="emotion(':?:')" style="cursor: pointer;"><img src="/more/smiles/question.gif" border=0></a><a onClick="emotion(':redface:')" style="cursor: pointer;"><img src="/more/smiles/redface.gif" border=0></a><a onClick="emotion(':rolleyes:')" style="cursor: pointer;"><img src="/more/smiles/rolleyes.gif" border=0></a><a onClick="emotion(':(')" style="cursor: pointer;"><img src="/more/smiles/sad.gif" border=0></a><a onClick="emotion(':)')" style="cursor: pointer;"><img src="/more/smiles/smile.gif" border=0></a><a onClick="emotion(':o')" style="cursor: pointer;"><img src="/more/smiles/surprised.gif" border=0></a><a onClick="emotion(':P')" style="cursor: pointer;"><img src="/more/smiles/toungue.gif" border=0></a><a onClick="emotion(':twisted:')" style="cursor: pointer;"><img src="/more/smiles/twisted.gif" border=0></a><a onClick="emotion(';)')" style="cursor: pointer;"><img src="/more/smiles/wink.gif" border=0></a><a onClick="emotion(':tdn:')" style="cursor: pointer;"><img src="/more/smiles/tdown.gif" border=0></a><a onClick="emotion(':tup:')" style="cursor: pointer;"><img src="/more/smiles/tup.gif" border=0></a><br>
<input type ="submit" value="Submit question!" class="textbox" name="dopost"></form></center>
<?if(($playerrank == '100')||($playerrank == '75')||($playerrank == '50')||($playerrank == '25')||($hdotestnumrows > '0')){echo'<form action="" method="post"><center><font color=white face=verdana size=1>Username:</font><br><input type="text" name="name" class="textbox">';}?><br><? 
if(($playerrank >= '25')||($hdotestnumrows > '0')){echo"<font color=white face=verdana size=1>Tools:</font><br><input type=\"submit\" name=\"perm\" class=\"textbox\" value=\"Permission to message Admins\"><br><input type=\"submit\" name=\"domute\" class=\"textbox\" value=\"Mute player\">";}
if(($playerrank >= '25')||($senior > '0')){echo"<input type=\"submit\" name=\"unmute\" class=\"textbox\" value=\"Unmute player\">";}
if($playerrank >= '50'){echo"<br><input type=\"submit\" name=\"dop\" class=\"textbox\" value=\"Promote HDO\"><input type=\"submit\" name=\"dod\" class=\"textbox\" value=\"Demote HDO\"><br><input type=\"submit\" name=\"promotehdo\" class=\"textbox\" value=\"Promote Senior HDO\"><input type=\"submit\" name=\"demotehdo\" class=\"textbox\" value=\"Demote Senior HDO\"><br><input type=\"submit\" name=\"tdop\" class=\"textbox\" value=\"Promote Trainee HDO\"><input type=\"submit\" name=\"tdod\" class=\"textbox\" value=\"Demote Trainee HDO\">";}?>
<?if($playerrank >= '50'){echo"<input type=submit name=deleteall value='Delete Posts' class=textbox>";}?>
</center></form>
<br><table width="98%" cellpadding="0" cellspacing="0" align="center"><tr><td height="1" bgcolor="#444444"></td></tr><td height="11"></td></tr></table>
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
$getposts = mysql_query("SELECT * FROM forumposts WHERE type = 'hdo' ORDER BY id DESC LIMIT 0,35");

if(($playerrank == '100')||($playerrank == '65')||($playerrank == '50')||($playerrank == '25')||($hdotestnumrows > '0')|| ($thdotestnumrows > '0')){
while($getpostsarray = mysql_fetch_array($getposts))
{
$postname = $getpostsarray['username'];
$postid = $getpostsarray['id'];
$postinforawa = html_entity_decode($getpostsarray['post'], ENT_QUOTES);
$postinforawb = $postinforawa;

$zpattern[a] = "<";
$zpattern[b] = ">";

$zreplace[a] = "&lt;";
$zreplace[b] = "&gt;";

$i = 0;
$while = mysql_query("SELECT word FROM blacklist");
while ($all = mysql_fetch_array($while)){
$i = $i + 1;
$zpattern[$i] = $all['word'];
$zreplace[$i] = "mafiansociety";}

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
$postinfo = str_replace($fpattern, $freplace, $postinforawb, $countthree);

$rankcolor = $getpostsarray['rankid'];

if($rankcolor == '100'){$color = "<font color=red face=verdana size=1><b>$postname</b></font>";} 
elseif($rankcolor == '75'){$color = "<font color=plum face=verdana size=1><b>$postname</b></font>";} 
elseif($rankcolor == '65'){$color = "<font color=#00ccff face=verdana size=1><b>$postname</b></font>";} 
elseif($rankcolor == '50'){$color = "<font color=blue face=verdana size=1><b>$postname</b></font>";} 
elseif($rankcolor == '25'){$color = "<font color=yellow face=verdana size=1><b>$postname</b></font>";} 
else{$color = "<font color=#333333 face=verdana size=1>$postname</font>";} 
?>
<table align=center width=100% cellpadding=0 cellspacing=0><tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP><a href=viewprofile.php?username=<? echo $postname?>><? echo $color; ?></a><? if($gangsterusername == 'RaeqwoN'){echo"<a href=helpdesk.php?deletepost=$postid><font color=white face=verdana size=1> (Delete)</font></a>";}?></td><td width=8 height=22 background=/more/topright.png></td></tr><tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>
<? if($countthree > '20'){echo"This user tried to post more than 20 smilies, this is <b>NOT</b> allowed";
}else{echo nl2br($postinfo);} ?></font><br><br>
<table width="98%" cellpadding="0" cellspacing="0" align="center"><tr><td height="1" bgcolor="#444444"></td></tr><td height="11"></td></tr></table>
<a href=send.php?ticket=<? echo $postid; ?>><font color=white face=verdana size=1>&nbsp;Answer</a></font></td>
<td width=8 background=/more/rightb.png NOWRAP></td></tr><tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr></table>
<? }} ?>

</td>
<td width="250" valign="top">
<? include 'rightmenu.php'; ?>
</td>
</tr>
</table>

</body></html>