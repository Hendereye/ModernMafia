<?
include 'included2.php'; 


$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$topicidraw = mysql_real_escape_string($_GET['you']);
$you= preg_replace($saturate,"",$topicidraw);

$crews = mysql_real_escape_string($_GET['cruw']);
$crew = preg_replace($saturate,"",$crews);


if($crew != '0'){
$countdeadmoneysql = mysql_query("SELECT SUM(new) AS b FROM forumtopics WHERE creator = '$you' AND type = '$crew' OR type = 'd' AND creator = '$you' OR type = 'main'  AND creator = '$you' OR type = 'e' AND creator = '$you' ");
$countdeadmoneyarray = mysql_fetch_array($countdeadmoneysql);
$countdeadmoney = $countdeadmoneyarray['b'];}else{
$countdeadmoneysql = mysql_query("SELECT SUM(new) AS b FROM forumtopics WHERE creator = '$you' AND type = 'd' AND creator = '$you' OR type = 'main' AND creator = '$you' OR type = 'e' AND creator = '$you'");
$countdeadmoneyarray = mysql_fetch_array($countdeadmoneysql);
$countdeadmoney = $countdeadmoneyarray['b'];}

if($countdeadmoney > '0'){echo"Mafian Society ($countdeadmoney)";}else{echo"Mafian Society";}?>