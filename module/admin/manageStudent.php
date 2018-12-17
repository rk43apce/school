<?php
    require_once '../core/init.php';
    $login = new Login(); 

    $student = new Student();

    $studentData =  $student->getAllStudent();

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

       
                <?php if (!isset($studentData)) {  ?>

                <div class="container">
                    <div class="alert alert-dismissible alert-warning">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4 class="alert-heading">Warning!</h4>
                    <p class="mb-0">Best check yo self, you're not looking too good. Nulla vitae elit libero, a pharetra augue. Praesent commodo cursus magna, <a href="#" class="alert-link">vel scelerisque nisl consectetur et</a>.</p>
                    </div>
                </div>

                <?php } ?>
         
            
            <div class="container">

                <div class="card">
                    <div class="card-body">
                        <h3>Manage Students</h3>
                                
                        <div class="line"></div>  

                        <table id="adminDashboard" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>S.no</th>                               
                                    <th>Registration No</th>
                                    <th>Name</th>                  
                                    <th>Father name</th>
                                    <th>Email</th>                             
                                    <th>Admission on</th>                            
                                </tr>
                            </thead>                    
                            <tbody>  

                            <?php

                            if ($studentData) {

                                $sno = 1;

                                foreach ($studentData as $key => $student) { ?>

                                <tr>
                                    <td><?php echo escape($sno);?></td>
                                    <td><?php echo escape($student['s_registrationNo']); ?></td>  
                                    <td>
                                        <a class="btn-link" href="./studentAccount.php?studentId=<?php echo escape($student['s_registrationNo']);?>"><?php echo escape($student['s_fullname']); ?></a>
                                    </td>  
                                    <td><?php echo escape($student['s_phoneNo']); ?></td>  
                                    <td><?php echo escape($student['s_email']); ?></td>   
                                    <td><?php echo escape($student['doj']); ?></td>                           
                                </tr>

                                <?php $sno++;   }

                                } else{ ?>

                                <tr><td colspan="7" align="center"><?php echo Session::get('errorMsg');?></td></tr>

                            <?php  }  ?>  

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