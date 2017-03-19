<? include 'included.php';
$mi = $myrank; ?>
<html>

<head><title>Bullet Calculator</title>
<style type=text/css>
a:hover {color:red; text-decoration: none;}
.textbox{background-color: #414141; border-bottom: 1px solid #626262; border-left: 1px solid #040404; border-right: 1px solid #626262; border-top: 1px solid #040404; color: Silver; font-family: verdana; font-size: 10px; font-weight: bold;}
a {color:white; text-decoration: none;}
</style></head>
<body background=/more/crossbg.png>

<?
$saturate = "/[^0-9]/i";
$victimranka = $_POST['victimrank'];
$victimprotectiona = $_POST['protection'];
$healtha = $_POST['health'];
$myranka = $_POST['myrank'];
$guna = $_POST['gun'];
$victimrank = preg_replace($saturate,"",$victimranka);
$victimprotection = preg_replace($saturate,"",$victimprotectiona);
$health = preg_replace($saturate,"",$healtha);
$myrank = preg_replace($saturate,"",$myranka);
$gun = preg_replace($saturate,"",$guna);


if(isset($_POST['submit'])){
if(($victimrank < '1')||($victimrank > '22')){}
elseif(($victimprotection < '1')||($victimprotection > '9')){}
elseif(($health < '1')||($health > '100')){}
elseif(($myrank < '1')||($myrank > '22')){}
elseif(($gun < '1')||($gun > '11')){}
else{
$method = number_format(ceil($victimrank / $myrank * $victimprotection / $gun * 23667 * $health / 100));

$methodtwo = ceil($victimrank / $myrank * $victimprotection / $gun * 24967 * $health / 100);


if($health == '1'){$method = "1";}
$pts = ceil($methodtwo/8000*50);

echo"<font color=white face=verdana size=1>Bullets needed = $method  (Estimated Cost - $pts Points)<br><br><font color=red><a href='help.php'>Go back</a></font></font>";}}else{?>


<br><br><br><br><br><br><table cellpadding=0 cellspacing=2 align=center>
<form method=post>
<tr><td colspan=2 align=center><font color=#444444 face=verdana size=3><b>Bullet Calculator</b></font></td></tr>
<tr><td>
<font color=white face=verdana size=1>Victims Rank:</font></td><td>
<SELECT NAME="victimrank" class=textbox>
<OPTION value=1>Tramp</OPTION>
<OPTION value=2>Citizen</OPTION>
<OPTION value=3>Wise Guy</OPTION>
<OPTION value=4>Thug</OPTION>
<OPTION value=5>Respected Thug</OPTION>
<OPTION value=6>Mobster</OPTION>
<OPTION value=7>Respected Mobster</OPTION>
<OPTION value=8>Assassin</OPTION>
<OPTION value=9>Respected Assassin</OPTION>
<OPTION value=10>Mafioso</OPTION>
<OPTION value=11>Respected Mafioso</OPTION>
<OPTION value=12>Underboss</OPTION>
<OPTION value=13>Respected Underboss</OPTION>
<OPTION value=14>Boss</OPTION>
<OPTION value=15>Respected Boss</OPTION>
<OPTION value=16>Godfather</OPTION>
<OPTION value=17>Respected Godfather</OPTION>
<OPTION value=18>Gangster</OPTION>
<OPTION value=19>Respected Gangster</OPTION>
<OPTION value=20>Don</OPTION>
<OPTION value=21>Respected Don</OPTION>
<OPTION value=22>Tough Don</OPTION>
</SELECT></td></tr>
<tr><td>
<font color=white face=verdana size=1>Victims Protection:</font></td><td>
<SELECT NAME="protection" class=textbox>
<OPTION value=1>None</OPTION>
<OPTION value=2>Modular Tactical Assault Vest</OPTION>
<OPTION value=3>Overt Tactical Vest</OPTION>
<OPTION value=4>Light Infantry Vest</OPTION>
<OPTION value=5>Infantry Battle Assault Vest</OPTION>
<OPTION value=6>LBA 305 Military Vest</OPTION>
<OPTION value=7>FBI Tactical vest</OPTION>
<OPTION value=8>SWAT Tactical vest</OPTION>
<OPTION value=9>Heavy Military Vest</OPTION>
</SELECT></td></tr>
<tr><td>
<font color=white face=verdana size=1>Victims Health:</font></td><td>
<SELECT NAME="health" class=textbox>
<?$one = 100;

while($one > '0'){
echo"<OPTION value=$one>$one%</OPTION>";
$one--;
}?>
</SELECT>
</td></tr>
<tr><td>
<font color=white face=verdana size=1>Your Rank:</font></td><td>
<SELECT NAME="myrank" class=textbox>
<OPTION value=1 <?if($mi == '1'){echo'selected=selected';}?>>Tramp</OPTION>
<OPTION value=2 <?if($mi == '1'){echo'selected=selected';}?>>Citizen</OPTION>
<OPTION value=3 <?if($mi == '1'){echo'selected=selected';}?>>Wise Guy</OPTION>
<OPTION value=4 <?if($mi == '1'){echo'selected=selected';}?>>Thug</OPTION>
<OPTION value=5 <?if($mi == '1'){echo'selected=selected';}?>>Respected Thug</OPTION>
<OPTION value=6 <?if($mi == '1'){echo'selected=selected';}?>>Mobster</OPTION>
<OPTION value=7 <?if($mi == '1'){echo'selected=selected';}?>>Respected Mobster</OPTION>
<OPTION value=8 <?if($mi == '1'){echo'selected=selected';}?>>Assassin</OPTION>
<OPTION value=9 <?if($mi == '1'){echo'selected=selected';}?>>Respected Assassin</OPTION>
<OPTION value=10 <?if($mi == '1'){echo'selected=selected';}?>>Mafioso</OPTION>
<OPTION value=11 <?if($mi == '1'){echo'selected=selected';}?>>Respected Mafioso</OPTION>
<OPTION value=12 <?if($mi == '1'){echo'selected=selected';}?>>Underboss</OPTION>
<OPTION value=13 <?if($mi == '1'){echo'selected=selected';}?>>Respected Underboss</OPTION>
<OPTION value=14 <?if($mi == '1'){echo'selected=selected';}?>>Boss</OPTION>
<OPTION value=15 <?if($mi == '1'){echo'selected=selected';}?>>Respected Boss</OPTION>
<OPTION value=16 <?if($mi == '1'){echo'selected=selected';}?>>Godfather</OPTION>
<OPTION value=17 <?if($mi == '1'){echo'selected=selected';}?>>Respected Godfather</OPTION>
<OPTION value=18 <?if($mi == '1'){echo'selected=selected';}?>>Gangster</OPTION>
<OPTION value=19 <?if($mi == '1'){echo'selected=selected';}?>>Respected Gangster</OPTION>
<OPTION value=20 <?if($mi == '1'){echo'selected=selected';}?>>Don</OPTION>
<OPTION value=21 <?if($mi == '1'){echo'selected=selected';}?>>Respected Don</OPTION>
<OPTION value=22 <?if($mi == '100'){echo'selected=selected';}?>>Tough Don</OPTION>
</SELECT></td></tr>
<tr><td>
<font color=white face=verdana size=1>Your Weapon:</font>
</td><td>
<SELECT NAME="gun" class=textbox>
<OPTION value=1>Air Rifle</OPTION>
<OPTION value=2>Colt 1911 .45 auto</OPTION>
<OPTION value=3>M9 Beretta 9mm Pistol</OPTION>
<OPTION value=4>Bren Ten 10mm</OPTION>
<OPTION value=5>M21 sniper rifle</OPTION>
<OPTION value=6>AK - 47</OPTION>
<OPTION value=7>Marui M4</OPTION>
<OPTION value=8>7.62-mm SVD DRAGUNOV</OPTION>
<OPTION value=9>FN F2000 Assault Rifle</OPTION>
<OPTION value=10>M249 Para SAW </OPTION>
</SELECT></td></tr>

<tr><td></td><td><input type=submit name=submit value="Calculate" class="textbox"></td></tr>
<tr><td></td><td><font color=white face=verdana size=1 title="This means that sometimes you may need too shoot more bullets than what the bullect calculator says">Note: Bullet Calc is only 90% accurate</font></td></tr>
</form>
</table>


<?}?>






</body></html>

