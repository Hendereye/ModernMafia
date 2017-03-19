<? include 'included.php'; ?>
<html>
<head>
<title>Mafia Society</title><link rel="stylesheet" href="more/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
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
$saturated = "/[^0-9]/i";
$getnameraw = $_GET['name'];
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$getname = preg_replace($saturate,"",$getnameraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$gangsterusernamesql = mysql_query("SELECT * FROM usersonline WHERE session = '$sessionid' AND ip = '$userip'");
$gangsterusernamearray = mysql_fetch_array($gangsterusernamesql);
$gangsterusername = $gangsterusernamearray['username'];
$playersql = mysql_query("SELECT * FROM users WHERE username = '$gangsterusername'");
$playerarray = mysql_fetch_array($playersql);
$playerrank = $playerarray['rankid'];

if(!$getname){$getname = $gangsterusername;}else{$getname = $getname;}

if($playerrank < '75'){die(' ');}



$getuserinfosql = mysql_query("SELECT * FROM users WHERE username = '$getname'");
$getuserinfoarray = mysql_fetch_array($getuserinfosql);
$attemptedcrimes = $getuserinfoarray['crimes'];
$attemptedsteals = $getuserinfoarray['thefts'];
$crimesdone = $getuserinfoarray['donecrimes'];
$crimesfailed = $getuserinfoarray['failedcrimes'];
$stealsdone = $getuserinfoarray['donesteal'];
$stealsfailed = $getuserinfoarray['failedsteal'];
$bustsfailed = $getuserinfoarray['failedbusts'];
$busts = $getuserinfoarray['jailbusts'];
$attemptedbusts = $busts + $bustsfailed;
$topics = $getuserinfoarray['topics'];
$posts = $getuserinfoarray['posts'];
$melted = $getuserinfoarray['totalmelted'];

?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b><? echo$getname;?>'s stats</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<br>
<form action = "" method = "get">
<input type="text" name="name" class="textbox" value="<? if(!$getname){echo"$gangsterusername";}else{echo"$getname";}?>">
<input type="submit" class="textbox" value="View stats"></form>
<br>
<table cellpadding=0 cellspacing=1 width=35% align="center">
<tr><td width=100% bgcolor=#333333 NOWRAP colspan="2" align="center"><font color=white face=verdana size=1><b>Attempted</b></font></td></tr>
<tr><td width=75% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1><b>Crimes</b></font></td><td width=25% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1><? echo number_format($attemptedcrimes); ?></font></td></tr>
<tr><td width=75% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1><b>Steals</b></font></td><td width=25% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1><? echo number_format($attemptedsteals); ?></font></td></tr>
<tr><td width=75% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1><b>Jailbusts</b></font></td><td width=25% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1><? echo number_format($attemptedbusts); ?></font></td></tr>
<tr><td width=100% bgcolor=#333333 NOWRAP colspan="2" align="center"><font color=white face=verdana size=1><b>Succeeded</b></font></td></tr>
<tr><td width=75% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1><b>Crimes</b></font></td><td width=25% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1><? echo number_format($crimesdone); ?></font></td></tr>
<tr><td width=75% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1><b>Steals</b></font></td><td width=25% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1><? echo number_format($stealsdone); ?></font></td></tr>
<tr><td width=75% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1><b>Jailbusts</b></font></td><td width=25% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1><? echo number_format($busts); ?></font></td></tr>
<tr><td width=100% bgcolor=#333333 NOWRAP colspan="2" align="center"><font color=white face=verdana size=1><b>Failed</b></font></td></tr>
<tr><td width=75% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1><b>Crimes</b></font></td><td width=25% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1><? echo number_format($crimesfailed); ?></font></td></tr>
<tr><td width=75% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1><b>Steals</b></font></td><td width=25% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1><? echo number_format($stealsfailed); ?></font></td></tr>
<tr><td width=75% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1><b>Jailbusts</b></font></td><td width=25% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1><? echo number_format($bustsfailed); ?></font></td></tr>
<tr><td width=100% bgcolor=#333333 NOWRAP colspan="2" align="center"><font color=white face=verdana size=1><b>Bullets</b></font></td></tr>
<tr><td width=75% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1><b>Total melted</b></font></td><td width=25% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1><? echo number_format($melted); ?></font></td></tr>
<tr><td width=100% bgcolor=#333333 NOWRAP colspan="2" align="center"><font color=white face=verdana size=1><b>Forums</b></font></td></tr>
<tr><td width=75% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1><b>Topics made</b></font></td><td width=25% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1><? echo number_format($topics); ?></font></td></tr>
<tr><td width=75% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1><b>Posts made</b></font></td><td width=25% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1><? echo number_format($posts); ?></font></td></tr>
</table><br><br>
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