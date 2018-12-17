<?php

require_once '../core/init.php';

if(!Input::exists('get')) {

    Redirect::to('manageCourse.php');

    die();
}


$classId = Input::get('classId');
$studentId = Input::get('studentId');

$standard = new Standard();

$allSubjectsData = $standard->getSubject(); // getting all subject list 

$course = new Course();

$classes =  $course->getClassById($classId);

if($courseSubjects = $course->getCourseSubjects($classId)){

    $arrayCourseSubjects = array();

    foreach ($courseSubjects as $key => $value) {

        array_push($arrayCourseSubjects, $value['subjectId']);
        
    }

}   

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/semantic.min.css"/>
    <?php include './include/cssLink.php';?>
</head>
<body>
    <div class="wrapper">
        <?php include './include/defaultNavbar.php';?>
        <div id="content">
            <?php include './include/topNavbar.php';?>
            <div class="container">
                <div class="card">

                    <ol class="breadcrumb">
                        <li class="breadcrumb-item ">Course</li> 
                        <li class="breadcrumb-item "><?php echo $classes['className']; ?></li> 
                        <li class="breadcrumb-item ">Subjects</li>
                        <li class="breadcrumb-item ">Edit Subjects</li>
                        <li class="breadcrumb-item "></li>  
                    </ol> 

                    <div class="line"></div>
                    <div class="row">
                        <div class="col-12">
                            <form  action="./addStudentSubjects.php" method="post"> 
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label">Class</label>
                                    <div class="col-sm-6">

                                        <input type="text" class="from  form-control" value="<?php echo $classes['className']; ?>" disabled="">   
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label">Subjects </label>
                                   
                                    <div class="col-sm-6">
                                        <select name="subjects[]" class="ui fluid search dropdown" multiple="" required="">
                                            <option value=""> Choose subjects (Mutiple) </option>
                                            <?php  foreach ($allSubjectsData as $key => $subject) { ?>

                                                <option  value="<?php echo $subject['subjectId']; ?>"

                                                <?php if (!empty($arrayCourseSubjects)) {
                                                    echo  (in_array($subject['subjectId'], $arrayCourseSubjects)) ? "selected" : "" ;
                                                } ?>

                                                >
                                                <?php echo escape($subject['subjectName']); ?>

                                                </option>

                                            <?php  }  ?> 
                                        </select>    
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-6">
                                        <div class="form-group">   
                                             <input type="hidden" name="token" value="<?php echo Token::generate('addNewCourse');?>">  
                                            <input type="hidden" name="studentId" value="<?php echo $studentId;?>">
                                            <button class="btn btn-primary" type="submit">Save student subject</button>
                                        </div> 
                                    </div>
                                </div>  
                            </form>
                        </div>                            
                    </div> 
                </div> 
            </div>
        </div>
    </div>

    <?php include 'include/footer.php'?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/semantic.min.js"></script>
    <script>
        $('.ui.dropdown')
        .dropdown();
    </script>
</body>
</html>