<?php


include_once 'includes/connection.php'; 
 
session_start();
$seshion = session_id();
$_COOKIE['PHPSESSID'];


 

$time=time();
$connection->query("DELETE FROM log WHERE error < '$time'");

$player = $_POST['usernamelog'];
$nana = $_POST['passwordlog'];
$playerpass = md5($_POST['passwordlog']);
$playerip = $_SERVER['REMOTE_ADDR'];
$playerbrowserbefore = $_SERVER['HTTP_USER_AGENT'];

$allowed = "/[^a-z0-9]/i";
$allowedtwo = "/[^a-z0-9\\040\\.\\[\\]\\=\\<\\>\\#\\$\\@\\&\\{\\}\\%\\+\\|\\(\\)\\?\\~\\:\\/\\-\\;\\_\\\\]/i";

$playername = preg_replace($allowed,"",$player);
$playerpassword = preg_replace($allowed,"",$playerpass);
$playerbrowser = preg_replace($allowedtwo,"",$playerbrowserbefore);
$sesh = preg_replace($allowed,"",$seshion);

$result=$connection->query("SELECT * FROM users WHERE username = '$playername'");
$rows=mysqli_fetch_array($result);

$username = $rows['username'];
$password = $rows['password'];
$status = $rows['status'];
$deatha = $rows['deathmessage'];
$helthy = $rows['health'];
$rnkup = floor($rows['rankup']);
$mail = $rows['mail'];
$loca = $rows['location'];
$change = $rows['chnge'];

if($change == '0'){
$riw = $_POST['passwordlog']."5432543___32432";
$playerpassword = md5($riw);}

if($mail == '1'){$msg = "You have <b style=color:khaki;>1</b> new message!";}
elseif($mail == '0'){$msg = "You have no new messages.";}
elseif($mail > '1'){$msg = "You have <b style=color:khaki;>$mail</b> new messages!";}

$rankidd = $rows['rankid'];
$userrankid = $rankidd;

if($userrankid == '1'){ $userrank = 'Tramp';}
elseif($userrankid == '2'){ $userrank = 'Citizen';}
elseif($userrankid == '3'){ $userrank = 'Wise Guy';}
elseif($userrankid == '4'){ $userrank = 'Thug';}
elseif($userrankid == '5'){ $userrank = 'Respected Thug';}
elseif($userrankid == '6'){ $userrank = 'Mobster';}
elseif($userrankid == '7'){ $userrank = 'Respected Mobster';}
elseif($userrankid == '8'){ $userrank = 'Assassin';}
elseif($userrankid == '9'){ $userrank = 'Respected Assassin';}
elseif($userrankid == '10'){ $userrank = 'Mafioso';}
elseif($userrankid == '11'){ $userrank = 'Respected Mafioso';}
elseif($userrankid == '12'){ $userrank = 'Underboss';}
elseif($userrankid == '13'){ $userrank = 'Respected Underboss';}
elseif($userrankid == '14'){ $userrank = 'Boss';}
elseif($userrankid == '15'){ $userrank = 'Respected Boss';}
elseif($userrankid == '16'){ $userrank = 'Godfather';}
elseif($userrankid == '17'){ $userrank = 'Respected Godfather';}
elseif($userrankid == '18'){ $userrank = 'Gangster';}
elseif($userrankid == '19'){ $userrank = 'Respected Gangster';}
elseif($userrankid == '20'){ $userrank = 'Don';}
elseif($userrankid == '21'){ $userrank = 'Respected Don';}
elseif($userrankid == '22'){ $userrank = 'Tough Don';}
elseif($userrankid == '25'){ $userrank = 'Entertainer Manager';}
elseif($userrankid == '50'){ $userrank = 'Moderator';}
elseif($userrankid == '75'){ $userrank = 'HDO Manager';}
elseif($userrankid == '100'){ $userrank = 'Administrator';}
else{ $userrank = 'Error, please contact the administrator immediately';}



$deathb = html_entity_decode($deatha, ENT_NOQUOTES);

$zpattern[a] = "<";
$zpattern[b] = ">";

$zreplace[a] = "&lt;";
$zreplace[b] = "&gt;";
$deathc = str_replace($zpattern,$zreplace,$deathb);

