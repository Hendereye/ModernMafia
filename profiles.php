<? include 'included.php'; 
?>
<html>
<head>
<link rel="stylesheet" href="more/style.css" type="text/css" /><META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<link rel="shortcut icon" href="/more/icon.png" type="image/x-icon" />
<SCRIPT LANGUAGE="JavaScript">
function checkAll(field) {
	for (t = 0; t < field.length; t++)
	field[t].checked = true;
}
function uncheckAll(field) {
	for (t = 0; t < field.length; t++)
	field[t].checked = false;
}

function showdiv()
{
  document.getElementById("front").style.display = "block"; 
  document.getElementById("linkone").style.display = "none";
  document.getElementById("linktwo").style.display = "block";
}

function hidediv()
{
  document.getElementById("front").style.display = "none";
  document.getElementById("linkone").style.display = "block";
  document.getElementById("linktwo").style.display = "none";     

}


function hidedivav()
{
  document.getElementById("textareatits").style.display = "none";
  document.getElementById("avatartits").style.display = "block";

}



function hidedivavy()
{
  document.getElementById("textareatits").style.display = "block";
  document.getElementById("avatartits").style.display = "none";

}


</script>
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
$zpattern[a] = "<";
$zpattern[b] = ">";
$zreplace[a] = "&lt;";
$zreplace[b] = "&gt;";

$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$bustraw = $_POST['bust'];
$killsraw = $_POST['kills'];
$casinosraw = $_POST['casinosa'];
$viewera = $_POST['views'];
$newmusicraw =$_POST['music'];
$newstatusraw = $_POST['status'];
$dohonours = $_POST['honours'];
$tippy = $_POST['gametips'];
$notty = $_POST['notifications'];
$newmusic = htmlentities($newmusicraw, ENT_QUOTES);
$newstatus = htmlentities($newstatusraw, ENT_QUOTES);
$bust = preg_replace($saturate,"",$bustraw);
$kills = preg_replace($saturate,"",$killsraw);
$casinos = preg_replace($saturate,"",$casinosraw);
$viewer = preg_replace($saturate,"",$viewera);
$tippy = preg_replace($saturated,"",$tippy);
$notty = preg_replace($saturated,"",$notty);

$gangsterusername = $usernameone;



$getuserinfoarray = $statustesttwo;
$getuserprofile = $getuserinfoarray['profile'];
$getpassword = $getuserinfoarray['password'];
$getdisplay = $getuserinfoarray['displaybusts'];
$autoplay = $getuserinfoarray['autoplay'];
$gettips = $getuserinfoarray['tips'];
$getnote = $getuserinfoarray['shownot'];

$userprofiles = str_replace("<br />", "\n", $getuserprofile);

$profilesubmitraw = $_POST['editprofile'];
$profilesubmit = htmlentities($profilesubmitraw, ENT_QUOTES); 



if(isset($_POST['upmusic'])) { 
mysql_query("UPDATE users SET music = '$newmusic' WHERE ID = '$ida'");echo"<font color=white face=verdana size=1>Profile music updated!</font>";}



elseif(isset($_POST['status'])) { 
mysql_query("UPDATE users SET quote = '$newstatus' WHERE ID = '$ida'");echo"<font color=white face=verdana size=1>Your status has been updated!</font><META HTTP-EQUIV=Refresh CONTENT='1; URL=viewprofile.php?username=$usernameone'>";}


elseif(isset($_POST['changeautoplay'])) { 
if($autoplay == '0'){$nw = 1;}else{$nw = 0;}
mysql_query("UPDATE users SET autoplay = '$nw' WHERE ID = '$ida'");echo"<font color=white face=verdana size=1>Autoplay settings updated!</font>";}



elseif(isset($_POST['editprofile'])) { 
mysql_query("UPDATE users SET profile = '$profilesubmit' WHERE ID = '$ida'");

$getuserinfosqldone = mysql_query("SELECT * FROM users WHERE ID = '$ida'");
$getuserinfoarraydone = mysql_fetch_array($getuserinfosqldone);
$getuserprofiledtwo = $getuserinfoarraydone['profile'];
$getuserprofiledone = str_replace("<br />", "\n", $getuserprofiledtwo );
echo'<font color=white face=verdana size=1>Profile updated!</font>';}

