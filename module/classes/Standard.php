<?php

class Standard  extends Subject {

    private $_db;

    public function __construct($user = null) {
        $this->_db = DB::getInstance();

    }



    public function getStandard()
    {   
    

       $sql = " SELECT * FROM class";

        $result = $this->_db->querySelect($sql);

        if (!$this->_db->isResultCountZero($result)) {

        return  $this->_db->processRowSet($result);

        }  
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