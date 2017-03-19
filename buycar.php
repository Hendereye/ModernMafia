<? include 'included.php'; 



?>
<?
$saturate = "/[^a-z0-9]/i";
$allowed = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$gangsterusername = $usernameone;
$jailtest = mysql_query("SELECT * FROM jail WHERE username  = '$gangsterusername'");
$jailtester = mysql_num_rows($jailtest);
if($jailtester != '0'){die(include 'jail.php'); }

?>
<html>
<head>
<title>Mafia Society</title><link rel="stylesheet" href="more/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="shortcut icon" href="/more/icon.png" type="image/x-icon" />
<SCRIPT LANGUAGE="JavaScript">
function checkAll(field) {
	for (i = 0; i < field.length; i++)
	field[i].checked = true;
}
function uncheckAll(field) {
	for (i = 0; i < field.length; i++)
	field[i].checked = false;
}
</script>

</head>
<body background="/more/bgtest.png">
<script type="text/javascript">
function emotion(em) { document.smiley.newpost.value=document.smiley.newpost.value+em;}
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
<? include 'leftmenu.php';?>
</td>
<td width="100%" valign="top">
<?php 
$entertainertest = mysql_query("SELECT username FROM entertainers WHERE username  = '$gangsterusername'");
$entertainer = mysql_num_rows($entertainertest);
if($entertainer != '0'){die('<font color=white face=verdana size=1>As entertainer you cannot view this page</font>');}


$time = time();
$times = $time + 300;
$saturated = "/[^0-9]/i";
$getida = $_GET['id'];
$getid = preg_replace($saturated,"",$getida);

$gangsterusername = $usernameone;

