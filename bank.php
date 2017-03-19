<? include 'included.php'; 

mysql_query("DELETE FROM bank WHERE amount <= '0'");


$timeraw = time();
$timeh = $timeraw + 43200;
$saturate = "/[^a-z0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$playerip = $_SERVER['REMOTE_ADDR'];
$username = $usernameone;

$userarray = $statustesttwo;
$userswiss = $userarray['swiss'];
$usermoney = $userarray['money'];
$myranky = $userarray['rankid'];

$jailtest = mysql_query("SELECT username FROM jail WHERE username  = '$username'");
$jailtester = mysql_num_rows($jailtest);
if($jailtester != '0'){die(include 'jail.php'); }
?>
<html>
<head>
<link rel="stylesheet" href="more/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
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
<?php

if($userswiss == '0'){$swissdisbaledone = ' ';}
elseif($userswiss != '0'){$swissdisbaledtwo = ' ';}

$saturated = "/[^0-9]/i";
$saturatedname = "/[^a-z0-9]/i";
$swissdepositraw = mysql_real_escape_string($_POST['swissdepositamount']);
$swisswithdrawraw = mysql_real_escape_string($_POST['swisswithdrawamount']);
$bankdepositraw = mysql_real_escape_string($_POST['bankdepositamount']);
$bankwithdrawraw = mysql_real_escape_string($_POST['bankwithdrawamount']);
$sendmoneyraw = mysql_real_escape_string($_POST['sendamount']);
$sendtoraw = mysql_real_escape_string($_POST['sendto']);
$vera = mysql_real_escape_string($_POST['ver']);
$sessionid = preg_replace($saturate,"",$sessionidraw);
$verpost = preg_replace($saturate,"",$vera);
$swissdeposit = preg_replace($saturated,"",$swissdepositraw);
$swisswithdraw = preg_replace($saturated,"",$swisswithdrawraw);
$bankdeposit = preg_replace($saturated,"",$bankdepositraw);
$bankwithdraw = preg_replace($saturated,"",$bankwithdrawraw);
$sendmoney = preg_replace($saturated,"",$sendmoneyraw);
$sendto = preg_replace($saturatedname,"",$sendtoraw);
$swissdeposittwo = number_format($swissdeposit);
$swisswithdrawtwo = number_format($swisswithdraw);
$bankdeposittwo = number_format($bankdeposit);
$bankwithdrawtwo = number_format($bankwithdraw);
$sendmoneytwo= number_format($sendmoney);

if($sendto){

$sendtotestsql = mysql_query("SELECT * FROM users WHERE username = '$sendto'");
$sendtotestrows = mysql_num_rows($sendtotestsql);
$sendtotestarray = mysql_fetch_array($sendtotestsql);
$sendtostatus = $sendtotestarray['status'];
$sendtoname = $sendtotestarray['username'];
$sendtoid = $sendtotestarray['ID'];
}
 
$normalbanktestsql = mysql_query("SELECT * FROM bank WHERE username = '$username'");
$normalbanktestrows = mysql_num_rows($normalbanktestsql);
$normalbanktestarray = mysql_fetch_array($normalbanktestsql);
$normalbankbalance = $normalbanktestarray['amount'];


if($normalbanktestrows == '0'){$timeleft = '0';}else{$timeleft  = $normalbanktestarray['time'];}

$intrestraw = $normalbankbalance * 1.025; 
$intrest = floor($intrestraw); 

if($timeleft < $timeraw){if($timeleft > '0'){
mysql_query("DELETE FROM bank WHERE username = '$username'");if (mysql_affected_rows()==0) {die('<font color=silver face=verdana size=1>Error bank done.</font>');}
mysql_query("UPDATE users SET money = money + '$intrest' WHERE ID = '$ida'");

}}


