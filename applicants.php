<? include 'included.php'; ?>

<html>
<head>
<link rel="stylesheet" href="more/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="shortcut icon" href="/more/icon.png" type="image/x-icon" />
</head>
<body background="/more/bgtest.png">
<script type="text/javascript">
function emotion(em) { document.smiley.topicinfo.value=document.smiley.topicinfo.value+em;}
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
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$gangsterusername = $usernameone;
$applyidraw = mysql_real_escape_string($_POST['name']);
$applyid = preg_replace($saturated,"",$applyidraw);


$getinfoarray = $statustesttwo;
$getcrewid = $getinfoarray['crewid'];
$getname = $getinfoarray['username'];


$crewnamesql = mysql_query("SELECT name FROM crews WHERE id = '$getcrewid'");
$crewnamearray = mysql_fetch_array($crewnamesql);
$crewnameraw = $crewnamearray['name'];
$crewname= htmlentities($crewnameraw,ENT_QUOTES);

$crewbosscheckrows = $crewboss;
$recruitercheckrows = $rr;

if(($crewbosscheckrows == '0')&&($recruitercheckrows == '0')){die(' ');}

$applyidtest = mysql_query("SELECT * FROM applicants WHERE id = '$applyid' AND crewid = '$getcrewid' AND stage = '0'");
$applyidtestrows = mysql_num_rows($applyidtest);
$applyidarray = mysql_fetch_array($applyidtest);
$applyname = $applyidarray['username'];
$applycrewnameraw = $applyidarray['crewname'];
$applycrewname =  htmlentities($applycrewnameraw,ENT_QUOTES);

if(isset($_POST['accept'])){
if(!$applyid){}
elseif($applyidtestrows < '1'){echo" ";}
else{ 
echo"<font color=white face=verdana size=1>Application accepted!</font>";
mysql_query("UPDATE users SET crewid = '$getcrewid' WHERE username = '$applyname'");
mysql_query("UPDATE crews SET members = (members + 1) WHERE id = '$getcrewid'");
mysql_query("UPDATE applicants SET stage = '1' WHERE username = '$applyname'");}}

if(isset($_POST['deny'])){
if(!$applyid){}
elseif($applyidtestrows < '1'){echo" ";}
else{ 
echo"<font color=white face=verdana size=1>Application refused!</font>";
mysql_query("UPDATE applicants SET stage = '2' WHERE username = '$applyname'");}}

if(isset($_POST['denyall'])){
echo"<font color=white face=verdana size=1>Applications refused!</font>";
mysql_query("UPDATE applicants SET stage = '2' WHERE crewid = '$getcrewid'");}







$getappsql = mysql_query("SELECT * FROM applicants WHERE crewid = '$getcrewid' AND stage = '0' ORDER BY id ASC");
?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Applicants</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png"><form action="" method="post"><br>
<table width="90%" cellpadding="0" cellspacing="1" align="center">
<? 
$countea = 0;
while($getapparray = mysql_fetch_array($getappsql)){
$countea++;
$appname = $getapparray['username'];
$appid = $getapparray['id'];
echo"<tr><td width=100% bgcolor=#222222><input type=radio value=$appid  name=name><b><a href=viewprofile.php?username=$appname><font color=gray size=1 face=verdana>$appname</font></a></b></td></tr>";}

if($countea == '0'){

mysql_query("UPDATE users SET notify = '0' WHERE crewid = '$crewid' AND rr != '0' AND notification = 'New Crew Applicants!'");
}

?>
</table>
<br><br><center><input type="submit" value="Accept" class="textbox" name="accept"><input type="submit" value="Deny" class="textbox" name="deny"><br><br><input type="submit" value="Deny all" class="textbox" name="denyall"></center>
</form>
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