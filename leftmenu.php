<?php

error_reporting(0);

if($bar == '/leftmenu.php'){die('<font color=black face=verdana size=1>Go away.</font>');}
$gimtime = time();

$usernameone = $usernameone;
$user = $statustesttwo['username'];
$rankid = $statustesttwo['rankid'];
$crewid = $statustesttwo['crewid'];
$hdo = $statustesttwo['hdo'];
$rr = $statustesttwo['rr'];
$silencer = $statustesttwo['silencer'];
$mails = $statustesttwo['mail'];
$mitopics = $statustesttwo['topics'];
$thdotestnumrowssss = $statustesttwo['thdo'];

$seniortestsql = mysql_query("SELECT * FROM senior WHERE username = '$usernameone'");
$senior = mysql_num_rows($seniortestsql);
 if(($hdo > '0') || ($rankid >= '25')){

$gutnewhd = mysql_query("SELECT * FROM hdonew");
$gutnewshd = mysql_fetch_array($gutnewhd);
$tishere = $gutnewshd['number'];}



$fueleffec = $statustesttwo['fueleffec'];
$timea = time();

$timeleftto = $fueleffec - $timea;


$jailtest = mysql_query("SELECT username FROM jail WHERE username  = '$gangsterusername'");
$jailtester = mysql_num_rows($jailtest);



$counnewsqlq = mysql_query("SELECT * FROM forumtopics WHERE creator = '$user'");
$counneweoqa = mysql_num_rows($counnewsqlq);





if($crewid != '0'){
$crewbosssql = mysql_query("SELECT boss FROM crews WHERE boss = '$user' AND id = '$crewid'");
$crewboss = mysql_num_rows($crewbosssql);
}else{$crewboss = 0;}

?><head>
<html>
<head>
<title>Infamous Mobsters</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script>

function runme(){
var ajaxRequest; try{ajaxRequest = new XMLHttpRequest();} catch (e){try{ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");} catch (e) {try{ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");} catch (e){ return false;}}}
	
var str = "<?echo$ida;?>";
var strhehe = "&rand="+Math.random();
var strhehes = "&userid=<?echo$ida;?>";
	ajaxRequest.open("GET", "checkinbox.php?&id=" + str + strhehes + strhehe, true);

	ajaxRequest.send(null); 
// Create a function that will receive data sent from the server
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){



			document.getElementById("inboxspan").innerHTML = ajaxRequest.responseText;

if(!ajaxRequest.responseText){document.getElementById('inboxspantehe').style.display = 'none';document.getElementById("inboxspan").innerHTML = '<a href=inbox.php>Inbox</a>';}
if(ajaxRequest.responseText == '<a href=inbox.php>Inbox</a>'){document.getElementById('inboxspantehe').style.display = 'none';}
if(ajaxRequest.responseText == '<a href=inbox.php>Inbox <font color=white size=1 face=verdana>(</font><font color=khaki size=1 face=verdana><b>1</b></font><font color=white size=1 face=verdana>)</font></a>'){document.getElementById('inboxspantehe').style.display = 'block';}
if(ajaxRequest.responseText == '<a href=inbox.php>Inbox <font color=white size=1 face=verdana>(</font><font color=khaki size=1 face=verdana><b>2</b></font><font color=white size=1 face=verdana>)</font></a>'){document.getElementById('inboxspantehe').style.display = 'block';}
if(ajaxRequest.responseText == '<a href=inbox.php>Inbox <font color=white size=1 face=verdana>(</font><font color=khaki size=1 face=verdana><b>3</b></font><font color=white size=1 face=verdana>)</font></a>'){document.getElementById('inboxspantehe').style.display = 'block';}
if(ajaxRequest.responseText == '<a href=inbox.php>Inbox <font color=white size=1 face=verdana>(</font><font color=khaki size=1 face=verdana><b>4</b></font><font color=white size=1 face=verdana>)</font></a>'){document.getElementById('inboxspantehe').style.display = 'block';}
if(ajaxRequest.responseText == '<a href=inbox.php>Inbox <font color=white size=1 face=verdana>(</font><font color=khaki size=1 face=verdana><b>5</b></font><font color=white size=1 face=verdana>)</font></a>'){document.getElementById('inboxspantehe').style.display = 'block';}
if(ajaxRequest.responseText == '<a href=inbox.php>Inbox <font color=white size=1 face=verdana>(</font><font color=khaki size=1 face=verdana><b>6</b></font><font color=white size=1 face=verdana>)</font></a>'){document.getElementById('inboxspantehe').style.display = 'block';}
if(ajaxRequest.responseText == '<a href=inbox.php>Inbox <font color=white size=1 face=verdana>(</font><font color=khaki size=1 face=verdana><b>7</b></font><font color=white size=1 face=verdana>)</font></a>'){document.getElementById('inboxspantehe').style.display = 'block';}
if(ajaxRequest.responseText == '<a href=inbox.php>Inbox <font color=white size=1 face=verdana>(</font><font color=khaki size=1 face=verdana><b>8</b></font><font color=white size=1 face=verdana>)</font></a>'){document.getElementById('inboxspantehe').style.display = 'block';}
if(ajaxRequest.responseText == '<a href=inbox.php>Inbox <font color=white size=1 face=verdana>(</font><font color=khaki size=1 face=verdana><b>9</b></font><font color=white size=1 face=verdana>)</font></a>'){document.getElementById('inboxspantehe').style.display = 'block';}
if(ajaxRequest.responseText == '<a href=inbox.php>Inbox <font color=white size=1 face=verdana>(</font><font color=khaki size=1 face=verdana><b>10</b></font><font color=white size=1 face=verdana>)</font></a>'){document.getElementById('inboxspantehe').style.display = 'block';}



}}
setTimeout("runme()",13000);
}



