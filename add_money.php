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




if ($_POST['add'] && htmlentities($_POST['name'])&& $userlevel>=14){

$name = $_POST['name'];
$name = mysql_real_escape_string(htmlentities($name));
$amount = mysql_real_escape_string(htmlentities($_POST['amount']));

$num_true=mysql_num_rows(mysql_query("SELECT * FROM users WHERE username='$name'"));
if ($num_true == 0){
echo "No such user!"; 
}else{

$amount2 = number_format($_POST['amount']);

mysql_query("UPDATE users SET `cash`=`cash`+'$amount', mail='1' WHERE username='$name'");
mysql_query("INSERT INTO `messages` ( `id` , `t` , `f` , `message` , `date` , `r` , `saved` ) VALUES (
'', '$name', '$name', 'A administrator has added $<b>$amount2</b> money to your account!', '$date', '0', '0')");
$amount = number_format($amount);
mysql_query("INSERT INTO `messages` ( `id` , `t` , `f` , `message` , `date` , `r` , `saved` ) VALUES (
'', 'Sir_Umar', 'Game Stats', '<b>$username</b> added $$amount2 money to <b>$name</b> account!', '$date', '0', '0')");
mysql_query("UPDATE users SET mail='1' WHERE username='Universal'");
mysql_query("INSERT INTO `givencash` ( `id` , `who` , `given` , `to` ) VALUES ('', '$username', '$amount2', '$name')");

echo "You added $<b>$amount</b> to $name's account!";


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

mysql_query("UPDATE users SET `cash`=`cash`-'$amount', mail='1' WHERE username='$name'");
mysql_query("INSERT INTO `messages` ( `id` , `t` , `f` , `message` , `date` , `r` , `saved` ) VALUES (
'', '$name', '$name', 'A administrator has taken away $<b>$amount2</b> money to your account!', '$date', '0', '0')");
$amount = number_format($amount);
mysql_query("INSERT INTO `messages` ( `id` , `t` , `f` , `message` , `date` , `r` , `saved` ) VALUES (
'', 'Sir_Umar', 'Game Stats', '<b>$username</b> tookaway $$amount2 money from <b>$name</b> account!', '$date', '0', '0')");
mysql_query("UPDATE users SET mail='1' WHERE username='Sir_Umar'");


echo "You tookaway $<b>$amount</b> from $name's account!";


}}


}else{
die("You are not allowed to view this page,Your action has been logged!");
}

?>



<table cellSpacing=0 cellPadding=0>
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
<table cellSpacing=0 cellPadding=0>
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




<b>Add money to players account:</b>
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



<b>Takeaway money from players account:</b>
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


<table cellSpacing=0 cellPadding=0>
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