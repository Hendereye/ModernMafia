<html><body>







<?php

error_reporting(0);

$time = time();

$usermoney = $statustesttwo['money'];
$userhealth = $statustesttwo['health'];
$userrankup = floor($statustesttwo['rankup']);

$userrankups = number_format($statustesttwo['rankup'], 2);


$rankbar = $statustesttwo['rankbar'];
$shownot = $statustesttwo['shownot'];
$precise = $statustesttwo['precise'];
$userlocation = $statustesttwo['location'];
$userbullets = $statustesttwo['bullets'];
$userpoints = $statustesttwo['points'];
$usergunnumber =$statustesttwo['gun'];
$userprotectionnumber =$statustesttwo['protection'];
$userrankid =$statustesttwo['rankid'];
$usercrewid =$statustesttwo['crewid'];
$penpoints =$statustesttwo['penpoints'];
$tips =$statustesttwo['tips'];
$melt = $statustesttwo['melt'];
$kills = $statustesttwo['kills'];
$mail = $statustesttwo['mail'];
$granade = $statustesttwo['grenades'];
$notif = $statustesttwo['notification'];
$notify = $statustesttwo['notify'];

$aapattern[1] = "a_open";
$aapattern[2] = "a_closed";
$aapattern[3] = "a_slash";
$aapattern[4] = "_here_";
$aapattern[5] = "tehee";

$aareplace[1] = "<a href=viewprofile.php?username=";
$aareplace[2] = "><b>";
$aareplace[3] = "</b></a>";
$aareplace[4] = "<a href=points.php?notification=1#bodygaurds><b>here</a></b>";
$aareplace[5] = "No recent notifications!";


$notifs = str_replace($aapattern,$aareplace,$notif);




$zpattern[a] = "<";
$zpattern[b] = ">";
$zreplace[a] = "&lt;";
$zreplace[b] = "&gt";

if($usergunnumber == '0'){ $usergun = 'None';}
elseif($usergunnumber == '1'){ $usergun = 'Air Rifle';}
elseif($usergunnumber == '2'){ $usergun = 'Colt 1911 .45 auto';}
elseif($usergunnumber == '3'){ $usergun = 'M9 Beretta 9mm Pistol';}
elseif($usergunnumber == '4'){ $usergun = 'Bren Ten 10mm';}
elseif($usergunnumber == '5'){ $usergun = 'M21 sniper rifle';}
elseif($usergunnumber == '6'){ $usergun = 'AK - 47';}
elseif($usergunnumber == '7'){ $usergun = 'Marui M4';}
elseif($usergunnumber == '8'){ $usergun = '7.62-mm SVD DRAGUNOV';}
elseif($usergunnumber == '9'){ $usergun = 'FN F2000 Assault Rifle';}
elseif($usergunnumber == '10'){ $usergun = 'M249 Para SAW';}

if($userprotectionnumber == '1'){ $userprotection = 'None';}
elseif($userprotectionnumber == '2'){ $userprotection = 'Modular Tactical Assault Vest';}
elseif($userprotectionnumber == '3'){ $userprotection = 'Overt Tactical Vest';}
elseif($userprotectionnumber == '4'){ $userprotection = 'Light Infantry Vest';}
elseif($userprotectionnumber == '5'){ $userprotection = 'Infantry Battle Assault Vest';}
elseif($userprotectionnumber == '6'){ $userprotection = 'LBA 305 Military Vest';}
elseif($userprotectionnumber == '7'){ $userprotection = 'FBI Tactical vest';}
elseif($userprotectionnumber == '8'){ $userprotection = 'SWAT Tactical vest';}
elseif($userprotectionnumber == '9'){ $userprotection = 'Heavy Military Vest';}

