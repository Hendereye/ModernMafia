<? include 'included.php';



 ?>

<html>
<head>
<link rel="stylesheet" href="more/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="shortcut icon" href="/more/icon.png" type="image/x-icon" />
<style>.textboxedit{background-color: #414141; border-bottom: 1px solid #626262; border-left: 1px solid #040404; border-right: 1px solid #626262; border-top: 1px solid #040404; color: Silver; font-family: verdana; font-size: 10px; }
</style>
</head>
<body background="/more/bgtest.png" onLoad="setTimeout('ajaxFunctionhis()',0100);">
<script type="text/javascript">
document.getElementById("nawty").innerHTML = 'spam';

function emotion(em) { document.smiley.newpost.value=document.smiley.newpost.value+em;}
function emotions(em) { document.smileys.editprofile.value=document.smiley.newpost.value+em;}
function editit()
{document.getElementById("editee").style.display = "block";}
function hideit()
{document.getElementById("editee").style.display = "none";}

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



$playerarray = $statustesttwo;
$playerrank = $playerarray['rankid'];


$editsql = mysql_query("SELECT * FROM forumtopics WHERE topicid = '$topicid' AND type = 'e'");
$editarray = mysql_fetch_array($editsql);
$editname = $editarray['creator'];
$posttits = $editarray['posts'];
$titdate = $editarray['dte'];
if($titdate == '0000-00-00 00:00:00'){$titdate = '<font color=silver face=verdana size=1>Time/Date: Not Available</font>';}else{$titdate = "<font color=silver face=verdana size=1>$titdate</font>";}
if(($rankid >= '50')||($editname == $gangsterusername)){
if(isset($_POST['edit'])) { if(!$edittopic){}else{
mysql_query("UPDATE forumtopics SET info = '$edittopic' WHERE topicid = '$topicid' AND type = 'e'");
}}}



$editsql = mysql_query("SELECT * FROM forumtopics WHERE topicid = '$topicid' AND type = 'e'");
$editarray = mysql_fetch_array($editsql);
$topicinfoe = $editarray['info'];

$newpostraw = $_POST['newpost'];
$newpost = htmlentities($newpostraw, ENT_QUOTES);

$topiccheck = mysql_num_rows($editsql);


$gettopicidarray = $editarray;
$topictitleraw = html_entity_decode($gettopicidarray['title'], ENT_QUOTES);
$topiccreator = $gettopicidarray['creator'];
$topicinforaw = html_entity_decode($gettopicidarray['info'], ENT_QUOTES);
$toplocked = $gettopicidarray['locked'];

$zpattern[a] = "<";
$zpattern[b] = ">";
$zpattern[c] = "fuck";

$zreplace[a] = "&lt;";
$zreplace[b] = "&gt;";
$zreplace[d] = "<span id=nawty>fuck</span>";

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
$dpattern[14] = "/\[ytube\](.*?)\[\/ytube\]/is";


$dreplace[1] = "<b>$1</b>";
$dreplace[2] = "<u>$1</u>";
$dreplace[3] = "<i>$1</i>";
$dreplace[4] = "<center>$1</center>";
$dreplace[5] = "<font color=\"$1\">$2</font>";
$dreplace[6] = "<img src=\"$1\">";
$dreplace[7] = "<font face=\"$1\">$2</font>";
$dreplace[8] = "<br>";
$dreplace[9] = "<font size=\"$1\">$2</font><font size=\"1\">";
$dreplace[10] = "<blockquote><b><font color=7e96ac>$1</font></b></blockquote>";
$dreplace[11] = "<div align=\"left\">$1</div>";
$dreplace[12] = "<div align=\"right\">$1</div>";
$dreplace[13] = "<s>$1</s>";
$dreplace[14] = "<object width=315 height=225><param name=movie value=http://www.youtube.com/v/$1&autoplay=1></param><param name=wmode value=transparent></param><embed src=http://www.youtube.com/v/$1&autoplay=1 type=application/x-shockwave-flash wmode=transparent width=325 height=250></embed></object>";

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
$cpattern[23] = ":snowi:";

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
$creplace[23] = "<iframe scrolling=\"no\" frameborder=\"0\" src=\"http://www.satisfaction.com/christmas-countdown-generator/countdown1.swf?x=(:\" iframe width=520 height=300></iframe>";

$topicinfo = str_replace($cpattern,$creplace,$topicinfoa);


$toplocked = $gettopicidarray['locked'];
$creatorrank = $gettopicidarray['rankid'];

if($creatorrank >= 25)
{$topictitle = $topictitleadmin;}else{$topictitle = $topictitleraw;}


if(isset($_POST['dopost'])) { 

$mutedusernamesql = mysql_query("SELECT username,ip FROM muted WHERE  username = '$gangsterusername'")or die(mysql_error());
$mutedusernamerows = mysql_num_rows($mutedusernamesql);
$mutedusernamearray = mysql_fetch_array($mutedusernamesql);
$mutedusernameone = $mutedusernamearray['username'];
$mutedipone = $mutedusernamearray['ip'];

$mutedipsql = mysql_query("SELECT username,ip FROM muted WHERE  ip = '$userip'")or die(mysql_error());
$mutediprows  = mysql_num_rows($mutedipsql);
$mutediparray = mysql_fetch_array($mutedipsql);
$mutedusernametwo = $mutediparray['username'];
$mutediptwo = $mutediparray['ip'];

if($mutedusernamerows > '0'){die("<font color=white face=verdana size=1>Username: <b>$mutedusernameone</b> and IP: <b>$mutedipone</b> have been muted! Contact a member of <b>The Society</b> to be unmuted!");}
elseif($mutediprows > '0'){die("<font color=white face=verdana size=1>Username: <b>$mutedusernametwo</b> and IP: <b>$mutediptwo</b> have been muted! Contact a member of <b>The Society</b> to be unmuted!");}



if(!$newpost){}
elseif($toplocked == 'yes'){echo"<font color=C11B17 face=verdana size=1><b>This topic has been locked!</b></font>";}
elseif($topiccheck == '0'){echo'<font color=red face=verdana size=1><b>No such topic!</b></font><META HTTP-EQUIV="Refresh" CONTENT="2; URL=eforum.php">';}
else{
$posttits++;
if($ida == '6131'){$playerrank = '24';}
mysql_query("UPDATE forumtopics SET time = '$time' WHERE topicid = '$topicid' AND type = 'e'");
mysql_query("INSERT INTO forumposts(username,topicid,ip,type,post,rankid)
VALUES ('$gangsterusername','$topicid','$userip','e','$newpost','$playerrank')");
 
mysql_query("UPDATE forumtopics SET posts = (posts + 1) WHERE topicid = '$topicid'");
if($topiccreator != $usernameone){


mysql_query("UPDATE forumtopics SET new = (new + 1) WHERE topicid = '$topicid'");}


}
if($ida == '6131'){$playerrank = $myrank;}



}

if($usernameone == $topiccreator){

mysql_query("UPDATE forumtopics SET new = '0' WHERE topicid = '$topicid'");}



if(($rankid == '100')||($rankid == '75')||($rankid == '50')||($hdo > '0')){
if(isset($_POST['delete'])) { 
mysql_query("DELETE FROM forumtopics WHERE type = 'e' AND topicid = '$topicid'");
mysql_query("DELETE FROM forumposts WHERE type = 'e' AND topicid = '$topicid'");
}
}

if(($rankid == '100')||($rankid == '75')||($rankid == '50')||($hdo > '0')){
if(isset($_POST['sticky'])) { 
mysql_query("UPDATE forumtopics SET id = '2' WHERE topicid = '$topicid' AND type = 'e'");
}
}

if(($rankid == '100')||($rankid == '75')||($rankid == '50')||($hdo > '0')){
if(isset($_POST['important'])) { 
mysql_query("UPDATE forumtopics SET id = '3' WHERE topicid = '$topicid' AND type = 'e'");
}
}


if($rankid == '100'){
if(isset($_POST['update'])) { 
mysql_query("UPDATE forumtopics SET id = '4' WHERE topicid = '$topicid' AND type = 'e'");
}
}


if(($rankid == '100')||($rankid == '75')||($rankid == '50')||($hdo > '0')){
if(isset($_POST['undo'])) { 
mysql_query("UPDATE forumtopics SET id = '1' WHERE topicid = '$topicid' AND type = 'e'");
}
}


if(($topiccreator == $gangsterusername)||($rankid == '100')||($rankid == '75')||($rankid == '50')||($hdo > '0')){
if(isset($_GET['lock'])) { echo'<font color=white face=verdana size=1>Topic locked</font>';mysql_query("UPDATE forumtopics SET locked = 'yes' WHERE topicid = '$topicid' AND type = 'e'");}
}


if(($rankid == '100')||($rankid == '75')||($rankid == '50')||($hdo > '0')){
if(isset($_GET['unlock'])) {echo'<font color=white face=verdana size=1>Topic Unlocked</font>';mysql_query("UPDATE forumtopics SET locked = 'no' WHERE topicid = '$topicid' AND type = 'e'");}
}


$selecterraw = $_POST['select'];
$selecter = preg_replace($saturated,"",$selecterraw);
if(isset($_POST['next'])){$one = $selecter + 1;}
elseif(isset($_POST['previous'])){$one = $selecter - 1;}else{$one = '0';}

$selectfroma = $one * 25;
$selecttoa = $selectfrom + 25;
$selectfrom = preg_replace($saturated,"",$selectfroma);
$selectto = preg_replace($saturated,"",$selecttoa);


if(($rankid >= '50')||($senior > '0')){
if(isset($_GET['deletepost'])) { 
mysql_query("DELETE FROM forumposts WHERE type = 'e' AND topicid = '$topicid' AND id = '$deletepost'");
}
}



$gettopicid = mysql_query("SELECT * FROM forumtopics WHERE topicid = '$topicid' AND type = 'e'");
$gettopicidarray = mysql_fetch_array($gettopicid);
$exists = mysql_num_rows($gettopicid);
if($exists == '0'){echo'<font color=red face=verdana size=1><b>No such topic!</b></font><META HTTP-EQUIV="Refresh" CONTENT="2; URL=eforum.php">';}

$topictitleraw = html_entity_decode($gettopicidarray['title'], ENT_QUOTES);
$topiccreator = $gettopicidarray['creator'];
$topicinforaw = html_entity_decode($gettopicidarray['info'], ENT_QUOTES);
$topictitleraw = str_replace($zpattern,$zreplace,$topictitleraw);
$topictitlerawa = preg_replace($apattern,$areplace,$topictitleraw);
$topictitleadmin = str_replace($bpattern, $breplace, $topictitlerawa);
$topicinforawz = str_replace($zpattern,$zreplace,$topicinforaw);

$topicinfo = str_replace($cpattern,$creplace,$topicinfoa);

$ssssss = $gettopicidarray['info'];


?> 
<script>


function ajaxFunctionhis(){
	var ajaxRequest;  
	try{ajaxRequest = new XMLHttpRequest();} catch (e){
        try{ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");} catch (e) {
	try{ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");} catch (e){

alert("Your browser broke!");return false;}}}
	
var strhehe = "<?echo$posttits;?>&topicid=<?echo$topicid;?>&rand="+Math.random();
	ajaxRequest.open("GET", "getcountss.php?posts=" + strhehe, true);
        ajaxRequest.send(null); 
        ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){if(ajaxRequest.responseText){document.getElementById("county").style.display = "block";document.getElementById("county").innerHTML = ajaxRequest.responseText;}}}
 setTimeout("ajaxFunctionhis()",4000);

}

