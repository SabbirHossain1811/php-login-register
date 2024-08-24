<?php

include "../config/database.php";
session_start();

if (isset($_POST['signupbtn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
      
    $name_regex = '/^(?! $)[a-zA-Z ]*$/';
    $email_regex = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
    $password_regex_upper = '/^(?=.*?[A-Z])/';
    $password_regex_lower = '/^(?=.*?[a-z])/';
    $password_regex_number = '/^(?=.*?[0-9])/';
    $password_regex_char = '/^(?=.*?[#?!@$%^&*-])/';
    $password_regex_length = '/^.{8,}/';
    // Regex and validation code...
    
    $flag = false;
   
    // name start here.........
    if (!$name) {
        $_SESSION['name-error'] = "Name is required!";
        $flag = true;
        header('location: signUp.php');
    } else if (!preg_match($name_regex, $name)) {
        $_SESSION['name-error'] = "Name can't contain numbers!";
        $flag = true;
        header('location: signUp.php');
    }
    else{
        $_SESSION['old-name'] = "$name";
        header('location: signUp.php');
    }
    // name start here.........

//  email star here........
    if (!$email) {
        $_SESSION['email-error'] = "Email is required!";
        $flag = true;
        header('location: signUp.php');
    } else if (!preg_match($email_regex, $email)) {
        $_SESSION['email-error'] = "Email is invalid!";
        $flag = true;
    }
    else{
        $_SESSION['old-email'] = "$email";
        header('location: signUp.php');

    }
//  email star here........


    // password session star here........
    if (!$password) {
        $_SESSION['pass-error'] = 'Password is required!';
        $flag = true;
        header('location: signUp.php');
    } else if (!preg_match($password_regex_upper, $password)) {
        $_SESSION['pass-error'] = 'Password must be one uppercase letter!';
        $flag = true;
        header('location: signUp.php');
    } else if (!preg_match($password_regex_lower, $password)) {
        $_SESSION['pass-error'] = 'Password must be one lowercase letter!';
        $flag = true;
        header('location: signUp.php');
    } else if (!preg_match($password_regex_number, $password)) {
        $_SESSION['pass-error'] = 'Password must be one number!';
        $flag = true;
        header('location: signUp.php');
    } else if (!preg_match($password_regex_char, $password)) {
        $_SESSION['pass-error'] = 'Password must be one special character!';
        $flag = true;
        header('location: signUp.php');
    } else if (!preg_match($password_regex_length, $password)) {
        $_SESSION['pass-error'] = 'Password must be at 8 characters long!';
        $flag = true;
        header('location: signUp.php');
    }else{
        $_SESSION['old-pass'] = "$password";
        header('location: signUp.php');
    }
 // password session star here........

  // Cpassword session star here........
    if (!$cpassword) {
        $_SESSION['Cpass-error'] = 'Confirm password is required!';
        $flag = true;
        header('location: signUp.php');
    } else if ($cpassword != $password) {
        $_SESSION['Cpass-error'] = 'Passwords do not match!';
        $flag = true;
        header('location: signUp.php');
    }
    else{
        $_SESSION['old-cpass'] = "$cpassword";
        header('location: signUp.php');
    }
 // Cpassword session star here........


    // data base connect start............!!
    if($flag == false) {
        $encrypted_password = md5($password);
        $create_query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$encrypted_password')";
        mysqli_query($db, $create_query);
        $_SESSION['regis-complate'] = "Registration Complete...!!";
        $_SESSION['regis-name'] = "$name";
        $_SESSION['email-regis'] ="$email";
        // data base connect start............!!

        // Show sign-in form after successful sign-up
        $_SESSION['show-signin'] = true;
        header("location: signUp.php");
        exit();
    } else {
        $_SESSION['show-signin'] = false;
        header('location: signUp.php');
        exit();
    }
}

// login star here.......
    if(isset($_POST['signinbtn'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $flag = false;

        // regezs uesd here
        $email_regex = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
        $password_regex_upper = '/^(?=.*?[A-Z])/';
        $password_regex_lower = '/^(?=.*?[a-z])/';
        $password_regex_number = '/^(?=.*?[0-9])/';
        $password_regex_char = '/^(?=.*?[#?!@$%^&*-])/';
        $password_regex_length = '/^.{8,}/';
        // regezs uesd here

        if(!$email){
            $_SESSION['login-email'] = " Email is Requeird...!";
            header('location: signUp.php');
        }else if(!preg_match($email_regex,$email)){
            $_SESSION['login-email'] = "Email do not match..!!";
            $flag = true;
           header("location: signUp.php");
       }


       if(!$password){
        $_SESSION['pass-erro'] = "password is requeird..!!";
        $flag = true;
        header("location: signUp.php");
       }else if(!preg_match($password_regex_upper,$password)){
        $_SESSION['pass-erro'] = 'Password must be one uppercase letter!';
        $flag = true;
        header('location: signUp.php');
       }
       else if(!preg_match($password_regex_lower,$password)){
        $_SESSION['pass-erro'] = 'Password must be one lower letter!';
        $flag = true;
        header('location: signUp.php');
       }
       else if(!preg_match($password_regex_number,$password)){
        $_SESSION['pass-erro'] = 'Password must be one Number letter!';
        $flag = true;
        header('location: signUp.php');
       }
       else if(!preg_match($password_regex_char,$password)){
        $_SESSION['pass-erro'] = 'Password must be one Special letter!';
        $flag = true;
        header('location: signUp.php');
       }
       else if(!preg_match($password_regex_length,$password)){
        $_SESSION['pass-erro'] = 'Password must be at  8 characters long!';
        $flag = true;
        header('location: signUp.php');
       }
       if(!$flag){
   
        $encryption=md5($password);
        $query_info = "SELECT COUNT(*) AS 'validate' FROM users WHERE email='$email' AND password='$encryption'";
        $connect = mysqli_query($db,$query_info);
        $result = mysqli_fetch_assoc($connect);
       
       if ($result['validate'] == 1){
    
          $query_info = "SELECT * FROM users WHERE email='$email'";
          $connect = mysqli_query($db,$query_info);
          $author = mysqli_fetch_assoc($connect);
    
          $_SESSION['author_id'] = ($author['id']);
          $_SESSION['author_name'] = ($author['name']);
          $_SESSION['temp_name'] = ($author['name']);
          $_SESSION['author_email'] = ($author['email']);
       
          header("location:../dashboard/dashboard.php");
       }else{
             $_SESSION["login_unsuccuessfull"] = "credential doesn't match!";
             header("Location: signUp.php");
          }
       
       
       }
       
}

// login end here.......


?>