<? include 'included.php';
$tdf = rand(0,10);

if($tdf == '1'){
$deletetopicssql = mysql_query("SELECT id FROM forumposts WHERE type = 'drugs' ORDER BY id DESC LIMIT 15,50");
while($deletetopics = mysql_fetch_array($deletetopicssql))
{$dtopicid = $deletetopics['id'];
$deleted = mysql_query("DELETE FROM forumposts WHERE id = '$dtopicid'");}}

$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$poster = mysql_real_escape_string($_GET['deletepost']);
$verposta = mysql_real_escape_string($_POST['ver']);
$choosea = mysql_real_escape_string($_POST['choose']);
$unitsonea = mysql_real_escape_string($_POST['units1']);
$unitstwoa = mysql_real_escape_string($_POST['units2']);
$unitsthreea = mysql_real_escape_string($_POST['units3']);
$unitsfoura = mysql_real_escape_string($_POST['units4']);
$deletepost = preg_replace($saturated,"",$poster);
$choose = preg_replace($saturated,"",$choosea);
$unitsone = preg_replace($saturated,"",$unitsonea);
$unitstwo = preg_replace($saturated,"",$unitstwoa);
$unitsthree = preg_replace($saturated,"",$unitsthreea);
$unitsfour = preg_replace($saturated,"",$unitsfoura);
$verpost = preg_replace($saturate,"",$verposta);

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
function emotion(em) { document.smiley.newpost.value=document.smiley.newpost.value+em;}
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


$enter = $ent;
if($enter > '0'){die('<font color=white face=verdana size=1>Entertainers cannot view this page</font>');}


$getuserinfoarray = $statustesttwo;
$rankid = $getuserinfoarray['rankid'];
$ID = $getuserinfoarray['ID'];
$ver = $getuserinfoarray['ver'];
$location = $getuserinfoarray['location'];
$weed = $getuserinfoarray['weed'];
$ecstasy = $getuserinfoarray['ecstasy'];
$heroin = $getuserinfoarray['heroin'];
$cocaine = $getuserinfoarray['cocaine'];
$money = $getuserinfoarray['money'];
$tony = $getuserinfoarray['tony'];
$mish = $getuserinfoarray['mish'];
$drugs = $weed + $ecstasy + $heroin + $cocaine;


if($rankid == '1'){ $max = 0;}
elseif($rankid == '2'){ $max = 15;}
elseif($rankid == '3'){ $max = 31;}
elseif($rankid == '4'){ $max = 66;}
elseif($rankid == '5'){ $max = 129;}
elseif($rankid == '6'){ $max = 230;}
elseif($rankid == '7'){ $max = 357;}
elseif($rankid == '8'){ $max = 523;}
elseif($rankid == '9'){ $max = 741;}
elseif($rankid == '10'){ $max = 978;}
elseif($rankid == '11'){ $max = 1233;}
elseif($rankid == '12'){ $max = 1657;}
elseif($rankid == '13'){ $max = 2000;}
elseif($rankid == '14'){ $max = 2487;}
elseif($rankid == '15'){ $max = 3210;}
elseif($rankid == '16'){ $max = 4001;}
elseif($rankid == '17'){ $max = 4849;}
elseif($rankid == '18'){ $max = 6011;}
elseif($rankid == '19'){ $max = 8114;}
elseif($rankid == '20'){ $max = 9578;}
elseif($rankid == '21'){ $max = 11252;}
elseif($rankid >= '22'){ $max = 12419;}

if($drugs > $max){die('<font color=white face=verdana size=1>Error, contact admin and say you saw error MAX!</font>');}

if($drugs < 0){die('<font color=white face=verdana size=1>Error, contact admin and say you saw error MINUS!</font>');}

$maxformat = number_format($max);