if($userrankid == '1'){ $userrank = 'Tramp';}
elseif($userrankid == '2'){ $userrank = 'Citizen';}
elseif($userrankid == '3'){ $userrank = 'Wise Guy';}
elseif($userrankid == '4'){ $userrank = 'Thug';}
elseif($userrankid == '5'){ $userrank = 'Respected Thug';}
elseif($userrankid == '6'){ $userrank = 'Mobster';}
elseif($userrankid == '7'){ $userrank = 'Respected Mobster';}
elseif($userrankid == '8'){ $userrank = 'Assassin';}
elseif($userrankid == '9'){ $userrank = 'Respected Assassin';}
elseif($userrankid == '10'){ $userrank = 'Mafioso';}
elseif($userrankid == '11'){ $userrank = 'Respected Mafioso';}
elseif($userrankid == '12'){ $userrank = 'Underboss';}
elseif($userrankid == '13'){ $userrank = 'Respected Underboss';}
elseif($userrankid == '14'){ $userrank = 'Boss';}
elseif($userrankid == '15'){ $userrank = 'Respected Boss';}
elseif($userrankid == '16'){ $userrank = 'Godfather';}
elseif($userrankid == '17'){ $userrank = 'Respected Godfather';}
elseif($userrankid == '18'){ $userrank = 'Don';}
elseif($userrankid == '19'){ $userrank = 'Respected Don';}
elseif($userrankid == '20'){ $userrank = 'Gangster';}
elseif($userrankid == '21'){ $userrank = 'Respected Gangster';}
elseif($userrankid == '22'){ $userrank = 'Infamous Gangster';}
elseif($userrankid == '25'){ $userrank = 'Entertainer Manager';}
elseif($userrankid == '50'){ $userrank = 'Moderator';}
elseif($userrankid == '65'){ $userrank = 'HDO Manager';}
elseif($userrankid == '75'){ $userrank = 'Lead Moderator';}
elseif($userrankid == '100'){ $userrank = 'Administrator';}
else{ $userrank = 'Error, please contact the administrator immediately';}

if($ent == '1'){$userrank = "$userrank / Entertainer";}

$count = "N/A"; 


if($usercrewid == '0'){$usercrew = ' None';}
else{
$usercrewsql = mysql_query("SELECT name FROM crews WHERE id = '$usercrewid'");
$usercrewarray = mysql_fetch_array($usercrewsql);
$usercrewname = html_entity_decode($usercrewarray['name'],ENT_QUOTES);
$usercrew = str_replace($zpattern,$zreplace,$usercrewname);}



?>

<head>
<script>
function noted(){
urnamed=<?echo$ida;?>;
	var ajaxRequest;  
	try{ajaxRequest = new XMLHttpRequest();} catch (e){
        try{ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");} catch (e) {
	try{ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");} catch (e){

alert("Your browser broke1!");return false;}}}
	

var strhehefd = "&rand="+Math.random();
	ajaxRequest.open("GET", "oknotification.php?id=" + urnamed + strhehefd, true);
        ajaxRequest.send(null); 



document.getElementById("tdbar").innerHTML = '<center><img alt=.. src=loading.gif></center>';
         setTimeout("document.getElementById('notbar').style.display = 'none';",1000);
     }



</script>
<title id=newtitle>Immaculate Gangsters</title><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
</head>
<?

if($_GET['tips'] == 1){$tips = 1;}


if($_GET['username']){$urlmore = "&username=$getname";}
if($_GET['topicid']){$urlmoremore = "&topicid=$topicid";}
if($_GET['id']){$urlmoremoremore = "&id=$getid";}
if($_GET['replyid']){$urlmoremoremoremore = "&replyid=$getreply";}
$bar =  $_SERVER['PHP_SELF'];