</script>
<table align="center" width="100%" cellpadding="0" cellspacing="0"><tr><td width="8" height="22" background="/more/topleft.png"></td><td height="22" background="/more/top.png" NOWRAP><font color="white" face="verdana" size="1"><? if($countone > '20'){echo'This user tried to post more than 20 smilies, this is <b>NOT</b> allowed';}else{echo $topictitle;} ?>&nbsp;</font><a href="viewprofile.php?username=<? echo $topiccreator; ?>"><?if($topiccreator == 'Limag'){$hehehe = black;$bon='<b>';$btu='</b>';}else{$hehehe = dodge;} echo"$bon<font color=$hehehe face=verdana size=1>$topiccreator</font>$btu";?></td><td width="8" height="22" background="/more/topright.png"></td></tr><tr><td width="8" background="/more/leftb.png" NOWRAP></td><td background="/more/crossbg.png"><font color="white" face="verdana" size="1">
<? if($counttwo > '20'){echo'This user tried to post more than 20 smilies, this is <b>NOT</b> allowed';}else{echo nl2br($topicinfo);}?></font><br><br><table width="98%" cellpadding="0" cellspacing="0" align="center"><tr><td height="1" bgcolor="#444444"></td></tr><td height="5"></td></tr><tr><td height="11" align=center><a  href=#comsection onClick="addcomment();return false;" style=color:khaki;><b>Add Comment</b></a><font color=silver face=verdana size=1> | </font>

