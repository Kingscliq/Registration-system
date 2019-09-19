<?php
session_start();
require 'config/db.php';

$errors = array();
$username ="";
$email = "";
// if the user clicks the signup button

if (isset($_POST['signup-btn'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    // validation
    if (empty($username)) {
        $errors['username'] = "Username Required!";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid Email Address";
    }
    if (empty($email)) {
        $errors['email'] = "Email Required!";
    }
    if (empty($password)) {
        $errors['password'] = "Password Required!";
    }
    if ($password !== $cpassword) {
        $errors['password'] =  "Password does not match!";   
    }
// Query the Database
    $emailQuery = "SELECT * FROM users WHERE email = ? LIMIT 1";
    $stmt = $conn->prepare($emailQuery);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();

    if ($userCount > 0) {
        $errors['email'] = "Email Already Exists";
    }
// check if an error is returned
    if (count($errors) === 0)  {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $token = bin2hex(random_bytes(50));
        $verified = false;

        $sql = "INSERT INTO users(username, email, verified, token, password) VALUES(?,?,?,?,?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssbss', $username, $email, $verified, $token, $password);
       if ($stmt->execute()) {
           // if statement Execution is Successful Log user in
            $user_id = $conn->insert_id;
            $_SESSION['id'] = $user_id;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['verified'] = $verified;
           // set flash messages
           $_SESSION['message'] = "Congrats You're Logged in";
           $_SESSION['alert-class'] = "alert-success";
           header('location: index.php');
           exit();
           
        } else{
           $errors['db_error'] = "Database Error: Failed to Register User";
       }
    }

   


}

 // if the Login button is clicked

 if (isset($_POST['login-btn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    

    // validation
    if (empty($username)) {
        $errors['username'] = "Username Required!";
    }
    
    if (empty($password)) {
        $errors['password'] = "Password Required!";
    }
    if (count($errors) === 0) {
        $sql = "SELECT * FROM users WHERE username = ? OR email = ? LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt-> bind_param('ss', $username, $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            // login success


            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['verified'] = $user['verified'];
        // set flash messages
        $_SESSION['message'] = "Congrats You're Logged in";
        $_SESSION['alert-class'] = "alert-success";
        header('location: index.php');
        exit();

        }else {
            $errors['login_fail'] = "Invalid credentials";
        }
     
}
}

// logout Functionality

if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['id']);
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    unset($_SESSION['password']);
    unset($_SESSION['verified']);

    header('location: login.php');
    exit();
}
?>