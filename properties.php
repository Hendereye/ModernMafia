<? include 'included.php'; 


$washdicea = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Dice' AND location = 'Washington'"));
$washdice = $washdicea['owner'];
$washdic = $washdicea['nickname'];
$ladicea = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Dice' AND location = 'Los Angeles'"));
$ladice = $ladicea['owner'];
$ladic = $ladicea['nickname'];
$nydicea = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Dice' AND location = 'New York'"));
$nydice = $nydicea['owner'];
$nydic = $nydicea['nickname'];
$ldicea = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Dice' AND location = 'Louisiana'"));
$ldice = $ldicea['owner'];
$ldic = $ldicea['nickname'];
$lvdicea = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Dice' AND location = 'Las Vegas'"));
$lvdice = $lvdicea['owner'];
$lvdic = $lvdicea['nickname'];
$ohioeonesql = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Dice' AND location = 'Ohio'"));
$ohiodice = $ohioeonesql['owner'];
$ohiodicenick = $ohioeonesql['nickname'];

$calonesql = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Dice' AND location = 'California'"));
$caldice = $calonesql['owner'];
$caldicenick = $calonesql['nickname'];


$washrlta = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Roulette' AND location = 'Washington'"));
$washrlt = $washrlta['owner'];
$washrl = $washrlta['nickname'];
$larlta = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Roulette' AND location = 'Los Angeles'"));
$larlt = $larlta['owner'];
$larl = $larlta['nickname'];
$nyrlta = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Roulette' AND location = 'New York'"));
$nyrlt = $nyrlta['owner'];
$nyrl = $nyrlta['nickname'];
$lrlta = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Roulette' AND location = 'Louisiana'"));
$lrlt = $lrlta['owner'];
$lrl = $lrlta['nickname'];
$lvrlta = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Roulette' AND location = 'Las Vegas'"));
$lvrlt = $lvrlta['owner'];
$lvrl = $lvrlta['nickname'];
$ohiorltsql = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Roulette' AND location = 'Ohio'"));
$ohiorlt = $ohiorltsql['owner'];
$ohiorltnick = $ohiorltsql['nickname'];

$calrltsql = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Roulette' AND location = 'California'"));
$calrlt = $calrltsql['owner'];
$calrltnick = $calrltsql['nickname'];


$washracesa = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Races' AND location = 'Washington'"));
$washraces = $washracesa['owner'];
$washrace = $washracesa['nickname'];
$laracesa = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Races' AND location = 'Los Angeles'"));
$laraces = $laracesa['owner'];
$larace = $laracesa['nickname'];
$nyracesa = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Races' AND location = 'New York'"));
$nyraces = $nyracesa['owner'];
$nyrace = $nyracesa['nickname'];
$lracesa = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Races' AND location = 'Louisiana'"));
$lraces = $lracesa['owner'];
$lrace = $lracesa['nickname'];
$lvracesa = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Races' AND location = 'Las Vegas'"));
$lvraces = $lvracesa['owner'];
$lvrace = $lvracesa['nickname'];
$ohioracessql = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Races' AND location = 'Ohio'"));
$ohioraces = $ohioracessql['owner'];
$ohioracesnick = $ohioracessql['nickname'];

$calracessql = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Races' AND location = 'California'"));
$calraces = $calracessql['owner'];
$calracesnick = $calracessql['nickname'];


$washbja = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Blackjack' AND location = 'Washington'"));
$washbj = $washbja['owner'];
$washb = $washbja['nickname'];
$labja = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Blackjack' AND location = 'Los Angeles'"));
$labj = $labja['owner'];
$lab = $labja['nickname'];
$nybja = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Blackjack' AND location = 'New York'"));
$nybj = $nybja['owner'];
$nyb = $nybja['nickname'];
$lbja = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Blackjack' AND location = 'Louisiana'"));
$lbj = $lbja['owner'];
$lb = $lbja['nickname'];
$lvbja = mysql_fetch_array(mysql_query("SELECT * FROM casinos WHERE casino = 'Blackjack' AND location = 'Las Vegas'"));
$lvbj = $lvbja['owner'];
$lvb = $lvbja['nickname'];
$ohiobjsql = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Blackjack' AND location = 'Ohio'"));
$ohiobj = $ohiobjsql['owner'];
$ohiobjnick = $ohiobjsql['nickname'];

