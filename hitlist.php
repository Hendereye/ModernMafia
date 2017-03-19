<? include 'included.php';?>
<html>
<head>
<link rel="stylesheet" href="more/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
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
$saturater = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$post = $_POST['id'];
$fora = $_POST['amount'];
$anona = $_POST['anon'];
$namea = $_POST['name'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$postid = preg_replace($saturater,"",$post);
$for = preg_replace($saturater,"",$fora);
$anon = preg_replace($saturater,"",$anona);
$name = preg_replace($saturate,"",$namea);
$userip = $_SERVER[REMOTE_ADDR]; 
$reasonraw = $_POST['reason'];
$reason = htmlentities($reasonraw, ENT_QUOTES);

$gangsterusername = $usernameone;

$rank= $myrank;
$money= $statustesttwo['money'];

if(isset($_POST['id'])){
$check = mysql_query("SELECT * FROM hitlist WHERE id = '$postid'");
$rows = mysql_num_rows($check);
if($rows < '1'){}
else{
$array = mysql_fetch_array($check);
$nam = $array['username'];
$buyoff = $array['amount'];
$buyoffa = number_format($array['amount']);
if($buyoff > $money){echo"<font color=white face=verdana size=1>You dont have enough money!</font>";}
elseif($postid == '672'){echo"<font color=white face=verdana size=1>Fail!</font>";}else{
mysql_query("UPDATE users SET money = (money - $buyoff) WHERE username = '$gangsterusername'AND money >= '$buyoff'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 1.</font>');}

mysql_query("DELETE FROM hitlist WHERE id = '$postid'")or die("Error");

$sendinfo = "\[b\]$gangsterusername has bought you from the hitlist for $$buyoffa!\[\/b\]";
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$nam','$nam','no','$userip','$sendinfo')");
echo"<font color=white face=verdana size=1>You bought $nam off the hitlist!</font>";}}}


elseif(isset($_POST['name'])){
$test = $for + 10000000;
$check = mysql_query("SELECT * FROM users WHERE username = '$name'");
$rows = mysql_num_rows($check);
if($rows < '1'){echo"<font color=white face=verdana size=1>No such user</font>";}
else{
$array = mysql_fetch_array($check);
$status = $array['status'];
$name = $array['username'];
if($status == 'Dead'){echo"<font color=white face=verdana size=1>User is already dead</font>";}
elseif($for < '1500000'){echo"<font color=white face=verdana size=1>You cannot hitlist someone for less than $1,500,000</font>";}
elseif($for > $money){echo"<font color=white face=verdana size=1>You dont have enough money</font>";}
elseif(($anon == '1')&&($test > $money)){echo"<font color=white face=verdana size=1>You dont have enough money</font>";}
else{mysql_query("UPDATE users SET money = (money - $for) WHERE username = '$gangsterusername' AND money >= '$for'")or die("Error");

if($anon == '1'){$type = '1';mysql_query("UPDATE users SET money = (money - 10000000) WHERE username = '$gangsterusername' AND money >= '10000000'")or die("Error");}else{$type = '0';}

mysql_query("INSERT INTO hitlist(username,reason,amount,killer,anon)
VALUES ('$name','$reason','$for','$gangsterusername','$type')");
echo"<font color=white face=verdana size=1>You added $name to the hitlist!</font>";$sendinfo = "\[b\]You have been hitlisted!\[\/b\]";
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$name','$name','no','$userip','$sendinfo')");}}}

$hitlist = mysql_query("SELECT * FROM hitlist ORDER BY amount DESC");
$raw = mysql_num_rows($hitlist);

?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Hitlist</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<br><br><table cellpadding=0 cellspacing=2 width=75% align="center">
<form method="post"><tr><td width=13% bgcolor=#222222 NOWRAP colspan="2"><font color=silver face=verdana size=1>&nbsp;Victim:</font></td><td width=12% bgcolor=#222222 NOWRAP><font color=silver face=verdana size=1>&nbsp;Hitlister</b>:</font></td><td width=25% bgcolor=#222222 NOWRAP><font color=silver face=verdana size=1>&nbsp;Reward:</font></td><td width=15% bgcolor=#222222 NOWRAP><font color=silver face=verdana size=1>&nbsp;Added at:</font></td><td width=35% bgcolor=#222222 NOWRAP><font color=silver face=verdana size=1>&nbsp;Reason:</font></td></tr><?

if($raw == '0'){
?><tr><td colspan=6 bgcolor=#333333 align=center><font color=silver face=verdana size=1>There is currently nobody on the hitlist!</font></td></tr><?}

while($hit = mysql_fetch_array($hitlist)){
$hitname = $hit['username'];
$hitamount = number_format($hit['amount']);
$by = $hit['killer'];
$id = $hit['id'];
$type = $hit['anon'];
$time = $hit['time'];
$reason = html_entity_decode($hit['reason'],ENT_NOQUOTES);

if($type == '1'){$type = "<b><font color=silver face=verdana size=1>&nbsp;Anonymous&nbsp;</font></b>";}else{$type = "<a href= viewprofile.php?username=$by>&nbsp;$by&nbsp;</a>";}  

echo"<tr><td width=1% bgcolor=#333333 NOWRAP><input type=radio name=id value=$id></td><td width=14% bgcolor=#333333 NOWRAP><a href=viewprofile.php?username=$hitname>&nbsp;$hitname&nbsp;</a></td><td width=15% bgcolor=#333333 NOWRAP>$type</td><td width=25% bgcolor=#333333 NOWRAP><font color=silver face=verdana size=1>&nbsp;$$hitamount&nbsp;</font></td><td width=15% bgcolor=#333333 NOWRAP><font color=silver face=verdana size=1>&nbsp;$time&nbsp;&nbsp;</font></td><td width=35% bgcolor=#333333 ><font color=silver face=verdana size=1>$reason</font></td></tr>"; }
?><tr><td width=100% NOWRAP colspan="6" align="right"><input type="submit" value="Buy off!" class="textbox"></td></tr></table></form><br><center>
<form action="" method="post">
<font color="silver" face="verdana" size="1">Victim:</font><br><input type="text" name="name" class="textbox"><br><font color="silver" face="verdana" size="1">Amount:</font><br><input type="text" name="amount" class="textbox"><br>
<font color="silver" face="verdana" size="1">Reason:</font><br><textarea name="reason" cols="42" rows="11" class="textbox"></textarea><br><label><font color="silver" face="verdana" size="1">Anonymous (<b>$10,000,000</b>) :</font><input type="checkbox" name="anon" class="textbox" value="1"></label>
<input type ="submit" value="Hitlist user" class="textbox" name="do"></form></center><br><br>


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