<?
if(($topiccreator == $gangsterusername)||($rankid >= '50')||($hdo > '0')){if($toplocked != 'yes'){$cu = 'white';}else{$cu=white;}echo"<a href=eviewtopic.php?topicid=$topicid&lock=1 style=color:$cu;><b> Lock</b></a><font color=silver face=verdana size=1> | </font>";}
if(($rankid == '100')||($rankid == '75')||($rankid == '50')||($hdo > '0')){if($toplocked == 'yes'){$cu = 'white';}else{$cu=white;}echo"<a href=eviewtopic.php?topicid=$topicid&unlock=1 style=color:$cu;><b>Unlock</b></a><font color=silver face=verdana size=1> | </font>";}?><a href=eforum.php style=color:khaki;>Go back</a><font color=silver face=verdana size=1> | </font><?echo$titdate;?></td><tr><td height="4"></td></tr></table>

<div id=editee style="display:none;" name=edit>
<table width="98%" cellpadding="0" cellspacing="0" align="center"><tr><td height="1" bgcolor="#444444"></td></tr></table>
<br><center><form action="eviewtopic.php?topicid=<?echo$topicid;?>" method="post" name="smileys"><font color="white" face="verdana" size="1">Edit Topic <a onclick=hideit(); href=#>(hide)</a></font><br><textarea name="edittopic" cols="80" rows="8"  class="textbox" id ="editprofile"><?
$inforaw = str_replace("<br />", "\n", $ssssss);

