<?php

require_once '../core/init.php';


if(!Input::exists('get')) {

    Redirect::to('manageCourse.php');

    die();
}


$classId = Input::get('classId');

   
$course = new Course();

$classes =    $course->getClassById($classId);

if($courseSubjects = $course->getCourseSubjects($classId)){



}   

?>


<!DOCTYPE html>
<html>

<head>

<?php include './include/cssLink.php' ?>

</head>

<body>

    <div class="wrapper">
        <!-- Sidebar Holder -->
        <?php include './include/defaultNavbar.php';?>

        <!-- Page Content Holder -->
        <div id="content">

            <!-- topnavbar Holder -->
           <?php include './include/topNavbar.php';?>
            
            <div class="container">
                <div class="card">
                 
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item "><?php echo $classes['className']; ?></li>  
                        <li class="breadcrumb-item active">Subjects</li> 
                        <li class="breadcrumb-item "><a href="./editCourse.php?classId=<?php echo $classId; ?>" class="btn-link"> Edit Course </a></li> 
                    </ol>
                              
                    <div class="line"></div>  
                      
                    <table id="" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>S.No</th>    
                                <th>Subject</th>                                
                             
                            </tr>
                        </thead>                    
                        <tbody>       


                            <?php  

                            $serialNo = 1;

                            foreach ($courseSubjects as $key => $subject) { ?>

                            <tr>
                            <td><?php echo $serialNo;?></td>
                            <td><?php echo $subject['subjectName'];?></td>
                                                                                  
                            </tr>

                            <?php  $serialNo++;  }  ?>     



                         
                        </tbody> 
                    </table> 

                </div> 
            </div>
        </div>
    </div>

    <?php include  './include/footer.php' ?>   

</body>

</html>