<html><head><META HTTP-EQUIV="Pragma" CONTENT="no-cache"><link rel="shortcut icon" href="/more/icon.png" type="image/x-icon" /></head><body><br>

<?
include 'included2.php'; 
$findraw = mysql_real_escape_string($_GET['username']);
$allowed = "/[^a-z0-9]/i";
$find = preg_replace($allowed,"",$findraw);
if($find == 'Username'){$find = ' ';}
$findgangstersql  = "SELECT * FROM suggestions WHERE username LIKE '$find%' ORDER BY username LIMIT 0, 25";
$findgangsterresult = mysql_query($findgangstersql);
$findgangsternumrows = mysql_num_rows($findgangsterresult);

if(($findgangsternumrows == '0')||(!$find)){?>
<table cellpadding="0" width=230 cellspacing="1" align="center">
<tr><td width=100% colspan=2 height=20></td></tr>
<tr><td width=100% bgcolor=333333 NOWRAP align=center colspan=2><font color=silver size=1 face=verdana>Find</font></td></tr>
<tr><td bgcolor=222222 NOWRAP width=130><font color=silver size=1 face=verdana>&nbsp;Username:&nbsp;&nbsp;&nbsp;</font></td><td bgcolor=222222 NOWRAP width=100><font color=silver size=1 face=verdana>&nbsp;Status:&nbsp;&nbsp;&nbsp;</font></td></tr><tr><td colspan=2 bgcolor=333333 NOWRAP align=right><font color=silver size=1 face=verdana>&nbsp;<b>0</b> results found for "<font style=color:khaki;font-weight:bold;><?echo$find;?></font>"</font></td></tr><tr><td width=100% colspan=2 bgcolor=222222 NOWRAP height=3></td></tr></table><br><?}else{
if(!$find){}else{
$d = 1;
echo'
<table cellpadding="0" width=230 cellspacing="1" align="center">
<tr><td width=100% colspan=2 height=20></td></tr>
<tr><td width=100% bgcolor=333333 NOWRAP align=center colspan=2><font color=silver size=1 face=verdana>Find</font></td></tr>


<tr><td bgcolor=222222 NOWRAP width=130><font color=silver size=1 face=verdana>&nbsp;Username:&nbsp;&nbsp;&nbsp;</font></td><td bgcolor=222222 NOWRAP width=100><font color=silver size=1 face=verdana>&nbsp;Status:&nbsp;&nbsp;&nbsp;</font></td></tr>';}}


if(!$find){ }
elseif($findgangsternumrows == '0') { }
else{
while($findgangsterarray =mysql_fetch_array($findgangsterresult)) 
{ 
$gansgtersfound = $findgangsterarray['username'];



$ido = $findgangsterarray['id'];
$isit = mysql_num_rows(mysql_query("SELECT * FROM usersonline WHERE id = '$ido'"));
if($isit > '0'){$scol = '<font color=lime face=verdana size=1>&nbsp;Online&nbsp;&nbsp;&nbsp;</font>';}else{$scol = '<font color=silver face=verdana size=1>&nbsp;Offline&nbsp;&nbsp;&nbsp;</font>';}

echo "<tr><td bgcolor=222222 width=130 NOWRAP><font face=verdana size=1>&nbsp;<a href=ipchecki.php?username=$gansgtersfound>$gansgtersfound</a>&nbsp;&nbsp;&nbsp;</font></td><td bgcolor=222222 NOWRAP width=100 >$scol</td></tr>";
}
}


if($d == '1'){?><tr><td colspan=2 bgcolor=333333 NOWRAP align=right><font color=silver size=1 face=verdana><b>1</b> - <b><?echo$findgangsternumrows;?></b> results found for "<font style=color:khaki;font-weight:bold;><?echo$find;?></font>"</font></td></tr><tr><td width=100% colspan=2 bgcolor=222222 NOWRAP height=3></td></tr></table><br><?}
?>

</body><head><META HTTP-EQUIV="Pragma" CONTENT="no-cache"><link rel="shortcut icon" href="/more/icon.png" type="image/x-icon" /></head></html>