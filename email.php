<?include 'connecter.php'; 
die(' ');

$geall = mysql_query("SELECT * FROM emails");
 


while($lol = mysql_fetch_array($geall)){
$email = $lol['email'];
mysql_query("UPDATE emails SET sent = '1' WHERE email = '$email'");


$to = "$email";
$subject = "Mafia Society - S2";

$header = "From:  Mafia Society NEW Updates & Features <RaeqwoN@mafiasociety.com>\r\n" .
'Reply-To: Mafia Society <noreply@mafiasociety.com>' . "\r\n" .
'X-Mailer: PHP/' . phpversion() . "\r\n" .
"MIME-Version: 1.0\r\n" .
"Content-Type: text/html; charset=utf-8\r\n" .
"Content-Transfer-Encoding: 8bit\r\n\r\n";

$body = "Hello $email,<br><br><a href=http://s2.mafiasociety.com/?n=$name>Click here to see the updates, such as SUPPLY BULLETS, AVATARS and many others.</a>";

mail($to, $subject, $body, $header);
}








?>