$calbjsql = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Blackjack' AND location = 'California'"));
$calbj = $calbjsql['owner'];
$calbjnick = $calbjsql['nickname'];


$washbbullets = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Bullets' AND location = 'Washington'"));
$washbullets = $washbbullets['owner'];
$washbullet = $washbbullets['nickname'];

$losbulletss = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Bullets' AND location = 'Los Angeles'"));
$losbullets = $losbulletss['owner'];
$losbullet = $losbulletss['nickname'];

$newyorkbullets = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Bullets' AND location = 'New York'"));
$nybullets = $newyorkbullets['owner'];
$nybullet = $newyorkbullets['nickname'];


$louisbullets = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Bullets' AND location = 'Louisiana'"));
$lsbullets = $louisbullets['owner'];
$lsbullet = $louisbullets['nickname'];


$lasvegasbullets = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Bullets' AND location = 'Las Vegas'"));
$lvbullets = $lasvegasbullets['owner'];
$lvbullet = $lasvegasbullets['nickname'];


$ohiobulletssql = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Bullets' AND location = 'Ohio'"));
$ohiobullets = $ohiobulletssql['owner'];
$ohiobulletsnick = $ohiobulletssql['nickname'];

$calbulletssql = mysql_fetch_array(mysql_query("SELECT owner,nickname,maxbet FROM casinos WHERE casino = 'Bullets' AND location = 'California'"));
$calbullets = $calbulletssql['owner'];
$calbulletsnick = $calbulletssql['nickname'];


?>
<html>
<head>
<SCRIPT LANGUAGE="JavaScript" SRC="lol.js">
</SCRIPT>

<link rel="stylesheet" href="more/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="shortcut icon" href="/more/icon.png" type="image/x-icon" />
</head>
<body background="/more/bgtest.png">
<table width="100%" height="335" align="center" cellpadding="0" cellspacing="3">
<tr>
<td width="250" height="25"></td>
<td width="100%"></td>
<td width="250"></td>
</tr>

<tr>
<td width="250" valign="top">
<? include 'leftmenu.php'; ?>
</td>
<td width="100%" valign="top">
<?
?>
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Property owners</b></font></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<br> 
<table width="85%" cellpadding="0" cellspacing = "1" align= "center">
<tr><td bgcolor="#222222" width="100%" height="5" NOWRAP colspan="6"></td></tr>
<tr><td bgcolor="#333333" NOWRAP width="15%"></td><td bgcolor="#333333" NOWRAP width="15%"><font color="white" face="verdana" size="1">Bullet Factory</font></td><td bgcolor="#333333" NOWRAP width="15%"><font color="white" face="verdana" size="1">Dice</font></td><td bgcolor="#333333" NOWRAP width="15%"><font color="white" face="verdana" size="1">Roulette</font></td><td bgcolor="#333333" NOWRAP width="15%"><font color="white" face="verdana" size="1">Races</font></td><td bgcolor="#333333" NOWRAP width="15%"><font color="white" face="verdana" size="1">Blackjack</font></td></tr>


<tr><td bgcolor="#333333" NOWRAP width="15%"><font color="white" face="verdana" size="1">&nbsp;<?if($gethot == 'Las Vegas'){echo"<font color=red><b>Las Vegas</b></font>";}elseif($getcold == 'Las Vegas'){echo"<font color=777777>Las Vegas</font>";}else{echo"Las Vegas";}?></font></td>
<td bgcolor="#222222" NOWRAP width="15%"><a href="viewprofile.php?username=<?echo$lvbullets;?>">&nbsp;<font color="gray" face="verdana" size="1"><? if($lvbullets == 'Blank'){echo"<b>Blank</b>";}else{echo"$lvbullet";}?></font></a></td><td bgcolor="#222222" NOWRAP width="15%"><a href="viewprofile.php?username=<?echo$lvdice;?>">&nbsp;<font color="gray" face="verdana" size="1"><? if($lvdice == 'Blank'){echo"<b>Blank</b>";}else{echo"$lvdic";}?></font></a></td><td bgcolor="#222222" NOWRAP width="15%"><a href="viewprofile.php?username=<?echo$lvrlt;?>">&nbsp;<font color="gray" face="verdana" size="1"><? if($lvrlt == 'Blank'){echo"<b>Blank</b>";}else{echo"$lvrl";}?></font></a></td><td bgcolor="#222222" NOWRAP width="15%"><a href="viewprofile.php?username=<?echo$lvraces;?>">&nbsp;<font color="gray" face="verdana" size="1"><? if($lvraces == 'Blank'){echo"<b>Blank</b>";}else{echo"$lvrace";}?></font></a></td><td bgcolor="#222222" NOWRAP width="15%"><a href="viewprofile.php?username=<?echo$lvbj;?>">&nbsp;<font color="gray" face="verdana" size="1"><? if($lvbj == 'Blank'){echo"<b>Blank</b>";}else{echo"$lvb";}?></font></a></td></tr>

