<? include 'included.php'; ?>

<html>
<head>
<title>Mafia Society</title><link rel="stylesheet" href="more/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
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
$getnameraw = $_GET['name'];
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$getname = preg_replace($saturate,"",$getnameraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$gangsterusername = $usernameone;
$playerrank = $myrank;

if(!$getname){$getname = $gangsterusername;}else{$getname = $getname;}

if($playerrank != '100'){die(' ');}

if(isset($_POST['deleteall'])){
mysql_query("DELETE FROM messages WHERE sentto = '$getname'");}

$selecterraw = $_POST['select'];
$selecter = preg_replace($saturated,"",$selecterraw);
if(isset($_POST['next'])){$one = $selecter + 1;}
elseif(isset($_POST['previous'])){$one = $selecter - 1;}else{$one = '0';}

$selectfrom = $one * 15;
$selectto = $selectfrom + 15;

?><center><form action = "" method = "get">
<input type="text" name="name" class="textbox" value="<? if(!$getname){echo"$gangsterusername";}else{echo"$getname";}?>">
<input type="submit" class="textbox" value="View mail"></form>


<form action = "" method = "post">
<input type="hidden" name="select" value="<? echo $one; ?>"><?php if($selectfrom != '0'){echo'<input type ="submit" value="Previous page" class="textbox" name="previous">';}?><input type ="submit" value="Next page" class="textbox" name="next"></form>
<form action="" method="post"><input type ="submit" value="Delete all" class="textbox" name="deleteall"></form></center>

<?php
$getposts = mysql_query("SELECT * FROM messages WHERE sentto = '$getname' AND d = '1' ORDER BY id DESC LIMIT $selectfrom,$selectto ");

while($getpostsarray = mysql_fetch_array($getposts))
{
$postname = $getpostsarray['sentfrom'];
$postinforawa = html_entity_decode($getpostsarray['info'], ENT_NOQUOTES);
$new = $getpostsarray['new'];
$msgid = $getpostsarray['id'];
$colorid = $getpostsarray['color'];
$d = $getpostsarray['d'];


$zpattern[a] = "<";
$zpattern[b] = ">";
$zreplace[a] = "&lt;";
$zreplace[b] = "&gt;";
$postinforawz = str_replace($zpattern,$zreplace,$postinforawa);
$epattern[1] = "/\[b\](.*?)\[\/b\]/is";
$epattern[2] = "/\[u\](.*?)\[\/u\]/is";
$epattern[3] = "/\[i\](.*?)\[\/i\]/is";
$epattern[4] = "/\[center\](.*?)\[\/center\]/is";
$epattern[5] = "/\[color=(.*?)\](.*?)\[\/color\]/is";
$epattern[6] = "/\[img\](.*?)\[\/img\]/is";
$epattern[7] = "/\[font=(.*?)\](.*?)\[\/font\]/is";
$epattern[8] = "/\[br\]/is";
$epattern[9] = "/\[size=(.*?)\](.*?)\[\/size\]/is";
$epattern[10] = "/\[quote\](.*?)\[\/quote\]/is";
$epattern[11] = "/\[left\](.*?)\[\/left\]/is";
$epattern[12] = "/\[right\](.*?)\[\/right\]/is";
$epattern[13] = "/\[s\](.*?)\[\/s\]/is";
$ereplace[1] = "<b>$1</b>";
$ereplace[2] = "<u>$1</u>";
$ereplace[3] = "<i>$1</i>";
$ereplace[4] = "<center>$1</center>";
$ereplace[5] = "<font color=\"$1\">$2</font>";
$ereplace[6] = "<img src=\"$1\">";
$ereplace[7] = "<font face=\"$1\">$2</font>";
$ereplace[8] = "<br>";
$ereplace[9] = "<font size=\"$1\">$2</font>";
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

if(($new == 'yes')||($colorid == 'yes')){$color = "<font color=lime face=verdana size=1><b>$postname</b></font>";} 
elseif($rankcolor == '100'){$color = "<font color=red face=verdana size=1><b>$postname</b></font>";} 
elseif($rankcolor == '75'){$color = "<font color=#00ccff face=verdana size=1><b>$postname</b></font>";} 
elseif($rankcolor == '50'){$color = "<font color=blue face=verdana size=1><b>$postname</b></font>";} 
elseif($rankcolor == '25'){$color = "<font color=yellow face=verdana size=1><b>$postname</b></font>";} 
else{$color = "<font color=#333333 face=verdana size=1>$postname</font>";} 
?>
<table align=center width=100% cellpadding=0 cellspacing=0><tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP><a href=viewprofile.php?username=<? echo $postname?>><? echo $color; ?></a><? if($d != '0'){echo"<font color=orange face=verdana size=1><b> Deleted message</font></b>";}?></td><td width=8 height=22 background=/more/topright.png></td></tr><tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png><font color=white face=verdana size=1>

<? if($countthree > '20'){echo"This user tried to post more than 20 smilies, this is <b>NOT</b> allowed";
}else{echo nl2br($postinfo);} ?></font><br><br><table width="98%" cellpadding="0" cellspacing="0" align="center"><tr><td height="1" bgcolor="#444444"></td></tr><td height="11"></td></tr></table>
<a href ="inbox.php?deleteid=<? echo $msgid; ?>"><font face="verdana" size="1" color=white>&nbsp;Delete</font></a><a href=send.php?replyid=<?echo $msgid;?>><font face="verdana" size="1" color=white>&nbsp;Reply</font></a>
</td><td width=8 background=/more/rightb.png NOWRAP></td></tr><tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr></table>
<?
}
?>
</td>
<td width="250" valign="top">
<? include 'rightmenu.php'; ?>
</td>
</tr>
</table>

</body></html>