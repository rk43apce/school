<?php

    require_once '../core/init.php';

    if(Input::exists('get')) {


        $studentId = Input::get('studentId');     

        $student = new Student();

        if ($studentData = $student->getStudentAccountById($studentId)) {
        # code...
        $studentSubjectDaTa = $student->getStudentSubject($studentId);

        $studentId = $studentData['s_registrationNo'];                
        $s_fullname = $studentData['s_fullname'];
        $s_fatherName = $studentData['s_fatherName'];
        $s_motherName = $studentData['s_motherName'];
        $s_email = $studentData['s_email'];        
        $netFees = $studentData['netFees'];
        $classId = $studentData['classId'];
        $className = $studentData['className'];
        $s_phoneNo = $studentData['s_phoneNo'];

        } else {

        Session::put('errorMsg', 'Sorry! No record found');
        }



        if ($result = $student->getStudentSubject($studentId)) {
            # code...
            $arrayCourseSubjects = array();

            foreach ($result as $key => $value) {

            array_push($arrayCourseSubjects, $value['subjectId']);    
            }
        }
    
       

    
        $standard = new Standard();
    
        $allSubjectsData = $standard->getSubject(); // getting all subject list
  
    } else {

        Redirect::to('./dashboard.php');    
        die();   

    }

?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/semantic.min.css"/>
    <?php include './include/cssLink.php';?>
</head>
<body>

<div class="wrapper">
<!-- Sidebar Holder -->
<?php include './include/defaultNavbar.php';?>
<!-- Page Content Holder -->
<div id="content">

<?php include './include/topNavbar.php';?>


<div class="container">
    <div class="card">
          <div class="card-body">
            <h3><?php echo $s_fullname; ?></h3>                      
             <p>Personal Details</p>
               <div class="line"></div>  
            <table  class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Admission No</th>
                        <th>Name</th>
                        <th>Father Name</th>                                
                        <th>Phone</th>
                        <th>Class</th>                                                                                     
                    </tr>
                </thead>                    
                <tbody> 
                    <?php if ($studentData) { ?>  
                        <tr>
                            <td><?php echo $studentId; ?></td>
                            <td><?php echo $s_fullname; ?></td>                            
                            <td><?php echo $s_fatherName; ?></td>                                   
                            <td><?php echo $s_phoneNo; ?></td>
                            <td><?php echo $className; ?></td>
                        </tr>
                    <?php  } else { ?>
                        <tr>
                            <td colspan="5">
                                <?php echo Session::get('noStudentRecord'); ?>
                            </td>
                        </tr> 
                    <?php } ?>    
                </tbody> 
            </table>                 
            </div> 
        </div>               
    </div> 
    <br><br>
    <div class="container">


           <div class="card">      
             <div class="card-body">
            <h3>Update Subjects</h3>  
               <div class="line"></div>  
            <form method="post" action="./updateStudentSubject.php" >  

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-3 col-form-label">Subjects </label>
                <div class="col-sm-6">
                    <select name="subjects[]" class="ui fluid search dropdown" multiple="" required="">

                        <option value=""> Choose subjects (Mutiple) </option>

                        <?php  foreach ($allSubjectsData as $key => $subject) { ?>

                        <option  value="<?php echo $subject['subjectId']; ?>" 

                        <?php

                        if (!empty($arrayCourseSubjects)) {
                            # code...
                            echo  (in_array($subject['subjectId'], $arrayCourseSubjects)) ? "selected" : "" ;
                        }
                        ?> 
                         >
                        <?php echo escape($subject['subjectName']); ?>

                        </option>

                        <?php  }  ?> 

                    </select>  
                </div>
            </div>

            <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label"></label>
                <div class="col-sm-6">
                    <div class="form-group">   
                        <input type="hidden"  name="studentId" value="<?php echo $studentId ?>" >   
                        <input type="hidden" name="token" value="<?php echo Token::generate('updateStudentSubject');?>">                                        
                        <button type="submit" name="updateStudentSubject" onclick=" return confirmFormSubmit()" value="updateStudentSubject" class="btn btn-primary">Update Course Subject</button>
                    </div> 
                </div>
            </div>    
        </form> 
    </div>
    
    </div>

</div>



<?php include 'include/footer.php'?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/semantic.min.js"></script>
<script>
    $('.ui.dropdown')
    .dropdown();
</script>
   <script type="text/javascript">
       
        function confirmFormSubmit() {

        return confirm('Are you sure?');

        }

   </script>
</body>
</html>