$money = $statustesttwo['money'];
$buycarraw = $_POST['buy'];
if(isset($_POST['buy']))
{
$alltotal = 0;

$buycar = preg_replace($saturated,"",$buycarraw);
$n = count($buycar);
$i = 0;
$amount = 0;
if($n >= 1){
$countcars = 0;
while ($i < $n){
$doit = $buycar[$i];
$ifnota = mysql_query("SELECT * FROM cars WHERE id = '$doit' AND carid = '$getid'");
$ifnot = mysql_fetch_array($ifnota);
$ifnotname = $ifnot['owner'];
$carprice = $ifnot['price'];
$carname = $ifnot['carname'];
if($ifnotname == $gangsterusername){}
elseif($carprice < 1){}
elseif($carprice > $money){}
else{

$roflcheckplzok = mysql_fetch_array(mysql_query("SELECT id FROM suggestions WHERE username = '$ifnotname'"));
$roflcheckplzodok = $roflcheckplzok['id'];




mysql_query("UPDATE users SET money = (money - $carprice) WHERE ID = '$ida' AND money >= '$carprice'");
if (mysql_affected_rows()==0) {die('<font color=white face=verdana size=1>Error 1.</font>');}
$countcars++;
$alltotal = $alltotal + $carprice;
if($getid == 1){$carinfom = 'Skoda Octavius';}
elseif($getid == 2){$carinfom = 'Ford Fiesta';}
elseif($getid == 3){$carinfom = 'Audi A3';}
elseif($getid == 4){$carinfom = 'Ford Mondeo';}
elseif($getid == 5){$carinfom = 'Jaguar X Type';}
elseif($getid == 6){$carinfom = 'BMW X5';}
elseif($getid == 7){$carinfom = 'Audi Q7';}
elseif($getid == 8){$carinfom = 'Ferrari Spider';}
elseif($getid == 9){$carinfom = 'Bugatti Veyron';}
elseif($getid == 10){$carinfom = 'Pagani Zonda';}
elseif($getid == 11){$carinfom = $carname;}
$cprice = number_format($carprice);
$totl = $totl + $carprice;
$tottee = number_format($totl);
$sendinfo = "\[b\]$gangsterusername\[\/b\] bought your \[b\]$carinfom\[\/b\] for $\[b\]$cprice\[\/b\]!";
mysql_query("INSERT INTO moneysent(username,amount,sent,ip)
VALUES ('$gangsterusername','$carprice','$ifnotname','$userip')");

mysql_query("INSERT INTO messages(sentto,sentfrom,new,info)
VALUES ('$ifnotname','$usernameone','1','$sendinfo')");



mysql_query("UPDATE cars SET owner = '$gangsterusername' WHERE id = $doit");
mysql_query("UPDATE cars SET price = '0' WHERE id = '$doit'");
mysql_query("UPDATE cars SET garage = '0' WHERE id = '$doit'");
mysql_query("UPDATE users SET money = (money + $carprice) WHERE ID = '$roflcheckplzodok'");
$carpricef = number_format($carprice);

$nottime = time();

$insertnot = "<a href=viewprofile.php?username=$gangsterusername style=color:white;><b>$gangsterusername</b> bought your <b>$carinfom</b> for $<b>$carpricef</b>!</a>";
$rawinsertlog = "INSERT INTO notifications(youid,info,time)
VALUES ('$roflcheckplzodok','$insertnot','$nottime')";
$insertlog = mysql_query($rawinsertlog);



mysql_query("DELETE FROM travel WHERE carid = '$doit'");
$amount = $amount + 1;}
$getinfo = mysql_fetch_array(mysql_query("SELECT username,money FROM users WHERE ID = '$ida'"));
$money = $getinfo['money'];
$i = $i + 1;}
}}

if(($amount == 0)||(!$amount)){}elseif($amount == 1){echo"<font color=white face=verdana size=1>You bought the car!</font>";

$usersql = mysql_query("SELECT * FROM users WHERE username = '$usernameone'");
$statustesttwo = mysql_fetch_array($usersql);


}elseif($amount > 1){echo"<font color=white face=verdana size=1>You bought the cars!</font>";


$usersql = mysql_query("SELECT * FROM users WHERE username = '$usernameone'");
$statustesttwo = mysql_fetch_array($usersql);}

$selecterraw = $_POST['select'];
$selecter = preg_replace($saturated,"",$selecterraw);
if(isset($_POST['next'])){$one = $selecter + 1;}
elseif(isset($_POST['previous'])){$one = $selecter - 1;}else{$one = '0';}

$selectfroma = $one * 16;
$selecttoa = $selectfrom + 16;
$selectfrom = preg_replace($saturated,"",$selectfroma);
$selectto = preg_replace($saturated,"",$selecttoa);

$list = mysql_query("SELECT * FROM cars WHERE carid = '$getid' AND price != '0' ORDER BY price ASC LIMIT $selectfrom,$selectto");
$carlistamount = mysql_query("SELECT * FROM cars WHERE carid = '$getid' AND price != '0'");
$carlistamount = mysql_num_rows($carlistamount);


$newpostraw = mysql_real_escape_string($_POST['newpost']);
$newpost = htmlentities($newpostraw, ENT_QUOTES);
if(isset($_POST['dopost'])) { 


$mutedusernamesql = mysql_query("SELECT ip FROM muted WHERE  username = '$gangsterusername'")or die(mysql_error());
$mutedusernamerows = mysql_num_rows($mutedusernamesql);
$mutedusernamearray = mysql_fetch_array($mutedusernamesql);
$mutedusernameone = $mutedusernamearray['username'];
$mutedipone = $mutedusernamearray['ip'];

$mutedipsql = mysql_query("SELECT username FROM muted WHERE ip = '$userip'")or die(mysql_error());
$mutediprows  = mysql_num_rows($mutedipsql);
$mutediparray = mysql_fetch_array($mutedipsql);
$mutedusernametwo = $mutediparray['username'];
$mutediptwo = $mutediparray['ip'];
if(!$newpost){}
elseif($mutedusernamerows > '0'){die("<font color=white face=verdana size=1>Username: <b>$mutedusernameone</b> and IP: <b>$mutedipone</b> have been muted! Contact a member of <b>The Society</b> to be unmuted!");}
elseif($mutediprows > '0'){die("<font color=white face=verdana size=1>Username: <b>$mutedusernametwo</b> and IP: <b>$mutediptwo</b> have been muted! Contact a member of <b>The Society</b> to be unmuted!");}
else{
mysql_query("INSERT INTO forumposts(username,topicid,ip,type,post,rankid)
VALUES ('$gangsterusername',' ','$userip','buy','$newpost','$myrank')");
mysql_query("UPDATE users SET posts = (posts + 1) WHERE ID = '$ida'");}}
?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Buy car</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>
<form method="post" name="sell">
<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<center>

<br><input type = "submit" value="Buy Cars!" class="textbox" name="buycar"><br><br>

<table align="center" width="85%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="8" background="/more/top.png" NOWRAP><center><font color="#222222" face="verdana" size="1"><b>Models For Sale</font></center></font></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png"></td>
<td background="/more/crossbg.png">
<table cellpadding=0 cellspacing=1 width=100%>
<tr><td width=65% bgcolor=#444444 NOWRAP><center><font color=white face=verdana size=1>Car:</font></center></td><td width=20% bgcolor=#444444 NOWRAP><center><font color=white face=verdana size=1>Damage:</font></center><td width=20% bgcolor=#444444 NOWRAP><center><font color=white face=verdana size=1>Price:</font></center></td></tr>
<? while($carlists = mysql_fetch_array($list)){
$carid = $carlists['carid'];
$carida = $carlists['id'];
$card = $carlists['damage'];
$price = $carlists['price'];
$pricea = number_format($price);
$carnamea = $carlists['carname'];
if($carid == 1){$carname = 'Skoda Octavius';}
elseif($carid == 2){$carname = 'Ford Fiesta';}
elseif($carid == 3){$carname = 'Audi A3';}
elseif($carid == 4){$carname = 'Ford Mondeo';}
elseif($carid == 5){$carname = 'Jaguar X Type';}
elseif($carid == 6){$carname = 'BMW X5';}
elseif($carid == 7){$carname = 'Audi Q7';}
elseif($carid == 8){$carname = 'Ferrari Spider';}
elseif($carid == 9){$carname = 'Bugatti Veyron';}
elseif($carid == 10){$carname = 'Pagani Zonda';}
elseif($carid == 11){$carname = $carnamea;}

if($carid == 10){$before = '<b><font color=red face=verdana size=1>&nbsp;Very Rare</font></b><font color=white face=verdana size=1>:&nbsp;</font>';}
elseif($carid == 9){$before = '<b><font color=red face=verdana size=1>&nbsp;Rare</font></b><font color=white face=verdana size=1>:&nbsp;</font>';}
elseif($carid == 8){$before = '<b><font color=red face=verdana size=1>&nbsp;Rare</font></b><font color=white face=verdana size=1>:&nbsp;</font>';}
elseif($carid == 11){$before = '<b><font color=red face=verdana size=1>&nbsp;Custom</font></b><font color=white face=verdana size=1>:&nbsp;</font>';}

else{$before = '&nbsp;';}
echo"<tr><td width=65% bgcolor=#222222 NOWRAP><input type=checkbox value=$carida name='buy[]'><a href=viewcar.php?id=$carida>$before<font color=white face=verdana size=1>$carname</font></a></td><td width=20% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1>$card%</font><td width=20% bgcolor=#222222 NOWRAP><font color=white face=verdana size=1>$$pricea</font></td></tr>";
}?>
</table>
</td>
<td width="8" background="/more/rightb.png"></td>
</tr>


<tr>
<td width="8" height="9" background="/more/bottomleft.png"></td>
<td height="9" background="/more/bottom.png"></td>
<td width="8" height="9" background="/more/bottomright.png"></td>
</tr>
</table>
</form><br><br><? if($carlistamount > 50){?>
<form action = "" method = "post"><input type="hidden" name="select" value="<? echo $one; ?>"><?php if($selectfrom != '0'){echo'<input type ="submit" value="Previous page" class="textbox" name="previous">';}?><input type ="submit" value="Next page" class="textbox" name="next"></form>
<?}else{echo"<br>";}?>

</td>
<td width="8" background="/more/rightb.png" NOWRAP></td>
</tr>

<tr>
<td width="8" height="9" background="/more/bottomleft.png"></td>
<td height="9" background="/more/bottom.png"></td>
<td width="8" height="9" background="/more/bottomright.png"></td>
</tr>
</table>

<?php

$getposts = mysql_query("SELECT * FROM forumposts WHERE type = 'buy' ORDER BY id DESC");

while($getpostsarray = mysql_fetch_array($getposts))
{
$postname = $getpostsarray['username'];
$postinforawa = html_entity_decode($getpostsarray['post'], ENT_NOQUOTES);
$postinforawb = $postinforawa;

$zpattern[a] = "<";
$zpattern[b] = ">";

$zreplace[a] = "&lt;";
$zreplace[b] = "&gt;";
$i = 0;
$while = mysql_query("SELECT * FROM blacklist");
while ($all = mysql_fetch_array($while)){
$i = $i + 1;
$zpattern[$i] = $all['word'];
$zreplace[$i] = "mafiasociety";}

$postinforawz = str_replace($zpattern,$zreplace,$postinforawb);

$epattern[1] = "/\[b\](.*?)\[\/b\]/is";
$epattern[2] = "/\[u\](.*?)\[\/u\]/is";
$epattern[3] = "/\[i\](.*?)\[\/i\]/is";
$epattern[4] = "/\[center\](.*?)\[\/center\]/is";
$epattern[5] = "/\[color=(.*?)\](.*?)\[\/color\]/is";
$epattern[7] = "/\[font=(.*?)\](.*?)\[\/font\]/is";
$epattern[8] = "/\[br\]/is";
$epattern[10] = "/\[quote\](.*?)\[\/quote\]/is";
$epattern[11] = "/\[left\](.*?)\[\/left\]/is";
$epattern[12] = "/\[right\](.*?)\[\/right\]/is";
$epattern[13] = "/\[s\](.*?)\[\/s\]/is";

$ereplace[1] = "<b>$1</b>";
$ereplace[2] = "<u>$1</u>";
$ereplace[3] = "<i>$1</i>";
$ereplace[4] = "<center>$1</center>";
$ereplace[5] = "<font color=\"$1\">$2</font>";
$ereplace[7] = "<font face=\"$1\">$2</font>";
$ereplace[8] = "<br>";
$ereplace[10] = "<blockquote><b>$1</b></blockquote>";
$ereplace[11] = "<div align=\"left\">$1</div>";
$ereplace[12] = "<div align=\"right\">$1</div>";
$ereplace[13] = "<s>$1</s>";

$postinforawb = preg_replace($epattern,$ereplace,$postinforawz);

$fpattern[1] = ":arrow:";
$fpattern[2] = ":D";
$fpattern[3] = ":S";
$fpattern[4] = "8)";
$fpattern[5] = ":cry:";
$fpattern[6] = "8|";
$fpattern[7] = ":evil:";
$fpattern[8] = ":!:";
$fpattern[9] = ":idea:";
$fpattern[10] = ":lol:";
$fpattern[11] = ":mad:";
$fpattern[12] = ":?:";
$fpattern[13] = ":redface:";
$fpattern[14] = ":rolleyes:";
$fpattern[15] = ":(";
$fpattern[16] = ":)";
$fpattern[17] = ":o";
$fpattern[18] = ":tdn:";
$fpattern[19] = ":P";
$fpattern[20] = ":tup:";
$fpattern[21] = ":twisted:";
$fpattern[22] = ";)";

$freplace[1] = '<img src=/more/smiles/arrow.gif>';
$freplace[2] = '<img src=/more/smiles/biggrin.gif>';
$freplace[3] = '<img src=/more/smiles/confused.gif>';
$freplace[4] = '<img src=/more/smiles/cool.gif>';
$freplace[5] = '<img src=/more/smiles/cry.gif>';
$freplace[6] = '<img src=/more/smiles/eek.gif>';
$freplace[7] = '<img src=/more/smiles/evil.gif>';
$freplace[8] = '<img src=/more/smiles/exclaim.gif>';
$freplace[9] = '<img src=/more/smiles/idea.gif>';
$freplace[10] = '<img src=/more/smiles/lol.gif>';
$freplace[11] = '<img src=/more/smiles/mad.gif>';
$freplace[12] = '<img src=/more/smiles/question.gif>';
$freplace[13] = '<img src=/more/smiles/redface.gif>';
$freplace[14] = '<img src=/more/smiles/rolleyes.gif>';
$freplace[15] = '<img src=/more/smiles/sad.gif>';
$freplace[16] = '<img src=/more/smiles/smile.gif>';
$freplace[17] = '<img src=/more/smiles/surprised.gif>';
$freplace[18] = '<img src=/more/smiles/tdown.gif>';
$freplace[19] = '<img src=/more/smiles/toungue.gif>';
$freplace[20] = '<img src=/more/smiles/tup.gif>';
$freplace[21] = '<img src=/more/smiles/twisted.gif>';
$freplace[22] = '<img src=/more/smiles/wink.gif>';

$postinfo = str_replace($fpattern, $freplace, $postinforawb);

$rankcolor = $getpostsarray['rankid'];

if($rankcolor == '100'){$color = "<font color=red face=verdana size=1><b>$postname</b></font>";} 
elseif($rankcolor == '75'){$color = "<font color=#00ccff face=verdana size=1><b>$postname</b></font>";} 
elseif($rankcolor == '50'){$color = "<font color=blue face=verdana size=1><b>$postname</b></font>";} 
else{$color = "<font color=#333333 face=verdana size=1>$postname</font>";} 
?>
<table align=center width=100% cellpadding=0 cellspacing=0><tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP><a href=viewprofile.php?username=<? echo $postname?>><? echo $color; ?></td><td width=8 height=22 background=/more/topright.png></td></tr><tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>

<? if($countthree > '20'){echo"This user tried to post more than 20 smilies, this is <b>NOT</b> allowed";
}else{echo nl2br($postinfo);} ?>

</font><br></td><td width=8 background=/more/rightb.png NOWRAP></td></tr><tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr></table>
<?

}
?>

<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<center><form action="" method="post" name="smiley"><font color="white" face="verdana" size="1">Post comment</font><br><textarea name="newpost" cols="42" rows="11" class="textbox" id ="newpost">
</textarea><br><a onClick="emotion(':arrow:')" style="cursor: pointer;"><img src="/more/smiles/arrow.gif" border=0></a><a onClick="emotion(':D')" style="cursor: pointer;"><img src="/more/smiles/biggrin.gif" border=0></a><a onClick="emotion(':S')" style="cursor: pointer;"><img src="/more/smiles/confused.gif" border=0></a><a onClick="emotion(':cry:')" style="cursor: pointer;"><img src="/more/smiles/cry.gif" border=0></a><a onClick="emotion('8)')" style="cursor: pointer;"><img src="/more/smiles/cool.gif" border=0></a><a onClick="emotion('8|')" style="cursor: pointer;"><img src="/more/smiles/eek.gif" border=0></a><a onClick="emotion(':evil:')" style="cursor: pointer;"><img src="/more/smiles/evil.gif" border=0></a><a onClick="emotion(':!:')" style="cursor: pointer;"><img src="/more/smiles/exclaim.gif" border=0></a><a onClick="emotion(':idea:')" style="cursor: pointer;"><img src="/more/smiles/idea.gif" border=0></a><a onClick="emotion(':lol:')" style="cursor: pointer;"><img src="/more/smiles/lol.gif" border=0></a><a onClick="emotion(':mad:')" style="cursor: pointer;"><img src="/more/smiles/mad.gif" border=0></a><a onClick="emotion(':?:')" style="cursor: pointer;"><img src="/more/smiles/question.gif" border=0></a><a onClick="emotion(':redface:')" style="cursor: pointer;"><img src="/more/smiles/redface.gif" border=0></a><a onClick="emotion(':rolleyes:')" style="cursor: pointer;"><img src="/more/smiles/rolleyes.gif" border=0></a><a onClick="emotion(':(')" style="cursor: pointer;"><img src="/more/smiles/sad.gif" border=0></a><a onClick="emotion(':)')" style="cursor: pointer;"><img src="/more/smiles/smile.gif" border=0></a><a onClick="emotion(':o')" style="cursor: pointer;"><img src="/more/smiles/surprised.gif" border=0></a><a onClick="emotion(':P')" style="cursor: pointer;"><img src="/more/smiles/toungue.gif" border=0></a><a onClick="emotion(':twisted:')" style="cursor: pointer;"><img src="/more/smiles/twisted.gif" border=0></a><a onClick="emotion(';)')" style="cursor: pointer;"><img src="/more/smiles/wink.gif" border=0></a><a onClick="emotion(':tdn:')" style="cursor: pointer;"><img src="/more/smiles/tdown.gif" border=0></a><a onClick="emotion(':tup:')" style="cursor: pointer;"><img src="/more/smiles/tup.gif" border=0></a><br>
<input type ="submit" value="Post comment" class="textbox" name="dopost"></form></center>

</td>
<td width="8" background="/more/rightb.png" NOWRAP></td>
</tr>
</td>

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