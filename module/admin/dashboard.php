<?php
require_once '../core/init.php';

Login::isUserLogIn('admin');

$student = new Student();

if (!$studentData =  $student->getAllStudent()) {
   
   Session::put('errorMsg', 'No record foudn!');
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
                            		# code...
                            	

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

                            } else {

                            	?>	
                            	<tr>
                            		<td colspan="6" align="center"> No Record found! </td>
                            	</tr>
                            	

                            	<?php
                            	}

                               ?>  

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