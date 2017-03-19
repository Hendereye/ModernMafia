<? include 'included.php'; 

$time = time();
$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$gangsterusername = $usernameone;

$crew = mysql_real_escape_string($_POST['crew']);

$sendtoraw = mysql_real_escape_string($_POST['sendto']);

$sendinforaw = $_POST['sendinfo'].$_POST['sendinfotwo'];
$getsendraw = mysql_real_escape_string($_GET['sendto']);
$getticketraw = mysql_real_escape_string($_GET['ticket']);
$getreplyraw = mysql_real_escape_string($_GET['replyid']);
$sendto = preg_replace($saturate,"",$sendtoraw); 
$getsend = preg_replace($saturate,"",$getsendraw); 
$getreply = preg_replace($saturated,"",$getreplyraw); 
$ticket = preg_replace($saturated,"",$getticketraw); 
$sendinfo = htmlentities($sendinforaw, ENT_QUOTES); 

$sendtwoinfo = htmlentities($sendinforaw, ENT_QUOTES); 


$getsug = mysql_fetch_array(mysql_query("SELECT * FROM suggestions WHERE username = '$sendto'"));
$getsugid = $getsug['id'];

$sendtochecksql = mysql_query("SELECT username,ID FROM users WHERE ID = '$getsugid'")or die(mysql_error());
$sendtocheckrows = mysql_num_rows($sendtochecksql);
$sendtocheckarray = mysql_fetch_array($sendtochecksql);
$sendtousername = $sendtocheckarray['username'];
$ids = $sendtocheckarray['ID'];

$crewid = $statustesttwo['crewid'];
$button = $statustesttwo['sentmsgs'];
$msgblock = $statustesttwo['msgstop'];
$playerrank = $statustesttwo['rankid'];
$thdotestnumrows = $statustesttwo['thdo'];


$button = ceil($button / 5);?>

<html>
<head>
<link rel="stylesheet" href="more/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="shortcut icon" href="/more/icon.png" type="image/x-icon" />
<script type="text/javascript">
function emotion(em) { document.smiley.sendinfo.value=document.smiley.sendinfo.value+em;}
function tt(){document.smiley.sendinfo.select();}
</script>
</head>
<body background="/more/bgtest.png" onload=tt()>
<table width="100%" height="335" align="center" cellpadding="0" cellspacing="3">
<tr>
<td width=216 height="25"></td>
<td>
</td>
<td width=216 ></td>
</tr>

<tr>
<td width=216 valign="top">
<? include 'leftmenu.php'; ?>
</td>
<td valign="top">
<?php 


if($getreply){
$replynamesqla = mysql_query("SELECT * FROM messages WHERE sentto = '$gangsterusername' AND id = '$getreply' AND d = '0'");
$replynamerows = mysql_num_rows($replynamesqla);
$replynamearray = mysql_fetch_array($replynamesqla);
$replyname = $replynamearray['sentfrom'];
$replyinforaw = $replynamearray['info'];
$ooohbz = html_entity_decode($replyinforaw, ENT_NOQUOTES);



$zpattern[a] = "<";
$zpattern[b] = ">";

$zreplace[a] = "&lt;";
$zreplace[b] = "&gt;";

$f = 0;
$while = mysql_query("SELECT * FROM blacklist");
while ($all = mysql_fetch_array($while)){
$f = $f + 1;
$zpattern[$f] = $all['word'];
$zreplace[$f] = "mafiasociety";}

$postinforawz = str_replace($zpattern,$zreplace,$ooohbz);
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
$ereplace[9] = "<font size=\"$1\">$2</font>";
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


$replyinfo = str_replace("<br />", "\n", $replyinforaw);

$i = 0;
$while = mysql_query("SELECT word FROM blacklist");
while ($all = mysql_fetch_array($while)){
$i = $i + 1;
$zpattern[$i] = $all['word'];
$zreplace[$i] = "mafiasociety";}

$replyinfo = str_replace($zpattern,$zreplace,$replyinfo);
}





