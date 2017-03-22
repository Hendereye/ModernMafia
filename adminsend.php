<? include 'included.php'; //test

?>

<html>
<head>
<title>Immaculate Gangsters</title><link rel="stylesheet" href="more/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
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

$adminchecksql = mysql_query("SELECT * FROM users WHERE username = '$gangsterusername'")or die(mysql_error());
$admincheckarray = mysql_fetch_array($adminchecksql);
$admincheck = $admincheckarray['rankid'];


if($admincheck < '75'){die(' ');}

$replynamesql = mysql_query("SELECT * FROM messages WHERE sentto = '$gangsterusername' AND id = '$getreply'");
$replynamerows = mysql_num_rows($replynamesql);
$replynamearray = mysql_fetch_array($replynamesql);
$replyname = $replynamearray['sentfrom'];
$replyinforaw = $replynamearray['info'];
$replyinfo = str_replace("<br />", "\n", $replyinforaw);



if(isset($_POST['do'])) { 
if(!$sendinfo){}
$selectallsql = mysql_query("SELECT * FROM users WHERE status = 'Alive'");
while($selectallarray = mysql_fetch_array($selectallsql)){
$sendtoall = $selectallarray['username'];
mysql_query("INSERT INTO messages(sentto,sentfrom,new,sentip,info)
VALUES ('$sendtoall','$gangsterusername','yes','$userip','$sendinfo')");}
echo"<font color=\"white\" face=\"verdana\" size=\"1\"><b>Message sent to all</b>!</font>";}


?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="white" face="verdana" size="1"><center><b>Send to all</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<br><center><form action="" method="post" name="smiley"><font color="white" face="verdana" size="1">Message:</font><br><textarea name="sendinfo" cols="42" rows="11" class="textbox"></textarea><br>
<input type ="submit" value="Send message" class="textbox" name="do"></center>
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
