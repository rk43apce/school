<?php 


function dump($string)
{
	# code...

	echo "<pre>";

	var_dump($string);
	
	echo "</pre>";

}



function logout()
{
	session_start();
	session_unset();
	session_destroy();

}