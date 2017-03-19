<?php include"mainmenu.php"; ?>



<?

if ($userlevel >= 14)
{

}else{
die("You do not permission to view this Page!");
}

?>



<?php

if($_POST['create']){

//get file details
$carname = mysql_real_escape_string(htmlentities($_POST['carname']));
$name = $_FILES['uploadfile']['name'];
$tmp_name = $_FILES['uploadfile']['tmp_name'];
$size = $_FILES['uploadfile']['size'];
$type = $_FILES['uploadfile']['type'];

if($name){


if($carname){

$rand=rand(10000, 99999);
$newname=$rand.$name;


$location = "cars/customs/$newname";


if ($size >250000){die("Your picture size is too big, it can not be more than 250KB");}

  $allowedExtensions = array("jpg","jpeg","png"); 
  foreach ($_FILES as $file) { 
    if ($file['tmp_name'] > '') { 
      if (!in_array(end(explode(".", 
            strtolower($file['name']))), 
            $allowedExtensions)) { 
       die($file['name'].' is an invalid file type, only png and jpeg images are allowed!<br/>'. 
        '<a href="javascript:history.go(-1);">'. 
        '&lt;&lt Go Back</a>'); 
      } 
    } 
  } 



		copy($tmp_name, "cars/customs/$newname");


mysql_query("INSERT INTO `ccars` (`id`, `name`, `pic`, `profile`, `sale`, `price`, `owner`, `super`, `biggin`, `ultimate`) VALUES ('', '$carname', '$location', '1', '0', 0, '$username', '1', '<font color=blue><b>Super Rare</b></font>', '0')");

echo "You created a Super Rare!";


}else{
die("Please select a carname!");
}



}else{
die("Please select a car pic!");
}


}

?>






<TABLE cellSpacing=0 cellPadding=0>
<TBODY>
<TR>
<TD class=menutopleft>
<IMG style="DISPLAY: block" height=20 alt="" src="../blank.png" width=16>
</TD>
<TD class=menutopbar style="WHITE-SPACE: nowrap">

</TD>
<TD class=menutopend>
<IMG style="DISPLAY: block" height=20 alt="" src="../blank.png" width=69>
</TD>
<TD class=menutopmain>
<IMG style="DISPLAY: block" height=20 alt="" src="../blank.png" width=35>
</TD>
<TD class=menutopright>
<IMG style="DISPLAY: block" height=16 alt="" src="../blank.png" width=14>
</TD>
</TR>
</TBODY>
</TABLE>

<TABLE cellSpacing=0 cellPadding=0>
<TBODY>
<TR>
<TD class=menuleft>
<IMG style="DISPLAY: block" alt="" src="../blank.png" width=7>
</TD>
<td class="menumain">
<div align="center">
<h4><font color="#999999">Create a Super Rare</font></h4>
<br>
<h6><font color="#999999">Add Super Rares to your Account!</font></h4>
<br>
<br>
<table width="60%" cellpadding="2" cellspacong="2">
<FORM ENCTYPE="multipart/form-data" ACTION="" METHOD=POST>
Car Name: <input name="carname" class="tbox" type="text" value="">
<br>
Car Picture: <INPUT NAME="uploadfile" TYPE="file" class="tbox">
<br>
<input name="create" class="tbox" type="submit" value="Create Super Rare!">
</form>
<br>
<font color="#999999">Don't go Mad.. Only Create One for yourself, and One for a prize or Giveaway!</font>
</table>

</div>
</TD>
<TD class=menuright>
<IMG style="DISPLAY: block" height=6 alt="" src="../blank.png" width=6>
</TD>
</TR>
</TBODY>
</TABLE>

<TABLE cellSpacing=0 cellPadding=0>
<TBODY>
<TR>
<TD class=menubottomleft>
<IMG style="DISPLAY: block" height=6 alt="" src="../blank.png" width=15>
</TD>
<TD class=menubottommain>
<IMG style="DISPLAY: block" height=8 alt="" src="../blank.png" width=1>
</TD>
<TD class=menubottomright>
<IMG style="DISPLAY: block" height=6 alt="" src="../blank.png" width=6>
</TD>
</TR>
</TBODY>
</TABLE>
</DIV>
<BR>
</TD>

<?php include"playerstats.php"; ?>