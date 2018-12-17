<?php require_once '../core/init.php';

if (!Input::exists('post')) {

	Redirect::to('dashboard.php');
	exit();
}	

if (Token::check(Input::get('token'), 'updateFaculty')) {	

	$facultyId = Input::get('facultyId');
	$f_name = Input::get('f_name');  
	$f_email = Input::get('f_email');  
	$f_phoneNo = Input::get('f_phoneNo');
	$f_dob = Input::get('f_dob'); 
	$f_sex = Input::get('f_sex');   
	$f_experience= Input::get('f_experience');  
	$f_pesAddress  = Input::get('f_pesAddress'); 
	$f_qualification  = Input::get('f_qualification'); 


	$facultyData = array( "f_name"=>$f_name, "f_email"=>$f_email, "f_phoneNo"=>$f_phoneNo, "f_dob"=>$f_dob, "f_sex"=>$f_sex, "f_experience"=>$f_experience, "f_pesAddress"=>$f_pesAddress, "f_qualification"=>$f_qualification);

	$faculty = new Faculty();

	if ($faculty->updateFacultyProfile($facultyData, $facultyId)) {
		# code...
		Session::put('errorMsg', 'Faculty profile successfully updated!');
		Redirect::to('manageFaculty.php');
		exit();
	} else {

		

		Session::put('errorMsg', 'Faculty profile successfully updated!');
		Redirect::to('edit-faculty.php?facultyId='.$facultyId);

		exit();
	}
		

} else {

	Redirect::to('dashboard.php');
	exit();

}
	
		
			
	
