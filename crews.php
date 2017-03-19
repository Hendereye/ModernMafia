<? include 'included.php'; ?>

<html>
<head>
<link rel="stylesheet" href="more/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="shortcut icon" href="/more/icon.png" type="image/x-icon" />
</head>
<body background="/more/bgtest.png">
<script type="text/javascript">
function emotion(em) { document.smiley.topicinfo.value=document.smiley.topicinfo.value+em;}
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
$zpattern[a] = "<";
$zpattern[b] = ">";
$zreplace[a] = "&lt;";
$zreplace[b] = "&gt;";
$saturate = "/[^a-z0-9]/i";
$saturated = "/[^a-z0-9]/i";
$ah = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$gangsterusername = $usernameone;
$createcrewraw = mysql_real_escape_string($_POST['createcrew']);
$applyidraw = mysql_real_escape_string($_POST['apply']);
$crewidraw = mysql_real_escape_string($_POST['crewid']);
$applyid = preg_replace($saturated,"",$applyidraw);
$crewid = preg_replace($ah,"",$crewidraw);
$createcrew = htmlentities($createcrewraw, ENT_QUOTES);
$newnameraw = mysql_real_escape_string($_POST['newname']);

$newname = htmlentities($newnameraw, ENT_QUOTES);


$hdotestnumrows = $hdo;

$getinfoarray = $statustesttwo;
$myrank = $getinfoarray['rankid'];
$helf = $getinfoarray['health'];
$getcrewid = $getinfoarray['crewid'];
$getname = $getinfoarray['username'];
$getrank = $getinfoarray['rankid'];
$getmoney = $getinfoarray['money'];



if (isset($_POST['crewid'])) {
if(($hdotestnumrows < '1')&&($getrank < '50')){}
elseif(!$crewid){}
else{$crewcheck = mysql_num_rows(mysql_query("SELECT * FROM crews WHERE id = '$crewid'"));
$crewchecktwo = mysql_num_rows(mysql_query("SELECT * FROM crews WHERE name = '$newname'"));
if($crewcheck < '1'){echo"<font color=white face=verdana size=1>Crew id does not exist!</font>";}
elseif(($crewid == '1')&&($myrank != '100')){echo"<font color=white face=verdana size=1>Want to be demoted?</font>";}
elseif($crewchecktwo > '0'){echo"<font color=white face=verdana size=1>Crew name already in use!</font>";}
else{mysql_query("UPDATE crews SET name = '$newname' WHERE id = '$crewid'");mysql_query("UPDATE crews SET hdo = '$gangsterusername' WHERE id = '$crewid'");echo"<font color=white face=verdana size=1>Crew name changed!</font>";}}}





$entertainer = $ent;

$getcrewssql = mysql_query("SELECT name,boss,id,members,melt FROM crews ORDER BY id ASC");
$getcrewsamount = mysql_num_rows($getcrewssql);

$createcheck = mysql_query("SELECT name FROM crews WHERE name = '$createcrew'");
$createcheckrows = mysql_num_rows($createcheck);


if (isset($_POST['leavecrew'])) {

mysql_query("UPDATE users SET crewid = '0' WHERE username = '$getname'");
mysql_query("UPDATE crews SET members = (members - 1) WHERE id = '$getcrewid'");
if($helf > '50'){
mysql_query("UPDATE users SET health = '50' WHERE ID = '$ida'");}

mysql_query("DELETE FROM recruiters WHERE username = '$getname'");
mysql_query("UPDATE users SET rr = '0' WHERE username = '$getname'");
echo'<font color="white" face="verdana" size="1">You left your crew!</font>';
}


