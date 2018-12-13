
<?php
/**
 * Created by Chris on 9/29/2014 3:42 PM.
 */
error_reporting(E_ALL); 
 ini_set('display_errors', 1);

require_once '../core/init.php';


    $standard = new Standard();


    if($result = $standard->view()){

    }




if (Input::exists()) {

     $fees = new Fees(); //instantiate admission class

    $id_course = Input::get('id_course');  
    $fee_amount = Input::get('fee_amount'); 
   
     $fees->setFees($id_course, $fee_amount);  // calling create function from Admission class
     

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
    <link rel="stylesheet" href="../css/radio.css">
    <style type="text/css">
    	.card{
    		padding: 45px;
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
                <div class="card "> 
                    <h3>Add Concession</h3> 
                    
                    <div class="line"></div>                    
                    <div class="row">
                        <div class="col-md-12 ">
                            <form  action="" method="post"> 


                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Student Name </label>
                                    <div class="col-sm-10">
                                    <input type="text" name="fee_amount" class="form-control" value="Rajesh Kumar" disabled="">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Admission No </label>
                                    <div class="col-sm-10">
                                    <input type="number" name="fee_amount" class="form-control " value="10000" disabled="">
                                    </div>
                                </div>                              


                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Class </label>
                                    <div class="col-sm-10">
                                    <input type="number" name="fee_amount" class="form-control " value="10000" disabled="">
                                    </div>
                                </div> 
                				

                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Concession </label>
                                    <div class="col-sm-10">
                                    <input type="number" name="fee_amount" class="form-control " placeholder="Ex: 10000" required>
                                    </div>
                                </div>



								<div class="form-group row">
									<label for="staticEmail" class="col-sm-2 col-form-label"> </label>
									<div class="col-sm-10">
                                    <button type="submit" name="admissionFees" value="admissionFees" class="btn btn-primary btn-lg">Save Details </button>
									</div>
								</div>                              
                               
                            </form>
                        </div>                            
                    </div> 
                </div> 
            </div>
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="../js/bootstrap.js"></script>

    <script type="text/javascript" src="../js/dashboard.js"></script>
    </script>


</body>

</html>