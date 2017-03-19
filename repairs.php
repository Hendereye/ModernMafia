<? include 'included.php'; ?>
<?
$time = time();
$times = $time + 300;
$jailtime = $time + 120;
$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$doits = $_POST['id'];
$doit = preg_replace($saturated,"",$doits);
$gangsterusername = $usernameone;
$jailtest = mysql_query("SELECT username FROM jail WHERE username  = '$gangsterusername'");
$jailtester = mysql_num_rows($jailtest);
if($jailtester != '0'){die(include 'jail.php'); }

$rep = $statustesttwo['repair'];

?>
<html>
<head>
<title>Mafia Society</title><link rel="stylesheet" href="more/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="shortcut icon" href="/more/icon.png" type="image/x-icon" />
<SCRIPT LANGUAGE="JavaScript">
function checkAll(field) {
	for (i = 0; i < field.length; i++)
	field[i].checked = true;
}
function uncheckAll(field) {
	for (i = 0; i < field.length; i++)
	field[i].checked = false;
}
</script>
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
if(isset($_POST['repair']))
{$buycar = $doit;
$n = count($buycar);
$i = 0;

if($n >= 1){
while ($i < $n){
$doit = $buycar[$i];
$dropexist = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE id = $doit AND owner = '$gangsterusername'"));
if($dropexist != '1'){}
else{

$ifnota = mysql_query("SELECT * FROM cars WHERE id = '$doit'");
$ifnot = mysql_fetch_array($ifnota);
$ifnotname = $ifnot['owner'];
$damage = $ifnot['damage'];
$carname = $ifnot['carname'];
$carid = $ifnot['carid'];

if($carid == 1){$carinfom = 'Skoda Octavius';}
elseif($carid == 2){$carinfom = 'Ford Fiesta';}
elseif($carid == 3){$carinfom = 'Audi A3';}
elseif($carid == 4){$carinfom = 'Ford Mondeo';}
elseif($carid == 5){$carinfom = 'Jaguar X Type';}
elseif($carid == 6){$carinfom = 'BMW X5';}
elseif($carid == 7){$carinfom = 'Audi Q7';}
elseif($carid == 8){$carinfom = 'Ferrari Spider';}
elseif($carid == 9){$carinfom = 'Bugatti Veyron';}
elseif($carid == 10){$carinfom = 'Pagani Zonda';}

if($ifnotname != $gangsterusername){}
elseif($damage < 1){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>That car already has 0% damage!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
else{

$repairchancea = 100 - $damage;


$repairchance = $repairchancea * 10;
$rand = mt_rand(0,1000);


mysql_query("UPDATE users SET repair = '0' WHERE ID = '$ida'");

if(($repairchance >= $rand)||($rep == '1')){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You successfully repaired your $carinfom with $damage% damage!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";
mysql_query("UPDATE cars SET damage = '0' WHERE id = '$doit' AND owner = '$gangsterusername'");}
else{echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You failed repairing your $carinfom with $damage% damage!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";
mysql_query("DELETE FROM cars WHERE id = $doit AND owner = '$gangsterusername'");
mysql_query("DELETE FROM travel WHERE carid = $doit AND owner = '$gangsterusername'");

}
$getinfo = mysql_fetch_array(mysql_query("SELECT username,money FROM users WHERE ID = '$ida'"));
$money = $getinfo['money'];
}
$i = $i + 1;
}}}}



$selecterraw = $_POST['select'];
$selecter = preg_replace($saturated,"",$selecterraw);
if(isset($_POST['next'])){$one = $selecter + 1;}
elseif(isset($_POST['previous'])){$one = $selecter - 1;}else{$one = '0';}

$selectfroma = $one * 50;
$selecttoa = $selectfrom + 50;
$selectfrom = preg_replace($saturated,"",$selectfroma);
$selectto = preg_replace($saturated,"",$selecttoa);

$carlist = mysql_query("SELECT * FROM cars WHERE owner = '$gangsterusername' ORDER BY carid DESC LIMIT $selectfrom,$selectto ");

$carlistamount = mysql_query("SELECT * FROM cars WHERE owner = '$gangsterusername'");
$carlistamount = mysql_num_rows($carlistamount);

?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Repair</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<center><br><input name="CheckAll" type="button" value="Check all" onclick="checkAll(document.sell['id[]'])" class="textbox"><input name="unCheckAll" type="button" value="Uncheck all" onclick="uncheckAll(document.sell['id[]'])" class="textbox"><br><br>
<table cellpadding=0 cellspacing=1 width=85%><form method=post name=sell id=sell>
<tr><td width=65% bgcolor=#222222 NOWRAP><center><font color=white face=verdana size=1><b>Car</b>:</font></center></td><td width=20% bgcolor=#222222 NOWRAP><center><font color=white face=verdana size=1><b>Damage</b>:</font></center><td width=10% bgcolor=#222222 NOWRAP><center><font color=white face=verdana size=1><b>Repair</b>:</font></center></td><td width=10% bgcolor=#222222 NOWRAP><center><font color=white face=verdana size=1><b>Chance</b>:</font></center></td></tr>
<? while($carlists = mysql_fetch_array($carlist)){
$carid = $carlists['carid'];
$carida = $carlists['id'];
$card = $carlists['damage'];
$carnamea = $carlists['carname'];
$chance = 100 - $card;
if($chance >= 50){$colorr = white;}else{$colorr = gray;}

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
echo"<tr><td width=65% bgcolor=#333333 NOWRAP><a href=viewcar.php?id=$carida>$before<font color=white face=verdana size=1>$carname</font></a></td><td width=20% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1><b>$card%</b></font><td width=10% bgcolor=#333333 NOWRAP><input type=checkbox value=$carida name='id[]'</td><td width=10% bgcolor=#333333 NOWRAP><font color=$colorr face=verdana size=1>($chance%)</font></td></tr>";
}?>
</table><br><br>
<input type ="submit" value="Repair cars" class="textbox" name="repair"></form><br><br>
<? if($carlistamount > 50){?>
<form action = "" method = "post"><input type="hidden" name="select" value="<? echo $one; ?>"><?php if($selectfrom != '0'){echo'<input type ="submit" value="Previous page" class="textbox" name="previous">';}?><input type ="submit" value="Next page" class="textbox" name="next"></form></center>
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
<? include 'rightmenu.php'; ?>
</td>
</tr>
</table>

</body></html>