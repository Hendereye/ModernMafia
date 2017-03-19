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


$entertainer = $ent;
if($entertainer != '0'){die('<font color=silver face=verdana size=1>As entertainer you cannot view this page</font>');}




$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 

$gangsterusernamearray = $statustesttwo;
$gangsterusername = $gangsterusernamearray['username'];
$amounta = $_POST['amount'];
$amount = preg_replace($saturated,"",$amounta);
$amountr = number_format($amount);
$getinfosql = mysql_query("SELECT * FROM users WHERE username = '$gangsterusername'");
$getinfoarray = $gangsterusernamearray;
$getcrewid = $getinfoarray['crewid'];
$getname = $getinfoarray['username'];
$getrank = $getinfoarray['rankid'];
$getmoney = $getinfoarray['money'];

$crewnamesql = mysql_query("SELECT * FROM crews WHERE id = '$getcrewid'");
$crewnamearray = mysql_fetch_array($crewnamesql);
$crewnameraw = $crewnamearray['name'];
$crewname= htmlentities($crewnameraw,ENT_QUOTES);

$crewbosscheck = mysql_query("SELECT * FROM crews WHERE boss = '$getname'");
$crewbosscheckrows = mysql_num_rows($crewbosscheck);
$recruitercheck = mysql_query("SELECT * FROM recruiters WHERE username = '$getname'");
$recruitercheckrows = mysql_num_rows($recruitercheck);

if($getcrewid == '0'){die(' ');}


if(isset($_POST['do'])){
if(!$amount){}
elseif($amount > $getmoney){echo"<font color=white face=verdana size=1>You dont have enough money</font>";}
else{
mysql_query("UPDATE users SET money = money - $amount WHERE username = '$gangsterusername' AND money >= '$amount'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 1.</font>');}

echo"<font color=white face=verdana size=1>You added $$amountr to your crew bank!</font>";
mysql_query("UPDATE users SET crewd = crewd + $amount WHERE username = '$gangsterusername'");
mysql_query("UPDATE crews SET cash = cash + $amount WHERE id = '$getcrewid'");
}}

?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Donate to crew bank</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png"><form action="" method="post">
<br><font color=white face=verdana size=1>On this page you can donate money to your crews cash bank anonymously.<br>The money you donate will be taken from you and entered into the crew bank.<br>The crew boss can see how much is in the bank, and give cash from it to anybody in the crew.</font><form action="" method="post"><br><br><center><font color=white face=verdana size=1>Cash amount:</font><input type="text" class="textbox" name="amount"><input type="submit" value="Give cash" class="textbox" name="do"></center></form>
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