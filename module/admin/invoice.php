<?php
error_reporting(E_ALL); 
 ini_set('display_errors', 1);

require_once '../core/init.php';



$student = new Student();


if(Input::exists('get')) {


    $StudentID =  Input::get('StudentID');

    $paymentID =  Input::get('paymentID');



    $invoice = new Invoice();

    // $invoiceData = $invoice->generateStudentFeeInvoice($StudentID, $paymentID);

    if ($invoiceData = $invoice->generateStudentFeeInvoice($paymentID)) {
        

        $id_payment = $invoiceData['id_payment'];
        $s_registrationNo = $invoiceData['s_registrationNo'];
        $amount = $invoiceData['amount'];
        $pay_on = $invoiceData['pay_on'];
        $s_fullname = $invoiceData['s_fullname'];
        $s_fatherName = $invoiceData['s_fatherName'];
        $s_motherName = $invoiceData['s_motherName'];
        $s_sex = $invoiceData['s_sex'];
        $s_dob = $invoiceData['s_dob'];
        $netFees = $invoiceData['netFees'];
        $s_email = $invoiceData['s_email'];
        $s_phoneNo = $invoiceData['s_phoneNo'];
        $s_address = $invoiceData['s_address'];
        $doj = $invoiceData['doj'];


    }

  

}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Invoice | Admin</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../css/dashboard.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"></script>
    <style type="text/css">
        @media print {
  body * {
    visibility: hidden;
  }
  #section-to-print, #section-to-print * {
    visibility: visible;
  }
  #section-to-print {
    position: relative;
    left: 0;
    top: 0;
  }
}
    </style>

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
                       
                <div class="card"  id="section-to-print">     
                  <h3>Invoice</h3>

                    <div class="line"></div>   

               
                    <h5 class="card-header">Student Details</h5>
                   <table  class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                                  
                                <th>Admission No</th>
                                <th>Name</th>
                                <th>Father Name</th>                                
                                <th>Phone</th>
                                                                                                        
                            </tr>
                        </thead>                    
                        <tbody>  
                                <tr>
                                   <td><?php echo $s_registrationNo; ?></td>
                                    <td><?php echo $s_fullname; ?></td>                            
                                    <td><?php echo $s_fatherName; ?></td>                                   
                                    <td><?php echo $s_phoneNo; ?></td>
                                    
                                </tr>
                      
                        </tbody> 
                    </table> 

                     

                    <h5 class="card-header">Fee Details</h5>
                    <table class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                                  
                                <th>#</th>  
                                <th>Receipt Id</th>   
                                <th>Amount Paid</th>      
                                <th>Paid On</th>                                                                                   
                            </tr>
                        </thead>                    
                        <tbody>  

                            <tr> 
                                <td>1</td>
                                <td><?php echo $id_payment; ?></td>  
                                <td><?php echo $amount; ?></td>   
                                <td><?php echo $pay_on; ?></td>   
                            
                            </tr>                      
                        </tbody> 
                    </table> 

                    <table>
                        <tr><td align="right"><button  onclick="printpage();" id="printpagebutton" class="btn btn-primary btn-md">Print Invoice</button></td></tr>
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


<script type="text/javascript">
    function printpage() {
        //Get the print button and put it into a variable
        var printButton = document.getElementById("printpagebutton");
        //Set the print button visibility to 'hidden' 
        printButton.style.visibility = 'hidden';
        //Print the page content
        window.print()
        //Set the print button to 'visible' again 
        //[Delete this line if you want it to stay hidden after printing]
        printButton.style.visibility = 'visible';
    }
</script>

</body>

</html>