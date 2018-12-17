<?php
require_once '../core/init.php';

if (Input::exists('post')) {

    $classId = Input::get('classId');
    $subjectId = Input::get('subjectId');

    $faculty = new Faculty(); 

    $resultFaculty = $faculty->viewFaculty();      

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
            <div class="card">
                <div class="card-body">
                    <h2>Select Faculty</h2>                      
                    <div class="row">
                        <div class="col-12">
                            <form  action="./addSubjectTeacher.php" method="post">

                                <div class="form-group">    
                                <input type="hidden" name="stnd_code" value="<?php echo($classId); ?>">
                                <input type="hidden" name="subject_id" value="<?php echo($subjectId); ?>">
                                </div>
                                <div class="form-group"> 
                                <select name="facultyId" class="ui fluid search dropdown"  required="">
                                    <option value=""> Choose Faculty </option>

                                    <?php  foreach ($resultFaculty as $key => $faculty) { ?>
                                    <option value="<?php echo escape($faculty['f_id']) ; ?>">
                                        <?php echo escape($faculty['f_name']) ; ?>                                        
                                    </option>
                                    
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