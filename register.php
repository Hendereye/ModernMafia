<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
	include_once('includes/connection.php'); 
	$ipAddress = $_SERVER['REMOTE_ADDR'];
	$currentTime = time();
	//$referral = $_GET['referral'];
	if(isset($_GET['referral'])) { $referral = $_GET['referral']; }
	$loc = $connection->real_escape_string(isset($_POST['loc']));
	
	
	if(isset($referral)) 
	{
		$refExistQuery = mysqli_query($connection, "SELECT * FROM `users` WHERE `ref` = '". $referral ."'");
		$refExist = mysqli_num_rows($refExistQuery);
		$refExistData = mysqli_fetch_assoc($refExistQuery);
		$referedBy = $referral;
		$latestIP = $refExistData['latestip'];
		$referralID = $refExistData['ID'];
	}else{
		$referedBy = "Hender";
		$refExist = 0;
	}
	
	
	$newReferral = mt_rand(10000, 999999);
	$newReferralExistQuery = mysqli_query($connection, "SELECT * FROM `users` WHERE `ref` = '". $newReferral ."'");
	$newReferralNumRows = mysqli_num_rows($newReferralExistQuery);
	while($newReferralNumRows > 0)
	{
		$newReferral = mt_rand(10000, 999999);
		$newReferralExistQuery = mysql_query("SELECT * FROM `users` WHERE `ref` = '". $newReferral ."'");
		$newReferralNumRows = mysql_num_rows($newReferralExistQuery);
	}
