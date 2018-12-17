<?php

class Admission {

	private $_db;

	public function __construct($user = null) {
	    $this->_db = DB::getInstance();

	}

	public function create($s_registrationNo, $s_fullname, $s_fatherName, $s_motherName, $s_dob, $s_sex, $stnd_id,  $netFees, $s_email, $s_phoneNo, $s_address, $doj) {

	

  return   $this->_db->studentAdmission($s_registrationNo, $s_fullname, $s_fatherName, $s_motherName, $s_dob, $s_sex, $stnd_id, $netFees, $s_email, $s_phoneNo, $s_address, $doj);


	}


	public function studentSubject($studentId, $subject_id)
	{
		# code...

		return	$this->_db->addStudentSubjectInfo($studentId, $subject_id);
	}



 

}