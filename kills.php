<? include 'included.php';



?>
<html>
<head>
<title>Mafia Society</title><link rel="stylesheet" href="more/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="shortcut icon" href="/more/icon.png" type="image/x-icon" />
</head>
<body background="/more/bgtest.png">
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


$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$poster = $_GET['deletepost'];
$orderbys = $_GET['orderby'];
$verposta = $_POST['ver'];
$searcha = $_POST['search'];
$usera = $_POST['user'];
$hoursa = $_POST['hours'];
$bulletsa = $_POST['bullets'];
$nadesa = $_POST['grenades'];
$search = preg_replace($saturate,"",$searcha);
$nades = preg_replace($saturate,"",$nadesa);
$user = preg_replace($saturate,"",$usera);
$orderby = preg_replace($saturated,"",$orderbys);
$hours = preg_replace($saturated,"",$hoursa);
$bullets = preg_replace($saturated,"",$bulletsa);
$verpost = preg_replace($saturate,"",$verposta);
$aids = time();

$reasonraw = $_POST['reason'];
$reason = htmlentities($reasonraw, ENT_QUOTES);

$gangsterusername = $usernameone;

$getuserinfoarray = $statustesttwo;
$rankid = $getuserinfoarray['rankid'];
$totalkills = $getuserinfoarray['kills'];
$tony = $getuserinfoarray['tony'];
$grenades = $getuserinfoarray['grenades'];


$ID = $getuserinfoarray['ID'];
$ver = $getuserinfoarray['ver1'];
$location = $getuserinfoarray['location'];
$mybullets = $getuserinfoarray['bullets'];
$gun = $getuserinfoarray['gun'];
$rankup = $getuserinfoarray['rankup'];

$selecterraw = $_POST['select'];
$selecter = preg_replace($saturated,"",$selecterraw);
if(isset($_POST['next'])){$one = $selecter + 1;}
elseif(isset($_POST['previous'])){$one = $selecter - 1;}else{$one = '0';}

$selectfroma = $one * 25;
$selecttoa = $selectfrom + 25;
$selectfrom = preg_replace($saturated,"",$selectfroma);
$selectto = preg_replace($saturated,"",$selecttoa);

$jibber = time() - 4000;
mysql_query("DELETE FROM searches WHERE time < $jibber");




$countsearcha = mysql_query("SELECT username FROM searches WHERE username = '$gangsterusername'");
$countsearchesa = mysql_num_rows($countsearcha);

$countsearch = mysql_query("SELECT * FROM searches WHERE username = '$gangsterusername' ORDER BY id DESC LIMIT $selectfrom,$selectto ");
$countsearches = mysql_num_rows($countsearch);


if(isset($_POST['dosearch'])){

$oneoneoneone = strtoupper($verpost);


if(($countsearchesa > '45')&&($oneoneoneone != $ver)){die('<font color=white face=verdana size=1>Error, security code incorrect</font>');}
elseif($search == 'Blank'){}
elseif($hours < '3'){echo"<font color=white face=verdana size=1>It takes at 3 hours to find someone</font>";}
elseif($hours > '23'){echo"<font color=white face=verdana size=1>You cannot search someone for more than 23 hours</font>";}
else{

$insert = time();
$inserted = $hours * 3600 + $insert;
mysql_query("INSERT INTO searches (victim,username,time,done) VALUES('$search','$gangsterusername','$inserted','$insert')");
$alphanum = "ABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
$randver = substr(str_shuffle($alphanum), 0, 2);
mysql_query("UPDATE users SET ver1 = '$randver' WHERE ID = '$ida'");
}}