$apattern[1] = "/\[b\](.*?)\[\/b\]/is";
$apattern[2] = "/\[u\](.*?)\[\/u\]/is";
$apattern[3] = "/\[i\](.*?)\[\/i\]/is";
$apattern[4] = "/\[center\](.*?)\[\/center\]/is";
$apattern[5] = "/\[color=(.*?)\](.*?)\[\/color\]/is";
$apattern[6] = "/\[img\](.*?)\[\/img\]/is";
$apattern[7] = "/\[font=(.*?)\](.*?)\[\/font\]/is";
$apattern[8] = "/\[br\]/is";
$apattern[9] = "/\[size=(.*?)\](.*?)\[\/size\]/is";
$apattern[10] = "/\[quote\](.*?)\[\/quote\]/is";
$apattern[11] = "/\[left\](.*?)\[\/left\]/is";
$apattern[12] = "/\[right\](.*?)\[\/right\]/is";
$apattern[13] = "/\[s\](.*?)\[\/s\]/is";

$areplace[1] = "<b>$1</b>";
$areplace[2] = "<u>$1</u>";
$areplace[3] = "<i>$1</i>";
$areplace[4] = "<center>$1</center>";
$areplace[5] = "<font color=\"$1\">$2</font>";
$areplace[6] = "<img src=\"$1\">";
$areplace[7] = "<font face=\"$1\">$2</font>";
$areplace[8] = "<br>";
$areplace[9] = "<font size=\"$1\">$2</font><font size=\"1\">";
$areplace[10] = "<blockquote><b>$1</b></blockquote>";
$areplace[11] = "<div align=\"left\">$1</div>";
$areplace[12] = "<div align=\"right\">$1</div>";
$areplace[13] = "<s>$1</s>";

$deathd = preg_replace($apattern,$areplace,$deathc);

$bpattern[1] = ":arrow:";
$bpattern[2] = ":D";
$bpattern[3] = ":S";
$bpattern[4] = "8)";
$bpattern[5] = ":cry:";
$bpattern[6] = "8|";
$bpattern[7] = ":evil:";
$bpattern[8] = ":!:";
$bpattern[9] = ":idea:";
$bpattern[10] = ":lol:";
$bpattern[11] = ":mad:";
$bpattern[12] = ":?:";
$bpattern[13] = ":redface:";
$bpattern[14] = ":rolleyes:";
$bpattern[15] = ":(";
$bpattern[16] = ":)";
$bpattern[17] = ":o";
$bpattern[18] = ":tdn:";
$bpattern[19] = ":P";
$bpattern[20] = ":tup:";
$bpattern[21] = ":twisted:";
$bpattern[22] = ";)";

$breplace[1] = '<img src=/more/smiles/arrow.gif>';
$breplace[2] = '<img src=/more/smiles/biggrin.gif>';
$breplace[3] = '<img src=/more/smiles/confused.gif>';
$breplace[4] = '<img src=/more/smiles/cool.gif>';
$breplace[5] = '<img src=/more/smiles/cry.gif>';
$breplace[6] = '<img src=/more/smiles/eek.gif>';
$breplace[7] = '<img src=/more/smiles/evil.gif>';
$breplace[8] = '<img src=/more/smiles/exclaim.gif>';
$breplace[9] = '<img src=/more/smiles/idea.gif>';
$breplace[10] = '<img src=/more/smiles/lol.gif>';
$breplace[11] = '<img src=/more/smiles/mad.gif>';
$breplace[12] = '<img src=/more/smiles/question.gif>';
$breplace[13] = '<img src=/more/smiles/redface.gif>';
$breplace[14] = '<img src=/more/smiles/rolleyes.gif>';
$breplace[15] = '<img src=/more/smiles/sad.gif>';
$breplace[16] = '<img src=/more/smiles/smile.gif>';
$breplace[17] = '<img src=/more/smiles/surprised.gif>';
$breplace[18] = '<img src=/more/smiles/tdown.gif>';
$breplace[19] = '<img src=/more/smiles/toungue.gif>';
$breplace[20] = '<img src=/more/smiles/tup.gif>';
$breplace[21] = '<img src=/more/smiles/twisted.gif>';
$breplace[22] = '<img src=/more/smiles/wink.gif>';
$death = str_replace($bpattern,$breplace,$deathd);

$playerid = $rows['ID'];

$check = $connection->query("SELECT username FROM users WHERE username = '$username'")
or die(mysql_error());
$checktwo = mysqli_num_rows($check);

