<?php 
	include('functions.php');
	$con = connect($config);
	if(!$con) die('No database connection available');
	if(!isset($_GET))
		die("No data recieved");
	$query = "INSERT INTO Fb_data (f_name, f_mail, f_gender, dateTime) VALUES (:name, :email, :gender, :c_time)";
	$params = array(':name' => $_GET['name'], ':email' => $_GET['email'], ':gender' => $_GET['gender'], ':c_time' => date( 'Y-m-d' ));
	$result = insertto($query, $params, $con);
	echo "Hi ". $_GET['name'] . ", You will recieve an invite soon"; 
?>