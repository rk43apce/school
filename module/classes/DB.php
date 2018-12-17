<?php
class DB {

	const DB_SERVER = 'localhost';
	const DB_USERNAME = 'root';
	const DB_PASSWORD = 'i3MSwXh7FtUqPe';
	const DB_NAME = 'successpoint';

	private static $_instance = null;
	public $mysqli;           

	private function __construct() {
		
		$this->mysqli = new  mysqli(self::DB_SERVER, self::DB_USERNAME, self::DB_PASSWORD, self::DB_NAME);
		
	}

	public static function getInstance() {
		if(!isset(self::$_instance)) {
			self::$_instance = new DB();
		}
		return self::$_instance;
	}

	
	public function get($username, $password) {

		$sql = "SELECT * FROM admin WHERE email = ? and password = ?";
		
		if($stmt = $this->mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
			$stmt->bind_param("ss", $param_aemai, $param_apassword);

            // Set parameters
			$param_aemai = $username;
			$param_apassword = $password;

            // Attempt to execute the prepared statement
			if($stmt->execute()){
				$result = $stmt->get_result();

				if($result->num_rows == 1){
					/* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */                   

                  //  $row = $result->fetch_array(MYSQLI_ASSOC);
                   // var_dump($row);

					return true;

				} else{
                    // URL doesn't contain valid id parameter. Redirect to error page
					echo("Error description: " . mysqli_error($this->_db));  
                     //return false;            
				}

			} else{
                // echo "Oops! Something went wrong. Please try again later.";

				return false;
			}
		}
		
	}


     //=================================== Login start =====================================


        public static function testDB($value='')
        {
            # code...

            echo "string";

          echo  Session::get('user_id');

        }

        public function querySelect($sql)
        {
            

          return $this->mysqli->query($sql);

        }

        public function queryUpdate($sql)
        {
            

          return $this->mysqli->query($sql);

        }

        
        public function queryInset($sql)
        {
            

          return $this->mysqli->query($sql);

        }


        public function isResultCountOne($result)
        {
            # code...

            return $result->num_rows === 1;
        }


        public function isResultCountZero($result)
        {
            # code...

            return $result->num_rows === 0;
        }


        public function processRowSet($result, $singleRow = false)
        {
            $resultArray = array();

            while ($row = mysqli_fetch_assoc($result)) {
            array_push($resultArray, $row);

        }

            if ($singleRow === true)
            return $resultArray[0];

            return $resultArray;
        }




        public function validateUser($username, $password)
        {
            # code...

         $sql = "SELECT id_admin, name FROM admin WHERE  email = 'rk43apce@gmail.com' AND  password = '1234'"; // Check entry 

        if($result = $this->mysqli->query($sql)){

            if($result->num_rows === 1){ //  Check number  

                $row = $result->fetch_array();
                    
                $_SESSION['isLoggedIn'] = true;
                 $_SESSION['userType'] = 'admin';
                $_SESSION['id_admin'] = $row['id_admin'];
                
                return true;     

            }else{ 

                return false;
            }

        } else{           

            return false;
        } 

        }

     //================================== Login start ====================================== 


    //==================================== admission start ===========================================


	public function checkStudentExits($s_email, $stnd_id) {
		
      $sql = "SELECT * FROM students WHERE  s_email = '$s_email' AND  stnd_id = '$stnd_id'"; // Check entry 

      if($result = $this->mysqli->query($sql)){


            Session::put('newStudentRgistrationError', 'Sorry, Email ID  is already used!. Try with new Email ID');

            return $result->num_rows === 0;


        } else{           

            Session::put('newStudentRgistrationError', 'Sorry!, Fail to validate Email ID, Try again!');
        	return false;
        } 

    }   


