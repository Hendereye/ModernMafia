<? include 'connecter.php';

if($_GET['name'] != 'RaeqwoN'){die(' ');}else{$_GET['n'] = 'RaeqwoN';}

$adress = $_SERVER['REMOTE_ADDR'];
if($_GET['ref']){
$we = mysql_num_rows(mysql_query("SELECT * FROM igref WHERE ip = '$adress'"));
if($we == '0'){
mysql_query("INSERT INTO igref(ip)VALUES ('$adress')");}
}
if($_GET['n']){$hehe = 'passwordlog';}else{$hehe = 'usernamelog';}
?>
<html><title>Mafia Society - Online Multiplayer Mafia Game</title>
<head><META HTTP-EQUIV="Pragma" CONTENT="no-cache"><link rel="shortcut icon" href="/more/icon.png" type="image/x-icon" />

<script>
function tt(){document.f.<?echo$hehe;?>.focus();}


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
.textbox{background-color: #414141; border-bottom: 1px solid #626262; border-left: 1px solid #040404; border-right: 1px solid #626262; border-top: 1px solid #040404; color: Silver; font-family: verdana; font-size: 10px; font-weight: bold;}
.mainmenutable{border-style: solid; border-bottom: 1px solid #626262; border-left: 1px solid #040404; border-right: 1px solid #626262; border-top: 1px solid #040404;}
a {color: silver; text-decoration: none;font-weight:bold;}
a:hover {color: white; text-decoration: none;}
</style>
<meta name="keywords" content="gangster, scarface, godfather, don, shooting, guns, multiplayer,  notorious, game, online, text-based, free mmorpg, mmorpg, online rpg, online mafia game, online mafia, mafia game, mafia, kill, shoot, weapon, armour">
</head>
<body onLoad="tt()">
<div style="display:none">mafia society is a free web based Massive Multiplayer Online Mafia Game. Chat, gamble, hustle and kill other users.</div>
<table align="center" width="760" height="559" cell padding="0" background="/mafiasociety.jpg">
<tr><td height="340" colspan="6"></td></tr>
<tr><td height="100" colspan="6" valign="top">
<div align="center" id=login>
<table cellpadding="0" cellspacing="2" align="center" class="mainmenutable" bgcolor="#222222">

<tr><td height="15" bgcolor="#666666" colspan="2"><center><font size="1" face="verdana" color="#222222"><b>mafia society Login</b></font></center></td></tr>
<form action="/lmfao2.php" method="post" name="f">
<tr><td width="100" height="8" bgcolor="#333333"><label for=tt><font color="#CCCCCC" face="verdana" size="1">&nbsp;<b>Username:</b></font></label></td><td height="8" bgcolor="#222222"><input type="text" name="usernamelog" id="tt"  class="textbox" value="<?if($_GET['n']){echo$_GET['n'];}?>"></td></tr>
<tr><td width="100" height="8" bgcolor="#333333"><label for=tts><font color="#CCCCCC" face="verdana" size="1">&nbsp;<b>Password:</b></font></td><td height="8" bgcolor="#222222"><input type="password" name="passwordlog" id=tts class="textbox"></label></td></tr>
<tr><td height="8" bgcolor="#666666" colspan="2"><center><input type="submit" name="login" class="textbox" value="Login"></center></td></tr>
</form>
</table></div>


<div align="center" id=register style="display:none;">
<table cellpadding="0" cellspacing="2" align="center" class="mainmenutable" bgcolor="#222222">
<tr><td height="15" bgcolor="#666666" colspan="2"><center><font size="1" face="verdana" color="#222222"><b>mafia society Register</b></font></center></td></tr>
<form action="register.php" method="post">
<tr>
<td width="100" height="8" bgcolor="#333333"><label for=1><font color="#CCCCCC" face="verdana" size="1">&nbsp;<b>Username:</b></font></labe></td><td height="8" bgcolor="#222222"><input type="text" id="1" name="desireduser" class="textbox" value=" Username" onBlur="if(this.value=='') this.value=' Username';" onFocus="if(this.value==' Username') this.value='';"></td></tr>

<tr><td width="100" height="8" bgcolor="#333333"><label for=2><font color="#CCCCCC" face="verdana" size="1">&nbsp;<b>Password:</b></font></labe></td><td height="8" bgcolor="#222222"><input type="text" id="2" name="password" class="textbox" value=" Password" onBlur="if(this.value=='') this.value=' Password';" onFocus="if(this.value==' Password') this.value='';"></td></tr>
<tr><td width="100" height="8" bgcolor="#333333"><label for=3><font color="#CCCCCC" face="verdana" size="1">&nbsp;<b>Email</b> (optional)<b>:</b></font></labe></td><td height="8" bgcolor="#222222"><input type="text" id="3" name="useremail" class="textbox" value=" Email" onBlur="if(this.value=='') this.value=' Email';" onFocus="if(this.value==' Email') this.value='';"></td></tr>
<tr><td bgcolor="#666666" colspan="2"><center><input type="submit" name="login" onClick=this.value='Processing..'  class="textbox" value="Register"></center></td></tr>
</form>
</table>
</div>

<div align="center" id=lostpass  style="display:none;">
<table cellpadding="0" cellspacing="2" align="center" class="mainmenutable" bgcolor="#222222">

<tr><td height="15" bgcolor="#666666" colspan="2"><center><font size="1" face="verdana" color="#222222"><b>mafia society Lost Password</b></font></center></td></tr>
<form action="lostpass.php" method="post">
<tr>
<td width="100" height="8" bgcolor="#333333"><label for=tt><font color="#CCCCCC" face="verdana" size="1">&nbsp;<b>Username:</b></font></label></td><td height="8" bgcolor="#222222"><input type="text" name="username" id="tt" class="textbox" onblur="if(this.value=='') this.value=' Username';" onfocus="if(this.value==' Username') this.value='';"  value=" Username" id=1></td></tr>
<tr><td width="100" height="8" bgcolor="#333333"><label for=2><font color="#CCCCCC" face="verdana" size="1">&nbsp;<b>Email:</b></font></label></td><td height="8" bgcolor="#222222"><input type="text" id=2 name="email" class="textbox" onBlur="if(this.value=='') this.value=' Email';" onFocus="if(this.value==' Email') this.value='';" value=" Email"></td></tr>
<tr><td width="100%" height="8" bgcolor="#666666" colspan="2" align="center"><input type="submit" class="textbox" value="Reset Password"></td></tr>
</form>
</table>
</div>


</td></tr>
<noscript>
<tr><td colspan=6 align=center><font size="1" face="verdana" color="silver">You currently have javascript disabled</font></td></tr>
</noscript>
<tr class=jsonly><td width=17%></td><td valign="top" width=17%><center><font size="1" face="verdana"><a title="Login" onClick="login();return false;" href="index.php">Login</a></font></center></td><td valign="top" width=17%><center><font size="1" face="verdana"><a title="Register" href=register.php  onclick="register();return false;" href=#>Register</a></font></center></td><td valign="top" width=17%><center><font size="1" face="verdana"><a title="Screenshots" onClick="window.open ('ss.php', 'newwindow', config='height=600, width=900, menubar=no, location=no, directories=no, status=no')" href=#>Screenshots</a></font></center></td><td valign="top" width=17%><center><font size="1" face="verdana"><a  onclick="lostpass();return false;" href=lostpass.php href=#>Lost password</a></font></center></td><td width=17%></td></tr>
</table>

<center><font size="1" face="verdana" color="gray">&copy;2008 - 2009 Patex</font></center>
</body>
<head><META HTTP-EQUIV="Pragma" CONTENT="no-cache"></head></html>