<tr><td bgcolor="#333333" NOWRAP width="15%"><font color="white" face="verdana" size="1">&nbsp;<?if($gethot == 'Washington'){echo"<font color=red><b>Washington</b></font>";}elseif($getcold == 'Washington'){echo"<font color=777777>Washington</font>";}else{echo"Washington";}?></font></td>


<td bgcolor="#222222" NOWRAP width="15%"><a href="viewprofile.php?username=<?echo$washbullets;?>">&nbsp;<font color="gray" face="verdana" size="1"><? if($washbullets == 'Blank'){echo"<b>Blank</b>";}else{echo"$washbullet";}?></font></a></td><td bgcolor="#222222" NOWRAP width="15%"><a href="viewprofile.php?username=<?echo$washdice;?>">&nbsp;<font color="gray" face="verdana" size="1"><? if($washdice == 'Blank'){echo"<b>Blank</b>";}else{echo"$washdic";}?></font></a></td><td bgcolor="#222222" NOWRAP width="15%"><a href="viewprofile.php?username=<?echo$washrlt;?>">&nbsp;<font color="gray" face="verdana" size="1"><? if($washrlt == 'Blank'){echo"<b>Blank</b>";}else{echo"$washrl";}?></font></a></td><td bgcolor="#222222" NOWRAP width="15%"><a href="viewprofile.php?username=<?echo$washraces;?>">&nbsp;<font color="gray" face="verdana" size="1"><? if($washraces == 'Blank'){echo"<b>Blank</b>";}else{echo"$washrace";}?></font></a></td><td bgcolor="#222222" NOWRAP width="15%"><a href="viewprofile.php?username=<?echo$washbj;?>">&nbsp;<font color="gray" face="verdana" size="1"><? if($washbj == 'Blank'){echo"<b>Blank</b>";}else{echo"$washb";}?></font></a></td></tr>

<tr><td bgcolor="#333333" NOWRAP width="15%"><font color="white" face="verdana" size="1">&nbsp;<?if($gethot == 'Los Angeles'){echo"<font color=red><b>Los Angeles</b></font>";}elseif($getcold == 'Los Angeles'){echo"<font color=777777>Los Angeles</font>";}else{echo"Los Angeles";}?></font></td><td bgcolor="#222222" NOWRAP width="15%"><a href="viewprofile.php?username=<?echo$losbullets;?>">&nbsp;<font color="gray" face="verdana" size="1"><? if($losbullets == 'Blank'){echo"<b>Blank</b>";}else{echo"$losbullet";}?></font></a></td><td bgcolor="#222222" NOWRAP width="15%"><a href="viewprofile.php?username=<?echo$ladice;?>">&nbsp;<font color="gray" face="verdana" size="1"><? if($ladice == 'Blank'){echo"<b>Blank</b>";}else{echo"$ladic";}?></font></a></td><td bgcolor="#222222" NOWRAP width="15%"><a href="viewprofile.php?username=<?echo$larlt;?>">&nbsp;<font color="gray" face="verdana" size="1"><? if($larlt == 'Blank'){echo"<b>Blank</b>";}else{echo"$larl";}?></font></a></td><td bgcolor="#222222" NOWRAP width="15%"><a href="viewprofile.php?username=<?echo$laraces;?>">&nbsp;<font color="gray" face="verdana" size="1"><? if($laraces == 'Blank'){echo"<b>Blank</b>";}else{echo"$larace";}?></font></a></td><td bgcolor="#222222" NOWRAP width="15%"><a href="viewprofile.php?username=<?echo$labj;?>">&nbsp;<font color="gray" face="verdana" size="1"><? if($labj == 'Blank'){echo"<b>Blank</b>";}else{echo"$lab";}?></font></a></td></tr>


