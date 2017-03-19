<?
include 'includes/connection.php'; 


$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$topicidraw = $_GET['posts'];




$cruw = $_GET['crewid'];


$topicid = preg_replace($saturated,"",$topicidraw);

$cruws = preg_replace($saturated,"",$cruw);

$topicidraws = $_GET['topicid'];
$tits = preg_replace($saturated,"",$topicidraws);


$editsql = mysql_query("SELECT * FROM forumtopics WHERE topicid = '$tits' AND type = '$cruws'");
$editarray = mysql_fetch_array($editsql);
$posttits = $editarray['posts'];
$news = $posttits - $topicid;


if($topicid != $posttits){echo"<a href=crewviewtopic.php?topicid=$tits><font color=khaki face=verdana size=1><b>$posttits</b></font><font color=gray face=verdana size=1> / <s>$topicid</s></font></a>";}


?>