if($tips == '0'){?>

<table align="center"  width=216  cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td><?$rand = mt_rand(0,1); if($rand == '0'){$title = 'Make Cash Fast';}else{$title = 'Rank Up Fast';}?>
<td height="22" background="/more/top.png"width=200 NOWRAP align=center><font color="silver" face="verdana" size="1">Suggestions&nbsp;</font><font color=silver size=1 face=verdana><a href=<?echo"$bar?tips=1$urlmore$urlmoremore$urlmoremoremoreurlmoremoremoremore";?>><font color='silver'>(</font><font color=khaki>x</font><font color='silver'>)</font></a></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png" width=200>

<table width=100% cellpadding="0" cellspacing="1">
<tr><td width=15%></td><td width=75%>

<table align="left" cellpadding="0" cellspacing="1">
<tr><td height="5"></td></tr>
<tr><td height="8"><font color="#FFFFFF" size="1" face="verdana"><?
if($rand == '0'){

$mt = mt_rand(0,4); if($mt == '0'){echo'<a href=crimes.php style=color:white;>Commiting Crimes</a>';}elseif($mt == '1'){echo'<a href=or.php style=color:white;>Organised Robberies</a>';}elseif($mt == '2'){echo'<a href=jail.php style=color:white;>Bust People From Jail</a>';}elseif($mt == '3'){echo'<a href=buy.php style=color:white;>Buying/Selling Cars</a>';}else{echo'<a href=refferal.php style=color:white;>View The Refferal System</a>';}
}
else{

$mt = mt_rand(0,5); if($mt == '0'){echo'<a href=crimes.php style=color:white;>Commiting Crimes</a>';}elseif($mt == '1'){echo'<a href=or.php style=color:white;>Organised Robberies</a>';}elseif($mt == '2'){echo'<a href=jail.php style=color:white;>Bust People From Jail</a>';}elseif($mt == '3'){echo'<a href=crimes.php style=color:white;>Commiting Crimes</a>';}elseif($mt == '4'){echo"<a href=supply.php style=color:white;>Supply Bullets</a>";}else{echo'<a href=steal.php style=color:white;>Steal Cars</a>';}
}

?></font></td></tr>
<tr><td height="3"></td></tr>
</table>

</td><td width=10%></td></tr>
</table>

</td>
<td width="8" background="/more/rightb.png" NOWRAP></td>
</tr>

<tr><td width="8" height="9" background="/more/bottomleft.png"></td>
<td height="9" background="/more/bottom.png"></td>
<td width="8" height="9" background="/more/bottomright.png"></td>
</tr>

</table>
<?}

if($shownot == '0'){

if(($mail != '0') || ($notify != '0')){

if($hide == '1'){}else{
$satenin = 1;

?>

<table align="center"  width=216  cellpadding="0" cellspacing="0" id=notbar>
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png"width=200 NOWRAP id=tdbar><font color="222222" face="verdana" size="1"><center><b>Latest Notification</b> <?if($mail <= 0){echo"<a href=$bar?not=1$urlmore$urlmoremore$urlmoremoremoreurlmoremoremoremore onclick='noted();return false;'>(<font color=khaki>x</font>)</a>";}?></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png" width=200>

<table width=100% cellpadding="0" cellspacing="1">
<tr><td width=10%></td><td width=80%>

<table align="left" cellpadding="0" cellspacing="1">
<tr><td height="8"></td></tr>
<tr><td height="8"><font color="white" size="1" face="verdana"><? 


if($mail > '0'){echo'&nbsp;&nbsp;<a href="inbox.php" onload=changetitle()><font color="khaki" face="verdana" size="4"><b>New Mail</b></font></a><br>';}else{?><? if(!$notifs){echo"<font color=white fave=verdana size=1><b>Commit Crimes and steal cars now!</b></font></a>, Make alot of cash by stealing/sellings your cars and commiting crimes!";}else{echo"$notifs";}}?></font></td></tr>
<tr><td height="8"></td></tr>
</table>
</td><td width=10%></td></tr></table>
</td>
<td width="8" background="/more/rightb.png" NOWRAP></td>
</tr>

<tr><td width="8" height="9" background="/more/bottomleft.png"></td>
<td height="9" background="/more/bottom.png"></td>
<td width="8" height="9" background="/more/bottomright.png"></td>
</tr>

</table><? }}}


