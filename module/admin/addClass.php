<?php
require_once '../core/init.php';

if (Input::exists('post')) {

    if (Token::check(Input::get('token'), 'newAdmission')) {


        var_dump($_POST);

    } 
}

?>


<!DOCTYPE html>
<html>

<head>

    <?php include './include/cssLink.php' ?>

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
                <div class="card "> 
                    <h3>Create Class</h3> 
                    <span class="text-danger">
                        <?php echo ( Session::exists('newStudentRgistrationError')) ? Session::flash('newStudentRgistrationError') : "" ?>
                    </span>
                    <div class="line"></div>                    
                    <div class="row">
                        <div class="col-md-12 ">
                            <!-- form start -->
                            <form  action="" method="post">    

                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label">Class Name  </label>
                                    <div class="col-sm-9">
                                        <input type="numebr" name="netFees"  class="form-control" placeholder="Ex: Class X" >
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label"> </label>
                                    <div class="col-sm-9">
                                        <input type="hidden" name="token" value="<?php echo Token::generate('newAdmission'); ?>">   
                                        <button type="submit" name="admission" onclick=" return confirmFormSubmit()" value="admission" class="btn btn-primary btn-md">Save Details </button>
                                    </div>
                                </div>  

                            </form>
                            <!-- form start -->
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