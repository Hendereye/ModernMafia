<? include 'included.php'; 


?>
<?
$saturate = "/[^a-z0-9]/i";
$allowed = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$gangsterusername = $usernameone;
$action = $_POST['action'];
$actions = preg_replace($allowed,"",$action);

$jailtest = mysql_query("SELECT username FROM jail WHERE username  = '$gangsterusername'");
$jailtester = mysql_num_rows($jailtest);
if($jailtester != '0'){die(include 'jail.php'); }
?>
<html>
<head>
<link rel="stylesheet" href="more/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
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

$entertainer = $ent;
if($entertainer != '0'){die('<font color=white face=verdana size=1>As entertainer you cannot view this page</font>');}
$saturated = "/[^0-9]/i";
$bustraw = $_POST['bust'];
$bust = preg_replace($saturate,"",$bustraw);

$getuserinfoarray = $statustesttwo;


$showcarraw = $_POST['sellcar'];
$priceraw = $_POST['price'];
$price = preg_replace($saturated,"",$priceraw);
if($price > 99999999999){$price = 99999999999;}

if($price > 0){
if($actions == '1')
{$showcar = preg_replace($saturated,"",$showcarraw);
$n = count($showcar);
$i = 0;
if($n >= 1){
echo "<font color=white face=verdana size=1>You have put $n cars for sale!</font>";
while ($i < $n){
$doit = $showcar[$i];
$ifnota = mysql_query("SELECT * FROM cars WHERE id = $doit");



if(!$doit){}else{

$ifnot = mysql_fetch_array($ifnota);
$ifnotname = $ifnot['owner'];
if($ifnotname != $gangsterusername){}
else{mysql_query("UPDATE cars SET price = '$price' WHERE id = '$doit' AND owner = '$gangsterusername'");}}
$i++;}}}}

$showcarrawa = $_POST['sellcar'];
if($actions == '2')
{$showcara = preg_replace($saturated,"",$showcarrawa);
$na = count($showcara);
$ia = 0;
if(!$showcara){}
else{
echo "<font color=white face=verdana size=1>You have stopped selling $na cars!</font>";
while ($ia < $na){
$doita = $showcara[$ia];
$ifnota = mysql_query("SELECT * FROM cars WHERE id = $doita");
$ifnota = mysql_fetch_array($ifnota);
$ifnotnamea = $ifnota['owner'];
if($ifnotnamea != $gangsterusername){}
else{mysql_query("UPDATE cars SET price = '0' WHERE id = '$doita' AND owner = '$gangsterusername'");}
$ia++;}}}

$selecterraw = $_POST['select'];
$selecter = preg_replace($saturated,"",$selecterraw);
if(isset($_POST['next'])){$one = $selecter + 1;}
elseif(isset($_POST['previous'])){$one = $selecter - 1;}else{$one = '0';}

$selectfroma = $one * 30;
$selecttoa = $selectfrom + 30;
$selectfrom = preg_replace($saturated,"",$selectfroma);
$selectto = preg_replace($saturated,"",$selecttoa);

$carlist = mysql_query("SELECT * FROM cars WHERE owner = '$gangsterusername' ORDER BY carid DESC LIMIT $selectfrom,$selectto");
$carlistamount = mysql_query("SELECT * FROM cars WHERE owner = '$gangsterusername'");
$carlistamount = mysql_num_rows($carlistamount);

$getuserinfosql = mysql_query("SELECT * FROM users WHERE username = '$gangsterusername'");
$getuserinfoarray = mysql_fetch_array($getuserinfosql);
$getdisplay = $getuserinfoarray['displaybusts'];


?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Sell cars</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<br><br>
<table cellpadding=0 cellspacing=1 width=75% align=center>
<form action="" method="post" name="sell">
<center><input name="CheckAll" type="button" value="Check all" onclick="checkAll(document.sell['sellcar[]'])" class="textbox"><input name="unCheckAll" type="button" value="Uncheck all" onclick="uncheckAll(document.sell['sellcar[]'])" class="textbox"></center><br>
<tr><td width=70% bgcolor=#222222 NOWRAP><center><font color=silver face=verdana size=2>Car:</font></center></td><td width=15% bgcolor=#222222 NOWRAP><center><font color=silver face=verdana size=2>Damage:</font></center></td><td width=15% bgcolor=#222222 NOWRAP><center><font color=silver face=verdana size=2>For Sale:</font></center></td></tr>
<? while($carlists = mysql_fetch_array($carlist)){
$carid = $carlists['carid'];
$carida = $carlists['id'];
$card = $carlists['damage'];
$carnamea = $carlists['carname'];

$forsaleat = number_format($carlists['price']);
$forsaleats = $carlists['price'];
if($forsaleats > '0'){$toecho = "For $<b>$forsaleat</b>";}else{$toecho = " ";}

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
echo"<tr><td width=70% bgcolor=#333333 NOWRAP><input type=checkbox value=$carida name='sellcar[]'><a href=viewcar.php?id=$carida>$before<font color=white face=verdana size=1>$carname</font></a></td><td width=15% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1>&nbsp;$card%</font></td><td width=15% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1>&nbsp;$toecho</font></td></tr>";

}?>
</table><br><center>
<font color=white face=verdana size=1>Price:</font><input type="text" class="textbox" name="price">
<SELECT NAME="action" class="textbox">
<OPTION value=1>Sell cars</OPTION>
<OPTION value=2>Stop selling cars</OPTION>
</SELECT>
<input type ="submit" value="Do it" class="textbox" name="doit">


</center></form>

<? if($carlistamount > 50){?>
<form action = "" method = "post"><input type="hidden" name="select" value="<? echo $one; ?>"><br><br><center><?php if($selectfrom != '0'){echo'<input type ="submit" value="Previous page" class="textbox" name="previous">';}?><input type ="submit" value="Next page" class="textbox" name="next"></form></center>
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