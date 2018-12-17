<?php
error_reporting(E_ALL); 
ini_set('display_errors', 1);

require_once '../core/init.php';

if (Input::exists('post')) {

	$stnd_code = Input::get('stnd_code');  
	$subject_id = Input::get('subject_id');  
	$facultyId = Input::get('facultyId');


if (!empty($stnd_code) && !empty($subject_id) && !empty($facultyId)) {
	
	$teaches = new Teaches(); 


	if ($teaches->addSubjectTeacher($stnd_code, $subject_id, $facultyId)) {

	Redirect::to('manageCourse.php');

	} else {

	Redirect::to('viewCourse.php?classId='.$stnd_code);

	}
} else {

	Redirect::to('manageCourse.php');
}


}
