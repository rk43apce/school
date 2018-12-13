<?php

class Login {

	private $_login;       
	private $_db;            


	public function __construct($user = null) {
		$this->_db = DB::getInstance();  

	}



	public static function logout()
	{
		session_start();
		session_unset();
		session_destroy();
		$baseUrl =  "http://" . $_SERVER['SERVER_NAME'];
		Redirect::to($baseUrl);
	}


	public static function isUserLogIn($userType)
	{	

		if (!Session::exists('user_id') &&  !Session::exists('userType')) {

			self::logout();

			return false;
		}


		if (!Session::get('userType') == $userType) {
			# code...
			self::logout();
			return false;

		}		

	}
	
	public function loginUser($username, $password) 
	{

		$sql = "SELECT user_id, userType FROM user WHERE  email = '$username' AND  password = '$password'"; 

		$result = $this->_db->querySelect($sql);

		if ($this->_db->isResultCountOne($result)) {

			$resultArray =   $this->_db->processRowSet($result, true);


		 	$resultArray['userType'];

			Session::put('user_id', $resultArray['user_id']);
			Session::put('userType', $resultArray['userType']);

			return true;

		}


		Session::put('errorMsg', 'Invalid username / password!');

		return false;

	}

}
