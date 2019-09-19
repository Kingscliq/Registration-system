<?php 

    require_once 'controllers/authController.php';
    if (!$_SESSION['id']) {
        header('location: login.php');
        exit();
    }

?>

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
                             
                    <?php if(isset($_SESSION['message'])):?>
                        <div class="alert <?php echo $_SESSION['alert-class']?> ">
                            
                            
                            <li>
                                <?php 
                                    echo $_SESSION['message'];
                                    unset($_SESSION['message']);
                                    unset($_SESSION['alert-class']);
                                ?>
                            </li>
                        </div>
                    <?php endif;?>
                        <h3>Welcome, <?php echo $_SESSION['username']?></h3>
                    
                        <p class="logout"><a href="index.php?logout=1" name = "logout">Logout</a></p>
                           <?php if(!$_SESSION['verified']):?> 
                            <div class="alert alert-warning">
                                <p> An ambitious with passion for online business, Year of hands Experience in web
                                development, programming and designing in HTML, CSS, Php, JAvascript, Joomla, Wordpress, and much more
                                Client Satisfaction is first priority, Login to my email at <strong><?php echo $_SESSION['email']?></strong>
                                </p> 
                            </div>
                        <?php endif;?>
                        <?php if($_SESSION['verified']):?>
                    <div class="form-group">
                        <button type="submit" name="login-btn" class="btn btn-primary btn-block">I am Verified</button>
                        
                    </div>
                    <?php endif;?>
                    
                </form>
            </div>
        </div>
    </div>
    <script src="jquery.min.js">
      $(document).ready(function(){
        $('.alert').fadein();
      });
    </script>
</body>
</html>