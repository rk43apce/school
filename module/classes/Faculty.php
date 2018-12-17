<?php


class Faculty {

    public $db;

    public $facultyData;

    function __construct()
    {
        $this->db = new Database();
    }


    public  function addFaculty()
    {
        $columns = "";
        $values = "";
        foreach ( $this->facultyData as $column => $value) {
        $columns .= ($columns == "") ? "" : ", ";
        $columns .= $column;
        $values .= ($values == "") ? "" : ", ";
        $values .= "'" . $value . "'";
        }

        echo   $sql = "INSERT INTO faculty ($columns) values ($values)";

        return $this->db->queryInset($sql);

    }


    public  function updateFacultyProfile($facultyData, $facultyId)
    {   

        $id_admin  = Session::get('user_id');

        $out = array();
        foreach ($facultyData as $column => $value) {

            array_push($out, "$column='$value'");
        }

        $set = implode(', ', $out);

        $sql = "UPDATE faculty SET $set where f_id = '$facultyId' and id_admin = '$id_admin' "; 

        if (!$this->db->queryUpdate($sql)) {

            return false;
        }   
        return true;
    }


    public  function getAllFaculty()
    {

        $admin_Id = Session::get('user_id');

        $sql = "SELECT * FROM faculty where id_admin =  '$admin_Id'";

        $result =  $this->db->querySelect($sql);

        if ($this->db->checkResultCountZero($result)) {

        return false;
        } 

        return $this->db->processRowSet($result);
    
    }


    public  function viewFaculty()
    {

        $admin_Id = Session::get('user_id');

        $sql = "SELECT f_id, f_name FROM faculty where id_admin =  '$admin_Id'";

        $result =  $this->db->querySelect($sql);

        if ($this->db->checkResultCountZero($result)) {

        return false;
        } 

        return $this->db->processRowSet($result);
    
    }
    




    public  function getFacultyById($facultyId)
    {

        $admin_Id = Session::get('user_id');

        $sql = "SELECT * FROM faculty where  f_id = '$facultyId' AND id_admin =  '$admin_Id'";

        $result =  $this->db->querySelect($sql);

        if (empty($result)) {
            # code...
            return false;
        }

        if (!$this->db->isResultCountOne($result)) {

            return false;
        } 

        return $this->db->processRowSet($result, true);
    }

}