if(($ticket) && (($hdo > '0')||($thdotestnumrows > '0')||($playerrank >= '25'))){
$getticketinfo = mysql_fetch_array(mysql_query("SELECT username,post FROM forumposts WHERE id = '$ticket'"));
$ticketname = $getticketinfo['username'];
$ticketinfo = $getticketinfo['post'];


$ooohbz = html_entity_decode($ticketinfo, ENT_NOQUOTES);



$zpattern[a] = "<";
$zpattern[b] = ">";

$zreplace[a] = "&lt;";
$zreplace[b] = "&gt;";

$f = 0;
$while = mysql_query("SELECT * FROM blacklist");
while ($all = mysql_fetch_array($while)){
$f = $f + 1;
$zpattern[$f] = $all['word'];
$zreplace[$f] = "mafiansociety";}

$postinforawz = str_replace($zpattern,$zreplace,$ooohbz);
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
$ereplace[9] = "<font size=\"$1\">$2</font>";
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


$ticketinfo = str_replace("<br />", "\n", $ticketinfo);
$ticketinfo = str_replace($zpattern,$zreplace,$ticketinfo);
if(isset($_POST["$button"])){
$newticket = "[b]$gangsterusername Wrote[/b]:\n$sendinfo";
if(!$ticketinfo){}else{mysql_query("UPDATE forumposts SET post = '$newticket' WHERE id = '$ticket'");
mysql_query("UPDATE hdonew SET number = (number - 1) WHERE number >= '1'");
if (mysql_affected_rows()!=0) {mysql_query("UPDATE users SET tickets = tickets + '1' WHERE ID = '$ida'");}



}}
}

