<? include 'included.php';


$tyn = rand(0,5);
if($tyn == '3'){
$deletetopicssql = mysql_query("SELECT topicid FROM forumtopics WHERE id = '1' AND type = 'hdof' ORDER BY time DESC LIMIT 45,100");
while($deletetopics = mysql_fetch_array($deletetopicssql))
{$dtopicid = $deletetopics['topicid'];
$deleted = mysql_query("DELETE FROM forumtopics WHERE topicid = '$dtopicid'");
$deleteda = mysql_query("DELETE FROM forumposts WHERE topicid = '$dtopicid'");}}
 ?>

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
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$gangsterusername = $usernameone;

$playerarray = $statustesttwo;
$playerrank = $myrank;


$hdotestnumrows = $hdo;

if($playerrank >= 25){}
elseif($hdotestnumrows > 0){}
else{die(" ");}

$forumtopicraw = $_POST['newtopic'];
$forumtopicinforaw  = $_POST['newtopicinfo'];
$forumtopic = htmlentities($forumtopicraw, ENT_QUOTES); 
$forumtopicinfo = htmlentities($forumtopicinforaw, ENT_QUOTES); 
$time = time();

$topicchecksql = mysql_query("SELECT * FROM forumtopics WHERE title = '$forumtopic' AND type = 'hdof'");
$topiccheck = mysql_num_rows($topicchecksql);



