<?php
require_once '../core/init.php';

$course = new Course();

$standard = new Standard();


$classes = $standard->getStandard();

$subjectsData = $standard->getSubject();


if (Input::exists('post')) {


    if (Token::check(Input::get('token'), 'addNewCourse')) {

        $classId = Input::get('classId');  
        $subjects = Input::get('subjects');
        $course->createCourse($subjects, $classId);

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
                    <h2>Create Course</h2>
                    <span class="text-danger">Note: Add subjects for each and every classes</span>         
                    <div class="line"></div>
                    <div class="row">
                        <div class="col-12">
                            <form  action="" method="post"> 
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label">Class</label>
                                    <div class="col-sm-6">
                                        <select name="classId" class="form form-control"  required="">
                                            <option value=""> Select Classs </option>
                                            <?php  
                                            foreach ($classes as $key => $classe) { ?>

                                                <option  value="<?php echo $classe['classId']; ?>"><?php echo escape($classe['className']); ?></option>

                                            <?php  } ?>   
                                        </select>    
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label">Subjects </label>
                                    <div class="col-sm-6">
                                        <select name="subjects[]" class="ui fluid search dropdown" multiple="" required="">
                                            <option value=""> Choose subjects (Mutiple) </option>
                                            <?php  

                                            foreach ($subjectsData as $key => $subject) { ?>

                                            <option  value="<?php echo $subject['subjectId']; ?>"><?php echo escape($subject['subjectName']); ?></option>

                                            <?php  }  ?> 
                                        </select>    
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-6">
                                        <div class="form-group">   
                                            <input type="hidden" name="token" value="<?php echo Token::generate('addNewCourse');?>">                                        
                                            <button type="submit" name="createCourse" value="createCourse" class="btn btn-primary">Create Course</button>
                                        </div> 
                                    </div>
                                </div>  
                            </form>
                        </div>                            
                    </div> 
                </div> 
                <br>
                <br>
                 <div class="card">                 
                    <h2>Available Course</h2>
                          
                    <div class="line"></div>
                    <table id="adminDashboard" class="table table-striped table-bordered">
                        <thead>
                            <tr>                               
                                <th>S.No</th> 
                                <th>Class Name</th>         
                            </tr>
                        </thead>                    
                        <tbody>  
        
                        <?php 

                            $availableCoursesData = $course->availableCourses();

                            $count=1;

                            foreach ($availableCoursesData as $key => $courseData) {                 

                                ?>

                                <tr>                                    
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $courseData['className']; ?></td>                                    
                                </tr>                      
                            <?php

                            $count++;

                            }


                         ?>
                       
                        </tbody> 
                    </table> 

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