	
<?php
error_reporting(E_ALL); 
 ini_set('display_errors', 1);

require_once '../core/init.php';


if (Input::exists('post')) {

$stnd_code = Input::get('stnd_code');
$sub_name = Input::get('sub_name');
$subject_id = Input::get('subject_id');
$course_name = Input::get('course_name');

$faculty = new Faculty(); // faculty class 

if($resultFaculty = $faculty->viewFaculty()){   // getting faculty ingres_result_seek(result, position)

        if(Session::exists('errorMsg')) {
    echo '<p>' . Session::flash('errorMsg'). '</p>';
}       
      

    }

}else{

           if(Session::exists('errorMsg')) {
    echo '<p>' . Session::flash('errorMsg'). '</p>';
}

    //Redirect::to('manageCourse.php');
}


?>




<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Dashboard | Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/semantic.min.css"/>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../css/dashboard.css">


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
                    <h2>Assign  Faculty / <?php echo $course_name; ?> / <?php echo $sub_name; ?> </h2>         
                    <div class="line"></div>  


                    <table class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Class Name</th>
                                <th>Subject</th>                                            
                            </tr>
                        </thead>                    
                        <tbody>  
                            <tr>                           
                                <td><?php echo $course_name; ?></td>
                                <td><?php echo $sub_name; ?></td>
                            </tr>
                        </tbody> 
                    </table>
                </div> 
            </div>

            <div class="container">
                <div class="datatable">
                    <h2>Select Faculty</h2>         
                  
                    <div class="row">
                        <div class="col-12">
                            <form  action="./addSubjectTeacher.php" method="post">

                                <div class="form-group">    
                                    <input type="hidden" name="stnd_code" value="<?php echo($stnd_code); ?>">
                                    <input type="hidden" name="subject_id" value="<?php echo($subject_id); ?>">
                                </div>

                                <div class="form-group">
                                    <select name="facultyID" class="ui fluid search dropdown"  required="">
                                        <option value=""> Choose Faculty </option>
                                        <?php	while($row = $resultFaculty->fetch_array()){ ?>										

                                        <option value="<?php echo escape($row['f_id']) ; ?>"> <?php echo escape($row['f_name']) ; ?> </option>

                                        <?php } ?>
                                    </select>
                                </div>        
                                <div class="form-group">                                           
                                    <button type="submit" name="addSubjectTeacher" value="addSubjectTeacher" class="btn btn-primary">Assign Faculty</button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/semantic.min.js"></script>

    <script>
    $('.ui.dropdown')
    .dropdown();
    </script>

</body>

</html>