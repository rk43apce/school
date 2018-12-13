
<?php
/**
 * Created by Chris on 9/29/2014 3:42 PM.
 */

require_once '../core/init.php';


    $standard = new Standard();


    if($result = $standard->view()){

    }




if (Input::exists()) {


    $student = new Student(); //Current

    $s_fname = Input::get('s_fname');  
    $s_lname = Input::get('s_lname');  
    $stnd_id = Input::get('stnd_id');  
    $s_email = Input::get('s_email');     
    $s_phoneNo = Input::get('s_phoneNo');   
    $s_sex= Input::get('s_sex');  
    $s_dob  = Input::get('s_dob'); 
    $s_admission  = Input::get('s_admission'); 

     $student->create($s_fname, $s_lname, $stnd_id, $s_email, $s_phoneNo, $s_sex, $s_dob, $s_admission);  

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
                <div class="datatable">
                    <h2>Admission Form</h2>         
                    <div class="line"></div>
                    <div class="row">
                        <div class="col-12">
                            <form  action="" method="post">

                               

                                <div class="form-group">
                                    <label> Firsrt Name </label>
                                    <input type="text" name="s_fname" class="form-control" placeholder="Enter first name" required>
                                </div>
                                 <div class="form-group">
                                    <label> Last Name </label>
                                    <input type="text" name="s_lname" class="form-control"  placeholder="Enter last name" required>
                                </div>
                                 <div class="form-group">
                                    <label>Select standard</label>
                                     <select name="stnd_id" class="form-control">

                                        <option value="">Coose standard</option>
                                        <?php

                                        while($row = $result->fetch_array()){

                                            ?>

                                            <option  value="<?php echo escape($row['stnd_code']); ?>"><?php echo escape($row['stnd_name']); ?></option>

                                            <?php

                                            }

                                        ?>

                                    </select>
                                 </div>
                                <div class="form-group">
                                    <label> Email Id </label>
                                    <input type="text" name="s_email" class="form-control"  placeholder="Enter Email" required>
                                </div>
                                <div class="form-group">
                                    <label> Phone No </label>
                                    <input type="text" name="s_phoneNo" minlength="10" class="form-control" placeholder="Enter Phone" required>
                                </div>
                                 <div class="form-group">
                                   
                                    <div class="control-group">
                                        <label>Gender </label>  
                                        <label class="control control--radio">Male
                                        <input type="radio" name="s_sex" value="Male"checked="">
                                        <div class="control__indicator"></div>
                                        </label>
                                        <label class="control control--radio">Female
                                        <input type="radio" name="s_sex"  value="Female">
                                        <div class="control__indicator"></div>
                                        </label>
                                    </div>
                                                                      
                                </div>

                                <div class="form-group">
                                    <label> Date of Birth </label>
                                    <input type="date" name="s_dob" class="form-control"  placeholder="Enter DOB(Y-m-d)" required>
                                </div>
                                <div class="form-group">
                                    <label> Admission Date </label>
                                    <input type="text" name="s_admission" class="form-control"  value="<?php echo date("Y-m-d");?>" readonly>
                                </div>

                                                           
                                <div class="form-group">                                           
                                    <button type="submit" name="addStudent" value="addStudent" class="btn btn-primary">Add Student</button>
                                </div>                                  
                               
                            </form>
                        </div>                            
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

</body>

</html>