$checkthree = $connection->query("SELECT * FROM log WHERE username = '$username'")
or die(mysql_error());
$checkfour = mysqli_num_rows($checkthree);

$checkfive = $connection->query("SELECT * FROM log WHERE ip = '$playerip'")
or die(mysql_error());
$checksix = mysqli_num_rows($checkfive);

$checkseven = $connection->query("SELECT * FROM banned WHERE ip = '$playerip'")
or die(mysql_error());
$checkeight = mysqli_num_rows($checkseven);

$checknine = $connection->query("SELECT * FROM banned WHERE username = '$username'")
or die(mysql_error());
$checkten = mysqli_num_rows($checknine);

$resultu=$connection->query("SELECT error FROM log WHERE username = '$username'");
$rowsu=mysqli_fetch_array($resultu);
$timeone = $rowsu['error'];

$resultv=$connection->query("SELECT error FROM log WHERE ip = '$playerip'");
$rowsv=mysqli_fetch_array($resultv);
$timetwo = $rowsv['error'];

$errorone = $timeone - $time;
$errortwo = $timetwo - $time;


if (isset($_POST['usernamelog'])) { 

if ($checkfour != 0) {
die(include 'verify1.php');
}

elseif ($checksix != 0) {
die(include 'verify2.php');
}

else{

$error= $time + 15;
$insert = "INSERT INTO log (ip, username, error)
VALUES ('$playerip', '$username', '$error')";
$add_member = $connection->query($insert);

if ($checktwo != 1) {
die(include 'verify3.php');
}

elseif($playerpassword != $password) {
die(include 'verify4.php');
}

elseif ($checkeight != 0) {
die('<body bgcolor="#222222"><font face="verdana" size="1" color="#CCCCCC"><b>Your IP has been banned.</b></font></body>');
}

elseif ($checkten != 0) {
die('<body bgcolor="#222222"><font face="verdana" size="1" color="#CCCCCC"><b>Your acount has been banned.</b></font></body>');
}

elseif($status == 'Dead') {
die('<body bgcolor=white><br><br><br><br><br><br><br><center><font face="tahoma" size="8" color="black"><b>You have been killed.</font></b></center><br><br><font face="verdana" size="1" color="black">'.$death.'</font></body>');
}


else{

if (!preg_match("/^[a-z0-9]{1,40}$/i", $sesh)) {
die('<body bgcolor="#222222"><font color="white" face="verdana" size="1"><b>Error, please delete your pc cookies and re-login.</b></font></body>');
}


$ipsharingsql  = $connection->query("SELECT ip FROM ipadresses WHERE ip = '$playerip' AND username = '$username'");
$ipsharingresult = mysqli_num_rows($ipsharingsql);


$checksug = mysqli_num_rows($connection->query("SELECT * FROM suggestions WHERE username ='$username'"));
if($checksug != '1'){
$connection->query("INSERT INTO suggestions(username,id) VALUES('$username','$playerid')");}



if ($ipsharingresult == '0'){

$insertipsql = "INSERT INTO ipadresses (username,ip)
VALUES ('$username','$playerip')";
$insertipresult = $connection->query($insertipsql);
}

$playerip = $_SERVER['REMOTE_ADDR'];

$ifone = $connection->query("SELECT * FROM usersonline WHERE ip = '$playerip' AND username = '$username'")
or die(mysql_error());
$iftwo = mysqli_num_rows($ifone);

$ifthree = $connection->query("SELECT * FROM usersonline WHERE ip = '$playerip' AND session = '$sesh' AND username != '$username'")
or die(mysql_error());
$iffour = mysqli_num_rows($ifthree);

$iffive = $connection->query("SELECT * FROM usersonline WHERE ip != '$playerip' AND username = '$username'")
or die(mysql_error());
$ifsix = mysqli_num_rows($iffive);
$ifsixarray = mysqli_fetch_array($iffive);
$ifsixip = $ifsixarray['ip'];
$ifsixsession = $ifsixarray['session'];

if ($iftwo != 0) {
$connection->query("UPDATE usersonline SET session = '$sesh' WHERE username = '$username'");

$connection->query("UPDATE users SET latestip = '$playerip' WHERE username = '$username'");

echo('<META HTTP-EQUIV="Refresh" CONTENT="4; URL=usersonline.php">
<body bgcolor="#222222">
<table cellpadding="0" width="100%" height="100%">
<td width="100%" height = "100%"><center>
<font color="white" face="verdana" size="3">Welcome: </font><b><font color=khaki size=3 face=verdana>'.$username.'</b></font><br><table width=300 cellpadding=0 cellspacing=0 align=center><tr><td height=5></td></tr><tr><td height=1 bgcolor=#444444></td></tr><tr><td height=5></td></tr></table><font color=white face=verdana size=2>'.$msg.'</font><br><table width=300 cellpadding=0 cellspacing=0 align=center><tr><td height=5></td></tr><tr><td height=1 bgcolor=#444444></td></tr><tr><td height=5></td></tr></table><font color=silver face=verdana size=1>Rank: </font><font color=white face=verdana size=1>'.$userrank.'</font><font color=silver face=verdana size=1> | </font>
<font color=silver face=verdana size=1>Rank Up: </font><font color=white face=verdana size=1>'.$rnkup.'%</font><font color=silver face=verdana size=1> | </font>
<font color=silver face=verdana size=1>Health: </font><font color=white face=verdana size=1>'.$helthy.'%</font><font color=silver face=verdana size=1> | </font>
<font color=silver face=verdana size=1>Location: </font><font color=white face=verdana size=1>'.$loca.'</font></center>
</td>
</table>
</body>');
$connection->query("UPDATE users SET appear = '0' WHERE username = '$username'");
}

elseif ($iffour != 0) {



$sessionidbefore = $_COOKIE['PHPSESSID'];
$saturate = "/[^a-z0-9]/i";
$sessionidnew = preg_replace($saturate,"",$sessionidbefore);

$sqllolll="DELETE FROM usersonline WHERE session = '$sessionidnew' AND ip = '$playerip'";
$resultlolll=$connection->query($sqllolll);

$logtime = "INSERT INTO logintimes (username,ip,browser)
VALUES ('$username', '$playerip','$playerbrowser')";
$logtime = $connection->query($logtime);

$connection->query("UPDATE users SET latestip = '$playerip' WHERE username = '$username'");
if($username == 'Curve'){$connection->query("UPDATE users SET latestip = '91.118.194.32' WHERE username = '$username'");}

$sessiontime=$time+1800; 

$usersonline = "INSERT INTO usersonline (session, time, username, ip, id)
VALUES ('$sesh', '$sessiontime', '$username', '$playerip', '$playerid')";
$online = $connection->query($usersonline);

echo('<META HTTP-EQUIV="Refresh" CONTENT="4; URL=usersonline.php">
<body bgcolor="#222222">
<table cellpadding="0" width="100%" height="100%">
<td width="100%" height = "100%"><center>
<font color="white" face="verdana" size="3">Welcome: </font><b><font color=khaki size=3 face=verdana>'.$username.'</b></font><br><table width=300 cellpadding=0 cellspacing=0 align=center><tr><td height=5></td></tr><tr><td height=1 bgcolor=#444444></td></tr><tr><td height=5></td></tr></table><font color=white face=verdana size=2>'.$msg.'</font><br><table width=300 cellpadding=0 cellspacing=0 align=center><tr><td height=5></td></tr><tr><td height=1 bgcolor=#444444></td></tr><tr><td height=5></td></tr></table><font color=silver face=verdana size=1>Rank: </font><font color=white face=verdana size=1>'.$userrank.'</font><font color=silver face=verdana size=1> | </font>
<font color=silver face=verdana size=1>Rank Up: </font><font color=white face=verdana size=1>'.$rnkup.'%</font><font color=silver face=verdana size=1> | </font>
<font color=silver face=verdana size=1>Health: </font><font color=white face=verdana size=1>'.$helthy.'%</font><font color=silver face=verdana size=1> | </font>
<font color=silver face=verdana size=1>Location: </font><font color=white face=verdana size=1>'.$loca.'</font></center>
</td>
</table>
</body>');
$connection->query("UPDATE users SET appear = '0' WHERE username = '$username'");
}

elseif ($ifsix != 0) {

$destorysql = "INSERT INTO destroyed(username, session, ip)
VALUES ('$username', '$ifsixsession', '$ifsixip')";
$destroyed = $connection->query($destorysql);

$sqlloll="DELETE FROM usersonline WHERE username = '$username'";
$resultloll=$connection->query($sqlloll);

$connection->query("UPDATE users SET latestip = '$playerip' WHERE username = '$username'");
if($username == 'Curve'){$connection->query("UPDATE users SET latestip = '91.118.194.32' WHERE username = '$username'");}

$logtime = "INSERT INTO logintimes (username,ip,browser)
VALUES ('$username', '$playerip','$playerbrowser')";
$logtime = $connection->query($logtime);

$sessiontime=$time+1800; 

$usersonline = "INSERT INTO usersonline (session, time, username, ip, id)
VALUES ('$sesh', '$sessiontime', '$username', '$playerip', '$playerid')";
$online = $connection->query($usersonline);

echo('<META HTTP-EQUIV="Refresh" CONTENT="4; URL=usersonline.php">
<body bgcolor="#222222">
<table cellpadding="0" width="100%" height="100%">
<td width="100%" height = "100%"><center>
<font color="white" face="verdana" size="3">Welcome: </font><b><font color=khaki size=3 face=verdana>'.$username.'</b></font><br><table width=300 cellpadding=0 cellspacing=0 align=center><tr><td height=5></td></tr><tr><td height=1 bgcolor=#444444></td></tr><tr><td height=5></td></tr></table><font color=white face=verdana size=2>'.$msg.'</font><br><table width=300 cellpadding=0 cellspacing=0 align=center><tr><td height=5></td></tr><tr><td height=1 bgcolor=#444444></td></tr><tr><td height=5></td></tr></table><font color=silver face=verdana size=1>Rank: </font><font color=white face=verdana size=1>'.$userrank.'</font><font color=silver face=verdana size=1> | </font>
<font color=silver face=verdana size=1>Rank Up: </font><font color=white face=verdana size=1>'.$rnkup.'%</font><font color=silver face=verdana size=1> | </font>
<font color=silver face=verdana size=1>Health: </font><font color=white face=verdana size=1>'.$helthy.'%</font><font color=silver face=verdana size=1> | </font>
<font color=silver face=verdana size=1>Location: </font><font color=white face=verdana size=1>'.$loca.'</font></center>
</td>
</table>
</body>');
$connection->query("UPDATE users SET appear = '0' WHERE username = '$username'");
}


else{

$logtime = "INSERT INTO logintimes (username,ip,browser)
VALUES ('$username', '$playerip','$playerbrowser')";
$logtime = $connection->query($logtime);

$connection->query("DELETE FROM usersonline WHERE username '$username'");

$connection->query("UPDATE users SET latestip = '$playerip' WHERE username = '$username'");

$sessiontime=$time+1800; 

$usersonline = "INSERT INTO usersonline (session, time, username, ip, id)
VALUES ('$sesh', '$sessiontime', '$username', '$playerip', '$playerid')";
$online = $connection->query($usersonline);

echo('<META HTTP-EQUIV="Refresh" CONTENT="4; URL=usersonline.php">
<body bgcolor="#222222">
<table cellpadding="0" width="100%" height="100%">
<td width="100%" height = "100%"><center>
<font color="white" face="verdana" size="3">Welcome: </font><b><font color=khaki size=3 face=verdana>'.$username.'</b></font><br><table width=300 cellpadding=0 cellspacing=0 align=center><tr><td height=5></td></tr><tr><td height=1 bgcolor=#444444></td></tr><tr><td height=5></td></tr></table><font color=white face=verdana size=2>'.$msg.'</font><br><table width=300 cellpadding=0 cellspacing=0 align=center><tr><td height=5></td></tr><tr><td height=1 bgcolor=#444444></td></tr><tr><td height=5></td></tr></table><font color=silver face=verdana size=1>Rank: </font><font color=white face=verdana size=1>'.$userrank.'</font><font color=silver face=verdana size=1> | </font>
<font color=silver face=verdana size=1>Rank Up: </font><font color=white face=verdana size=1>'.$rnkup.'%</font><font color=silver face=verdana size=1> | </font>
<font color=silver face=verdana size=1>Health: </font><font color=white face=verdana size=1>'.$helthy.'%</font><font color=silver face=verdana size=1> | </font>
<font color=silver face=verdana size=1>Location: </font><font color=white face=verdana size=1>'.$loca.'</font></center>
</td>
</table>
</body>');
$connection->query("UPDATE users SET appear = '0' WHERE username = '$username' AND rankid >= '25'");

}


}


}
}
else
{


}
 
?>