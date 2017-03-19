<? include 'included.php';

?>

<html>
<head>
<link rel="stylesheet" href="more/style.css" type="text/css" /><link rel="shortcut icon" href="/more/icon.png" type="image/x-icon" />
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<script type="text/javascript">
function emotion(em) { document.smiley.sendinfo.value=document.smiley.sendinfo.value+em;}

function msg()
{document.getElementById("msgs").style.display = "block";document.smiley.sendinfo.focus();}

function closes()
{document.getElementById("msgs").style.display = "none";}
</script>
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
<? 


$autoplay = $statustesttwo['autoplay'];
$button = $statustesttwo['sentmsgs'];

$button = ceil($button / 5);

$time = time();

$allowed = "/[^a-z0-9]/i";
$getusernameraw = mysql_real_escape_string($_GET['username']);
$getusername = preg_replace($allowed,"",$getusernameraw);

$getsugsql = mysql_query("SELECT * FROM suggestions WHERE username = '$getusername'");
$getsugsqla = mysql_fetch_array($getsugsql);
$getsugid = $getsugsqla['id'];



$oidod = mysql_query("SELECT * FROM datesjoined WHERE username = '$getusername' ORDER BY id DESC LIMIT 1");
$fdsf = mysql_fetch_array($oidod);
$timejoined = $fdsf['time'];


$getinfosql = mysql_query("SELECT * FROM users WHERE ID = '$getsugid'");
$getinfoarray = mysql_fetch_array($getinfosql);
$getname = $getinfoarray['username'];
$roboteh = $getinfoarray['robot'];


if($getname == 'RaeqwoN'){$autoplay = 1; }

$getcrewid = $getinfoarray['crewid'];


$appear = $getinfoarray['appear'];
$enty = $getinfoarray['ent'];
$getrankid = $getinfoarray['rankid'];
$pts = number_format($getinfoarray['points']);
$getrankup = number_format($getinfoarray['rankup'], 2);
$gethealth = floor($getinfoarray['health']);
$bullets = number_format($getinfoarray['bullets']);
$getmoneyid = $getinfoarray['money'];
$page = $getinfoarray['page'];
$swiss = number_format($getinfoarray['swiss']);
$displaybusts = $getinfoarray['displaybusts'];
$displaykills = $getinfoarray['displaykills'];
$userids = $getinfoarray['ID'];
$displaybustsa = $getinfoarray['casinowins'];
$activity = $getinfoarray['activity'];
$busts = $getinfoarray['jailbusts'];
$kills = $getinfoarray['kills'];
$casinos = $getinfoarray['casinos'];
$views = $getinfoarray['views'];
$viewsa = $getinfoarray['showviews'];
$hdos = $getinfoarray['hdo'];
$zzpattern[a] = "<";
$zzpattern[b] = ">";
$zzreplace[a] = "&lt;";
$zzreplace[b] = "&gt;";
$musics = html_entity_decode($getinfoarray['music'],ENT_NOQUOTES);
$music = str_replace($zzpattern,$zzreplace,$musics);
$quoteraw = html_entity_decode($getinfoarray['quote'],ENT_NOQUOTES);
$quote = str_replace($zzpattern,$zzreplace,$quoteraw);


$pm = $getinfoarray['personal'];
$getmoneyidtwo = number_format($getinfoarray['money']);
$getstatusid = $getinfoarray['status'];
$getsmsgssent = $getinfoarray['sentmsgs'];
$getsmsgsrecieved = $getinfoarray['recievedmsgs'];
$tickets = $getinfoarray['tickets'];
$ppoints = $getinfoarray['penpoints'];
$getprofileidrawraw = html_entity_decode($getinfoarray['profile'], ENT_NOQUOTES);

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


$getprofileidrawrawa = str_replace($zpattern,$zreplace,$getprofileidrawraw);

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
$apattern[14] = "/\[user\](.*?)\[\/user\]/is";


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
$areplace[14] = "<a href='viewprofile.php?username=$1'>$1</a>";


$agetprofileid = preg_replace($apattern,$areplace,$getprofileidrawrawa);

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

$getprofileid = str_replace($bpattern,$breplace,$agetprofileid, $countthree);


$getstatussql = mysql_query("SELECT username FROM usersonline WHERE id = '$userids'");
$getstatusnumrows = mysql_num_rows($getstatussql);


$gtrow = mysql_query("SELECT username FROM senior WHERE username = '$getname'");
$gtrows = mysql_num_rows($gtrow);
if($gtrows > '0'){$hehehe = 'Senior ';}

if($getstatusarray == '0'){$getstatus == '<font color=red face=verdana size=1>Offline</font>';}else{$getstatus = '<font color=lime face=verdana size=1>Online</font>';}