<tr><td bgcolor="#333333" NOWRAP width="15%"><font color="white" face="verdana" size="1">&nbsp;<?if($gethot == 'New York'){echo"<font color=red><b>New York</b></font>";}elseif($getcold == 'New York'){echo"<font color=777777>New York</font>";}else{echo"New York";}?></font></td>
<td bgcolor="#222222" NOWRAP width="15%"><a href="viewprofile.php?username=<?echo$nybullets;?>">&nbsp;<font color="gray" face="verdana" size="1"><? if($nybullets == 'Blank'){echo"<b>Blank</b>";}else{echo"$nybullet";}?></font></a></td><td bgcolor="#222222" NOWRAP width="15%"><a href="viewprofile.php?username=<?echo$nydice;?>">&nbsp;<font color="gray" face="verdana" size="1"><? if($nydice == 'Blank'){echo"<b>Blank</b>";}else{echo"$nydic";}?></font></a></td><td bgcolor="#222222" NOWRAP width="15%"><a href="viewprofile.php?username=<?echo$nyrlt;?>">&nbsp;<font color="gray" face="verdana" size="1"><? if($nyrlt == 'Blank'){echo"<b>Blank</b>";}else{echo"$nyrl";}?></font></a></td><td bgcolor="#222222" NOWRAP width="15%"><a href="viewprofile.php?username=<?echo$nyraces;?>">&nbsp;<font color="gray" face="verdana" size="1"><? if($nyraces == 'Blank'){echo"<b>Blank</b>";}else{echo"$nyrace";}?></font></a></td><td bgcolor="#222222" NOWRAP width="15%"><a href="viewprofile.php?username=<?echo$nybj;?>">&nbsp;<font color="gray" face="verdana" size="1"><? if($nybj == 'Blank'){echo"<b>Blank</b>";}else{echo"$nyb";}?></font></a></td></tr>

<tr><td bgcolor="#333333" NOWRAP width="15%"><font color="white" face="verdana" size="1">&nbsp;<?if($gethot == 'Louisiana'){echo"<font color=red><b>Louisiana</b></font>";}elseif($getcold == 'Louisiana'){echo"<font color=777777>Louisiana</font>";}else{echo"Louisiana";}?></font></td><td bgcolor="#222222" NOWRAP width="15%"><a href="viewprofile.php?username=<?echo$lsbullets;?>">&nbsp;<font color="gray" face="verdana" size="1"><? if($lsbullets == 'Blank'){echo"<b>Blank</b>";}else{echo"$lsbullet";}?></font></a></td><td bgcolor="#222222" NOWRAP width="15%"><a href="viewprofile.php?username=<?echo$ldice;?>">&nbsp;<font color="gray" face="verdana" size="1"><? if($ldice == 'Blank'){echo"<b>Blank</b>";}else{echo"$ldic";}?></font></a></td><td bgcolor="#222222" NOWRAP width="15%"><a href="viewprofile.php?username=<?echo$lrlt;?>">&nbsp;<font color="gray" face="verdana" size="1"><? if($lrlt == 'Blank'){echo"<b>Blank</b>";}else{echo"$lrl";}?></font></a></td><td bgcolor="#222222" NOWRAP width="15%"><a href="viewprofile.php?username=<?echo$lraces;?>">&nbsp;<font color="gray" face="verdana" size="1"><? if($lraces == 'Blank'){echo"<b>Blank</b>";}else{echo"$lrace";}?></font></a></td><td bgcolor="#222222" NOWRAP width="15%"><a href="viewprofile.php?username=<?echo$lbj;?>">&nbsp;<font color="gray" face="verdana" size="1"><? if($lbj == 'Blank'){echo"<b>Blank</b>";}else{echo"$lb";}?></font></a></td></tr>