?>
<?if($satenin != 1){?><span id=inboxspantehe style=display:none;><table align="center"  width=216  cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" width=200 NOWRAP><font color="222222" face="verdana" size="1"><center><b>Latest Notification</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png" width=200>

<table width=100% cellpadding="0" cellspacing="1">
<tr><td width=10%></td><td width=80%>

<table align="left" cellpadding="0" cellspacing="1">
<tr><td height="8"></td></tr>
<tr><td height="8"><font color="white" size="1" face="verdana">&nbsp;&nbsp;<a href="inbox.php"><font color="khaki" face="verdana" size="4"><b>New Mail</b></font></a><br></font></td></tr>
<tr><td height="8"></td></tr>
</table>
</td><td width=10%></td></tr></table>
</td>
<td width="8" background="/more/rightb.png" NOWRAP></td>
</tr>

<tr><td width="8" height="9" background="/more/bottomleft.png"></td>
<td height="9" background="/more/bottom.png"></td>
<td width="8" height="9" background="/more/bottomright.png"></td>
</tr>

</table></span><?}?>

<table align="center"  width=216  cellpadding="0"  cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png"width=200 NOWRAP><font color="222222" face="verdana" size="1"><center><b>Your Statistics</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png" width=200>
<table width=100% cellpadding="0" cellspacing="1">
<tr><td width=15%></td><td width=85%>
<table align="left" cellpadding="0" cellspacing="1">
<tr><td height="8"></td></tr>
<? if(($shownot == '1')&&($mail > '0')){echo'<tr><td height=8><a href="inbox.php"><font color="khaki" face="verdana" size="4"><b>New Mail</b></font></a></td></tr><tr><td height=8></td></tr>';}elseif($penpoints > '1'){echo"<tr><td height=8><a href=ipsharing.php><font color=red face=verdana size=1>You have $penpoints pen points</font></a><br><br></td></tr>";}?>
<? if($penpoints == '1'){echo"<tr><td height=8><a href=ipsharing.php><font color=orange face=verdana size=1>You have 1 pen point</font></a><br><br></td></tr>";}elseif($penpoints > '1'){echo"<tr><td height=8><a href=ipsharing.php><font color=red face=verdana size=1>You have $penpoints pen points</font></a><br><br></td></tr>";}?>
<tr><td height="8"><font color="silver" size="1" face="verdana"><? if($userrankid < '5'){echo'<b><font color=white>';}?>Money:<? if($userrankid < '5'){echo'</font></b>';}?></font></td></tr>
<tr><td height="8"><font color="white" size="1" face="verdana">$<? echo number_format($usermoney); ?></font></td></tr>
<tr><td height="12"></td></tr>
<tr><td height="8"><a href=hospital.php><font color="silver" size="1" face="verdana">Health:</font></a></td></tr>
<tr><td height="8"><a href=hospital.php><?if($userhealth > '75'){$color='white';}elseif($userhealth > '50'){$color='peru';}elseif($userhealth >= '0'){$color='yellow';} echo"<font color=$color size=1 face=verdana>"; echo floor($userhealth); ?>%</font></a></td></tr>
<tr><td height="12"></td></tr>
<tr><td height="8"><font color="silver" size="1" face="verdana">Weapon:</font></td></tr>
<tr><td height="8" nowrap><font color="white" size="1" face="verdana"><? echo $usergun; if ($silencer != '0'){echo'(S)';}?></font></td></tr>
<tr><td height="12"></td></tr>
<tr><td height="8"><font color="silver" size="1" face="verdana">Armour:</font></td></tr>
<tr><td height="8"><font color="white" size="1" face="verdana"><? echo $userprotection; ?></font></td></tr>
<tr><td height="12"></td></tr>
<tr><td height="8"><font color="silver" size="1" face="verdana">Rank:</font></td></tr>
<tr><td height="8"><font color="white" size="1" face="verdana"><? echo $userrank;?></font></td></tr>
<?php 

