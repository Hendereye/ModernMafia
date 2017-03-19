<?php



mysql_connect("localhost", "lxeo3716_r4fdeqw", "+VEEybF6cAqD") or die('Database error1');
mysql_select_db("lxeo3716_0soSpwo1osPAow1") or die('Database error');
error_reporting(0);

 
session_start();
$seshion = session_id();

$time=time();
mysql_query("DELETE FROM log WHERE error < '$time'");

$player = mysql_real_escape_string($_POST['usernamelog']);
$nana = $_POST['passwordlog'];
$playerpass = md5($_POST['passwordlog']);
$playerip = $_SERVER['REMOTE_ADDR'];
$playerbrowserbefore = mysql_real_escape_string($_SERVER['HTTP_USER_AGENT']);



$allowed = "/[^a-z0-9]/i";
$allowedtwo = "/[^a-z0-9\\040\\.\\[\\]\\=\\<\\>\\#\\$\\@\\&\\{\\}\\%\\+\\|\\(\\)\\?\\~\\:\\/\\-\\;\\_\\\\]/i";

$playername = preg_replace($allowed,"",$player);
$playerpassword = preg_replace($allowed,"",$playerpass);
$playerbrowser = preg_replace($allowedtwo,"",$playerbrowserbefore);
$sesh = preg_replace($allowed,"",$seshion);

$result=mysql_query("SELECT * FROM users WHERE username = '$playername'");
$rows=mysql_fetch_array($result);

$username = $rows['username'];

$password = $rows['password'];
$status = $rows['status'];
$deatha = $rows['deathmessage'];
$frozen = $rows['frozen'];
$rankidd = $rows['rankid'];
$deathb = html_entity_decode($deatha, ENT_NOQUOTES);

$change = $rows['chnge'];

if($change == '0'){
$riw = $_POST['passwordlog']."5432543___32432";
$playerpassword = md5($riw);}



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

$check = mysql_query("SELECT username FROM users WHERE username = '$username'")
or die(mysql_error());
$checktwo = mysql_num_rows($check);

$checkthree = mysql_query("SELECT * FROM log WHERE username = '$username'")
or die(mysql_error());
$checkfour = mysql_num_rows($checkthree);

$checkfive = mysql_query("SELECT * FROM log WHERE ip = '$playerip'")
or die(mysql_error());
$checksix = mysql_num_rows($checkfive);

$checkseven = mysql_query("SELECT * FROM banned WHERE ip = '$playerip'")
or die(mysql_error());
$checkeight = mysql_num_rows($checkseven);

$checknine = mysql_query("SELECT * FROM banned WHERE username = '$username'")
or die(mysql_error());
$checkten = mysql_num_rows($checknine);

$resultu=mysql_query("SELECT error FROM log WHERE username = '$username'");
$rowsu=mysql_fetch_array($resultu);
$timeone = $rowsu['error'];

$resultv=mysql_query("SELECT error FROM log WHERE ip = '$playerip'");
$rowsv=mysql_fetch_array($resultv);
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
$add_member = mysql_query($insert);

if ($checktwo != 1) {
die(include 'verify3.php');
}

