<?php
class Invoice {

    private $_db;

    public function __construct($user = null) {
    $this->_db = DB::getInstance();

    }


    public function generateStudentFeeInvoice($paymentID)
    {


      $sql = "SELECT * FROM payment INNER JOIN students on students.s_registrationNo= payment.id_student WHERE id_payment = '$paymentID' ORDER BY id_payment DESC LIMIT 1";

            $result = $this->_db->querySelect($sql);

            if ($this->_db->isResultCountOne($result)) {

            return  $this->_db->processRowSet($result, true);

        } 

        return  false;       

    }



}