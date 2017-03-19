<?php 
include_once 'includes/connection.php'; 
$loginTimeQuery = $dbConnection->query("SELECT * FROM `logintimes` WHERE `ip` = '". $_SERVER['REMOTE_ADDR'] ."' ORDER BY `time` DESC LIMIT 1");
$loginTimeNum = $loginTimeQuery->num_rows;
$loginTimeFetch = $loginTimeQuery->fetch_assoc;
$getLast = $loginTimeFetch['username'];
$ipAddress = $_SERVER['REMOTE_ADDR'];

if(isset($_GET['fb']))
{
	$fbQuery = $connection->query("SELECT * FROM `igref` WHERE `ip` = '". $_SERVER['REMOTE_ADDR'] ."'");
	$fbNum = $fbQuery->num_rows;
	if($fbNum == 0) 
	{
		$dbConnection->query("INSERT INTO `igref` ('ip') VALUES ($ipAddress)");
	}
}

if(isset($_GET['n'])) 
{ 
	$hehe = 'passwordlog'; 
} 
else 
	{ 
		$hehe = 'usernamelog'; 
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Modern Mafia - Online Multiplayer Mafia Game</title>
	<link href="more/favicons/apple-icon-57x57.png" rel="apple-touch-icon" sizes="57x57">
	<link href="more/favicons/apple-icon-60x60.png" rel="apple-touch-icon" sizes="60x60">
	<link href="more/favicons/apple-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
	<link href="more/favicons/apple-icon-76x76.png" rel="apple-touch-icon" sizes="76x76">
	<link href="more/favicons/apple-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
	<link href="more/favicons/apple-icon-120x120.png" rel="apple-touch-icon" sizes="120x120">
	<link href="more/favicons/apple-icon-144x144.png" rel="apple-touch-icon" sizes="144x144">
	<link href="more/favicons/apple-icon-152x152.png" rel="apple-touch-icon" sizes="152x152">
	<link href="more/favicons/apple-icon-180x180.png" rel="apple-touch-icon" sizes="180x180">
	<link href="more/favicons/android-icon-192x192.png" rel="icon" sizes="192x192" type="image/png">
	<link href="more/favicons/favicon-32x32.png" rel="icon" sizes="32x32" type="image/png">
	<link href="more/favicons/favicon-96x96.png" rel="icon" sizes="96x96" type="image/png">
	<link href="more/favicons/favicon-16x16.png" rel="icon" sizes="16x16" type="image/png">
	<link href="more/favicons/manifest.json" rel="manifest">
	<meta content="#ffffff" name="msapplication-TileColor">
	<meta content="more/favicons/ms-icon-144x144.png" name="msapplication-TileImage">
	<meta content="#ffffff" name="theme-color">
	<script>
	       function tt(){document.f.<? echo $hehe;?>.focus();}

	       function register()
	       {
	           document.getElementById("register").style.display = "block"; 
	           document.getElementById("login").style.display = "none";
	           document.getElementById("lostpass").style.display = "none";
	       }
	       
	       function login()
	       {
	           document.getElementById("register").style.display = "none";
	           document.getElementById("login").style.display = "block";
	           document.getElementById("lostpass").style.display = "none";
	       }
	       
	       function lostpass()
	       {
	           document.getElementById("register").style.display = "none"; 
	           document.getElementById("login").style.display = "none";
	           document.getElementById("lostpass").style.display = "block";
	       }

	</script>
	<style type="text/css">
	body {
	   background-color: #222222;
	}

	#leaderboard {  text-align: center; 
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
	<meta content="gangster, scarface, godfather, don, shooting, guns, multiplayer, notorious, game, online, text-based, free mmorpg, mmorpg, online rpg, online mafia game, online mafia, mafia game, mafia, kill, shoot, weapon, armour" name="keywords">
</head>
<body onload="tt()">
	<div style="display:none">
		Modern Mafia is a free web based Massive Multiplayer Online Mafia Game. Chat, gamble, hustle and kill other users.
	</div><noscript></noscript>
	<table align="center" width="760">
		<tr>
			<td colspan="6" height="340"></td>
		</tr>
		<tr>
			<td colspan="6" height="100" valign="top">
				<div align="center" id="login">
					<form action="/verify.php" id="f" method="post" name="f"></form>
					<table align="center" bgcolor="#222222" cellpadding="0" cellspacing="2" class="mainmenutable">
						<tr>
							<td bgcolor="#444444" colspan="2" height="15">
								<center>
									<font color="white" face="verdana" size="1">Modern Mafia Login</font>
								</center>
							</td>
						</tr>
						<tr>
							<td align="left" bgcolor="#333333" height="8" width="100"><label for="tt"><font color="white" face="verdana" size="1">&nbsp;Username:</font></label></td>
							<td bgcolor="#333333" height="8"><input class="textbox" id="tt" name="usernamelog" type="text" value="<?php if(isset($_GET['n'])){echo $_GET['n'];}?>"></td>
						</tr>
						<tr>
							<td align="left" bgcolor="#333333" height="8" width="100"><label for="tts"><font color="white" face="verdana" size="1">&nbsp;Password:</font></label></td>
							<td bgcolor="#333333" height="8"><input class="textbox" id="tts" name="passwordlog" type="password"></td>
						</tr>
						<tr>
							<td bgcolor="#666666" colspan="2" height="8">
								<center>
									<input class="textboxs" name="login" type="submit" value="Login">
								</center>
							</td>
						</tr>
					</table>
				</div>
				<div align="center" id="register" style="display:none;">
					<form action="register.php" method="post"></form>
					<table align="center" bgcolor="#222222" cellpadding="0" cellspacing="2" class="mainmenutable">
						<tr>
							<td bgcolor="#444444" colspan="2" height="15">
								<center>
									<font color="white" face="verdana" size="1">Modern Mafia Register</font>
								</center>
							</td>
						</tr>
						<tr>
							<td align="left" bgcolor="#333333" height="8" width="100"><label for="1"><font color="white" face="verdana" size="1">&nbsp;Username:</font></label></td>
							<td bgcolor="#222222" height="8"><input class="textbox" id="1" name="desireduser" onblur="if(this.value=='') this.value=' Username';" onfocus="if(this.value==' Username') this.value='';" type="text" value=" Username"></td>
						</tr>
						<tr>
							<td align="left" bgcolor="#333333" height="8" width="100"><label for="2"><font color="white" face="verdana" size="1">&nbsp;Password:</font></label></td>
							<td bgcolor="#222222" height="8"><input class="textbox" id="2" name="password" onblur="if(this.value=='') this.value=' Password';" onfocus="if(this.value==' Password') this.value='';" type="text" value=" Password"></td>
						</tr>
						<tr>
							<td bgcolor="#333333" height="8" width="100"><label for="3"><font color="white" face="verdana" size="1">&nbsp;Email (optional)<b>:</b></font></label></td>
							<td bgcolor="#222222" height="8"><input class="textbox" id="3" name="useremail" onblur="if(this.value=='') this.value=' Email';" onfocus="if(this.value==' Email') this.value='';" type="text" value=" Email"></td>
						</tr>
						<tr>
							<td bgcolor="#666666" colspan="2">
								<center>
									<input class="textboxs" name="login" onclick="this.value='Processing..'" type="submit" value="Register">
								</center>
							</td>
						</tr>
					</table>
				</div>
				<div align="center" id="lostpass" style="display:none;">
					<form action="lostpass.php" method="post"></form>
					<table align="center" bgcolor="#222222" cellpadding="0" cellspacing="2" class="mainmenutable">
						<tr>
							<td bgcolor="#444444" colspan="2" height="15">
								<center>
									<font color="white" face="verdana" size="1">Modern Mafia Lost Password</font>
								</center>
							</td>
						</tr>
						<tr>
							<td bgcolor="#333333" height="8" width="100"><label for="tt"><font color="white" face="verdana" size="1">&nbsp;Username:</font></label></td>
							<td bgcolor="#222222" height="8"><input class="textbox" id="1" name="username" onblur="if(this.value=='') this.value=' Username';" onfocus="if(this.value==' Username') this.value='';" type="text" value=" Username"></td>
						</tr>
						<tr>
							<td bgcolor="#333333" height="8" width="100"><label for="2"><font color="white" face="verdana" size="1">&nbsp;Email:</font></label></td>
							<td bgcolor="#222222" height="8"><input class="textbox" id="2" name="email" onblur="if(this.value=='') this.value=' Email';" onfocus="if(this.value==' Email') this.value='';" type="text" value=" Email"></td>
						</tr>
						<tr>
							<td align="center" bgcolor="#666666" colspan="2" height="8" width="100%"><input class="textboxs" type="submit" value="Reset Password"></td>
						</tr>
					</table>
				</div>
			</td>
		</tr>
		<tr>
			<td align="center" colspan="6"><font color="silver" face="verdana" size="1">You currently have javascript disabled</font></td>
		</tr>
		<tr class="jsonly">
			<td align="center" colspan="6" valign="top"></td>
		</tr>
	</table>
	<div id="leaderboard">
		<center>
			<font face="verdana" size="2"><a href="index.php" onclick="login();return false;" title="Login"><b>Login</b></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onclick="register(); return false;" title="Register"><font color="khaki">Register</font></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onclick="window.open ('ss.php', 'newwindow', config='height=600, width=900, menubar=no, location=no, directories=no, status=no')" title="Screenshots">Screenshots</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onclick="lostpass();return false;">Lost password</a></font>
		</center>
	</div>
	<center>
		<font color="gray" face="verdana" size="1">&copy;2008 - 2009 Patex</font>
	</center>
	<meta content="no-cache" http-equiv="Pragma">
</body>
</html>