<?php

require_once '../core/init.php';

if (Input::exists('get')!== true) {

    Redirect::to('./dashboard.php');
    exit();
}

if (empty(Input::get('facultyId'))) {

    Redirect::to('./dashboard.php');
    exit();
}else {

    $faculty = new Faculty(); 

    if ($facultyData  = $faculty->getFacultyById(Input::get('facultyId'))) {
        $f_id = $facultyData['f_id'];
        $f_name = $facultyData['f_name'];
        $f_email = $facultyData['f_email'];
        $f_phoneNo = $facultyData['f_phoneNo'];
        $f_dob = $facultyData['f_dob'];
        $f_sex = $facultyData['f_sex'];
        $f_experience = $facultyData['f_experience'];
        $f_pesAddress = $facultyData['f_pesAddress'];
        $f_qualification = $facultyData['f_qualification'];
        $f_doj = $facultyData['f_doj'];
    } else {

        Session::put('errorMsg', 'No record found!!');

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
    <link rel="stylesheet" href="../css/radio.css">

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

        <?php if (!$facultyData) { ?>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-danger">
                    <?php  
                        echo   Session::flash('errorMsg');
                        die();
                    ?> 
                    </h5> 
                </div>
            </div>
        </div>
        <?php } ?>         
            
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h3>Update Faculty</h3>         
                    <div class="line"></div>
                    <div class="row">
                        <div class="col-12">
                            <form  action="./updateFacutyProfile.php" method="post">
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label">Full Name</label>
                                    <div class="col-sm-9">                                  
                                     <input type="text" name="f_name" class="form-control" value="<?php echo $f_name ?>" autofocus="" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label">Email Id</label>
                                    <div class="col-sm-9">                                  
                                     <input type="text" name="f_email" class="form-control "  value="<?php echo $f_email ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label for="staticEmail" class="col-sm-3 col-form-label">Phone No</label>
                                    <div class="col-sm-9">                                  
                                    <input type="text" name="f_phoneNo" class="form-control "  value="<?php echo $f_phoneNo ?>" required>
                                    </div>
                                </div>                                                               
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9"> 
                                        <label>Gender </label>  
                                        <label class="control control--radio">Male
                                        <input type="radio" name="f_sex" value="Male" <?php echo ($f_sex == 'Male')? "checked" : '' ?> >
                                        <div class="control__indicator"></div>
                                        </label>
                                        <label class="control control--radio">Female
                                        <input type="radio" name="f_sex"  value="Female" <?php echo ($f_sex == 'Female')? "checked" : '' ?> >
                                        <div class="control__indicator"></div>
                                        </label>                                
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label">Qualification</label>
                                    <div class="col-sm-9">                                  
                                        <input type="text" name="f_qualification" class="form-control " value="<?php echo $f_qualification; ?>" required=""> 
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label"> Date of Birth</label>
                                    <div class="col-sm-4">                                  
                                        <input type="date" name="f_dob" class="form-control "  value="<?php echo $f_dob?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label"> Year of Experience </label>
                                    <div class="col-sm-2">                                  
                                    <input type="number" name="f_experience" class="form-control "  value="<?php echo $f_experience ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label">Address</label>
                                    <div class="col-sm-9">                                  
                                    <textarea name="f_pesAddress" class="form-control" ><?php echo $f_pesAddress; ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">  
                                        <input type="hidden" name="token" value="<?php echo Token::generate('updateFaculty'); ?>">  
                                        <input type="hidden" name="facultyId" value="<?php echo $f_id;?>">
                                        <button type="submit" name="submit" value="addFaculty" class="btn btn-primary">Update Faculty</button>                                  
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
    <script type="text/javascript" src="../js/dashboard.js"></script>

</body>

</html>