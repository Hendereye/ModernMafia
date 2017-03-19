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
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$gangsterusername = $usernameone;

$userarray = $statustesttwo;
$crewid = $userarray['crewid'];

if($crewid == '0'){die(' ' );}



$crewbossi = $crewboss;


$forumtopicraw = $_POST['newtopic'];
$forumtopicinforaw  = $_POST['newtopicinfo'];
$forumtopic = htmlentities($forumtopicraw, ENT_QUOTES); 
$forumtopicinfo = htmlentities($forumtopicinforaw, ENT_QUOTES); 
$time = time();

if($forumtopic){
$topicchecksql = mysql_query("SELECT * FROM forumtopics WHERE title = '$forumtopic' AND type= '$crewid'");
$topiccheck = mysql_num_rows($topicchecksql);

$topicchecksqltwo = mysql_query("SELECT * FROM forumtopics WHERE creator = '$gangsterusername' AND id = '1' AND type = '$crewid'");
$topicchecktwo = mysql_num_rows($topicchecksqltwo);}


if(isset($_POST['clear'])) { 
if($crewbossi < '1'){echo"<font color=white face=verdana size=1>Nice try</font>";}
else{
$deleteall = mysql_query("SELECT * FROM forumtopics WHERE type= '$crewid' AND id= '1'");
while($deletealla = mysql_fetch_array($deleteall)){
$deleteid = $deletealla['topicid'];
mysql_query("DELETE FROM forumtopics WHERE type = '$crewid' AND topicid = '$deleteid'");
mysql_query("DELETE FROM forumposts WHERE type = '$crewid' AND topicid = '$deleteid'");}
echo"<font color=white face=verdana size=1><b>Crew forum wiped!</b></font>";}}

