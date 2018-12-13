<?php

class Subject { 

    private $_db;

        public function __construct($user = null) {
        $this->_db = DB::getInstance();

    }


    public function getSubject()
    {   


        $sql = " SELECT * FROM subject";

        $result = $this->_db->querySelect($sql);

        if (!$this->_db->isResultCountZero($result)) {

        return  $this->_db->processRowSet($result);

        }  

    }

}