<? include 'included.php';
$loleh = 1;




$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$deleteidraw = $_GET['deleteid'];
$froms = $_GET['from'];
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$from = preg_replace($saturate,"",$froms);
$deleteid = preg_replace($saturated,"",$deleteidraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$gangsterusername = $usernameone;
$playerrank = $myrank;

if(isset($_POST['deleteall'])){
mysql_query("UPDATE messages SET d = '1' WHERE sentto = '$gangsterusername' ");}


if(isset($_GET['deleteid'])) {
$deletelinksql = mysql_query("SELECT sentfrom FROM messages WHERE id = '$deleteid' AND sentto = '$gangsterusername'");
$deletelinkrows = mysql_num_rows($deletelinksql);



if($deletelinkrows < '1'){}
else{mysql_query("UPDATE messages SET d = '1' WHERE id = '$deleteid'");}}



$selecterraw = $_POST['select'];
$selecter = preg_replace($saturated,"",$selecterraw);
if(isset($_POST['next'])){$one = $selecter + 1;}
elseif(isset($_POST['previous'])){$one = $selecter - 1;}else{$one = '0';}

$selectfrom = $one * 10;
$selectto = $selectfrom + 10;




?>

<html>
<head>
<link rel="stylesheet" href="more/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="shortcut icon" href="/more/icon.png" type="image/x-icon" />
<script>





function filter()
{document.getElementById("filters").style.display = "block";document.fromform.from.focus();}
function hidefilter()
{document.getElementById("filters").style.display = "none";}</script>
<script type="text/javascript">
function emotion(em) { document.smiley.newpost.value=document.smiley.newpost.value+em;}
</script>
</head>
<body background="/more/bgtest.png">
<table width="100%" height="335" align="center" cellpadding="0" cellspacing="3">
<tr>
<td width="250" height="25"></td>
<td width="100%">
</td>
<td width="250"></td>
</tr>

<tr>
<td width="250" valign="top">
<? include 'leftmenu.php'; 


?>
</td>
<td width="100%" valign="top">
<center><form action = "" method = "post"><input type="hidden" name="select" value="<? echo $one; ?> "><?php if($selectfrom != '0'){echo'<input type ="submit" value="Previous page" class="textbox" name="previous">';}?><input type ="submit" value="Next page" class="textbox" name="next"><input type ="submit" value="Delete all" class="textbox" name="deleteall"><input type="button" class=textbox VALUE="View sent mail" OnClick="location.href='sent.php';"><input class=textbox  type="button" VALUE="Filter" OnClick="filter();"><input type="button" class=textbox VALUE="View blocked list" OnClick="location.href='block.php';"></form>
<div id=filters style=display:<?if($from){echo'block';}else{echo'none';}?>;><form method=get name=fromform><font color=white face=verdana size=1>View messages received from:</font><input type=text name=from class=textbox <?if($from){echo"value=$from";}?> id=from><input type=submit class=textbox value=View><a href=# onclick=hidefilter()>(<b style=color:dodge;>close</b>)</a></form></div></center>

<?php



if(!$from){$getposts = mysql_query("SELECT * FROM messages WHERE d = '0' AND sentto = '$gangsterusername' ORDER BY id DESC LIMIT $selectfrom,$selectto ");}

if($from){

$getposts = mysql_query("SELECT * FROM messages WHERE d = '0' AND sentto = '$gangsterusername' AND sentfrom = '$from' ORDER BY id DESC LIMIT $selectfrom,$selectto ");}



$ts = 0;

while($getpostsarray = mysql_fetch_array($getposts))
{
$postname = $getpostsarray['sentfrom'];
$postinforawa = html_entity_decode($getpostsarray['info'], ENT_NOQUOTES);
$new = $getpostsarray['new'];
$msgid = $getpostsarray['id'];
$colorid = $getpostsarray['color'];
$time = $getpostsarray['time'];

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
$postinfo = str_replace($fpattern, $freplace, $postinforawb, $countthree);



if(($new == '1')||($colorid == 'yes')){
$ts++;
$color = "<font color=lime face=verdana size=1><b>$postname</b></font>";$tiym = "<font color=silver face=verdana size=1>&nbsp;&nbsp;&nbsp;$time</font>";

} 
else{$color = "<font color=#333333 face=verdana size=1>$postname</font>";$tiym = "<font color=silver face=verdana size=1>&nbsp;&nbsp;&nbsp;$time</font>";} 
?>
<table align=center width=100% cellpadding=0 cellspacing=0 id=taidbar<?echo$msgid;?>><tr><td width=8 height=22 background=/more/topleft.png></td><td height=22 background=/more/top.png NOWRAP>
<script type="text/javascript">
<!--
function shithouse<?echo$msgid;?>(){
var answer = confirm ("Block user: <?echo$postname;?> from being able to message you?")
if (answer)
location.href='block.php?name=<?echo$postname;?>';
else
alert ("Request cancelled.")


}

function del<?echo$msgid;?>(){
urnamed=<?echo$msgid;?>;
	var ajaxRequest;  
	try{ajaxRequest = new XMLHttpRequest();} catch (e){
        try{ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");} catch (e) {
	try{ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");} catch (e){

alert("Your browser broke1!");return false;}}}
	

var strhehefd = "&rand="+Math.random();
	ajaxRequest.open("GET", "delmsg.php?id=" + urnamed + strhehefd, true);
        ajaxRequest.send(null); 



document.getElementById("tidbar<?echo$msgid;?>").innerHTML = '<img src=loading.gif>';
         setTimeout("document.getElementById('taidbar<?echo$msgid;?>').style.display = 'none';",350);
     }




</script> 
<table width=100% cellpadding=0 cellspacing=0><tr><td align=left><a href=viewprofile.php?username=<? echo $postname?>><? echo $color; ?></a></td><td align=right id=tidbar<?echo$msgid;?>><font color=silver face=verdana size=1><a onclick="shithouse<?echo$msgid;?>()" href=#>(Block/Report)</a></font></td></tr></table>


</td><td width=8 height=22 background=/more/topright.png></td></tr><tr><td width=8 background=/more/leftb.png NOWRAP></td><td background=/more/crossbg.png id=bg<?echo$msgid;?>><table width="100%" cellpadding="0" cellspacing="0" align="center"><tr><td width=100%>
<font color=white face=verdana size=1>
<? if($countthree > '20'){echo"This user tried to post more than 20 smilies, this is <b>NOT</b> allowed";
}else{echo nl2br($postinfo);} ?></font></td></tr><tr><td height=6></td></tr></table><table width="99%" cellpadding="0" cellspacing="0" align="center"><tr><td colspan=2 height="1" bgcolor="#444444"></td></tr><td height="6" colspan=2></td></tr><tr><td align=left><a href ="inbox.php?deleteid=<? echo $msgid; ?>" onclick="del<?echo$msgid;?>();return false;">Delete</a><font color=silver face=verdana size=1> / <a href=send.php?replyid=<?echo $msgid;?>>Reply</a></td><td align=right><?echo$tiym;?></td></tr></table>


</td><td width=8 background=/more/rightb.png NOWRAP></td></tr><tr><td width=8 height=9 background=/more/bottomleft.png></td><td height=9 background=/more/bottom.png></td><td width=8 height=9 background=/more/bottomright.png></td></tr></table>
<?
}

mysql_query("UPDATE messages SET color = 'no',new = '2' WHERE sentto = '$gangsterusername'");
mysql_query("UPDATE users SET mail = '0' WHERE ID = '$ida'");


?>
</td>
<td width="250" valign="top">
<? include 'rightmenu.php'; ?>
</td>
</tr>
</table>

</body></html>