if($location == 'Las Vegas'){$weedprice = '552';$heroinprice = '1210';$ecstasyprice = '5170';$cocaineprice = '9996';}
elseif($location == 'Washington'){$weedprice = '525';$heroinprice = '1280';$ecstasyprice = '5145';$cocaineprice = '9940';}
elseif($location == 'Los Angeles'){$weedprice = '530';$heroinprice = '1258';$ecstasyprice = '5110';$cocaineprice = '9937';}
elseif($location == 'New York'){$weedprice = '530';$heroinprice = '1282';$ecstasyprice = '5129';$cocaineprice = '9928';}
elseif($location == 'Louisiana'){$weedprice = '525';$heroinprice = '1265';$ecstasyprice = '5130';$cocaineprice = '9900';}
elseif($location == 'Texas'){$weedprice = '534';$heroinprice = '1260';$ecstasyprice = '5150';$cocaineprice = '9915';}
elseif($location == 'Ohio'){$weedprice = '537';$heroinprice = '1253';$ecstasyprice = '5139';$cocaineprice = '9915';}
elseif($location == 'California'){$weedprice = '534';$heroinprice = '1260';$ecstasyprice = '5129';$cocaineprice = '9900';}


if(isset($_POST['deleteall'])) { 
if(($rankid < '25')&&($senior < '0')){}
else{mysql_query("DELETE FROM forumposts WHERE type = 'drugs'");
echo"<font color=white face=verdana size=1>Posts deleted!</font>";}}

$mutedusernamesql = mysql_query("SELECT * FROM muted WHERE  username = '$gangsterusername'")or die(mysql_error());
$mutedusernamerows = mysql_num_rows($mutedusernamesql);
$mutedusernamearray = mysql_fetch_array($mutedusernamesql);
$mutedusernameone = $mutedusernamearray['username'];
$mutedipone = $mutedusernamearray['ip'];

$mutedipsql = mysql_query("SELECT * FROM muted WHERE ip = '$userip'")or die(mysql_error());
$mutediprows  = mysql_num_rows($mutedipsql);
$mutediparray = mysql_fetch_array($mutedipsql);
$mutedusernametwo = $mutediparray['username'];
$mutediptwo = $mutediparray['ip'];


