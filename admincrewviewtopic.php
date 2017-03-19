<? include 'included.php'; ?>

<html>
<head>
<title>Immaculate Gangsters</title><link rel="stylesheet" href="more/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
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
if($myrank < '50'){die(' ');}


$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$topicidraw = $_GET['topicid'];
$poster = $_GET['deletepost'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$topicid = preg_replace($saturated,"",$topicidraw);
$deletepost = preg_replace($saturated,"",$poster);
$userip = $_SERVER[REMOTE_ADDR]; 
$gangsterusername = $usernameone;

$time = time();
$edittopicraw= $_POST['edittopic'];
$edittopic = htmlentities($edittopicraw , ENT_QUOTES);
$crewid= $_GET['crewid'];


$playerarray = $statustesttwo;
$playerrank = $playerarray['rankid'];





$crewboss = 1;


$editsql = mysql_query("SELECT * FROM forumtopics WHERE topicid = '$topicid' AND type = '$crewid'");
$editarray = mysql_fetch_array($editsql);
$editname = $editarray['creator'];

if(($rankid == '100')||($editname == $gangsterusername)){
if(isset($_POST['edit'])) { if(!$edittopic){}else{
mysql_query("UPDATE forumtopics SET info = '$edittopic' WHERE topicid = '$topicid' AND type = '$crewid'");
}}}



$newpostraw = $_POST['newpost'];
$newpost = htmlentities($newpostraw, ENT_QUOTES);

$topiccheck = mysql_num_rows($editsql);

$gettopicidarray = $editarray;
$topictitleraw = html_entity_decode($gettopicidarray['title'], ENT_NOQUOTES);
$topiccreator = $gettopicidarray['creator'];
$topicinforaw = html_entity_decode($gettopicidarray['info'], ENT_NOQUOTES);
$toplocked = $gettopicidarray['locked'];

$zpattern[a] = "<";
$zpattern[b] = ">";

$zreplace[a] = "&lt;";
$zreplace[b] = "&gt;";

$i = 0;
$while = mysql_query("SELECT word FROM blacklist");
while ($all = mysql_fetch_array($while)){
$i = $i + 1;
$zpattern[$i] = $all['word'];
$zreplace[$i] = "mafiasociety";}

$topictitleraw = str_replace($zpattern,$zreplace,$topictitleraw);

$apattern[1] = "/\[b\](.*?)\[\/b\]/is";
$apattern[2] = "/\[u\](.*?)\[\/u\]/is";
$apattern[3] = "/\[i\](.*?)\[\/i\]/is";
$apattern[5] = "/\[color=(.*?)\](.*?)\[\/color\]/is";
$apattern[13] = "/\[s\](.*?)\[\/s\]/is";

$areplace[1] = "<b>$1</b>";
$areplace[2] = "<u>$1</u>";
$areplace[3] = "<i>$1</i>";
$areplace[5] = "<font color=\"$1\">$2</font>";
$areplace[13] = "<s>$1</s>";


$topictitlerawa = preg_replace($apattern,$areplace,$topictitleraw);

$bpattern[1] = ":arrow:";
$bpattern[2] = ":D";
$bpattern[3] = ":S";
$bpattern[4] = "8)";
$bpattern[5] = ":cry:";
$bpattern[6] = "8|";
$bpattern[7] = ":evil:";
$bpattern[8] = ":!:";
$bpattern[9] = ":idea:";
$bpattern[10] = ":lol:";
$bpattern[11] = ":mad:";
$bpattern[12] = ":?:";
$bpattern[13] = ":redface:";
$bpattern[14] = ":rolleyes:";
$bpattern[15] = ":(";
$bpattern[16] = ":)";
$bpattern[17] = ":o";
$bpattern[18] = ":tdn:";
$bpattern[19] = ":P";
$bpattern[20] = ":tup:";
$bpattern[21] = ":twisted:";
$bpattern[22] = ";)";
$bpattern[23] = ":gettofuck:";
$bpattern[24] = ":coolio:";

$breplace[1] = '<img src=/more/smiles/arrow.gif>';
$breplace[2] = '<img src=/more/smiles/biggrin.gif>';
$breplace[3] = '<img src=/more/smiles/confused.gif>';
$breplace[4] = '<img src=/more/smiles/cool.gif>';
$breplace[5] = '<img src=/more/smiles/cry.gif>';
$breplace[6] = '<img src=/more/smiles/eek.gif>';
$breplace[7] = '<img src=/more/smiles/evil.gif>';
$breplace[8] = '<img src=/more/smiles/exclaim.gif>';
$breplace[9] = '<img src=/more/smiles/idea.gif>';
$breplace[10] = '<img src=/more/smiles/lol.gif>';
$breplace[11] = '<img src=/more/smiles/mad.gif>';
$breplace[12] = '<img src=/more/smiles/question.gif>';
$breplace[13] = '<img src=/more/smiles/redface.gif>';
$breplace[14] = '<img src=/more/smiles/rolleyes.gif>';
$breplace[15] = '<img src=/more/smiles/sad.gif>';
$breplace[16] = '<img src=/more/smiles/smile.gif>';
$breplace[17] = '<img src=/more/smiles/surprised.gif>';
$breplace[18] = '<img src=/more/smiles/tdown.gif>';
$breplace[19] = '<img src=/more/smiles/toungue.gif>';
$breplace[20] = '<img src=/more/smiles/tup.gif>';
$breplace[21] = '<img src=/more/smiles/twisted.gif>';
$breplace[22] = '<img src=/more/smiles/wink.gif>';
$breplace[23] = '<img src=/more/smiles/fun.gif>';
$breplace[24] = '<img src=/more/smiles/fun.gif>';


$topictitleadmin = str_replace($bpattern, $breplace, $topictitlerawa);


$topicinforawz = str_replace($zpattern,$zreplace,$topicinforaw);

$dpattern[1] = "/\[b\](.*?)\[\/b\]/is";
$dpattern[2] = "/\[u\](.*?)\[\/u\]/is";
$dpattern[3] = "/\[i\](.*?)\[\/i\]/is";
$dpattern[4] = "/\[center\](.*?)\[\/center\]/is";
$dpattern[5] = "/\[color=(.*?)\](.*?)\[\/color\]/is";
$dpattern[6] = "/\[img\](.*?)\[\/img\]/is";
$dpattern[7] = "/\[font=(.*?)\](.*?)\[\/font\]/is";
$dpattern[8] = "/\[br\]/is";
$dpattern[9] = "/\[size=(.*?)\](.*?)\[\/size\]/is";
$dpattern[10] = "/\[quote\](.*?)\[\/quote\]/is";
$dpattern[11] = "/\[left\](.*?)\[\/left\]/is";
$dpattern[12] = "/\[right\](.*?)\[\/right\]/is";
$dpattern[13] = "/\[s\](.*?)\[\/s\]/is";
$dpattern[14] = "/\[2872267\](.*?)\[\/2872267\]/is";
$dpattern[15] = "/\[fuck1\](.*?)\[\/fuck1\]/is";

$dreplace[1] = "<b>$1</b>";
$dreplace[2] = "<u>$1</u>";
$dreplace[3] = "<i>$1</i>";
$dreplace[4] = "<center>$1</center>";
$dreplace[5] = "<font color=\"$1\">$2</font>";
$dreplace[6] = "<img src=\"$1\">";
$dreplace[7] = "<font face=\"$1\">$2</font>";
$dreplace[8] = "<br>";
$dreplace[9] = "<font size=\"$1\">$2</font><font size=\"1\">";
$dreplace[10] = "<blockquote><b>$1</b></blockquote>";
$dreplace[11] = "<div align=\"left\">$1</div>";
$dreplace[12] = "<div align=\"right\">$1</div>";
$dreplace[13] = "<s>$1</s>";
$dreplace[14] = "<object width=315 height=225><param name=movie value=http://www.youtube.com/v/$1&autoplay=1></param><param name=wmode value=transparent></param><embed src=http://www.youtube.com/v/$1&autoplay=1 type=application/x-shockwave-flash wmode=transparent width=325 height=250></embed></object>";
$dreplace[15] = "<a href=http://$1>$1</a>";

$topicinfoa = preg_replace($dpattern,$dreplace,$topicinforawz);

$cpattern[1] = ":arrow:";
$cpattern[2] = ":D";
$cpattern[3] = ":S";
$cpattern[4] = "8)";
$cpattern[5] = ":cry:";
$cpattern[6] = "8|";
$cpattern[7] = ":evil:";
$cpattern[8] = ":!:";
$cpattern[9] = ":idea:";
$cpattern[10] = ":lol:";
$cpattern[11] = ":mad:";
$cpattern[12] = ":?:";
$cpattern[13] = ":redface:";
$cpattern[14] = ":rolleyes:";
$cpattern[15] = ":(";
$cpattern[16] = ":)";
$cpattern[17] = ":o";
$cpattern[18] = ":tdn:";
$cpattern[19] = ":P";
$cpattern[20] = ":tup:";
$cpattern[21] = ":twisted:";
$cpattern[22] = ";)";
$cpattern[23] = ":sitehits:";
$cpattern[24] = ":gettofuck:";
$cpattern[25] = ":coolio:";

$creplace[1] = '<img src=/more/smiles/arrow.gif>';
$creplace[2] = '<img src=/more/smiles/biggrin.gif>';
$creplace[3] = '<img src=/more/smiles/confused.gif>';
$creplace[4] = '<img src=/more/smiles/cool.gif>';
$creplace[5] = '<img src=/more/smiles/cry.gif>';
$creplace[6] = '<img src=/more/smiles/eek.gif>';
$creplace[7] = '<img src=/more/smiles/evil.gif>';
$creplace[8] = '<img src=/more/smiles/exclaim.gif>';
$creplace[9] = '<img src=/more/smiles/idea.gif>';
$creplace[10] = '<img src=/more/smiles/lol.gif>';
$creplace[11] = '<img src=/more/smiles/mad.gif>';
$creplace[12] = '<img src=/more/smiles/question.gif>';
$creplace[13] = '<img src=/more/smiles/redface.gif>';
$creplace[14] = '<img src=/more/smiles/rolleyes.gif>';
$creplace[15] = '<img src=/more/smiles/sad.gif>';
$creplace[16] = '<img src=/more/smiles/smile.gif>';
$creplace[17] = '<img src=/more/smiles/surprised.gif>';
$creplace[18] = '<img src=/more/smiles/tdown.gif>';
$creplace[19] = '<img src=/more/smiles/toungue.gif>';
$creplace[20] = '<img src=/more/smiles/tup.gif>';
$creplace[21] = '<img src=/more/smiles/twisted.gif>';
$creplace[22] = '<img src=/more/smiles/wink.gif>';
$creplace[23] = "$hits";
$creplace[24] = '<img src=/more/smiles/fu.gif>';
$creplace[25] = '<img src=/more/smiles/fun.gif>';


$topicinfo = str_replace($cpattern,$creplace,$topicinfoa);


$toplocked = $gettopicidarray['locked'];
$creatorrank = $gettopicidarray['rankid'];

if($creatorrank >= 25)
{$topictitle = $topictitleadmin;}else{$topictitle = $topictitleraw;}


if(isset($_POST['dopost'])) { 
if(!$newpost){}
elseif($toplocked == 'yes'){echo"<font color=red face=verdana size=1><b>This topic has been locked!</b></font>";}
elseif($topiccheck == '0'){echo"<font color=red face=verdana size=1><b>No such topic!</b></font>";}
else{
mysql_query("UPDATE forumtopics SET time = '$time' WHERE topicid = '$topicid' AND type = '$crewid'");
mysql_query("INSERT INTO forumposts(username,topicid,ip,type,post,rankid)
VALUES ('$gangsterusername','$topicid','$userip','$crewid','$newpost','$myrank')");
mysql_query("UPDATE users SET posts = (posts + 1) WHERE ID = '$ida'");
mysql_query("UPDATE forumtopics SET posts = (posts + 1) WHERE topicid = '$topicid'");}
}


if(($rankid == '100')||($rankid == '75')||($rankid == '50')||($crewboss > '0')){
if(isset($_POST['delete'])) { 
mysql_query("DELETE FROM forumtopics WHERE type = '$crewid' AND topicid = '$topicid'");
mysql_query("DELETE FROM forumposts WHERE type = '$crewid' AND topicid = '$topicid'");
}
}

if(($rankid == '100')||($rankid == '75')||($rankid == '50')||($crewboss > '0')){
if(isset($_POST['sticky'])) { 
mysql_query("UPDATE forumtopics SET id = '2' WHERE topicid = '$topicid' AND type = '$crewid'");
}
}

if(($rankid == '100')||($rankid == '75')||($rankid == '50')||($crewboss > '0')){
if(isset($_POST['important'])) { 
mysql_query("UPDATE forumtopics SET id = '3' WHERE topicid = '$topicid' AND type = '$crewid'");
}
}


if($rankid == '100'){
if(isset($_POST['update'])) { 
mysql_query("UPDATE forumtopics SET id = '4' WHERE topicid = '$topicid' AND type = '$crewid'");
}
}


if(($rankid == '100')||($rankid == '75')||($rankid == '50')||($crewboss > '0')){
if(isset($_POST['undo'])) { 
mysql_query("UPDATE forumtopics SET id = '1' WHERE topicid = '$topicid' AND type = '$crewid'");
}
}


if(($topiccreator == $gangsterusername)||($rankid == '100')||($rankid == '75')||($rankid == '50')||($crewboss > '0')){
if(isset($_POST['lock'])) { mysql_query("UPDATE forumtopics SET locked = 'yes' WHERE topicid = '$topicid' AND type = '$crewid'");}
}


if(($rankid == '100')||($rankid == '75')||($rankid == '50')||($crewboss > '0')){
if(isset($_POST['unlock'])) { mysql_query("UPDATE forumtopics SET locked = 'no' WHERE topicid = '$topicid' AND type = '$crewid'");}
}


$selecterraw = $_POST['select'];
$selecter = preg_replace($saturated,"",$selecterraw);
if(isset($_POST['next'])){$one = $selecter + 1;}
elseif(isset($_POST['previous'])){$one = $selecter - 1;}else{$one = '0';}

$selectfroma = $one * 25;
$selecttoa = $selectfrom + 25;
$selectfrom = preg_replace($saturated,"",$selectfroma);
$selectto = preg_replace($saturated,"",$selecttoa);


if($rankid == '100'){
if(isset($_GET['deletepost'])) { 
mysql_query("DELETE FROM forumposts WHERE type = '$crewid' AND topicid = '$topicid' AND id = '$deletepost'");
}
}



$gettopicid = mysql_query("SELECT * FROM forumtopics WHERE topicid = '$topicid' AND type = '$crewid'");
$gettopicidarray = mysql_fetch_array($gettopicid);
$topictitleraw = html_entity_decode($gettopicidarray['title'], ENT_NOQUOTES);
$topiccreator = $gettopicidarray['creator'];
$topicinforaw = html_entity_decode($gettopicidarray['info'], ENT_NOQUOTES);
$topictitleraw = str_replace($zpattern,$zreplace,$topictitleraw);
$topictitlerawa = preg_replace($apattern,$areplace,$topictitleraw);
$topictitleadmin = str_replace($bpattern, $breplace, $topictitlerawa);
$topicinforawz = str_replace($zpattern,$zreplace,$topicinforaw);
$topicinfoa = preg_replace($dpattern,$dreplace,$topicinforawz);
$topicinfo = str_replace($cpattern,$creplace,$topicinfoa);

?><a href=admincrewforum.php?crewid=<?echo$crewid;?>>Go back</a><br>
<table align="center" width="100%" cellpadding="0" cellspacing="0"><tr><td width="8" height="22" background="/more/topleft.png"></td><td height="22" background="/more/top.png" NOWRAP><font color="silver" face="verdana" size="1"><? if($countone > '20'){echo'This user tried to post more than 20 smilies, this is <b>NOT</b> allowed';}else{echo $topictitle;} ?>&nbsp;</font><a href="viewprofile.php?username=<? echo $topiccreator; ?>"><? if($creatorrank == '100'){echo"<b><font color=red face=verdana size=1>$topiccreator</font></b>";}
else{echo"<font color=gray face=verdana size=1>$topiccreator</font>";}?></td><td width="8" height="22" background="/more/topright.png"></td></tr><tr><td width="8" background="/more/leftb.png" NOWRAP></td><td background="/more/crossbg.png"><font color="white" face="verdana" size="1">
<? if($counttwo > '20'){echo'This user tried to post more than 20 smilies, this is <b>NOT</b> allowed';}else{echo nl2br($topicinfo);}?></font><br><br><table width="98%" cellpadding="0" cellspacing="0" align="center"><tr><td height="1" bgcolor="#444444"></td></tr><td height="11"></td></tr></table></td><td width="8" background="/more/rightb.png" NOWRAP></td></tr><tr><td width="8" height="9" background="/more/bottomleft.png"></td><td height="9" background="/more/bottom.png"></td><td width="8" height="9" background="/more/bottomright.png"></td></tr></table>
<?php

$getposts = mysql_query("SELECT * FROM forumposts WHERE topicid = '$topicid' AND type = '$crewid' ORDER BY id DESC LIMIT $selectfrom,$selectto ");

while($getpostsarray = mysql_fetch_array($getposts))
{
$postname = $getpostsarray['username'];
$postid = $getpostsarray['id'];
$postinforawa = html_entity_decode($getpostsarray['post'], ENT_NOQUOTES);
$postinforawb = $postinforawa;



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
$fpattern[23] = ":gettofuck:";
$fpattern[24] = ":coolio:";

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
$freplace[23] = '<img src=/more/smiles/fu.gif>';
$freplace[24] = '<img src=/more/smiles/fun.gif>';

$postinfo = str_replace($fpattern, $freplace, $postinforawb, $countthree);

$rankcolor = $getpostsarray['rankid'];

if($rankcolor == '100'){$color = "<font color=red face=verdana size=1><b>$postname</b></font>";} 
elseif($rankcolor == '75'){$color = "<font color=#00ccff face=verdana size=1><b>$postname</b></font>";} 
elseif($rankcolor == '50'){$color = "<font color=blue face=verdana size=1><b>$postname</b></font>";} 
elseif($rankcolor == '25'){$color = "<font color=yellow face=verdana size=1><b>$postname</b></font>";} 
else{$color = "<font color=#333333 face=verdana size=1>$postname</font>";} 
?>
<table align=center width=100% cellpadding=0 cellspacing=0><tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP><a href=viewprofile.php?username=<? echo $postname?>><? echo $color; ?></a><? if($playerrank == '100'){echo"<a href=viewtopic.php?topicid=$topicid&deletepost=$postid><font color=white face=verdana size=1> (Delete)</font></a>";}?></td><td width=8 height=22 background=/more/topright.png></td></tr><tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>

<? if($countthree > '20'){echo"This user tried to post more than 20 smilies, this is <b>NOT</b> allowed";
}else{echo nl2br($postinfo);} ?>

</font><br></td><td width=8 background=/more/rightb.png NOWRAP></td></tr><tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr></table>
<?}?>
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<center><form action = "admincrewviewtopic.php?topicid=<?echo$topicid;?>&crewid=<?echo$crewid;?>" method = "post">
<?php 
if(($topiccreator == $gangsterusername)||($rankid == '100')||($rankid == '75')||($rankid == '50')||($crewboss > '0')){echo'<br><input type ="submit" value="Lock topic" class="textbox" name="lock">';}
if(($rankid == '100')||($rankid == '75')||($rankid == '50')||($crewboss > '0')){echo'<input type ="submit" value="Unlock topic" class="textbox" name="unlock">';}
if($rankid == '100'){echo'<br><input type ="submit" value="Update topic" class="textbox" name="update">';}
?></form>
<?if(($topiccreator == $gangsterusername)||($rankid == '100')){echo"<form action = 'admincrewedittopic.php?topicid=$topicid&crewid=$crewid' method = post><input type =submit value='Edit topic' class=textbox name=editlink></form>";}
if(($rankid == '100')||($rankid == '75')||($rankid == '50')||($crewboss > '0')){echo"<form action = 'admincrewviewtopic.php?topicid=$topicid&crewid=$crewid' method =post><input type =submit value='Delete topic' class='textbox' name='delete'><input type =submit value='Sticky topic' class=textbox name=sticky><input type =submit value='Important topic' class=textbox name=important><br><input type =submit value='Un important/sticky' class=textbox name=undo></form>";}

?>
<form action="admincrewviewtopic.php?topicid=<?echo$topicid;?>&crewid=<?echo$crewid;?>" method="post" name="smiley"><font color="white" face="verdana" size="1">Post comment</font><br><textarea name="newpost" cols="42" rows="11" class="textbox" id ="newpost">
</textarea><br><a onClick="emotion(':arrow:')" style="cursor: pointer;"><img src="/more/smiles/arrow.gif" border=0></a><a onClick="emotion(':D')" style="cursor: pointer;"><img src="/more/smiles/biggrin.gif" border=0></a><a onClick="emotion(':S')" style="cursor: pointer;"><img src="/more/smiles/confused.gif" border=0></a><a onClick="emotion(':cry:')" style="cursor: pointer;"><img src="/more/smiles/cry.gif" border=0></a><a onClick="emotion('8)')" style="cursor: pointer;"><img src="/more/smiles/cool.gif" border=0></a><a onClick="emotion('8|')" style="cursor: pointer;"><img src="/more/smiles/eek.gif" border=0></a><a onClick="emotion(':evil:')" style="cursor: pointer;"><img src="/more/smiles/evil.gif" border=0></a><a onClick="emotion(':!:')" style="cursor: pointer;"><img src="/more/smiles/exclaim.gif" border=0></a><a onClick="emotion(':idea:')" style="cursor: pointer;"><img src="/more/smiles/idea.gif" border=0></a><a onClick="emotion(':lol:')" style="cursor: pointer;"><img src="/more/smiles/lol.gif" border=0></a><a onClick="emotion(':mad:')" style="cursor: pointer;"><img src="/more/smiles/mad.gif" border=0></a><a onClick="emotion(':?:')" style="cursor: pointer;"><img src="/more/smiles/question.gif" border=0></a><a onClick="emotion(':redface:')" style="cursor: pointer;"><img src="/more/smiles/redface.gif" border=0></a><a onClick="emotion(':rolleyes:')" style="cursor: pointer;"><img src="/more/smiles/rolleyes.gif" border=0></a><a onClick="emotion(':(')" style="cursor: pointer;"><img src="/more/smiles/sad.gif" border=0></a><a onClick="emotion(':)')" style="cursor: pointer;"><img src="/more/smiles/smile.gif" border=0></a><a onClick="emotion(':o')" style="cursor: pointer;"><img src="/more/smiles/surprised.gif" border=0></a><a onClick="emotion(':P')" style="cursor: pointer;"><img src="/more/smiles/toungue.gif" border=0></a><a onClick="emotion(':twisted:')" style="cursor: pointer;"><img src="/more/smiles/twisted.gif" border=0></a><a onClick="emotion(';)')" style="cursor: pointer;"><img src="/more/smiles/wink.gif" border=0></a><a onClick="emotion(':tdn:')" style="cursor: pointer;"><img src="/more/smiles/tdown.gif" border=0></a><a onClick="emotion(':tup:')" style="cursor: pointer;"><img src="/more/smiles/tup.gif" border=0></a><br>
<input type ="submit" value="Post comment" class="textbox" name="dopost"></form></center><center><form action = "admincrewviewtopic.php?topicid=<?echo$topicid;?>&crewid=<?echo$crewid;?>" method = "post"><input type="hidden" name="select" value="<? echo $one; ?>"><?php if($selectfrom != '0'){echo'<input type ="submit" value="Previous page" class="textbox" name="previous">';}?><input type ="submit" value="Next page" class="textbox" name="next"></form></center>


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