if(isset($_POST['createcrew'])) {

$crewbosschecksql = mysql_query("SELECT boss FROM crews WHERE boss = '$getname'");
$crewbosscheck = mysql_num_rows($crewbosschecksql);
if($crewbosscheck > '0'){die(' ');}


if(!$createcrew){}
elseif($getcrewid != '0'){echo'<font color="white" face="verdana" size="1">Your already in a crew!</font>';}
elseif($getcrewsamount >= '15'){
echo'<font color="white" face="verdana" size="1">All crew slots have been taken!</font>';}
elseif($entertainer != '0'){echo'<font color=white face=verdana size=1>As entertainer you cannot use this feature!</font>';}
elseif($getrank < '9'){echo'<font color="white" face="verdana" size="1">You must be atleast an Respected Assassin to create a crew!</font>';}
elseif($getmoney < '35000000'){echo'<font color="white" face="verdana" size="1">You dont have enough money, creating a crew costs $35,000,000!</font>';}
elseif($createcheckrows > '0'){echo'<font color="white" face="verdana" size="1">That crew name is already taken!</font>';}
else{
$time = time();
$timer = $time + 36000;
mysql_query("INSERT INTO crews(boss,bullets,crewprofile,createdby,createdbyip,name,timer,hdo)
VALUES ('$getname', '0', ' ','$getname','$userip','$createcrew','$timer','$getname')");
mysql_query("UPDATE users SET money = money - '35000000' WHERE username = '$getname'");
$updatecrewid = mysql_fetch_array(mysql_query("SELECT * FROM crews WHERE boss = '$getname'"));
$updateid = $updatecrewid['id'];
mysql_query("UPDATE users SET crewid = '$updateid' WHERE username = '$getname'");
mysql_query("DELETE FROM applicants WHERE username = '$gangsterusername'");
mysql_query("UPDATE users SET crewbullets = '0' WHERE ID = '$ida'");
echo'<font color="white" face="verdana" size="1">Crew succesfully created!</font>';
}}

$checkcrewid = mysql_query("SELECT * FROM crews WHERE id = '$applyid'");
$checkcrewidrows = mysql_num_rows($checkcrewid);
$checkcrewidarray = mysql_fetch_array($checkcrewid);
$checkappcrewraw=html_entity_decode($checkcrewidarray['name'],ENT_QUOTES);
$checkappcrew = str_replace($zpattern,$zreplace,$checkappcrewraw);

$checkapplications = mysql_query("SELECT * FROM applicants WHERE username = '$getname'");
$checkapp = mysql_num_rows($checkapplications);


$checkapparray = mysql_fetch_array($checkapplications);
$waitingstage = $checkapparray['stage'];
$waitingcrewa = html_entity_decode($checkapparray['crewname'],ENT_QUOTES);
$waitingcrew = str_replace($zpattern,$zreplace,$waitingcrewa);


if(isset($_POST['apply'])) {

$rtettseb= mysql_query("SELECT * FROM crews WHERE boss = '$usernameone' AND id = '$applyid'");
$gfdgdsg = mysql_num_rows($rtettseb);

if($gfdgdsg > '0'){mysql_query("UPDATE crews SET members = (members + 1) WHERE id = '$applyid'"); mysql_query("UPDATE users SET crewid = '$applyid' WHERE ID = '$ida'");mysql_query("DELETE FROM applicants WHERE username = '$usernameone'");die('<font color=white face=verdana size=1>Welcome Back!</font>');}



if($getcrewid != '0'){} 
elseif($checkcrewidrows == '0'){echo'<font color=white face=verdana size=1>Error, crew doest not exist!</font>';}
elseif($checkapp != '0'){ 





mysql_query("UPDATE applicants SET crewid = '$applyid' WHERE username = '$getname'");
mysql_query("UPDATE applicants SET crewname = '$checkappcrew' WHERE username = '$getname'");
mysql_query("UPDATE applicants SET stage = '0' WHERE username = '$getname'");
mysql_query("UPDATE users SET crewbullets = '0' WHERE ID = '$ida'");
echo'<font color=white size=1 face=verdana>Application sent!</font>';



mysql_query("UPDATE users SET notification = 'New <b>Crew Applicants' WHERE crewid = '$applyid' AND rr != '0'");
mysql_query("UPDATE users SET notify = notify + 1 WHERE crewid = '$applyid' AND rr != '0'");

}
else{ mysql_query("INSERT INTO applicants(username,crewid,ip,stage,crewname)
VALUES ('$getname', '$applyid','$userip','0','$checkappcrew')");
echo'<font color=white size=1 face=verdana>Application sent!</font>';
mysql_query("UPDATE users SET notification = 'New Crew Applicants!' WHERE crewid = '$applyid' AND rr != '0'");
mysql_query("UPDATE users SET notify = notify + 1 WHERE crewid = '$applyid' AND rr != '0'");


}}
else{
if($checkapp != '0'){ echo"<font color=white size=1 face=verdana>Your currently applying to <b>$waitingcrew</b></font>";
if($waitingstage == '0'){echo"<br><font color=white size=1 face=verdana><b>Status:</b> Waiting...";}
elseif($waitingstage == '1'){echo"<br><font color=white size=1 face=verdana><b>Status:</b> Accepted";
mysql_query("DELETE FROM applicants WHERE username = '$getname' AND stage = '1'");}
else{echo"<br><font color=white size=1 face=verdana><b>Status:</b> Refused";
mysql_query("DELETE FROM applicants WHERE username = '$getname' AND stage = '2'");}}}
?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Crews</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<br>
<table align="center" width="75%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="8" background="/more/topleft.png"></td>
<td height="8" background="/more/top.png" NOWRAP><center><font color="#222222" face="verdana" size="1"><b></b></font></center></font></font></td>
<td width="8" height="8" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png"></td>
<td background="/more/crossbg.png">
<table width="100%" cellpadding="0" cellspacing="3" align="center" style="border-width: 1px;border-color: gray;">
<tr><td bgcolor="444444" align="center" width="60%"><font color="white" size="2" face="verdana">Crew</font></td><td bgcolor="444444" NOWRAP width="30%"><font color="white" size="2" face="verdana">&nbsp;Boss</font></td><td bgcolor="444444" align="center" NOWRAP width="10%"><font color="white" size="2" face="verdana">&nbsp;Melt&nbsp;&nbsp;&nbsp;</font></td><td bgcolor="444444" align="center" NOWRAP width="10%"><font color="white" size="2" face="verdana">&nbsp;Members&nbsp;</font></td></tr>
<form action="" method="post">
<?php
while($getcrewsarray = mysql_fetch_array($getcrewssql))
{
$crewnameraw = html_entity_decode($getcrewsarray['name'], ENT_QUOTES);
$crewname = str_replace($zpattern,$zreplace,$crewnameraw);

$crewid = $getcrewsarray['id'];
if($crewid == '1000620'){}else{
$crewboss = $getcrewsarray['boss'];
$crewmembers = $getcrewsarray['members'];
$melt = $getcrewsarray['melt'];
if($crewid == '1'){$dis = 'disaaabled';}else{$dis = ' ';}
echo"<tr><td class=wtf>";
if($getcrewid == '0'){echo"<input type=radio name=apply value=$crewid $dis>";}
echo"<a href=viewcrew.php?crewid=$crewid><font color=dodge size=1 face=verdana>&nbsp;$crewname&nbsp;</font></td><td class=wtfs NOWRAP><a href=viewprofile.php?username=$crewboss><font color=dodge size=1 face=verdana>&nbsp;$crewboss&nbsp;</font></a></td><td class=wtfs><font color=dodge size=1 face=verdana>$melt%</font></td><td class=wtfs><font color=dodge size=1 face=verdana>&nbsp;$crewmembers&nbsp;</font></td></tr>";}}?>
<tr><td bgcolor=333333></td><td bgcolor=333333></td><td bgcolor=333333></td><td bgcolor=333333><font color=dodge size=1 face=verdana>&nbsp;<?echo $getcrewsamount;?>/15</font></td></tr>
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
<? if($getcrewid == '0'){echo"<center><input type=submit name=doapply class=textbox value=\"Apply to crew\"></center>";} ?></form>
<br><br>
<? if($getcrewsamount < 16){echo'<center><form action="" method="post"><font color=white size=1 face=verdana>Crew name:</font><br><input type ="text" name="createcrew" class="textbox"><br><input type ="submit" name="docreate" class="textbox" value="Create crew!"></form></center><br>';} 
if($getcrewid > '0'){
echo'<center><form action="" method="post"><font color=red size=1 face=verdana><b>Note:</b></font><font color=silver size=1 face=verdana> Leaving your crew will damage your health severely!</font><br><input type ="submit" name="leavecrew" class="textbox" value="Leave crew!"></form></center>';} ?>
<?if(($rankid >= 50)||($hdotestnumrows > '0')){echo"<br><br><form method=post><font color=white face=verdana size=1>Crew id:</font><br><input type =text name=crewid class=textbox><br><font color=white face=verdana size=1>New crew name:</font><br><input type=text name=newname class=textbox><br><input type=submit class=textbox value='Change crew name'></form>";}?>
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