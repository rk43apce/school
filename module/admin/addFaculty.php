
<?php
/**
 * Created by Chris on 9/29/2014 3:42 PM.
 */

error_reporting(E_ALL); 
 ini_set('display_errors', 1);

require_once '../core/init.php';

if (Input::exists()) {

    $faculty = new Faculty(); //Current

    $f_name = Input::get('f_name');  
    $f_email = Input::get('f_email');  
    $f_phoneNo = Input::get('f_phoneNo');
    $f_dob = Input::get('f_dob'); 
    $f_sex = Input::get('f_sex');   
    $f_experience= Input::get('f_experience');  
    $f_pemAddress  = Input::get('f_pemAddress'); 
    $f_pesAddress  = Input::get('f_pesAddress');
    $f_qualification  = Input::get('f_qualification'); 
    $f_doj  = Input::get('f_doj');
    $id_admin  = Session::get('user_id');

     $facultyData = array("id_admin"=>$id_admin, "f_name"=>$f_name, "f_email"=>$f_email, "f_phoneNo"=>$f_phoneNo, "f_dob"=>$f_dob, "f_sex"=>$f_sex, "f_experience"=>$f_experience, "f_pesAddress"=>$f_pesAddress, "f_qualification"=>$f_qualification, "f_doj"=>$f_doj);
   

    $faculty->facultyData =  $facultyData;

    $faculty->addFaculty();

     // $faculty->create($f_name, $f_email, $f_phoneNo, $f_dob, $f_sex, $f_experience, $f_pemAddress, $f_pesAddress, $f_qualification, $f_doj);
     
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"></script>
    <style type="text/css">
        .card {
            max-width: 786px;
            margin-left: auto;
            margin-right:  auto;
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
                <div class="card">
                    <div class="card-body">
                        <h3>Add Faculty</h3>         
                        <div class="line"></div>
                        <div class="row">
                            <div class="col-12">
                                <form  action="" method="post">
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-3 col-form-label">Full Name</label>
                                        <div class="col-sm-9">                                  
                                         <input type="text" name="f_name" class="form-control " placeholder="Enter first name" autofocus="" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-3 col-form-label">Email Id</label>
                                        <div class="col-sm-9">                                  
                                         <input type="text" name="f_email" class="form-control "  placeholder="Enter emaid id" required>
                                        </div>
                                    </div>

                                     <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-3 col-form-label">Phone No</label>
                                        <div class="col-sm-9">                                  
                                       <input type="text" name="f_phoneNo" class="form-control "  placeholder="Enter phone no" required>
                                        </div>
                                    </div>
                                                                   
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">                                  
                                       
                                            <label>Gender </label>  
                                            <label class="control control--radio">Male
                                            <input type="radio" name="f_sex" value="Male"checked="">
                                            <div class="control__indicator"></div>
                                            </label>
                                            <label class="control control--radio">Female
                                            <input type="radio" name="f_sex"  value="Female">
                                            <div class="control__indicator"></div>
                                            </label>
                                    
                                        </div>
                                    </div>

                                     <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-3 col-form-label">Qualification</label>
                                        <div class="col-sm-9">                                  
                                        <input type="text" name="f_qualification" class="form-control " placeholder="Qualification" required=""> 
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-3 col-form-label"> Date of Birth</label>
                                        <div class="col-sm-4">                                  
                                       <input type="date" name="f_dob" class="form-control "  placeholder="DOB(Y-m-d)" required>
                                        </div>
                                    </div>

                                     <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-3 col-form-label"> Year of Experience </label>
                                        <div class="col-sm-2">                                  
                                       <input type="number" name="f_experience" class="form-control "  placeholder="Ex 5 " required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-3 col-form-label">Permanent address</label>
                                        <div class="col-sm-9">                                  
                                      <textarea name="f_pesAddress" class="form-control" placeholder="Enter present address"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-3 col-form-label">Permanent address</label>
                                        <div class="col-sm-9">                                  
                                        <textarea name="f_pemAddress" class="form-control" placeholder="Enter permanent address"></textarea>
                                        </div>
                                    </div>

                                     <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">                                  
                                         <button type="submit" name="submit" value="addFaculty" class="btn btn-primary">Add Faculty</button>
                                      
                                        </div>
                                    </div>
                                                               
                    
                                </form>
                            </div>                            
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
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="../js/dashboard.js"></script>

</body>

</html>