$newpostraw = mysql_real_escape_string($_POST['newpost']);
$newpost = htmlentities($newpostraw, ENT_QUOTES);
if(isset($_POST['dopost'])) { 
if(!$newpost){}
elseif($mutedusernamerows > '0'){die("<font color=white face=verdana size=1>Username: <b>$mutedusernameone</b> and IP: <b>$mutedipone</b> have been muted! Contact a member of <b>The Society</b> to be unmuted!");}
elseif($mutediprows > '0'){die("<font color=white face=verdana size=1>Username: <b>$mutedusernametwo</b> and IP: <b>$mutediptwo</b> have been muted! Contact a member of <b>The Society</b> to be unmuted!");}
else{
mysql_query("INSERT INTO forumposts(username,topicid,ip,type,post,rankid)
VALUES ('$gangsterusername',' ','$userip','drugs','$newpost','$myrank')");
mysql_query("UPDATE users SET posts = (posts + 1) WHERE ID = '$ida'");}}

if($rankid == '100'){
if(isset($_GET['deletepost'])) { 
mysql_query("DELETE FROM forumposts WHERE type = 'drugs' AND id = '$deletepost'");
}
}

if(isset($_POST['reset'])){echo"<font color=white face=verdana size=1>Your drug running profit has been reset to $<b>0</b>!</font>";
mysql_query("UPDATE users SET profit = '0' WHERE username = '$usernameone'");}



if(isset($_POST['ver'])){
if(strtoupper($verpost) != $ver){die('<font color=white face=verdana size=1>Error, security code incorrect</font>');}
else{

if(isset($_POST['buy'])){

if($choose == '1'){
$add = $unitsone+$drugs;
$cost = $weedprice * $unitsone;
$unitsoneformat = number_format($unitsone);
if($add > $max){echo"<font color=white face=verdana size=1>You can only carry $maxformat units at once at your rank!</font>";}
elseif($cost > $money){echo"<font color=white face=verdana size=1>You dont have enough money!</font>";}
else{
mysql_query("UPDATE users SET weed = (weed + $unitsone), money = (money - $cost) WHERE ID = '$ida' AND (weed + cocaine + heroin + ecstasy + $unitsone) <= '$max' AND money >= '$cost'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error, try again.</font>');}

mysql_query("UPDATE users SET profit = (profit - $cost) WHERE ID = '$ida'");






echo"<font color=white face=verdana size=1>You bought <b>$unitsoneformat</b> units of Marijuana</font>";
$alphanum = "ABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
$randver = substr(str_shuffle($alphanum), 0, 2);
mysql_query("UPDATE users SET ver = '$randver' WHERE ID = '$ida'");

}
}

elseif($choose == '2'){
$add = $unitstwo+$drugs;
$cost = $heroinprice * $unitstwo;
$unitstwoformat = number_format($unitstwo);
if($add > $max){echo"<font color=white face=verdana size=1>You can only carry $maxformat units at once at your rank!</font>";}
elseif($cost > $money){echo"<font color=white face=verdana size=1>You dont have enough money!</font>";}
else{

mysql_query("UPDATE users SET heroin = (heroin + $unitstwo), money = (money - $cost) WHERE ID = '$ida' AND (weed + cocaine + heroin + ecstasy + $unitstwo) <= '$max' AND money >= '$cost'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error, try again.</font>');}

if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 2.</font>');}
mysql_query("UPDATE users SET profit = (profit - $cost) WHERE ID= '$ida'");


echo"<font color=white face=verdana size=1>You bought <b>$unitstwoformat</b> units of Heroin</font>";
$alphanum = "ABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
$randver = substr(str_shuffle($alphanum), 0, 2);
mysql_query("UPDATE users SET ver = '$randver' WHERE ID = '$ida'");}
}

elseif($choose == '3'){
$add = $unitsthree+$drugs;
$cost = $ecstasyprice * $unitsthree;
$unitsthreeformat = number_format($unitsthree);
if($add > $max){echo"<font color=white face=verdana size=1>You can only carry $maxformat units at once at your rank!</font>";}
elseif($cost > $money){echo"<font color=white face=verdana size=1>You dont have enough money!</font>";}
else{
mysql_query("UPDATE users SET ecstasy = (ecstasy + $unitsthree), money = (money - $cost) WHERE ID = '$ida' AND (weed + cocaine + heroin + ecstasy + $unitsthree) <= '$max' AND money >= '$cost'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error, try again.</font>');}

mysql_query("UPDATE users SET profit = (profit - $cost) WHERE ID = '$ida'");




echo"<font color=white face=verdana size=1>You bought <b>$unitsthreeformat</b> units of Ecstasy</font>";
$alphanum = "ABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
$randver = substr(str_shuffle($alphanum), 0, 2);
mysql_query("UPDATE users SET ver = '$randver' WHERE ID = '$ida'");}
}

elseif($choose == '4'){
$add = $unitsfour+$drugs;
$cost = $cocaineprice * $unitsfour;
$unitsfourformat = number_format($unitsfour);
if($add > $max){echo"<font color=white face=verdana size=1>You can only carry $maxformat units at once at your rank!</font>";}
elseif($cost > $money){echo"<font color=white face=verdana size=1>You dont have enough money!</font>";}
else{
mysql_query("UPDATE users SET cocaine = (cocaine + $unitsfour), money = (money - $cost) WHERE ID = '$ida' AND (weed + cocaine + heroin + ecstasy + $unitsfour) <= '$max' AND money >= '$cost'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error, try again.</font>');}

mysql_query("UPDATE users SET profit = (profit - $cost) WHERE ID = '$ida'");





echo"<font color=white face=verdana size=1>You bought <b>$unitsfourformat</b> units of Cocaine</font>";
$alphanum = "ABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
$randver = substr(str_shuffle($alphanum), 0, 2);
mysql_query("UPDATE users SET ver = '$randver' WHERE ID = '$ida'");}
}

}


elseif(isset($_POST['sell'])){

if($choose == '1'){
$cost = $weedprice * $unitsone;
$unitsoneformat = number_format($unitsone);
if($unitsone > $weed){echo"<font color=white face=verdana size=1>You dont have that much Marijuana!</font>";}
else{
mysql_query("UPDATE users SET weed = (weed - $unitsone) WHERE ID = '$ida' AND weed >= '$unitsone'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 5.</font>');}
mysql_query("UPDATE users SET profit = (profit + $cost) WHERE ID = '$ida'");

if(($tony == '1')&&($mish == '0')&&($location = 'Washington')){
mysql_query("UPDATE users SET mish = '1' WHERE ID = '$ida'");
mysql_query("UPDATE users SET money = (money + 2250000) WHERE ID = '$ida'");
$sendinfo = "Thanks for the help yet again bro ;).\[br\]Drugs has to be one of the best ways to make money ;).\[br\]You sent $2,250,000 to $gangsterusername!";
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$gangsterusername','Reausaw ','yes','$userip','$sendinfo')");
mysql_query("INSERT INTO moneysent(username,amount,sent,ip)
VALUES ('Reausaw ','2250000','$gangsterusername','$userip')");

}




mysql_query("UPDATE users SET money = (money + $cost) WHERE ID = '$ida'");
echo"<font color=white face=verdana size=1>You sold <b>$unitsoneformat</b> units of Marijuana</font>";
$alphanum = "ABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
$randver = substr(str_shuffle($alphanum), 0, 2);
mysql_query("UPDATE users SET ver = '$randver' WHERE ID = '$ida'");}
}

elseif($choose == '2'){
$cost = $heroinprice * $unitstwo;
$unitstwoformat = number_format($unitstwo);
if($unitstwo > $heroin){echo"<font color=white face=verdana size=1>You dont have that much Heroin!</font>";}
else{
mysql_query("UPDATE users SET heroin = (heroin - $unitstwo) WHERE ID = '$ida' AND heroin >= '$unitstwo'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 6.</font>');}
mysql_query("UPDATE users SET profit = (profit + $cost) WHERE ID = '$ida'");

mysql_query("UPDATE users SET money = (money + $cost) WHERE ID = '$ida'");
echo"<font color=white face=verdana size=1>You sold <b>$unitstwoformat</b> units of Heroin</font>";
$alphanum = "ABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
$randver = substr(str_shuffle($alphanum), 0, 2);
mysql_query("UPDATE users SET ver = '$randver' WHERE ID = '$ida'");}
}

elseif($choose == '3'){
$cost = $ecstasyprice * $unitsthree;
$unitsthreeformat = number_format($unitsthree);
if($unitsthree > $ecstasy){echo"<font color=white face=verdana size=1>You dont have that much Ecstasy!</font>";}
else{
mysql_query("UPDATE users SET ecstasy = (ecstasy - $unitsthree)  WHERE ID = '$ida' AND ecstasy >= '$unitsthree'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 7.</font>');}
mysql_query("UPDATE users SET profit = (profit + $cost) WHERE ID = '$ida'");

mysql_query("UPDATE users SET money = (money + $cost) WHERE ID = '$ida'");
echo"<font color=white face=verdana size=1>You sold <b>$unitsthreeformat</b> units of Ecstasy</font>";
$alphanum = "ABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
$randver = substr(str_shuffle($alphanum), 0, 2);
mysql_query("UPDATE users SET ver = '$randver' WHERE ID = '$ida'");}
}

elseif($choose == '4'){
$cost = $cocaineprice * $unitsfour;
$unitsfourformat = number_format($unitsfour);
if($unitsfour > $cocaine){echo"<font color=white face=verdana size=1>You dont have that much Cocaine!</font>";}
else{
mysql_query("UPDATE users SET cocaine = (cocaine - $unitsfour) WHERE ID = '$ida' AND cocaine >= '$unitsfour'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 8.</font>');}
mysql_query("UPDATE users SET profit = (profit + $cost) WHERE ID = '$ida'");

mysql_query("UPDATE users SET money = (money + $cost) WHERE ID = '$ida'");
echo"<font color=white face=verdana size=1>You sold <b>$unitsfourformat</b> units of Cocaine</font>";
$alphanum = "ABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
$randver = substr(str_shuffle($alphanum), 0, 2);
mysql_query("UPDATE users SET ver = '$randver' WHERE ID = '$ida'");}
}

}










}}


$getuserinfosql = mysql_query("SELECT * FROM users WHERE ID = '$ida'");
$getuserinfoarray = mysql_fetch_array($getuserinfosql);
$rankid = $getuserinfoarray['rankid'];
$ver = $getuserinfoarray['ver'];
$weed = $getuserinfoarray['weed'];
$ecstasy = $getuserinfoarray['ecstasy'];
$heroin = $getuserinfoarray['heroin'];
$cocaine = $getuserinfoarray['cocaine'];
$money = $getuserinfoarray['money'];
$profit = $getuserinfoarray['profit'];
$drugs = $weed + $ecstasy + $heroin + $cocaine;



?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Drugs</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<font color=white face=verdana size=1>For help with drugs click <a href=viewtopic.php?topicid=62256>(HERE)</a>  As your rank increases, the more units of drugs you can carry.</font><br>
<br><br>


<table align="center" width="55%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td  background="/more/top.png" NOWRAP align=center><font color="white" size="1" face="verdana">You have: <b><?echo number_format($drugs);?></b> units on hand</font></td>
<td width="8"  background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png"></td>
<td background="/more/crossbg.png">


<table cellpadding=0 cellspacing=1 width=100% align="center">

<tr><td width=50% bgcolor=#222222 NOWRAP align=center><font color=white face=verdana size=2>Drug:</font></td><td width=50% bgcolor=#222222 NOWRAP align=center><font color=white face=verdana size=2>Price:</font></td></tr>
<tr><td width=50% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>&nbsp;Marijuana</font></td><td width=50% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1>&nbsp;$<b><?echo number_format($weedprice);?></b></font></td></tr>
<tr><td width=50% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>&nbsp;Heroin</font></td><td width=50% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1>&nbsp;$<b><?echo number_format($heroinprice);?></b></font></td></tr>
<tr><td width=50% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>&nbsp;Ecstasy</font></td><td width=50% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1>&nbsp;$<b><?echo number_format($ecstasyprice);?></b></font></td></tr>
<tr><td width=50% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>&nbsp;Cocaine</font></td><td width=50% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1>&nbsp;$<b><?echo number_format($cocaineprice);?></b></font></td></tr>
<tr><td width=50% bgcolor=<?if($profit <= '0'){echo'maroon';}else{echo'#617C58';}?> NOWRAP><font color=white face=verdana size=1>&nbsp;My drug running profit: $<b><?echo number_format($profit);?></b></font></td><td width=50% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>&nbsp;Max units you can hold: <b><?echo $maxformat;?></b></font></td></tr>
</table></td>
<td width="8" background="/more/rightb.png"></td>
</tr>


<tr>
<td width="8" height="9" background="/more/bottomleft.png"></td>
<td height="9" background="/more/bottom.png"></td>
<td width="8" height="9" background="/more/bottomright.png"></td>
</tr>
</table>
<br><center><form method=post><input type=submit name=reset value="Reset my profit" class=textbox></form></center>




<table align="center" width="35%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td  background="/more/top.png" NOWRAP align=center><font color="white" size="1" face="verdana">Buy/Sell</font></td>
<td width="8"  background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png"></td>
<td background="/more/crossbg.png">


<table cellpadding=0 cellspacing=1 width=100% align="center">
<form method="post" name="form1">
<tr><td width=33% bgcolor=#222222 NOWRAP align=center><font color=white face=verdana size=2>&nbsp;Drug:</font></td><td width=33% bgcolor=#222222 NOWRAP align=center><font color=white face=verdana size=2>On hand:</font></td><td width=33% bgcolor=#222222 NOWRAP align=center><font color=white face=verdana size=2>Units:</font></td></tr>
<tr><td width=33% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><input type=radio <?if($choose==1){echo'CHECKED';}?> name=choose value=1>Marijuana</font></td><td width=33% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1&nbsp;>&nbsp;<?echo number_format($weed);?> units</font></td><td width=33% bgcolor=#555555 NOWRAP><input type=textbox class=textbox value="<?echo$unitsone;?>" name=units1></td></tr>
<tr><td width=33% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><input type=radio <?if($choose==2){echo'CHECKED';}?> name=choose value=2>Heroin</font></td><td width=33% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>&nbsp;<?echo number_format($heroin);?> units</font></td><td width=33% bgcolor=#555555 NOWRAP><input type=textbox class=textbox value="<?echo$unitstwo;?>" name=units2></td></tr>
<tr><td width=33% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><input type=radio <?if($choose==3){echo'CHECKED';}?> name=choose value=3>Ecstasy</font></td><td width=33% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>&nbsp;<?echo number_format($ecstasy);?> units</font></td><td width=33% bgcolor=#555555 NOWRAP><input type=textbox class=textbox value="<?echo$unitsthree;?>" name=units3></td></tr>
<tr><td width=33% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><input type=radio <?if($choose==4){echo'CHECKED';}?> name=choose value=4>Cocaine</font></td><td width=33% bgcolor=#444444 NOWRAP><font color=white face=verdana size=1>&nbsp;<?echo number_format($cocaine);?> units</font></td><td width=33% bgcolor=#555555 NOWRAP><input type=textbox class=textbox value="<?echo$unitsfour;?>" name=units4></td></tr>
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
<table align=center width=20%><tr><td width=33%  NOWRAP><font color=white face=verdana size=1>&nbsp;Security code</font></td><td width=33%  NOWRAP><input type=textbox name=ver class=textbox style=width:75;></td><td width=33% NOWRAP><img id="1" src="vercode.php?id=<?echo$ID;$ty = rand(0,999999);echo"&x=$ty";?>"></td></tr>
<tr><td colspan="3" align=center><input type=submit class=textbox name=buy value="Buy"><input type=submit class=textbox name=sell value="Sell"></td></tr>
</table></form>


<?if(($rankid >= '25')||($senior > '0')){echo"<br><br><center><form method=post><input type=submit name=deleteall value='Delete Posts' class=textbox></center><br></form><br>";}?>
</td>
<td width="8" background="/more/rightb.png" NOWRAP></td>
</tr>

<tr>
<td width="8" height="9" background="/more/bottomleft.png"></td>
<td height="9" background="/more/bottom.png"></td>
<td width="8" height="9" background="/more/bottomright.png"></td>
</tr>
</table>

<?php

$getposts = mysql_query("SELECT * FROM forumposts WHERE type = 'drugs' ORDER BY id DESC");

while($getpostsarray = mysql_fetch_array($getposts))
{
$postname = $getpostsarray['username'];
$postid = $getpostsarray['id'];
$postinforawa = html_entity_decode($getpostsarray['post'], ENT_NOQUOTES);
$postinforawb = $postinforawa;

$zpattern[a] = "<";
$zpattern[b] = ">";

$zreplace[a] = "&lt;";
$zreplace[b] = "&gt;";
$i = 0;
$while = mysql_query("SELECT * FROM blacklist");
while ($all = mysql_fetch_array($while)){
$i = $i + 1;
$zpattern[$i] = $all['word'];
$zreplace[$i] = "mafiasociety";}

$postinforawz = str_replace($zpattern,$zreplace,$postinforawb);

$epattern[1] = "/\[b\](.*?)\[\/b\]/is";
$epattern[2] = "/\[u\](.*?)\[\/u\]/is";
$epattern[3] = "/\[i\](.*?)\[\/i\]/is";
$epattern[4] = "/\[center\](.*?)\[\/center\]/is";
$epattern[5] = "/\[color=(.*?)\](.*?)\[\/color\]/is";
$epattern[7] = "/\[font=(.*?)\](.*?)\[\/font\]/is";
$epattern[8] = "/\[br\]/is";
$epattern[10] = "/\[quote\](.*?)\[\/quote\]/is";
$epattern[11] = "/\[left\](.*?)\[\/left\]/is";
$epattern[12] = "/\[right\](.*?)\[\/right\]/is";
$epattern[13] = "/\[s\](.*?)\[\/s\]/is";

$ereplace[1] = "<b>$1</b>";
$ereplace[2] = "<u>$1</u>";
$ereplace[3] = "<i>$1</i>";
$ereplace[4] = "<center>$1</center>";
$ereplace[5] = "<font color=\"$1\">$2</font>";
$ereplace[7] = "<font face=\"$1\">$2</font>";
$ereplace[8] = "<br>";
$ereplace[10] = "<blockquote><b>$1</b></blockquote>";
$ereplace[11] = "<div align=\"left\">$1</div>";
$ereplace[12] = "<div align=\"right\">$1</div>";
$ereplace[13] = "<s>$1</s>";

$postinforawb = preg_replace($epattern,$ereplace,$postinforawz);

$fpattern[1] = ":arrow:";
$fpattern[2] = ":D";
$fpattern[3] = ":S";
$fpattern[4] = "8)";
$fpattern[5] = ":cry:";
$fpattern[6] = "8|";
$fpattern[7] = ":evil:";
$fpattern[8] = ":!:";
$fpattern[9] = ":idea:";
$fpattern[10] = ":lol:";
$fpattern[11] = ":mad:";
$fpattern[12] = ":?:";
$fpattern[13] = ":redface:";
$fpattern[14] = ":rolleyes:";
$fpattern[15] = ":(";
$fpattern[16] = ":)";
$fpattern[17] = ":o";
$fpattern[18] = ":tdn:";
$fpattern[19] = ":P";
$fpattern[20] = ":tup:";
$fpattern[21] = ":twisted:";
$fpattern[22] = ";)";

$freplace[1] = '<img src=/more/smiles/arrow.gif>';
$freplace[2] = '<img src=/more/smiles/biggrin.gif>';
$freplace[3] = '<img src=/more/smiles/confused.gif>';
$freplace[4] = '<img src=/more/smiles/cool.gif>';
$freplace[5] = '<img src=/more/smiles/cry.gif>';
$freplace[6] = '<img src=/more/smiles/eek.gif>';
$freplace[7] = '<img src=/more/smiles/evil.gif>';
$freplace[8] = '<img src=/more/smiles/exclaim.gif>';
$freplace[9] = '<img src=/more/smiles/idea.gif>';
$freplace[10] = '<img src=/more/smiles/lol.gif>';
$freplace[11] = '<img src=/more/smiles/mad.gif>';
$freplace[12] = '<img src=/more/smiles/question.gif>';
$freplace[13] = '<img src=/more/smiles/redface.gif>';
$freplace[14] = '<img src=/more/smiles/rolleyes.gif>';
$freplace[15] = '<img src=/more/smiles/sad.gif>';
$freplace[16] = '<img src=/more/smiles/smile.gif>';
$freplace[17] = '<img src=/more/smiles/surprised.gif>';
$freplace[18] = '<img src=/more/smiles/tdown.gif>';
$freplace[19] = '<img src=/more/smiles/toungue.gif>';
$freplace[20] = '<img src=/more/smiles/tup.gif>';
$freplace[21] = '<img src=/more/smiles/twisted.gif>';
$freplace[22] = '<img src=/more/smiles/wink.gif>';

$postinfo = str_replace($fpattern, $freplace, $postinforawb);

$rankcolor = $getpostsarray['rankid'];

if($rankcolor == '100'){$color = "<font color=red face=verdana size=1><b>$postname</b></font>";} 
elseif($rankcolor == '75'){$color = "<font color=#00ccff face=verdana size=1><b>$postname</b></font>";} 
elseif($rankcolor == '50'){$color = "<font color=blue face=verdana size=1><b>$postname</b></font>";} 
else{$color = "<font color=#333333 face=verdana size=1>$postname</font>";} 
?>
<table align=center width=100% cellpadding=0 cellspacing=0><tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP><a href=viewprofile.php?username=<? echo $postname?>><? echo $color; ?></a><? if($rankid == '100'){echo"<a href=drugs.php?deletepost=$postid><font color=white face=verdana size=1> (Delete)</font></a>";}?></td><td width=8 height=22 background=/more/topright.png></td></tr><tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>

<? if($countthree > '20'){echo"This user tried to post more than 20 smilies, this is <b>NOT</b> allowed";
}else{echo nl2br($postinfo);} ?>

</font><br></td><td width=8 background=/more/rightb.png NOWRAP></td></tr><tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr></table>
<?

}
?>

<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<center><form action="" method="post" name="smiley"><font color="white" face="verdana" size="1">Post comment</font><br><textarea name="newpost" cols="42" rows="11" class="textbox" id ="newpost">
</textarea><br><a onClick="emotion(':arrow:')" style="cursor: pointer;"><img src="/more/smiles/arrow.gif" border=0></a><a onClick="emotion(':D')" style="cursor: pointer;"><img src="/more/smiles/biggrin.gif" border=0></a><a onClick="emotion(':S')" style="cursor: pointer;"><img src="/more/smiles/confused.gif" border=0></a><a onClick="emotion(':cry:')" style="cursor: pointer;"><img src="/more/smiles/cry.gif" border=0></a><a onClick="emotion('8)')" style="cursor: pointer;"><img src="/more/smiles/cool.gif" border=0></a><a onClick="emotion('8|')" style="cursor: pointer;"><img src="/more/smiles/eek.gif" border=0></a><a onClick="emotion(':evil:')" style="cursor: pointer;"><img src="/more/smiles/evil.gif" border=0></a><a onClick="emotion(':!:')" style="cursor: pointer;"><img src="/more/smiles/exclaim.gif" border=0></a><a onClick="emotion(':idea:')" style="cursor: pointer;"><img src="/more/smiles/idea.gif" border=0></a><a onClick="emotion(':lol:')" style="cursor: pointer;"><img src="/more/smiles/lol.gif" border=0></a><a onClick="emotion(':mad:')" style="cursor: pointer;"><img src="/more/smiles/mad.gif" border=0></a><a onClick="emotion(':?:')" style="cursor: pointer;"><img src="/more/smiles/question.gif" border=0></a><a onClick="emotion(':redface:')" style="cursor: pointer;"><img src="/more/smiles/redface.gif" border=0></a><a onClick="emotion(':rolleyes:')" style="cursor: pointer;"><img src="/more/smiles/rolleyes.gif" border=0></a><a onClick="emotion(':(')" style="cursor: pointer;"><img src="/more/smiles/sad.gif" border=0></a><a onClick="emotion(':)')" style="cursor: pointer;"><img src="/more/smiles/smile.gif" border=0></a><a onClick="emotion(':o')" style="cursor: pointer;"><img src="/more/smiles/surprised.gif" border=0></a><a onClick="emotion(':P')" style="cursor: pointer;"><img src="/more/smiles/toungue.gif" border=0></a><a onClick="emotion(':twisted:')" style="cursor: pointer;"><img src="/more/smiles/twisted.gif" border=0></a><a onClick="emotion(';)')" style="cursor: pointer;"><img src="/more/smiles/wink.gif" border=0></a><a onClick="emotion(':tdn:')" style="cursor: pointer;"><img src="/more/smiles/tdown.gif" border=0></a><a onClick="emotion(':tup:')" style="cursor: pointer;"><img src="/more/smiles/tup.gif" border=0></a><br>
<input type ="submit" value="Post comment" class="textbox" name="dopost"></form></center>

</td>
<td width="8" background="/more/rightb.png" NOWRAP></td>
</tr>
</td>

<tr>
<td width="8" height="9" background="/more/bottomleft.png"></td>
<td height="9" background="/more/bottom.png"></td>
<td width="8" height="9" background="/more/bottomright.png"></td>
</tr>
</table>
</td>
<td width="250" valign="top">
<?
$statustesttwo = $getuserinfoarray ;?>
<? include 'rightmenu.php'; ?>
</td>
</tr>
</table>

</body></html>