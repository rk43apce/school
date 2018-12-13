<?php
require_once '../core/init.php';


if (Input::exists('post')) {

    if (Token::check(Input::get('token'), 'updateCourse')) {

        $classId = Input::get('classId');
        $subjects = Input::get('subjects');
        
        if(!empty($classId) && !empty($subjects)) {

            $course = new Course();

            $course->updateCorse($classId, $subjects);

            if($course->updateCorse($classId, $subjects)) {    
                
                Session::put('errorMsg', 'Course subject successfully updated!');
                Redirect::to('viewCourse.php?classId='.$classId);  

            } else {

                Session::put('errorMsg', 'Fail to update! try again');
                Redirect::to('editCourse.php?classId='.$classId); 

            }

        } else {

            Redirect::to('manageCourse.php'); 
        }        

    } else {

        Redirect::to('manageCourse.php');
    
    } 

} else {

    Redirect::to('manageCourse.php');

}









?>
