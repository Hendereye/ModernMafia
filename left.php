<body background="bg/background.png">

<html>
<head>
<script>
function tt(){document.f.usernamelog.focus();}


function donation()
{document.getElementById("donation").style.display = "block"; 
document.getElementById("car").style.display = "none";
document.getElementById("casino").style.display = "none";
document.getElementById("admin").style.display = "block";
document.getElementById("mod").style.display = "none";
document.getElementById("eman").style.display = "none";
document.getElementById("hdo").style.display = "none";
document.getElementById("ent").style.display = "none";
document.getElementById("casinoview").style.display = "none";
document.getElementById("link").style.display = "none";}
function car()
{document.getElementById("donation").style.display = "none"; 
document.getElementById("car").style.display = "block";
document.getElementById("casino").style.display = "none";
document.getElementById("admin").style.display = "block";
document.getElementById("mod").style.display = "none";
document.getElementById("eman").style.display = "none";
document.getElementById("hdo").style.display = "none";
document.getElementById("ent").style.display = "none";
document.getElementById("casinoview").style.display = "none";
document.getElementById("link").style.display = "none";}
function casino()
{document.getElementById("donation").style.display = "none"; 
document.getElementById("car").style.display = "none";
document.getElementById("casino").style.display = "block";
document.getElementById("admin").style.display = "block";
document.getElementById("mod").style.display = "none";
document.getElementById("eman").style.display = "none";
document.getElementById("hdo").style.display = "none";
document.getElementById("ent").style.display = "none";
document.getElementById("casinoview").style.display = "none";
document.getElementById("link").style.display = "none";}
function admin()
{document.getElementById("donation").style.display = "none"; 
document.getElementById("car").style.display = "none";
document.getElementById("casino").style.display = "none";
document.getElementById("admin").style.display = "block";
document.getElementById("mod").style.display = "none";
document.getElementById("eman").style.display = "none";
document.getElementById("hdo").style.display = "none";
document.getElementById("ent").style.display = "none";
document.getElementById("casinoview").style.display = "none";
document.getElementById("link").style.display = "none";}
function mod()
{document.getElementById("donation").style.display = "none"; 
document.getElementById("car").style.display = "none";
document.getElementById("casino").style.display = "none";
document.getElementById("admin").style.display = "none";
document.getElementById("mod").style.display = "block";
document.getElementById("eman").style.display = "none";
document.getElementById("hdo").style.display = "none";
document.getElementById("ent").style.display = "none";
document.getElementById("casinoview").style.display = "none";
document.getElementById("link").style.display = "none";}
function eman()
{document.getElementById("donation").style.display = "none"; 
document.getElementById("car").style.display = "none";
document.getElementById("casino").style.display = "none";
document.getElementById("admin").style.display = "none";
document.getElementById("mod").style.display = "none";
document.getElementById("eman").style.display = "block";
document.getElementById("hdo").style.display = "none";
document.getElementById("ent").style.display = "none";
document.getElementById("casinoview").style.display = "none";
document.getElementById("link").style.display = "none";}
function hdo()
{document.getElementById("donation").style.display = "none"; 
document.getElementById("car").style.display = "none";
document.getElementById("casino").style.display = "none";
document.getElementById("admin").style.display = "none";
document.getElementById("mod").style.display = "none";
document.getElementById("eman").style.display = "none";
document.getElementById("hdo").style.display = "block";
document.getElementById("ent").style.display = "none";
document.getElementById("casinoview").style.display = "none";
document.getElementById("link").style.display = "none";}
function ent()
{document.getElementById("donation").style.display = "none"; 
document.getElementById("car").style.display = "none";
document.getElementById("casino").style.display = "none";
document.getElementById("admin").style.display = "none";
document.getElementById("mod").style.display = "none";
document.getElementById("eman").style.display = "none";
document.getElementById("hdo").style.display = "none";
document.getElementById("ent").style.display = "block";
document.getElementById("casinoview").style.display = "none";
document.getElementById("link").style.display = "none";}
function casinoview()
{document.getElementById("donation").style.display = "block"; 
document.getElementById("car").style.display = "none";
document.getElementById("casino").style.display = "none";
document.getElementById("admin").style.display = "block";
document.getElementById("mod").style.display = "none";
document.getElementById("eman").style.display = "none";
document.getElementById("hdo").style.display = "none";
document.getElementById("ent").style.display = "none";
document.getElementById("casinoview").style.display = "block";
document.getElementById("link").style.display = "none";}
function link()
{document.getElementById("donation").style.display = "none"; 
document.getElementById("car").style.display = "none";
document.getElementById("casino").style.display = "none";
document.getElementById("admin").style.display = "none";
document.getElementById("mod").style.display = "none";
document.getElementById("eman").style.display = "none";
document.getElementById("hdo").style.display = "none";
document.getElementById("ent").style.display = "none";
document.getElementById("casinoview").style.display = "none";
document.getElementById("link").style.display = "block";}
</script>
</head>

