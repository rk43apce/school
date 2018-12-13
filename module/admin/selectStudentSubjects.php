
<?php


require_once '../core/init.php';




if(Input::exists('post')) {
        # code...

    $studentAdmission =  new Admission();

    $studentId = Input::get('studentId');
    $subjects = Input::get('subjects');


    foreach ($subjects as $subject_id) {
            
       
        $isStudentSubjectInfoAdd =  $studentAdmission->studentSubject($studentId, $subject_id);

    }


    if ($isStudentSubjectInfoAdd) {
        


        Redirect::to('studentAccount.php?studentId='.$studentId);

    }


}   


if(!Input::exists('get')) {

    Redirect::to('manageCourse.php');

    die();
}


    $classId = Input::get('classId');

    $studentId = Input::get('studentId');

       
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
                    <h5><?php echo $classes['className']; ?></h5> 
                    <span><a href="./editCourse" class="btn btn-link"> Edit Course </a></span>
                              
                    <div class="line"></div>  

                    <form action="" method="post">                         
                        <span class="btn btn-info float-right"  id="selectAll">Select all </span>  
                        <table id="subjecTable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S.No</th>    
                                    <th>Subject</th>                                
                                     <th>Choose Subjects</th> 
                                </tr>
                            </thead>                    
                            <tbody>    

                                <?php  

                                $serialNo = 1;

                                foreach ($courseSubjects as $key => $subject) { ?>

                                <tr>
                                <td><?php echo $serialNo;?></td>
                                <td><?php echo $subject['subjectName'];?></td>
                                 <td><input type="checkbox" name="subjects[]" value="<?php echo $subject['subjectId'];?>"></td>
                                                                                      
                                </tr>

                                <?php  $serialNo++;  }  ?>     
                            </tbody> 
                        </table> 

                        <input type="hidden" name="studentId" value="<?php echo $studentId;?>">

                        <button class="btn btn-primary" type="submit">Save & Next</button>

                    </form>
                         

                </div> 
            </div>
        </div>
    </div>

    <?php include  './include/footer.php' ?>   


    <script type="text/javascript">
        
        $(document).ready(function () { 
            var oTable = $('#subjecTable').dataTable({
            stateSave: true
            });

            var allPages = oTable.fnGetNodes();

            $('body').on('click', '#selectAll', function () {


                if ($(this).hasClass('allChecked')) {
                    $('input[type="checkbox"]', allPages).prop('checked', false);
                } else {
                    $('input[type="checkbox"]', allPages).prop('checked', true);
                }
                $(this).toggleClass('allChecked');
            })
        });

        $("#selectSubjectForm").submit(function(){

            var checked = $(" input:checked").length > 0;

            if (!checked){

                alert("Please select at least one subject");

                return false;

            } else {

                return confirm('Are you sure you want to save this thing into the database?');

            }
        });

    </script>

</body>

</html>