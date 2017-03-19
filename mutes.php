<? include 'included.php'; 


?>
<html>
<head>
<link rel="stylesheet" href="more/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="shortcut icon" href="/more/icon.png" type="image/x-icon" />
<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
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
$saturates = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$chosenraw = $_POST['spend'];
$chosen = preg_replace($saturates,"",$chosenraw);


$gangsterusername = $usernameone;

$getuserinfoarray = $statustesttwo;
$getref = $getuserinfoarray['ref'];
$rank= $getuserinfoarray['rankid'];

$topten = mysql_query("SELECT * FROM muted  ORDER BY time DESC LIMIT 0,50");

if($rank < '50'){die(' ');}



?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Last 50 mutes</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">

<? if ($rank >= 50){echo"<center><br><br><u><font color=white face=verdana size=1><b>Admin view</b></u></font>";?>
<table cellpadding=0 cellspacing=1 width=35%>
<tr><td width=25% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Username</b>:</font></td><td width=25% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Muted IP</b>:</font></td><td width=25% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Done by</b>:</font></td><td width=25% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Username</b>:</font></td></tr><?
while($toptena = mysql_fetch_array($topten)){
$refname = $toptena['username'];

$refpoin = $toptena['mutedby'];
$ip= $toptena['ip'];
$time = $toptena['time'];
echo"<tr><td width=25% bgcolor=#222222 NOWRAP><a href=viewprofile.php?username=$refname><font color=white face=verdana size=1>$refname&nbsp;&nbsp;</font></a></td><td width=25% bgcolor=#222222 NOWRAP><a href=ipcheckii.php?ip=$ip>$ip&nbsp;&nbsp;</a></td><td width=25% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1>$refpoin&nbsp;&nbsp;</font></td><td width=25% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1>$time&nbsp;&nbsp;</font></td></tr>"; }
?></table><br><?}?>
</center></font><br>
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
<td width="250" valign="top">
<? include 'rightmenu.php'; ?>
</td>
</tr>
</table>

</body></html>