<?php include"mainmenu.php"; ?>


<?



if ($userlevel >= 14)
{

}else{
die("You are not allowed to view this page!");
}

?>







<?php


if ($userlevel >= 14)
{



if ($_GET['dturnoff']=="true"){

mysql_query("UPDATE gametimes SET time='0' WHERE timefor='daopay'");

echo "Noticification Turned Off!";

}

if ($_GET['pturnoff']=="true"){

mysql_query("UPDATE gametimes SET time='0' WHERE timefor='paypal'");

echo "Noticification Turned Off!";

}




if ($_POST['add'] && htmlentities($_POST['name'])&& $userlevel>=14){

$name = $_POST['name'];
$name = mysql_real_escape_string(htmlentities($name));
$amount = mysql_real_escape_string(htmlentities($_POST['amount']));

$num_true=mysql_num_rows(mysql_query("SELECT * FROM users WHERE username='$name'"));
if ($num_true == 0){
echo "No such user!"; 
}else{

$amount2 = number_format($_POST['amount']);

mysql_query("UPDATE users SET `points`=`points`+'$amount', mail='1' WHERE username='$name'");
mysql_query("INSERT INTO `orders` ( `id` , `username` , `amount` , `date` ) VALUES ('', '$name', '$amount', '$date')");
mysql_query("INSERT INTO `messages` ( `id` , `t` , `f` , `message` , `date` , `r` , `saved` ) VALUES (
'', '$name', '$name', 'A administrator has added <b>$amount2</b> points to your account!', '$date', '0', '0')");
$amount = number_format($amount);
mysql_query("INSERT INTO `messages` ( `id` , `t` , `f` , `message` , `date` , `r` , `saved` ) VALUES (
'', 'Sir_Umar', 'Game Stats', '<b>$username</b> added $amount2 points to <b>$name</b> account!', '$date', '0', '0')");
mysql_query("UPDATE users SET mail='1' WHERE username='Universal'");

echo "You added <b>$amount</b> points to $name's account!";


}}





if ($_POST['takeaway'] && htmlentities($_POST['name'])&& $userlevel>=14){

$name = $_POST['name'];
$name = mysql_real_escape_string(htmlentities($name));
$amount = mysql_real_escape_string(htmlentities($_POST['amount']));

$num_true=mysql_num_rows(mysql_query("SELECT * FROM users WHERE username='$name'"));
if ($num_true == 0){
echo "No such user!"; 
}else{

$amount2 = number_format($_POST['amount']);

mysql_query("UPDATE users SET `points`=`points`-'$amount', mail='1' WHERE username='$name'");
mysql_query("INSERT INTO `orders` ( `id` , `username` , `amount` , `date` ) VALUES ('', '$name', '$amount', '$date')");
mysql_query("INSERT INTO `messages` ( `id` , `t` , `f` , `message` , `date` , `r` , `saved` ) VALUES (
'', '$name', '$name', 'A administrator has taken away <b>$amount2</b> points to your account!', '$date', '0', '0')");
$amount = number_format($amount);
mysql_query("INSERT INTO `messages` ( `id` , `t` , `f` , `message` , `date` , `r` , `saved` ) VALUES (
'', 'Sir_Umar', 'Game Stats', '<b>$username</b> tookaway $amount2 points from <b>$name</b> account!', '$date', '0', '0')");
mysql_query("UPDATE users SET mail='1' WHERE username='Universal'");

echo "You tookaway <b>$amount</b> points from $name's account!";


}}


}else{
die("You are not allowed to view this page,Your action has been logged!");
}

?>






<table cellSpacing=0 cellPadding=0 style="WIDTH: 100%">
<Tbody>
<tr>
<td class=topleft NOWRAP>
</td>
<td class=leftbar NOWRAP>
</td>
<td class=bar NOWRAP>

</td>
<td class=rightbar NOWRAP>
</td>
<td class=topright NOWRAP>
</td>
</tr>
</tbody>
</table>
<table cellSpacing=0 cellPadding=0 style="WIDTH: 100%">
<Tbody>
<tr>
<td class=left NOWRAP>
</td>
<td class=main>
<div align="center">



<?

if ($userlevel >= 14)
{
?>




<b>Add points to players account:</b>
<form action="" method="post">
Username:
<br>
<input name="name" type="text" class="tbox">
<br>
Amount:
<br>
<input name="amount" type="text" class="tbox">
<br>
<input name="add" type="submit" value="Add" class="tbox">
</form>
<BR>



<b>Takeaway points from players account:</b>
<form action="" method="post">
Username:
<br>
<input name="name" type="text" class="tbox">
<br>
Amount:
<br>
<input name="amount" type="text" class="tbox">
<br>
<input name="takeaway" type="submit" value="Take away" class="tbox">
</form>
<BR>




<HR>
<? }else{ echo "You are not allowed to view this page!"; } ?>
	
	


</div>
</td>
<td class=right NOWRAP>
</td>
</tr>
</Tbody>
</table>


<table cellSpacing=0 cellPadding=0 style="WIDTH: 100%">
<Tbody>
<tr>
<td class=bottomleft NOWRAP>
</td>
<td class=bottom NOWRAP>
</td>
<td class=bottomright NOWRAP>
</td>
</tr>
</tbody>
</table>

<?php include"playerstats.php"; ?>