<? include 'included.php'; 


$countdeaduserssql = mysql_query("SELECT * FROM statis");
$countdeadusersa = mysql_fetch_array($countdeaduserssql);
$countdeadusers =  $countdeadusersa['alive'];
$countusers =  $countdeadusersa['allof'];

$start = number_format($countdeadusers / $countusers * 100, 1);


$countdeadmoneysql = mysql_query("SELECT SUM(amount) AS b FROM bank");
$countdeadmoneyarray = mysql_fetch_array($countdeadmoneysql);
$countdeadmoney = $countdeadmoneyarray['b'];



$countmoneysql = mysql_query("SELECT SUM(money + swiss) AS b FROM users WHERE status = 'Alive' AND rankid < '25'");
$countmoneyarray = mysql_fetch_array($countmoneysql);
$countmoneyraw = $countmoneyarray['b'];




$countmoneysqaaal = mysql_query("SELECT SUM(cash) AS b FROM crews");
$countmoneyassaxarray = mysql_fetch_array($countmoneysqaaal);
$gre  = $countmoneyassaxarray['b'];


$countmoney = $countmoneyraw + $countdeadmoney + $ttttts + $tttttss + $gre;


$average = floor($countmoney / $countusers);




 

$kills = mysql_query("SELECT victim,rankid FROM kills WHERE victim != 'Tony' ORDER BY id DESC LIMIT 0,20");

?>

<html>
<head>
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

<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Game statistics</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">

<br>

<table align="center" width="55%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td  background="/more/top.png" NOWRAP align=center><font color="white" size="1" face="verdana">General Statistics</font></font></font></td>
<td width="8"  background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png"></td>
<td background="/more/crossbg.png"><table width="100%" cellpadding="0" cellspacing="2" align="center">

<tr><td height="10" bgcolor="#333333" NOWRAP><font color="silver" size="1" face="verdana">&nbsp;Total users: <? echo number_format($countusers); ?></font></td></tr>
<tr><td height="10" bgcolor="#333333" NOWRAP><font color="silver" size="1" face="verdana">&nbsp;Total dead users: <? echo number_format($countdeadusers); ?> </font><font color="white" size="1" face="verdana">(<?echo$start;?>%)</font></td></tr>
<tr><td height="10" bgcolor="#333333" NOWRAP><font color="silver" size="1" face="verdana">&nbsp;Total game money: $<? echo number_format($countmoney); ?></font></td></tr>
<tr><td height="10" bgcolor="#333333" NOWRAP><font color="silver" size="1" face="verdana">&nbsp;Total money in bank: $<? echo number_format($countdeadmoney); ?></font></td></tr>
<tr><td height="10" bgcolor="#333333" NOWRAP><font color="silver" size="1" face="verdana">&nbsp;Average player money: $<? echo number_format($average); ?></font></td></tr>
</table></td>
<td width="8" background="/more/rightb.png"></td>
</tr>


<tr>
<td width="8" height="9" background="/more/bottomleft.png"></td>
<td height="9" background="/more/bottom.png"></td>
<td width="8" height="9" background="/more/bottomright.png"></td>
</tr>
</table>
<br>




<table align="center" width="55%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height=22  background="/more/topleft.png"></td>
<td  background="/more/top.png" NOWRAP align=center><font color="white" size="1" face="verdana">Last 20 Kills</font></font></font></td>
<td width="8"  background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png"></td>
<td background="/more/crossbg.png">
<table width="100%" cellpadding="0" cellspacing="3" align="center">
<tr><td height=15 width=35% bgcolor=#222222 NOWRAP align=center ><font size=2 color=silver face=verdana>&nbsp;Username:</font></td><td height=10 width=65% bgcolor=#222222 NOWRAP align=center><font color=silver size=2  face=verdana>&nbsp;Rank:</font></td></tr>

<? while($lasttenkilled = mysql_fetch_array($kills)){
$name = $lasttenkilled['victim'];
$modranks = $lasttenkilled['rankid'];
$modranksent = $lasttenkilled['ent'];

$etests = $modranksent;

if($etests > '0'){$modrank = '<b>Entertainer</b>';}
elseif($modranks == '1'){ $modrank = 'Tramp'; }
elseif($modranks == '2'){ $modrank = 'Citizen';}
elseif($modranks == '3'){ $modrank = 'Wise Guy';}
elseif($modranks == '4'){ $modrank = 'Thug';}
elseif($modranks == '5'){ $modrank = 'Respected Thug';}
elseif($modranks == '6'){ $modrank = 'Mobster';}
elseif($modranks == '7'){ $modrank = 'Respected Mobster';}
elseif($modranks == '8'){ $modrank = 'Assassin';}
elseif($modranks == '9'){ $modrank = 'Respected Assassin';}
elseif($modranks == '10'){ $modrank = 'Mafioso';}
elseif($modranks == '11'){ $modrank = 'Respected Mafioso';}
elseif($modranks == '12'){ $modrank = 'Underboss';}
elseif($modranks == '13'){ $modrank = 'Respected Underboss';}
elseif($modranks == '14'){ $modrank = 'Boss';}
elseif($modranks == '15'){ $modrank = 'Respected Boss';}
elseif($modranks == '16'){ $modrank = '<b>Godfather</b>';}
elseif($modranks == '17'){ $modrank = '<b>Respected Godfather</b>';}
elseif($modranks == '18'){ $modrank = '<b>Gangster</b>';}
elseif($modranks == '19'){ $modrank = '<b>Respected Gangster</b>';}
elseif($modranks == '20'){ $modrank = '<b>Don</b>';}
elseif($modranks == '21'){ $modrank = '<b>Respected Don</b>';}
elseif($modranks == '22'){ $modrank = '<b>Tough Don</b>';}
elseif($modranks == '25'){ $modrank = '<b>Entertainer Manager</b>';}
elseif($modranks == '50'){ $modrank = '<b>Moderator</b>';}
elseif($modranks == '75'){ $modrank = '<b>HDO Manager</b>';}
elseif($modranks == '100'){ $modrank = '<b>Administrator</b>';}
else{$modrank = '';}
$etests = 0;
echo"<tr><td height=10 width=35% bgcolor=#333333 NOWRAP><font size=1>&nbsp;</font><a href=viewprofile.php?username=$name>$name</a></td><td height=10 width=65% bgcolor=#333333 NOWRAP><font color=silver size=1  face=verdana>&nbsp;$modrank</font></td></tr>";}?>
</table></td>
<td width="8" background="/more/rightb.png"></td>
</tr>


<tr>
<td width="8" height="9" background="/more/bottomleft.png"></td>
<td height="9" background="/more/bottom.png"></td>
<td width="8" height="9" background="/more/bottomright.png"></td>
</tr>
</table>

<br><br>
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