if (isset($_POST['swissdeposit'])) {


$entertainer = $ent;


if(!$swissdeposit){echo'<font color=white size=1 face=verdana>You did not enter an amount to deposit.</font>';}
elseif($userswiss != '0'){echo'<font color=white size=1 face=verdana>You can only insert money into your swiss when it is empty.</font>';}
elseif($entertainer != '0'){echo'<font color=white face=verdana size=1>As entertainer you cannot use this feature</font>';}
elseif($swissdeposit > $usermoney){echo"<font color=white size=1 face=verdana>You don't have enough money.</font>";}
elseif($swissdeposit > '99999999999'){echo'<font color=white size=1 face=verdana><b>You cannot have more than $<b>99,999,999,999</b> in your swiss bank.</font>';}
else{ 
mysql_query("UPDATE users SET money = (money - $swissdeposit) WHERE ID = '$ida' AND money >= '$swissdeposit'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 1.</font>');}

mysql_query("UPDATE users SET swiss = (swiss + $swissdeposit) WHERE ID = '$ida'");
echo"<font color=white size=1 face=verdana>You deposited $<b>$swissdeposittwo</b> into your swiss bank account.</font>";}
}


elseif (isset($_POST['swisswithdraw'])) {




if(!$swisswithdraw){echo'<font color=white size=1 face=verdana>You did not enter an amount to withdraw.</font>';}
elseif($userswiss == '0'){echo'<font color=white size=1 face=verdana>Your swiss bank is empty.</font>';}
elseif($swisswithdraw > $userswiss){echo"<font color=white size=1 face=verdana>You don't have that much money in your swiss bank.</font>";}
elseif($swisswithdraw > '99999999999'){echo'<font color=white size=1 face=verdana><b>ERROR, contact admin.</b></font>';}
else{ 
mysql_query("UPDATE users SET swiss = (swiss - $swisswithdraw) WHERE ID = '$ida' AND swiss >= '$swisswithdraw'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 2.</font>');}

mysql_query("UPDATE users SET money = (money + $swisswithdraw) WHERE ID = '$ida'");
echo"<font color=white size=1 face=verdana>You withdrew $<b>$swisswithdrawtwo</b> from your swiss bank account.</font>";}
}

elseif (isset($_POST['bankdeposit'])) {

$entertainer = $ent;

if(!$bankdeposit){echo'<font color=white size=1 face=verdana>You did not enter an amount to deposit.</font>';}
elseif($entertainer != '0'){echo'<font color=white face=verdana size=1>As entertainer you cannot use this feature</font>';}
elseif($normalbanktestrows != '0'){echo'<font color=white size=1 face=verdana>You can only insert money into your bank when it is empty.</font>';}
elseif($ranky >= '25'){echo'<font color=white size=1 face=verdana>Not allowed.</font>';}
elseif($bankdeposit > $usermoney){echo"<font color=white size=1 face=verdana>You don't have enough money.</font>";}
elseif($bankdeposit > '99999999999'){echo'<font color=white size=1 face=verdana>You cannot have more than $<b>99,999,999,999</b> in your bank.</font>';}
elseif($bankdeposit > '10000000000'){echo'<font color=white size=1 face=verdana>You can only insert a maximum of $<b>10,000,000,000</b> into your bank.</font>';}
else{ 

mysql_query("UPDATE users SET money = (money - $bankdeposit) WHERE ID = '$ida' AND money >= '$bankdeposit'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 3.</font>');}

$bankinsertsql = "INSERT INTO bank(username, amount, time)
VALUES ('$username', '$bankdeposit', '$timeh')";
$bankinsert = mysql_query($bankinsertsql);
echo"<font color=white size=1 face=verdana>You deposited $<b>$bankdeposittwo</b> into your bank account, you will receive 2.5% interest after 12 hours.</font>";}
}




elseif (isset($_POST['bankwithdraw'])) {


if(!$bankwithdraw){echo'<font color=white size=1 face=verdana>You did not enter an amount to withdraw.</font>';}
elseif($normalbanktestrows == '0'){echo'<font color=white size=1 face=verdana>Your bank is empty.</font>';}
elseif($bankwithdraw > $normalbankbalance){echo"<font color=white size=1 face=verdana>You don't have that much money in your bank.</font>";}
elseif($bankwithdraw > '99999999999'){echo'<font color=white size=1 face=verdana><b>ERROR, contact admin.</b></font>';}
else{
mysql_query("UPDATE bank SET amount = (amount - $bankwithdraw) WHERE username = '$username' AND '$bankwithdraw' <= amount");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 4.</font>');}

mysql_query("UPDATE users SET money = money + '$bankwithdraw' WHERE ID = '$ida'");


echo"<font color=white size=1 face=verdana>You withdrew $<b>$bankwithdrawtwo</b> from your bank account.</font>";}
}



elseif (isset($_POST['sendamount'])) {


if(!$sendmoney){echo'<font color=white size=1 face=verdana>You did not enter an amount to send.</font>';}
elseif(!$sendto){echo'<font color=white size=1 face=verdana>You did not enter an player to send to.</font>';}
elseif($sendtotestrows == '0'){echo'<font color=white size=1 face=verdana>No such user.</font>';}
elseif($sendmoney > $usermoney){echo"<font color=white size=1 face=verdana>You don't have enough money.</font>";}
elseif($sendmoney > '99999999999'){echo'<font color=white size=1 face=verdana>ERROR, contact admin.</b></font>';}
elseif($username == $sendtoname){echo'<font color=white size=1 face=verdana>You cannot send money to yourself.</font>';}
else{ 
$penpoint = mysql_num_rows(mysql_query("SELECT * FROM ipadresses WHERE ip = '$userip' AND username ='$sendtoname'"));
if($penpoint > '0'){ mysql_query("UPDATE users SET penpoints = penpoints + 1 WHERE username = '$username'");
$reason = "$username sent $$sendmoneytwo to $sendto";
mysql_query("INSERT INTO penpoints(username,reason) VALUES('$username','$reason')");}

mysql_query("UPDATE users SET money = money - '$sendmoney' WHERE ID = '$ida' AND money >= '$sendmoney'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 5.</font>');}

mysql_query("UPDATE users SET money = money + '$sendmoney' WHERE ID = '$sendtoid'");

mysql_query("UPDATE users SET notification = 'a_open$usernameone a_closed$usernameone a_slashsent you $$sendmoneytwo.', notify = (notify + 1) WHERE ID = '$sendtoid'");

$insertsentsql = "INSERT INTO moneysent(username,amount,sent,ip)
VALUES ('$username','$sendmoney','$sendtoname','$playerip')";
$insertsentresult = mysql_query($insertsentsql);
echo"<font color=white size=1 face=verdana>You sent $<b>$sendmoneytwo</b> to <a href=viewprofile.php?username=$sendto><b>$sendto</b>!</a></font>";
}
}


$normalbanktestsql = mysql_query("SELECT * FROM bank WHERE username = '$username'");
$normalbanktestrows = mysql_num_rows($normalbanktestsql);
$normalbanktestarray = mysql_fetch_array($normalbanktestsql);
$normalbankbalance = $normalbanktestarray['amount'];
if($normalbanktestrows == '0'){$timeleft = '0';}else{$timeleft  = $normalbanktestarray['time'];}

$test = $timeleft - $timeraw;
$totalh = $test / 3600;
$totalh = floor($totalh);
if($totalh < '10'){ $leading = 0;}


if($normalbanktestrows == '0'){}
elseif($normalbanktestrows != '0'){}

$lasttensql =mysql_query("SELECT * FROM moneysent WHERE username = '$username' ORDER BY id DESC LIMIT 0,15");

$lasttenrsql =mysql_query("SELECT * FROM moneysent WHERE sent = '$username' ORDER BY id DESC LIMIT 0,15");

?>
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Bank account</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<form method=post>
<table width="100%" cellpadding="0" cellspacing="0"><tr><td valign="top" width="50%"><br>
<table align="center" width="55%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td  background="/more/top.png" NOWRAP align=center><font color="222222" size="1" face="verdana"><b>Interest Bank</b></font></td>
<td width="8"  background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png"></td>
<td background="/more/crossbg.png">

<table cellpadding="0" width=100% cellspacing="1" align="center">
<tr><td height="10" width="50%" bgcolor="#444444" NOWRAP><font color="white" size="1" face="verdana">&nbsp;Balance:</font></td><td height="10"  bgcolor="#333333" width="50%"><font color="white" size="1" face="verdana">&nbsp;$<? echo number_format($normalbankbalance); ?></font></td></tr>
<tr><td height="10" width="50%" bgcolor="#444444" NOWRAP><font color="white" size="1" face="verdana">&nbsp;Time Left:</font></td><td height="10" bgcolor="#333333" width="50%"><font color="white" size="1" face="verdana">&nbsp;<? if($normalbanktestrows == '0'){echo'N/A';}
elseif($timeleft < 1){echo "00:00:00";}
else{echo "$leading";echo "$totalh"; echo date( ":i:s", $timeleft - $timeraw);}?></font></td></tr>
<tr><td width="50%" NOWRAP><input type="text" name="bankdepositamount" class="textbox" value=$></td><td width="50%"><input type ="submit" value="Deposit" class="textbox" name = "bankdeposit" style ="width: 100%;" <? echo $bankdisbaledtwo; ?>></td></tr></form>
<form method="post"><tr><td width="50%" NOWRAP><input type="text" name="bankwithdrawamount" class="textbox" value=$></td><td><input type ="submit" value="Withdraw" class="textbox" name = "bankwithdraw" style ="width: 100%; " <? echo $bankdisbaledone; ?>></td></tr></form>
</table>
</td>
<td width="8" background="/more/rightb.png"></td>
</tr>


<tr>
<td width="8" height="9" background="/more/bottomleft.png"></td>
<td height="9" background="/more/bottom.png"></td>
<td width="8" height="9" background="/more/bottomright.png"></td>
</tr>
</table>


<br><table align="center" width="55%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td  background="/more/top.png" NOWRAP align=center><font color="222222" size="1" face="verdana"><b>Swiss Bank</b></font></td>
<td width="8"  background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png"></td>
<td background="/more/crossbg.png"><table cellpadding="0" cellspacing="1" align="center"width=100% >
<tr><td height="10" width="50%" bgcolor="#444444" NOWRAP><font color="white" size="1" face="verdana">&nbsp;Balance:</font></td><td height="10" width="50%" bgcolor="#333333"><font color="white" size="1" face="verdana">&nbsp;$<? echo number_format($userswiss); ?></font></td></tr>
<form method=post><tr><td width="50%" NOWRAP><input type="text"  value=$ class="textbox" name="swissdepositamount"></td><td width="50%"><input type ="submit" value="Deposit" class="textbox" name = "swissdeposit" style ="width: 100%; " <? echo $swissdisbaledtwo; ?>></td></tr></form>
<form method=post><tr><td width="50%" NOWRAP><input type="text" name="swisswithdrawamount" class="textbox" value=$></td><td width="50%"><input type ="submit" value="Withdraw" class="textbox" name = "swisswithdraw" style ="width: 100%; " <? echo $swissdisbaledone; ?>></td></tr></form>
</table></td>
<td width="8" background="/more/rightb.png"></td>
</tr>


<tr>
<td width="8" height="9" background="/more/bottomleft.png"></td>
<td height="9" background="/more/bottom.png"></td>
<td width="8" height="9" background="/more/bottomright.png"></td>
</tr>
</table><br><br>

<table align="center" width=50% cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td  background="/more/top.png" NOWRAP align=center><font color="222222" size="1" face="verdana"><b>Send Money</b></font></td>
<td width="8"  background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png"></td>
<td background="/more/crossbg.png">
<table width="100%" cellpadding="0" cellspacing="1" align="center">
<form method=post>
<tr><td width="100%"><input type="text" name="sendto" class="textbox" value="Username" onclick="this.value=''"  style="width: 100%;"></td></tr>
<tr><td width="100%"><input type="text" name="sendamount" class="textbox"  value=Amount onclick="this.value='$'"  style="width: 100%;"></td></tr>
<tr><td width="100%" bgcolor="222222" NOWRAP colspan="2"><input type="submit" value="Send Cash" class="textbox" name="sendsubmit" style="width: 100%; "></td></tr></form>
</table>
</td>
<td width="8" background="/more/rightb.png"></td>
</tr>


<tr>
<td width="8" height="9" background="/more/bottomleft.png"></td>
<td height="9" background="/more/bottom.png"></td>
<td width="8" height="9" background="/more/bottomright.png"></td>
</tr>
</table><br></td>
<td valign="top" width="50%">
<br>
<table align="center" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td  background="/more/top.png" NOWRAP align=center><font color="222222" size="1" face="verdana"><b>Last 15 Sent</b></font></td>
<td width="8"  background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png"></td>
<td background="/more/crossbg.png">

<table cellpadding="0" cellspacing="1" width=100% align="left">
<?php 

$cntsent = 0;
while($lasttenarray = mysql_fetch_array($lasttensql)){
$cntsent++;
$lasttento = $lasttenarray['sent'];
$qt = $lasttenarray['quicktrade'];
$lasttenamount = number_format($lasttenarray['amount']);
if($qt == 'yes'){echo"<tr><td bgcolor=#333333 NOWRAP align=left><font color=white size=1 face=verdana>&nbsp;You sent $$lasttenamount to quicktrade&nbsp;</font></td></tr>";}
else{echo"<tr><td bgcolor=#333333 NOWRAP align=left><font color=white size=1 face=verdana>&nbsp;You sent $$lasttenamount to </font><a href=viewprofile.php?username=$lasttento><font color=white size=1 face=verdana>$lasttento&nbsp;</font></a></td></tr>";}}if($cntsent == 0){?><tr><td bgcolor=#333333 NOWRAP align=left><font color=white size=1 face=verdana>&nbsp;You have no sent bank activity as of yet.&nbsp;</font></td></tr><?} ?>
</table></td>
<td width="8" background="/more/rightb.png"></td>
</tr>


<tr>
<td width="8" height="9" background="/more/bottomleft.png"></td>
<td height="9" background="/more/bottom.png"></td>
<td width="8" height="9" background="/more/bottomright.png"></td>
</tr><tr><td colspan=3></td></tr>
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td  background="/more/top.png" NOWRAP align=center><font color="222222" size="1" face="verdana"><b>Last 15 Received</b></font></td>
<td width="8"  background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png"></td>
<td background="/more/crossbg.png">

<table cellpadding="0" cellspacing="1"  width=100% align="left">
<?php 
$cntrec = 0;
while($lasttenrarray = mysql_fetch_array($lasttenrsql)){
$cntrec++;
$lasttenrto = $lasttenrarray['username'];
$qt = $lasttenrarray['quicktrade'];
$lasttenramount = number_format($lasttenrarray['amount']);
if($qt == 'yes'){echo"<tr><td bgcolor=#333333 NOWRAP align=left><font color=white size=1 face=verdana>&nbsp;You recieved $$lasttenramount from quicktrade&nbsp;</font></td></tr>";
}else{echo"<tr><td bgcolor=#333333 NOWRAP align=left><font color=white size=1 face=verdana>&nbsp;You recieved $$lasttenramount from </font><a href=viewprofile.php?username=$lasttenrto><font color=white size=1 face=verdana>$lasttenrto&nbsp;</font></a></td></tr>";}}if($cntrec == 0){?><tr><td bgcolor=#333333 NOWRAP align=left><font color=white size=1 face=verdana>&nbsp;You have no received bank activity as of yet.&nbsp;</font></td></tr><?}?>
</table>
</td>
<td width="8" background="/more/rightb.png"></td>
</tr>


<tr>
<td width="8" height="9" background="/more/bottomleft.png"></td>
<td height="9" background="/more/bottom.png"></td>
<td width="8" height="9" background="/more/bottomright.png"></td>
</tr>
</table>
</td></tr>
</table>
<div align="center"><br>
<br></div>
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
<?
$statustesttwo = $userarray;?>
<? include 'rightmenu.php'; ?>
</td>
</tr>
</table>

</body>
<head><META HTTP-EQUIV="Pragma" CONTENT="no-cache"></head></html>