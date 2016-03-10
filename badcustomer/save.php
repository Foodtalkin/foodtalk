<?php 
	
	include 'functions.php';
	date_default_timezone_set('Asia/Calcutta');

    try {
    	$con = connect($config);
    	if(!$con)die("Database connection aborted");
		$query = "INSERT INTO bad ( rest_name, cust_name, fb_link, designation, u_name, detail, problem, dateTime) VALUES ( :rest_name, :cust_name, :fb_link, :designation, :u_name, :detail, :problem, :dateTime)";
    	$bind = array('rest_name'=>$_POST['rest_name'], ':cust_name'=>$_POST['cust_name'], ':fb_link'=>$_POST['fb_link'], ':designation' => $_POST['designation'], ':u_name' => $_POST['u_name'], ':detail' => $_POST['detail'], ':problem' => $_POST['problem'], ':dateTime' => date( 'Y-m-d h:i:sa' )); 
    	$result = insertto($query, $bind, $con);
    			echo "true";	
    } catch (Exception $e) {
    	echo "0";
    }
         

 ?>