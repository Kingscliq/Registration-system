<?php require_once 'controllers/authController.php';?>
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
                <form action="login.php" method="post">
                    <h3 class="text-center">Login</h3>
                    
                    <!--Check for login Errors-->
                    <?php if(count($errors)  > 0):?>
                        <div class="alert alert-danger">
                        <?php foreach($errors as $error):?>
                            <li><?php echo $error?></li>
                        <?php endforeach;?>
                        </div>
                    <?php endif;?>
                    
                    <div class="form-group">
                        <label for="username">Username or Email</label>
                        <input type="text" name="username" value="<?php echo $username?>" id="username" class="form-control form-control-lg">
                    </div>
                    
                    <div class="form-group">
                            <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control form-control-lg">
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" name="login-btn" class="btn btn-primary btn-lg btn-block" >Login</button>
                        
                    </div>
                    <p class="text-center">Don't have an Account Yet?<a href="signup.php">Register</a></p>
                    
                </form>
            </div>
        </div>
    </div>
</body>
</html>