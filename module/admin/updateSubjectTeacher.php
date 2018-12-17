<?php
require_once '../core/init.php';

if (Input::exists('post')) {

	$stnd_code = Input::get('stnd_code');  
	$subject_id = Input::get('subject_id');  
	$facultyId = Input::get('facultyId');

	if (!empty($stnd_code) && !empty($subject_id) && !empty($facultyId)) {

		$teaches = new Teaches(); 

		if ($teaches->updateSubjectTeacher($stnd_code, $subject_id, $facultyId)) {
			Redirect::to('manageCourse.php');
		} else {
			Redirect::to('manageCourse.php');
		}
		
	} else {
		Redirect::to('manageCourse.php');
	}  

}

?>