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
$nameraw = $_POST['demote'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$name = preg_replace($saturate,"",$nameraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$gangsterusername = $usernameone;


$playerarray = $statustesttwo;
$playerrank = $playerarray['rankid'];

if($playerrank < '75'){die(' ');}

if(isset($_POST['demote'])) { 
$query = mysql_query("SELECT * FROM users WHERE username = '$name'");
$rows = mysql_num_rows($query);
$array = mysql_fetch_array($query);
$status = $array['status'];
$equery = mysql_query("SELECT * FROM users WHERE username = '$name' AND rankid = '50'");
$erows = mysql_num_rows($equery);

mysql_query("UPDATE users SET rankid ='10' WHERE username = '$name'");
echo"<font color=white face=verdana size=1>User <b>$name</b> is no longer a Moderator!</font>";
mysql_query("UPDATE users SET ent = '0' WHERE username = '$name'");}

?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><b><center>Demote Moderator</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<center>
<form action="" method="post"><br><input type="text" name="demote" class="textbox"><input type="submit" name="do" value="Demote" class="textbox"></form><br>
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