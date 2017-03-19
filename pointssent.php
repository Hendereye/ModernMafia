<? include 'included.php';


?>
<html>
<head>
<style type="text/css">
.click{
cursor: pointer;
cursor: hand;}</style>
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
$saturate = "/[^a-z0-9]/i";
$saturates = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$chosenraw = $_POST['spend'];
$spotida = $_POST['spotid'];
$invitea = $_POST['invite'];
$sendtoraw = $_POST['sendto'];
$sendmoneyraw = $_POST['sendamount'];
$sendto = preg_replace($saturate,"",$sendtoraw);
$sendmoney = preg_replace($saturates,"",$sendmoneyraw);
$chosen = preg_replace($saturates,"",$chosenraw);
$spotid = preg_replace($saturates,"",$spotida);
$invite = preg_replace($saturate,"",$invitea);
$sendmoneytwo= number_format($sendmoney);

$sendtotestsql = mysql_query("SELECT * FROM users WHERE username = '$sendto'");
$sendtotestrows = mysql_num_rows($sendtotestsql);
$sendtotestarray = mysql_fetch_array($sendtotestsql);
$sendtostatus = $sendtotestarray['status'];
$sendtoname = $sendtotestarray['username'];
$sendtoid = $sendtotestarray['ID'];

$gangsterusername = $usernameone;


$lasttensql =mysql_query("SELECT * FROM pointssent WHERE username = '$gangsterusername' ORDER BY id DESC LIMIT 0,50");

$lasttenrsql =mysql_query("SELECT * FROM pointssent WHERE sent = '$gangsterusername' ORDER BY id DESC LIMIT 0,50");?>

<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Point Transactions</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">


<br><br>
<table width=80% align=center><tr><Td align=center valign=top>
<table align="center" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td  background="/more/top.png" NOWRAP align=center><font color="dodge" size="1" face="verdana"><b>Last 50 Sent</b></font></td>
<td width="8"  background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png"></td>
<td background="/more/crossbg.png">
<table cellpadding="0" cellspacing="1" width=100% align="left">
<?php 
while($lasttenarray = mysql_fetch_array($lasttensql)){
$lasttento = $lasttenarray['sent'];
$qt = $lasttenarray['quicktrade'];
$lasttenamount = number_format($lasttenarray['amount']);
if($qt == 'yes'){echo"<tr><td bgcolor=#333333 NOWRAP align=left><font color=white size=1 face=verdana>&nbsp;You sent $lasttenamount points to quicktrade&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></td></tr>";}
else{echo"<tr><td bgcolor=#333333 NOWRAP align=left><font color=white size=1 face=verdana>&nbsp;You sent $lasttenamount points to </font><a href=viewprofile.php?username=$lasttento><font color=white size=1 face=verdana>$lasttento</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></td></tr>";}}?>
</table></td>
<td width="8" background="/more/rightb.png"></td>
</tr>


<tr>
<td width="8" height="9" background="/more/bottomleft.png"></td>
<td height="9" background="/more/bottom.png"></td>
<td width="8" height="9" background="/more/bottomright.png"></td>
</tr></table>
</td><td valign=top>
<table align="center" cellpadding="0" cellspacing="0">

<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td  background="/more/top.png" NOWRAP align=center><font color="dodge" size="1" face="verdana"><b>Last 50 Received</b></font></td>
<td width="8"  background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png"></td>
<td background="/more/crossbg.png">
<table cellpadding="0" cellspacing="1" width=100%>
<?php 
while($lasttenrarray = mysql_fetch_array($lasttenrsql)){
$lasttenrto = $lasttenrarray['username'];
$qt = $lasttenrarray['quicktrade'];
$lasttenramount = number_format($lasttenrarray['amount']);
if($qt == 'yes'){echo"<tr><td bgcolor=#333333 NOWRAP align=left><font color=white size=1 face=verdana>&nbsp;You recieved $lasttenramount points from quicktrade&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></td></tr>";
}else{echo"<tr><td bgcolor=#333333 NOWRAP align=left><font color=white size=1 face=verdana>&nbsp;You recieved $lasttenramount points from </font><a href=viewprofile.php?username=$lasttenrto><font color=white size=1 face=verdana>$lasttenrto</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></td></tr>";}}?>
</table></td>
<td width="8" background="/more/rightb.png"></td>
</tr>


<tr>
<td width="8" height="9" background="/more/bottomleft.png"></td>
<td height="9" background="/more/bottom.png"></td>
<td width="8" height="9" background="/more/bottomright.png"></td>
</tr>
</table>

</td></tr></table><br><Br>

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