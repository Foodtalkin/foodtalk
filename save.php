<?php
	require('API/Pusher.php');
	include 'functions.php';
    $con = connect($config);
    if(!$con)die("Database connection aborted");

    if (($_GET['name']!="")&&($_GET['ph']!="")&&($_GET['email']!="")&&($_GET['cname']!="")&&($_GET['loc']!="")&&($_GET['name']!=" ")&&($_GET['ph']!=" ")&&($_GET['email']!=" ")&&($_GET['cname']!=" ")&&($_GET['loc']!=" ")) {
    	//savig in database
    		$to  = $_GET['email'];
			$subject = "We will get back to you soon";
			$message =  'Hello,'."\r\n \r\n".

'Thank you for reaching out to us. Our team will get back to you.'."\r\n \r\n".

'Regards'."\r\n".

'Food Talk India';
			$headers = 'From: info@foodtalkindia.com' . "\r\n" .
			    'Reply-To: info@foodtalkindia.com' . "\r\n" ;
			mail($to, $subject, $message, $headers);
			$query="INSERT INTO adv (
				name, 
				phone, 
				email, 
				site, 
				company, 
				location, 
				dateTime)VALUES (:c_name, :c_phone, :c_email, :c_site, :com, :c_location, :c_time)";

			$bind = array(':c_name' => $_GET['name'], ':c_phone' => $_GET['ph'],
				':c_email' => $_GET['email'],':c_site' => $_GET['web'],
			 ':com' => $_GET['cname'],':c_location' => $_GET['loc'],
			 ':c_time' => date( 'Y-m-d' )); 
			 
			  

			$result= insertto($query, $bind, $con);

			

				$app_id = '132580';
				$app_key = 'c5d75efdce80264bef34';
				$app_secret = '150a919c3cc6357ff8fe';

				$pusher = new Pusher(
				  $app_key,
				  $app_secret,
				  $app_id,
				  array('encrypted' => true)
				);


			$data['message'] = "New Advertisement Request From ".$_GET['name'];

			$pusher->trigger('notifications', 'new_notification', $data);


			echo $result;
    } else {
    	echo false;
    }
    

	
	

?>