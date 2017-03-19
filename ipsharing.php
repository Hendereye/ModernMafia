<? include 'included.php'; ?>

<html>
<head><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="stylesheet" href="more/style.css" type="text/css" />
<link rel="shortcut icon" href="/more/icon.png" type="image/x-icon" />
</head>
<body background="/more/bgtest.png">
<table width="100%" height="335" align="center" cellpadding="0" cellspacing="3">
<tr>
<td width="250" height="25"></td>
<td width="100%"></td>
<td width="250"></td>
</tr>

<tr>
<td width="250" valign="top">
<? include 'leftmenu.php'; ?>
</td>
<td width="100%" valign="top">

<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>IP - rules</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<br><div align="center">
<font color=#CCCCCC face=verdana size=2>You are <b>NOT</b> allowed to:</font></div><br>
<font color=silver face=verdana size=1>-Have more than <b>ONE</b> alive account, which you created.</font><br>
<font color=white face=verdana size=1>-Send money or points to an account that has recently been on the same IP - Adress which you are currently on.</font><br>
<font color=silver face=verdana size=1>-Send a casino to an account that has recently been on the same IP - Adress which you are currently on.</font><br>
<font color=white face=verdana size=1>-Buy or sell a car to an account that has recently been on the same IP - Adress which you are currently on.</font><br>
<font color=silver face=verdana size=1>-Commit an organised robbery with an account that has recently been on the same IP - Adress which you are currently on.</font><br>
<font color=white face=verdana size=1>-Invite a bodyguard which has recently been on the same IP - Adress which you are currently on.</font><br><br>
<div align="center"><font color=#CCCCCC face=verdana size=1><b>For each rule you break, you will recieve a penalty point.<br> Accounts with several penalty points will be investigated, and most probably will be killed.</b></font></div>
<br><br>
<table width="99%" cellpadding="0" cellspacing="1" align="center">
<tr><td height="10" width="100%" bgcolor="#333333" align="center"><font color="white" face="verdana" size="1">The rules above apply to the following accounts in your situation</font></td></tr>
<?php
$saturate = "/[^a-z0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$playerip = $_SERVER['REMOTE_ADDR'];


$gangsterip = $playerip;
$gangstername = $usernameone;
$usernamessql = mysql_query("SELECT username FROM ipadresses WHERE ip = '$gangsterip' ORDER BY id ASC");
while($usernamesarray = mysql_fetch_array($usernamessql)) 
{
$usersrelated = $usernamesarray['username'];
echo "<tr><td height=10 width=100% bgcolor=#222222 align=center><a href=viewprofile.php?username=$usersrelated>$usersrelated</a></td></tr>";
}
?>
</table>
<br>
<table width="99%" cellpadding="0" cellspacing="1" align="center">
<tr><td height="10" width="100%" bgcolor="#333333" align="center"><font color="white" face="verdana" size="1"><b>These are the IPs you have logged in with on your account</b></font></td></tr>
<?php
$ipadressessql = mysql_query("SELECT * FROM ipadresses WHERE username = '$gangstername' ORDER BY id ASC");
while($ipadressessarray = mysql_fetch_array($ipadressessql)) 
{
$ipsrelated = $ipadressessarray['ip'];
echo "<tr><td height=10 width=100% bgcolor=#222222 align=center><a href=ipsharinglist.php?ip=$ipsrelated><font face=verdana size=1 color=white>$ipsrelated</font></a></td></tr>";
}

$penpoints = $statustesttwo['penpoints'];

?>
</table>
<br><br><center><font color=white face=verdana size=1>Any user who has 4 or more penalty points will be killed without question.</font></center><br><font color=silver face=verdana size=1>&nbsp;You currently have <b><? echo number_format($penpoints); ?></b> penalty points.</font>

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

</body>
<head><META HTTP-EQUIV="Pragma" CONTENT="no-cache"></head></html>