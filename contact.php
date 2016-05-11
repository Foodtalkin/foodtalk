<?php

	include 'functions.php';
    $con = connect($config);
    if(!$con)die("Database connection aborted");

    
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


			var_dump($_GET);
			$query="INSERT INTO contact (
				name, 
				phone, 
				email, 
				web, 
				purpose, 
				location, 
				message,
				dateTime)VALUES (:c_name, :c_phone, :c_email, :c_site, :pur, :c_location, :c_msg, :c_time)";

			$bind = array(':c_name' => $_GET['name'], ':c_phone' => $_GET['ph'],
				':c_email' => $_GET['email'],':c_site' => $_GET['web'],
			 ':pur' => $_GET['pur'],':c_location' => $_GET['loc'],
			 ':c_msg' => $_GET['msg'], ':c_time' => date( 'Y-m-d' )); 
			 
			  

			$result= insertto($query, $bind, $con);

			echo $result;
   

	
	

?>