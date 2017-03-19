<? include 'included.php'; ?>
<html>
<head>
<link rel="stylesheet" href="more/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="shortcut icon" href="/more/icon.png" type="image/x-icon" />
</head>
<body background="/more/bgtest.png">
<script type="text/javascript">
function emotion(em) { document.smiley.editprofile.value=document.smiley.editprofile.value+em;}
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

$gangsterusernamesql = mysql_query("SELECT * FROM usersonline WHERE session = '$sessionid' AND ip = '$userip'");
$gangsterusernamearray = mysql_fetch_array($gangsterusernamesql);
$gangsterusername = $gangsterusernamearray['username'];


$getuserinfosql = mysql_query("SELECT * FROM users WHERE username = '$gangsterusername'");
$getuserinfoarray = mysql_fetch_array($getuserinfosql);
$crewid = $getuserinfoarray['crewid'];


$f = mysql_query("SELECT * FROM crews WHERE id = '$crewid'");
$fg = mysql_fetch_array($f);
$crewbank = number_format($fg['cash']);



if($crewid == '0'){die('<font color=white face=verdana size=1>Your not in a crew</font>');}

$money = mysql_query("SELECT * FROM users WHERE crewid = '$crewid' ORDER BY crewd DESC LIMIT 0,200");


?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Top crew donators</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<br><br><table cellpadding=0 cellspacing=1 width=35% align="center">
<tr><td width=100% bgcolor=#222222 NOWRAP colspan="2" align="center"><font color=white face=verdana size=1><b>Top crew donators</b></font></td></tr>
<tr><td width=75% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Username</b>:</font></td><td width=25% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Cash donated to crew</b>:</font></td></tr><?
while($moneys = mysql_fetch_array($money)){
$nam = $moneys['username'];
$mona = number_format($moneys['crewd']);
echo"<tr><td width=75% bgcolor=#222222 NOWRAP><a href=viewprofile.php?username=$nam><font color=white face=verdana size=1>$nam</font></a></td><td width=25% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1>$$mona</font></td></tr>"; }
?></table><br><font color=white face=verdana size=1><b>Crew cash balance: $<?echo$crewbank;?></font></b><br>
<br><font color=white face=verdana size=1>When your crew boss gives money out the crew bank to a member,<br>all the crew members that have added cash to the bank,<br>will have the amount theyve donated reset to $0.</font>
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