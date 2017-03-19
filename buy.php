<? include 'included.php'; ?>
<?
 


$fg = rand(0,5);

if($fg == 1){

$deletetopicssql = mysql_query("SELECT * FROM forumposts WHERE type = 'buy' ORDER BY id DESC LIMIT 10,11");
while($deletetopics = mysql_fetch_array($deletetopicssql))
{$dtopicid = $deletetopics['id'];
$deleted = mysql_query("DELETE FROM forumposts WHERE id = '$dtopicid'");}}


$saturate = "/[^a-z0-9]/i";
$allowed = "/[^0-9]/i";
$gunnumberraw = $_GET['gun'];
$gunnumber = preg_replace($allowed,"",$gunnumberraw);
$pronumberraw = $_GET['pro'];
$pronumber = preg_replace($allowed,"",$pronumberraw);
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

$entertainer = $ent;
if($entertainer != '0'){die('<font color=white face=verdana size=1>As entertainer you cannot view this page</font>');}

$getuserinfoarray = $statustesttwo;
$getpro = $getuserinfoarray['protection'];
$getname = $getuserinfoarray['username'];
$getgun = $getuserinfoarray['gun'];
$getmoney = $getuserinfoarray['money'];
$rankid = $getuserinfoarray['rankid'];
$poster = $_GET['deletepost'];
$deletepost = preg_replace($allowed,"",$poster);
$getgunplus = $getgun + 1;
$getproplus = $getpro + 1;

if($gunnumber == '2'){ $oopsgun = 'Air Rifle';}
elseif($gunnumber == '3'){ $oopsgun = 'Colt 1911 .45 auto';}
elseif($gunnumber == '4'){ $oopsgun = 'M9 Beretta 9mm Pistol';}
elseif($gunnumber == '5'){ $oopsgun = 'Bren Ten 10mm';}
elseif($gunnumber == '6'){ $oopsgun = 'M21 sniper rifle';}
elseif($gunnumber == '7'){ $oopsgun = 'AK - 47';}
elseif($gunnumber == '8'){ $oopsgun = 'Marui M4';}
elseif($gunnumber == '9'){ $oopsgun = '7.62-mm SVD DRAGUNOV';}

if($gunnumber == '1'){ $gunprice = '54000';}
elseif($gunnumber == '2'){ $gunprice = '124000';}
elseif($gunnumber == '3'){ $gunprice = '450000';}
elseif($gunnumber == '4'){ $gunprice = '720500';}
elseif($gunnumber == '5'){ $gunprice = '1200000';}
elseif($gunnumber == '6'){ $gunprice = '2676000';}
elseif($gunnumber == '7'){ $gunprice = '4750000';}
elseif($gunnumber == '8'){ $gunprice = '7000000';}
elseif($gunnumber == '9'){ $gunprice = '11575000';}
else{$gunprice = 'error';}

if($pronumber == '3'){ $oopspro = 'Modular Tactical Assault Vest';}
elseif($pronumber == '4'){ $oopspro = 'Overt Tactical Vest';}
elseif($pronumber == '5'){ $oopspro = 'Light Infantry Vest';}
elseif($pronumber == '6'){ $oopspro = 'Infantry Battle Assault Vest';}
elseif($pronumber == '7'){ $oopspro = 'LBA 305 Military Vest';}
elseif($pronumber == '8'){ $oopspro = 'FBI Tactical vest';}
elseif($pronumber == '9'){ $oopspro = 'SWAT Tactical vest';}

if($pronumber == '2'){ $proprice = '23000';}
elseif($pronumber == '3'){ $proprice = '88000';}
elseif($pronumber == '4'){ $proprice = '250000';}
elseif($pronumber == '5'){ $proprice = '780000';}
elseif($pronumber == '6'){ $proprice = '900000';}
elseif($pronumber == '7'){ $proprice = '1345000';}
elseif($pronumber == '8'){ $proprice = '3853000';}
elseif($pronumber == '9'){ $proprice = '8770000';}
else{$proprice = 'error';}

if(isset($_POST['deleteall'])) { 
if(($rankid < '25')&&($senior < '0')){}
else{mysql_query("DELETE FROM forumposts WHERE type = 'buy'");
echo"<font color=white face=verdana size=1>Posts deleted!</font>";}}


