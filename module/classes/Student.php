<?php
class Student {

	private $_db;

 public function __construct($user = null) {
    $this->_db = DB::getInstance();

}

public function create($s_fname, $s_lname, $stnd_id, $s_email, $s_phoneNo, $s_sex, $s_dob, $s_admission) {
    $this->_db->insert($s_fname, $s_lname, $stnd_id, $s_email, $s_phoneNo, $s_sex, $s_dob, $s_admission);
}



public function view() {        

    if($result =	$this->_db->select()){

    	return $result;

    }	  

}

public function get($s_id) {        

    if($result =    $this->_db->getUiqueStudentRecord($s_id)){

        return $result;

    }     

}

public function viewStudentStandard() {        

    if($result =    $this->_db->getStudentStandard()){

        return $result;

    }     

}

public function getStudentFee($s_id) {        

    if($result =    $this->_db->selectStudentFee($s_id)){

        return $result;

    }     

}


public function UpdateStudentProfile($studentData, $s_registrationNo )
{
    $out = array();

    foreach ($studentData as $column => $value) {

        array_push($out, "$column='$value'");
    }

    $set = implode(', ', $out);


 echo   $sql = "UPDATE students SET $set where s_registrationNo = $s_registrationNo";


    return mysqli_query($this->_db->mysqli, $sql); 

}

public function getStudentSubject($s_registrationNo)
{
    $sql = "SELECT * FROM `studentSubjectInfo` INNER JOIN subject on subject.subjectId = studentSubjectInfo.suject_Id WHERE student_id = '$s_registrationNo' AND isSubjectDrop = 'No' ";


    $result = $this->_db->querySelect($sql);

    if ($this->_db->isResultCountZero($result)) {

        return false;          

    }    

     return  $this->_db->processRowSet($result);     

}



public function getAllStudent()
{   
        # code...

    $admin_Id = Session::get('user_id');


    $sql = " SELECT s_registrationNo, s_fullname, s_phoneNo , s_email, doj FROM students  where admin_Id = '$admin_Id' ORDER BY s_id DESC";

    $result = $this->_db->querySelect($sql);

    if (empty($result)) {
        # code...
        return false;
    }

    if ($this->_db->isResultCountZero($result)) {        

        return false;
    }  
    return  $this->_db->processRowSet($result);
}


public function getStudentAccountById($s_registrationNo)
{


    $sql = " SELECT * FROM students left JOIN class on students.stnd_id= class.classId  WHERE students.s_registrationNo = '$s_registrationNo'";

    $result = $this->_db->querySelect($sql);

    if (!$this->_db->isResultCountOne($result)) {

        return false;

    }   

    return  $this->_db->processRowSet($result, true);      

}



public function getStudentFeePaymentHistory ($s_registrationNo)
{
        # code...

    $sql = "SELECT * FROM payment WHERE id_student = '$s_registrationNo' ORDER BY id_payment DESC";

    $result = $this->_db->querySelect($sql);

    if (!$this->_db->isResultCountZero($result)) {

        return  $this->_db->processRowSet($result);

    }   
}

public function getStudentLastFeePayment($s_registrationNo)
{

    $sql = "SELECT * FROM payment WHERE id_student = '$s_registrationNo' ORDER BY id_payment DESC LIMIT 1";

    $result = $this->_db->querySelect($sql);



    if ($this->_db->isResultCountOne($result)) {

        return  $this->_db->processRowSet($result, true);

    } 

    return  false;       

}




public function updateStudnetSubject($studentId, $subjects)
{	
     
    

        $result = $this->getStudentSubject($studentId);
    
        $arrayStudentSubjects = array();
    
        foreach ($result as $key => $value) {
    
            array_push($arrayStudentSubjects, $value['subjectId']);    
        }
        

    
        $sql  = "UPDATE `studentSubjectInfo` SET `isSubjectDrop` = 'Yes', dropOn = NOW() WHERE suject_Id NOT IN ( '" . implode( "', '" , $subjects ) . "' ) AND student_id = '$studentId' ";



        if (!$this->_db->queryUpdate($sql)) {

        return false;	
    }





    if ($arrayStudentSubjects) {			


        $arrayNewSubjects = array_diff($subjects, $arrayStudentSubjects);


        foreach ($arrayNewSubjects as $column => $newSubjectsId) {

            
            $sql = "INSERT INTO studentSubjectInfo (student_id, suject_Id) values ('$studentId', '$newSubjectsId')";       
            

            if (!$this->_db->queryInset($sql)) {

                return false;
            }
            
        }

        return true;
    }

    return true;

}



}