if($getcrewid == '0'){$getcrew = '<b>Crew: </b>None';}
elseif($getcrewid != '0'){ 
$getcrewsql = mysql_query("SELECT boss,id,name FROM crews WHERE id = '$getcrewid'");
$getcrewarray = mysql_fetch_array($getcrewsql);

$getcrewboss = $getcrewarray['boss'];
$getcrewid = $getcrewarray['id'];
$getcrewnameraw = html_entity_decode($getcrewarray['name'],ENT_NOQUOTES);
$getcrewname = str_replace($zpattern,$zreplace,$getcrewnameraw);

if(($getcrewboss == $getname)&&($getname)){$getcrew = "<b>Boss Of:</b> </font><a href=viewcrew.php?crewid=$getcrewid><font color=silver size=1 face=verdana>$getcrewname</a>";}
else{$getcrew = "<b>Crew: </b></font><a href=viewcrew.php?crewid=$getcrewid><font color=silver size=1 face=verdana>$getcrewname";}}

if($getrankid == '1'){ $getrank = 'Tramp'; }
elseif($getrankid == '2'){ $getrank = 'Citizen';}
elseif($getrankid == '3'){ $getrank = 'Wise Guy';}
elseif($getrankid == '4'){ $getrank = 'Thug';}
elseif($getrankid == '5'){ $getrank = 'Respected Thug';}
elseif($getrankid == '6'){ $getrank = 'Mobster';}
elseif($getrankid == '7'){ $getrank = 'Respected Mobster';}
elseif($getrankid == '8'){ $getrank = 'Assassin';}
elseif($getrankid == '9'){ $getrank = 'Respected Assassin';}
elseif($getrankid == '10'){ $getrank = 'Mafioso';}
elseif($getrankid == '11'){ $getrank = 'Respected Mafioso';}
elseif($getrankid == '12'){ $getrank = 'Underboss';}
elseif($getrankid == '13'){ $getrank = 'Respected Underboss';}
elseif($getrankid == '14'){ $getrank = 'Boss';}
elseif($getrankid == '15'){ $getrank = 'Respected Boss';}
elseif($getrankid == '16'){ $getrank = 'Godfather';}
elseif($getrankid == '17'){ $getrank = 'Respected Godfather';}
elseif($getrankid == '18'){ $getrank = 'Gangster';}
elseif($getrankid == '19'){ $getrank = 'Respected Gangster';}
elseif($getrankid == '20'){ $getrank = 'Don';}
elseif($getrankid == '21'){ $getrank = 'Respected Don';}
elseif($getrankid == '22'){ $getrank = '<b>Tough Don</b>';}
elseif($getrankid == '24'){ $getrank = 'Account under speculation';}
elseif($getrankid == '25'){ $getrank = 'Entertainer Manager';}
elseif($getrankid == '50'){ $getrank = 'Moderator';}
elseif($getrankid == '65'){ $getrank = 'HDO Manager';}
elseif($getrankid == '75'){ $getrank = 'Lead Moderator';}
elseif($getrankid == '100'){ $getrank = 'Administrator';}

else{$getrank = '';}


$etestrows = $enty;

$regbanksql = mysql_query("SELECT amount FROM bank WHERE username = '$getname'");
$regbankarray = mysql_fetch_array($regbanksql );
$regbank = $regbankarray['amount'];
$regbankformat = number_format($regbank);

$getmoneyid = $getmoneyid  + $regbank;

if($getmoneyid == '0') { $getmoney = 'Broke'; }
elseif($getmoneyid > '0' && $getmoneyid < '500000') {$getmoney = 'Very Poor';}
elseif($getmoneyid > '499999' && $getmoneyid < '1000000') {$getmoney = 'Poor';}
elseif($getmoneyid > '999999' && $getmoneyid < '5000000') {$getmoney = 'Rich';}
elseif($getmoneyid > '4999999' && $getmoneyid < '10000000') {$getmoney = 'Quite Rich';} 
elseif($getmoneyid > '9999999' && $getmoneyid < '50000000') {$getmoney = 'Extremely Rich';} 
elseif($getmoneyid > '49999999' && $getmoneyid < '1000000000') {$getmoney = 'Immensely Rich';} 
elseif ($getmoneyid > '999999999') { $getmoney = 'Monumental Billionaire'; }


if($getstatusnumrows == '0'){$getstatustwo = '<font color=red>Offline</font>';}
elseif($getstatusnumrows > '0'){$getstatustwo = '<font color=lime>Online</font>';}

if(!$getprofileid) { $getprofile = '&nbsp;No profile has been set!<br>'; }
else { $getprofile = nl2br($getprofileid); }

