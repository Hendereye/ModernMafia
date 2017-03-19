<? include 'included.php'; ?>

<html>
<head>
<link rel="stylesheet" href="more/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
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

$deleteqsql = mysql_query("SELECT * FROM forumposts WHERE type = 'hdo' ORDER BY time ASC LIMIT 36,100");
while($deleteqarray = mysql_fetch_array($deleteqsql))
{$idq = $deleteqarray['id'];
$deleteq = mysql_query("DELETE FROM forumposts WHERE id = '$idq' AND type = 'hdo");}


$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$idraw = $_POST['app'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$id = preg_replace($saturated,"",$idraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$gangsterusernamesql = mysql_query("SELECT * FROM usersonline WHERE session = '$sessionid' AND ip = '$userip'");
$gangsterusernamearray = mysql_fetch_array($gangsterusernamesql);
$gangsterusername = $gangsterusernamearray['username'];

$playersql = mysql_query("SELECT * FROM users WHERE username = '$gangsterusername'");
$playerarray = mysql_fetch_array($playersql);
$playerrank = $playerarray['rankid'];

if($playerrank < '25'){die(' ');}

if(isset($_POST['app'])) { 
if($id > '1'){}
else{
if($id == '0'){
mysql_query("UPDATE users SET appear = '0' WHERE username = '$gangsterusername'");
echo"<font color=white face =verdana size=1>Your status is now set to online!</font>";}
elseif($id == '1'){
mysql_query("UPDATE users SET appear = '1' WHERE username = '$gangsterusername'");
echo"<font color=white face =verdana size=1>Your status is now set to offline!</font>";}}}


$playersql = mysql_query("SELECT * FROM users WHERE username = '$gangsterusername'");
$playerarray = mysql_fetch_array($playersql);
$appear = $playerarray['appear'];

?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><b><center>Update status</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<center>
<form action="" method="post"><br>
<SELECT NAME="app" class="textbox">
<? if ($appear == '1'){echo"<OPTION value=1>Offline</OPTION><OPTION value=0>Online</OPTION>";}else{echo"<OPTION value=0>Online</OPTION><OPTION value=1>Offline</OPTION>";}?>
</SELECT><br><br><input type="submit" value="Update status" class="textbox">
</form><br>
</center>
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