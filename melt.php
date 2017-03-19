<? include 'included.php'; ?>
<?
$usercrewid =$statustesttwo['crewid'];

if($usercrewid != '0'){

$usercrewsql = mysql_query("SELECT melt FROM crews WHERE id = '$usercrewid'");
$usercrewarray = mysql_fetch_array($usercrewsql);
$theperc = $usercrewarray['melt'];

}

$time = time();
$jailtime = $time + 120;
$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$getida = mysql_real_escape_string($_GET['dropid']);
$getid = preg_replace($saturated,"",$getida);
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


$times = $time + 320;
$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$getida = $_POST['id'];
$verposta = $_POST['ver'];
$getid = preg_replace($saturated,"",$getida);
$verpost = preg_replace($saturate,"",$verposta);

$getuserinfoarray = $statustesttwo;
$ID = $getuserinfoarray['ID'];
$melt = $getuserinfoarray['melt'];
$crewid = $getuserinfoarray['crewid'];
$ref = $getuserinfoarray['refby'];
$ver = $getuserinfoarray['ver1'];
$melttime = $melt - $time;

if(isset($_POST['melt'])){
if(strtoupper($verpost) != $ver){die('<font color=white face=verdana size=1>Error, security code incorrect</font>');}
$cexist = mysql_query("SELECT * FROM cars WHERE id = '$getid' AND owner = '$gangsterusername'");
$carexist = mysql_num_rows($cexist);
$meltinfo = mysql_fetch_array($cexist);
$trav = mysql_query("SELECT * FROM travel WHERE carid = '$getid'");
$travel = mysql_num_rows($trav);
if($carexist < '1'){echo"<font color=white size=1 face=verdana>You dont own a car with such an id!</font>";}
elseif($travel != 0){echo"<font color=white size=1 face=verdana>You cannot melt a car you are currently traveling in!</font>";}
elseif($melt > $time){echo"<font color=white size=1 face=verdana>Please wait $melttime seconds!</font>";}
else{
$meltdamage = $meltinfo['damage'];
$meltbullets = $meltinfo['bullets'];
mysql_query("DELETE FROM cars WHERE id = '$getid'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 1.</font>');}


if($meltdamage == '0'){$meltamount = $meltbullets;}else{
$meltdamaged = 100 - $meltdamage;
$meltamounttwo = $meltdamaged * $meltbullets;
$meltamount = ceil($meltamounttwo / 100); 
$refamount = ceil($meltamount / 10);
}

mysql_query("UPDATE users SET bullets = bullets + $refamount WHERE ref = '$ref'");
mysql_query("UPDATE users SET totalmelted = (totalmelted + $meltamount) WHERE ID = '$ida'");

if($crewid == 0){
mysql_query("UPDATE users SET bullets = bullets + $meltamount,melt = '$times' WHERE ID = '$ida'");
echo"<font color=white size=1 face=verdana>You melted the car! You recieved <b>$meltamount</b> bullets!</font>";
}
else{

$crewmelt = $meltamount * $theperc/100;
$mymelt = ceil($meltamount - $crewmelt); 
mysql_query("UPDATE users SET melt = '$times',bullets = (bullets + $mymelt),crewbullets = (crewbullets + $crewmelt) WHERE ID = '$ida'");
mysql_query("UPDATE crews SET bullets = bullets + $crewmelt WHERE id = '$crewid'");


echo"<font color=white size=1 face=verdana>You melted the car! You recieved <b>$meltamount</b> bullets!</font><br><font color=white size=1 face=verdana>You sent <b>$theperc</b>% of that to your crew!</font>";}
$alphanum = "ABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
$randver = substr(str_shuffle($alphanum), 0, 2);
mysql_query("UPDATE users SET ver1 = '$randver' WHERE ID = '$ida'");
}}

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
$melt = $getuserinfoarray['melt'];
$melttime = $melt - $time;

$carlistamount = mysql_query("SELECT * FROM cars WHERE owner = '$gangsterusername'");
$carlistamount = mysql_num_rows($carlistamount);

$carlist = mysql_query("SELECT * FROM cars WHERE owner = '$gangsterusername' ORDER BY carid DESC LIMIT $selectfrom,$selectto");

?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>View car</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<?
if($usercrewid != '0'){

echo"<font color=white face=verdana size=1>Now when you melt you will give <b>$theperc</b>% of the bullets to your crew.<br>(Your crew boss can change this percentage from 10% - 50%)</font>";}?>
<center>
<form action="" method="post"><br><table cellpadding=0><tr><td><font color=white face=verdana size=1>Code:</font></td><td><input type=textbox class=textbox name=ver></td><td><img src=vercode1.php?id=<?echo$ID;$ty = rand(0,999999);echo"&x=$ty";?>></td></tr></table><br><font color="white" face="verdana" size="1">Time left before you can melt another car: 
<? if($melttime <= 0){echo"<b>Available</b>";}else{echo"$melttime"; echo" seconds";}?>
</font><br><br>
<table cellpadding=0 cellspacing=1 width=85%>
<tr><td width=65% bgcolor=#222222 NOWRAP><center><font color=silver face=verdana size=2>Car:</font></center></td><td width=20% bgcolor=#222222 NOWRAP><center><font color=silver face=verdana size=2>Damage:</font></center><td width=20% bgcolor=#222222 NOWRAP><center><font color=silver face=verdana size=2>Bullets:</font></center></td></tr>
<? while($carlists = mysql_fetch_array($carlist)){
$carid = $carlists['carid'];
$carida = $carlists['id'];
$carbullets = $carlists['bullets'];
$card = $carlists['damage'];
$carnamea = $carlists['carname'];

if($card == '0'){$bullets = $carbullets;}else{
$damaged = 100 - $card;
$damagedtwo = $damaged * $carbullets;
$bullets = ceil($damagedtwo / 100); 
}

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
echo"<tr><td width=65% bgcolor=#333333 NOWRAP><input type=radio name=id value=$carida><a href=viewcar.php?id=$carida>$before<font color=white face=verdana size=1>$carname</font></a></td><td width=20% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1>$card%</font><td width=20% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1>$bullets</font></td></tr>";

}?>
</table><br><input type="submit" value="Melt car" name="melt" class="textbox"><br></form>
<? if($carlistamount > 50){?>
<form action = "" method = "post"><input type="hidden" name="select" value="<? echo $one; ?>"><?php if($selectfrom != '0'){echo'<input type ="submit" value="Previous page" class="textbox" name="previous">';}?><input type ="submit" value="Next page" class="textbox" name="next"></form>
<?}else{echo"<br>";}?>

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
$statustesttwo = $getuserinfoarray;?>
<? include 'rightmenu.php'; ?>
</td>
</tr>
</table>

</body></html>