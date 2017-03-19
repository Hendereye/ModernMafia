<? include 'included.php';?>
<html>
<head>
<link rel="stylesheet" href="more/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="shortcut icon" href="/more/icon.png" type="image/x-icon" /></head>
<body background="more/bgtest.png">
<table width="100%" height="335" align="center" cellpadding="0" cellspacing="3">
<tr>
<td width="250" height="25"></td>
<td width="100%"></td>
<td width="250"></td>
</tr>

<tr>
<td width="250" valign="top">
<? include 'leftmenu.php'; ?></td>
<td width="100%" valign="top">
<?
$mycrewid = $statustesttwo['crewid'];

if($mycrewid == '0'){die(' ');}?>
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Crew users online</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<br> 
<font color=white face=verdana size=1>-</font><?php 
$time = time();
$timetwo = $time-3000;

$usersonlineresult = mysql_query("SELECT username,rankid,crewid,appear,money FROM users WHERE activity >= '$timetwo' AND crewid = '$mycrewid' AND ID != '1' ORDER BY ID ASC");

$usersonlinecount = mysql_num_rows($usersonlineresult);


while($usersonline = mysql_fetch_array($usersonlineresult)) 
{
$onlineuser = $usersonline['username'];

echo"<a href =viewprofile.php?username=$onlineuser> $onlineuser -</a>";



}



?>
<font color=white face=verdana size=1> <? echo $usersonlinecount; ?> Crew users online</font><br><br></td>
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
</body>
<head><META HTTP-EQUIV="Pragma" CONTENT="no-cache"></head></html>