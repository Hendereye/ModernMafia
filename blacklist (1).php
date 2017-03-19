<? include 'included.php';
 ?>

<html>
<head>
<title>Mafia Society</title><link rel="stylesheet" href="more/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="shortcut icon" href="/more/icon.png" type="image/x-icon" />
</head>
<body background="/more/bgtest.png">
<script type="text/javascript">
function emotion(em) { document.smiley.newpost.value=document.smiley.newpost.value+em;}
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

$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$wordraw = $_POST['add'];
$word = htmlentities($wordraw, ENT_QUOTES);
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$gangsterusername = $usernameone;

$playerrank = $myrank;

if(($playerrank < '25')&&($hdo < '1')){die(' ');}

$checkword = mysql_num_rows(mysql_query("SELECT * FROM blacklist WHERE word = '$word'"));

if(isset($_POST['add'])){
if(!$word){}else{echo"<font color=white face=verdana size=1>Word blacklisted!</font>";
mysql_query("INSERT INTO blacklist(word) VALUES('$word')");}}

?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><b><center>Blacklist word</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<center><font color=white face=verdana size=1>Use this tool to block advertisers from posting game links, simply enter the name of the game they are advertising and the name will be replace with mafiasociety. <BR> <BR>ONLY USE THIS TO BLOCK ADVETISERS, NO OTHER WORDS.</B></font>
<form action="" method="post"><br><input type="text" name="add" class="textbox"><input type="submit" name="do" value="Blacklist word" class="textbox"></form><br>
</center>
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