elseif(isset($_POST['showon'])) { echo'<font color=white face=verdana size=1>Profile/Playerstats updated!</font>';
if(!$bust){mysql_query("UPDATE users SET displaybusts = 'no' WHERE ID = '$ida'");}
else{
mysql_query("UPDATE users SET displaybusts = 'yes' WHERE ID = '$ida'");}


if(!$kills){mysql_query("UPDATE users SET displaykills = 'no' WHERE ID = '$ida'");}
else{
mysql_query("UPDATE users SET displaykills = 'yes' WHERE ID = '$ida'");}


if(!$casinos){
mysql_query("UPDATE users SET casinowins = '1' WHERE ID = '$ida'");}
else{
mysql_query("UPDATE users SET casinowins = '2' WHERE ID = '$ida'");}


if(!$dohonours){
mysql_query("UPDATE users SET showhonours = '1' WHERE ID = '$ida'");}
else{
mysql_query("UPDATE users SET showhonours = '2' WHERE ID = '$ida'");}

if(!$tippy){mysql_query("UPDATE users SET tips = '1' WHERE ID = '$ida'");}
else{
mysql_query("UPDATE users SET tips = '0' WHERE ID = '$ida'");}


if(!$notty){mysql_query("UPDATE users SET shownot = '1' WHERE ID = '$ida'");}
else{
mysql_query("UPDATE users SET shownot = '0' WHERE ID = '$ida'");}

}



if(isset($_POST['oldpassword'])) { 




$oldpassi = $_POST['oldpassword']."5432543___32432";
$newpassi = $_POST['newpassword']."5432543___32432";
$confirmi = $_POST['newpasswordconfirm']."5432543___32432";


$oldpass = md5($oldpassi);
$newpass = md5($newpassi);
$confirm = md5($confirmi);



if (strlen($_POST['oldpassword']) > '50'){echo'<font color=white face=verdana size=1>Entered info is incorrect!</font>';}
elseif (strlen($_POST['newpassword']) > '50'){ echo'<font color=white face=verdana size=1>Entered info is incorrect!</font>';}
elseif (strlen($_POST['newpasswordconfirm']) > '50'){ echo'<font color=white face=verdana size=1>Entered info is incorrect!</font>';}
elseif($oldpass != $getpassword){ echo'<font color=white face=verdana size=1>Entered info is incorrect!</font>';}
elseif($newpass != $confirm){ echo'<font color=white face=verdana size=1>Passwords did not match!</font>';}
else{mysql_query("UPDATE users SET password = '$newpass' WHERE ID = '$ida'");mysql_query("DELETE FROM usersonline WHERE username = '$gangsterusername'");
die('<font color=white face=verdana size=1>Password changed!</font>');}}

$showcarraw = $_POST['showcar'];
if(isset($_POST['doshow']))
{$showcar = preg_replace($saturated,"",$showcarraw);
mysql_query("UPDATE cars SET display = ' ' WHERE owner = '$gangsterusername'");
$n = count($showcar);
$i = 0;
echo "<font color=white face=verdana size=1>Profile updated!</font>";
if($showcar){
if($n >= 1){
while ($i < $n){
$doit = $showcar[$i];
$ifnota = mysql_query("SELECT * FROM cars WHERE id = $doit");
$ifnot = mysql_fetch_array($ifnota);
$ifnotname = $ifnot['owner'];
if($ifnotname != $gangsterusername){}
else{mysql_query("UPDATE cars SET display = 'yes' WHERE id = '$doit' AND owner = '$gangsterusername'");}
$i++;}}}}

$selecterraw = $_POST['select'];
$selecter = preg_replace($saturated,"",$selecterraw);
if(isset($_POST['next'])){$one = $selecter + 1;}
elseif(isset($_POST['previous'])){$one = $selecter - 1;}else{$one = '0';}





