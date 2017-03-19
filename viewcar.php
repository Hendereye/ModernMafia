<? include 'included.php'; ?>
<html>
<head>
<title>Mafia Society</title><link rel="stylesheet" href="more/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
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

$time = time();
$times = $time + 300;
$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$getida = mysql_real_escape_string($_GET['id']);
$moddropa = mysql_real_escape_string($_GET['x']);
$getid = preg_replace($saturated,"",$getida);
$moddrop = preg_replace($saturated,"",$moddropa);

$gangsterusername = $usernameone;

if(isset($_GET['id'])){
$dropexist = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE id = $getid"));
if($dropexist < '1'){ }
else{
$getpic = mysql_fetch_array(mysql_query("SELECT * FROM cars WHERE id = $getid"));
$getcarid = $getpic['carid'];
$getdmg = $getpic['damage'];
$getowner = $getpic['owner'];
$carname = $getpic['carname'];
$carimage = $getpic['image'];
$pwice = $getpic['price'];
$spiid = $getpic['speed'];
if($spiid <= '60'){$spuud = "<font color=khaki><b>$spiid</b> seconds</font>";}else{$spuud = "<font color=white><b>$spiid</b> seconds</font>";}
$pwrice = number_format($pwice);
if($pwice != '0'){$newcol = "<tr><tD align=right bgcolor=222222><font color=white face=verdana size=1>&nbsp;&nbsp;This car is for sale at: <font color=lime face=verdana size=1>$$pwrice</font><font color=white face=verdana size=1> / Travel time: $spuud&nbsp;</font></td></tr>";}else{$newcol = "<tr><tD align=right bgcolor=222222><font color=999999 face=verdana size=1>&nbsp;&nbsp;This car is not for sale</font><font color=white face=verdana size=1> / Travel time: $spuud&nbsp;&nbsp;</font></td></tr>";}
if($getcarid == 1){$getcarname = 'Skoda Octavius';}
elseif($getcarid == 2){$getcarname = 'Ford Fiesta';}
elseif($getcarid == 3){$getcarname = 'Audi A3';}
elseif($getcarid == 4){$getcarname = 'Ford Mondeo';}
elseif($getcarid == 5){$getcarname = 'Jaguar X Type';}
elseif($getcarid == 6){$getcarname = 'BMW X5';}
elseif($getcarid == 7){$getcarname = 'Audi Q7';}
elseif($getcarid == 8){$getcarname = '</font><font color=red face=verdana size=1><b>Rare</b></font><font color=white face=verdana size=1>: Ferrari Spider';}
elseif($getcarid == 9){$getcarname = '</font><font color=red face=verdana size=1><b>Rare</b></font><font color=white face=verdana size=1>: Bugatti Veyron';}
elseif($getcarid == 10){$getcarname = '</font><font color=red face=verdana size=1><b>Very Rare</b></font><font color=white face=verdana size=1>: Pagani Zonda';}
elseif($getcarid == 11){$getcarname = "</font><font color=red face=verdana size=1><b>Customised</b></font><font color=white face=verdana size=1>: $carname";}
}}

$selecterraw = $_POST['select'];
$selecter = preg_replace($saturated,"",$selecterraw);
if(isset($_POST['next'])){$one = $selecter + 1;}
elseif(isset($_POST['previous'])){$one = $selecter - 1;}else{$one = '0';}

$selectfroma = $one * 30;
$selecttoa = $selectfrom + 30;
$selectfrom = preg_replace($saturated,"",$selectfroma);
$selectto = preg_replace($saturated,"",$selecttoa);



$getuserinfoarray = $statustesttwo;
$steal = $getuserinfoarray['steal'];
$rank = $myrank;



