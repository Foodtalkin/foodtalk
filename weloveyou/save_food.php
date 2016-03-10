<?php 

	

	include 'functions.php';

	date_default_timezone_set('Asia/Calcutta');



    try {

    	$con = connect($config);

    	if(!$con)die("Database connection aborted");

        $v1 = "yes";
        if(isset($_POST['move'])){
            $v1 = "No";
        }


		$query = "INSERT INTO foodtrucks ( name, email, phone, website, foodtalkid, e_name, e_phone, s_dish, area, cost, notes, move)
         VALUES ( :name, :email, :phone, :website, :foodtalkid, :e_name, :e_phone, :s_dish, :area, :cost, :notes , :move)";

    	$bind = array('name'=>$_POST['name'],
        'email'=>$_POST['email'],
        'phone'=>$_POST['phone'],
        'website'=> $_POST['website'],
        'foodtalkid'=> $_POST['foodtalkid'],
        'e_name'=> $_POST['e_name'],
        'e_phone'=> $_POST['e_phone'],
        's_dish'=>$_POST['type'],
        'area'=>$_POST['area'],
        'cost'=>$_POST['cost'],
        'notes'=>$_POST['remarks'],
        'move'=>$v1); 

    	$result = insertto($query, $bind, $con);

    			echo "true";	

    } catch (Exception $e) {

    	echo $e;

    }

         



 ?>