<body>
					<?php
include "includes/db_connect.php";
include "includes/rankup.php";

function trackURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}

$kkl = time();
$smd = mysql_query("SELECT * FROM `users` WHERE `userlevel`='3' AND `entfund`<'$kkl' AND `status`='Alive'");
while($okarr = mysql_fetch_array($smd)){
	$newtime = time() + 3600;
	$namekkt = $okarr['username'];
	mysql_query("UPDATE `users` SET `cash`=cash+'5000000',`entfund`='$newtime' WHERE `username`='$namekkt'");
}

$date = gmdate('Y-m-d h:i:s');
$username=$_SESSION["real_name"];


//This of course tells the website that what follows
$realip = isset($_SERVER['HTTP_X_FORWARDED_FOR']) ?
$_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];


$time = gmdate('Y-m-d h:i:s');
$time2 = time();
mysql_query("UPDATE users SET onlinetime='$time', lastloginip='$realip', onlinetime2='$time2' WHERE username='$username'");



$query=mysql_query("SELECT * FROM users WHERE username='$username' LIMIT 1");
$info = mysql_fetch_object($query);

$date = gmdate('Y-m-d h:i:s');

if ($info->status == "Dead"){
session_destroy();
echo "<table border='0' cellspacing='0' align='center' cellpadding='0' width='50%'>
<tr><td class='topleft'></td><td class='top'>Error!</td><td class='topright'></td></tr>
<tr><td class='left'></td><td class='main'>
<b>You have been killed!</b>
</td><td class='right'></td></tr>
<tr><td class='bottomleft'></td><td class='bottom'></td><td class='bottomright'></td></tr>
</table>";
exit();
}
if ($info->online == "Offline" && $info->userlevel <=3){
session_destroy();
echo "<table border='0' cellspacing='0' align='center' cellpadding='0' width='50%'>
<tr><td class='topleft'></td><td class='top'>Error</td><td class='topright'></td></tr>
<tr><td class='left'></td><td class='main'>
<b>Your account is offline!</b>
</td><td class='right'></td></tr>
<tr><td class='bottomleft'></td><td class='bottom'></td><td class='bottomright'></td></tr>
</table>";
exit();
}
if ($info->status == "Stand By"){
session_destroy();
echo "<table border='0' cellspacing='0' align='center' cellpadding='0' width='50%'>
<tr><td class='topleft'></td><td class='top'>Stand By</td><td class='topright'></td></tr>
<tr><td class='left'></td><td class='main'>
<h1><b>Your account is in stand by!</b></h1><br>
<br>
<b>Reason:</b> <i>You have been reported advertising so please keep checking your account and if this has not been removed within one hour then please Sign Up again and contact the Help Desk.<br>
<font color='red'>Note:</font> You must have proof this is your account.</i>
</td><td class='right'></td></tr>
<tr><td class='bottomleft'></td><td class='bottom'></td><td class='bottomright'></td></tr>
</table>";
exit();
}
if ($info->status == "Banned"){
session_destroy();
echo "<table border='0' cellspacing='0' align='center' cellpadding='0' width='50%'>
<tr><td class='topleft'></td><td class='top'>Error</td><td class='topright'></td></tr>
<tr><td class='left'></td><td class='main'>
<b>Your account has been banned for violating the TOS!</b>
</td><td class='right'></td></tr>
<tr><td class='bottomleft'></td><td class='bottom'></td><td class='bottomright'></td></tr>
</table>";
exit();
}
if ($info->update == "1"){
echo "<table border='0' cellspacing='0' align='center' cellpadding='0' width='50%'>
<tr><td class='topleft'></td><td class='top'>Update Needed!</td><td class='topright'></td></tr>
<tr><td class='left'></td><td class='main'>
Hello,<br>
<br>
An update has been added to <b>Eternal Society</b> and for you to be able to use this new update (and play the game) you must first update your account. Please remeber that the T.O.S might of changed. Because this is a new update you may check the FAQ to see what the new update is.<br><br>
<center><a href='updateacc.php'>Click Here</a></center>
</td><td class='right'></td></tr>
<tr><td class='bottomleft'></td><td class='bottom'></td><td class='bottomright'></td></tr>
</table>";
}
if ($info->userlevel > "10" && $info->acctype == "user"){
session_destroy();
echo "<table border='0' cellspacing='0' align='center' cellpadding='0' width='50%'>
<tr><td class='topleft'></td><td class='top'>Error</td><td class='topright'></td></tr>
<tr><td class='left'></td><td class='main'>
<b>Your account has been banned for attempting to hack the system, we do not like hackers at Eternal Society! If this was an error then please contact us on:<br>
hacksupport@eternal-society.com!</b>
</td><td class='right'></td></tr>
<tr><td class='bottomleft'></td><td class='bottom'></td><td class='bottomright'></td></tr>
</table>";
exit();
}
if ($info->online == "Online"){
$url = trackURL();
mysql_query("UPDATE users SET page='$url' WHERE username='$username'");

}
$sql="SELECT * from users WHERE username='$username' LIMIT 1";
$result=mysql_query($sql);
while($rows=mysql_fetch_array($result)){ // Start looping table row  

$entpay = $rows['entpay'];

}
if ($info->online == "Online" && $info->userlevel == "3"){
mysql_query("UPDATE users SET `cash`=`cash`+'$entpay' WHERE username='$username'");

}
if ($info->goldaccount == "1" && $info->goldbullets == "1"){
mysql_query("UPDATE users SET `bullets`=`bullets`+'60',`goldbullets`=`goldbullets`+'600',`goldbprofit`=`goldbprofit`+'60',`goldcprofit`=`goldcprofit`+'500000',`cash`=`cash`+'500000' WHERE username='$username'");

}

