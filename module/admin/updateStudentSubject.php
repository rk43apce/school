	<?php
	require_once '../core/init.php';

	if (Input::exists('post')) {

	if (Token::check(Input::get('token'), 'updateStudentSubject')) {


	$studentId = Input::get('studentId');
	$subjects = Input::get('subjects');

	if(!empty($studentId) && !empty($subjects) ) {

		$student = new Student();

	if($student->updateStudnetSubject($studentId, $subjects)) {

	Redirect::to('studentAccount.php?studentId='.$studentId);

	} else {

	Redirect::to('editStudentsubjects.php?studentId='.$studentId);

	}

	}

	} else {

	Redirect::to('manageStudent.php');

	} 

	} else {

	Redirect::to('manageStudent.php');

	}
