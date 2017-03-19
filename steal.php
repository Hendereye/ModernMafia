<? include 'included.php';?>
<?
$time = time();
$times = $time + 180;
$jailtime = $time + 80;
$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$vera = $_POST['ver'];
$verpost = preg_replace($saturate,"",$vera);
$getida = $_GET['dropid'];
$getid = preg_replace($saturated,"",$getida);
$gangsterusername = $usernameone;
$jailtest = mysql_query("SELECT username FROM jail WHERE username  = '$gangsterusername'");
$jailtester = mysql_num_rows($jailtest);
if($jailtester != '0'){$ffs = '1'; die(include 'jail.php'); }

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
<td width="66%">
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
$reward = $getuserinfoarray['reward'];
$steal = $getuserinfoarray['steal'];
$rank = $getuserinfoarray['rankid'];
$rankup = $getuserinfoarray['rankup'];
$ID = $getuserinfoarray['ID'];
$stealtime = $steal - $time;
$ver = $getuserinfoarray['ver1'];
$input = $getuserinfoarray['stealinput'];
if($stealtime <= 0){$timeleft = "<b>Available</b>";}else{$timeleft = $stealtime;}

$stealbutton = ceil($time / 200);
$hidden = ceil($time / 2500);
$box = ceil($time / 2000);


$timea = time();



$inputrand = mt_rand(0,3);
if($inputrand == '0'){$newinput = 1;}



