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
$chosenraw = mysql_real_escape_string($_POST['spend']);
$chosen = preg_replace($saturates,"",$chosenraw);


$gangsterusername = $usernameone;

$getuserinfoarray = $statustesttwo;
$getref = $getuserinfoarray['ref'];
$rank= $getuserinfoarray['rankid'];

$getrefby = $getuserinfoarray['refby'];
$refpoints = $getuserinfoarray['refpoints'];

$topten = mysql_query("SELECT username,totalref,refpoints FROM users WHERE status != 'Dead' ORDER BY refpoints DESC LIMIT 0,20");

if(isset($_POST['spend'])){


if($chosen > '4'){}
else{

if($chosen == '1'){
if($refpoints < '5'){echo"<font color=white face=verdana size=1>You dont have enough referral points!</font>";}
else{
mysql_query("UPDATE users SET refpoints = (refpoints - 5) WHERE username = '$gangsterusername' AND refpoints >= '5'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 1.</font>');}

mysql_query("UPDATE users SET points = (points + 25) WHERE username = '$gangsterusername'");


echo"<font color=white face=verdana size=1>You received <b>25 points</b>!</font>";}}
elseif($chosen == '2'){
if($refpoints < '10'){echo"<font color=white face=verdana size=1>You dont have enough referral points!</font>";}
else{
mysql_query("UPDATE users SET refpoints = (refpoints - 10) WHERE username = '$gangsterusername' AND refpoints >= '10'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 2.</font>');}

mysql_query("UPDATE users SET points = (points + 75) WHERE username = '$gangsterusername'");

echo"<font color=white face=verdana size=1>You received <b>75</b> points</font>";}}
elseif($chosen == '3'){
if($refpoints < '15'){echo"<font color=white face=verdana size=1>You dont have enough referral points!</font>";}
else{
mysql_query("UPDATE users SET refpoints = (refpoints - 15) WHERE username = '$gangsterusername' AND refpoints >= '15'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 3.</font>');}

mysql_query("UPDATE users SET points = (points + 135) WHERE username = '$gangsterusername'");

echo"<font color=white face=verdana size=1>You received <b>135</b> points</font>";}}
elseif($chosen == '4'){
if($refpoints < '20'){echo"<font color=white face=verdana size=1>You dont have enough referral points!</font>";}
else{
mysql_query("UPDATE users SET refpoints = (refpoints - 20) WHERE username = '$gangsterusername' AND refpoints >= '20'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 4.</font>');}

mysql_query("UPDATE users SET points = (points + 225) WHERE username = '$gangsterusername'");

echo"<font color=white face=verdana size=1>You received <b>225</b> points</font>";}}
}


}




?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Referral system</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<br><font color=silver face=verdana size=1>Your game referral link is <b style=color:lime;>www.mafiansociety.co.cc/register.php?referral=<?echo$getref;?></b><br>By giving this link to your friends to register with,<br>every bullet they melt, you will receive <b>10%</b> of the bullets they melt!<br> They will not receive 10% less, they will still get 100%, but 10% of that will be added to your bullet amount!
<br>You now only receieve refferal points when the player you reffer ranks to <b>Mobster</b>, this is to stop dupe refferals!
<br><br><b>Total Refferal Points:</b><b style=color:gold;> <?echo$refpoints;?></b></font><br><br>

<table cellpadding=0 cellspacing=1 width=35% align="center">
<form method="post">
<tr><td width=75% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Reward</b>:</font></td><td width=25% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Price</b>:</font></td></tr>
<tr><td width=75% bgcolor=#222222 NOWRAP><input type=radio name=spend value=1><font color=silver face=verdana size=1><b>25 POINTS [NEW]</b></font></td><td width=25% bgcolor=#222222 NOWRAP><font color=silver face=verdana size=1>(5 referral points)</font></td></tr>
<tr><td width=75% bgcolor=#222222 NOWRAP><input type=radio name=spend value=2><font color=white face=verdana size=1><b>75 POINTS [NEW]</b></font></td><td width=25% bgcolor=#222222 NOWRAP><font color=silver face=verdana size=1>(10 referral points)</font></td></tr>
<tr><td width=75% bgcolor=#222222 NOWRAP><input type=radio name=spend value=3><font color=gold face=verdana size=1><b>135 POINTS [NEW]</b></font></td><td width=25% bgcolor=#222222 NOWRAP><font color=silver face=verdana size=1>(15 referral points)</font></td></tr>
<tr><td width=75% bgcolor=#222222 NOWRAP><input type=radio name=spend value=4><font color=red face=verdana size=1><b>225 POINTS [NEW]</b></font></td><td width=25% bgcolor=#222222 NOWRAP><font color=silver face=verdana size=1>(20 referral points)</font></td></tr>
<tr><td width=100% bgcolor=#222222 NOWRAP colspan="2"><input type=submit name=do value="Purchase" class="textbox" style="width:100%;"></td></tr>
</form>
</table><br><center><font color=white face=verdana size=1>You can now share <b>your Referral Link</b> on <b>FaceBook</b> by clicking:</font> <a name="fb_share" type="button" share_url="www.mafiansociety.co.cc/register.php?referral=<?echo$getref;?>&t=immaculate+gangsters+Online+Mafia+Game"></a></center><br>

<? if ($rank == 100){echo"<center><br><br><u><font color=white face=verdana size=1><b>Admin view</b></u></font>";?>
<table cellpadding=0 cellspacing=1 width=35%>
<tr><td width=75% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Username</b>:</font></td><td width=25% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>Total</b>:</font></td></tr><?
while($toptena = mysql_fetch_array($topten)){
$refname = $toptena['username'];

$refpoin = $toptena['refpoints'];
echo"<tr><td width=75% bgcolor=#222222 NOWRAP><a href=viewprofile.php?username=$refname><font color=white face=verdana size=1>$refname</font></a></td><td width=25% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1>$refc</font><font color=gray face=verdana size=1>   $refpoin</font></td></tr>"; }
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