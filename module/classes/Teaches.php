<?php

class Teaches {

    private $_db;
    public function __construct($user = null) {
        $this->_db = DB::getInstance();
    }

    public function addSubjectTeacher($stnd_code, $subject_id, $facultyId) {

        $result =  $this->_db->insertSubjectTeacher($stnd_code, $subject_id, $facultyId);
    }


    public function updateSubjectTeacher($stnd_code, $subject_id, $facultyId) {

        $result =  $this->_db->updateTeacher($stnd_code, $subject_id, $facultyId);
    }

    public function exits($stnd_code, $subject_id) {

        $result =  $this->_db->checkExits($stnd_code, $subject_id);

        return $result;

    }

    public function subjectTeacher($stnd_code, $subject_id)
    {
        $result =  $this->_db->getSubjectTeacher($stnd_code, $subject_id);
// return  $result;
        return $result;      
    }



}