if($rank >= '50'){
if(isset($_GET['x'])){
$dropexist = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE id = $moddrop"));
if($dropexist < '1'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>Invalid car ID!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
else{
$dropinfo = mysql_fetch_array(mysql_query("SELECT * FROM cars WHERE id = $moddrop"));
$dropname = $dropinfo['owner'];
$dropcarid = $dropinfo['carid'];
$dropcarname = $dropinfo['carname'];
$getownerinfo = mysql_fetch_array(mysql_query("SELECT rankid FROM users WHERE username = '$dropname'"));
$getownerrank = $getownerinfo['rankid'];
$sendinfo = "\[b\]$gangsterusername\[\/b\] dropped your custom: \[b\]$dropcarname\[\/b\]!";

if($dropcarid != '11'){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>Error, you can only remove custom cars!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
elseif(($getownerrank >= '50')&&($rank < '75')){echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You do not have permission to remove this car!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}
else{
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$dropname','$gangsterusername','2','$userip','$sendinfo')");

mysql_query("DELETE FROM cars WHERE id = $getid"); echo"<table align=center width=100% cellpadding=0 cellspacing=0>
<tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP></td><td width=8 height=22 background=/more/topright.png></td></tr>
<tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>You dropped the car!</font><br><table width=98% cellpadding=0 cellspacing=0 align=center><tr><td height=1 bgcolor=#444444></td></tr><td height=11></td></tr></table></td><td width=8 background=/more/rightb.png NOWRAP></td></tr>
<tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr>
</table>";}}}}








$carlist = mysql_query("SELECT * FROM cars WHERE owner = '$gangsterusername' ORDER BY carid DESC LIMIT $selectfrom,$selectto ");

$carlistamount = mysql_query("SELECT id FROM cars WHERE owner = '$gangsterusername'");
$carlistamount = mysql_num_rows($carlistamount);

$img = mysql_query("SELECT * FROM cars WHERE id = '$getid'");
$imgrows = mysql_num_rows($img);

?> <center>
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>View car</b></center></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<br>

<table align="center"  cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td  background="/more/top.png" NOWRAP align=right><?echo"<font color=white face=verdana size=1>$getcarname <b>$getdmg</b>% damage | Owned by: </font><a href=viewprofile.php?username=$getowner><font color=khaki face=verdana size=1><b>$getowner</b></a></font>";?></td>
<td width="8"  background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png"></td>
<td bgcolor=222222 align=center>
<?$mt=mt_rand(3,99999999); if($imgrows != 0){if($getcarid != '11'){echo"<table cellpadding=0 width=100% cellspaing=0 align=center><tr><td align=center><img src=/more/car/$getcarid.jpg></td></tr>$newcol</table>";?></td>
<td width="8" background="/more/rightb.png"></td>
</tr>


<tr>
<td width="8" height="9" background="/more/bottomleft.png"></td>
<td height="9" background="/more/bottom.png"></td>
<td width="8" height="9" background="/more/bottomright.png"></td>
</tr>
</table><?}


else{echo"<table cellpadding=0 cellspaing=0><tr><td align=center><img src=/more/car/customs/$carimage?$mt></td></tr>$newcol</table>";?>
</td>
<td width="8" background="/more/rightb.png"></td>
</tr>


<tr>
<td width="8" height="9" background="/more/bottomleft.png"></td>
<td height="9" background="/more/bottom.png"></td>
<td width="8" height="9" background="/more/bottomright.png"></td>
</tr>
</table><?}
}
if($getcarid == '11'){if($getowner == $gangsterusername){$mt=mt_rand(0,600000);echo"<center><br><form method=post action=editcar.php?x=$mt&id=$getid enctype=multipart/form-data>
<input type=file name=image class=textbox><input name=newimage type=submit value='Upload image' class=textbox><br><font color=white face=verdana size=1>(Maximum file size - <b>100kb</b>, only <b>JPG,JPEG,GIF</b> and <b>PNG</b> formats.<br>Any unsuitable car names/images will result in <b>removal of that car</b>)</font><br>
</form>
<form method=post action=editcar.php?id=$getid>
<font color=white face=verdana size=1>Car name:</font><input type=textbox class=textbox name=name><input type=submit value='Change name' class=textbox name=newname>
</form><br>";}if($rank >= '50'){echo"<center><a href=viewcar.php?id=$getid&x=$getid><font color=white face=verdana size=1><b>Drop (Mod tool)</b></font></a></center><br><br></center>";}}
?>


<br>
<table align="center" width="85%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="8" background="/more/top.png" NOWRAP><center><font color="#222222" face="verdana" size="1"><b>View:</b> <u><a href=steal.php#><font color=white>All My Cars</a></u> / My Garage</font></font></center></font></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png"></td>
<td background="/more/crossbg.png">
<table cellpadding=0 cellspacing=2 width=100%  style="border-width: 1px;border-color: gray;">
<tr><td align=center valign=middle width=45% bgcolor=444444 NOWRAP align=center><center><font color=white face=verdana size=1>Car:</font></center></td><td width=20% bgcolor=444444 valign=middle align=center><center><font color=white face=verdana size=1>Damage:</font></center><td width=15%  bgcolor=444444  valign=middle align=center><center><font color=white face=verdana size=1>Drop:</font></center></td><td width=15%  bgcolor=444444  valign=middle align=center><center><font color=khaki face=verdana size=1>Add to garage:</font></center></td></tr>
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
echo"<tr><td width=45% class=wtf NOWRAP><a href=viewcar.php?id=$carida>&nbsp;$before<font color=white face=verdana size=1>$carname</font></a></td><td width=20%  class=wtfs NOWRAP><font color=white face=verdana size=1>&nbsp;$card%</font><td width=15%  class=wtfs NOWRAP><a href=steal.php?dropid=$carida><font color=white face=verdana size=1>&nbsp;Drop</font></a></td><td width=15%  class=wtfs NOWRAP><a href=# onclick=\"alert('Coming soon');\"><font color=white face=verdana size=1>&nbsp;Add</font></a></td></tr>";

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
<br>

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