<? include 'included.php'; ?>

<html>
<head>
<link rel="stylesheet" href="more/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="shortcut icon" href="/more/icon.png" type="image/x-icon" />
</head>
<body background="/more/bgtest.png">
<script type="text/javascript">
function emotion(em) { document.smiley.topicinfo.value=document.smiley.topicinfo.value+em;}
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
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$gangsterusername = $usernameone;
$playeridraw = $_POST['select'];
$giveraw = $_POST['give'];
$playerid = preg_replace($saturated,"",$playeridraw);
$give = preg_replace($saturated,"",$giveraw);
$givea = number_format($give);

$getinfoarray = $statustesttwo;
$getcrewid = $getinfoarray['crewid'];
$getname = $getinfoarray['username'];


if($getcrewid == 0){die('<font color=white size=1 face=verdana>Your not in a crew!</font>');}

$crewusersinfosql = mysql_query("SELECT * FROM users WHERE crewid = '$getcrewid' ORDER BY crewbullets DESC");

?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Crew bullets</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png"><form action="" method="post"><br>
<table width="66%" cellpadding="0" cellspacing="1" align="center">
<tr><td width=50% bgcolor=gray NOWRAP><font color=#222222 size=1 face=verdana><center><b>Username</b></center></font></td>
<td width=50% bgcolor=gray NOWRAP><font color=#222222 size=1 face=verdana><center><b>Bullets</b></center></font></td></tr>

<? 
$num = 0;
while($crewusersinfoarray = mysql_fetch_array($crewusersinfosql)){

$num++;

$melted = $crewusersinfoarray['crewbullets'];
$meltedname = $crewusersinfoarray['username'];

echo"<tr><td width=50% bgcolor=#444444 NOWRAP><b><a href=viewprofile.php?username=$meltedname><font color=silver size=1 face=verdana>#$num $meltedname</font></a></b></td>
<td width=50% bgcolor=#444444 NOWRAP><font color=silver size=1 face=verdana>$melted</font></td></tr>";}?>
</table>
<br>
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