if ($info->goldaccount == "1" && $info->goldbullets >= "2"){
mysql_query("UPDATE users SET `goldbullets`=`goldbullets`-'1' WHERE username='$username'");

}if ($info->sliveraccount == "1" && $info->sliverbullets == "1"){
mysql_query("UPDATE users SET `bullets`=`bullets`+'60',`sliverbullets`=`sliverbullets`+'600',`sliverbprofit`=`sliverbprofit`+'60',`slivercprofit`=`slivercprofit`+'500000',`cash`=`cash`+'500000' WHERE username='$username'");

}
if ($info->sliveraccount == "1" && $info->sliverbullets >= "2"){
mysql_query("UPDATE users SET `sliverbullets`=`sliverbullets`-'1' WHERE username='$username'");

}
  function makecomma ($value) {
  
$value2=number_format($value);

    return $value2;
  }
  
  function secureint($intstr) {
    settype($instr,'integer');
    $intint=sprintf("%d",$intstr);
    $intint=intval($intint);
    return $intint;
  }
  function securestr($oldstr) {
    $oldstr=trim($oldstr);
    $oldstr=strip_tags($oldstr);
    $oldstr=sprintf("%s",$oldstr);
    addslashes($oldstr);
    return $oldstr;
  }

function maketime($until){

   $now = time();
   $difference = $until - $now;

   $days = floor($difference/86400);
   $difference = $difference - ($days*86400);

   $hours = floor($difference/3600);
   $difference = $difference - ($hours*3600);

   $minutes = floor($difference/60);
   $difference = $difference - ($minutes*60);

   $seconds = $difference;
   $output = "$hours:$minutes:$seconds";

   return $output;

}

function crimemaketime($until){

   $now = time();
   $difference = $until - $now;

   $days = floor($difference/86400);
   $difference = $difference - ($days*86400);

   $hours = floor($difference/3600);
   $difference = $difference - ($hours*3600);

   $minutes = floor($difference/60);
   $difference = $difference - ($minutes*60);

   $seconds = $difference;
   $output = "$minutes Minutes and $seconds Seconds";

   return $output;

}