if(isset($_POST['newimage'])){
die(' ');
//define a maxim size for the uploaded images in Kb
 define ("MAX_SIZE","100"); 

//This function reads the extension of the file. It is used to determine if the file  is an image by checking the extension.
 function getExtension($str) {
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }

//This variable is used as a flag. The value is initialized with 0 (meaning no error  found)  
//and it will be changed to 1 if an errro occures.  
//If the error occures the file will not be uploaded.
 $errors=0;
//checks if the form has been submitted



 	//reads the name of the file the user submitted for uploading
 	$image=$_FILES['image']['name'];
 	//if it is not empty
 	if ($image) 
 	{
 	//get the original name of the file from the clients machine
 		$filename = stripslashes($_FILES['image']['name']);
 	//get the extension of the file in a lower case format
  		$extension = getExtension($filename);
 		$extension = strtolower($extension);
 	//if it is not a known extension, we will suppose it is an error and will not  upload the file,  
	//otherwise we will do more tests
 if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
 		{
		//print error message
 			die('<font color=white face=verdana size=1>Error with the file type. Only JPEG, PNG, GIF and JPG formats allowed.</font>');
 			$errors=1;
 		}
 		else
 		{
//get the size of the image in bytes
 //$_FILES['image']['tmp_name'] is the temporary filename of the file
 //in which the uploaded file was stored on the server
 $size=filesize($_FILES['image']['tmp_name']);

//compare the size with the maxim size we defined and print error if bigger
if ($size > MAX_SIZE*1024)
{
	die('<font color=white face=verdana size=1>Image size must be 100kb or less.</font>');
	$errors=1;
}

//we will give an unique name, for example the time in unix time format
$image_name=$ida.'.'.$extension;
//the new name will be containing the full path where will be stored (images folder)
$newname="avatars/".$image_name;
//we verify if the image has been uploaded, and print error instead



$ra = mysql_query("SELECT * FROM suggestions WHERE id= '$ida'");
$ras = mysql_fetch_array($ra);
$rasface = $ras['avatar'];

$fileaa = "avatars/".$rasface;

if($rasface){
unlink($fileaa); }


$copied = copy($_FILES['image']['tmp_name'], $newname);
mysql_query("UPDATE suggestions SET avatar = '$image_name' WHERE id = '$ida'");
if (!$copied) 
{
	die('<font color=white face=verdana size=1>Error please try again.</font>');
	$errors=1;
}
else {echo "<font color=white face=verdana size=1>Avatar image changed successfully!</font>";}


}}}






$selectfroma = $one * 30;
$selecttoa = $selectfrom + 30;
$selectfrom = preg_replace($saturated,"",$selectfroma);
$selectto = preg_replace($saturated,"",$selecttoa);

$carlist = mysql_query("SELECT * FROM cars WHERE owner = '$gangsterusername' ORDER BY carid DESC LIMIT $selectfrom,$selectto");
$carlistamount = mysql_query("SELECT id FROM cars WHERE owner = '$gangsterusername'");
$carlistamount = mysql_num_rows($carlistamount);

$getuserinfosql = mysql_query("SELECT * FROM users WHERE ID = '$ida'");
$getuserinfoarray = mysql_fetch_array($getuserinfosql);
$getdisplay = $getuserinfoarray['displaybusts'];
$getdisplayss = $getuserinfoarray['casinowins'];
$getdisplaysshonours = $getuserinfoarray['showhonours'];
$getdisplays = $getuserinfoarray['displaykills'];
$getdisplayv = $getuserinfoarray['showviews'];
$musics = html_entity_decode($getuserinfoarray['music'], ENT_QUOTES);
$music = str_replace($zpattern,$zreplace,$musics); 
$qwot = html_entity_decode($getuserinfoarray['quote'], ENT_QUOTES);
$quote = str_replace($zpattern,$zreplace,$qwot); 
$getuserprofile = $getuserinfoarray['profile'];
$autoplay = $getuserinfoarray['autoplay'];
$gettips = $getuserinfoarray['tips'];
$getnote = $getuserinfoarray['shownot'];


$getav = mysql_query("SELECT * FROM suggestions WHERE id = '$ida'");
$getavarray = mysql_fetch_array($getav);
$getav = $getavarray['avatar'];


if($getav){$avatar = "avatars/$getav";}else{$avatar = "Untitled-1.png";}

$musica = html_entity_decode($getuserinfoarray['music'], ENT_QUOTES); 
$music = str_replace($zpattern,$zreplace,$musica); 
$userprofile = str_replace("<br />", "\n", $getuserprofile);