$info =html_entity_decode($inforaw); echo$info;?></textarea><br><a onClick="emotions(':arrow:')" style="cursor: pointer;"><img src="/more/smiles/arrow.gif" border=0></a><a onClick="emotions(':D')" style="cursor: pointer;"><img src="/more/smiles/biggrin.gif" border=0></a><a onClick="emotions(':S')" style="cursor: pointer;"><img src="/more/smiles/confused.gif" border=0></a><a onClick="emotions(':cry:')" style="cursor: pointer;"><img src="/more/smiles/cry.gif" border=0></a><a onClick="emotions('8)')" style="cursor: pointer;"><img src="/more/smiles/cool.gif" border=0></a><a onClick="emotions('8|')" style="cursor: pointer;"><img src="/more/smiles/eek.gif" border=0></a><a onClick="emotions(':evil:')" style="cursor: pointer;"><img src="/more/smiles/evil.gif" border=0></a><a onClick="emotions(':!:')" style="cursor: pointer;"><img src="/more/smiles/exclaim.gif" border=0></a><a onClick="emotions(':idea:')" style="cursor: pointer;"><img src="/more/smiles/idea.gif" border=0></a><a onClick="emotions(':lol:')" style="cursor: pointer;"><img src="/more/smiles/lol.gif" border=0></a><a onClick="emotions(':mad:')" style="cursor: pointer;"><img src="/more/smiles/mad.gif" border=0></a><a onClick="emotions(':?:')" style="cursor: pointer;"><img src="/more/smiles/question.gif" border=0></a><a onClick="emotions(':redface:')" style="cursor: pointer;"><img src="/more/smiles/redface.gif" border=0></a><a onClick="emotions(':rolleyes:')" style="cursor: pointer;"><img src="/more/smiles/rolleyes.gif" border=0></a><a onClick="emotions(':(')" style="cursor: pointer;"><img src="/more/smiles/sad.gif" border=0></a><a onClick="emotions(':)')" style="cursor: pointer;"><img src="/more/smiles/smile.gif" border=0></a><a onClick="emotions(':o')" style="cursor: pointer;"><img src="/more/smiles/surprised.gif" border=0></a><a onClick="emotions(':P')" style="cursor: pointer;"><img src="/more/smiles/toungue.gif" border=0></a><a onClick="emotions(':twisted:')" style="cursor: pointer;"><img src="/more/smiles/twisted.gif" border=0></a><a onClick="emotions(';)')" style="cursor: pointer;"><img src="/more/smiles/wink.gif" border=0></a><a onClick="emotions(':tdn:')" style="cursor: pointer;"><img src="/more/smiles/tdown.gif" border=0></a><a onClick="emotions(':tup:')" style="cursor: pointer;"><img src="/more/smiles/tup.gif" border=0></a><br>
<input type ="submit" value="Update topic" class="textbox" name="edit"></center>
</form>
<br><table width="98%" cellpadding="0" cellspacing="0" align="center"><tr><td height="1" bgcolor="#444444"></td></tr><td height="11"></td></tr></table>
</div>


