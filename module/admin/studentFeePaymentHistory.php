
<?php

require_once '../core/init.php';

$isUpdateStudentProfile = false;

$login = new Login();   

(!$login->isUserLogIn('admin'))? Redirect::to("http://" . $_SERVER['SERVER_NAME']) : "";


$student = new Student();

if (Input::exists('post')) {



}   elseif (Input::exists('get')) {
    # code...

    $studentID = Input::get('studentID');
    
   if(!$resultStudentFeePaymentHistory = $student->getStudentFeePaymentHistory($studentID)) {

        Session::put('paymentError',  'Sorry, No payment record found');
                
    }

}   else {

    Redirect::to('./dashboard.php');
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
                <div  class="row">
                    <div class="col-md-12">
                        <div class="card "> 
                            <div class="card-header">
                       
                                <a class="btn  btn-outline-secondary" href="updateStudentProfile.php?studentID=<?php echo $studentID  ?>">Studnet Profile</a>
                                <a class="btn  btn-outline-secondary" href="updateStudentSubject.php?studentID=<?php echo $studentID  ?>">Course</a>
                                <a class="btn  btn-outline-secondary" href="studentFeePaymentHistory.php?studentID=<?php echo $studentID  ?>">Fee Payments</a>
                             
                            </div> 
                           <div class="line"></div>
                            
                    <table id="adminDashboard" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>S.No</th>    
                                <th>Amount</th>                                
                                <th>Payment</th> 
                            </tr>
                        </thead>                    
                        <tbody>     




                             <?php  

                             if ($resultStudentFeePaymentHistory) {
                                 # code...

                                  $sno = 1;
                                             
                                 foreach ($resultStudentFeePaymentHistory as $key => $payment) { ?>
                                        
                                    <tr>
                                        <td><?php echo escape($sno); ?></td>  
                                        <td><?php echo $payment['amount']; ?></td>  
                                        <td><?php echo $payment['pay_on']; ?></td>                        
                                    </tr>



                            <?php  $sno++; }
                             } else {

                                ?>
                                      <tr>
                            <td colspan="3" align="center"><?php echo Session::get('paymentError'); ?></td>  
                                                  
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
        </div>
    </div>


    <?php include 'include/footer.php'?>
   
   <script type="text/javascript">
       
        function confirmFormSubmit() {

            return confirm('Are you sure you want to save this thing into the database?');

        }

   </script>
    

</body>

</html>