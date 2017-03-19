<? include 'included.php'; ?>
<?

$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$poster = $_GET['deletepost'];
$betraw = mysql_real_escape_string($_POST['bet']);
$joinraw = mysql_real_escape_string($_POST['join']);
$sessionid = preg_replace($saturate,"",$sessionidraw);
$join = preg_replace($saturated,"",$joinraw);
$bet = preg_replace($saturated,"",$betraw);
$playerip = $_SERVER['REMOTE_ADDR'];
$username = $usernameone;
$userarray = $statustesttwo;
$userlocation = $userarray['location'];
$userrankid = $myrank;
$usermoney = $userarray['money'];
$penpoints = $userarray['penpoints'];
$deletepost = preg_replace($saturated,"",$poster);


?>

<html>
<head>
<link rel="stylesheet" href="more/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="shortcut icon" href="/more/icon.png" type="image/x-icon" />
<script type="text/javascript">
function emotion(em) { document.smiley.newpost.value=document.smiley.newpost.value+em;}
</script>
</head>
<body background="/more/bgtest.png" onload="document.teehee.bet.select();">
<table width="100%" height="335" align="center" cellpadding="0" cellspacing="3">
<tr>
<td width="250" height="25"></td>
<td width="100%"></td>
<td width="250"></td>
</tr>

<tr>
<td width="250" valign="top">
<?php

if($bar == '/leftmenu.php'){die('<font color=black face=verdana size=1>Go away.</font>');}
$gimtime = time();

$usernameone = $usernameone;
$user = $statustesttwo['username'];
$rankid = $statustesttwo['rankid'];
$crewid = $statustesttwo['crewid'];
$notice = $statustesttwo['notice'];
$live = $statustesttwo['live'];
$hdo = $statustesttwo['hdo'];
$rr = $statustesttwo['rr'];
$silencer = $statustesttwo['silencer'];
$mails = $statustesttwo['mail'];

if($crewid != '0'){
$crewbosssql = mysql_query("SELECT boss FROM crews WHERE boss = '$user'");
$crewboss = mysql_num_rows($crewbosssql);
}else{$crewboss = 0;}



?>

<head><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<script type="text/javascript">
<!--
function shithouse(){
var answer = confirm ("Log out?")
if (answer)
location.href='logout.php?id=<?echo$sessionid;?>';
else
alert ("Request cancelled.")
}

// -->
</script> 
<title>Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>

<?


$entertainer = $ent;
if($entertainer != '0'){die('<font color=white face=verdana size=1>As entertainer you cannot view this page</font>');}

$mdgtest = mysql_query("SELECT * FROM mdg WHERE username = '$username'");
$mdgtest = mysql_num_rows($mdgtest);


if($mdgtest == '0'){?>


<table align="center" width="100%" cellpadding="0" cellspacing="0"><form method="post">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td class="top" NOWRAP id=findy><font color=222222 face=verdana size=1><b><center>Money Bet</b></font></center></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>
<form id=teehee name=teehee action=find.php method=post>
<tr>
<td class="left" NOWRAP></td>
<td class="main" NOWRAP>
<input type ="text" autocomplete=off style="width:65%;" value="$" id="bet" name=bet class=textbox><input type ="submit" style="width:35%;" name=dobet value="Create" class="textbox"></td>
<td class="right" NOWRAP></td>

</tr>
</form>
<tr>
<td class="bottomleft" NOWRAP></td>
<td class="bottom" NOWRAP></td>
<td class="bottomright" NOWRAP></td>
</tr></form>
</table>
<?}?>
<? include 'leftmenu.php'; ?>

</td>
<td width="100%" valign="top">
<?
 


if($mdgtest > '1'){die('<font color=white face=verdana size=1>Message admin and say you saw error MDG</font>');}

