<?php

require_once '../core/init.php';

if(!Input::exists('get')) {

    Redirect::to('dashboard.php');

    die();
}

if (empty(Input::get('studentId'))) {

    Redirect::to('dashboard.php');

    die(); 
} 

$studentId = Input::get('studentId');   

$student = new Student();

if ($studentData = $student->getStudentAccountById($studentId)) {
    # code...
    $studentSubjectDaTa = $student->getStudentSubject($studentId);

    $studentId = $studentData['s_registrationNo'];                
    $s_fullname = $studentData['s_fullname'];
    $s_fatherName = $studentData['s_fatherName'];
    $s_motherName = $studentData['s_motherName'];
    $s_email = $studentData['s_email'];        
    $netFees = $studentData['netFees'];
    $classId = $studentData['classId'];
    $className = $studentData['className'];
    $s_phoneNo = $studentData['s_phoneNo'];

} else {

    Session::put('errorMsg', 'Sorry! No record found');
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

            <!-- Url error request handling -->

              <?php if (empty($studentData)) {  ?>

                <div class="container">
                    <div class="alert alert-dismissible alert-warning">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <h4 class="alert-heading"><?php echo Session::flash('errorMsg');  ?>!</h4>
                    </div>
                </div>

                <?php die(); } ?>
            <!-- Url error  request handling end here -->

            <div class="container">


                <div class="card">

                    <!-- <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="btn-link" href="./manageStudent.php">Students</a></li>
                        <li class="breadcrumb-item"> <?php // echo $s_fullname; ?></li>

                        <li class="breadcrumb-item active"><a class="btn-link" href="./updateStudentProfile.php?studentId=<?php // echo $studentId;?>"> Profile</a></li>
                        <li class="breadcrumb-item text-success"><?php // echo (Session::exists('errorMsg')?  Session::flash('errorMsg') : "") ?></li>
                    </ol> -->

                    <div class="card-body">
                        <h3><?php echo $s_fullname; ?></h3>                      
                         <p>Personal Details <a class="btn-link" href="./updateStudentProfile.php?studentId=<?php  echo $studentId;?>"> Profile</a></p>
                           <div class="line"></div>  
                        <table  class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Admission No</th>
                                    <th>Name</th>
                                    <th>Father Name</th>                                
                                    <th>Phone</th>
                                    <th>Class</th>                                                                                     
                                </tr>
                            </thead>                    
                            <tbody> 
                                <?php if ($studentData) { ?>  
                                    <tr>
                                        <td><?php echo $studentId; ?></td>
                                        <td><?php echo $s_fullname; ?></td>                            
                                        <td><?php echo $s_fatherName; ?></td>                                   
                                        <td><?php echo $s_phoneNo; ?></td>
                                        <td><?php echo $className; ?></td>
                                    </tr>
                                <?php  } else { ?>
                                    <tr>
                                        <td colspan="5">
                                            <?php echo Session::get('noStudentRecord'); ?>
                                        </td>
                                    </tr> 
                                <?php } ?>    
                            </tbody> 
                        </table> 

                                           
                        
                         <p>Subject Details
                            <?php 

                            if (!empty($studentSubjectDaTa)) {
                               ?>

                                <span><a class="btn-link" href="editStudentsubjects.php?studentId=<?php echo $studentId; ?>">Edit Subject</a></span>
                               <?php
                            }

                            ?>
                           

                        </p>

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

                                    if ($studentSubjectDaTa) {

                                        $sno = 1;
                                        foreach ($studentSubjectDaTa as $key => $subject) { ?>
                                        <tr>
                                            <td><?php echo escape($sno); ?></td>  
                                            <td><?php echo $subject['subjectName']; ?></td>              
                                        </tr>
                                        <?php  $sno++; } 
                                    } else { ?>

                                        <tr>
                                            <td colspan="2" align="center"> 

                                            Subject record not  found
                                            <br>
                                             <a class="btn-link" href="./selectStudentSubjects.php?studentId=<?php echo $studentId; ?>&classId=<?php echo $classId; ?>">Click here to add subjects</a>

                                            </td>
                                        </tr>

                                        <?php } ?>     
                                </tbody> 
                            </table> 
                        </div> 
                    </div>               
                </div>  
            </div>
        </div>


<?php include './include/footer.php' ?>

</body>

</html>         