setTimeout("runme()",10000);



function changetitle(){
	var ajaxRequest;  
	try{ajaxRequest = new XMLHttpRequest();} catch (e){
        try{ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");} catch (e) {
	try{ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");} catch (e){

alert("Your browser broke!");return false;}}}
	
var strhehe = "<?echo$user;?>&rand="+Math.random();
	ajaxRequest.open("GET", "titleone.php?cruw=<?echo$crewid;?>&you=" + strhehe, true);
        ajaxRequest.send(null); 
        ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
if(ajaxRequest.responseText){document.title = ajaxRequest.responseText;}}}




setTimeout("changetitleto()",20000);
}



function changetitleto(){
	var ajaxRequest;  
	try{ajaxRequest = new XMLHttpRequest();} catch (e){
        try{ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");} catch (e) {
	try{ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");} catch (e){

alert("Your browser broke!");return false;}}}
	
var strhehe = "<?echo$ida;?>&rand="+Math.random();
	ajaxRequest.open("GET", "titletwo.php?userid=" + strhehe, true);
        ajaxRequest.send(null); 
        ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
if(ajaxRequest.responseText){document.title = ajaxRequest.responseText;}}}




setTimeout("changetitle()",20000);}

setTimeout("changetitle()",20000);

<? if($counneweoqa != '0'){?>

function ohh(){
	var ajaxRequest;  
	try{ajaxRequest = new XMLHttpRequest();} catch (e){
        try{ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");} catch (e) {
	try{ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");} catch (e){

alert("Your browser broke!");return false;}}}
	
var strhehe = "<?echo$user;?>&rand="+Math.random();
	ajaxRequest.open("GET", "getnew.php?cruw=<?echo$crewid;?>&you=" + strhehe, true);
        ajaxRequest.send(null); 
        ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
if(ajaxRequest.responseText){document.getElementById("mitopics").innerHTML = ajaxRequest.responseText;}}}


setTimeout("ohh()",9000);
}
<? }
 ?>setTimeout("ohh()",010);
</script>
<script type="text/javascript">
<!--
function shithouse(){
var answer = confirm ("Log out?")
if (answer)
location.href='logout.php?id=<?echo$sessionid;?>';
else
location.href='#';
}

