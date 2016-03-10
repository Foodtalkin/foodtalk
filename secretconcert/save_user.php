<?php 
	session_start();
	include 'functions.php';
	date_default_timezone_set('Asia/Calcutta');
	$con = connect($config);
	if(!$con)die("Database connection aborted");

    try {
        $query1 = "INSERT INTO response ( event_id, user_id, source, response) VALUES ( :event_id, :user_id, :source, :response)";
              $bind1 = array('event_id'=> 3,
                  'user_id'=> $_SESSION['FBID'],
                  'source'=>$_SESSION['SOURCE'],
                  'response'=>$_POST['response']);
                  $result1 = insertto($query1, $bind1, $con);

		$query = "UPDATE `user` SET `name`=:name,`email`=:email,`contact`=:contact,`dob`=:dob WHERE `user_id`=".$_SESSION['FBID'];
		$bind = array(
        'name'=>$_POST['name'],
        'email'=>$_POST['email'],
        'contact'=>$_POST['contact'],
        'dob'=>$_POST['dob']); 
        $result = queryu($query, $bind, $con);


        
        echo true;
    } catch (Exception $e) {
    	echo $e;
    }

         



 ?>