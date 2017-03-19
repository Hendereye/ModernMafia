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

$time = time();
$times = $time + 300;
$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$sessionidraw = $_COOKIE['PHPSESSID'];
$sessionid = preg_replace($saturate,"",$sessionidraw);
$userip = $_SERVER[REMOTE_ADDR]; 
$getida = $_GET['id'];
$getid = preg_replace($saturated,"",$getida);
$newnamea = mysql_real_escape_string($_POST['name']);
$newname = htmlentities($newnamea, ENT_QUOTES);

$gangsterusername = $usernameone;

if(isset($_GET['id'])){
$dropexist = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE id = $getid"));
if($dropexist < '1'){ }
else{
$getpic = mysql_fetch_array(mysql_query("SELECT * FROM cars WHERE id = $getid"));
$getcarid = $getpic['carid'];
$getdmg = $getpic['damage'];
$getowner = $getpic['owner'];
$carname = $getpic['carname'];
$carimage = $getpic['image'];
$img = mysql_query("SELECT * FROM cars WHERE id = '$getid'");
$imgrows = mysql_num_rows($img);

if($getcarid == 11){$getcarname = "<b>Custom:</b> $carname";}
}}

if(isset($_POST['name'])){
if($getowner != $gangsterusername){die('<font color=white face=verdana size=1>You do not own that car!</font>');}
elseif($getcarid != '11'){die('<font color=white face=verdana size=1>Error, that car is not a custom!</font>');}
else{mysql_query("UPDATE cars SET carname = '$newname' WHERE id = '$getid'");echo"<font color=white face=verdana size=1>You changed your cars name!</font>";}}

elseif(isset($_POST['newimage'])){
die(' ');

if($getowner != $gangsterusername){die('<font color=white face=verdana size=1>You do not own that car!</font>');}
if($getcarid != '11'){die('<font color=white face=verdana size=1>Error, that car is not a custom!</font>');}

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
$image_name=$getid.'.'.$extension;
//the new name will be containing the full path where will be stored (images folder)
$newname="more/car/customs/".$image_name;
//we verify if the image has been uploaded, and print error instead

$fileaa = "more/car/customs/".$image_name;

$ra = mysql_num_rows(mysql_query("SELECT * FROM cars WHERE image = '$image_name'"));
if(($ra != '0')&&($image_name != 'q.png')){
unlink($fileaa); }


$copied = copy($_FILES['image']['tmp_name'], $newname);
mysql_query("UPDATE cars SET image = '$image_name' WHERE id = '$getid'");
if (!$copied) 
{
	die('<font color=white face=verdana size=1>Error please try again.</font>');
	$errors=1;
}
else {echo "<font color=white face=verdana size=1>Custom image changed successful!</font>";}


}}}












$selecterraw = $_POST['select'];
$selecter = preg_replace($saturated,"",$selecterraw);
if(isset($_POST['next'])){$one = $selecter + 1;}
elseif(isset($_POST['previous'])){$one = $selecter - 1;}else{$one = '0';}

$selectfroma = $one * 30;
$selecttoa = $selectfrom + 30;
$selectfrom = preg_replace($saturated,"",$selectfroma);
$selectto = preg_replace($saturated,"",$selecttoa);



$getuserinfoarray = $statustesttwo;
$carlist = mysql_query("SELECT * FROM cars WHERE owner = '$gangsterusername' ORDER BY carid DESC LIMIT $selectfrom,$selectto ");

$carlistamount = mysql_query("SELECT id FROM cars WHERE owner = '$gangsterusername'");
$carlistamount = mysql_num_rows($carlistamount);


?> 
<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Edit car</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>

<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<td background="/more/crossbg.png">
<center>

</font><br><br><? 
if($getcarid != '11'){echo"<br><br><font color=white face=verdana size=1><b>Error with Car ID</b></font><br><br>";}elseif($getowner != $gangsterusername){echo"<br><br><font color=white face=verdana size=1><b>Error with Car ID</b></font><br><br>";}else{

if($imgrows != 0){
$getpic = mysql_fetch_array(mysql_query("SELECT * FROM cars WHERE id = $getid"));
$carname = $getpic['carname'];
$carimage = $getpic['image'];
$mt = mt_rand(0,9999999);

echo"<img src=/more/car/customs/$carimage?$mt>";echo"<br><br><font color=white face=verdana size=1>$getcarname $getdmg% damage</font><br><font color=white face=verdana size=1>Owned by </font><a href=viewprofile.php?username=$getowner><font color=white face=verdana size=1><b>$getowner</b></a></font><br><br>
<form method=post action=editcar.php?id=$getid  enctype=multipart/form-data>
<input type=file name=image class=textbox><input name=newimage type=submit value='Upload image' class=textbox><br><font color=white face=verdana size=1>(Maximum file size - <b>100kb</b>, only <b>JPG,JPEG,GIF</b> and <b>PNG</b> formats. Any unsuitable car names/images will result in <b>removal of that car</b>)</font><br>
</form>
<form method=post action=editcar.php?id=$getid>
<font color=white face=verdana size=1>Car name:</font><input type=textbox class=textbox name=name><input type=submit value='Change name' class=textbox name=newname>
</form>




";}}?>
<table cellpadding=0 cellspacing=1 width=85%>
<tr><td width=65% bgcolor=#222222 NOWRAP><center><font color=silver face=verdana size=2>Car:</font></center></td><td width=20% bgcolor=#222222 NOWRAP><center><font color=silver face=verdana size=2>Damage:</font></center><td width=20% bgcolor=#222222 NOWRAP><center><font color=silver face=verdana size=2>Drop:</font></center></td></tr>
<? while($carlists = mysql_fetch_array($carlist)){
$carid = $carlists['carid'];
$carida = $carlists['id'];
$card = $carlists['damage'];
$carname = $carlists['carname'];

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
elseif($carid == 11){$carname = $carname;}

if($carid == 10){$before = '<b><font color=red face=verdana size=1>Very Rare:&nbsp;</b></font>';}
elseif($carid == 9){$before = '<b><font color=red face=verdana size=1>Rare:&nbsp;</b></font>';}
elseif($carid == 8){$before = '<b><font color=red face=verdana size=1>Rare:&nbsp;</b></font>';}
elseif($carid == 11){$before = '<b><font color=red face=verdana size=1>Custom:&nbsp;</b></font>';}
else{$before = '';}
echo"<tr><td width=65% bgcolor=#333333 NOWRAP><a href=viewcar.php?id=$carida>$before<font color=white face=verdana size=1>$carname</font></a></td><td width=20% bgcolor=#333333 NOWRAP><font color=white face=verdana size=1>$card%</font><td width=20% bgcolor=#333333 NOWRAP><a href=steal.php?dropid=$carida><font color=white face=verdana size=1>Drop</font></a></td></tr>";

}?>
</table>
<? if($carlistamount > 50){?>
<form action = "" method = "post"><input type="hidden" name="select" value="<? echo $one; ?>"><?php if($selectfrom != '0'){echo'<input type ="submit" value="Previous page" class="textbox" name="previous">';}?><input type ="submit" value="Next page" class="textbox" name="next"></form>
<?}else{echo"<br>";}?>

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