<?php
error_reporting(E_ALL); 
 ini_set('display_errors', 1);
class Fees {

	private $_db;

	public function __construct($user = null) {
	    $this->_db = DB::getInstance();

	}

	public function setFees($id_course, $fee_amount) {

	

	    $this->_db->insertFees($id_course, $fee_amount);
	}
 	


	public function  package() {

	   	return $this->_db->getPackage();

    }


    	public function  studentPackage($studentClassID) {

	   	return $this->_db->getStudentPackage($studentClassID);

    }


    public function payFess($studentID, $amount)
    {
    	# code...

	 return $this->_db->insertStudentFees($studentID, $amount);

    	
    }



    public function insertStundentPaymentData($s_registrationNo, $amount)
    {


    	$sql = "INSERT INTO payment (id_student, amount, pay_on) VALUES ('$s_registrationNo', '$amount', now())";


    	$result = 	$this->_db->insertStudentFees($sql);


    	var_dump($result);

}
}