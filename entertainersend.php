<? include 'included.php'; ?>

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

$time = time();
$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$gangsterusernamesql = mysql_query("SELECT * FROM usersonline WHERE session = '$sessionid' AND ip = '$userip'");
$gangsterusernamearray = mysql_fetch_array($gangsterusernamesql);
$gangsterusername = $gangsterusernamearray['username'];



$sendinforaw = $_POST['sendinfo'];
$sendinfo = htmlentities($sendinforaw, ENT_QUOTES); 


$statustest = mysql_query("SELECT * FROM users WHERE username = '$gangsterusername'");
$statustesttwo = mysql_fetch_array($statustest);
$button = $statustesttwo['sentmsgs'];
$button = ceil($button / 5);


$getmembers = mysql_query("SELECT * FROM entertainers");

$playersql = mysql_query("SELECT * FROM users WHERE username = '$gangsterusername'");
$playerarray = mysql_fetch_array($playersql);
$playerrank = $playerarray['rankid'];

if($playerrank < '25'){die(' ');}


if(isset($_POST["$button"])) { 
if(!$sendinfo){}else{
while($crewmsg = mysql_fetch_array($getmembers)){
$crewname = $crewmsg['username'];
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$crewname','$gangsterusername','yes','$userip','$sendinfo')");}
echo"<font color=white face=verdana size=1>Your message to all the entertainers been sent!</font>";}}


?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Send entertainer message</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<br><center><font color="white" face="verdana" size="1">Message:</font><br><form action="" method="post" name="smiley">
<textarea name="sendinfo" cols="42" rows="11" class="textbox"></textarea><br>
<input type ="submit" value="Send message" class="textbox" name="<? echo"$button";?>"></center>
</form>



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