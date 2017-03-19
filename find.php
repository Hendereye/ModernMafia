<? include 'included.php'; $findeh=1;?>
<html>
<head>
<title>Mafia Society</title><link rel="stylesheet" href="more/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="shortcut icon" href="/more/icon.png" type="image/x-icon" />
</head>
<body background="/more/bgtest.png" onload="document.teehee.findgangster.select();">
<table width="100%" height="335" align="center" cellpadding="0" cellspacing="3">
<tr>
<td width="250" height="25"></td>
<td width="100%">
</td>
<td width="250"></td>
</tr>

<tr>
<td width="250" valign="top">
<? include 'leftmenus.php'; ?>
</td>
<td width="100%" valign="top">

<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Find player</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<?php
$findraw = mysql_real_escape_string($_POST['username']);
$allowed = "/[^a-z0-9]/i";
$find = preg_replace($allowed,"",$findraw);
if($find == 'Username'){$find = ' ';}



$findgangstersql  = "SELECT * FROM suggestions WHERE username LIKE '$find%' AND rob = '0' ORDER BY username LIMIT 0, 20";
$findgangsterresult = mysql_query($findgangstersql);
$findgangsternumrows = mysql_num_rows($findgangsterresult);

if(($findgangsternumrows == '0')||(!$find)){?><Br>
<table cellpadding="0" width=230  cellspacing="1" align="center">
<tr><td width=100% colspan=2 height=20></td></tr>
<tr><td width=100% bgcolor=333333 NOWRAP align=center colspan=2><font color=silver size=1 face=verdana>Find</font></td></tr>


<tr><td bgcolor=222222 NOWRAP width=130><font color=silver size=1 face=verdana>&nbsp;Username:&nbsp;&nbsp;&nbsp;</font></td><td bgcolor=222222 NOWRAP><font color=silver size=1 face=verdana>&nbsp;Status:&nbsp;&nbsp;&nbsp;</font></td></tr><tr><td colspan=2 bgcolor=333333 NOWRAP align=right><font color=silver size=1 face=verdana>&nbsp;<b>0</b> results found for "<font style=color:khaki;font-weight:bold;><?echo$find;?></font>"</font></td></tr><tr><td width=100% colspan=2 bgcolor=222222 NOWRAP height=3></td></tr></table><br><?}else{
if(!$find){}else{
$d = 1;
echo'<Br>
<table cellpadding="0" width=230 cellspacing="1" align="center">
<tr><td width=100% colspan=2 height=10></td></tr>
<tr><td width=100% bgcolor=333333 NOWRAP align=center colspan=2><font color=silver size=1 face=verdana>Find</font></td></tr>


<tr><td bgcolor=222222 NOWRAP><font color=silver size=1 face=verdana>&nbsp;Username:&nbsp;&nbsp;&nbsp;</font></td><td bgcolor=222222 NOWRAP><font color=silver size=1 face=verdana>&nbsp;Status:&nbsp;&nbsp;&nbsp;</font></td></tr>';}}


if(!$find){ }
elseif($findgangsternumrows == '0') { }
else{
while($findgangsterarray =mysql_fetch_array($findgangsterresult)) 
{ 
$gansgtersfound = $findgangsterarray['username'];
$avatar = $findgangsterarray['avatar'];

if($avatar){$piccy = "avatars/$avatar";}else{$piccy = 'Untitled-1.png';}


$ido = $findgangsterarray['id'];
$isit = mysql_num_rows(mysql_query("SELECT * FROM usersonline WHERE id = '$ido'"));
if($ido == '-1'){$scol = '<font color=silver face=verdana size=1>&nbsp;Offline&nbsp;&nbsp;&nbsp;</font>';}elseif($isit > '0'){$scol = '<font color=lime face=verdana size=1>&nbsp;Online&nbsp;&nbsp;&nbsp;</font>';}
else{$scol = '<font color=silver face=verdana size=1>&nbsp;Offline&nbsp;&nbsp;&nbsp;</font>';}

$rancid = mt_rand(400,40000);

echo "<tr><td bgcolor=222222 width=130 NOWRAP><font face=verdana size=1>&nbsp;<a href=viewprofile.php?username=$gansgtersfound onmouseover=\"document.cunt.src='$piccy?$rancid'\" onmouseout=\"document.cunt.src='Untitled-1.png'\">$gansgtersfound</a>&nbsp;&nbsp;&nbsp;</font></td><td bgcolor=222222 NOWRAP width=100 >$scol</td></tr>";
}
}

if($d == '1'){?><tr><td colspan=2 bgcolor=333333 NOWRAP align=right><font color=silver size=1 face=verdana><b>1</b> - <b><?echo$findgangsternumrows;?></b> results found for "<font style=color:khaki;font-weight:bold;><?echo$find;?></font>"</font></td></tr><tr><td width=100% colspan=2 bgcolor=222222 NOWRAP height=3></td></tr></table><br><?}
?>



<table cellpadding="0" width=230 cellspacing="1" align="center">
<tr><td width=100% bgcolor=333333 NOWRAP align=center colspan=2><font color=silver size=1 face=verdana>Picture Preview</font></td></tr>
<tr><td NOWRAP colspan=2 height=3 bgcolor=222222></td></tr><tr><td colspan=2 height=125 align=center><img name=cunt src="http://www.s2.mafiasociety.com/Untitled-1.png" height=125 width=230 id=prev></td></tr><tr><td width=100% colspan=2 bgcolor=222222 NOWRAP height=3></td></tr></table>
<br>



<table align=center cellpadding=0 cellspacing=0 width=98%><tr><td bgcolor=#444444 height=1></td></tr><tr><td height=11></td></tr></table>


<table align=center cellpadding=0 cellspacing=0 width=98%><tr><td bgcolor=#444444 height=1></td></tr><tr><td height=11></td></tr></table></td>
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