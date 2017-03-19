<? include 'included.php'; ?>

<?



$time = time();
$times = $time + 300;
$jailtime = $time + 120;
$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$vera = mysql_real_escape_string($_POST['ver']);

$transportmethods = mysql_real_escape_string($_POST['transport']);
$sessionid = preg_replace($saturate,"",$sessionidraw);
$verpost = preg_replace($saturate,"",$vera);
$transportmethod = preg_replace($saturated,"",$transportmethods);

if($transportmethod == '1'){$transportmethod = 'Train';}elseif($transportmethod == '2'){$transportmethod = 'Car';}else{$transportmethod = 'Lorry';}

$userip = $_SERVER[REMOTE_ADDR]; 
$gangsterusername = $usernameone;
$jailtest = mysql_query("SELECT username FROM jail WHERE username  = '$gangsterusername'");
$jailtester = mysql_num_rows($jailtest);
if($jailtester != '0'){die(include 'jail.php'); }
$check = $statustesttwo['sentmsgs'];
$cruw = $statustesttwo['crewid'];


$stealbulletsbutton = "7";
$stealfrombutton = "6";
$kidnapbutton = "5";
$robbutton = "4";
$mugbutton = "3";
$hustlebutton = "2";
$begbutton = "1";
$hidden = "hi";

$timea = time();
 $mtr = mt_rand(0,50000000);


?>


<html>
<head>
<link rel="stylesheet" href="more/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="shortcut icon" href="/more/icon.png" type="image/x-icon" />
</head>
<body background="/more/bgtest.png">
<script type="text/javascript">
function emotion(em) { document.smiley.editprofile.value=document.smiley.editprofile.value+em;}
</script>
<table width="100%" height="335" align="center" cellpadding="0" cellspacing="3">
<tr>
<td width="250" height="25"></td>
<td width="66%">
</td>
<td width="250"></td>
</tr>

<tr>
<td width="250" valign="top">
<? include 'leftmenu.php'; ?>
</td>
<td valign="top" width="100%">
<?php 


$time = time();


$getuserinfoarray = $statustesttwo;
$username = $getuserinfoarray['username'];
$reward = $getuserinfoarray['reward'];
$rank = $getuserinfoarray['rankid'];
$percentages = $getuserinfoarray['fuel'];
$ID = $getuserinfoarray['ID'];
$ver = $getuserinfoarray['ver1'];
$input = $getuserinfoarray['input'];
$fueleffec = $getuserinfoarray['fueleffec'];
$timea = time();

$timeleftto = $fueleffec - $timea;
$neweffec = $timea + 1500;

$fueltime = $begraw - $time;

$inputrand = mt_rand(0,20);
if($inputrand == '0'){$newinput = 1;}
$crimes = '0';

$percentage = number_format($percentages / 100, 2);

$takeway = 100-$percentage;

if(isset($_POST['ver'])){

if(strtoupper($verpost) != $ver){die('<font color=white face=verdana size=1>Error, security code incorrect</font>');}
else{$alphanum = "ABCDEFGHIJKLMNPQRSTUVWXYZ123456789";$randver = substr(str_shuffle($alphanum), 0, 2);mysql_query("UPDATE users SET ver1 = '$randver' WHERE ID = '$ida'");}



if($percentage < '5'){$supplybullets = mt_rand(4,8); $generated = mt_rand(500000,800000);$addeff = mt_rand(100,178);$min = '500,000';$max = '800,000';}
elseif($percentage < '15'){$supplybullets = mt_rand(10,19);$generated = mt_rand(800000,1200000);$addeff = mt_rand(35,45);$min = '800,000';$max = '1,200,000';}
elseif($percentage < '35'){$supplybullets = mt_rand(20,23);$generated = mt_rand(1200000,1350000);$addeff = mt_rand(20,27);$min = '1,200,000';$max = '1,350,000';}
elseif($percentage < '50'){$supplybullets = mt_rand(25,33);$generated = mt_rand(1350000,1500000);$addeff = mt_rand(13,17);$min = '1,350,000';$max = '1,500,000';}
elseif($percentage < '65'){$supplybullets = mt_rand(35,38);$generated = mt_rand(1500000,1850000);$addeff = mt_rand(10,13);$min = '1,500,000';$max = '1,850,000';}
elseif($percentage < '85'){$supplybullets = mt_rand(38,43);$generated = mt_rand(1850000,2100000);$addeff = mt_rand(10,11);$min = '1,850,000';$max = '2,100,000';}
elseif($percentage < '95'){$supplybullets = mt_rand(45,50);$generated = mt_rand(2100000,3200000);$addeff = mt_rand(5,9);$min = '2,100,000';$max = '3,200,000';}
elseif($percentage <= '101'){$supplybullets = mt_rand(51,62);$generated = mt_rand(3500000,4000000);$addeff = mt_rand(3,4);$min = '3,500,000';$max = '4,000,000';}

if($cruw == '0'){}
elseif($fueleffec > $timea){echo"<font color=white face=verdana size=1>You can supply bullets again in $timeleftto seconds!</font>";}
else{

if($percentage >= '100'){$addeff = 0;}

$generatedm = number_format($generated);

mysql_query("UPDATE users SET money = (money + $generated) WHERE ID = '$ida'");
mysql_query("UPDATE users SET fuel = (fuel + $addeff) WHERE ID = '$ida'");
mysql_query("UPDATE users SET fueleffec = '$neweffec' WHERE ID = '$ida'");
mysql_query("UPDATE crews SET bullets = bullets + $supplybullets WHERE id = '$crewid'");
echo"<font color=white face=verdana size=1>You supplied your crew with <b>$supplybullets</b> bullets via $transportmethod and earned $<b>$generatedm</b>!</font>";

}}