    public function studentAdmission($s_registrationNo, $s_fullname, $s_fatherName, $s_motherName, $s_dob, $s_sex, $stnd_id, $netFees, $s_email, $s_phoneNo, $s_address, $doj) {      

        // $user_id  =  Session::get('user_id');
        $abc  =  Session::get('user_id');
    	
    	if ($this->checkStudentExits($s_email, $stnd_id)) {

    		
    		$sql = "INSERT INTO students (s_registrationNo, s_fullname, s_fatherName, s_motherName, s_sex, s_dob, stnd_id, netFees, s_email, s_phoneNo, s_address, doj, admin_Id) VALUES ('$s_registrationNo', '$s_fullname', '$s_fatherName', '$s_motherName',  '$s_sex', '$s_dob', '$stnd_id', '$netFees', '$s_email', '$s_phoneNo', '$s_address', '$doj', '$abc' )";


                if (!$this->mysqli->query($sql)) {
                    # code...
                     Session::put('newStudentRgistrationError', 'Sorry!, Fail to save student record , Try again!');

                     return false;
                }

            return true;

    	}else{

    		return false;
    	}
    	
    }




     public function isStudentSubjectInfoExits($student_Id) {
        
      $sql = "SELECT * FROM  studentSubjectInfo WHERE  student_id = '$student_Id'"; // Check entry 

      if($result = $this->mysqli->query($sql)){

            return $result->num_rows === 0;

        } else{           

            return false;
        } 

    }


    public function addStudentSubjectInfo($student_Id, $subject_Id)
    {
        # code...
            
        $sql = "INSERT INTO studentSubjectInfo (student_id, suject_Id) VALUES ('$student_Id', '$subject_Id')";

        return $this->mysqli->query($sql);

    }



    //=================================== admission end here =============================


    //=====================================Student Handling ====================================

    public function insert($s_fname, $s_lname, $stnd_id, $s_email, $s_phoneNo, $s_sex, $s_dob, $s_admission) {

    	
    	$sql = "INSERT INTO students (s_fname, s_lname, stnd_id, s_email, s_phoneNo, s_sex, s_dob, s_admission) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    	
    	if($stmt = $this->mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
    		$stmt->bind_param("ssssssss", $s_fname, $s_lname, $stnd_id,  $s_email, $s_phoneNo, $s_sex, $s_dob, $s_admission);
    		
    		
            // Attempt to execute the prepared statement
    		if($stmt->execute()){

    			
    			return true;

    		} else{

    			echo("Error description: " . mysqli_error($this->mysqli));
    		}
    	}

    	
    }

    public function select() {


    	$sql = "SELECT * FROM `students` INNER JOIN standard on standard.stnd_code = students.stnd_id";


    	if($result = $this->mysqli->query($sql)){
    		if($result->num_rows > 0){


    			return $result;

    		}


    	} else{

    		return false;
    	}

    }


    public function getUiqueStudentRecord($s_id) {

       // SELECT * FROM students INNER JOIN standard on students.stnd_id= standard.stnd_code WHERE students.s_id = 1

                 //echo $stnd_id;  // cheking parameter is comming or not

       //  $stnd_code = 'SP1012ARTS';

    // $sql = "SELECT * FROM students  WHERE s_id = '$s_id'";
    	

     // $sql = " SELECT * FROM students left JOIN standard on students.stnd_id= standard.stnd_code left join payment on payment.id_student = students.s_registrationNo left join package on package.id_course = students.stnd_id   WHERE students.s_registrationNo = '$s_id'";
      //  echo $sql; // check sql


     $sql = " SELECT * FROM students JOIN standard on students.stnd_id= standard.stnd_code  WHERE students.s_registrationNo = '$s_id'";

    	if($result = $this->mysqli->query($sql)){

    		if($result->num_rows > 0){


    			return $result;

    		}


    	} else{

    		return false;
    	}
    	
    }


