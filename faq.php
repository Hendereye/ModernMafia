<? include 'included.php'; ?>

<html>
<head>
<link rel="stylesheet" href="more/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="shortcut icon" href="/more/icon.png" type="image/x-icon" />
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

$playerrank = $myrank;

$time = time();
$edittopicraw= $_POST['edittopic'];
$edittopic = htmlentities($edittopicraw , ENT_QUOTES);



$playerarray =$statustesttwo;
$playerrank = $playerarray['rankid'];



$editsql = mysql_query("SELECT * FROM faqs WHERE type = 'faq'");
$editarray = mysql_fetch_array($editsql);
$editname = $editarray['creator'];

if(($rankid == '100')||($rankid == '75')){
if(isset($_POST['edit'])) { if(!$edittopic){}else{
mysql_query("UPDATE faqs SET info = '$edittopic' WHERE type = 'faq'");
}}}


$topicinforaw = html_entity_decode($editarray['info'], ENT_NOQUOTES);

$zpattern[a] = "<";
$zpattern[b] = ">";
$zpattern[c] = "[div id=key]";
$zpattern[d] = "[/div]";
$zreplace[a] = "&lt;";
$zreplace[b] = "&gt;";
$zreplace[c] = "<div id=key>";
$zreplace[d] = "</div>";


$topicinforawz = str_replace($zpattern,$zreplace,$topicinforaw);
$dpattern[1] = "/\[b\](.*?)\[\/b\]/is";
$dpattern[2] = "/\[u\](.*?)\[\/u\]/is";
$dpattern[3] = "/\[i\](.*?)\[\/i\]/is";
$dpattern[4] = "/\[center\](.*?)\[\/center\]/is";
$dpattern[5] = "/\[color=(.*?)\](.*?)\[\/color\]/is";
$dpattern[6] = "/\[img\](.*?)\[\/img\]/is";
$dpattern[7] = "/\[font=(.*?)\](.*?)\[\/font\]/is";
$dpattern[8] = "/\[br\]/is";
$dpattern[9] = "/\[size=(.*?)\](.*?)\[\/size\]/is";
$dpattern[10] = "/\[quote\](.*?)\[\/quote\]/is";
$dpattern[11] = "/\[left\](.*?)\[\/left\]/is";
$dpattern[12] = "/\[right\](.*?)\[\/right\]/is";
$dpattern[13] = "/\[s\](.*?)\[\/s\]/is";

$dreplace[1] = "<b>$1</b>";
$dreplace[2] = "<u>$1</u>";
$dreplace[3] = "<i>$1</i>";
$dreplace[4] = "<center>$1</center>";
$dreplace[5] = "<font color=\"$1\">$2</font>";
$dreplace[6] = "<img src=\"$1\">";
$dreplace[7] = "<font face=\"$1\">$2</font>";
$dreplace[8] = "<br>";
$dreplace[9] = "<font size=\"$1\">$2</font><font size=\"1\">";
$dreplace[10] = "<blockquote><b>$1</b></blockquote>";
$dreplace[11] = "<div align=\"left\">$1</div>";
$dreplace[12] = "<div align=\"right\">$1</div>";
$dreplace[13] = "<s>$1</s>";

$topicinfoa = preg_replace($dpattern,$dreplace,$topicinforawz);

$cpattern[1] = ":arrow:";
$cpattern[2] = ":D";
$cpattern[3] = ":S";
$cpattern[4] = "8)";
$cpattern[5] = ":cry:";
$cpattern[6] = "8|";
$cpattern[7] = ":evil:";
$cpattern[8] = ":!:";
$cpattern[9] = ":idea:";
$cpattern[10] = ":lol:";
$cpattern[11] = ":mad:";
$cpattern[12] = ":?:";
$cpattern[13] = ":redface:";
$cpattern[14] = ":rolleyes:";
$cpattern[15] = ":(";
$cpattern[16] = ":)";
$cpattern[17] = ":o";
$cpattern[18] = ":tdn:";
$cpattern[19] = ":P";
$cpattern[20] = ":tup:";
$cpattern[21] = ":twisted:";
$cpattern[22] = ";)";

$creplace[1] = '<img src=/more/smiles/arrow.gif>';
$creplace[2] = '<img src=/more/smiles/biggrin.gif>';
$creplace[3] = '<img src=/more/smiles/confused.gif>';
$creplace[4] = '<img src=/more/smiles/cool.gif>';
$creplace[5] = '<img src=/more/smiles/cry.gif>';
$creplace[6] = '<img src=/more/smiles/eek.gif>';
$creplace[7] = '<img src=/more/smiles/evil.gif>';
$creplace[8] = '<img src=/more/smiles/exclaim.gif>';
$creplace[9] = '<img src=/more/smiles/idea.gif>';
$creplace[10] = '<img src=/more/smiles/lol.gif>';
$creplace[11] = '<img src=/more/smiles/mad.gif>';
$creplace[12] = '<img src=/more/smiles/question.gif>';
$creplace[13] = '<img src=/more/smiles/redface.gif>';
$creplace[14] = '<img src=/more/smiles/rolleyes.gif>';
$creplace[15] = '<img src=/more/smiles/sad.gif>';
$creplace[16] = '<img src=/more/smiles/smile.gif>';
$creplace[17] = '<img src=/more/smiles/surprised.gif>';
$creplace[18] = '<img src=/more/smiles/tdown.gif>';
$creplace[19] = '<img src=/more/smiles/toungue.gif>';
$creplace[20] = '<img src=/more/smiles/tup.gif>';
$creplace[21] = '<img src=/more/smiles/twisted.gif>';
$creplace[22] = '<img src=/more/smiles/wink.gif>';
$topicinfo = str_replace($cpattern,$creplace,$topicinfoa);
$toplocked = $gettopicidarray['locked'];
$newpostraw = $_POST['newpost'];
$newpost = htmlentities($newpostraw, ENT_QUOTES);

?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0"><tr><td width="8" height="22" background="/more/topleft.png"></td><td height="22" background="/more/top.png" NOWRAP><font color="white" face="verdana" size="1"><b>FAQ
</b></font><?if($rankid >= '75') {echo('<a href="editfaq.php"><font color=khaki>Edit</font></a>');}?>
</td><td width="8" height="22" background="/more/topright.png"></td></tr><tr><td width="8" background="/more/leftb.png" NOWRAP></td><td background="/more/crossbg.png"><font color="white" face="verdana" size="1">
<? if($counttwo > '20'){echo'This user tried to post more than 20 smilies, this is <b>NOT</b> allowed';}else{echo nl2br($topicinfo);}?></font><br><br><table width="98%" cellpadding="0" cellspacing="0" align="center"><tr><td height="1" bgcolor="#444444"></td></tr><td height="11"></td></tr></table></td><td width="8" background="/more/rightb.png" NOWRAP></td></tr><tr><td width="8" height="9" background="/more/bottomleft.png"></td><td height="9" background="/more/bottom.png"></td><td width="8" height="9" background="/more/bottomright.png"></td></tr></table>
</td>
<td width="250" valign="top">
<? include 'rightmenu.php'; ?>
</td>
</tr>
</table>

</body></html>