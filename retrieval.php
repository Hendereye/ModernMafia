<? include 'included.php'?>
<?


$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$nameraw = mysql_real_escape_string($_POST['name']);
$pass = $_POST['password'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$name = preg_replace($saturate,"",$nameraw);
$pass = md5($pass);
$topicid = preg_replace($saturated,"",$topicidraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$gangsterusername = $usernameone;


$playerarray = $statustesttwo;
$playerrank = $playerarray['rankid'];
$attempts = $playerarray['retrieve'];


?>
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
$tame = time();
$tames = $tame + 30;
$left = $attempts - $tame;

if(isset($_POST['name'])) {
mysql_query("UPDATE users SET retrieve = '$tames' WHERE ID = '$ida'");
$test = mysql_query("SELECT * FROM users WHERE username = '$name'");
$tester = mysql_num_rows($test);
if($attempts > $tame){echo"<font color=white face=verdana size=1>You must wait $left seconds</font>";}
elseif(!$pass){echo"<font color=white face=verdana size=1>Password incorrect</font>";}
elseif($tester != 1){echo"<font color=white face=verdana size=1>No such user</font>";}
else{
$info = mysql_fetch_array($test);
$real = $info['password'];
$status = $info['status'];
$swiss = $info['swiss'];
$points = $info['points'];
$rnk = $info['rankid'];
$mrdi = $info['ID'];
$notes = $info['notes'];

$changes = $info['chnge'];

if($changes == '0'){
$riw = $_POST['password']."5432543___32432";
$pass = md5($riw);}




if($status == 'Alive'){echo"<font color=white face=verdana size=1>User is not dead (yet)</font>";}
elseif($real != $pass){echo"<font color=white face=verdana size=1>Password incorrect</font>";}
elseif($rnk > '23'){echo"<font color=white face=verdana size=1>No.</font>";}
elseif(($swiss == '0')&&($points == '0')){echo"<font color=white face=verdana size=1>That user has no points/money</font>";}
else{
mysql_query("UPDATE users SET alexkop = '1' WHERE ID = '$mrdi' AND alexkop <= '1'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 1.</font>');}

mysql_query("UPDATE users SET swiss = '0' WHERE ID = '$mrdi'");
if (mysql_affected_rows()!=0) {mysql_query("UPDATE users SET money = money + $swiss WHERE ID = '$ida'");}

mysql_query("UPDATE users SET points = '0' WHERE ID = '$mrdi'");
if (mysql_affected_rows()!=0) {mysql_query("UPDATE users SET points = points + $points WHERE ID = '$ida'");}



mysql_query("UPDATE users SET notes = '$notes' WHERE ID = '$ida'");

echo"<font color=white face=verdana size=1>Transfer  successful!</font>";
mysql_query("INSERT INTO moneysent(username,amount,sent,ip)
VALUES ('$name','$swiss','$gangsterusername','$userip')");
mysql_query("INSERT INTO pointssent(username,amount,sent,ip)
VALUES ('$name','$points','$gangsterusername','$userip')");
}}}?>
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Points/Money retrieval</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png"><font color=silver face=verdana size=1>Now your notes are also retrieved from your dead account!</font><br>

<br>
<table width=10% cellspacing=2 cellpadding=0><form action="" method="post"><tr><td width=50%><font color=silver face=verdana size=1>Username:</font></td><td width=50%><input type="text" name="name" class="textbox"></td></tr><tr><td width=50%><font color=silver face=verdana size=1>Password:</font></td><td width=50%><input type="password" name="password" class="textbox"></td></tr><tr><td width=50%></td><td width=50% align=right><input type="submit"  class="textbox" value="Retrieve"></td></form></table>
</td></tr>
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