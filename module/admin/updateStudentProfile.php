    
<?php

require_once '../core/init.php';

$isUpdateStudentProfile = false;

$login = new Login();   

(!$login->isUserLogIn('admin'))? Redirect::to("http://" . $_SERVER['SERVER_NAME']) : "";


$student = new Student();


if(!Input::exists('get') && Input::exists(Input::get('studentId'))) {

    Redirect::to('dashboard.php');

    die();
}


if (Input::exists('post')) {


    $s_registrationNo = escape(Input::get('studentId')); 
    $s_fullname = escape(Input::get('s_fullname'));  
    $s_fatherName = escape(Input::get('s_fatherName')); 
    $s_motherName = escape(Input::get('s_motherName'));  
    $s_dob  = escape(Input::get('s_dob')); 
    $s_sex= escape(Input::get('s_sex'));  
    $s_email = escape(Input::get('s_email'));     
    $s_phoneNo = escape(Input::get('s_phoneNo')); 
    $s_address = escape(Input::get('s_address'));  



    $studentData = array("s_registrationNo"=>$s_registrationNo, "s_fullname"=>$s_fullname, "s_fatherName"=>$s_fatherName, "s_motherName"=>$s_motherName, "s_dob"=>$s_dob, "s_sex"=>$s_sex, "s_email"=>$s_email, "s_phoneNo"=>$s_phoneNo, "s_email"=>$s_email, "s_address"=>$s_address);



    if ($student->updateStudentProfile($studentData, $s_registrationNo)) {

        $isUpdateStudentProfile = true;

        Session::put('errorMsg', 'Student profile successfully updated!' );

        Redirect::to('studentAccount.php?studentId='.$s_registrationNo);

    }
    else {


        Session::put('errorMsg', 'Sorry, Fail to update!' );
    }


}   elseif (Input::exists('get')) {
# code...

    if($studentData = $student->getStudentAccountById(Input::get('studentId'))){

        $studentId = $studentData['s_registrationNo'];                
        $s_fullname = $studentData['s_fullname'];
        $s_fatherName = $studentData['s_fatherName'];
        $s_motherName = $studentData['s_motherName'];
        $s_email = $studentData['s_email'];
        $s_sex = $studentData['s_sex'];   
        $s_address = $studentData['s_address'];
        $s_phoneNo = $studentData['s_phoneNo'];
        $s_dob = $studentData['s_dob'];
        

    }  else {

        Session::put('noStudentRecord', 'Sorry, No record found!');

    }

}   else {

    Redirect::to('./dashboard.php');
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
                <div  class="row">
                    <div class="col-md-12">
                        <div class="card "> 


                        <ol class="breadcrumb">
                            <li class="breadcrumb-item ">Student</li>
                            <li class="breadcrumb-item"><a class="btn-link" href="./studentAccount.php?studentId=<?php echo $studentId;?>"><?php echo $s_fullname; ?></a></li>
                            <li class="breadcrumb-item"> <a class="btn-link" href="./updateStudentSubject.php?studentId=<?php echo $studentId;?>">Course</a></li>
                            <li class="breadcrumb-item"><span class="text-<?php echo ($isUpdateStudentProfile) ? 'success' : 'danger' ?>"><?php echo (Session::exists('errorMsg')?  Session::flash('errorMsg') : "") ?></span></li>
                        </ol>
                            
                            <div class="line"></div>    
                            <div class="row">
                                <div class="col-md-12 ">
                                    <form  action="" method="post">                               

                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-3 col-form-label" >Student Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="s_fullname" class="form-control" value="<?php echo($s_fullname);?>" required autofocus>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-3 col-form-label">Father Name </label>
                                            <div class="col-sm-9">
                                                <input type="text" name="s_fatherName" class="form-control "  value="<?php echo($s_fatherName);?>" required>
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-3 col-form-label"> Mother Name </label>
                                            <div class="col-sm-9">
                                                <input type="text" name="s_motherName" class="form-control "  value="<?php echo($s_motherName);?>" required>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-3 col-form-label"> Date of Birth </label>
                                            <div class="col-sm-9">
                                                <input type="date"  name="s_dob"   class="form-control " value="<?php echo($s_dob);?>" required>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-9">
                                                <label class="control control--radio">Male
                                                    <input type="radio" name="s_sex" value="Male" <?php echo ($s_sex=='Male')? "checked": ""; ?> >
                                                    <div class="control__indicator"></div>
                                                </label>
                                                <label class="control control--radio">Female
                                                    <input type="radio" name="s_sex"  value="Female" <?php echo ($s_sex=='Female')? "checked": ""; ?>>
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-3 col-form-label"> Email Id</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="s_email" class="form-control "  value="<?php echo($s_email);?>" required>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-3 col-form-label"> Phone No</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="s_phoneNo" minlength="10" class="form-control "  value="<?php echo($s_phoneNo);?>" required>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-3 col-form-label"> Address</label>
                                            <div class="col-sm-9">
                                                <textarea name="s_address" rows="3" class="form-control" required="">

                                                    <?php echo($s_address);?>
                                                </textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-3 col-form-label"> </label>
                                            <div class="col-sm-9">
                                                <input type="hidden" name="studentId" id="studentId" value="<?php echo $studentId;?>"> 
                                                <button type="submit" name="admission" onclick=" return confirmFormSubmit()" value="admission" class="btn btn-primary btn-md">Save Details </button>
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
    </div>


    <?php include 'include/footer.php'?>

    <script type="text/javascript">

        function confirmFormSubmit() {

            return confirm('Are you sure you want to save this thing into the database?');

        }

    </script>


</body>

</html>