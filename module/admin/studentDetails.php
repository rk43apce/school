
<?php

require_once '../core/init.php';


// if (!Session::exists('isStudentOnboardingStepTwo')) {
//         # code...
//         Redirect::to('./dashboard.php');
//     }  

$student = new Student();


if(Input::exists('get')) {


   if($result = $student->get(Input::get('id'))){

        $row = $result->fetch_array();  

        $s_id = $row['s_registrationNo'];                
        $s_fullname = $row['s_fullname'];
        $s_fatherName = $row['s_fatherName'];
        $s_motherName = $row['s_motherName'];
        $s_email = $row['s_email'];
        $stnd_code = $row['stnd_code'];
        $netFees = $row['netFees'];
        $stnd_name = $row['stnd_name'];
        $stnd_name = $row['stnd_name'];
        $s_phoneNo = $row['s_phoneNo'];
        // $fee = $row['fee'];
        // $amount = $row['amount'];

        // $id_payment = $row['id_payment'];

        // $pay_on = $row['pay_on'];
        
    }
       

}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Dashboard | Admin</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../css/dashboard.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"></script>


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
                    <h3>Account Details </h3>
                    <div class="line"></div>  

                    <h5 class="card-header">Student Details 
                    <a class="btn btn-link" href="./updateStudentProfile.php?studentID=<?php echo Input::get('id');?>">Edit </a></h5>
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

                                <tr>
                                   <td><?php echo $s_id; ?></td>
                                    <td><?php echo $s_fullname; ?></td>                            
                                    <td><?php echo $s_fatherName; ?></td>                                   
                                    <td><?php echo $s_phoneNo; ?></td>
                                    <td><?php echo $stnd_name; ?></td>
                                    
                                </tr>
                      
                        </tbody> 
                    </table> 

                </div> 
         <!-- 
                <div class="card">             

                    <h5 class="card-header">Fee Details</h5>
                    <table class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                                  
                                <th>Actual Fee</th>
                                <th>Concession Fee</th>
                                <th>Net Fee</th>                                
                                <th>Paid Amount</th>
                                <th>Due Amount  </th>                                                                                     
                            </tr>
                        </thead>                    
                        <tbody>  

                                <tr>
                                   <td><?php //echo $fee;?></td>
                                    <td>0</td>                            
                                    <td><?php //echo $fee;?></td>                                   
                                    <td><?php //echo  (!empty($amount))   ? $amount: "0";?></td>
                                    <td><?php //echo ($fee - $amount) ;?>  </td>
                                    
                                </tr>
                      
                        </tbody> 
                    </table> 

                </div> -->
                <!-- <div class="card">             

                    <h5 class="card-header">Payment Details</h5>
                    <table class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                                  
                                <th>Sl.No</th>
                                <th>Reciept ID</th>
                                <th>Paid Amount</th>                                
                                <th>Pay Date</th>
                                <th>Invoice </th>                                                                                     
                            </tr>
                        </thead>                    
                        <tbody>  

                                <tr>

                                    <?php 

                                    if ($id_payment) {
                                        # code...
                                             ?>

                                          <td>1</td>
                                    <td><?php echo $id_payment;?></td>                            
                                    <td><?php echo $amount;?></td>                                   
                                    <td><?php echo $pay_on;?></td>
                                    <td><a class="btn btn-link" href="./invoice.php?StudentID=<?php echo $s_id; ?>" > Generate Invoice</a>  </td>

                                          <?php 
                                    }
                                    else{
                                        ?>
                                        <td colspan="5">

                                            <p class="text-center text-danger">Still Now! This Student Not Paid Any Fee..</p>

                                        </td>

                                        <?php 
                                    }

                                     ?>

                                 
                                    
                                </tr>
                      
                        </tbody> 
                    </table> 

                </div> -->
                <div class="card">             

                    <h5 class="card-header">Pay Here...!</h5>
  
                        <div class="card-body">
     
                            <form action="./pay.php" method="get"> 
                                
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label" >Fee amount</label>
                                    <div class="col-sm-10">
                                         <input type="hidden" class="form-control"  name="studentID" value="<?php echo $s_id; ?>">
                                        <input type="text" class="form-control" id="netFeeAmount" name="netFeeAmount" value="<?php echo $netFees;?>" disabled="">
                                       
                                    </div>
                                </div>                         
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label"> </label>
                                    <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary btn-md">Pay Now </button>
                                   
                                        <a class="btn btn-link" href="./studentAccount.php?id=<?php echo $s_id; ?>">Pay Later</a>
                                    </div>
                                </div> 
                            </form>
                      
                        </div>

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
    <script type="text/javascript" src="../js/dashboard.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            var bla = $('#dueamount').val();
          
        if(bla == 0) {

           $(':input[type="submit"]').prop('disabled', true);
        }
 });
    </script>
</body>

</html>         