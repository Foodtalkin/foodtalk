<?php 

	

	include 'functions.php';

	date_default_timezone_set('Asia/Calcutta');



    try {

    	$con = connect($config);

    	if(!$con)die("Database connection aborted");

        $v1 ="no";
        $v2 ="no";
        $v3 ="no";

        if(isset($_POST['dinein'])){
            $v1 = "yes";
        }
        if(isset($_POST['dilivery'])){
            $v2 = "yes";
        }
        if(isset($_POST['takeaway'])){
            $v3 = "yes";
        }
        


		$query = "INSERT INTO homebakers ( name, email, phone, website, foodtalkid, e_name, e_phone, type, address, cost, remarks, dinein, dilivery, takeaway)
         VALUES ( :name, :email, :phone, :website, :foodtalkid, :e_name, :e_phone, :type, :address, :cost, :remarks, :dinein, :dilivery, :takeaway)";

    	$bind = array('name'=>$_POST['name'],
        'email'=>$_POST['email'],
        'phone'=>$_POST['phone'],
        'website'=> $_POST['website'],
        'foodtalkid'=> $_POST['foodtalkid'],
        'e_name'=> $_POST['e_name'],
        'e_phone'=> $_POST['e_phone'],
        'type'=>$_POST['type'],
        'address'=>$_POST['address'],
        'cost'=>$_POST['cost'],
        'remarks'=>$_POST['remarks'],
        'dinein'=>$v1,
        'dilivery'=>$v2,
        'takeaway'=>$v3); 

    	$result = insertto($query, $bind, $con);

    			echo "true";	

    } catch (Exception $e) {

    	echo $e;

    }

         



 ?>