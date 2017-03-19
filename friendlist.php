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
<?

$names = $_POST['name'];
$allowed = "/[^a-z0-9\\\\]/i";
$name = preg_replace($allowed,"",$names);


if($name){

$check = "SELECT username,ID FROM users WHERE username = '$name'";
$checksql = mysql_query($check);
$checkrows = mysql_num_rows($checksql);
}

if(isset($_POST['add'])){


$checkifs = "SELECT * FROM friends WHERE myid = '$ida'";
$checkifsqls = mysql_query($checkifs);
$checkifrowss = mysql_num_rows($checkifsqls);
if($checkifrowss >= '40'){die('<font color=white face=verdana size=1>You can only have a maximum of 40 friends</font>');}

if(!$name){}
elseif($checkrows != '1'){echo"<font color=white face=verdana size=1>No such user</font>";}
else{
$checkarray = mysql_fetch_array($checksql);
$checkname = $checkarray['username'];
$checkid = $checkarray['ID'];

$checkif = "SELECT * FROM friends WHERE thereid = '$checkid' AND myid = '$ida'";
$checkifsql = mysql_query($checkif);
$checkifrows = mysql_num_rows($checkifsql);

if($checkifrows > '0'){echo"<font color=white face=verdana size=1>You have already added that user</font>";}
else{
mysql_query("INSERT INTO friends(thereusername,thereid,myusername,myid)
VALUES ('$checkname','$checkid','$usernameone','$ida')");

mysql_query("UPDATE users SET notify = '1',notification = 'a_open$usernameone a_closed$usernameone a_slashadded you to his Friend List.' WHERE ID = '$checkid'");

echo"<font color=white face=verdana size=1>You added <a href=viewprofile.php?username=$checkname>$checkname</a> to your friend list</font>";}

}}



elseif(isset($_POST['remove'])){

if(!name){}
elseif($checkrows != '1'){echo"<font color=white face=verdana size=1>No such user</font>";}
else{
$checkarray = mysql_fetch_array($checksql);
$checkname = $checkarray['username'];
$checkid = $checkarray['ID'];

$checkif = "SELECT * FROM friends WHERE thereid = '$checkid' AND myid = '$ida'";
$checkifsql = mysql_query($checkif);
$checkifrows = mysql_num_rows($checkifsql);

if($checkifrows != '1'){echo"<font color=white face=verdana size=1>You have not added that user</font>";}
else{
mysql_query("DELETE FROM friends WHERE thereid = '$checkid' AND myid = '$ida'");
echo"<font color=white face=verdana size=1>You removed <a href=viewprofile.php?username=$checkname>$checkname</a> from your friend list</font>";}

}}

?>



<table align="center" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="8" height="22" background="/more/topleft.png"></td>
<td height="22" background="/more/top.png" NOWRAP><font color="#222222" face="verdana" size="1"><center><b>Friend list</b></center></font></td>
<td width="8" height="22" background="/more/topright.png"></td>
</tr>
<form action="" method="post">
<tr>
<td width="8" background="/more/leftb.png" NOWRAP></td>
<form method=post><td background="/more/crossbg.png">
<input type=textbox class=textbox name=name><input type=submit name=add class=textbox value="Add friend"><input type=submit name=remove class=textbox value="Remove friend"></form><Br><Br>
<table width="40%" cellpadding="0" cellspacing="1" align="center">
<tr><td width=100% NOWRAP colspan=2 align=center bgcolor=333333><font color=white size=1 face=verdana><center>People you have added</center></font></td></tr>
 
<tr><td width=60% bgcolor=222222 NOWRAP><font color=silver size=1 face=verdana>Username:</font></td><td width=40% bgcolor=222222 NOWRAP><font color=silver  size=1 face=verdana>Added at:</font></td></tr>
<?

$findgangstersql  = "SELECT * FROM friends WHERE myid = '$ida' ORDER BY id";
$findgangsterresult = mysql_query($findgangstersql);
$findgangsternumrows = mysql_num_rows($findgangsterresult);

if($findgangsternumrows == '0'){}else{

while($tima = mysql_fetch_array($findgangsterresult)){
$therename = $tima['thereusername'];
$date = $tima['date'];

echo"<tr><td width=60% bgcolor=222222 NOWRAP><a href=viewprofile.php?username=$therename><font color=white size=1 face=verdana>$therename</font></a></td><td width=40% bgcolor=222222 NOWRAP><font color=white size=1 face=verdana>$date</font></td></tr>";   

}

echo"<tr><td colspan=2 bgcolor=333333 NOWRAP align=right><a href=#>Total: $findgangsternumrows</a></td></tr><tr><td width=100% colspan=2 bgcolor=222222 NOWRAP height=3></td></tr>";
}
?>

</table><br><Br>

<table width="40%" cellpadding="0" cellspacing="1" align="center">
<tr><td width=100% NOWRAP colspan=2 align=center bgcolor=333333><font color=white size=1 face=verdana><center>People who added you</center></font></td></tr>
 
<tr><td width=60% bgcolor=222222 NOWRAP><font color=silver size=1 face=verdana>Username:</font></td><td width=40% bgcolor=222222 NOWRAP><font color=silver  size=1 face=verdana>Added at:</font></td></tr>
<?

$findgangstersql  = "SELECT * FROM friends WHERE thereid = '$ida' ORDER BY id";
$findgangsterresult = mysql_query($findgangstersql);
$findgangsternumrows = mysql_num_rows($findgangsterresult);

if($findgangsternumrows == '0'){}else{

while($tima = mysql_fetch_array($findgangsterresult)){
$therename = $tima['myusername'];
$date = $tima['date'];

echo"<tr><td width=60% bgcolor=222222 NOWRAP><a href=viewprofile.php?username=$therename><font color=white size=1 face=verdana>$therename</font></a></td><td width=40% bgcolor=222222 NOWRAP><font color=white size=1 face=verdana>$date</font></td></tr>";   

}

echo"<tr><td colspan=2 bgcolor=333333 NOWRAP align=right><a href=#>Total: $findgangsternumrows</a></td></tr><tr><td width=100% colspan=2 bgcolor=222222 NOWRAP height=3></td></tr>";
}
?>

</table><br><Br><a href=profile.php>Go Back</a>


</td>
<td width="8" background="/more/rightb.png" NOWRAP></td>
</tr>
</form>
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