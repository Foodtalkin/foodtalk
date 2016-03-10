<?php 

	

	include 'functions.php';

	date_default_timezone_set('Asia/Calcutta');



    try {

    	$con = connect($config);

    	if(!$con)die("Database connection aborted");

		$query = "INSERT INTO collected_data ( name, email, phone, age, meta1, event1, city, source)
         VALUES ( :name, :email, :phone, :age, :meta1, :event1, :city, :source)";

    	$bind = array('name'=>$_POST['name'],
        'email'=>$_POST['email'],
        'phone'=>$_POST['phone'],
        'age'=>$_POST['age'],
        'meta1'=>$_POST['meta1'],
        'event1'=>$_POST['event1'],
        'city'=>$_POST['city'],
        'source'=>$_POST['source']); 

    	$result = insertto($query, $bind, $con);

    			echo "true";	

    } catch (Exception $e) {

    	echo $e;

    }

         



 ?>