<tr><td bgcolor="#333333" NOWRAP width="15%"><font color="white" face="verdana" size="1">&nbsp;<?if($gethot == 'Ohio'){echo"<font color=red><b>Ohio</b></font>";}elseif($getcold == 'Ohio'){echo"<font color=777777>Ohio</font>";}else{echo"Ohio";}?></font></td>
<td bgcolor="#222222" NOWRAP width="15%"><a href="viewprofile.php?username=<?echo$ohiobullets;?>">&nbsp;<font color="gray" face="verdana" size="1"><? if($ohiobullets== 'Blank'){echo"<b>Blank</b>";}else{echo"$ohiobulletsnick";}?></font></a></td><td bgcolor="#222222" NOWRAP width="15%"><a href="viewprofile.php?username=<?echo$ohiodice;?>">&nbsp;<font color="gray" face="verdana" size="1"><? if($ohiodice == 'Blank'){echo"<b>Blank</b>";}else{echo"$ohiodicenick";}?></font></a></td><td bgcolor="#222222" NOWRAP width="15%"><a href="viewprofile.php?username=<?echo$ohiorlt;?>">&nbsp;<font color="gray" face="verdana" size="1"><? if($ohiorlt == 'Blank'){echo"<b>Blank</b>";}else{echo"$ohiorltnick";}?></font></a></td><td bgcolor="#222222" NOWRAP width="15%"><a href="viewprofile.php?username=<?echo$ohioraces;?>">&nbsp;<font color="gray" face="verdana" size="1"><? if($ohioraces == 'Blank'){echo"<b>Blank</b>";}else{echo"$ohioracesnick";}?></font></a></td><td bgcolor="#222222" NOWRAP width="15%"><a href="viewprofile.php?username=<?echo$ohiobj;?>">&nbsp;<font color="gray" face="verdana" size="1"><? if($ohiobj == 'Blank'){echo"<b>Blank</b>";}else{echo"$ohiobjnick";}?></font></a></td></tr>



<tr><td bgcolor="#333333" NOWRAP width="15%"><font color="white" face="verdana" size="1">&nbsp;<?if($gethot == 'California'){echo"<font color=red><b>California</b></font>";}elseif($getcold == 'California'){echo"<font color=777777>California</font>";}else{echo"California";}?></font></td>
<td bgcolor="#222222" NOWRAP width="15%"><a href="viewprofile.php?username=<?echo$calbullets;?>">&nbsp;<font color="gray" face="verdana" size="1"><? if($calbullets== 'Blank'){echo"<b>Blank</b>";}else{echo"$calbulletsnick";}?></font></a></td><td bgcolor="#222222" NOWRAP width="15%"><a href="viewprofile.php?username=<?echo$caldice;?>">&nbsp;<font color="gray" face="verdana" size="1"><? if($caldice == 'Blank'){echo"<b>Blank</b>";}else{echo"$caldicenick";}?></font></a></td><td bgcolor="#222222" NOWRAP width="15%"><a href="viewprofile.php?username=<?echo$calrlt;?>">&nbsp;<font color="gray" face="verdana" size="1"><? if($calrlt == 'Blank'){echo"<b>Blank</b>";}else{echo"$calrltnick";}?></font></a></td><td bgcolor="#222222" NOWRAP width="15%"><a href="viewprofile.php?username=<?echo$calraces;?>">&nbsp;<font color="gray" face="verdana" size="1"><? if($calraces == 'Blank'){echo"<b>Blank</b>";}else{echo"$calracesnick";}?></font></a></td><td bgcolor="#222222" NOWRAP width="15%"><a href="viewprofile.php?username=<?echo$calbj;?>">&nbsp;<font color="gray" face="verdana" size="1"><? if($calbj == 'Blank'){echo"<b>Blank</b>";}else{echo"$calbjnick";}?></font></a></td></tr>


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
<?


$washdice = number_format($washdicea['maxbet']);
$washdic = number_format($washdicea['maxbet']);

$ladice = number_format($ladicea['maxbet']);
$ladic = number_format($ladicea['maxbet']);

$nydice = number_format($nydicea['maxbet']);
$nydic = number_format($nydicea['maxbet']);

$ldice = number_format($ldicea['maxbet']);
$ldic = number_format($ldicea['maxbet']);

$tdice = number_format($tdicea['maxbet']);
$tdic = number_format($tdicea['maxbet']);

$lvdice = number_format($lvdicea['maxbet']);
$lvdic = number_format($lvdicea['maxbet']);


$ohiodice = number_format($ohioeonesql['maxbet']);
$caldice = number_format($calonesql['maxbet']);