    public function getStudentStandard($s_id) {

    	$sql = "SELECT * FROM students inner join standard on  students.s_id = standard.stnd_id  WHERE students.s_id = ?";
    	
    	if($stmt = $this->mysqli->prepare($sql)){
        // Bind variables to the prepared statement as parameters
    		$stmt->bind_param("i", $param_id);
    		
        // Set parameters
    		$param_id = 10;
    		
        // Attempt to execute the prepared statement
    		if($stmt->execute()){
    			$result = $stmt->get_result();
    			
    			if($result->num_rows == 1){
    				/* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
    				return $result;

    			} else{
    				
    				return false;
    			}
    			
    		} else{

    			return false;
    		}
    	}

    	
    }




    public function selectStudentFee($s_id) {
        

      $sql = " SELECT * FROM students INNER JOIN standard on students.stnd_id= standard.stnd_code INNER JOIN payment on students.s_registrationNo = payment.id_student WHERE students.s_registrationNo = '$s_id' ";
      //  echo $sql; // check sql

        if($result = $this->mysqli->query($sql)){

            if($result->num_rows > 0){


                return $result;

            }


        } else{

            return false;
        }
        
    }





//========================= Student Handling end here =======================



//========================= Faculty Hadling Start Here =====================


    public function insertFaculty($f_name, $f_email, $f_phoneNo, $f_dob, $f_sex, $f_experience, $f_pemAddress, $f_pesAddress, $f_qualification, $f_doj) {

    	echo 'inside insertFaculty';

          //  print_r($this->mysqli);

    	

    	$sql = "INSERT INTO faculty (f_name, f_email, f_phoneNo, f_dob, f_sex, f_experience, f_pemAddress, f_pesAddress, f_qualification, f_doj) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    	
    	if($stmt = $this->mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
    		$stmt->bind_param("ssssssssss", $f_name, $f_email, $f_phoneNo, $f_dob, $f_sex, $f_experience, $f_pemAddress, $f_pesAddress, $f_qualification, $f_doj);
    		
    		
    		
            // Attempt to execute the prepared statement
    		if($stmt->execute()){

    			echo 'Success';

    		} else{

    			echo("Error description: " . mysqli_error($this->mysqli));
    		}
    	}

    	
    }  



    public function selectFaculty() {


    	$sql = "SELECT * FROM `faculty`";


    	if($result = $this->mysqli->query($sql)){
    		if($result->num_rows > 0){


    			return $result;

    		}


    	} else{

    		return false;
    	}

    }


//========================= Faculty Hadling Enf Here =====================




//========================= Standard  Hadling start Here =====================





    public function insertStandard() {

    	echo 'inside insertStandard';
    	

    	$sql = "INSERT INTO faculty (f_name) VALUES (?)";

    	
    	if($stmt = $this->mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
    		$stmt->bind_param("s", $f_name);
    		
    		
    		
            // Attempt to execute the prepared statement
    		if($stmt->execute()){

    			echo 'Success';

    		} else{

    			echo("Error description: " . mysqli_error($this->mysqli));
    		}
    	}

    	
    }  
    


    public function viewStandard() {

    	$sql = "SELECT * FROM standard";

    	if (isset($class_id)) {
            # code...

    		echo $sql;
    	}

    	$sql .= "  ";
    	if($result = $this->mysqli->query($sql)){
    		if($result->num_rows > 0){


    			return $result;

    		}


    	} else{

    		return false;
    	}

    }  



//========================= Standard Hadling End Here =====================    



 //========================= Subject  Hadling start Here =====================



    public function viewSubject() {


    	$sql = "SELECT * FROM subject order by sub_name";
    	if($result = $this->mysqli->query($sql)){
    		if($result->num_rows > 0){


    			return $result;

    		}


    	} else{

    		return false;
    	}

    }  


    

 //========================= Subject  Hadling start Here =====================   



//======================== Course handing start here ======================


    
    public function createCourse($stnd_code, $course_name, $subject_id) {

    	
    	
    	$sql = "INSERT INTO course (stnd_code, course_name, subject_id) VALUES (?, ?, ?)";

    	
    	if($stmt = $this->mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
    		$stmt->bind_param("sss", $stnd_code,  $course_name,  $subject_id);   
    		
            // Attempt to execute the prepared statement
    		if($stmt->execute()){

    			return true;

    		} else{

              // echo("Error description: " . mysqli_error($this->mysqli));
    			return false;
    		}
    	}

    	
    }  


    // get all course available 


    public function selectAllCourse($stnd_id= null) {

    	echo $stnd_id; 
      //  $sql = "SELECT * FROM course inner join standard on course.stnd_id = standard.stnd_id inner join subject on course.subject = subject.sub_id";

    	$sql = "SELECT * FROM course inner join standard on course.stnd_id = standard.stnd_id";


    	if($result = $this->mysqli->query($sql)){
    		if($result->num_rows > 0){


    			return $result;

    		}


    	} else{

    		return false;
    	}

    }



    public function getCourseSubjects($stnd_code) {

    	

        //echo $stnd_id;  // cheking parameter is comming or not

       //  $stnd_code = 'SP1012ARTS';

  	$sql = "SELECT * FROM subject INNER JOIN course on course.subject_id = subject.sub_id WHERE course.stnd_code= '$stnd_code'";
    	

       // echo $sql; // check sql

    	if($result = $this->mysqli->query($sql)){

    		if($result->num_rows > 0){


    			return $result;

    		}


    	} else{

    		return false;
    	}

    	
    } 




//======================= Course handling end here ======================= 


//======================= Teaches Handling ==========================




public function checkExits($stnd_code, $subject_id) {

    	
   $sql = "SELECT * FROM teaches WHERE  stnd_code = '$stnd_code' AND  sub_id = '$subject_id' "; // Check entry 


        $result = $this->mysqli->query($sql);

        if (empty($result)) {
            # code...
            return false;
        }

        if (!$result->num_rows == 1) {
            
            return false;
        }

        return true;
}   






public function insertSubjectTeacher($stnd_code, $subject_id, $facultyID) {

	$sql = "INSERT INTO teaches (f_id, stnd_code, sub_id) VALUES ($facultyID, $stnd_code, $subject_id)";

    return  $this->mysqli->query($sql);
}   


public function updateTeacher($stnd_code, $subject_id, $facultyID) {

    $sql = " UPDATE teaches SET f_id = '$facultyID'  WHERE stnd_code = '$stnd_code'  AND   sub_id  = '$subject_id' ";

    return $this->mysqli->query($sql);
}   


public function getSubjectTeacher($stnd_code, $subject_id) {
    # code...

 	$sql = "SELECT faculty.f_id, f_name FROM `teaches` INNER JOIN subject on subject.subjectId = teaches.sub_id INNER JOIN faculty on faculty.f_id = teaches.f_id INNER JOIN class on class.classId = teaches.stnd_code WHERE teaches.stnd_code = '$stnd_code' and teaches.sub_id = '$subject_id'";
	

       // echo $sql; // check sql

	if($result = $this->mysqli->query($sql)){

		if($result->num_rows > 0){


			return  $row = $result->fetch_array(MYSQLI_ASSOC);

		}


	} else{

		return false;
	}   

    // return 'inside getSubjectTeacher';  
	return false;       
}






//======================= Teaches Handling ========================== 


// ======================== fees handling ===================================





public function checkPackage($id_course) {

        
   $sql = "SELECT * FROM package WHERE  id_course = '$id_course'"; // Check entry 


   if($result = $this->mysqli->query($sql)){

        if($result->num_rows === 0){ //  Check number  
            
            return true;     

        }else{

            echo "Same entry already exits";
            

            return false;
        }

    } else{

            echo "Same entry already exits";

        return false;
    } 

}   

    


public function insertFees($id_course, $fee_amount) {     


        if ($this->checkPackage($id_course)) {
            # code...


            $sql = "INSERT INTO package (id_course, fee) VALUES ('$id_course', '$fee_amount')";

            if($this->mysqli->query($sql)===TRUE) {

                echo 'success';

                return true;
                       // Session::put('errorMsg', 'Same entry already exits');   
            }
            else{


                echo "Fail to execute";
                return false;

               // echo("Error description: " . mysqli_error($this->mysqli));
            }
        }
    }
    


    public function getPackage($value='')
    {
        # code...   
        $sql = "SELECT * FROM package inner join standard on stnd_code  = id_course";

        if($result = $this->mysqli->query($sql)){

            if($result->num_rows > 0)  {

                return $result;
            }

        } else{

            return false;
        }
    }



public function getStudentPackage($studentClassID='')
{
    # code...


     $sql = "SELECT * FROM package inner join standard on stnd_code  = id_course WHERE package.id_course = '$studentClassID'";

        if($result = $this->mysqli->query($sql)){

            if($result->num_rows > 0)  {

                return $result;
            }

        } else{

            return false;
        }
}


public function insertStudentFees($sql)
{
  

    return  $this->mysqli->query($sql);
    

}



// ======================= fees handling end =====



}// DB class end here 
