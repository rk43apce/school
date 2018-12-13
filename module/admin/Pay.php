
<?php
error_reporting(E_ALL); 
ini_set('display_errors', 1);

require_once '../core/init.php';







 if(Input::exists('post')) {

     $fees = new Fees(); 


    $s_registrationNo =  Input::get('studentID');
    $amount =  Input::get('amount');



    // $fees->insertStundentPaymentData($s_registrationNo, $amount);

    var_dump($fees->insertStundentPaymentData($s_registrationNo, $amount));



}elseif (Input::exists('get')) {


    $student = new Student();
    # code...
 if($result = $student->get(Input::get('studentID'))){

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
                    <h3>Confirme Details</h3>

                    <div class="line"></div>  


                    <div class="card">             

                        <h5 class="card-header">Pay Here...!</h5>

                        <div class="card-body">

                            <form action="" method="post"> 
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Admission Number</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?php echo $s_id; ?>" disabled="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?php echo $s_fullname;?>" disabled="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label" >Class</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?php echo $stnd_name;?>" disabled="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label" >Net Fee</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="netamount" class="form-control" value="<?php echo $netFees;?>" disabled="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail"  class="col-sm-2 col-form-label" >Amount</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" class="form-control" name="studentID" value="<?php echo $s_id; ?>">    
                                        <input type="text" id="amount" name="amount" class="form-control"  placeholder="Ex: Amount" required="">
                                    </div>
                                </div>                           
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label"> </label>
                                    <div class="col-sm-10">
                                        <button type="submit" name="admission" value="admission" class="btn btn-primary btn-md">Save Details </button>
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
        function confirmPaymentDetails(argument) {


            // var netamount =  $('#netamount').val();    
            // var amount =  $('#amount').val();   



            // var intRegex = /^\d+$/;

            // if(intRegex.test(amount) ) {
                // alert('I am a number');

            // }else {

                // alert('Not a number');
// 
            // }


            // if( !$(amount).val() ) {

            // }

            // body...
            // if (confirm('Are you sure you want to save this thing into the database?')) {
            // Save it!

                // alert('Payment successfully recieved');




            // } else {
            // Do nothing!

                  // alert('Payment Fail!');
            // }
        // }
    </script>
</body>

</html>         