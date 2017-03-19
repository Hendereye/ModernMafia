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



$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$nameraw = mysql_real_escape_string($_POST['name']);
$sessionid = preg_replace($saturate,"",$sessionidraw);

$nameiraw = mysql_real_escape_string($_POST['name2']);
$namei = preg_replace($saturate,"",$nameiraw);

$name = preg_replace($saturate,"",$nameraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$gangsterusername = $usernameone;

$playerarray = $statustesttwo;
$playerrank = $playerarray['rankid'];



$reasonraw = mysql_real_escape_string($_POST['reason']);
$reason = htmlentities($reasonraw, ENT_QUOTES);

if($playerrank < '25'){die(' ');}


$bansql = mysql_query("SELECT * FROM users WHERE username = '$name'");
$banrows = mysql_num_rows($bansql);
$banarray = mysql_fetch_array($bansql);
$banip = $banarray['latestip'];
$ban = $banarray['username'];
$banrank = $banarray['rankid'];

$bansqltwo = mysql_query("SELECT * FROM banned WHERE username = '$name'");
$banrowstwo = mysql_num_rows($bansqltwo);



$bansqli = mysql_query("SELECT * FROM users WHERE username = '$namei'");
$banrowsi = mysql_num_rows($bansqli);
$banarrayi = mysql_fetch_array($bansqli);
$bani = $banarrayi['username'];
$banranki = $banarrayi['rankid'];

if(isset($_POST['do2'])){ 
if(!$namei){}
elseif($banrowsi < '1'){echo'<font color=white face=verdana size=1>No such user!</font>';}
elseif(($banrank >= 25)&&($playerrank < 100)){echo'<font color=white face=verdana size=1>Want to be demoted?</font>';}
else{mysql_query("UPDATE users SET msgstop = '1' WHERE username = '$bani'");echo'<font color=white face=verdana size=1>Block added</font>';}}


if(isset($_POST['undo2'])){ 
if(!$namei){}
elseif($banrowsi < '1'){echo'<font color=white face=verdana size=1>No such user!</font>';}
else{mysql_query("UPDATE users SET msgstop = '0' WHERE username = '$bani'");echo'<font color=white face=verdana size=1>Block removed</font>';}}


if(isset($_POST['do'])){ 
if(!$name){}
elseif($banrows < '1'){echo'<font color=white face=verdana size=1>No such user!</font>';}
elseif($banrowstwo > '0'){echo'<font color=white face=verdana size=1>User is already banned!</font>';}
elseif(!$reason){echo"<font color=white face=verdana size=1>You must specify a reason!</font>";}
elseif(($banrank >= 50)&&($playerrank < 100)){echo'<font color=white face=verdana size=1>Want to be demoted?</font>';}
else{

if($banip == '77.96.49.94'){}else{
mysql_query("DELETE FROM usersonline WHERE username = '$ban'");
mysql_query("INSERT INTO banned(username,reason,banby,ip)
VALUES ('$ban','$reason','$gangsterusername','$banip')");
echo"<font color=white face=verdana size=1>Username: <b>$name</b> is now banned!</font>";}}}

if(isset($_POST['undo'])){ 
if(!$name){}
elseif($banrows < '1'){echo'<font color=white face=verdana size=1>No such user!</font>';}
elseif($banrowstwo == '0'){echo'<font color=white face=verdana size=1>User is not banned!</font>';}
else{
mysql_query("DELETE FROM banned WHERE username = '$ban'");
echo"<font color=white face=verdana size=1>User: <b>$name</b> is now longer banned!</font>";}}

?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><b><center>Ban</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<center>
<form action="" method="post">
<font color="white" face="verdana" size="1"><b>ONLY EVER USE THIS TOOL TO STOP ADVERTISERS</b></font><br><br>
<font color="white" face="verdana" size="1">Username:</font><br><input type="text" name="name" class="textbox"><br>
<font color="white" face="verdana" size="1">Reason:</font><br><textarea name="reason" cols="42" rows="11" class="textbox"></textarea><br>
<input type ="submit" value="Ban user" class="textbox" name="do"></center></form><br><br>
<form action="" method="post">
<font color="white" face="verdana" size="1">Username:</font><br><input type="text" name="name" class="textbox"><br>
<input type ="submit" value="Remove ban" class="textbox" name="undo"></center></form>


<center>
<form action="" method="post">
<font color="white" face="verdana" size="1"><b>USE THIS TOOL TO STOP PEOPLE SENDING MESSAGES</b></font><br><br>
<font color="white" face="verdana" size="1">Username:</font><br><input type="text" name="name2" class="textbox"><br>
<input type ="submit" value="Block" class="textbox" name="do2"></center></form><br><br>
<form action="" method="post">
<font color="white" face="verdana" size="1">Username:</font><br><input type="text" name="name2" class="textbox"><br>
<input type ="submit" value="Remove block" class="textbox" name="undo2"></center></form>




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