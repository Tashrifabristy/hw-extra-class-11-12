<?php
include "../inc/env.php";
session_start();
$email = $_REQUEST['email'];
$password= $_REQUEST['password'];


$query = "SELECT * from users WHERE email = '$email'";
$response = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($response);
$encPass= $user['password'];
 

if($response -> num_rows > 0){
    $isPasswordTrue = password_verify($password, $encPass);
    if($isPasswordTrue){

        $_SESSION['auth']= $user;
        header("Location:../backend/index.php");
    }else{
        header("Location:../login.php");
        $_SESSION['error_msg'] = 'Please enter a valid password';
    }
}else {

    $_SESSION['error_msg'] = 'Please enter a valid email address';
    header("Location:../login.php");
}
    


?>