$sql="SELECT * from users WHERE username='$username' LIMIT 1";
$result=mysql_query($sql);
while($rows=mysql_fetch_array($result)){ // Start looping table row  

$mypassword = $rows['password'];
$entpay = $rows['entpay'];
$banktimer= $rows['banktimer'];
$crewlevel = $rows['crewlevel'];
$userlevel = $rows['userlevel'];
$crew = $rows['crew'];
$country = $rows['country'];
$cash = $rows['cash'];
$health = $rows['health'];
$bullets = $rows['bullets'];
$gun = $rows['gun'];
$gunid = $rows['gunid'];
$rank = $rows['rank'];
$points = $rows['points'];
$rankpoints = $rows['rankpoints'];
$racewins = $rows['racewins'];
$raceloss = $rows['raceloss'];
$racelevel = $rows['racelevel'];
$editlevel = $rows['editlevel'];
$ptnl = $rows['ptnl'];
$trainwait = $rows['trainwait'];
$mute = $rows['mute'];
$mission = $rows['mission'];
$needcode = $rows['verify'];
$melttime = $rows['melttime'];
$jailreward = $rows['reward'];
$llip = $rows['lastloginip'];
$myip = $rows['ip'];
$gunid = $rows['gunid'];
$protectionid = $rows['protectionid'];
$presbust = $rows['presbust'];
$gun = $rows['gun'];
$bulletcalc = $rows['bulcalc'];
$rankbar = $rows['rankbar'];
$missionid = $rows['mission'];
$moneyholdercash = $rows['moneyholdercash'];
$bodyguard_slots = $rows['bodyguard_slots'];
$nbglevel = $rows['nbglevel'];
$referdone = $rows['referdone'];
$myrefer = $rows['referedby'];
$serveydone = $rows['servey'];
$blackjack = $rows['bj'];
$vodka= $rows['vodka'];
$spirit= $rows['spirit'];
$wine= $rows['wine'];
$lager= $rows['lager'];
$lager= $rows['lager'];
$accept1= $rows['accept1'];
$accept2= $rows['accept2'];
$accept3= $rows['accept3'];
$finished1= $rows['finished1'];
$finished2= $rows['finished2'];
$finished3= $rows['finished3'];
$nextshoot= $rows['nextshoot'];
$octimer= $rows['octimer'];
$donatesms= $rows['donatesms'];
$mynextoc= $rows2['nextoc'];
$custom = $rows['custom'];
$perm = $rows['perm'];
$killfind = $rows['find'];
$totalcrimes = $rows['totalcrimes'];
$totalgta = $rows['totalgta'];
$scoree = $rows['scoree'];
$totalbusts = $rows['totalbusts'];
$totaloc = $rows['totaloc'];
$lb = $rows['lb'];
$badpoints = $rows['badpoints'];
$casinoban = $rows['casinoban'];
$rcas = $rows['rcas'];
$cbt = $rows['cbtime'];
$bgslots = $rows['bgslots'];
$bgcolour = $rows['bgcolour'];
$fontsize = $rows['fontsize'];
$donate = $rows['donate'];
$font = $rows['font'];
$fontcolour = $rows['fontcolour'];
$fontweight = $rows['fontweight'];
$height = $fontsize + 2;
$hdtick = $rows['hdtickets'];
$designer = $rows['designer'];
$totalmelted = $rows['carm'];
$admin="red";
$coder="crimson";
$mod="black";
$eman="dodgerblue";
$headhdo="cyan";
$hdo="yellow";
$ent="orange";
$findpage = $_SERVER["REQUEST_URI"];
} 
$select = mysql_query("SELECT * FROM iptrack WHERE username='$username' AND ip='$realip' LIMIT 1");
$num = mysql_num_rows($select);

if($num<="0"){

mysql_query("INSERT INTO `iptrack` ( `id` , `ip` , `username` ) VALUES (
'', '$realip', '$username')");
}

$query=mysql_query("SELECT * FROM users WHERE username='$username' LIMIT 1");
$info = mysql_fetch_object($query);



if ($moneyholder == "1"){ $max="100000000";}
elseif ($moneyholder== "2"){ $max="300000000";}
elseif ($moneyholder== "3"){ $max="750000000";}