// -->
</script>  
</head>


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
<a href="refferal.php"><font color=white>Referral System</font></a>
<a href="usersonline.php">Users Online</a>
<a href="properties.php">Properties</a>
<a href="profiles.php">Edit Profile</a>
<?php if($rankid >= '50'){ echo('<a href="mutes.php"><font color=yellow>Latest Mutes</font></a>'); }?>
<a href="news.php">Latest News</a>
<a href="helpdesk.php">Helpdesk<? if($tishere > '0'){  if(($hdo > '0') || ($rankid >= '25') || ($thdotestnumrowssss > '0')){?> (<b><font color=khaki><?echo$tishere;?></font></b>)<?}}?></a><? if($mitopics > '0'){?>
<span id=mitopics><a href="mytopics.php">My Topics</a></span><?}?>
<?php if(($hdo > '0') || ($rankid >= '25')){ echo('<a href="blacklist.php">Blacklist Word</a>'); }?>
<?
if($mails >= '1'){$extratwo = "<font color=white size=1 face=verdana> (</font><font color=khaki size=1 face=verdana><b>$mails</b></font><font color=white size=1 face=verdana>)</font></a>";}
if($rankid== '100'){echo'<a href="realrecord.php">Records Mod</a>';}?>
<a href="phonesms.php"><font color=dodge>Phone / SMS</font><font color=gold><b> X3</b></font></a>
<a href="promi.php"><font color=white>Promo Codes</font></a>
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
<div class=tab><b><font color='gold'>Ranking</font></b></div>
<div class=TS></div>
<a href="crimes.php">Crimes</a>
<a href="steal.php">Steal Cars</a>
<a href="jail.php">Jail</a>
<a href="repair.php">Repair Cars</a>
<a href="or.php">Organised Robbery</a>
<div class=TS></div>
<div class=tab><b><font color='gold'>Money / Points</font></b></div>
<div class=TS></div>
<a href="bank.php">Bank Account</a>
<a href=supply.php>Supply Bullets</a>
<a href="points.php"><font color=dodge>Points </font><font color=white><b>New Offers</b></font></a>
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
<a href="kill.php">Kill</a><a onclick="window.open ('http://www.bullet-calculator-ms.co.cc/', 'newwindow', config='height=350, width=600, toolbar=no, menubar=no, location=no, directories=no, status=no'); return false;" href=#>Bullet Calculator</a>
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

if($rankid >= '25') {echo('<div class=TS></div>
<div class=tab>E Manager Tools</div>
<div class=TS></div>
<a href="entertainers.php">Entertainer List</a>
<a href="entertainersend.php">Message Entertainers</a>
<a href="edemote.php">Demote Entertainer</a>
<a href="epromote.php">Promote Entertainer</a>');}

if($rankid >= '50') {echo('
<div class=TS></div>
<div class=tab>Moderation Tools</div>
<div class=TS></div>
<a href="showkills.php">Recent Kills</a>
<a href="hdos.php">HDO List</a>
<a href="appoffline.php">Edit Status</a>
<a href="dupebgkill.php">Dupe BG Modkill</a>
<a href="killmod.php">Recent Modkills</a>');}
if($rankid >= '25') {echo('<a href="ipcheck.php">Dupe Check</a>');}
if($rankid >= '25'){echo('<a href="permban.php">Ban User</a><a href="modtravel.php">Change Location</a>');}
if($rankid >= '75') {echo('<a href="hdosend.php">Message HDOs</a>');}
if($rankid >= '75'){echo'<a href="mystatsadmin.php">Player Stats</a>

<a href="fame.php">Money View</a>';}

if($rankid >= '50') {echo('
<a href="mkill.php">Modkill</a>
<a href="viewpenpoints.php">Penalty Points</a>');}


if($rankid >= '75') {echo('<div class=TS></div>
<div class=tab>Moderator Management</div>
<div class=TS></div>
<a href="moderators.php">Moderator List</a>
<a href="promotemod.php">Promote Mod</a>
<a href="demotemod.php">Demote Mod</a>');}

if($rankid >= '80') {echo('
<div class=TS></div>
<div class=tab>Administration Tools</div>
<div class=TS></div>
<a href="showkills.php">Recent Kills</a>
<a href="afrevive.php"><b>Revive</b></a>
<a href="adminsend.php">Message All</a>
<a href="adminsendonline.php">Message Online</a>
<a href="viewmail.php">View Mail</a>
<a href="viewsentmail.php">View Sent Mail</a>
<a href="viewsentmaild.php">View Deleted Mail</a>
<a href="viewsentmaild.php">View Deleted Sent Mail</a>
<a href="addpoints.php">Add Points</a>

');}
?>
<a onclick="shithouse(); return false;" href=#><center><font color=dodge>Logout</font></center></a>


</div>

</td><td width="8" background="/more/rightb.png" NOWRAP></td>
</tr>

<tr>
<td width="8" height="9" background="/more/bottomleft.png"></td>
<td height="9" background="/more/bottom.png"></td>
<td width="8" height="9" background="/more/bottomright.png"></td>
</tr>

</table>
<head><META HTTP-EQUIV="Pragma" CONTENT="no-cache"></head>
