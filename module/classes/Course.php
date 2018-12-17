<?php

class Course  {

    public $db;

    public $facultyData;



    function __construct()
    {
        $this->db = new Database();
    }


    public  function createCourse($subjects, $classId)
    {   



      $adminId =  Session::get('user_id');

       foreach ($subjects as $column => $subject) {

             $sql = "INSERT INTO course (classId, subjectId, admin_Id) values ('$classId', '$subject', '$adminId')";               

             if (!$this->db->queryInset($sql)) {
                 
                 return false;
             }           
        }  

        return true;
    }




     public function availableCourses()
    {   
        $adminId =  Session::get('user_id');

        $sql = " SELECT course.classId, class.className FROM course INNER join(class) on class.classId = course.classId WHERE admin_Id = '$adminId' GROUP by course.classId";

        $result = $this->db->querySelect($sql);

        if (empty($result)) {
           
           return false;
        }

        if ($this->db->checkResultCountZero($result)) {

            return false;

        }  

        return  $this->db->processRowSet($result);

    }


     public function getCourseSubjects($classId)
    {   

      $adminId =  Session::get('user_id');

    $sql = " SELECT * FROM course INNER JOIN subject ON subject.subjectId = course.subjectId WHERE classId = '$classId' AND isSubjectDrop ='No'  and admin_Id = '$adminId'";

    $result = $this->db->querySelect($sql);

    if (empty($result)) {
        # code...
        return false;
    }

    if ($this->db->checkResultCountZero($result)) {

        return false;

    }  

    return  $this->db->processRowSet($result);

    }


    public function getClassById($classId)
    {   


        $sql = " SELECT * FROM class  WHERE classId = '$classId' ";

        $result = $this->db->querySelect($sql);

        if ($this->db->isResultCountOne($result)) {

        return  $this->db->processRowSet($result, true);

        }  

    }



    public function updateCorse($classId, $subjects)
    {	
            

        if($courseSubjects = $this->getCourseSubjects($classId)){

            $arrayCourseSubjects = array();
        
            foreach ($courseSubjects as $key => $value) {
        
                array_push($arrayCourseSubjects, $value['subjectId']);
                
            }
        
        }  

        
        echo    $sql  = "UPDATE `course` SET `isSubjectDrop` = 'Yes', dropOn = NOW() WHERE subjectId NOT IN ( '" . implode( "', '" , $subjects ) . "' ) AND classId = '$classId' ";


        // var_dmp($this->db->queryUpdate($sql));

            if (!$this->db->queryUpdate($sql)) {

            return false;	
        }


        $arrayNewSubjects = array_diff($subjects, $arrayCourseSubjects);


        if ($arrayNewSubjects) {			

            $arrayNewSubjects = array_diff($subjects, $arrayCourseSubjects);

            foreach ($arrayNewSubjects as $column => $newSubjects) {

                $adminId =  Session::get('user_id');
                
                $sql = "INSERT INTO course (classId, subjectId, admin_Id, createdOn) values ('$classId', '$newSubjects', $adminId,  NOW())";                

                // var_dump($this->db->queryInset($sql));

                if (!$this->db->queryInset($sql)) {

                    return false;
                }
                
            }

            return true;
        }

        return true;

    }
    



}