<?
include 'included2.php'; 


$saturate = "/[^a-z0-9]/i";
$saturated = "/[^0-9]/i";
$topicidraw = $_GET['posts'];
$topicid = preg_replace($saturated,"",$topicidraw);

$topicidraws = $_GET['topicid'];
$tits = preg_replace($saturated,"",$topicidraws);


$editsql = mysql_query("SELECT * FROM forumtopics WHERE topicid = '$tits' AND type = 'e'");
$editarray = mysql_fetch_array($editsql);
$posttits = $editarray['posts'];
$news = $posttits - $topicid;


if($topicid != $posttits){echo"<a href=eviewtopic.php?topicid=$tits><font color=khaki face=verdana size=1><b>$posttits</b></font><font color=gray face=verdana size=1> / <s>$topicid</s></font></a>";}


?>
