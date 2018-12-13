
<?php
error_reporting(E_ALL); 
 ini_set('display_errors', 1);

require_once '../core/init.php';

 
 if (!Session::exists('isStudentOnboardingStepOne')) {
        # code...
        Redirect::to('./dashboard.php');
    }   

if(Input::exists('post')) {
        # code...

    $studentAdmission =  new Admission();

    $student_Id = Input::get('student_Id');
    $subjects = Input::get('subjects');




    $isStudentSubjectInfoAdd = false;

    foreach ($subjects as $subject_id) {
            
       
        $isStudentSubjectInfoAdd =  $studentAdmission->studentSubject($student_Id, $subject_id);

    }


    if ($isStudentSubjectInfoAdd) {
        # code...

         Session::put('isStudentOnboardingStepTwo', true);  

        Redirect::to('studentDetails.php?id='.$student_Id);

    }


    exit();

    }   



if(Input::exists('get')) {

    $student_Id = Input::get('id');

    $stnd_id = Input::get('CouseID');
       
    $course = new Course();

    if(!$result = $course->viewCourseSubjects($stnd_id)){



    }
      
}else{

    
    Redirect::to('manageCourse.php');
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>View Course Subjects | Admin</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <!-- Font Awesome JS -->


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
                    <h2>Class / Subjects</h2>         
                    <div class="line"></div>  

                    <form method="post" action="" id="selectSubjectForm">   
                 

                      <span class="btn btn-info float-right"  id="selectAll">Select all </span>  

                    <table id="adminDashboard" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>S.No</th>    
                                <th>Subject</th>                                
                                <th >Choose subjects</th> 
                            </tr>
                        </thead>                    
                        <tbody>     
                       
               

                            <?php

                            $sno = 1;

                             while($row = $result->fetch_array()){

                                ?>

                                <tr>
                                    <td><?php echo escape($sno); ?></td>                                                      
                                    <td><?php echo escape($row['sub_name']); ?></td>   
                                    <td><input type="checkbox" name="subjects[]" value="<?php echo escape($row['sub_id']); ?>"></td>
                                </tr>
                                <?php

                                $sno++;
                                }

                            ?> 

                            
                            
                        </tbody> 
                    </table> 

                            <input type="hidden" name="student_Id" value="<?php echo $student_Id; ?>">
                            
                            <button class="btn btn-primary" type="submit">Save & Next</button>

                        </form> 
                </div> 
            </div>
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="../js/bootstrap.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


    <script type="text/javascript">
        
        $(document).ready(function () { 
            var oTable = $('#adminDashboard').dataTable({
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