$washrlt = number_format($washrlta['maxbet']);
$washrl = number_format($washrlta['maxbet']);

$larlt = number_format($larlta['maxbet']);
$larl = number_format($larlta['maxbet']);

$nyrlt = number_format($nyrlta['maxbet']);
$nyrl = number_format($nyrlta['maxbet']);

$lrlt = number_format($lrlta['maxbet']);
$lrl = number_format($lrlta['maxbet']);

$trlt = number_format($trlta['maxbet']);
$trl = number_format($trlta['maxbet']);

$lvrlt = number_format($lvrlta['maxbet']);
$lvrl = number_format($lvrlta['maxbet']);


$ohiorlt = number_format($ohiorltsql['maxbet']);
$calrlt = number_format($calrltsql['maxbet']);


$washraces = number_format($washracesa['maxbet']);
$washrace = number_format($washracesa['maxbet']);

$laraces = number_format($laracesa['maxbet']);
$larace = number_format($laracesa['maxbet']);

$nyraces = number_format($nyracesa['maxbet']);
$nyrace = number_format($nyracesa['maxbet']);

$lraces = number_format($lracesa['maxbet']);
$lrace = number_format($lracesa['maxbet']);

$traces = number_format($tracesa['maxbet']);
$trace = number_format($tracesa['maxbet']);

$lvraces = number_format($lvracesa['maxbet']);
$lvrace = number_format($lvracesa['maxbet']);


$ohioraces = number_format($ohioracessql['maxbet']);
$calraces = number_format($calracessql['maxbet']);



$washbj = number_format($washbja['maxbet']);
$washb = number_format($washbja['maxbet']);

$labj = number_format($labja['maxbet']);
$lab = number_format($labja['maxbet']);

$nybj = number_format($nybja['maxbet']);
$nyb = number_format($nybja['maxbet']);

$lbj = number_format($lbja['maxbet']);
$lb = number_format($lbja['maxbet']);

$tbj = number_format($tbja['maxbet']);
$tb = number_format($tbja['maxbet']);

$lvbj = number_format($lvbja['maxbet']);
$lvb = number_format($lvbja['maxbet']);


$ohiobj = number_format($ohiobjsql['maxbet']);
$calbj = number_format($calbjsql['maxbet']);

$washbullets = number_format($washbbullets['maxbet']);


$labullets = number_format($losbulletss['maxbet']);


$nybullets = number_format($newyorkbullets['maxbet']);


$lousbullets = number_format($louisbullets['maxbet']);



$losveg = number_format($lasvegasbullets['maxbet']);


$ohiobullets = number_format($ohiobulletssql['maxbet']);
$calbullets = number_format($calbulletssql['maxbet']);




?>

