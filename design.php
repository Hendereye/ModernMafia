<? include 'included.php';?>
<html>
<head>
<title>Mafia Society</title><link rel="stylesheet" href="more/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="shortcut icon" href="/more/icon.png" type="image/x-icon" /></head>
<body background="more/bgtest.png">
<table width="100%" height="335" align="center" cellpadding="0" cellspacing="3">
<tr>
<td width="250" height="25"></td>
<td width="100%"></td>
<td width="250"></td>
</tr>

<tr>
<td width="250" valign="top">
<? include 'leftmenu.php'; ?></td>
<td width="100%" valign="top">

<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><center><b><font color="#222222" face="verdana" size="1">Online Photoshop (www.pixlr.com)</font></b><a onclick="window.open ('designpopout.php', 'newwindow', config='height=800, width=800, toolbar=no, menubar=no, location=no, directories=no, status=no')" href=#> Open in new tab</a></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<? 
if($_GET['id'] != '1'){?>
<br><Br><center>
<a href=design.php?id=1><font color="khaki" face="verdana" size="2"><u><b>Start Designing</b></u></font></a></center><br><Br>
<?}else{?><iframe scrolling="no" frameborder="0" src="http://www.pixlr.com/editor/?referrer=www.mafiasociety.com" iframe width=100% height=650></iframe><?}?>

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
</tr>
</table>
</body>
<head><META HTTP-EQUIV="Pragma" CONTENT="no-cache"></head></html>