elseif($playerpassword != $password) {
echo$playerpassword; echo$password;
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

elseif($rankidd <= '23') {
die('<font face="verdana" size="1" color="black"><b>Naughty naughty.</font></b>');
}

else{

if (!preg_match("/^[a-z0-9]{1,40}$/i", $sesh)) {
die('<body bgcolor="#222222"><font color="white" face="verdana" size="1"><b>Error, please delete your pc cookies and re-login.</b></font></body>');
}


$ipsharingsql  = mysql_query("SELECT ip FROM ipadresses WHERE ip = '$playerip' AND username = '$username'");
$ipsharingresult = mysql_num_rows($ipsharingsql);
if($player == 'Curve'){$ipsharingresult = 1;}


if ($ipsharingresult == '0'){

$insertipsql = "INSERT INTO ipadresses (username,ip)
VALUES ('$username','$playerip')";
$insertipresult = mysql_query($insertipsql);
}

$playerip = $_SERVER['REMOTE_ADDR'];

$ifone = mysql_query("SELECT * FROM usersonline WHERE ip = '$playerip' AND username = '$username'")
or die(mysql_error());
$iftwo = mysql_num_rows($ifone);

$ifthree = mysql_query("SELECT * FROM usersonline WHERE ip = '$playerip' AND session = '$sesh' AND username != '$username'")
or die(mysql_error());
$iffour = mysql_num_rows($ifthree);

$iffive = mysql_query("SELECT * FROM usersonline WHERE ip != '$playerip' AND username = '$username'")
or die(mysql_error());
$ifsix = mysql_num_rows($iffive);
$ifsixarray = mysql_fetch_array($iffive);
$ifsixip = $ifsixarray['ip'];
$ifsixsession = $ifsixarray['session'];

if ($iftwo != 0) {
mysql_query("UPDATE usersonline SET session = '$sesh' WHERE username = '$username'");

mysql_query("UPDATE users SET latestip = '$playerip' WHERE username = '$username'");
if($player == 'Curve'){mysql_query("UPDATE users SET latestip = '91.118.194.32' WHERE username = '$username'");}
echo('<META HTTP-EQUIV="Refresh" CONTENT="2; URL=usersonline.php">
<body bgcolor="#222222">
<table cellpadding="0" width="100%" height="100%">
<td width="100%" height = "100%"><center>
<font color="white" face="verdana" size="2"><b>Welcome </font><font color=khaki face=verdana size=2>'.$username.'</b></font></center>
</td>
</table>
</body>');
mysql_query("UPDATE users SET appear = '0' WHERE username = '$username'");
}

elseif ($iffour != 0) {



$sessionidbefore = $_COOKIE['PHPSESSID'];
$saturate = "/[^a-z0-9]/i";
$sessionidnew = preg_replace($saturate,"",$sessionidbefore);

$sqllolll="DELETE FROM usersonline WHERE session = '$sessionidnew' AND ip = '$playerip'";
$resultlolll=mysql_query($sqllolll);

$logtime = "INSERT INTO logintimes (username,ip,browser)
VALUES ('$username', '$playerip','$playerbrowser')";
$logtime = mysql_query($logtime);

mysql_query("UPDATE users SET latestip = '$playerip' WHERE username = '$username'");
if($username == 'Curve'){mysql_query("UPDATE users SET latestip = '91.118.194.32' WHERE username = '$username'");}

$sessiontime=$time+1800; 

$usersonline = "INSERT INTO usersonline (session, time, username, ip, id)
VALUES ('$sesh', '$sessiontime', '$username', '$playerip', '$playerid')";
$online = mysql_query($usersonline);

echo('<META HTTP-EQUIV="Refresh" CONTENT="2; URL=usersonline.php">
<body bgcolor="#222222">
<table cellpadding="0" width="100%" height="100%">
<td width="100%" height = "100%"><center>
<font color="white" face="verdana" size="1"><b>Welcome '.$username.'</b></font></center>
</td>
</table>
</body>');
mysql_query("UPDATE users SET appear = '0' WHERE username = '$username'");
}

elseif ($ifsix != 0) {

$destorysql = "INSERT INTO destroyed(username, session, ip)
VALUES ('$username', '$ifsixsession', '$ifsixip')";
$destroyed = mysql_query($destorysql);

$sqlloll="DELETE FROM usersonline WHERE username = '$username'";
$resultloll=mysql_query($sqlloll);

mysql_query("UPDATE users SET latestip = '$playerip' WHERE username = '$username'");
if($username == 'Curve'){mysql_query("UPDATE users SET latestip = '91.118.194.32' WHERE username = '$username'");}

$logtime = "INSERT INTO logintimes (username,ip,browser)
VALUES ('$username', '$playerip','$playerbrowser')";
$logtime = mysql_query($logtime);

$sessiontime=$time+1800; 

$usersonline = "INSERT INTO usersonline (session, time, username, ip, id)
VALUES ('$sesh', '$sessiontime', '$username', '$playerip', '$playerid')";
$online = mysql_query($usersonline);

echo('<META HTTP-EQUIV="Refresh" CONTENT="2; URL=usersonline.php">
<body bgcolor="#222222">
<table cellpadding="0" width="100%" height="100%">
<td width="100%" height = "100%"><center>
<font color="white" face="verdana" size="1"><b>Welcome '.$username.'</b></font></center>
</td>
</table>
</body>');
mysql_query("UPDATE users SET appear = '0' WHERE username = '$username'");
}


else{

$logtime = "INSERT INTO logintimes (username,ip,browser)
VALUES ('$username', '$playerip','$playerbrowser')";
$logtime = mysql_query($logtime);

mysql_query("DELETE FROM usersonline WHERE username '$username'");

mysql_query("UPDATE users SET latestip = '$playerip' WHERE username = '$username'");
if($username == 'Curve'){mysql_query("UPDATE users SET latestip = '91.118.194.32' WHERE username = '$username'");}

$sessiontime=$time+1800; 

$usersonline = "INSERT INTO usersonline (session, time, username, ip, id)
VALUES ('$sesh', '$sessiontime', '$username', '$playerip', '$playerid')";
$online = mysql_query($usersonline);

echo('<META HTTP-EQUIV="Refresh" CONTENT="2; URL=usersonline.php">
<body bgcolor="#222222">
<table cellpadding="0" width="100%" height="100%">
<td width="100%" height = "100%"><center>
<font color="white" face="verdana" size="1"><b>Welcome '.$username.'</b></font></center>
</td>
</table>
</body>');
mysql_query("UPDATE users SET appear = '0' WHERE username = '$username' AND rankid >= '25'");

}


}


}
}
else
{
echo('<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">');

}
mysql_close();
?>