$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($allowed,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$gangsterrankraw = $usernameone;

$gangsterusernamearray = $statustesttwo;
$gangsterrank = $gangsterusernamearray['rankid'];
if($gangsterrank >= '100'){

$bodyguards = mysql_num_rows(mysql_query("SELECT * FROM bodyguards WHERE username = '$getname'"));
$bodyguardsa = mysql_num_rows(mysql_query("SELECT * FROM bodyguards WHERE guarding = '$getname'"));
$bgcount = $bodyguards + $bodyguardsa;
}


$tony = $gangsterusernamearray['tony'];

if($getstatusid == 'Dead'){$getstatus = '<font color=#777777>Dead</font>';}elseif(($tony == '1')&&($getname == 'Tony')){$getstatus = '<font color=#777777>Dead</font>';}
else{$getstatus = 'Alive';}

$tame = time();
$ac = $tame - $activity;

$at = $ac;

if($at >= '31536000'){$ac = '1 Year ago';}
elseif($at >= '5308400'){$ac = '2 Months ago';}
elseif($at >= '4000000'){$ac = '1 & 1/2 Months ago';}
elseif($at >= '2678400'){$ac = '1 Month ago';}
elseif($at >= '1209600'){$ac = '2 Weeks ago';}
elseif($at >= '604800'){$ac = '1 Week ago';}
elseif($at >= '518400'){$ac = '6 Days ago';}
elseif($at >= '432000'){$ac = '5 Days ago';}
elseif($at >= '345600'){$ac = '4 Days ago';}
elseif($at >= '259200'){$ac = '3 Days ago';}
elseif($at >= '172800'){$ac = '2 Days ago';}
elseif($at >= '86400'){$ac = 'Yesterday';}
elseif($at >= '3600'){$one = floor($at / 3600);
$ac = "$one Hours Ago";}
else{$ac = "$at seconds ago";}
$radni = mt_rand(0,3);


$getcars = mysql_query("SELECT * FROM cars WHERE owner = '$getname' AND display = 'yes' ORDER BY carid DESC LIMIT 0,30");



include 'leftmenu.php'; ?></td>
<td width="100%" valign="top">

<?php

if((($seniorchecks != '0')||($gangsterrank >= '25')) && ($getrankid != '100') && ($gangsterrankraw != '$getname')){
if(isset($_POST['clearprofile'])) { 
mysql_query("UPDATE users SET profile = 'Profile cleared by $gangsterrankraw' WHERE username = '$getname'");
echo'<font color="silver" size="1" face="verdana">Profile cleared!</font>';
}
}

if(isset($_POST['save'])) { 
if($userids){
$gtnotes = mysql_query("SELECT note FROM notes WHERE theirid = '$userids' AND yourid = '$ida'");
$ifnone = mysql_num_rows($gtnotes);

$notesubmitraw = $_POST['editnote'];
$notesubmit = htmlentities($notesubmitraw, ENT_NOQUOTES); 

if($ifnone != '1'){


$rawinsertlog = "INSERT INTO notes(yourid,theirid,note)
VALUES ('$ida','$userids','$notesubmit')";
$insertlog = mysql_query($rawinsertlog);echo"<font color=white face=verdana size=1>Note Saved!</font>";$ohi = 1;}else{


mysql_query("UPDATE notes SET note= '$notesubmit' WHERE yourid = '$ida' AND theirid = '$userids'");$ohi = 1;echo"<font color=white face=verdana size=1>Note Saved!</font>";}}}

?><div id=msgs style="display:none;">
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png" NOWRAP></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Send message</b> <a onClick="closes();" href=#>(Hide this)</a></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png"></td>
<td background="/more/crossbg.png">
<br><center><form action=send.php?sendto=<?echo$getusername;?> method="post" name="smiley"><font color="white" face="verdana" size="1">Send to:</font><br><input type="text" class="textbox" name="sendto" value="<?echo"$getusername";?>"><br><font color="white" face="verdana" size="1">Message:</font><br><textarea name="sendinfo" cols="42" rows="11" class="textbox">
</textarea><br><a onClick="emotion(':arrow:')" style="cursor: pointer;"><img src="/more/smiles/arrow.gif" border=0></a><a onClick="emotion(':D')" style="cursor: pointer;"><img src="/more/smiles/biggrin.gif" border=0></a><a onClick="emotion(':S')" style="cursor: pointer;"><img src="/more/smiles/confused.gif" border=0></a><a onClick="emotion(':cry:')" style="cursor: pointer;"><img src="/more/smiles/cry.gif" border=0></a><a onClick="emotion('8)')" style="cursor: pointer;"><img src="/more/smiles/cool.gif" border=0></a><a onClick="emotion('8|')" style="cursor: pointer;"><img src="/more/smiles/eek.gif" border=0></a><a onClick="emotion(':evil:')" style="cursor: pointer;"><img src="/more/smiles/evil.gif" border=0></a><a onClick="emotion(':!:')" style="cursor: pointer;"><img src="/more/smiles/exclaim.gif" border=0></a><a onClick="emotion(':idea:')" style="cursor: pointer;"><img src="/more/smiles/idea.gif" border=0></a><a onClick="emotion(':lol:')" style="cursor: pointer;"><img src="/more/smiles/lol.gif" border=0></a><a onClick="emotion(':mad:')" style="cursor: pointer;"><img src="/more/smiles/mad.gif" border=0></a><a onClick="emotion(':?:')" style="cursor: pointer;"><img src="/more/smiles/question.gif" border=0></a><a onClick="emotion(':redface:')" style="cursor: pointer;"><img src="/more/smiles/redface.gif" border=0></a><a onClick="emotion(':rolleyes:')" style="cursor: pointer;"><img src="/more/smiles/rolleyes.gif" border=0></a><a onClick="emotion(':(')" style="cursor: pointer;"><img src="/more/smiles/sad.gif" border=0></a><a onClick="emotion(':)')" style="cursor: pointer;"><img src="/more/smiles/smile.gif" border=0></a><a onClick="emotion(':o')" style="cursor: pointer;"><img src="/more/smiles/surprised.gif" border=0></a><a onClick="emotion(':P')" style="cursor: pointer;"><img src="/more/smiles/toungue.gif" border=0></a><a onClick="emotion(':twisted:')" style="cursor: pointer;"><img src="/more/smiles/twisted.gif" border=0></a><a onClick="emotion(';)')" style="cursor: pointer;"><img src="/more/smiles/wink.gif" border=0></a><a onClick="emotion(':tdn:')" style="cursor: pointer;"><img src="/more/smiles/tdown.gif" border=0></a><a onClick="emotion(':tup:')" style="cursor: pointer;"><img src="/more/smiles/tup.gif" border=0></a><br>
<input type ="submit" value="Send message" class="textbox" name="<? echo"$button";?>"></center>
</form>
</td>
<td width="8" background="/more/rightb.png" NOWRAP></td>
</tr>

<tr>
<td width="8" height="9" background="/more/bottomleft.png"></td>
<td height="9" background="/more/bottom.png"></td>
<td width="8" height="9" background="/more/bottomright.png"></td>
</tr>
</table></div>
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png" NOWRAP></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b><?echo$getname; if($hdos > '0'){if($getrankid < '25'){?> </font><font color="lime" face="verdana" size="1"> <?echo$hehehe;?> HDO</font><? }}?></font><? if($quote){echo"<font color=white face=verdana size=1></b> - $quote </font>"; if($gangsterrankraw == $getname){echo"<a href=viewprofile.php?username=$gangsterrankraw&clear=1>(Clear)</a>"; } }?></b></center></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>
<tr>
<td width="8" background="/more/leftb.png"></td>
<td bgcolor="#333333">
<table width="100%" cellpadding="0" cellspacing="1">
<tr><td height="5" width="100%" bgcolor="#3A3A3A"></td></tr>
<?
if($roboteh == '1'){echo'<tr><td height=8 width=100% bgcolor=#3a3a3a align=center><font color=888888 size=1 face=verdana><b>&nbsp;Robot Bodyguard</font></td></tr>';
}?>
<tr><td height="8" width="100%" bgcolor="#3A3A3A"><font color="silver" size="1" face="verdana">&nbsp;<b>Username:&nbsp;</b></font><a class=viewsourcehpissoff onclick=msg(); href=#><font color="silver" size="1" face="verdana"><? echo $getname; ?></font></a></td></tr>
<? if($getname == 'Blank'){?><tr><td height="8" width="100%" bgcolor="#3A3A3A"><font color="silver" size="1" face="verdana"><b>&nbsp;Rank:</b></font><font color="silver" size="1" face="verdana"> Mafioso</font></td></tr>
<tr><td height="8" width="100%" bgcolor="#3A3A3A"><font color="silver" size="1" face="verdana">&nbsp;<b>Wealth:</b></font><font color="silver" size="1" face="verdana"> Monumental Billionaire</font></td></tr><? if($getname != 'Danny'){?>
<tr><td height="8" width="100%" bgcolor="#3A3A3A"><font color="silver" size="1" face="verdana">&nbsp;<b>Status:</b></font><font color="silver" size="1" face="verdana"> Alive (<font color=red>Offline</font>)</font></td></tr><? }?>
<? if($roboteh != '1'){?><tr><td height="8" width="100%" bgcolor="#3A3A3A"><font color="silver" size="1" face="verdana">&nbsp;<b>Messages Sent:</b> <? echo $getsmsgssent; ?></font></td></tr>
<tr><td height="8" width="100%" bgcolor="#3A3A3A"><font color="silver" size="1" face="verdana">&nbsp;<b>Messages Received:</b> <? echo $getsmsgsrecieved; ?></font></td></tr>
<?}}?>

<? if($getname != 'Blank'){?>
<tr><td height="8" width="100%" bgcolor="#3A3A3A"><font color="silver" size="1" face="verdana">&nbsp;<? echo $getcrew; ?></font></td></tr>
<? }if($getname != 'Blank'){?>

<tr><td height="8" width="100%" bgcolor="#3A3A3A"><font color="silver" size="1" face="verdana"><b>&nbsp;Rank:</b> <?if($secure > '0'){echo"Security Analyst";}elseif($etestrows > '0'){echo"$getrank / Entertainer";}elseif($getname == 'DJOption'){echo"$getrank / DJ Manager";}else{echo "$getrank";} ?></font><? if($news > '0'){echo"<font color=black size=1 face=verdana>&nbsp;&nbsp;<b>[News Editor]";}?></td></tr>
<?if($roboteh == '1'){?>
<tr><td height="8" width="100%" bgcolor="#3A3A3A"><font color="silver" size="1" face="verdana"><b>&nbsp;Vest:</b></font><font color="silver" size="1" face="verdana">  SWAT Tactical vest</font></td></tr><?}?>

<? }if($getname != 'Blank'){?>
<?if($getname != 'Illuminati'){?>
<tr><td height="8" width="100%" bgcolor="#3A3A3A"><font color="silver" size="1" face="verdana"><b>&nbsp;Wealth:</b> <? if($etestrows > '0'){echo"$$getmoneyidtwo";}else{echo "$getmoney";} ?></font><?php if(($getrankid != '100') && ($gangsterrank >= '65')){ echo ("<font color=white size=1 face=verdana>&nbsp;&nbsp;&nbsp;<b>Money [$$getmoneyidtwo]</b></font>");}?><? }if($getname != 'Blank'){if($appear == '1'){?><tr><td height="8" width="100%" bgcolor="#3A3A3A"><font color="silver" size="1" face="verdana"><b>&nbsp;Status:</b> <? echo $getstatus; ?> <? if(($getname == 'Scou  vffvfdvse')||($getname == 'AlexvfdvdvO')){?>(<font color=gold><b>?</b></font>)</font><?}else{?>(<font color=red>Offline</font>)</font></td></tr><?}?><?}else{?><tr><td height="8" width="100%" bgcolor="#3A3A3A"><font color="silver" size="1" face="verdana">&nbsp;<b>Status:</b> <? echo $getstatus; ?> <? if(($getname == 'Scousj e')||($getname == 'RaeqwoN f')){?>(<font color=gold><b>?</b></font>)</font><?}else{?>(<? echo $getstatustwo; ?>)</font></td></tr><?}?><?}?>
<tr><td height="8" width="100%" bgcolor="#3A3A3A"><font color="silver" size="1" face="verdana"><b>&nbsp;Messages Sent:</b> <? echo $getsmsgssent; ?></font></td></tr>
<tr><td height="8" width="100%" bgcolor="#3A3A3A"><font color="silver" size="1" face="verdana"><b>&nbsp;Messages Received:</b> <? echo $getsmsgsrecieved; ?></font></td></tr>
<? if((($getrankid >= '25')||($hdos > '0'))&&($getrankid != '100')){?><tr><td height="8" width="100%" bgcolor="#3A3A3A"><font color="silver" size="1" face="verdana">&nbsp;<b>Helpdesk tickets answered:</b> <?echo$tickets;?></font></td></tr><? }?>
<? if($displaybusts == 'yes'){?><tr><td height="8" width="100%" bgcolor="#3A3A3A"><font color="silver" size="1" face="verdana">&nbsp;<b>Jailbusts:</b> <?echo$busts;?></font></td></tr><? }
 if($displaybustsa == '2'){?><tr><td height="8" width="100%" bgcolor="#3A3A3A"><font color="silver" size="1" face="verdana">&nbsp;<b>Casino Wins:</b> <?echo$casinos;?></font></td></tr><? }


if(($gangsterrank == '100')&&($bgcount > '0')){?><tr><td height="8" width="100%" bgcolor="#3A3A3A"><a href=bgstatus.php?username=<?echo$getname;?>><font color="silver" size="1" face="verdana"><b>&nbsp;View bodyguard information:</b></font></a></td></tr><?}
if($gangsterrank >= '65'){?><tr><td height="8" width="100%" bgcolor="#3A3A3A"><a href=viewpoints.php?username=<?echo$getname;?>><font color="silver" size="1" face="verdana"><b>&nbsp;View point transactions:</b></font></a></td></tr><?}

if($displaykills == 'yes'){?><tr><td height="8" width="100%" bgcolor="#3A3A3A"><font color="silver" size="1" face="verdana"><b>&nbsp;Number Of Kills:</b> <?echo$kills;?></font></td></tr><? }}
while($getcarsarray = mysql_fetch_array($getcars)){
$carid = $getcarsarray['carid'];
$carida = $getcarsarray['id'];
$carnamea = $getcarsarray['carname'];
if($carid == 1){$carname = 'Skoda Octavius';}
elseif($carid == 2){$carname = 'Ford Fiesta';}
elseif($carid == 3){$carname = 'Audi A3';}
elseif($carid == 4){$carname = 'Ford Mondeo';}
elseif($carid == 5){$carname = 'Jaguar X Type';}
elseif($carid == 6){$carname = 'BMW X5';}
elseif($carid == 7){$carname = 'Audi Q7';}
elseif($carid == 8){$carname = 'Ferrari Spider';}
elseif($carid == 9){$carname = 'Bugatti Veyron';}
elseif($carid == 10){$carname = 'Pagani Zonda';}
elseif($carid == 11){$carname = "$carnamea";}
if($carid == 10){$before = '<b><font color=red face=verdana size=1>&nbsp;Very Rare</b></font><font color=silver face=verdana size=1>:&nbsp;</font></font>';}
elseif($carid == 9){$before = '<b><font color=red face=verdana size=1>&nbsp;Rare</b></font><font color=silver face=verdana size=1>:&nbsp;</font></font>';}
elseif($carid == 8){$before = '<b><font color=red face=verdana size=1>&nbsp;Rare</b></font><font color=silver face=verdana size=1>:&nbsp;</font></font>';}
elseif($carid == 11){$before = '<b><font color=red face=verdana size=1>&nbsp;Custom</b></font><font color=silver face=verdana size=1>:&nbsp;</font></font>';}
else{$before = '<font color=silver face=verdana size=1>&nbsp;</font>';}
echo"<tr><td height=8 width=100% bgcolor=#3A3A3A><font size=1 face=verdana>&nbsp;</font><a href=viewcar.php?id=$carida><font color=silver size=1 face=verdana><b>Car</b>:$before<font color=silver size=1 face=verdana>$carname</font></a></td></tr>";}}?>
<?php

$consfame = $getinfoarray['consfame'];
$totalmfame = $getinfoarray['totalmfame'];
$bustsfame = $getinfoarray['bustsfame'];
$casinofame = $getinfoarray['casinofame'];
$crewbfame = $getinfoarray['crewbfame'];
$ptsfame = $getinfoarray['ptsfame'];
$showhonours = $getinfoarray['showhonours'];

$honours = $consfame + $totalmfame + $bustsfame + $casinofame + $crewbfame + $ptsfame;


$countall = 0;
if($consfame > '0'){$countall++;}
if($totalmfame > '0'){$countall++;}
if($bustsfame > '0'){$countall++;}
if($casinofame > '0'){$countall++;}
if($crewbfame> '0'){$countall++;}
if($ptsfame > '0'){$countall++;}

if(($honours > '0')&&($showhonours > '1')){


echo"<tr><td height=8 width=100% bgcolor=#3A3A3A align=center><font color=silver size=1 face=verdana><b>&nbsp;$getname's Honors </font></b><font color=white face=verdana size=2>(<b><font color=khaki size=2 face=verdana>$countall</font><font color=white fACE=VERDANA SIZE=2></b>)</font><font color=silver size=1 face=verdana>:</font></td></tr>";

if($bustsfame > '0'){
if($bustsfame == '1'){$extwo = "style='color:gold;font-weight:bold;'";}
echo"<tr><td height=8 width=100% bgcolor=#3A3A3A><font color=silver size=1 face=verdana>&nbsp;<b><a href=record.php?username=$getname#jailbusts $extwo>#$bustsfame Most Jailbusts</a></font></b></td></tr>";}
if($consfame > '0'){
if($consfame == '1'){$exthree = "style='color:gold;font-weight:bold;'";}
echo"<tr><td height=8 width=100% bgcolor=#3A3A3A><font color=silver size=1 face=verdana>&nbsp;<b><a href=record.php?username=$getname#consecutive $exthree>#$consfame Most Consecutive Jailbusts</a></font></b></td></tr>";}
if($totalmfame > '0'){
if($totalmfame == '1'){$exfour = "style='color:gold;font-weight:bold;'";}
echo"<tr><td height=8 width=100% bgcolor=#3A3A3A><font color=silver size=1 face=verdana>&nbsp;<b><a href=record.php?username=$getname#melted $exfour>#$totalmfame Most Bullets Melted</a></font></b></td></tr>";}
if($crewbfame > '0'){
if($crewbfame == '1'){$exfive = "style='color:gold;font-weight:bold;'";}
echo"<tr><td height=8 width=100% bgcolor=#3A3A3A><font color=silver size=1 face=verdana>&nbsp;<b><a href=record.php?username=$getname#crew_bullets $exfive>#$crewbfame Most Bullets Melted For Crew</a></font></b></td></tr>";}
if($casinofame > '0'){
if($casinofame == '1'){$exsix = "style='color:gold;font-weight:bold;'";}
echo"<tr><td height=8 width=100% bgcolor=#3A3A3A><font color=silver size=1 face=verdana>&nbsp;<b><a href=record.php?username=$getname#casino_wins $exsix>#$casinofame Most Casino Wins</a></font></b></td></tr>";}
if($ptsfame > '0'){
if($ptsfame == '1'){$exseven = "style='color:gold;font-weight:bold;'";}
echo"<tr><td height=8 width=100% bgcolor=#3A3A3A><font color=silver size=1 face=verdana>&nbsp;<b><a href=record.php?username=$getname#points_spent $exseven>#$ptsfame Most Points Spent On Account</a></font></b></td></tr>";}



}

?>
<?
 



$seniorchecki = mysql_query("SELECT username FROM senior WHERE username = '$usernameone'");
$seniorchecks = mysql_num_rows($seniorchecki);


if((($seniorchecks != '0')||($gangsterrank >= '25')) && ($getrankid != '100') && ($gangsterrankraw != '$getname')){ echo('<form action="" method="post"><tr><td height="8" width="100%" bgcolor="#3A3A3A" colspan="2" align="center"><input type="submit" value="Clear profile" class="textbox" name="clearprofile"></td></tr></form>'); }if($getname != 'RaeqwoN'){?>





<tr><td height="15" width="100%" bgcolor="#333333"></td></tr><?}?>
<tr><td height="15" width="100%" bgcolor="#333333" align=right><a onclick=showsell(); href=# style=display:none; id=plus><font color=white face=verdana size=1>Cars for sale (<b>+</b>)</font></a></td></tr>


<tr><td width="100%" bgcolor="#333333" align=center>
<table width=99%><tr><td>
<?php if(($getrankid != '100') && ($gangsterrank >= '65')){ echo ("<center><font color=white size=1 face=verdana>&nbsp;&nbsp;<b>Swiss [$$swiss]</b></font><font color=white size=1 face=verdana>&nbsp;&nbsp;<b>Bank [$$regbankformat]</b></font><font color=white size=1 face=verdana>&nbsp;&nbsp;<b>Bullets [$bullets]</b></font><font color=white size=1 face=verdana>&nbsp;&nbsp;<b>Rankup [$getrankup%]</b></font><font color=white size=1 face=verdana>&nbsp;&nbsp;<b>Points [$pts]</b></font><font color=white size=1 face=verdana>&nbsp;&nbsp;<b>Health [$gethealth%]</b></font><font color=white size=1 face=verdana>&nbsp;&nbsp;<b>Last activity [$ac]</b></font><font color=white size=1 face=verdana>&nbsp;&nbsp;<b>Last page [$page]</b></font><font color=white size=1 face=verdana>&nbsp;&nbsp;<b>Kills [$kills]</b></font><font color=white size=1 face=verdana>&nbsp;&nbsp;</font><b><a href=/penreason.php?user=$getname><font color=white size=1 face=verdana>Pen points [$ppoints]</b></font></a></center><br><br>");}
elseif(($getrankid != '100') && ($gangsterrank == '50')){ echo ("<center><font color=white size=1 face=verdana>&nbsp;&nbsp;<b>Kills [$kills]</b></font><font color=white size=1 face=verdana>&nbsp;&nbsp;</font><font color=white size=1 face=verdana><b>Last activity [$ac]</b></font><font color=white size=1 face=verdana>&nbsp;&nbsp;<b>Swiss [$$swiss]</b></font><font color=white size=1 face=verdana>&nbsp;&nbsp;<b>Bank [$$regbankformat]</b>&nbsp;&nbsp;</font><b><a href=/penreason.php?user=$getname><font color=white size=1 face=verdana><b>Pen points [$ppoints]</b></font></a></center><br><br>");}
elseif(($getrankid != '100') && ($gangsterrank == '25')){ echo ("<center><font color=white size=1 face=verdana>&nbsp;&nbsp;<b>Kills [$kills]</b></font><font color=white size=1 face=verdana>&nbsp;&nbsp;</font><font color=white size=1 face=verdana><b>Last activity [$ac]</b>&nbsp;&nbsp;</font><b><a href=/penreason.php?user=$getname><font color=white size=1 face=verdana><b>Pen points [$ppoints]</b></font></a></center><br><br>");}?>

<p style=max-width:1200px;overflow:hidden;><font color="silver" size="1" face="verdana"><? if($countthree > '20'){echo'This user tried to post more than 20 smilies, this is <b>NOT</b> allowed';}else{ echo $getprofile;}?></font></p>


<? if($getname == 'Danny'){?><table align=center cellspacing=3><tr><td width=50% valign=top><?}?>
<?if(!$music){}else{echo"<br><br><center><object width=280 height=200><param name=movie value=\"http://www.youtube.com/v/$music&autoplay=$autoplay&rel=0\"></param><param name=wmode value=transparent></param><embed src=\"http://www.youtube.com/v/$music&autoplay=$autoplay&rel=0\" type=application/x-shockwave-flash wmode=transparent width=280 height=200></embed></object></center><br><br>";}?><? if($getname == 'RaeqwoN'){?></td><td width=50% valign=top></td></tr></table><?}?>

<?php if(($getrankid != '100') && (($gangsterrank >= '50')||($etestrows > '0'))){
$lasttensql = mysql_query("SELECT * FROM moneysent WHERE username = '$getname' ORDER BY id DESC LIMIT 0,25");
$lasttenrsql =mysql_query("SELECT * FROM moneysent WHERE sent = '$getname' ORDER BY id DESC LIMIT 0,25");?>
<br><br><table align=center><tr><td valign=top><table cellpadding="0" cellspacing="1" align="center">
<tr><td width="180" align="center" NOWRAP><font color="white" size="1" face="verdana"><b>Last 25 Sent</b></font></td></tr><?php 
while($lasttenarray = mysql_fetch_array($lasttensql)){
$lasttento = $lasttenarray['sent'];
$lasttenamount = number_format($lasttenarray['amount']);
echo"<tr><td NOWRAP><font color=white size=1 face=verdana>You sent $$lasttenamount to </font><a href=viewprofile.php?username=$lasttento><font color=white size=1 face=verdana><b>$lasttento</b></font></a></td></tr>";
}?></td>
<tr><td height="10"></td></tr>
</table></td><td valign=top><table cellpadding="0" cellspacing="1" align="center">
<tr><td width="180" align="center" NOWRAP><font color="white" size="1" face="verdana"><b>Last 25 Received</b></font></td></tr>
<?php 
while($lasttenrarray = mysql_fetch_array($lasttenrsql)){
$lasttenrto = $lasttenrarray['username'];
$qiky = $lasttenrarray['quicktrade'];
$lasttenramount = number_format($lasttenrarray['amount']);if($qiky == 'yes'){$misg = 'QT hidden offer';}else{$misg = ' ';}
echo"<tr><td NOWRAP><font color=white size=1 face=verdana>You recieved $$lasttenramount from </font><a href=viewprofile.php?username=$lasttenrto><font color=white size=1 face=verdana><b>$lasttenrto</b> $misg</font></a></td></tr>";
}?></table></td></tr></table><br><?}?><br><table width="98%" cellpadding="0" cellspacing="0" align="center"><tr><td height="1" bgcolor="#444444"></td></tr><tr><td height="5"></td></tr><tr><td height="11" valgn=top align=right><font color=silver face=verdana size=1>Account created: <?if(!$timejoined){echo"Unavailable";}echo$timejoined;?></font></td></tr></table>
</td></tr></table>
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
</table><? 
$gtnotes = mysql_query("SELECT note FROM notes WHERE theirid = '$userids' AND yourid = '$ida'");
$ifnone = mysql_num_rows($gtnotes);

if($ifnone != '1'){}else{

$getnotey = mysql_fetch_array($gtnotes);
$note = $getnotey['note'];
$inforaw = str_replace("<br />", "\n", $note);
$info =html_entity_decode($inforaw, ENT_NOQUOTES); 
}
?><table align="center" width="100%" cellpadding="0" cellspacing="0">
<form action="viewprofile.php?username=<?echo$getname;?>#note" method="post"><tr>
<td width="8" height="22" background="/more/topleft.png"><div id=note name=note></div></td>
<td height="22" background="/more/top.png" NOWRAP><center><?if($ohi == 1){echo"<font color=khaki face=verdana size=1><b>Saved!</b></font><font color=white face=verdana size=1> / </font>";}?><font color=white face=verdana size=1>Your Note For: </font><font color=white face=verdana size=1><b><?echo$getname;?></b> <input type ="submit" value="Save" name=save class="textbox"></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png" align=center>
<textarea name="editnote" cols="60" rows="7" class="textbox" id ="editnote"><?if($info){echo$info;}?>
</textarea></td>
<td width="8" background="/more/rightb.png" NOWRAP></td>
</tr>
</form>
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

<head>
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
</head>
</body></html>