if($userrankid >= '22'){}else{
if($precise > '0') {
?><tr><td height="12"></td></tr>
<tr><td height="8"><font color="silver" size="1" face="verdana">Rank Progress:</font></td></tr>
<tr><td height="8"><table cellpadding=1 cellspacing=1 width=100%><tr><Td height=1 width=<?if($userrankups < '1'){echo'1';}else{echo$userrankups;}?>% bgcolor=lime></td><td bgcolor=red></td></tr><tr><td colspan=2 align=left><font color="white" size="1" face="verdana"><?echo$userrankups;?>%</font></td></tr></table></td></tr><? }

else{if($userrankid < '5'){

?><tr><td height="12"></td></tr>
<tr><td height="8"><font color="white" size="1" face="verdana"><b>Rank Progress</b>:</font></td></tr>
<tr><td height="8"><table  cellpadding=1 cellspacing=1  width=100%><tr><Td  height=1 width=<?if($userrankup < '1'){echo'1';}else{echo$userrankup;}?>% bgcolor=lime></td><td bgcolor=red></td></tr><tr><td colspan=2 align=left><font color="white" size="1" face="verdana"><?echo$userrankup;?>%</font></td></tr></table></td></tr><?


} else{

?><tr><td height="12"></td></tr>
<tr><td height="8"><font color="silver" size="1" face="verdana">Rank Progress:</font></td></tr>
<tr><td height="8"><table cellpadding=1 cellspacing=1   width=100%><tr><Td  height=1 width=<?if($userrankup < '1'){echo'1';}else{echo$userrankup;}?>% bgcolor=lime></td><td bgcolor=red></td></tr><tr><td colspan=2 align=left><font color="white" size="1" face="verdana"><?echo$userrankup;?>%</font></td></tr></table></td></tr><?}
} }

?>
<tr><td height="12"></td></tr>
<tr><td height="8"><font color="silver" size="1" face="verdana">Bullets:</font></td></tr>
<tr><td height="8"><font color="white" size="1" face="verdana"><? echo number_format($userbullets); ?></font></td></tr>
<tr><td height="12"></td></tr>
<tr><td height="8"><a href="points.php"><font color="silver" size="1" face="verdana">Points:</font></a></td></tr>
<tr><td height="8"><a href="points.php"><font color="white" size="1" face="verdana"><? echo number_format($userpoints); ?></font></a></td></tr>
<tr><td height="12"></td></tr>
<tr><td height="8"><font color="silver" size="1" face="verdana">Location:</font></td></tr>
<tr><td height="8"><font color="white" size="1" face="verdana"><? if($locition == $gethot){echo'<font color="khaki" size="1" face="verdana">';}elseif($locition == $getcold){echo'<font color="777777" size="1" face="verdana">';}else{}echo $userlocation;?></font></td></tr>
<tr><td height="12"></td></tr>
<tr><td height="8"><font color="silver" size="1" face="verdana">Crew:</font></td></tr>
<tr><td height="8"><font color="white" size="1" face="verdana"><? echo $usercrew; ?></font></td></tr>
<tr><td height="12"></td></tr>
</table>
</td></tr></table>
</td>
<td width="8" background="/more/rightb.png" NOWRAP></td>
</tr>

<tr><td width="8" height="9" background="/more/bottomleft.png"></td>
<td height="9" background="/more/bottom.png"></td>
<td width="8" height="9" background="/more/bottomright.png"></td>
</tr>

