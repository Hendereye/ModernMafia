<? include 'included.php'; ?>

<html>
<head>
<title>Mafia Society</title><link rel="stylesheet" href="more/style.css" type="text/css" /><link rel="shortcut icon" href="/more/icon.png" type="image/x-icon" />
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
</head>
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

$allowed = "/[^0-9]/i";
$allow = "/[^a-z0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$playerip = $_SERVER['REMOTE_ADDR'];
$sessionid = preg_replace($allow,"",$sessionidraw);
$getcrewidraw = $_GET['crewid'];
$getcrewid = preg_replace($allowed,"",$getcrewidraw);

$username = $usernameone;
$userarray = $statustesttwo;
$myrank = $userarray['rankid'];

$crewinfosql = mysql_query("SELECT * FROM crews WHERE id = '$getcrewid'");
$crewinfoarray = mysql_fetch_array($crewinfosql);
$crewnameraw = $crewinfoarray['name'];
$change = $crewinfoarray['hdo'];
$crewboss = $crewinfoarray['boss'];
$members = $crewinfoarray['members'];
$createdby = $crewinfoarray['createdby'];
$crewprofilerawraw = html_entity_decode($crewinfoarray['crewprofile'],  ENT_NOQUOTES);
$crewnamea = html_entity_decode($crewnameraw, ENT_NOQUOTES);
$zpattern[a] = "<";
$zpattern[b] = ">";
$zreplace[a] = "&lt;";
$zreplace[b] = "&gt;";
$crewname = str_replace($zpattern,$zreplace,$crewnamea);
$crewprofilerawrawa = str_replace($zpattern,$zreplace,$crewprofilerawraw);

$musics = html_entity_decode($crewinfoarray['vid'],ENT_NOQUOTES);
$music = str_replace($zpattern,$zreplace,$musics);

if($getcrewid != '0'){

$crewmemberssql = mysql_query("SELECT username,status FROM users WHERE crewid = '$getcrewid' ORDER BY id ASC");}


if(($myrank == '100')||($myrank == '75')){ 
if(isset($_POST['clearprofile'])) { 
mysql_query("UPDATE crews SET crewprofile = 'Profile cleared by $username!' WHERE id = '$getcrewid'");
echo'<font color="silver" size="1" face="verdana">Profile cleared!</font>';
}
}


