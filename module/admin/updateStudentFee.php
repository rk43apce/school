
<?php

require_once '../core/init.php';

$isUpdateStudentProfile = false;

$login = new Login();   

(!$login->isUserLogIn('admin'))? Redirect::to("http://" . $_SERVER['SERVER_NAME']) : "";


$student = new Student();

if (Input::exists('post')) {



}   elseif (Input::exists('get')) {
    # code...
    
   if($result = $student->getStudentFeePaymentHistory(Input::get('studentID'))) {
 

                
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
                            <h3>Fee recieved  </h3> 
                           <div class="line"></div>
                            
                                <table id="adminDashboard" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>    
                                            <th>Amount</th>                                
                                            <th >Payment date</th> 
                                        </tr>
                                    </thead>                    
                                    <tbody>     

                                         <?php  

                                            $sno = 1;
                                                         
                                             foreach ($result as $key => $value) { ?>
                                                    
                                                <tr>
                                                    <td><?php echo escape($sno); ?></td>  
                                                    <td><?php echo $value['amount']; ?></td>  
                                                    <td><?php echo $value['pay_on']; ?></td>                        
                                                </tr>
                                        <?php  $sno++; }    ?>
                                        
                                        
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