?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Edit profile</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<table width=100% cellpadding=0 cellspacing=1><form action="" method="post"><tr><td nowrap width=5% bgcolor=222222 align=left><font color="silver" face="verdana" size="1">http://www.youtube.com/watch?v=</font><input type="text" name="music" value="<?echo$music;?>" class="textbox" style=width:90;><input type="submit" value="Update profile music" class="textbox" name=upmusic></td><td width=95% align=right><font color="silver" face="verdana" size="1"><?if($autoplay == '1'){echo"<font color=khaki>Autoplay</font> music on users profiles&nbsp";}else{echo"<font color=khaki>DO NOT</font> autoplay music on users profiles&nbsp";}?></font><input type="submit" value="Change" class="textbox" name=changeautoplay></td></tr><tr><td colspan=2 height=10></tr></tr></form>
<form action="" method="post"><tr><td colspan=2  align=left><font color="white" face="verdana" size="1">&nbsp;&nbsp;&nbsp;My Profile Status (<font color=khaki face=verdana size=1>new</font><font color="white" face="verdana" size="1">):</font><input type="text" name="status" value="<?echo$quote;?>" class="textbox" style=width:90;color:white;><input type="submit" value="Update" class="textbox" name=upstatus style=color:white;></td></tr>
<tr><td nowrap height=20></td></tr>


</form></table>
<table width=85% align=center cellpadding=0 cellspacing=2><tr><td valign=top>
<center><br><font color=E0FFC2 face=verdana size=1>View My: <a href="viewprofile.php?username=<?echo$gangsterusername;?>"><font color=khaki face=verdana size=1><b>Profile</b></font></a><font color=silver face=verdana size=1> /</font><a href="notes.php"><font color=khaki face=verdana size=1><b> Notepad </b></font></a><font color=silver face=verdana size=1>/</font><a href=friendlist.php><font color=khaki ><B> Friend List </b></a></font><font color=silver face=verdana size=1>/</font><a href="javascript:hidedivav();"><font color=khaki ><B> Avatar</b></a></font><br><div id=avatartits <?if($_GET['showav']==1){echo"style=display:block;";}else{echo"style=display:none;";}?>><br><font color=E0FFC2 face=verdana size=2><b>My Avatar</b>: </font><a href="javascript:hidedivavy();">(<font color=E0FFC2><b>hide</b></font>)</a><br><img src=<?echo$avatar;?>?<?echo mt_rand(1,100000);?> style=height:125;width:230; border=1><br>
<?$mt = mt_rand(5000,40000000); ?>
<form method=post action=profiles.php?x=<?echo$mt;?>&showav=1 enctype=multipart/form-data>
<input type=file name=image class=textbox><input name=newimage type=submit value='Change avatar' class=textbox><br><font color=white face=verdana size=1>(Max size - <b>100kb</b>, <b>JPG,JPEG,GIF,PNG</b> formats only)<br><br>What is an avatar? You avatar is a picture of your choice,<br>which is displayed on the Find Users page when a player searches your name<br> and hovers their mouse over you profile link.</font><br>
</form>


</div><div id=textareatits <?if($_GET['showav']==1){echo"style=display:none;";}?>><form action="" method="post" name="smiley"><textarea name="editprofile" cols="60" rows="20" class="textbox" id ="editprofile">
<?php echo $userprofile;?>
</textarea><br><a onClick="emotion(':arrow:')" style="cursor: pointer;"><img src="/more/smiles/arrow.gif" border=0></a><a onClick="emotion(':D')" style="cursor: pointer;"><img src="/more/smiles/biggrin.gif" border=0></a><a onClick="emotion(':S')" style="cursor: pointer;"><img src="/more/smiles/confused.gif" border=0></a><a onClick="emotion(':cry:')" style="cursor: pointer;"><img src="/more/smiles/cry.gif" border=0></a><a onClick="emotion('8)')" style="cursor: pointer;"><img src="/more/smiles/cool.gif" border=0></a><a onClick="emotion('8|')" style="cursor: pointer;"><img src="/more/smiles/eek.gif" border=0></a><a onClick="emotion(':evil:')" style="cursor: pointer;"><img src="/more/smiles/evil.gif" border=0></a><a onClick="emotion(':!:')" style="cursor: pointer;"><img src="/more/smiles/exclaim.gif" border=0></a><a onClick="emotion(':idea:')" style="cursor: pointer;"><img src="/more/smiles/idea.gif" border=0></a><a onClick="emotion(':lol:')" style="cursor: pointer;"><img src="/more/smiles/lol.gif" border=0></a><a onClick="emotion(':mad:')" style="cursor: pointer;"><img src="/more/smiles/mad.gif" border=0></a><a onClick="emotion(':?:')" style="cursor: pointer;"><img src="/more/smiles/question.gif" border=0></a><a onClick="emotion(':redface:')" style="cursor: pointer;"><img src="/more/smiles/redface.gif" border=0></a><a onClick="emotion(':rolleyes:')" style="cursor: pointer;"><img src="/more/smiles/rolleyes.gif" border=0></a><a onClick="emotion(':(')" style="cursor: pointer;"><img src="/more/smiles/sad.gif" border=0></a><a onClick="emotion(':)')" style="cursor: pointer;"><img src="/more/smiles/smile.gif" border=0></a><a onClick="emotion(':o')" style="cursor: pointer;"><img src="/more/smiles/surprised.gif" border=0></a><a onClick="emotion(':P')" style="cursor: pointer;"><img src="/more/smiles/toungue.gif" border=0></a><a onClick="emotion(':twisted:')" style="cursor: pointer;"><img src="/more/smiles/twisted.gif" border=0></a><a onClick="emotion(';)')" style="cursor: pointer;"><img src="/more/smiles/wink.gif" border=0></a><a onClick="emotion(':tdn:')" style="cursor: pointer;"><img src="/more/smiles/tdown.gif" border=0></a><a onClick="emotion(':tup:')" style="cursor: pointer;"><img src="/more/smiles/tup.gif" border=0></a><br>
<input type ="submit" value="Update Profile" class="textbox"></center>
</form></div>



