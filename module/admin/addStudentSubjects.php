<?php

require_once '../core/init.php';

if(Input::exists('post')) {


    if (Token::check(Input::get('token'), 'addNewCourse')) {


    // if (empty($studentId)) {
    //     # code...
    //     Redirect::to('dashboard.php');
    //     die();
    // }
    //  if (empty($subjects)) {
    //     # code...
    //      Redirect::to('dashboard.php');
    //     die();
    // }



    $studentId = Input::get('studentId');



    $subjects = Input::get('subjects');


        $studentAdmission =  new Admission();

        foreach ($subjects as $subject_id) {


            $isStudentSubjectInfoAdd =  $studentAdmission->studentSubject($studentId, $subject_id);

        }
        if ($isStudentSubjectInfoAdd) {

            Redirect::to('studentAccount.php?studentId='.$studentId);
        }


    }   
}   



?>