<?php

require_once '../core/init.php';

$faculty = new Faculty();

if(!$facultyData = $faculty->getAllFaculty()){

    Session::put('errorMsg', 'No record found!');

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
                    <h2>Manage Faculty</h2>         
                    <div class="line"></div>
                     <table id="adminDashboard" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>S.no</th>    
                                <th>Name</th>                  
                                <th>Email</th>
                                <th>PhoneNo</th>           
                                <th>DOJ</th>
                                <th>Action</th>
                            </tr>
                        </thead>                    
                        <tbody>  

                          
                             <?php  
                                             
                                 foreach ($facultyData as $key => $faculty) { ?>
                                        
                                    <tr>   
                                        <td>1</td> 
                        
                                        <td><?php echo $faculty['f_name']; ?></td>         
                                        <td><?php echo $faculty['f_email']; ?></td>
                                        <td><?php echo $faculty['f_phoneNo']; ?></td>                        
                                        <td><?php echo $faculty['f_doj']; ?></td> 
                                        <td>Action</td>
                                    </tr>

                            <?php  }  ?>   
                         
                        </tbody> 
                    </table> 
                </div> 
            </div>
        </div>
    </div>

    <?php include './include/footer.php' ?>
</body>

</html>