$max2 = number_format($max);

$sql="SELECT * FROM users WHERE username='$username' LIMIT 1";
$result=mysql_query($sql);
$rows=mysql_fetch_array($result);
$date = gmdate('Y-m-d h:i:s');


if (($rows['rank'] == "Tramp") && ($rows['rankpoints'] >= "2")){ $newrank="Civillian"; $done="1"; }



elseif (($rows['rank']== "Civillian") && ($rows['rankpoints'] >= "30")){ $newrank="Vandal"; $done="1"; }



elseif (($rows['rank']== "Vandal") && ($rows['rankpoints'] >= "50")){ $newrank="Hustler"; $done="1"; }



elseif (($rows['rank']== "Hustler") && ($rows['rankpoints'] >= "400")){ $newrank="Criminal Hustler"; $done="1"; }



elseif (($rows['rank']== "Criminal Hustler") && ($rows['rankpoints'] >= "800")){ $newrank="Hitman"; $done="1"; }



elseif (($rows['rank']== "Hitman") && ($rows['rankpoints'] >= "1300")){ $newrank="Criminal Hitman"; $done="1"; }



elseif (($rows['rank']== "Criminal Hitman") && ($rows['rankpoints'] >= "1500")){ $newrank="Boss"; $done="1"; }



elseif (($rows['rank']== "Boss") && ($rows['rankpoints'] >= "2800")){ $newrank="Crew Boss"; $done="1"; }



elseif (($rows['rank']== "Crew Boss") && ($rows['rankpoints'] >= "3900")){ $newrank="Godfather"; $done="1"; }



elseif (($rows['rank']== "Godfather") && ($rows['rankpoints'] >= "5500")){ $newrank="Criminal Godfather"; $done="1"; }



elseif (($rows['rank']== "Criminal Godfather") && ($rows['rankpoints'] >= "7600")){ $newrank="Don"; $done="1"; }



elseif (($rows['rank']== "Don") && ($rows['rankpoints'] >= "9000")){ $newrank="Criminal Don"; $done="1"; }



elseif (($rows['rank']== "Criminal Don") && ($rows['rankpoints'] >= "13000")){ $newrank="Sovereign"; $done="1"; }



elseif (($rows['rank']== "Sovereign") && ($rows['rankpoints'] >= "16000")){ $newrank="Regional Sovereign"; $done="1"; }



elseif (($rows['rank']== "Regional Sovereign") && ($rows['rankpoints'] >= "19500")){ $newrank="Criminal Sovereign"; $done="1"; }



elseif (($rows['rank']== "Criminal Sovereign") && ($rows['rankpoints'] >= "23500")){ $newrank="Gangster"; $done="1"; }



elseif (($rows['rank']== "Gangster") && ($rows['rankpoints'] >= "28000")){ $newrank="Regional Gangster";  $done="1"; }
elseif (($rows['rank']== "Regional Gangster") && ($rows['rankpoints'] >= "39000")){ $newrank="Legendary Don"; $done="1"; }
elseif (($rows['rank']== "Legendary Don") && ($rows['rankpoints'] >= "47000")){ $newrank="Capo"; $done="1"; }
elseif (($rows['rank']== "Capo") && ($rows['rankpoints'] >= "59000")){ $newrank="State Capo"; $done="1"; }
elseif (($rows['rank']== "State Capo") && ($rows['rankpoints'] >= "70000")){ $newrank="Eternal Gangster"; $done="2"; }

