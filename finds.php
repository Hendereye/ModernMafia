<? include 'included.php';?>
<html>
<head>
<link rel="stylesheet" href="more/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
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
var strhehe = "&rand="+Math.random();
	ajaxRequest.open("GET", "hehe2.php?username=" + str + strhehe, true);

	ajaxRequest.send(null); 
// Create a function that will receive data sent from the server
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){


document.getElementById("findy").innerHTML = '<center><img src=loading.gif></center>';
 setTimeout("document.getElementById('findy').innerHTML = '<font color=#222222 face=verdana size=1><center><b>Find Player</b></font>';",550);

     

			document.getElementById("myTD").innerHTML = ajaxRequest.responseText;
}}
}

//-->
</script>
</head>
<body background="/more/bgtest.png" onload="ajaxFunction();document.teehee.username.select();">
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
<td background="/more/crossbg.png" id=myTD><br>
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
<tr><td bgcolor=333333 NOWRAP width=130 align=center><font color=dodge size=1 face=verdana>&nbsp;Username:&nbsp;&nbsp;&nbsp;</font></td><td bgcolor=333333 NOWRAP width=100><font color=dodge size=1 face=verdana>&nbsp;Status:&nbsp;&nbsp;&nbsp;</font></td></tr><tr><td colspan=2 bgcolor=333333 NOWRAP align=right><font color=silver size=1 face=verdana>&nbsp;<b>0</b> matches for " "</font></td></tr></table></td>
<td width="8" background="/more/rightb.png"></td>
</tr>


<tr>
<td width="8" height="9" background="/more/bottomleft.png"></td>
<td height="9" background="/more/bottom.png"></td>
<td width="8" height="9" background="/more/bottomright.png"></td>
</tr>
</table><br>



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
<tr><td NOWRAP colspan=2 height=1 bgcolor=222222></td></tr><tr><td   valign=top colspan=2 background=http://www.s2.mafiasociety.com/Untitled-1.png height=125 align=right></td></tr></table>
</td>
<td width="8" background="/more/rightb.png"></td>
</tr>


<tr>
<td width="8" height="9" background="/more/bottomleft.png"></td>
<td height="9" background="/more/bottom.png"></td>
<td width="8" height="9" background="/more/bottomright.png"></td>
</tr>
</table>




<br><table align=center cellpadding=0 cellspacing=0 width=98%><tr><td bgcolor=#444444 height=1></td></tr><tr><td height=11></td></tr></table>

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