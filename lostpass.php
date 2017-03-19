<? include_once 'connecter.php'; 

?>
<html><title>Modern Mafia</title>
<head><META HTTP-EQUIV="Pragma" CONTENT="no-cache"><link rel="shortcut icon" href="/more/icon.png" type="image/x-icon" />

<script><? if(isset($_GET['n'])){$foci = 'email';}else{$foci = 'username';}?>
function tt(){document.flos.<? echo $foci;?>.select();}

function register()
{document.getElementById("register").style.display = "block"; 
document.getElementById("login").style.display = "none";
document.getElementById("lostpass").style.display = "none";
 document.freg.desireduser.focus();document.freg.desireduser.select();}
function login()
{document.getElementById("register").style.display = "none";
document.getElementById("login").style.display = "block";
document.getElementById("lostpass").style.display = "none";
 document.f.usernamelog.focus();document.f.usernamelog.select();}
function lostpass()
{document.getElementById("register").style.display = "none"; 
document.getElementById("login").style.display = "none";
document.getElementById("lostpass").style.display = "block";
 document.flos.username.focus();document.flos.username.select();}

</script>
<style type="text/css">
body {
	background-color: #222222;
}
.textbox{background-color: #414141; border-bottom: 1px solid #626262; border-left: 1px solid #040404; border-right: 1px solid #626262; border-top: 1px solid #040404; color: Silver; font-family: verdana; font-size: 10px; font-weight: bold;}
.mainmenutable{border-style: solid; border-bottom: 1px solid #626262; border-left: 1px solid #040404; border-right: 1px solid #626262; border-top: 1px solid #040404;}
a:hover {color: #996600; text-decoration: none;}
a {color: #888888; text-decoration: none;}
</style>
</head>
<body onLoad="tt()">
<?php


$usor =$_POST['username'];
$postemail =$_POST['email'];

$allowed = "/[^a-z0-9\\\\]/i";
$username = preg_replace($allowed,"",$usor);

$check = $connection->query("SELECT * FROM users WHERE username = '$username'")
or die(mysql_error());
$checks = mysqli_num_rows($check);

if (isset($_POST['username'])) {
if($checks < '0'){echo"<div align=center><font color=#CCCCCC face=verdana size=1>User: $username does not exist!</font></div>";}
elseif (!preg_match("/^[\ a-z0-9._-]+@[a-z0-9.-]+\.[a-z]{1,20}$/i", $_POST['email'])) {
echo('<div align=center><font face="verdana" size="1" color="#CCCCCC"><b>Invalid email address.</b></font></div>');}
else{
$info = mysqli_fetch_array($check);
$realemail = $info['email'];
$name = $info['username'];

if($realemail != $postemail){echo'<div align=center><font face="verdana" size="1" color="#CCCCCC"><b>Invalid email address.</b></font><div align=center>';}
else{
$rand = mt_rand(1000000,10000000000);
$randi = $rand."5432543___32432";
$newpass = md5($randi);

$to = "$realemail";
$subject = "TS - Password Reset";

$header = "From:  Modern Mafia - Password Reset <RaeqwoN@mafiasociety.com>\r\n" .
'Reply-To: Modern Mafia <noreply@mafiasociety.com>' . "\r\n" .
'X-Mailer: PHP/' . phpversion() . "\r\n" .
"MIME-Version: 1.0\r\n" .
"Content-Type: text/html; charset=utf-8\r\n" .
"Content-Transfer-Encoding: 8bit\r\n\r\n";

$body = "Username: $name\n <br>New password: $rand<br><br><a href=http://mafiasociety.com/?n=$name>Click here to login</a>";


if (mail($to, $subject, $body, $header)) {echo'<div align=center><font face="verdana" size="1" color="#CCCCCC"><b>Password reset</b>!<br><br>Check your junk mail to receive your new password</font></div>';
$connection->query("DELETE FROM usersonline WHERE username = '$name'");
$connection->query("UPDATE users SET password = '$newpass' WHERE username = '$name'");} 
else{echo'<div align=center><font face="verdana" size="1" color="#CCCCCC">Error, contact admin immediately.</font></div>';}}}}
?>

</center>
<table align="center" width="760" height="559" cell padding="0" background="/mafiasociety.jpg">
<tr><td height="340" colspan="6"></td></tr>
<tr><td height="119" colspan="6" valign="top"><div align="center" id=login  style="display:none;">
<table cellpadding="0" cellspacing="2" align="center" class="mainmenutable" bgcolor="#222222">

<tr><td height="15" bgcolor="#666666" colspan="2"><center><font size="1" face="verdana" color="#222222"><b>Modern Mafia Login</b></font></center></td></tr>
<form action="verify.php" method="post" name="f">
<tr><td width="100" height="8" bgcolor="#333333"><label for=tt><font color="#CCCCCC" face="verdana" size="1">&nbsp;<b>Username:</b></font></label></td><td height="8" bgcolor="#222222"><input type="text" name="usernamelog" id="tt"  class="textbox" value=" Username" onClick="if(this.value==' Username') this.select();"></td></tr>
<tr><td width="100" height="8" bgcolor="#333333"><label for=tts><font color="#CCCCCC" face="verdana" size="1">&nbsp;<b>Password:</b></font></td><td height="8" bgcolor="#222222"><input type="password" name="passwordlog" id=tts class="textbox" value=" password" onBlur="if(this.value=='') this.value=' password';" onFocus="if(this.value==' password') this.value='';"></label></td></tr>
<tr><td height="8" bgcolor="#666666" colspan="2"><center><input type="submit" name="login" class="textbox" value="Login"></center></td></tr>
</form>
</table></div>


<div align="center" id=register   style="display:none;">
<table cellpadding="0" cellspacing="2" align="center" class="mainmenutable" bgcolor="#222222">
<tr><td height="15" bgcolor="#666666" colspan="2"><center><font size="1" face="verdana" color="#222222"><b>Modern Mafia Register</b></font></center></td></tr>
<form action="register.php" method="post" name=freg>
<tr>
<td width="100" height="8" bgcolor="#333333"><label for=1><font color="#CCCCCC" face="verdana" size="1">&nbsp;<b>Username:</b></font></labe></td><td height="8" bgcolor="#222222"><input type="text" id="1" name="desireduser" class="textbox" value=" Username" onBlur="if(this.value=='') this.value=' Username';" onClick="if(this.value==' Username') this.select();"></td></tr>

<tr><td width="100" height="8" bgcolor="#333333"><label for=2><font color="#CCCCCC" face="verdana" size="1">&nbsp;<b>Password:</b></font></labe></td><td height="8" bgcolor="#222222"><input type="text" id="2" name="password" class="textbox" value=" Password" onBlur="if(this.value=='') this.value=' Password';" onClick="if(this.value==' Password') this.select();"></td></tr>
<tr><td width="100" height="8" bgcolor="#333333"><label for=3><font color="#CCCCCC" face="verdana" size="1">&nbsp;<b>Email</b> (optional)<b>:</b></font></labe></td><td height="8" bgcolor="#222222"><input type="text" id="3" name="useremail" class="textbox" value=" Email" onBlur="if(this.value=='') this.value=' Email';" onClick="if(this.value==' Email') this.select();"></td></tr>
<tr><td width="100" height="8" bgcolor="#333333"><label for=4><font color="#CCCCCC" face="verdana" size="1">&nbsp;<b>Begin in:</b></font></labe></td><td height="8" bgcolor="#222222">
<SELECT NAME="loc" class="textbox" style="width:100%;">
<OPTION value=1>Las Vegas</OPTION>
<OPTION value=2>Washington</OPTION>
<OPTION value=3>Los Angeles</OPTION>
<OPTION value=4>New York</OPTION>
<OPTION value=5>Louisiana</OPTION>
<OPTION value=7>Ohio</OPTION>
</SELECT>
</td></tr>
<tr><td bgcolor="#666666" colspan="2"><center><input type="submit" name="login" onClick=this.value='Processing..'  class="textbox" value="Register"></center></td></tr>
</form>
</table>
</div>

<div align="center" id=lostpass>
<table cellpadding="0" cellspacing="2" align="center" class="mainmenutable" bgcolor="#222222">

<tr><td height="15" bgcolor="#666666" colspan="2"><center><font size="1" face="verdana" color="#222222"><b>Modern Mafia Lost Password</b></font></center></td></tr>
<form action="lostpass.php" method="post" name=flos>
<tr>
<td width="100" height="8" bgcolor="#333333"><label for=tt><font color="#CCCCCC" face="verdana" size="1">&nbsp;<b>Username:</b></font></label></td><td height="8" bgcolor="#222222"><input type="text" name="username" id="tt" class="textbox" value="<? if($_GET['n']){echo$_GET['n'];}else{$foci = ' Username';}?>" onblur="if(this.value=='') this.value=' Username';"  onclick="if(this.value==' Username') this.select();" id=1></td></tr>
<tr><td width="100" height="8" bgcolor="#333333"><label for=2><font color="#CCCCCC" face="verdana" size="1">&nbsp;<b>Email:</b></font></label></td><td height="8" bgcolor="#222222"><input type="text" id=2 name="email" class="textbox" onBlur="if(this.value=='') this.value=' Email';"  onclick="if(this.value==' Email') this.select();" value=" Email"></td></tr>
<tr><td width="100%" height="8" bgcolor="#666666" colspan="2" align="center"><input type="submit" class="textbox" value="Reset Password"></td></tr>
</form>
</table>
</div>




</td></tr>
<noscript>
<tr><td colspan=6 align=center><font size="1" face="verdana" color="silver">You currently have javascript disabled</font></td></tr>
<tr><td width=17%></td><td valign="top" width=17%><center><font size="1" face="verdana"><a title="Login" href="index.php">Login</a></font></center></td><td valign="top" width=17%><center><font size="1" face="verdana"><a title="Register" href="register.php">Register</a></font></center></td><td valign="top" width=17%><center><font size="1" face="verdana"><a title="Screenshots" href=#>Screenshots</a></font></center></td><td valign="top" width=17%><center><font size="1" face="verdana"><a href="lostpass.php">Lost password</a></font></center></td><td width=17%></td></tr><style> .jsonly { display: none } </style></noscript>
<tr class=jsonly><td width=17%></td><td valign="top" width=17%><center><font size="1" face="verdana"><a title="Login" onClick="login();" href=#>Login</a></font></center></td><td valign="top" width=17%><center><font size="1" face="verdana"><a title="Register" onClick="register();" href=#>Register</a></font></center></td><td valign="top" width=17%><center><font size="1" face="verdana"><a title="Screenshots" onClick="window.open ('ss.php', 'newwindow', config='height=600, width=900, menubar=no, location=no, directories=no, status=no')" href=#>Screenshots</a></font></center></td><td valign="top" width=17%><center><font size="1" face="verdana"><a  onclick="lostpass();" href=#>Lost password</a></font></center></td><td width=17%></td></tr>
</table>


<center><font size="1" face="verdana" color="gray">&copy;2008 - 2009 Patex</font></center>
</body><head><META HTTP-EQUIV="Pragma" CONTENT="no-cache"></head></html>