<? include 'included.php'; ?>
<html>
<head>
<link rel="stylesheet" href="more/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
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
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 

$newmusicraw = $_POST['music'];
$newmusic = htmlentities($newmusicraw, ENT_QUOTES);

$gangsterusername = $usernameone;

$playerarray = $statustesttwo;
$gangsterusername = $playerarray['username'];

$crewbosscheck = mysql_query("SELECT boss FROM crews WHERE boss = '$gangsterusername'")or die(mysql_error());
$crewbossrows = mysql_num_rows($crewbosscheck);

if($crewbossrows < '1'){die('<font color=silver face=verdana size=1>You are not a crew boss!</font>');}


if(isset($_POST['music'])) { 
mysql_query("UPDATE crews SET vid = '$newmusic' WHERE boss = '$gangsterusername'");echo"<font color=white face=verdana size=1>Crew profile music updated!</font>";}




$profilesubmitraw = $_POST['editprofile'];
$profilesubmit = htmlentities($profilesubmitraw, ENT_QUOTES); 


if(isset($_POST['editprofile'])) { 
mysql_query("UPDATE crews SET crewprofile = '$profilesubmit' WHERE boss = '$gangsterusername'");

echo'<font color=silver face=verdana size=1><b>Crew profile updated!</b></font>';
}
$crewbosscheck = mysql_query("SELECT * FROM crews WHERE boss = '$gangsterusername'")or die(mysql_error());

$getuserinfoarray = mysql_fetch_array($crewbosscheck);
$video = $getuserinfoarray['vid'];
$getuserprofile = $getuserinfoarray['crewprofile'];
$musics = html_entity_decode($video, ENT_NOQUOTES);
$userprofile = str_replace("<br />", "\n", $getuserprofile);
$music = str_replace($zpattern,$zreplace,$musics); 


?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Crew profile</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<br><center><form action="" method="post" name="smiley"><textarea name="editprofile" cols="60" rows="20" class="textbox" id ="editprofile">
<?php 
echo $userprofile;?>
</textarea><br>
<input type ="submit" value="Update crew profile" class="textbox"></center>
</form>
<form action="" method="post"><br><font color="silver" face="verdana" size="1">&nbsp;Profile music:<br>&nbsp;<b>http://www.youtube.com/watch?v=</b></font><input type="text" name="music" value="<?echo$music;?>" class="textbox"><br><input type="submit" value="Update profile music" class="textbox"></form><br><br>

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