if(isset($_GET['gun'])) { 
if($gunnumber > 9){ }
elseif($gunprice == 'error'){echo'<font color="white" face="verdana" size="1">Error</font>';}
elseif($gunnumber == $getgun){echo'<font color="white" face="verdana" size="1">You already have that gun!</font>';}
elseif($gunnumber < $getgun){echo'<font color="white" face="verdana" size="1">You already have a more advanced gun than that!</font>';}
elseif($gunnumber > $getgunplus){echo"<font color=white face=verdana size=1>You must buy the $oopsgun before you can buy that gun!</font>";}
elseif($getmoney < $gunprice){echo"<font color=white face=verdana size=1>You don't have enough money!</font>";}
else{ 

mysql_query("UPDATE users SET gun = '$gunnumber' WHERE ID = '$ida' AND gun = '$getgun'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 1.</font>');}


mysql_query("UPDATE users SET money = money - $gunprice WHERE ID = '$ida'  AND money >= '$gunprice'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 2.</font>');}


echo"<font color=white face=verdana size=1><b>You bought the gun</b>!</font>";}


$usersql = mysql_query("SELECT * FROM users WHERE username = '$usernameone'");
$statustesttwo = mysql_fetch_array($usersql);}

if(isset($_GET['pro'])) { 
if(($pronumber > 9)||($pronumber < 1)){ }
elseif($proprice == 'error'){echo'<font color="white" face="verdana" size="1">Error</font>';}
elseif($pronumber == $getpro){echo'<font color="white" face="verdana" size="1">You already have that vest!</font>';}
elseif($pronumber < $getpro){echo'<font color="white" face="verdana" size="1">You already have a more advanced vest than that!</font>';}
elseif($pronumber > $getproplus){echo"<font color=white face=verdana size=1>You must buy the $oopspro before you can buy that vest!</font>";}
elseif($getmoney < $proprice){echo"<font color=white face=verdana size=1>You don't have enough money!</font>";}
else{ 
mysql_query("UPDATE users SET protection = '$pronumber' WHERE ID = '$ida'  AND protection = '$getpro'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 3.</font>');}
mysql_query("UPDATE users SET money = money - $proprice WHERE ID = '$ida'  AND money >= '$proprice'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 3.</font>');}
mysql_query("UPDATE money SET money = (money - $proprice)");
echo"<font color=white face=verdana size=1><b>You bought the vest</b>!</font>";}


$usersql = mysql_query("SELECT * FROM users WHERE username = '$usernameone'");
$statustesttwo = mysql_fetch_array($usersql);


}


$newpostraw = mysql_real_escape_string($_POST['newpost']);
$newpost = htmlentities($newpostraw, ENT_QUOTES);
if(isset($_POST['dopost'])) { 

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

if(!$newpost){}
elseif($mutedusernamerows > '0'){die("<font color=white face=verdana size=1>Username: <b>$mutedusernameone</b> and IP: <b>$mutedipone</b> have been muted! Contact a member of <b>The Society</b> to be unmuted!");}
elseif($mutediprows > '0'){die("<font color=white face=verdana size=1>Username: <b>$mutedusernametwo</b> and IP: <b>$mutediptwo</b> have been muted! Contact a member of <b>The Society</b> to be unmuted!");}
else{
mysql_query("INSERT INTO forumposts(username,topicid,ip,type,post,rankid)
VALUES ('$gangsterusername',' ','$userip','buy','$newpost','$myrank')");
mysql_query("UPDATE users SET posts = (posts + 1) WHERE ID = '$ida' ");}}


if($rankid == '100'){
if(isset($_GET['deletepost'])) { 
mysql_query("DELETE FROM forumposts WHERE type = 'buy' AND id = '$deletepost'");
}
}



?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Buy</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<br>
<table align=center width=85% cellspacing=3><tr><td valign=top>
<table width="100%" cellpadding="0" cellspacing="2" align="center">
<form method=get>
<tr><td width="100%" bgcolor="222222" NOWRAP colspan="3" align="center" style="-moz-border-radius-topleft:7px;-moz-border-radius-topright:7px;"><font color=khaki face=verdana size=2><b>Weapons</b></font></td></tr>
<tr><td width="65%" bgcolor="#333333" NOWRAP><font color=silver face=verdana size=1>&nbsp;Air Rifle</font></td><td width="25%" bgcolor="#333333" NOWRAP><font color=silver face=verdana size=1>$54,000</font></td><td width="10%" bgcolor="#333333" NOWRAP><input type=radio name=gun value=1></td></tr>
<tr><td width="65%" bgcolor="#333333" NOWRAP><font color=silver face=verdana size=1>&nbsp;Colt 1911 .45 auto</font></td><td width="25%" bgcolor="#333333" NOWRAP><font color=silver face=verdana size=1>$124,000</font></td><td width="10%" bgcolor="#333333" NOWRAP><input type=radio name=gun value=2></td></tr>
<tr><td width="65%" bgcolor="#333333" NOWRAP><font color=silver face=verdana size=1>&nbsp;M9 Beretta 9mm Pistol</font></td><td width="25%" bgcolor="#333333" NOWRAP><font color=silver face=verdana size=1>$450,000</font></td><td width="10%" bgcolor="#333333" NOWRAP><input type=radio name=gun value=3></td></tr>
<tr><td width="65%" bgcolor="#333333" NOWRAP><font color=silver face=verdana size=1>&nbsp;Bren Ten 10mm</font></td><td width="25%" bgcolor="#333333" NOWRAP><font color=silver face=verdana size=1>$720,500</font></td><td width="10%" bgcolor="#333333" NOWRAP><input type=radio name=gun value=4></td></tr>
<tr><td width="65%" bgcolor="#333333" NOWRAP><font color=silver face=verdana size=1>&nbsp;M21 sniper rifle</font></td><td width="25%" bgcolor="#333333" NOWRAP><font color=silver face=verdana size=1>$1,200,000</font></td><td width="10%" bgcolor="#333333" NOWRAP><input type=radio name=gun value=5></td></tr>
<tr><td width="65%" bgcolor="#333333" NOWRAP><font color=silver face=verdana size=1>&nbsp;AK - 47</font></td><td width="25%" bgcolor="#333333" NOWRAP><font color=silver face=verdana size=1>$2,676,000</font></td><td width="10%" bgcolor="#333333" NOWRAP><input type=radio name=gun value=6></td></tr>
<tr><td width="65%" bgcolor="#333333" NOWRAP><font color=silver face=verdana size=1>&nbsp;Marui M4</font></td><td width="25%" bgcolor="#333333" NOWRAP><font color=silver face=verdana size=1>$4,750,000</font></td><td width="10%" bgcolor="#333333" NOWRAP><input type=radio name=gun value=7></td></tr>
<tr><td width="65%" bgcolor="#333333" NOWRAP><font color=silver face=verdana size=1>&nbsp;7.62-mm SVD DRAGUNOV&nbsp;&nbsp;&nbsp;</font></td><td width="25%" bgcolor="#333333" NOWRAP><font color=silver face=verdana size=1>$7,000,000</font></td><td width="10%" bgcolor="#333333" NOWRAP><input type=radio name=gun value=8></td></tr>
<tr><td width="65%" bgcolor="#333333" NOWRAP><font color=silver face=verdana size=1>&nbsp;FN F2000 Assault Rifle</font></td><td width="25%" bgcolor="#333333" NOWRAP><font color=silver face=verdana size=1>$11,575,000</font></td><td width="10%" bgcolor="#333333" NOWRAP><input type=radio name=gun value=9></td></tr>
<tr><td width="65%"></td><td width="25%"></td><td width="10%"><input type=submit value=Buy class=textbox></td></tr></form>
</table>
</td><td valign=top>
<table width="100%" cellpadding="0" cellspacing="2" align="center">
<form method=get><tr><td width="100%" bgcolor="222222" NOWRAP colspan="3" align="center"  style="-moz-border-radius-topleft:7px;-moz-border-radius-topright:7px;"><font color=khaki face=verdana size=2><b>Protection</b></font></td></tr>
<tr><td width="65%" bgcolor="#333333" NOWRAP><font color=silver face=verdana size=1>&nbsp;Modular Tactical Assault Vest&nbsp;&nbsp;&nbsp;</font></td><td width="25%" bgcolor="#333333" NOWRAP><font color=silver face=verdana size=1>$23,000</font></td><td width="10%" bgcolor="#333333" NOWRAP><input type=radio name=pro value=2></td></tr>
<tr><td width="65%" bgcolor="#333333" NOWRAP><font color=silver face=verdana size=1>&nbsp;Overt Tactical Vest</font></td><td width="25%" bgcolor="#333333" NOWRAP><font color=silver face=verdana size=1>$88,000</font></td><td width="10%" bgcolor="#333333" NOWRAP><input type=radio name=pro value=3></td></tr>
<tr><td width="65%" bgcolor="#333333" NOWRAP><font color=silver face=verdana size=1>&nbsp;Light Infantry Vest</font></td><td width="25%" bgcolor="#333333" NOWRAP><font color=silver face=verdana size=1>$250,000</font></td><td width="10%" bgcolor="#333333" NOWRAP><input type=radio name=pro value=4></td></tr>
<tr><td width="65%" bgcolor="#333333" NOWRAP><font color=silver face=verdana size=1>&nbsp;Infantry Battle Assault Vest</font></td><td width="25%" bgcolor="#333333" NOWRAP><font color=silver face=verdana size=1>$780,000</font></td><td width="10%" bgcolor="#333333" NOWRAP><input type=radio name=pro value=5></td></tr>
<tr><td width="65%" bgcolor="#333333" NOWRAP><font color=silver face=verdana size=1>&nbsp;LBA 305 Military Vest</font></td><td width="25%" bgcolor="#333333" NOWRAP><font color=silver face=verdana size=1>$900,000</font></td><td width="10%" bgcolor="#333333" NOWRAP><input type=radio name=pro value=6></td></tr>
<tr><td width="65%" bgcolor="#333333" NOWRAP><font color=silver face=verdana size=1>&nbsp;FBI Tactical vest</font></td><td width="25%" bgcolor="#333333" NOWRAP><font color=silver face=verdana size=1>$1,345,000</font></td><td width="10%" bgcolor="#333333" NOWRAP><input type=radio name=pro value=7></td></tr>
<tr><td width="65%" bgcolor="#333333" NOWRAP><font color=silver face=verdana size=1>&nbsp;SWAT Tactical vest</font></td><td width="25%" bgcolor="#333333" NOWRAP><font color=silver face=verdana size=1>$3,853,000</font></td><td width="10%" bgcolor="#333333" NOWRAP><input type=radio name=pro value=8></td></tr>
<tr><td width="65%" bgcolor="#333333" NOWRAP><font color=silver face=verdana size=1>&nbsp;Heavy Military Vest</font></td><td width="25%" bgcolor="#333333" NOWRAP><font color=silver face=verdana size=1>$8,770,000</font></td><td width="10%" bgcolor="#333333" NOWRAP><input type=radio name=pro value=9></td></tr>
<tr><td width="65%"></td><td width="25%"></td><td width="10%"><input type=submit value=Buy class=textbox></td></tr></form>
</table></td></tr></table><br>

<table width="50%" cellpadding="0" cellspacing="2" align="center">
<form method=get action=buycar.php>
<tr><td width="100%" bgcolor="222222" NOWRAP colspan="2" align="center"  style="-moz-border-radius-topleft:7px;-moz-border-radius-topright:7px;"><font color=khaki face=verdana size=2><b>Cars</b></font></td></tr>
<tr><td width="50%" bgcolor="#333333" NOWRAP><label><input type=radio name=id value=11><font color=silver face=verdana size=1>Custom Cars</font></label></td><td width="50%" bgcolor="#333333" NOWRAP><label><input type=radio name=id value=10><font color=silver face=verdana size=1>Pagani Zonda&nbsp;&nbsp;&nbsp;&nbsp;</font></label></td></tr><tr><td width="50%" bgcolor="#333333" NOWRAP><label><input type=radio name=id value=9><font color=silver face=verdana size=1>Bugatti Veyron</font></font></label></td><td width="50%" bgcolor="#333333" NOWRAP><label><input type=radio name=id value=8><font color=silver face=verdana size=1>Ferrari Spider</font></label></td></tr><tr><td width="50%" bgcolor="#333333" NOWRAP><label><input type=radio name=id value=7><font color=silver face=verdana size=1>Audi Q7</font></label></td><td width="50%" bgcolor="#333333" NOWRAP><label><input type=radio name=id value=6><font color=silver face=verdana size=1>BMW X5</font></label></td></tr><tr><td width="50%" bgcolor="#333333" NOWRAP><label><input type=radio name=id value=5><font color=silver face=verdana size=1>Jaguar X Type</font></label></td><td width="50%" bgcolor="#333333" NOWRAP><label><input type=radio name=id value=4><font color=silver face=verdana size=1>Ford Mondeo</font></label></td></tr><tr><td width="50%" bgcolor="#333333" NOWRAP><label><input type=radio name=id value=3><font color=silver face=verdana size=1>Audi A3</font></label></td><td width="50%" bgcolor="#333333" NOWRAP><label><input type=radio name=id value=2><font color=silver face=verdana size=1>Ford Fiesta</font></label></td></tr><tr><td width="50%" bgcolor="#333333" NOWRAP><label><input type=radio name=id value=1><font color=silver face=verdana size=1>Skoda Octavius&nbsp;&nbsp;&nbsp;&nbsp;</font></label></td><td width="50%" NOWRAP><label><input type=submit value="Find cars" class=textbox style="width:100%;"></td></tr>
</form>
</table><br><br>

<?if(($rankid >= '25')||($senior > '0')){echo"<br><br><center><form method=post><input type=submit name=deleteall value='Delete Posts' class=textbox></center><br></form>";}?>

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

$getposts = mysql_query("SELECT * FROM forumposts WHERE type = 'buy' ORDER BY id DESC");

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
$while = mysql_query("SELECT word FROM blacklist");
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
<table align=center width=100% cellpadding=0 cellspacing=0><tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP><a href=viewprofile.php?username=<? echo $postname?>><? echo $color; ?></a><? if($rankid == '100'){echo"<a href=buy.php?deletepost=$postid><font color=white face=verdana size=1> (Delete)</font></a>";}?></td><td width=8 height=22 background=/more/topright.png></td></tr><tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>

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

<td width="250" valign="top">
<? include 'rightmenu.php'; ?>
</td>
</tr>
</table>

</body></html>