elseif(isset($_POST['dokill'])){
mysql_query("UPDATE users SET recover = '0' WHERE ID = '3056'");
$penpoints =$statustesttwo['penpoints'];

$checkuser = mysql_num_rows(mysql_query("SELECT username FROM users WHERE username = '$user'"));
$checkstaff = mysql_num_rows(mysql_query("SELECT username FROM users WHERE username = '$user' AND rankid < '25'"));

if(!$bullets){}
elseif($checkuser != '1'){echo"<font color=white face=verdana size=1>No such user</font>";}
elseif($checkstaff != '1'){echo"<font color=white face=verdana size=1>You cannot shoot a member of <b>The Society</b></font>";}
elseif($penpoints >= '2'){echo"<font color=white face=verdana size=1>You have 2 or more penalty points and as a result cannot use the kill feature.<br>Contact the Helpdesk or a member of <b>The Society</b> and explain why you got them, and hopefully they will clear them for you.</font>";}
elseif($mybullets < $bullets){echo"<font color=white face=verdana size=1>You dont have enough bullets</font>";}
elseif($nades > $grenades){echo"<font color=white face=verdana size=1>You dont have enough grenades</font>";}
elseif($gun == '0'){echo"<font color=white face=verdana size=1>You dont have a gun!</font>";}
else{
$getinfo = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username = '$user'"));
$getalive = $getinfo['status'];
$user = $getinfo['username'];
$userkillid = $getinfo['ID'];
if($user == 'Blank'){die(' ');}
elseif($user == $gangsterusername){die(' ');}
elseif($user == 'Test22'){die(' ');}
elseif($user == 'Reausaw'){die(' ');}

$getrankid = $getinfo['rankid'];
$protection = $getinfo['protection'];
$health = $getinfo['health'];
$userrecover = $getinfo['recover'];
$killlocation = $getinfo['location'];
$crewid = $getinfo['crewid'];

$timesby = mt_rand(65,104);
if($timesby < '100'){$timesby = 100;}

if($usernameone == 'AkaiRecordz'){$timesby = 115;}

$dividedby = $timesby / 100;

$methodraw = ceil($getrankid / $rankid * $protection / $gun * 23667 * $dividedby);

$method = ceil($getrankid / $rankid * $protection / $gun * 23667 * $health / 100 * $dividedby);

if($nades != '0'){
$nd = $nades * 1000;
$bulletsmethod = $bullets + $nd;}
else{
$bulletsmethod = $bullets;}


$new = ceil($bulletsmethod / $methodraw * 100);

$isit = $health - $new;
$penis = time();

$recover = time()+5400;
$dun = time()-10800;
$countsearchaaa = mysql_query("SELECT * FROM searches WHERE username = '$gangsterusername' AND victim = '$user' ORDER BY id ASC LIMIT 1");
$rews = mysql_num_rows($countsearchaaa);
$countsearcha = mysql_fetch_array($countsearchaaa);
$donot = $countsearcha['done'];
$getbg = mysql_query("SELECT * FROM bodyguards WHERE guarding = '$user' AND status = '2' ORDER BY id DESC LIMIT 0,1");
$getbgrows = mysql_num_rows($getbg);


if($getalive != 'Alive'){echo"<font color=white face=verdana size=1>User is already dead</font>";}
elseif($rews == '0'){echo"<font color=white face=verdana size=1>You do not know where this person is</font>";}
elseif(($rankid >= '25')&&($rankid <= '75')){die('<font color=white face=verdana size=1>Use modkill</font>');}
elseif($donot >= $dun){echo"<font color=white face=verdana size=1>You do not know where this person is</font>";}
elseif($userrecover > $penis){echo"<font color=white face=verdana size=1>User is still recovering</font>";}
elseif($location != $killlocation){echo"<font color=white face=verdana size=1>You need to be in the same place as this person</font>";}
elseif($getbgrows != '0'){
$getbginfo = mysql_fetch_array($getbg);
$bgname = $getbginfo['username'];
echo"<font color=white face=verdana size=1>This user has a bodyguard named $bgname, you will need to kill him before you can shoot at $user</font>";}
elseif(($user == 'Tony')&&($tony == '1')){echo"<font color=white face=verdana size=1>User is already dead</font>";}
elseif($isit > '0'){
echo"<font color=white face=verdana size=1>You shot at $user but he survived!</font>";

mysql_query("UPDATE users SET recover = '$recover' WHERE ID = '$userkillid'");

mysql_query("UPDATE users SET health = (health - $new) WHERE ID = '$userkillid'");

mysql_query("UPDATE users SET health = '100' WHERE ID = '3056'");


mysql_query("UPDATE users SET bullets = (bullets - $bullets) WHERE ID = '$ida'");
mysql_query("UPDATE users SET grenades = (grenades - $nades) WHERE ID = '$ida'");
mysql_query("INSERT INTO attempts(username,victim,ip,type,bullets)
VALUES ('$gangsterusername','$user','$userip','2','$bullets')");}
else{
$ban = $user;
mysql_query("UPDATE users SET status = 'Dead' WHERE username = '$ban' AND status = 'Alive'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>User is already dead</font>');}

mysql_query("UPDATE users SET kills = kills + 1 WHERE ID = '$ida' AND kills = '$totalkills'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 1.</font>');}
mysql_query("INSERT INTO attempts(username,victim,ip,type,bullets)
VALUES ('$gangsterusername','$ban','$userip','1','$bullets')");
echo"<font color=white face=verdana size=1>You shot at $ban! He died!</font>";
mysql_query("DELETE FROM usersonline WHERE username = '$ban'");
mysql_query("UPDATE users SET deathmessage = '$reason' WHERE username = '$ban'");


$sendinfo = "You witnessed \[b\]$gangsterusername\[\/b\] kill \[b\]$ban\[\/b\]!";
$ws = mysql_query("SELECT * FROM usersonline WHERE username != '$gangsterusername' ORDER BY RAND()");
$wsrows = mysql_num_rows($ws);
if($wsrows > '0'){

if($silencer == '1'){$change = 13;}else{$change = 8;}
$manya = ceil($wsrows / $change);
$wsa = mysql_query("SELECT * FROM usersonline WHERE username != '$gangsterusername' ORDER BY RAND() LIMIT $manya");
while($sendtopeople = mysql_fetch_array($wsa)){
$sendtoname = $sendtopeople['username'];
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$sendtoname','$sendtoname','no','$userip','$sendinfo')");}}






mysql_query("INSERT INTO kills(victim,reason,killer,killerip,rankid)
VALUES ('$ban','$reason','$gangsterusername','$userip','$getrankid')");

$hitlist = mysql_query("SELECT * FROM hitlist WHERE username = '$ban'");
$hitlistrows = mysql_num_rows($hitlist);
if($hitlistrows > '0'){
while ($array = mysql_fetch_array($hitlist)){
$amount = $array['amount'];
$victimid = $array['id'];

mysql_query("DELETE FROM hitlist WHERE id = '$victimid'");
mysql_query("UPDATE users SET money = (money + $amount) WHERE ID = '$ida'");}}

mysql_query("UPDATE users SET bullets = (bullets - $bullets) WHERE ID = '$ida'");
mysql_query("UPDATE users SET grenades = (grenades - $nades) WHERE ID = '$ida'");

mysql_query("DELETE FROM hospital WHERE username = '$ban'");
mysql_query("DELETE FROM robbery WHERE invite = '$ban'");
mysql_query("DELETE FROM blackjack WHERE username = '$ban'");
mysql_query("DELETE FROM jail WHERE username = '$ban'");
mysql_query("DELETE FROM travel WHERE username = '$ban'");
mysql_query("UPDATE cars SET price = '0' WHERE owner = '$ban'");
mysql_query("UPDATE cars SET owner = '$gangsterusername' WHERE owner = '$ban'");

$bank = mysql_query("SELECT * FROM bank WHERE username = '$ban'");
$banks = mysql_num_rows($bank);
if($banks != '0'){
$banka = mysql_fetch_array($bank);
$amount = $banka['amount'];
mysql_query("UPDATE users SET money = (money + $amount) WHERE username = '$ban'");
mysql_query("DELETE FROM bank WHERE username = '$ban'");
}




$casinotest = mysql_num_rows(mysql_query("SELECT * FROM casinos WHERE owner = '$ban'"));
if($casinotest == '1'){echo"<br><br><font color=white face=verdana size=1>You now own his casino!</font>";mysql_query("UPDATE casinos SET owner = '$gangsterusername' WHERE owner = '$ban'");mysql_query("UPDATE casinos SET nickname = '$gangsterusername' WHERE nickname = '$ban'");}
elseif($casinotest > '1'){echo"<br><br><font color=white face=verdana size=1>You now own his casinos!</font>";mysql_query("UPDATE casinos SET owner = '$gangsterusername' WHERE owner = '$ban'");mysql_query("UPDATE casinos SET nickname = '$gangsterusername' WHERE nickname = '$ban'");}else{}

mysql_query("DELETE FROM bodyguards WHERE username = '$ban' AND status = '2'");

if($ban == 'Tony'){

mysql_query("UPDATE users SET status = 'Alive',recover = '0' WHERE username = 'Tony'");
mysql_query("UPDATE users SET money = (money + 2500000) WHERE ID = '$ida'");
mysql_query("UPDATE users SET tony = '1' WHERE ID = '$ida'");
$sendinfo = "Thanks for the help bro ;).\[br\]You sent $2,500,000 to $gangsterusername!";
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$gangsterusername','Reausaw ','yes','$userip','$sendinfo')");
mysql_query("INSERT INTO moneysent(username,amount,sent,ip)
VALUES ('Reausaw ','2500000','$gangsterusername','$userip')");
$sendinfo = "Hey man, i need you to buy some Marijuana for me :P\[br\]Go to the Drugs page and buy some units of it, travel to Washington and sell it for me ;)\[br\]I will send you $2,250,000 as soon as you have done it:)";
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$gangsterusername','Reausaw ','yes','$userip','$sendinfo')");

 


}

if($crewid != '0'){
$boss = mysql_num_rows(mysql_query("SELECT * FROM crews WHERE boss = '$ban'"));



if($boss > '0'){$members = mysql_num_rows(mysql_query("SELECT * FROM users WHERE crewid = '$crewid' AND status = 'Alive'"));



if($members < 1){ mysql_query("DELETE FROM crews WHERE boss = '$ban'");
mysql_query("DELETE FROM applicants WHERE crewid = '$crewid'");
mysql_query("DELETE FROM recruiters WHERE crewid = '$crewid'");
mysql_query("UPDATE users SET crewid = '0' WHERE crewid = '$crewid'");}

else{

$newbossa = mysql_query("SELECT username FROM users WHERE crewid = '$crewid' AND status = 'Alive' ORDER BY rankid DESC LIMIT 0,1");
$newboss = mysql_fetch_array($newbossa);
$newbossname = $newboss['username'];
mysql_query("UPDATE crews SET boss = '$newbossname' WHERE id = '$crewid'");}}}






}






}}





$countsearcha = mysql_query("SELECT * FROM searches WHERE username = '$gangsterusername'");
$countsearchesa = mysql_num_rows($countsearcha);

if($orderby == '1'){
$countsearch = mysql_query("SELECT * FROM searches WHERE username = '$gangsterusername' ORDER BY victim ASC LIMIT $selectfrom,$selectto ");}

elseif($orderby == '2'){
$countsearch = mysql_query("SELECT * FROM searches WHERE username = '$gangsterusername' ORDER BY id ASC LIMIT $selectfrom,$selectto ");}


else{
$countsearch = mysql_query("SELECT * FROM searches WHERE username = '$gangsterusername' ORDER BY id DESC LIMIT $selectfrom,$selectto ");}


$countsearches = mysql_num_rows($countsearch);


?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Kill</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<font color=silver face=verdana size=1>To kill someone, you must first search them for 3hours or more, then travel to the same location as them.</font><br><br><table cellpadding=0 cellspacing=1 width=15% align="center">
<form method=post>
<tr><td width=100% colspan="2" bgcolor=#222222 NOWRAP align="center" height="5"></td></tr>
<tr><td width=100% colspan="2" bgcolor=#333333 NOWRAP align="center"><font color=silver face=verdana size=1>Kill</font></td></tr>
<tr><td width=60% bgcolor=#222222 NOWRAP><font color=silver face=verdana size=1>&nbsp;Username:</font></td><td width=40% bgcolor=#333333 NOWRAP><input style="width:115;" type=textbox name=user class=textbox></td></tr>
<tr><td width=60% bgcolor=#222222 NOWRAP><font color=silver face=verdana size=1>&nbsp;Bullets:</font></td><td width=40% bgcolor=#333333 NOWRAP><input style="width:115;"  type=textbox name=bullets class=textbox></td></tr>
<tr><td width=60% bgcolor=#222222 NOWRAP><font color=silver face=verdana size=1>&nbsp;Hand Grenades (</font><font color=<? if($$statustesttwo['grenades']!= '0'){echo'khaki';}else{echo'silver';} ?> face=verdana size=1><b><?echo number_format($statustesttwo['grenades']);?></b></font><font color=silver face=verdana size=1>):</font></td><td width=40% bgcolor=#333333 NOWRAP><input style="width:115;"  type=textbox name=grenades class=textbox></td></tr>
<tr><td width=60% bgcolor=#222222 NOWRAP><font color=silver face=verdana size=1>&nbsp;Death Message:</font></td><td width=40% bgcolor=#333333 NOWRAP><textarea name="reason" style="width:115;" class=textbox></textarea></tr></td></tr>
<tr><td width=100% colspan="2" bgcolor=#333333 NOWRAP align="right"><input type=submit value='Shoot' class=textbox name=dokill></td></tr>
</form>
</table>


<br><br><table cellpadding=0 cellspacing=1 width=15% align="center">
<form method=post>
<tr><td width=100% colspan="2" bgcolor=#222222 NOWRAP align="center" height="5"></td></tr>
<tr><td width=100% colspan="2" bgcolor=#333333 NOWRAP align="center"><font color=silver face=verdana size=1>Search User </font></td></tr>
<tr><td width=60% bgcolor=#222222 NOWRAP><font color=silver face=verdana size=1>&nbsp;Username:</font></td><td width=40% bgcolor=#333333 NOWRAP><input style="width:115;" type=textbox name=search class=textbox></td></tr>
<tr><td width=60% bgcolor=#222222 NOWRAP><font color=silver face=verdana size=1>&nbsp;Hours:</font></td><td width=40% bgcolor=#333333 NOWRAP><input style="width:115;"  type=textbox name=hours class=textbox></td></tr>
<? if($countsearchesa > '45'){?><tr><td width=100% NOWRAP colspan=3>
<table width="100%" cellpadding="0" cellspacing="1"><tr><td width=33% NOWRAP bgcolor=#222222>
<font color=silver face=verdana size=1>Security code:</font></td><td width=33% bgcolor=#222222 valign=middle><input style="width:50;" type=textbox name=ver class=textbox></td><td width=33% bgcolor=#222222 valign=middle><img id="1" src="vercode1.php?id=<?echo$ID;$ty = rand(0,999999);echo"&x=$ty";?>"></td></tr></table></td></tr><?}?>
<tr><td width=100% colspan="2" bgcolor=#333333 NOWRAP align="right"><input type=submit value='Search' class=textbox name=dosearch></td></tr>
</form>
</table>


<?if($countsearchesa != '0'){?><center><iframe align=center scrolling="no" frameborder="0" src="allsearch.php" iframe width=45%></iframe></center><?}?>
<br><Br><a href=viewtopic.php?topicid=40566>What does a hand grenade do? Click here</a>
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