</td><form action="" method="post">
<td valign=top>
<br><Br>
<table cellpadding=0 cellspacing=0 bgcolor=333333><tr><td colspan=2 align=center bgcolor=222222><font color="silver" face="verdana" size="2">&nbsp;&nbsp;Show on my:</font></td></tr>
<tr><td colspan=2 height=1></td></tr>
<tr><td colspan=2 height=1 bgcolor=silver></td></tr>
<tr><td colspan=2 height=1></td></tr>

<tr><td valign=top><font color="E0FFC2" face="verdana" size="1">&nbsp;&nbsp;<b>Profile</b></font><br>
&nbsp<input type=checkbox name=honours id=honours value=1 <? if($getdisplaysshonours == '2'){echo"CHECKED";}?>><font color="silver" face="verdana" size="1"><label for=honours style="cursor: pointer;cursor: hand;">&nbsp;Honours</label></font><br>


&nbsp<input type=checkbox name=kills id=kills value=no <? if($getdisplays == 'yes'){echo"CHECKED";}?>><label for=kills style="cursor: pointer;cursor: hand;"><font color="silver" face="verdana" size="1">&nbsp;Kills</font></label><br>

&nbsp<input type=checkbox name=bust id=bust value=no <? if($getdisplay == 'yes'){echo"CHECKED";}?>><label for=bust style="cursor: pointer;cursor: hand;"><font color="silver" face="verdana" size="1">&nbsp;Jail Busts</font></label><br>


&nbsp<input type=checkbox name=casinosa id=casinosa value=1 <? if($getdisplayss == '2'){echo"CHECKED";}?>><label for=casinosa style="cursor: pointer;cursor: hand;"><font color="silver" face="verdana" size="1">&nbsp;Casino Wins&nbsp;&nbsp;</font></label><br>
</td><td valign=top><font color="E0FFC2" face="verdana" size="1">&nbsp;&nbsp;<b>Playerstats</b></font><br>

&nbsp<input type=checkbox name=gametips id=gametips value=1 <? if($gettips == '0'){echo"CHECKED";}?>><font color="silver" face="verdana" size="1"><label for=gametips style="cursor: pointer;cursor: hand;">&nbsp;Game Tips</label>&nbsp&nbsp</font><br>


