<html><head>
<META HTTP-EQUIV="Pragma" CONTENT="no-cache"><link rel="shortcut icon" href="/more/icon.png" type="image/x-icon" /></head>
<body><br>

<?
include 'included2.php'; 
$findraw = mysql_real_escape_string($_GET['username']);
$allowed = "/[^a-z0-9]/i";
$find = preg_replace($allowed,"",$findraw);
if($find == 'Username'){$find = ' ';}
$findgangstersql  = "SELECT * FROM suggestions WHERE username LIKE '$find%' AND rob = '0' ORDER BY username LIMIT 0, 25";
$findgangsterresult = mysql_query($findgangstersql);
$findgangsternumrows = mysql_num_rows($findgangsterresult);




$findgangstersqlrobot  = "SELECT * FROM suggestions WHERE username = '$find' AND rob = '1' ORDER BY username LIMIT 0, 25";
$findgangsterresultrobot = mysql_query($findgangstersqlrobot);
$findgangsternumrowsrobot = mysql_num_rows($findgangsterresultrobot);

if($findgangsternumrowsrobot > '0'){$findgangsterresult = $findgangsterresultrobot;$findgangsternumrows = $findgangsternumrowsrobot;$findgangstersql=$findgangstersqlrobot;}

if($find == ' '){$findgangsternumrows ='0';}

if(($findgangsternumrows == '0')||(!$find)){?>

<table align="center"  cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td  background="/more/top.png" NOWRAP align=center><font color="white" size="1" face="verdana">Find Users</font></font></font></td>
<td width="8"  background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png"></td>
<td background="/more/crossbg.png">

<table cellpadding="0" width=230 cellspacing="1" align="center">
<tr><td bgcolor=333333 NOWRAP width=130 align=center><font color=dodge size=1 face=verdana>&nbsp;Username:&nbsp;&nbsp;&nbsp;</font></td><td bgcolor=333333 NOWRAP width=100><font color=dodge size=1 face=verdana>&nbsp;Status:&nbsp;&nbsp;&nbsp;</font></td></tr><tr><td colspan=2 bgcolor=333333 NOWRAP align=right><font color=silver size=1 face=verdana>&nbsp;<b>0</b> matches for "<font style=color:khaki;font-weight:bold;><?echo$find;?></font>"</font></td></tr></table></td>
<td width="8" background="/more/rightb.png"></td>
</tr>


<tr>
<td width="8" height="9" background="/more/bottomleft.png"></td>
<td height="9" background="/more/bottom.png"></td>
<td width="8" height="9" background="/more/bottomright.png"></td>
</tr>
</table>
<br>





<table align="center"  cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td  background="/more/top.png" NOWRAP align=center><font color="white" size="1" face="verdana">Player Avatar</font></font></font></td>
<td width="8"  background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png"></td>
<td background="/more/crossbg.png">

<table cellpadding="0" width=230 cellspacing="1" align="center">
<tr><td NOWRAP colspan=2 height=1 bgcolor=222222></td></tr><tr><td colspan=2 height=125 align=center><img name=cunt src="/Untitled-1.png" height=125 width=230 id=prev></td></tr></table>
</td>
<td width="8" background="/more/rightb.png"></td>
</tr>


<tr>
<td width="8" height="9" background="/more/bottomleft.png"></td>
<td height="9" background="/more/bottom.png"></td>
<td width="8" height="9" background="/more/bottomright.png"></td>
</tr>
</table>

<br>

<table align=center cellpadding=0 cellspacing=0 width=98%><tr><td bgcolor=#444444 height=1></td></tr><tr><td height=11></td></tr></table>
<?}else{
if(!$find){}else{
$d = 1;
echo'

<table align="center"  cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td  background="/more/top.png" NOWRAP align=center><font color="white" size="1" face="verdana">Find Users</font></font></font></td>
<td width="8"  background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png"></td>
<td background="/more/crossbg.png">

<table cellpadding="0" width=230 cellspacing="1" align="center">



<tr><td bgcolor=333333 NOWRAP width=130 align=center><font color=dodge size=1 face=verdana>&nbsp;Username:&nbsp;&nbsp;&nbsp;</font></td><td bgcolor=333333 NOWRAP width=100><font color=dodge size=1 face=verdana>&nbsp;Status:&nbsp;&nbsp;&nbsp;</font></td></tr>';}}


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


if($d == '1'){?><tr><td colspan=2 bgcolor=333333 NOWRAP align=right><font color=silver size=1 face=verdana><b><?echo$findgangsternumrows;?></b> matches for "<font style=color:khaki;font-weight:bold;><?echo$find;?></font>"</font></td></tr></table></td>
<td width="8" background="/more/rightb.png"></td>
</tr>


<tr>
<td width="8" height="9" background="/more/bottomleft.png"></td>
<td height="9" background="/more/bottom.png"></td>
<td width="8" height="9" background="/more/bottomright.png"></td>
</tr>
</table>
<br>



<table align="center"  cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td  background="/more/top.png" NOWRAP align=center><font color="white" size="1" face="verdana">Player Avatar</font></font></font></td>
<td width="8"  background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png"></td>
<td background="/more/crossbg.png">
<table cellpadding="0" width=230 cellspacing="1" align="center">
<tr><td NOWRAP colspan=2 height=1 bgcolor=222222></td></tr><tr><td colspan=2 height=125 align=center><img name=cunt src="/Untitled-1.png" height=125 width=230 id=prev></td></tr></table></td>
<td width="8" background="/more/rightb.png"></td>
</tr>


<tr>
<td width="8" height="9" background="/more/bottomleft.png"></td>
<td height="9" background="/more/bottom.png"></td>
<td width="8" height="9" background="/more/bottomright.png"></td>
</tr>
</table>
<br>



<table align=center cellpadding=0 cellspacing=0 width=98%><tr><td bgcolor=#444444 height=1></td></tr><tr><td height=11></td></tr></table><?}
?>

</body><head><script>



</script><META HTTP-EQUIV="Pragma" CONTENT="no-cache"><link rel="shortcut icon" href="/more/icon.png" type="image/x-icon" /></head></html>