<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Maximum bets</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>
<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<br> 
<table width="85%" cellpadding="0" cellspacing = "1" align= "center">
<tr><td bgcolor="#222222" width="100%" height="5" NOWRAP colspan="6"></td></tr>
<tr><td bgcolor="#333333" NOWRAP width="15%"></td><td bgcolor="#333333" NOWRAP width="15%"><font color="white" face="verdana" size="1">Bullet Factory</font></td><td bgcolor="#333333" NOWRAP width="15%"><font color="white" face="verdana" size="1">Dice</font></td><td bgcolor="#333333" NOWRAP width="15%"><font color="white" face="verdana" size="1">Roulette</font></td><td bgcolor="#333333" NOWRAP width="15%"><font color="white" face="verdana" size="1">Races</font></td><td bgcolor="#333333" NOWRAP width="15%"><font color="white" face="verdana" size="1">Blackjack</font></td></tr>
<tr><td bgcolor="#333333" NOWRAP width="15%"><font color="white" face="verdana" size="1">&nbsp;Las Vegas</font></td><td bgcolor="#222222" NOWRAP width="15%"><font color="gray" face="verdana" size="1"><? if($losveg == '0'){echo"<b>Free</b>";}else{echo"$$losveg";}?></font></td><td bgcolor="#222222" NOWRAP width="15%"><font color="gray" face="verdana" size="1"><? if($lvdice == '999,999,999,999'){echo"<b>Infinite</b>";}else{echo"$$lvdic";}?></font></td><td bgcolor="#222222" NOWRAP width="15%"><font color="gray" face="verdana" size="1"><? if($lvrlt == '99,999,999,999'){echo"<b>Infinite</b>";}else{echo"$$lvrl";}?></font></td><td bgcolor="#222222" NOWRAP width="15%"><font color="gray" face="verdana" size="1"><? if($lvraces == '999,999,999,999'){echo"<b>Infinite</b>";}else{echo"$$lvrace";}?></font></td><td bgcolor="#222222" NOWRAP width="15%"><font color="gray" face="verdana" size="1"><? if($lvbj == '999,999,999,999'){echo"<b>Infinite</b>";}else{echo"$$lvb";}?></font></td></tr><tr><td bgcolor="#333333" NOWRAP width="15%"><font color="white" face="verdana" size="1">&nbsp;Washington</font></td><td bgcolor="#222222" NOWRAP width="15%"><font color="gray" face="verdana" size="1"><? if($washbullets == '0'){echo"<b>Free</b>";}else{echo"$$washbullets";}?></font></td><td bgcolor="#222222" NOWRAP width="15%"><font color="gray" face="verdana" size="1"><? if($washdice == '999,999,999,999'){echo"<b>Infinite</b>";}else{echo"$$washdic";}?></font></td><td bgcolor="#222222" NOWRAP width="15%"><font color="gray" face="verdana" size="1"><? if($washrlt == '999,999,999,999'){echo"<b>Infinite</b>";}else{echo"$$washrl";}?></font></td><td bgcolor="#222222" NOWRAP width="15%"><font color="gray" face="verdana" size="1"><? if($washraces == '999,999,999,999'){echo"<b>Infinite</b>";}else{echo"$$washrace";}?></font></td><td bgcolor="#222222" NOWRAP width="15%"><font color="gray" face="verdana" size="1"><? if($washbj == '999,999,999,999'){echo"<b>Infinite</b>";}else{echo"$$washb";}?></font></td></tr><tr><td bgcolor="#333333" NOWRAP width="15%"><font color="white" face="verdana" size="1">&nbsp;Los Angeles</font></td><td bgcolor="#222222" NOWRAP width="15%"><font color="gray" face="verdana" size="1"><? if($labullets == '0'){echo"<b>Free</b>";}else{echo"$$labullets";}?></font></td><td bgcolor="#222222" NOWRAP width="15%"><font color="gray" face="verdana" size="1"><? if($ladice == '999,999,999,999'){echo"<b>Infinite</b>";}else{echo"$$ladic";}?></font></td><td bgcolor="#222222" NOWRAP width="15%"><font color="gray" face="verdana" size="1"><? if($larlt == '999,999,999,999'){echo"<b>Infinite</b>";}else{echo"$$larl";}?></font></td><td bgcolor="#222222" NOWRAP width="15%"><font color="gray" face="verdana" size="1"><? if($laraces == '999,999,999,999'){echo"<b>Infinite</b>";}else{echo"$$larace";}?></font></td><td bgcolor="#222222" NOWRAP width="15%"><font color="gray" face="verdana" size="1"><? if($labj == '999,999,999,999'){echo"<b>Infinite</b>";}else{echo"$$lab";}?></font></td></tr>
<tr><td bgcolor="#333333" NOWRAP width="15%"><font color="white" face="verdana" size="1">&nbsp;New York</font></td><td bgcolor="#222222" NOWRAP width="15%"><font color="gray" face="verdana" size="1"><? if($nybullets == '0'){echo"<b>Free</b>";}else{echo"$$nybullets";}?></font></td><td bgcolor="#222222" NOWRAP width="15%"><font color="gray" face="verdana" size="1"><? if($nydice == '999,999,999,999'){echo"<b>Infinite</b>";}else{echo"$$nydic";}?></font></td><td bgcolor="#222222" NOWRAP width="15%"><font color="gray" face="verdana" size="1"><? if($nyrlt == '999,999,999,999'){echo"<b>Infinite</b>";}else{echo"$$nyrl";}?></font></td><td bgcolor="#222222" NOWRAP width="15%"><font color="gray" face="verdana" size="1"><? if($nyraces == '999,999,999,999'){echo"<b>Infinite</b>";}else{echo"$$nyrace";}?></font></td><td bgcolor="#222222" NOWRAP width="15%"><font color="gray" face="verdana" size="1"><? if($nybj == '999,999,999,999'){echo"<b>Infinite</b>";}else{echo"$$nyb";}?></font></td></tr>
<tr><td bgcolor="#333333" NOWRAP width="15%"><font color="white" face="verdana" size="1">&nbsp;Louisiana</font></td><td bgcolor="#222222" NOWRAP width="15%"><font color="gray" face="verdana" size="1"><? if($lousbullets == '0'){echo"<b>Free</b>";}else{echo"$$lousbullets";}?></font></td><td bgcolor="#222222" NOWRAP width="15%"><font color="gray" face="verdana" size="1"><? if($ldice == '999,999,999,999'){echo"<b>Infinite</b>";}else{echo"$$ldic";}?></font></td><td bgcolor="#222222" NOWRAP width="15%"><font color="gray" face="verdana" size="1"><? if($lrlt == '999,999,999,999'){echo"<b>Infinite</b>";}else{echo"$$lrl";}?></font></td><td bgcolor="#222222" NOWRAP width="15%"><font color="gray" face="verdana" size="1"><? if($lraces == '999,999,999,999'){echo"<b>Infinite</b>";}else{echo"$$lrace";}?></font></td><td bgcolor="#222222" NOWRAP width="15%"><font color="gray" face="verdana" size="1"><? if($lbj == '999,999,999,999'){echo"<b>Infinite</b>";}else{echo"$$lb";}?></font></td></tr>