if(isset($_POST['do'])) { 
if((!$forumtopic)||(!$forumtopicinfo)){}
elseif($topiccheck > '0'){ echo'<font color="white" face="verdana" size="1">A topic with the same name already exists!</font>';}
elseif($topicchecktwo >= '25'){ echo'<font color="white" face="verdana" size="1">You cannot have more than 25 topics on the forum at one time!</font>';}
else{

if($crewbossi > '0'){

mysql_query("INSERT INTO forumtopics(creator,id,time,type,title,info,rankid)
VALUES ('$gangsterusername','1','$time','$crewid','$forumtopic','$forumtopicinfo','50')");

}else{


mysql_query("INSERT INTO forumtopics(creator,id,time,type,title,info,rankid)
VALUES ('$gangsterusername','1','$time','$crewid','$forumtopic','$forumtopicinfo','$myrank')");}
mysql_query("UPDATE users SET topics = (topics + 1) WHERE username = '$gangsterusername'");}
}
?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Crew forum</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<br>
<?if($crewbossi > '0'){echo"<center><form action='' method=post><input type=submit name=clear value='Delete topics' class=textbox></form></center>";}?>


<table align="center" width="85%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="8" background="/more/topleft.png"></td>
<td height="8" background="/more/top.png" NOWRAP><center><font color="#222222" face="verdana" size="1"><b></b></font></center></font></font></td>
<td width="8" height="8" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png"></td>
<td background="/more/crossbg.png">
<table width="100%" cellpadding="0" cellspacing="2" align="center" style="border-width: 1px;border-color: gray;">
<tr><td align=center valign=middle bgcolor=444444 NOWRAP align=center><font color=white size=1 face=verdana>Crew Forum Topics</font></td><td bgcolor=444444 valign=middle align=center><font color=white size=1 face=verdana>&nbsp;&nbsp;Created&nbsp;By&nbsp;&nbsp;</font></td><td bgcolor=444444  valign=middle align=center><font color=white size=1 face=verdana>&nbsp;&nbsp;Posts&nbsp;&nbsp;</font></td></tr>
<tr><td colspan=3 class=TS height=1></td></tr>

<?php
$selecttopicssql = mysql_query("SELECT * FROM forumtopics WHERE type = '$crewid' AND id = '1' ORDER BY time DESC");

$selectstickysql = mysql_query("SELECT * FROM forumtopics WHERE type = '$crewid' AND id = '2' AND topicid != '5481' ORDER BY time DESC LIMIT 0,50");

$selectimportantsql = mysql_query("SELECT * FROM forumtopics WHERE type = '$crewid' AND id = '3' ORDER BY time DESC LIMIT 0,50");



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




while($selectimportant = mysql_fetch_array($selectimportantsql))
{
$ititle = html_entity_decode($selectimportant ['title'], ENT_NOQUOTES);
$itopicid = $selectimportant['topicid'];
$ilocked = $selectimportant['locked'];
$icreator = $selectimportant['creator'];
$iforumrank = $selectimportant['rankid'];

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

$ititle = str_replace($zpattern,$zreplace,$ititle);

if($iforumrank >= '25'){

$ititlea = preg_replace($apattern,$areplace,$ititle);


$ititle = str_replace($bpattern,$breplace,$ititlea);
}

$itopicpost = $selectimportant['posts'];
?>

<?

echo("<tr><td class=wtf  width=100%><a href=crewviewtopic.php?topicid=$itopicid><font color=999999>&nbsp;<b>IMPORTANT:</b>&nbsp;$ititle</font>");
if($ilocked == 'yes'){echo'<font color=gray size=1 face=verdana>&nbsp;(Locked)</font>';}
echo("</a></div></td><td class=wtfs align=right><a href=viewprofile.php?username=$icreator><font color=gray size=1 face=verdana>$icreator&nbsp;</font></a></td><td class=wtfs align=right><span id=aww$itopicid><font color=gray size=1 face=verdana>$itopicpost</font></span></td></tr>");
}?>
<tr><td colspan=3 class=TS height=1></td></tr>
<?
while($selectsticky = mysql_fetch_array($selectstickysql))
{
$stitle = html_entity_decode($selectsticky['title'], ENT_NOQUOTES);
$stopicid = $selectsticky['topicid'];
$slocked = $selectsticky['locked'];
$screator = $selectsticky['creator'];
$sforumrank = $selectsticky['rankid'];

$stitle = str_replace($zpattern,$zreplace,$stitle);

if($sforumrank >= '25'){
$stitlea = preg_replace($apattern,$areplace,$stitle);
$stitle = str_replace($bpattern,$breplace,$stitlea);
}

$stopicpost = $selectsticky['posts'];

?>


<?

echo("<tr><td class=wtf width=100%><a href=crewviewtopic.php?topicid=$stopicid><font color=999999>&nbsp;<b>STICKY:</b>&nbsp;$stitle</font>");
if($slocked == 'yes'){echo'<font color=gray size=1 face=verdana>&nbsp;(Locked)</font>';}
echo("</a></td><td class=wtfs align=right><a href=viewprofile.php?username=$screator><font color=gray size=1 face=verdana>$screator&nbsp;</font></a></td><td class=wtfs align=right><span id=aww$stopicid><font color=gray size=1 face=verdana>$stopicpost</font></span></td></tr>");
}?>
<tr><td colspan=3 class=TS height=1></td></tr><?
while($selecttopics = mysql_fetch_array($selecttopicssql))
{
$title = html_entity_decode($selecttopics['title'], ENT_NOQUOTES);
$topicid = $selecttopics['topicid'];
$locked = $selecttopics['locked'];
$creator = $selecttopics['creator'];
$forumrank = $selecttopics['rankid'];

$title = str_replace($zpattern,$zreplace,$title);

if($forumrank >= '25'){
$titlea = preg_replace($apattern,$areplace,$title);
$title = str_replace($bpattern,$breplace,$titlea);
}

$topicpost = $selecttopics['posts'];


?>

<?

if($creator == $usernameone){$cls = wtfyou;}else{$cls = wtf;}

echo("<tr><td class=$cls width=100%><a href=crewviewtopic.php?topicid=$topicid><font color=999999>&nbsp;$title</font>");
if($locked == 'yes'){echo'<font color=gray size=1 face=verdana>&nbsp;(Locked)</font>';}
echo("</a></td><td class=wtfs align=right><a href=viewprofile.php?username=$creator><font color=gray size=1 face=verdana>$creator&nbsp;</font></a></td><td class=wtfs align=right><span id=aww$topicid><font color=gray size=1 face=verdana>$topicpost</font></span></td></tr>");
}
?>

</table>
</td>
<td width="8" background="/more/rightb.png"></td>
</tr>


<tr>
<td width="8" height="9" background="/more/bottomleft.png"></td>
<td height="9" background="/more/bottom.png"></td>
<td width="8" height="9" background="/more/bottomright.png"></td>
</tr>
</table>


<br><form action="" method="post" name="smiley"><center><font color="white" face="verdana" size="1">Create topic</font><br><input type="text" class="textbox" name="newtopic"><br><font color="white" face="verdana" size="1">Topic content</font><br><textarea name="newtopicinfo" cols="42" rows="11" class="textbox" id ="topicinfo">
</textarea><br><a onClick="emotion(':arrow:')" style="cursor: pointer;"><img src="/more/smiles/arrow.gif" border=0></a><a onClick="emotion(':D')" style="cursor: pointer;"><img src="/more/smiles/biggrin.gif" border=0></a><a onClick="emotion(':S')" style="cursor: pointer;"><img src="/more/smiles/confused.gif" border=0></a><a onClick="emotion(':cry:')" style="cursor: pointer;"><img src="/more/smiles/cry.gif" border=0></a><a onClick="emotion('8)')" style="cursor: pointer;"><img src="/more/smiles/cool.gif" border=0></a><a onClick="emotion('8|')" style="cursor: pointer;"><img src="/more/smiles/eek.gif" border=0></a><a onClick="emotion(':evil:')" style="cursor: pointer;"><img src="/more/smiles/evil.gif" border=0></a><a onClick="emotion(':!:')" style="cursor: pointer;"><img src="/more/smiles/exclaim.gif" border=0></a><a onClick="emotion(':idea:')" style="cursor: pointer;"><img src="/more/smiles/idea.gif" border=0></a><a onClick="emotion(':lol:')" style="cursor: pointer;"><img src="/more/smiles/lol.gif" border=0></a><a onClick="emotion(':mad:')" style="cursor: pointer;"><img src="/more/smiles/mad.gif" border=0></a><a onClick="emotion(':?:')" style="cursor: pointer;"><img src="/more/smiles/question.gif" border=0></a><a onClick="emotion(':redface:')" style="cursor: pointer;"><img src="/more/smiles/redface.gif" border=0></a><a onClick="emotion(':rolleyes:')" style="cursor: pointer;"><img src="/more/smiles/rolleyes.gif" border=0></a><a onClick="emotion(':(')" style="cursor: pointer;"><img src="/more/smiles/sad.gif" border=0></a><a onClick="emotion(':)')" style="cursor: pointer;"><img src="/more/smiles/smile.gif" border=0></a><a onClick="emotion(':o')" style="cursor: pointer;"><img src="/more/smiles/surprised.gif" border=0></a><a onClick="emotion(':P')" style="cursor: pointer;"><img src="/more/smiles/toungue.gif" border=0></a><a onClick="emotion(':twisted:')" style="cursor: pointer;"><img src="/more/smiles/twisted.gif" border=0></a><a onClick="emotion(';)')" style="cursor: pointer;"><img src="/more/smiles/wink.gif" border=0></a><a onClick="emotion(':tdn:')" style="cursor: pointer;"><img src="/more/smiles/tdown.gif" border=0></a><a onClick="emotion(':tup:')" style="cursor: pointer;"><img src="/more/smiles/tup.gif" border=0></a><br>
<input type ="submit" value="Create topic" class="textbox" name="do"></center>
</form>
<br>
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