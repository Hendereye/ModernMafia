<?php

error_reporting(0);


if($bar == '/leftmenu.php'){die('<font color=black face=verdana size=1>Go away.</font>');}
$gimtime = time();

$usernameone = $usernameone;
$user = $statustesttwo['username'];
$rankid = $statustesttwo['rankid'];
$crewid = $statustesttwo['crewid'];
$notice = $statustesttwo['notice'];
$live = $statustesttwo['live'];
$hdo = $statustesttwo['hdo'];
$rr = $statustesttwo['rr'];
$silencer = $statustesttwo['silencer'];
$mails = $statustesttwo['mail'];

if($crewid != '0'){
$crewbosssql = mysql_query("SELECT boss FROM crews WHERE boss = '$user'");
$crewboss = mysql_num_rows($crewbosssql);
}else{$crewboss = 0;}



?>

<head><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<script type="text/javascript">
<!--
function shithouse(){
var answer = confirm ("Log out?")
if (answer)
location.href='logout.php?id=<?echo$sessionid;?>';
else
alert ("Request cancelled.")
}

// -->
</script> 
<title>Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>

<table align="center" cellpadding="0" width=216 cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP id=findy><font color=#222222 face=verdana size=1><center><b>Find Player</b></font></center></td>
<td class="topright" NOWRAP></td>
</tr>
<form id=teehee name=teehee action=find.php method=post>
<tr><td width="8" background="/more/leftb.png" NOWRAP></td>


<td class="main" NOWRAP>
<input type ="text" autocomplete=off style="width:65%;" class="textbox" value="<?if($findeh==1){}else{echo'Username:';}?>" id="username" name=username class=textbox id=username onkeyup="ajaxFunction();" onclick="document.teehee.username.select()"><input type ="submit" style="width:35%;" value="Search" class="textbox"></td><td width="8" background="/more/rightb.png" NOWRAP></td>

</tr>
</form>
</table>



<table align="center" cellpadding="0" width=216 cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="222222" face="verdana" size="1"><center><b>Main Menu</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>
<tr><td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png" width=200 >



<div class="buttons"> 

