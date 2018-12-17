<?php

require_once '../core/init.php';

$faculty = new Faculty();

if(!$facultyData = $faculty->getAllFaculty()){

    Session::put('errorMsg', 'No record found!');
    var_dump($facultyData);
}

?>
<!DOCTYPE html>
<html>

<head>
    <?php include './include/cssLink.php' ?>
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
                        <h3>Manage Faculty</h3>                      
                        <a href="./addFaculty.php" class="btn-link">+Add Faculty</a>
                         <?php echo (Session::exists('errorMsg')? Session::flash('errorMsg'): "" ) ?>
                        <div class="line"></div>

                         <table id="adminDashboard" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S.no</th>    
                                    <th>Name</th>                  
                                    <th>Email</th>
                                    <th>PhoneNo</th>                                      
                                </tr>
                            </thead>                    
                            <tbody>  
                                <?php if ($facultyData) {

                                $cnt = 1;         
                                                           
                                foreach ($facultyData as $key => $faculty) { ?>

                                <tr>   
                                    <td><?php echo $cnt ?> </td>
                                    <td><a class="btn-link" href="edit-faculty.php?facultyId=<?php echo $faculty['f_id']; ?>"><?php echo $faculty['f_name']; ?></a></td>         
                                    <td><?php echo $faculty['f_email']; ?></td>
                                    <td><?php echo $faculty['f_phoneNo']; ?></td> 
                                </tr>

                                <?php  $cnt++; } } ?>                               
                            </tbody> 
                        </table>
                    </div> 
                </div> 
            </div>
        </div>
    </div>

    <?php include './include/footer.php' ?>
</body>

</html>