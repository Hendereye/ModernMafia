<? include 'included.php'; 

$newscheck = mysql_query("SELECT username FROM news WHERE username = '$usernameone'");
$news = mysql_num_rows($newscheck);


$edittopicraw= $_POST['edittopic'];
$edittopic = htmlentities($edittopicraw , ENT_QUOTES);



?>
<html>
<head>
<link rel="stylesheet" href="more/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="shortcut icon" href="/more/icon.png" type="image/x-icon" /></head>
<body background="/more/bgtest.png">
<table width="100%" height="335" align="center" cellpadding="0" cellspacing="3">
<tr>
<td width="250" height="25"></td>
<td width="100%"></td>
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
$getaw = $_GET['page'];
$sessionid = preg_replace($saturate,"",$sessionidraw);

$getit = mysql_real_escape_string($_POST['getit']);
$getit = preg_replace($saturated,"",$getit);


$num = preg_replace($saturated,"",$getaw);
$topicid = preg_replace($saturated,"",$topicidraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$gangsterusername = $usernameone;

$time = time();

$playerrank = $myrank;


if(($myrank >= '25')||($editname == $gangsterusername)){
if(isset($_POST['edit'])) { if(!$edittopic){}else{
mysql_query("UPDATE forumposts SET post = '$edittopic' WHERE id = '$getit' AND type = 'news'");
}}}



$newpostraw = mysql_real_escape_string($_POST['newpost']);
$newpost = htmlentities($newpostraw, ENT_QUOTES);


if(isset($_POST['dopost'])) { 
if(!$newpost){}
if(($playerrank < '75')&&($news < '1')){}
else{
mysql_query("INSERT INTO forumposts(username,topicid,ip,type,post)
VALUES ('$gangsterusername',' ','$userip','news','$newpost')");}
}



if(isset($_POST['promote'])) { 
if(!$_POST['uay']){}
if((playerrank < '75')){}
else{

$oheye = mysql_real_escape_string($_POST['uay']);

$check = mysql_query("SELECT username FROM users WHERE username = '$oheye'");
$checks = mysql_num_rows($check);

if($checks != '0'){

echo"<font color=white face=verdana size=1>User:$oheye promoted!</font>";
$newscheck = mysql_query("SELECT username FROM news WHERE username = '$oheye'");
$news = mysql_num_rows($newscheck);

if($news == '0'){
mysql_query("INSERT INTO news(username)
VALUES ('$oheye')");}

}
}
}





if(isset($_POST['demote'])) { 
if(!$_POST['uay']){}
if((playerrank < '75')){}
else{

$oheye = mysql_real_escape_string($_POST['uay']);

$check = mysql_query("SELECT username FROM users WHERE username = '$oheye'");
$checks = mysql_num_rows($check);

if($checks != '0'){

echo"<font color=white face=verdana size=1>User:$oheye demoted!</font>";
$newscheck = mysql_query("SELECT username FROM news WHERE username = '$oheye'");
$news = mysql_num_rows($newscheck);

if($news != '0'){
mysql_query("DELETE FROM news WHERE username = '$oheye'");}

}
}
}



if($myrank >= 75){?><form method=post>
<font color=white face=verdana size=1>Username:</font><input type=textbox name=uay class=textbox><input type=submit name=promote value="Promote" class=textbox><input type=submit name=demote value="Demote" class=textbox></form><? }?>

<table align="center" width="100%" cellpadding="0" cellspacing="0"><tr><td width="8" height="22" background="/more/topleft.png"></td><td height="22" background="/more/top.png" NOWRAP></td><td width="8" height="22" background="/more/topright.png"></td></tr><tr><td width="8" background="/more/leftb.png" NOWRAP></td><td background="/more/crossbg.png"><center><br><font color="khaki" face="verdana" size="2"><b>Welcome to Mafian Society News!</b></font></center><br><br><font color="silver" face="verdana" size="1"><i>If you would like to post a news article, message a HDO with your article title and the content, then they shall pass it on to one of the News Editors</i></font><table width="98%" cellpadding="0" cellspacing="0" align="center"><tr><td height="1" bgcolor="#444444"></td></tr><td height="11"></td></tr></table></td><td width="8" background="/more/rightb.png" NOWRAP></td></tr><tr><td width="8" height="9" background="/more/bottomleft.png"></td><td height="9" background="/more/bottom.png"></td><td width="8" height="9" background="/more/bottomright.png"></td></tr></table>
<?php
if($num < 1){$num = 1;}
$get = $num * 10;
$to = $get - 10;

$getposts = mysql_query("SELECT * FROM forumposts WHERE type = 'news' ORDER BY id DESC LIMIT $to,$get ");

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
$epattern[6] = "/\[img\](.*?)\[\/img\]/is";
$epattern[7] = "/\[font=(.*?)\](.*?)\[\/font\]/is";
$epattern[8] = "/\[br\]/is";
$epattern[9] = "/\[size=(.*?)\](.*?)\[\/size\]/is";
$epattern[10] = "/\[quote\](.*?)\[\/quote\]/is";
$epattern[11] = "/\[left\](.*?)\[\/left\]/is";
$epattern[12] = "/\[right\](.*?)\[\/right\]/is";
$epattern[13] = "/\[s\](.*?)\[\/s\]/is";

$ereplace[1] = "<b>$1</b>";
$ereplace[2] = "<u>$1</u>";
$ereplace[3] = "<i>$1</i>";
$ereplace[4] = "<center>$1</center>";
$ereplace[5] = "<font color=\"$1\">$2</font>";
$ereplace[6] = "<img src=\"$1\">";
$ereplace[7] = "<font face=\"$1\">$2</font>";
$ereplace[8] = "<br>";
$ereplace[9] = "<font size=\"$1\">$2</font><font size=\"1\">";
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

?>
<table align=center width=100% cellpadding=0 cellspacing=0><tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP align=right><font color=silver face=verdana size=1><? if(($myrank >= '25')||($postname == $gangsterusername)){echo"<a href=newsedit.php?id=$postid><u>Edit</u></a>&nbsp;&nbsp;&nbsp;&nbsp;";}?> Article posted by </font><a href=viewprofile.php?username=<? echo $postname; ?>><font color=silver face=verdana size=1><? echo $postname; ?></font></td><td width=8 height=22 background=/more/topright.png></td></tr><tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=silver face=verdana size=1>
<br><br><? echo nl2br($postinfo); ?><br>
</font><br></td><td width=8 background=/more/rightb.png NOWRAP></td></tr><tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr></table>
<?
}
 if(($myrank >= '75')||($news  > '0')){?>
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr><td width=100% align=center nowrap><? if($num > '1'){?><a href=news.php?page=<?echo$num-1;?>><font color=silver face=verdana size=1><b>Previous</b>&nbsp;&nbsp;</font></a><? } ?><a href=news.php?page=<?echo$num+1;?>><font color=silver face=verdana size=1><b>Next</b></font></a></td></tr></table>
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>
<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<center>
<form action="" method="post" name="smiley"><font color="white" face="verdana" size="1">Post article</font><br><textarea name="newpost" cols="42" rows="11" class="textbox" id ="newpost">
</textarea><br><a onClick="emotion(':arrow:')" style="cursor: pointer;"><img src="/more/smiles/arrow.gif" border=0></a><a onClick="emotion(':D')" style="cursor: pointer;"><img src="/more/smiles/biggrin.gif" border=0></a><a onClick="emotion(':S')" style="cursor: pointer;"><img src="/more/smiles/confused.gif" border=0></a><a onClick="emotion(':cry:')" style="cursor: pointer;"><img src="/more/smiles/cry.gif" border=0></a><a onClick="emotion('8)')" style="cursor: pointer;"><img src="/more/smiles/cool.gif" border=0></a><a onClick="emotion('8|')" style="cursor: pointer;"><img src="/more/smiles/eek.gif" border=0></a><a onClick="emotion(':evil:')" style="cursor: pointer;"><img src="/more/smiles/evil.gif" border=0></a><a onClick="emotion(':!:')" style="cursor: pointer;"><img src="/more/smiles/exclaim.gif" border=0></a><a onClick="emotion(':idea:')" style="cursor: pointer;"><img src="/more/smiles/idea.gif" border=0></a><a onClick="emotion(':lol:')" style="cursor: pointer;"><img src="/more/smiles/lol.gif" border=0></a><a onClick="emotion(':mad:')" style="cursor: pointer;"><img src="/more/smiles/mad.gif" border=0></a><a onClick="emotion(':?:')" style="cursor: pointer;"><img src="/more/smiles/question.gif" border=0></a><a onClick="emotion(':redface:')" style="cursor: pointer;"><img src="/more/smiles/redface.gif" border=0></a><a onClick="emotion(':rolleyes:')" style="cursor: pointer;"><img src="/more/smiles/rolleyes.gif" border=0></a><a onClick="emotion(':(')" style="cursor: pointer;"><img src="/more/smiles/sad.gif" border=0></a><a onClick="emotion(':)')" style="cursor: pointer;"><img src="/more/smiles/smile.gif" border=0></a><a onClick="emotion(':o')" style="cursor: pointer;"><img src="/more/smiles/surprised.gif" border=0></a><a onClick="emotion(':P')" style="cursor: pointer;"><img src="/more/smiles/toungue.gif" border=0></a><a onClick="emotion(':twisted:')" style="cursor: pointer;"><img src="/more/smiles/twisted.gif" border=0></a><a onClick="emotion(';)')" style="cursor: pointer;"><img src="/more/smiles/wink.gif" border=0></a><a onClick="emotion(':tdn:')" style="cursor: pointer;"><img src="/more/smiles/tdown.gif" border=0></a><a onClick="emotion(':tup:')" style="cursor: pointer;"><img src="/more/smiles/tup.gif" border=0></a><br>
<input type ="submit" value="Post article" class="textbox" name="dopost"></form></center>
</td>
<td width="8" background="/more/rightb.png" NOWRAP></td>
</tr>
<tr>
<td width="8" height="9" background="/more/bottomleft.png"></td>
<td height="9" background="/more/bottom.png"></td>
<td width="8" height="9" background="/more/bottomright.png"></td>
</tr>
</table>
<? } ?>
</td>
<td width="250" valign="top">
<? include 'rightmenu.php'; ?></td></tr>
</table>

</body></html>