if(isset($_POST['bet'])) {
if($mdgtest != '0'){echo'<font color="white" face="verdana" size="1">You have already created a game!</font>';}
elseif($bet > $usermoney){echo'<font color="white" face="verdana" size="1">You dont have enough cash!</font>';}
elseif($bet == '0'){}
elseif(!$bet){}
elseif($bet > '99999999999'){echo'<font color="white" face="verdana" size="1">Error contact admin!</font>';}
else{
mysql_query("UPDATE users SET money = money - $bet WHERE ID ='$ida' AND money >= '$bet'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 1.</font>');}


mysql_query("INSERT INTO mdg(username,bet)
VALUES ('$username','$bet')");
$getgameid = mysql_fetch_array(mysql_query("SELECT * FROM mdg WHERE username = '$username'"));
$gameid = $getgameid['id'];
mysql_query("INSERT INTO mdice(username,number,id)
VALUES ('$username','1','$gameid')");
echo'<font color="white" face="verdana" size="1">Game created!</font>';}}



elseif(isset($_POST['dojoin'])) {
$jointest = mysql_num_rows(mysql_query("SELECT * FROM mdg WHERE id = '$join'"));
$joinoktest = mysql_num_rows(mysql_query("SELECT * FROM mdice WHERE id = '$join' AND username = '$username'"));
$joininfo = mysql_fetch_array(mysql_query("SELECT * FROM mdg WHERE id = '$join'"));
$joinbet = $joininfo['bet'];
$joinname = $joininfo['username'];
$joinnuma = mysql_num_rows(mysql_query("SELECT * FROM mdice WHERE id = '$join'"));
$joinnum = $joinnuma + 1;
if($jointest == '0'){}
elseif($joinoktest > '0'){echo'<font color="white" face="verdana" size="1">You are already in that game!</font>';}
elseif($joinbet > $usermoney){echo'<font color="white" face="verdana" size="1">You dont have enough cash!</font>';}
elseif($joinname == $username){echo'<font color="white" face="verdana" size="1">You are already in that game!</font>';}
else{
mysql_query("UPDATE users SET money = (money - $joinbet) WHERE ID ='$ida' AND money >= '$joinbet'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 2.</font>');}

mysql_query("INSERT INTO mdice(username,number,id)
VALUES ('$username','$joinnum','$join')");
echo'<font color="white" face="verdana" size="1">You joined the game!</font>';}}


elseif(isset($_POST['roll'])) {
$rollcheck = mysql_num_rows(mysql_query("SELECT * FROM mdg WHERE username = '$username'"));
$rollida = mysql_fetch_array(mysql_query("SELECT * FROM mdg WHERE username = '$username'"));
$rollid = $rollida['id'];
if($rollcheck < '1'){}
else{
$rollamount = mysql_num_rows(mysql_query("SELECT * FROM mdice WHERE id = '$rollid'"));
$rand = mt_rand(1,$rollamount);


$winner = mysql_fetch_array(mysql_query("SELECT * FROM mdice WHERE number = '$rand' AND id = '$rollid'"));
$winnername = $winner['username'];
$win = mysql_fetch_array(mysql_query("SELECT * FROM mdg WHERE id = '$rollid'"));
$wintotal = $win['bet'] * $rollamount;
$wintotala = number_format($wintotal);

echo"<font color=white size=1 face=verdana>The dice rolled $rand! That means $winnername won!</font>";

$sendinfo = "You joined a dice game created by \[b\]$username\[\/b\]! The dice rolled $rand!\[br\]That means \[b\]$winnername\[\/b\] won $\[b\]$wintotala\[\/b\]!";
$selecttos = mysql_query("SELECT * FROM mdice WHERE id = '$rollid'");
while($to = mysql_fetch_array($selecttos)){
$sendto = $to['username'];
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$sendto','$sendto','2','$userip','$sendinfo')");}

mysql_query("DELETE FROM mdg WHERE id = '$rollid'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error roll 1</font>');}
mysql_query("DELETE FROM mdice WHERE id = '$rollid'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error roll 2</font>');}

mysql_query("UPDATE users SET money = money + '$wintotal' WHERE username = '$winnername'");

}}

$getida = $_GET['delete'];
$getid = preg_replace($saturated,"",$getida);

if(isset($_GET['delete'])){
if($userrankid != '100'){echo"<font color=white face=verdana size=1>Hehe</font>";}
else{

$ro = mysql_num_rows(mysql_query("SELECT * FROM mdg WHERE id = '$getid'"));
if($ro < '1'){echo"<font color=white face=verdana size=1>No such game</font>";}
elseif($ro > '1'){echo"<font color=white face=verdana size=1>Error</font>";}
else{
mysql_query("DELETE FROM mdg WHERE id = '$getid'");
mysql_query("DELETE FROM mdice WHERE id = '$getid'");echo"<font color=white face=verdana size=1>Game deleted</font>";}

}}


?>


<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Multi dice game</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<table width=100% cellpadding=0 cellspacing=4>
<tr><td width=100% bgcolor=333333 colspan=2 align=center><br>
<?
$selecterraw = $_POST['select'];
$selecter = preg_replace($saturated,"",$selecterraw);
if(isset($_POST['next'])){$one = $selecter + 1;}
elseif(isset($_POST['previous'])){$one = $selecter - 1;}else{$one = '0';}

$selectfrom = $one * 35;
$selectto = $selectfrom + 35;
$mdgs = mysql_query("SELECT * FROM mdg ORDER BY id DESC LIMIT $selectfrom,$selectto ");

?>
<?if ($mdgtest > '0'){?><form method="post"><input type=submit name=roll value="Roll dice" class="textbox"></form>
<?}?><div align=right><form action="" method="post"><input type="hidden" name="select" value="<? echo $one; ?>"><?php if($selectfrom != '0'){echo'<input type ="submit" value="Previous page" class="textbox" name="previous">';}?><input type ="submit" value="Next page" class="textbox" name="next"></div></td></tr></form><form action="" method="post">
<? while($getgame = mysql_fetch_array($mdgs)){

$start = 0;

$id = $getgame['id'];
$creator = $getgame['username'];
$gamebet = $getgame['bet'];
$gamebeta = number_format($gamebet);
$getjoin = mysql_query("SELECT * FROM mdice WHERE id = $id ORDER BY number ASC");

if($creator == $usernameone){$cula = '444444';$culas = ' color=white';}else{$cula = '333333';$culas = '777777';}
echo"<tr><td width=1% bgcolor=$cula><input type=radio name=join value=$id></td><td width=91% bgcolor=$cula>";
while($getjoined = mysql_fetch_array($getjoin)){
$start++;
$getnames = $getjoined[username];

echo"<a href=viewprofile.php?username=$getnames><font $culas>$befo$getnames$afta</font></a><font size=1 face=verdana color=white> - </font>";}
$allbet = number_format($gamebet * $start);
echo"<font color=khaki face=verdana size=1> Money Bet: $<b>$gamebeta</b> </font><font color=white face=verdana size=1>Pot - </font><font color=lime face=verdana size=1>$<b>$allbet</b></font>";if($userrankid == '100'){echo"<a href='multidice.php?delete=$id'><font color=orange face=verdana size=1>[Delete]</font></a></td></tr>";}}?>
</table>
<br><br><input type=submit name=dojoin value="Join game" class="textbox"></form>
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