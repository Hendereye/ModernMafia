<? include 'included.php'; 


?>
<html>
<head>
<title>Mafia Society</title><link rel="stylesheet" href="more/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="shortcut icon" href="/more/icon.png" type="image/x-icon" />
</head>
<body background="/more/bgtest.png">
<script type="text/javascript">
function emotion(em) { document.smiley.editprofile.value=document.smiley.editprofile.value+em;}
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
$zpattern[a] = "<";
$zpattern[b] = ">";
$zreplace[a] = "&lt;";
$zreplace[b] = "&gt;";

$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$newmusic = htmlentities($newmusicraw, ENT_QUOTES);
$bust = preg_replace($saturate,"",$bustraw);
$kills = preg_replace($saturate,"",$killsraw);
$casinos = preg_replace($saturate,"",$casinosraw);
$viewer = preg_replace($saturate,"",$viewera);

$gangsterusername = $usernameone;




$profilesubmitraw = $_POST['editprofile'];
$profilesubmit = htmlentities($profilesubmitraw, ENT_QUOTES); 

if(isset($_POST['editprofile'])) { 
mysql_query("UPDATE users SET notes = '$profilesubmit' WHERE username = '$gangsterusername'");
echo'<font color=white face=verdana size=1>Notes updated!</font>';}




$getuserinfosqldone = mysql_query("SELECT notes FROM users WHERE username = '$gangsterusername'");
$getuserinfoarraydone = mysql_fetch_array($getuserinfosqldone);
$getuserprofile = $getuserinfoarraydone['notes'];
$userprofiles = str_replace("<br />", "\n", $getuserprofile);
$userprofile = str_replace($zpattern,$zreplace,$userprofiles); 



?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Notepad</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png"><br>
<center><form method="post" name="smiley"><textarea name="editprofile" cols="60" rows="20" class="textbox" id ="editprofile">
<?php echo$userprofile;?>
</textarea><br>
<input type ="submit" value="Update notes" class="textbox">
</form></center><br>
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