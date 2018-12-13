<?php 


// need to work on this file


// if (Input::exists('post')) {


//     $s_registrationNo = escape(Input::get('studentId')); 
//     $s_fullname = escape(Input::get('s_fullname'));  
//     $s_fatherName = escape(Input::get('s_fatherName')); 
//     $s_motherName = escape(Input::get('s_motherName'));  
//     $s_dob  = escape(Input::get('s_dob')); 
//     $s_sex= escape(Input::get('s_sex'));  
//     $s_email = escape(Input::get('s_email'));     
//     $s_phoneNo = escape(Input::get('s_phoneNo')); 
//     $s_address = escape(Input::get('s_address'));  



//     $studentData = array("s_registrationNo"=>$s_registrationNo, "s_fullname"=>$s_fullname, "s_fatherName"=>$s_fatherName, "s_motherName"=>$s_motherName, "s_dob"=>$s_dob, "s_sex"=>$s_sex, "s_email"=>$s_email, "s_phoneNo"=>$s_phoneNo, "s_email"=>$s_email, "s_address"=>$s_address);



//     if ($student->updateStudentProfile($studentData, $s_registrationNo)) {

//         $isUpdateStudentProfile = true;

//         Session::put('errorMsg', 'Student profile successfully updated!' );

//     }
//     else {


//         Session::put('errorMsg', 'Sorry, Fail to update!' );
//     }


// }