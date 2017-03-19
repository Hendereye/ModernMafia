<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php 
include_once 'includes/connection.php'; 

$ipAddress = $_SERVER['REMOTE_ADDR'];

$hiok = $connection->query("SELECT * FROM logintimes WHERE ip = '$ipAddress ' ORDER BY time desc LIMIT 1");
$ffs = mysqli_num_rows($hiok);
$ffss = mysqli_fetch_array($hiok);
$getlast = $ffss['username'];

/* Facebook Referrals
if($_GET['fb']){
$we = mysqli_num_rows($connection->query("SELECT * FROM igref WHERE ip = '$ipAddress '"));
if($we == '0'){
$connection->query("INSERT INTO igref(ip)VALUES ('$ipAddress ')");}
} */

if(isset($_GET['n'])){$hehe = 'passwordlog';}else{$hehe = 'usernamelog';}


?>
<html><head><title>Modern Mafia - Online Multiplayer Mafia Game</title>
<link rel="apple-touch-icon" sizes="57x57" href="more/favicons/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="more/favicons/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="more/favicons/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="more/favicons/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="more/favicons/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="more/favicons/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="more/favicons/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="more/favicons/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="more/favicons/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="more/favicons/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="more/favicons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="more/favicons/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="more/favicons/favicon-16x16.png">
<link rel="manifest" href="more/favicons/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="more/favicons/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

<script>
function tt(){document.f.<? echo $hehe;?>.focus();}


function register()
{document.getElementById("register").style.display = "block"; 
document.getElementById("login").style.display = "none";
document.getElementById("lostpass").style.display = "none";}
function login()
{document.getElementById("register").style.display = "none"; 
document.getElementById("login").style.display = "block";
document.getElementById("lostpass").style.display = "none";}
function lostpass()
{document.getElementById("register").style.display = "none"; 
document.getElementById("login").style.display = "none";
document.getElementById("lostpass").style.display = "block";}

</script>

<style type="text/css">
body {
	background-color: #222222;
}