?>
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png" NOWRAP></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>View crew profile</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>
<tr>
<td width="8" background="/more/leftb.png"></td>
<td bgcolor="#333333">
<table width="100%" cellpadding="0" cellspacing="1">
<tr><td height="5" width="100%" bgcolor="#3A3A3A"></td></tr>
<tr><td height="8" width="100%" bgcolor="#3A3A3A"><font color="silver" size="1" face="verdana">&nbsp;<b>Crew:</b> <? echo $crewname; ?></font></td></tr>
<tr><td height="8" width="100%" bgcolor="#3A3A3A"><font color="silver" size="1" face="verdana">&nbsp;<b>Boss:</b> </font><a href=viewprofile.php?username=<? echo $crewboss; ?>><font color="silver" size="1" face="verdana"><? echo $crewboss; ?></a></font></td></tr>
<tr><td height="8" width="100%" bgcolor="#3A3A3A"><font color="silver" size="1" face="verdana">&nbsp;<b>Members:</b> </font><a href=viewprofile.php?username=<? echo $crewboss; ?>><font color="silver" size="1" face="verdana"><? echo number_format($members); ?></a></font></td></tr>
<tr><td height="8" width="100%" bgcolor="#3A3A3A"><font color="silver" size="1" face="verdana">&nbsp;<b>Created by:</b> </font><a href=viewprofile.php?username=<? echo $createdby; ?>><font color="silver" size="1" face="verdana"><? echo $createdby; ?></a></font></td></tr>
<? if(($myrank >= '25')&&($change)){?><tr><td height="8" width="100%" bgcolor="#3A3A3A"><font color="silver" size="1" face="verdana">&nbsp;<b>Crew name changed by:</b></font><a href="viewprofile.php?username=<? echo$change;?>"><font color="silver" size="1" face="verdana"> <? echo $change; ?></font></a></td></tr><?}?>
<? if($myrank >= '50'){?><tr><td height="8" width="100%" bgcolor="#3A3A3A"><a href="admincrewforum.php?crewid=<?echo$getcrewid;?>"><font color="khaki" size="1" face="verdana">&nbsp;<b>View Crew Forum:</b></font></a></td></tr><?}?>
<?
if(($myrank == '100')||($myrank == '75')){ echo('<form action="" method="post"><tr><td width="100%" bgcolor="#3A3A3A" align="center"><input type="submit" value="Clear profile" class="textbox" name="clearprofile"></td></tr></form>'); }?>
<tr><td width="100%" bgcolor="#333333"><br><font color=white size=1 face=verdana> - </font><? 
while($crewmembersarray = mysql_fetch_array($crewmemberssql)){
$members = $crewmembersarray['username'];
$membersstatus = $crewmembersarray['status'];

if($membersstatus == 'Alive'){echo"<a href =viewprofile.php?username=$members ><b>$members</b></a><font color=white size=1 face=verdana> - </font>";}
else{echo"<a href =viewprofile.php?username=$members><b><font color=black>$members</font></b></a><font color=white size=1 face=verdana> - </font>";}}
?>
<br><br><font color=silver face=verdana size=1>
<?
$apattern[1] = "/\[b\](.*?)\[\/b\]/is";
$apattern[2] = "/\[u\](.*?)\[\/u\]/is";
$apattern[3] = "/\[i\](.*?)\[\/i\]/is";
$apattern[4] = "/\[center\](.*?)\[\/center\]/is";
$apattern[5] = "/\[color=(.*?)\](.*?)\[\/color\]/is";
$apattern[6] = "/\[img\](.*?)\[\/img\]/is";
$apattern[7] = "/\[font=(.*?)\](.*?)\[\/font\]/is";
$apattern[8] = "/\[br\]/is";
$apattern[9] = "/\[size=(.*?)\](.*?)\[\/size\]/is";
$apattern[10] = "/\[quote\](.*?)\[\/quote\]/is";
$apattern[11] = "/\[left\](.*?)\[\/left\]/is";
$apattern[12] = "/\[right\](.*?)\[\/right\]/is";
$apattern[13] = "/\[s\](.*?)\[\/s\]/is";
$apattern[14] = "/\[2872267\](.*?)\[\/2872267\]/is";
$areplace[1] = "<b>$1</b>";
$areplace[2] = "<u>$1</u>";
$areplace[3] = "<i>$1</i>";
$areplace[4] = "<center>$1</center>";
$areplace[5] = "<font color=\"$1\">$2</font><font color=\"silver\">";
$areplace[6] = "<img src=\"$1\">";
$areplace[7] = "<font face=\"$1\">$2</font>";
$areplace[8] = "<br>";
$areplace[9] = "<font size=\"$1\">$2</font><font size=\"1\">";
$areplace[10] = "<blockquote><b>$1</b></blockquote>";
$areplace[11] = "<div align=\"left\">$1</div>";
$areplace[12] = "<div align=\"right\">$1</div>";
$areplace[13] = "<s>$1</s>";
$areplace[14] = "<object width=315 height=225><param name=movie value=http://www.youtube.com/v/$1&autoplay=1></param><param name=wmode value=transparent></param><embed src=http://www.youtube.com/v/$1&autoplay=1 type=application/x-shockwave-flash wmode=transparent width=325 height=250></embed></object>";

$crewprofilerawrawb = preg_replace($apattern,$areplace,$crewprofilerawrawa);

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
$crewprofile = nl2br(str_replace($bpattern,$breplace,$crewprofilerawrawb));

if(!$crewprofile){echo'No profile has been set';}else{echo"$crewprofile";} ?></font>


<?if(!$music){}else{echo"<br><br><center><object width=280 height=200><param name=movie value=\"http://www.youtube.com/v/$music&autoplay=1\"></param><param name=wmode value=transparent></param><embed src=\"http://www.youtube.com/v/$music&autoplay=1\" type=application/x-shockwave-flash wmode=transparent width=280 height=200></embed></object></center><br><br>";}?>


</td></tr>
</table>
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
<? include 'rightmenu.php'; ?></td>
</tr>
</table>

<head>
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
</head>
</body></html>