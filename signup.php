
<?php require_once 'controllers/authController.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
    <link rel="stylesheet" href="bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="style.css" type="text/css">
    
    
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form-col">
                <form action="signup.php" method="post">
                    <h3 class="text-center">Register</h3>

                    <!--check for errors-->
                    <?php if (count($errors) > 0):?>
                        <div class="alert alert-danger">
                            <?php foreach($errors as $error):?>
                                <li><?php echo $error?></li>
                            <?php endforeach;?>
                        </div>
                    <?php endif;?>
                    
                    
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" value = "<?php echo $username?>" class="form-control form-control-lg">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value = "<?php echo $email?>" class="form-control form-control-lg">
                    </div>
                    <div class="form-group">
                            <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control form-control-lg">
                    </div>
                    <div class="form-group">
                            <label for="cpassword">Comfirm Password</label>
                        <input type="password" name="cpassword" id="cpassword" class="form-control form-control-lg">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="signup-btn" class="btn btn-primary btn-lg btn-block" >Sign Up</button>
                        
                    </div>
                    <p class="text-center">&nbsp; Already have an Account?<a href="login.php">  Login</a></p>
                    
                </form>
            </div>
        </div>
    </div>
</body>
</html>