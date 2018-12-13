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

        $sql = "INSERT INTO faculty ($columns) values ($values)";

        return $this->db->queryInset($sql);

    }

    public  function getAllFaculty()
    {

        $sql = "SELECT * FROM faculty";

        $result =  $this->db->querySelect($sql);

        if ($this->db->checkResultCountZero($result)) {
            
            return false;
        } 

        return $this->db->processRowSet($result);
    }


}