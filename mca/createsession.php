<?php 	
	session_start();
	$_SESSION['toinsertdata'] = $_POST['toinsertdata'];
	$_SESSION['toupdate'] = $_POST['toupdate'];
	$_SESSION['URL_UPDATE'] = $_POST['URL_UPDATE'];
	$_SESSION['URL_INSERT'] = $_POST['URL_INSERT'];
	$_SESSION['type'] = "contest";
	echo json_encode('1');
?>