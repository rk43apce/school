
<?php
error_reporting(E_ALL); 
 ini_set('display_errors', 1);

require_once '../core/init.php';


$student = new Student();


if(Input::exists('get')) {


   if($result = $student->get(Input::get('id'))){

        $row = $result->fetch_array();

       $s_fname =  escape($row['s_fname']);
       $s_lname =  escape($row['s_lname']);
       $class_id =  escape($row['stnd_id']);


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
                    <h2><?php echo $s_fname . ' '. $s_lname ; ?> <a href="" class="btn btn-link text-muted">Edit</a></h2>  

                    <div class="line"></div> 


                    <div class="row">
                        <div class="col-12">
                            <form  action="" method="post">

                                <div class="form-group">

                                    <label> Select Standard </label>
                                     <input type="" name="" value="<?php echo($class_id)?>" disabled="">  
                                </div>

							

                              

                                <div class="form-group">                                           
                                    <button type="submit" name="submit" value="addFaculty" class="btn btn-primary">Add Course</button>
                                </div>                                  

                            </form>
                        </div>                            
                    </div> 

                </div> 
            </div>
        </div>
    </div>


   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
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