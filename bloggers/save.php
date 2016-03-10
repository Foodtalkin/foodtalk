<?php 

	session_start();


	include 'functions.php';

	date_default_timezone_set('Asia/Calcutta');



    try {

    	$con = connect($config);

    	if(!$con)die("Database connection aborted");

        

		$query = "INSERT INTO bloggers ( name, email, phone, instagram, twitter, facebook, facebook_page, url, pincode, address, location, category, field, device)
         VALUES ( :name, :email, :phone, :instagram, :twitter, :facebook, :facebook_page, :url, :pincode, :address, :location, :category, :field, :device)";

    	$bind = array('name'=>$_POST['name'],
            'email'=>$_POST['email'],
            'phone'=>$_POST['phone'],
            'instagram'=>$_POST['instagram'],
            'twitter'=>$_POST['twitter'],
            'facebook'=>$_POST['facebook'],
            'facebook_page'=>$_POST['facebook_page'],
            'url'=>$_POST['url'],
            'pincode'=>$_POST['pincode'],
            'address'=>$_POST['address'],
            'location'=>$_POST['location'],
            'category'=>$_POST['category'],
            'field'=>$_POST['field'],
            'device'=>$_POST['device']
        ); 

    	$result = insertto($query, $bind, $con);

    			echo "true";	

    } catch (Exception $e) {

    	echo $e;

    }

         



 ?>