<?php
	
	$to = "shuchir@foodtalkindia.com";
	$subject = "website" . $_POST['subject'];
	$message = $_POST['message'];
	$headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	$headers .= 'From: '. $_POST['email'] . "\r\n" .
			    'Reply-To: '. $_POST['email'] . "\r\n" ;
	$sender = mail($to, $subject, $message, $headers);
	echo $sender;
?>