else{ $done =="0"; }
if ($done == "1"){

mysql_query("UPDATE users SET rank='$newrank', mail='1', bullets=bullets+'1337' WHERE username='$username'");
mysql_query("INSERT INTO `messages` ( `id` , `t` , `f` , `message` , `date` , `r` , `saved` ) 
VALUES (
'', '$username', '$username', '<center><b>Rank Up!</b></center><br>You have been promoted to $newrank and recived 1,337 bullets!', '$date', '0', '0')");
mysql_query("INSERT INTO `logs` ( `id` , `who` , `action` , `date` ) VALUES ('', '$username', 'Ranked up to <b>$newrank</b>!', '$date')");
}
else{ $done =="0"; }
if ($done == "2"){
mysql_query("UPDATE users SET rank='$newrank', mail='1', cash=cash+'10000000' WHERE username='$username'");
mysql_query("INSERT INTO `messages` ( `id` , `t` , `f` , `message` , `date` , `r` , `saved` ) 
VALUES (
'', '$username', '$username', 'You have reached the correct rank to create a crew!<br>We have rewarded you with $10,000,000!', '$date', '0', '0')");
mysql_query("INSERT INTO `logs` ( `id` , `who` , `action` , `date` ) VALUES ('', '$username', 'Ranked up to <b>$newrank</b>!', '$date')");
}
else{ $done =="0"; }
if ($done == "3"){
mysql_query("UPDATE users SET rank='$newrank', mail='1', bullets=bullets+'15000', cash=cash+'15000000' WHERE username='$username'");
mysql_query("INSERT INTO `messages` ( `id` , `t` , `f` , `message` , `date` , `r` , `saved` ) 
VALUES (
'', '$username', '$username', 'You have reached <b>Eternal Gangster</b>!<br>We have rewarded you with $15,000,000 & 15,000 Bullets!', '$date', '0', '0')");
mysql_query("INSERT INTO `logs` ( `id` , `who` , `action` , `date` ) VALUES ('', '$username', 'Ranked up to <b>$newrank</b>!', '$date')");
}
?>



<LINK REL="SHORTCUT ICON" HREF="favicon.ico">
<?
if ($findpage == "/find.php")
{?>
<script language="javascript" type="text/javascript"> 
 
<!-- 
//Browser Support Code
function ajaxFunction(){
	var ajaxRequest;  // The variable that makes Ajax possible!
	
	try{
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
	} catch (e){
		// Internet Explorer Browsers
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				// Something went wrong
				alert("Your browser broke!");
				return false;
			}
		}
	}
	
var str = escape(document.getElementById('username').value);
var strhehe = "&rand="+Math.random();
	ajaxRequest.open("GET", "hehe2.php?username=" + str + strhehe, true);
 
	ajaxRequest.send(null); 
// Create a function that will receive data sent from the server
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
 
 
document.getElementById("findy").innerHTML = '<center><img src=loading.gif></center>';
 setTimeout("document.getElementById('findy').innerHTML = '<font color=#222222 face=verdana size=1><center><b>Find Player</b></font>';",550);
 
     
 
			document.getElementById("myTD").innerHTML = ajaxRequest.responseText;
}}
}
 
//-->
</script>
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
<table border="0" cellspacing="0" align="center" cellpadding="0" width="200">
  <tr>
    <td class="topleft"></td>
<td class="top" NOWRAP id=findy><font color=#222222 face=verdana size=1><center><b>Find Player</b></font></center></td>

    <td class="topright"></td>
  </tr>
  <tr>
    <td class="left"></td>
    <td class="main">
      <form action="" method="post">
        <table border="0" cellspacing="2" width="20%" cellpadding="0" align="center">
          <tr>
           
          </tr>
          <tr>
            
            <td class="tab" width="77%"><input type="text" name="user" id='input' id=username onkeyup="ajaxFunction();" onclick="document.teehee.username.select()" value="Username"></td>
          </tr>
        </table>
    </form></td>
    <td class="right"></td>
  </tr>
  <tr>
    <td class="bottomleft"></td>
    <td class="bottom"></td>
    <td class="bottomright"></td>
  </tr>