</td><td width="8" background="/more/rightb.png" NOWRAP></td></tr><tr><td width="8" height="9" background="/more/bottomleft.png"></td><td height="9" background="/more/bottom.png"></td><td width="8" height="9" background="/more/bottomright.png"></td></tr></table>
<div id=county style=width:100%; style=display:none;></div>
<div id=posts>
<?php

$getposts = mysql_query("SELECT username,rankid,id,post,time FROM forumposts WHERE topicid = '$topicid' AND type = 'e' ORDER BY id DESC LIMIT $selectfrom,$selectto ");

while($getpostsarray = mysql_fetch_array($getposts))
{
$postname = $getpostsarray['username'];
$rankcolor = $getpostsarray['rankid'];
$postid = $getpostsarray['id'];
$time = $getpostsarray['time'];
$postinforawa = html_entity_decode($getpostsarray['post'], ENT_QUOTES);
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
$ereplace[10] = "<blockquote><b><font color=7e96ac>$1</font></b></blockquote>";
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
$fpattern[23] = ":HB:";
$fpattern[24] = "fdsfdsfds";

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
$freplace[23] = '<img src=/more/smiles/wub.gif>';
$freplace[24] = '<center><br><br><img src=http://images.paraorkut.com/img/funnypics/images/g/gangster_cat-12818.jpg></center><br><br>';

$postinfo = str_replace($fpattern, $freplace, $postinforawb, $countthree);


if($rankcolor == '100'){$color = "<font color=C9C299 face=verdana size=1><b>$postname</b></font>";} 
elseif($postname == 'Lars'){$color = "<font color=khaki face=verdana size=1><b>$postname</b></font>";} 
elseif($rankcolor == '75'){$color = "<font color=aqua face=verdana size=1><b>$postname</b></font>";} 

elseif($rankcolor == '50'){$color = "<font color=151B54 face=verdana size=1><b>$postname</b></font>";} 
elseif($rankcolor == '25'){$color = "<font color=yellow face=verdana size=1><b>$postname</b></font>";} 
elseif($rankcolor == '24'){$color = "<font color=black face=verdana size=1><b>$postname</b></font>";} 
else{$color = "<font color=#333333 face=verdana size=1>$postname</font>";} 
?>
<table align=center width=100% cellpadding=0 cellspacing=0><tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP><table width=100% cellpadding=0 cellspacing=0><tr><td align=left><a href=viewprofile.php?username=<? echo $postname?>><? echo $color; ?></a><? if(($playerrank >= '50')||($senior > '0')){echo"<a href=eviewtopic.php?topicid=$topicid&deletepost=$postid><font color=white face=verdana size=1> (Delete)</font></a>";}?></td><td align=right><font color=silver face=verdana size=1><?echo$time;?></font></td></tr></table>

</td><td width=8 height=22 background=/more/topright.png></td></tr><tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>

<? if($countthree > '20'){echo"This user tried to post more than 20 smilies, this is <b>NOT</b> allowed";
}else{echo nl2br($postinfo);} ?>

</font><br></td><td width=8 background=/more/rightb.png NOWRAP></td></tr><tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr></table>
<?}?></div>

<table align="center" width="100%" cellpadding="0" cellspacing="0" id=comsection name=comsection>
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP align=center><b><font color=222222 face=verdana size=1>Add Comment</font></b></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<center>
<?php 

