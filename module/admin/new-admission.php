<?php
require_once '../core/init.php';

$standard = new Standard();

$classes = $standard->getStandard();


if (Input::exists('post')) {

    if (Token::check(Input::get('token'), 'newAdmission')) {

        $admission = new Admission(); 
        $s_registrationNo = Input::get('s_registrationNo'); 
        $s_fullname = Input::get('s_fullname');  
        $s_fatherName = Input::get('s_fatherName'); 
        $s_motherName = Input::get('s_motherName');  
        $s_dob  = Input::get('s_dob'); 
        $s_sex= Input::get('s_sex'); 
        $stnd_id = Input::get('classId'); 
        $netFees = Input::get('netFees'); 
        $s_email = Input::get('s_email');     
        $s_phoneNo = Input::get('s_phoneNo');  
        $s_address = Input::get('s_address');  
        $doj  = Input::get('doj'); 

        $result  =  $admission->create($s_registrationNo, $s_fullname, $s_fatherName, $s_motherName, $s_dob, $s_sex, $stnd_id, $netFees, $s_email, $s_phoneNo, $s_address, $doj);  // calling create function from Admission class

        if ($result) {

            Session::put('isStudentOnboardingStepOne', true);  
            Redirect::to('selectStudentSubjects.php?studentId='.$s_registrationNo.'&classId='.$stnd_id);
     } else{

        #cod ...

        }
    } 
}

?>


<!DOCTYPE html>
<html>

<head>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/semantic.min.css"/>
	<?php include './include/cssLink.php' ?>

    <style type="text/css">
        .card {
            max-width: 786px;
            margin-left: auto;
            margin-right:  auto;
        }
    </style>

    <script>
        window.onload = function () {
        var s_registrationNo = new Date().getTime(); // generating student registation by using tim in milliseconds

        document.getElementById( "s_registrationNo" ).value = s_registrationNo;
        };
    </script>
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
                    <h3>Admission Form</h3> 
                    <span>Note: All fields are compulsory</span>

                    <span class="text-danger">
                    <?php echo ( Session::exists('newStudentRgistrationError')) ? Session::flash('newStudentRgistrationError') : "" ?>
                    </span>
                    <div class="line"></div>                    
                    <div class="row">
                        <div class="col-md-12 ">
                            <form  action="" method="post">                               

                                <!--Setting student registration no-->

                                <input type="hidden" name="s_registrationNo" id="s_registrationNo" value="">
                                <!--End of  -->
                                
								<div class="form-group row">
									<label for="staticEmail" class="col-sm-3 col-form-label">Student Name</label>
									<div class="col-sm-9">
									<input type="text" name="s_fullname" class="form-control" placeholder="Ex: Love" autofocus="">
									</div>
								</div>



								<div class="form-group row">
									<label for="staticEmail" class="col-sm-3 col-form-label">Father Name </label>
									<div class="col-sm-9">
                                    <input type="text" name="s_fatherName" class="form-control "  placeholder="Ex: Ram" required>
									</div>
								</div>



								<div class="form-group row">
									<label for="staticEmail" class="col-sm-3 col-form-label"> Mother Name </label>
									<div class="col-sm-9">
                                    <input type="text" name="s_motherName" class="form-control "  placeholder=" Ex: Sita  " required>
									</div>
								</div>



								<div class="form-group row">
									<label for="staticEmail" class="col-sm-3 col-form-label"> Date of Birth </label>
									<div class="col-sm-9">
                                    <input type="date"  name="s_dob"  value="2013-01-08" class="form-control " placeholder="Choose" required="">
									</div>
								</div>



								<div class="form-group row">
									<label for="staticEmail" class="col-sm-3 col-form-label"> Gender </label>
									<div class="col-sm-9">
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



								<div class="form-group row">
									<label for="staticEmail" class="col-sm-3 col-form-label"> Select Class </label>
									<div class="col-sm-9">
										<select name="classId" class="ui fluid search dropdown">                            
                                            <option > Select Classs </option>
                                            <?php  
                                            foreach ($classes as $key => $classe) { ?>

                                                <option  value="<?php echo $classe['classId']; ?>"><?php echo escape($classe['className']); ?></option>

                                            <?php  } ?>                                

                                        </select>
									</div>
								</div>



                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label">Net Fees </label>
                                    <div class="col-sm-9">
                                    <input type="numebr" name="netFees"  class="form-control" placeholder="Ex: 1000 " >
                                    </div>
                                </div>


								<div class="form-group row">
									<label for="staticEmail" class="col-sm-3 col-form-label"> Date of Joining </label>
									<div class="col-sm-9">
                                    <input type="date" name="doj"  value="2013-01-08" class="form-control " >
									</div>
								</div>



								<div class="form-group row">
									<label for="staticEmail" class="col-sm-3 col-form-label"> Email Id</label>
									<div class="col-sm-9">
                                    <input type="text" name="s_email" class="form-control "  placeholder="Ex: rk43apce@gmail.com" required>
									</div>
								</div>


								<div class="form-group row">
									<label for="staticEmail" class="col-sm-3 col-form-label"> Phone No</label>
									<div class="col-sm-9">
                                    <input type="text" name="s_phoneNo" minlength="10" class="form-control "  placeholder="Ex: 9013773765" required>
									</div>
								</div>


								<div class="form-group row">
									<label for="staticEmail" class="col-sm-3 col-form-label"> Address</label>
									<div class="col-sm-9">
                                    <textarea name="s_address" rows="3" class="form-control " placeholder="Ex: Gandhi Nagar, Delhi" required=""></textarea>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/semantic.min.js"></script>

    <script>
        $('.ui.dropdown')
        .dropdown();
    </script>
    

</body>

</html>