&nbsp<input type=checkbox name=notifications id=notifications value=1 <? if($getnote == '0'){echo"CHECKED";}?>><font color="silver" face="verdana" size="1"><label for=notifications style="cursor: pointer;cursor: hand;">&nbsp;Notifications</label></font><br><br>
&nbsp;&nbsp; <br></td></tr>
<tr><td colspan=2 height=1></td></tr>
<tr><td colspan=2 height=1 bgcolor=silver></td></tr>
<tr><td colspan=2 height=1></td></tr><tr><td bgcolor=222222 colspan=2 align=center><input type="submit" class="textbox" name="showon" value="Update All"></td></tr></table></form><br><form action="" method="post"><div style="width:5%;">
<a style="display:none;" href="javascript:hidediv();" id=linktwo name=passchange>&nbsp;<b><font color=E0FFC2>Change&nbsp;Your&nbsp;Password?</font></b></a><a href="javascript:showdiv();" id=linkone name=passchange>&nbsp;<b><font color=E0FFC2>Change&nbsp;Your&nbsp;Password?</font></b></a></div>
<div id=front style="display:none;">
<font color="silver" face="verdana" size="1">&nbsp;Current Password:</font><br>
&nbsp;<input type="password" class="textbox" name="oldpassword"><br>
<font color="silver" face="verdana" size="1">&nbsp;New Desired Password:</font><br>
&nbsp;<input type="password" class="textbox" name="newpassword"><br>
<font color="silver" face="verdana" size="1">&nbsp;Confirm New Password:</font><br>
&nbsp;<input type="password" class="textbox" name="newpasswordconfirm"><br>
&nbsp;<input type ="submit" value="Edit Password" class="textbox">
</form>
</div></td></tr></table>


<br>
<form action="" method="post" name="sell">
<center><input name="CheckAll" type="button" value="Check all" onclick="checkAll(document.sell['showcar[]'])" class="textbox"><input name="unCheckAll" type="button" value="Uncheck all" onclick="uncheckAll(document.sell['showcar[]'])" class="textbox"></center><br>
<table cellpadding=0 cellspacing=1 width=65% align=center>
<tr><td width=85% bgcolor=#222222 NOWRAP><center><font color=E0FFC2 face=verdana size=2>Car:</font></center></td><td width=15% bgcolor=#222222 NOWRAP><center><font color=E0FFC2 face=verdana size=2>Damage:</font></center></tr>
<? while($carlists = mysql_fetch_array($carlist)){
$carid = $carlists['carid'];
$carida = $carlists['id'];
$card = $carlists['damage'];
$checkedraw = $carlists['display'];
$carname = $carlists['carname'];

if($checkedraw == 'yes'){$checked = 'CHECKED';}else{$checked = ' ';}


if($carid == 1){$carname = 'Skoda Octavius';}
elseif($carid == 2){$carname = 'Ford Fiesta';}
elseif($carid == 3){$carname = 'Audi A3';}
elseif($carid == 4){$carname = 'Ford Mondeo';}
elseif($carid == 5){$carname = 'Jaguar X Type';}
elseif($carid == 6){$carname = 'BMW X5';}
elseif($carid == 7){$carname = 'Audi Q7';}
elseif($carid == 8){$carname = 'Ferrari Spider';}
elseif($carid == 9){$carname = 'Bugatti Veyron';}
elseif($carid == 10){$carname = 'Pagani Zonda';}
elseif($carid == 11){$carname = "$carname";}

if($carid == 10){$before = '<b><font color=red face=verdana size=1>Very Rare</b></font><font color=white face=verdana size=1>:&nbsp;</font>';}
elseif($carid == 9){$before = '<b><font color=red face=verdana size=1>Rare</b></font><font color=white face=verdana size=1>:&nbsp;</font>';}
elseif($carid == 8){$before = '<b><font color=red face=verdana size=1>Rare</b></font><font color=white face=verdana size=1>:&nbsp;</font>';}
elseif($carid == 11){$before = '<b><font color=red face=verdana size=1>Custom</b></font><font color=white face=verdana size=1>:&nbsp;</font>';}

else{$before = '';}
echo"<tr><td width=85% bgcolor=#333333 NOWRAP><input type=checkbox value=$carida name='showcar[]' $checked><a href=viewcar.php?id=$carida>$before<font color=white face=verdana size=1>$carname&nbsp;&nbsp;&nbsp;&nbsp;</font></a></td><td width=15% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1>$card%</font></tr>";

}?>
</table><br><center>
<input type="submit" value="Show cars on profile" class="textbox" name="doshow"></form><br>
<? if($carlistamount > 50){?><br>
<form action = "" method = "post"><input type="hidden" name="select" value="<? echo $one; ?>"><?php if($selectfrom != '0'){echo'<input type ="submit" value="Previous page" class="textbox" name="previous">';}?><input type ="submit" value="Next page" class="textbox" name="next"></form>
<?}else{echo"<br>";}?></center>

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