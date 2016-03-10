<?php

// if (isset($_SERVER['HTTP_ORIGIN'])) {
//         header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
//         header('Access-Control-Allow-Credentials: true');
//         header('Access-Control-Max-Age: 86400');    // cache for 1 day
//     }
//     // Access-Control headers are received during OPTIONS requests
//     if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

//         if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
//             header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");         

//         if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
//             header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

// }


require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

//OPTIONS REQUEST
$app->map('/:x+', function($x) {
    http_response_code(200);
})->via('OPTIONS');

// GET route
$app->get('/', function () {
	$response = array();
	$response['success'] = true;
	$response['message'] = 'GET SUCCESS';
	send(200, $response);
});

// POST - Save incoming data with all security, integrity and parameters
$app->post('/', function () {
	require 'Config/db.php';
	$con = connect($config);
	if(!$con){
		$response = array();
		$response['success'] = false;
		$response['message'] = 'Database connection error';
		send(500, $response);
	}else{
		$app = \Slim\Slim::getInstance();
		$data = json_decode($app->request->getBody(), true);
		$data = prepare($data);
		$result = store($data, $con);
		if($result){
			$response = array();
			$response['success'] = true;
			$response['message'] = 'Record Added Succefully';
			send(201, $response);
		}else{
			$response = array();
			$response['success'] = false;
			$response['message'] = 'Record Entry Failed';
			send(400, $response);
		}
	}
});

//Run the app
$app->run();

//save a php array into the database regardless of it's length using this function.
//"INSERT INTO myTable SET fname='Fname',lname='Lname',website='Website'";
function store($array, $con){
	$query = 'INSERT INTO collected_data SET ';
	foreach ($array as $key => $value) {
			$query .= $key . "=:" . $key . ", ";
	}
	$query = rtrim(trim($query), ',');
	//var_dump($query);
	$stmt = $con->prepare($query);
	$bindings = array();
	foreach($array as $key => $value){
		$bindings[':'.$key] = $value;
	}
	//var_dump($bindings);
	try {
		return $stmt->execute($bindings);	
	} catch (Exception $e) {
		return false;
	}
}

//json-decode, sanitize and prepare the array for insertion 
function prepare($post){
	$post = preg_replace("/[^a-z@.:A-Z 0-9]+/", "", $post );
	return $post;
}

//Send a response array with correct type
function send($status_code, $response) {
    $app = \Slim\Slim::getInstance();
    $app->status($status_code);
    $app->contentType('application/json');
    echo json_encode($response);
}