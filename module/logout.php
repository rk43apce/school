<?php



require './functions/helper.php';
	

	logout();

$redirectUrl = "http://" . $_SERVER['SERVER_NAME'];

header('Location:'.$redirectUrl);

?>