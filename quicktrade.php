<? include 'included.php'; 
?>
<?
$time = time();
$times = $time + 300;
$jailtime = $time + 120;
$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$casinoidraw = mysql_real_escape_string($_POST['casino']);
$buyidraw = mysql_real_escape_string($_POST['points']);
$moneyidraw = mysql_real_escape_string($_POST['money']);
$sellamountraw = mysql_real_escape_string($_POST['sellamount']);
$sellraw = mysql_real_escape_string($_POST['sell']);
$buyamountraw = mysql_real_escape_string($_POST['buyamount']);
$buyraw = mysql_real_escape_string($_POST['buyprice']);
$sessionid = preg_replace($saturate,"",$sessionidraw);
$casinoid = preg_replace($saturated,"",$casinoidraw);
$buyid = preg_replace($saturated,"",$buyidraw);
$moneyid = preg_replace($saturated,"",$moneyidraw);
$sellamount = preg_replace($saturated,"",$sellamountraw);
$buyamount = preg_replace($saturated,"",$buyamountraw);
$sell = preg_replace($saturated,"",$sellraw);
$buy = preg_replace($saturated,"",$buyraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$gangsterusername = $usernameone;

$jailtest = mysql_query("SELECT username FROM jail WHERE username  = '$gangsterusername'");
$jailtester = mysql_num_rows($jailtest);
if($jailtester != '0'){die(include 'jail.php'); }
?>


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
$getuserinfoarray = $statustesttwo;
$username = $getuserinfoarray['username'];
$points = $getuserinfoarray['points'];
$money = $getuserinfoarray['money'];
$rank = $getuserinfoarray['rankid'];
$rankup = $getuserinfoarray['rankup'];
$penpoints = $getuserinfoarray['penpoints'];



$entertainer = $ent;
if($entertainer != '0'){die('<font color=white face=verdana size=1>As entertainer you cannot view this page</font>');}


 

if(isset($_POST['casino'])){
$casinopost = mysql_query("SELECT * FROM buycasinos WHERE id = '$casinoid'");
$two = mysql_num_rows(mysql_query("SELECT * FROM casinos WHERE owner = '$gangsterusername'"));
$casinoposts = mysql_fetch_array($casinopost);
$casinorows = mysql_num_rows($casinopost);
$casinopricetag = $casinoposts['price'];
$casinoowner = $casinoposts['username'];
$casino = $casinoposts['type'];
$casinocity = $casinoposts['city'];
if($casinoowner == $username){echo"<font color=white face=verdana size=1>You cancelled your offer!</font>"; mysql_query("DELETE FROM buycasinos WHERE id = '$casinoid'");}
elseif(!$casinoid){}
elseif($casinorows == '0'){die('<font color=white face=verdana size=1>Offer does not exist</font>');}
elseif($casinopricetag > $points){echo"<font color=white face=verdana size=1>You dont have enough points!</font>";}
else{echo"<font color=white face=verdana size=1>You bought the casino!</font>";
mysql_query("DELETE FROM buycasinos WHERE id = '$casinoid'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 1.</font>');}

mysql_query("UPDATE users SET points = (points - $casinopricetag) WHERE ID = '$ida'");
mysql_query("UPDATE users SET points = (points + $casinopricetag) WHERE username = '$casinoowner'");
mysql_query("UPDATE casinos SET owner = '$username' WHERE casino = '$casino' AND location = '$casinocity'");
mysql_query("UPDATE casinos SET nickname = '$username' WHERE casino = '$casino' AND location = '$casinocity'");
$sendinfo = "\[b\]$username\[\/b\] bought your casino for \[b\]$casinopricetag\[\/b\] points!";
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$casinoowner','$casinoowner','no','$userip','$sendinfo')");
mysql_query("INSERT INTO pointssent(username,amount,sent,ip,quicktrade)
VALUES ('$username','$casinopricetag','$casinoowner','$userip','no')");

mysql_query("UPDATE users SET notify = '1', notification = 'a_open$usernameone a_closed$usernameone a_slashbought your $casinocity $casino for $casinopricetag points.' WHERE username = '$casinoowner'");


}}

elseif(isset($_POST['points'])){

$buypost = mysql_query("SELECT * FROM buypoints WHERE id = '$buyid'");
$buyposts = mysql_fetch_array($buypost);
$buyrows = mysql_num_rows($buypost);
$pricetag = $buyposts['price'];
$pricetags = number_format($pricetag);
$buyname = $buyposts['username'];
$buyamount = $buyposts['points'];
$hidden = $buyposts['hidden'];
$buyamounts = number_format($buyamount);

if($hidden == 'yes'){$type = 'yes';}else{$type = 'no';}

if($buyname == $username){
mysql_query("DELETE FROM buypoints WHERE id = '$buyid'");

if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 2.</font>');}

echo"<font color=white face=verdana size=1>You cancelled your offer!</font>";mysql_query("UPDATE users SET points = (points + $buyamount) WHERE ID = '$ida'");}
elseif(!$buyid){}
elseif($buyrows == '0'){die('<font color=white face=verdana size=1>Offer does not exist</font>');}
elseif($pricetag > $money){echo"<font color=white face=verdana size=1>You dont have enough money!</font>";}
else{echo"<font color=white face=verdana size=1>You accepted the offer!</font>";
mysql_query("DELETE FROM buypoints WHERE id = '$buyid'");

if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 2.</font>');}


mysql_query("UPDATE users SET money = (money - $pricetag) WHERE ID = '$ida'");
mysql_query("UPDATE users SET points = (points + $buyamount) WHERE ID = '$ida'");
mysql_query("UPDATE users SET money = (money + $pricetag) WHERE username = '$buyname'");
$sendinfo = "\[b\]$username\[\/b\] bought your \[b\]$buyamounts\[\/b\] points for $\[b\]$pricetags\[\/b\]!";
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$buyname','$buyname','no','$userip','$sendinfo')");
mysql_query("INSERT INTO moneysent(username,amount,sent,ip,quicktrade)
VALUES ('$username','$pricetag','$buyname','$userip','$type')");
mysql_query("INSERT INTO pointssent(username,amount,sent,ip,quicktrade)
VALUES ('$buyname','$buyamount','$username','$userip','$type')");

mysql_query("UPDATE users SET notify = '1',notification = 'a_open$usernameone a_closed$usernameone a_slashbought your $buyamounts points for $$pricetags.' WHERE username = '$buyname'");


}}

elseif(isset($_POST['money'])){
$buypost = mysql_query("SELECT * FROM buymoney WHERE id = '$moneyid'");
$buyposts = mysql_fetch_array($buypost);
$buyrows = mysql_num_rows($buypost);
$pricetag = $buyposts['price'];
$pricetags = number_format($pricetag);
$buyname = $buyposts['username'];
$buyamount = $buyposts['points'];
$hidden = $buyposts['hidden'];
$buyamounts = number_format($buyamount);

if($hidden == 'yes'){$type = 'yes';}else{$type = 'no';}


if($buyname == $username){
mysql_query("DELETE FROM buymoney WHERE id = '$moneyid'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 3.</font>');}

echo"<font color=white face=verdana size=1>You cancelled your offer!</font>"; mysql_query("UPDATE users SET money = (money + $pricetag) WHERE username = '$username'");}
elseif(!$moneyid){}
elseif($buyrows == '0'){die('<font color=white face=verdana size=1>Offer does not exist</font>');}
elseif($buyamount  > $points){echo"<font color=white face=verdana size=1>You dont have enough points!</font>";}
else{echo"<font color=white face=verdana size=1>You accepted the offer!</font>";
mysql_query("DELETE FROM buymoney WHERE id = '$moneyid'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 3.</font>');}

mysql_query("UPDATE users SET points = points - $buyamount WHERE ID = '$ida'");
mysql_query("UPDATE users SET money = money + $pricetag WHERE ID = '$ida'");
mysql_query("UPDATE users SET points = points + $buyamount WHERE username = '$buyname'");
$sendinfo = "\[b\]$username\[\/b\] bought your $\[b\]$pricetags\[\/b\] for \[b\]$buyamounts\[\/b\] points!";
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$buyname','$buyname','no','$userip','$sendinfo')");
mysql_query("INSERT INTO moneysent(username,amount,sent,ip,quicktrade)
VALUES ('$buyname','$pricetag','$username','$userip','$type')");
mysql_query("INSERT INTO pointssent(username,amount,sent,ip,quicktrade)
VALUES ('$username','$buyamount','$buyname','$userip','$type')");



mysql_query("UPDATE users SET notify = '1',notification = 'a_open$username a_closed$username a_slashbought your $$pricetags for $buyamounts points.' WHERE username = '$buyname'");


}}

elseif(isset($_POST['sellamount'])){

$tomeni =mysql_num_rows(mysql_query("SELECT * FROM buypoints WHERE username = '$usernameone'"));

if($sellamount == 0){}
elseif($tomeni >= '30'){echo"<font color=white face=verdana size=1>You can only put 30 offers up at one time!</font>";}
elseif($sell == 0){}
elseif($sellamount > $points){echo"<font color=white face=verdana size=1>You dont have enough points!</font>";}
else{$newtime = time()+86400;
if(mysql_real_escape_string($_POST['hidesell']) == '1'){$hidden = 'yes';}else{$hidden = 'no';}

if($sell > 99999999999){$sell = 99999999999;}

$per = ceil($sell / $sellamount);

mysql_query("UPDATE users SET points = points - $sellamount WHERE ID = '$ida' AND points >= '$sellamount'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 4.</font>');}


mysql_query("INSERT INTO buypoints(username,price,points,time,hidden,per)
VALUES ('$username','$sell','$sellamount','$newtime','$hidden','$per')");}}

elseif(isset($_POST['buyamount'])){
$tomenia =mysql_num_rows(mysql_query("SELECT * FROM buymoney WHERE username = '$usernameone'"));


if($buyamount == 0){}
elseif($tomenia >= '30'){echo"<font color=white face=verdana size=1>You can only put 30 offers up at one time!</font>";}
elseif($buy == 0){}
elseif($buy > $money){echo"<font color=white face=verdana size=1>You dont have enough money!</font>";}
else{$newtime = time()+86400;
if(mysql_real_escape_string($_POST['hidebuy']) == '1'){$hidden = 'yes';}else{$hidden = 'no';}
if($buy > 99999999999){$buy = 99999999999;}
$per = ceil($buy / $buyamount);
mysql_query("UPDATE users SET money = (money - $buy) WHERE ID = '$ida' AND money >= '$buy'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 5.</font>');}


mysql_query("INSERT INTO buymoney(username,price,points,time,hidden,per)
VALUES ('$username','$buy','$buyamount','$newtime','$hidden','$per')");}}

$casinoslist = mysql_query("SELECT * FROM buycasinos ORDER BY price ASC");
$pointslist = mysql_query("SELECT * FROM buypoints ORDER BY per ASC");
$moneylist = mysql_query("SELECT * FROM buymoney ORDER BY per DESC");

?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Quicktrade</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<br><br><form action="" method="post">
<font color=silver face=verdana size=2>Sell points:</font><br>
<font color=silver face=verdana size=1>Amount:</font><br><input type="text" name="sellamount" class="textbox"><br>
<font color=silver face=verdana size=1>Price:</font><br><input type="text" name="sell" class="textbox"><br>
<label for=view_source_cunt  style="cursor: pointer;"><font color=silver face=verdana size=1>Hide name:</font><input type="radio" name="hidesell" value="1" id=view_source_cunt></label><input type="submit" value="Sell" class="textbox"></form><br>
<table cellpadding=0 cellspacing=2 1 width=50% align="center"><form action="" method="post">
<tr><td width=100% bgcolor=#222222 NOWRAP align="center" colspan="5"><font color=silver face=verdana size=2>Buy Points</font></td></tr>
<tr><td colspan=2 bgcolor=#222222 NOWRAP align=center><font color=silver face=verdana size=1>Username:</font></td>
<td width=30% bgcolor=#222222 NOWRAP align=center><font color=silver face=verdana size=1>Amount:</font></td>
<td width=30% bgcolor=#222222 NOWRAP align=center><font color=silver face=verdana size=1>Price:</font></td>
<td width=10% bgcolor=#222222 NOWRAP align=center><font color=silver face=verdana size=1>Per point:</font></td></tr>
<? while($points = mysql_fetch_array($pointslist)){
$price = number_format($points['price']);
$name = $points['username'];
$id = $points['id'];
$amount = number_format($points['points']);
$hidden = $points['hidden'];
$perpoint = number_format($points[per]);

if(($name == $usernameone)&&($hidden == 'yes')){$itsyou = '<font color=khaki face=verdana size=1><b>*</b></font>';}else{$itsyou = '<font face=verdana size=1>&nbsp;</font>';}

if($rank < 100){if($hidden == 'yes'){$link = "#";  $name = "(Anonymous)";}else{$name = $name;$link = "viewprofile.php?username=$name";}}
else{$name = $name;$link = "viewprofile.php?username=$name";}

echo"<tr><td width=1% bgcolor=#333333 NOWRAP><input type=radio name=points value=$id></td>
<td width=30% bgcolor=#333333 NOWRAP>$itsyou<a href=$link>$name</a></td>
<td width=30% bgcolor=#333333 NOWRAP><font color=silver face=verdana size=1>&nbsp;$amount</font></td>
<td width=30% bgcolor=#333333 NOWRAP><font color=silver face=verdana size=1>&nbsp;$$price&nbsp;</font></td>
<td width=10% bgcolor=#333333 NOWRAP><font color=silver face=verdana size=1>&nbsp;$$perpoint&nbsp;</font></td></tr>";}?>
<tr><td width=100% colspan="5" align="right"><input type="submit" value="Buy" class="textbox"></td></tr>
</table>
</form><br>

<table cellpadding=0 cellspacing=2 width=50% align="center"><form action="" method="post">
<tr><td width=100% bgcolor=#222222 NOWRAP align="center" colspan="5"><font color=silver face=verdana size=2>Casinos</font></td></tr>
<tr><td colspan=2 bgcolor=#222222 NOWRAP align="center"><font color=silver face=verdana size=1>Owner:</font></td>
<td width=30% bgcolor=#222222 NOWRAP align="center"><font color=silver face=verdana size=1>Type:</font></td>
<td width=30% bgcolor=#222222 NOWRAP align="center"><font color=silver face=verdana size=1>Location:</font></td>
<td width=10% bgcolor=#222222 NOWRAP align="center"><font color=silver face=verdana size=1>Price:</font></td></tr>
<? while($casinos = mysql_fetch_array($casinoslist)){
$price = number_format($casinos['price']);
$owner = $casinos['username'];
$id = $casinos['id'];
$city = $casinos['city'];
$type = $casinos['type'];
if($type=='Bullets'){$type='Bullet Factory';}
echo"<tr><td width=1% bgcolor=#333333 NOWRAP><input type=radio name=casino value=$id></td>
<td width=30% bgcolor=#333333 NOWRAP><font face=verdana size=1>&nbsp;</font><a href=viewprofile.php?username=$owner>$owner</a></td>
<td width=30% bgcolor=#333333 NOWRAP><font color=silver face=verdana size=1>&nbsp;$type</font></td>
<td width=30% bgcolor=#333333 NOWRAP><font color=silver face=verdana size=1>&nbsp;$city</font></td>
<td width=10% bgcolor=#333333 NOWRAP><font color=silver face=verdana size=1>&nbsp;$price&nbsp;</font></td></tr>";}?>
<tr><td width=100% colspan="5" align="right"><input type="submit" value="Buy" class="textbox"></td></tr>
</table>
</form><br><form action="" method="post">
<font color=silver face=verdana size=2>Buy points:</font><br>
<font color=silver face=verdana size=1>Amount:</font><br><input type="text" name="buyamount" class="textbox"><br><font color=silver face=verdana size=1>Money:</font><br><input type="text" name="buyprice" class="textbox"><br><label for=view_source_cunt2  style="cursor: pointer;"><font color=silver face=verdana size=1>Hide name:</font><input type="radio" name="hidebuy" value="1" id=view_source_cunt2></label><input type="submit" value="Buy" class="textbox"></form><br>
<table cellpadding=0 cellspacing=2 width=50% align="center"><form action="" method="post">
<tr><td width=100% bgcolor=#222222 NOWRAP align="center" colspan="5"><font color=silver face=verdana size=2>Buy Money</font></td></tr>
<tr><td colspan=2 bgcolor=#222222 NOWRAP align="center"><font color=silver face=verdana size=1>Username</b>:</font></td>
<td width=30% bgcolor=#222222 NOWRAP align="center"><font color=silver face=verdana size=1>Amount:</font></td>
<td width=30% bgcolor=#222222 NOWRAP align="center"><font color=silver face=verdana size=1>Price:</font></td>
<td width=10% bgcolor=#222222 NOWRAP align="center"><font color=silver face=verdana size=1>Per point:</font></td></tr>
<? while($moneys = mysql_fetch_array($moneylist)){
$price = number_format($moneys['price']);
$name = $moneys['username'];
$id = $moneys['id'];
$amount = number_format($moneys['points']);
$hiddens = $moneys['hidden'];
if(($name == $usernameone)&&($hiddens == 'yes')){$itsyous = '<font color=khaki face=verdana size=1><b>*</b></font>';}else{$itsyous = '<font face=verdana size=1>&nbsp;</font>';}

if($rank < 100){if($hiddens == 'yes'){$link = "#";  $name = "(Anonymous)";}else{$name = $name;$link = "viewprofile.php?username=$name";}}else{$name = $name;$link = "viewprofile.php?username=$name";}
$perpoint = number_format($moneys[per]);

echo"<tr><td width=1% bgcolor=#333333 NOWRAP><input type=radio name=money value=$id></td>
<td width=30% bgcolor=#333333 NOWRAP>$itsyous<a href=$link>$name</a></td>
<td width=30% bgcolor=#333333 NOWRAP><font color=silver face=verdana size=1>&nbsp;$amount</font></td>
<td width=30% bgcolor=#333333 NOWRAP><font color=silver face=verdana size=1>&nbsp;$$price&nbsp;</font></td>
<td width=10% bgcolor=#333333 NOWRAP><font color=silver face=verdana size=1>&nbsp;$$perpoint&nbsp;</font></td></tr>";}?>
<tr><td width=100% colspan="5" align="right"><input type="submit" value="Buy" class="textbox"></td></tr>
</table>
</form><br><br>
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