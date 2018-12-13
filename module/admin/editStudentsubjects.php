<?php

    require_once '../core/init.php';

    if(Input::exists('get')) {


        $studentId = Input::get('studentId');     

        $student = new Student();
    
        $result = $student->getStudentSubject($studentId);
    
        $arrayCourseSubjects = array();
    
        foreach ($result as $key => $value) {
    
            array_push($arrayCourseSubjects, $value['subjectId']);    
        }
    
        $standard = new Standard();
    
        $allSubjectsData = $standard->getSubject(); // getting all subject list
  
    } else {

        Redirect::to('./dashboard.php');    
        die();   

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
<!-- Sidebar Holder -->
<?php include './include/defaultNavbar.php';?>
<!-- Page Content Holder -->
<div id="content">

<?php include './include/topNavbar.php';?>

<div class="container">
    <div class="card">       
        <div class="line"></div>  
        <form method="post" action="./updateStudentSubject.php" >  

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-3 col-form-label">Subjects </label>
                <div class="col-sm-6">
                    <select name="subjects[]" class="ui fluid search dropdown" multiple="" required="">

                        <option value=""> Choose subjects (Mutiple) </option>

                        <?php  foreach ($allSubjectsData as $key => $subject) { ?>

                        <option  value="<?php echo $subject['subjectId']; ?>" 

                        <?php echo  (in_array($subject['subjectId'], $arrayCourseSubjects)) ? "selected" : "" ; ?> >
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
                        <input type="hidden"  name="studentId" value="<?php echo $studentId ?>" >   
                        <input type="hidden" name="token" value="<?php echo Token::generate('updateStudentSubject');?>">                                        
                        <button type="submit" name="updateStudentSubject" value="updateStudentSubject" class="btn btn-primary">Update Course Subject</button>
                    </div> 
                </div>
            </div>    
        </form> 
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