?>
<html>
	<head>
		<title>Modern Mafia - Online Mafia Game</title>
		<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
		<link rel="shortcut icon" href="/more/icon.png" type="image/x-icon" />
		<meta name="description" content="Like Mafia Warz? Mafian Society, you can kill, gamble, complete missions, own casinos, crews, chat and much much more" />
		
		<script>
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
			margin: 0;
			padding: 0;
		}
		
		#leaderboard {
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
		
		body {
			background-color: #222222;
		}
		
		.textbox {
			background-color: #999999; 
			border-bottom: 1px solid #626262;
			border-left: 1px solid #040404; 
			border-right: 1px solid #626262; 
			border-top: 1px solid #040404; 
			color: black; 
			font-family: verdana; 
			font-size: 10px; 
			font-weight: bold;
		}
		
		.mainmenutable { 
			border-style: solid; 
			border-bottom: 1px solid #626262; 
			border-left: 1px solid #040404; 
			border-right: 1px solid #626262;
			border-top: 1px solid #040404;
		}
		
		.textboxs {
			background-color: #414141; 
			border-bottom: 1px solid #626262; 
			border-left: 1px solid #040404; 
			border-right: 1px solid #626262; 
			border-top: 1px solid #040404; 
			color: white; 
			font-family: verdana; 
			font-size: 10px; 
		}

		a {
			color: white; 
			font-weight: bold;
			text-decoration: none;
		}
		
		a:hover {
			color: white; 
			text-decoration: 
			underline;
		}
		</style>
	</head>
	<?php
		$allowedTwo = "/[^a-z0-9\\040\\.\\[\\]\\=\\<\\>\\&#163;\\$\\@\\&\\{\\}\\%\\+\\|\\(\\)\\?\\~\\:\\/\\-\\;\\_\\\\]/i";
		$playerBrowserBefore = $_SERVER['HTTP_USER_AGENT'];
		$newPass = isset($_POST['password'])."5432543___32432";
		$userPass = md5($newPass);
		$playerBrowser = preg_replace($allowedTwo, "" , $playerBrowserBefore);
		$time = time();
		mysqli_query($connection, "DELETE FROM `registerlog` WHERE `error` < '". $time ."'");
		$user = $connection->real_escape_string(isset($_POST['desireduser']));
		$allowed = "/[^a-z0-9]/i";
		$username = preg_replace($allowed, "" , $user);
		$check = mysqli_query($connection, "SELECT `username` FROM `users` WHERE `username` = '". $username ."'") or die(mysql_error());
		$check2 = mysqli_num_rows($check);
		$dsjiada = mysqli_query($connection, "SELECT `username` FROM `suggestions` WHERE `username` = '". $username ."'") or die(mysql_error());
		$fdsfs = mysqli_num_rows($dsjiada);
		$checkthree = mysqli_query($connection, "SELECT * FROM `registerlog` WHERE `ip` = '". $ipAddress ."'") or die(mysql_error());
		$checkfour = mysqli_num_rows($checkthree);
		$charlimit = 50;

		if (isset($_POST['desireduser'])) 
		{
			$gethdo = mysqli_query($connection, "SELECT * FROM `users` WHERE `hdo` > '0' AND `status` = 'Alive' LIMIT 1");
			$gethisname = mysqli_fetch_array($gethdo);
			$doitnamehehe = $gethisname['username'];

			if (!$_POST['desireduser']) 
			{ 
				$onload = " onload=document.freg.desireduser.select()";
				echo('<div align=center><font face="verdana" size="1" color="red"><b>You did not enter a username.</b></font></div>');
			}
			
			elseif (!$_POST['password']) 
			{ 
				$onload = " onload=document.freg.password.select()";
				echo('<div align=center><font face="verdana" size="1" color="red"><b>You did not enter a password.</b></font></div>');
			}
			
			elseif (!preg_match("/^[a-z0-9]{1,15}$/i", $_POST["desireduser"])) 
			{ 
				$onload = " onload=document.freg.desireduser.select()";
				echo('<div align=center><font face="verdana" size="1" color="red"><b>Usernames can only contain 0-9 A-Z characters, and be a maximum of 15 characters.</b></font></div>'); 
			}
			
			elseif (strlen($_POST['password']) > '50')
			{ 
				$onload = " onload=document.freg.password.select()";
				echo('<div align=center><font face="verdana" size="1" color="red"><b>Passwords can only be a maximum of 50 characters.</b></font></div>');
			}
			
			elseif ($_POST['password'] == $_POST['desireduser']) 
			{ 
				$onload = " onload=document.freg.desireduser.select()";
				echo('<div align=center><font face="verdana" size="1" color="red"><b>Invalid password.</b></font></div>');
			}
			
			elseif (($check2 != 0) && ($fdsfs != 0)) 
			{ 
				$onload = " onload=document.freg.desireduser.select()";
				echo('<div align=center><font face="verdana" size="1" color="red"><b>The username </font><font face="verdana" size="1" color="#CCCCCC"><u>'.$_POST['desireduser'].'</u></font><font face="verdana" size="1" color="red"> is already in use.</b></font></div>');
			}

			elseif ($checkfour != 0) 
			{ 
				$onload = "lol";
				echo('<div align=center><br><font face="verdana" size="1" color="amber"><b>You have recently registered an account on your IP address. You must wait some time before you can register again.</b></font></div>');
			}
			
			else
			{ 
				$onload = "lol";
				mysqli_query($connection, "UPDATE `statis` SET `allof` = (allof+1)");
				echo('<div align=center><br><font face="verdana" size="1" color="white"><b>Thank you for registering</font><font face="verdana" size="2" color="lime"> '.$_POST['desireduser'].'.</font><font face="verdana" size="1" color="white"> You may now login <a href="/index.php?n='.$_POST['desireduser'].'"><u><font color=lime size=2>here</u></font></a>.</b></font><br><Br>
				1 "'.$username.'" <br>
				2 "'.$userPass.'" <br>
				3 "'.$newemail.'" <br>
				4 "'.$newReferral.'" <br>
				5 "'.$referedBy.'" <br>
				6 "'.$currentTime.'" <br>
				7 "'.$currentTime.'" <br>
				8 "'.$location.'" <br>
				9 "'.$randver.'" <br>
				10 "'.$dorefid.'" <br>
				
				</div>');
				$location = 'Las Vegas';
				$error = $time + 1800;
				$rawinsertlog = "INSERT INTO registerlog (ip,error) VALUES ('$ipAddress','$error')";
				$insertlog = mysqli_query($connection, $rawinsertlog);

				$alphanum = "ABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
				$randver = substr(str_shuffle($alphanum), 0, 5);

				//mysqli_query($connection, "DELETE FROM users WHERE username = '". $user ."'");
				if(isset($referralID))
				{
					$dorefid = $referralID;
				}
				else 
				{
					$dorefid = 0;
				}

				$createcrewraw = $connection->real_escape_string($_POST['useremail']);
				$newemail = htmlentities($createcrewraw, ENT_QUOTES);
				
				$connection->query("INSERT INTO users (username, password, email, ref, refby, steal, melt, location,ver, refid) VALUES ('$username', '$userPass', '$newemail', '$newReferral', '$referedBy', '$currentTime', '$currentTime', '$location', '$randver', '$dorefid')");

				if($refExist > 0)
				{
					$connection->query("UPDATE `users` SET `totalref` = `totalref` + 1 WHERE `ref` = '". $ref ."'");
				}

				$inserta = "INSERT INTO datesjoined (username,ip,browser) VALUES ('$username','$ipAddress','$playerBrowser')";
				$addamember = mysqli_query($connection, $inserta);
				
				/*$uname = $connection->real_escape_string($_POST['desireduser']);
				$ysid = mysqli_fetch_array(mysqli_query($connection, "SELECT * FROM users WHERE username = '$usor'"));
				$toid = $ysid['ID'];

				$sendinfo = "\[br\]\[center\]Welcome to Mafian Society \[b\]\[color=khaki\]$uname\[\/color\]\[\/b\]! \[br\]\[br\]\[b\]\[color=khaki\]Tips:\[\/color\]\[\/b\] Make money fast on the \[b\]\[color=gold\]Crimes\[\/color\]\[\/b\], \[b\]\[color=gold\]Steal Cars\[\/color\]\[\/b\] and \[b\]\[color=gold\]Supply Bullets\[\/color\]\[\/b\] page (pages are located on the menu on the left)!\[br\]\[br\]If you are not sure what to do or how to do something, you can ask a question on the \[b\]\[color=lime\]Helpdesk\[\/color\]\[\/b\] page and wait for one of our staff team to answer :)\[br\]Or you can ask me a question by click reply which is located just under this message.";
				mysqli_query($connection, "INSERT INTO messages(sentto,sentfrom,new,sentip,info) VALUES ('$username','$doitnamehehe','1','ipAddress','$sendinfo')");
				
				$sendinfo = "[b]Your first Mission:[/b] You will receive $10,000,000 when you kill user: [b]Tony[/b] \[br\]\[br\]He has no armour, it tells you how many bullets you need to shoot at him on the Bullet Calculator page.\[br\]\[br\]You can buy a Weapon on the [b]Buy[/b] page as you do not have one yet."; 
				mysqli_query($connection, "INSERT INTO messages(sentto,sentfrom,new,sentip,info) VALUES ('$username','Reausaw','1','ipAddress','$sendinfo')");
			*/
			}
		}
	?>
		</center>
			<?php 
			if(!isset($onload)) 
			{ 
				$onload = " onload=document.freg.desireduser.select()"; 
			}
			?>
		<body onLoad="tt()">
			<div style="display:none">Mafian Society is a free web based Massive Multiplayer Online Mafia Game. Chat, gamble, hustle and kill other users.</div>
				<table align="center" width="760" height="559" cell padding="0" background="/mafiansociety.jpg">
					<tr><td height="340" colspan="6"></td></tr>
					<tr><td height="100" colspan="6" valign="top">
				<div align="center" id=login style="display:none;">
					<table cellpadding="0" cellspacing="2" align="center" class="mainmenutable" bgcolor="#222222">
						<tr><td height="15" bgcolor="#444444" colspan="2"><center><font size="1" face="verdana" color="white">Mafian Society Login</font></center></td></tr>
							<form action="/verify.php" method="post" name="f">
								<tr><td width="100" height="8" bgcolor="#333333" align=left><label for=tt><font color="white" face="verdana" size="1">&nbsp;Username:</font></label></td><td height="8" bgcolor="#333333"><input type="text" name="usernamelog" id="tt"  class="textbox" value="<?php if(isset($_GET['n'])){echo $_GET['n'];}?>"></td></tr>
								<tr><td width="100" height="8" bgcolor="#333333" align=left><label for=tts><font color="white" face="verdana" size="1">&nbsp;Password:</font></td><td height="8" bgcolor="#333333"><input type="password" name="passwordlog" id=tts class="textbox"></label></td></tr>
								<tr><td height="8" bgcolor="#666666" colspan="2"><center><input type="submit" name="login" class="textboxs" value="Login"></center></td></tr>
							</form>
					</table>
				</div>
					<div align="center" id=register style="display:block;">
						<table cellpadding="0" cellspacing="2" align="center" class="mainmenutable" bgcolor="#222222">
							<tr><td height="15" bgcolor="#444444" colspan="2"><center><font size="1" face="verdana" color="white">Mafian Society Register</font></center></td></tr>
								<form action="register.php" method="post">
									<tr><td width="100" height="8" bgcolor="#333333"><label for=1><font color="white" face="verdana" size="1">&nbsp;Username:</font></labe></td><td height="8" bgcolor="#222222"><input type="text" id="1" name="desireduser" class="textbox" value=" Username" onblur="if(this.value=='') this.value=' Username';" onfocus="if(this.value==' Username') this.value='';"></td></tr>
									<tr><td width="100" height="8" bgcolor="#333333"><label for=2><font color="white" face="verdana" size="1">&nbsp;Password:</font></labe></td><td height="8" bgcolor="#222222"><input type="text" id="2" name="password" class="textbox" value=" Password" onblur="if(this.value=='') this.value=' Password';" onfocus="if(this.value==' Password') this.value='';"></td></tr>
									<tr><td width="100" height="8" bgcolor="#333333"><label for=3><font color="white" face="verdana" size="1">&nbsp;Email (optional):</font></labe></td><td height="8" bgcolor="#222222"><input type="text" id="3" name="useremail" class="textbox" value=" Email" onblur="if(this.value=='') this.value=' Email';" onfocus="if(this.value==' Email') this.value='';"></td></tr>
									<tr><td bgcolor="#666666" colspan="2"><center><input type="submit" name="login" onClick=this.value='Processing..'  class="textboxs" value="Register"></center></td></tr>
								</form>
						</table>
					</div>
						<div align="center" id=lostpass  style="display:none;">
							<table cellpadding="0" cellspacing="2" align="center" class="mainmenutable" bgcolor="#222222">
								<tr><td height="15" bgcolor="#444444" colspan="2"><center><font size="1" face="verdana" color="white">Mafian Society Lost Password</font></center></td></tr>
									<form action="lostpass.php" method="post">
										<tr><td width="100" height="8" bgcolor="#333333"><label for=tt><font color="white" face="verdana" size="1">&nbsp;Username:</font></label></td><td height="8" bgcolor="#222222"><input type="text" name="username" id="tt" class="textbox" onblur="if(this.value=='') this.value=' Username';" onfocus="if(this.value==' Username') this.value='';"  value=" Username" id=1></td></tr>
										<tr><td width="100" height="8" bgcolor="#333333"><label for=2><font color="white" face="verdana" size="1">&nbsp;Email:</font></label></td><td height="8" bgcolor="#222222"><input type="text" id=2 name="email" class="textbox" onblur="if(this.value=='') this.value=' Email';" onfocus="if(this.value==' Email') this.value='';" value=" Email"></td></tr>
										<tr><td width="100%" height="8" bgcolor="#666666" colspan="2" align="center"><input type="submit" class="textboxs" value="Reset Password"></td></tr>
									</form>
							</table>
						</div>
					</td>
				</tr>
			<noscript>
				<tr><td colspan=6 align=center><font size="1" face="verdana" color="silver">You currently have javascript disabled</font></td></tr>
			</noscript>
		<tr>
		<td  colspan=6></td></tr>
	</table>
		<div id=leaderboard><center><font face=verdana size=2><a title="Login" onclick="login();return false;" href="index.php"><b>Login</b></a>&nbsp;&nbsp;&nbsp;&nbsp;<a title="Register" href=register.php  onclick="register();return false;" href=#><font color=khaki>Register</font></a>&nbsp;&nbsp;&nbsp;&nbsp;<a title="Screenshots" onclick="window.open ('ss.php', 'newwindow', config='height=600, width=900, menubar=no, location=no, directories=no, status=no')" href=#>Screenshots</a>&nbsp;&nbsp;&nbsp;&nbsp;<a  onclick="lostpass();return false;" href=lostpass.php href=#>Lost password</a></font></div>
			<center><font size="1" face="verdana" color="gray">&copy;2008 - 2009 Patex</font></center>
	</body>
</html>