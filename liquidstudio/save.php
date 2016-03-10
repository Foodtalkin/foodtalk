<?php 

	session_start();


	include 'functions.php';

	date_default_timezone_set('Asia/Calcutta');



    try {

    	$con = connect($config);

    	if(!$con)die("Database connection aborted");

        

		$query = "INSERT INTO collected_data ( name, email, phone, meta1, event1, city, source)
         VALUES ( :name, :email, :phone, :meta1, :event1, :city, :source)";

    	$bind = array('name'=>$_POST['name'],
            'email'=>$_POST['email'],
            'phone'=>$_POST['phone'],
        'meta1'=>$_POST['meta1'],
        'event1'=>'Liquid Studio Mumbai #3 at AER',
        'city'=>'Mumbai',
        'source'=>$_SESSION['source']); 

    	$result = insertto($query, $bind, $con);

    			echo "true";	

    } catch (Exception $e) {

    	echo $e;

    }

         



 ?>