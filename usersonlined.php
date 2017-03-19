<? include 'included.php';
 
$time = time();
$timetwo = $time-3000;

$usersonlineresult = mysql_query("SELECT username,rankid,crewid,appear,money,hdo,ent,ID,thdo FROM users WHERE activity >= '$timetwo' ORDER BY rankid DESC");


?>
<html>
<head>
<title>Mafia Society</title><link rel="stylesheet" href="more/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="shortcut icon" href="/more/icon.png" type="image/x-icon" /></head>
<body background="more/bgtest.png">
<table width="100%" height="335" align="center" cellpadding="0" cellspacing="3">
<tr>
<td width="250" height="25"></td>
<td width="100%"></td>
<td width="250"></td>
</tr>

<tr>
<td width="250" valign="top">
<? include 'leftmenu.php'; ?></td>
<td width="100%" valign="top">

<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Users online</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<br> 
<table width=95% cellpadding=0 cellspacing=0 align=center>
<tr><td valign=top class=online>
<font color=white>-</font><?php 

while($usersonline = mysql_fetch_array($usersonlineresult)) 
{
$onlineuser = $usersonline['username'];
$usersonlinerankid = $usersonline['rankid'];
$crewid = $usersonline['crewid'];
$appear = $usersonline['appear'];
$moneys = $usersonline['money'];
$hdo = $usersonline['hdo'];
$entertainercheckresult = $usersonline['ent'];
$idh = $usersonline['ID'];
$thdocheckresult  = $usersonline['thdo'];



$money = $moneys;

$usersonlinecount++;

$check = mysql_query("SELECT username FROM usersonline WHERE id = '$idh' ");
$checks = mysql_num_rows($check);




$newscheck = mysql_query("SELECT username FROM news WHERE username = '$onlineuser' ");
$news = mysql_num_rows($newscheck);



if(($checks != '0')&&($appear != '1')) {
echo"<a href =viewprofile.php?username=$onlineuser>";
}


if($checks == '0')
{ 
$usersonlinecount--;
}
elseif($appear == '1')
{ 
$usersonlinecount--;
}

elseif($usersonlinerankid == '100') 
{ 
echo "<font color=red><b> $onlineuser </b></font>"; 
}
elseif($usersonlinerankid == '75') 
{ 
echo "<font color=#00ccff><b> $onlineuser </b></font>"; 
}
elseif($usersonlinerankid == '50') 
{ 
echo "<font color=blue><b> $onlineuser </b></font>"; 
}
elseif($usersonlinerankid == '25') 
{ 
echo "<font color=yellow><b> $onlineuser </b></font>"; 
}
elseif(($hdo > '0')&&($onlineuser != 'notice')) 
{ 
echo "<font color=lime><b> $onlineuser </b></font>"; 
}
elseif($thdocheckresult > '0') 
{ 
echo "<font color=orange><b> $onlineuser </b></font>"; 
}
elseif($entertainercheckresult > '0') 
{ 
echo "<font color=pink><b> $onlineuser </b></font>"; 
}
elseif($news > '0') 
{ 
echo "<font color=DarkOrchid><b> $onlineuser </b></font>"; 
}
elseif($usersonlinerankid == '22') 
{ 
echo "<font color=white ><b><u> $onlineuser </u></b>"; 
}
elseif(mysql_num_rows(mysql_query("SELECT * FROM friends WHERE thereid = '$idh' AND myid = '$ida'")) >= '1') 
{ 
echo "<font color=khaki><b> $onlineuser </b>"; 
}
elseif($crewid != '0')
{ 
echo " $onlineuser "; 
}
else
{ 
echo "<font color=gray> $onlineuser </font>"; 
}


if(($checks != '0')&&($appear != '1')) {
echo"</a><font color=white >-</font>";}
}
?>
<font color=white > <? echo $usersonlinecount; ?> Users online</font><br><br><a href=faq.php#key><b>Key</b></a><br><br>

</td></tr></table>
<table width="95%" cellpadding="0" cellspacing="0" align="center"><tr><td height="1" bgcolor="#444444"></td></tr><td height="11"></td></tr></table>
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
<? include 'rightmenu.php'; ?></td>
</tr>
</table>
</body>
<head><META HTTP-EQUIV="Pragma" CONTENT="no-cache"></head></html>