</table>
<?
}
?> 
<table border="0" cellspacing="0" align="center" cellpadding="0" width="200">
<tr>
<td class="topleft"></td>
<td class="top"><center>Navigation</center></td>
<td class="topright"></td>
</tr>
<tr>
<td class="left"></td>
<td class="main">
<div class="menuheader">Information</div>
<div class="sep"></div>
<div class="menulinks">
<?
if ($userlevel >= 3)
{?>
<A HREF="stafflinks.php"><font color="gold">Staff Panel </font><?
if ($hdtick >= 1 && $userlevel >= 4)
{?>
<font color='red'><b>- Ticket</b>
<?
}
?></font></A>
<?
}
?>
<A HREF="news.php">The Society Times</A>
<A HREF="ipsharing.php">IP Sharing</A>
<A HREF="FAQ.php">FAQ</A>
<A HREF="helpdesk.php">Help Desk</A>
<A HREF="gamestats.php">Game Statistics</A>
<A HREF="mystats.php">Personal Statistics</A>
<A HREF="online.php">Users Online</A>
<A HREF="referal.php">Referral</A>
<A HREF="editprofile.php">Edit Profile</A>
<A HREF="properties.php">Properties</A>
<A HREF="find.php">Find User</A>
<A HREF="top.php">Top 5</A>
<A HREF="notepad.php">Notepad</A>
<A HREF="points.php"><font color="dodgerblue">Points</font></A>
<A HREF="donate.php"><font color="dodgerblue">Donate</font><?php if($donate == "1"){ echo ""; }else{ ?> (<i><font color="orange">x<?php echo number_format($donate); ?></font></i>)</A><?php }?>
</div>
<div class="sep"></div>
<div class="menuheader">Communications</div>
<div class="sep"></div>
<div class="menulinks">
<A HREF="send.php">Send Message</A>
<A HREF="inbox.php">Inbox</A>
<?
if ($crewlevel > 3)
{?>
<A HREF="#">Crew Forum</A>
<?
}
?>
<A HREF="forum.php">Main Forum</A>
<A HREF="dforum.php">Designers Forum</A>
<A HREF="eforum.php">Entertainer Forum</A>  </div>
<div class="sep"></div>
<div class="menuheader">Ranking</div>
<div class="sep"></div>
<div class="menulinks">
<A HREF="crimes.php">Crimes</A>
<A HREF="stealcars.php">Steal Cars</A>
<A HREF="melt.php">Melt</A>
<A HREF="repair.php">Repair A Car</A>
<A HREF="garage.php">Garage</A>
<A HREF="missions.php">Missions</A>
<A HREF="jail.php">Jail</A>
<A HREF="organizedcrime.php">Organized Crime</A>
</div>
<div class="sep"></div>
<div class="menuheader">Money / Casinos</div>
<div class="sep"></div>
<div class="menulinks">
<A HREF="bank.php">ES Bank<?php if($accept2 == "1" && $mission == "2"){ ?><font color=red>*</font><?php } ?></A>
<A HREF="quicktrade.php">Quick Trade</A>
<A HREF="weapons.php">Weapon Shop</A>
<A HREF="protection.php">Armour Store</A>
<A HREF="sell.php">Sell Items</A>
<A HREF="retrieve.php">Retrieve</A>
<div class="sep"></div>
<div class="menuheader">Casino Options</div>
<div class="sep"></div>
<A HREF="mdg.php">Multidice</A>
<A HREF="blackjack.php">Black Jack</A>
<A HREF="dice.php">Dice</A>
<A HREF="roulette.php">Roulette</A>
<A HREF="dogracing.php">Dog Racing</A> 
<a href="ace.php">Ace Club</a> 
<a href="lotto.php">Lottery</a> 
<a href="russianroulette.php">Russian Roulette</a></div>
<div class="sep"></div>
<div class="menuheader">Offence / Actions</div>
<div class="sep"></div>
<div class="menulinks">
<A HREF="kill.php">Kill</A>
<A HREF="blacklist.php">Blacklist</A>
<A HREF="hospital.php">Hospital</A>
<A HREF="travel.php">Travel Agency</A>
<A HREF="bulletfactory.php">Bullet Factory</A>
<A HREF="attempts.php">Attempts</A>
</div>
<div class="sep"></div>
<div class="menuheader">Crews</div>
<div class="sep"></div>
<div class="menulinks">
<A HREF="crews.php">Lead A Crew</A>
<?
if ($crewlevel > 3)
{?>
<A HREF="crewbank.php">Crew Bank</A>
<?
}
?>
<?
if ($crewlevel > 4)
{?>
<A HREF="crewapplications.php">Crew Applications</A>
<?
}
?>
<?
if ($crewlevel > 6)
{?>
<A HREF="crewmanagement.php">Crew Management</A>
<?
}
?>
</div>
</div>
<div class="sep"></div>
<div class="header"><a href="logout.php">Logout</a></div>
<div class="sep"></div>
</td>
<td class="right"></td>
</tr>
<tr>
<td class="bottomleft"></td>
<td class="bottom"></td>
<td class="bottomright"></td>
</tr>
</table>	
</body>
</html>