if(($rankid >= '50')||($hdo > '0')){?>
<form action = "" method = "post"><?}?>
<?if(($topiccreator == $gangsterusername)||($rankid >= '50')){echo"<input type =submit value='Edit topic' class=textboxedit name=editlink onClick=\"editit();window.location='#';return false;\">";}

if(($rankid == '100')||($rankid == '75')||($rankid == '50')||($hdo > '0')){echo'<input type ="submit" value="Delete topic" class="textbox" name="delete"><input type ="submit" value="Sticky" class="textbox" name="sticky"><input type ="submit" value="Important" class="textbox" name="important"><input type ="submit" value="Un Important/Sticky" class="textbox" name="undo"></form>';}

?>
<script type="text/javascript">
function addcomment(){location.href='http://www.s2.mafiasociety.com/eviewtopic.php?topicid=<?echo$topicid;?>#comsection'; document.smiley.newpost.focus();}
</script>

<form action="eviewtopic.php?topicid=<?echo$topicid;?>" method="post" name="smiley"><textarea name="newpost" cols="80" rows="8" class="textbox" id ="newpost">
</textarea><br><a onClick="emotion(':arrow:')" style="cursor: pointer;"><img src="/more/smiles/arrow.gif" border=0></a><a onClick="emotion(':D')" style="cursor: pointer;"><img src="/more/smiles/biggrin.gif" border=0></a><a onClick="emotion(':S')" style="cursor: pointer;"><img src="/more/smiles/confused.gif" border=0></a><a onClick="emotion(':cry:')" style="cursor: pointer;"><img src="/more/smiles/cry.gif" border=0></a><a onClick="emotion('8)')" style="cursor: pointer;"><img src="/more/smiles/cool.gif" border=0></a><a onClick="emotion('8|')" style="cursor: pointer;"><img src="/more/smiles/eek.gif" border=0></a><a onClick="emotion(':evil:')" style="cursor: pointer;"><img src="/more/smiles/evil.gif" border=0></a><a onClick="emotion(':!:')" style="cursor: pointer;"><img src="/more/smiles/exclaim.gif" border=0></a><a onClick="emotion(':idea:')" style="cursor: pointer;"><img src="/more/smiles/idea.gif" border=0></a><a onClick="emotion(':lol:')" style="cursor: pointer;"><img src="/more/smiles/lol.gif" border=0></a><a onClick="emotion(':mad:')" style="cursor: pointer;"><img src="/more/smiles/mad.gif" border=0></a><a onClick="emotion(':?:')" style="cursor: pointer;"><img src="/more/smiles/question.gif" border=0></a><a onClick="emotion(':redface:')" style="cursor: pointer;"><img src="/more/smiles/redface.gif" border=0></a><a onClick="emotion(':rolleyes:')" style="cursor: pointer;"><img src="/more/smiles/rolleyes.gif" border=0></a><a onClick="emotion(':(')" style="cursor: pointer;"><img src="/more/smiles/sad.gif" border=0></a><a onClick="emotion(':)')" style="cursor: pointer;"><img src="/more/smiles/smile.gif" border=0></a><a onClick="emotion(':o')" style="cursor: pointer;"><img src="/more/smiles/surprised.gif" border=0></a><a onClick="emotion(':P')" style="cursor: pointer;"><img src="/more/smiles/toungue.gif" border=0></a><a onClick="emotion(':twisted:')" style="cursor: pointer;"><img src="/more/smiles/twisted.gif" border=0></a><a onClick="emotion(';)')" style="cursor: pointer;"><img src="/more/smiles/wink.gif" border=0></a><a onClick="emotion(':tdn:')" style="cursor: pointer;"><img src="/more/smiles/tdown.gif" border=0></a><a onClick="emotion(':tup:')" style="cursor: pointer;"><img src="/more/smiles/tup.gif" border=0></a>
<input type ="submit" value="Post comment" class="textbox" name="dopost"></form></center><div align=right>

<form action = "eviewtopic.php?topicid=<?echo$topicid;?>" method = "post"><input type="hidden" name="select" value="<? echo $one; ?>"><?php if($selectfrom != '0'){echo'<input type ="submit" value="Previous page" class="textbox" name="previous">';}?><input type ="submit" value="Next page" class="textbox" name="next"></form></center><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></div>


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