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
$allowed = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$name = $_GET['username'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$names = preg_replace($saturate,"",$name);
$userip = $_SERVER[REMOTE_ADDR]; 
$gangsterusername = $usernameone;



$getuserinfoarray = $statustesttwo;
$getname = $getuserinfoarray['username'];
$health = ceil($getuserinfoarray['health']);
$rankid = $getuserinfoarray['rankid'];

 if($rankid < '25'){die(' ');}

 

$findraw = $_GET['username'];
$find = preg_replace($saturate,"",$findraw);

$info = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username = '$find'"));
$infoip = $info['latestip'];
$rankkk = $info['rankid'];

if($rankkk == '100'){die('<font color=white face=verdana size=1>Admins dont dupe</font>');}

$findgangstersql  = "SELECT * FROM ipadresses WHERE username = '$names' ORDER BY ID ASC";
$findgangsterresult = mysql_query($findgangstersql);
$findgangsternumrows = mysql_num_rows($findgangsterresult);


?>

<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b><? echo"Dupe check: $names";?></b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<?

if(!$find){ }
elseif($findgangsternumrows == '0') { }
else{
echo"<font color=silver face=verdana size=1>Latest ip:</font><br><b><a href=ipcheckii.php?ip=$infoip><font color=silver face=verdana size=1>$infoip</b></a><br><br><br>Other used ips:</font><br>";
while($findgangsterarray =mysql_fetch_array($findgangsterresult)) 
{$gansgtersfound = $findgangsterarray['username'];$ip = $findgangsterarray['ip'];
if($ip == '77.96.49.94'){}else{
if($ip == $infoip){}else{
echo"<a href=ipcheckii.php?ip=$ip><font color=silver face=verdana size=1><b>$ip</b></a></font><br>";}}}}
?>

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