<?php

require_once '../core/init.php';

if(Input::exists('post')) {

    // if(Token::check(Input::get('token'))) {


             
        $login = new Login();     


        if ($login->loginUser(Input::get('username'), Input::get('password'))) {
            # code...

            Redirect::to('./dashboard.php');
        }
     
    // }
}

?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Soft Sangam">
        <title>Log In | Soft Sangam</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../css/bootstrap.css">
        <!-- Other CSS -->
        <link rel="stylesheet" href="../css/common.css">
    </head>
    <body>
       
        <main role="main">          
            
            <div class="container">
                <div class="login-panel">
                    <div class="row py-5">
                        <div class="col-md-12">
                            <h2><strong>Admin Panel</strong></h2>
                            <h4 class="mb-4 font-weight-light">Login</h4>
                            <p class="text-danger"><?php echo (Session::exists('errorMsg'))? Session::flash('errorMsg') : ""; ?></p>
                            <div class="row">
                                <div class="col-12">
                                    <form  action="" method="post">

                                        <div class="form-group">
                                            <label for="username">Enter your username</label>
                                            <input type="text" name="username" class="form-control form-control-lg" id="username" placeholder="Enter username" required autofocus>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Enter your password</label>
                                            <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Enter password" required>    
                                        </div> 
                                        <div class="form-group">
                                            <input type="hidden" name="contactType" value="enquiry">
                                            <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                                            <button type="submit" name="submit" value="contactUs" class="btn btn-primary btn-lg">Login</button>
                                        </div>                                  
                                       
                                    </form>
                                </div>                            
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
               
        </main> 

    </body>
</html>