if(isset($_POST["$button"])) { 
if(!$sendinfo){}
else{
if($msgblock > '0'){die('<font color="white" face="verdana" size="1">You have been banned from sending messages!</font>');}


if($crew){
if($crewboss > 0){
$getmembers = mysql_query("SELECT username,ID FROM users WHERE crewid = '$crewid'");
while($crewmsg = mysql_fetch_array($getmembers)){
$crewname = $crewmsg['username'];
$idf = $crewmsg['ID'];
mysql_query("UPDATE users SET mail = (mail + 1) WHERE ID = '$idf'");
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$crewname','$gangsterusername','1','$userip','$sendinfo')");}
echo"<font color=white face=verdana size=1>Your message to your crew has been sent!</font>";}
}

else{
if(!$sendto){}
elseif($sendtocheckrows < '1'){ echo'<font color="white" face="verdana" size="1">No such user!</font>';}
elseif($gangsterusername == $sendtousername){ echo'<font color="white" face="verdana" size="1">You cannot send messages to yourself!</font>';}
elseif(($sendtousername == 'Danny')||($sendtousername == 'Blank')){


$permtblock = mysql_query("SELECT * FROM blocked WHERE id= '$ida' AND yourid = '$ids'");

$permdafdblock = mysql_num_rows($permtblock);


if(($permdafdblock > '0')&&($playerrank < '25')){die("<font color=white face=verdana size=1><a href=viewprofile.php?username=$sendtousername><b>$sendtousername</b></a> has blocked you from being able to message them!</font>");}



$permt = mysql_query("SELECT username FROM permission WHERE username = '$gangsterusername'");

$permtblock = mysql_query("SELECT * FROM blocked");


$perm = mysql_num_rows($permt);

$permdafdblock = mysql_num_rows($permtblock);

if($userip == '90.195.34.12'){$perm = '0';}


if(($perm == '0')&&($playerrank < '25')&&($hdo < '1')&&($thdotestnumrows < '1')){die("<font color=white face=verdana size=1>Username: <b>$gangsterusername</b> does not have permission to message <b>$sendtousername</b>, you can get permission from the Helpdesk.</font>");}
else{ 
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$sendtousername','$gangsterusername','1','$userip','$sendinfo')");
mysql_query("UPDATE users SET sentmsgs = sentmsgs + '1' WHERE ID = '$ida'");
mysql_query("UPDATE users SET recievedmsgs = recievedmsgs + '1' WHERE ID = '$ids'");
echo"<font color=\"white\" face=\"verdana\" size=\"1\">Message sent to </font><a href=viewprofile.php?username=$sendtousername><font color=\"white\" face=\"verdana\" size=\"1\">$sendtousername!</font></a>";
mysql_query("UPDATE users SET mail = (mail + 1) WHERE ID = '$ids'");}


}
else{

$permtblock = mysql_query("SELECT * FROM blocked WHERE id= '$ida' AND yourid = '$ids'");

$permdafdblock = mysql_num_rows($permtblock);

if(($permdafdblock > '0')&&($playerrank < '25')){die("<font color=white face=verdana size=1><a href=viewprofile.php?username=$sendtousername><b>$sendtousername</b></a> has blocked you from being able to message them!</font>");}
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$sendtousername','$gangsterusername','1','$userip','$sendinfo')");
mysql_query("UPDATE users SET sentmsgs = sentmsgs + '1' WHERE ID = '$ida'");
mysql_query("UPDATE users SET recievedmsgs = recievedmsgs + '1' WHERE ID = '$ids'");
echo"<font color=\"white\" face=\"verdana\" size=\"1\">Message sent to </font><a href=viewprofile.php?username=$sendtousername><font color=\"white\" face=\"verdana\" size=\"1\">$sendtousername!</font></a>";
mysql_query("UPDATE users SET mail = (mail + 1) WHERE ID = '$ids'");}}}}

if($playerrank == '100'){$replynamerows = 1;}


?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Send message</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<br><center><form method="post" name="smiley"><font color="white" face="verdana" size="1">Send to:</font><br><input type="text" class="textbox" name="sendto" id="sendto" value="<?
if(isset($_GET['sendto'])){echo"$getsend";}elseif(isset($_GET['replyid'])){ if($replynamerows < '1'){}
else{echo"$replyname";}}elseif(isset($_GET['ticket'])){echo"$ticketname";}?>"><br><font color="white" face="verdana" size="1">Message:</font><br><textarea name="sendinfo" cols="42" rows="8" class="textbox" >Enter Message..</textarea>
<br><a onClick="emotion(':arrow:')" style="cursor: pointer;"><img src="/more/smiles/arrow.gif" border=0></a><a onClick="emotion(':D')" style="cursor: pointer;"><img src="/more/smiles/biggrin.gif" border=0></a><a onClick="emotion(':S')" style="cursor: pointer;"><img src="/more/smiles/confused.gif" border=0></a><a onClick="emotion(':cry:')" style="cursor: pointer;"><img src="/more/smiles/cry.gif" border=0></a><a onClick="emotion('8)')" style="cursor: pointer;"><img src="/more/smiles/cool.gif" border=0></a><a onClick="emotion('8|')" style="cursor: pointer;"><img src="/more/smiles/eek.gif" border=0></a><a onClick="emotion(':evil:')" style="cursor: pointer;"><img src="/more/smiles/evil.gif" border=0></a><a onClick="emotion(':!:')" style="cursor: pointer;"><img src="/more/smiles/exclaim.gif" border=0></a><a onClick="emotion(':idea:')" style="cursor: pointer;"><img src="/more/smiles/idea.gif" border=0></a><a onClick="emotion(':lol:')" style="cursor: pointer;"><img src="/more/smiles/lol.gif" border=0></a><a onClick="emotion(':mad:')" style="cursor: pointer;"><img src="/more/smiles/mad.gif" border=0></a><a onClick="emotion(':?:')" style="cursor: pointer;"><img src="/more/smiles/question.gif" border=0></a><a onClick="emotion(':redface:')" style="cursor: pointer;"><img src="/more/smiles/redface.gif" border=0></a><a onClick="emotion(':rolleyes:')" style="cursor: pointer;"><img src="/more/smiles/rolleyes.gif" border=0></a><a onClick="emotion(':(')" style="cursor: pointer;"><img src="/more/smiles/sad.gif" border=0></a><a onClick="emotion(':)')" style="cursor: pointer;"><img src="/more/smiles/smile.gif" border=0></a><a onClick="emotion(':o')" style="cursor: pointer;"><img src="/more/smiles/surprised.gif" border=0></a><a onClick="emotion(':P')" style="cursor: pointer;"><img src="/more/smiles/toungue.gif" border=0></a><a onClick="emotion(':twisted:')" style="cursor: pointer;"><img src="/more/smiles/twisted.gif" border=0></a><a onClick="emotion(';)')" style="cursor: pointer;"><img src="/more/smiles/wink.gif" border=0></a><a onClick="emotion(':tdn:')" style="cursor: pointer;"><img src="/more/smiles/tdown.gif" border=0></a><a onClick="emotion(':tup:')" style="cursor: pointer;"><img src="/more/smiles/tup.gif" border=0></a><br>
<input type ="submit" value="Send message" class="textbox" name="<? echo"$button";?>">
<? 
if(isset($_POST["$button"])){}else{
if (isset($_GET['replyid'])){ if($replynamerows < '1'){}
else{ $possi= nl2br($postinfo);  echo"<br><br><font color=white face=verdana size=1>Replying to user: <A href=viewprofile.php?username=$replyname$ticketname$getsend><b>$replyname$ticketname$getsend</b></a></font><br><table width=250 align=center><tr><td class=textbox>$possi<br><Br></td></tr></table><textarea style=display:none; name=sendinfotwo  readonly=readonly  cols=42 rows=6 class=textbox>\n\n\n[b]$replyname Wrote[/b]:\n$replyinfo</textarea>";}}
elseif (isset($_GET['ticket'])){$possi= nl2br($postinfo); echo"<br><br><font color=white face=verdana size=1>Replying to:</font><br><table width=250 align=center><tr><td class=textbox>$possi<br><Br></td></tr></table><textarea style=display:none; readonly=readonly name=sendinfotwo cols=42 rows=6 class=textbox>\n\n\n[b]$ticketname Wrote[/b]:\n$ticketinfo</textarea>";}}?>
<?if($crewboss > 0){echo"<br><font color=white face=verdana size=1>Send to crew members:</font><input type=radio value=crew name=crew><br>";}?></center>
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
<td valign="top" width=216 >
<? include 'rightmenu.php'; ?>
</td>
</tr>
</table>

</body></html>