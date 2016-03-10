<?php 



$config = array(

	'username' => 'shuchir_food',

	'password' => 'F@!thR3b0urn'

);



function connect($config)

{

	try {

		$conn = new PDO('mysql:host=localhost;dbname=shuchir_new_batcave',

						$config['username'],

						$config['password']);



		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



		return $conn;

	} catch(Exception $e) {

		return false;

	}

}





function query($query, $bindings, $conn)

{

	$stmt = $conn->prepare($query);

	$stmt->execute($bindings);



	$results = $stmt->fetchAll();



	return $results ? $results : false;

}
function queryu($query, $bindings, $conn)

{

	$stmt = $conn->prepare($query);

	$result =$stmt->execute($bindings);





	return $result;

}





function get($tableName, $conn, $id)

{

	try {

		$result = $conn->query("SELECT * FROM $tableName  ORDER BY $id DESC");



		return ( $result->rowCount() > 0 )

			? $result

			: false;

	} catch(Exception $e) {

		return false;

	}



}



function getall($tableName, $conn)

{

	try {

		$result = $conn->query("SELECT * FROM $tableName");



		return ( $result->rowCount() > 0 )

			? $result

			: false;

	} catch(Exception $e) {

		return false;

	}



}



function insertto($query, $bindings, $conn){

	$stmt = $conn->prepare($query);

	$stmt->execute($bindings);

	return true;

}