#leaderboard {	text-align: center;	
	position: absolute;
	position: fixed;
	bottom: 0;
	height: 50px;
	overflow: hidden;
	width: 100%;
	background: #222; /* old browsers */
	
	background: -moz-linear-gradient(top, #222 0%, #000000 100%); /* firefox */
	
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#222), color-stop(100%,#000000)); /* webkit */
	
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#222222', endColorstr='#000000',GradientType=0 ); /* ie */
	
	background: -o-linear-gradient(top, #222222 0%,#000000 100%); /* opera */

}

.textbox{background-color: #999999; border-bottom: 1px solid #626262; border-left: 1px solid #040404; border-right: 1px solid #626262; border-top: 1px solid #040404; color: black; font-family: verdana; font-size: 10px; font-weight: bold;}
.textboxs{background-color: #414141; border-bottom: 1px solid #626262; border-left: 1px solid #040404; border-right: 1px solid #626262; border-top: 1px solid #040404; color: white; font-family: verdana; font-size: 10px; }

.mainmenutable{border-style: solid; border-bottom: 1px solid #626262; border-left: 1px solid #040404; border-right: 1px solid #626262; border-top: 1px solid #040404;}
a {color: white; font-weight:bold;text-decoration: none;}
a:hover {color: white; text-decoration: underline;}
</style>
<meta name="keywords" content="gangster, scarface, godfather, don, shooting, guns, multiplayer,  notorious, game, online, text-based, free mmorpg, mmorpg, online rpg, online mafia game, online mafia, mafia game, mafia, kill, shoot, weapon, armour">
</head>
<body onLoad="tt()"leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<div style="display:none">Modern Mafia is a free web based Massive Multiplayer Online Mafia Game. Chat, gamble, hustle and kill other users.</div>
<table align="center" width="760" height="559" cell padding="0" background="/mafiansociety.jpg">
<tr><td height="340" colspan="6"></td></tr>
<tr><td height="100" colspan="6" valign="top">
<div align="center" id=login>
<table cellpadding="0" cellspacing="2" align="center" class="mainmenutable" bgcolor="#222222">

<tr><td height="15" bgcolor="#444444" colspan="2"><center><font size="1" face="verdana" color="white">Modern Mafia Login</font></center></td></tr>
<form action="/verify.php" method="post" name="f">
<tr><td width="100" height="8" bgcolor="#333333" align=left><label for=tt><font color="white" face="verdana" size="1">&nbsp;Username:</font></label></td><td height="8" bgcolor="#333333"><input type="text" name="usernamelog" id="tt"  class="textbox" value="<?php if(isset($_GET['n'])){echo $_GET['n'];}?>"></td></tr>
<tr><td width="100" height="8" bgcolor="#333333" align=left><label for=tts><font color="white" face="verdana" size="1">&nbsp;Password:</font></td><td height="8" bgcolor="#333333"><input type="password" name="passwordlog" id=tts class="textbox"></label></td></tr>
<tr><td height="8" bgcolor="#666666" colspan="2"><center><input type="submit" name="login" class="textboxs" value="Login"></center></td></tr>
</form>
</table></div>


<div align="center" id=register style="display:none;">
<table cellpadding="0" cellspacing="2" align="center" class="mainmenutable" bgcolor="#222222">
<tr><td height="15" bgcolor="#444444" colspan="2"><center><font size="1" face="verdana" color="white">Modern Mafia Register</font></center></td></tr>
<form action="register.php" method="post">
<tr>
<td width="100" height="8" bgcolor="#333333" align=left><label for=1><font color="white" face="verdana" size="1">&nbsp;Username:</font></labe></td><td height="8" bgcolor="#222222"><input type="text" id="1" name="desireduser" class="textbox" value=" Username" onblur="if(this.value=='') this.value=' Username';" onfocus="if(this.value==' Username') this.value='';"></td></tr>

<tr><td width="100" height="8" bgcolor="#333333" align=left><label for=2><font color="white" face="verdana" size="1">&nbsp;Password:</font></labe></td><td height="8" bgcolor="#222222"><input type="text" id="2" name="password" class="textbox" value=" Password" onblur="if(this.value=='') this.value=' Password';" onfocus="if(this.value==' Password') this.value='';"></td></tr>
<tr><td width="100" height="8" bgcolor="#333333"><label for=3><font color="white" face="verdana" size="1">&nbsp;Email (optional)<b>:</b></font></labe></td><td height="8" bgcolor="#222222"><input type="text" id="3" name="useremail" class="textbox" value=" Email" onblur="if(this.value=='') this.value=' Email';" onfocus="if(this.value==' Email') this.value='';"></td></tr>
<tr><td bgcolor="#666666" colspan="2"><center><input type="submit" name="login" onClick=this.value='Processing..'  class="textboxs" value="Register"></center></td></tr>
</form>
</table>
</div>

<div align="center" id=lostpass  style="display:none;">
<table cellpadding="0" cellspacing="2" align="center" class="mainmenutable" bgcolor="#222222">

<tr><td height="15" bgcolor="#444444" colspan="2"><center><font size="1" face="verdana" color="white">Modern Mafia Lost Password</font></center></td></tr>
<form action="lostpass.php" method="post">
<tr>
<td width="100" height="8" bgcolor="#333333"><label for=tt><font color="white" face="verdana" size="1">&nbsp;Username:</font></label></td><td height="8" bgcolor="#222222"><input type="text" name="username" id="tt" class="textbox" onblur="if(this.value=='') this.value=' Username';" onfocus="if(this.value==' Username') this.value='';"  value=" Username" id=1></td></tr>
<tr><td width="100" height="8" bgcolor="#333333"><label for=2><font color="white" face="verdana" size="1">&nbsp;Email:</font></label></td><td height="8" bgcolor="#222222"><input type="text" id=2 name="email" class="textbox" onblur="if(this.value=='') this.value=' Email';" onfocus="if(this.value==' Email') this.value='';" value=" Email"></td></tr>
<tr><td width="100%" height="8" bgcolor="#666666" colspan="2" align="center"><input type="submit" class="textboxs" value="Reset Password"></td></tr>
</form>
</table>
</div>


</td></tr>
<tr><td colspan=6 align=center valign=top><font size="1" face="verdana" color="white">This user has already tried logging in the past <b>15</b> seconds. <b style=color:red;>Please wait <?echo $errortwo;?> seconds.</b></font></td></tr>
<noscript>
<tr><td colspan=6 align=center><font size="1" face="verdana" color="silver">You currently have javascript disabled</font></td></tr>
</noscript>

<tr class=jsonly><td colspan=6 align=center valign=top></td></tr>
</table>

<div id=leaderboard><center><font face=verdana size=2><a title="Login" onclick="login();return false;" href="index.php"><b>Login</b></a>&nbsp;&nbsp;&nbsp;&nbsp;<a title="Register" href=register.php  onclick="register();return false;" href=#><font color=khaki>Register</font></a>&nbsp;&nbsp;&nbsp;&nbsp;<a title="Screenshots" onclick="window.open ('ss.php', 'newwindow', config='height=600, width=900, menubar=no, location=no, directories=no, status=no')" href=#>Screenshots</a>&nbsp;&nbsp;&nbsp;&nbsp;<a  onclick="lostpass();return false;" href=lostpass.php href=#>Lost password</a></font></div>
</body>
<head><META HTTP-EQUIV="Pragma" CONTENT="no-cache"></head></html>