if(isset($_POST['do'])) { 
if((!$forumtopic)||(!$forumtopicinfo)){}
elseif($topiccheck > '0'){ echo'<font color="white" face="verdana" size="1">A topic with the same name already exists!</font>';}
elseif($topicchecktwo >= '10'){ echo'<font color="white" face="verdana" size="1">You cannot have more than 10 topics on the forum at one time!</font>';}
else{mysql_query("INSERT INTO forumtopics(creator,id,time,type,title,info,rankid)
VALUES ('$gangsterusername','1','$time','hdof','$forumtopic','$forumtopicinfo','$myrank')");
mysql_query("UPDATE users SET topics = (topics + 1) WHERE ID = '$ida'");}
}

if(isset($_POST['clear'])) { 
if($rank != '100'){echo"<font color=white face=verdana size=1>Nice try</font>";}
else{
$deleteall = mysql_query("SELECT * FROM forumtopics WHERE type= 'hdof' AND id= '1'");
while($deletealla = mysql_fetch_array($deleteall)){
$deleteid = $deletealla['topicid'];
mysql_query("DELETE FROM forumtopics WHERE type = 'hdof' AND topicid = '$deleteid'");
mysql_query("DELETE FROM forumposts WHERE type = 'hdof' AND topicid = '$deleteid'");}
echo"<font color=white face=verdana size=1><b>Forum wiped!</b></font>";}}

?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#33333" face="verdana" size="1"><center><b>Helpdesk forum</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<br>
<?if($rank == 100){echo"<center><form method=post><input type=submit name=clear value='Delete topics' class=textbox></form></center>";}?>

<table width="80%" cellpadding="0" cellspacing="2" align="center">
<tr><td align=center bgcolor=#222222><font color="silver" face=verdana size=2>Topics</font></td><td bgcolor=#222222><font size=2 face=verdana color="silver">Posts</font></td></tr>

<?php
$selecttopicssql = mysql_query("SELECT * FROM forumtopics WHERE type = 'hdof' AND id = '1' ORDER BY time DESC");

$selectstickysql = mysql_query("SELECT * FROM forumtopics WHERE type = 'hdof' AND id = '2' ORDER BY time DESC LIMIT 0,50");

$selectimportantsql = mysql_query("SELECT * FROM forumtopics WHERE type = 'hdof' AND id = '3' ORDER BY time DESC LIMIT 0,50");

while($selectimportant = mysql_fetch_array($selectimportantsql))
{
$ititle = html_entity_decode($selectimportant ['title'], ENT_QUOTES);
$itopicid = $selectimportant['topicid'];
$ilocked = $selectimportant['locked'];
$icreator = $selectimportant['creator'];
$iforumrank = $selectimportant['rankid'];

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

$ititle = str_replace($zpattern,$zreplace,$ititle);

if($iforumrank >= '25'){


$apattern[1] = "/\[b\](.*?)\[\/b\]/is";
$apattern[2] = "/\[u\](.*?)\[\/u\]/is";
$apattern[3] = "/\[i\](.*?)\[\/i\]/is";
$apattern[5] = "/\[color=(.*?)\](.*?)\[\/color\]/is";
$apattern[13] = "/\[s\](.*?)\[\/s\]/is";


$areplace[1] = "<b>$1</b>";
$areplace[2] = "<u>$1</u>";
$areplace[3] = "<i>$1</i>";
$areplace[5] = "<b>$2</b>";
$areplace[13] = "<s>$1</s>";

$ititlea = preg_replace($apattern,$areplace,$ititle);

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

$breplace[1] = '<img src=/more/smiles/arrow.gif border=0>';
$breplace[2] = '<img src=/more/smiles/biggrin.gif border=0>';
$breplace[3] = '<img src=/more/smiles/confused.gif border=0>';
$breplace[4] = '<img src=/more/smiles/cool.gif border=0>';
$breplace[5] = '<img src=/more/smiles/cry.gif border=0>';
$breplace[6] = '<img src=/more/smiles/eek.gif border=0>';
$breplace[7] = '<img src=/more/smiles/evil.gif border=0>';
$breplace[8] = '<img src=/more/smiles/exclaim.gif border=0>';
$breplace[9] = '<img src=/more/smiles/idea.gif border=0>';
$breplace[10] = '<img src=/more/smiles/lol.gif border=0>';
$breplace[11] = '<img src=/more/smiles/mad.gif border=0>';
$breplace[12] = '<img src=/more/smiles/question.gif border=0>';
$breplace[13] = '<img src=/more/smiles/redface.gif border=0>';
$breplace[14] = '<img src=/more/smiles/rolleyes.gif border=0>';
$breplace[15] = '<img src=/more/smiles/sad.gif border=0>';
$breplace[16] = '<img src=/more/smiles/smile.gif border=0>';
$breplace[17] = '<img src=/more/smiles/surprised.gif border=0>';
$breplace[18] = '<img src=/more/smiles/tdown.gif border=0>';
$breplace[19] = '<img src=/more/smiles/toungue.gif border=0>';
$breplace[20] = '<img src=/more/smiles/tup.gif border=0>';
$breplace[21] = '<img src=/more/smiles/twisted.gif border=0>';
$breplace[22] = '<img src=/more/smiles/wink.gif border=0>';
$ititle = str_replace($bpattern,$breplace,$ititlea);
}$itopicpost = $selectimportant['posts'];

echo("<tr><td bgcolor=#333333 width=100%><a href=hviewtopic.php?topicid=$itopicid STYLE=FONT-FAMILY:tahoma;>&nbsp;<b>IMPORTANT:</b><font color=silver size=1 face=verdana>&nbsp;$ititle</font></a>");
if($ilocked == 'yes'){echo'<font color=gray size=1 face=verdana>&nbsp;(Locked)</font>';}
echo("</td><td bgcolor=#333333><font color=silver size=1 face=verdana>$itopicpost</font></td></tr>");
}
while($selectsticky = mysql_fetch_array($selectstickysql))
{
$stitle = html_entity_decode($selectsticky['title'], ENT_QUOTES);
$stopicid = $selectsticky['topicid'];
$slocked = $selectsticky['locked'];
$screator = $selectsticky['creator'];
$sforumrank = $selectsticky['rankid'];

$stitle = str_replace($zpattern,$zreplace,$stitle);

if($sforumrank >= '25'){


$cpattern[1] = "/\[b\](.*?)\[\/b\]/is";
$cpattern[2] = "/\[u\](.*?)\[\/u\]/is";
$cpattern[3] = "/\[i\](.*?)\[\/i\]/is";
$cpattern[5] = "/\[color=(.*?)\](.*?)\[\/color\]/is";
$cpattern[13] = "/\[s\](.*?)\[\/s\]/is";

$creplace[1] = "<b>$1</b>";
$creplace[2] = "<u>$1</u>";
$creplace[3] = "<i>$1</i>";
$creplace[5] = "<b>$2</b>";
$creplace[13] = "<s>$1</s>";

$stitlea = preg_replace($cpattern,$creplace,$stitle);

$dpattern[1] = ":arrow:";
$dpattern[2] = ":D";
$dpattern[3] = ":S";
$dpattern[4] = "8)";
$dpattern[5] = ":cry:";
$dpattern[6] = "8|";
$dpattern[7] = ":evil:";
$dpattern[8] = ":!:";
$dpattern[9] = ":idea:";
$dpattern[10] = ":lol:";
$dpattern[11] = ":mad:";
$dpattern[12] = ":?:";
$dpattern[13] = ":redface:";
$dpattern[14] = ":rolleyes:";
$dpattern[15] = ":(";
$dpattern[16] = ":)";
$dpattern[17] = ":o";
$dpattern[18] = ":tdn:";
$dpattern[19] = ":P";
$dpattern[20] = ":tup:";
$dpattern[21] = ":twisted:";
$dpattern[22] = ";)";

$dreplace[1] = '<img src=/more/smiles/arrow.gif border=0>';
$dreplace[2] = '<img src=/more/smiles/biggrin.gif border=0>';
$dreplace[3] = '<img src=/more/smiles/confused.gif border=0>';
$dreplace[4] = '<img src=/more/smiles/cool.gif border=0>';
$dreplace[5] = '<img src=/more/smiles/cry.gif border=0>';
$dreplace[6] = '<img src=/more/smiles/eek.gif border=0>';
$dreplace[7] = '<img src=/more/smiles/evil.gif border=0>';
$dreplace[8] = '<img src=/more/smiles/exclaim.gif border=0>';
$dreplace[9] = '<img src=/more/smiles/idea.gif border=0>';
$dreplace[10] = '<img src=/more/smiles/lol.gif border=0>';
$dreplace[11] = '<img src=/more/smiles/mad.gif border=0>';
$dreplace[12] = '<img src=/more/smiles/question.gif border=0>';
$dreplace[13] = '<img src=/more/smiles/redface.gif border=0>';
$dreplace[14] = '<img src=/more/smiles/rolleyes.gif border=0>';
$dreplace[15] = '<img src=/more/smiles/sad.gif border=0>';
$dreplace[16] = '<img src=/more/smiles/smile.gif border=0>';
$dreplace[17] = '<img src=/more/smiles/surprised.gif border=0>';
$dreplace[18] = '<img src=/more/smiles/tdown.gif border=0>';
$dreplace[19] = '<img src=/more/smiles/toungue.gif border=0>';
$dreplace[20] = '<img src=/more/smiles/tup.gif border=0>';
$dreplace[21] = '<img src=/more/smiles/twisted.gif border=0>';
$dreplace[22] = '<img src=/more/smiles/wink.gif border=0>';
$stitle = str_replace($dpattern,$dreplace,$stitlea);
}

$stopicpost = $selectsticky['posts'];
echo("<tr><td bgcolor=#333333 width=100%><a href=hviewtopic.php?topicid=$stopicid STYLE=FONT-FAMILY:tahoma;>&nbsp;<b>STICKY:</b><font color=silver size=1 face=verdana>&nbsp;$stitle</font></a>");
if($slocked == 'yes'){echo'<font color=gray size=1 face=verdana>&nbsp;(Locked)</font>';}
echo("</td><td bgcolor=#333333><font color=silver size=1 face=verdana>$stopicpost</font></td></tr>");
}
while($selecttopics = mysql_fetch_array($selecttopicssql))
{
$title = html_entity_decode($selecttopics['title'], ENT_QUOTES);
$topicid = $selecttopics['topicid'];
$locked = $selecttopics['locked'];
$creator = $selecttopics['creator'];

$forumrank = $selecttopics['rankid'];

$title = str_replace($zpattern,$zreplace,$title);

if($forumrank >= '25'){

$epattern[1] = "/\[b\](.*?)\[\/b\]/is";
$epattern[2] = "/\[u\](.*?)\[\/u\]/is";
$epattern[3] = "/\[i\](.*?)\[\/i\]/is";
$epattern[5] = "/\[color=(.*?)\](.*?)\[\/color\]/is";
$epattern[13] = "/\[s\](.*?)\[\/s\]/is";

$ereplace[1] = "<b>$1</b>";
$ereplace[2] = "<u>$1</u>";
$ereplace[3] = "<i>$1</i>";
$ereplace[5] = "<b>$2</b>";
$ereplace[13] = "<s>$1</s>";

$titlea = preg_replace($epattern,$ereplace,$title);

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

$freplace[1] = '<img src=/more/smiles/arrow.gif border=0>';
$freplace[2] = '<img src=/more/smiles/biggrin.gif border=0>';
$freplace[3] = '<img src=/more/smiles/confused.gif border=0>';
$freplace[4] = '<img src=/more/smiles/cool.gif border=0>';
$freplace[5] = '<img src=/more/smiles/cry.gif border=0>';
$freplace[6] = '<img src=/more/smiles/eek.gif border=0>';
$freplace[7] = '<img src=/more/smiles/evil.gif border=0>';
$freplace[8] = '<img src=/more/smiles/exclaim.gif border=0>';
$freplace[9] = '<img src=/more/smiles/idea.gif border=0>';
$freplace[10] = '<img src=/more/smiles/lol.gif border=0>';
$freplace[11] = '<img src=/more/smiles/mad.gif border=0>';
$freplace[12] = '<img src=/more/smiles/question.gif border=0>';
$freplace[13] = '<img src=/more/smiles/redface.gif border=0>';
$freplace[14] = '<img src=/more/smiles/rolleyes.gif border=0>';
$freplace[15] = '<img src=/more/smiles/sad.gif border=0>';
$freplace[16] = '<img src=/more/smiles/smile.gif border=0>';
$freplace[17] = '<img src=/more/smiles/surprised.gif border=0>';
$freplace[18] = '<img src=/more/smiles/tdown.gif border=0>';
$freplace[19] = '<img src=/more/smiles/toungue.gif border=0>';
$freplace[20] = '<img src=/more/smiles/tup.gif border=0>';
$freplace[21] = '<img src=/more/smiles/twisted.gif border=0>';
$freplace[22] = '<img src=/more/smiles/wink.gif border=0>';
$title = str_replace($fpattern,$freplace,$titlea);
}


$topicpost = $selecttopics['posts'];


echo("<tr><td bgcolor=#333333 width=100%><a href=hviewtopic.php?topicid=$topicid><font color=silver size=1 face=verdana>&nbsp;$title</font></a>");
if($locked == 'yes'){echo'<font color=gray size=1 face=verdana>&nbsp;(Locked)</font>';}
echo("</td><td bgcolor=#333333><font color=silver size=1 face=verdana>$topicpost</font></td></tr>");
}
?>

</table>
<br><center><br><font color="white" face="verdana" size="1">Create topic</font><br><form action="" method="post" name="smiley"><input type="text" class="textbox" name="newtopic"><br><font color="white" face="verdana" size="1">Topic content</font><br><textarea name="newtopicinfo" cols="42" rows="11" class="textbox" id ="topicinfo">
</textarea><br><a onClick="emotion(':arrow:')" style="cursor: pointer;"><img src="/more/smiles/arrow.gif" border=0></a><a onClick="emotion(':D')" style="cursor: pointer;"><img src="/more/smiles/biggrin.gif" border=0></a><a onClick="emotion(':S')" style="cursor: pointer;"><img src="/more/smiles/confused.gif" border=0></a><a onClick="emotion(':cry:')" style="cursor: pointer;"><img src="/more/smiles/cry.gif" border=0></a><a onClick="emotion('8)')" style="cursor: pointer;"><img src="/more/smiles/cool.gif" border=0></a><a onClick="emotion('8|')" style="cursor: pointer;"><img src="/more/smiles/eek.gif" border=0></a><a onClick="emotion(':evil:')" style="cursor: pointer;"><img src="/more/smiles/evil.gif" border=0></a><a onClick="emotion(':!:')" style="cursor: pointer;"><img src="/more/smiles/exclaim.gif" border=0></a><a onClick="emotion(':idea:')" style="cursor: pointer;"><img src="/more/smiles/idea.gif" border=0></a><a onClick="emotion(':lol:')" style="cursor: pointer;"><img src="/more/smiles/lol.gif" border=0></a><a onClick="emotion(':mad:')" style="cursor: pointer;"><img src="/more/smiles/mad.gif" border=0></a><a onClick="emotion(':?:')" style="cursor: pointer;"><img src="/more/smiles/question.gif" border=0></a><a onClick="emotion(':redface:')" style="cursor: pointer;"><img src="/more/smiles/redface.gif" border=0></a><a onClick="emotion(':rolleyes:')" style="cursor: pointer;"><img src="/more/smiles/rolleyes.gif" border=0></a><a onClick="emotion(':(')" style="cursor: pointer;"><img src="/more/smiles/sad.gif" border=0></a><a onClick="emotion(':)')" style="cursor: pointer;"><img src="/more/smiles/smile.gif" border=0></a><a onClick="emotion(':o')" style="cursor: pointer;"><img src="/more/smiles/surprised.gif" border=0></a><a onClick="emotion(':P')" style="cursor: pointer;"><img src="/more/smiles/toungue.gif" border=0></a><a onClick="emotion(':twisted:')" style="cursor: pointer;"><img src="/more/smiles/twisted.gif" border=0></a><a onClick="emotion(';)')" style="cursor: pointer;"><img src="/more/smiles/wink.gif" border=0></a><a onClick="emotion(':tdn:')" style="cursor: pointer;"><img src="/more/smiles/tdown.gif" border=0></a><a onClick="emotion(':tup:')" style="cursor: pointer;"><img src="/more/smiles/tup.gif" border=0></a><br>
<input type ="submit" value="Create topic" class="textbox" name="do"></center>
</form><br>
<table width="98%" cellpadding="0" cellspacing="0" align="center"><tr><td height="1" bgcolor="#444444"></td></tr><td height="11"></td></tr></table>

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