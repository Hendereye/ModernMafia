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
$postraw = $_POST['prom']; 
$post = preg_replace($saturate,"",$postraw);


$gangsterusername = $usernameone;

$getuserinfoarray = $statustesttwo;
$getref = $getuserinfoarray['ref'];
$rank= $getuserinfoarray['rankid'];

$getrefby = $getuserinfoarray['refby'];
$refpoints = $getuserinfoarray['refpoints'];



if(isset($_POST['prom'])){


if($post == 'F1RST'){
$in = 'F1RST';
$toomany = mysql_num_rows(mysql_query("SELECT * FROM promo WHERE promo = 'F1RST' AND user = '$gangsterusername'"));
$ooh = $toomany + 1;
if($toomany >= '5'){echo"<font color=white face=verdana size=1>This promo code has expired for you!</font>";}
else{echo"<font color=white face=verdana size=1>You received <b>500 bullets</b>!<br>Your <b>Steal, Melt & Crime timers have been reset</b>!<br>Your <b>Health was restored back to 100</b>%! </font><font color=silver face=verdana size=1>(You have used this $ooh / 5 times)</font>";


mysql_query("UPDATE users SET bullets = (bullets + 500) WHERE ID = '$ida'");
mysql_query("UPDATE users SET health = '100' WHERE ID = '$ida'");
mysql_query("UPDATE users SET steal = '0' WHERE ID = '$ida'");
mysql_query("UPDATE users SET melt = '0' WHERE ID = '$ida'");
mysql_query("UPDATE users SET kidnap = '0' WHERE ID = '$ida'");
mysql_query("UPDATE users SET mug = '0' WHERE ID = '$ida'");
mysql_query("UPDATE users SET stealfrom = '0' WHERE ID = '$ida'");
mysql_query("UPDATE users SET rob = '0' WHERE ID = '$ida'");
mysql_query("UPDATE users SET hustle = '0' WHERE ID = '$ida'");
mysql_query("UPDATE users SET beg = '0' WHERE ID = '$ida'");
mysql_query("UPDATE users SET stealbullets = '0' WHERE ID = '$ida'");

$rawinsertlog = "INSERT INTO promo(user,promo)
VALUES ('$gangsterusername','$in')";
$insertlog = mysql_query($rawinsertlog);


}}



if($post == '2econd'){
$in = '2econd';
$toomany = mysql_num_rows(mysql_query("SELECT * FROM promo WHERE promo = 'T5NO2' AND user = '$gangsterusername'"));
$toomanytoo  = mysql_num_rows(mysql_query("SELECT * FROM promo WHERE promo = 'T5NO2'"));
$ooh = $toomany + 1;
if($toomany > '0'){echo"<font color=white face=verdana size=1>This promo code has expired for you!</font>";}
elseif($toomanytoo > '50'){echo"<font color=white face=verdana size=1>This promo code has expired for all users (limit reached)!</font>";}
else{echo"<font color=white face=verdana size=1>You received <b>1,000 bullets</b>!<br></font><font color=khaki face=verdana size=1>You received the <b>M249 Para SAW</b> (Gun)!</font><font color=white face=verdana size=1><br>Your <b>Steal, Melt & Crime timers have been reset</b>!<br>Your <b>Health was restored back to 100</b>%! </font>";

mysql_query("UPDATE users SET gun = '10' WHERE ID = '$ida'");
mysql_query("UPDATE users SET bullets = (bullets + 1000) WHERE ID = '$ida'");
mysql_query("UPDATE users SET health = '100' WHERE ID = '$ida'");
mysql_query("UPDATE users SET steal = '0' WHERE ID = '$ida'");
mysql_query("UPDATE users SET melt = '0' WHERE ID = '$ida'");
mysql_query("UPDATE users SET kidnap = '0' WHERE ID = '$ida'");
mysql_query("UPDATE users SET mug = '0' WHERE ID = '$ida'");
mysql_query("UPDATE users SET stealfrom = '0' WHERE ID = '$ida'");
mysql_query("UPDATE users SET rob = '0' WHERE ID = '$ida'");
mysql_query("UPDATE users SET hustle = '0' WHERE ID = '$ida'");
mysql_query("UPDATE users SET beg = '0' WHERE ID = '$ida'");
mysql_query("UPDATE users SET stealbullets = '0' WHERE ID = '$ida'");

$rawinsertlog = "INSERT INTO promo(user,promo)
VALUES ('$gangsterusername','$in')";
$insertlog = mysql_query($rawinsertlog);


}}




if($post == 'thirdig'){

$in = 'thirdig';
$toomany = mysql_num_rows(mysql_query("SELECT * FROM promo WHERE promo = '3TSPROM0' AND user = '$gangsterusername'"));
$toomanytoo  = mysql_num_rows(mysql_query("SELECT * FROM promo WHERE promo = '3TSPROM0'"));
$ooh = $toomany + 1;
if($rank < '4'){echo"<font color=white face=verdana size=1>You must be ranked <b>Thug</b>+ to use this promo code!</font>";}
elseif($toomanytoo > '80'){echo"<font color=white face=verdana size=1>This promo code has expired for all users (limit reached)!</font>";}
elseif($toomany > '0'){echo"<font color=white face=verdana size=1>This promo code has expired for you!</font>";}

else{echo"<font color=white face=verdana size=1>You received <b>1,000 bullets</b>!<br></font><font color=white face=verdana size=1>You received the <b> Heavy Military Vest</b> (Armour)!</font><font color=white face=verdana size=1><br>You received a </font><font color=red size=1 face=verdana siz=1><b>Very Rare</b></font><font color=white face=verdana size=1>: Pagani Zonda (0% Damaged)</b>!<br><font color=white face=verdana size=1>Your <b>Steal, Melt & Crime timers have been reset</b>!<br>Your <b>Health was restored back to 100</b>%! </font>";


mysql_query("INSERT INTO cars(owner,damage,bullets,carid,speed)
VALUES ('$usernameone','0','240','10','60')");



mysql_query("UPDATE users SET protection = '9' WHERE ID = '$ida'");
mysql_query("UPDATE users SET bullets = (bullets + 1000) WHERE ID = '$ida'");
mysql_query("UPDATE users SET health = '100' WHERE ID = '$ida'");
mysql_query("UPDATE users SET steal = '0' WHERE ID = '$ida'");
mysql_query("UPDATE users SET melt = '0' WHERE ID = '$ida'");
mysql_query("UPDATE users SET kidnap = '0' WHERE ID = '$ida'");
mysql_query("UPDATE users SET mug = '0' WHERE ID = '$ida'");
mysql_query("UPDATE users SET stealfrom = '0' WHERE ID = '$ida'");
mysql_query("UPDATE users SET rob = '0' WHERE ID = '$ida'");
mysql_query("UPDATE users SET hustle = '0' WHERE ID = '$ida'");
mysql_query("UPDATE users SET beg = '0' WHERE ID = '$ida'");
mysql_query("UPDATE users SET stealbullets = '0' WHERE ID = '$ida'");

$rawinsertlog = "INSERT INTO promo(user,promo)
VALUES ('$gangsterusername','$in')";
$insertlog = mysql_query($rawinsertlog);


}}



}




?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="white" face="verdana" size="1"><center><b>Enter your promo codes below!</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png"><form method=post>
<br><font color=silver face=verdana size=1>Promotional codes will be a <b>limited</b> amount of special codes you can enter in order to receive things such as;<br><Br></font><font color=white face=verdana size=1>Extra Bullets, Hand Grenades, Reset Offence Timers and much more.</font><font color=silver face=verdana size=1><br><br>More info about "promo codes" will be released shortly.<br><br><Br><font color=white face=verdana size=1>ENTER PROMO CODE:</FONT><input type=textbox name=prom class=textbox><input type=submit name=dome value=Enter class=textbox></font><br><br><font color=white face=verdana size=1>A lot of our promo codes will be revealed on our facebook page.</font></form>

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