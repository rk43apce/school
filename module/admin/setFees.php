
<?php
/**
 * Created by Chris on 9/29/2014 3:42 PM.
 */
error_reporting(E_ALL); 
 ini_set('display_errors', 1);


 $errMsg = null;

require_once '../core/init.php';


    $standard = new Standard();


    if($result = $standard->view()){

    }



    $fees = new Fees(); //instantiate admission class



if (Input::exists()) {

 

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
                    <h5>Setting Fee Details</h5> 
                    
                    <div class="line"></div>                    
                    <div class="row">
                        <div class="col-md-12 ">
                            <form  action="" method="post">                               

                				<div class="form-group row">
									<label for="staticEmail" class="col-sm-2 col-form-label"> Select Class </label>
									<div class="col-sm-10">

										<select name="id_course" class="form-control ">

                                        <option value="">Coose class</option> 
                                        <?php

                                        while($row = $result->fetch_array()){

                                            ?>

                                            <option  value="<?php echo escape($row['stnd_code']); ?>"><?php echo escape($row['stnd_name']); ?></option>

                                            <?php

                                            }

                                        ?>

                                    </select>
									</div>
								</div>

                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Admission Fee </label>
                                    <div class="col-sm-10">
                                    <input type="number" name="fee_amount" class="form-control " placeholder="Ex: 10000" required>
                                    </div>
                                </div>

								<div class="form-group row">
									<label for="staticEmail" class="col-sm-2 col-form-label"> </label>
									<div class="col-sm-10">
                                    <button type="submit" name="admissionFees" value="admissionFees" class="btn btn-primary">Save Fees </button>
									</div>
								</div>                              
                               
                            </form>
                        </div>                            
                    </div> 
                </div> 
            </div>

            <br><br>
              <div class="container">
                <div class="card "> 
                    <h5>Available packages</h5> 
                    
                    <div class="line"></div>                    
                    <div class="row">
                        <div class="col-md-12 ">
                            <table id="adminDashboard" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>S.no</th>    
                                <th>Course/Package</th>                  
                                <th>Fees</th>
                                 <th>Action</th>
                             
                            </tr>
                        </thead>                    
                        <tbody>  

                            <?php

                            $package =  $fees->package();

                            if ($package) {
                                $sno = 1;

                             while($row = $package->fetch_array()){

                                ?>
                                <tr>
                                <td><?php echo escape($sno); ?></td>                        
                                 <td><?php echo escape($row['stnd_name']); ?></td>                                                                
                                <td><?php echo escape($row['fee']); ?></td> 
                                <td><a href="">Edit</a></td>                               
                          
                                </tr>

                                <?php

                                $sno++;
                                }
                            }else{
                                ?>
                                    <tr >   <td colspan="7" align="center"> <?php   echo 'No record found'; ?>    </td></tr>

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