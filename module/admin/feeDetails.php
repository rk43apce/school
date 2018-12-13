
<?php
error_reporting(E_ALL); 
 ini_set('display_errors', 1);

require_once '../core/init.php';

//$user = new User(); //Current

//if($user->isLoggedIn()) {
  


//} else {
   // echo '<p>You need to <a href="login.php">login</a> or <a href="register.php">register.</a></p>';
//}

// getting student profile details

$student = new Student();


if(Input::exists('get')) {


   if($result = $student->get(Input::get('id'))){

        $row = $result->fetch_array();

            $s_id = $row['s_id'];                
            $s_fullname = $row['s_fullname'];
            $s_fatherName = $row['s_fatherName'];
            $s_motherName = $row['s_motherName'];
            $s_email = $row['s_email'];
            $stnd_id = $row['stnd_id'];
            $s_phoneNo = $row['s_phoneNo'];


        
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
                    <h3>Account Details</h3>

                    <div class="line"></div>  

                    <h5 class="card-header">Student Details</h5>
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
                                    <td><?php echo $stnd_id; ?></td>
                                    
                                </tr>
                      
                        </tbody> 
                    </table> 

                </div> 
         
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
                                   <td>8</td>
                                    <td>Rajesh Kumar</td>                            
                                    <td>Father Name</td>                                   
                                    <td>9013773765</td>
                                    <td>SP1001</td>
                                    
                                </tr>
                      
                        </tbody> 
                    </table> 

                </div>
                <div class="card">             

                    <h5 class="card-header">Payment Details</h5>
                    <table class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                                  
                                <th>Sl.No</th>
                                <th>Receipt Id</th>
                                <th>Paid Amount</th>                                
                                <th>PDate</th>
                                <th>Invoice </th>                                                                                     
                            </tr>
                        </thead>                    
                        <tbody>  

                                <tr>
                                   <td>8</td>
                                    <td>Rajesh Kumar</td>                            
                                    <td>Father Name</td>                                   
                                    <td>9013773765</td>
                                    <td><a class="btn btn-link" href="./invoice.php">Generate Invoice</a>  </td>
                                    
                                </tr>
                      
                        </tbody> 
                    </table> 

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

</body>

</html>