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

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"></script>


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
                    <h3>Get Fee Status</h3> 
                   
                    <div class="line"></div>                    
                    <div class="row">
                        <div class="col-md-12 ">
                            <form action="./feeDetails.php" method="post">                               

                   
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Registration No</label>
                                    <div class="col-sm-10">
                                    <input type="text" name="s_fullname" class="form-control form-control-lg" placeholder="Enter student registration no Ex: 1010010">
                                    </div>
                                </div>

                              
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label"> </label>
                                    <div class="col-sm-10">
                                    <button type="submit" name="admission" value="admission" class="btn btn-primary btn-md">Save Details </button>
                                    </div>
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

</body>

</html>