if($percentage < '5'){$supplybullets = mt_rand(4,8); $generated = mt_rand(500000,800000);$addeff = mt_rand(100,178);$min = '500,000';$max = '800,000';}
elseif($percentage < '15'){$supplybullets = mt_rand(10,19);$generated = mt_rand(800000,1200000);$addeff = mt_rand(35,45);$min = '800,000';$max = '1,200,000';}
elseif($percentage < '35'){$supplybullets = mt_rand(20,23);$generated = mt_rand(1200000,1350000);$addeff = mt_rand(20,27);$min = '1,200,000';$max = '1,350,000';}
elseif($percentage < '50'){$supplybullets = mt_rand(25,33);$generated = mt_rand(1350000,1500000);$addeff = mt_rand(13,17);$min = '1,350,000';$max = '1,500,000';}
elseif($percentage < '65'){$supplybullets = mt_rand(35,38);$generated = mt_rand(1500000,1850000);$addeff = mt_rand(10,13);$min = '1,500,000';$max = '1,850,000';}
elseif($percentage < '85'){$supplybullets = mt_rand(38,43);$generated = mt_rand(1850000,2100000);$addeff = mt_rand(10,11);$min = '1,850,000';$max = '2,100,000';}
elseif($percentage < '95'){$supplybullets = mt_rand(45,50);$generated = mt_rand(2100000,3200000);$addeff = mt_rand(5,9);$min = '2,100,000';$max = '3,200,000';}
elseif($percentage <= '101'){$supplybullets = mt_rand(51,62);$generated = mt_rand(3500000,4000000);$addeff = mt_rand(3,4);$min = '3,500,000';$max = '4,000,000';}



if($cruw == '0'){?> <font color=white face=verdana size=1>You must be in a crew to supply bullets, <a href=crews.php>Click here to JOIN A CREW!</a></font><?}?>
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Supply Bullets</font></font></b></center></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png"><center><Br>
<font color=white face=verdana size=2>Time before you can Supply Bullets: <? if($timeleftto <= '0'){echo"<b>Available</b>!";}else{echo number_format($timeleftto);echo' seconds!';}?> </font><br>
<br><img  src=vercode1.php?id=<?echo$ID;?>&hi=<?echo$mtr;?>><br><br><table width=225 cellpadding=2 border=1 cellspacing=1  style="-moz-border-radius-topleft:10px;-moz-border-radius-topright:10px;"><form method=post><?

if($percentage < '5'){$effcolour = 'red';$effdesc = 'Poor';}
elseif($percentage < '20'){$effcolour = 'orange';$effdesc = 'Regular';}
elseif($percentage < '45'){$effcolour = 'white';$effdesc = 'Good';}
elseif($percentage < '65'){$effcolour = 'white';$effdesc = 'Very Good';}
elseif($percentage < '100'){$effcolour = 'lime';$effdesc = 'Excellent';}
elseif($percentage >= '100'){$effcolour = 'khaki';$effdesc = 'Flawless!';}
?><tr><td width="<?echo$percentage;?>%" bgcolor=lime align=right  style="-moz-border-radius-topleft:10px;"><?if($percentage >= '75'){?><font color=navy face=verdana size=2><?echo$percentage;?>% </font><font color=navy face=verdana size=2>(<font color=navy size=2><?echo$effdesc;?></font>)</font><?}?></td><td  style="-moz-border-radius-topright:10px;" width="<?echo$takeway;?>%" bgcolor=<?if($percentage >= '100'){echo'lime';}else{echo'222222';}?> align=right><?if($percentage < '75'){?><font color=white face=verdana size=2><?echo$percentage;?>% (<b><font color=khaki><?echo$effdesc;?></font></b>)</font><?}?></td></tr>

<tr><td colspan=2><input type=textbox name=ver class=textbox style="width:100%;" value="Enter Code above here:" onclick="this.value='';"></td></tr>

<tr><td colspan=2 align=center bgcolor=222222 nowrap>
<font color=khaki face=verdana size=2 >Transport method</font><br><label><input type=radio name=transport value=1><font color=white face=verdana size=1>Train&nbsp;</font></label><label>&nbsp;<input type=radio name=transport value=2><font color=white face=verdana size=1>Car&nbsp;</font></label><label>&nbsp;<input type=radio name=transport value=3><font color=white face=verdana size=1>Lorry</font>&nbsp;</label></td></tr>
<tr><Td colspan=2><input style=width:100% type=submit class=textbox value="Supply Bullets!"></td></tr>
</form>
</table>



<br></center>

<?if($cruw == '0'){?><br><br><font color=dodge face=verdana size=1>You </font><font color=red face=verdana size=1><b>MUST</font></b><font color=dodge face=verdana size=1> join a crew to supply bullets, <a href=crews.php>Click here to apply for a crew!</a></font><?}?><b>
<table width="98%" cellpadding="0" cellspacing="0" align="center"><tr><td height="1"  bgcolor="#444444"></td></tr><tr><td height=8></td></table>

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
<?
$statustesttwo = $getuserinfoarray;?>
<td width="250" valign="top">
<? include 'rightmenu.php'; ?>
</td>
</tr>
</table>

</body></html>