</table>
<table align="center" width=216  cellpadding="0"  cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" width=200 NOWRAP><font color="222222" face="verdana" size="1"><b><center>Offence</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png" width=200>
<table width=100% cellpadding="0" cellspacing="1">
<tr><td width=15%></td><td width=85%>
<table align="left" cellpadding="0" cellspacing="1">
<tr><td height="8"></td></tr>
<?$melttime = $melt - $time;if($melttime <= 0){$db = 0;$ctwo = "white";}else{$ctwo = "silver";}?>
<tr><td height="8" align=left><a href=melt.php><font color="silver" size="1" face="verdana">Melt:&nbsp;</font><font color="<?echo$ctwo;?>" size="1" face="verdana"><?if($db == '1'){echo'<b>';}$melttime = $melt - $time;if($melttime <= 0){echo"Available";}else{echo"$melttime"; echo" seconds";}if($db == '1'){echo'</b>';}?></font></a></td></tr>
<tr><td height="5"></td></tr><?$steal = $statustesttwo['steal'];$stealtime = $steal - $time;if($stealtime <= 0){$cb = 0;$cone = "white";}else{$cone = "silver";}?>
<tr><td height="8" align=left><a href=steal.php><font color="silver" size="1" face="verdana">Steal:&nbsp;</font><font color="<?echo$cone;?>" size="1" face="verdana"><?if($cb == '1'){echo'<b>';}if($stealtime <= 0){echo"Available";}else{echo"$stealtime"; echo" seconds";}if($cb == '1'){echo'</b>';}?></font></a></td></tr>
<tr><td height="5"></td></tr>
<?
$time = time();
$timer = ceil($statustesttwo['timer']);
$htime = $timer - $time;

$totalh = $htime / 3600;
$totalh = floor($totalh);
if($totalh < '10'){$leading = 0;}

?>
<tr><td height="8" align=left><a href=or.php><font color="silver" size="1" face="verdana">Robbery:&nbsp;</font><?if($htime <= '0'){echo"<font color=white size=1 face=verdana>Available";}else{echo"<font color=silver size=1 face=verdana>";echo"$leading";echo"$totalh";echo date( ":i:s", $timer - $time);}?></font></a></td></tr>
<tr><td height="5"></td></tr>
</table>
</td></tr></table>
</td>
<td width="8" background="/more/rightb.png" NOWRAP></td>
</tr>

<tr><td width="8" height="9" background="/more/bottomleft.png"></td>
<td height="9" background="/more/bottom.png"></td>
<td width="8" height="9" background="/more/bottomright.png"></td>
</tr>

</table>
<?



$endtimes = microtime();
$endarrays = explode(" ", $endtimes);
$endtimes = $endarrays[1] + $endarrays[0];
$totaltimes = $endtimes - $starttime;
$totaltimes = round($totaltimes,3);
?>

<table align="center"  width=216 cellpadding="0"  cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>

<td height="22" background="/more/top.png" width=200 NOWRAP><font color="222222" face="verdana" size="1"><center><b>Page load time</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png" width=200>

<table width=100% cellpadding="0" cellspacing="1">
<tr><td width=20%></td><td width=80%>

<table align="left"  cellpadding="0" cellspacing="1">
<tr><td height="8"></td></tr>
<tr><td height="8" align=center nowrap><font color="white" size="1" face="verdana"><?echo $totaltimes;?> seconds</font></td></tr>
<tr><td height="8" nowrap></td></tr>
</table>
</td></tr></table>
</td>
<td width="8" background="/more/rightb.png" NOWRAP></td>
</tr>

<tr><td width="8" height="9" background="/more/bottomleft.png"></td>
<td height="9" background="/more/bottom.png"></td>
<td width="8" height="9" background="/more/bottomright.png"></td>
</tr>

</table>
	
 
<head><META HTTP-EQUIV="Pragma" CONTENT="no-cache"></head><?
$ra = rand(1,55);
if($ra <= '2'){
mysql_query("UPDATE usersonline SET time = '$time' WHERE id = '$ida' LIMIT 1");}
mysql_close();
?></body></html>