<?php

	$postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
	if($request->user != "" && $request->pass != ""){
		$user = trim($request->user," ");
		$pass = trim($request->pass," ");

		if ($user === "admin"){
			if($pass === "password"){
				$result = array('login' => '1', 'username' => $user );
				header('Content-Type: application/json');
				echo json_encode($result);

			}else{
				$result = array('login' => '0' );
				header('Content-Type: application/json');
				echo json_encode($result);

			}
		}else{
			$result = array('login' => '0' );
			header('Content-Type: application/json');
			echo json_encode($result);

		}
	}
?>