<div class=tab>Information</div>
<div class=TS></div>
<a href="ipsharing.php">IP Rules</a>
<a href="faq.php">FAQ</a>
<a href="statistics.php">Game Statistics</a>
<a href="refferal.php">Referral System</a>
<a href="usersonline.php">Users Online</a>
<a href="properties.php">Properties</a>
<a href="profiles.php">Edit Profile</a>
<a onclick="window.open ('radio.php', 'newwindow', config='height=600, width=600, toolbar=no, menubar=no, location=no, directories=no, status=no')" href=#>TS Radio </a>
<a href="news.php">Latest News</a>
<a href="helpdesk.php">Helpdesk</a>
<?php if(($hdo > '0') || ($rankid >= '25')){ echo('<a href="blacklist.php">Blacklist Word</a>'); }?>
<?
if($mails >= '1'){$extratwo = "<font color=white size=1 face=verdana> (</font><font color=khaki size=1 face=verdana><b>$mails</b></font><font color=white size=1 face=verdana>)</font></a>";}
if($rankid== '100'){echo'<a href="editcash.php"><b>Edit Cash</b></a>
<a href="realrecord.php">Records Mod</a><a href="realrecords.php">Records Mod2</a>';}?>
<a href="phonesms.php"><font color=dodge>Phone / SMS</font><font color=gold><b> X3</b></font></a>
<a href="record.php">Hall Of Fame (Top 10)</a>
<a href=finds.php>Find Users</a>
<div class=TS></div>
<div class=tab>Messaging</div>
<div class=TS></div>
<a href="send.php">Create Message</a>
<span id=inboxspan><a href="inbox.php">Inbox <?echo$extratwo;?></a></span>
<?php
if($crewid != '0') { ?>
<a href="crewforum.php">Crew Forum</a><?}?>
<a href="forum.php">Forum</a>
<a href="dforum.php">Designer Forum</a>
<a href="eforum.php">Entertainment Forum</a>
<?php if(($hdo > '0') || ($rankid >= '25')){ echo('<a href="hforum.php"><b>HDO Forum</b></a>'); }?>

<div class=TS></div>
<div class=tab>Ranking</div>
<div class=TS></div>
<a href="crimes.php"><? if ($myrank <= '1'){?><font color=khaki><b><?}?>Crimes<? if ($myrank <= '3'){?></font></b><?}?></a>
<a href="steal.php">Steal Cars</a>
<a href="jail.php">Jail</a>
<a href="repair.php">Repair Cars</a>
<a href="or.php">Organised Robbery</a>
<div class=TS></div>
<div class=tab>Money / Points</div>
<div class=TS></div>
<a href="bank.php">Bank Account</a>
<a href=supply.php>Supply Bullets</a>
<a href="points.php"><font color=dodge>Points </font><font color=gold><b>New Offers</b></font></a>
<a href="drugs.php">Drugs</a>
<a href="races.php">Drag Races</a>
<a href="blackjack.php">Blackjack</a>
<a href="roulette.php">Roulette</a>
<a href="dicegame.php">Dice Game</a>
<a href="multidice.php">Multi Dice Game</a>
<a href="retrieval.php">Dead > Alive</font></a>
<div class=TS></div>
<div class=tab>Buy / Sell</div>
<div class=TS></div>
<a href="quicktrade.php">Quick Trade</a>
<a href="buy.php">Buy</a>
<a href="sell.php">Sell</a>
<div class=TS></div>
<div class=tab>Travel</div>
<div class=TS></div>
<a href="travel.php">By Car</a>
<div class=TS></div>
<div class=tab>Offence</div>
<div class=TS></div>
<a href="hitlist.php">Hitlist</a>
<a href="hospital.php">Hospital</a>
<a href="bulletfactory.php">Bullet Factory</a>
<a href="kill.php">Kill</a>
<a href="attempts.php">Attempts</a>
<a href="melt.php">Melt Cars</a>
<div class=TS></div>
<div class=tab>Crews</div>
<div class=TS></div>
<a href="crews.php">Crews</a>
<?php
if($crewid != '0'){ echo('
<a href="crewbullets.php">Crew Bullets</a>
<a href="crewtopd.php">Crew Donators</a>
<a href="crewusersonline.php">Crew Users Online</a>
<a href="crewbank.php">Donate To Crew Bank</a>');}

if(($crewboss != '0')||($rr != '0')){echo('<a href="applicants.php">Applicants</a>');}
if($crewboss != '0'){echo('<a href="editcrewprofile.php">Crew Profile</a>
<a href="crewor.php">Crew OR</a>
<a href="creworganisation.php">Crew Organisation</a>');}

if($rankid >= '25') {echo('<div class=tab>E Manager Tools</div>
<a href="entertainers.php">Entertainer List</a>
<a href="editcashs.php"><font color=shade><b>Edit Cash</b></font></a>
<a href="entertainersend.php">Message Entertainers</a>
<a href="edemote.php">Demote Entertainer</a>
<a href="epromote.php">Promote Entertainer</a>');}

if($rankid >= '25') {echo('
<div class=tab>Mod Tools</div>
<a href="showkills.php">Recent Kills</a>
<a href="hdos.php">HDO List</a>
<a href="appoffline.php">Edit Status</a>
<a href="dupebgkill.php">DUPE BG MODKILL ONLY</a>
<a href="killmod.php">Recent Modkills</a>');}
if($rankid >= '25') {echo('<a href="ipcheck.php">Dupe Check</a>');}
if($rankid >= '25'){echo('<a href="permban.php">Ban User</a>');}
if($rankid >= '75') {echo('<a href="hdosend.php">Message HDOs</a>');}
if($rankid == '100'){echo'<a href="mystatsadmin.php">Player Stats</a>
<a href="fame.php">Money View</a>
<a href="frozepoints.php">Accounts Frozen</a>';}

if($rankid >= '25') {echo('
<a href="mkill.php">Modkill</a>
<a href="viewpenpoints.php">Penalty Points</a>');}


if($rankid == '100') {echo('
<div class=tab>Admin Tools</div>
<a href="showkills.php">Recent Kills</a>
<a href="afrevive.php"><b>Revive</b></a>
<a href="modtravel.php">Change Location</a>
<a href="adminsend.php">Message All</a>
<a href="adminsendonline.php">Message Online</a>
<a href="viewmail.php">View Mail</a>
<a href="viewsentmail.php">View Sent Mail</a>
<a href="viewsentmaild.php">View Deleted Mail</a>
<a href="viewsentmaild.php">View Deleted Sent Mail</a>
');}
?>
<a onclick="shithouse(); return false;" href=#><center><font color=dodge>Logout</font></center></a>


</div>

</td>
<td class="right" NOWRAP></td>
</tr>


<tr>

<td class="bottomleft" NOWRAP></td>
<td class="bottom" NOWRAP></td>
<td class="bottomright" NOWRAP></td>
</tr>

</table>

<head><META HTTP-EQUIV="Pragma" CONTENT="no-cache"></head>
