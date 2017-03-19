<? include 'included.php'; ?>

<html>
<head>
<title>Mafia Society</title><link rel="stylesheet" href="more/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
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


$poster = mysql_real_escape_string($_GET['deletepost']);
$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$nameraw = mysql_real_escape_string($_GET['name']);
$demotehdoraw = mysql_real_escape_string($_POST['demotehdo']);
$sessionid = preg_replace($saturate,"",$sessionidraw);
$deletepost = preg_replace($saturated,"",$poster);
$name = preg_replace($saturate,"",$nameraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$gangsterusername = $usernameone;

$playerarray = $statustesttwo;
$playerrank = $playerarray['rankid'];


$newqraw = mysql_real_escape_string($_POST['newq']);
$newq = htmlentities($newqraw, ENT_QUOTES);



$getsugs = mysql_query("SELECT * FROM suggestions WHERE username = '$name'");
$getsugrows = mysql_num_rows($getsugs);
$getsug = mysql_fetch_array($getsugs);


$getsugid = $getsug['id'];
$gitname = $getsug['username'];



if(isset($_GET['name'])) { 
if($getsugrows != '1'){echo"<font color=white face=verdana size=1>No such user</font>";}
elseif($gitname == $usernameone){echo"<font color=white face=verdana size=1>No</font>";}
else{
$checkifblock = mysql_query("SELECT * FROM blocked WHERE id = $getsugid AND yourid = $ida");
$checkifblockrows = mysql_num_rows($checkifblock);

if($checkifblockrows > '0'){echo"<font color=white face=verdana size=1>You have already blocked this user</font>";}
else{

echo"<font color=white face=verdana size=1>You have blocked $gitname from being able to message you!<br><br>Fill out a report below if you wish to report the user.</font>";
mysql_query("INSERT INTO blocked(username,id,yourid,yourname)
VALUES ('$gitname','$getsugid','$ida','$usernameone')");}}}


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
else{
mysql_query("INSERT INTO forumposts(username,topicid,ip,type,post,rankid)
VALUES ('$gangsterusername','$topicid','$userip','hdo','$newq','$myrank')");
mysql_query("UPDATE users SET posts = (posts + 1) WHERE ID = '$ida'");
echo'<font color=white face=verdana size=1>Your question has been submitted, please wait for a HDO to reply to your question.</font>';}}



$namesi = $_POST['name'];
$alloweds = "/[^a-z0-9\\\\]/i";
$namej = preg_replace($alloweds,"",$namesi);

$check = mysql_query("SELECT * FROM blocked WHERE username = '$namej' AND yourname = '$usernameone'");
$checkrows = mysql_num_rows($check);

$selectis=mysql_query("SELECT * FROM users WHERE username = '$namej'");
$selicis =mysql_fetch_array($selectis);
$selectoname=$selicis['username'];
$selectoid=$selicis['ID'];




if(isset($_POST['remove'])){

if(!$namej){}
elseif($checkrows == '0'){echo"<font color=white face=verdana size=1>You do not have this user blocked</font>";}
else{
mysql_query("DELETE FROM blocked WHERE username = '$namej' AND yourid = '$ida'");
echo"<font color=white face=verdana size=1><a href=viewprofile.php?username=$namej><b>$selectoname</b></a>: was removed from your blocked list</font>";}

}

if(isset($_POST['add'])) { 
if(!$selectoname){}
elseif($checkrows != '0'){echo"<font color=white face=verdana size=1>You have already blocked this user</font>";}
elseif($selectoname == $usernameone){echo"<font color=white face=verdana size=1>No</font>";}
else{
$checkifblock = mysql_query("SELECT * FROM blocked WHERE id = $selectoid AND yourid = $ida");
$checkifblockrows = mysql_num_rows($checkifblock);

if($checkifblockrows > '0'){echo"<font color=white face=verdana size=1>You have already blocked this user</font>";}
else{

echo"<font color=white face=verdana size=1>You have blocked $selectoname from being able to message you!<br><br>Fill out a report below if you wish to report the user.</font>";
mysql_query("INSERT INTO blocked(username,id,yourid,yourname)
VALUES ('$selectoname','$selectoid','$ida','$usernameone')");}}}

?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><b><center>Report player for abuse or spam</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<center>
<form action="block.php" method="post" name="smiley"><br><font color="white" face="verdana" size="1"><i>Add <u>detail</u> to your report here</i></font><br><textarea name="newq" cols="70" rows="7" class="textbox" id ="newpost"><?if(isset($_GET['name'])){echo"Report on: $nameraw, add detail below;";}?>
</textarea><br><a onClick="emotion(':arrow:')" style="cursor: pointer;"><img src="/more/smiles/arrow.gif" border=0></a><a onClick="emotion(':D')" style="cursor: pointer;"><img src="/more/smiles/biggrin.gif" border=0></a><a onClick="emotion(':S')" style="cursor: pointer;"><img src="/more/smiles/confused.gif" border=0></a><a onClick="emotion(':cry:')" style="cursor: pointer;"><img src="/more/smiles/cry.gif" border=0></a><a onClick="emotion('8)')" style="cursor: pointer;"><img src="/more/smiles/cool.gif" border=0></a><a onClick="emotion('8|')" style="cursor: pointer;"><img src="/more/smiles/eek.gif" border=0></a><a onClick="emotion(':evil:')" style="cursor: pointer;"><img src="/more/smiles/evil.gif" border=0></a><a onClick="emotion(':!:')" style="cursor: pointer;"><img src="/more/smiles/exclaim.gif" border=0></a><a onClick="emotion(':idea:')" style="cursor: pointer;"><img src="/more/smiles/idea.gif" border=0></a><a onClick="emotion(':lol:')" style="cursor: pointer;"><img src="/more/smiles/lol.gif" border=0></a><a onClick="emotion(':mad:')" style="cursor: pointer;"><img src="/more/smiles/mad.gif" border=0></a><a onClick="emotion(':?:')" style="cursor: pointer;"><img src="/more/smiles/question.gif" border=0></a><a onClick="emotion(':redface:')" style="cursor: pointer;"><img src="/more/smiles/redface.gif" border=0></a><a onClick="emotion(':rolleyes:')" style="cursor: pointer;"><img src="/more/smiles/rolleyes.gif" border=0></a><a onClick="emotion(':(')" style="cursor: pointer;"><img src="/more/smiles/sad.gif" border=0></a><a onClick="emotion(':)')" style="cursor: pointer;"><img src="/more/smiles/smile.gif" border=0></a><a onClick="emotion(':o')" style="cursor: pointer;"><img src="/more/smiles/surprised.gif" border=0></a><a onClick="emotion(':P')" style="cursor: pointer;"><img src="/more/smiles/toungue.gif" border=0></a><a onClick="emotion(':twisted:')" style="cursor: pointer;"><img src="/more/smiles/twisted.gif" border=0></a><a onClick="emotion(';)')" style="cursor: pointer;"><img src="/more/smiles/wink.gif" border=0></a><a onClick="emotion(':tdn:')" style="cursor: pointer;"><img src="/more/smiles/tdown.gif" border=0></a><a onClick="emotion(':tup:')" style="cursor: pointer;"><img src="/more/smiles/tup.gif" border=0></a><br>
<input type ="submit" value="Submit report!" class="textbox" name="dopost"></form></center>

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

<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Blocked list</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>
<form action="block.php" method="post">
<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<form method=post><td background="/more/crossbg.png">
<input type=textbox class=textbox name=name><input type=submit name=add class=textbox value="Add Block"><input type=submit name=remove class=textbox value="Remove Block"></form><Br>
<table width="20%" cellpadding="0" cellspacing="1" align="center">
<tr><td width=100% NOWRAP colspan=2 align=center bgcolor=333333><font color=white size=1 face=verdana><center>&nbsp;User blocked from messaging you:&nbsp;</center></font></td></tr>
 
<?

$findgangstersql  = "SELECT * FROM blocked WHERE yourid = '$ida' ORDER BY id";
$findgangsterresult = mysql_query($findgangstersql);
$findgangsternumrows = mysql_num_rows($findgangsterresult);

if($findgangsternumrows == '0'){}else{

while($tima = mysql_fetch_array($findgangsterresult)){
$therename = $tima['username'];

echo"<tr><td bgcolor=222222 NOWRAP><a href=viewprofile.php?username=$therename>&nbsp;$therename</a></td></tr>";   

}

echo"<tr><td colspan=2 bgcolor=333333 NOWRAP align=right><a href=#>Total: $findgangsternumrows</a></td></tr><tr><td width=100% colspan=2 bgcolor=222222 NOWRAP height=3></td></tr>";
}
?>

</table><br><Br>



</td>
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

</body></html>