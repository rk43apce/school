	
<?php
error_reporting(E_ALL); 
 ini_set('display_errors', 1);


require_once '../core/init.php';


if (Input::exists('post')) {

    
    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";





    $stnd_code = Input::get('stnd_code');  
    $subject_id = Input::get('subject_id');  
    $facultyID = Input::get('facultyID');
    

    $teaches = new Teaches(); //Current


    $resultteaches =   $teaches->addSubjectTeacher($stnd_code, $subject_id, $facultyID);

    var_dump($resultteaches);



			if(Session::exists('errorMsg')) {
			echo '<p>' . Session::flash('errorMsg'). '</p>';
}






}

?>