<tr><td bgcolor="#333333" NOWRAP width="15%"><font color="white" face="verdana" size="1">&nbsp;Ohio</font></td><td bgcolor="#222222" NOWRAP width="15%"><font color="gray" face="verdana" size="1"><? if($ohiobullets == '0'){echo"<b>Free</b>";}else{echo"$$ohiobullets";}?></font></td><td bgcolor="#222222" NOWRAP width="15%"><font color="gray" face="verdana" size="1"><? if($ohiodice == '999,999,999,999'){echo"<b>Infinite</b>";}else{echo"$$ohiodice";}?></font></td><td bgcolor="#222222" NOWRAP width="15%"><font color="gray" face="verdana" size="1"><? if($ohiorlt == '999,999,999,999'){echo"<b>Infinite</b>";}else{echo"$$ohiorlt";}?></font></td><td bgcolor="#222222" NOWRAP width="15%"><font color="gray" face="verdana" size="1"><? if($ohioraces == '999,999,999,999'){echo"<b>Infinite</b>";}else{echo"$$ohioraces";}?></font></td><td bgcolor="#222222" NOWRAP width="15%"><font color="gray" face="verdana" size="1"><? if($ohiobj == '999,999,999,999'){echo"<b>Infinite</b>";}else{echo"$$ohiobj";}?></font></td></tr>



<tr><td bgcolor="#333333" NOWRAP width="15%"><font color="white" face="verdana" size="1">&nbsp;California</font></td><td bgcolor="#222222" NOWRAP width="15%"><font color="gray" face="verdana" size="1"><? if($calbullets == '0'){echo"<b>Free</b>";}else{echo"$$calbullets";}?></font></td><td bgcolor="#222222" NOWRAP width="15%"><font color="gray" face="verdana" size="1"><? if($caldice == '999,999,999,999'){echo"<b>Infinite</b>";}else{echo"$$caldice";}?></font></td><td bgcolor="#222222" NOWRAP width="15%"><font color="gray" face="verdana" size="1"><? if($calrlt == '999,999,999,999'){echo"<b>Infinite</b>";}else{echo"$$calrlt";}?></font></td><td bgcolor="#222222" NOWRAP width="15%"><font color="gray" face="verdana" size="1"><? if($calraces == '999,999,999,999'){echo"<b>Infinite</b>";}else{echo"$$calraces";}?></font></td><td bgcolor="#222222" NOWRAP width="15%"><font color="gray" face="verdana" size="1"><? if($calbj == '999,999,999,999'){echo"<b>Infinite</b>";}else{echo"$$calbj";}?></font></td></tr>
</table>
<?php 


?><br>
</td>
<td width="8" background="/more/rightb.png" NOWRAP></td>
</tr>

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

</body>
<head><META HTTP-EQUIV="Pragma" CONTENT="no-cache"></head></html>