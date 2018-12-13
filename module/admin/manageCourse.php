<?php
    require_once '../core/init.php';
    $login = new Login(); 
    $standard = new Standard();

    if (!$standardData =  $standard->getStandard()) {

        Session::put('errorMsg', 'Sorry! no record found');
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

                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">Manage Course</li>  
                        <li class="breadcrumb-item " > <a href="./addCourse.php" class="btn-link"> + Add New Course</a></li>  
                    </ol>

                    
                   
                            
                    <div class="line"></div>  
                        
                    <div class="card-body">

                    <table id="adminDashboard" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S.No</th>                               
                                <th>Class Name</th>
                                <th>Name</th>                  
                                                            
                            </tr>
                        </thead>                    
                        <tbody>  

                        <?php

                        if ($standardData) {

                            $sno = 1;

                            foreach ($standardData as $key => $standard) { ?>

                            <tr>
                                <td><?php echo escape($sno);?></td>
                                <td><?php echo escape($standard['className']); ?></td> 	
                                <td><a class="btn-link" href="./viewCourse.php?classId=<?php echo escape($standard['classId']); ?>">View Account</a></td>
                            </tr>

                            <?php $sno++;   }

                            } else{ ?>

                            <tr><td colspan="7" align="center"><?php echo Session::get('errorMsg');?></td></tr>

                        <?php  }  ?>  

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