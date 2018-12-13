<?php

    class User {
    private $_db,
            $_data,
            $_sessionName,
            $_cookieName,
            $isLoggedIn;
            
    public function __construct($user = null) {
        $this->_db = DB::getInstance();   
    }
   	
	    public function login($username, $password) {

	    		$user  = $this->_db->get($username, $password);

             if ($user) {
                return true;
            }else{
            	return false;
            }	

	}

	 public function isLoggedIn() {
        return $this->isLoggedIn;
    }

}
