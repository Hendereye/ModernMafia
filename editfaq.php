<? include 'included.php'; ?>
<html>
<head>
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
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 

$gangsterusernamesql = mysql_query("SELECT * FROM usersonline WHERE session = '$sessionid' AND ip = '$userip'");
$gangsterusernamearray = mysql_fetch_array($gangsterusernamesql);
$gangsterusername = $gangsterusernamearray['username'];

$playersql = mysql_query("SELECT * FROM users WHERE username = '$gangsterusername'");
$playerarray = mysql_fetch_array($playersql);
$playerrank = $playerarray['rankid'];


if($playerrank >= '75'){}
else{die(" ");}


$getuserinfosql = mysql_query("SELECT * FROM users WHERE username = '$gangsterusername'");
$getuserinfoarray = mysql_fetch_array($getuserinfosql);
$getrank = $getuserinfoarray['rankid'];

$topicchecksql = mysql_query("SELECT * FROM faqs WHERE type = 'faq'");
$topiccheck = mysql_fetch_array($topicchecksql);
$topicinfo = $topiccheck['info'];
$inforaw = str_replace("<br />", "\n", $topicinfo);
$info = html_entity_decode($inforaw);

?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Edit topic</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<br><center><form action="faq.php" method="post" name="smiley"><textarea name="edittopic" cols="60" rows="20" class="textbox" id ="editprofile">
<? if(($getrank == '100')||($getrank == '75')){echo"$info";} ?>
</textarea><br><a onClick="emotion(':arrow:')" style="cursor: pointer;"><img src="/more/smiles/arrow.gif" border=0></a><a onClick="emotion(':D')" style="cursor: pointer;"><img src="/more/smiles/biggrin.gif" border=0></a><a onClick="emotion(':S')" style="cursor: pointer;"><img src="/more/smiles/confused.gif" border=0></a><a onClick="emotion(':cry:')" style="cursor: pointer;"><img src="/more/smiles/cry.gif" border=0></a><a onClick="emotion('8)')" style="cursor: pointer;"><img src="/more/smiles/cool.gif" border=0></a><a onClick="emotion('8|')" style="cursor: pointer;"><img src="/more/smiles/eek.gif" border=0></a><a onClick="emotion(':evil:')" style="cursor: pointer;"><img src="/more/smiles/evil.gif" border=0></a><a onClick="emotion(':!:')" style="cursor: pointer;"><img src="/more/smiles/exclaim.gif" border=0></a><a onClick="emotion(':idea:')" style="cursor: pointer;"><img src="/more/smiles/idea.gif" border=0></a><a onClick="emotion(':lol:')" style="cursor: pointer;"><img src="/more/smiles/lol.gif" border=0></a><a onClick="emotion(':mad:')" style="cursor: pointer;"><img src="/more/smiles/mad.gif" border=0></a><a onClick="emotion(':?:')" style="cursor: pointer;"><img src="/more/smiles/question.gif" border=0></a><a onClick="emotion(':redface:')" style="cursor: pointer;"><img src="/more/smiles/redface.gif" border=0></a><a onClick="emotion(':rolleyes:')" style="cursor: pointer;"><img src="/more/smiles/rolleyes.gif" border=0></a><a onClick="emotion(':(')" style="cursor: pointer;"><img src="/more/smiles/sad.gif" border=0></a><a onClick="emotion(':)')" style="cursor: pointer;"><img src="/more/smiles/smile.gif" border=0></a><a onClick="emotion(':o')" style="cursor: pointer;"><img src="/more/smiles/surprised.gif" border=0></a><a onClick="emotion(':P')" style="cursor: pointer;"><img src="/more/smiles/toungue.gif" border=0></a><a onClick="emotion(':twisted:')" style="cursor: pointer;"><img src="/more/smiles/twisted.gif" border=0></a><a onClick="emotion(';)')" style="cursor: pointer;"><img src="/more/smiles/wink.gif" border=0></a><a onClick="emotion(':tdn:')" style="cursor: pointer;"><img src="/more/smiles/tdown.gif" border=0></a><a onClick="emotion(':tup:')" style="cursor: pointer;"><img src="/more/smiles/tup.gif" border=0></a><br>
<input type ="submit" value="Update topic" class="textbox" name="edit"></center>
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