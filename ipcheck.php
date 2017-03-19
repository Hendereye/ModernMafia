<? include 'included.php';
if($myrank < '25'){die(' ');}
?>
<html>
<head>
<title>Immaculate Gangsters</title><link rel="stylesheet" href="more/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="shortcut icon" href="/more/icon.png" type="image/x-icon" />
<noscript><META HTTP-EQUIV="Refresh" CONTENT="0; URL=find.php"></noscript>
<script language="javascript" type="text/javascript">

<?
$rl = rand(0,5000);?>
<!-- 
//Browser Support Code
function ajaxFunction(){
	var ajaxRequest;  // The variable that makes Ajax possible!
	
	try{
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
	} catch (e){
		// Internet Explorer Browsers
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				// Something went wrong
				alert("Your browser broke!");
				return false;
			}
		}
	}
	
var str = escape(document.getElementById('username').value);
	ajaxRequest.open("GET", "hehehe.php?rand=<?echo$rl;?>&username=" + str , true);

	ajaxRequest.send(null); 
// Create a function that will receive data sent from the server
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){



			document.getElementById("myTD").innerHTML = ajaxRequest.responseText;
}}
}

//-->
</script>
</head>
<body background="/more/bgtest.png" onload="setTimeout('ajaxFunction()','500');document.teehee.username.select();">
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
<td background="/more/crossbg.png" id=myTD><br><table cellpadding="0" width=230 cellspacing="1" align="center">
<tr><td width=100% colspan=2 height=20></td></tr>
<tr><td width=100% bgcolor=333333 NOWRAP align=center colspan=2><font color=silver size=1 face=verdana>Find</font></td></tr>
<tr><td bgcolor=222222 NOWRAP width=130><font color=silver size=1 face=verdana>&nbsp;Username:&nbsp;&nbsp;&nbsp;</font></td><td bgcolor=222222 NOWRAP width=100><font color=silver size=1 face=verdana>&nbsp;Status:&nbsp;&nbsp;&nbsp;</font></td></tr><tr><td colspan=2 bgcolor=333333 NOWRAP align=right><font color=silver size=1 face=verdana>&nbsp;<b>0</b> results found for "<font style=color:khaki;font-weight:bold;> </font>"</font></td></tr><tr><td width=100% colspan=2 bgcolor=222222 NOWRAP height=3></td></tr></table><br>

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