if(isset($_POST["$stealbutton"])){






if($stealtime > '0'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white size=1 face=verdana>Please wait $stealtime seconds!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
else{
mysql_query("UPDATE users SET steal = $times WHERE ID = '$ida' AND steal <= '$time'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error.</font>');}

$rand = mt_rand(0,14);
$car = mt_rand(0,1064);
$cardamagea = mt_rand(0,19);
if($rand < 2){
mysql_query("INSERT INTO jail(username,time,reward)
VALUES ('$gangsterusername','$jailtime','$reward')");

echo('<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><center><font color=white size=1 face=verdana><br>You got caught! You are now in <b>jail</b>!</font></center><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>'); $stopit = 1;}
if($stopit != '1'){

if($rank == '1'){ $update = '121';$newrank = 'Citizen';}
elseif($rank == '2'){ $update = '45';$newrank = 'Wise Guy';}
elseif($rank == '3'){ $update = '28';$newrank = 'Thug';}
elseif($rank == '4'){ $update = '12';$newrank = 'Respected Thug';}
elseif($rank == '5'){ $update = '8.5';$newrank = 'Mobster';}
elseif($rank == '6'){ $update = '6.5';$newrank = 'Respected Mobster';}
elseif($rank == '7'){ $update = '2.65';$newrank = 'Assassin';}
elseif($rank == '8'){ $update = '2.2';$newrank = 'Respected Assassin';}
elseif($rank == '9'){ $update = '0.95';$newrank = 'Mafioso';}
elseif($rank == '10'){ $update = '0.69';$newrank = 'Respected Mafioso';}
elseif($rank == '11'){ $update = '0.53';$newrank = 'Underboss';}
elseif($rank == '12'){ $update = '0.45';$newrank = 'Respected Underboss';}
elseif($rank == '13'){ $update = '0.41';$newrank = 'Boss';}
elseif($rank == '14'){ $update = '0.4';$newrank = 'Respected Boss';}
elseif($rank == '15'){ $update = '0.33';$newrank = 'Godfather';}
elseif($rank == '16'){ $update = '0.28';$newrank = 'Respected Godfather';}
elseif($rank == '17'){ $update = '0.23';$newrank = 'Gangster';}
elseif($rank == '18'){ $update = '0.156';$newrank = 'Respected Gangster';}
elseif($rank == '19'){ $update = '0.07';$newrank = 'Don';}
elseif($rank == '20'){ $update = '0.06';$newrank = 'Respected Don';}
elseif($rank == '21'){ $update = '0.04';$newrank = 'Tough Don';}

if($rank <= 21){
if(($rankup + $update) > ('100')){
$newrankup = $rankup + $update - 100;

if($newrank == 'Citizen'){$sendinfo = "You have been promoted to \[b\]$newrank\[\/b\]! Congratulations, you received \[b\]1,000\[\/b\] bullets!\[br\]\[br\]The more you rank up, the more crimes you can commit which make you ALOT more money!";mysql_query("UPDATE users SET mail = (mail + 1) WHERE ID = '$ida'");}else{
$sendinfo = "You have been promoted to \[b\]$newrank\[\/b\]! Congratulations, you received \[b\]1,000\[\/b\] bullets!";}


mysql_query("UPDATE users SET rankid = rankid + 1,rankup = $newrankup, bullets = bullets + 1000 WHERE ID = '$ida'");
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$gangsterusername','$gangsterusername','1','$userip','$sendinfo')");
}
else{mysql_query("UPDATE users SET rankup = rankup + $update WHERE ID = '$ida'");}
}


if($cardamagea < 5){$cardamage = '0';}else{$cardamage = $cardamagea * 5;}
if($car <= 350){$carname = 'Skoda Octavius'; $link = '1'; $bullets = '4';$speed = '3600';}
elseif(($car > 350)&&($car <= 505)){$carname = 'Ford Fiesta'; $link = '2'; $bullets = '6';$speed = '2400';}
elseif(($car > 505)&&($car <= 645)){$carname = 'Audi A3'; $link = '3'; $bullets = '12';$speed = '1200';}
elseif(($car > 645)&&($car <= 777)){$carname = 'Ford Mondeo'; $link = '4'; $bullets = '22';$speed = '1000';}
elseif(($car > 777)&&($car <= 857)){$carname = 'Jaguar X Type'; $link = '5'; $bullets = '34';$speed = '800';}
elseif(($car > 857)&&($car <= 925)){$carname = 'BMW X5'; $link = '6'; $bullets = '62';$speed = '650';}
elseif(($car > 925)&&($car <= 985)){$carname = 'Audi Q7'; $link = '7'; $bullets = '84';$speed = '480';}
elseif(($car > 985)&&($car <= 1025)){$carname = '</font><font color=red face=verdana size=1><b>Rare:</b></font><font color=white size=1 face=verdana> Ferrari Spider'; $link = '8'; $bullets = '128';$speed = '240';}
elseif(($car > 1025)&&($car <= 1050)){$carname = '</font><font color=red face=verdana size=1><b>Rare:</b></font><font color=white size=1 face=verdana> Bugatti Veyron'; $link = '9'; $bullets = '180';$speed = '140';}
elseif(($car > 1050)&&($car <= 1064)){$carname = '</font><font color=red face=verdana size=1><b>Very Rare:</b></font><font color=white size=1 face=verdana> Pagani Zonda'; $link = '10'; $bullets = '240';$speed = '60';}
$image = "<img src =/more/car/$link.jpg>";
echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP><center><font color=#222222 face=verdana size=1><center><b>Success!</b></center></font></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><center><Br>$image<br><font color=white size=1 face=verdana>You stole a $carname! With $cardamage% damage!</font><br><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></center></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";
mysql_query("INSERT INTO cars(owner,damage,bullets,carid,speed)
VALUES ('$gangsterusername','$cardamage','$bullets','$link','$speed')");}
}}
elseif(isset($_GET['dropid'])){
$dropexist = mysql_num_rows(mysql_query("SELECT owner FROM cars WHERE id = $getid AND owner = '$gangsterusername'"));
if($dropexist < '1'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You dont own a car with such an id!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
else{mysql_query("DELETE FROM cars WHERE id = $getid AND owner = '$gangsterusername'"); echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You dropped the car!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}}

$selecterraw = $_POST['select'];
$selecter = preg_replace($saturated,"",$selecterraw);
if(isset($_POST['next'])){$one = $selecter + 1;}
elseif(isset($_POST['previous'])){$one = $selecter - 1;}else{$one = '0';}

$selectfroma = $one * 30;
$selecttoa = $selectfrom + 30;
$selectfrom = preg_replace($saturated,"",$selectfroma);
$selectto = preg_replace($saturated,"",$selecttoa);

$getuserinfosql = mysql_query("SELECT * FROM users WHERE ID = '$ida'");
$getuserinfoarray = mysql_fetch_array($getuserinfosql);
$steal = $getuserinfoarray['steal'];
$stealtime = $steal - $time;
$carlist = mysql_query("SELECT * FROM cars WHERE owner = '$gangsterusername' ORDER BY carid DESC LIMIT $selectfrom,$selectto ");


$carlistamount = mysql_num_rows($carlist);

$tyrand= mt_rand(3500,5000);
$tyrandone = mt_rand(5001,8000);

$br = mt_rand(0,2);
?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Steal a Car</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<center>
<form method="post">
<br><input type=submit style=font-size:12px;color:white; value='Steal a car:<? if($stealtime <= 0){echo" Available!";}else{echo" Wait $stealtime"; echo" seconds";}?>' name=<?echo$stealbutton;?> class=textbox>
<br>
</form><br>


<table align="center" width="85%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="8" background="/more/top.png" NOWRAP><center><font color="#222222" face="verdana" size="1"><b>View:</b> <u><a href=steal.php#><font color=white>All My Cars</a></u></font></font></center></font></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png"></td>
<td background="/more/crossbg.png">
<table cellpadding=0 cellspacing=2 width=100%  style="border-width: 1px;border-color: gray;">
<tr><td align=center valign=middle width=45% bgcolor=444444 NOWRAP align=center><center><font color=white face=verdana size=1>Car:</font></center></td><td width=20% bgcolor=444444 valign=middle align=center><center><font color=white face=verdana size=1>Damage:</font></center><td width=15%  bgcolor=444444  valign=middle align=center><center><font color=white face=verdana size=1>Drop:</font></center></td><td width=15%  bgcolor=444444  valign=middle align=center><center><font color=white face=verdana size=1>Sell:</font></center></td></tr>
<? while($carlists = mysql_fetch_array($carlist)){
$carid = $carlists['carid'];
$carida = $carlists['id'];
$card = $carlists['damage'];
$carnamea = $carlists['carname'];

if($carid == 1){$carname = 'Skoda Octavius';}
elseif($carid == 2){$carname = 'Ford Fiesta';}
elseif($carid == 3){$carname = 'Audi A3';}
elseif($carid == 4){$carname = 'Ford Mondeo';}
elseif($carid == 5){$carname = 'Jaguar X Type';}
elseif($carid == 6){$carname = 'BMW X5';}
elseif($carid == 7){$carname = 'Audi Q7';}
elseif($carid == 8){$carname = 'Ferrari Spider';}
elseif($carid == 9){$carname = 'Bugatti Veyron';}
elseif($carid == 10){$carname = 'Pagani Zonda';}
elseif($carid == 11){$carname = $carnamea;}

if($carid == 10){$before = '<b><font color=red face=verdana size=1>Very Rare:&nbsp;</b></font>';}
elseif($carid == 9){$before = '<b><font color=red face=verdana size=1>Rare:&nbsp;</b></font>';}
elseif($carid == 8){$before = '<b><font color=red face=verdana size=1>Rare:&nbsp;</b></font>';}
elseif($carid == 11){$before = '<b><font color=red face=verdana size=1>Custom:&nbsp;</b></font>';}
else{$before = '';}

if($carid < '8'){$decho ='Garages can only hold Custom / Rare cars';}else{$decho ='Coming Soon';}
echo"<tr><td width=45% class=wtf NOWRAP><a href=viewcar.php?id=$carida>&nbsp;$before<font color=white face=verdana size=1>$carname</font></a></td><td width=20%  class=wtfs NOWRAP><font color=white face=verdana size=1>&nbsp;$card%</font><td width=15%  class=wtfs NOWRAP><a href=steal.php?dropid=$carida><font color=white face=verdana size=1>&nbsp;Drop</font></a></td><td width=15%  class=wtfs NOWRAP><a href=sell.php?car=$carida><font color=khaki face=verdana size=1>&nbsp;Sell Car</font></a></td></tr>";

}?>
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

<? 
$carlist = mysql_query("SELECT * FROM cars WHERE owner = '$gangsterusername'");


$carlistamount = mysql_num_rows($carlist);

if($carlistamount > 50){?>
<form action = "" method = "post"><input type="hidden" name="select" value="<? echo $one; ?>"><?php if($selectfrom != '0'){echo'<input type ="submit" value="Previous page" class="textbox" name="previous">';}?><input type ="submit" value="Next page" class="textbox" name="next"></form>
<?}else{echo"<br>";}?>

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